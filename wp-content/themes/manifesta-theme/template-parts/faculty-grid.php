<?php
/**
 * Faculty grid template part.
 *
 * @package Manifesta
 */

$faculty = manifesta_get_faculty( 4 );
if ( ! $faculty->have_posts() ) return;
?>

<section class="faculty-section section-padding bg-light" aria-labelledby="faculty-section-title">
    <div class="container">

        <header class="section-header" data-aos="fade-up">
            <span class="section-eyebrow"><?php esc_html_e( 'Expert Instructors', 'manifesta' ); ?></span>
            <h2 id="faculty-section-title" class="section-title"><?php esc_html_e( 'Meet Our Faculty', 'manifesta' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Learn from India\'s leading medical professionals', 'manifesta' ); ?></p>
        </header>

        <div class="faculty-grid">
            <?php $i = 0; while ( $faculty->have_posts() ) : $faculty->the_post(); $i++; ?>
                <article class="faculty-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $i * 100 ); ?>">

                    <div class="faculty-card__image-wrap">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'faculty-card', [ 'loading' => 'lazy', 'alt' => get_the_title() ] ); ?>
                        <?php else : ?>
                            <div class="faculty-card__placeholder" aria-hidden="true">👨‍⚕️</div>
                        <?php endif; ?>
                    </div>

                    <div class="faculty-card__info">
                        <h3 class="faculty-card__name"><?php the_title(); ?></h3>

                        <?php $designation = get_field( 'faculty_designation' ); ?>
                        <?php if ( $designation ) : ?>
                            <p class="faculty-card__designation"><?php echo esc_html( $designation ); ?></p>
                        <?php endif; ?>

                        <?php $hospital = get_field( 'faculty_hospital' ); ?>
                        <?php if ( $hospital ) : ?>
                            <p class="faculty-card__hospital">
                                <span aria-hidden="true">🏥</span> <?php echo esc_html( $hospital ); ?>
                            </p>
                        <?php endif; ?>

                        <?php $specialization = get_field( 'faculty_specialization' ); ?>
                        <?php if ( $specialization ) : ?>
                            <p class="faculty-card__specialization"><?php echo esc_html( $specialization ); ?></p>
                        <?php endif; ?>

                        <?php $experience = get_field( 'faculty_experience' ); ?>
                        <?php if ( $experience ) : ?>
                            <span class="faculty-card__exp-badge">
                                <?php echo esc_html( $experience ); ?> <?php esc_html_e( 'experience', 'manifesta' ); ?>
                            </span>
                        <?php endif; ?>

                        <?php $linkedin = get_field( 'faculty_linkedin' ); ?>
                        <?php if ( $linkedin ) : ?>
                            <a href="<?php echo esc_url( $linkedin ); ?>" 
                               target="_blank" rel="noopener noreferrer"
                               class="faculty-card__linkedin"
                               aria-label="<?php printf( esc_attr__( '%s on LinkedIn', 'manifesta' ), get_the_title() ); ?>">
                                LinkedIn →
                            </a>
                        <?php endif; ?>
                    </div>

                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

    </div>
</section>
