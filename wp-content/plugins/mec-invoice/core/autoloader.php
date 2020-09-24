<?php

namespace MEC_Invoice\Core;
// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}
/**
**  Loader.
**
**  @author      Webnus <info@webnus.biz>
**  @package     Modern Events Calendar
**  @since       1.0.0
**/
class Loader
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
        self::settingUp();
        self::preLoad();
        self::setHooks();
        self::registerAutoloadFiles();
        self::loadInits();
    }

   /*
    **  Global Variables.
    **
    **  @since   1.0.0
    */
    public static function settingUp()
    {
        self::$dir     = MECINVOICEDIR . 'core';
    }

   /*
    **  Hooks
    **
    **  @since     1.0.0
    */
    public static function setHooks()
    {
        add_action('admin_init', function () {
            \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\checkLicense\AddonSetOptions');
            \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\checkLicense\AddonCheckActivation');
        });
    }

   /*
    **  preLoad
    **
    **  @since     1.0.0
    */
    public static function preLoad()
    {
        include_once self::$dir . DS . 'autoloader' . DS . 'autoloader.php';
    }

   /*
    **  Register Autoload Files
    **
    **  @since     1.0.0
    */
    public static function registerAutoloadFiles()
    {
        if (!class_exists('\MEC_Invoice\Autoloader')) {
            return;
        }

        \MEC_Invoice\Autoloader::addClasses(
            [
                // Helper
                'MEC_Invoice\\Helper' => self::$dir . '/helper/helper.php',
                'MEC_Invoice\\Attendee' => self::$dir . '/helper/attendee.php',
                'MEC_Invoice\\PDF' => self::$dir . '/helper/pdf.php',
                'MEC_Invoice\\Helper\\Invoice' => self::$dir . '/helper/invoice.php',

                // EMail
                'MEC_Invoice\\Email' => self::$dir . '/email/mail.php',

                // Notifications
                'MEC_Invoice\\Notifications' => self::$dir . '/notifications/notifications.php',

                // Meta Boxes
                'MEC_Invoice\\Core\\MetaBox\\InvoiceView' => self::$dir . '/metabox/invoice-view.php',
                'MEC_Invoice\\Core\\MetaBox\\InvoiceNew' => self::$dir . '/metabox/invoice-new.php',
                'MEC_Invoice\\Core\\MetaBox\\ResendInvoice' => self::$dir . '/metabox/resend-invoice.php',
                'MEC_Invoice\\Core\\MetaBox\\Dashboard' => self::$dir . '/metabox/invoice-dashboard.php',

                // Post Type
                'MEC_Invoice\\Core\\PostTypes\\MecInvoice' => self::$dir . '/postTypes/mec-invoice.php',
                // 'MEC_Invoice\\Core\\PostTypes\\MecInvoiceBuilder' => self::$dir . '/postTypes/mec-invoice-builder.php',

                // Manager
                'MEC_Invoice\\Core\\Manager\\Controller' => self::$dir . '/manager/controller.php',

                // Pages
                'MEC_Invoice\\Core\\Pages\\InvoiceQRCode' => self::$dir . '/pages/invoice-qrcode.php',
                'MEC_Invoice\\Core\\Pages\\InvoicePreview' => self::$dir . '/pages/invoice.php',
                'MEC_Invoice\\Core\\Pages\\CheckIn' => self::$dir . '/pages/checkin.php',

                // Licensing
                'MEC_Invoice\\Core\\checkLicense\\AddonSetOptions' => self::$dir . '/checkLicense/set-options.php',
                'MEC_Invoice\\Core\\checkLicense\\AddonCheckActivation' => self::$dir . '/checkLicense/check-activation.php',
                'MEC_Invoice\\Core\\checkLicense\\AddonLicense' => self::$dir . '/checkLicense/get-license.php',
            ]
        );
    }

   /*
    **  Load Init
    **
    **  @since     1.0.0
    */
    public static function loadInits()
    {
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Helper');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Attendee');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\PDF');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Helper\Invoice');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\PostTypes\MecInvoice');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\PostTypes\MecInvoiceBuilder');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\Manager\Controller');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Notifications');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\MetaBox\InvoiceView');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\MetaBox\InvoiceNew');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\MetaBox\ResendInvoice');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\MetaBox\Dashboard');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\Pages\InvoiceQRCode');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\Pages\InvoicePreview');
        \MEC_Invoice\Autoloader::load('MEC_Invoice\Core\Pages\CheckIn');
    }
} //Loader

Loader::instance();
