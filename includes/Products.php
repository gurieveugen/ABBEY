<?php 

class Products{
	//                          __              __      
	//   _________  ____  _____/ /_____ _____  / /______
	//  / ___/ __ \/ __ \/ ___/ __/ __ `/ __ \/ __/ ___/
	// / /__/ /_/ / / / (__  ) /_/ /_/ / / / / /_(__  ) 
	// \___/\____/_/ /_/____/\__/\__,_/_/ /_/\__/____/  
	const CONTENT_MAX_LENGHT = 442;	                                                 
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct()
	{
		add_shortcode('products', array(&$this, 'getHTML'));
	}

	public function getHTML($atts)
	{
		$defaults = array(
			'category'   => 'commercial',
			'show_logos' => ''
		);
		$atts                 = array_merge($defaults, (array) $atts);
		$is_show              = $atts['show_logos'] == 'on';
		$is_show_testimonials = $atts['show_testimonials'] == 'on';
		$atts['product_cat']  = $atts['category'];
		
		unset($atts['category']);
		unset($atts['show_logos']);
		$args    = array(
			'product_cat'      => $atts['product_cat'],
			'posts_per_page'   => 3,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'product',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		$args = array_merge($args, $atts);
		$products = get_posts($args);
		$result   = array();
		$term     = get_term_by('slug', $atts['product_cat'], 'product_cat');
		$logos    = '';
		
		if(count($products))
		{
			foreach ($products as &$product) 
			{
				$result[] = $this->wrapProduct($product);
			}

			if($is_show)
			{
				$result = array_slice($result, 0, 2);
				$logos  = do_shortcode('[logos]');
			}

			if($is_show_testimonials)
			{
				$testimonials = do_shortcode( '[testimonials wrap_class="testimonials-list-post" posts_per_page="2"]' );
			}
			$show = $is_show; 
			$show = $is_show_testimonials ? true : false;
			$css_class = $this->getPadding($show, count($products));

			return $this->wrapProducts(implode('', $result), $term, $css_class, $logos.$testimonials);
		}
	}

	/**
	 * Wrap products to HTML
	 * @param  string $products  --- products HTML code
	 * @param  object $term      --- products term
	 * @param  string $css_class --- padding class
	 * @return string            --- HTML code
	 */
	protected function wrapProducts($products, $term, $css_class, $logos)
	{
		ob_start();
		$classes['pelmetsaccessories'] = 'small';
		$class = isset($classes[$term->slug]) ? $classes[$term->slug] : '';
		?>

		<div class="<?php echo $css_class; ?> cf">
			<?php echo getLogoProductFromCat($term); ?>
			<div id="post-<?php echo $term->term_id; ?>" class="post-product cf">
				<header class="tit-product">
					<h1 class="<?php echo $class;?> "><?php echo $term->name; ?></h1>
				</header>
				<ul class="smallpost-list cf">
					<?php echo $products; ?>
				</ul>
			</div>
			<?php echo $logos; ?>
		</div>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	/**
	 * Wrap single product to HTML
	 * @param  object $product --- post object
	 * @return string       --- HTML code
	 */
	protected function wrapProduct($product)
	{
		$images = $this->getImages($product->ID);
		$logos  = $this->getAdditionalLogos($product->ID);
		$show_title = (string) get_post_meta($product->ID, 'pl_show_title', true );
		$title = (strlen($product->post_title) AND ($show_title)) ? sprintf('<h2>%s</h2>', $product->post_title) : '';
		ob_start();
		?>
		<li>
			<article class="cf">
				<?php
				echo $this->wrapImages($images, $product->ID);
				?>
				<div class="txt">
					<?php echo $title; ?>
					<p><?php echo $product->post_content; ?></p>
					<footer>
						<?php echo $this->getMoreButton($product); ?><a href="/contact" class="btn-enquiry">Make an enquiry</a>
						<?php 
						if(count($logos))
						{
							printf('<figure>%s</figure>', implode('', $logos));
						}
						?>
					</footer>
				</div>
			</article>
		</li>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	/**
	 * Get more button
	 * @param  object $p --- post object
	 * @return string
	 */
	private function getMoreButton($p)
	{
		if(strlen($p->post_content) > self::CONTENT_MAX_LENGHT)
		{
			return '<a href="#" class="more">More</a>';
		}
		return '';
	}

	/**
	 * Wrap images array to HTML code
	 * @param  array $images --- image objects
	 * @return string --- HTML code
	 */
	public function wrapImages($images, $post_id)
	{
		$first  = true;
		$result = array();
		if(is_array($images) && count($images))
		{
			if(count($images) > 1)
			{
				foreach ($images as $img) 
				{
					array_push($result, $this->wrapImage($img, !$first, $post_id));
					$first = false;
				}	
			}
			else
			{
				array_push($result, $this->wrapOneImage($images[0], $post_id));
			}
		}
		return implode('', $result);
	}

	/**
	 * Wrap image post to HTML code
	 * @param  object $image --- post object with image and image_full field
	 * @param  boolean $hide  --- hide or no
	 * @return string --- HTML code
	 */
	public function wrapImage($image, $hide, $post_id)
	{
		$style = ($hide) ? 'style="display: none;"' : '';
		ob_start();
		?>
		<figure class="img" <?php echo $style; ?>>
			<a href="<?php echo $image['image_full']; ?>" data-lightbox="group<?php echo $post_id; ?>" data-title="<?php echo esc_attr( strip_tags($image['title'])); ?>">
			  <span>See images</span>
				<img src="<?php echo $image['image_thumb']; ?>" alt="<?php echo esc_attr( strip_tags($image['title'])); ?>">
			</a>
		</figure>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	/**
	 * Wrap image post to HTML code
	 * @param  object $image --- post object with image and image_full field
	 * @return string --- HTML code
	 */
	public function wrapOneImage($image, $post_id)
	{
		ob_start();
		?>
		<figure class="img">
			<img src="<?php echo $image['image_thumb']; ?>" alt="<?php echo esc_attr( strip_tags($image['title'])); ?>">
		</figure>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}
	
	/**
	 * Get all images from post
	 * @param  integer $id --- post id
	 * @return array --- images post
	 */
	public function getImages($id)
	{
		$attachments = array();

		$thumb_id = get_post_thumbnail_id( $id );
		$res = array();
		$attachments = get_field('images', $id);
		if ( $attachments )
		{
			foreach ( $attachments as &$attachment )
			{
				$tmp = wp_get_attachment_image_src($attachment['image'], 'thumbnail');
				$tmp_full = wp_get_attachment_image_src($attachment['image'], 'full');

				if(!$tmp[0]) continue;
				
				$attachment['image_thumb'] = $tmp[0];
				$attachment['image_full'] = $tmp_full[0];
				array_push($res, $attachment);	
			}
		}

		$thumb = get_post( $thumb_id );
		
		if($thumb !== null)
		{
			$tmp = wp_get_attachment_image_src($thumb->ID, 'thumbnail');
			$tmp_full = wp_get_attachment_image_src($thumb->ID, 'full');

			$new_thumb['image_thumb'] = $tmp[0];
			$new_thumb['image_full']  = $tmp_full[0];
			$new_thumb['title']       = $thumb->post_title;
			$new_thumb['image']       = $thumb->ID;
			array_unshift($res, $new_thumb);
		}

		return $res;
	}

	public static function getAdditionalLogos($product_id)
	{
		$result = array();
		$fields = array(
			'first' => array('pl_first_logo', 'pl_first_logo_link'),
			'second' =>  array('pl_second_logo', 'pl_second_logo_link')
		);
	
		foreach ($fields as $key => $value) 
		{
			$result[] = self::getAdditionalLogo($product_id, $value);
		}
		return $result;
	}

	public static function getAdditionalLogo($product_id, $field)
	{
		$logo = (string) get_post_meta($product_id, $field[0], true);
		$logo_url = (string) get_post_meta($product_id, $field[1], true);
		if(strlen($logo))
		{
			$logo_id   = \__::getAttachmentIDFromSrc($logo);
			$logo_img = wp_get_attachment_image_src($logo_id, 'thumbnail');
			if(is_array($logo_img)) return sprintf('<a href="%s"><img alt=" " src="%s"></a>', $logo_url, $logo_img[0]);
		}
		return '';
	}

	/**
	 * Get padding class.
	 * Sorry about that but this client wanted
	 * @param  boolean $show  --- logos blox show
	 * @param  integer $count --- products count
	 * @return string         --- CSS class
	 */
	protected function getPadding($show, $count)
	{
		$show  = intval($show);
		$count = $show ? min(2, $count) : min(3, $count);
		$arr  = array(
			0 => array(
				1 => 'padding-top278',
				2 => 'padding-top278',
				3 => 'padding-top91'
			),
			1 => array(
				1 => 'padding-top278',
				2 => 'padding-top91',
				3 => ''
			)
		);
		return $arr[$show][$count];
	}
}