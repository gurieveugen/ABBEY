<?php 
$image      = '';

get_header(); 
?>
<div class="product-page center-box cf">
	<?php get_sidebar(); ?>
	<div class="space">&nbsp;</div>	
	<div class="right-product" style="background:0px 0px url(<?php echo $image; ?>) no-repeat #FFFFFF;">
	<?php 
	echo do_shortcode(
		sprintf(
			'[products s="%s" show_logos="%s" category=""][/products]',
			get_query_var('s'),
			false
		)
	); 

	?>
	</div>
</div>
<?php get_footer(); ?>