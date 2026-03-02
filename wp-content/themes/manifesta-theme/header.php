<?php
/**
 * header.php — Manifesta Medical Academy
 * Glassmorphism floating dock + ACF Pro options + marquee topbar
 *
 * ACF-safe: all get_field() calls are wrapped in function_exists() checks
 * so the header works even before ACF Pro is installed/activated.
 */

// ── Safe ACF helper — returns '' if ACF not active ────────────────────────
function mf_field(string $key, $post_id = false)
{
    if (function_exists('get_field')) {
        return get_field($key, $post_id) ?: '';
    }
    return '';
}

// ── Fetch ALL options once at the top ────────────────────────────────────
$mf_phone = get_theme_mod('manifesta_phone');
$mf_email = get_theme_mod('manifesta_email');
$mf_whatsapp = get_theme_mod('manifesta_whatsapp');

// Marquee text from Customizer
$mf_marquee_text = get_theme_mod('manifesta_header_announcement');
$mf_marquee_items = [];
if ($mf_marquee_text) {
    $mf_marquee_items = array_fill(0, 4, $mf_marquee_text);
} else {
    $mf_marquee_items = [
        '⭐ Limited Seats Available — Admission Open 2026 ⭐',
        '🎓 New Batch Starting Soon — Enroll Today!',
        '🏥 Industry-Recognised Medical Certifications',
        '📞 Call Now for a Free Counselling Session',
    ];
}

// Build the marquee HTML string
$mf_marquee_str = '';
foreach ($mf_marquee_items as $item) {
    $text = is_array($item) ? ($item['marquee_text'] ?? '') : $item;
    if ($text) {
        $mf_marquee_str .= '<span class="marquee__item">' . esc_html($text) . '</span>'
            . '<span class="marquee__sep" aria-hidden="true">✦</span>';
    }
}

// Header CTA from options (falls back to /contact)
$mf_cta_text = get_theme_mod('manifesta_header_cta_text') ?: 'Enquire Now';
$mf_cta_link = get_theme_mod('manifesta_header_cta_link') ?: home_url('/contact');

// Build WhatsApp URL
$mf_wa_number = preg_replace('/[^0-9]/', '', $mf_whatsapp ?: $mf_phone ?: '');
$mf_wa_url = $mf_wa_number
    ? 'https://wa.me/' . $mf_wa_number . '?text=' . rawurlencode('Hello, I would like to enquire about your courses.')
    : '#';

// Phone href
$mf_phone_href = $mf_phone ? 'tel:' . preg_replace('/[^0-9+]/', '', $mf_phone) : '#';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#092e33">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>

    <style>
        /* ═══════════════════════════════════════════════════════════
   MANIFESTA MEDICAL — GLASSMORPHISM HEADER + MARQUEE TOPBAR
   ═══════════════════════════════════════════════════════════ */

        :root {
            --glass-bg: rgba(15, 75, 85, 0.58);
            --glass-border: rgba(255, 255, 255, 0.10);
            --glass-blur: 20px;
            --glass-shadow: 0 8px 40px rgba(0, 0, 0, 0.40);
            --accent: #3b82f6;
            --accent-hover: #2563eb;
            --accent-glow: rgba(59, 130, 246, 0.38);
            --accent-light: #93c5fd;
            --gold: #d4a843;
            --gold-light: #f0c96a;
            --text-white: #f0f4ff;
            --text-muted: rgba(200, 215, 255, 0.62);
            --whatsapp: #25d366;
            --wa-glow: rgba(37, 211, 102, 0.30);
            --topbar-h: 40px;
            --header-h: 72px;
            --font-sans: 'Outfit', sans-serif;
            --font-display: 'Playfair Display', serif;
            --ease: cubic-bezier(0.4, 0, 0.2, 1);
            --ease-out: cubic-bezier(0.22, 1, 0.36, 1);
            --t: 0.26s;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-sans);
            background: #092e33;
            color: var(--text-white);
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ─────────────────────────────────────────────────
   TOPBAR — MARQUEE ANNOUNCEMENT BAR
