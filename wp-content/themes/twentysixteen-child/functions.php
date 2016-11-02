<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/**
 * Checks if any fields exist from the given array.
 *
 * @see Function relied on
 * @link https://www.advancedcustomfields.com/resources/get_sub_field/
 * @link https://www.advancedcustomfields.com/resources/get_field/
 *
 * @param array   $fields        Array of field names to check its existence.
 * @param boolean $is_sub_fields Optional. This flag determines whether to use get_field() or get_sub_field(). Default 'true'.
 * @return boolean Returns true when at least one of the fields exist.
 */
function is_acf_field_exists( $fields, $is_sub_fields = true ) {

    // Returns true when any one of the fields exists.
    $is_exists = false;

    if ( $is_sub_fields ) {
        foreach( $fields as $field ) {
            $is_exists = $is_exists || get_sub_field ( $field );
        }

        return  ( $is_exists ) ? true: false;
    }
    else {
        foreach( $fields as $field ) {
            $is_exists = $is_exists || get_field ( $field );
        }

        return  ( $is_exists ) ? true: false;
    }

    return $is_exists;
}
