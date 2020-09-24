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
 **  InvoiceView.
 **
 **  @author      Webnus <info@webnus.biz>
 **  @package     Modern Events Calendar
 **  @since       1.0.0
 **/
class InvoiceView
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
        add_action('admin_init', [self::$instance, 'metaBoxInit']);
        add_action('save_post', [self::$instance, 'saveInvoice']);
    }

    /*
    **  Global Variables.
    **
    **  @since   1.0.0
    */
    public static function settingUp($This)
    {
        self::$dir  = MECINVOICEDIR . 'core' . DS . 'metabox';
    }

    /*
    **  Global Variables.
    **
    **  @since   1.0.0
    */
    public static function saveInvoice($invoiceID)
    {
        if (!isset($_POST['mec_invoice_edit_page'])) {
            return;
        }
        $is_edit_booking = isset($_POST['mec_booking_edit_status']) ? sanitize_text_field($_POST['mec_booking_edit_status']) : 0;
        if ($is_edit_booking) {
            $post_id = get_post_meta($invoiceID, 'book_id', true);
            $book = \MEC::getInstance('app.libraries.book');
            $event_id = isset($_POST['mec_event_id']) ? sanitize_text_field($_POST['mec_event_id']) : '';
            if ($event_id) update_post_meta($post_id, 'mec_event_id', $event_id);

            $mec_date = isset($_POST['mec_date']) ? sanitize_text_field($_POST['mec_date']) : '';
            if ($mec_date) update_post_meta($post_id, 'mec_date', $mec_date);

            // Attendees
            $mec_attendees = get_post_meta($post_id, 'mec_attendees', true);
            $mec_atts = (isset($_POST['mec_att']) and is_array($_POST['mec_att'])) ? $_POST['mec_att'] : array();

            $ticket_ids = '';
            $raw_tickets = array();
            $raw_variations = array();

            $new_attendees = array();
            foreach ($mec_atts as $key => $mec_att) {
                $original = isset($mec_attendees[$key]) ? $mec_attendees[$key] : array();

                $new_attendee = array_merge($original, $mec_att);
                $new_attendees[] = $new_attendee;

                $ticket_id = isset($mec_att['id']) ? $mec_att['id'] : '';
                if ($ticket_id) {
                    $ticket_ids .= $mec_att['id'] . ',';

                    if (!isset($raw_tickets[$ticket_id])) $raw_tickets[$ticket_id] = 1;
                    else $raw_tickets[$ticket_id]++;

                    if (isset($new_attendee['variations']) and is_array($new_attendee['variations']) and count($new_attendee['variations'])) {
                        foreach ($new_attendee['variations'] as $variation_id => $variation_count) {
                            if (!trim($variation_count)) continue;

                            if (!isset($raw_variations[$variation_id])) $raw_variations[$variation_id] = $variation_count;
                            else $raw_variations[$variation_id] += $variation_count;
                        }
                    }
                }
            }

            update_post_meta($post_id, 'mec_attendees', $new_attendees);
            update_post_meta($post_id, 'mec_ticket_id', ',' . trim($ticket_ids, ', ') . ',');

            // Pricing
            $event_tickets = get_post_meta($event_id, 'mec_tickets', true);
            $price_details = $book->get_price_details($raw_tickets, $event_id, $event_tickets, $raw_variations);

            update_post_meta($post_id, 'mec_price', $price_details['total']);

            $transaction_id = get_post_meta($post_id, 'mec_transaction_id', true);
            $transaction = $book->get_transaction($transaction_id);

            // Update Transaction
            $transaction['event_id'] = $event_id;
            $transaction['tickets'] = $new_attendees;
            $transaction['date'] = $mec_date;
            $transaction['price_details'] = $price_details;
            $transaction['total'] = $price_details['total'];
            $transaction['discount'] = 0;
            $transaction['price'] = $price_details['total'];
            $transaction['coupon'] = NULL;

            $book->update_transaction($transaction_id, $transaction);
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
            add_meta_box('mec_invoice_information', __('Invoice Information', 'mec-invoice'), [self::$instance, 'render_meta_box'], 'mec_invoice', 'normal');
        }
    }

    /*
    **  Render Meta Box
    **
    **  @since     1.0.0
    */
    public function render_meta_box()
    {
        $invoiceID = get_the_ID();
        $book_id = get_post_meta($invoiceID, 'book_id', true);
        $price = \MEC_Invoice\Helper::TotalPrice($invoiceID);
        $invoice_date = get_post_meta($invoiceID, 'date', true);
        $confirmed = get_post_meta($invoiceID, 'confirmed', true);
        $event_id = get_post_meta($invoiceID, 'event_id', true);
        $post_author = get_post_field('post_author', $book_id);
        $main = new \MEC_main();
        $meta = $main->get_post_meta($book_id);
        $date_format = 'Y-m-d';
        $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
        if(!$transaction_id) {
            $transaction_id = get_post_meta($book_id, 'transaction_id', true);
        }

        $transaction = get_option($transaction_id, array());
        if(!$transaction) {

            echo __('The transaction ID is missed!', 'mec-invoice');
            return;
        }

        $quantity = count($transaction['tickets']);
        $confirmed = get_post_meta($book_id, 'mec_confirmed', true);
        $verified = get_post_meta($book_id, 'mec_verified', true);
        $main = \MEC::getInstance('app.libraries.main');
        $confirmed = $main->get_confirmation_label($confirmed);
        $verified = $main->get_verification_label($verified);
        $hash = get_post_meta($invoiceID, 'invoiceID', true);
        $paymentGateway = get_post_meta($book_id, 'mec_gateway_label', true);
        $meta = $main->get_post_meta($book_id);

        // Events
        $events = $main->get_events();

        // Ticket Variations
        $ticket_variations = $main->ticket_variations($event_id);
        $settings = $main->get_settings();

        $date_format = (isset($settings['booking_date_format1']) and trim($settings['booking_date_format1'])) ? $settings['booking_date_format1'] : 'Y-m-d';

        $render = \MEC::getInstance('app.libraries.render');
        $occurrences = $render->dates($event_id, NULL, 10);
        if($paymentGateway == 'Add to cart') {
            $orderID = get_post_meta($book_id, 'mec_order_id', true);
            if($orderID)
                $paymentGateway = '<a href="'.get_edit_post_link($orderID).'" target="_blank">'.$paymentGateway . ' ('.$orderID.')'.'</a>';
        }
        $date = \MEC_Invoice\Helper::get_date_label($transaction['date'], $event_id);
        $meta_data = [
            'Invoice' => '<a href="' . get_site_url(null, '?invoiceID=' . $invoiceID . '&makePreview=' . $hash) . '" target="_blank">' . esc_html__('View', 'mec-invoice') . '</a>',
            'Hash' => $hash,
            'Number' => \MEC_Invoice\Helper\Invoice::get_invoice_number($invoiceID),
            'Transaction ID' => $transaction_id,
            'Book ID' => '<a href="' . get_edit_post_link($book_id) . '" target="_blank">' . $book_id . '</a>',
            'Event Date' => $date,
            'Event' => '<a href="' . get_the_permalink($event_id) . '" target="_blank">' . get_the_title($event_id) . '</a>',
            'Email' => get_the_author_meta('email', $post_author),
            'Total Attendees' => $quantity,
            'Total Price' => \MEC_Invoice\Helper::getOption('currency', false) . $price,
            'Status' => '<span class="' . $confirmed . '">' . $confirmed . '</span>',
            'Verification' => '<span class="' . $verified . '">' . $verified . '</span>',
            'Submitted on ' => date_i18n(get_option('date_format') . ' - ' . get_option('time_format'), $invoice_date),
            'Payment Gateway' => $paymentGateway ? $paymentGateway : 'Pay Locally',
            // 'Address' => ''
        ];
        echo '<style>#wp-admin-bar-view{display:none;}</style>';
        echo '<div class="mec-invoice-meta-box">';
        foreach ($meta_data as $meta_name => $meta_value) {
                echo '<label>' . esc_html__($meta_name, 'mec-invoice') . ': <strong>' . $meta_value . '</strong>' . '</label>';
        }
        echo '<div class="clear"></div>';
        echo '<h2>' . esc_attr__('Attendees', 'mec-invoice') . '</h2>';
        $attendees = get_post_meta($book_id, 'mec_attendees', true);

        $reg_fields = $main->get_reg_fields($event_id);
        $tickets = get_post_meta($event_id, 'mec_tickets', true);
        $attendees = is_array($attendees) ? $attendees : [];

        foreach ($attendees as $key => $attendee) : $reg_form = isset($attendee['reg']) && is_array($attendee['reg']) ? $attendee['reg'] : array();
            if ($key === 'attachments') continue;
            if (isset($attendee[0]['MEC_TYPE_OF_DATA'])) continue;

            if (get_post_meta($invoiceID, 'attendee', true) && get_post_meta($invoiceID, 'attendee', true) != $attendee['email']) {
                continue;
            }
            $key++;
            if (!Attendee::hasCheckedIn($invoiceID, $attendee['email'], $key)) {
                $checked_id = 'no';
                $checkedTime = '-';
            } else {
                $checked_id = 'yes';
                $checkedTime = date_i18n(get_option('date_format') . ' - ' . get_option('time_format'), get_post_meta($invoiceID, 'checkedInTime-' . $key, true));
            }

?>
            <div class="mec-attendee">
                <img class="attendee-profile" src="<?php echo get_avatar_url($attendee['email']); ?>" />
                <h4><strong><?php echo ((isset($attendee['name']) and trim($attendee['name'])) ? $attendee['name'] : '---'); ?></strong></h4>
                <div class="mec-row">
                    <strong><?php _e('Email', 'mec-invoice'); ?>: </strong>
                    <span><?php echo ((isset($attendee['email']) and trim($attendee['email'])) ? $attendee['email'] : '---'); ?></span>
                </div>
                <div class="mec-row">
                    <strong><?php echo $main->m('ticket', __('Ticket', 'mec-invoice')); ?>: </strong>
                    <span><?php echo ((isset($attendee['id']) and isset($tickets[$attendee['id']]['name'])) ? $tickets[$attendee['id']]['name'] : __('Unknown', 'mec-invoice')); ?></span>
                </div>
                <?php
                // Ticket Variations
                if (isset($attendee['variations']) and is_array($attendee['variations']) and count($attendee['variations'])) {
                    $ticket_variations = $main->ticket_variations($event_id);
                    foreach ($attendee['variations'] as $variation_id => $variation_count) {
                        if (!$variation_count or ($variation_count and $variation_count < 0)) continue;

                        $variation_title = (isset($ticket_variations[$variation_id]) and isset($ticket_variations[$variation_id]['title'])) ? $ticket_variations[$variation_id]['title'] : '';
                        if (!trim($variation_title)) continue;

                        echo '<div class="mec-row">
                            <span> ' . $variation_title . '</span>
                            <span>(' . $variation_count . ')</span>
                        </div>';
                    }
                }
                foreach ($reg_form as $field_id => $value) :
                    $label = isset($reg_fields[$field_id]) ? $reg_fields[$field_id]['label'] : '';
                    $type = isset($reg_fields[$field_id]) ? $reg_fields[$field_id]['type'] : '';
                    if ($type == 'agreement') : ?>
                        <div class="mec-row">
                            <strong><?php echo sprintf(__($label, 'mec-invoice'), '<a href="' . get_the_permalink($reg_fields[$field_id]['page']) . '">' . get_the_title($reg_fields[$field_id]['page']) . '</a>'); ?>: </strong>
                            <span><?php echo ($value == '1' ? __('Yes', 'mec-invoice') : __('No', 'mec-invoice')); ?></span>
                        </div>
                    <?php elseif($label != 'Send Email') : ?>
                        <div class="mec-row">
                            <strong><?php _e($label, 'mec-invoice'); ?>: </strong>
                            <span><?php echo (is_string($value) ? $value : (is_array($value) ? implode(', ', $value) : '---')); ?></span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="mec-row mec-invoice-ticket-checked-in-date">
                    <strong><?php _e('Checked in', 'mec-invoice'); ?>: </strong>
                    <span><?php echo $checkedTime; ?></span>
                </div>
                <?php
                if (get_post_meta($book_id, 'mec_verified', true) === '1') {
                ?>
                    <div class="checked-in-status status-<?php echo $checked_id; ?>" data-id="<?php echo $book_id ?>" data-invoice-id="<?php echo $invoiceID ?>" data-me="<?php echo $attendee['email']; ?>" data-place="<?php echo $key; ?>">
                        <?php if (Attendee::hasCheckedIn($invoiceID, $attendee['email'], $key)) : ?>
                            <?php echo __('Uncheck', 'mec-invoice'); ?>
                        <?php else : ?>
                            <?php echo __('Checkin', 'mec-invoice'); ?>
                        <?php endif; ?>
                    </div>
                <?php
                }
                ?>

            </div>
        <?php
        endforeach;
        echo '</div>';
        echo '<div>';
        ?>
        <div class="mec-book-edit">
            <h1 id="mec_booking_edit_heading"><?php _e('Edit Booking', 'mec'); ?></h1>
            <div class="info-msg"><?php _e('Do not edit the booking unless it is really needed!', 'mec'); ?></div>

            <input type="hidden" name="mec_invoice_edit_page" value="1">
            <input type="hidden" name="mec_booking_edit_status" value="0">
            <input type="checkbox" name="mec_booking_edit_status" id="mec_booking_edit_status" value="1" onchange="jQuery('#mec_book_edit_form').toggleClass('mec-util-hidden');">
            <label for="mec_booking_edit_status"><?php _e('I need to edit the booking details', 'mec'); ?></label>

            <div id="mec_book_edit_form" class="mec-book-form mec-util-hidden">
                <div class="mec-form-row">
                    <div class="mec-col-2">
                        <label for="mec_book_form_event_id"><?php _e('Event', 'mec'); ?></label>
                    </div>
                    <div class="mec-col-6">
                        <select id="mec_book_form_event_id" class="widefat" name="mec_event_id">
                            <option value="">-----</option>
                            <?php foreach ($events as $event) : ?>
                                <option value="<?php echo $event->ID; ?>" <?php echo ($event_id == $event->ID ? 'selected="selected"' : ''); ?>><?php echo $event->post_title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div id="mec_book_edit_form_event_message">
                </div>
                <div id="mec_book_edit_form_event_options">
                    <div class="mec-form-row">
                        <div class="mec-col-2">
                            <label for="mec_book_form_date"><?php _e('Date', 'mec'); ?></label>
                        </div>
                        <div class="mec-col-6">
                            <select id="mec_book_form_date" class="widefat mec-booking-edit-form-dates" name="mec_date">
                                <option value="">-----</option>
                                <?php $book = \MEC::getInstance('app.libraries.book'); ?>
                                <?php foreach($occurrences as $occurrence): $occ_timestamp = $book->timestamp($occurrence['start'], $occurrence['end']); ?>
                                    <option value="<?php echo $occ_timestamp; ?>" <?php echo (($meta['mec_date'] == $occ_timestamp or $meta['mec_date'] == $occurrence['start']['date'].':'.$occurrence['end']['date']) ? 'selected="selected"' : ''); ?>>
                                        <?php echo strip_tags($main->date_label($occurrence['start'], $occurrence['end'], $date_format)); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mec-form-row">
                        <div class="mec-col-8" style="text-align: right;">
                            <button type="button" class="button mec-add-attendee"><?php _e('Add Attendee', 'mec'); ?></button>
                        </div>
                    </div>
                    <div id="mec_date_tickets_booking_form_attendees">
                        <h3><?php _e('Attendees', 'mec'); ?></h3>
                        <div id="mec_date_tickets_booking_form_attendees_list">
                            <?php $i = 0;
                            foreach ($attendees as $key => $attendee) : $i = max($i, $key); ?>
                                <?php
                                if ($key === 'attachments') continue;
                                if (isset($attendee[0]['MEC_TYPE_OF_DATA'])) continue;
                                ?>
                                <div class="mec-attendee" id="mec_attendee<?php echo $key; ?>">
                                    <hr>
                                    <div class="mec-form-row">
                                        <div class="mec-col-8" style="text-align: right;">
                                            <button type="button" class="button mec-remove-attendee" data-key="<?php echo $key; ?>"><?php _e('Remove Attendee', 'mec'); ?></button>
                                        </div>
                                    </div>
                                    <div class="mec-form-row">
                                        <div class="mec-col-2">
                                            <label for="att_<?php echo $key; ?>_name"><?php _e('Name', 'mec'); ?></label>
                                        </div>
                                        <div class="mec-col-6">
                                            <input type="text" value="<?php echo ((isset($attendee['name']) and trim($attendee['name'])) ? $attendee['name'] : ''); ?>" id="att_<?php echo $key; ?>_name" name="mec_att[<?php echo $key; ?>][name]" placeholder="<?php esc_attr_e('Name', 'mec'); ?>" class="widefat">
                                        </div>
                                    </div>
                                    <div class="mec-form-row">
                                        <div class="mec-col-2">
                                            <label for="att_<?php echo $key; ?>_email"><?php _e('Email', 'mec'); ?></label>
                                        </div>
                                        <div class="mec-col-6">
                                            <input type="email" value="<?php echo ((isset($attendee['email']) and trim($attendee['email'])) ? $attendee['email'] : ''); ?>" id="att_<?php echo $key; ?>_email" name="mec_att[<?php echo $key; ?>][email]" placeholder="<?php esc_attr_e('Email', 'mec'); ?>" class="widefat">
                                        </div>
                                    </div>
                                    <div class="mec-form-row">
                                        <div class="mec-col-2">
                                            <label for="att_<?php echo $key; ?>_ticket"><?php echo $main->m('ticket', __('Ticket', 'mec')); ?></label>
                                        </div>
                                        <div class="mec-col-6">
                                            <select id="att_<?php echo $key; ?>_ticket" name="mec_att[<?php echo $key; ?>][id]" class="widefat mec-booking-edit-form-tickets">
                                                <?php foreach ($tickets as $t_id => $ticket) : ?>
                                                    <option value="<?php echo $t_id; ?>" <?php echo ($t_id == $attendee['id'] ? 'selected="selected"' : ''); ?>><?php echo $ticket['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if (isset($settings['ticket_variations_status']) and $settings['ticket_variations_status'] and count($ticket_variations)) : ?>
                                        <div class="mec-book-ticket-variations" data-key="<?php echo $key; ?>">
                                            <?php foreach ($ticket_variations as $ticket_variation_id => $ticket_variation) : if (!is_numeric($ticket_variation_id) or !isset($ticket_variation['title']) or (isset($ticket_variation['title']) and !trim($ticket_variation['title']))) continue; ?>
                                                <div class="mec-form-row">
                                                    <div class="mec-col-2">
                                                        <label for="mec_att_<?php echo $key; ?>_variations_<?php echo $ticket_variation_id; ?>" class="mec-ticket-variation-name"><?php echo $ticket_variation['title']; ?></label>
                                                    </div>
                                                    <div class="mec-col-6">
                                                        <input id="mec_att_<?php echo $key; ?>_variations_<?php echo $ticket_variation_id; ?>" type="number" min="0" max="<?php echo ((is_numeric($ticket_variation['max']) and $ticket_variation['max']) ? $ticket_variation['max'] : 1); ?>" name="mec_att[<?php echo $key; ?>][variations][<?php echo $ticket_variation_id; ?>]" value="<?php echo (isset($attendee['variations']) and isset($attendee['variations'][$ticket_variation_id])) ? $attendee['variations'][$ticket_variation_id] : 0; ?>">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" id="mec_booking_edit_new_key" value="<?php echo $i + 1; ?>">
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.mec-remove-attendee').on('click', function() {
                    var key = jQuery(this).data('key');
                    jQuery('#mec_attendee' + key).remove();
                });
                if(jQuery('#wp-admin-bar-view').length) {
                    jQuery('#wp-admin-bar-view').css('display', 'inline-block');
                    var url = '<?php echo get_site_url(null, '?invoiceID=' . $invoiceID . '&makePreview=' . $hash); ?>';
                    jQuery('#wp-admin-bar-view').find('a').attr('href', url);
                }

                jQuery('.mec-add-attendee').on('click', function() {
                    var key = jQuery('#mec_booking_edit_new_key').val();
                    var event_id = jQuery('#mec_book_form_event_id').val();

                    jQuery('#mec_book_edit_form_event_message').html('');

                    jQuery.ajax({
                        url: "<?php echo admin_url('admin-ajax.php', NULL); ?>",
                        data: "action=mec_bbf_edit_event_add_attendee&event_id=" + event_id + "&key=" + key,
                        dataType: "json",
                        type: "GET",
                        success: function(response) {
                            if (response.success === 1) {
                                jQuery('#mec_date_tickets_booking_form_attendees_list').append(response.output);
                                jQuery('#mec_booking_edit_new_key').val(parseInt(key) + 1);

                                jQuery('html, body').animate({
                                    scrollTop: jQuery("#mec_attendee" + key).offset().top
                                }, 500);
                            } else {
                                jQuery('#mec_book_edit_form_event_message').html(response.output);
                            }
                        },
                        error: function() {}
                    });
                });

                jQuery('#mec_book_form_event_id').on('change', function() {
                    var event_id = this.value;
                    jQuery('#mec_book_edit_form_event_message').html('');

                    jQuery.ajax({
                        url: "<?php echo admin_url('admin-ajax.php', NULL); ?>",
                        data: "action=mec_bbf_edit_event_options&event_id=" + event_id,
                        dataType: "json",
                        type: "GET",
                        success: function(response) {
                            if (response.success === 1) {
                                jQuery('.mec-booking-edit-form-dates').html(response.dates);
                                jQuery('.mec-booking-edit-form-tickets').html(response.tickets);

                                jQuery(".mec-book-ticket-variations").each(function() {
                                    var key = jQuery(this).data('key');
                                    jQuery(this).html(response.variations.replace(/:key:/g, key));
                                });

                                jQuery('#mec_book_edit_form_event_options').show();
                            } else {
                                jQuery('#mec_book_edit_form_event_message').html(response.output);
                                jQuery('#mec_book_edit_form_event_options').hide();
                            }
                        },
                        error: function() {}
                    });
                });
            });
        </script>
<?php
        echo '</div>';
    }
} //InvoiceView
