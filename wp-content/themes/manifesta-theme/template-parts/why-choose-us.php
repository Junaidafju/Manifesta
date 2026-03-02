<?php
/**
 * Why Choose Us template part.
 *
 * @package Manifesta
 */

$has_items = false;
for ($i = 1; $i <= 3; $i++) {
    if (function_exists('get_field') && get_field("why_{$i}_title")) {
        $has_items = true;
        break;
    }
}
if (!$has_items)
    return;

$section_title = function_exists('get_field') ? get_field('why_section_title') : '';
$section_title = $section_title ?: __('Why Choose Us', 'manifesta');
?>

<section class="why-section section-padding" aria-labelledby="why-section-title">
    <div class="container">

        <header class="section-header" data-aos="fade-up">
            <h2 id="why-section-title" class="section-title"><?php echo esc_html($section_title); ?></h2>
            <p class="section-subtitle">
                <?php esc_html_e('Excellence in medical education backed by decades of clinical expertise', 'manifesta'); ?>
            </p>
        </header>

        <div class="why-grid">
            <?php
            for ($i = 1; $i <= 3; $i++):
                if (!function_exists('get_field'))
                    continue;
                $title = get_field("why_{$i}_title");
                if (!$title)
                    continue;
                $icon = get_field("why_{$i}_icon");
                $desc = get_field("why_{$i}_description");
                ?>
                <div class="why-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(($i - 1) * 100); ?>">
                    <?php if ($icon): ?>
                        <div class="why-card__icon" aria-hidden="true">
                            <?php echo esc_html($icon); ?>
                        </div>
                    <?php endif; ?>
                    <div class="why-card__content">
                        <h3 class="why-card__title"><?php echo esc_html($title); ?></h3>
                        <?php if ($desc): ?>
                            <p class="why-card__desc"><?php echo esc_html($desc); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

    </div>
</section>