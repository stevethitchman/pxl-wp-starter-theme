<?php
/**
 * @param $image
 * @param string $size
 * @param bool $echo
 * @param array $attr
 * @return string
 */
function pxl_image_output($image, $size = 'full', $echo = true, $attr = [])
{
    if (function_exists('get_rocket_option') && get_rocket_option('lazyload')) {
        $image = wp_get_attachment_image($image, $size, false, $attr);

        $image = rocket_lazyload_images($image);

        if ($echo) {
            echo $image;
        } else {
            return $image;
        }
    } else {
        if ($echo) {
            echo wp_get_attachment_image($image, $size, false, $attr);
        } else {
            return wp_get_attachment_image($image, $size, false, $attr);
        }
    }
}

/**
 * @param $image
 * @param string $size
 * @param bool $echo
 * @return string
 */
function pxl_background_image_output($image, $size = 'full', $echo = true)
{
    $attachment = wp_get_attachment_image_src($image, $size, false);

    if (!empty($attachment) && isset($attachment[0])) {
        if ($echo) {
            echo $attachment[0];
        } else {
            return $attachment[0];
        }
    } else {
        // placeholder
        if ($echo) {
            echo 'data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=';
        } else {
            return 'data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=';
        }
    }
}

/**
 * @param $image
 * @param string $size
 * @param bool $echo
 *
 * @return string
 */
function pxl_lazy_image($image, $size = 'full', $echo = true)
{
    if (function_exists('get_rocket_option') && get_rocket_option('lazyload')) {
        if ($echo) {
            echo 'data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=';
        } else {
            return 'data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=';
        }
    } else {
        if ($echo) {
            echo pxl_background_image_output($image, $size, false);
        } else {
            return pxl_background_image_output($image, $size, false);
        }
    }
}