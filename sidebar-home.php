<?php
if(is_active_sidebar('front-page-sidebar'))
{
	echo '<aside class="sidebar-home">';
	dynamic_sidebar('front-page-sidebar');
	echo '</aside>';
}
?>		
