<?php
/**
 * Hero section template part — Manifesta Medical Academy
 * Teal gradient theme: #0f6e73 → #0f4b55
 *
 * @package Manifesta
 */

// ACF-safe field fetching
$hero_image = function_exists('get_field') ? get_field('hero_image') : null;
$hero_title = function_exists('get_field') ? get_field('hero_title') : '';
$hero_subtitle = function_exists('get_field') ? get_field('hero_subtitle') : '';
$hero_badge = function_exists('get_field') ? get_field('hero_badge') : '';
$cta_primary_text = function_exists('get_field') ? get_field('hero_cta_text') : 'Apply Now';
$cta_primary_link = function_exists('get_field') ? get_field('hero_cta_link') : home_url('/contact');
$hero_phone = get_theme_mod('manifesta_phone');
$mf_wa_number = preg_replace('/[^0-9]/', '', $hero_phone ?: '');
$mf_wa_url = $mf_wa_number
    ? 'https://wa.me/' . $mf_wa_number . '?text=' . rawurlencode('Hello, I would like to enquire about your courses.')
    : '#';

// Fallback content (used until ACF fields are filled)
$title = $hero_title ?: 'Empowering Doctors with Advanced Infertility &amp; ART Skills';
$subtitle = $hero_subtitle ?: 'Fellowship &amp; PG Diploma in Reproductive Medicine — Live Classes • Hands-On Training • ART Rules Followed';
$badge = $hero_badge ?: 'Admission Open 2026 — Limited Seats';
?>

<!-- ════════════════════════════════════════════════════════
     HERO SECTION — full CSS embedded for portability
