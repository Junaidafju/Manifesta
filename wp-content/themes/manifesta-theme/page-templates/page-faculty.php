<?php
/**
 * Template Name: Faculty
 * Template Post Type: page
 *
 * @package Manifesta
 */

get_header();
$faculty_query = manifesta_get_faculty();
?>

<main id="main-content" class="site-main page-faculty">

    <div class="breadcrumb-wrap">
        <div class="container"><?php get_template_part( 'template-parts/breadcrumb' ); ?></div>
    </div>

    <header class="archive-header">
        <div class="container">
            <h1 class="archive-header__title"><?php the_title(); ?></h1>
            <?php if ( has_excerpt() ) : ?>
                <p class="archive-header__subtitle"><?php the_excerpt(); ?></p>
            <?php else : ?>
                <p class="archive-header__subtitle"><?php esc_html_e( 'Learn from India\'s leading medical professionals', 'manifesta' ); ?></p>
            <?php endif; ?>
        </div>
    </header>

    <section class="section-padding">
        <div class="container">
            <?php if ( $faculty_query->have_posts() ) : ?>
                <div class="faculty-grid faculty-grid--full">
                    <?php $i = 0; while ( $faculty_query->have_posts() ) : $faculty_query->the_post(); $i++; ?>
                        <article class="faculty-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( ( $i % 4 ) * 80 ); ?>">
                            <div class="faculty-card__image-wrap">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'faculty-card', [ 'loading' => 'lazy', 'alt' => get_the_title() ] ); ?>
                                <?php else : ?>
                                    <div class="faculty-card__placeholder" aria-hidden="true">👨‍⚕️</div>
                                <?php endif; ?>
                            </div>
                            <div class="faculty-card__info">
                                <h2 class="faculty-card__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php $d = get_field( 'faculty_designation' ); if ( $d ) : ?><p class="faculty-card__designation"><?php echo esc_html( $d ); ?></p><?php endif; ?>
                                <?php $h = get_field( 'faculty_hospital' ); if ( $h ) : ?><p class="faculty-card__hospital">🏥 <?php echo esc_html( $h ); ?></p><?php endif; ?>
                                <?php $s = get_field( 'faculty_specialization' ); if ( $s ) : ?><p class="faculty-card__specialization"><?php echo esc_html( $s ); ?></p><?php endif; ?>
                                <?php $e = get_field( 'faculty_experience' ); if ( $e ) : ?><span class="faculty-card__exp-badge"><?php echo esc_html( $e ); ?></span><?php endif; ?>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <p><?php esc_html_e( 'Faculty profiles coming soon.', 'manifesta' ); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part( 'template-parts/cta-banner' ); ?>

</main>

<?php get_footer(); ?>
