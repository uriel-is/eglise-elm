<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

while ( have_posts() ) : the_post(); ?>

 <div class="product">

	<div id="product-<?php the_ID(); ?>" <?php post_class('product'); ?>>

		<?php do_action( 'yith_wcqv_product_image' ); ?>

		<div class="summary entry-summary">
			<div class="summary-content">
				<div class="container">
					<div class="row deep-woo-single-gallery">
						<?php do_action( 'yith_wcqv_product_summary' ); ?>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>

<?php
// webnus
echo '<script src="' . get_template_directory_uri() . '/assets/dist/js/libraries/slick.js"></script>';
echo '<script src="' . get_template_directory_uri() . '/inc/core/woocommerce/assets/woocommerce.js"></script>';?>

<script>
	jQuery('.deep-woo-single-product-attr').find('select').niceSelect();
	jQuery('.deep-woo-single-gallery').find('.col-md-2').remove();
	jQuery('.deep-woo-single-gallery').find('.col-md-4').attr('class','col-md-6');
</script>
<?php
endwhile; // end of the loop.