════════════════════════════════════════════════════════ -->
<style>
    /* ─── MANIFESTA THEME TOKENS ─────────────────────────── */
    :root {
        --teal-dark: #0a3d42;
        --teal-mid: #0f4b55;
        --teal-base: #0f6e73;
        --teal-light: #1a9099;
        --teal-bright: #22b8c0;
        --teal-glow: rgba(15, 110, 115, 0.45);
        --gold: #d4a843;
        --gold-light: #f0c96a;
        --gold-glow: rgba(212, 168, 67, 0.35);
        --white: #ffffff;
        --off-white: #f0f7f8;
        --text-body: rgba(220, 240, 242, 0.88);
        --text-muted: rgba(180, 215, 220, 0.65);
        --whatsapp: #25d366;
        --font-display: 'Cormorant Garamond', 'Georgia', serif;
        --font-sans: 'DM Sans', 'Segoe UI', sans-serif;
        --ease-out: cubic-bezier(0.22, 1, 0.36, 1);
        --ease: cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ─── HERO WRAPPER ───────────────────────────────────── */
    .hero-section {
        position: relative;
        min-height: 100vh;
        +display: flex;
        align-items: center;
        overflow: hidden;
        background-color: var(--teal-dark);

        /* ACF image via CSS custom property */
        background-image: var(--hero-bg, none);
        background-size: cover;
        background-position: center top;
        background-repeat: no-repeat;
    }

    /* ─── LAYERED OVERLAYS ───────────────────────────────── */
    /* Layer 1: dark teal gradient (left-heavy for text legibility) */
    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            linear-gradient(105deg,
                rgba(10, 61, 66, 0.92) 0%,
                rgba(15, 75, 85, 0.82) 45%,
                rgba(15, 110, 115, 0.55) 75%,
                rgba(15, 110, 115, 0.25) 100%);
        z-index: 1;
    }

    /* Layer 2: subtle noise/grain texture for premium feel */
    .hero-section::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.035'/%3E%3C/svg%3E");
        background-size: 200px 200px;
        opacity: 0.4;
        z-index: 2;
        pointer-events: none;
    }

    /* ─── GEOMETRIC ACCENT — teal arc ────────────────────── */
    .hero-arc {
        position: absolute;
        right: -120px;
        top: 50%;
        transform: translateY(-50%);
        width: 680px;
        height: 680px;
        border-radius: 50%;
        border: 1px solid rgba(34, 184, 192, 0.12);
        z-index: 2;
        pointer-events: none;
    }

    .hero-arc::before {
        content: '';
        position: absolute;
        inset: 40px;
        border-radius: 50%;
        border: 1px solid rgba(34, 184, 192, 0.08);
    }

    .hero-arc::after {
        content: '';
        position: absolute;
        inset: 90px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(15, 110, 115, 0.14) 0%, transparent 70%);
    }

    /* Animated teal orb glow top-right */
    .hero-orb {
        position: absolute;
        right: 8%;
        top: 12%;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(15, 110, 115, 0.22) 0%, transparent 65%);
        z-index: 2;
        pointer-events: none;
        animation: orb-breathe 6s ease-in-out infinite;
    }

    @keyframes orb-breathe {

        0%,
        100% {
            transform: scale(1);
            opacity: 0.7;
        }

        50% {
            transform: scale(1.08);
            opacity: 1;
        }
    }

    /* Bottom teal gradient bar */
    .hero-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg,
                transparent 0%,
                var(--teal-base) 25%,
                var(--teal-bright) 50%,
                var(--gold) 75%,
                transparent 100%);
        z-index: 10;
    }

    /* ─── CONTAINER ──────────────────────────────────────── */
    .hero-section .container {
        position: relative;
        z-index: 5;
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        padding: 120px 40px 100px;
        display: grid;
        grid-template-columns: 1fr;
        align-items: center;
    }

    /* ─── CONTENT COLUMN ─────────────────────────────────── */
    .hero-content {
        max-width: 720px;
    }

    /* ─── BADGE ──────────────────────────────────────────── */
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        background: rgba(15, 110, 115, 0.25);
        border: 1px solid rgba(34, 184, 192, 0.30);
        border-radius: 100px;
        padding: 7px 16px 7px 10px;
        margin-bottom: 28px;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);

        /* Entrance animation */
        opacity: 0;
        transform: translateY(12px);
        animation: hero-fade-up 0.7s var(--ease-out) 0.1s forwards;
    }

    .hero-badge__dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--gold);
        box-shadow: 0 0 8px var(--gold-glow);
        animation: pulse-gold 2s infinite;
        flex-shrink: 0;
    }

    @keyframes pulse-gold {

        0%,
        100% {
            box-shadow: 0 0 8px var(--gold-glow);
        }

        50% {
            box-shadow: 0 0 18px rgba(212, 168, 67, 0.6);
        }
    }

    .hero-badge__text {
        font-family: var(--font-sans);
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--gold-light);
    }

    /* ─── H1 TITLE ───────────────────────────────────────── */
    .hero-title {
        font-family: var(--font-display);
        font-size: clamp(2.4rem, 5vw, 4rem);
        font-weight: 600;
        line-height: 1.12;
        letter-spacing: -0.01em;
        color: var(--white);
        margin-bottom: 22px;

        opacity: 0;
        transform: translateY(18px);
        animation: hero-fade-up 0.8s var(--ease-out) 0.25s forwards;
    }

    /* Teal highlight on key phrase */
    .hero-title .highlight {
        background: linear-gradient(135deg, var(--teal-bright) 0%, var(--gold-light) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* ─── SUBTITLE ───────────────────────────────────────── */
    .hero-subtitle {
        font-family: var(--font-sans);
        font-size: clamp(1rem, 1.8vw, 1.15rem);
        font-weight: 400;
        line-height: 1.65;
        color: var(--text-body);
        margin-bottom: 14px;
        max-width: 560px;

        opacity: 0;
        transform: translateY(14px);
        animation: hero-fade-up 0.8s var(--ease-out) 0.4s forwards;
    }

    /* ─── TRUST PILLS ────────────────────────────────────── */
    .hero-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 38px;

        opacity: 0;
        transform: translateY(10px);
        animation: hero-fade-up 0.8s var(--ease-out) 0.5s forwards;
    }

    .hero-pill {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 5px 13px;
        border-radius: 100px;
        border: 1px solid rgba(34, 184, 192, 0.22);
        background: rgba(15, 110, 115, 0.15);
        font-family: var(--font-sans);
        font-size: 12.5px;
        font-weight: 500;
        color: var(--off-white);
        letter-spacing: 0.02em;
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
    }

    .hero-pill__icon {
        font-size: 13px;
        line-height: 1;
    }

    /* ─── CTA BUTTONS ────────────────────────────────────── */
    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        align-items: center;
        margin-bottom: 44px;

        opacity: 0;
        transform: translateY(12px);
        animation: hero-fade-up 0.8s var(--ease-out) 0.62s forwards;
    }

    /* Primary — teal gradient */
    .btn--hero-primary {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        height: 52px;
        padding: 0 30px;
        border-radius: 100px;
        background: linear-gradient(135deg, var(--teal-base) 0%, var(--teal-mid) 100%);
        border: 1px solid rgba(34, 184, 192, 0.35);
        color: var(--white);
        font-family: var(--font-sans);
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        letter-spacing: 0.02em;
        cursor: pointer;
        white-space: nowrap;
        box-shadow: 0 6px 30px rgba(15, 110, 115, 0.45),
            inset 0 1px 0 rgba(255, 255, 255, 0.12);
        transition: transform 0.24s var(--ease),
            box-shadow 0.24s var(--ease),
            background 0.24s var(--ease);
        position: relative;
        overflow: hidden;
    }

    .btn--hero-primary::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.14) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.24s;
    }

    .btn--hero-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 40px rgba(15, 110, 115, 0.60);
        background: linear-gradient(135deg, var(--teal-light) 0%, var(--teal-base) 100%);
    }

    .btn--hero-primary:hover::before {
        opacity: 1;
    }

    .btn--hero-primary:active {
        transform: translateY(0);
    }

    .btn--hero-primary .btn-arrow {
        font-size: 16px;
        transition: transform 0.22s var(--ease);
    }

    .btn--hero-primary:hover .btn-arrow {
        transform: translateX(4px);
    }

    /* Phone button — gold outline */
    .btn--hero-phone {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        height: 52px;
        padding: 0 26px;
        border-radius: 100px;
        background: rgba(212, 168, 67, 0.10);
        border: 1.5px solid rgba(212, 168, 67, 0.45);
        color: var(--gold-light);
        font-family: var(--font-sans);
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        letter-spacing: 0.02em;
        white-space: nowrap;
        transition: background 0.24s var(--ease),
            transform 0.24s var(--ease),
            box-shadow 0.24s var(--ease);
    }

    .btn--hero-phone:hover {
        background: rgba(212, 168, 67, 0.18);
        transform: translateY(-2px);
        box-shadow: 0 6px 24px var(--gold-glow);
    }

    .btn--hero-phone svg {
        width: 16px;
        height: 16px;
        fill: var(--gold);
        animation: ring-phone 4s infinite;
    }

    @keyframes ring-phone {

        0%,
        88%,
        100% {
            transform: rotate(0deg);
        }

        90% {
            transform: rotate(-18deg);
        }

        93% {
            transform: rotate(18deg);
        }

        96% {
            transform: rotate(-10deg);
        }

        98% {
            transform: rotate(10deg);
        }
    }

    /* WhatsApp ghost button */
    .btn--hero-whatsapp {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        height: 52px;
        padding: 0 26px;
        border-radius: 100px;
        background: rgba(37, 211, 102, 0.08);
        border: 1.5px solid rgba(37, 211, 102, 0.30);
        color: #4ade80;
        font-family: var(--font-sans);
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        letter-spacing: 0.02em;
        white-space: nowrap;
        transition: background 0.24s var(--ease),
            transform 0.24s var(--ease),
            box-shadow 0.24s var(--ease);
    }

    .btn--hero-whatsapp:hover {
        background: rgba(37, 211, 102, 0.15);
        transform: translateY(-2px);
        box-shadow: 0 6px 24px rgba(37, 211, 102, 0.25);
    }

    .btn--hero-whatsapp svg {
        width: 18px;
        height: 18px;
        fill: var(--whatsapp);
        flex-shrink: 0;
    }

    /* ─── LOCATION BADGE ─────────────────────────────────── */
    .hero-location {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-family: var(--font-sans);
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 40px;

        opacity: 0;
        transform: translateY(8px);
        animation: hero-fade-up 0.8s var(--ease-out) 0.72s forwards;
    }

    .hero-location svg {
        width: 14px;
        height: 14px;
        fill: var(--teal-bright);
        flex-shrink: 0;
    }

    /* ─── STATS BAR ──────────────────────────────────────── */
    .hero-stats {
        display: flex;
        flex-wrap: wrap;
        gap: 0;
        border-top: 1px solid rgba(34, 184, 192, 0.18);
        padding-top: 28px;

        opacity: 0;
        transform: translateY(10px);
        animation: hero-fade-up 0.8s var(--ease-out) 0.82s forwards;
    }

    .hero-stat {
        flex: 1 1 120px;
        padding: 0 24px 0 0;
        position: relative;
    }

    .hero-stat:not(:last-child)::after {
        content: '';
        position: absolute;
        right: 12px;
        top: 8%;
        height: 84%;
        width: 1px;
        background: rgba(34, 184, 192, 0.18);
    }

    .hero-stat__number {
        display: block;
        font-family: var(--font-display);
        font-size: 2rem;
        font-weight: 700;
        color: var(--white);
        line-height: 1;
        margin-bottom: 5px;
        background: linear-gradient(135deg, var(--teal-bright) 0%, var(--gold-light) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-stat__label {
        display: block;
        font-family: var(--font-sans);
        font-size: 11.5px;
        font-weight: 500;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--text-muted);
    }

    /* ─── SCROLL INDICATOR ───────────────────────────────── */
    .hero-scroll {
        position: absolute;
        bottom: 32px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
        cursor: pointer;
    }

    .hero-scroll__mouse {
        width: 22px;
        height: 34px;
        border: 2px solid rgba(34, 184, 192, 0.40);
        border-radius: 12px;
        display: flex;
        justify-content: center;
        padding-top: 6px;
        transition: border-color 0.3s;
    }

    .hero-scroll__mouse:hover {
        border-color: var(--teal-bright);
    }

    .hero-scroll__dot {
        width: 3px;
        height: 7px;
        border-radius: 2px;
        background: var(--teal-bright);
        animation: scroll-bounce 2s ease-in-out infinite;
    }

    .hero-scroll__label {
        font-family: var(--font-sans);
        font-size: 9px;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--text-muted);
    }

    @keyframes scroll-bounce {

        0%,
        100% {
            transform: translateY(0);
            opacity: 1;
        }

        60% {
            transform: translateY(8px);
            opacity: 0.2;
        }
    }

    /* ─── ENTRANCE ANIMATION ─────────────────────────────── */
    @keyframes hero-fade-up {
        from {
            opacity: 0;
            transform: translateY(var(--ty, 14px));
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ─── TRUST INDICATORS ───────────────────────────────── */
    .hero-trust {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 32px;

        opacity: 0;
        transform: translateY(10px);
        animation: hero-fade-up 0.8s var(--ease-out) 0.55s forwards;
    }

    .hero-trust__item {
        display: flex;
        align-items: center;
        gap: 7px;
        font-family: var(--font-sans);
        font-size: 13px;
        font-weight: 500;
        color: var(--text-body);
    }

    .hero-trust__icon {
        font-size: 15px;
    }

    /* ─── RESPONSIVE ─────────────────────────────────────── */
    @media (max-width: 768px) {
        .hero-section .container {
            padding: 100px 24px 80px;
        }

        .hero-content {
            max-width: 100%;
        }

        .hero-title {
            font-size: clamp(2rem, 7vw, 2.8rem);
        }

        .hero-stats {
            gap: 16px 0;
        }

        .hero-stat {
            flex: 1 1 140px;
            padding-right: 16px;
        }

        .hero-arc {
            display: none;
        }

        .hero-actions {
            gap: 12px;
        }
    }

    @media (max-width: 480px) {
        .hero-section .container {
            padding: 90px 20px 70px;
        }

        .btn--hero-primary,
        .btn--hero-phone,
        .btn--hero-whatsapp {
            width: 100%;
            justify-content: center;
            height: 50px;
            font-size: 14px;
        }

        .hero-actions {
            flex-direction: column;
        }

        .hero-stats {
            padding-top: 20px;
        }

        .hero-stat__number {
            font-size: 1.7rem;
        }
    }

    /* ─── GOOGLE FONTS ───────────────────────────────────── */
</style>

<!-- Google Fonts for hero (DM Sans + Cormorant Garamond) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=DM+Sans:wght@300;400;500;600&display=swap"
    rel="stylesheet">

<!-- ════════════════════════════════════════════
     HERO HTML
════════════════════════════════════════════ -->
<?php
$hero_bg_url = !empty($hero_image['url'])
    ? $hero_image['url'] : 'https://infertilitycenterinbangladesh.com/wp-content/uploads/2025/08/Infertility-Center-in-Bangladesh-About-Us-2048x1365.jpg';
?>
<section class="hero-section" aria-label="<?php esc_attr_e('Hero — Manifesta Medical Academy', 'manifesta'); ?>"
    style="--hero-bg: url('<?php echo esc_url($hero_bg_url); ?>')">

    <!-- Decorative geometry -->
    <div class="hero-arc" aria-hidden="true"></div>
    <div class="hero-orb" aria-hidden="true"></div>
    <div class="hero-bar" aria-hidden="true"></div>

    <div class="container">
        <div class="hero-content">

            <!-- ── Badge ── -->
            <?php if ($badge): ?>
                <div class="hero-badge" role="note">
                    <span class="hero-badge__dot" aria-hidden="true"></span>
                    <span class="hero-badge__text"><?php echo esc_html($badge); ?></span>
                </div>
            <?php endif; ?>

            <!-- ── H1 — ONE per page, SEO optimised ── -->
            <h1 class="hero-title">
                <?php
                // Allow <span class="highlight"> in ACF text for gradient words
                // Falls back to hardcoded SEO-optimised title
                if ($hero_title) {
                    echo wp_kses($hero_title, [
                        'span' => ['class' => []],
                        'br' => [],
                    ]);
                } else { ?>
                    Empowering Doctors with
                    <span class="highlight">Advanced Infertility</span>
                    &amp; ART Skills
                <?php } ?>
            </h1>

            <!-- ── Subtitle ── -->
            <p class="hero-subtitle">
                <?php echo $subtitle
                    ? wp_kses_post($subtitle)
                    : 'Fellowship &amp; PG Diploma in Reproductive Medicine &mdash; Live Classes &bull; Hands-On Training &bull; ART Rules Followed'; ?>
            </p>

            <!-- ── Trust pills ── -->
            <div class="hero-pills" role="list" aria-label="Key features">
                <span class="hero-pill" role="listitem">
                    <span class="hero-pill__icon" aria-hidden="true">✅</span>
                    NMC Recognised
                </span>
                <span class="hero-pill" role="listitem">
                    <span class="hero-pill__icon" aria-hidden="true">🎓</span>
                    ART-Certified Programs
                </span>
                <span class="hero-pill" role="listitem">
                    <span class="hero-pill__icon" aria-hidden="true">🏥</span>
                    Clinical Exposure
                </span>
                <span class="hero-pill" role="listitem">
                    <span class="hero-pill__icon" aria-hidden="true">⚕️</span>
                    Ethical Practice
                </span>
            </div>

            <!-- ── CTAs ── -->
            <div class="hero-actions">

                <!-- Primary: Apply Now -->
                <a href="<?php echo esc_url($cta_primary_link ?: home_url('/contact')); ?>" class="btn--hero-primary"
                    aria-label="Apply now for our courses">
                    <?php echo esc_html($cta_primary_text ?: 'Apply Now'); ?>
                    <span class="btn-arrow" aria-hidden="true">→</span>
                </a>

                <!-- Secondary: Call -->
                <?php if ($hero_phone): ?>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $hero_phone)); ?>"
                        class="btn--hero-phone" aria-label="Call us: <?php echo esc_attr($hero_phone); ?>">
                        <!-- Phone icon -->
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                        <?php echo esc_html($hero_phone); ?>
                    </a>
                <?php else: ?>
                    <a href="tel:+919971177824" class="btn--hero-phone" aria-label="Call us">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                        +91 99711 77824
                    </a>
                <?php endif; ?>

                <!-- Tertiary: WhatsApp -->
                <a href="<?php echo esc_url($mf_wa_url); ?>" target="_blank" rel="noopener noreferrer"
                    class="btn--hero-whatsapp" aria-label="Chat on WhatsApp">
                    <!-- WhatsApp SVG -->
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    WhatsApp Enquiry
                </a>

            </div><!-- /.hero-actions -->

            <!-- ── Location badge ── -->
            <div class="hero-location" aria-label="Location: Gurgaon, India">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path
                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                </svg>
                Gurgaon, India
            </div>

            <!-- ── Stats bar ── -->
            <div class="hero-stats" role="list" aria-label="Academy statistics">

                <div class="hero-stat" role="listitem">
                    <span class="hero-stat__number">500+</span>
                    <span class="hero-stat__label">Doctors Trained</span>
                </div>

                <div class="hero-stat" role="listitem">
                    <span class="hero-stat__number">4</span>
                    <span class="hero-stat__label">Certified Courses</span>
                </div>

                <div class="hero-stat" role="listitem">
                    <span class="hero-stat__number">10+</span>
                    <span class="hero-stat__label">Expert Faculty</span>
                </div>

                <div class="hero-stat" role="listitem">
                    <span class="hero-stat__number">100%</span>
                    <span class="hero-stat__label">ART Compliant</span>
                </div>

            </div><!-- /.hero-stats -->

        </div><!-- /.hero-content -->
    </div><!-- /.container -->

    <!-- Scroll indicator -->
    <div class="hero-scroll" aria-hidden="true"
        onclick="window.scrollBy({top: window.innerHeight * 0.85, behavior: 'smooth'})">
        <div class="hero-scroll__mouse">
            <div class="hero-scroll__dot"></div>
        </div>
        <span class="hero-scroll__label">Scroll</span>
    </div>

