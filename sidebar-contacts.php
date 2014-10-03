<?php
if(is_active_sidebar('contact-page-sidebar'))
{
	echo '<aside class="sidebar-contact">';
	dynamic_sidebar('contact-page-sidebar');
	echo '</aside>';
}
?>	