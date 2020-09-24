<?php

namespace MEC_Invoice;

use dawood\phpChrome\Chrome;
// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
*  MEC Invoice Notifications.
*
*  @author      Webnus <info@webnus.biz>
*  @package     Modern Events Calendar
*  @since       1.0.0
*/
class Notifications
{
    /**
    * Instance of this class.
    *
    * @since   1.0.0
    * @access  public
    * @var     MEC_Invoice
    */
    public static $instance;

    /**
    * The directory of this file
    *
    * @access  public
    * @var     string
    */
    public static $dir;

    /**
    * The instance of MEC Main
    *
    * @access  public
    * @var     string
    */
    public static $main;

    /**
    * Provides access to a single instance of a module using the Singleton pattern.
    *
    * @since   1.0.0
    * @return  object
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
    }

    /**
    * Set Hooks.
    *
    * @since   1.0.0
    */
    public static function setHooks()
    {
        add_action('mec-invoice-new-invoice-added', [self::$instance, 'sendInvoiceNotification'], 10, 10);
        add_action('mec_booking_confirmed', [self::$instance, 'sendInvoiceNotificationWhenBookIsConfirmed'], 10, 10);
        add_filter('mec_booking_notification', [self::$instance, 'disableMECBookingNotifications'], 10, 10);
        add_filter('mec_booking_confirmation', [self::$instance, 'disableMECBookingNotifications'], 10, 10);
        add_filter('mec_booking_invoice_url', [self::$instance, 'setInvoiceUrl'], 10, 2);
    }


    /**
    * Global Variables.
    *
    * @since   1.0.0
    */
    public static function settingUp()
    {
        self::$dir  = MECINVOICEDIR . 'core' . DS . 'notifications';
    }

    /**
    * Set Invoice Url in Books page
    *
    * @since   1.0.0
    */
    public static function setInvoiceUrl($url, $transaction_id)
    {
        $book = \MEC::getInstance('app.libraries.book');
        $booking = $book->get_bookings_by_transaction_id($transaction_id);
        if($booking) {
            $invoiceID = get_post_meta($booking[0]->ID, 'invoiceID',true);

            $Hash = get_post_meta($invoiceID, 'invoiceID', true);
            $url = get_site_url(null, '?invoiceID=' . $invoiceID . '&downloadInvoice=' . $Hash);
        }
        return $url;
    }

    /**
    * Disable MEC Booking Notifications
    *
    * @since   1.0.0
    */
    public static function disableMECBookingNotifications($status)
    {
        if (\MEC_Invoice\Helper::getOption('mec_booking_notifications', false) == 'on') {
            return false;
        }

        return $status;
    }

    /**
    * Send Notification Too Customer When Booking is Confirmed
    *
    * @since     1.0.0
    */
    public function sendInvoiceNotificationWhenBookIsConfirmed($book_id) {
        $invoiceID = get_post_meta($book_id, 'invoiceID',true);
        if(!$invoiceID) {
            return;
        }

        $this->sendInvoiceNotification($invoiceID, true);
    }

