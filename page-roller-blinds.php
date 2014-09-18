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
 * Template Name: Roller Blinds
 */

get_header(); ?>
		<div class="product-page center-box cf">
		
		  <?php get_sidebar(); ?>
			
			<div class="space">&nbsp;</div>
			
			<div class="right-product" style="background:0px 0px url(<?php echo get_template_directory_uri(); ?>/images/uploads/bg_post_10.jpg) no-repeat #FFFFFF;">
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
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_19.jpg" alt=" "></figure>
									<div class="txt">
									  <h2><a href="#">Blockout Roller Blinds</a></h2>
										<p>Need to block out unwanted light? Want the freedom to trap in or reflect heat? Expertly control your interior climate with our quality blockout roller blinds. Perfect for bedrooms, nightshift workers and those looking to enhance their home’s energy efficiency, blockout roller blinds offer the perfect blend of style and function. Manual or motorised controls available. </p>
								  	<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
											<figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_01.png" alt=" "><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_02.png" alt=" "></figure>
										</footer>
									</div>
								</article>
							</li>
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_20.jpg" alt=" "></figure>
									<div class="txt">
									  <h2><a href="#">Sunscreen Roller Blinds</a></h2>
										<p>Minimalistic and modern, sunscreen roller blinds add immense comfort to your interior living areas. As the name suggests, our range of sunscreen roller blinds filter out heat and glare, eliminating up to 95% of harmful UV light. Adding to the desirability of sunscreen roller blinds is their ability to provide privacy during the day without blocking out any views. Choose from manual or motorised controls.</p>
								  	<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
											<figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_01.png" alt=" "><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_02.png" alt=" "></figure>
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