<?php
/**
 * Stats bar template part.
 *
 * @package Manifesta
 */

$has_stats = false;
for ($i = 1; $i <= 4; $i++) {
    if (function_exists('get_field') && get_field("stat_{$i}_number")) {
        $has_stats = true;
        break;
    }
}
if (!$has_stats)
    return;
?>

<section class="stats-bar" aria-label="Key statistics">
    <div class="container">
        <div class="stats-grid">
            <?php
            for ($i = 1; $i <= 4; $i++):
                if (!function_exists('get_field'))
                    continue;
                $number = get_field("stat_{$i}_number");
                if (!$number)
                    continue;
                $label = get_field("stat_{$i}_label");
                $icon = get_field("stat_{$i}_icon");
                ?>
                <div class="stat-item">
                    <?php if ($icon): ?>
                        <div class="stat-item__icon" aria-hidden="true"><?php echo esc_html($icon); ?></div>
                    <?php endif; ?>
                    <div class="stat-item__content">
                        <strong class="stat-item__number"
                            data-count="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $number)); ?>">
                            <?php echo esc_html($number); ?>
                        </strong>
                        <span class="stat-item__label"><?php echo esc_html($label); ?></span>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>