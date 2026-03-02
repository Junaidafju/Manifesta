<?php
/**
 * Blog Card Template Part
 *
 * @package Manifesta
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-card'); ?>>

    <?php if (has_post_thumbnail()): ?>
        <div class="blog-card__image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium_large', array('class' => 'blog-image')); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="blog-card__content">
        <div class="blog-card__meta">
            <span class="post-date">
                <svg viewBox="0 0 24 24" width="14" height="14">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" fill="none" />
                    <polyline points="12 6 12 12 16 14" stroke="currentColor" stroke-width="1.5" fill="none" />
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

        <h3 class="blog-card__title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <div class="blog-card__excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="read-more">
            Read More
            <svg viewBox="0 0 24 24" width="16" height="16">
                <line x1="5" y1="12" x2="19" y2="12" stroke="currentColor" stroke-width="2" />
                <polyline points="12 5 19 12 12 19" stroke="currentColor" stroke-width="2" fill="none" />
            </svg>
        </a>
    </div>
</article>