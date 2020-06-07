<?php

function pxl_get_version()
{
	return '1.0';
}

function pxl_get_post_pagination_settings()
{
	return [
		'prev_text'     => 'Previous post',
		'next_text'     => 'Next post',

	];
}

function pxl_get_comment_list_settings()
{
	return [
		'avatar_size'   => 100,
		'style'         => 'ol',
		'short_ping'    => true,
		'reply_text'    => __('Reply', 'pxl')
	];
}

function pxl_get_comment_pagination_settings()
{
	return [
		'prev_text'     => 'Previous',
		'next_text'     => 'Next'
	];
}

function pxl_get_page_link_settings()
{
	return [
		'before'        => '<div class="page_links">Pages',
		'after'         => '</div>',
		'link_before'   => '<span class="page_number">',
		'link_after'    => '</span>',
	];
}