<?php

namespace MEC_Invoice\Core\MetaBox;

// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
 ** Dashboard.
 **
 ** @author      Webnus <info@webnus.biz>
 ** @package     Modern Events Calendar
 ** @since       1.0.0
 **/
class Dashboard
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
        add_action('wp_dashboard_setup', [self::$instance, 'metaBoxInit']);
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

        wp_add_dashboard_widget('mec_invoice_dashboard', __('Ticket and Invoice sales summary', 'mec-invoice'), array(self::$instance, 'render_meta_box'));
    }

    /*
     **  Render Meta Box
     **
     **  @since     1.0.0
     */
    public function render_meta_box()
    {
        include MECINVOICEDIR . '/templates/dashboard-metabox.tpl';

    }

    /*
    **  Ajax Action to process selected Event for booking
    **
    **  @since     1.0.0
    */
    public function bbf_date_tickets_booking_form()
    {
        $main = \MEC::getInstance('app.libraries.main');
        $event_id = isset($_REQUEST['event_id']) ? sanitize_text_field($_REQUEST['event_id']) : '';

        // Event is invalid!
        if (!trim($event_id)) $main->response(array('success' => 0, 'output' => '<div class="warning-msg">' . __('Event is invalid. Please select an event.', 'mec-invoice') . '</div>'));

        $tickets = get_post_meta($event_id, 'mec_tickets', true);

        $render = \MEC::getInstance('app.libraries.render');
        $dates = $render->dates($event_id, NULL, 10);

        // Invalid Event, Tickets or Dates
        if (!is_array($tickets) or (is_array($tickets) and !count($tickets))) $main->response(array('success' => 0, 'output' => '<div class="warning-msg">' . __('No ticket or future dates found for this event! Please try another event.', 'mec-invoice') . '</div>'));

        // Date Option
        $date_options = '';
        foreach ($dates as $date) $date_options .= '<option value="' . $date['start']['date'] . ':' . $date['end']['date'] . '">' . $date['start']['date'] . ' - ' . $date['end']['date'] . '</option>';

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
                'label'     => __('Email', 'mec-invoice'),
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

} //Dashboard
