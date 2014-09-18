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
 * Template Name: Pelmets / Access / Headings
 */

get_header(); ?>
		<div class="product-page center-box cf">
		
		  <?php get_sidebar(); ?>
			
			<div class="space">&nbsp;</div>
			
			<div class="right-product" style="background:0px 0px url(<?php echo get_template_directory_uri(); ?>/images/uploads/bg_post_03.jpg) no-repeat #FFFFFF;">
				<div class="padding-top91 cf">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				  <div id="post-<?php the_ID(); ?>" class="post-product cf">
					  
						<header class="tit-product">
							<h1><?php the_title(); ?></h1>
						</header>
						<ul class="smallpost-list cf">
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_07.jpg" alt=" "></figure>
									<div class="txt">
										<h2><a href="#">Pelmets</a></h2>
										<p>Looking to add a striking feature to your windows whilst minimising the amount of light penetration? Padded pelmets are valued as functional visual statements that enhance the size your windows appear. Whether used on their own or in tandem with other blinds, padded pelmets prevent light penetrating through the top of windows and cut heat transfer, making them ideal for both bedrooms and theatre rooms.</p>
								  	<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
										</footer>
									</div>
								</article>
							</li>
							
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_11.jpg" alt=" "></figure>
									<div class="txt">
										<h2><a href="#">Accessories</a></h2>
										<p>At Abbey Blinds & Curtains, we believe that the success of your window treatment is highly dependent on the quality of the accessories you choose. That’s why we offer a range of functional yet stylish accessories that will help bring your blinds to life. From curtain tiebacks to curtain trackings and finials, all our accessories are manufactured to the highest quality standards to deliver you peak performance and a window solution that lasts.</p>
										<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
											<figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_04.png" alt=" "><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_05.png" alt=" "></figure>
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