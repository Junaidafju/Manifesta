<?php
/**
 * Template Name: About
 * Template Post Type: page
 *
 * @package Manifesta
 */

get_header();

// Helper for ACF fields
$mf = function ($key, $default = '') {
    if (function_exists('get_field')) {
        return get_field($key) ?: $default;
    }
    return $default;
};

// Site mods for CTAs
$hero_phone = get_theme_mod('manifesta_phone', '+91 99711 77824');
$mf_wa_number = preg_replace('/[^0-9]/', '', $hero_phone);
$mf_wa_url = 'https://wa.me/' . $mf_wa_number;
?>

<main id="about-page" class="site-main about-page">

    <!-- 1️⃣ HERO SECTION -->
    <section class="about-hero">
        <div class="container" data-aos="fade-up">
            <span class="about-hero__eyebrow">ABOUT MANIFESTA</span>
            <h1 class="about-hero__title">
                <?php echo esc_html($mf('about_hero_title', 'Where Passion Meets Profession')); ?>
            </h1>
            <p class="about-hero__text">
                At Manifesta Medical Academy, we believe that excellence in reproductive medicine comes from the perfect
                balance of knowledge, skill, ethics, and real clinical experience.
            </p>
        </div>
    </section>

    <!-- 2️⃣ WHO WE ARE (Split Layout) -->
    <section class="about-who section-padding">
        <div class="container">
            <div class="about-who__grid">
                <div class="about-who__content" data-aos="fade-right">
                    <h2 class="section-title">A Specialized Medical Academy for Reproductive Medicine</h2>
                    <p>We are a specialized medical academy dedicated to advanced training in Gynaecology, Infertility,
                        and Reproductive Medicine, designed exclusively for doctors who want to practice with confidence
                        in today’s rapidly evolving ART and IVF landscape.</p>
                </div>
                <div class="about-who__visual" data-aos="fade-left">
                    <div class="accent-card">
                        <div class="accent-card__inner">
                            <h3>Doctors-Only Positioning</h3>
                            <p>Our curriculum is tailored for qualified medical professionals, ensuring a high-level
                                peer environment and clinical depth.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3️⃣ PURPOSE & PHILOSOPHY (Statement Section) -->
    <section class="about-purpose section-padding">
        <div class="container text-center">
            <span class="about-purpose__eyebrow" data-aos="fade-up">OUR PURPOSE</span>
            <h2 class="about-purpose__statement" data-aos="fade-up" data-aos-delay="100">
                To bridge the gap between theory and real-world clinical practice in reproductive medicine.
            </h2>
            <div class="about-purpose__desc" data-aos="fade-up" data-aos-delay="200">
                <p>Modern infertility practice demands more than textbooks and lectures. It requires hands-on exposure,
                    real patient interaction, and strict adherence to ART guidelines.</p>
            </div>
        </div>
    </section>

    <!-- 4️⃣ WHAT WE DO (Icon Grid) -->
    <section class="about-do section-padding">
        <div class="container">
            <header class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title">What We Do</h2>
                <p class="section-subtitle">We offer structured fellowship, diploma, and certificate programs that
                    combine the following core elements.</p>
            </header>

            <div class="about-do__grid">
                <div class="do-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="do-card__icon">🧬</div>
                    <h3>Advanced theoretical training</h3>
                    <p>In-depth modules covering the latest protocols in ART and Infertility.</p>
                </div>
                <div class="do-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="do-card__icon">📺</div>
                    <h3>Live interactive classes</h3>
                    <p>Real-time learning with direct access to leading specialists and mentors.</p>
                </div>
                <div class="do-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="do-card__icon">🏥</div>
                    <h3>Hands-on clinical exposure</h3>
                    <p>Direct exposure to real clinical settings and ART laboratory environments.</p>
                </div>
                <div class="do-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="do-card__icon">💬</div>
                    <h3>Real patient case discussions</h3>
                    <p>Collaborative analysis of complex patient histories and treatment pathways.</p>
                </div>
                <div class="do-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="do-card__icon">📜</div>
                    <h3>ART-compliant education</h3>
                    <p>All programs strictly follow the Assisted Reproductive Technology Act guidelines.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5️⃣ TRAINING PHILOSOPHY (Timeline) -->
    <section class="about-philosophy section-padding">
        <div class="container">
            <header class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title">Our Training Philosophy</h2>
                <p class="section-subtitle">Learn. Observe. Practice. Lead.</p>
            </header>

            <div class="philosophy-timeline">
                <div class="timeline-step" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-num">1</div>
                    <h3>Learn</h3>
                    <p>Core concepts & protocols. Understand the science behind infertility management.</p>
                </div>
                <div class="timeline-step" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-num">2</div>
                    <h3>Observe</h3>
                    <p>Live cases & procedures. Witness expert clinicians in established ART settings.</p>
                </div>
                <div class="timeline-step" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-num">3</div>
                    <h3>Practice</h3>
                    <p>Hands-on supervised training. Perform procedures under the guidance of skilled mentors.</p>
                </div>
                <div class="timeline-step" data-aos="fade-up" data-aos-delay="400">
                    <div class="step-num">4</div>
                    <h3>Lead</h3>
                    <p>Independent clinical confidence. Step into infertility practice with real-world competence.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6️⃣ ETHICS & ART COMPLIANCE -->
    <section class="about-ethics section-padding bg-light">
        <div class="container">
            <div class="about-ethics__grid">
                <div class="about-ethics__content" data-aos="fade-right">
                    <h2 class="section-title">ART Rules & Ethical Commitment</h2>
                    <p>We strictly follow current ART rules, regulations, and best clinical practices. We believe that
                        ethical practice is the foundation of sustainable medical careers.</p>
                    <ul class="ethics-list">
                        <li>Ethical infertility treatment</li>
                        <li>Patient safety and transparency</li>
                        <li>Evidence-based protocols</li>
                        <li>Responsible use of ART technologies</li>
                    </ul>
                </div>
                <div class="about-ethics__box" data-aos="fade-left">
                    <div class="compliance-highlight">
                        <h3>Compliance-First</h3>
                        <p>Our curriculum is updated regularly to align with the latest Assisted Reproductive Technology
                            (Regulation) Act and Rules.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7️⃣ WHY MANIFESTA (USP Cards) -->
    <section class="about-why section-padding">
        <div class="container">
            <header class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title">Why Manifesta?</h2>
                <p class="section-subtitle">What sets us apart is our unwavering focus on real clinical readiness.</p>
            </header>

            <div class="usp-grid">
                <div class="usp-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="usp-card__icon">✔</div>
                    <p>Practice-oriented learning</p>
                </div>
                <div class="usp-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="usp-card__icon">✔</div>
                    <p>Real patient case exposure</p>
                </div>
                <div class="usp-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="usp-card__icon">✔</div>
                    <p>Advanced infertility protocols</p>
                </div>
                <div class="usp-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="usp-card__icon">✔</div>
                    <p>ART-compliant training programs</p>
                </div>
                <div class="usp-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="usp-card__icon">✔</div>
                    <p>Career-focused medical education</p>
                </div>
                <div class="usp-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="usp-card__icon">✔</div>
                    <p>Experienced faculty from leading IVF centers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8️⃣ FACULTY & CLINICAL EXPOSURE (Preview Only) -->
    <section class="about-faculty-preview section-padding bg-light">
        <div class="container">
            <header class="section-header" data-aos="fade-up">
                <h2 class="section-title">Our Faculty & Clinical Exposure</h2>
                <p>Our training is led by highly experienced fertility specialists, gynecologists, and embryologists,
                    each with years of hands-on expertise in IVF and reproductive medicine.</p>
            </header>

            <?php
            $faculty = manifesta_get_faculty(3);
            if ($faculty->have_posts()): ?>
                <div class="faculty-grid faculty-grid--about">
                    <?php while ($faculty->have_posts()):
                        $faculty->the_post(); ?>
                        <div class="faculty-card-simple" data-aos="fade-up">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="faculty-card-simple__image">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="faculty-card-simple__info">
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <p>
                                    <?php echo esc_html(get_field('faculty_designation')); ?>
                                </p>
                                <span>
                                    <?php echo esc_html(get_field('faculty_hospital')); ?>
                                </span>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>

            <div class="text-center" style="margin-top: 40px;">
                <a href="<?php echo esc_url(home_url('/faculty')); ?>" class="btn--about-ghost">View All Faculty →</a>
            </div>
        </div>
    </section>

    <!-- 9️⃣ VISION & MISSION (Modern Dual Cards) -->
    <section class="about-vision section-padding">
        <div class="container">
            <div class="vision-grid">
                <div class="vision-card" data-aos="fade-right">
                    <div class="vision-card__inner">
                        <span class="eyebrow">OUR VISION</span>
                        <h2>Future-Focused Excellence</h2>
                        <p>To become a trusted center of excellence in reproductive medicine education, shaping skilled,
                            ethical, and confident fertility specialists for the future.</p>
                    </div>
                </div>
                <div class="mission-card" data-aos="fade-left">
                    <div class="mission-card__inner">
                        <span class="eyebrow">OUR MISSION</span>
                        <h2>Empowering Skilled Physicians</h2>
                        <ul class="mission-list">
                            <li>To deliver high-quality, clinically relevant medical education</li>
                            <li>To uphold ethical and ART-compliant practice</li>
                            <li>To empower doctors with real-world skills</li>
                            <li>To contribute to better infertility care outcomes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 🔟 FINAL CTA (Soft, Professional) -->
    <section class="about-cta section-padding">
        <div class="container text-center" data-aos="fade-up">
            <h2 class="cta-title">Ready to Advance Your Medical Career?</h2>
            <p class="cta-subtitle">Whether you are beginning your journey in reproductive medicine or looking to
                upgrade your clinical expertise, Manifesta Medical Academy is here to guide you every step of the way.
            </p>
            <div class="cta-actions">
                <a href="<?php echo esc_url(home_url('/courses')); ?>" class="btn--about-primary">Explore Our
                    Courses</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn--about-outline">Apply Now</a>
            </div>
        </div>
    </section>

