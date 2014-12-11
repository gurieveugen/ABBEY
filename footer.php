<?php
$options = __::getOptions(
	array(
		'gs_pinterest_url',
		'gs_facebook_url',
		'gs_address'
	)
);
extract($options);
?>

	</section>
	
	<footer id="footer" class="cf">
    <div class="logo-footer">
    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
    </div>
		<div class="address-footer"><p><strong>Abbey Blinds & Curtains</strong><?php echo $gs_address; ?></p></div>
		<ul class="share-footer">
		  	<li class="pinterest"><a href="<?php echo $gs_pinterest_url; ?>">pinterest</a></li>
			<li class="facebook"><a href="<?php echo $gs_facebook_url; ?>">facebook</a></li>
		</ul>
		<div class="cart-footer">
		  <h3>Visa & Mastercard accepted</h3>
			<ul>
			  <li><img src="<?php echo get_template_directory_uri(); ?>/images/visa.png" alt="Visa"></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/master.png" alt="Mastercard"></li>
			</ul>
			<p>Servicing the metro area</p>
		</div>
	</footer>
</div>

	<?php wp_footer(); ?>
</body>
</html>