</section><!-- /.hero-section --><!-- ════════════════════════════════════════════════════════
     ABOUT SECTION
════════════════════════════════════════════════════════ -->
<section class="home-about section-padding bg-light" aria-labelledby="about-title">
    <div class="container">
        <div class="about-grid">
            <div class="about-content" data-aos="fade-right">
                <span class="section-eyebrow">🏆 ART Compliant</span>
                <h2 id="about-title" class="section-title">About Manifesta</h2>
                <div class="about-bullets">
                    <div class="about-bullet">
                        <span class="bullet-icon" aria-hidden="true">✓</span>
                        <p>Designed exclusively for qualified medical professionals</p>
                    </div>
                    <div class="about-bullet">
                        <span class="bullet-icon" aria-hidden="true">✓</span>
                        <p>Balanced theory + hands-on live clinical training</p>
                    </div>
                    <div class="about-bullet">
                        <span class="bullet-icon" aria-hidden="true">✓</span>
                        <p>Strict adherence to ART Act rules and ethical guidelines</p>
                    </div>
                </div>
                <div style="margin-top: 32px;">
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn--hero-primary"
                        style="height: auto; padding: 12px 28px;">
                        Know More About Us <span class="btn-arrow" aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
            <div class="about-media" data-aos="fade-left">
                <!-- Placeholder for about image -->
                <div class="about-image-wrapper">
                    <img src="https://img.freepik.com/free-photo/portrait-mature-therapist-sitting-table-looking-camera_1098-18156.jpg"
                        alt="Manifesta Training" loading="lazy" class="rounded-image shadow-lg">
                    <div class="experience-badge">
                        <span class="exp-number">10+</span>
                        <span class="exp-text">Years of<br>Excellence</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     OUR PROGRAMS (COURSES)
