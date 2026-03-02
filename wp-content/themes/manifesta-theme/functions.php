<?php
/**
 * Manifesta Medical Academy — functions.php
 * Master loader: constants, includes, theme supports.
 *
 * @package Manifesta
 */

if (!defined('ABSPATH'))
    exit;

// ── Constants ──────────────────────────────────────────────────────────────
define('MANIFESTA_DIR', get_template_directory());
define('MANIFESTA_URI', get_template_directory_uri());
define('MANIFESTA_VERSION', '1.0.0');

// ── Load Includes ──────────────────────────────────────────────────────────
require_once MANIFESTA_DIR . '/inc/enqueue.php';
require_once MANIFESTA_DIR . '/inc/menus.php';
require_once MANIFESTA_DIR . '/inc/customizer.php';
require_once MANIFESTA_DIR . '/inc/acf-fields.php';
require_once MANIFESTA_DIR . '/inc/helpers.php';
require_once MANIFESTA_DIR . '/inc/widgets.php';
require_once MANIFESTA_DIR . '/inc/cpt.php'; // You have this but it's not loaded

// ── Theme Supports ─────────────────────────────────────────────────────────
add_action('after_setup_theme', function () {

    load_theme_textdomain('manifesta', MANIFESTA_DIR . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('custom-logo', [
        'height' => 60,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ]);
    add_theme_support('elementor');
    add_theme_support('woocommerce');

    // ADD THESE for blog support
    add_theme_support('post-formats', ['aside', 'gallery', 'quote', 'image', 'video']);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('customize-selective-refresh-widgets');

    // Image sizes
    add_image_size('course-card', 600, 380, true);
    add_image_size('faculty-card', 400, 450, true);
    add_image_size('hero-full', 1920, 900, true);
    add_image_size('blog-large', 1200, 600, true); // ADD THIS
    add_image_size('blog-medium', 800, 450, true); // ADD THIS
    add_image_size('blog-small', 400, 225, true);  // ADD THIS
});

// ── Content Width ──────────────────────────────────────────────────────────
if (!isset($content_width)) {
    $content_width = 1200;
}

// ── Remove WordPress emoji scripts (performance) ───────────────────────────
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// ── BLOG FUNCTIONS ────────────────────────────────────────────────────────

/**
 * Add blog menu item to primary menu
 */
function manifesta_add_blog_menu_item($items, $args)
{
    if ($args->theme_location == 'primary') {
        $blog_page_id = get_option('page_for_posts');
        if ($blog_page_id) {
            $blog_url = get_permalink($blog_page_id);
            $blog_title = get_the_title($blog_page_id);
            $items .= '<li class="menu-item"><a href="' . esc_url($blog_url) . '">' . esc_html($blog_title) . '</a></li>';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'manifesta_add_blog_menu_item', 10, 2);

/**
 * Calculate reading time for posts
 */
function manifesta_reading_time()
{
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);

    if ($reading_time < 1) {
        $reading_time = 1;
    }

    return $reading_time;
}

/**
 * Custom excerpt length for blog
 */
function manifesta_excerpt_length($length)
{
    if (is_search()) {
        return 20;
    }
    return 30;
}
add_filter('excerpt_length', 'manifesta_excerpt_length');

/**
 * Custom excerpt more
 */
function manifesta_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'manifesta_excerpt_more');

/**
 * Add author social media fields
 */
function manifesta_author_social_media($contactmethods)
{
    $contactmethods['twitter'] = 'Twitter URL';
    $contactmethods['linkedin'] = 'LinkedIn URL';
    $contactmethods['facebook'] = 'Facebook URL';
    $contactmethods['instagram'] = 'Instagram URL';
    return $contactmethods;
}
add_filter('user_contactmethods', 'manifesta_author_social_media', 10, 1);

// ── PAGINATION FOR BLOG ───────────────────────────────────────────────────

/**
 * Custom pagination for blog
 */
if (!function_exists('manifesta_pagination')) {
    function manifesta_pagination()
    {
        global $wp_query;
        $big = 999999999;

        $pages = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'type' => 'array',
            'prev_text' => '← Previous',
            'next_text' => 'Next →',
        ));

        if (is_array($pages)) {
            echo '<div class="blog-pagination"><div class="pagination-links">';
            foreach ($pages as $page) {
                echo $page;
            }
            echo '</div></div>';
        }
    }
}

// ── REGISTER BLOG SIDEBAR ─────────────────────────────────────────────────

/**
 * Register blog sidebar (if not already in widgets.php)
 * You can remove this if it's already in widgets.php
 */
function manifesta_register_blog_sidebar()
{
    register_sidebar(array(
        'name' => __('Blog Sidebar', 'manifesta'),
        'id' => 'blog-sidebar',
        'description' => __('Widgets for blog sidebar', 'manifesta'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'manifesta_register_blog_sidebar');

// ── BODY CLASS FOR BLOG PAGES ────────────────────────────────────────────

/**
 * Add blog body classes
 */
function manifesta_blog_body_class($classes)
{
    if (is_singular('post') || is_archive() || is_home() || is_category() || is_tag()) {
        $classes[] = 'blog-active';
    }
    if (is_singular('post')) {
        $classes[] = 'single-post-page';
    }
    return $classes;
}
add_filter('body_class', 'manifesta_blog_body_class');

// ── DEBUGGING (Remove in production) ─────────────────────────────────────
/*
add_action('wp_footer', function() {
    if (current_user_can('administrator')) {
        echo '<!-- Theme: Manifesta v' . MANIFESTA_VERSION . ' -->';
    }
});
*/