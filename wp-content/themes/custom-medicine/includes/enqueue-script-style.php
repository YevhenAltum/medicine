<?php

/**
 * The function include a css files
 */
add_action('wp_enqueue_scripts', 'include_css_files');
function include_css_files()
{
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/includes/css/main.css', array(), null, false);
}

/**
 * The function include a javascript files
 */
add_action('wp_enqueue_scripts', 'include_javascript_files');
function include_javascript_files()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/includes/js/main.js', array(), null, false);
}

