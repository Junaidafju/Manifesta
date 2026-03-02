<?php
/**
 * Widget / sidebar areas.
 *
 * @package Manifesta
 */

add_action('widgets_init', function () {

    register_sidebar([
        'name' => __('Sidebar', 'manifesta'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here.', 'manifesta'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ]);

    register_sidebar([
        'name' => __('Footer Widgets', 'manifesta'),
        'id' => 'footer-widgets',
        'description' => __('Footer widget area.', 'manifesta'),
        'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ]);

    register_sidebar([
        'name' => __('Course Sidebar', 'manifesta'),
        'id' => 'course-sidebar',
        'description' => __('Sidebar for course archive/single pages.', 'manifesta'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ]);

    function manifesta_widgets_init()
    {
        // Blog Sidebar
        register_sidebar(array(
            'name' => __('Blog Sidebar', 'manifesta'),
            'id' => 'blog-sidebar',
            'description' => __('Widgets for blog sidebar', 'manifesta'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        // Footer Widget Areas (if not already registered)
        register_sidebar(array(
            'name' => __('Footer Widget Area 1', 'manifesta'),
            'id' => 'footer-1',
            'description' => __('Footer first column', 'manifesta'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="footer-widget-title">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => __('Footer Widget Area 2', 'manifesta'),
            'id' => 'footer-2',
            'description' => __('Footer second column', 'manifesta'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="footer-widget-title">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => __('Footer Widget Area 3', 'manifesta'),
            'id' => 'footer-3',
            'description' => __('Footer third column', 'manifesta'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="footer-widget-title">',
            'after_title' => '</h4>',
        ));
    }
    add_action('widgets_init', 'manifesta_widgets_init');
});
