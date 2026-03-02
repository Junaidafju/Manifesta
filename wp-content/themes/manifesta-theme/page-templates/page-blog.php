<?php
/**
 * Template Name: Blog Page
 *
 * @package Manifesta
 */

get_header();

// Set up custom query for blog posts
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$blog_args = array(
    'post_type' => 'post',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $paged,
);
$blog_query = new WP_Query($blog_args);
?>

<?php
$hero_bg = '';
if (has_post_thumbnail()) {
    $hero_bg = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
?>

<section class="post-hero <?php echo $hero_bg ? 'has-bg' : ''; ?>" <?php echo $hero_bg ? 'style="background-image: url(' . esc_url($hero_bg) . ');"' : ''; ?>>
    <div class="container">
        <div class="post-hero__content">
            <!-- Breadcrumbs -->
            <div class="post-breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator">/</span>
                <span class="current"><?php the_title(); ?></span>
            </div>

            <h1 class="post-title">
                <?php the_title(); ?>
            </h1>

            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>
                    <?php if (get_the_content()): ?>
                        <div class="post-subtitle">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="blog-archive-section">
    <div class="container">

        <div class="blog-layout-wrapper">
            <!-- Main Content -->
            <div class="blog-main-content">
                <?php if ($blog_query->have_posts()): ?>
                    <div class="blog-posts-grid">
                        <?php while ($blog_query->have_posts()):
                            $blog_query->the_post(); ?>
                            <?php get_template_part('template-parts/blog-card'); ?>
                        <?php endwhile; ?>
                    </div>

                    <!-- Pagination -->
                    <?php
                    $big = 999999999;
                    echo '<div class="blog-pagination"><div class="pagination-links">';
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'total' => $blog_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                    ));
                    echo '</div></div>';
                    ?>

                <?php else: ?>
                    <div class="no-posts-found">
                        <h2>
                            <?php esc_html_e('No posts found', 'manifesta'); ?>
                        </h2>
                    </div>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>

            <!-- Sidebar -->
            <aside class="blog-sidebar">
                <?php get_sidebar('blog'); ?>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>