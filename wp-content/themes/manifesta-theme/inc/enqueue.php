<?php
/**
 * Scripts & Styles enqueue.
 *
 * @package Manifesta
 */

// ── Front-end assets ───────────────────────────────────────────────────────
add_action('wp_enqueue_scripts', function () {

    // Main stylesheet
    wp_enqueue_style(
        'manifesta-main',
        MANIFESTA_URI . '/assets/css/main.css',
        [],
        MANIFESTA_VERSION
    );

    // Google Fonts — Inter
    wp_enqueue_style(
        'manifesta-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap',
        [],
        null
    );

    // Alpine.js (deferred)
    wp_enqueue_script(
        'alpine',
        MANIFESTA_URI . '/assets/js/alpine.min.js',
        [],
        '3.14.1',
        ['strategy' => 'defer', 'in_footer' => true]
    );

    // Main JS
    wp_enqueue_script(
        'manifesta-main',
        MANIFESTA_URI . '/assets/js/main.js',
        [],
        MANIFESTA_VERSION,
        true
    );

    // Pass data to JS
    wp_localize_script('manifesta-main', 'manifestaData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('manifesta_nonce'),
        'siteUrl' => get_site_url(),
    ]);
});

// ── Admin / Editor styles ──────────────────────────────────────────────────
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style(
        'manifesta-editor',
        MANIFESTA_URI . '/assets/css/editor.css',
        [],
        MANIFESTA_VERSION
    );
});

// ── Remove query strings from static assets (performance) ─────────────────
add_filter('script_loader_src', 'manifesta_remove_query_strings', 15);
add_filter('style_loader_src', 'manifesta_remove_query_strings', 15);

function manifesta_remove_query_strings(string $src): string
{
    if (strpos($src, '?ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
