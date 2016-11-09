<?php
/**
 * The template used to register styles when using ACF Latlong locator plugin
 *
 */

// $theme_version is assigned in the theme-info.php file.
include( locate_template( 'acf-template-specifics/theme-info.php' ) );

// Register & include styles
wp_register_style( 'acf-input-latlon-style-picker', get_stylesheet_directory_uri() . "/assets/css/jquery-gmaps-latlon-picker.css", array(), $theme_version );

wp_enqueue_style( 'acf-input-latlon-style-picker' );
