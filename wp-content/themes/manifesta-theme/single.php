<?php
/**
 * Single Post Template
 *
 * @package Manifesta
 */

get_header();

while (have_posts()):
    the_post();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

        <!-- Post Hero Section -->
        <section class="post-hero">
            <div class="container">
                <div class="post-hero__content">

                    <!-- Breadcrumbs -->
                    <div class="post-breadcrumbs">
                        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                        <span class="separator">/</span>
                        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Blog</a>
                        <span class="separator">/</span>
                        <span class="current">
                            <?php the_title(); ?>
                        </span>
                    </div>

                    <!-- Categories -->
                    <div class="post-categories">
                        <?php
                        $categories = get_the_category();
                        foreach ($categories as $category) {
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-badge">' .
                                esc_html($category->name) . '</a>';
                        }
                        ?>
                    </div>

                    <!-- Title -->
                    <h1 class="post-title">
                        <?php the_title(); ?>
                    </h1>

                    <!-- Meta -->
                    <div class="post-meta">
                        <div class="author-info">
                            <?php echo get_avatar(get_the_author_meta('ID'), 50, '', '', array('class' => 'author-avatar')); ?>
                            <div class="author-details">
                                <span class="author-name">
                                    <?php the_author(); ?>
                                </span>
                                <span class="post-date">
                                    <?php echo get_the_date('F j, Y'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="post-stats">
                            <span class="reading-time">
                                <svg viewBox="0 0 24 24" width="18" height="18">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" fill="none" />
                                    <polyline points="12 6 12 12 16 14" stroke="currentColor" stroke-width="1.5"
                                        fill="none" />
                                </svg>
                                <?php echo manifesta_reading_time(); ?> min read
                            </span>
                            <span class="comment-count">
                                <svg viewBox="0 0 24 24" width="18" height="18">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
                                        stroke="currentColor" stroke-width="1.5" fill="none" />
                                </svg>
                                <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Image (if exists) -->
        <?php if (has_post_thumbnail()): ?>
            <div class="post-featured-image">
                <div class="container container--full">
                    <?php the_post_thumbnail('full', array('class' => 'featured-image')); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Post Content -->
        <section class="post-content-section">
            <div class="container">
                <div class="post-layout">

                    <!-- Main Content -->
                    <div class="post-main">
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>

                        <!-- Post Tags -->
                        <?php
                        $tags = get_the_tags();
                        if ($tags): ?>
                            <div class="post-tags">
                                <h4 class="tags-title">Tags:</h4>
                                <div class="tag-list">
                                    <?php foreach ($tags as $tag): ?>
                                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag-link">
                                            #
                                            <?php echo esc_html($tag->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Author Box -->
                        <div class="author-box">
                            <div class="author-box__avatar">
                                <?php echo get_avatar(get_the_author_meta('ID'), 100, '', '', array('class' => 'author-avatar-large')); ?>
                            </div>
                            <div class="author-box__info">
                                <h4 class="author-name">
                                    <?php the_author(); ?>
                                </h4>
                                <p class="author-bio">
                                    <?php echo get_the_author_meta('description'); ?>
                                </p>
                                <div class="author-social">
                                    <?php
                                    $user_twitter = get_the_author_meta('twitter');
                                    $user_linkedin = get_the_author_meta('linkedin');
                                    if ($user_twitter): ?>
                                        <a href="<?php echo esc_url($user_twitter); ?>" target="_blank"
                                            class="author-social-link">Twitter</a>
                                    <?php endif; ?>
                                    <?php if ($user_linkedin): ?>
                                        <a href="<?php echo esc_url($user_linkedin); ?>" target="_blank"
                                            class="author-social-link">LinkedIn</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Post Navigation -->
                        <nav class="post-navigation">
                            <div class="nav-previous">
                                <?php previous_post_link('%link', '← Previous Post'); ?>
                            </div>
                            <div class="nav-next">
                                <?php next_post_link('%link', 'Next Post →'); ?>
                            </div>
                        </nav>

                        <!-- Comments -->
                        <?php comments_template(); ?>
                    </div>

                    <!-- Sidebar -->
                    <aside class="post-sidebar">
                        <?php get_sidebar('blog'); ?>
                    </aside>
                </div>
            </div>
        </section>

        <!-- Related Posts -->
        <?php
        $categories = wp_get_post_categories(get_the_ID());
        $related_args = array(
            'category__in' => $categories,
            'post__not_in' => array(get_the_ID()),
            'posts_per_page' => 3,
            'orderby' => 'rand'
        );
        $related_query = new WP_Query($related_args);

        if ($related_query->have_posts()): ?>
            <section class="related-posts">
                <div class="container">
                    <h2 class="related-title">You Might Also Like</h2>
                    <div class="related-grid">
                        <?php while ($related_query->have_posts()):
                            $related_query->the_post(); ?>
                            <div class="related-card">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="related-card__image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'related-image')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="related-card__content">
                                    <h3 class="related-card__title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <span class="related-card__date">
                                        <?php echo get_the_date('M j, Y'); ?>
                                    </span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php endif;
        wp_reset_postdata(); ?>

    </article>

    <?php
endwhile;
get_footer();