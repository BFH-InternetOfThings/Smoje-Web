<?php
require_once('wp_bootstrap_navwalker.php');

add_action('wp_enqueue_scripts', 'include_scripts');
add_action('wp_print_styles', 'include_styles');
register_nav_menu('primary', 'Smoje top navigation');

function include_scripts() {
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-1.11.1.min.js', false, '1.11.1', true);
	wp_enqueue_script('jquery.validate', get_template_directory_uri() . '/js/jquery.validate.min.js', false, '1.13.1', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '3.3.0', true);
	wp_enqueue_script('maps.googleapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDjzb731OMCmBZDYBSuXB0y1yN5srAzqvM', false, false, true);
	wp_enqueue_script('maps.google.marker', get_template_directory_uri() . '/js/googleMaps.js', false, false, true);
	wp_enqueue_script('custom.functions', get_template_directory_uri() . '/js/functions.js', false, false, true);
	wp_enqueue_script('validate.contact', get_template_directory_uri() . '/js/validate.contact.js', false, false, true);
}

function include_styles() {
	wp_enqueue_style('bootstrap.style', get_template_directory_uri() . '/css/bootstrap.min.css', false, '3.3.0');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('font.awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', false, '4.2.0');
}