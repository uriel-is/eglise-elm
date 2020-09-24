<?php

namespace MEC_Invoice;

// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}
/**
 ** Mec Invoice Attendee Helpers.
 **
 ** @author     Webnus <info@webnus.biz>
 ** @package     Modern Events Calendar
 ** @since     1.0.0
 **/
class Attendee
{
    /**
    ** Do i have access to control attendees?
    ** return true/false
    ** @since     1.0.0
    */
    public static function doIHaveAccess () {
        $acceptedRoles = \MEC_Invoice\Helper::getOption('mec_invoice_checkin_roles', ['administrator']);
        $user = wp_get_current_user();
        foreach ($acceptedRoles as $role => $value) {

            if ($value == 'on' && in_array($role, (array) $user->roles)) {
               return true;
            } else if (in_array('administrator', (array) $user->roles)) {
                return true;
            }
        }
        return false;
    }

    /**
    ** Has Checked In?
    ** return true/false
    ** @since     1.0.0
    */
    public static function hasCheckedIn ( $invoiceID , $attendee , $place = null) {
        $book_id = get_post_meta($invoiceID, 'book_id', true);
        $event_id = get_post_meta($invoiceID, 'event_id', true);

        if (get_post_meta($invoiceID, 'checkedInTime-' . $place, true)) {
            return true;
        } else {
            return false;
        }
    }

    /**
    ** Do checkin operation.
    ** return true/false
    ** @since     1.0.0
    */
    public static function doCheckIn ( $invoiceID , $attendee , $place = null) {
        if (!static::doIHaveAccess()) {
            return -1;
        }

        if (static::hasCheckedIn($invoiceID, $attendee, $place)) {
            return true;
        }

        if(get_post_meta($invoiceID, 'checkedInTime-' . $place, true)) {
            return true;
        }

        $book_id = get_post_meta($invoiceID, 'book_id', true);
        $event_id = get_post_meta($invoiceID, 'event_id', true);

        if(!$book_id || !$event_id) {
            return false;
        }

        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        $transaction = get_option($transaction_id);
        $checkedInCount = get_post_meta($invoiceID, 'checkedInCount', true);
        do_action('mec-invoice-check-in', $invoiceID , $attendee , $place);
        if ($checkedInCount === "" ) {
            update_post_meta($invoiceID, 'checkedIn-' . $place, $attendee);
            update_post_meta($invoiceID, 'checkedInTime-' . $place, current_time('timestamp'));
            update_post_meta($invoiceID, 'checkedInCount', 1);
            return true;
        } else if ($checkedInCount < count($transaction['tickets'])) {
            update_post_meta($invoiceID, 'checkedIn-' . $place, $attendee);
            update_post_meta($invoiceID, 'checkedInTime-' . $place, current_time('timestamp'));
            update_post_meta($invoiceID, 'checkedInCount', $checkedInCount + 1);
            return true;
        } else {
            return false;
        }
    }

    /**
    ** Do uncheck operation.
    ** return true/false
    ** @since     1.0.0
    */
    public static function doCheckOut ( $invoiceID , $attendee , $place = null) {
        if (!static::doIHaveAccess()) {
            return -1;
        }

        if (!static::hasCheckedIn($invoiceID, $attendee, $place)) {
            return true;
        }

        if(!get_post_meta($invoiceID, 'checkedInTime-' . $place, true)) {
            return true;
        }

        $book_id = get_post_meta($invoiceID, 'book_id', true);
        $event_id = get_post_meta($invoiceID, 'event_id', true);

        if(!$book_id || !$event_id) {
            return false;
        }

        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        $transaction = get_option($transaction_id);
        $checkedInCount = get_post_meta($invoiceID, 'checkedInCount', true);

        do_action('mec-invoice-check-out', $invoiceID , $attendee , $place);
        if ($checkedInCount === "" ) {
            delete_post_meta($invoiceID, 'checkedIn-' . $place, $attendee);
            delete_post_meta($invoiceID, 'checkedInTime-' . $place, '');
            update_post_meta($invoiceID, 'checkedInCount', 1);
            return true;
        } else if ($checkedInCount <= count($transaction['tickets'])) {
            delete_post_meta($invoiceID, 'checkedIn-' . $place);
            delete_post_meta($invoiceID, 'checkedInTime-' . $place);
            update_post_meta($invoiceID, 'checkedInCount', $checkedInCount - 1);
            return true;
        } else {
            return false;
        }
    }

} //Attendee
