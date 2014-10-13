<?php
$options = __::getOptions(
	array(
		'gs_phone_text',
		'gs_pinterest_url',
		'gs_facebook_url'
	)
);
extract($options);
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
<!--[if IE]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="screen"><![endif]-->
<script>
	(function($) {
	$(function() {
		$('.contact-form input').styler();
	})
	})(jQuery)
</script>
</head>

<body <?php body_class(); ?>>
<div class="global-box cf">
  <header id="header">
    <div class="center-box cf">
		  <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="phone-header-home">
			  <p><?php echo $gs_phone_text; ?></p>
			  <ul class="share-header">
					<li class="pinterest"><a href="<?php echo $gs_pinterest_url; ?>">pinterest</a></li>
			    <li class="facebook"><a href="<?php echo $gs_facebook_url; ?>">facebook</a></li>
				</ul>
			</div>
			<div class="bottom-header">
			  <div class="btn-freequote"><a href="/contact">Request a FREE Quote</a></div>
				<div class="searchform-box">
				  <?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</header>

	<nav class="main-menu cf">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
		<div class="sub-menu cf">
				  <div class="item-sub-menu">
					  <h2>Indoor Blinds</h2>
						<ul>
						  <li><a href="#">Roller</a></li>
							<li><a href="#">Sunscreen</a></li>
							<li><a href="#">Double Roller</a></li>
						</ul>
						<ul>
						  <li><a href="#">Aluminium</a></li>
							<li><a href="#">Timber</a></li>
							<li><a href="#">Roman</a></li>
						</ul>
						<ul>
						  <li><a href="#">Vertical</a></li>
							<li><a href="#">Panel</a></li>
							<li><a href="#">Shutters</a></li>
						</ul>
						<ul>
						  <li><a href="#">Motorized</a></li>
							<li><a href="#">Curtains</a></li>
						</ul>
					</div>
					
					<figure class="img-sub-menu">
					  <figcaption>Timber Blinds are an effective light control and suitable for all environments</figcaption>
						<img src="<?php echo get_template_directory_uri(); ?>/images/uploads/img_sub_menu.jpg" alt=" ">
					</figure>
				</div>
	</nav>	
	
	<section id="content-section" class="cf">	
	

