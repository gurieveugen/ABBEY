<?php
if(is_active_sidebar('products-sidebar'))
{
	echo '<aside class="sidebar-product">';
	echo '<div class="widget-img"><img src="'.get_template_directory_uri().'/images/uploads/tit_02.png" alt=" "></div>';
	dynamic_sidebar('products-sidebar');
	echo '</aside>';
}
?>	