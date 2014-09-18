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
 * Template Name: Timber Blinds
 */

get_header(); ?>
		<div class="product-page center-box cf">
		
		  <?php get_sidebar(); ?>
			
			<div class="space">&nbsp;</div>
			
			<div class="right-product" style="background:0px 0px url(<?php echo get_template_directory_uri(); ?>/images/uploads/bg_post_11.jpg) no-repeat #FFFFFF;">
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
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_21.jpg" alt=" "></figure>
									<div class="txt">
									  <h2><a href="#">Cedar Timber Blinds</a></h2>
										<p>Bring the exquisite style of Cedar into your home with our customised cedar blinds. Long lasting and weather resistant, cedar blinds will complement your interior décor while providing ongoing durability and practicality. Maintenance is also reduced, as cedar blinds are naturally resistant to decay, insects and moisture damage.</p>
								  	<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
										</footer>
									</div>
								</article>
							</li>
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_22.jpg" alt=" "></figure>
									<div class="txt">
									  <h2><a href="#">White Timber Blinds</a></h2>
										<p>Fashionwood painted timber blinds are a fantastic choice for those looking to make a fashion statement with their window treatments without sacrificing functionality and endurance. Our Fashionwood painted timber blinds are available in a stylish assortment of colours and textures and can be customised to accommodate a range of window heights and lengths, making them extremely popular blinds.</p>
								  	<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
										</footer>
									</div>
								</article>
							</li>
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_23.jpg" alt=" "></figure>
									<div class="txt">
									  <h2><a href="#">PVC WOODLUX TIMBER BLINDS </a></h2>
										<p>PVC Woodlux timber blinds are a wood composite solution that retains a natural wood finish while maximising durability. Our PVC Woodlux timber blinds can withstand heavy usage, strong sun exposure and moisture build-up, making them ideal blinds for bathrooms and high traffic areas.</p>
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