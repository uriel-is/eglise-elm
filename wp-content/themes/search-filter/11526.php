<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>
	
	<?php echo $query->found_posts; ?> messages trouvés	
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail' );
        $id = get_the_ID();
        $series = wp_get_post_terms($id, 'sermon_series', array( 'fields' => 'names' ));
        $excerpt = get_the_excerpt();
        $excerpt = substr($excerpt, 0, 100);
        $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
        $serie='';
        if ( isset( $series[0] ) ){
            $serie = ' - Série : '.$series[0].' ';
        } 
        $permalink = get_permalink();
		?>
        <div id="message-card-list">
            
            <div class="message-card" data-message="La pureté" <?php if ( has_post_thumbnail() ) { echo 'style="background-image:url(\''.$image[0].'\');"';} ?> >
                <div class="message-card__overlay"></div>
                <!--<div class="message-card__share">
                    <button class="message-card__icon"><i class="material-icons">&#xe87d</i></button>
                    <button class="message-card__icon"><i class="material-icons">&#xe253</i></button>
                    <button class="message-card__icon"><i class="material-icons">&#xe80d</i></button>
                </div>-->
                <div class="message-card__content">
                    <div class="message-card__header">
                        </br>
                        <h1 class="message-card__title"><?php the_title(); ?></h1>
                        <h4 class="message-card__info">(<?php the_date(); ?>) <?php echo $serie; ?></h4>
                    </div>
                    <p class="message-card__desc"><?php echo $excerpt . ' ...'; ?></p>
                    <button onclick="window.location.href = '<?php echo $permalink; ?>';" class="btn btn-outline message-card__button" type="button">Visionner</button>
                </div>
            </div>
        </div>
		<?php
	}
	?>
	<div class="pagination">
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>
