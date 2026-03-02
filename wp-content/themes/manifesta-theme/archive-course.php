<?php
/**
 * Archive template for Course CPT.
 *
 * @package Manifesta
 */

get_header();

$paged = max(1, get_query_var('paged'));
$category = get_query_var('course_category');
$args = [
    'post_type' => 'course',
    'posts_per_page' => 9,
    'paged' => $paged,
    'orderby' => 'menu_order',
    'order' => 'ASC',
];

if (is_tax('course_category')) {
    $args['course_category'] = get_queried_object()->slug;
}

$courses_query = new WP_Query($args);
$categories = manifesta_get_course_categories();
?>

<main id="main-content" class="site-main archive-courses">

    <!-- Breadcrumb -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <?php get_template_part('template-parts/breadcrumb'); ?>
        </div>
    </div>

    <!-- Archive Header -->
    <header class="archive-header">
        <div class="container">
            <h1 class="archive-header__title">
                <?php
                if (is_tax('course_category')) {
                    single_term_title();
                } else {
                    esc_html_e('All Courses', 'manifesta');
                }
                ?>
            </h1>
            <p class="archive-header__subtitle">
                <?php esc_html_e('Advance your medical career with industry-recognised training', 'manifesta'); ?>
            </p>
        </div>
        </archive-header>

        <div class="container section-padding">

            <!-- Category Filter -->
            <?php if ($categories): ?>
                <nav class="course-filter" aria-label="Filter courses by category">
                    <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>"
                        class="course-filter__btn <?php echo (!is_tax('course_category')) ? 'is-active' : ''; ?>">
                        <?php esc_html_e('All', 'manifesta'); ?>
                    </a>
                    <?php foreach ($categories as $cat): ?>
                        <a href="<?php echo esc_url(get_term_link($cat)); ?>"
                            class="course-filter__btn <?php echo (is_tax('course_category') && get_queried_object()->slug === $cat->slug) ? 'is-active' : ''; ?>">
                            <?php echo esc_html($cat->name); ?>
                            <span class="course-filter__count">(
                                <?php echo esc_html($cat->count); ?>)
                            </span>
                        </a>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>

            <!-- Courses Grid -->
            <?php if ($courses_query->have_posts()): ?>

                <div class="courses-grid">
                    <?php $i = 0;
                    while ($courses_query->have_posts()):
                        $courses_query->the_post();
                        $i++;
                        $badge = mf_field('course_badge');
                        $duration = mf_field('course_duration');
                        $mode = mf_field('course_mode');
                        $price = mf_field('course_price');
                        $cta_text = mf_field('course_cta_text') ?: 'Enroll Now';
                        $cta_link = mf_field('course_cta_link') ?: get_permalink();
                        $start_date = mf_field('course_start_date');
                        $terms = get_the_terms(get_the_ID(), 'course_category');
                        ?>
                        <article class="course-card" data-aos="fade-up"
                            data-aos-delay="<?php echo esc_attr(($i % 3) * 100); ?>">

                            <?php if ($badge): ?>
                                <div class="course-card__badge">
                                    <?php echo esc_html($badge); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (has_post_thumbnail()): ?>
                                <div class="course-card__image">
                                    <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                        <?php the_post_thumbnail('course-card', ['loading' => 'lazy']); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="course-card__body">
                                <?php if ($terms && !is_wp_error($terms)): ?>
                                    <span class="course-card__category">
                                        <?php echo esc_html($terms[0]->name); ?>
                                    </span>
                                <?php endif; ?>

                                <h2 class="course-card__title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <p class="course-card__excerpt">
                                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?>
                                </p>

                                <ul class="course-card__meta">
                                    <?php if ($duration): ?>
                                        <li><span aria-hidden="true">⏱</span>
                                            <?php echo esc_html($duration); ?>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($mode): ?>
                                        <li><span aria-hidden="true">📍</span>
                                            <?php echo esc_html($mode); ?>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($start_date): ?>
                                        <li><span aria-hidden="true">📅</span>
                                            <?php echo esc_html($start_date); ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>

                                <div class="course-card__footer">
                                    <?php if ($price): ?>
                                        <strong class="course-card__price">₹
                                            <?php echo esc_html($price); ?>
                                        </strong>
                                    <?php endif; ?>
                                    <a href="<?php echo esc_url($cta_link); ?>" class="btn btn--primary btn--sm">
                                        <?php echo esc_html($cta_text); ?>
                                    </a>
                                </div>
                            </div>
                        </article>

                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>

                <?php manifesta_pagination($courses_query); ?>

            <?php else: ?>

                <div class="no-results">
                    <p>
                        <?php esc_html_e('No courses found. Please check back soon.', 'manifesta'); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary">
                        <?php esc_html_e('Back to Home', 'manifesta'); ?>
                    </a>
                </div>

            <?php endif; ?>

        </div>

</main>

<?php get_footer(); ?>