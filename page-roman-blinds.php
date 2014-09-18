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
 * Template Name: Roman Blinds
 */

get_header(); ?>
		<div class="product-page center-box cf">
		
		  <?php get_sidebar(); ?>
			
			<div class="space">&nbsp;</div>
			
			<div class="right-product" style="background:0px 0px url(<?php echo get_template_directory_uri(); ?>/images/uploads/bg_post_09.jpg) no-repeat #FFFFFF;">
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
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_17.jpg" alt=" "></figure>
									<div class="txt">
									  <h2><a href="#">Standard Roman Blinds</a></h2>
										<p>Ideal for modern or character homes, our standard roman blinds radiate elegance and class. Revel in their clean lines when open, or lower your roman blinds for full privacy and heat insulation. Operation of roman blinds is effortless via a chain control or cord lock. </p>
								  	<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
											<figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_01.png" alt=" "><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_02.png" alt=" "></figure>
										</footer>
									</div>
								</article>
							</li>
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_18.jpg" alt=" "></figure>
									<div class="txt">
									  <h2><a href="#">Soft Roman Blinds</a></h2>
										<p>Add a new dimension to your windows with soft roman blinds. Richly textured, our soft roman blinds are perfect for small spaces such as elevated privacy windows. We can help you choose the fabric and colour of your soft roman blinds that will best complement your unique living space. </p>
								  	<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
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