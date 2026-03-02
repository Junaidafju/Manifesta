<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<main id="main-content" class="site-main single-faculty">

    <!-- Breadcrumb -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <?php get_template_part( 'template-parts/breadcrumb' ); ?>
        </div>
    </div>

    <div class="container section-padding">
        <div class="faculty-profile">

            <!-- Photo -->
            <div class="faculty-profile__image">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'faculty-card', [ 'loading' => 'eager', 'alt' => get_the_title() ] ); ?>
                <?php else : ?>
                    <div class="faculty-profile__placeholder" aria-hidden="true">👨‍⚕️</div>
                <?php endif; ?>

                <?php $linkedin = get_field( 'faculty_linkedin' ); ?>
                <?php if ( $linkedin ) : ?>
                    <a href="<?php echo esc_url( $linkedin ); ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="btn btn--outline faculty-profile__linkedin">
                        in <?php esc_html_e( 'Connect on LinkedIn', 'manifesta' ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Info -->
            <div class="faculty-profile__info">

                <h1 class="faculty-profile__name"><?php the_title(); ?></h1>

                <?php $designation = get_field( 'faculty_designation' ); ?>
                <?php if ( $designation ) : ?>
                    <p class="faculty-profile__designation"><?php echo esc_html( $designation ); ?></p>
                <?php endif; ?>

                <div class="faculty-profile__badges">
                    <?php $qualifications = get_field( 'faculty_qualifications' ); ?>
                    <?php if ( $qualifications ) : ?>
                        <span class="faculty-badge"><?php echo esc_html( $qualifications ); ?></span>
                    <?php endif; ?>

                    <?php $experience = get_field( 'faculty_experience' ); ?>
                    <?php if ( $experience ) : ?>
                        <span class="faculty-badge faculty-badge--exp">
                            <?php echo esc_html( $experience ); ?> <?php esc_html_e( 'Experience', 'manifesta' ); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <dl class="faculty-profile__meta">
                    <?php $hospital = get_field( 'faculty_hospital' ); ?>
                    <?php if ( $hospital ) : ?>
                        <dt><?php esc_html_e( 'Hospital / Institution', 'manifesta' ); ?></dt>
                        <dd><?php echo esc_html( $hospital ); ?></dd>
                    <?php endif; ?>

                    <?php $specialization = get_field( 'faculty_specialization' ); ?>
                    <?php if ( $specialization ) : ?>
                        <dt><?php esc_html_e( 'Specialization', 'manifesta' ); ?></dt>
                        <dd><?php echo esc_html( $specialization ); ?></dd>
                    <?php endif; ?>
                </dl>

                <?php $bio = get_field( 'faculty_bio' ); ?>
                <?php if ( $bio ) : ?>
                    <div class="faculty-profile__bio">
                        <h2><?php esc_html_e( 'About', 'manifesta' ); ?></h2>
                        <p><?php echo esc_html( $bio ); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ( get_the_content() ) : ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>

</main>

<?php endwhile; ?>

<?php get_footer(); ?>
