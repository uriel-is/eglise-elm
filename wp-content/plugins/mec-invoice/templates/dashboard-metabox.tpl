<?php
// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}
?>

<div class="mec-invoice-dashboard-metabox-wrap">
    <div class="table table_left">
        <table>
            <thead>
                <tr>
                    <td colspan="2"><?php echo __('Today Sales', 'mec-invoice'); ?></td>
                </tr>
            </thead>
            <?php
            $today = getdate();
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'mec_invoice',
                'date_query' => array(
                    array(
                        'year'  => $today['year'],
                        'month' => $today['mon'],
                        'day'   => $today['mday'],
                    ),
                ),
            );
            $count_query = new WP_Query($args);
            $price_query = new WP_Query($args);
            $price = 0;
            if ($price_query->have_posts()) {
                while ($price_query->have_posts()) {
                    $price_query->the_post();
                    $price += \MEC_Invoice\Helper::TotalPrice(get_the_ID());
                }
            }
            ?>
            <tbody>
                <tr>
                    <td class="first t today_earnings"><?php echo  __('Earnings', 'mec-invoice'); ?></td>
                    <td class="b b-earnings" style="font-weight: normal;"><?php echo \MEC_Invoice\Helper::getOption('currency', false) . $price; ?></td>
                </tr>
                <tr>
                    <td class="first t today_sales"><?php echo  __('Orders', 'mec-invoice'); ?></td>
                    <td class="b b-sales" style="font-weight: normal;"><?php echo $count_query->found_posts; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table table_right">
        <table>
            <thead>
                <tr>
                    <td colspan="2"><?php echo __('All Sales', 'mec-invoice'); ?></td>
                </tr>
            </thead>
            <?php
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'mec_invoice',
                'post_status' => 'any',
            );
            $all_count_query = new WP_Query($args);
            $all_price_query = new WP_Query($args);
            $all_price = 0;
            if ($all_price_query->have_posts()) {
                while ($all_price_query->have_posts()) {
                    $all_price_query->the_post();
                    $all_price += \MEC_Invoice\Helper::TotalPrice(get_the_ID());
                }
            }
            ?>
            <tbody>
                <tr>
                    <td class="first t today_earnings"><?php echo  __('Earnings', 'mec-invoice'); ?></td>
                    <td class="b b-earnings" style="font-weight: normal;"><?php echo \MEC_Invoice\Helper::getOption('currency', false) . $all_price; ?></td>
                </tr>
                <tr>
                    <td class="first t today_sales"><?php echo  __('Orders', 'mec-invoice'); ?></td>
                    <td class="b b-sales" style="font-weight: normal;"><?php echo $all_count_query->found_posts; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="clear: both"></div>
    <div class="table recent_purchases">
        <table>
            <thead>
                <tr>
                    <td><?php echo __('Lastest Sales', 'mec-invoice'); ?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    <?php
                    $args = array(
                        'posts_per_page' => 5,
                        'post_type' => 'mec_invoice',
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $event_id = get_post_meta(get_the_ID(), 'event_id', true);
                            echo '<div class="last-invoice">';
                            echo '<a href="' . get_edit_post_link(get_the_ID()) . '">' . get_the_title($event_id) . ' - ' .get_the_title() . '</a> <span>'.\MEC_Invoice\Helper::getOption('currency', false) . \MEC_Invoice\Helper::TotalPrice(get_the_ID()).'</span>';
                            echo '</div>';
                        }
                    }
                    ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>