───────────────────────────────────────────────── */
        .topbar {
            position: relative;
            z-index: 300;
            height: var(--topbar-h);
            background: linear-gradient(90deg, #092e33 0%, #0f4b55 50%, #092e33 100%);
            border-bottom: 1px solid rgba(59, 130, 246, 0.18);
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        /* Left badge */
        .topbar__badge {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 18px 0 20px;
            height: 100%;
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.16), transparent);
            border-right: 1px solid rgba(59, 130, 246, 0.18);
            white-space: nowrap;
            z-index: 2;
        }

        .topbar__badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gold);
            box-shadow: 0 0 7px var(--gold);
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.4;
                transform: scale(0.65);
            }
        }

        .topbar__badge-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--gold);
        }

        /* Marquee track */
        .topbar__marquee {
            flex: 1;
            overflow: hidden;
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            mask-image: linear-gradient(90deg, transparent 0%, black 4%, black 96%, transparent 100%);
            -webkit-mask-image: linear-gradient(90deg, transparent 0%, black 4%, black 96%, transparent 100%);
        }

        /* Pause on hover for readability */
        .topbar__marquee:hover .marquee__track {
            animation-play-state: paused;
        }

        .marquee__track {
            display: flex;
            align-items: center;
            white-space: nowrap;
            animation: marquee-scroll 30s linear infinite;
            will-change: transform;
            flex-shrink: 0;
        }

        .marquee__track--clone {
            /* animation-delay: -15s; removed for seamless sync */
        }

        .marquee__item {
            font-size: 12px;
            font-weight: 500;
            color: var(--text-white);
            letter-spacing: 0.03em;
            padding: 0 10px;
        }

        .marquee__sep {
            font-size: 7px;
            color: var(--accent-light);
            opacity: 0.45;
            padding: 0 12px;
        }

        @keyframes marquee-scroll {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-100%);
            }
        }

        /* Right side contact */
        .topbar__contact {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 0 20px 0 18px;
            height: 100%;
            background: linear-gradient(270deg, rgba(59, 130, 246, 0.10), transparent);
            border-left: 1px solid rgba(59, 130, 246, 0.15);
            z-index: 2;
        }

        .topbar__link {
            font-size: 11.5px;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap;
            transition: color var(--t) var(--ease);
        }

        .topbar__link:hover {
            color: var(--accent-light);
        }

        .topbar__link--wa {
            color: var(--whatsapp);
            font-weight: 600;
        }

        .topbar__link--wa:hover {
            opacity: 0.80;
        }

        /* ─────────────────────────────────────────────────
   FLOATING DOCK WRAPPER
───────────────────────────────────────────────── */
        .header-dock-wrapper {
            position: sticky;
            top: 0;
            z-index: 200;
            display: flex;
            justify-content: center;
            padding: 12px 20px;
            margin-bottom: -96px;
            /* 72px dock + 24px padding = 96px */
            pointer-events: none;
            transition: padding var(--t) var(--ease);
        }

        .header-dock-wrapper.is-scrolled {
            padding: 8px 20px;
        }

        .header-dock-wrapper.is-scrolled .site-header-dock {
            background: rgba(12, 45, 50, 0.84);
            box-shadow: 0 16px 60px rgba(0, 0, 0, 0.55),
                0 0 0 1px rgba(255, 255, 255, 0.06),
                inset 0 1px 0 rgba(255, 255, 255, 0.06);
        }

        /* ─────────────────────────────────────────────────
   GLASSMORPHISM DOCK
───────────────────────────────────────────────── */
        .site-header-dock {
            pointer-events: all;
            width: 100%;
            max-width: 1220px;
            height: var(--header-h);
            background: var(--glass-bg);
            backdrop-filter: blur(var(--glass-blur)) saturate(170%);
            -webkit-backdrop-filter: blur(var(--glass-blur)) saturate(170%);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            box-shadow: var(--glass-shadow),
                inset 0 1px 0 rgba(255, 255, 255, 0.07);
            display: flex;
            align-items: center;
            padding: 0 24px 0 20px;
            gap: 16px;
            transition: background var(--t) var(--ease), box-shadow var(--t) var(--ease);
            position: relative;
            overflow: hidden;
            animation: dockIn 0.55s var(--ease-out) both;
        }

        /* Top shimmer line */
        .site-header-dock::before {
            content: '';
            position: absolute;
            top: 0;
            left: 8%;
            right: 8%;
            height: 1px;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(59, 130, 246, 0.55) 30%,
                    rgba(212, 168, 67, 0.45) 70%,
                    transparent);
            border-radius: 100px;
            pointer-events: none;
        }

        @keyframes dockIn {
            from {
                opacity: 0;
                transform: translateY(-20px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ─────────────────────────────────────────────────
   LOGO
───────────────────────────────────────────────── */
        .site-logo {
            flex-shrink: 0;
        }

        .site-logo a {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .site-logo img {
            height: 40px;
            width: auto;
            display: block;
        }

        .site-logo__text {
            display: flex;
            flex-direction: column;
            line-height: 1.15;
        }

        .logo-name {
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 600;
            color: var(--text-white);
            letter-spacing: 0.01em;
        }

        .logo-sub {
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 0.20em;
            text-transform: uppercase;
            color: var(--gold);
        }

        /* ─────────────────────────────────────────────────
   PRIMARY NAVIGATION
───────────────────────────────────────────────── */
        .site-nav {
            flex: 1;
            display: flex;
            justify-content: center;
            min-width: 0;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 0;
            flex-wrap: nowrap;
        }

        .nav-menu>li>a {
            display: flex;
            align-items: center;
            height: 40px;
            padding: 0 13px;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 10px;
            letter-spacing: 0.025em;
            white-space: nowrap;
            position: relative;
            transition: color var(--t) var(--ease), background var(--t) var(--ease);
        }

        /* Slide-in underline on hover / active */
        .nav-menu>li>a::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            right: 50%;
            height: 2px;
            background: var(--accent);
            border-radius: 2px;
            transition: left var(--t) var(--ease), right var(--t) var(--ease), opacity var(--t);
            opacity: 0;
        }

        .nav-menu>li>a:hover,
        .nav-menu>li.current-menu-item>a,
        .nav-menu>li.current-menu-ancestor>a {
            color: var(--text-white);
            background: rgba(59, 130, 246, 0.09);
        }

        .nav-menu>li>a:hover::after,
        .nav-menu>li.current-menu-item>a::after,
        .nav-menu>li.current-menu-ancestor>a::after {
            left: 13px;
            right: 13px;
            opacity: 1;
        }

        /* ─────────────────────────────────────────────────
   HEADER ACTION BUTTONS
───────────────────────────────────────────────── */
        .header-actions {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* WhatsApp icon button */
        .btn-wa-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(37, 211, 102, 0.10);
            border: 1px solid rgba(37, 211, 102, 0.22);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            flex-shrink: 0;
            transition: background var(--t) var(--ease),
                transform var(--t) var(--ease),
                box-shadow var(--t) var(--ease);
        }

        .btn-wa-icon:hover {
            background: rgba(37, 211, 102, 0.20);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px var(--wa-glow);
        }

        .btn-wa-icon svg {
            width: 18px;
            height: 18px;
            fill: var(--whatsapp);
            display: block;
        }

        /* Call button */
        .btn-call {
            height: 40px;
            padding: 0 20px;
            border-radius: 100px;
            background: linear-gradient(135deg, var(--accent) 0%, #1d4ed8 100%);
            border: none;
            color: #fff;
            font-family: var(--font-sans);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.025em;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 7px;
            cursor: pointer;
            white-space: nowrap;
            box-shadow: 0 4px 18px var(--accent-glow);
            position: relative;
            overflow: hidden;
            transition: transform var(--t) var(--ease), box-shadow var(--t) var(--ease);
        }

        .btn-call::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.14), transparent 60%);
            opacity: 0;
            transition: opacity var(--t);
            pointer-events: none;
        }

        .btn-call:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(59, 130, 246, 0.52);
        }

        .btn-call:hover::before {
            opacity: 1;
        }

        .btn-call:active {
            transform: translateY(0);
        }

        .btn-call svg {
            width: 14px;
            height: 14px;
            fill: currentColor;
            flex-shrink: 0;
            animation: ring 4s 3s infinite;
        }

        @keyframes ring {

            0%,
            88%,
            100% {
                transform: rotate(0);
            }

            90% {
                transform: rotate(-16deg);
            }

            92% {
                transform: rotate(14deg);
            }

            94% {
                transform: rotate(-10deg);
            }

            96% {
                transform: rotate(8deg);
            }

            98% {
                transform: rotate(-4deg);
            }
        }

        /* ─────────────────────────────────────────────────
   HAMBURGER BUTTON
───────────────────────────────────────────────── */
        .mobile-toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 12px;
            cursor: pointer;
            gap: 5.5px;
            flex-shrink: 0;
            transition: background var(--t) var(--ease);
        }

        .mobile-toggle:hover {
            background: rgba(255, 255, 255, 0.09);
        }

        .mobile-toggle__bar {
            display: block;
            width: 20px;
            height: 1.5px;
            background: var(--text-white);
            border-radius: 2px;
            transition: transform var(--t) var(--ease), opacity var(--t);
            transform-origin: center;
        }

        .mobile-toggle.is-open .mobile-toggle__bar:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .mobile-toggle.is-open .mobile-toggle__bar:nth-child(2) {
            opacity: 0;
            transform: scaleX(0.2);
        }

        .mobile-toggle.is-open .mobile-toggle__bar:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* ─────────────────────────────────────────────────
   MOBILE FULLSCREEN NAV
