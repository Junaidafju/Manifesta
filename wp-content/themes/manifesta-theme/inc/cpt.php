<?php
/**
 * Custom Post Types & Taxonomies.
 *
 * @package Manifesta
 */

// ─── COURSES CPT ────────────────────────────────────────────────────────────
add_action('init', function () {
    register_post_type('course', [
        'labels' => [
            'name' => __('Courses', 'manifesta'),
            'singular_name' => __('Course', 'manifesta'),
            'add_new' => __('Add New', 'manifesta'),
            'add_new_item' => __('Add New Course', 'manifesta'),
            'edit_item' => __('Edit Course', 'manifesta'),
            'new_item' => __('New Course', 'manifesta'),
            'view_item' => __('View Course', 'manifesta'),
            'search_items' => __('Search Courses', 'manifesta'),
            'not_found' => __('No courses found', 'manifesta'),
            'not_found_in_trash' => __('No courses found in trash', 'manifesta'),
            'all_items' => __('All Courses', 'manifesta'),
            'menu_name' => __('Courses', 'manifesta'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'courses'],
        'menu_icon' => 'dashicons-welcome-learn-more',
        'menu_position' => 5,
        'supports' => ['title', 'thumbnail', 'excerpt', 'editor', 'page-attributes'],
        'show_in_rest' => true,
        'taxonomies' => ['course_category'],
    ]);
});

// ─── FACULTY CPT ────────────────────────────────────────────────────────────
add_action('init', function () {
    register_post_type('faculty', [
        'labels' => [
            'name' => __('Faculty', 'manifesta'),
            'singular_name' => __('Faculty Member', 'manifesta'),
            'add_new' => __('Add New', 'manifesta'),
            'add_new_item' => __('Add New Faculty Member', 'manifesta'),
            'edit_item' => __('Edit Faculty Member', 'manifesta'),
            'not_found' => __('No faculty members found', 'manifesta'),
            'all_items' => __('All Faculty', 'manifesta'),
            'menu_name' => __('Faculty', 'manifesta'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'faculty'],
        'menu_icon' => 'dashicons-id-alt',
        'menu_position' => 6,
        'supports' => ['title', 'thumbnail', 'page-attributes'],
        'show_in_rest' => true,
    ]);
});

// ─── TESTIMONIALS CPT ───────────────────────────────────────────────────────
add_action('init', function () {
    register_post_type('testimonial', [
        'labels' => [
            'name' => __('Testimonials', 'manifesta'),
            'singular_name' => __('Testimonial', 'manifesta'),
            'add_new_item' => __('Add New Testimonial', 'manifesta'),
            'edit_item' => __('Edit Testimonial', 'manifesta'),
            'not_found' => __('No testimonials found', 'manifesta'),
            'all_items' => __('All Testimonials', 'manifesta'),
            'menu_name' => __('Testimonials', 'manifesta'),
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-format-quote',
        'menu_position' => 7,
        'supports' => ['title', 'page-attributes'],
        'show_in_rest' => true,
    ]);
});

// ─── EVENTS CPT ─────────────────────────────────────────────────────────────
add_action('init', function () {
    register_post_type('event', [
        'labels' => [
            'name' => __('Events', 'manifesta'),
            'singular_name' => __('Event', 'manifesta'),
            'add_new_item' => __('Add New Event', 'manifesta'),
            'all_items' => __('All Events', 'manifesta'),
            'menu_name' => __('Events', 'manifesta'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'events'],
        'menu_icon' => 'dashicons-calendar-alt',
        'menu_position' => 8,
        'supports' => ['title', 'thumbnail', 'excerpt', 'editor'],
        'show_in_rest' => true,
    ]);
});

// ─── COURSE CATEGORY TAXONOMY ────────────────────────────────────────────────
add_action('init', function () {
    register_taxonomy('course_category', 'course', [
        'labels' => [
            'name' => __('Course Categories', 'manifesta'),
            'singular_name' => __('Course Category', 'manifesta'),
            'all_items' => __('All Categories', 'manifesta'),
            'edit_item' => __('Edit Category', 'manifesta'),
            'add_new_item' => __('Add New Category', 'manifesta'),
        ],
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'course-category'],
        'show_in_rest' => true,
    ]);
});

// Add blog post type support (WordPress already has 'post', so we just need to ensure it's supported)
function manifesta_add_post_support()
{
    // Add theme support for post thumbnails (if not already added)
    add_theme_support('post-thumbnails');

    // Add support for post formats (optional)
    add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

    // Register navigation menus for blog
    register_nav_menus(array(
        'blog-menu' => __('Blog Menu', 'manifesta'),
    ));
}
add_action('after_setup_theme', 'manifesta_add_post_support');