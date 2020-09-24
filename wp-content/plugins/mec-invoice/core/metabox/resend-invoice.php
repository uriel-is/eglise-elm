<?php

namespace MEC_Invoice\Core\MetaBox;

use MEC_Invoice\Attendee;
// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
 **  ResendInvoice.
 **
 **  @author      Webnus <info@webnus.biz>
 **  @package     Modern Events Calendar
 **  @since       1.0.0
 **/
class ResendInvoice
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
        add_action('save_post', [self::$instance, 'resendInvoice']);
        add_action('admin_notices', [self::$instance, 'resendInvoiceNotice']);
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
    **  Resend Invoice
    **
    **  @since   1.0.0
    */
    public static function resendInvoiceNotice()
    {
        $notice = get_option('resendInvoiceNotice', false);
        $noticeType = get_option('resendInvoiceNoticeType', 'success');
        if ($notice) {
            delete_option('resendInvoiceNotice');
            delete_option('resendInvoiceNoticeType');
            ?>
            <div class="notice notice-<?php echo $noticeType ?> is-dismissible">
                <p><?php echo $notice; ?></p>
            </div>
            <?php
        }
    }

    /*
    **  Resend Invoice
    **
    **  @since   1.0.0
    */
    public static function resendInvoice()
    {
        if (isset($_POST['MECInvoiceResendEmail'])) {
            $invoiceID = get_the_ID();
            $book_id = get_post_meta($invoiceID, 'book_id', true);
            if(get_post_meta($book_id, 'mec_confirmed', true)) {
                $notice = __('Done! The Invoice has been resent.', 'mec-invoice');
                update_option('resendInvoiceNotice',$notice);
                update_option('resendInvoiceNoticeType','success');
                \MEC_Invoice\Notifications::instance()->sendInvoiceNotification($invoiceID, true);
            } else {
                $notice = __('Oops! Please Confirm the Booking in the First Step.', 'mec-invoice');
                update_option('resendInvoiceNotice',$notice);
                update_option('resendInvoiceNoticeType','error');
                return;
            }
        }
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

        if (isset($_GET['post']) && get_post_type($_GET['post']) == 'mec_invoice') {
            add_meta_box('mec_invoice_resend_invoicce', 'Resend Invoice', [self::$instance, 'renderMetaBox'], 'mec_invoice', 'side');
        }
    }

    /*
    **  Render Meta Box
    **
    **  @since     1.0.0
    */
    public function renderMetaBox()
    {
        $invoiceID = get_the_ID();
        $book_id = get_post_meta($invoiceID, 'book_id', true);
        $post_author = get_post_field('post_author', $book_id);
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        echo '<strong>' . esc_attr__('Resend Invoice To', 'mec-invoice') . ' <a href="mailto:' . get_the_author_meta('email', $post_author) . '">' . get_the_author_meta('email', $post_author) . '</a></strong>';
        echo '<p>
        ' . esc_attr__('If the customer has not received the invoice, you can resend the invoice email again. Before proceeding, please check the spam folder to make sure you have not received it.', 'mec-invoice') . '
        </p>';

        echo '<input name="MECInvoiceResendEmail" type="submit" class="button button-secondary button-hero" id="publish" value="Re-send Invoice">';
    }
} //ResendInvoice