════════════════════════════════════════════════════════ -->
<section class="home-programs section-padding" aria-labelledby="programs-title">
    <div class="container">
        <header class="section-header text-center" data-aos="fade-up">
            <span class="section-eyebrow">Certified Programs</span>
            <h2 id="programs-title" class="section-title" style="color: #e67e22;">Our Programs</h2>
            <p class="section-subtitle">Structured, hands-on programs designed exclusively for practising doctors
                seeking to specialise in reproductive medicine and ART.</p>
        </header>

        <div class="programs-grid">
            <article class="program-card" data-aos="fade-up" data-aos-delay="100">
                <div class="program-icon">🔬</div>
                <h3 class="program-title">Fellowship in Reproductive Medicine</h3>
                <p class="program-desc">Comprehensive 1-year clinical fellowship covering IVF, IUI, embryology &amp; ART
                    protocols.</p>
                <div class="program-meta">
                    <span class="pill">Live + Hands-On</span>
                </div>
                <a href="<?php echo esc_url(home_url('/courses/fellowship-in-reproductive-medicine')); ?>"
                    class="program-link">
                    Enroll Now <span aria-hidden="true">→</span>
                </a>
            </article>

            <article class="program-card" data-aos="fade-up" data-aos-delay="200">
                <div class="program-icon">🧫</div>
                <h3 class="program-title">PG Diploma in Clinical Embryology</h3>
                <p class="program-desc">Specialised training in embryo culture, cryopreservation &amp; laboratory
                    management.</p>
                <div class="program-meta">
                    <span class="pill">Live + Hands-On</span>
                </div>
                <a href="<?php echo esc_url(home_url('/courses/pg-diploma-in-clinical-embryology')); ?>"
                    class="program-link">
                    Enroll Now <span aria-hidden="true">→</span>
                </a>
            </article>

            <article class="program-card" data-aos="fade-up" data-aos-delay="300">
                <div class="program-icon">💉</div>
                <h3 class="program-title">Certificate Course in IUI &amp; OPU</h3>
                <p class="program-desc">Focused hands-on program in intrauterine insemination and ovum pick-up
                    procedures.</p>
                <div class="program-meta">
                    <span class="pill">Live + Hands-On</span>
                </div>
                <a href="<?php echo esc_url(home_url('/courses/certificate-course-in-iui-opu')); ?>"
                    class="program-link">
                    Enroll Now <span aria-hidden="true">→</span>
                </a>
            </article>

            <article class="program-card" data-aos="fade-up" data-aos-delay="400">
                <div class="program-icon">🔭</div>
                <h3 class="program-title">Advanced Course in Hysteroscopy</h3>
                <p class="program-desc">Surgical skills development with live operative hysteroscopy and case-based
                    learning.</p>
                <div class="program-meta">
                    <span class="pill">Live + Hands-On</span>
                </div>
                <a href="<?php echo esc_url(home_url('/courses/advanced-course-in-hysteroscopy')); ?>"
                    class="program-link">
                    Enroll Now <span aria-hidden="true">→</span>
                </a>
            </article>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     TRAINING APPROACH
