<?php

namespace MEC_Invoice\Core\Manager;

use MEC_Invoice\Attendee;
// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
 *   Controller.
 *
 *   @author      Webnus <info@webnus.biz>
 *   @package     Modern Events Calendar
 *   @since       1.0.0
 */
class Controller
{

    /**
     *  Instance of this class.
     *
     *  @since   1.0.0
     *  @access  public
     *  @var     MEC_Invoice
     */
    public static $instance;

    /**
     *  The directory of this file
     *
     *  @access  public
     *  @var     string
     */
    public static $dir;

    /**
     *  Provides access to a single instance of a module using the Singleton pattern.
     *
     *  @since   1.0.0
     *  @return  object
     */
    public static function instance()
    {

        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function __construct()
    {
        if (self::$instance === null) {
            self::$instance = $this;
        }

        self::settingUp();
        self::setHooks();
        self::init();
    }

    /**
     *  Set Hooks.
     *
     *  @since   1.0.0
     */
    public static function setHooks()
    {
        add_action('mec_booking_completed', [self::$instance, 'addInvoiceManually'], 1000, 1);
        add_action('admin_enqueue_scripts', [self::$instance, 'enqueueAdminScripts']);
        add_action('wp_ajax_mec_invoice_change_ticket_status', [self::$instance, 'changeTicketStatus']);
        add_action('wp_ajax_mec_invoice_import_old_invoices', [self::$instance, 'importOldInvoices']);
        add_action('mec-settings-page-before-form-end', [self::$instance, 'renderSettingsPage'], 10, 1);
        add_filter('mec-settings-items-settings', [self::$instance, 'applySettingsPageMenu'], 10, 2);
        add_filter('mec_attendees_list_html', [self::$instance, 'applyCheckStatus'], 10, 4);
        add_filter('mec_attendees_list_header_html', [self::$instance, 'applyCheckStatusCol'], 10, 1);
        add_filter('mec_attendees_list_header_html', [self::$instance, 'addExportButton'], 10, 3);
        add_action('wp_ajax_export_attendees_as_csv', [self::$instance, 'exportAttendeesAsCsv'], 10);
        add_action('wp_loaded', [self::$instance, 'processExportAction']);
        add_action('mec_booking_verified', [self::$instance, 'verifyInvoice']);
        add_action('mec_booking_canceled', [self::$instance, 'cancelInvoice']);
        add_action('mec_booking_rejected', [self::$instance, 'cancelInvoice']);
        add_action('admin_menu', [self::$instance, 'exportMenu'], 100);
        add_action('delete_post', [self::$instance, 'deleteInvoice'], 10, 1);
        add_action('add_event_booking_sections_left_menu', [self::$instance, 'renderEventDescriptionMenu'], 10, 1);
        add_action('mec_metabox_booking', [self::$instance, 'renderEventDescriptionMetaBox'], 10);
        add_action('save_post', [self::$instance, 'save_event'], 10);
        add_action('mec-invoice-check-in', [self::$instance, 'sendCheckInStatus'], 10, 3);
        add_action('mec-invoice-check-out', [self::$instance, 'sendCheckOutStatus'], 10, 3);
        add_action('mec_display_report_page', [self::$instance, 'renderMECDisplayReportPageScripts'], 10);
        add_action('mec_booking_added', [self::$instance, 'sendNewBookingStatus'], 10);
        add_filter('script_loader_src', [self::$instance, 'DisableAutoSave'], 500 ,2);
    }

    /**
     * Disable AutoSave
     *
     * @author Webnus <info@webnus.biz>
     * @return void
     */
    public function DisableAutoSave($src, $handle)
    {
        global $typenow;
        if( 'autosave' != $handle || $typenow != 'mec_invoice' )
            return $src;
        return '';
    }
    /**
     * Send Pusher Signal for checked in attendee
     *
     * @author Webnus <info@webnus.biz>
     * @return void
     */
    public function sendCheckInStatus($invoiceID, $attendee, $place)
    {
        if (!\MEC_Invoice\Helper::getOption('mec_invoice_pusher_key', '')) {
            return;
        }
        include realpath(MECINVOICEDIR . '/libraries/pusher/vendor/autoload.php');
        $options = array(
            'cluster' => \MEC_Invoice\Helper::getOption('mec_invoice_pusher_cluster', ''),
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            \MEC_Invoice\Helper::getOption('mec_invoice_pusher_key', ''),
            \MEC_Invoice\Helper::getOption('mec_invoice_pusher_secret', ''),
            \MEC_Invoice\Helper::getOption('mec_invoice_pusher_app_id', ''),
            $options
        );

        $book_id = get_post_meta($invoiceID, 'book_id', true);
        $event_id = get_post_meta($invoiceID, 'event_id', true);
        $event_name = get_the_title($event_id);
        $feature_class = new \MEC_feature_mec();
        $event = $feature_class->db->select("SELECT * FROM `#__mec_events` WHERE `post_id` = {$event_id}", 'loadAssoc');
        if (!$event) {
            return;
        }
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        $transaction = get_option($transaction_id);
        $transaction['date'] = explode(':', $transaction['date']);
        $main                = \MEC::getInstance('app.libraries.main');
        foreach ($transaction['date'] as $k => $d) {
            if (!$d) {
                continue;
            }
            $transaction['date'][$k] = $main->standardize_format(date('Y/m/d H:i:s', $d), \MEC_Invoice\Helper::getOption('invoice_date_format', 'Y/m/d'));
        }
        $dates = $transaction['date'];
        $past_start_date = $dates[0];
        $past_end_date = @$dates[1];

        $occurrence = sprintf(__('%s to %s', 'mec'), $past_start_date, $past_end_date);
        $data['status'] = 'check-in';
        $data['attendee'] = $attendee;
        $data['event_name'] = $event_name;
        $data['event_id'] = $event_id;
        $data['occurrence'] = $occurrence;
        $data['start_date'] = $past_start_date;
        $pusher->trigger('Attendees', 'Check_in_Check_out', $data);
    }

    /**
     * Send Pusher Signal for checked in attendee
     *
     * @author Webnus <info@webnus.biz>
     * @return void
     */
    public function sendNewBookingStatus($book_id)
    {
        if (!\MEC_Invoice\Helper::getOption('mec_invoice_pusher_key', '')) {
            return;
        }
        include realpath(MECINVOICEDIR . '/libraries/pusher/vendor/autoload.php');
        $options = array(
            'cluster' => \MEC_Invoice\Helper::getOption('mec_invoice_pusher_cluster', ''),
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            \MEC_Invoice\Helper::getOption('mec_invoice_pusher_key', ''),
            \MEC_Invoice\Helper::getOption('mec_invoice_pusher_secret', ''),
            \MEC_Invoice\Helper::getOption('mec_invoice_pusher_app_id', ''),
            $options
        );

        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        $transaction = get_option($transaction_id);
        $event_id = $transaction['event_id'];
        $event_name = get_the_title($event_id);
        $book_name = get_the_title($book_id);
        $feature_class = new \MEC_feature_mec();
        $event = $feature_class->db->select("SELECT * FROM `#__mec_events` WHERE `post_id` = {$event_id}", 'loadAssoc');
        if (!$event) {
            return;
        }
        $transaction['date'] = explode(':', $transaction['date']);
        $main                = \MEC::getInstance('app.libraries.main');
        foreach ($transaction['date'] as $k => $d) {
            if (!$d) {
                continue;
            }
            $transaction['date'][$k] = $main->standardize_format(date('Y/m/d H:i:s', $d), \MEC_Invoice\Helper::getOption('invoice_date_format', 'Y/m/d'));
        }
        $dates = $transaction['date'];
        $past_start_date = $dates[0];
        $past_end_date = @$dates[1];

        $occurrence = sprintf(__('%s to %s', 'mec'), $past_start_date, $past_end_date);
        $data['status'] = 'new-booking';
        $data['event_name'] = $event_name;
        $data['book_name'] = $book_name;
        $data['event_id'] = $event_id;
        $data['occurrence'] = $occurrence;
        $data['start_date'] = $past_start_date;
        $pusher->trigger('Attendees', 'Check_in_Check_out', $data);
    }

    /**
     * Send Pusher Signal for checked out attendee
     *
     * @author Webnus <info@webnus.biz>
     * @return void
     */
    public function sendCheckOutStatus($invoiceID, $attendee, $place)
    {
        if (!\MEC_Invoice\Helper::getOption('mec_invoice_pusher_key', '')) {
            return;
        }
        include realpath(MECINVOICEDIR . '/libraries/pusher/vendor/autoload.php');
        $options = array(
            'cluster' => \MEC_Invoice\Helper::getOption('mec_invoice_pusher_cluster', ''),
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            \MEC_Invoice\Helper::getOption('mec_invoice_pusher_key', ''),
            \MEC_Invoice\Helper::getOption('mec_invoice_pusher_secret', ''),
            \MEC_Invoice\Helper::getOption('mec_invoice_pusher_app_id', ''),
            $options
        );

        $book_id = get_post_meta($invoiceID, 'book_id', true);
        $event_id = get_post_meta($invoiceID, 'event_id', true);
        $event_name = get_the_title($event_id);
        $feature_class = new \MEC_feature_mec();
        $event = $feature_class->db->select("SELECT * FROM `#__mec_events` WHERE `post_id` = {$event_id}", 'loadAssoc');
        if (!$event) {
            return;
        }
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        $transaction = get_option($transaction_id);
        $transaction['date'] = explode(':', $transaction['date']);
        $main                = \MEC::getInstance('app.libraries.main');
        foreach ($transaction['date'] as $k => $d) {
            if (!$d) {
                continue;
            }
            $transaction['date'][$k] = $main->standardize_format(date('Y/m/d H:i:s', $d), \MEC_Invoice\Helper::getOption('invoice_date_format', 'Y/m/d'));
        }
        $dates = $transaction['date'];
        $past_start_date = $dates[0];
        $past_end_date = @$dates[1];

        $occurrence = sprintf(__('%s to %s', 'mec'), $past_start_date, $past_end_date);
        $data['status'] = 'check-out';
        $data['attendee'] = $attendee;
        $data['event_name'] = $event_name;
        $data['event_id'] = $event_id;
        $data['occurrence'] = $occurrence;
        $data['start_date'] = $past_start_date;
        $pusher->trigger('Attendees', 'Check_in_Check_out', $data);
    }

    /**
     * Send Pusher Signal for checked in attendee
     *
     * @author Webnus <info@webnus.biz>
     * @return void
     */
    public function renderMECDisplayReportPageScripts()
    {
        if (!\MEC_Invoice\Helper::getOption('mec_invoice_pusher_key', '')) {
            return;
        }
        echo '<script src="https://js.pusher.com/5.1/pusher.min.js"></script>';
?>
        <script>
            Pusher.logToConsole = false;
            var pusher = new Pusher('<?php echo \MEC_Invoice\Helper::getOption('mec_invoice_pusher_key', '') ?>', {
                cluster: '<?php echo \MEC_Invoice\Helper::getOption('mec_invoice_pusher_cluster', '') ?>',
                forceTLS: true
            });

            var channel = pusher.subscribe('Attendees');
            channel.bind('Check_in_Check_out', function(data) {
                if (data.status == 'check-in') {
                    jQuery('#mec-pusher-messages').append('<div class="message-wrap check-in"><span class="check-in">Check-in</span><div class="message">' + data.attendee + ' - ' + '<b>' + data.event_name + '</b>' + ' (' + data.occurrence + ')' + '</div></div>')
                } else if (data.status == 'check-out') {
                    jQuery('#mec-pusher-messages').append('<div class="message-wrap check-out"><span class="check-out">Check-out</span><div class="message">' + data.attendee + ' - ' + '<b>' + data.event_name + '</b>' + ' (' + data.occurrence + ')' + '</div></div>')
                } else {
                    jQuery('#mec-pusher-messages').append('<div class="message-wrap new-booking"><span class="new-booking">New Booking</span><div class="message">' + data.book_name + ' - ' + '<b>' + data.event_name + '</b>' + ' (' + data.occurrence + ')' + '</div></div>')
                }
                if (jQuery('.mec-reports-selectbox-dates').val() == data.start_date && jQuery('.mec-reports-selectbox-event').val() == data.event_id) {
                    mec_event_attendees(data.event_id, data.start_date)
                }
            });

            jQuery(document).on('click', '#mec-pusher-messages .message-wrap', function() {
                jQuery(this).remove();
            })
        </script>
        <div id="mec-pusher-messages"></div>
    <?php
    }

    /**
     * codeMirror Enqueue Scripts
     *
     * @author Webnus <info@webnus.biz>
     * @return void
     */
    public function codeMirrorEnqueueScripts()
    {
        $cm_settings['codeEditor'] = wp_enqueue_code_editor(array('type' => 'text/css'));
        wp_localize_script('jquery', 'cm_settings', $cm_settings);

        wp_enqueue_script('wp-theme-plugin-editor');
        wp_enqueue_style('wp-codemirror');
    }
    /**
     * Save event data
     *
     * @author Webnus <info@webnus.biz>
     * @param int $post_id
     * @return void
     */
    public function save_event($post_id)
    {

        // Check if our nonce is set.
        if (!isset($_POST['mec_event_nonce'])) {
            return;
        }

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($_POST['mec_event_nonce'], 'mec_event_data')) {
            return;
        }
        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') and DOING_AUTOSAVE) {
            return;
        }

