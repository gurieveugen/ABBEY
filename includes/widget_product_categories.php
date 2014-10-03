<?php

class ProductCategories extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct(
			'product_categories', 
			__('Product categories'), 
			array( 
				'description' => __('Add a product categories to sidebar.'), 
				'classname' => 'widget-middlemodules cf'
			)
		);
	}

	function widget($args, $instance) 
	{
		$categories = $instance['categories'];
		if(!strlen($categories)) return ;

		$categories = explode(',', $categories);
		
		$terms = get_terms(
			array('product_cat'), 
			array(
				'include' => $categories,
				'hide_empty' => 0
			)
		);

		if (!empty($terms) && !is_wp_error($terms))
		{
			echo $args['before_widget'];
			echo '<ul>';
			foreach ($terms as $term) 
			{
				echo $this->wrapCategory($term);	
			}
			echo '</ul>';
			echo $args['after_widget'];
		}

		
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['categories'] = strip_tags(stripslashes($new_instance['categories']));
		return $instance;
	}

	function form( $instance ) 
	{
		$arr = array(
			'categories'   => $instance['categories'] ? $instance['categories'] : ''
		);
		

		extract($arr);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Categories:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" value="<?php echo $categories; ?>" />
			<small>You need type category ids separated by commas. Like this: 1,2,3,4</small>
		</p>
		<?php
	}

	function wrapCategory($term)
	{	
		$image     = \Admin\Taxonomy::getOptionName($term->term_id, 'product_cat_background_image');
		$image     = get_option($image);
		$image_id  = \__::getAttachmentIDFromSrc($image);
		$image_new = wp_get_attachment_image_src( $image_id, 'product-widget');
		$image_new = is_array($image_new) ?  sprintf('<img alt="%s" src="%s">', $term->name, $image_new[0]) : sprintf('<img alt="%s" src="%s">', $term->name, 'http://placehold.it/325x108');

	    ob_start();
	    ?>
		<li>
			<figure>
				<?php echo $image_new; ?>
				<figcaption><span><?php echo $term->name; ?></span><a class="more" href="<?php echo get_term_link($term); ?>">Click for more</a></figcaption>
			</figure>
		</li>
	    <?php
	    $var = ob_get_contents();
	    ob_end_clean();
	    return $var;
	}
}