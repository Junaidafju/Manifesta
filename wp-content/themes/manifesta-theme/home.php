<?php
/**
 * The template for displaying the blog/posts page.
 *
 * @package Manifesta
 */

get_header(); ?>

<?php
$blog_page_id = get_option('page_for_posts');
$hero_bg = '';
if ($blog_page_id && has_post_thumbnail($blog_page_id)) {
    $hero_bg = get_the_post_thumbnail_url($blog_page_id, 'full');
}
?>

<section class="post-hero <?php echo $hero_bg ? 'has-bg' : ''; ?>" <?php echo $hero_bg ? 'style="background-image: url(' . esc_url($hero_bg) . ');"' : ''; ?>>
    <div class="container">
        <div class="post-hero__content">
            <!-- Breadcrumbs -->
            <div class="post-breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator">/</span>
                <span class="current">Blog</span>
            </div>

            <h1 class="post-title">
                <?php
                if ($blog_page_id) {
                    echo get_the_title($blog_page_id);
                } else {
                    esc_html_e('Blog', 'manifesta');
                }
                ?>
            </h1>
        </div>
    </div>
</section>

<section class="blog-archive-section">
    <div class="container">

        <div class="blog-layout-wrapper">
            <!-- Main Content -->
            <div class="blog-main-content">
                <?php if (have_posts()): ?>
                    <div class="blog-posts-grid">
                        <?php while (have_posts()):
                            the_post(); ?>
                            <?php get_template_part('template-parts/blog-card'); ?>
                        <?php endwhile; ?>
                    </div>

                    <!-- Pagination -->
                    <?php if (function_exists('manifesta_pagination')): ?>
                        <?php manifesta_pagination(); ?>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="no-posts-found">
                        <h2>
                            <?php esc_html_e('No posts found', 'manifesta'); ?>
                        </h2>
                        <p>
                            <?php esc_html_e('It seems we can\'t find what you\'re looking for.', 'manifesta'); ?>
                        </p>
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