<?php

namespace MEC_Invoice\Core\PostTypes;

use MEC_Invoice\Attendee;
// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

/**
*  MecInvoice.
*
*  @author      Webnus <info@webnus.biz>
*  @package     Modern Events Calendar
*  @since       1.0.0
*/
class MecInvoice
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
    * The Args
    *
    * @access  public
    * @var     array
    */
    public static $args;

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
        self::setHooks($this);
        self::init();
    }

   /**
    * Set Hooks.
    *
    * @since   1.0.0
    */
    public static function setHooks($This)
    {
        add_action('init', [$This, 'postTypeInit'], 99);
        add_filter('bulk_actions-edit-mec_invoice', [$This, 'applyBulkActions']);
        add_filter('handle_bulk_actions-edit-mec_invoice', [$This, 'bulkActionsHandler'], 10, 3);
        add_filter('post_row_actions', [$This,'customizeRowActions'], 10, 2);
        add_filter('manage_edit-mec_invoice_columns', [$This,'customizeColumns'],100,1);
        add_action('manage_mec_invoice_posts_custom_column', [$This, 'customizeRows'], 10, 2);
        add_filter('manage_edit-mec_invoice_sortable_columns', [$This,'customizeSortableColumns']);
        add_action('restrict_manage_posts', [$This, 'addFilteringOptions'], 10, 2);
        add_action('current_screen', [$This, 'invoicesBadge']);
        add_filter('parse_query',  [$This, 'applyFilteringOptions']);
        add_action('pre_get_posts', [$This, 'applyOrdering']);
        add_action('admin_menu', [$This, 'adminMenuRoles'],1);
        add_action('parse_query', [$This, 'parse_query'],1);
        add_action('admin_enqueue_scripts', [$This, 'dequeue_auto_save']);
    }

    /**
    * Access to management area in some roles
    *
    * @since   1.0.0
    */
    public static function adminMenuRoles()
    {
        if (!Attendee::doIHaveAccess()) {
            remove_menu_page('edit.php?post_type=mec_invoice');
        }
    }

    /**
     * Dequeue Auto Save Script
     *
     * @since   1.0.0
     */
    public static function dequeue_auto_save()
    {
        if (is_admin() && 'mec_invoice' == get_post_type()) {
            wp_dequeue_script('autosave');
        }
    }

    /**
    * customize parse_query for search action
    *
    * @since   1.0.0
    */
    public static function parse_query($query)
    {
        global $pagenow;
        if (is_admin() && $pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] != 'mec-invoice' && isset($_GET['s'])) {
            $query->query_vars['s'] = "";

            $query->set('meta_query', array(
                'relation' => 'OR',
                array(
                    'key'     => 'invoice_number',
                    'compare' => '=',
                    'value'   => esc_attr($_GET['s']),
                ),
                array(
                    'key'     => 'book_id',
                    'compare' => '=',
                    'value'   => esc_attr($_GET['s']),
                ),
                array(
                    'key'     => 'transaction_id',
                    'compare' => '=',
                    'value'   => esc_attr($_GET['s']),
                )
            ));
        }
    }

    /**
    * Apply Filtering Options
    *
    * @since   1.0.0
    */
    public static function applyOrdering($query)
    {
        global $pagenow;
        $type = 'post';
        if (isset($_GET['post_type'])) {
            $type = $_GET['post_type'];
        }

        $meta_query = [];
        if ('mec_invoice' == $type && is_admin() && $pagenow == 'edit.php' && isset($_GET['orderby']) && $_GET['orderby'] == 'status' && $query->is_main_query()) {
            $query->set('meta_key', 'status');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', isset($_GET['order']) ? htmlentities($_GET['order']) : 'desc');
        } else if ('mec_invoice' == $type && is_admin() && $pagenow == 'edit.php' && isset($_GET['orderby']) && $_GET['orderby'] == 'totalPrice' && $query->is_main_query()) {
            $query->set('meta_key', 'price');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', isset($_GET['order']) ? htmlentities($_GET['order']) : 'desc');
        } else if ('mec_invoice' == $type && is_admin() && $pagenow == 'edit.php' && isset($_GET['orderby']) && $_GET['orderby'] == 'event' && $query->is_main_query()) {
            $query->set('meta_key', 'event_id');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', isset($_GET['order']) ? htmlentities($_GET['order']) : 'desc');
        }


        if (count($meta_query)) $query->set('meta_query', $meta_query);
    }

    /**
    * Apply Filtering Options
    *
    * @since   1.0.0
    */
    public static function applyFilteringOptions($query)
    {
        global $pagenow;
        $type = 'post';
        if (isset($_GET['post_type'])) {
            $type = $_GET['post_type'];
        }
        $meta_query = [];
        if ('mec_invoice' == $type && is_admin() && $pagenow == 'edit.php' && isset($_GET['filterByEvent']) && $_GET['filterByEvent'] != '' && $_GET['filterByEvent'] != 'all'  && $query->is_main_query()) {
            $meta_query[] = array(
                'key' => 'event_id',
                'value' => $_GET['filterByEvent'],
            );
        }

        if (isset($_REQUEST['OrderDate']) and trim($_REQUEST['OrderDate']) != '') {
            $type = $_REQUEST['OrderDate'];

            $min = current_time('Y-m-d');
            $max = date('Y-m-d', strtotime('Tomorrow'));

            if ($type == 'yesterday') {
                $min = date('Y-m-d', strtotime('Yesterday'));
                $max = current_time('Y-m-d');
            } elseif ($type == 'currentMonth') {
                $min = current_time('Y-m-01');
            } elseif ($type == 'lastMonth') {
                $min = date('Y-m-01', strtotime('Last Month'));
                $max = date('Y-m-t', strtotime('Last Month'));
            } elseif ($type == 'currentYear') {
                $min = current_time('Y-01-01');
            } elseif ($type == 'last_year') {
                $min = date('Y-01-01', strtotime('Last Year'));
                $max = date('Y-12-31', strtotime('Last Year'));
            }

            $meta_query[] = array(
                'key' => 'date',
                'value' => array(strtotime($min), strtotime($max)),
                'compare' => 'BETWEEN',
            );

        }

        if (count($meta_query)) $query->set('meta_query', $meta_query);
    }

    /**
    * Add Filtering Options
    *
    * @since   1.0.0
    */
    public static function addFilteringOptions($post_type, $which)
    {
        if ('mec_invoice' !== $post_type)
            return;

        // A list of taxonomy slugs to filter by
        $events = get_posts([
            'post_type' => 'mec-events',
            'orderby'    => 'ID',
            'post_status' => 'publish',
            'order'    => 'DESC',
            'posts_per_page' => -1
        ]);

        echo "<select name='filterByEvent' class='postform'>";
        echo '<option value="all">' . esc_attr__('All', 'mec-invoice') . '</option>';
        foreach ($events as $event) {
            // Display filter HTML
            $selected = isset($_GET['filterByEvent']) && $_GET['filterByEvent'] == $event->ID ? ' selected="selected"' : '';
            echo '<option value="'. $event->ID.'"'. $selected .'>' . $event->post_title . '</option>';
        }
        echo '</select>';

        $OrderDate = isset($_REQUEST['OrderDate']) ? sanitize_text_field($_REQUEST['OrderDate']) : '';

        echo '<select name="OrderDate">';
        echo '<option value="">' . __('Order Date', 'mec') . '</option>';
        echo '<option value="today" ' . ($OrderDate == 'today' ? 'selected="selected"' : '') . '>' . __('Today', 'mec') . '</option>';
        echo '<option value="yesterday" ' . ($OrderDate == 'yesterday' ? 'selected="selected"' : '') . '>' . __('Yesterday', 'mec') . '</option>';
        echo '<option value="currentMonth" ' . ($OrderDate == 'current_month' ? 'selected="selected"' : '') . '>' . __('Current Month', 'mec') . '</option>';
        echo '<option value="lastMonth" ' . ($OrderDate == 'last_month' ? 'selected="selected"' : '') . '>' . __('Last Month', 'mec') . '</option>';
        echo '<option value="currentYear" ' . ($OrderDate == 'current_year' ? 'selected="selected"' : '') . '>' . __('Current Year', 'mec') . '</option>';
        echo '<option value="lastYear" ' . ($OrderDate == 'last_year' ? 'selected="selected"' : '') . '>' . __('Last Year', 'mec') . '</option>';
        echo '</select>';
    }

    /**
    * Customize Columns
    *
    * @since   1.0.0
    */
    public static function customizeSortableColumns($columns)
    {
        $columns['event'] = 'event';
        $columns['attendees'] = 'attendees';
        $columns['invoiceID'] = 'id';
        $columns['status'] = 'status';
        $columns['totalPrice'] = 'totalPrice';
        $columns['customDate'] = 'date';

        return $columns;
    }

    /**
    * Customize Columns
    *
    * @since   1.0.0
    */
    public static function customizeColumns($columns)
    {
        $columns = array(
            'cb' => '&lt;input type="checkbox" />',
            'title' => __('Invoice', 'mec-invoice'),
            // 'invoiceID' => __('Number'),
            'event' => __('Event', 'mec-invoice'),
            'attendees' => __('Attendees', 'mec-invoice'),
            'transactionID' => __('Transaction ID', 'mec-invoice'),
            'totalPrice' => __('Total Price', 'mec-invoice'),
            'status' => __('Accessibility', 'mec-invoice'),
            'customDate' => __('Date', 'mec-invoice'),
        );

        return $columns;
    }

    /**
    * Customize Rows
    *
    * @since   1.0.0
    */
    public static function customizeRows($column, $invoiceID)
    {
        switch ($column) {
            case 'event':
                $event_id = get_post_meta($invoiceID, 'event_id', true);
                $eventTitle = get_the_title($event_id);

                echo  $eventTitle ? '<a href="' . get_post_permalink($event_id) . '">' . $eventTitle . '</a>' : '-';
            break;
            case 'invoiceID':
                echo  \MEC_Invoice\Helper\Invoice::get_invoice_number($invoiceID);
            break;
            case 'status':
                $status = get_post_meta($invoiceID, 'status', true);
                echo  $status ? '<span class="mec-invoice-status-'. $status .'">' .( ($status == 'open') ? 'Enabled' : 'Disabled')  .'</span>' : '<span class="mec-invoice-status-closed">Disabled</span>';
            break;
            case 'customDate':
                // update_post_meta($invoiceID, 'date_submit', date('YmdHis', current_time('timestamp', 0)));
                echo get_the_date('d M Y - H:i:s');
            break;
            case 'transactionID':
                $book_id = get_post_meta($invoiceID, 'book_id', true);
                $event_id = get_post_meta($invoiceID, 'event_id', true);
                $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
                echo $transaction_id;
            break;
            case 'attendees':
                if ($attendee= get_post_meta($invoiceID, 'attendee', true)) {
                    echo $attendee;
                    break;
                }
                $book_id = get_post_meta($invoiceID, 'book_id', true);
                $event_id = get_post_meta($invoiceID, 'event_id', true);
                $transaction_id = get_post_meta($book_id, 'mec_transaction_id', true);
                $transaction = get_option($transaction_id, array());
                $unique_attendees = [];
                $totalAttendees = 0;
                if(isset($transaction['tickets']) && is_array($transaction['tickets'])) {
                    foreach ($transaction['tickets'] as $t) {if(isset($t['email'])) {$unique_attendees[] = $t;$totalAttendees++;}}
                }

                echo '<strong>' . ($totalAttendees ? $totalAttendees: '-') . '</strong>';

                if($totalAttendees) {
                    echo '<div class="mec-booking-attendees-tooltip mec-invoice-attendees">';
                    echo '<ul>';
                    foreach ($unique_attendees as $unique_attendee) {
                        echo '<li>';
                        echo '<div class="mec-booking-attendees-tooltip-name">' . $unique_attendee['name'] . ($unique_attendee['count'] > 1 ? ' (' . $unique_attendee['count'] . ')' : '') . '</div>';
                        echo '<div class="mec-booking-attendees-tooltip-email"><a href="mailto:' . $unique_attendee['email'] . '">' . $unique_attendee['email'] . '</a></div>';
                        echo '</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }
            break;
            case 'totalPrice':
                echo \MEC_Invoice\Helper::getOption('currency', false) . \MEC_Invoice\Helper::TotalPrice($invoiceID);
            break;
        }
    }

    /**
    * Customize Row Actions
    *
    * @since   1.0.0
    */
    public static function customizeRowActions($action, $post)
    {
        if ($post->post_type == 'mec_invoice') {
            unset($action['inline hide-if-no-js']);
            $hash = get_post_meta($post->ID, 'invoiceID', true);
            if($attendee = get_post_meta($post->ID, 'attendee', true)) {
                $viewUrl = get_site_url(null, '?invoiceID=' . $post->ID . '&makePreview=' . $hash . '&attendee=' . $attendee);
                $pdfUrl = get_site_url(null, '?invoiceID=' . $post->ID . '&makePreview=' . $hash . '&showPDF=true&attendee=' . $attendee);
            } else {
                $viewUrl = get_site_url(null, '?invoiceID=' . $post->ID . '&makePreview=' . $hash);
                $pdfUrl = get_site_url(null, '?invoiceID=' . $post->ID . '&makePreview=' . $hash . '&showPDF=true');
            }

            $action['view'] = '<a href="' . $viewUrl . '" target="_blank">' . esc_html__('View Invoice', 'mec-invoice') . '</a>';
            $user = wp_get_current_user();
            if ($user->roles[0] == 'administrator') {
                $action['edit'] = '<a href="' . get_edit_post_link($post) . '">' . esc_html__('Manage', 'mec-invoice') . '</a>';
            }
            // $action['viewpdf'] = '<a href="' . $pdfUrl . '" target="_blank">' . esc_html__('View PDF', 'mec-invoice') . '</a>';
        }
        return $action;
    }

   /**
    * Add Export As PDF In Items (Bulk Action).
    *
    * @since   1.0.0
    */
    public static function bulkActionsHandler($redirectTo, $doAction, $postIds)
    {
        switch ($doAction) {
            case 'exportAsPdf':
                $upload = wp_upload_dir();
                $upload_dir = $upload['basedir'];
                $upload_url = $upload['baseurl'] . '/mec-invoices-compressed';
                $upload_dir = $upload_dir . '/mec-invoices-compressed';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0700);
                    file_put_contents($upload_dir . '/index.php', 'Modern Events Calendar');
                }


                $zip = new \ZipArchive();
                $zipFilename =  'mec-invoice(' . md5(implode('_', $postIds))  . ').zip';
                $zip->open($upload_dir . '/' . $zipFilename, \ZipArchive::CREATE);
                foreach ($postIds as $post_id) {
                    $filename = \MEC_Invoice\PDF::createFromInvoice($post_id, true);
                    $zip->addFile($filename, basename($filename));
                }
                $zip->close();

                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename=' . $zipFilename);
                header('Pragma: no-cache');
                readfile($upload_dir . '/' . $zipFilename);
                exit();
                break;
                case 'close':
                    foreach ($postIds as $post_id) {
                        update_post_meta($post_id, 'status', 'closed');
                    }
                    break;
                case 'open':
                    foreach ($postIds as $post_id) {
                        update_post_meta($post_id, 'status', 'open');
                    }
                    break;

                default:
            break;
        }
        return $redirectTo;
    }

   /**
    * Apply Bulk Actions
    *
    * @since   1.0.0
    */
    public static function applyBulkActions($bulkActions)
    {
        $user = wp_get_current_user();
        if ($user->roles[0] != 'administrator') {
            return [];
        }
        $bulkActions['exportAsPdf'] = __('Export as PDF', 'mec-invoice');
        $bulkActions['close'] = __('Disable Accessibility', 'mec-invoice');
        $bulkActions['open'] = __('Enable Accessibility', 'mec-invoice');
        return $bulkActions;
    }

   /**
    * Global Variables.
    *
    * @since   1.0.0
    */
    public static function settingUp()
    {

        self::$dir  = MECINVOICEDIR . 'core' . DS . 'postTypes';
        self::$args = [
            'query_var'        => 'mec_invoice',
            'rewrite'          => ['slug' => 'mec_invoice'],
            'supports'         => [''],
            'show_in_rest'     => true,
            'menu_position'    => 30,
            'show_in_menu'     => true,
            'menu_icon'        => MECINVOICEASSETS. '/img/mec.svg',
            'public'              => true,
            'show_ui'             => true,
            'map_meta_cap'        => true,
            'labels'           => [
                'name'                     => esc_html__('MEC Invoices', 'mec-invoice'),
                'all_items'                => esc_html__('Invoices', 'mec-invoice'),
                'singular_name'            => esc_html__('Invoice', 'mec-invoice'),
                'add_new'                  => esc_html__('Add New', 'mec-invoice'),
                'add_new_item'             => esc_html__('Add New Invoice', 'mec-invoice'),
                'edit_item'                => esc_html__('Manage Invoice', 'mec-invoice'),
                'new_item'                 => esc_html__('New Invoice', 'mec-invoice'),
                'view_item'                => esc_html__('View Invoice', 'mec-invoice'),
                'search_items'             => esc_html__('Search Invoice', 'mec-invoice'),
                'not_found'                => esc_html__('No Invoice found', 'mec-invoice'),
                'not_found_in_trash'       => esc_html__('No Invoice found in Trash', 'mec-invoice'),
                'show_in_rest'             => true,
            ],
        ];
    }

   /**
    * Post Type Init
    *
    * @since     1.0.0
    */
    public function postTypeInit () {
        if (!Attendee::doIHaveAccess()) {
            self::$args['show_ui'] = false;
            self::$args['capabilities'] = [
                'read' => 'mec_invoice_cap_d'
            ];
        }
        $user = wp_get_current_user();
        if(!isset($user->roles[0])) {
            return;
        }
        if($user->roles[0] != 'administrator')  {
            self::$args['capabilities'] = [
                'delete_published_posts' => 'mec_invoice_cap_d',
                'edit_published_posts' => 'mec_invoice_cap_d',
                'delete_posts' => 'mec_invoice_cap_d',
                'create_posts' => 'mec_invoice_cap_d',
                'publish_pages' => 'mec_invoice_cap_d',
                'read_post' => 'read_post',
            ];
        }
        register_post_type('mec_invoice', self::$args);
    }

   /**
    * Invoice Badge
    *
    * @since     1.0.0
    */
    public function invoicesBadge($screen)
    {
        $user_id = get_current_user_id();
        $user_last_view_date = get_user_meta($user_id, 'invoice_user_last_view_date', true);
        $count = 0;

        if (!trim($user_last_view_date)) {
            update_user_meta($user_id, 'invoice_user_last_view_date', date('YmdHis', current_time('timestamp', 0)));
            return;
        }

        $args = array(
            'post_type' => 'mec_invoice',
            'post_status' => 'any',
            'meta_query' => array(
                array(
                    'key' => 'date_submit',
                    'value' => $user_last_view_date,
                    'compare' => '>=',
                ),
            ),
        );

        $query = new \WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $count += 1;
            }
        }

        if ($count != 0) {

            if (isset($screen->id) and $screen->id == 'edit-mec_invoice') {
                update_user_meta($user_id, 'invoice_user_last_view_date', date('YmdHis', current_time('timestamp', 0)));
                return;
            }

            // Append Booking Badge To Booking Menu.
            global $menu;

            $badge = ' <span class="update-plugins count-%%count%%"><span class="plugin-count">%%count%%</span></span>';
            $menu_item = wp_list_filter($menu, array(2 => 'edit.php?post_type=mec_invoice'));
            if (is_array($menu_item) and count($menu_item)) {
                $menu[key($menu_item)][0] .= str_replace('%%count%%', esc_attr($count), $badge);
            }
        }
    }

   /**
    * Init Function
    *
    * @since     1.0.0
    */
    public function init()
    {
        if (!class_exists('\MEC_Invoice\Autoloader')) {
            return;
        }
    }
} //MecInvoice
