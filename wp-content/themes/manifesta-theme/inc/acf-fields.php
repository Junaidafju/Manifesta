<?php
/**
 * All ACF field groups registered via PHP.
 * Supports ACF Free (no repeaters, no options pages).
 *
 * @package Manifesta
 */

if (!function_exists('acf_add_local_field_group'))
    return;

// ═══════════════════════════════════════════════════════════════════════════
// HOME PAGE FIELDS
// ═══════════════════════════════════════════════════════════════════════════
$home_fields = [
    // ── HERO ─────────────────────────────────────────────────────────
    ['key' => 'field_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text'],
    ['key' => 'field_hero_subtitle', 'label' => 'Hero Subtitle', 'name' => 'hero_subtitle', 'type' => 'textarea', 'rows' => 3],
    ['key' => 'field_hero_badge', 'label' => 'Hero Badge Text (above title)', 'name' => 'hero_badge', 'type' => 'text', 'placeholder' => 'e.g. #1 Medical Academy in India'],
    ['key' => 'field_hero_cta_text', 'label' => 'CTA Button Text', 'name' => 'hero_cta_text', 'type' => 'text'],
    ['key' => 'field_hero_cta_link', 'label' => 'CTA Button Link', 'name' => 'hero_cta_link', 'type' => 'url'],
    ['key' => 'field_hero_image', 'label' => 'Hero Background Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'array'],
];

// Stats Bar (Fixed 4)
for ($i = 1; $i <= 4; $i++) {
    $home_fields[] = ['key' => 'field_stat_' . $i . '_number', 'label' => "Stat $i Number", 'name' => "stat_{$i}_number", 'type' => 'text', 'placeholder' => '500+'];
    $home_fields[] = ['key' => 'field_stat_' . $i . '_label', 'label' => "Stat $i Label", 'name' => "stat_{$i}_label", 'type' => 'text', 'placeholder' => 'Students Trained'];
}

// About Section
$home_fields[] = ['key' => 'field_about_heading', 'label' => 'About Heading', 'name' => 'about_heading', 'type' => 'text'];
$home_fields[] = ['key' => 'field_about_text', 'label' => 'About Text', 'name' => 'about_text', 'type' => 'textarea', 'rows' => 4];
$home_fields[] = ['key' => 'field_about_image', 'label' => 'About Image', 'name' => 'about_image', 'type' => 'image', 'return_format' => 'array'];
for ($i = 1; $i <= 4; $i++) {
    $home_fields[] = ['key' => 'field_about_bullet_' . $i, 'label' => "About Bullet $i", 'name' => "about_bullet_{$i}", 'type' => 'text'];
}

// Courses Section
$home_fields[] = ['key' => 'field_courses_heading', 'label' => 'Courses Heading', 'name' => 'courses_heading', 'type' => 'text'];
for ($i = 1; $i <= 4; $i++) {
    $home_fields[] = ['key' => 'field_course_' . $i . '_icon', 'label' => "Course $i Icon (Emoji)", 'name' => "course_{$i}_icon", 'type' => 'text'];
    $home_fields[] = ['key' => 'field_course_' . $i . '_title', 'label' => "Course $i Title", 'name' => "course_{$i}_title", 'type' => 'text'];
    $home_fields[] = ['key' => 'field_course_' . $i . '_desc', 'label' => "Course $i Description", 'name' => "course_{$i}_desc", 'type' => 'textarea', 'rows' => 3];
    $home_fields[] = ['key' => 'field_course_' . $i . '_link', 'label' => "Course $i Link", 'name' => "course_{$i}_link", 'type' => 'url'];
}

// Faculty Section
for ($i = 1; $i <= 3; $i++) {
    $home_fields[] = ['key' => 'field_fac_' . $i . '_name', 'label' => "Faculty $i Name", 'name' => "faculty_{$i}_name", 'type' => 'text'];
    $home_fields[] = ['key' => 'field_fac_' . $i . '_exp', 'label' => "Faculty $i Exp", 'name' => "faculty_{$i}_exp", 'type' => 'text'];
    $home_fields[] = ['key' => 'field_fac_' . $i . '_spec', 'label' => "Faculty $i Specialization", 'name' => "faculty_{$i}_spec", 'type' => 'text'];
    $home_fields[] = ['key' => 'field_fac_' . $i . '_hosp', 'label' => "Faculty $i Hospital", 'name' => "faculty_{$i}_hosp", 'type' => 'text'];
    $home_fields[] = ['key' => 'field_fac_' . $i . '_image', 'label' => "Faculty $i Photo", 'name' => "faculty_{$i}_image", 'type' => 'image', 'return_format' => 'array'];
}

// Clinical Partners
for ($i = 1; $i <= 6; $i++) {
    $home_fields[] = ['key' => 'field_partner_' . $i . '_name', 'label' => "Partner $i Name", 'name' => "partner_{$i}_name", 'type' => 'text'];
    $home_fields[] = ['key' => 'field_partner_' . $i . '_logo', 'label' => "Partner $i Logo", 'name' => "partner_{$i}_logo", 'type' => 'image', 'return_format' => 'array'];
}

// Final CTA
$home_fields[] = ['key' => 'field_final_cta_heading', 'label' => 'Final CTA Heading', 'name' => 'final_cta_heading', 'type' => 'text'];
$home_fields[] = ['key' => 'field_final_cta_text', 'label' => 'Final CTA Text', 'name' => 'final_cta_text', 'type' => 'textarea', 'rows' => 3];

acf_add_local_field_group([
    'key' => 'group_home_page',
    'title' => 'Home Page Fields',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/page-home.php']]],
    'fields' => $home_fields,
]);


// ═══════════════════════════════════════════════════════════════════════════
// COURSE FIELDS
// ═══════════════════════════════════════════════════════════════════════════
$course_fields = [
    ['key' => 'field_course_duration', 'label' => 'Duration', 'name' => 'course_duration', 'type' => 'text', 'placeholder' => 'e.g. 6 Months'],
    ['key' => 'field_course_mode', 'label' => 'Mode', 'name' => 'course_mode', 'type' => 'select', 'choices' => ['Online' => 'Online', 'Offline' => 'Offline', 'Hybrid' => 'Hybrid'], 'allow_null' => 0],
    ['key' => 'field_course_price', 'label' => 'Price', 'name' => 'course_price', 'type' => 'text', 'placeholder' => 'e.g. 25,000'],
    ['key' => 'field_course_badge', 'label' => 'Badge (e.g. Popular)', 'name' => 'course_badge', 'type' => 'text'],
    ['key' => 'field_course_start_date', 'label' => 'Next Start Date', 'name' => 'course_start_date', 'type' => 'date_picker', 'display_format' => 'd M Y', 'return_format' => 'd M Y'],
    ['key' => 'field_course_seats', 'label' => 'Seats Available', 'name' => 'course_seats', 'type' => 'number', 'placeholder' => '30'],
    ['key' => 'field_course_level', 'label' => 'Level', 'name' => 'course_level', 'type' => 'select', 'choices' => ['Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Advanced' => 'Advanced'], 'allow_null' => 1],
    ['key' => 'field_course_cta_text', 'label' => 'CTA Button Text', 'name' => 'course_cta_text', 'type' => 'text', 'default_value' => 'Enroll Now'],
    ['key' => 'field_course_cta_link', 'label' => 'CTA Button Link', 'name' => 'course_cta_link', 'type' => 'url'],
    ['key' => 'field_course_syllabus', 'label' => 'Syllabus PDF', 'name' => 'course_syllabus', 'type' => 'file', 'return_format' => 'url', 'mime_types' => 'pdf'],
];

for ($i = 1; $i <= 6; $i++) {
    $course_fields[] = ['key' => 'field_highlight_' . $i . '_text', 'label' => "Highlight $i", 'name' => "highlight_{$i}_text", 'type' => 'text'];
}

$course_fields[] = [
    'key' => 'field_course_faculty',
    'label' => 'Assigned Faculty',
    'name' => 'course_faculty',
    'type' => 'relationship',
    'post_type' => ['faculty'],
    'filters' => ['search'],
    'return_format' => 'object',
    'max' => 6,
];

for ($i = 1; $i <= 5; $i++) {
    $course_fields[] = ['key' => 'field_faq_' . $i . '_question', 'label' => "FAQ $i Question", 'name' => "faq_{$i}_question", 'type' => 'text'];
    $course_fields[] = ['key' => 'field_faq_' . $i . '_answer', 'label' => "FAQ $i Answer", 'name' => "faq_{$i}_answer", 'type' => 'textarea', 'rows' => 4];
}

acf_add_local_field_group([
    'key' => 'group_course',
    'title' => 'Course Details',
    'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'course']]],
    'fields' => $course_fields,
]);

// ═══════════════════════════════════════════════════════════════════════════
// FACULTY FIELDS
// ═══════════════════════════════════════════════════════════════════════════
acf_add_local_field_group([
    'key' => 'group_faculty',
    'title' => 'Faculty Details',
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'faculty',
            ]
        ]
    ],
    'fields' => [
        ['key' => 'field_faculty_designation', 'label' => 'Designation', 'name' => 'faculty_designation', 'type' => 'text'],
        ['key' => 'field_faculty_experience', 'label' => 'Experience', 'name' => 'faculty_experience', 'type' => 'text', 'placeholder' => 'e.g. 15+ years'],
        ['key' => 'field_faculty_specialization', 'label' => 'Specialization', 'name' => 'faculty_specialization', 'type' => 'text'],
        ['key' => 'field_faculty_hospital', 'label' => 'Hospital/Institution', 'name' => 'faculty_hospital', 'type' => 'text'],
        ['key' => 'field_faculty_qualifications', 'label' => 'Qualifications', 'name' => 'faculty_qualifications', 'type' => 'text', 'placeholder' => 'e.g. MBBS, MD, FRCS'],
        ['key' => 'field_faculty_bio', 'label' => 'Short Bio', 'name' => 'faculty_bio', 'type' => 'textarea', 'rows' => 4],
        ['key' => 'field_faculty_linkedin', 'label' => 'LinkedIn URL', 'name' => 'faculty_linkedin', 'type' => 'url'],
    ],
]);

