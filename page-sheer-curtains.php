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
 * Template Name: Sheer Curtains
 */

get_header(); ?>
		<div class="product-page center-box cf">
		
		  <?php get_sidebar(); ?>
			
			<div class="space">&nbsp;</div>
			
			<div class="right-product" style="background:0px 0px url(<?php echo get_template_directory_uri(); ?>/images/uploads/bg_post_04.jpg) no-repeat #FFFFFF;">
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
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_12.jpg" alt=" "></figure>
									<div class="txt">
										<p>If you want to enhance your in-home privacy whilst maintaining a glorious inflow of natural light, sheer curtains are a gorgeous solution. We offer a wide range of fabrics to enhance your windows with a soft, graceful appearance. Want the option of blocking out light? Simply team our sheer curtains with other light-blocking shutters, curtains and blinds to enjoy the best of both worlds.</p>
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