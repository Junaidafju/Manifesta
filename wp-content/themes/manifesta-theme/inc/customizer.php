<?php
/**
 * Customizer settings for Manifesta theme.
 * Replaces ACF Options functionality.
 *
 * @package Manifesta
 */

if (!defined('ABSPATH')) {
    exit;
}

function manifesta_customize_register($wp_customize)
{

    // ── CONTACT & SOCIAL PANEL ───────────────────────────────────────────────
    $wp_customize->add_panel('manifesta_contact_panel', [
        'title' => __('Contact & Social', 'manifesta'),
        'priority' => 30,
    ]);

    // Contact Details Section
    $wp_customize->add_section('manifesta_contact_details', [
        'title' => __('Contact Details', 'manifesta'),
        'panel' => 'manifesta_contact_panel',
    ]);

    $contact_fields = [
        'manifesta_phone' => ['label' => 'Phone Number', 'type' => 'text'],
        'manifesta_whatsapp' => ['label' => 'WhatsApp Number (with country code)', 'type' => 'text'],
        'manifesta_email' => ['label' => 'Email Address', 'type' => 'email'],
        'manifesta_address' => ['label' => 'Address', 'type' => 'textarea'],
    ];

    foreach ($contact_fields as $id => $field) {
        $wp_customize->add_setting($id, ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control($id, [
            'label' => $field['label'],
            'section' => 'manifesta_contact_details',
            'type' => $field['type'],
        ]);
    }

    // Social Links Section
    $wp_customize->add_section('manifesta_social_links', [
        'title' => __('Social Links', 'manifesta'),
        'panel' => 'manifesta_contact_panel',
    ]);

    $social_networks = ['facebook', 'instagram', 'youtube', 'linkedin', 'twitter'];
    foreach ($social_networks as $network) {
        $id = 'manifesta_' . $network;
        $wp_customize->add_setting($id, ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control($id, [
            'label' => ucfirst($network) . ' URL',
            'section' => 'manifesta_social_links',
            'type' => 'url',
        ]);
    }

    // ── HEADER SETTINGS ──────────────────────────────────────────────────
    $wp_customize->add_section('manifesta_header_settings', [
        'title' => __('Header Settings', 'manifesta'),
        'priority' => 31,
    ]);

    $wp_customize->add_setting('manifesta_header_announcement', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('manifesta_header_announcement', [
        'label' => __('Top Bar Announcement Text', 'manifesta'),
        'section' => 'manifesta_header_settings',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('manifesta_header_cta_text', ['default' => 'Enquire Now', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('manifesta_header_cta_text', [
        'label' => __('Header CTA Button Text', 'manifesta'),
        'section' => 'manifesta_header_settings',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('manifesta_header_cta_link', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control('manifesta_header_cta_link', [
        'label' => __('Header CTA Button Link', 'manifesta'),
        'section' => 'manifesta_header_settings',
        'type' => 'url',
    ]);

    // ── FOOTER SETTINGS ──────────────────────────────────────────────────
    $wp_customize->add_section('manifesta_footer_settings', [
        'title' => __('Footer Settings', 'manifesta'),
        'priority' => 32,
    ]);

    $wp_customize->add_setting('manifesta_footer_tagline', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('manifesta_footer_tagline', [
        'label' => __('Footer Tagline', 'manifesta'),
        'section' => 'manifesta_footer_settings',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('manifesta_footer_copyright', ['default' => '© 2025 Manifesta Medical Academy. All Rights Reserved.', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('manifesta_footer_copyright', [
        'label' => __('Copyright Text', 'manifesta'),
        'section' => 'manifesta_footer_settings',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('manifesta_footer_about', ['default' => '', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('manifesta_footer_about', [
        'label' => __('About Text', 'manifesta'),
        'section' => 'manifesta_footer_settings',
        'type' => 'textarea',
    ]);

}
add_action('customize_register', 'manifesta_customize_register');
