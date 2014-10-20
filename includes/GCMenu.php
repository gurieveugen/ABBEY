<?php
require_once 'GCEditWalker.php';
require_once 'GCViewWalker.php';

class GCMenu{	
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct()
	{	
		// =========================================================
		// Hooks
		// =========================================================
		add_filter('wp_setup_nav_menu_item', array($this, 'gcAddCustomNavFields'));		
		add_action('wp_update_nav_menu_item', array($this, 'gcUpdateCustomNavFields'), 10, 3);
		add_filter('wp_edit_nav_menu_walker', array($this, 'gcEditWalker'), 10, 2);
	}
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 * @param  object $menu_item
	 * @return object
	 */
	public function gcAddCustomNavFields($menu_item) 
	{
		$menu_item->description    = get_post_meta($menu_item->ID, 'menu-item-description', true);
		$menu_item->image_url      = get_post_meta($menu_item->ID, 'menu-item-image_url', true);
		$menu_item->count_submenus = get_post_meta($menu_item->ID, 'menu-item-count_submenus', true);
	    return $menu_item;
	}
	
	/**
	 * Save menu custom fields
	 * @param  integer $menu_id        
	 * @param  integer $menu_item_db_id
	 * @param  array $args            
	 */
	public function gcUpdateCustomNavFields($menu_id, $menu_item_db_id, $args) 
	{  
		$keys = array(
			'menu-item-description',
			'menu-item-image_url',
			'menu-item-count_submenus'
		);

		foreach ($keys as $key) 
		{
			if ( is_array( $_REQUEST[$key] ) ) 
			{
				$value = $_REQUEST[$key][$menu_item_db_id];
				update_post_meta($menu_item_db_id, $key, $value);
			}
		}
	}
	
	/**
	 * Define new Walker edit
	 * @param  object $walker  
	 * @param  integer $menu_id
	 * @return string
	 */
	public function gcEditWalker($walker, $menu_id) 
	{
		return 'GCEditWalker';
	}
}
$GLOBALS['gcmenu'] = new GCMenu();