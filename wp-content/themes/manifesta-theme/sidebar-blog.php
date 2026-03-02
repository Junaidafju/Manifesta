<?php
/**
 * Blog Sidebar
 *
 * @package Manifesta
 */
?>

<aside class="widget-area blog-widget-area">
    <?php if (is_active_sidebar('blog-sidebar')): ?>
        <?php dynamic_sidebar('blog-sidebar'); ?>
    <?php else: ?>
        <!-- Default sidebar widgets if none are set -->
        <div class="widget widget_search">
            <h3 class="widget-title"><?php esc_html_e('Search', 'manifesta'); ?></h3>
            <?php get_search_form(); ?>
        </div>

        <div class="widget widget_recent_entries">
            <h3 class="widget-title"><?php esc_html_e('Recent Posts', 'manifesta'); ?></h3>
            <ul>
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                foreach ($recent_posts as $post_item) {
                    echo '<li><a href="' . esc_url(get_permalink($post_item['ID'])) . '">' . esc_html($post_item['post_title']) . '</a></li>';
                }
                ?>
            </ul>
        </div>

        <div class="widget widget_categories">
            <h3 class="widget-title"><?php esc_html_e('Categories', 'manifesta'); ?></h3>
            <ul>
                <?php wp_list_categories(array('title_li' => '')); ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>