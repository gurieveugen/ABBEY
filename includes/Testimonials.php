<?php

class Testimonials{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct()
	{
		add_shortcode('testimonials', array(&$this, 'getHTML'));
	}
	
	public function getHTML($args = array())
	{
		global $testimonials;
		
		if(empty($testimonials)){
		
		$defaults = array(
			'posts_per_page'   => 10,
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
			'suppress_filters' => true,
			'wrap_class'       => 'testimonials-list cf'
		);
		
		$args         = array_merge($defaults, (array) $args);
		$testimonials = get_posts($args);
		}
		
		$result       = array();
		if(count($testimonials))
		{
			foreach ($testimonials as &$testimonial) 
			{
				$result[] = $this->wrapTestimonial($testimonial);
			}
			return $this->wrapTestimonials(implode('', $result), $args['wrap_class']);
		}
		return '';
	}  

	/**
	 * Wrap testimonials to HTML
	 * @param  string $testimonials --- testimonials HTML code
	 * @return string               --- HTML code
	 */
	private function wrapTestimonials($testimonials, $wrap_class)
	{
		ob_start();
		?>
		<ul class="<?php echo $wrap_class; ?>">
			<?php echo $testimonials; ?>
		</ul>
		<?php		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}                                           

	/**
	 * Wrap single testimonial to HTML
	 * @param  object $slide --- post object
	 * @return string        --- HTML code
	 */
	private function wrapTestimonial($testimonial)
	{
		$img_ava = sprintf('<img alt="Avatar" src="%s/images/uploads/ava.jpg">', TDU);
		$rating  = intval(get_post_meta($testimonial->ID, 'ato_rating', true));

		ob_start();
		?>
		<li class="cf">
			<figure>
				<?php echo $img_ava; ?>
			</figure>
			<div class="name">
				<?php echo $this->getStars($rating); ?>
				<h3><?php echo $testimonial->post_title; ?></h3>
			</div>
			<div class="txt">
				<p>“<?php echo $testimonial->post_content; ?>”</p>
			</div>
		</li>
		<?php
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	/**
	 * Get rating stars
	 * @param  integer $rating --- rating
	 * @return string          --- HTML code
	 */
	private function getStars($rating)
	{
		$img_star_active = sprintf('<li><img alt="Star active" src="%s/images/star_active.png"></li>', TDU);
		$img_star        = sprintf('<li><img alt="Star active" src="%s/images/star.png"></li>', TDU);
		$arr             = array_fill(0, 5, $img_star);

		for ($i=0; $i < $rating; $i++) 
		{ 
			$arr[$i] = $img_star_active;
		}

		return sprintf('<ul class="star-list cf">%s</ul>', implode('', $arr));
	}
}