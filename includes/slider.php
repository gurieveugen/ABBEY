<?php

class Slider{

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  

	/**
	 * Get slidet HTML
	 * @param  array  $args --- query arguments
	 * @return string       --- HTML code
	 */
	public function getHTML($args = array())
	{
		$defaults = array(
			'posts_per_page'   => 5,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'slider',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);

		$args   = array_merge($defaults, $args);
		$slides = get_posts($args);
		$res    = array();
		if(count($slides))
		{
			foreach ($slides as &$slide) 
			{
				$res[] = $this->wrapSlide($slide);
			}
			return $this->wrapSlider(implode('', $res));
		}
		return '';
	}                                        

	private function wrapSlider($slides)
	{
		ob_start();
		?>
		<div class="tophome-page">
			<aside>
				<ul class="slides">
					<?php echo $slides; ?>
				</ul>
			</aside>			
		</div>
		<?php

	    $var = ob_get_contents();
	    ob_end_clean();
	    return $var;
	}

	/**
	 * Wrap single slide to HTML
	 * @param  object $slide --- post object
	 * @return string        --- HTML code
	 */
	private function wrapSlide($slide)
	{
		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($slide->ID), 'slider');
	    $thumb = is_array($thumb) ? $thumb[0] : 'http://placehold.it/1020x328';
		ob_start();
		?>
		<li>
			<figure>
				<img src="<?php echo $thumb; ?>" alt="<?php echo $slide->post_title; ?>">
				<figcaption><h3><?php echo $slide->post_title; ?></h3></figcaption>
			</figure>
		</li>
		<?php

	    $var = ob_get_contents();
	    ob_end_clean();
	    return $var;
	}
}