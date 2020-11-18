<?php

if(!function_exists('bridge_qode_child_theme_enqueue_scripts')) {

	Function bridge_qode_child_theme_enqueue_scripts() {
		wp_register_style('bridge-childstyle', get_stylesheet_directory_uri() . '/style.css');
		wp_enqueue_style('bridge-childstyle');
		wp_register_style('bridge-childstyle-fa-core', get_stylesheet_directory_uri() . '/font-awesome-5-pro/css/fontawesome.min.css');
		wp_enqueue_style('bridge-childstyle-fa-core');
		wp_register_style('bridge-childstyle-fal', get_stylesheet_directory_uri() . '/font-awesome-5-pro/css/light.min.css');
		wp_enqueue_style('bridge-childstyle-fal');
	}

	add_action('wp_enqueue_scripts', 'bridge_qode_child_theme_enqueue_scripts', 11);
}
