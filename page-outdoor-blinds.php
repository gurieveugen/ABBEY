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
 * Template Name: Outdoor Blinds
 */

get_header(); ?>
		<div class="product-page center-box cf">
		
		  <?php get_sidebar(); ?>
			
			<div class="space">&nbsp;</div>
			
			<div class="right-product" style="background:0px 0px url(<?php echo get_template_directory_uri(); ?>/images/uploads/bg_post_02.jpg) no-repeat #FFFFFF;">
				<div class="padding-top91 cf">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				  <div id="post-<?php the_ID(); ?>" class="post-product cf">
					  
						<header class="tit-product">
							<h1><?php the_title(); ?></h1>
						</header>
						<ul class="smallpost-list">
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_07.jpg" alt=" "></figure>
									<div class="txt">
										<h2><a href="#">Alfresco Blinds</a></h2>
										<p>Need a stylish way to protect your outdoor space from the elements? Our outdoor blinds are the ideal solution. Made from transparent PVC, outdoor blinds (or alfresco café blinds) allow you to entertain all year round without disrupting any views. Effortless to use and enduringly stylish, get more use out of your alfresco area, with outdoor blinds.</p>
										<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
										</footer>
									</div>
								</article>
							</li>
							
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_08.jpg" alt=" "></figure>
									<div class="txt">
										<h2><a href="#">Shadeview Blinds</a></h2>
										<p>Stay cool in summer and warmer in winter with Shademesh outdoor blinds - the cost-effective way to protect your balconies and alfresco areas from harsh UV rays. With Shademesh outdoor blinds, you’ll enjoy cooling shade without completely obstructing your views. Easy to maintain and available in a host of colours, Shademesh outdoor blinds are the intelligent choice when you want stylish shade and privacy, for less.</p>
										<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
										</footer>
									</div>
								</article>
							</li>
							
							<li>
								<article class="cf">
									<figure class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_09.jpg" alt=" "></figure>
									<div class="txt">
										<h2><a href="#">extendable arm Awnings</a></h2>
										<p>Shading your entertaining space has never been easier, thanks to extendable awnings. With the ability to be instantly deployed, these awnings bring sheer functionality and style to any outdoor area. Constructed to thrive in all weather conditions, a frameless, beamless or postless design means more views for you to enjoy in cool comfort. Available in manual or motorised operation.</p>
										<footer>
											<a href="#" class="btn-enquiry">Make an enquiry</a>
											<figure><img src="<?php echo get_template_directory_uri(); ?>/images/uploads/logo_03.png" alt=" "></figure>
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