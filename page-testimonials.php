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
 * Template Name: Testimonials Page
 */

get_header(); ?>

	  <div class="topdefault-page">
		  <figure>
			  <img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_01.png" alt=" ">
				<figcaption><p>"The blinds look great. Your installer was fantastic – a credit to your company." <strong>Helen, Bicton.</strong></p></figcaption>
			</figure>			
		</div>
		
		<div class="center-box cf">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

 <ul class="testimonials-list cf">
			  <li class="cf">
				  <figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/ava.jpg" alt=" "></figure>
					<div class="name">
					  <ul class="star-list cf">
						  <li><img src="<?php echo get_template_directory_uri(); ?>/images/star_active.png" alt=" "></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/star_active.png" alt=" "></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/star_active.png" alt=" "></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/star_active.png" alt=" "></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/star.png" alt=" "></li>
						</ul>
						<h3> Sue</h3>
					</div>
					<div class="txt">
					  <p>“Many thanks – blinds and curtains look great. Look forward to more business in the future.” </p>
					</div>
				</li>
				
				<li class="cf">
				  <figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/ava.jpg" alt=" "></figure>
					<div class="name">
					  <ul class="star-list cf">
						  <li><img src="<?php echo get_template_directory_uri(); ?>/images/star_active.png" alt=" "></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/star_active.png" alt=" "></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/star_active.png" alt=" "></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/star_active.png" alt=" "></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/star.png" alt=" "></li>
						</ul>
						<h3> Sue</h3>
					</div>
					<div class="txt">
					  <p>“Many thanks – blinds and curtains look great. Look forward to more business in the future.” </p>
					</div>
				</li>
			</ul>

			<?php endwhile; ?>

		</div>
<?php get_footer(); ?>