════════════════════════════════════════════════════════ -->
<section class="home-approach section-padding bg-teal text-white" aria-labelledby="approach-title">
    <div class="container">
        <header class="section-header text-center" data-aos="fade-up">
            <span class="section-eyebrow text-gold">How We Train</span>
            <h2 id="approach-title" class="section-title text-white">Our Training Approach</h2>
            <p class="section-subtitle opacity-80" style="color:var(--off-white);">A three-pillar model that combines
                regulatory compliance, live interactive learning, and real clinical exposure.</p>
        </header>

        <div class="approach-grid">
            <div class="approach-card glass-card" data-aos="fade-up" data-aos-delay="100">
                <div class="approach-icon">📋</div>
                <h3 class="approach-heading">ART Rules &amp; Certification</h3>
                <ul class="approach-list">
                    <li>ART-compliant curriculum</li>
                    <li>Ethical clinical protocols</li>
                    <li>Nationally certified programs</li>
                </ul>
            </div>

            <div class="approach-card glass-card" data-aos="fade-up" data-aos-delay="200">
                <div class="approach-icon">🎥</div>
                <h3 class="approach-heading">Theory + Live Learning</h3>
                <ul class="approach-list">
                    <li>Live interactive classes</li>
                    <li>Live surgery telecasts</li>
                    <li>Structured online modules</li>
                </ul>
            </div>

            <div class="approach-card glass-card" data-aos="fade-up" data-aos-delay="300">
                <div class="approach-icon">🏥</div>
                <h3 class="approach-heading">Practical &amp; Clinical Exposure</h3>
                <ul class="approach-list">
                    <li>Hands-on training in partner clinics</li>
                    <li>Real patient case discussions</li>
                    <li>Procedure-based learning</li>
                </ul>
            </div>
        </div>

        <div class="text-center" style="margin-top: 48px;" data-aos="fade-up">
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn--gold">
                Apply Now <span aria-hidden="true">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     WHY MANIFESTA
