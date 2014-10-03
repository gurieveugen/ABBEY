<?php 
$qo         = get_queried_object();
$field_img  = Taxonomy::getOptionName($qo->term_id, 'product_cat_background_image');
$field_show = Taxonomy::getOptionName($qo->term_id, 'product_cat_show_logos_box');
$image      = (string) get_option($field_img);

get_header(); 
?>
<div class="product-page center-box cf">
	<?php get_sidebar(); ?>
	<div class="space">&nbsp;</div>	
	<div class="right-product" style="background:0px 0px url(<?php echo $image; ?>) no-repeat #FFFFFF;">
	<?php 
	if($qo->parent == 19) // Comercial parent category
	{
		echo do_shortcode(
			sprintf(
				'[products_comercial category="%s" show_logos=""][/products_comercial]',
				$qo->slug
			)
		); 

	}
	else
	{
		echo do_shortcode(
			sprintf(
				'[products category="%s" show_logos="%s"][/products]',
				$qo->slug,
				(string) get_option($field_show)
			)
		); 
	}
	?>
	</div>
</div>
<?php get_footer(); ?>