    /**
    * Send Notification Too Customer
    *
    * @since     1.0.0
    */
    public function sendInvoiceNotification ($invoiceID, $manual = false) {
        remove_action('mec_booking_confirmed', 'sendInvoiceNotificationWhenBookIsConfirmed', 1);
        if ( !did_action('wp_loaded') && !$manual ) {
            add_action('wp_loaded', function() use ($invoiceID) {
                do_action('mec-invoice-new-invoice-added' , $invoiceID);
            });
        }
        $book_id = get_post_meta($invoiceID, 'book_id', true);
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        $transaction = get_option($transaction_id);

        if(!get_post_meta($book_id, 'mec_confirmed', true)) {
            return;
        }

        $transaction['first_for_all'] = isset($transaction['first_for_all']) ? $transaction['first_for_all'] : 1;

        if (\MEC_Invoice\Helper::getOption('mec_invoice_for_each_tickets', false) == 'on' && $transaction['first_for_all'] != '1') {
            $InvoiceContent = static::getInvoiceContent($invoiceID, 'invoice' , true);
            $content = $InvoiceContent->content;
            $emails = $InvoiceContent->emails;
            $post_author = $InvoiceContent->post_author;
            $Email = \MEC_Invoice\Email::instance();
            $from = \MEC_Invoice\Helper::getOption('booking_sender_email', get_option('admin_email'));
            $headers = [
                'MIME-Version' => 'MIME-Version: 1.0',
                'Content-type' => 'text/html; charset=UTF-8',
                'From' => \MEC_Invoice\Helper::getOption('booking_sender_name', get_bloginfo('name')) . ' <' . $from . '>',
                'Reply-To' => $from,
                'X-Mailer' => 'PHP/' . phpversion(),
            ];
            $event_id = get_post_meta($invoiceID, 'event_id', true);
            $eventName = get_the_title($event_id);
            $eventName = str_replace(['&#8211;', '–'] , '-', $eventName);
            foreach ($emails as $email) {
                $Email->to = $email;
                $Email->headers = $headers;
                $Email->html_content = $content[$email];
                $Email->subject = esc_attr__('Invoice', 'mec-invoice') . ' - ' . $eventName;
                $Email->send();
            }
        } else {
            $InvoiceContent = static::getInvoiceContent($invoiceID);
            $content = $InvoiceContent->content;
            $post_author = $InvoiceContent->post_author;
            $event_id = get_post_meta($invoiceID, 'event_id', true);
            $eventName = get_the_title($event_id);
            $eventName = str_replace(['&#8211;', '–'] , '-', $eventName);
            $Email = \MEC_Invoice\Email::instance();
            $from = \MEC_Invoice\Helper::getOption('booking_sender_email', get_option('admin_email'));
            $headers = [
                'MIME-Version' => 'MIME-Version: 1.0',
                'Content-type' => 'text/html; charset=UTF-8',
                'From' => \MEC_Invoice\Helper::getOption('booking_sender_name', get_bloginfo('name')) . ' <' . $from . '>',
                'Reply-To' => $from,
                'X-Mailer' => 'PHP/' . phpversion(),
            ];
            $Email->headers = $headers;
            $Email->to = get_the_author_meta('email', $post_author);
            $Email->html_content = $content;
            $Email->subject = esc_attr__('Invoice', 'mec-invoice') .' - ' . $eventName;
            $Email->send();
        }
    }

