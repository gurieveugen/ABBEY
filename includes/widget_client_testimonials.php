<?php

class ClientTestimonials extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct(
			'client_testimonials', 
			__('Client testimonials'), 
			array( 
				'description' => __('Add a client testimonials to sidebar.'), 
				'classname' => 'widget-testimonials cf'
			)
		);
	}

	function widget($args, $instance) 
	{
		echo $args['before_widget'];
		
		$title = strlen($instance['title']) ? $args['before_title'].$instance['title'].$args['after_title'] : '';
		$count = intval($instance['count']);
		$testimonials_args = array(
			'posts_per_page'   => $count,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'testimonial',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true
		);

		$testimonials = (array) get_posts($testimonials_args);

		echo $title;
		if(count($testimonials))
		{
			echo '<ul>';
			foreach ($testimonials as $testimonial) 
			{
				echo $this->wrapTestimonial($testimonial);
			}
			echo '</ul>';
		}
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['count'] = intval($new_instance['count']);
		return $instance;
	}

	function form( $instance ) 
	{
		$arr = array(
			'count'   => $instance['count'] ? $instance['count'] : '',
			'title'   => $instance['title'] ? $instance['title'] : ''
		);
		

		extract($arr);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Count:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $count; ?>" />
		</p>
		<?php
	}

	function wrapTestimonial($testimonial)
	{	
	    ob_start();
	    ?>
		<li>
			<blockquote>
				<p><?php echo $testimonial->post_content; ?></p>
				<h4><?php echo $testimonial->post_title; ?></h4>
			</blockquote>
		</li>
	    <?php
	    $var = ob_get_contents();
	    ob_end_clean();
	    return $var;
	}
}