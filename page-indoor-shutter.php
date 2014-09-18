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
 * Template Name: Indoor Shutter
 */

get_header(); ?>
		<div class="product-page center-box cf">
		
		  <?php get_sidebar(); ?>
			
			<div class="space">&nbsp;</div>
			
			<div class="right-product" style="background:0px 0px url(<?php echo get_template_directory_uri(); ?>/images/uploads/bg_post_05.jpg) no-repeat #FFFFFF;">
				<div class="padding-top278 cf">
				  <div class="logo-product"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_07.png" alt=" "></div>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				  <div id="post-<?php the_ID(); ?>" class="post-product cf">
					  
						<header class="tit-product">
							<h1><?php the_title(); ?></h1>
						</header>
						<ul class="smallpost-list cf">
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_14.jpg" alt=" "></figure>
									<div class="txt">
										<p>Need to block out large volumes of light in your bedroom or home theatre room? Whether you’re coming off a long nightshift or simply wish to sleep through the morning light, blockout curtains are the stylish, easy-to-operate solution. Simply browse our range of colours and fabrics to match your home’s unique décor and you’ll have elegant yet practical blockout curtains for many years to come. </p>
								  	<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
											<figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_07.png" alt=" "></figure>
										</footer>
									</div>
								</article>
							</li>
						</ul>

				  </div><!-- #post -->

			<?php endwhile; ?>
					
				</div>
			</div>
		</div>
<?php get_footer(); ?>