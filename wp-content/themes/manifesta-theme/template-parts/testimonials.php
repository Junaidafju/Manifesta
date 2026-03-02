<?php
/**
 * Testimonials section template part.
 *
 * @package Manifesta
 */

$testimonials = manifesta_get_testimonials( 6 );
if ( ! $testimonials->have_posts() ) return;
?>

<section class="testimonials-section section-padding" aria-labelledby="testimonials-section-title">
    <div class="container">

        <header class="section-header" data-aos="fade-up">
            <span class="section-eyebrow"><?php esc_html_e( 'Student Stories', 'manifesta' ); ?></span>
            <h2 id="testimonials-section-title" class="section-title"><?php esc_html_e( 'What Our Students Say', 'manifesta' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Real outcomes from real medical professionals', 'manifesta' ); ?></p>
        </header>

        <div class="testimonials-grid" 
             x-data="{ current: 0, total: <?php echo esc_attr( $testimonials->post_count ); ?> }"
             role="region" aria-label="Testimonials">

            <div class="testimonials-track">
                <?php $i = 0; while ( $testimonials->have_posts() ) : $testimonials->the_post(); $i++;
                    $name    = get_field( 'testi_name' ) ?: get_the_title();
                    $course  = get_field( 'testi_course' );
                    $image   = get_field( 'testi_image' );
                    $rating  = (int) get_field( 'testi_rating' );
                    $text    = get_field( 'testi_text' );
                ?>
                    <div class="testimonial-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( ( $i % 3 ) * 100 ); ?>">

                        <!-- Quote mark -->
                        <div class="testimonial-card__quote" aria-hidden="true">"</div>

                        <!-- Stars -->
                        <?php if ( $rating ) : ?>
                            <div class="testimonial-card__stars" aria-label="<?php printf( esc_attr__( 'Rating: %d out of 5 stars', 'manifesta' ), $rating ); ?>">
                                <?php manifesta_render_stars( $rating ); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Text -->
                        <?php if ( $text ) : ?>
                            <blockquote class="testimonial-card__text">
                                <p><?php echo esc_html( $text ); ?></p>
                            </blockquote>
                        <?php endif; ?>

                        <!-- Author -->
                        <div class="testimonial-card__author">
                            <?php if ( $image ) : ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>"
                                     alt="<?php echo esc_attr( $image['alt'] ?: $name ); ?>"
                                     class="testimonial-card__photo"
                                     width="56" height="56"
                                     loading="lazy">
                            <?php else : ?>
                                <div class="testimonial-card__photo-placeholder" aria-hidden="true">👤</div>
                            <?php endif; ?>

                            <div class="testimonial-card__author-info">
                                <strong class="testimonial-card__name"><?php echo esc_html( $name ); ?></strong>
                                <?php if ( $course ) : ?>
                                    <span class="testimonial-card__course"><?php echo esc_html( $course ); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div><!-- .testimonials-track -->

        </div>

    </div>
</section>
