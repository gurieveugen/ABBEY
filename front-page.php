<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	  <div class="tophome-page">
		  <figure>
			  <img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_05.jpg" alt=" ">
				<figcaption><h3>Custom made Blinds at Factory Direct Prices</h3></figcaption>
			</figure>			
		</div>
		
		<div class="center-box cf">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="post-home">

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

				</article><!-- #post -->

			<?php endwhile; ?>
			
			<aside class="sidebar-home">
			  <div class="widget-mobileshowroom">
				  <h3><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/tit_01.png" alt=" "></h3>
					<ul>
					  <li><a href="#">Factory Direct Prices</a></li>
						<li><a href="#">Custom Made Products</a></li>
						<li><a href="#">Request a FREE Quote</a></li>
						<li><a href="#">Supply / Install / Repairs</a></li>
						<li><a href="#">Family Owned & Operated</a></li>
						<li><a href="#">Established since 2004</a></li>
					</ul>
				</div>
				
				<div class="widget-middlemodules">
				  <ul>
					  <li>
						  <figure>
							  <img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_02.jpg" alt=" ">
								<figcaption><strong>Blinds</strong><a href="#" class="more">Click for more</a></figcaption>
							</figure>
						</li>
						<li>
						  <figure>
							  <img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_03.jpg" alt=" ">
								<figcaption><strong>Curtains</strong><a href="#" class="more">Click for more</a></figcaption>
							</figure>
						</li>
						<li>
						  <figure>
							  <img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_04.jpg" alt=" ">
								<figcaption><strong>Outdoor BLINDS</strong><a href="#" class="more">Click for more</a></figcaption>
							</figure>
						</li>
					</ul>
				</div>
				
				<div class="widget-testimonials cf">
				  <h3>Client Testimonials</h3>
					<ul>
					  <li>
							<blockquote>
								<p>Many thanks - blinds and curtains look great. Look forward to more business in the future.</p>
								<h4>Sue, Perth WA</h4>
							</blockquote>
						</li>
						
						<li>
							<blockquote>
								<p>Please thank Warren on our behalf, his fitter was terrific and Abbey Blinds service as good as always.</p>
								<h4>Jackie, Wembley</h4>
							</blockquote>
					  </li>
					</ul>
				</div>
			</aside>
		</div>
<?php get_footer(); ?>