</main>

<style>
    /* ─── ABOUT PAGE STYLES ─────────────────────────── */
    .about-page {
        --text-dark: #2c3e50;
        --text-light: #5d6d7e;
        --medical-teal: #0f6e73;
        --medical-teal-dark: #0a4d51;
        --medical-blue-bg: #f4f9f9;
    }

    .text-center {
        text-align: center;
    }

    .section-padding {
        padding: 100px 0;
    }

    .bg-light {
        background-color: var(--medical-blue-bg);
    }

    /* Hero */
    .about-hero {
        background: linear-gradient(135deg, #0f4b55 0%, #0a3d42 100%);
        padding: 160px 0 120px;
        color: #fff;
        text-align: center;
    }

    .about-hero__eyebrow {
        font-size: 14px;
        letter-spacing: 0.15em;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.7);
        display: block;
        margin-bottom: 20px;
    }

    .about-hero__title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        margin-bottom: 30px;
    }

    .about-hero__text {
        max-width: 720px;
        margin: 0 auto;
        font-size: 1.15rem;
        line-height: 1.7;
        opacity: 0.9;
    }

    /* Common Section */
    .section-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2rem, 3.5vw, 2.8rem);
        color: #0f4b55;
        margin-bottom: 24px;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: var(--text-light);
        max-width: 650px;
        margin: 0 auto 50px;
    }

    /* Who We Are */
    .about-who__grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 60px;
        align-items: center;
    }

    .accent-card {
        background: #e9f5f6;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(15, 110, 115, 0.05);
    }

    .accent-card h3 {
        font-size: 1.3rem;
        margin-bottom: 12px;
        color: var(--medical-teal);
    }

    .accent-card p {
        margin: 0;
        color: #555;
        font-size: 0.95rem;
    }

    /* Purpose */
    .about-purpose {
        background: #fdfdfd;
    }

    .about-purpose__eyebrow {
        font-size: 13px;
        letter-spacing: 0.1em;
        color: var(--medical-teal);
        font-weight: 700;
        display: block;
        margin-bottom: 25px;
    }

    .about-purpose__statement {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(1.8rem, 3.5vw, 2.5rem);
        max-width: 900px;
        margin: 0 auto 30px;
        color: #333;
        font-style: italic;
        line-height: 1.4;
    }

    .about-purpose__desc {
        max-width: 680px;
        margin: 0 auto;
        color: #666;
        font-size: 1.05rem;
    }

    /* What We Do Cards */
    .about-do__grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .do-card {
        background: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        transition: transform 0.3s, box-shadow 0.3s;
        border: 1px solid #f0f0f0;
    }

    .do-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        border-color: var(--medical-teal);
    }

    .do-card__icon {
        font-size: 40px;
        margin-bottom: 25px;
    }

    .do-card h3 {
        font-size: 1.15rem;
        margin-bottom: 15px;
        color: #0f4b55;
    }

    .do-card p {
        font-size: 0.95rem;
        color: #777;
        margin: 0;
    }

    /* Timeline */
    .philosophy-timeline {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 60px;
        position: relative;
    }

    /* Desktop line */
    .philosophy-timeline::before {
        content: '';
        position: absolute;
        top: 25px;
        left: 0;
        width: 100%;
        height: 2px;
        background: #e0e0e0;
        z-index: 1;
    }

    .timeline-step {
        flex: 1;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .step-num {
        width: 50px;
        height: 50px;
        background: #fff;
        border: 2px solid var(--medical-teal);
        color: var(--medical-teal);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        margin: 0 auto 20px;
        font-size: 1.1rem;
    }

    .timeline-step h3 {
        font-size: 1.25rem;
        margin-bottom: 12px;
    }

    .timeline-step p {
        font-size: 0.9rem;
        color: #777;
    }

    /* Ethics */
    .about-ethics__grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }

    .ethics-list {
        list-style: none;
        padding: 0;
        margin-top: 30px;
    }

    .ethics-list li {
        padding-left: 28px;
        position: relative;
        margin-bottom: 15px;
        font-weight: 500;
        color: #444;
    }

    .ethics-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--medical-teal);
        font-weight: 900;
    }

    .compliance-highlight {
        border-left: 4px solid var(--medical-teal);
        padding: 30px 40px;
        background: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
    }

    .compliance-highlight h3 {
        font-size: 1.4rem;
        margin-bottom: 10px;
        color: var(--medical-teal-dark);
    }

    .compliance-highlight p {
        margin: 0;
        color: #666;
        font-size: 0.95rem;
    }

    /* USP Grid */
    .usp-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .usp-card {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 25px;
        border: 1px solid #eee;
        border-radius: 10px;
    }

    .usp-card__icon {
        color: var(--medical-teal);
        font-weight: bold;
        font-size: 1.2rem;
    }

    .usp-card p {
        margin: 0;
        font-weight: 600;
        color: #333;
    }

    /* Faculty Cards */
    .faculty-grid--about {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 50px;
    }

    .faculty-card-simple {
        display: flex;
        gap: 20px;
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        align-items: center;
    }

    .faculty-card-simple__image img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
    }

    .faculty-card-simple__info h3 {
        font-size: 1.15rem;
        margin-bottom: 5px;
    }

    .faculty-card-simple__info p {
        font-size: 0.85rem;
        color: var(--medical-teal);
        margin-bottom: 3px;
        font-weight: 600;
    }

    .faculty-card-simple__info span {
        font-size: 0.75rem;
        color: #888;
    }

    /* Buttons */
    .btn--about-ghost {
        display: inline-block;
        padding: 12px 30px;
        border: 1.5px solid var(--medical-teal);
        color: var(--medical-teal);
        text-decoration: none;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn--about-ghost:hover {
        background: var(--medical-teal);
        color: #fff;
    }

    .btn--about-primary {
        display: inline-block;
        padding: 15px 35px;
        background: var(--medical-teal);
        color: #fff;
        text-decoration: none;
        border-radius: 30px;
        font-weight: 600;
        margin-right: 15px;
    }

    .btn--about-outline {
        display: inline-block;
        padding: 15px 35px;
        border: 1.5px solid var(--medical-teal);
        color: var(--medical-teal);
        text-decoration: none;
        border-radius: 30px;
        font-weight: 600;
    }

    /* Vision/Mission */
    .vision-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }

    .vision-card,
    .mission-card {
        background: #fff;
        padding: 60px;
        border-radius: 16px;
        border: 1px solid #eee;
    }

    .vision-card {
        border-bottom: 6px solid var(--medical-teal);
    }

    .mission-card {
        border-bottom: 6px solid #d4a843;
    }

    /* Gold accent */
    .eyebrow {
        font-size: 13px;
        font-weight: 700;
        color: #999;
        display: block;
        margin-bottom: 20px;
        letter-spacing: 0.1em;
    }

    .mission-list {
        list-style: none;
        padding: 0;
        margin-top: 25px;
    }

    .mission-list li {
        padding-left: 20px;
        position: relative;
        margin-bottom: 12px;
        font-size: 0.95rem;
        color: #555;
    }

    .mission-list li::before {
        content: '•';
        position: absolute;
        left: 0;
        color: #d4a843;
        font-weight: 900;
    }

    /* CTA */
    .about-cta {
        background: #fdfdfd;
        border-top: 1px solid #f0f0f0;
    }

    .cta-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2rem, 3vw, 2.5rem);
        margin-bottom: 20px;
    }

    .cta-subtitle {
        color: #888;
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Responsive Adjustments */
    @media (max-width: 991px) {
        .philosophy-timeline {
            flex-wrap: wrap;
        }

        .philosophy-timeline::before {
            display: none;
        }

        .timeline-step {
            flex: 1 1 45%;
        }
    }

    @media (max-width: 768px) {

        .about-who__grid,
        .about-ethics__grid,
        .vision-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .timeline-step {
            flex: 1 1 100%;
        }
    }
</style>

<?php get_footer(); ?>