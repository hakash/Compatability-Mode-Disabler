<?php

/*
Plugin Name: Compatibility Mode Disabler
Description: Force IE to not use compatibility settings
Version: 1.0.0
Author: Morten Olsrud
Author URI: http://acodersthoughts.wordpress.com
*/

add_filter( 'wp_headers', 'compatibility_mode_disabler' );

function compatibility_mode_disabler( $headers ) {
    if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) )
    {
        // Add header for forcing IE to NOT use compatibility mode
        // also make Chrome Frame start if present.
        $headers['X-UA-Compatible'] = 'IE=edge,chrome=1';
    }

    return $headers;
}
