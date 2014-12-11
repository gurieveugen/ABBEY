<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="product-page center-box cf">
	<?php get_sidebar(); ?>
	<div class="space">&nbsp;</div>	

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
			
	<div class="right-product" style="background:0px 0px url(<?php echo $image; ?>) no-repeat #FFFFFF;">

				<?php get_template_part( 'content', get_post_format() ); ?>
				
	</div>
				<?php if($post->post_type == 'product'){
				$testimonials = get_field('testimonials');
				
				//$testimonials_query = new WP_Query(array('post_type'=>'testimonial','posts_per_page'=>2,'orderby'=>'rand'));
				//if ( $testimonials_query->have_posts() ) {
				
				if(!empty($testimonials)){
				?>
				<div id="client_testimonials-2" class="widget widget-testimonials cf">
					<h3 class="widget-title">Client Testimonials</h3>
						<ul>
						<?php //while ( $testimonials_query->have_posts() ) {	$testimonials_query->the_post(); ?>
						<?php foreach($testimonials as $t){?>
							<li>
								<blockquote>
									<p><?php echo $t->post_content; ?></p>
									<h4><?php echo $t->post_title; ?></h4>
								</blockquote>
							</li>
						<?php } ?>	
						</ul>
				</div>
				<?php } //wp_reset_postdata();
				}
				?>
		
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>