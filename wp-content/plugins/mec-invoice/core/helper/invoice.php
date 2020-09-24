<?php

namespace MEC_Invoice\Helper;

// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
 * Mec Invoice Helpers.
 *
 * @author     Webnus <info@webnus.biz>
 * @package     Modern Events Calendar
 * @since     1.0.0
 **/
class Invoice
{

    /**
    *  Get Invoice Number
    *
    *  @since     1.0.0
    */
    public static function get_invoice_number($invoiceID)
    {
        $invoiceNumber = get_post_meta($invoiceID, 'invoice_number', true);
        if(!$invoiceNumber) {
            $invoiceNumber = static::create_invoice_number($invoiceID);
        }

        return apply_filters( 'mec-invoice-number', $invoiceNumber, $invoiceID );
    }

    /**
    *  Create Invoice Number
    *
    *  @since     1.0.0
    */
    public static function create_invoice_number($invoiceID = false)
    {
        if($invoiceID) {
            $invoiceNumber = get_post_meta($invoiceID, 'invoice_number', true);
            if ($invoiceNumber) {
                return apply_filters('mec-invoice-number', $invoiceNumber, $invoiceID);
            }
        }

        $pattern = \MEC_Invoice\Helper::getOption('mec_invoice_number_pattern', '{number}');
        $length = \MEC_Invoice\Helper::getOption('mec_invoice_number_length', '0');
        $latest_cpt = get_posts("post_type=mec_invoice&numberposts=1");
        $last_invoice_id = isset($latest_cpt[0]->ID) ? $latest_cpt[0]->ID : '1';
        $start_point = \MEC_Invoice\Helper::getOption('mec_invoice_number_start_point', $last_invoice_id);
        $start_point--;
        $current_point = get_option( 'mec-invoice-number-current-point', $start_point );
        $current_point++;
        if($invoiceID) {
            update_option('mec-invoice-number-current-point', $current_point );
        }

        $current_point = sprintf("%0". $length ."d", $current_point);
        $invoiceNumber = str_replace('{number}', $current_point, $pattern);
        $invoiceNumber = apply_filters('mec-invoice-number', $invoiceNumber, $invoiceID);
        if($invoiceID) {
            update_post_meta($invoiceID, 'invoice_number', $invoiceNumber);
        }

        return $invoiceNumber;
    }
} //Invoice Helper