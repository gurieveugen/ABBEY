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
 * Template Name: Blockout Curtains
 */

get_header(); ?>
		<div class="product-page center-box cf">
		
		  <?php get_sidebar(); ?>
			
			<div class="space">&nbsp;</div>
			
			<div class="right-product" style="background:0px 0px url(<?php echo get_template_directory_uri(); ?>/images/uploads/bg_post_05.jpg) no-repeat #FFFFFF;">
				<div class="padding-top278 cf">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				  <div id="post-<?php the_ID(); ?>" class="post-product cf">
					
						<header class="tit-product">
							<h1><?php the_title(); ?></h1>
						</header>
						<ul class="smallpost-list cf">
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_13.jpg" alt=" "></figure>
									<div class="txt">
										<p>Need to block out large volumes of light in your bedroom or home theatre room? Whether you’re coming off a long nightshift or simply wish to sleep through the morning light, blockout curtains are the stylish, easy-to-operate solution. Simply browse our range of colours and fabrics to match your home’s unique décor and you’ll have elegant yet practical blockout curtains for many years to come. </p>
								  	<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
										</footer>
									</div>
								</article>
							</li>
						</ul>

				  </div><!-- #post -->

			<?php endwhile; ?>

					<ul class="logos-bottom">
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_01.png" alt=" "></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_02.png" alt=" "></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_03.png" alt=" "></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_04.png" alt=" "></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_05.png" alt=" "></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_06.png" alt=" "></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_07.png" alt=" "></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_08.png" alt=" "></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_09.png" alt=" "></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/post_logo_10.png" alt=" "></a></li>
					</ul>
					
				</div>
			</div>
		</div>
<?php get_footer(); ?>