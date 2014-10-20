<?php
class GCViewWalker extends Walker_Nav_Menu
{
    private $subitems_count = 0;
	/**
     * Starts the list before the elements are added.
     *
     * @see Walker::start_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class=\"sub-menu cf\" style=\"display: none;\">\n";
    }
    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker::end_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</div>\n";
    }
    /**
     * Start the element output.
     *
     * @see Walker::start_el()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    	$end_tags = '';
        if($depth == 1 && $item->menu_item_parent)
    	{
            $all_items = $this->getAllItems($item->menu_item_parent);
            $p = get_post($item->menu_item_parent);
            $p = wp_setup_nav_menu_item($p);

            if($all_items[0]->ID == $item->ID)
            {
                $output .= '<div class="item-sub-menu">';
                $output .= sprintf('<h2>%s</h2>', $p->title);
                $output .= '<ul>';
            }
    		$this->subitems_count++;
            if($this->subitems_count)
            {
                if(is_int($this->subitems_count / $p->count_submenus))
                {
                    $end_tags .= '</ul><ul>';
                }
            }
    	}
        else
        {
            $this->subitems_count = 0;    
        }
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        /**
         * Filter the CSS class(es) applied to a menu item's <li>.
         *
         * @since 3.0.0
         *
         * @see wp_nav_menu()
         *
         * @param array  $classes The CSS classes that are applied to the menu item's <li>.
         * @param object $item    The current menu item.
         * @param array  $args    An array of wp_nav_menu() arguments.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        /**
         * Filter the ID applied to a menu item's <li>.
         *
         * @since 3.0.1
         *
         * @see wp_nav_menu()
         *
         * @param string $menu_id The ID that is applied to the menu item's <li>.
         * @param object $item    The current menu item.
         * @param array  $args    An array of wp_nav_menu() arguments.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $class_names .'>';
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        /**
         * Filter the HTML attributes applied to a menu item's <a>.
         *
         * @since 3.6.0
         *
         * @see wp_nav_menu()
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param object $item The current menu item.
         * @param array  $args An array of wp_nav_menu() arguments.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                        $attributes .= ' ' . $attr . '="' . $value . '"';
                }
        }
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        /** This filter is documented in wp-includes/post-template.php */
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        /**
         * Filter a menu item's starting output.
         *
         * The menu item's starting output only includes $args->before, the opening <a>,
         * the menu item's title, the closing </a>, and $args->after. Currently, there is
         * no filter for modifying the opening and closing <li> for a menu item.
         *
         * @since 3.0.0
         *
         * @see wp_nav_menu()
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param object $item        Menu item data object.
         * @param int    $depth       Depth of menu item. Used for padding.
         * @param array  $args        An array of wp_nav_menu() arguments.
         */
    
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        $output .= $end_tags;
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) 
    {
        $output .= "</li>\n";
        if($depth == 1 && $item->menu_item_parent)
        {
            if($this->subitems_count != 0 AND intval($p->count_submenus) != 0)
            {
                if(is_int($this->subitems_count / $p->count_submenus))
                {
                    $output .= '</ul>';
                }
            }

            $all_items = $this->getAllItems($item->menu_item_parent);
            $count = count($all_items)-1;
            $p = get_post($item->menu_item_parent);
            $p = wp_setup_nav_menu_item($p);
            if($all_items[$count]->ID == $item->ID)
            {
                $output .= '</ul></div>';
                $output.= $this->wrapDescription($p);
            }
            
        }
    }

    public function wrapDescription($p)
    {
        ob_start();
        ?>
        <figure class="img-sub-menu">
            <figcaption><?php echo $p->description; ?></figcaption>
            <img alt="<?php echo $p->title; ?>" src="<?php echo $p->image_url; ?>">
        </figure>
        <?php
        
        $var = ob_get_contents();
        ob_end_clean();
        return $var;
    }

    public function getAllItems($parent_ID)
    {
        $args = array(
            'order'                  => 'ASC',
            'orderby'                => 'menu_order',
            'post_type'              => 'nav_menu_item',
            'post_status'            => 'publish',
            'output'                 => ARRAY_A,
            'output_key'             => 'menu_order',
            'nopaging'               => true,
            'update_post_term_cache' => false,
            'meta_query' => array(
                array(
                    'key'     => '_menu_item_menu_item_parent',
                    'value'   => $parent_ID,
                    'compare' => 'IN',
                ),
            ), 
        );
        return wp_get_nav_menu_items( 'Main Menu', $args );
    }
}