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
 * Template Name: About Page
 */

get_header(); ?>

	  <div class="topdefault-page">
		  <figure>
			  <img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_01.png" alt=" ">
				<figcaption><h3>Blinds. Curtains. Venetians. Verticals. Wooden shutters. And much more!</h3></figcaption>
			</figure>			
		</div>
		
		<div class="center-box cf">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="post-about">

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

				</article><!-- #post -->

			<?php endwhile; ?>

			<aside class="sidebar-about">
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
				
				<div class="widget-video cf">
				  <div class="video-box"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/video.jpg" style="display:block;" alt=" "></div>
					<a href="#" class="more">click to View our video </a>
				</div>
			</aside>
		</div>
<?php get_footer(); ?>