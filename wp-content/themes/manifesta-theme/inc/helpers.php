<?php
/**
 * Reusable template helper functions + Schema.org output.
 *
 * @package Manifesta
 */

// ── Safe ACF wrapper — returns '' when ACF Pro is not active ───────────────
if (!function_exists('acf_field')) {
    function acf_field(string $name, $post_id = null, $format_value = true)
    {
        if (!function_exists('get_field')) {
            return '';
        }
        return get_field($name, $post_id, $format_value);
    }
}

// ── Render star rating ─────────────────────────────────────────────────────
function manifesta_render_stars(int $rating): void
{
    for ($i = 1; $i <= 5; $i++) {
        $class = $i <= $rating ? 'star filled' : 'star empty';
        echo '<span class="' . esc_attr($class) . '" aria-hidden="true">★</span>';
    }
}

// ── WhatsApp enquiry link ──────────────────────────────────────────────────
function manifesta_whatsapp_link(string $message = ''): string
{
    $number = get_theme_mod('manifesta_whatsapp');
    if (!$number) {
        return '#';
    }
    $number = preg_replace('/[^0-9]/', '', $number);
    $message = urlencode($message ?: 'Hello, I would like to enquire about your courses.');
    return 'https://wa.me/' . $number . '?text=' . $message;
}

// ── Get courses WP_Query ───────────────────────────────────────────────────
function manifesta_get_courses(int $limit = -1, string $category = ''): WP_Query
{
    $args = [
        'post_type' => 'course',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ];
    if ($category) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'course_category',
                'field' => 'slug',
                'terms' => $category,
            ]
        ];
    }
    return new WP_Query($args);
}

// ── Get faculty WP_Query ───────────────────────────────────────────────────
function manifesta_get_faculty(int $limit = -1): WP_Query
{
    return new WP_Query([
        'post_type' => 'faculty',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ]);
}

// ── Get testimonials WP_Query ──────────────────────────────────────────────
function manifesta_get_testimonials(int $limit = -1, bool $featured_only = false): WP_Query
{
    $args = [
        'post_type' => 'testimonial',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'menu_order date',
        'order' => 'ASC',
    ];
    if ($featured_only) {
        $args['meta_query'] = [
            [
                'key' => 'testi_featured',
                'value' => '1',
            ]
        ];
    }
    return new WP_Query($args);
}

// ── Breadcrumb ────────────────────────────────────────────────────────────
function manifesta_breadcrumb(): void
{
    if (is_front_page())
        return;

    echo '<nav class="breadcrumb" aria-label="' . esc_attr__('Breadcrumb', 'manifesta') . '"><ol class="breadcrumb__list">';
    echo '<li class="breadcrumb__item"><a href="' . esc_url(home_url()) . '">' . esc_html__('Home', 'manifesta') . '</a></li>';

    if (is_singular('course')) {
        echo '<li class="breadcrumb__item"><a href="' . esc_url(get_post_type_archive_link('course')) . '">' . esc_html__('Courses', 'manifesta') . '</a></li>';
        echo '<li class="breadcrumb__item breadcrumb__item--current" aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_singular('faculty')) {
        echo '<li class="breadcrumb__item"><span>' . esc_html__('Faculty', 'manifesta') . '</span></li>';
        echo '<li class="breadcrumb__item breadcrumb__item--current" aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_singular('event')) {
        echo '<li class="breadcrumb__item"><span>' . esc_html__('Events', 'manifesta') . '</span></li>';
        echo '<li class="breadcrumb__item breadcrumb__item--current" aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_post_type_archive('course')) {
        echo '<li class="breadcrumb__item breadcrumb__item--current" aria-current="page">' . esc_html__('Courses', 'manifesta') . '</li>';
    } elseif (is_tax('course_category')) {
        echo '<li class="breadcrumb__item"><a href="' . esc_url(get_post_type_archive_link('course')) . '">' . esc_html__('Courses', 'manifesta') . '</a></li>';
        echo '<li class="breadcrumb__item breadcrumb__item--current" aria-current="page">' . esc_html(single_term_title('', false)) . '</li>';
    } elseif (is_page()) {
        echo '<li class="breadcrumb__item breadcrumb__item--current" aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_search()) {
        echo '<li class="breadcrumb__item breadcrumb__item--current" aria-current="page">' . sprintf(esc_html__('Search: %s', 'manifesta'), esc_html(get_search_query())) . '</li>';
    }

    echo '</ol></nav>';
}

