<?php
//function pxl_mce_buttons($buttons)
//{
//	array_unshift($buttons, 'styleselect');
//
//	return $buttons;
//}
//add_filter('mce_buttons_2', 'pxl_mce_buttons');
//
//function pxl_mce_formats($init_array)
//{
//	$styles = [
//		[
//			'title' => 'Standfirst',
//			'block' => 'p',
//			'classes' => 'standfirst',
//			//'wrapper' => true
//		],
//		[
//			'title' => 'Standfirst regular',
//			'block' => 'p',
//			'classes' => 'standfirst--alt'
//		]
//	];
//
//	$init_array['style_formats'] = json_encode($styles);
//
//	return $init_array;
//}
//add_filter('tiny_mce_before_init', 'pxl_mce_formats');