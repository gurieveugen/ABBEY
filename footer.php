<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

	</section>
	
	<footer id="footer" class="cf">
    <div class="logo-footer"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></div>
		<div class="address-footer"><p><strong>Abbey Blinds & Curtains</strong><br>PO Box 355, Osborne Park,<br>Western Australia 6917</p></div>
		<ul class="share-footer">
		  <li class="pinterest"><a href="#">pinterest</a></li>
			<li class="facebook"><a href="#">facebook</a></li>
		</ul>
		<div class="cart-footer">
		  <h3>Visa & Mastercard accepted</h3>
			<ul>
			  <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/visa.png" alt=" "></a></li>
				<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/master.png" alt=" "></a></li>
			</ul>
		</div>
	</footer>
</div>

	<?php wp_footer(); ?>
</body>
</html>