// ── Get course category terms ──────────────────────────────────────────────
function manifesta_get_course_categories(): array
{
    return get_terms([
        'taxonomy' => 'course_category',
        'hide_empty' => true,
    ]) ?: [];
}

// ── Social icons helper ────────────────────────────────────────────────────
function manifesta_social_links(): void
{
    $socials = [
        'facebook' => ['label' => 'Facebook', 'icon' => '𝗳'],
        'instagram' => ['label' => 'Instagram', 'icon' => '📸'],
        'youtube' => ['label' => 'YouTube', 'icon' => '▶'],
        'linkedin' => ['label' => 'LinkedIn', 'icon' => 'in'],
        'twitter' => ['label' => 'X/Twitter', 'icon' => '𝕏'],
    ];
    foreach ($socials as $key => $data) {
        $url = get_theme_mod('manifesta_' . $key);
        if ($url) {
            printf(
                '<a href="%s" target="_blank" rel="noopener noreferrer" aria-label="%s" class="social-link social-link--%s">%s</a>',
                esc_url($url),
                esc_attr($data['label']),
                esc_attr($key),
                esc_html($data['label'])
            );
        }
    }
}

// ── Schema.org: EducationalOrganization ────────────────────────────────────
function manifesta_schema_org(): void
{
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'EducationalOrganization',
        'name' => get_bloginfo('name'),
        'url' => home_url(),
        'logo' => get_site_icon_url(),
        'telephone' => get_theme_mod('manifesta_phone'),
        'email' => get_theme_mod('manifesta_email'),
        'sameAs' => array_values(array_filter([
            get_theme_mod('manifesta_facebook'),
            get_theme_mod('manifesta_instagram'),
            get_theme_mod('manifesta_youtube'),
            get_theme_mod('manifesta_linkedin'),
        ])),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => get_theme_mod('manifesta_address'),
        ],
    ];
    echo '<script type="application/ld+json">'
        . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        . '</script>' . "\n";
}
add_action('wp_head', 'manifesta_schema_org');

// ── Course schema output ───────────────────────────────────────────────────
function manifesta_course_schema(): void
{
    if (!is_singular('course'))
        return;
    if (!function_exists('get_field'))
        return;

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Course',
        'name' => get_the_title(),
        'description' => get_the_excerpt(),
        'url' => get_permalink(),
        'provider' => [
            '@type' => 'EducationalOrganization',
            'name' => get_bloginfo('name'),
            'url' => home_url(),
        ],
    ];
    echo '<script type="application/ld+json">'
        . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        . '</script>' . "\n";
}
add_action('wp_head', 'manifesta_course_schema');

// ── Pagination helper ──────────────────────────────────────────────────────
function manifesta_pagination(WP_Query $query): void
{
    $total = $query->max_num_pages;
    $current = max(1, get_query_var('paged'));
    if ($total <= 1)
        return;

    $links = paginate_links([
        'base' => str_replace(PHP_INT_MAX, '%#%', esc_url(get_pagenum_link(PHP_INT_MAX))),
        'format' => '?paged=%#%',
        'current' => $current,
        'total' => $total,
        'prev_text' => '← Prev',
        'next_text' => 'Next →',
        'type' => 'array',
    ]);

    if ($links) {
        echo '<nav class="pagination" aria-label="Pagination"><ul class="pagination__list">';
        foreach ($links as $link) {
            echo '<li class="pagination__item">' . $link . '</li>';
        }
        echo '</ul></nav>';
    }
}

// ── Get estimated reading time ─────────────────────────────────────────────
function manifesta_get_reading_time($post_id = null)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $minutes = floor($word_count / 200);

    if ($minutes < 1) {
        return '1 min read';
    }

    return $minutes . ' min read';
}
