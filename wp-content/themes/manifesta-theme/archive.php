<?php
/**
 * Archive template (Blog archive, categories, tags)
 *
 * @package Manifesta
 */

get_header();

// Get archive title
$archive_title = '';
if (is_category()) {
    $archive_title = single_cat_title('', false);
} elseif (is_tag()) {
    $archive_title = single_tag_title('', false);
} elseif (is_author()) {
    $archive_title = get_the_author();
} elseif (is_day()) {
    $archive_title = get_the_date();
} elseif (is_month()) {
    $archive_title = get_the_date('F Y');
} elseif (is_year()) {
    $archive_title = get_the_date('Y');
} else {
    $archive_title = __('Blog', 'manifesta');
}
?>

<section class="blog-archive-section">
    <div class="container">

        <!-- Archive Header -->
        <header class="archive-header">
            <h1 class="archive-title"><?php echo esc_html($archive_title); ?></h1>
            <?php if (is_category() || is_tag()): ?>
                <div class="archive-description">
                    <?php echo term_description(); ?>
                </div>
            <?php endif; ?>
        </header>

        <div class="blog-layout-wrapper">
            <!-- Main Content -->
            <div class="blog-main-content">
                <?php if (have_posts()): ?>
                    <div class="blog-posts-grid">
                        <?php while (have_posts()):
                            the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('blog-card'); ?>>
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="blog-card__image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('blog-medium', array('class' => 'blog-image')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="blog-card__content">
                                    <div class="blog-card__meta">
                                        <span class="post-date">
                                            <svg class="meta-icon" viewBox="0 0 24 24" width="14" height="14">
                                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"
                                                    fill="none" />
                                                <polyline points="12 6 12 12 16 14" stroke="currentColor" stroke-width="1.5"
                                                    fill="none" />
                                            </svg>
                                            <?php echo get_the_date('M j, Y'); ?>
                                        </span>
                                        <span class="post-category">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' .
                                                    esc_html($categories[0]->name) . '</a>';
                                            }
                                            ?>
                                        </span>
                                    </div>

                                    <h2 class="blog-card__title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>

                                    <div class="blog-card__excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                    </div>

                                    <div class="blog-card__footer">
                                        <a href="<?php the_permalink(); ?>" class="read-more-link">
                                            Read More
                                            <svg class="arrow-icon" viewBox="0 0 24 24" width="16" height="16">
                                                <line x1="5" y1="12" x2="19" y2="12" stroke="currentColor" stroke-width="2" />
                                                <polyline points="12 5 19 12 12 19" stroke="currentColor" stroke-width="2"
                                                    fill="none" />
                                            </svg>
                                        </a>
                                        <span class="reading-time">
                                            <svg class="clock-icon" viewBox="0 0 24 24" width="14" height="14">
                                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"
                                                    fill="none" />
                                                <polyline points="12 6 12 12 16 14" stroke="currentColor" stroke-width="1.5"
                                                    fill="none" />
                                            </svg>
                                            <?php echo manifesta_reading_time(); ?> min read
                                        </span>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <!-- Pagination -->
                    <?php if (function_exists('manifesta_pagination')): ?>
                        <?php manifesta_pagination(); ?>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="no-posts-found">
                        <h2><?php esc_html_e('No posts found', 'manifesta'); ?></h2>
                        <p><?php esc_html_e('It seems we can\'t find what you\'re looking for.', 'manifesta'); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="blog-sidebar">
                <?php get_sidebar('blog'); ?>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>