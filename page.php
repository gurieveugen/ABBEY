<?php
get_header(); 
the_post();

$image    = has_post_thumbnail(get_the_id()) ? \__::getThumbnailURL(get_the_id(), 'page-thumbnail') : 'http://placehold.it/876x199';
$subtitle = (string) get_post_meta(get_the_id(), 'apo_subtitle', true);
?>

<div class="topdefault-page">
  <figure>
	  <img src="<?php echo $image; ?>" alt="<?php echo get_the_title(); ?>">
		<figcaption><p><?php echo $subtitle; ?></p></figcaption>
	</figure>			
</div>
		
<div class="center-box cf">
	
	<?php the_content(); ?>
</div>
<?php get_footer(); ?>