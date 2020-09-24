<?php
/**
 * LifterLMS Product Pricing Table Template
 * @property obj $product WP_Product object
 */
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

$is_enrolled = llms_is_user_enrolled( get_current_user_id(), $product->get( 'id' ) );
$purchaseable = $product->is_purchasable();
$has_free = $product->has_free_access_plan();
$free_only = ( $has_free && ! $purchaseable );
?>

<?php if ( ! $is_enrolled && ( $purchaseable || $has_free ) ) : ?>

	<?php do_action( 'lifterlms_before_access_plans', $product->get( 'id' ) ); ?>

	<section class="llms-access-plans cols-<?php echo esc_attr( $product->get_pricing_table_columns_count( $free_only ) ) ?>">

		<?php do_action( 'lifterlms_before_access_plans_loop', $product->get( 'id' ) ); ?>

		<?php foreach ( $product->get_access_plans( $free_only ) as $i => $plan ) : ?>

			<div class="llms-access-plan<?php echo esc_attr( $plan->is_featured() ) ? ' featured' : ''; ?><?php echo esc_attr( $plan->is_on_sale() ) ? ' on-sale' : '' ?>" id="llms-access-plan-<?php echo esc_attr( $plan->get( 'id' ) ); ?>">

				<div class="llms-access-plan-content">

					<h4 class="llms-access-plan-title"><?php echo wp_kses_post( $plan->get( 'title' ) ); ?></h4>

					<div class="llms-access-plan-pricing regular">

						<div class="llms-access-plan-featured">
							<?php if ( $plan->is_featured() ) : ?>
								<div class="plan-featured">
									<?php echo apply_filters( 'lifterlms_featured_access_plan_text', __( 'FEATURED', 'lifterlms' ), $plan ); ?>
								</div>
							<?php else : ?>

							<?php endif; ?>
						</div>

						<div class="llms-access-plan-price">

							<span class="price-regular"><?php echo wp_kses_post( $plan->get_price( 'price' ) ); ?></span>

							<?php if ( $plan->is_on_sale() ) : ?>
								<span class="price-sale"><?php echo wp_kses_post( $plan->get_price( 'sale_price' ) ); ?></span>
							<?php endif; ?>

							<?php if ( $plan->is_on_sale() ) : ?>
								<div class="price-text">
									<em class="stamp"><?php _e( 'SALE', 'lifterlms' ); ?></em>
								</div>
							<?php endif; ?>

						</div>

						<?php if ( $schedule = $plan->get_schedule_details() ) : ?>
							<div class="llms-access-plan-schedule"><?php echo wp_kses_post( $schedule ); ?></div>
						<?php endif; ?>

						<?php if ( $expires = $plan->get_expiration_details() ) : ?>
							<div class="llms-access-plan-expiration"><?php echo wp_kses_post( $expires ); ?></div>
						<?php endif; ?>

						<?php if ( $plan->is_on_sale() && $plan->get( 'sale_end' ) ) : ?>
							<div class="llms-access-plan-sale-end"><?php printf( __( 'sale ends %s', 'lifterlms' ), $plan->get_date( 'sale_end', 'n/j/y' ) ); ?></div>
						<?php endif; ?>

					</div>

					<?php if ( $plan->has_availability_restrictions() ) : ?>
						<div class="llms-access-plan-restrictions">
							<em class="stamp"><?php _e( 'MEMBER PRICING', 'lifterlms' ); ?></em>
							<ul>
								<?php foreach ( $plan->get_array( 'availability_restrictions' ) as $mid ) : ?>
									<li><a href="<?php echo get_permalink( $mid ); ?>"><?php echo get_the_title( $mid ); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<div class="llms-access-plan-description"><?php echo wp_kses_post( $plan->get( 'content' ) ); ?></div>

				</div>

				<div class="llms-access-plan-footer">

					<div class="llms-access-plan-pricing trial">
						<?php if ( $plan->has_trial() ) : ?>
							<div class="llms-access-plan-price">
								<?php echo wp_kses_post( $plan->get_price( 'trial_price' ) ); ?>
								<div class="price-text">
									<em class="stamp"><?php _e( 'TRIAL', 'lifterlms' ); ?></em>
								</div>
							</div>
							<div class="llms-access-plan-trial"><?php echo wp_kses_post( $plan->get_trial_details() ); ?></div>
						<?php else : ?>
							&nbsp;
						<?php endif; ?>
					</div>

					<a class="llms-button-action button" href="<?php echo esc_url( $plan->get_checkout_url() ); ?>"><?php echo wp_kses_post( $plan->get_enroll_text() ); ?></a>

				</div>

			</div>

		<?php endforeach; ?>

		<?php do_action( 'lifterlms_after_access_plans_loop', $product->get( 'id' ) ); ?>

	</section>

	<?php do_action( 'lifterlms_after_access_plans', $product->get( 'id' ) ); ?>

<?php elseif ( ! $is_enrolled ) : ?>

	<?php do_action( 'lifterlms_product_not_purchasable', $product->get( 'id' ) ); ?>

	<?php if ( 'course' === $product->get( 'type' ) ) : $course = new LLMS_Course( $product->post ); ?>
		<?php if ( 'yes' === $course->get( 'enrollment_period' ) ) : ?>
			<?php if ( ! $course->has_date_passed( 'enrollment_start_date' ) ) : ?>
				<?php llms_print_notice( $course->get( 'enrollment_opens_message' ), 'notice' ); ?>
			<?php elseif ( $course->has_date_passed( 'enrollment_end_date' ) ) : ?>
				<?php llms_print_notice( $course->get( 'enrollment_closed_message' ), 'error' ); ?>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( ! $course->has_capacity() ) : ?>
			<?php llms_print_notice( $course->get( 'capacity_message' ), 'error' ); ?>
		<?php endif; ?>
	<?php endif; ?>

<?php endif; ?>