    /**
    * Get Cart Items
    *
    * @since     1.0.0
    */
    public static function getCartItems($invoiceID, $transaction, $attendee = false) {
        # Cart Items
        $CartItems = '';
        $tickets = get_post_meta($transaction['event_id'], 'mec_tickets', true);
        $emails = $prices = $ticketsHistory = [];
        $showALl = false;
        if(isset($_GET['showAll'])) {
            $showALl = true;
        }
        if (!isset($transaction['first_for_all'])) {
            $transaction['first_for_all'] = false;
        }

        foreach ($transaction['tickets'] as $key => $_ticket) {
            $key++;

            if (isset($_ticket['id'])) {
                if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1') {
                    $_ticket['count'] = count($transaction['tickets']);
                }
                $t = $tickets[$_ticket['id']];
                if (isset($t['dates']) && !empty($t['dates'])) {
                    $today = strtotime(date('Y-m-d', current_time('timestamp')));
                    foreach ($t['dates'] as $date) {
                        if ($today >= strtotime($date['start']) && $today <= strtotime($date['end'])) {
                            $t['price'] = $date['price'];
                        }
                    }
                }

                if (isset($_GET['attendee']) && $_GET['attendee'] != $_ticket['email'] && !$showALl) {
                    continue;
                }

                $_ticket['_name'] = $_ticket['name'];
                if ($t) {
                    $_ticket['name']  = $t['name'];
                    $_ticket['price'] = $t['price'];
                }
                if (!$_ticket['price']) {
                    $_ticket['price'] = 0;
                }


                if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1') {
                    if (isset($ticketsHistory[$_ticket['name']])) {
                        continue;
                    }
                }
                if ($attendee && $attendee != $_ticket['email']) {
                    continue;
                }

                $ticketCount = 0;
                foreach ($transaction['tickets'] as $__ticket) {
                    if (@$__ticket['id'] == @$_ticket['id']) {
                        $ticketCount++;
                    }
                }

                $ticketsHistory[$_ticket['name']] = true;

                $emails[$_ticket['email']] = $_ticket['email'];
                $__price = 0;
                $factory = \MEC::getInstance('app.libraries.factory');
                if (isset($_ticket['variations']) && !empty($_ticket['variations'])) :
                    $ticket_variations = $factory->main->ticket_variations($transaction['event_id']);
                endif;

                if (isset($transaction['first_for_all']) && $transaction['first_for_all'] != '1') {
                    $ticketCount = 1;
                }
                $CartItems .= '<tr style="border-bottom: 1px solid #e7e8e9;">
                    <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 20px 2px;">
                        ' . $_ticket['name'] . '
                    </td>
                    <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 20px 2px;">
                    ' . static::applyCurrency($_ticket['price']) . '
                    </td>
                    <td class="mec-invoice-item" style="text-align:center;color: #75787b; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 20px 2px;">
                        ' . $ticketCount . '
                    </td>
                    <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 20px 2px;">
                     ' .  static::applyCurrency(($_ticket['price'] *  $ticketCount) + $__price) . '
                    </td>
                </tr>';
                if(!isset($prices[$_ticket['email']])) {
                    $prices[$_ticket['email']] = 0;
                }
                $prices[$_ticket['email']] += (($_ticket['price'] *  $ticketCount) + $__price);

                if(!isset($_ticket['variations'])) {
                    $_ticket['variations'] = [];
                }

                foreach ($_ticket['variations'] as $tk => $v) {
                    if ($v) {
                        if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1') {
                            $v = $v *  $ticketCount;
                        }
                        $CartItems .= '<tr style="border-bottom: 1px solid #e7e8e9;">
                            <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 20px 2px;">
                            <img src="' . MECINVOICEASSETS . '/img/child.svg" class="child-variation" style="width:12px;margin-left:10px;">
                                ' . $ticket_variations[$tk]['title'] . '
                            </td>
                            <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 20px 2px;">
                            ' . static::applyCurrency($ticket_variations[$tk]['price']) . '
                            </td>
                            <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 20px 2px;text-align:center">
                                ' . $v . '
                            </td>
                            <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 20px 2px;">
                            ' . static::applyCurrency($ticket_variations[$tk]['price'] * $v) . '
                            </td>
                        </tr>';
                        if(!isset($prices[$_ticket['email']])) {
                            $prices[$_ticket['email']] = 0;
                        }
                        $prices[$_ticket['email']] += ($ticket_variations[$tk]['price'] * $v);
                    }
                }
            }
        } // End Cart Items

        return (object) [
            'emails' => $emails,
            'prices' => $prices,
            'CartItems' => $CartItems
        ];
    }
    /**
    * Get Attendees
    *
    * @since     1.0.0
    */
    public static function getAttendees ($invoiceID, $transaction, $attendee = false) {
        $attendees = '';
        $attCount = 0;
        $showALl = false;
        if(isset($_GET['showAll'])) {
            $showALl = true;
        }
        $Hash = get_post_meta($invoiceID, 'invoiceID', true);
        $tickets = get_post_meta($transaction['event_id'], 'mec_tickets', true);

        foreach ($transaction['tickets'] as $key => $_ticket) {
            $key++;
            if (isset($_ticket['id'])) {
                $_ticket['_name'] = $_ticket['name'];
                $t = $tickets[$_ticket['id']];
                if ($t) {
                    $_ticket['name']  = $t['name'];
                }

                if (isset($_GET['attendee']) && $_GET['attendee'] != $_ticket['email'] && !$showALl) {
                    continue;
                }
                if ($attendee && $attendee != $_ticket['email']) {
                    continue;
                }

				$attCount++;
                $transaction['date'] = \MEC_Invoice\Helper::get_date_label($transaction['date'], $transaction['event_id']);
                $attendees .= '
                <div class="mec-invoice-attendee" style="clear: both;">
                    <img class="attendee-profile" src="' . get_avatar_url($_ticket['email']) . '" />
                ';
                if (Attendee::doIHaveAccess() && Attendee::hasCheckedIn($invoiceID, $_ticket['email'], $key)) {
                    $attendees .= '<span style="font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; color: #fff; font-size: 11px; line-height: 15px; padding: 3px 8px; border-radius: 13px; background: #28bf15; margin-top: 2px; display: inline-block; letter-spacing: 0.5px;">Checked</span>';
                }

                $attendees .= '<img class="attendee-qr" alt="Attendee QRCode" src="' . get_site_url(null, '?invoiceID=' . $invoiceID . '&makeQRCode=' . $Hash . '&attendee=' . $_ticket['email']) . '&place=' . $key . '&Hash=' . $Hash . '" />
                    <div class="attendee-box" style="float: left;" >
                        <span class="mec-invoice-attendee-name" style="color: #000; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 14px; font-weight: 700; line-height: 24px; display: block;">
                            ' . $_ticket['_name'] . '
                        </span>
                        <span class="mec-invoice-attendee-email" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, \'Segoe UI\',Roboto, sans-serif; font-size: 13px; font-weight: 400; line-height: 22px;">
                            ' . $_ticket['email'] . '
                        </span>
                    </div>
                </div>';
            }
        } // End Attendees
        return (object) [
            'attendees' => $attendees,
            'attCount' => $attCount
        ];
    }

    /**
    * Get Invoice Content
    *
    * @since     1.0.0
    */
    public static function getInvoiceContent ($invoiceID, $template = 'invoice',$forEachOne = false) {
        # Some Data
        $book_id = get_post_meta($invoiceID, 'book_id', true);
        if(!$book_id) {
            echo \MEC_Invoice\Helper::getTemplate('invoice-is-corrupted');
            die();
        }
        $event_id = get_post_meta($invoiceID, 'event_id', true);
        $date = get_post_meta($invoiceID, 'date', true);
        $totalPrice = \MEC_Invoice\Helper::TotalPrice();
        $main = \MEC::getInstance('app.libraries.main');
        $currencies = $main->get_currencies();
        $event_id =  \MEC_Invoice\Helper::LastEventID();

        $tickets = get_post_meta($event_id, 'mec_tickets', true);
        $transactionID =  \MEC_Invoice\Helper::TransactionID();
        $transaction  = get_option($transactionID);
        $attendee = false;
        if (get_post_meta($invoiceID, 'attendee', true)) {
            $attendee = get_post_meta($invoiceID, 'attendee', true);
            $_GET['attendee'] = $attendee;
        }

        $showALl = false;
        if(isset($_GET['showAll'])) {
            $showALl = true;
        }

        if (isset($_GET['attendee']) && !$showALl) {
            $totalPrice = \MEC_Invoice\Helper::TotalPrice($invoiceID,$attendee);
        } else {
            $totalPrice = \MEC_Invoice\Helper::TotalPrice($invoiceID);
            if ($totalPrice == \MEC_Invoice\Helper::ِInvoiceFee($invoiceID)) {
                $totalPrice = 0;
            }
        }
        $post_author = get_post_field('post_author', $book_id);
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        $transaction = get_option($transaction_id);

        # Invoice - Event
        $invoice = get_post($invoiceID);
        $event = get_post($event_id);

        # Event Data
        $organizer_id = get_post_meta($event_id, 'mec_organizer_id', true);
        $location_id = get_post_meta($event_id, 'mec_location_id', true);
        $organizer = get_term($organizer_id, 'mec_organizer');
        $organizerImage = get_term_meta($organizer_id, 'thumbnail', true) ? get_term_meta($organizer_id, 'thumbnail', true) : 'https://webnus.net/wp-content/uploads/2018/10/deep-emm-pi-3.png';
        $location = get_term($location_id, 'mec_location');
        $main = \MEC::getInstance('app.libraries.main');
        $currencies = $main->get_currencies();
        $location_id = get_post_meta($event_id, 'mec_location_id', true);
        $location = get_term($location_id, 'mec_location');
        $locationName = '';
        if (isset($location->name)) {
            $locationName = $location->name;
        }
        $Hash = get_post_meta($invoiceID, 'invoiceID', true);
        if ($attendee && !$showALl) {
            $PDFLink = get_site_url(null, '?invoiceID=' . $invoiceID . '&makePreview=' . $Hash . '&showPDF=true&attendee=' . $attendee);
        } else {
            $PDFLink = get_site_url(null, '?invoiceID=' . $invoiceID . '&makePreview=' . $Hash . '&showPDF=true');
        }

        // new event date
        $main = new \MEC_main();
        $meta = $main->get_post_meta($book_id);
        $date_format = 'Y-m-d';
        $time_format = get_option('time_format');
        $event_date = isset($meta['mec_date']) ? explode(':', $meta['mec_date']) : array();

        if (is_numeric($event_date[0]) and is_numeric($event_date[1])) {
            $start_datetime = date($date_format . ' ' . $time_format, $event_date[0]);
            $end_datetime = date($date_format . ' ' . $time_format, $event_date[1]);
        } else {
            $start_datetime = $event_date[0];
            $end_datetime = $event_date[1];
        }

        $event_time_date = ((isset($event_date[0]) and isset($event_date[1])) ? sprintf(__('%s to %s', 'mec'), $start_datetime, $end_datetime) : __('Unknown', 'mec'));

        if (isset($start_datetime) and !empty($start_datetime)) {
            $new_event_start_time = explode(' ', $start_datetime);
        }
        if (isset($end_datetime) and !empty($end_datetime)){
            $new_event_end_time = explode(' ', $end_datetime);
        }

        if (isset($new_event_start_time[1]) and !empty($new_event_start_time[1]) and isset($new_event_start_time[2]) and !empty($new_event_start_time[2]))  $event_start_time = $new_event_start_time[1] . ' ' . $new_event_start_time[2];


        if (isset($new_event_end_time[1]) and !empty($new_event_end_time[1]) and isset($new_event_end_time[2]) and !empty($new_event_end_time[2])) $event_end_time = $new_event_end_time[1] . ' ' . $new_event_end_time[2];

        $event_start_date = $event_end_date = false;
        if (isset($new_event_start_time[0]) and !empty($new_event_start_time[0]))  $event_start_date = $new_event_start_time[0];
        if (isset($new_event_end_time[0]) and !empty($new_event_end_time[0]))  $event_end_date = $new_event_end_time[0];

        $event_start_date = is_numeric($event_start_date) ? $event_start_date :  strtotime($event_start_date);
        $event_end_date = is_numeric($event_end_date) ? $event_end_date :  strtotime($event_end_date);

        $event_start_date = date_i18n(\MEC_Invoice\Helper::getOption('event_date_format', get_option('date_format')), $event_start_date);
        $event_end_date = date_i18n(\MEC_Invoice\Helper::getOption('event_date_format', get_option('date_format')), $event_end_date);

        $new_event_date = ($event_end_date == $event_start_date) ? $event_start_date : $event_start_date . ' - ' . $event_end_date;


        if($showALl) {
            $tax = \MEC_Invoice\Helper::ِInvoiceFee($invoiceID);
            $discount = \MEC_Invoice\Helper::ِInvoiceDiscount($invoiceID);
        } else {
            $tax = \MEC_Invoice\Helper::ِInvoiceFee($invoiceID,$attendee);
            $discount = \MEC_Invoice\Helper::ِInvoiceDiscount($invoiceID,$attendee);
        }

        if (!$transaction) {
            return false;
        }

        $CartItemsData = static::getCartItems($invoiceID, $transaction);
        $CartItems = $CartItemsData->CartItems;
        $emails    = $CartItemsData->emails;

        $attendeesData = static::getAttendees($invoiceID, $transaction);
        $attendees = $attendeesData->attendees;
        $attCount  = $attendeesData->attCount;
        if (!$doCheckinHash = get_post_meta($invoiceID, 'CheckinHash', true)) {
            $doCheckinHash = sha1(md5(microtime()));
            update_post_meta($invoiceID, 'CheckinHash', $doCheckinHash);
        }
        $InvoiceDescription = \MEC_Invoice\Helper::getOption('mec_invoice_descriptions', '');
        $InvoiceDescription = trim(html_entity_decode(stripslashes($InvoiceDescription)));
        $InvoiceDescription = trim(strip_tags($InvoiceDescription)) ? $InvoiceDescription : '';

        $CustomStyle = \MEC_Invoice\Helper::getOption('mec_invoice_custom_styles', '');
        $CustomStyle = trim(html_entity_decode(stripslashes($CustomStyle)));
        $CustomStyle = trim(strip_tags($CustomStyle)) ? $CustomStyle : '';

        $dateFormat = \MEC_Invoice\Helper::getOption('tickets_date_format', 'M j, Y');
        $dateFormat = $dateFormat ? $dateFormat : 'M j, Y';
        $timeFormat = \MEC_Invoice\Helper::getOption('tickets_time_format', 'h:i A');
        $timeFormat = $timeFormat ? $timeFormat : 'h:i A';

        $eventDescriptions = get_post_meta($event_id, 'i_event_descriptions', true);
        $discount = $discount ? '-' .  static::applyCurrency($discount) : '';
        $render = \MEC::getInstance('app.libraries.render');
        $event->data = $render->data($event_id);
        $allday = isset($event->data->meta['mec_allday']) ? $event->data->meta['mec_allday'] : 0;
        if ($allday == '0' and isset($event->data->time) and trim($event->data->time['start'])) :
            $eventTime = $event_start_time . ' - ' . $event_end_time;
        else:
            $eventTime =  __('All Day', 'mec-invoice');
        endif;

        $transaction['date'] = \MEC_Invoice\Helper::get_date_label($transaction['date'], $event_id);
        $ed = explode(' - ',$transaction['date']);
        if(\MEC_Invoice\Helper::getOption('mec_invoice_show_time_in_modern_type', '') == 'on') {
            $invoiceDate = date_i18n(\MEC_Invoice\Helper::getOption('invoice_date_format', get_option('date_format')) . ' - ' . get_option('time_format'), $date);
        } else {
            $invoiceDate = date_i18n(\MEC_Invoice\Helper::getOption('invoice_date_format', get_option('date_format')), $date);
        }

        $InvoiceInformation = [
            // Company Information
            'CompanyURL' => \MEC_Invoice\Helper::getOption('mec_invoice_company_url', ''),
            'CompanyURLV' => str_replace(['http://', 'https://'], '', \MEC_Invoice\Helper::getOption('mec_invoice_company_url', '')),

            'CompanyName' => \MEC_Invoice\Helper::getOption('mec_invoice_company_name', ''),
            'CompanyAddress' => \MEC_Invoice\Helper::getOption('mec_invoice_address', ''),
            'CompanyDescription' => \MEC_Invoice\Helper::getOption('mec_invoice_description', ''),
            'CompanyPhone' => \MEC_Invoice\Helper::getOption('mec_invoice_company_phone', ''),
            'CompanyVatNumber' => \MEC_Invoice\Helper::getOption('mec_invoice_vat_number', ''),
            'CompanyEmail' => \MEC_Invoice\Helper::getOption('mec_invoice_company_email', ''),
            'CompanyLogoUrl' => \MEC_Invoice\Helper::getOption('mec_invoice_logo', ''),

            // Links
            'InvoiceLink' => get_site_url(null, '?invoiceID=' . $invoiceID . '&makePreview=' . $Hash),

            // Event Information
            'EventName' => $event->post_title,
            'EventUrl' => get_post_permalink($event->ID),
            'EventDate' => $new_event_date,
            'EventTime' => $eventTime,
            'EventDescriptions' => $eventDescriptions,
            // Invoice Information
            'InvoiceID' => $invoice->ID,
            'InvoiceTitle' => $invoice->post_title,
            'InvoiceDescription' => $InvoiceDescription,
            'InvoiceDate' => $invoiceDate,
            'InvoiceDateD' => date_i18n($dateFormat, strtotime($ed[0])),
            'InvoiceDateT' => date_i18n($timeFormat, strtotime($event->data->time['start'])),
            'InvoiceNumber' => '#' . \MEC_Invoice\Helper\Invoice::get_invoice_number($invoiceID),
            'TransactionID' => $transaction_id,
            'WebSiteUrl' => get_site_url(),

            // Organizer
            'OrganizerImage' => $organizerImage,
            'OrganizerStyle' => isset($organizer->name) ? '' : 'display:none;',
            'OrganizerName' => isset($organizer->name) ? $organizer->name : '',
            'OrganizerPhone' => get_term_meta($organizer_id, 'tel', true) ? get_term_meta($organizer_id, 'tel', true) : '',
            'OrganizerEmail' => get_term_meta($organizer_id, 'email', true) ? get_term_meta($organizer_id, 'email', true) : '',
            'OrganizerSite' => get_term_meta($organizer_id, 'url', true) ? get_term_meta($organizer_id, 'url', true) : '',

            // Location
            'EventLocation' => $locationName,

            // Prices
            'TotalPrice' => static::applyCurrency($totalPrice),
            'Discount' => $discount,
            'Currency'  => isset($currencies[\MEC_Invoice\Helper::getOption('currency', false)]) ? $currencies[\MEC_Invoice\Helper::getOption('currency', false)] : '',
            'Tax'  => $tax ? static::applyCurrency($tax) : '',

            // Cart Items
            'CartItems' => $CartItems,

            // Attendees
            'AttendeesList' => $attendees,

            // QRCode
            'QRCodeUrl' => get_site_url(null, '?invoiceID='. $invoiceID . '&makeQRCode='.$Hash . '&checkin='.$doCheckinHash),
            'attendeeParam' => '',
			'CustomStyle' => $CustomStyle,
            'PrintButtonStyles' => '',
            'PDFLink' => $PDFLink,
            'DownloadBtnStyles' => '',
            'CompanyInformationStyle' => ''
        ];

        if(!trim($InvoiceInformation['CompanyName']) &&
        !trim($InvoiceInformation['CompanyDescription']) &&
        !trim($InvoiceInformation['CompanyEmail']) &&
        !trim($InvoiceInformation['CompanyAddress']) &&
        !trim($InvoiceInformation['CompanyPhone']) &&
        !trim($InvoiceInformation['CompanyVatNumber']) &&
        !trim($InvoiceInformation['CompanyURL'])) {
            $InvoiceInformation['CompanyInformationStyle'] = 'display:none';
        }
        $apiKey = \MEC_Invoice\Helper::getOption('mec_invoice_html2pdf', '');
        if(!$apiKey) {
            $InvoiceInformation['DownloadBtnStyles'] = 'display:none;';
            $InvoiceInformation['PDFLink'] = '';
        }
        if(!isset($_GET['invoiceID'])) {
            $InvoiceInformation['PrintButtonStyles'] = 'display:none;';
        }

		if($attCount > 3) {
			$InvoiceInformation['CustomStyle'] .= '@media print {.mec-invoice-body-half2.mec-invoice-attendees {page-break-before: always;}}';
		}

        if (\MEC_Invoice\Helper::getOption('mec_invoice_show_invoice_description_in_pdf', 'off') != 'on') {
            $InvoiceInformation['CustomStyle'] .= '@media print {.mec-invoice-footer {display: none;}}';
        }

        if (\MEC_Invoice\Helper::getOption('mec_invoice_rendering_mode', 'full') == 'ticket') {

            $attendees = get_post_meta($book_id, 'mec_attendees', true);
            if(!$attendees) {
                $attendees = [];
            }
            $template = $template == 'invoice' ? 'invoice-ticket' : $template;
            $tickets = $InvoiceInformation['EventLocationStyle'] = $InvoiceInformation['OrganizerStyle'] = '';

            if(!isset($organizer->name)) {
                $InvoiceInformation['OrganizerStyle'] = 'display:none;';
            }

            $attendees_count = 0;
            foreach ($attendees as $key => $_ticket) {
                if (isset($_ticket['id'])) {
                    $attendees_count++;
                }
            }
            foreach ($attendees as $key => $_ticket) {
                $key++;
                if (isset($_ticket['id'])) {
                    if (isset($_GET['attendee']) && $_GET['attendee'] != $_ticket['email'] && !$showALl) {
                        continue;
                    }

                    $CartItemsData = static::getCartItems($invoiceID, $transaction, $_ticket['email']);
                    // PDF Link
                    $PDFLink = get_site_url(null, '?invoiceID=' . $invoiceID . '&makePreview=' . $Hash . '&showPDF=true&attendee=' . $_ticket['email']);
                    $InvoiceInformation['PDFLink'] = $PDFLink;
                    $totalPrice = \MEC_Invoice\Helper::TotalPrice($invoiceID, $_ticket['email'], $key);
                    $totalPrice = $totalPrice ? $totalPrice : 0;
                    $InvoiceInformation['TotalPrice'] = static::applyCurrency($totalPrice) ;
                    $InvoiceInformation['AttendeeQrCode'] = get_site_url(null, '?invoiceID=' . $invoiceID . '&makeQRCode=' . $Hash . '&attendee=' . $_ticket['email']) . '&place=' . $key . '&Hash=' . $Hash;
                    $InvoiceInformation['AttendeeName'] = isset($_ticket['name']) ? $_ticket['name'] : $_ticket['email'];
                    $InvoiceInformation['TicketID'] = $key;
                    $Email = \MEC_Invoice\Email::instance();
                    $content = $Email->getTemplate('tickets');

                    foreach ($InvoiceInformation as $name => $value) {
                        if(empty(trim($value))) {
                            $content = str_replace('{{' . $name . 'Style}}', 'display:none;', $content);
                        } else {
                            $content = str_replace('{{' . $name . 'Style}}', '', $content);
                        }

                        $content = str_replace('{{' . $name . '}}', $value, $content);
                    }
                    $tickets.= $content;
                }
            } // End Attendees
            $InvoiceInformation['Tickets'] = $tickets;
        }

        if($forEachOne) {
            $contents = [];
            foreach ($emails as $email) {
                if (\MEC_Invoice\Helper::getOption('mec_invoice_rendering_mode', 'full') == 'ticket') {
                    $attendees = get_post_meta($book_id, 'mec_attendees', true);
                    if(!$attendees) {
                        $attendees = [];
                    }
                    $template = $template == 'invoice' ? 'invoice-ticket' : $template;
                    $tickets = $InvoiceInformation['EventLocationStyle'] = $InvoiceInformation['OrganizerStyle'] = '';

                    if(!isset($organizer->name)) {
                        $InvoiceInformation['OrganizerStyle'] = 'display:none;';
                    }

                    foreach ($attendees as $key => $_ticket) {
                        $key++;
                        if (isset($_ticket['id'])) {

                            if ($email != $_ticket['email']) {
                                continue;
                            }

                            $CartItemsData = static::getCartItems($invoiceID, $transaction, $email);

                            // TAX
                            $tax = \MEC_Invoice\Helper::ِInvoiceFee($invoiceID,$email);

                            // Discount
                            $discount = \MEC_Invoice\Helper::ِInvoiceDiscount($invoiceID,$email);

                            // PDF Link
                            $PDFLink = get_site_url(null, '?invoiceID=' . $invoiceID . '&makePreview=' . $Hash . '&showPDF=true&attendee=' . $email);
                            $InvoiceInformation['PDFLink'] = $PDFLink;

                            // Total Price
                            $totalPrice = \MEC_Invoice\Helper::TotalPrice($invoiceID, $email);
                            $totalPrice = $totalPrice ? $totalPrice : 0;
                            $InvoiceInformation['TotalPrice'] =  static::applyCurrency($totalPrice);

                            // TAX
                            $InvoiceInformation['Tax'] = $tax ?  static::applyCurrency($tax) : '';
                            // Discount
                            $InvoiceInformation['Discount'] = $discount ?  static::applyCurrency($discount) : '';
                            $InvoiceInformation['AttendeeQrCode'] = get_site_url(null, '?invoiceID=' . $invoiceID . '&makeQRCode=' . $Hash . '&attendee=' . $_ticket['email']) . '&place=' . $key . '&Hash=' . $Hash;
                            $InvoiceInformation['AttendeeName'] = isset($_ticket['name']) ? $_ticket['name'] : $_ticket['email'];
                            $InvoiceInformation['TicketID'] = $key;

                            $Email = \MEC_Invoice\Email::instance();
                            $ticketsContent = '';
                            $content = $Email->getTemplate('tickets');
                            foreach ($InvoiceInformation as $name => $value) {
                                if (empty(trim($value))) {
                                    $content = str_replace('{{' . $name . 'Style}}', 'display:none;', $content);
                                } else {
                                    $content = str_replace('{{' . $name . 'Style}}', '', $content);
                                }
                                $content = str_replace('{{' . $name . '}}', $value, $content);
                            }
                            $ticketsContent .= $content;
                            $InvoiceInformation['Tickets'] = $ticketsContent;
                            $content = $Email->getTemplate('invoice-ticket');
                            foreach ($InvoiceInformation as $name => $value) {
                                if (empty(trim($value))) {
                                    $content = str_replace('{{' . $name . 'Style}}', 'display:none;', $content);
                                } else {
                                    $content = str_replace('{{' . $name . 'Style}}', '', $content);
                                }
                                $content = str_replace('{{' . $name . '}}', $value, $content);
                            }
                            $contents[$email] = $content;
                        }
                    } // End Attendees
                } else {
                    $InvoiceInformation['attendeeParam'] = '&attendee='.$email;

                    $Email = \MEC_Invoice\Email::instance();
                    $content = $Email->getTemplate($template);

                    $CartItemsData = static::getCartItems($invoiceID, $transaction, $email);
                    $CartItems = $CartItemsData->CartItems;

                    $attendeesData = static::getAttendees($invoiceID, $transaction, $email);
                    $attendees = $attendeesData->attendees;
                    $attCount = $attendeesData->attCount;

                    // Cart Items
                    $InvoiceInformation['CartItems'] = $CartItems;

                    // Attendees
                    $InvoiceInformation['AttendeesList'] = $attendees;

                    // TAX
                    $tax = \MEC_Invoice\Helper::ِInvoiceFee($invoiceID,$email);

                    // Discount
                    $discount = \MEC_Invoice\Helper::ِInvoiceDiscount($invoiceID,$email);

                    // PDF Link
                    $PDFLink = get_site_url(null, '?invoiceID=' . $invoiceID . '&makePreview=' . $Hash . '&showPDF=true&attendee=' . $email);
                    $InvoiceInformation['PDFLink'] = $PDFLink;

                    // Total Price
                    $totalPrice = \MEC_Invoice\Helper::TotalPrice($invoiceID, $email);
                    $totalPrice = $totalPrice ? $totalPrice : 0;
                    $InvoiceInformation['TotalPrice'] = static::applyCurrency($totalPrice);

                    // TAX
                    $InvoiceInformation['Tax'] = $tax ? static::applyCurrency($tax) : '';
                    // Discount
                    $InvoiceInformation['Discount'] = $discount ? static::applyCurrency($discount) : '';

                    foreach ($InvoiceInformation as $name => $value) {
                        if (empty(trim($value))) {
                            $content = str_replace('{{' . $name . 'Style}}', 'display:none;', $content);
                        } else {
                            $content = str_replace('{{' . $name . 'Style}}', '', $content);
                        }
                        $content = str_replace('{{' . $name . '}}', $value, $content);
                        $contents[$email] = $content;
                    }
                }
            }

            return (object) [
                'emails' => $emails,
                'content' => $contents,
                'post_author' => $post_author
            ];
        } else {
            $Email = \MEC_Invoice\Email::instance();
            $content = $Email->getTemplate($template);

            foreach ($InvoiceInformation as $name => $value) {
                if (empty(trim($value))) {
                    $content = str_replace('{{' . $name . 'Style}}', 'display:none;', $content);
                } else {
                    $content = str_replace('{{' . $name . 'Style}}', '', $content);
                }
                $content = str_replace('{{' . $name . '}}', $value, $content);
            }
            return (object) [
                'emails' => $emails,
                'content' => $content,
                'post_author' => $post_author
            ];
        }

    }

    /**
    *Apply Currency
    *
    *@since     1.0.0
    */
    public static function applyCurrency ($price) {
        if(!static::$main) {
            static::$main = \MEC::getInstance('app.libraries.main');
        }
        return static::$main->render_price($price);
    }


} // Notification
Notifications::instance();