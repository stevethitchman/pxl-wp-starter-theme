<?php

function pxl_acf_json_save_point($path)
{
    $path = get_stylesheet_directory() . '/acf-json';

    return $path;
}
add_filter('acf/settings/save_json', 'pxl_acf_json_save_point');


function pxl_acf_json_load_point($paths)
{
    return [get_stylesheet_directory() . '/acf-json'];
}

add_filter('acf/settings/load_json', 'pxl_acf_json_load_point');