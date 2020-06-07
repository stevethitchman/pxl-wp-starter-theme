<?php

require('inc/settings.php');
require('inc/helpers.php');
require('inc/acf.php');
require('inc/acf-blocks.php');
require('inc/gravity-forms.php');
require('inc/tinymce.php');

require('widgets/logos.php');
require('widgets/heading.php');
require('widgets/copyright-notice.php');
require('widgets/social.php');

function pxl_setup()
{
	load_theme_textdomain('pxl'); // not that this is likely to be used...

	// theme support
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	]);
	add_theme_support('editor-styles');
    add_theme_support('align-wide');

	//add_theme_support('woocommerce');
	//add_theme_support( 'wc-product-gallery-zoom' );
	//add_theme_support( 'wc-product-gallery-lightbox' );
	//add_theme_support( 'wc-product-gallery-slider' );

//	add_theme_support('post-formats', [
//		'aside',
//		'image',
//		'video',
//		'quote',
//		'link',
//		'gallery',
//		'audio',
//	]);

	// image sizes
	//add_image_size('pxl-featured', '1000', '1000', true);

	// content width
	$GLOBALS['content_width'] = 780;

	// acf - options page if enabled
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page();
	}

	// menus
	register_nav_menus([
		'primary' => 'Primary menu'
	]);
}
add_action('after_setup_theme', 'pxl_setup');

add_filter('body_class', function ($classes, $class) {
    //$classes[] = 'gforms_hover';
    return $classes;
}, 10, 2);

function pxl_add_editor_styles()
{
// editor styles
    add_editor_style([
        'css/editor-style.css'
    ]);
}
add_action('admin_init', 'pxl_add_editor_styles');


function pxl_styles_and_scripts()
{
	wp_enqueue_style('vendor-css', get_template_directory_uri() .'/assets/css/vendor.css', [], pxl_get_version());
    wp_enqueue_style('media-css', get_template_directory_uri() .'/assets/css/forms.css', [], pxl_get_version());
	wp_enqueue_style('app-css', get_template_directory_uri() .'/assets/css/app.css', [], pxl_get_version());
	wp_enqueue_style('media-css', get_template_directory_uri() .'/assets/css/media.css', [], pxl_get_version());

	wp_enqueue_script('jquery');
	wp_enqueue_script('vendor-js', get_template_directory_uri() .'/assets/js/vendor.js', [], pxl_get_version());
	wp_enqueue_script('app-js', get_template_directory_uri() .'/assets/js/app.js', [], pxl_get_version());

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'pxl_styles_and_scripts');

function pxl_content_image_sizes_attr($sizes, $size)
{
	$width = $size[0];

	$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';

	return $sizes;
}
add_filter('wp_calculate_image_sizes', 'pxl_content_image_sizes_attr', 10, 2);

function pxl_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
	if (is_archive() || is_search() || is_home()) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'pxl_post_thumbnail_sizes_attr', 10, 3);

function pxl_excerpt_read_more($link)
{
	$link = sprintf('<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url(get_permalink(get_the_ID())),
		sprintf(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pxl'), get_the_title(get_the_ID()))
	);

	return ' &hellip; ' . $link;
}
add_filter('excerpt_more', 'pxl_excerpt_read_more');

function pxl_widgets_init()
{
    register_widget('PXL_HeadingWidget');
    register_widget('PXL_LogoWidget');
    register_widget('PXL_SocialWidget');
    register_widget('PXL_CopyrightWidget');
    //dynamic_sidebar
    $footerColumnsCount = 4;
    for ($i = 1; $i <= $footerColumnsCount; $i++) {
        register_sidebar([
            'name' => 'Footer (column '. $i .')',
            'id' => 'footer-column-'. $i,
            'before_widget' => '<div class="footer_widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        ]);
    }

//    register_sidebar([
//        'name'          => 'Sidebar',
//        'id'            => 'sidebar',
//        'description'   => 'Default sidebar',
//        'before_widget' => '<section id="%1$s" class="widget widget--%2$s">',
//        'after_widget'  => '</section>',
//        'before_title'  => '<h3>',
//        'after_title'   => '</h3>'
//    ]);
}
add_action('widgets_init', 'pxl_widgets_init');

function pxl_additional_styles()
{
    ?>
    <style type="text/css">
        <?php if ($playButtonImage = get_field('video_play_button', 'options')): ?>
        .video__wrapper .play_button { background: url(<?= $playButtonImage; ?>) no-repeat center; }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'pxl_additional_styles');