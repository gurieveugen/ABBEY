<?php
if(is_active_sidebar('internal-page-sidebar'))
{
	echo '<aside class="sidebar-about">';
	dynamic_sidebar('internal-page-sidebar');
	echo '</aside>';
}
?>	