<?php get_header(); ?>

<?php while (have_posts()):
    the_post(); ?>

    <main id="main-content" class="site-main single-course">

        <!-- Breadcrumb -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <?php get_template_part('template-parts/breadcrumb'); ?>
            </div>
        </div>

        <!-- Course Hero -->
        <div class="course-hero">
            <div class="container">
                <div class="course-hero__inner">

                    <!-- Content Side -->
                    <div class="course-hero__content">

                        <?php
                        $terms = get_the_terms(get_the_ID(), 'course_category');
                        if ($terms && !is_wp_error($terms)): ?>
                            <span class="course-hero__category"><?php echo esc_html($terms[0]->name); ?></span>
                        <?php endif; ?>

                        <h1 class="course-hero__title"><?php the_title(); ?></h1>

                        <p class="course-hero__excerpt"><?php the_excerpt(); ?></p>

                        <ul class="course-hero__meta" aria-label="Course overview">
                            <?php $duration = get_field('course_duration'); ?>
                            <?php if ($duration): ?>
                                <li><span aria-hidden="true">⏱</span>
                                    <strong><?php esc_html_e('Duration:', 'manifesta'); ?></strong>
                                    <?php echo esc_html($duration); ?>
                                </li>
                            <?php endif; ?>

                            <?php $mode = get_field('course_mode'); ?>
                            <?php if ($mode): ?>
                                <li><span aria-hidden="true">📍</span>
                                    <strong><?php esc_html_e('Mode:', 'manifesta'); ?></strong>
                                    <?php echo esc_html($mode); ?>
                                </li>
                            <?php endif; ?>

                            <?php $start_date = get_field('course_start_date'); ?>
                            <?php if ($start_date): ?>
                                <li><span aria-hidden="true">📅</span>
                                    <strong><?php esc_html_e('Next Batch:', 'manifesta'); ?></strong>
                                    <?php echo esc_html($start_date); ?>
                                </li>
                            <?php endif; ?>

                            <?php $level = get_field('course_level'); ?>
                            <?php if ($level): ?>
                                <li><span aria-hidden="true">📊</span>
                                    <strong><?php esc_html_e('Level:', 'manifesta'); ?></strong>
                                    <?php echo esc_html($level); ?>
                                </li>
                            <?php endif; ?>

                            <?php $seats = get_field('course_seats'); ?>
                            <?php if ($seats): ?>
                                <li><span aria-hidden="true">👥</span>
                                    <strong><?php esc_html_e('Seats:', 'manifesta'); ?></strong>
                                    <?php echo esc_html($seats); ?>
                                </li>
                            <?php endif; ?>
                        </ul>

                    </div>

                    <!-- Enroll Card (sticky) -->
                    <aside class="course-enroll-card" aria-label="Enroll in this course">

                        <?php if (has_post_thumbnail()): ?>
                            <div class="course-enroll-card__image">
                                <?php the_post_thumbnail('medium', ['loading' => 'lazy']); ?>
                            </div>
                        <?php endif; ?>

                        <?php $price = get_field('course_price'); ?>
                        <?php if ($price): ?>
                            <div class="course-enroll-card__price">
                                <span class="price-label"><?php esc_html_e('Course Fee', 'manifesta'); ?></span>
                                <strong class="price-value">₹<?php echo esc_html($price); ?></strong>
                            </div>
                        <?php endif; ?>

                        <div class="course-enroll-card__actions">
                            <a href="<?php echo esc_url(get_field('course_cta_link') ?: '#contact'); ?>"
                                class="btn btn--primary btn--block">
                                <?php echo esc_html(get_field('course_cta_text') ?: 'Enroll Now'); ?>
                            </a>

                            <a href="<?php echo esc_url(manifesta_whatsapp_link('I am interested in the course: ' . get_the_title())); ?>"
                                target="_blank" rel="noopener noreferrer" class="btn btn--whatsapp btn--block">
                                💬 <?php esc_html_e('Ask on WhatsApp', 'manifesta'); ?>
                            </a>

                            <?php $syllabus = get_field('course_syllabus'); ?>
                            <?php if ($syllabus): ?>
                                <a href="<?php echo esc_url($syllabus); ?>" class="btn btn--outline btn--block" target="_blank"
                                    rel="noopener noreferrer">
                                    📄 <?php esc_html_e('Download Syllabus', 'manifesta'); ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <ul class="course-enroll-card__trust" aria-label="Guarantees">
                            <li>✅ <?php esc_html_e('Certificate on Completion', 'manifesta'); ?></li>
                            <li>✅ <?php esc_html_e('Expert Faculty', 'manifesta'); ?></li>
                            <li>✅ <?php esc_html_e('Lifetime Access to Material', 'manifesta'); ?></li>
                        </ul>

                    </aside>

                </div>
            </div>
        </div><!-- .course-hero -->

        <!-- Course Body -->
        <div class="container course-body">
            <div class="course-content-area">

                <!-- Main Content -->
                <div class="course-content">

                    <?php if (get_the_content()): ?>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Course Highlights -->
                    <?php
                    $has_highlights = false;
                    for ($i = 1; $i <= 6; $i++) {
                        if (function_exists('get_field') && get_field("highlight_{$i}_text")) {
                            $has_highlights = true;
                            break;
                        }
                    }
                    if ($has_highlights):
                        ?>
                        <div class="course-highlights">
                            <h2><?php esc_html_e('Course Highlights', 'manifesta'); ?></h2>
                            <ul class="highlights-list">
                                <?php
                                for ($i = 1; $i <= 6; $i++):
                                    if (!function_exists('get_field'))
                                        continue;
                                    $text = get_field("highlight_{$i}_text");
                                    if (!$text)
                                        continue;
                                    ?>
                                    <li>
                                        <span class="highlight-check" aria-hidden="true">✅</span>
                                        <?php echo esc_html($text); ?>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- FAQ -->
                    <?php
                    $has_faqs = false;
                    for ($i = 1; $i <= 5; $i++) {
                        if (function_exists('get_field') && get_field("faq_{$i}_question")) {
                            $has_faqs = true;
                            break;
                        }
                    }
                    if ($has_faqs):
                        ?>
                        <div class="course-faq" x-data="{ open: null }">
                            <h2><?php esc_html_e('Frequently Asked Questions', 'manifesta'); ?></h2>
                            <div class="faq-list">
                                <?php
                                $faq_i = 0;
                                for ($i = 1; $i <= 5; $i++):
                                    if (!function_exists('get_field'))
                                        continue;
                                    $q = get_field("faq_{$i}_question");
                                    $a = get_field("faq_{$i}_answer");
                                    if (!$q)
                                        continue;
                                    $faq_i++;
                                    ?>
                                    <div class="faq-item" x-data="{ id: <?php echo $faq_i; ?> }">
                                        <button class="faq-item__question" @click="open = open === id ? null : id"
                                            :aria-expanded="open === id">
                                            <?php echo esc_html($q); ?>
                                            <span class="faq-item__icon" aria-hidden="true"
                                                x-text="open === id ? '−' : '+'">+</span>
                                        </button>
                                        <div class="faq-item__answer" x-show="open === id" x-transition>
                                            <p><?php echo esc_html($a); ?></p>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Assigned Faculty -->
                    <?php $course_faculty = get_field('course_faculty'); ?>
                    <?php if ($course_faculty): ?>
                        <div class="course-faculty">
                            <h2><?php esc_html_e('Your Instructors', 'manifesta'); ?></h2>
                            <div class="faculty-grid faculty-grid--mini">
                                <?php foreach ($course_faculty as $member): ?>
                                    <div class="faculty-card-mini">
                                        <?php echo get_the_post_thumbnail($member->ID, 'thumbnail', ['loading' => 'lazy', 'alt' => esc_attr($member->post_title)]); ?>
                                        <div class="faculty-card-mini__info">
                                            <h4><?php echo esc_html($member->post_title); ?></h4>
                                            <p><?php echo esc_html(get_field('faculty_designation', $member->ID)); ?></p>
                                            <p class="faculty-card-mini__hospital">
                                                <?php echo esc_html(get_field('faculty_hospital', $member->ID)); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div><!-- .course-content -->

            </div>
        </div><!-- .course-body -->

        <!-- Related Courses -->
        <div class="related-courses section-padding bg-light">
            <div class="container">
                <h2><?php esc_html_e('You May Also Like', 'manifesta'); ?></h2>
                <?php
                $related = manifesta_get_courses(3);
                if ($related->have_posts()):
                    echo '<div class="courses-grid">';
                    while ($related->have_posts()):
                        $related->the_post();
                        if (get_the_ID() === get_queried_object_id())
                            continue;
                        include get_template_directory() . '/template-parts/courses-grid.php';
                    endwhile;
                    wp_reset_postdata();
                    echo '</div>';
                endif;
                ?>
            </div>
        </div>

    </main>

<?php endwhile; ?>

<?php get_footer(); ?>