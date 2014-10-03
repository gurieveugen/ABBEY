<?php
/**
 * Template Name: Page with sidebar
 */

get_header(); 
the_post();

$image    = has_post_thumbnail(get_the_id()) ? \__::getThumbnailURL(get_the_id(), 'page-thumbnail') : 'http://placehold.it/876x199';
$subtitle = (string) get_post_meta(get_the_id(), 'apo_subtitle', true);
?>



  <div class="topdefault-page">
		  <figure>
			  	<img src="<?php echo $image ; ?>" alt=" ">
				<figcaption><h3><?php echo $subtitle; ?></h3></figcaption>
			</figure>			
		</div>
		
		<div class="center-box cf">
			<article id="post-<?php the_ID(); ?>" class="post-about">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</article><!-- #post -->

			<?php get_sidebar('internal'); ?>
		</div>
<?php get_footer(); ?>