════════════════════════════════════════════════════════ -->
<section class="home-why section-padding bg-light" aria-labelledby="why-title">
    <div class="container">
        <header class="section-header text-center" data-aos="fade-up">
            <span class="section-eyebrow">Why Manifesta</span>
            <h2 id="why-title" class="section-title">What Makes Us Different?</h2>
            <p class="section-subtitle">We go beyond lectures — we build confident, competent, and ethical fertility
                specialists through real clinical experience.</p>
        </header>

        <div class="why-grid">
            <div class="why-item" data-aos="fade-up" data-aos-delay="100">
                <div class="why-icon">🎯</div>
                <div>
                    <h3 class="why-heading">Practice-Oriented Learning</h3>
                    <p class="why-desc">Every module is designed around real clinical scenarios, not just theory.</p>
                </div>
            </div>
            <div class="why-item" data-aos="fade-up" data-aos-delay="200">
                <div class="why-icon">👨‍⚕️</div>
                <div>
                    <h3 class="why-heading">Real Patient Case Exposure</h3>
                    <p class="why-desc">Trainees work on live cases under expert faculty supervision.</p>
                </div>
            </div>
            <div class="why-item" data-aos="fade-up" data-aos-delay="300">
                <div class="why-icon">🔬</div>
                <div>
                    <h3 class="why-heading">Advanced Infertility Protocols</h3>
                    <p class="why-desc">Latest IVF, ICSI, and embryology techniques from leading specialists.</p>
                </div>
            </div>
            <div class="why-item" data-aos="fade-up" data-aos-delay="400">
                <div class="why-icon">📜</div>
                <div>
                    <h3 class="why-heading">ART-Compliant Training</h3>
                    <p class="why-desc">All programs follow the Assisted Reproductive Technology Act guidelines.</p>
                </div>
            </div>
            <div class="why-item" data-aos="fade-up" data-aos-delay="500">
                <div class="why-icon">🚀</div>
                <div>
                    <h3 class="why-heading">Career-Focused Education</h3>
                    <p class="why-desc">Training designed to help you launch or grow your own fertility practice.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     EXPERT FACULTY
════════════════════════════════════════════════════════ -->
<section class="home-faculty section-padding" aria-labelledby="faculty-title">
    <div class="container">
        <header class="section-header text-center" data-aos="fade-up">
            <span class="section-eyebrow">Expert Faculty</span>
            <h2 id="faculty-title" style="color: #ffffff;" class="section-title">Learn from Leading Fertility Experts
            </h2>
            <p class="section-subtitle">Our faculty are actively practising clinicians with decades of experience in
                IVF, embryology, and reproductive endocrinology.</p>
        </header>

        <div class="faculty-grid">
            <!-- Dr. Anita Sharma - With actual image -->
            <div class="faculty-card" data-aos="fade-up" data-aos-delay="100">
                <div class="faculty-image-wrapper">
                    <img src="https://indianfertilitysociety.org/wp-content/uploads/2024/04/Dr-Anita-Sharma.jpg"
                        alt="Dr. Anita Sharma - Reproductive Endocrinology Specialist" class="faculty-image"
                        loading="lazy"
                        onerror="this.onerror=null; this.style.display='none'; this.parentNode.classList.add('fallback-avatar'); this.parentNode.innerHTML += '<div class=\'faculty-avatar\' aria-hidden=\'true\'>👩‍⚕️</div>';">
                </div>
                <h3 class="faculty-name">Dr. Anita Sharma</h3>
                <p class="faculty-spec">Reproductive Endocrinology</p>
                <p class="faculty-meta">
                    <span class="pill">18 Years Experience</span>
                </p>
                <p class="faculty-hosp">World IVF Centre, Gurgaon</p>
            </div>

            <!-- Dr. Rajesh Mehta - With image wrapper for future image -->
            <div class="faculty-card" data-aos="fade-up" data-aos-delay="200">
                <div class="faculty-image-wrapper faculty-avatar-wrapper">
                    <img src="https://www.cityhospitallko.com/static/media/2.443c0a661ea3409c2883.png"
                        alt="Dr. Rajesh Mehta" class="faculty-image">
                </div>
                <h3 class="faculty-name">Dr. Rajesh Mehta</h3>
                <p class="faculty-spec">Clinical Embryology</p>
                <p class="faculty-meta">
                    <span class="pill">15 Years Experience</span>
                </p>
                <p class="faculty-hosp">Neelkanth Hospital</p>
            </div>

            <!-- Dr. Priya Nair - With image wrapper for future image -->
            <div class="faculty-card" data-aos="fade-up" data-aos-delay="300">
                <div class="faculty-image-wrapper faculty-avatar-wrapper">
                    <img src="https://www.manipalhospitals.com/uploads/doctors_photo/anesthesiologist-in-hebbal-bangalore-dr-priya-nair.png"
                        alt="Dr. Priya Nair" class="faculty-image">
                </div>
                <h3 class="faculty-name">Dr. Priya Nair</h3>
                <p class="faculty-spec">IVF &amp; ART Specialist</p>
                <p class="faculty-meta">
                    <span class="pill">12 Years Experience</span>
                </p>
                <p class="faculty-hosp">World IVF Infertility Centre</p>
            </div>
        </div>

        <div class="text-center" style="margin-top: 40px;" data-aos="fade-up">
            <a href="<?php echo esc_url(home_url('/faculty')); ?>" class="btn--outline">
                View Full Faculty <span aria-hidden="true">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     WHERE YOU'LL TRAIN