        $_mec = isset($_POST['mec']) ? $_POST['mec'] : array();
        if (!$_mec) {
            return;
        }

        if (isset($_mec['i_event_descriptions'])) {
            update_post_meta($post_id, 'i_event_descriptions', $_mec['i_event_descriptions']);
        }
    }

    /**
     * Render Event Description MetaBox
     * @param object $post
     */
    public function renderEventDescriptionMetaBox($post)
    {
    ?>
        <div id="mec-organizer-payments">
            <div id="mec-event-descriptions" class="mec-meta-box-fields mec-booking-tab-content">
                <h4 class="mec-title"><?php _e('Event Excerpt for Invoice', 'mec'); ?></h4>
                <span style="font-size: 11px;color: #888;margin: 0;margin-top: -10px;display:block;"><?php _e('Short descriptions about the event in the invoice. It is set to Modern Style as default.', 'mec-invoice'); ?></span>
                <div class="mec-form-row" id="mec_organizer_gateways_form_container">
                    <ul>
                        <?php
                        $content = get_post_meta($post->ID, 'i_event_descriptions', true);
                        ?>
                        <textarea name="mec[i_event_descriptions]" id="i_event_descriptions" cols="30" style="width:100%;" rows="4"><?php echo $content; ?></textarea>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    }

    /**
     * Render Event Description Menu
     *
     * @since     1.0.0
     */
    public function renderEventDescriptionMenu($post)
    {
        // $menuItems[__('Event Excerpt for Invoice', 'mec-invoice')] =  'mec-event-descriptions';
        echo '<a class="mec-add-booking-tabs-link" data-href="mec-event-descriptions" href="#">' . esc_html('Event Excerpt for Invoice', 'mec-invoice') . '</a>';
    }
    /**
     * Delete the invoice when a booking is deleted
     *
     * @since     1.0.0
     */
    public function deleteInvoice($postID)
    {

        if (get_post_type($postID) === 'mec-books') {
            $args = array(
                'post_type' => 'mec_invoice',
                'meta_query' => array(
                    array(
                        'key' => 'book_id',
                        'value' => $postID,
                        'compare' => '=',
                    )
                )
            );
            $invoice = current(get_posts($args));
            if ($invoice) {
                wp_delete_post($invoice->ID, true);
            }
        }
    }


    /**
     *  Admin Scripts
     *
     *  @since   1.0.0
     */
    public static function enqueueAdminScripts()
    {
        wp_enqueue_style('mec-invoice', MECINVOICEASSETS . 'css/mec-invoice.css', '', '');
        wp_enqueue_script('mec-invoice', MECINVOICEASSETS . 'js/mec-invoice.js', ['jquery']);
         if ('mec_invoice' == get_post_type()) {
            wp_dequeue_script('autosave');
            echo '<style>#minor-publishing-actions,#misc-publishing-actions{display:none !important;}</style>';
        }
    }


    /**
     *  Global Variables.
     *
     *  @since   1.0.0
     */
    public static function settingUp()
    {
        self::$dir  = MECINVOICEDIR . 'core' . DS . 'manager';
    }

    /**
     *  Verify Invoice
     *
     *  @since     1.0.0
     */
    public function verifyInvoice($bookID)
    {
        $invoiceID = get_post_meta($bookID, 'invoiceID', true);
        if ($invoiceID) {
            update_post_meta($invoiceID, 'status', 'open');
        }
    }

    /**
     *  Apply Checkin Data In Attendees List
     *
     *  @since     1.0.0
     */
    public function applyCheckStatus($html, $attendee, $key, $book_id)
    {

        $args = array(
            'post_type' => 'mec_invoice',
            'meta_query' => array(
                array(
                    'key' => 'book_id',
                    'value' => $book_id,
                    'compare' => '=',
                ),
            )
        );
        $post = get_posts($args);

        if (isset($post[0]->ID)) {
            $InvoiceID = $post[0]->ID;
        } else {
            $InvoiceID = 0;
        }


        if (Attendee::hasCheckedIn($InvoiceID, $attendee['email'], $key)) {
            $html .= '<div class="w-col-xs-2 checkin_status">' . '<span class="checkedIn">' . __('Checked In', 'mec-invoice') . '</span>' . '</div>';
        } else {
            $html .= '<div class="w-col-xs-2 checkin_status">' . '<span class="checkedOut">' . __('Not Yet', 'mec-invoice') . '</span>' . '</div>';
        }

        $html = str_replace('w-col-xs-3 name', 'w-col-xs-2 name', $html);
        $html = str_replace('w-col-xs-3 ticket', 'w-col-xs-2 ticket', $html);
        return $html;
    }

    /**
     *  Apply Checkin Col In Attendees List
     *
     *  @since     1.0.0
     */
    public function applyCheckStatusCol($html)
    {
        $html = str_replace('w-col-xs-3 name', 'w-col-xs-2 name', $html);
        $html = str_replace('w-col-xs-3 ticket', 'w-col-xs-2 ticket', $html);

        $html .= ' <div class="w-col-xs-2">
                    <span>' . __('Checkin Status', 'mec') . '</span>
                </div>';
        return $html;
    }

    /**
     *  Add Export Button Into Booking Report Attendees Table
     *
     *  @since     1.0.0
     */
    public function addExportButton($html, $eventID, $occurrence)
    {
        $html = '<div class="w-col-xs-2">
                    <spa class="mec-invoice-export-attendees-as-contact" data-id="' . $eventID . '" data-occurrence="' . $occurrence . '">' . __('Export Attendees As CSV', 'mec') . '</span>
                </div>' . $html;
        return $html;
    }

    /**
     *  Export Attendees As CSV
     *
     *  @since     1.0.0
     */
    public function exportAttendeesAsCsv()
    {
        $main = \MEC::getInstance('app.libraries.main');
        $db = \MEC::getInstance('app.libraries.db');
        $id = isset($_POST['eventID']) ? sanitize_text_field($_POST['eventID']) : 0;
        $occurrence = isset($_POST['occurrence']) ? sanitize_text_field($_POST['occurrence']) : NULL;

        $dates = $db->select("SELECT `dstart`, `dend` FROM `#__mec_dates` WHERE `post_id`='" . $id . "' LIMIT 10");

        // Use First Date as active Occurrence
        if (!$occurrence and is_array($dates) and count($dates)) $occurrence = reset($dates)->dstart;

        $date_query = array(
            array(
                'year' => date('Y', strtotime($occurrence)),
                'month' => date('m', strtotime($occurrence)),
                'day' => date('d', strtotime($occurrence)),
            ),
        );

        $booking_options = get_post_meta($id, 'mec_booking', true);
        $bookings_all_occurrences = isset($booking_options['bookings_all_occurrences']) ? $booking_options['bookings_all_occurrences'] : 0;
        if ($bookings_all_occurrences) {
            $date_query['compare'] = '<=';
        }

        // Fetch Bookings
        $bookings = get_posts(array(
            'posts_per_page' => -1,
            'post_type' => $main->get_book_post_type(),
            'post_status' => 'any',
            'meta_key' => 'mec_event_id',
            'meta_value' => $id,
            'meta_compare' => '=',
            'date_query' => $date_query,
        ));

        // Attendees
        $attendees = array();
        foreach ($bookings as $booking) {
            $atts = get_post_meta($booking->ID, 'mec_attendees', true);
            if (isset($atts['attachments'])) unset($atts['attachments']);

            foreach ($atts as $key => $value) {
                if (!is_numeric($key)) continue;

                $atts[$key]['book_id'] = $booking->ID;
                $atts[$key]['key'] = ($key + 1);
            }

            $attendees = array_merge($attendees, $atts);
        }

        $export_data = [];
        $export_data[] = ['ID', 'First Name', 'Title', 'Contact Picture', 'E-mail Address'];
        foreach ($attendees as $attendee) {
            $export_data[$attendee['id']] = [
                $attendee['id'],
                $attendee['name'],
                ((isset($attendee['id']) and isset($tickets[$attendee['id']]['name'])) ? $tickets[$attendee['id']]['name'] : __('Unknow Ticket', 'mec')),
                get_avatar_url($attendee['email']),
                $attendee['email']
            ];
        }

        // download
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=Attendees.csv");
        header('Content-type: text/csv');
        print $this->arrayToCSV($export_data);
        exit();
    }

    private function arrayToCSV($inputArray)
    {
        $csvFieldRow = array();
        foreach ($inputArray as $CSBRow) {
            $csvFieldRow[] = $this->str_putcsv($CSBRow);
        }
        $csvData = implode("\r\n", $csvFieldRow);
        return $csvData;
    }

    private function str_putcsv($input, $delimiter = ',', $enclosure = '"')
    {
        $fp = fopen('php://temp', 'r+');
        fputcsv($fp, $input, $delimiter, $enclosure);
        rewind($fp);
        $data = fread($fp, 1048576);
        fclose($fp);
        return rtrim($data, "\r\n");
    }

    /**
     *  Cancel Invoice
     *
     *  @since     1.0.0
     */
    public function cancelInvoice($bookID)
    {
        $invoiceID = get_post_meta($bookID, 'invoiceID', true);
        if ($invoiceID) {
            update_post_meta($invoiceID, 'status', 'closed');
        }
    }

    /**
     *  ADD Export Menu
     *
     *  @since     1.0.0
     */
    public function exportMenu()
    {
        add_submenu_page(
            'edit.php?post_type=mec_invoice',
            'Export Invoice (XML)',
            'Export Invoice (XML)',
            'manage_options',
            'export-xml',
            [static::instance(), 'exportAsXML']
        );
    }

    /**
     * Export As XML Page
     *
     * @since     1.0.0
     */
    public function exportAsXML()
    {
        echo '<div class="mec-invoice-export-as-xml-wrap">';
        echo '<div class="wns-be-container"><div id="wns-be-infobar"></div></div>';
        echo '<form method="post" action="#">
            <input type="hidden" name="mec-invoice-option" value="export">
            ' . wp_nonce_field('mec-invoice-export-data') . '
            <input type="submit" class="primary mec-invoice-export-btn" value="Export Invoices">
            <span class="description">' . __('Export all the details of invoices in "XMl" format. To proceed, please use the WordPress importer.', 'mec-invoice') . '</span>
        </form>';
        echo '</div>';
    }

    /**
     *  Process Bulk Actions
     *
     *  @since     1.0.0
     */
    public function processExportAction()
    {
        if (is_admin()) {
            if ($_POST) {

                if (isset($_POST['_wpnonce'])) {
                    if (!wp_verify_nonce($_POST['_wpnonce'], 'mec-invoice-export-data')) {
                        return;
                    }
                } else {
                    return;
                }
                if (isset($_POST['mec-invoice-option']) && $_POST['mec-invoice-option'] = 'export') {
                    require_once(ABSPATH . 'wp-admin/includes/export.php');
                    $args = array('content' => 'mec_invoice'); // custom post type cpt
                    export_wp($args);
                    exit();
                }
            }
        }
    }

    /**
     *  Change Ticket Status.
     *
     *  @since   1.0.0
     */
    public static function changeTicketStatus()
    {
        if (!Attendee::doIHaveAccess()) {
            ob_start();
            header("Content-type:application/json");
            echo json_encode([
                'status' => 'error',
                'text' => 'You don`t have permission!',
                'checked_time' => ''
            ]);
            die();
        }

        $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : '';
        $invoiceId = isset($_POST['invoice_id']) ? $_POST['invoice_id'] : '';
        $verified = get_post_meta($book_id, 'mec_verified', true);
        if ($verified !== '1') {
            ob_start();
            header("Content-type:application/json");
            echo json_encode([
                'status' => 'error',
                'text' => 'Booking Is Not Verified!',
                'checked_time' => ''
            ]);
            die();
        }
        $me      = isset($_POST['me']) ? $_POST['me'] : '';
        $place      = isset($_POST['place']) ? $_POST['place'] : '';
        if (!$me || !$book_id || !$invoiceId) {
            return;
        }

        if (!Attendee::hasCheckedIn($invoiceId, $me, $place)) {
            Attendee::doCheckIn($invoiceId, $me, $place);
            $checkedTime = get_post_meta($invoiceId, 'checkedInTime-' . $place, true);
            $text = __('Uncheck', 'mec-invoice');
            $status = 'yes';
        } else {
            Attendee::doCheckOut($invoiceId, $me, $place);
            $checkedTime = '-';
            $text = __('Checkin', 'mec-invoice');
            $status = 'no';
        }

        ob_start();
        header("Content-type:application/json");
        echo json_encode([
            'status' => $status,
            'text' => $text,
            'checked_time' => date_i18n(get_option('date_format') . ' - ' . get_option('time_format'), $checkedTime)
        ]);
        die();
    }

    /**
     * Import Old Invoices (AJAX ACTION)
     *
     * @since     1.0.0
     */
    public function importOldInvoices()
    {
        if (!is_admin()) {
            return;
        }

        $args = array(
            'post_type'   => 'mec-books',
            'post_status' => 'all',
            'numberposts' => -1
        );

        $latest_books = get_posts($args);
        $counter = 0;
        foreach ($latest_books as $book) {
            $invoiceId = get_post_meta($book->ID, 'invoiceID', true);
            $event_id = get_post_meta($book->ID, 'mec_event_id', true);

            if (FALSE === get_post_status($invoiceId)) {
                if (FALSE !== get_post_status($event_id)) {
                    $counter++;
                    static::add_invoice($book->ID, false);
                }
            }
        }
        echo __(sprintf('The %s invoice added successfully!', $counter), 'mec-invoice');
        die();
    }

    /**
     * Add Invoice Manually
     *
     * @since     1.0.0
     */
    public function addInvoiceManually($bookID)
    {
        if (!$bookID || get_post_meta($bookID, 'invoiceID', true)) {
            return;
        }
        if (!wp_doing_ajax() && is_admin()) {
            global $wpdb;
            $wpdb->get_results("DELETE FROM " . $wpdb->prefix . "posts WHERE post_status = 'auto-draft' and post_type='mec_invoice'");
            $wpdb->get_results("DELETE FROM " . $wpdb->prefix . "posts WHERE post_title = 'Auto Draft' and post_type='mec_invoice'");

            $ID = static::add_invoice($bookID, false);
            echo '<div style="position:fixed;left:0;top:0;width:100vw;height:100vh;background-color:#fefefe;color:#fff;">
            <h1 style="display: block;text-align: center;color: #bbb;">Invoice #' . $ID . '</h1>
            <h1 style="display: block;text-align: center;color: #ebebeb;">Please Wait To Redirect!</h1>
            <a href="' . get_edit_post_link($ID) . '" id="editLink" style="display: block;text-align: center;color: #ebebeb;" >Manage Invoice</a>

            </div>';
            echo '<script>
                setTimeout(() => {
                      document.getElementById("editLink").click();
                },1000);
            </script>';
            die();
        } else {
            static::add_invoice($bookID);
        }
        remove_action('mec_booking_completed', [$this, 'addInvoiceManually']);
    }

    /**
     *  Add Invoice.
     *
     *  @since   1.0.0
     */
    public static function add_invoice($bookID, $doAction = true, $attendee = false)
    {
        if (get_post_meta($bookID, 'invoiceID', true)) {
            return;
        }

        $main = \MEC::getInstance('app.libraries.main');
        $settings = $main->get_settings();
        if (!isset($settings['booking_status']) || !$settings['booking_status']) {
            return;
        }

        $price      = get_post_meta($bookID, 'mec_price', true);
        $event_id   = get_post_meta($bookID, 'mec_event_id', true);
        $confirmed  = get_post_meta($bookID, 'mec_confirmed', true);
        $IID = sha1(microtime());
        $doCheckinHash = sha1(md5(microtime()));
        if (!$doAction) {
            $time = get_post_meta($bookID, 'mec_booking_time', true);
        } else {
            $time = date("Y-m-d H:i:s", current_time('timestamp'));
        }

        $ID   = wp_insert_post([
            'post_title'    => __('Invoice', 'mec-invoice') . ' #' . $bookID,
            'post_type'     => 'mec_invoice',
            'post_status'   => 'publish',
            'post_date'     => $time,
            'meta_input'    => array(
                'invoiceID'       => $IID,
                'CheckinHash'       => $doCheckinHash,
                'book_id'       => $bookID,
                'transaction_id' => get_post_meta($bookID, 'mec_transaction_id', true),
                'price'         => $price,
                'date'          => strtotime($time),
                'confirmed'     => $confirmed,
                'status'        => 'open',
                'event_id'      => $event_id,
                'date_submit'   => date('YmdHis', current_time('timestamp', 0)),
            ),
        ]);
        wp_update_post([
            'ID'    => $ID,
            'post_title'    => __('Invoice', 'mec-invoice') . ' #' . \MEC_Invoice\Helper\Invoice::create_invoice_number($ID),
        ]);

        update_post_meta($bookID, 'invoiceID', $ID);

        if ($doAction) {
            do_action('mec-invoice-new-invoice-added', $ID);
        }


        return $ID;
    }

    /**
     *  Apply Settings Page Menu.
     *
     *  @since   1.0.0
     */
    public static function applySettingsPageMenu($items, $active_menu)
    {
        $items[__('Invoice Options', 'mec-invoice')] = 'invoice_options';
        return $items;
    }

    /**
     *  Render Invoice Settings In MEC Settings Page.
     *
     *  @since   1.0.0
     */
    public static function renderSettingsPage($settings)
    {
    ?>
        <style>
            .CodeMirror {
                border: 1px solid #ddd;
            }

            .CodeMirror-gutters {
                width: 35px;
            }

            .CodeMirror-sizer {
                margin-left: 35px !important;
            }

            .CodeMirror-gutter-wrapper {
                margin-left: -20px !important;
            }
        </style>
        <style>
            #mec-invoice-custom-css {
                height: 200px;
                margin-bottom: 5px;
                font-family: Consolas, Monaco, monospace;
                font-size: 13px;
                width: 100%;
                background: #f9f9f9;
                outline: 0;
                line-height: 1.5;
            }
        </style>
        <div id="invoice_options" class="mec-options-fields">
            <h4 class="mec-form-subtitle"><?php _e('Invoice Ooptions', 'mec-invoice'); ?></h4>
            <h5 class="mec-form-subtitle"><?php _e('Company Information', 'mec-invoice'); ?></h5>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_company_url"><?php _e('Company URL', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_company_url" name="mec[settings][mec_invoice_company_url]" value="<?php echo ((isset($settings['mec_invoice_company_url']) and trim($settings['mec_invoice_company_url']) != '') ? stripslashes(htmlentities($settings['mec_invoice_company_url'])) : ''); ?>" />
                </div>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_company_name"><?php _e('Company Name', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_company_name" name="mec[settings][mec_invoice_company_name]" value="<?php echo ((isset($settings['mec_invoice_company_name']) and trim($settings['mec_invoice_company_name']) != '') ? stripslashes(htmlentities($settings['mec_invoice_company_name'])) : ''); ?>" />
                </div>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_company_email"><?php _e('Company Email', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_company_email" name="mec[settings][mec_invoice_company_email]" value="<?php echo ((isset($settings['mec_invoice_company_email']) and trim($settings['mec_invoice_company_email']) != '') ? stripslashes(htmlentities($settings['mec_invoice_company_email'])) : ''); ?>" />
                </div>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_company_email"><?php _e('Company Phone', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_company_phone" name="mec[settings][mec_invoice_company_phone]" value="<?php echo ((isset($settings['mec_invoice_company_phone']) and trim($settings['mec_invoice_company_phone']) != '') ? stripslashes(htmlentities($settings['mec_invoice_company_phone'])) : ''); ?>" />
                </div>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_vat_number"><?php _e('Vat Number', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_vat_number" name="mec[settings][mec_invoice_vat_number]" value="<?php echo ((isset($settings['mec_invoice_vat_number']) and trim($settings['mec_invoice_vat_number']) != '') ? stripslashes(htmlentities($settings['mec_invoice_vat_number'])) : ''); ?>" />
                </div>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_description"><?php _e('Description', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <textarea id="mec_settings_description" name="mec[settings][mec_invoice_description]" rows="4"><?php echo ((isset($settings['mec_invoice_description']) and trim($settings['mec_invoice_description']) != '') ? stripslashes(htmlentities($settings['mec_invoice_description'])) : ''); ?></textarea>
                </div>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_address"><?php _e('Address', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <textarea id="mec_settings_address" name="mec[settings][mec_invoice_address]" rows="4"><?php echo ((isset($settings['mec_invoice_address']) and trim($settings['mec_invoice_address']) != '') ? stripslashes(htmlentities($settings['mec_invoice_address'])) : ''); ?></textarea>
                </div>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_logo"><?php _e('Logo', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_logo" name="mec[settings][mec_invoice_logo]" value="<?php echo ((isset($settings['mec_invoice_logo']) and trim($settings['mec_invoice_logo']) != '') ? stripslashes(htmlentities($settings['mec_invoice_logo'])) : ''); ?>" />
                    <button class="select-company-logo button">Select</button>
                </div>
            </div>
            <h5 class="mec-form-subtitle"><?php _e('Invoice Number Generation Settings', 'mec-invoice'); ?></h5>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_invoice_number"><?php _e('Invoice Number Start Point', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="number" id="mec_settings_invoice_number" name="mec[settings][mec_invoice_number_start_point]" value="<?php echo ((isset($settings['mec_invoice_number_start_point']) and trim($settings['mec_invoice_number_start_point']) != '') ? stripslashes(htmlentities($settings['mec_invoice_number_start_point'])) : '0'); ?>" />
                </div>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_invoice_number_length"><?php _e('Invoice Number Length', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="number" id="mec_settings_invoice_number_length" name="mec[settings][mec_invoice_number_length]" value="<?php echo ((isset($settings['mec_invoice_number_length']) and trim($settings['mec_invoice_number_length']) != '') ? stripslashes(htmlentities($settings['mec_invoice_number_length'])) : '0'); ?>" />
                    <p style="color: #8a6d3b; background-color: #fcf8e3; padding: 15px; margin-bottom: 20px; border: 1px solid #faebcc; border-radius: 4px; font-size: 14px;">
                        <?php echo __('Examples', 'mec-invoice'); ?>:
                        <strong style="position: relative;display: block;margin-top: 5px;">
                            "0"
                            <span class="mec-invoice-quote">
                                12345
                            </span>
                        </strong>
                        <strong style="position: relative;display: block;margin-top: 5px;">
                            "6"
                            <span class="mec-invoice-quote">
                                012345
                            </span>
                        </strong>
                        <strong style="position: relative;display: block;margin-top: 5px;">
                            "10"
                            <span class="mec-invoice-quote">
                                0000012345
                            </span>
                        </strong>
                    </p>
                </div>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_invoice_number_pattern"><?php _e('Invoice Number Pattern', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_invoice_number_pattern" name="mec[settings][mec_invoice_number_pattern]" value="<?php echo ((isset($settings['mec_invoice_number_pattern']) and trim($settings['mec_invoice_number_pattern']) != '') ? stripslashes(htmlentities($settings['mec_invoice_number_pattern'])) : '{number}'); ?>" />
                    <p style="color: #8a6d3b; background-color: #fcf8e3; padding: 15px; margin-bottom: 20px; border: 1px solid #faebcc; border-radius: 4px; font-size: 14px;">
                        <?php echo __('Examples', 'mec-invoice'); ?>:
                        <strong style="position: relative;display: block;margin-top: 5px;">
                            {number}
                            <span class="mec-invoice-quote">
                                12345
                            </span>
                        </strong>
                        <strong style="position: relative;display: block;margin-top: 5px;">
                            Prefix-{number}
                            <span class="mec-invoice-quote">
                                Prefix-12345
                            </span>
                        </strong>
                        <strong style="position: relative;display: block;margin-top: 5px;">
                            Prefix-{number}-Suffix
                            <span class="mec-invoice-quote">
                                Prefix-12345-Suffix
                            </span>
                        </strong>
                    </p>
                </div>
            </div>
            <h5 class="mec-form-subtitle"><?php _e('PDF Generation Settings', 'mec-invoice'); ?></h5>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_html2pdf"><?php _e('html2pdf API Key', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_html2pdf" name="mec[settings][mec_invoice_html2pdf]" value="<?php echo ((isset($settings['mec_invoice_html2pdf']) and trim($settings['mec_invoice_html2pdf']) != '') ? stripslashes(htmlentities($settings['mec_invoice_html2pdf'])) : ''); ?>" />
                    <?php if (!isset($settings['mec_invoice_html2pdf']) || !trim($settings['mec_invoice_html2pdf'])) : ?>
                        <p style="color: #8a6d3b; background-color: #fcf8e3; padding: 15px; margin-bottom: 20px; border: 1px solid #faebcc; border-radius: 4px; font-size: 14px;">Enter your API Key to download the PDF file. Use the following link to get a new API key: <a href="https://html2pdf.app/registration" target="_blank">https://html2pdf.app</a></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mec-form-row" id="show_invoice_description_in_pdf">
                <label class="mec-col-4">
                    <input type="hidden" name="mec[settings][mec_invoice_show_invoice_description_in_pdf]" value="0" />
                    <input type="checkbox" value="on" value="<?php echo @$settings['mec_invoice_show_invoice_description_in_pdf']; ?>" name="mec[settings][mec_invoice_show_invoice_description_in_pdf]" <?php echo ((isset($settings['mec_invoice_show_invoice_description_in_pdf']) and trim($settings['mec_invoice_show_invoice_description_in_pdf']) != '' and $settings['mec_invoice_show_invoice_description_in_pdf'] == 'on') ? 'checked="checked"' : ''); ?> />
                    <?php _e('Display Invoice Description in Print and PDF Mode', 'mec-invoice'); ?>
                </label>
            </div>

            <h5 class="mec-form-subtitle"><?php _e('Live Attendees Settings', 'mec-invoice'); ?></h5>
            <div class="mec-form-row">
                <label class="mec-col-4">
                    <input type="hidden" name="mec[settings][mec_invoice_use]" value="0" />
                    <input type="checkbox" id="mec_invoice_use_checkbox" value="on" value="<?php echo @$settings['mec_invoice_use']; ?>" name="mec[settings][mec_invoice_use]" <?php echo ((isset($settings['mec_invoice_use']) and trim($settings['mec_invoice_use']) != '' and $settings['mec_invoice_use'] == 'on') ? 'checked="checked"' : ''); ?> />
                    <?php _e('Use Pusher API For Live Actions', 'mec-invoice'); ?>
                </label>
            </div>
            <div class="mec-form-row" id="mec_invoice_use_form">
                <div class="group-box">
                    <label class="mec-col-3" for="mec_settings_pusher_app_id"><?php _e('Pusher.com API', 'mec-invoice'); ?></label>
                    <div class="mec-col-4">
                        <input type="text" id="mec_settings_pusher_app_id" placeholder="app_id" name="mec[settings][mec_invoice_pusher_app_id]" value="<?php echo ((isset($settings['mec_invoice_pusher_app_id']) and trim($settings['mec_invoice_pusher_app_id']) != '') ? stripslashes(htmlentities($settings['mec_invoice_pusher_app_id'])) : ''); ?>" />
                        <input type="text" id="mec_settings_pusher_key" placeholder="key" name="mec[settings][mec_invoice_pusher_key]" value="<?php echo ((isset($settings['mec_invoice_pusher_key']) and trim($settings['mec_invoice_pusher_key']) != '') ? stripslashes(htmlentities($settings['mec_invoice_pusher_key'])) : ''); ?>" />
                        <input type="text" id="mec_settings_pusher_secret" placeholder="secret" name="mec[settings][mec_invoice_pusher_secret]" value="<?php echo ((isset($settings['mec_invoice_pusher_secret']) and trim($settings['mec_invoice_pusher_secret']) != '') ? stripslashes(htmlentities($settings['mec_invoice_pusher_secret'])) : ''); ?>" />
                        <input type="text" id="mec_settings_pusher_cluster" placeholder="cluster" name="mec[settings][mec_invoice_pusher_cluster]" value="<?php echo ((isset($settings['mec_invoice_pusher_cluster']) and trim($settings['mec_invoice_pusher_cluster']) != '') ? stripslashes(htmlentities($settings['mec_invoice_pusher_cluster'])) : ''); ?>" />
                        <?php if (!isset($settings['mec_invoice_pusher_app_id']) || !trim($settings['mec_invoice_pusher_app_id'])) : ?>
                            <p style="color: #8a6d3b; background-color: #fcf8e3; padding: 15px; margin-bottom: 20px; border: 1px solid #faebcc; border-radius: 4px; font-size: 14px;">Enter your API Data to make the report page live. Use the following link to create a new channel and get a new API key: <a href="https://pusher.com" target="_blank">https://pusher.com</a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <h5 class="mec-form-subtitle"><?php _e('Check-in & Notification Settings', 'mec-invoice'); ?></h5>
            <div class="mec-form-row" id="mec_invoice_early_checkin">
                <label class="mec-col-5">
                    <input type="hidden" name="mec[settings][mec_invoice_early_checkin]" value="0" />
                    <input type="checkbox" value="on" value="<?php echo @$settings['mec_invoice_early_checkin']; ?>" name="mec[settings][mec_invoice_early_checkin]" <?php echo ((isset($settings['mec_invoice_early_checkin']) and trim($settings['mec_invoice_early_checkin']) != '' and $settings['mec_invoice_early_checkin'] == 'on') ? 'checked="checked"' : ''); ?> />
                    <?php _e('Enable Check-in Using QR Code only On Event Opening Days', 'mec-invoice'); ?>
                </label>
            </div>
            <div class="mec-form-row">
                <label class="mec-col-4">
                    <input type="hidden" name="mec[settings][mec_invoice_for_each_tickets]" value="0" />
                    <input type="checkbox" value="on" value="<?php echo @$settings['mec_invoice_for_each_tickets']; ?>" name="mec[settings][mec_invoice_for_each_tickets]" <?php echo ((isset($settings['mec_invoice_for_each_tickets']) and trim($settings['mec_invoice_for_each_tickets']) != '' and $settings['mec_invoice_for_each_tickets'] == 'on') ? 'checked="checked"' : ''); ?> />
                    <?php _e('Send Ticket & Invoice for each Attendees', 'mec-invoice'); ?>
                </label>
            </div>

            <div class="mec-form-row mec_booking_notifications">
                <label class="mec-col-4">
                    <input type="hidden" name="mec[settings][mec_booking_notifications]" value="0" />
                    <input type="checkbox" value="on" value="<?php echo @$settings['mec_booking_notifications']; ?>" name="mec[settings][mec_booking_notifications]" <?php echo ((isset($settings['mec_booking_notifications']) and trim($settings['mec_booking_notifications']) != '' and $settings['mec_booking_notifications'] == 'on') ? 'checked="checked"' : ''); ?> />
                    <?php _e('Disable MEC Booking Notifications', 'mec-invoice'); ?>
                    <span class="mec-tooltip">
                        <div class="box">
                            <h5 class="title"><?php _e('MEC Booking Notifications', 'mec-invoice') ?></h5>
                            <div class="content">
                                <p>
                                    <?php echo __("By enabling this option, the pre-defined booking confirmation sent to the customer by MEC is disabled. Add-on's email is sent in both disable/enable states.", 'mec-invoice'); ?>
                                </p>
                            </div>
                        </div>
                        <i title="" class="dashicons-before dashicons-editor-help"></i>
                    </span>
                </label>
            </div>

            <div class="mec-form-row">
                <label class="mec-col-3">
                    <?php _e('Checkin Roles', 'mec-invoice'); ?>
                    <span class="mec-tooltip">
                        <div class="box">
                            <h5 class="title"><?php _e('Checkin And Uncheck Roles', 'mec-invoice') ?></h5>
                            <div class="content">
                                <p><?php _e('What is the user access for Checkin and Uncheck?', 'mec-invoice') ?></p>
                            </div>
                        </div>
                        <i title="" class="dashicons-before dashicons-editor-help"></i>
                    </span>
                </label>

                <?php foreach (get_editable_roles() as $role_name => $role_info) :
                    if ($role_name == 'administrator') {
                        $settings['mec_invoice_checkin_roles'][$role_name] = 'on';
                    }
                ?>
                    <label>
                        <input type="hidden" name="mec[settings][mec_invoice_checkin_roles][<?php echo $role_name ?>]" value="0" />
                        <input type="checkbox" value="on" value="<?php echo @$settings['mec_invoice_checkin_roles'][$role_name]; ?>" name="mec[settings][mec_invoice_checkin_roles][<?php echo $role_name ?>]" <?php echo ((isset($settings['mec_invoice_checkin_roles'][$role_name]) and trim($settings['mec_invoice_checkin_roles'][$role_name]) != '' and $settings['mec_invoice_checkin_roles'][$role_name] == 'on') ? 'checked="checked"' : ''); ?> /><?php _e($role_name, 'mec-invoice'); ?>
                    </label>
                <?php endforeach; ?>
            </div>
            <h5 class="mec-form-subtitle"><?php _e('Invoice Rendering Settings', 'mec-invoice'); ?></h5>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_rendering_mode"><?php _e('Invoice Type', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <select id="mec_settings_rendering_mode" name="mec[settings][mec_invoice_rendering_mode]">
                        <option value="ticket" <?php if (isset($settings['mec_invoice_rendering_mode']) and 'ticket' == $settings['mec_invoice_rendering_mode']) echo 'selected="selected"'; ?>><?php _e('Ticket', 'mec-invoice'); ?></option>
                        <option value="full" <?php if (isset($settings['mec_invoice_rendering_mode']) and 'full' == $settings['mec_invoice_rendering_mode']) echo 'selected="selected"'; ?>><?php _e('Modern', 'mec-invoice'); ?></option>
                    </select>
                </div>
            </div>
            <div class="mec-form-row" id="show_invoice_time">
                <label class="mec-col-4">
                    <input type="hidden" name="mec[settings][mec_invoice_show_time_in_modern_type]" value="0" />
                    <input type="checkbox" value="on" value="<?php echo @$settings['mec_invoice_show_time_in_modern_type']; ?>" name="mec[settings][mec_invoice_show_time_in_modern_type]" <?php echo ((isset($settings['mec_invoice_show_time_in_modern_type']) and trim($settings['mec_invoice_show_time_in_modern_type']) != '' and $settings['mec_invoice_show_time_in_modern_type'] == 'on') ? 'checked="checked"' : ''); ?> />
                    <?php _e('Show invoice time in modern style', 'mec-invoice'); ?>
                    <span class="mec-tooltip">
                        <div class="box">
                            <h5 class="title"><?php _e('MEC Booking Notifications', 'mec-invoice') ?></h5>
                            <div class="content">
                                <p>
                                    <?php echo __("Display invoice time (minuets and hours) in modern style", 'mec-invoice'); ?>
                                </p>
                            </div>
                        </div>
                        <i title="" class="dashicons-before dashicons-editor-help"></i>
                    </span>
                </label>
            </div>
            <div class="mec-form-row" id="mec_settings_tickets_date_format">
                <label class="mec-col-3" for="mec_settings_tickets_date_format"><?php _e('Date Format (Tickets)', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_tickets_date_format" placeholder="M j, Y" name="mec[settings][tickets_date_format]" value="<?php echo ((isset($settings['tickets_date_format']) and trim($settings['tickets_date_format']) != '') ? stripslashes(htmlentities($settings['tickets_date_format'])) : ''); ?>" />
                </div>
                <p class="description"><?php echo __('Exam: M j, Y'); ?></p>
            </div>
            <div class="mec-form-row" id="mec_settings_tickets_time_format">
                <label class="mec-col-3" for="mec_settings_tickets_time_format"><?php _e('Time Format (Tickets)', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_tickets_time_format" placeholder="h:i A" name="mec[settings][tickets_time_format]" value="<?php echo ((isset($settings['tickets_time_format']) and trim($settings['tickets_time_format']) != '') ? stripslashes(htmlentities($settings['tickets_time_format'])) : ''); ?>" />
                </div>
                <p class="description"><?php echo __('Exam: h:i A'); ?></p>
            </div>
            <div class="mec-form-row" id="mec_settings_invoice_date_format">
                <label class="mec-col-3" for="mec_settings_invoice_date_format"><?php _e('Default Date Format', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_invoice_date_format" placeholder="M j, Y" name="mec[settings][invoice_date_format]" value="<?php echo ((isset($settings['invoice_date_format']) and trim($settings['invoice_date_format']) != '') ? stripslashes(htmlentities($settings['invoice_date_format'])) : ''); ?>" />
                </div>
                <p class="description"><?php echo __('Exam: M j, Y'); ?></p>
            </div>
            <div class="mec-form-row" id="mec_settings_event_date_format">
                <label class="mec-col-3" for="mec_settings_event_date_format"><?php _e('Event Date Format', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <input type="text" id="mec_settings_event_date_format" placeholder="M j, Y" name="mec[settings][event_date_format]" value="<?php echo ((isset($settings['event_date_format']) and trim($settings['event_date_format']) != '') ? stripslashes(htmlentities($settings['event_date_format'])) : ''); ?>" />
                </div>
                <p class="description"><?php echo __('Exam: M j, Y'); ?></p>
            </div>

            <div class="mec-form-row" id="mec_invoice_descriptions_wrap">
                <label class="mec-col-12" for="mec_invoice_descriptions">
                    <?php _e('Invoice Descriptions', 'mec-invoice'); ?>
                    <span class="mec-tooltip">
                        <div class="box">
                            <h5 class="title"><?php _e('Invoice Descriptions', 'mec-invoice') ?></h5>
                            <div class="content">
                                <p><?php _e('This description is displayed in every invoice. For example, Be at the location at least one hour before the event begins.', 'mec-invoice') ?></p>
                            </div>
                        </div>
                        <i title="" class="dashicons-before dashicons-editor-help"></i>
                    </span>
                </label>
                <div class="clear"></div>
                <?php
                $content = isset($settings['mec_invoice_descriptions']) ? html_entity_decode(stripslashes($settings['mec_invoice_descriptions'])) : '';
                $_settings = [
                    'textarea_name' => 'mec[settings][mec_invoice_descriptions]',
                    'editor_height' => 300
                ];
                \wp_editor($content, 'mec_invoice_descriptions', $_settings);
                ?>
            </div>

            <h5 class="mec-form-subtitle"><?php _e('Custom Css', 'mec-invoice'); ?></h5>
            <div class="mec-form-row">
                <label class="mec-col-12" for="mec_invoice_custom_styles">
                    <?php _e('Invoice Custom Styles', 'mec-invoice'); ?>
                </label>
                <div class="clear"></div>
                <?php
                $content = isset($settings['mec_invoice_custom_styles']) ? html_entity_decode(stripslashes($settings['mec_invoice_custom_styles'])) : '';
                echo '<textarea id="mec-invoice-custom-css" name="mec[settings][mec_invoice_custom_styles]">' . esc_textarea($content) . '</textarea>';
                ?>
            </div>
            <h5 class="mec-form-subtitle"><?php _e('Generate Invoice for Old Bookings', 'mec-invoice'); ?></h5>
            <div class="mec-form-row">
                <label class="mec-col-3" for="mec_settings_import"><?php _e('Import Invoices from Bookings', 'mec-invoice'); ?></label>
                <div class="mec-col-4">
                    <a href="#" class="dpr-btn dpr-import-btn mec-invoice-import-button"><?php _e('Import', 'mec-invoice'); ?></a>
                </div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function() {
                if (jQuery('#mec_invoice_use_checkbox').prop('checked') === true) {
                    jQuery('#mec_invoice_use_form').show();
                } else {
                    jQuery('#mec_invoice_use_form').hide();
                }

                jQuery('#mec_invoice_use_checkbox').on('input', function() {
                    if (jQuery(this).prop('checked') === true) {
                        jQuery('#mec_invoice_use_form').show();
                    } else {
                        jQuery('#mec_invoice_use_form').hide();
                    }
                });

                if (jQuery('#mec_settings_rendering_mode').val() == 'full') {
                    jQuery('#mec_settings_tickets_date_format').css('display', 'none');
                    jQuery('#mec_settings_tickets_time_format').css('display', 'none');
                    jQuery('#show_invoice_description_in_pdf').css('display', 'block');
                    jQuery('#mec_invoice_descriptions_wrap').css('display', 'block');
                    jQuery('.mec_booking_notifications').css('display', 'block');
                    jQuery('#show_invoice_time').css('display', 'block');
                } else {
                    jQuery('#mec_settings_tickets_date_format').css('display', 'block');
                    jQuery('#mec_settings_tickets_time_format').css('display', 'block');
                    jQuery('#show_invoice_description_in_pdf').css('display', 'none');
                    jQuery('#mec_invoice_descriptions_wrap').css('display', 'none');
                    jQuery('.mec_booking_notifications').css('display', 'none');
                    jQuery('#show_invoice_time').css('display', 'none');
                }
                jQuery('#mec_settings_rendering_mode').on('change', function() {
                    if (jQuery(this).val() == 'full') {
                        jQuery('#mec_settings_tickets_date_format').css('display', 'none');
                        jQuery('#mec_settings_tickets_time_format').css('display', 'none');
                        jQuery('#show_invoice_description_in_pdf').css('display', 'block');
                        jQuery('#mec_invoice_descriptions_wrap').css('display', 'block');
                        jQuery('.mec_booking_notifications').css('display', 'block');
                        jQuery('#show_invoice_time').css('display', 'block');
                    } else {
                        jQuery('#mec_settings_tickets_date_format').css('display', 'block');
                        jQuery('#mec_settings_tickets_time_format').css('display', 'block');
                        jQuery('#show_invoice_description_in_pdf').css('display', 'none');
                        jQuery('#mec_invoice_descriptions_wrap').css('display', 'none');
                        jQuery('.mec_booking_notifications').css('display', 'none');
                        jQuery('#show_invoice_time').css('display', 'none');
                    }
                });

                jQuery('.mec-invoice-import-button').on('click', function(e) {
                    var $this = jQuery(this);
                    $this.css('opacity', '0.5');
                    $this.css('pointer-events', 'none');

                    jQuery.ajax({
                        type: "post",
                        url: ajaxurl,
                        data: {
                            action: 'mec_invoice_import_old_invoices'
                        },
                        success: function(response) {
                            alert(response);
                            $this.css('opacity', '1');
                            $this.css('pointer-events', 'auto');
                        }
                    });

                    e.preventDefault();
                    return false;
                })
            })

            jQuery(document).ready(function($) {
                var companyLogoSelector;
                $('.select-company-logo').click(function(e) {
                    e.preventDefault();
                    if (companyLogoSelector) {
                        companyLogoSelector.open();
                        return;
                    }

                    companyLogoSelector = wp.media.frames.file_frame = wp.media({
                        title: '<?php echo __('Select Logo', 'mec-invoice') ?>',
                        button: {
                            text: 'Select'
                        },
                        multiple: false
                    });

                    companyLogoSelector.on('select', function() {
                        var attachments = companyLogoSelector.state().get('selection').map(
                            function(attachment) {
                                attachment.toJSON();
                                return attachment;
                            }
                        );
                        var i;

                        jQuery('#mec_settings_logo').val(attachments[0].attributes.url);
                    });
                    companyLogoSelector.open();
                });
            });
            jQuery("#mec_settings_form").on('submit', function(event) {
                event.preventDefault();
                jQuery('.CodeMirror-code').click;
                jQuery("#mec_invoice_descriptions-html").click();
                jQuery("#mec_invoice_descriptions-tmce").click();
            });
            // jQuery(document).ready(function($) {
            //     wp.codeEditor.initialize($('#mec-invoice-custom-css'), cm_settings);
            //     setTimeout(() => {
            //         jQuery('.CodeMirror-code').trigger('click');
            //     }, 1000);
            // })
        </script>
<?php
    }

    /**
     *  Init
     *
     *  @since     1.0.0
     */
    public function init()
    {
        if (!class_exists('\MEC_Invoice\Autoloader')) {
            return;
        }
    }
} //Controller
