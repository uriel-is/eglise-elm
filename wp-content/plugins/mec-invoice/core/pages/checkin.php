<?php

namespace MEC_Invoice\Pages;

use MEC_Invoice\Attendee;
// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
 ** Attendees Checkin Page.
 **
 ** @author      Webnus <info@webnus.biz>
 ** @package     Modern Events Calendar
 ** @since       1.0.0
 **/
class CheckIn
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
        add_action('wp_loaded', [self::$instance, 'renderContent']);
    }

    /*
     **  Global Variables.
     **
     **  @since   1.0.0
     */
    public static function settingUp($This)
    {
        self::$dir  = MECINVOICEDIR . 'core' . DS . 'pages';
    }

    /*
     **  Render Content.
     **  MECCheckIn
     **  @since   1.0.0
     */
    public static function renderContent()
    {
        if (isset($_GET['invoiceID']) && isset($_GET['checkIn']) && isset($_GET['place']) && isset($_GET['Hash']) ) {
            $InvoiceID = $_GET['invoiceID'];

            if(get_post_meta($InvoiceID, 'status', true) != 'open') {
                echo \MEC_Invoice\Helper::getTemplate('invoice-not-found');
                die();
            }



            $Hash = htmlentities($_GET['Hash']);
            $place = htmlentities($_GET['place']);
            $attendee = htmlentities($_GET['checkIn']);

            if ($Hash != get_post_meta($InvoiceID, 'invoiceID', true)) {
                echo \MEC_Invoice\Helper::getTemplate('invoice-not-found');
                die();
            }

            $Invoice = get_post($InvoiceID);

            if (!$Invoice) {
                echo \MEC_Invoice\Helper::getTemplate('invoice-not-found');
                die();
            } else if ($Invoice->post_status !== 'publish') {
                echo \MEC_Invoice\Helper::getTemplate('invoice-not-found');
                die();
            }

            $book_id = get_post_meta($InvoiceID, 'book_id', true);
            $verified = get_post_meta($book_id, 'mec_verified', true);
            if ($verified !== '1') {
                $content = \MEC_Invoice\Helper::getTemplate('permission-denied');
                $content = str_replace('{{invoiceID}}',  $InvoiceID ,$content);
                echo $content;
                die();
            }

            if (!Attendee::doIHaveAccess()) {
                $content = \MEC_Invoice\Helper::getTemplate('permission-denied');
                $content = str_replace('{{invoiceID}}',  $InvoiceID ,$content);
                echo $content;
                die();
            }

            $event_id = get_post_meta($InvoiceID, 'event_id', true);

            if (get_post_status( $event_id ) != 'publish') {
                $content = \MEC_Invoice\Helper::getTemplate('permission-denied');
                $content = str_replace('{{invoiceID}}',  $InvoiceID, $content);
                echo $content;
                die();
            }

            $book_id = get_post_meta($InvoiceID, 'book_id', true);
            $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
            $transaction = get_option($transaction_id);
            if (!is_array($transaction['date'])) {
                if (strpos($transaction['date'], '-')) {
                    $transaction['date'] = explode('-', $transaction['date']);
                } elseif (strpos($transaction['date'], ':')) {
                    $transaction['date'] = explode(':', $transaction['date']);
                }
            }
            $main                = \MEC::getInstance('app.libraries.main');
            $meta = (object) $main->get_post_meta($event_id);

            $date = $transaction['date'];

            if(!isset($date[1])) {
                $date[1] = $date[0];
            }

            $start_date = is_numeric($date[0]) ? $date[0] : strtotime($date[0]);
            $end_date = is_numeric($date[1]) ? $date[1] : strtotime($date[1]);

            $approved = false;
            if($start_date < current_time('timestamp')) {
                $approved = true;
            }

            if($end_date < current_time('timestamp')) {
                $approved = false;
            }

            if(!$approved && \MEC_Invoice\Helper::getOption('mec_invoice_early_checkin', false) == 'on') {
                $content = \MEC_Invoice\Helper::getTemplate('early-checkin');
                $content = str_replace('{{invoiceID}}',  $InvoiceID ,$content);
                echo $content;
                die();
            }

            if (!isset($transaction['tickets'][$place - 1]['email']) || $transaction['tickets'][$place - 1]['email'] != $attendee) {
                echo \MEC_Invoice\Helper::getTemplate('invoice-not-found');
                die();
            }

            $meta->mec_repeat = (object) $meta->mec_repeat;
            if (!isset($_GET['un-check'])) {
                if(isset($meta->mec_repeat) && $meta->mec_repeat && isset($meta->mec_repeat->status) && $meta->mec_repeat->status && isset($meta->mec_repeat->type) && $meta->mec_repeat->type == 'daily' && isset($meta->mec_repeat->interval) && $meta->mec_repeat->interval) {
                    if($meta->mec_repeat->end == 'occurrences') {
                        $invoice_occurrences = get_post_meta($InvoiceID, 'invoice_occurrences', true );
                        if(!$invoice_occurrences) $invoice_occurrences = 0;
                        if($invoice_occurrences < $meta->mec_repeat->interval) {
                            $invoice_occurrences++;
                            update_post_meta($InvoiceID, 'invoice_occurrences', $invoice_occurrences);
                            Attendee::doCheckIn($InvoiceID, $attendee, $place);
                            $content = \MEC_Invoice\Helper::getTemplate('successfully-checked');
                        } else {
                            $content = \MEC_Invoice\Helper::getTemplate('already-checked');
                        }
                    } else if(isset($meta->mec_repeat) && $meta->mec_repeat && $meta->mec_repeat->end == 'date') {
                        if (strtotime($meta->mec_repeat->end_at_date) > current_time('timestamp')) {
                            $invoice_occurrences = get_post_meta($InvoiceID, 'invoice_occurrences', true);
                            if (!$invoice_occurrences) $invoice_occurrences = 0;
                            if ($invoice_occurrences < $meta->mec_repeat->interval) {
                                $invoice_occurrences++;
                                update_post_meta($InvoiceID, 'invoice_occurrences', $invoice_occurrences);
                                Attendee::doCheckIn($InvoiceID, $attendee, $place);
                                $content = \MEC_Invoice\Helper::getTemplate('successfully-checked');
                            } else {
                                $content = \MEC_Invoice\Helper::getTemplate('already-checked');
                            }
                        } else {
                            $content = \MEC_Invoice\Helper::getTemplate('already-checked');
                        }
                    } else {
                        if (Attendee::hasCheckedIn($InvoiceID, $attendee, $place)) {
                            $content = \MEC_Invoice\Helper::getTemplate('already-checked');
                        } else {
                            Attendee::doCheckIn($InvoiceID, $attendee, $place);
                            $content = \MEC_Invoice\Helper::getTemplate('successfully-checked');
                        }
                    }
                } else if (Attendee::hasCheckedIn($InvoiceID, $attendee, $place)) {
                    $content = \MEC_Invoice\Helper::getTemplate('already-checked');
                } else {
                    Attendee::doCheckIn($InvoiceID, $attendee, $place);
                    $content = \MEC_Invoice\Helper::getTemplate('successfully-checked');
                }
            } else {
                if (!Attendee::hasCheckedIn($InvoiceID, $attendee, $place)) {
                    $content = \MEC_Invoice\Helper::getTemplate('already-unchecked');
                } else {
                    if (isset($meta->mec_repeat) && $meta->mec_repeat && $meta->mec_repeat->status && $meta->mec_repeat->type == 'daily' && $meta->mec_repeat->interval) {
                        $invoice_occurrences = get_post_meta($InvoiceID, 'invoice_occurrences', true);
                        if ($invoice_occurrences) {
                            $invoice_occurrences--;
                            update_post_meta($InvoiceID, 'invoice_occurrences', $invoice_occurrences);
                        }
                    }
                    Attendee::doCheckOut($InvoiceID, $attendee, $place);
                    $content = \MEC_Invoice\Helper::getTemplate('successfully-unchecked');
                }
            }
            if (Attendee::hasCheckedIn($InvoiceID, $attendee, $place)) {
                $checkedTime = date_i18n(get_option('date_format') . ' - ' . get_option('time_format'), get_post_meta($InvoiceID, 'checkedInTime-' . $place, true));
            } else {
                $checkedTime = '-';
            }

            $data = [
                'invoiceID'     => $InvoiceID,
                'attendeeName'  => $transaction['tickets'][$place - 1]['name'],
                'attendeeEmail' => $attendee,
                'eventName'     => get_the_title($event_id),
                'checkedTime'   => $checkedTime,
                'unCheckUrl'    =>  get_site_url(null, '?invoiceID=' . $InvoiceID . '&checkIn=' . $attendee . '&place=' . $place . '&Hash=' . $Hash . '&un-check=true'),
                'CheckUrl'      =>  get_site_url(null, '?invoiceID=' . $InvoiceID . '&checkIn=' . $attendee . '&place=' . $place . '&Hash=' . $Hash)
            ];

            foreach ($data as $name => $value) {
                $content = str_replace('{{' . $name . '}}', $value, $content);
            }

            echo $content;
            die();
        }
        return false;
    }
} //CheckIn
CheckIn::instance();