════════════════════════════════════════════════════════ -->
<section class="home-partners section-padding bg-light" aria-labelledby="partners-title">
    <div class="container text-center">
        <header class="section-header" data-aos="fade-up">
            <span class="section-eyebrow">Where You'll Train</span>
            <h2 id="partners-title" class="section-title">Clinical Training Centers</h2>
            <p class="section-subtitle">Gain hands-on experience at Gurgaon's leading fertility hospitals and IVF
                laboratories.</p>
        </header>

        <div class="partners-grid" data-aos="fade-up" data-aos-delay="100">
            <div class="partner-card">
                <span class="partner-icon">🏥</span>
                <span class="partner-name">World IVF Infertility Centre</span>
            </div>
            <div class="partner-card">
                <span class="partner-icon">🏥</span>
                <span class="partner-name">Neelkanth Hospital</span>
            </div>
            <div class="partner-card">
                <span class="partner-icon">🏥</span>
                <span class="partner-name">World IVF, Gurgaon</span>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════
     FINAL CTA
════════════════════════════════════════════════════════ -->
<section class="cta-banner section-padding bg-teal text-white">
    <div class="container text-center">
        <h2 style="color:var(--off-white);" class="cta-title">Begin Your Medical Career Journey</h2>
        <p class="cta-subtitle" style="color:var(--off-white);">Join thousands of medical professionals who have
            advanced their careers with us.</p>

        <div class="cta-features">
            <span>📍 Gurgaon, India</span>
            <span>🎓 ART Certified Programs</span>
            <span>🏆 500+ Doctors Trained</span>
        </div>

        <div class="cta-actions">
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn--gold">
                Start Your Journey <span aria-hidden="true">→</span>
            </a>
            <a href="tel:+919971177824" class="btn--outline text-white">
                📞 Call Now
            </a>
            <a href="https://wa.me/919971177824" target="_blank" class="btn--whatsapp">
                💬 Ask on WhatsApp
            </a>
        </div>
    </div>
</section>