// ═══════════════════════════════════════════════════════════════════════════
// TESTIMONIAL FIELDS
// ═══════════════════════════════════════════════════════════════════════════
acf_add_local_field_group([
    'key' => 'group_testimonial',
    'title' => 'Testimonial Details',
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'testimonial',
            ]
        ]
    ],
    'fields' => [
        ['key' => 'field_testi_name', 'label' => 'Student Name', 'name' => 'testi_name', 'type' => 'text'],
        ['key' => 'field_testi_course', 'label' => 'Course Enrolled', 'name' => 'testi_course', 'type' => 'text'],
        ['key' => 'field_testi_image', 'label' => 'Photo', 'name' => 'testi_image', 'type' => 'image', 'return_format' => 'array'],
        ['key' => 'field_testi_rating', 'label' => 'Rating (1–5)', 'name' => 'testi_rating', 'type' => 'number', 'min' => 1, 'max' => 5],
        ['key' => 'field_testi_text', 'label' => 'Testimonial Text', 'name' => 'testi_text', 'type' => 'textarea', 'rows' => 5],
        ['key' => 'field_testi_video_url', 'label' => 'Video URL (opt)', 'name' => 'testi_video', 'type' => 'url'],
        ['key' => 'field_testi_featured', 'label' => 'Featured?', 'name' => 'testi_featured', 'type' => 'true_false', 'ui' => 1],
    ],
]);

