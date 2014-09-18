<?php
get_header(); ?>
	  <div class="tophome-page">
		  <figure>
			  <img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_05.jpg" alt=" ">
				<figcaption><h3>Custom made Blinds at Factory Direct Prices</h3></figcaption>
			</figure>			
		</div>
		
		<div class="center-box cf">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="post-home">

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

				</article><!-- #post -->

			<?php endwhile; ?>
			
			<?php get_sidebar('home'); ?>
		</div>
<?php get_footer(); ?>