<!-- ADDITIONAL STYLES FOR APPENDED SECTIONS -->
<style>
    /* Utilities */
    .text-center {
        text-align: center;
    }

    .bg-light {
        background-color: var(--off-white);
    }

    .bg-teal {
        background-color: var(--teal-dark);
        position: relative;
        overflow: hidden;
    }

    .bg-teal::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, var(--teal-base) 0%, transparent 100%);
        opacity: 0.8;
        z-index: 1;
    }

    .bg-teal>.container {
        position: relative;
        z-index: 2;
    }

    .text-white {
        color: var(--white);
    }

    .text-gold {
        color: var(--gold-light);
    }

    .opacity-80 {
        opacity: 0.8;
    }

    .shadow-lg {
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .rounded-image {
        border-radius: 16px;
        object-fit: cover;
        width: 100%;
        height: 100%;
        display: block;
    }

    /* Typography */
    .section-eyebrow {
        display: block;
        font-family: var(--font-sans);
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--teal-light);
        margin-bottom: 12px;
    }

    .section-title {
        font-family: var(--font-display);
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 600;
        color: var(--teal-dark);
        margin-bottom: 16px;
        line-height: 1.2;
    }

    .section-title.text-white {
        color: var(--white);
    }

    .programs-section .section-title {
        color: #e67e22;
    }

    .section-subtitle {
        font-family: var(--font-sans);
        font-size: 1.1rem;
        color: #555;
        max-width: 650px;
        margin: 0 auto 48px;
        line-height: 1.6;
    }

    /* Buttons */
    .btn--gold {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 14px 28px;
        background: linear-gradient(135deg, var(--gold-light), var(--gold));
        color: var(--teal-dark);
        border-radius: 100px;
        font-weight: 700;
        font-family: var(--font-sans);
        text-decoration: none;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .btn--gold:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(212, 168, 67, 0.3);
    }

    .btn--outline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 13px 28px;
        border: 2px solid var(--teal-base);
        color: var(--teal-base);
        background: transparent;
        border-radius: 100px;
        font-weight: 600;
        font-family: var(--font-sans);
        text-decoration: none;
        transition: all 0.3s;
    }

    .btn--outline:hover {
        background: var(--teal-base);
        color: white;
    }

    .btn--outline.text-white {
        border-color: rgba(255, 255, 255, 0.3);
        color: white;
    }

    .btn--outline.text-white:hover {
        border-color: white;
        background: rgba(255, 255, 255, 0.1);
    }

    .btn--whatsapp {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 14px 28px;
        background: #25d366;
        color: white;
        border-radius: 100px;
        font-weight: 600;
        font-family: var(--font-sans);
        text-decoration: none;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .btn--whatsapp:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3);
    }

    /* About Section */
    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .about-bullet {
        display: flex;
        gap: 16px;
        margin-bottom: 20px;
        align-items: flex-start;
    }

    .about-bullet .bullet-icon {
        width: 28px;
        height: 28px;
        background: var(--teal-glow);
        color: var(--teal-dark);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .about-bullet p {
        font-family: var(--font-sans);
        font-size: 1.05rem;
        color: #444;
        margin: 0;
        line-height: 1.5;
        font-weight: 500;
    }

    .about-image-wrapper {
        position: relative;
        border-radius: 16px;
    }

    .experience-badge {
        position: absolute;
        bottom: -24px;
        right: -24px;
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 12px;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .exp-number {
        font-family: var(--font-display);
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--teal-base);
        line-height: 1;
    }

    .exp-text {
        font-family: var(--font-sans);
        font-size: 0.9rem;
        font-weight: 600;
        color: #555;
        text-transform: uppercase;
        line-height: 1.2;
    }

    /* Programs Section */
    .programs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .program-card {
        background: white;
        padding: 40px 30px;
        border-radius: 16px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
    }

    .program-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        border-color: rgba(15, 110, 115, 0.1);
    }

    .program-icon {
        font-size: 48px;
        margin-bottom: 20px;
        line-height: 1;
    }

    .program-title {
        font-family: var(--font-display);
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--teal-dark);
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .program-desc {
        font-family: var(--font-sans);
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 24px;
        flex-grow: 1;
    }

    .program-meta {
        margin-bottom: 24px;
    }

    .pill {
        display: inline-block;
        padding: 6px 14px;
        background: var(--teal-glow);
        color: var(--teal-dark);
        border-radius: 100px;
        font-size: 0.85rem;
        font-weight: 600;
        font-family: var(--font-sans);
    }

    .program-link {
        font-family: var(--font-sans);
        font-weight: 600;
        color: var(--teal-base);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: color 0.2s;
    }

    .program-link:hover {
        color: var(--teal-dark);
    }

    /* Training Approach */
    .approach-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 40px;
        border-radius: 16px;
        backdrop-filter: blur(10px);
    }

    .approach-icon {
        font-size: 40px;
        margin-bottom: 20px;
        line-height: 1;
    }

    .approach-heading {
        font-family: var(--font-display);
        font-size: 1.5rem;
        color: var(--gold-light);
        margin-bottom: 20px;
        font-weight: 600;
    }

    .approach-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .approach-list li {
        font-family: var(--font-sans);
        color: var(--off-white);
        margin-bottom: 12px;
        padding-left: 24px;
        position: relative;
        line-height: 1.5;
        font-size: 1.05rem;
    }

    .approach-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        top: 0;
        color: var(--gold-light);
        font-weight: bold;
    }

    /* Why Manifesta */
    .why-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
    }

    .why-item {
        display: flex;
        gap: 20px;
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    }

    .why-icon {
        font-size: 40px;
        line-height: 1;
        flex-shrink: 0;
    }

    .why-heading {
        font-family: var(--font-display);
        font-size: 1.3rem;
        color: var(--teal-dark);
        margin-bottom: 8px;
        font-weight: 600;
    }

    .why-desc {
        font-family: var(--font-sans);
        color: #555;
        font-size: 0.95rem;
        line-height: 1.5;
        margin: 0;
    }

    /* Faculty */
    .faculty-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .faculty-card {
        background: white;
        padding: 40px 30px;
        border-radius: 16px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        text-align: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    }

    .faculty-image-wrapper {
        width: 100%;
        height: 220px;
        overflow: hidden;
        border-radius: 12px 12px 0 0;
        background-color: #f0f7f8;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .faculty-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease;
    }

    .faculty-image.fallback {
        display: none;
    }

    .faculty-image.fallback+.faculty-avatar-fallback {
        display: flex;
    }

    .faculty-card:hover .faculty-image {
        transform: scale(1.05);
    }

    /* If you want to keep the avatar as fallback */
    .faculty-image-wrapper.fallback-avatar {
        background: linear-gradient(135deg, #0f6e73 0%, #0f4b55 100%);
        color: white;
        font-size: 48px;
    }

    .faculty-name {
        font-family: var(--font-display);
        font-size: 1.4rem;
        color: var(--teal-dark);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .faculty-spec {
        font-family: var(--font-sans);
        font-size: 0.95rem;
        color: #555;
        margin-bottom: 16px;
        font-weight: 500;
    }

    .faculty-meta {
        margin-bottom: 16px;
    }

    .faculty-hosp {
        font-family: var(--font-sans);
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--teal-base);
        margin: 0;
    }

    /* Partners */
    .partners-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .partner-card {
        display: flex;
        align-items: center;
        gap: 12px;
        background: white;
        padding: 16px 28px;
        border-radius: 100px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    }

    .partner-icon {
        font-size: 24px;
        line-height: 1;
    }

    .partner-name {
        font-family: var(--font-sans);
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--teal-dark);
    }

    /* CTA Banner */
    .cta-banner {
        border-radius: 0;
        padding: 80px 20px;
    }

    .cta-title {
        font-family: var(--font-display);
        font-size: clamp(2.2rem, 4vw, 3.5rem);
        font-weight: 600;
        margin-bottom: 16px;
    }

    .cta-subtitle {
        font-family: var(--font-sans);
        font-size: 1.15rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 40px;
    }

    .cta-features {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 24px;
        margin-bottom: 48px;
    }

    .cta-features span {
        font-family: var(--font-sans);
        font-weight: 500;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.1);
        padding: 10px 20px;
        border-radius: 100px;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .cta-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 16px;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .about-grid {
            grid-template-columns: 1fr;
        }

        .about-media {
            order: -1;
            margin-bottom: 24px;
        }

        .experience-badge {
            right: 0px;
            bottom: -20px;
        }
    }

    @media (max-width: 600px) {
        .why-grid {
            grid-template-columns: 1fr;
        }

        .cta-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .cta-features span {
            width: 100%;
            justify-content: center;
        }
    }
</style>