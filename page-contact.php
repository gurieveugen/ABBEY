<?php
/**
 * Template Name: Contact Page
 */

get_header(); 
the_post();
?>

<div class="contact-page center-box cf">
	<?php get_sidebar('contacts'); ?>
	<div class="space">&nbsp;</div>
	<div class="right-contact">
		<article id="post-<?php the_ID(); ?>" class="contact-post cf">
			<?php
			the_content();
			wp_link_pages( 
				array( 
					'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 
					'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' 
				) 
			); 
			?>
		</article>
	</div>
</div>
<?php get_footer(); ?>