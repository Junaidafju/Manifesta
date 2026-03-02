<?php
/**
 * CTA Banner template part.
 *
 * @package Manifesta
 */

if ( ! function_exists( 'get_field' ) ) return;

$cta_heading  = get_field( 'cta_heading' )  ?: __( 'Begin Your Medical Career Journey', 'manifesta' );
$cta_subtext  = get_field( 'cta_subtext' )  ?: __( 'Join thousands of medical professionals who have advanced their careers with us.', 'manifesta' );
$cta_btn_text = get_field( 'cta_btn_text' ) ?: __( 'Explore Courses', 'manifesta' );
$cta_btn_link = get_field( 'cta_btn_link' ) ?: get_post_type_archive_link( 'course' );
?>

<section class="cta-banner" aria-labelledby="cta-heading">
    <div class="cta-banner__bg" aria-hidden="true"></div>
    <div class="container">
        <div class="cta-banner__inner" data-aos="fade-up">

            <div class="cta-banner__content">
                <h2 id="cta-heading" class="cta-banner__title"><?php echo esc_html( $cta_heading ); ?></h2>
                <p class="cta-banner__subtext"><?php echo esc_html( $cta_subtext ); ?></p>
            </div>

            <div class="cta-banner__actions">
                <a href="<?php echo esc_url( $cta_btn_link ?: home_url( '/courses' ) ); ?>" class="btn btn--light btn--lg">
                    <?php echo esc_html( $cta_btn_text ); ?>
                    <span aria-hidden="true">→</span>
                </a>
                <a href="<?php echo esc_url( manifesta_whatsapp_link( 'I would like to learn more about your courses.' ) ); ?>"
                   target="_blank" rel="noopener noreferrer"
                   class="btn btn--whatsapp btn--lg">
                    💬 <?php esc_html_e( 'Ask on WhatsApp', 'manifesta' ); ?>
                </a>
            </div>

        </div>
    </div>
</section>