// ═══════════════════════════════════════════════════════════════════════════
// ABOUT PAGE FIELDS
// ═══════════════════════════════════════════════════════════════════════════
$about_fields = [
    // ── HERO ─────────────────────────────────────────────────────────
    ['key' => 'field_about_hero_title', 'label' => 'Hero Title', 'name' => 'about_hero_title', 'type' => 'text', 'default_value' => 'Where Passion Meets Profession'],
];

acf_add_local_field_group([
    'key' => 'group_about_page',
    'title' => 'About Page Fields',
    'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/page-about.php']]],
    'fields' => $about_fields,
]);

// ═══════════════════════════════════════════════════════════════════════════
// THEME OPTIONS (Requires ACF Pro or Options Plugin)
// ═══════════════════════════════════════════════════════════════════════════
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'manifesta-theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ]);

    acf_add_local_field_group([
        'key' => 'group_theme_settings',
        'title' => 'Global Theme Settings',
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'manifesta-theme-settings',
                ]
            ]
        ],
        'fields' => [
            [
                'key' => 'field_footer_logo',
                'label' => 'Footer Logo',
                'name' => 'footer_logo',
                'type' => 'image',
                'return_format' => 'array',
                'instructions' => 'Upload a custom logo for the footer area.'
            ],
        ],
    ]);
}
