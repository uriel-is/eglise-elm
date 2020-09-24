<?php
namespace MEC_Invoice;

// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}
/**
** Mec Invoice Helpers.
**
** @author     Webnus <info@webnus.biz>
** @package     Modern Events Calendar
** @since     1.0.0
**/
class Helper
{
   /*
    **  Get MEC Options
    **
    **  @since     1.0.0
    */
    public static function getOption ($option, $default = false) {
        $main = \MEC::getInstance('app.libraries.main');
        $mec_settings = $main->get_settings();

        if ( isset( $mec_settings[$option] ) && !empty($mec_settings[$option])) {
            if(!is_array($mec_settings[$option]) && !is_object($mec_settings[$option])) {
                return \stripslashes(\htmlentities($mec_settings[$option]));
            }
            return $mec_settings[$option];
        }
        return $default;
    }

   /*
    **  Get Mec Events Last Event ID
    **
    **  @since     1.0.0
    */
    public static function LastEventID () {
        $InvoiceID = static::LastInvoiceID();
        return get_post_meta($InvoiceID, 'event_id', true);
    }

   /*
    **  Get ShortLink
    **
    **  @since     1.0.0
    */
    public static function getShortLink ($url) {
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir = $upload_dir . '/mec-invoices';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0700);
        }
        $filename = $upload_dir . '/invoice-db.php';
        if(!file_exists($filename)) {
            $content = '<?php die("Access Denied!"); ?>[]';
            file_put_contents($filename, $content);
        }

        $DB = file_get_contents($filename);
        $DB = str_replace('<?php die("Access Denied!"); ?>', '', $DB);
        $DB = json_decode($DB, true);
        $Hash = crypt(md5($url), 'st');
        $Hash = str_replace([DIRECTORY_SEPARATOR, '/'],'-',$Hash);
        if(!key_exists($Hash, $DB)) {
            $DB[$Hash] = $url;
            $content = '<?php die("Access Denied!"); ?>' . json_encode($DB);
            file_put_contents($filename, $content);
        }

        return get_site_url() . '/invoice/' . $Hash;
    }

    /*
    **  Get ShortLink
    **
    **  @since     1.0.0
    */
    public static function getShortLinkDes($Hash)
    {
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir = $upload_dir . '/mec-invoices';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0700);
        }
        $filename = $upload_dir . '/invoice-db.php';
        if (!file_exists($filename)) {
            return false;
        }

        $DB = file_get_contents($filename);
        $DB = str_replace('<?php die("Access Denied!"); ?>', '', $DB);
        $DB = json_decode($DB, true);
        if(!is_array($DB)) {
            $DB = [];
        }

        if (!key_exists($Hash, $DB)) {
            return false;
        }

        return $DB[$Hash];
    }



    /*
    **  Get Templates
    **
    **  @since     1.0.0
    */
    public static function getTemplate($name = 'invoice')
    {
        $path = realpath(MECINVOICEDIR . '/templates/' . $name . '.tpl');
        if (file_exists($path)) {
            $content = file_get_contents($path);
            preg_match_all('/\[\[(.*?)\]\]/i', $content, $translatableMatches);
            foreach ($translatableMatches[0] as $key => $text) {
                $content = str_replace($text, __($translatableMatches[1][$key], 'mec-invoice'), $content);
            }
            return $content;
        }
        return "";
    }

    /**
		* Get Event Date Label
		*
		* @since     1.0.0
		*/
		public static function get_date_label ($date, $event_id) {
			$date_format = 'Y-m-d';
            $time_format = get_option('time_format');
            $event_end_date  = '';
            if(strpos($date, ' - ')) {
                $event_date = $date ? explode(' - ', $date) : array();
            } else {
                $event_date = $date ? explode(':', $date) : array();
            }

            $event_start_time = $event_end_time = $new_event_start_time = $new_event_end_time = '';
            if(!isset($event_date[1])) {
                $event_date[1] = $event_date[0];
            }
            if (is_numeric($event_date[0]) and is_numeric($event_date[1])) {
                $start_datetime = date($date_format . ' ' . $time_format, $event_date[0]);
                $end_datetime = date($date_format . ' ' . $time_format, $event_date[1]);
            } else {
                $start_datetime = $event_date[0];
                $end_datetime = $event_date[1];
            }
			if (isset($start_datetime) and !empty($start_datetime)) {
				$new_event_start_time = explode(' ', $start_datetime);
			}
			if (isset($end_datetime) and !empty($end_datetime)) {
				$new_event_end_time = explode(' ', $end_datetime);
			}

			if (isset($new_event_start_time[1]) and !empty($new_event_start_time[1]) and isset($new_event_start_time[2]) and !empty($new_event_start_time[2]))  $event_start_time = $new_event_start_time[1] . ' ' . $new_event_start_time[2];


			if (isset($new_event_end_time[1]) and !empty($new_event_end_time[1]) and isset($new_event_end_time[2]) and !empty($new_event_end_time[2])) $event_end_time = $new_event_end_time[1] . ' ' . $new_event_end_time[2];

			if (isset($new_event_start_time[0]) and !empty($new_event_start_time[0]))  $event_start_date = $new_event_start_time[0];
			if (isset($new_event_end_time[0]) and !empty($new_event_end_time[0]))  $event_end_date = $new_event_end_time[0];

			$event = get_post($event_id);
			$render = \MEC::getInstance('app.libraries.render');
			$event->data = $render->data($event_id);
			$allday = isset($event->data->meta['mec_allday']) ? $event->data->meta['mec_allday'] : 0;
			if ($allday == '0' and isset($event->data->time) and trim($event->data->time['start'])) :
				$new_event_date = ($event_end_date == $event_start_date) ? $event_start_date : $event_start_date . ' ' . $event_start_time . ' - ' . $event_end_date . ' ' . $event_end_time;
			else :
				$new_event_date = ($event_end_date == $event_start_date) ? $event_start_date : $event_start_date . ' - ' . $event_end_date;
			endif;

			return $new_event_date;
		}

   /*
    **  Get Mec Last Invoice ID
    **
    **  @since     1.0.0
    */
    public static function LastInvoiceID () {

        if (isset($_GET['invoiceID']) && isset($_GET['makePreview'])) {
            $InvoiceID = htmlentities($_GET['invoiceID']);
            $Hash = htmlentities($_GET['makePreview']);
            if ($Hash == get_post_meta($InvoiceID, 'invoiceID', true)) {
                return $InvoiceID;
            }
        }
        global $wpdb;
        $LastRow = $wpdb->get_col("SELECT ID FROM {$wpdb->prefix}posts where post_type='mec_invoice' AND post_status!='auto-draft'  ORDER BY post_date DESC ");
        $ID = isset($LastRow[0]) ? $LastRow[0] : false;

        return $ID;
    }

   /*
    **  Get Mec Last Invoice Transaction ID
    **
    **  @since     1.0.0
    */
    public static function TransactionID () {
        $InvoiceID = static::LastInvoiceID();
        $book_id = get_post_meta($InvoiceID, 'book_id', true);
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);

        return $transaction_id;
    }

   /*
    **  Get Mec Last Invoice Discount
    **
    **  @since     1.0.0
    */
    public static function ِInvoiceDiscount ($InvoiceID = false, $attendee = false, $attendee_key = false) {

        if(!$InvoiceID) {
            $InvoiceID = static::LastInvoiceID();
        }

        if (!$attendee && get_post_meta($InvoiceID, 'attendee', true)) {
            $attendee = get_post_meta($InvoiceID, 'attendee', true);
        }
        $forAll = false;
        if($attendee == 'all') {
            $forAll = true;
        }

        $book_id = get_post_meta($InvoiceID, 'book_id', true);
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
         if(!$transaction_id) {
            $transaction_id = get_post_meta($book_id, 'transaction_id', true);
        }

        $transaction = get_option($transaction_id);
        if(!$transaction) {
            return 0;
        }

        $totalprc = $transaction['total'];
        $event_id =  \MEC_Invoice\Helper::LastEventID();
        $tickets = get_post_meta($event_id, 'mec_tickets', true);
        $ticketsHistory = [];
        $uCount = 0;
        if(!isset($transaction['first_for_all'])) {
            $transaction['first_for_all'] = false;
        }

        if (isset($_GET['attendee']) || $attendee && !$transaction['first_for_all'] == '1' || $attendee_key) {
            if(isset($_GET['attendee'])) {
                $attendee = $_GET['attendee'];
            }

            $totalprc = 0;
            foreach ($transaction['tickets'] as $key => $_ticket) {
                $key++;
                if (isset($_ticket['id'])) {
                    if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1' && !$attendee_key) {
                        $_ticket['count'] = $uCount;
                    }

                    if(!isset($tickets[$_ticket['id']])) {
                        continue;
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
                    if (!$attendee_key && $attendee != $_ticket['email'] && !$forAll) {
                        foreach ($transaction['tickets'] as $key => $value) {
                            if (isset($value['email'])) {
                                $uCount++;
                            }
                        }
                        continue;
                    }

                    if ($attendee_key && $attendee_key != $key) {
                        continue;
                    }

                    $_ticket['_name'] = $_ticket['name'];
                    if ($t) {
                        $_ticket['name']  = $t['name'];
                        $_ticket['price'] = $t['price'];
                    }
                    if (!isset($_ticket['price']) || !$_ticket['price']) {
                        $_ticket['price'] = 0;
                    }

                    if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1' && !$attendee_key) {
                        if (isset($ticketsHistory[$_ticket['name']])) {
                            continue;
                        }
                    }

                    $ticketCount = 0;
                    if(!$attendee_key) {
                        foreach ($transaction['tickets'] as $k => $__ticket) {
                            if ($__ticket['email'] == $_ticket['email']) {
                                $ticketCount++;
                            }
                        }
                    }
                    if ($attendee_key == $key) {
                        $ticketCount++;
                    }

                    $ticketsHistory[$_ticket['name']] = true;
                    $variations = [];
                    $__price = 0;
                    $factory = \MEC::getInstance('app.libraries.factory');
                    if (isset($_ticket['variations']) && !empty($_ticket['variations'])) :
                        $ticket_variations = $factory->main->ticket_variations($transaction['event_id']);
                    endif;
                    $totalprc += (($_ticket['price'] *  $ticketCount) + $__price);
                    if (isset($_ticket['variations']) && !empty($_ticket['variations'])) :
                        foreach ($_ticket['variations'] as $tk => $v) {
                            if ($v) {
                                if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1' && !$attendee_key) {
                                    $v = $v *  $ticketCount;
                                }
                                $totalprc += ($ticket_variations[$tk]['price'] * $v);
                            }
                        }
                    endif;
                }
            } // End Cart Items

            $discount = $fee = 0;
            foreach ($transaction['price_details']['details'] as $p) {
                if ($p['type'] == 'discount') {
                    $discount += $p['amount'];
                } elseif ($p['type'] == 'fee') {
                    $fee += $p['amount'];
                }
            }
            if(!$discount) {
                return 0;
            }
            if($attendee) {
                $percent =  $totalprc * 100 / ($transaction['total'] - $fee);
                $discount = ($discount / 100) * $percent;
            } else {
                $percent = $discount * 100 / $transaction['total'];
                $discount = ($discount / 100) * $percent;
                $discount = ($discount / 100) * $percent;
            }
        } else {
            $discount = 0;
            foreach ($transaction['price_details']['details'] as $p) {
                if ($p['type'] == 'discount') {
                    $discount += $p['amount'];
                }
            }
        }
        return $discount;
    }

   /*
    **  Get Mec Last Invoice Discount
    **
    **  @since     1.0.0
    */
    public static function ِInvoiceFee($InvoiceID = false, $attendee = false, $attendee_key = false) {

        if(!$InvoiceID) {
            $InvoiceID = static::LastInvoiceID();
        }

        if (!$attendee && get_post_meta($InvoiceID, 'attendee', true)) {
            $attendee = get_post_meta($InvoiceID, 'attendee', true);
        }
        $forAll = false;
        if($attendee == 'all') {
            $forAll = true;
        }

        $book_id = get_post_meta($InvoiceID, 'book_id', true);
        if(!$book_id) {
            return 0;
        }
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        if (!$transaction_id) {
            $transaction_id = get_post_meta($book_id, 'transaction_id', true);
        }

        $transaction = get_option($transaction_id);
        $totalprc = $transaction['total'];
        $event_id =  \MEC_Invoice\Helper::LastEventID();
        $tickets = get_post_meta($event_id, 'mec_tickets', true);
        $ticketsHistory = [];

        $uCount = 0;
        if(!isset($transaction['first_for_all'])) {
            $transaction['first_for_all'] = false;
        }

        if (isset($_GET['attendee']) || $attendee && $transaction['first_for_all'] != '1' || $attendee_key) {
            if(isset($_GET['attendee'])) {
                $attendee = $_GET['attendee'];
            }

            $totalprc = 0;
            foreach ($transaction['tickets'] as $key => $_ticket) {
                $key++;
                if (isset($_ticket['id'])) {
                    if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1' && !$attendee_key) {
                        $_ticket['count'] = $uCount;
                    }

                    if(!isset($tickets[$_ticket['id']])) {
                        continue;
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
                    if (!$attendee_key && $attendee != $_ticket['email'] && !$forAll) {
                        foreach ($transaction['tickets'] as $key => $value) {
                            if (isset($value['email'])) {
                                $uCount++;
                            }
                        }
                        continue;
                    }

                    if ($attendee_key && $attendee_key != $key) {
                        continue;
                    }

                    $_ticket['_name'] = $_ticket['name'];
                    if ($t) {
                        $_ticket['name']  = $t['name'];
                        $_ticket['price'] = $t['price'];
                    }
                    if (!isset($_ticket['price']) || !$_ticket['price']) {
                        $_ticket['price'] = 0;
                    }

                    if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1' && !$attendee_key) {
                        if (isset($ticketsHistory[$_ticket['name']])) {
                            continue;
                        }
                    }

                    $ticketCount = 0;
                    if(!$attendee_key) {
                        foreach ($transaction['tickets'] as $k => $__ticket) {
                            if ($__ticket['email'] == $_ticket['email']) {
                                $ticketCount++;
                            }
                        }
                    }
                    if ($attendee_key && $attendee_key == $key) {
                        $ticketCount++;
                    }

                    $ticketsHistory[$_ticket['name']] = true;
                    $factory = \MEC::getInstance('app.libraries.factory');
                    if (isset($_ticket['variations']) && !empty($_ticket['variations'])) :
                        $ticket_variations = $factory->main->ticket_variations($transaction['event_id']);
                    endif;
                    $totalprc += $_ticket['price'] *  $ticketCount;
                    if (isset($_ticket['variations']) && !empty($_ticket['variations'])) :
                        foreach ($_ticket['variations'] as $tk => $v) {
                            if ($v) {
                                if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1' && !$attendee_key) {
                                    $v = $v *  $ticketCount;
                                }
                                $totalprc += ($ticket_variations[$tk]['price'] * $v);
                            }
                        }
                    endif;
                }
            } // End Cart Items

            $discount = $fee = 0;
            foreach ($transaction['price_details']['details'] as $p) {
                if ($p['type'] == 'discount') {
                    $discount += $p['amount'];
                } elseif ($p['type'] == 'fee') {
                    $fee += $p['amount'];
                }
            }

            if(!$fee) {
                return 0;
            }

            if(!$transaction['total']) {
                $transaction['total'] = 1;
            }
            if($discount) {
                if($attendee) {
                    $percent =  $totalprc * 100 / ($transaction['total'] - $fee);
                } else {
                    $percent = $discount * 100 / $transaction['total'];
                }
            } else {
                $percent = ($totalprc * 100) / ($transaction['total'] - $fee);
            }
            $fee = ($fee / 100) * $percent;
        } else {
            $fee = 0;
            foreach ($transaction['price_details']['details'] as $p) {
                if ($p['type'] == 'fee') {
                    $fee += $p['amount'];
                }
            }
        }
        return $fee;
    }

   /*
    **  Get Mec Last Invoice Total Price
    **
    **  @since     1.0.0
    */
    public static function TotalPrice ($InvoiceID = false, $attendee = false, $attendee_key = false) {
        if(!$InvoiceID) {
            $InvoiceID = static::LastInvoiceID();
        }

        if (!$attendee && get_post_meta($InvoiceID, 'attendee', true)) {
            $attendee = get_post_meta($InvoiceID, 'attendee', true);
        }
        $forAll = false;
        if($attendee == 'all') {
            $forAll = true;
        }

        $book_id = get_post_meta($InvoiceID, 'book_id', true);
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        $transaction = get_option($transaction_id);
        $totalprc = $transaction['total'];
        $event_id =  \MEC_Invoice\Helper::LastEventID();
        $tickets  = get_post_meta($event_id, 'mec_tickets', true);
        $ticketsHistory = [];

        if(!isset($transaction['first_for_all'])) {
            $transaction['first_for_all'] = false;
        }
        $uCount = 0;
        if (isset($_GET['attendee']) || $attendee && !$transaction['first_for_all'] == '1' || $attendee_key) {
            if(isset($_GET['attendee'])) {
                $attendee = $_GET['attendee'];
            }

            $totalprc = 0;
            foreach ($transaction['tickets'] as $key => $_ticket) {
                $key++;
                if (isset($_ticket['id'])) {
                    if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1' && !$attendee_key) {
                        $_ticket['count'] = $uCount;
                    }

                    if(!isset($tickets[$_ticket['id']])) {
                        continue;
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
                    if (!$attendee_key && $attendee != $_ticket['email'] && !$forAll) {
                        foreach ($transaction['tickets'] as $key => $value) {
                            if (isset($value['email'])) {
                                $uCount++;
                            }
                        }
                        continue;
                    }

                    if ($attendee_key && $attendee_key != $key) {
                        continue;
                    }

                    $_ticket['_name'] = $_ticket['name'];
                    if ($t) {
                        $_ticket['name']  = $t['name'];
                        $_ticket['price'] = $t['price'];
                    }
                    if (!isset($_ticket['price']) || !$_ticket['price']) {
                        $_ticket['price'] = 0;
                    }

                    if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1' && !$attendee_key) {
                        if (isset($ticketsHistory[$_ticket['name']])) {
                            continue;
                        }
                    }

                    $ticketCount = 0;
                    if(!$attendee_key) {
                        foreach ($transaction['tickets'] as $k => $__ticket) {
                            if ($__ticket['email'] == $_ticket['email']) {
                                $ticketCount++;
                            }
                        }
                    }
                    if ($attendee_key && $attendee_key == $key) {
                        $ticketCount++;
                    }

                    $ticketsHistory[$_ticket['name']] = true;
                    $factory = \MEC::getInstance('app.libraries.factory');
                    if (isset($_ticket['variations']) && !empty($_ticket['variations'])) :
                        $ticket_variations = $factory->main->ticket_variations($transaction['event_id']);
                    endif;
                    $totalprc += $_ticket['price'] *  $ticketCount;
                    if (isset($_ticket['variations']) && !empty($_ticket['variations'])) :
                        foreach ($_ticket['variations'] as $tk => $v) {
                            if ($v) {
                                if (isset($transaction['first_for_all']) && $transaction['first_for_all'] == '1' && !$attendee_key) {
                                    $v = $v *  $ticketCount;
                                }
                                $totalprc += ($ticket_variations[$tk]['price'] * $v);
                            }
                        }
                    endif;
                }
            } // End Cart Items


            $Discount = $Fee = 0;
            foreach ($transaction['price_details']['details'] as $p) {
                if ($p['type'] == 'discount') {
                    $Discount += $p['amount'];
                } elseif ($p['type'] == 'fee') {
                    $Fee += $p['amount'];
                }
            }

            $fee = static::ِInvoiceFee($InvoiceID, $attendee,$attendee_key);
            $discount = static::ِInvoiceDiscount($InvoiceID, $attendee,$attendee_key);
            if( $discount ) {
                if($attendee) {
                    $percent =  $totalprc * 100 / ($transaction['total'] - $Fee);
                } else {
                    $percent = $discount * 100 / $transaction['total'] - $Fee;
                    $totalprc = ($totalprc / 100) * $percent;
                }
            }
            $totalprc += $fee - $discount;
        } else {
            if ($totalprc == \MEC_Invoice\Helper::ِInvoiceFee()) {
                $totalprc = 0;
            } else {
                $discount = static::ِInvoiceDiscount($InvoiceID, $attendee,$attendee_key);
                $totalprc -= $discount;
            }
        }

        return $totalprc;
    }
   /*
    **  Get Mec Last Invoice Total Price
    **
    **  @since     1.0.0
    */
    public static function GetTotalPrice ($InvoiceID = false) {
        if(!$InvoiceID) {
            $InvoiceID = static::LastInvoiceID();
        }
        $book_id = get_post_meta($InvoiceID, 'book_id', true);
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        $transaction = get_option($transaction_id);
        $totalprc = $transaction['total'];
        $event_id =  \MEC_Invoice\Helper::LastEventID();
        $tickets = get_post_meta($event_id, 'mec_tickets', true);
        $ticketsHistory = [];
        $totalprc = 0;
        foreach ($transaction['tickets'] as $key => $_ticket) {
            $key++;
            if (isset($_ticket['id'])) {
                if(!isset($tickets[$_ticket['id']])) {
                    continue;
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


                $_ticket['_name'] = $_ticket['name'];
                if ($t) {
                    $_ticket['name']  = $t['name'];
                    $_ticket['price'] = $t['price'];
                }
                if (!isset($_ticket['price']) || !$_ticket['price']) {
                    $_ticket['price'] = 0;
                }

                $ticketsHistory[$_ticket['name']] = true;
                $factory = \MEC::getInstance('app.libraries.factory');
                if (isset($_ticket['variations']) && !empty($_ticket['variations'])) :
                    $ticket_variations = $factory->main->ticket_variations($transaction['event_id']);
                endif;
                $totalprc += $_ticket['price'];
                if (isset($_ticket['variations']) && !empty($_ticket['variations'])) :
                    foreach ($_ticket['variations'] as $tk => $v) {
                        if ($v) {
                            $totalprc += ($ticket_variations[$tk]['price'] * $v);
                        }
                    }
                endif;
            }
        } // End Cart Items
        return $totalprc;
    }

   /*
    **  Get Mec Last Attendees
    **
    **  @since     1.0.0
    */
    public static function Attendees () {
        $InvoiceID = static::LastInvoiceID();
        $book_id = get_post_meta($InvoiceID, 'book_id', true);
        $attendees = get_post_meta($book_id, 'mec_attendees', true);

        return $attendees;
    }

} //Helper