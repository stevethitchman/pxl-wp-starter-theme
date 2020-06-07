<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'pxl' ); ?></a>
<header class="site_header">
	<div class="row">
		<div class="large-6 medium-6 columns">

		</div>
		<div class="large-6 medium-6 columns">
			<?php
				wp_nav_menu([
					'container' => null,
					'menu_class' => 'main__menu',
					'theme_location' => 'primary'
				]);
			?>
		</div>
	</div>
</header>
<div class="content_wrapper" id="content">