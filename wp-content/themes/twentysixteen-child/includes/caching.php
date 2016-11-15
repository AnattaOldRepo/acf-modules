<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 11/15/16
 * Time: 1:23 PM
 */


use phpFastCache\CacheManager;
require get_stylesheet_directory() . "/phpFastCache/src/autoload.php";

// Setup File Path on your config files
CacheManager::setDefaultConfig(array(
    // CACHE_PATH is stored in wp-config.php file
    "path" => CACHE_PATH, // or in windows "C:/tmp/"
));

function get_cache_instance() {

    global $InstanceCache;

    if( ! isset( $InstanceCache ) ) {
        // Use the preferred driver with getInstance method.
        $InstanceCache = CacheManager::getInstance('files');
    }

    //echo "GetCacheInstance";
    return $InstanceCache;
}

function prefix_id_with_cache_key( $key ) {
    $page_id = get_the_ID();
    return $page_id . '-' . $key;
}
