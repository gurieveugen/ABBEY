<?php 
$image      = '';

get_header(); 
?>
<div class="product-page center-box search cf">
	<?php get_sidebar(); ?>
	<div class="space">&nbsp;</div>	
	<div class="right-product" style="background:0px 0px url(<?php echo $image; ?>) no-repeat #FFFFFF;">
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></h1>
			</header>
	<?php 
	echo do_shortcode(
		sprintf(
			'[products s="%s" show_logos="%s" posts_per_page="-1" category=""][/products]',
			get_query_var('s'),
			false
		)
	); 

	?>
	</div>
</div>
<?php get_footer(); ?>