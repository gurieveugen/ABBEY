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
		$blocks   = array();
		$blocks[] = array(
			'title' => $instance['first_title'],
			'img'   => strlen($instance['first_img']) ? $instance['first_img'] : 'http://placehold.it/325x108',
			'url'   => $instance['first_url']
		);
		$blocks[] = array(
			'title' => $instance['second_title'],
			'img'   => strlen($instance['second_img']) ? $instance['second_img'] : 'http://placehold.it/325x108',
			'url'   => $instance['second_url']
		);
		$blocks[] = array(
			'title' => $instance['third_title'],
			'img'   => strlen($instance['third_img']) ? $instance['third_img'] : 'http://placehold.it/325x108',
			'url'   => $instance['third_url']
		);
		
		echo $args['before_widget'];
		echo '<ul>';
		foreach ($blocks as $block) 
		{
			if(strlen($block['title']))
			{
				?>
				<li>
					<figure>
						<img src="<?php echo $block['img']; ?>" alt="Commercial">
						<figcaption>
							<span><?php echo $block['title']; ?></span>
							<a href="<?php echo $block['url']; ?>" class="more">Click for more</a>
						</figcaption>
					</figure>
				</li>
				<?php
			}
		}
		echo '</ul>';
		echo $args['after_widget'];
		

		
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['first_img']    = $new_instance['first_img'];
		$instance['first_url']    = $new_instance['first_url'];
		$instance['first_title']  = $new_instance['first_title'];
		$instance['second_img']   = $new_instance['second_img'];
		$instance['second_url']   = $new_instance['second_url'];
		$instance['second_title'] = $new_instance['second_title'];
		$instance['third_img']    = $new_instance['third_img'];
		$instance['third_url']    = $new_instance['third_url'];
		$instance['third_title']  = $new_instance['third_title'];

		return $instance;
	}

	function form( $instance ) 
	{
		$arr = array(
			'first_img'    =>  $instance['first_img'],
			'first_url'    =>  $instance['first_url'],
			'first_title'  =>  $instance['first_title'],
			'second_img'   =>  $instance['second_img'],
			'second_url'   =>  $instance['second_url'],
			'second_title' =>  $instance['second_title'],
			'third_img'    =>  $instance['third_img'],
			'third_url'    =>  $instance['third_url'],
			'third_title'  =>  $instance['third_title'],
		);
		

		extract($arr);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('first_title'); ?>"><?php _e('First title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('first_title'); ?>" name="<?php echo $this->get_field_name('first_title'); ?>" value="<?php echo $first_title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('first_img'); ?>"><?php _e('First Image:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('first_img'); ?>" name="<?php echo $this->get_field_name('first_img'); ?>" value="<?php echo $first_img; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('first_url'); ?>"><?php _e('First URL:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('first_url'); ?>" name="<?php echo $this->get_field_name('first_url'); ?>" value="<?php echo $first_url; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('second_title'); ?>"><?php _e('Second title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('second_title'); ?>" name="<?php echo $this->get_field_name('second_title'); ?>" value="<?php echo $second_title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('second_img'); ?>"><?php _e('Second Image:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('second_img'); ?>" name="<?php echo $this->get_field_name('second_img'); ?>" value="<?php echo $second_img; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('second_url'); ?>"><?php _e('Second URL:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('second_url'); ?>" name="<?php echo $this->get_field_name('second_url'); ?>" value="<?php echo $second_url; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('third_title'); ?>"><?php _e('Third title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('third_title'); ?>" name="<?php echo $this->get_field_name('third_title'); ?>" value="<?php echo $third_title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('third_img'); ?>"><?php _e('Third Image:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('third_img'); ?>" name="<?php echo $this->get_field_name('third_img'); ?>" value="<?php echo $third_img; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('third_url'); ?>"><?php _e('Third URL:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('third_url'); ?>" name="<?php echo $this->get_field_name('third_url'); ?>" value="<?php echo $third_url; ?>" />
		</p>
		<?php
	}
}