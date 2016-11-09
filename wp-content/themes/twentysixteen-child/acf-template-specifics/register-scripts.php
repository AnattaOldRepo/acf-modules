<?php
/**
 * The template used to register scripts when using ACF Latlong locator plugin
 *
 */

// $theme_version is assigned in the theme-info.php file.
include( locate_template( 'acf-template-specifics/theme-info.php' ) );

// Register & include Javascripts
// Google Maps API
wp_register_script( 'acf-input-google-maps', esc_url_raw( "https://maps.googleapis.com/maps/api/js?key=AIzaSyDRoWXl9Z-auDoZXssuBgCx6uFqGjmsh_4" ), array(), $theme_version );

// jQuery Gmaps location picker
wp_register_script( 'acf-input-location-picker', get_stylesheet_directory_uri() . "/assets/js/jquery-gmaps-latlon-picker.js", array( 'jquery' ), $theme_version );

wp_register_script( 'acf-input-latlon-picker', get_stylesheet_directory_uri() . "/assets/js/latlon-locator.js", array(), $theme_version );

wp_enqueue_script( 'acf-input-google-maps' );
wp_enqueue_script( 'acf-input-location-picker' );
wp_enqueue_script( 'acf-input-latlon-picker' );
