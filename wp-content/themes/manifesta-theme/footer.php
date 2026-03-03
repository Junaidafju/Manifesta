<footer class="site-footer" id="site-footer" itemscope itemtype="https://schema.org/MedicalOrganization">

    <div class="footer-top">
        <div class="container">
            <div class="footer-grid">

                <!-- ── Brand Column with SEO-rich text ───────────────── -->
                <div class="footer-col footer-col--brand">
                    <?php
                    // MULTI-LOGO FALLBACK SYSTEM
                    $footer_logo = null;

                    // PRIORITY 1: Check if footer specific logo exists (ACF option)
                    if (function_exists('get_field')) {
                        $footer_logo = get_field('footer_logo_specific', 'option');
                    }

                    // PRIORITY 2: If no footer logo, fallback to main ACF logo
                    if (!$footer_logo && function_exists('get_field')) {
                        $footer_logo = get_field('footer_logo', 'option');
                    }

                    // PRIORITY 3: If still no logo, use customizer logo
                    if (!$footer_logo && has_custom_logo()) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
                        if ($logo_data) {
                            $footer_logo = array(
                                'url' => $logo_data[0],
                                'width' => $logo_data[1],
                                'height' => $logo_data[2],
                                'alt' => get_bloginfo('name')
                            );
                        }
                    }

                    // PRIORITY 4: Check theme mod for logo
                    if (!$footer_logo) {
                        $theme_logo = get_theme_mod('manifesta_footer_logo');
                        if ($theme_logo) {
                            $footer_logo = array(
                                'url' => $theme_logo,
                                'alt' => get_bloginfo('name')
                            );
                        }
                    }
                    ?>

                    <?php if ($footer_logo && !empty($footer_logo['url'])): ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo" itemprop="url">
                            <img src="<?php echo esc_url($footer_logo['url']); ?>"
                                alt="<?php echo esc_attr(get_bloginfo('name')); ?> - Premier Reproductive Medicine Training Academy"
                                class="footer-logo__img"
                                width="<?php echo isset($footer_logo['width']) ? esc_attr($footer_logo['width']) : '200'; ?>"
                                height="<?php echo isset($footer_logo['height']) ? esc_attr($footer_logo['height']) : 'auto'; ?>"
                                style="max-width: 200px; width: auto; height: auto; display: block; margin-bottom: 20px;"
                                itemprop="logo" loading="lazy">
                        </a>
                    <?php else: ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo-text"
                            style="display: block; font-family: 'Cormorant Garamond', serif; font-size: 28px; font-weight: 700; color: #f0c96a; text-decoration: none; margin-bottom: 20px; letter-spacing: 1px;">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php endif; ?>

                    <!-- SEO-RICH TEXT BELOW LOGO -->
                    <div class="footer-seo-text" itemprop="description">
                        <h3 class="footer-seo-title"><?php echo esc_html(get_bloginfo('name')); ?></h3>
                        <p class="footer-seo-description">
                            <strong>India's premier medical academy</strong> specializing in
                            <strong>Fellowship in Reproductive Medicine</strong>, <strong>IVF Training</strong>, and
                            <strong>Infertility Training for Doctors</strong>. We offer
                            <strong>ART Certification Courses</strong>, <strong>Clinical Embryology Diploma</strong>,
                            and <strong>Hands-on IVF Training</strong> for medical professionals.
                        </p>

                        <!-- Key SEO Keywords as badges -->
                        <div class="footer-keywords">
                            <span class="keyword-badge">Fellowship in Reproductive Medicine</span>
                            <span class="keyword-badge">IVF Training Academy India</span>
                            <span class="keyword-badge">Infertility Training for Doctors</span>
                            <span class="keyword-badge">ART Certification Course</span>
                            <span class="keyword-badge">Clinical Embryology Diploma</span>
                            <span class="keyword-badge">Hands-on IVF Training</span>
                            <span class="keyword-badge">Gynaecology Infertility Courses</span>
                        </div>
                    </div>

                    <!-- Accreditation / Trust Badges -->
                    <div class="footer-trust-badges">
                        <span class="trust-badge"><span class="check-icon">✓</span> PCPNDT Recognized</span>
                        <span class="trust-badge"><span class="check-icon">✓</span> ART Compliant</span>
                        <span class="trust-badge"><span class="check-icon">✓</span> ISO 9001:2024</span>
                        <span class="trust-badge"><span class="check-icon">✓</span> 500+ Doctors Trained</span>
                    </div>

                    <!-- Social Icons with Schema -->
                    <div class="social-links" aria-label="Social media links" itemprop="sameAs">
                        <a href="https://www.facebook.com/profile.php?id=100082342310230" target="_blank" rel="noopener"
                            aria-label="Facebook"><svg viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3V2z"
                                    fill="currentColor" />
                            </svg></a>
                        <!-- <a href="#" target="_blank" rel="noopener" aria-label="Twitter"><svg viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                                    fill="currentColor" />
                            </svg></a> -->
                        <a href="https://www.linkedin.com/company/manifesta-medical-academy/" target="_blank"
                            rel="noopener" aria-label="LinkedIn"><svg viewBox="0 0 24 24">
                                <path
                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2V9z"
                                    fill="currentColor" />
                                <circle cx="4" cy="4" r="2" fill="currentColor" />
                            </svg></a>
                        <a href="https://www.instagram.com/manifesta.96/" target="_blank" rel="noopener"
                            aria-label="Instagram"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                            </svg></a>
                        <!-- <a href="#" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24">
                                <path
                                    d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"
                                    fill="currentColor" />
                                <path d="M9.75 15.02l5.75-3.27-5.75-3.27v6.54z" fill="white" />
                            </svg></a> -->
                    </div>
                </div>

                <!-- ── Quick Links ───────────────────────── -->
                <div class="footer-col footer-col--links">
                    <h4 class="footer-col__title">Quick Links</h4>
                    <?php
                    if (has_nav_menu('footer')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class' => 'footer-menu',
                            'container' => false,
                            'depth' => 1,
                            'fallback_cb' => false,
                        ));
                    } else {
                        // Default links if no menu is set
                        echo '<ul class="footer-menu">';
                        echo '<li><a href="/about/">About Us</a></li>';
                        echo '<li><a href="/courses/">All Courses</a></li>';
                        echo '<li><a href="/faculty/">Our Faculty</a></li>';
                        echo '<li><a href="/admissions/">Admissions</a></li>';
                        echo '<li><a href="/blog/">Blog / Resources</a></li>';
                        echo '<li><a href="/contact-us/">Contact Us</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </div>

                <!-- ── Our Courses ───────────────────────── -->
                <div class="footer-col footer-col--courses">
                    <h4 class="footer-col__title">Our Courses</h4>
                    <ul class="footer-menu course-menu">
                        <li><a href="/fellowship-reproductive-medicine/"><span>Fellowship in Reproductive
                                    Medicine</span></a></li>
                        <li><a href="/diploma-clinical-embryology/"><span>PG Diploma in Clinical Embryology</span></a>
                        </li>
                        <li><a href="/certificate-iui-opu/"><span>Certificate Course in IUI & OPU</span></a></li>
                        <li><a href="/advanced-hysteroscopy/"><span>Advanced Course in Hysteroscopy</span></a></li>
                        <li><a href="/art-certification/"><span>ART Certification Course</span></a></li>
                        <li><a href="/hands-on-ivf/"><span>Hands-on IVF Training</span></a></li>
                    </ul>
                </div>

                <!-- ── Contact Information ──────────────────────────── -->
                <div class="footer-col footer-col--contact" itemscope itemtype="https://schema.org/ContactPoint">
                    <h4 class="footer-col__title">Contact Us</h4>

                    <address class="footer-address" itemprop="address" itemscope
                        itemtype="https://schema.org/PostalAddress">
                        <span class="contact-icon">📍</span>
                        <span itemprop="streetAddress"><a href="https://maps.app.goo.gl/8ghAnkuVYip7M3UK9">3rd Floor,
                                161-A/9, Kishangarh, Vasant Kunj, South Delhi,
                                110070.</a></span>
                        <!-- <span itemprop="addressLocality">Gurgaon</span>, <span itemprop="addressRegion">Haryana</span> -
                        <span itemprop="postalCode">122001</span> -->
                    </address>

                    <p class="footer-contact-item" itemprop="telephone">
                        <span class="contact-icon">📞</span>
                        <a href="tel:+919971177824">+91 99711 77824</a>
                    </p>

                    <p class="footer-contact-item" itemprop="email">
                        <span class="contact-icon">✉</span>
                        <a href="mailto:manifesta837@gmail.com">manifesta837@gmail.com
                        </a>
                    </p>

                    <p class="footer-contact-item">
                        <span class="contact-icon">🕒</span>
                        <span>Mon-Sat: 9:00 AM - 7:00 PM</span>
                    </p>

                    <a href="https://wa.me/919971177824?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20your%20courses."
                        target="_blank" rel="noopener noreferrer" class="btn-whatsapp">
                        <span class="whatsapp-icon">💬</span> WhatsApp Us
                    </a>
                </div>

            </div>
        </div>
    </div><!-- .footer-top -->

    <!-- ── Footer Bottom with Legal Links ───────────────── -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="footer-copyright">
                    © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.
                </div>

                <div class="footer-legal-links">
                    <a href="/privacy-policy/">Privacy Policy</a>
                    <span class="separator">|</span>
                    <a href="/terms-conditions/">Terms & Conditions</a>
                    <span class="separator">|</span>
                    <a href="/refund-policy/">Refund Policy</a>
                    <span class="separator">|</span>
                    <a href="/sitemap/">Sitemap</a>
                </div>
            </div>
        </div>
    </div><!-- .footer-bottom -->

</footer>

<!-- Back-to-top button -->
<button class="back-to-top" id="back-to-top" aria-label="Back to top" title="Back to top">
    <svg viewBox="0 0 24 24" width="24" height="24">
        <path d="M12 4l-8 8h5v8h6v-8h5l-8-8z" fill="currentColor" />
    </svg>
</button>

<!-- Full Optimized Footer CSS -->
<style>
    /* ======================================================
   GOOGLE FONTS
====================================================== */
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=DM+Sans:wght@300;400;500;600;700&display=swap');

    /* ======================================================
   FOOTER VARIABLES
====================================================== */
    .site-footer {
        --footer-bg-start: #0a2a3a;
        --footer-bg-end: #0f3d4a;
        --footer-gold: #d4a843;
        --footer-gold-light: #f0c96a;
        --footer-text: rgba(255, 255, 255, 0.85);
        --footer-text-muted: rgba(255, 255, 255, 0.6);
        --footer-border: rgba(255, 255, 255, 0.1);
        --whatsapp-green: #25d366;
        --whatsapp-dark: #128c7e;
    }

    /* ======================================================
   FOOTER MAIN STYLES
====================================================== */
    .site-footer {
        background: linear-gradient(135deg, var(--footer-bg-start) 0%, var(--footer-bg-end) 100%);
        color: var(--footer-text);
        font-family: 'DM Sans', sans-serif;
        position: relative;
        border-top: 3px solid var(--footer-gold);
        margin-top: 60px;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* ======================================================
   FOOTER TOP
====================================================== */
    .footer-top {
        padding: 60px 0 40px;
    }

    /* Footer Grid - Desktop */
    .footer-grid {
        display: grid;
        grid-template-columns: 2.2fr 1fr 1.2fr 1.5fr;
        gap: 40px;
    }

    /* ======================================================
   LOGO SECTION - FIXED FOR COLOR ISSUES
====================================================== */
    .footer-logo {
        display: inline-block;
        margin-bottom: 15px;
    }

    .footer-logo__img {
        max-width: 200px !important;
        width: auto !important;
        height: auto !important;
        display: block;

        /* CRITICAL: Force original colors */
        filter: none !important;
        -webkit-filter: none !important;
        filter: brightness(1) contrast(1) saturate(1) hue-rotate(0deg) !important;
        -webkit-filter: brightness(1) contrast(1) saturate(1) hue-rotate(0deg) !important;
        opacity: 1 !important;
        background: transparent !important;
        mix-blend-mode: normal !important;
        image-rendering: auto !important;

        /* Remove any potential white background from PNGs */
        background-color: transparent !important;
    }

    /* Ensure no parent elements affect the logo */
    .footer-col--brand * {
        filter: none !important;
        -webkit-filter: none !important;
    }

    /* If logo has white background, this can help */
    .footer-logo__img[src*=".png"] {
        background: transparent !important;
        mix-blend-mode: normal !important;
    }

    /* ======================================================
   SEO TEXT STYLES
====================================================== */
    .footer-seo-text {
        margin: 1px 0 15px;
    }

    .footer-seo-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--footer-gold-light);
        margin: 0 0 10px 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .footer-seo-description {
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 15px;
        color: var(--footer-text);
    }

    /* Keyword Badges */
    .footer-keywords {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
    }

    .keyword-badge {
        display: inline-block;
        padding: 4px 10px;
        background: rgba(212, 168, 67, 0.12);
        border: 1px solid rgba(212, 168, 67, 0.25);
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 500;
        color: var(--footer-gold-light);
        letter-spacing: 0.3px;
    }

    /* Trust Badges */
    .footer-trust-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 25px;
        padding: 15px 0;
        border-top: 1px solid var(--footer-border);
        border-bottom: 1px solid var(--footer-border);
    }

    .trust-badge {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        color: white;
    }

    .check-icon {
        color: var(--footer-gold);
        font-weight: bold;
    }

    /* ======================================================
   COLUMN TITLES
====================================================== */
    .footer-col__title {
        color: white;
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 10px;
        font-family: 'Cormorant Garamond', serif;
        letter-spacing: 0.5px;
    }

    .footer-col__title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 2px;
        background: var(--footer-gold);
    }

    /* ======================================================
   FOOTER MENUS
====================================================== */
    .footer-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-menu li {
        margin-bottom: 12px;
    }

    .footer-menu a {
        color: var(--footer-text);
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        display: inline-block;
        position: relative;
    }

    .footer-menu a:hover {
        color: var(--footer-gold);
        transform: translateX(5px);
    }

    /* ======================================================
   CONTACT SECTION
====================================================== */
    .footer-contact-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
        font-size: 0.95rem;
    }

    .contact-icon {
        width: 24px;
        font-size: 1.1rem;
        flex-shrink: 0;
        color: var(--footer-gold);
    }

    .footer-contact-item a {
        color: var(--footer-text);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-contact-item a:hover {
        color: var(--footer-gold);
    }

    .footer-address {
        display: flex;
        gap: 12px;
        margin-bottom: 15px;
        font-style: normal;
        font-size: 0.95rem;
        line-height: 1.5;
        color: var(--footer-text);
    }

    /* ======================================================
   WHATSAPP BUTTON
====================================================== */
    .btn-whatsapp {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--whatsapp-green);
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        margin-top: 15px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-whatsapp:hover {
        background: var(--whatsapp-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
    }

    .whatsapp-icon {
        font-size: 1.2rem;
    }

    /* ======================================================
   SOCIAL LINKS
====================================================== */
    .social-links {
        display: flex;
        gap: 12px;
        margin-top: 20px;
    }

    .social-links a {
        color: white;
        background: rgba(255, 255, 255, 0.1);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-links a:hover {
        background: var(--footer-gold);
        transform: translateY(-3px);
    }

    .social-links svg {
        width: 18px;
        height: 18px;
    }

    /* ======================================================
   FOOTER BOTTOM - ALL IN ONE LINE
====================================================== */
    .footer-bottom {
        background: rgba(0, 0, 0, 0.25);
        padding: 18px 0;
        border-top: 1px solid var(--footer-border);
    }

    .footer-bottom-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .footer-copyright {
        font-size: 0.9rem;
        color: var(--footer-text-muted);
        white-space: nowrap;
    }

    .footer-legal-links {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
    }

    .footer-legal-links a {
        color: var(--footer-text-muted);
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }

    .footer-legal-links a:hover {
        color: var(--footer-gold);
    }

    .separator {
        color: rgba(255, 255, 255, 0.2);
        font-size: 0.9rem;
    }

    /* ======================================================
   BACK TO TOP BUTTON
====================================================== */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: var(--footer-gold);
        color: var(--footer-bg-start);
        border: none;
        border-radius: 50%;
        font-size: 24px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 100;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .back-to-top.visible {
        opacity: 1;
        visibility: visible;
    }

    .back-to-top:hover {
        background: white;
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .back-to-top svg {
        width: 24px;
        height: 24px;
    }

    /* ======================================================
   RESPONSIVE DESIGN
====================================================== */

    /* Large Desktop */
    @media (min-width: 1280px) {
        .container {
            padding: 0 40px;
        }
    }

    /* Tablet Landscape (1024px and below) */
    @media (max-width: 1024px) {
        .footer-grid {
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 30px;
        }

        .footer-col--brand {
            grid-column: span 3;
            max-width: 100%;
        }
    }

    /* Tablet Portrait (768px and below) */
    @media (max-width: 768px) {
        .footer-top {
            padding: 40px 0 20px;
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 35px;
        }

        .footer-col--brand {
            grid-column: span 1;
        }

        .footer-col__title {
            margin-bottom: 18px;
        }

        .footer-bottom-content {
            flex-direction: column;
            text-align: center;
        }

        .footer-copyright {
            white-space: normal;
            margin-bottom: 8px;
        }

        .footer-legal-links {
            justify-content: center;
        }

        .footer-legal-links a {
            font-size: 0.85rem;
        }
    }

    /* Mobile (480px and below) */
    @media (max-width: 480px) {
        .footer-top {
            padding: 30px 0 15px;
        }

        .footer-logo {
            display: flex;
            justify-content: center;
        }

        .footer-logo__img {
            margin-left: auto;
            margin-right: auto;
        }

        .footer-seo-description {
            font-size: 0.9rem;
            text-align: center;
        }

        .footer-seo-title {
            text-align: center;
        }

        .footer-keywords {
            justify-content: center;
            gap: 6px;
        }

        .keyword-badge {
            font-size: 0.65rem;
            padding: 3px 8px;
        }

        .footer-trust-badges {
            justify-content: center;
            gap: 12px;
        }

        .trust-badge {
            font-size: 0.75rem;
        }

        .footer-col__title {
            text-align: center;
        }

        .footer-col__title::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .footer-menu {
            text-align: center;
        }

        .footer-menu a:hover {
            transform: translateX(0) scale(1.05);
        }

        .social-links {
            justify-content: center;
        }

        .footer-contact-item {
            justify-content: center;
            text-align: center;
        }

        .footer-address {
            text-align: center;
            justify-content: center;
        }

        .btn-whatsapp {
            width: 100%;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            max-width: 250px;
        }

        .footer-legal-links {
            flex-direction: column;
            gap: 8px;
        }

        .separator {
            display: none;
        }

        .footer-legal-links a {
            display: block;
            padding: 3px 0;
        }

        .back-to-top {
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
        }

        .back-to-top svg {
            width: 20px;
            height: 20px;
        }
    }

    /* Small Mobile (360px and below) */
    @media (max-width: 360px) {
        .keyword-badge {
            font-size: 0.6rem;
            padding: 2px 6px;
        }

        .trust-badge {
            font-size: 0.7rem;
        }

        .footer-legal-links a {
            font-size: 0.8rem;
        }
    }
</style>

<!-- JavaScript for Back to Top Button -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Back to top button
        const backToTop = document.getElementById('back-to-top');

        if (backToTop) {
            window.addEventListener('scroll', function () {
                if (window.scrollY > 300) {
                    backToTop.classList.add('visible');
                } else {
                    backToTop.classList.remove('visible');
                }
            });

            backToTop.addEventListener('click', function (e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // Add smooth scrolling to all footer links
        const footerLinks = document.querySelectorAll('.site-footer a[href^="/"]');
        footerLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                // Let the browser handle navigation normally
                // This is just to ensure smooth scrolling if it's an anchor link
                const href = this.getAttribute('href');
                if (href.startsWith('/#')) {
                    e.preventDefault();
                    const targetId = href.substring(2);
                    const target = document.getElementById(targetId);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });
        });
    });
</script>

<?php wp_footer(); ?>
</body>

</html>