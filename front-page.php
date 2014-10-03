<?php
get_header(); 
$slider = new Slider();
$count  = intval(get_option('mso_count_slides'));
echo $slider->getHTML(array('posts_per_page' => $count));
?>
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