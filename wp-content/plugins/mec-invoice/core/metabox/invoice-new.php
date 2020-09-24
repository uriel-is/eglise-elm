<?php

namespace MEC_Invoice\Core\MetaBox;

// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
 ** InvoiceNew.
 **
 ** @author      Webnus <info@webnus.biz>
 ** @package     Modern Events Calendar
 ** @since       1.0.0
 **/
class InvoiceNew
{
    /*
     **  Instance of this class.
     **
     **  @since   1.0.0
     **  @access  public
     **  @var     MEC_Invoice
     */
    public static $instance;

    /*
     **  The directory of this file
     **
     **  @access  public
     **  @var     string
     */
    public static $dir;

    /*
     **  Provides access to a single instance of a module using the Singleton pattern.
     **
     **  @since   1.0.0
     **  @return  object
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
        self::settingUp($this);
        self::setHooks();
    }

    /*
     **  Set Hooks.
     **
     **  @since   1.0.0
     */
    public static function setHooks()
    {
        add_action('admin_init', [self::$instance, 'metaBoxInit']);
        add_action('save_post', [self::$instance, 'save_invoice']);
        add_action('wp_ajax_mec_invoice_bbf_date_tickets_booking_form', [self::$instance, 'bbf_date_tickets_booking_form']);
    }



    /*
     **  Global Variables.
     **
     **  @since   1.0.0
     */
    public static function settingUp()
    {
        self::$dir  = MECINVOICEDIR . 'core' . DS . 'metabox';
    }

    /*
     **  Meta Box Init.
     **
     **  @since   1.0.0
     */
    public static function metaBoxInit()
    {
        if (!is_admin()) {
            return;
        }

        if (isset($_GET['post_type']) && $_GET['post_type'] == 'mec_invoice' && !isset($_GET['post'])) {
            add_meta_box('mec_invoice_wizard', 'New MEC Invoice', [self::$instance, 'render_meta_box'], 'mec_invoice', 'normal');
        }
    }

    /*
     **  Render Meta Box
     **
     **  @since     1.0.0
     */
    public function render_meta_box($post)
    {
        $main = \MEC::getInstance('app.libraries.main');

        $settings = $main->get_settings();

        if (!isset($settings['booking_status']) || !$settings['booking_status']) {
?>
            <style>
                #postbox-container-1,
                #minor-publishing {
                    display: none;
                }
            </style>
            <div class="warning-msg"><?php _e('Booking System is disabled. To add invoices, please enable this option from MEC Settings.', 'mec-invoice'); ?></div>
            <script>
                jQuery(document).ready(function() {
                    jQuery('#publishing-action input').attr('disabled', 'disabled');
                });
            </script>

        <?php
            wp_delete_post($post->ID, true);
            return;
        }
        $meta = $main->get_post_meta($post->ID);
        $event_id = (isset($meta['mec_event_id']) and $meta['mec_event_id']) ? $meta['mec_event_id'] : 0;

        // The booking is saved so we will skip this form and show booking info instead.
        if ($event_id) return false;

        // Events
        $events = $main->get_events();

