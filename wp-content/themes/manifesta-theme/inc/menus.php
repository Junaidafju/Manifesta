<?php
/**
 * Navigation menu registration.
 *
 * @package Manifesta
 */

add_action( 'after_setup_theme', function () {
    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'manifesta' ),
        'footer'  => __( 'Footer Navigation', 'manifesta' ),
        'top-bar' => __( 'Top Bar Menu', 'manifesta' ),
    ] );
} );