───────────────────────────────────────────────── */
        .mobile-nav {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 500;
            background: rgba(10, 30, 35, 0.97);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 80px 24px 48px;
            opacity: 0;
            transform: translateY(-12px);
            transition: opacity 0.32s var(--ease-out), transform 0.32s var(--ease-out);
        }

        .mobile-nav.is-open {
            display: flex;
            opacity: 1;
            transform: translateY(0);
        }

        .mobile-nav__close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--text-white);
            transition: background var(--t) var(--ease);
        }

        .mobile-nav__close:hover {
            background: rgba(255, 255, 255, 0.10);
        }

        /* Reuse .nav-menu inside mobile nav */
        .mobile-nav .nav-menu {
            flex-direction: column;
            align-items: center;
            gap: 4px;
            width: 100%;
            max-width: 340px;
        }

        .mobile-nav .nav-menu>li {
            width: 100%;
        }

        .mobile-nav .nav-menu>li>a {
            justify-content: center;
            width: 100%;
            height: 54px;
            font-size: 16px;
            border-radius: 14px;
            padding: 0 20px;
        }

        .mobile-nav__divider {
            width: 100%;
            max-width: 340px;
            height: 1px;
            background: rgba(255, 255, 255, 0.07);
            margin: 16px 0;
        }

        .mobile-nav__actions {
            display: flex;
            gap: 12px;
            width: 100%;
            max-width: 340px;
        }

        .mobile-nav__actions .btn-wa-icon {
            flex: 1;
            width: auto;
            height: 50px;
            border-radius: 14px;
            gap: 8px;
            padding: 0 16px;
        }

        .mobile-nav__actions .btn-wa-icon .wa-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--whatsapp);
            font-family: var(--font-sans);
        }

        .mobile-nav__actions .btn-call {
            flex: 2;
            height: 50px;
            border-radius: 14px;
            font-size: 14px;
            justify-content: center;
        }

        /* ─────────────────────────────────────────────────
   RESPONSIVE
───────────────────────────────────────────────── */
        @media (max-width: 1100px) {
            .nav-menu>li>a {
                padding: 0 10px;
                font-size: 12.5px;
            }
        }

        @media (max-width: 920px) {
            .site-nav {
                display: none;
            }

            .btn-wa-icon,
            .btn-call {
                display: none;
            }

            .mobile-toggle {
                display: flex;
            }

            .header-dock-wrapper {
                padding: 10px 14px;
            }

            .site-header-dock {
                padding: 0 18px;
            }
        }

        @media (max-width: 768px) {
            .topbar__contact {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .header-dock-wrapper {
                padding: 8px 10px;
            }

            .site-header-dock {
                border-radius: 16px;
                padding: 0 14px;
            }

            .logo-name {
                font-size: 16px;
            }

            .logo-sub {
                display: none;
            }

            .topbar__badge {
                padding: 0 12px 0 14px;
            }

            .topbar__badge-label {
                letter-spacing: 0.10em;
                font-size: 9px;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- ══════════════════════════════════════════════════════
     TOPBAR — MARQUEE ANNOUNCEMENT BAR
══════════════════════════════════════════════════════ -->
    <div class="topbar" role="complementary" aria-label="Announcements and contact">

        <!-- Live pulsing badge -->
        <div class="topbar__badge" aria-hidden="true">
            <span class="topbar__badge-dot"></span>
            <span class="topbar__badge-label">Admissions Open</span>
        </div>

        <!-- Infinite scrolling marquee — pauses on hover -->
        <div class="topbar__marquee" role="marquee" aria-label="Announcements">
            <div class="marquee__track" aria-hidden="true">
                <?php echo $mf_marquee_str; ?>
            </div>
            <div class="marquee__track marquee__track--clone" aria-hidden="true">
                <?php echo $mf_marquee_str; ?>
            </div>
        </div>

        <!-- Right contact info -->
        <div class="topbar__contact">
            <?php if ($mf_phone): ?>
                <a href="<?php echo esc_attr($mf_phone_href); ?>" class="topbar__link"
                    aria-label="Call us: <?php echo esc_attr($mf_phone); ?>">
                    <span aria-hidden="true">📞</span>
                    <?php echo esc_html($mf_phone); ?>
                </a>
            <?php endif; ?>

            <?php if ($mf_email): ?>
                <a href="mailto:<?php echo esc_attr($mf_email); ?>" class="topbar__link"
                    aria-label="Email us: <?php echo esc_attr($mf_email); ?>">
                    <span aria-hidden="true">✉</span>
                    <?php echo esc_html($mf_email); ?>
                </a>
            <?php endif; ?>

            <a href="<?php echo esc_url($mf_wa_url); ?>" target="_blank" rel="noopener noreferrer"
                class="topbar__link topbar__link--wa" aria-label="WhatsApp us">
                💬 WhatsApp
            </a>
        </div>

    </div><!-- /.topbar -->


    <!-- ══════════════════════════════════════════════════════
     FLOATING GLASSMORPHISM DOCK HEADER
══════════════════════════════════════════════════════ -->
    <div class="header-dock-wrapper" id="header-dock-wrapper">
        <header class="site-header-dock" id="site-header" role="banner">

            <!-- ── Logo ─────────────────────────────────── -->
            <div class="site-logo">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
                        aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> — Home">
                        <span class="site-logo__text">
                            <span class="logo-name"><?php echo esc_html(get_bloginfo('name')); ?></span>
                            <span class="logo-sub">Medical Academy</span>
                        </span>
                    </a>
                <?php endif; ?>
            </div>

            <!-- ── Primary Nav ───────────────────────────── -->
            <nav class="site-nav" id="site-nav" aria-label="<?php esc_attr_e('Primary Navigation', 'manifesta'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'container' => false,
                    'fallback_cb' => false,
                    'items_wrap' => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                ]);
                ?>
            </nav>

            <!-- ── Actions ───────────────────────────────── -->
            <div class="header-actions">

                <!-- WhatsApp icon button -->
                <a href="<?php echo esc_url($mf_wa_url); ?>" target="_blank" rel="noopener noreferrer"
                    class="btn-wa-icon" aria-label="Chat on WhatsApp" title="WhatsApp Us">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                </a>

                <!-- Call button — shows phone number from ACF -->
                <a href="<?php echo esc_attr($mf_phone_href); ?>" class="btn-call"
                    aria-label="Call us<?php echo $mf_phone ? ': ' . esc_attr($mf_phone) : ''; ?>">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                    </svg>
                    <?php echo $mf_phone ? esc_html($mf_phone) : 'Call Us'; ?>
                </a>

                <!-- Hamburger — mobile only -->
                <button class="mobile-toggle" id="mobile-toggle"
                    aria-label="<?php esc_attr_e('Toggle navigation menu', 'manifesta'); ?>" aria-expanded="false"
                    aria-controls="mobile-nav">
                    <span class="mobile-toggle__bar"></span>
                    <span class="mobile-toggle__bar"></span>
                    <span class="mobile-toggle__bar"></span>
                </button>

            </div><!-- /.header-actions -->

        </header><!-- /.site-header-dock -->
    </div><!-- /.header-dock-wrapper -->


    <!-- ══════════════════════════════════════════════════════
     MOBILE FULLSCREEN NAV OVERLAY
══════════════════════════════════════════════════════ -->
    <nav class="mobile-nav" id="mobile-nav" aria-label="<?php esc_attr_e('Mobile Navigation', 'manifesta'); ?>"
        aria-hidden="true">

        <button class="mobile-nav__close" id="mobile-nav-close"
            aria-label="<?php esc_attr_e('Close navigation menu', 'manifesta'); ?>">✕</button>

        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'menu_class' => 'nav-menu',
            'container' => false,
            'fallback_cb' => false,
        ]);
        ?>

        <div class="mobile-nav__divider" role="separator"></div>

        <div class="mobile-nav__actions">
            <a href="<?php echo esc_url($mf_wa_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-wa-icon"
                aria-label="WhatsApp us">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
                <span class="wa-label">WhatsApp</span>
            </a>

            <?php if ($mf_phone): ?>
                <a href="<?php echo esc_attr($mf_phone_href); ?>" class="btn-call"
                    aria-label="Call us: <?php echo esc_attr($mf_phone); ?>">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                    </svg>
                    Call Now
                </a>
            <?php endif; ?>
        </div>

    </nav><!-- /.mobile-nav -->


    <!-- ══════════════════════════════════════════════════════
     JAVASCRIPT — Zero dependencies, vanilla only