        ?>
        <div class="info-msg"><?php _e('It will create a new booking and invoice under "Pay Locally" gateway.', 'mec-invoice'); ?></div>
        <div class="mec-book-form">
            <h3><?php _e('Invoice', 'mec-invoice'); ?></h3>
            <?php wp_nonce_field('mec_invoice_data', 'mec_invoice_nonce'); ?>
            <div class="mec-form-row">
                <div class="mec-col-2">
                    <label for="mec_book_form_invoice_id"><?php _e('Invoice Number', 'mec-invoice'); ?></label>
                </div>
                <div class="mec-col-6">
                    <input type="text" id="mec_book_form_invoice_id" class="widefat" name="mec_invoice_number" value="<?php echo \MEC_Invoice\Helper\Invoice::create_invoice_number(); ?>">
                </div>
            </div>
            <div class="mec-form-row">
                <div class="mec-col-2">
                    <label for="mec_book_form_event_id"><?php _e('Event', 'mec-invoice'); ?></label>
                </div>
                <div class="mec-col-6">
                    <select id="mec_book_form_event_id" class="widefat" name="mec_event_id">
                        <option value="">-----</option>
                        <?php foreach ($events as $event) : ?>
                            <option value="<?php echo $event->ID; ?>"><?php echo $event->post_title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div id="mec_date_tickets_booking_form_container">
            </div>
            <input type="hidden" name="mec_invoice_is_new_invoice" value="1" />
        </div>
        <script type="text/javascript">
            var MECInvoiceAttendeesCounter = 0;
            jQuery(document).ready(function($) {
                jQuery('#mec_book_form_event_id').on('change', function() {
                    var event_id = this.value;
                    jQuery.ajax({
                        url: "<?php echo admin_url('admin-ajax.php', NULL); ?>",
                        data: "action=mec_invoice_bbf_date_tickets_booking_form&event_id=" + event_id,
                        dataType: "json",
                        type: "GET",
                        success: function(response) {
                            jQuery('#mec_date_tickets_booking_form_container').html(response.output);
                        },
                        error: function() {
                            jQuery('#mec_date_tickets_booking_form_container').html('');
                        }
                    });
                });

                jQuery(document).on('click', '.mec-invoice-add-new-attendee', function() {
                    var ClonedItem = $(this).siblings('.mec-invoice-attendee').first().clone().append('<div class="mec-invoice-remove-attendee"><?php echo esc_attr__('Remove', 'mec-invoice'); ?></div>');
                    MECInvoiceAttendeesCounter = MECInvoiceAttendeesCounter + 1;
                    ClonedItem.html(ClonedItem.html().replace(/Counter/g, 'Counter' + MECInvoiceAttendeesCounter));
                    $(this).siblings('.mec-invoice-attendee').last().after(ClonedItem);
                })
                jQuery(document).on('click', '.mec-invoice-remove-attendee', function() {
                    $(this).parent().slideUp(500);
                    setTimeout(() => {
                        $(this).parent().remove();
                    }, 1001);
                })
            });
        </script>
<?php
    }

    /*
         **  Ajax Action to process selected Event for booking
         **
         **  @since     1.0.0
         */
    public function bbf_date_tickets_booking_form()
    {
        $main = \MEC::getInstance('app.libraries.main');
        $settings = $main->get_settings();
        $book = \MEC::getInstance('app.libraries.book');
        $render = \MEC::getInstance('app.libraries.render');
        $event_id = isset($_REQUEST['event_id']) ? sanitize_text_field($_REQUEST['event_id']) : '';

        // Event is invalid!
        if (!trim($event_id)) $main->response(array('success' => 0, 'output' => '<div class="warning-msg">' . __('Event is invalid. Please select an event.', 'mec-invoice') . '</div>'));

        $tickets = get_post_meta($event_id, 'mec_tickets', true);
        // Invalid Event, Tickets or Dates
        if (!is_array($tickets) or (is_array($tickets) and !count($tickets))) $main->response(array('success' => 0, 'output' => '<div class="warning-msg">' . __('No ticket or future dates found for this event! Please try another event.', 'mec-invoice') . '</div>'));

        // Date Option
        $date_options = '';
        $date_format = (isset($settings['booking_date_format1']) and trim($settings['booking_date_format1'])) ? $settings['booking_date_format1'] : 'Y-m-d g:i a';

        $repeat_type = get_post_meta($event_id, 'mec_repeat_type', true);
        if ($repeat_type === 'custom_days') $date_format .= ' ' . get_option('time_format');

        $dates = $render->dates($event_id, NULL, 10);
        $date_options = '';
        foreach ($dates as $date) $date_options .= '<option value="' . $book->timestamp($date['start'], $date['end']) . '">' . strip_tags($main->date_label($date['start'], $date['end'], $date_format)) . '</option>';

        $output = '<div class="mec-form-row"><div class="mec-col-2"><label for="mec_book_form_date">' . __('Date', 'mec-invoice') . '</label></div>';
        $output .= '<div class="mec-col-6"><select class="widefat" name="mec_date" id="mec_book_form_date">' . $date_options . '</select></div></div>';
        // Ticket option
        $ticket_options = '';
        foreach ($tickets as $ticket_id => $ticket) $ticket_options .= '<option value="' . $ticket_id . '">' . $ticket['name'] . '</option>';

        $output .= '<div class="mec-form-row"><div class="mec-col-2"><label for="mec_book_form_ticket_id">' . __('Ticket', 'mec-invoice') . '</label></div>';
        $output .= '<div class="mec-col-6"><select class="widefat" name="mec_ticket_id" id="mec_book_form_ticket_id">' . $ticket_options . '</select></div></div>';

        // Booking Form
        $reg_fields = $main->get_reg_fields($event_id);

        $mec_email = false;
        $mec_name = false;
        foreach ($reg_fields as $field) {
            if (isset($field['type'])) {
                if ($field['type'] == 'mec_email') $mec_email = true;
                if ($field['type'] == 'name') $mec_name = true;
            }
        }

        if (!$mec_name) {
            $reg_fields[] = array(
                'mandatory' => '0',
                'type'      => 'name',
                'label'     => esc_html__('Name', 'mec-invoice'),
            );
        }

        if (!$mec_email) {
            $reg_fields[] = array(
                'mandatory' => '0',
                'type'      => 'mec_email',
                'label'     => esc_html__('Email', 'mec-invoice'),
            );
        }

        $booking_form_options = '<div class="mec-invoice-attendee">';

        if (count($reg_fields)) {
            foreach ($reg_fields as $reg_field_id => $reg_field) {
                if (!is_numeric($reg_field_id) or !isset($reg_field['type'])) continue;

                $booking_form_options .= '<div class="mec-form-row">';

                if (isset($reg_field['label']) and $reg_field['type'] != 'agreement') $booking_form_options .= '<div class="mec-col-2"><label for="mec_book_reg_field_reg' . $reg_field_id . '">' . __($reg_field['label'], 'mec-invoice') . '</label></div>';
                elseif (isset($reg_field['label']) and $reg_field['type'] == 'agreement') $booking_form_options .= '<div class="mec-col-2"></div>';

                $booking_form_options .= '<div class="mec-col-6">';
                $mandatory = (isset($reg_field['mandatory']) and $reg_field['mandatory']) ? true : false;

                if ($reg_field['type'] == 'name') {
                    $booking_form_options .= '<input class="widefat" id="mec_book_reg_field_reg' . $reg_field_id . '" type="text" name="mec_attendee[Counter][name]" value="" placeholder="' . __('Name', 'mec-invoice') . '" required="required" />';
                } elseif ($reg_field['type'] == 'mec_email') {
                    $booking_form_options .= '<input class="widefat" id="mec_book_reg_field_reg' . $reg_field_id . '" type="email" name="mec_attendee[Counter][email]" value="" placeholder="' . __('Email', 'mec-invoice') . '" required="required" />';
                } elseif ($reg_field['type'] == 'text') {
                    $booking_form_options .= '<input class="widefat" id="mec_book_reg_field_reg' . $reg_field_id . '" type="text" name="mec_attendee[Counter][reg][' . $reg_field_id . ']" value="" placeholder="' . __($reg_field['label'], 'mec-invoice') . '" ' . ($mandatory ? 'required="required"' : '') . ' />';
                } elseif ($reg_field['type'] == 'date') {
                    $booking_form_options .= '<input class="widefat" id="mec_book_reg_field_reg' . $reg_field_id . '" type="date" name="mec_attendee[Counter][reg][' . $reg_field_id . ']" value="" placeholder="' . __($reg_field['label'], 'mec-invoice') . '" ' . ($mandatory ? 'required="required"' : '') . ' min="1970-01-01" max="2099-12-31" />';
                } elseif ($reg_field['type'] == 'email') {
                    $booking_form_options .= '<input class="widefat" id="mec_book_reg_field_reg' . $reg_field_id . '" type="email" name="mec_attendee[Counter][reg][' . $reg_field_id . ']" value="" placeholder="' . __($reg_field['label'], 'mec-invoice') . '" ' . ($mandatory ? 'required="required"' : '') . ' />';
                } elseif ($reg_field['type'] == 'tel') {
                    $booking_form_options .= '<input class="widefat" oninput="this.value=this.value.replace(/(?![0-9])./gmi,"")" id="mec_book_reg_field_reg' . $reg_field_id . '" type="tel" name="mec_attendee[Counter][reg][' . $reg_field_id . ']" value="" placeholder="' . __($reg_field['label'], 'mec-invoice') . '" ' . ($mandatory ? 'required="required"' : '') . ' />';
                } elseif ($reg_field['type'] == 'textarea') {
                    $booking_form_options .= '<textarea class="widefat" id="mec_book_reg_field_reg' . $reg_field_id . '" name="mec_attendee[Counter][reg][' . $reg_field_id . ']" placeholder="' . __($reg_field['label'], 'mec-invoice') . '" ' . ($mandatory ? 'required="required"' : '') . '></textarea>';
                } elseif ($reg_field['type'] == 'p') {
                    $booking_form_options .= '<p>' . __($reg_field['content'], 'mec-invoice') . '</p>';
                } elseif ($reg_field['type'] == 'select') {
                    $booking_form_options .= '<select class="widefat" id="mec_book_reg_field_reg' . $reg_field_id . '" name="mec_attendee[Counter][reg][' . $reg_field_id . ']" placeholder="' . __($reg_field['label'], 'mec-invoice') . '" ' . ($mandatory ? 'required="required"' : '') . '>';
                    foreach ($reg_field['options'] as $reg_field_option) $booking_form_options .= '<option value="' . esc_attr__($reg_field_option['label'], 'mec-invoice') . '">' . __($reg_field_option['label'], 'mec-invoice') . '</option>';
                    $booking_form_options .= '</select>';
                } elseif ($reg_field['type'] == 'radio') {
                    foreach ($reg_field['options'] as $reg_field_option) {
                        $booking_form_options .= '<label for="mec_book_reg_field_reg' . $reg_field_id . '_' . strtolower(str_replace(' ', '_', $reg_field_option['label'])) . '">
                            <input type="radio" id="mec_book_reg_field_reg' . $reg_field_id . '_' . strtolower(str_replace(' ', '_', $reg_field_option['label'])) . '" name="mec_attendee[Counter][reg][' . $reg_field_id . ']" value="' . __($reg_field_option['label'], 'mec-invoice') . '" />
                            ' . __($reg_field_option['label'], 'mec-invoice') . '
                        </label>';
                    }
                } elseif ($reg_field['type'] == 'checkbox') {
                    foreach ($reg_field['options'] as $reg_field_option) {
                        $booking_form_options .= '<label for="mec_book_reg_field_reg' . $reg_field_id . '_' . strtolower(str_replace(' ', '_', $reg_field_option['label'])) . '">
                            <input type="checkbox" id="mec_book_reg_field_reg' . $reg_field_id . '_' . strtolower(str_replace(' ', '_', $reg_field_option['label'])) . '" name="mec_attendee[Counter][reg][' . $reg_field_id . ']" value="' . __($reg_field_option['label'], 'mec-invoice') . '" />
                            ' . __($reg_field_option['label'], 'mec-invoice') . '
                        </label>';
                    }
                } elseif ($reg_field['type'] == 'agreement') {
                    $booking_form_options .= '<label for="mec_book_reg_field_reg' . $reg_field_id . '">
                        <input type="checkbox" id="mec_book_reg_field_reg' . $reg_field_id . '" name="mec_attendee[Counter][reg][' . $reg_field_id . ']" value="1" ' . ((!isset($reg_field['status']) or (isset($reg_field['status']) and $reg_field['status'] == 'checked')) ? 'checked="checked"' : '') . ' ' . ($mandatory ? 'required="required"' : '') . ' />
                        ' . sprintf(__($reg_field['label'], 'mec-invoice'), '<a href="' . get_the_permalink($reg_field['page']) . '" target="_blank">' . get_the_title($reg_field['page']) . '</a>') . '
                    </label>';
                }
                $booking_form_options .= '</div>';
                $booking_form_options .= '</div>';
            }
        }

        // $booking_form_options .= '<div class="mec-invoice-remove-attendee">' . esc_attr__('Remove', 'mec-invoice') . '</div>';
        $booking_form_options .= '</div>';
        $booking_form_options .= '<div class="mec-invoice-add-new-attendee">' . esc_attr__('ADD Attendee', 'mec-invoice') . '</div>';
        $output .= '<h3>' . __('Attendees Information', 'mec-invoice') . '</h3>';
        $output .= $booking_form_options;

        $main->response(array('success' => 1, 'output' => $output));
    }

    /*
    **  Save New Invoice
    **
    **  @since     1.0.0
    */
    public function save_invoice($ID)
    {
        // Check if our nonce is set.
        if (!isset($_POST['mec_invoice_nonce'])) return;

        $main = \MEC::getInstance('app.libraries.main');
        $settings = $main->get_settings();
        if (!isset($settings['booking_status']) || !$settings['booking_status']) {
            wp_delete_post($ID, true);
            return;
        }

        // Verify that the nonce is valid.
        if (!wp_verify_nonce(sanitize_text_field($_POST['mec_invoice_nonce']), 'mec_invoice_data')) return;

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') and DOING_AUTOSAVE) return;

        $is_new_invoice = isset($_POST['mec_invoice_is_new_invoice']) ? sanitize_text_field($_POST['mec_invoice_is_new_invoice']) : 0;

        if ($is_new_invoice) {
            // Initialize Pay Locally Gateway to handle the booking
            $gateway = new \MEC_gateway_pay_locally();

            // Register Attendee
            $attendee = isset($_POST['mec_attendee']) ? $_POST['mec_attendee']['Counter'] : array();
            $user_id = $gateway->register_user($attendee);

            $attention_date = isset($_POST['mec_date']) ? sanitize_text_field($_POST['mec_date']) : '';
            $attention_times = explode(':', $attention_date);
            $date = date('Y-m-d H:i:s', trim($attention_times[0]));

            $name = isset($attendee['name']) ? $attendee['name'] : '';
            $ticket_id = isset($_POST['mec_ticket_id']) ? sanitize_text_field($_POST['mec_ticket_id']) : '';
            $event_id = isset($_POST['mec_event_id']) ? sanitize_text_field($_POST['mec_event_id']) : '';
            $tickets = [];
            // foreach ($_POST['mec_attendee'] as $at) {
            //     $tickets[] = array_merge($at, array('id' => $ticket_id, 'count' => 1, 'variations' => array(), 'reg' => (isset($at['reg']) ? $at['reg'] : array())));
            // }
            $attendees_count = (int) (isset($_POST['mec_attendee']) ? count($_POST['mec_attendee']) : 1);
            if ($attendees_count < 1) $attendees_count = 1;

            foreach ($_POST['mec_attendee'] as $at) {
                $tickets[] = array_merge($at, array('id' => $ticket_id, 'count' => 1, 'variations' => array(), 'reg' => (isset($at['reg']) ? $at['reg'] : array())));
            }

            $raw_tickets = array($ticket_id => $attendees_count);
            $event_tickets = get_post_meta($event_id, 'mec_tickets', true);

            $transaction = array();
            $transaction['tickets'] = $tickets;
            $transaction['date'] = $attention_date;
            $transaction['event_id'] = $event_id;

            $book = \MEC::getInstance('app.libraries.book');
            // Calculate price of bookings
            $price_details = $book->get_price_details($raw_tickets, $event_id, $event_tickets, array());

            $transaction['price_details'] = $price_details;
            $transaction['total'] = $price_details['total'];
            $transaction['discount'] = 0;
            $transaction['price'] = $price_details['total'];
            $transaction['coupon'] = NULL;

            // Save The Transaction
            $transaction_id = $book->temporary($transaction);

            // In order to don't create infinitive loop!
            remove_action('save_post', array($this, 'save_invoice'), 10);

            $attendees = isset($transaction['tickets']) ? $transaction['tickets'] : array();
            $ticket_ids = '';
            $attendees_info = array();

            foreach ($attendees as $attendee) {
                $ticket_ids .= $attendee['id'] . ',';
                if (!array_key_exists($attendee['email'], $attendees_info)) $attendees_info[$attendee['email']] = array('count' => $attendee['count']);
                else $attendees_info[$attendee['email']]['count'] = ($attendees_info[$attendee['email']]['count'] + $attendee['count']);
            }

            $book_id = $book->add(array(
                'post_author' => $user_id,
                'post_type' => 'mec-books',
                'post_title' =>  __('Custom Invoice', 'mec-invoice') . ' - ' . $name,
                'post_date' => $date
            ), $transaction_id, ',' . $ticket_ids);

            update_post_meta($book_id, 'mec_attendees', $tickets);
            update_post_meta($book_id, 'mec_reg', (isset($attendee['reg']) ? $attendee['reg'] : array()));
            update_post_meta($book_id, 'mec_gateway', 'MEC_gateway_pay_locally');
            update_post_meta($book_id, 'mec_gateway_label', $gateway->label());

            // For Booking Badge
            update_post_meta($book_id, 'mec_book_date_submit', date('YmdHis', current_time('timestamp', 0)));

            // Fires after completely creating a new booking
            // do_action('mec_booking_completed', $book_id);

        }

        $new_confirmation = isset($_POST['confirmation']) ? sanitize_text_field($_POST['confirmation']) : NULL;
        $new_verification = isset($_POST['verification']) ? sanitize_text_field($_POST['verification']) : NULL;

        $confirmed = get_post_meta($book_id, 'mec_confirmed', true);
        $verified = get_post_meta($book_id, 'mec_verified', true);

        // Change Confirmation Status
        if (!is_null($new_confirmation) and $new_confirmation != $confirmed) {
            switch ($new_confirmation) {
                case '1':
                    $book->confirm($book_id);
                    break;
                case '-1':
                    $book->reject($book_id);
                    break;
                default:
                    $book->pending($book_id);
                    break;
            }
        }

        // Change Verification Status
        if (!is_null($new_verification) and $new_verification != $verified) {
            switch ($new_verification) {
                case '1':
                    $book->verify($book_id);
                    break;
                case '-1':
                    $book->cancel($book_id);
                    break;
                default:
                    $book->waiting($book_id);
                    break;
            }
        }

        $price      = get_post_meta($book_id, 'mec_price', true);
        $event_id   = get_post_meta($book_id, 'mec_event_id', true);
        $confirmed  = get_post_meta($book_id, 'mec_confirmed', true);
        $IID = sha1(microtime());
        $doCheckinHash = sha1(md5(microtime()));
        $invoiceNumber = esc_attr($_POST['mec_invoice_number']);
        if(!$invoiceNumber) {
            $invoiceNumber = \MEC_Invoice\Helper\Invoice::create_invoice_number($ID);
        } else {
            update_post_meta($ID, 'invoice_number', $invoiceNumber);
        }

        wp_update_post([
            'ID'           => $ID,
            'post_title'    => 'Custom Invoice #' . $invoiceNumber,
            'meta_input'    => array(
                'invoiceID'       => $IID,
                'CheckinHash'       => $doCheckinHash,
                'book_id'       => $book_id,
                'transaction_id' => get_post_meta($book_id, 'mec_transaction_id', true),
                'price'         => $price,
                'date'          => current_time('timestamp'),
                'confirmed'     => $confirmed,
                'status'        => 'open',
                'event_id'      => $event_id,
            ),
        ]);

        do_action('mec-invoice-new-invoice-added', $ID);
        echo '<body style="background-color:#F1F1F1">';
        echo '<a href="' . get_edit_post_link($ID) . '" id="invoice_link" style="position: fixed;left: 0;top: calc(50% - 30px);height: 60px;text-align: center;width: 100%;font-size: 50px;color: #0073aa;transition-property: border,background,color;transition-duration: .05s;transition-timing-function: ease-in-out;">' . __('Manage Invoice', 'mec-invoice') . ' #' . $ID . '</a>';
        echo '</body>';
        echo '<script>
        var element = document.getElementById("invoice_link");
        element.click();
        </script>';
        die();
    }
} //InvoiceNew
