<?php

namespace MEC_Invoice\Pages;
use MEC_Invoice\Notifications;
use MEC_Invoice\Attendee;

// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
** Invoice Preview Page.
**
** @author      Webnus <info@webnus.biz>
** @package     Modern Events Calendar
** @since       1.0.0
**/
class InvoicePreview
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
     **  MECInvoicePreview
     **  @since   1.0.0
     */
    public static function renderContent()
    {
        if (isset($_GET['invoiceID']) && isset($_GET['makePreview'])) {
            $InvoiceID = htmlentities($_GET['invoiceID']);
            if(get_post_meta($InvoiceID, 'status', true) == 'open' || current_user_can('administrator') ) {
                $Hash = htmlentities($_GET['makePreview']);
                if ($Hash != get_post_meta($InvoiceID, 'invoiceID', true)) {
                    return false;
                }
                $Invoice = get_post($InvoiceID);
                if ($Invoice) {
                    if(isset($_GET['showPDF'])) {
                        $url = get_site_url(null, '?invoiceID=' . $InvoiceID . '&makePreview=' . $Hash);
                        if(isset($_GET['attendee']) && $attendee = $_GET['attendee']) {
                            $url .= '&attendee='. $attendee;
                        }

                        $apiKey = \MEC_Invoice\Helper::getOption('mec_invoice_html2pdf', '');
                        $data = [
                            'url' => $url,
                            'apiKey' => $apiKey,
                            'media' => 'print',
                            'format' => 'A4',
                        ];

                        $dataString = json_encode($data);

                        $ch = curl_init('https://api.html2pdf.app/v1/generate');
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                            'Content-Type: application/json',
                        ]);

                        $response = curl_exec($ch);
                        $err = curl_error($ch);
                        curl_close($ch);

                        if ($err) {
                            echo 'Error #:' . $err;
                            die();
                        } else {
                            header('Content-Type: application/pdf');
                            header('Content-Disposition: inline; filename="Invoice-'. $InvoiceID .'.pdf"');
                            header('Content-Transfer-Encoding: binary');
                            header('Accept-Ranges: bytes');

                            echo $response;
                        }
                        die();
                    }
                    if (isset($_GET['doCheckin']) && $_GET['doCheckin'] === get_post_meta($InvoiceID, 'CheckinHash', true)) {

                        if (!Attendee::doIHaveAccess()) {
                            $content = \MEC_Invoice\Helper::getTemplate('permission-denied');
                            $content = str_replace('{{invoiceID}}',  $InvoiceID, $content);
                            echo $content;
                            die();
                        }
                        $transactionID =  \MEC_Invoice\Helper::TransactionID();
                        $transaction  = get_option($transactionID);
                        $date = $transaction['date'];
                        if(!is_array($date)) {
                            if(strpos($date, '-')) {
                                $date = explode('-', $date);
                            } elseif(strpos($date, ':')) {
                                $date = explode(':', $date);
                            }
                        }
                        if (!isset($date[1])) {
                            $date[1] = $date[0];
                        }

                        $start_date = is_numeric($date[0]) ? $date[0] : strtotime($date[0]);
                        $end_date = is_numeric($date[1]) ? $date[1] : strtotime($date[1]);

                        $approved = false;
                        if ($start_date < current_time('timestamp')
                        ) {
                            $approved = true;
                        }

                        if ($end_date < current_time('timestamp')) {
                            $approved = false;
                        }

                        if (!$approved && \MEC_Invoice\Helper::getOption('mec_invoice_early_checkin', false) == 'on') {
                            $content = \MEC_Invoice\Helper::getTemplate('early-checkin');
                            $content = str_replace('{{invoiceID}}',  $InvoiceID, $content);
                            echo $content;
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


                        $event_id = get_post_meta($InvoiceID, 'event_id', true);
                        if (get_post_status($event_id) != 'publish') {
                            $content = \MEC_Invoice\Helper::getTemplate('permission-denied');
                            $content = str_replace('{{invoiceID}}',  $InvoiceID, $content);
                            echo $content;
                            die();
                        }


                        $count = 0;
                        foreach ($transaction['tickets'] as $key => $_ticket) {
                            $key++;
                            if (isset($_ticket['id'])) {
                                if (!\MEC_Invoice\Attendee::hasCheckedIn($InvoiceID, $_ticket['email'], $key)) {
                                    $count++;
                                    \MEC_Invoice\Attendee::doCheckIn($InvoiceID, $_ticket['email'], $key);
                                } else {
                                    // \MEC_Invoice\Attendee::doCheckOut($InvoiceID, $_ticket['email'], $key);
                                }
                            }
                        }

                        $checkedTime = date_i18n(get_option('date_format') . ' - ' . get_option('time_format'), current_time('timestamp'));

                        if(!$count) {
                            $content = \MEC_Invoice\Helper::getTemplate('already-checked');
                        } else {
                            $content = \MEC_Invoice\Helper::getTemplate('successfully-checked');
                        }
                        $place = 1;

                        $data = [
                            'invoiceID'     => $InvoiceID,
                            'attendeeName'  => $count ? '×' . $count . ' - ' . __('Attendee(s)') : __('All attendees have been checked already','mec-invoice') ,
                            'attendeeEmail' => isset($_ticket['email']) ? $_ticket['email'] : '-',
                            'eventName'     => get_the_title($event_id),
                            'checkedTime'   => $checkedTime,
                            'unCheckUrl'    =>  get_site_url(null, '?invoiceID=' . $InvoiceID . '&makePreview=' . $Hash),
                            'unCheckUrl'    =>  get_site_url(null, '?invoiceID=' . $InvoiceID . '&checkIn=' . $_ticket['email'] . '&place=' . $place . '&Hash=' . $Hash . '&un-check=true'),
                            'CheckUrl'      =>  "#",
                        ];

                        foreach ($data as $name => $value) {
                            $content = str_replace('{{' . $name . '}}', $value, $content);
                        }

                        echo $content;
                        die();

                    }

                    echo Notifications::getInvoiceContent($InvoiceID,'invoice')->content;

                    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
                    echo '<script src="' . MECINVOICEASSETS . 'js/printThis.js"></script>';
                    echo "<script>jQuery(document).ready(function() {
                        jQuery('.mec-invoice-print-btn').on('click', function() {
                              window.print();
                        });
                    })</script>";

                    exit();
                }
            } else {
                include realpath(MECINVOICEDIR . '/templates/invoice-canceled.tpl');
                exit();
            }

        } else if (isset($_GET['invoiceID']) && isset($_GET['downloadInvoice'])) {
            $InvoiceID = htmlentities($_GET['invoiceID']);
            $Hash = htmlentities($_GET['downloadInvoice']);
            if ($Hash != get_post_meta($InvoiceID, 'invoiceID', true)) {
                return false;
            }
            \MEC_Invoice\PDF::createFromInvoice($InvoiceID);
            exit();
        } else {
            $url = $_SERVER['REQUEST_URI'];
            if($url && strpos($url, '/invoice/') !== false) {
                $hash = preg_replace('#(.*?)\/invoice\/#','', $url);
                if(strpos($hash, '/') !== false) {
                    return;
                }
                $des = \MEC_Invoice\Helper::getShortLinkDes($hash);

                if (!$des) {
                    return;
                }

                ob_get_clean();
                ob_start();
                header('Location: '. $des);
                die();
            }
        }
        return false;
    }
} //InvoicePreview
InvoicePreview::instance();
