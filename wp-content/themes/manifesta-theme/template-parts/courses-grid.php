<?php
/**
 * Courses grid template part.
 *
 * @package Manifesta
 */

$courses = manifesta_get_courses( 6 );
if ( ! $courses->have_posts() ) return;
?>

<section class="courses-section section-padding" aria-labelledby="courses-section-title">
    <div class="container">

        <header class="section-header" data-aos="fade-up">
            <span class="section-eyebrow"><?php esc_html_e( 'Our Programmes', 'manifesta' ); ?></span>
            <h2 id="courses-section-title" class="section-title"><?php esc_html_e( 'Our Courses', 'manifesta' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Advance your medical career with industry-recognised training', 'manifesta' ); ?></p>
        </header>

        <!-- Category Filter Tabs -->
        <?php
        $categories = manifesta_get_course_categories();
        if ( count( $categories ) > 1 ) : ?>
            <nav class="course-filter" aria-label="Course categories" x-data="{ active: 'all' }">
                <button class="course-filter__btn" :class="{ 'is-active': active === 'all' }" @click="active = 'all'"><?php esc_html_e( 'All', 'manifesta' ); ?></button>
                <?php foreach ( $categories as $cat ) : ?>
                    <button class="course-filter__btn" 
                            :class="{ 'is-active': active === '<?php echo esc_attr( $cat->slug ); ?>' }"
                            @click="active = '<?php echo esc_attr( $cat->slug ); ?>'">
                        <?php echo esc_html( $cat->name ); ?>
                    </button>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>

        <div class="courses-grid">
            <?php $i = 0; while ( $courses->have_posts() ) : $courses->the_post(); $i++;
                $badge      = get_field( 'course_badge' );
                $duration   = get_field( 'course_duration' );
                $mode       = get_field( 'course_mode' );
                $price      = get_field( 'course_price' );
                $cta_text   = get_field( 'course_cta_text' ) ?: 'Enroll Now';
                $cta_link   = get_field( 'course_cta_link' ) ?: get_permalink();
                $start_date = get_field( 'course_start_date' );
                $terms      = get_the_terms( get_the_ID(), 'course_category' );
                $cat_slugs  = $terms ? implode( ' ', wp_list_pluck( $terms, 'slug' ) ) : 'all';
            ?>
                <article class="course-card" 
                         data-aos="fade-up" 
                         data-aos-delay="<?php echo esc_attr( ( $i % 3 ) * 100 ); ?>"
                         data-categories="all <?php echo esc_attr( $cat_slugs ); ?>">

                    <?php if ( $badge ) : ?>
                        <div class="course-card__badge"><?php echo esc_html( $badge ); ?></div>
                    <?php endif; ?>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="course-card__image">
                            <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                <?php the_post_thumbnail( 'course-card', [ 'loading' => 'lazy' ] ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="course-card__body">

                        <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
                            <span class="course-card__category"><?php echo esc_html( $terms[0]->name ); ?></span>
                        <?php endif; ?>

                        <h3 class="course-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>

                        <?php $excerpt = get_the_excerpt();
                        if ( $excerpt ) : ?>
                            <p class="course-card__excerpt"><?php echo esc_html( wp_trim_words( $excerpt, 20 ) ); ?></p>
                        <?php endif; ?>

                        <ul class="course-card__meta" aria-label="Course details">
                            <?php if ( $duration ) : ?>
                                <li><span aria-hidden="true">⏱</span> <?php echo esc_html( $duration ); ?></li>
                            <?php endif; ?>
                            <?php if ( $mode ) : ?>
                                <li><span aria-hidden="true">📍</span> <?php echo esc_html( $mode ); ?></li>
                            <?php endif; ?>
                            <?php if ( $start_date ) : ?>
                                <li><span aria-hidden="true">📅</span> <?php echo esc_html( $start_date ); ?></li>
                            <?php endif; ?>
                        </ul>

                        <div class="course-card__footer">
                            <?php if ( $price ) : ?>
                                <div class="course-card__price">
                                    <span class="price-label"><?php esc_html_e( 'Fee', 'manifesta' ); ?></span>
                                    <strong>₹<?php echo esc_html( $price ); ?></strong>
                                </div>
                            <?php endif; ?>
                            <a href="<?php echo esc_url( $cta_link ); ?>" class="btn btn--primary btn--sm">
                                <?php echo esc_html( $cta_text ); ?>
                            </a>
                        </div>

                    </div>
                </article>

            <?php endwhile; wp_reset_postdata(); ?>
        </div><!-- .courses-grid -->

        <div class="section-footer" data-aos="fade-up">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'course' ) ); ?>" class="btn btn--outline">
                <?php esc_html_e( 'View All Courses', 'manifesta' ); ?>
                <span aria-hidden="true">→</span>
            </a>
        </div>

    </div>
</section>
