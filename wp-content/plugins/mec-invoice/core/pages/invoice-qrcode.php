<?php

namespace MEC_Invoice\Pages;

// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
**  Invoice QrCode Page.
**
**  @author      Webnus <info@webnus.biz>
**  @package     Modern Events Calendar
**  @since       1.0.0
**/
class InvoiceQRCode
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
    **  MECInvoiceQrCode
    **  @since   1.0.0
    */
    public static function renderContent() {
        if(isset($_GET['invoiceID']) && isset($_GET['makeQRCode'])) {
            $InvoiceID = htmlentities($_GET['invoiceID']);
            $Hash = htmlentities($_GET['makeQRCode']);
            if ($Hash != get_post_meta($InvoiceID, 'invoiceID', true)) {
                return false;
            }
            $Invoice = get_post($InvoiceID);
            include(MECINVOICEDIR . '/libraries/phpqrcode/qrlib.php');
            $QRcode = new \QRcode();
            if (isset($_GET['attendee']) && isset($_GET['place']) && isset($_GET['Hash'])) {
                $url = get_site_url(null, '?invoiceID=' . $InvoiceID . '&checkIn=' . $_GET['attendee'] . '&place=' . $_GET['place'] . '&Hash=' . $_GET['Hash']);
                $url = \MEC_Invoice\Helper::getShortLink($url);
                ob_get_clean();
                header('Expires: 0');
                header('Content-Type: image/png');
                header("Content-Disposition: inline; filename=\"{$InvoiceID}-qrcode.png\"");
                $QRcode::png($url);
                exit();
            } else if ($Invoice) {
                if(isset($_GET['checkin']) && $_GET['checkin'] === get_post_meta($InvoiceID, 'CheckinHash', true)) {
                    $doCheckinHash = $_GET['checkin'];
                    $url = get_site_url(null, '?invoiceID='. $InvoiceID .'&makePreview='.$Hash . '&doCheckin=' . $doCheckinHash);
                } else {
                    $url = get_site_url(null, '?invoiceID='. $InvoiceID .'&makePreview='.$Hash);
                }
                $url = \MEC_Invoice\Helper::getShortLink($url);
                ob_get_clean();
                header("Content-type: image/png");
                header("Content-Disposition: inline; filename=\"{$InvoiceID}-qrcode.png\"");
                header('Expires: 0');
                $QRcode::png($url);
                exit();
            }
        }
        return false;
    }
} //Invoice QrCode
InvoiceQRCode::instance();