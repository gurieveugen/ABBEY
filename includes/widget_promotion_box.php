<?php

class PromotionBox extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct(
			'promotion_box', 
			__('Promotion box'), 
			array( 
				'description' => __('Add a promotion box to sidebar.'), 
				'classname' => 'widget-mobileshowroom'
			)
		);
	}

	function widget($args, $instance) 
	{
		echo $args['before_widget'];

		$bullets = (string) $instance['bullets'];
		$bullets = (array) explode("\n", $bullets);
		$image_url = strlen($instance['image_url']) ? $instance['image_url'] : 'http://placehold.it/277x192';

		printf(
			'%s<img alt="Promo box" src="%s">%s',
			$args['before_title'],
			$image_url,
			$args['after_title']
		);

		if(count($bullets))
		{
			echo '<ul>';
			foreach ($bullets as $bullet) 
			{
				echo $this->wrapBullet($bullet);
			}
			echo '</ul>';
		}
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['bullets']   = $new_instance['bullets'];
		$instance['image_url'] = strip_tags($new_instance['image_url']);
		return $instance;
	}

	function form( $instance ) 
	{
		$arr = array(
			'bullets'   => $instance['bullets'] ? $instance['bullets'] : '',
			'image_url' => $instance['image_url'] ? $instance['image_url'] : ''	
		);
		

		extract($arr);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('image_url'); ?>"><?php _e('Image SRC (URL):') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" value="<?php echo $image_url; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('bullets'); ?>"><?php _e('Bullets:') ?></label>
			<textarea name="<?php echo $this->get_field_name('bullets'); ?>" class="widefat" id="<?php echo $this->get_field_id('bullets'); ?>" cols="30" rows="10"><?php echo $bullets; ?></textarea>
		</p>
		<?php
	}

	/**
	 * Wrap one bullet
	 * @param  string $el --- bullet
	 * @return string     --- HTML code
	 */
	function wrapBullet($el)
	{
		return sprintf('<li>%s</li>',$el);
	}
}