══════════════════════════════════════════════════════ -->
    <script>
        (function () {
            'use strict';

            var wrapper = document.getElementById('header-dock-wrapper');
            var toggle = document.getElementById('mobile-toggle');
            var mobileNav = document.getElementById('mobile-nav');
            var closeBtn = document.getElementById('mobile-nav-close');
            if (!wrapper || !toggle || !mobileNav || !closeBtn) return;

            var isOpen = false;
            var ticking = false;

            /* ── Scroll: deepen glass on scroll ── */
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        wrapper.classList.toggle('is-scrolled', window.scrollY > 48);
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });

            /* ── Mobile nav open / close ── */
            function openNav() {
                isOpen = true;
                mobileNav.style.display = 'flex';
                requestAnimationFrame(function () {
                    mobileNav.classList.add('is-open');
                });
                toggle.classList.add('is-open');
                toggle.setAttribute('aria-expanded', 'true');
                mobileNav.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            }

            function closeNav() {
                isOpen = false;
                mobileNav.classList.remove('is-open');
                toggle.classList.remove('is-open');
                toggle.setAttribute('aria-expanded', 'false');
                mobileNav.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
                setTimeout(function () {
                    if (!isOpen) mobileNav.style.display = 'none';
                }, 340);
            }

            toggle.addEventListener('click', function () { isOpen ? closeNav() : openNav(); });
            closeBtn.addEventListener('click', closeNav);

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && isOpen) closeNav();
            });

            mobileNav.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', closeNav);
            });

            /* ── Dynamic marquee speed (proportional to content width) ── */
            var tracks = document.querySelectorAll('.marquee__track');
            if (tracks.length >= 2) {
                var w = tracks[0].scrollWidth;
                var spd = 55; // px per second — increase to speed up
                var dur = Math.max(18, Math.round(w / spd));
                tracks[0].style.animationDuration = dur + 's';
                tracks[1].style.animationDuration = dur + 's';
                // tracks[1].style.animationDelay    = '-' + (dur / 2) + 's'; // removed to keep tracks perfectly side-by-side
            }

        })();
    </script>