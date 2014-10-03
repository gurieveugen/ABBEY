<?php

class VideoBox extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct(
			'video_box', 
			__('Video box'), 
			array( 
				'description' => __('Add a video box to sidebar.'), 
				'classname' => 'widget-video cf'
			)
		);
	}

	function widget($args, $instance) 
	{
		echo $args['before_widget'];

		$video_code = (string) $instance['video_code'];
		$url        = strlen($instance['url']) ? $instance['url'] : '#';

		printf('<div class="video-box">%s</div>', $video_code);
		printf('<a class="more" href="%s">click to View our video </a>', $url);
		
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['video_code']   = $new_instance['video_code'];
		$instance['url'] = strip_tags($new_instance['url']);
		return $instance;
	}

	function form( $instance ) 
	{
		$arr = array(
			'video_code'   => $instance['video_code'] ? $instance['video_code'] : '',
			'url' => $instance['url'] ? $instance['url'] : ''	
		);
		

		extract($arr);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Click to view URL:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" value="<?php echo $url; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('video_code'); ?>"><?php _e('Bullets:') ?></label>
			<textarea name="<?php echo $this->get_field_name('video_code'); ?>" class="widefat" id="<?php echo $this->get_field_id('video_code'); ?>" cols="30" rows="10"><?php echo $video_code; ?></textarea>
		</p>
		<?php
	}
}