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
 * Template Name: Commercial
 */

get_header(); ?>
		<div class="product-page center-box cf">
		
		  <?php get_sidebar(); ?>
			
			<div class="space">&nbsp;</div>
			
			<div class="right-product" style="background:0px 0px url(<?php echo get_template_directory_uri(); ?>/images/uploads/bg_post_01.jpg) no-repeat #FFFFFF;">
				<div class="padding-top278 cf">
					<div class="logo-product"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_02.png" alt=" "></div>
					
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				  <article id="post-<?php the_ID(); ?>" class="full-post post-product cf">
					  
						<header class="tit-product">
							<h1><?php the_title(); ?></h1>
						</header>
						<div class="img">
							<figure class="small-img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_06.jpg" alt=" "></figure>
							<figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_01.png" alt=" "></figure>
							<figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_02.png" alt=" "></figure>
						</div>
						
						<div class="txt">
							<p><strong>Function with flair: on time, on budget commercial solutions.</strong><br>Our blend of affordability and attention to detail makes us the ideal choice for small and medium businesses, boutique offices, schools, real estate agencies, government departments and property developers.<br>  Our experience in delivering functional, stylish solutions is your guarantee of a unique, quality outcome that stands the test of time. Rest assured, every window treatment is custom manufactured to strict specifications.</p>
							<p>Just some of our clients include:</p>
							<ul>
								<li>Prominent real estate agencies</li>
								<li>Retirement villages</li>
								<li>Health providers</li>
								<li>Government departments</li>
								<li>Schools</li>
								<li>Disability services.</li>
							</ul>
							<p>Contact us today for a free measure and quote. We’ll come to your site to gain a complete understanding of your every requirement, taking into account key elements such as your budget, solar orientation and existing décor. The result? A durable and stylish solution that lasts, backed by our quality after sales service. <strong>For a complete service, on time and on budget, contact us today.</strong></p>
						</div>
						<footer>
						<a href="#" class="btn-enquiry">Make an enquiry</a>
						</footer>

				  </article><!-- #post -->

			<?php endwhile; ?>
					
				</div>
			</div>
		</div>
<?php get_footer(); ?>