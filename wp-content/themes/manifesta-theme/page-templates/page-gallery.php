<?php
/**
 * Template Name: Gallery Page
 * Description: Modern medical academy gallery with filters and lightbox
 *
 * @package Manifesta
 */

get_header(); ?>

<!-- ======================================================
     GALLERY HERO SECTION - OPTIMIZED ALIGNMENT
====================================================== -->
<section class="gallery-hero">
    <div class="container">
        <div class="gallery-hero-content">
            <?php
            $hero_title = get_field('gallery_hero_title') ?: 'Clinical Training & Learning Environment';
            $hero_subtitle = get_field('gallery_hero_subtitle') ?: 'A glimpse into our hands-on training, live sessions, and real clinical exposure.';
            ?>
            <h1 class="gallery-hero-title">
                <?php echo esc_html($hero_title); ?>
            </h1>
            <p class="gallery-hero-subtitle">
                <?php echo esc_html($hero_subtitle); ?>
            </p>
        </div>
    </div>
</section>

<!-- ======================================================
     FILTERED GALLERY SECTION
====================================================== -->
<section class="gallery-section">
    <div class="container">
        <!-- Category Filters -->
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="*">All</button>
            <button class="filter-btn" data-filter="hands-on">Hands-On Training</button>
            <button class="filter-btn" data-filter="live-classes">Live Classes & Workshops</button>
            <button class="filter-btn" data-filter="procedures">Clinical Procedures</button>
            <button class="filter-btn" data-filter="faculty">Faculty & Mentorship</button>
            <button class="filter-btn" data-filter="facilities">Training Centers & Facilities</button>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-grid" id="gallery-grid">
            <?php
            // Query gallery images from ACF or custom post type
            if (have_rows('gallery_images')):
                while (have_rows('gallery_images')):
                    the_row();
                    $image = get_sub_field('image');
                    $category = get_sub_field('category');
                    $caption = get_sub_field('caption');
                    $location = get_sub_field('location');
                    $category_class = '';

                    // Map category to filter class
                    switch ($category) {
                        case 'Hands-On Training':
                            $category_class = 'hands-on';
                            break;
                        case 'Live Classes & Workshops':
                            $category_class = 'live-classes';
                            break;
                        case 'Clinical Procedures':
                            $category_class = 'procedures';
                            break;
                        case 'Faculty & Mentorship':
                            $category_class = 'faculty';
                            break;
                        case 'Training Centers & Facilities':
                            $category_class = 'facilities';
                            break;
                    }
                    ?>
                    <div class="gallery-item <?php echo esc_attr($category_class); ?>"
                        data-category="<?php echo esc_attr($category_class); ?>">
                        <div class="gallery-item-inner">
                            <img src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr($image['alt'] ?: $caption); ?>" class="gallery-image" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="overlay-content">
                                    <span class="gallery-category">
                                        <?php echo esc_html($category); ?>
                                    </span>
                                    <h3 class="gallery-caption">
                                        <?php echo esc_html($caption); ?>
                                    </h3>
                                    <?php if ($location): ?>
                                        <span class="gallery-location">
                                            <svg class="location-icon" viewBox="0 0 24 24" width="14" height="14">
                                                <path
                                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"
                                                    fill="currentColor" />
                                            </svg>
                                            <?php echo esc_html($location); ?>
                                        </span>
                                    <?php endif; ?>
                                    <button class="view-btn" data-image="<?php echo esc_url($image['url']); ?>"
                                        data-caption="<?php echo esc_attr($caption); ?>"
                                        data-category="<?php echo esc_attr($category); ?>" aria-label="View larger image">
                                        <svg viewBox="0 0 24 24" width="20" height="20">
                                            <path d="M15 3h6v6M14 10l7-7M3 15h6v6M3 9V3h6M9 21H3v-6M21 15v6h-6"
                                                stroke="currentColor" stroke-width="2" fill="none" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            else:
                // Default gallery items if no ACF data
                $default_images = array(
                    array(
                        'url' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&h=600&fit=crop',
                        'category' => 'hands-on',
                        'cat_name' => 'Hands-On Training',
                        'caption' => 'Hands-on IVF Training',
                        'location' => 'World IVF Centre'
                    ),
                    array(
                        'url' => 'https://images.unsplash.com/photo-1581093458791-9d15482442b2?w=800&h=600&fit=crop',
                        'category' => 'live-classes',
                        'cat_name' => 'Live Classes & Workshops',
                        'caption' => 'Live Surgical Demonstration',
                        'location' => 'Neelkanth Hospital'
                    ),
                    array(
                        'url' => 'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&h=600&fit=crop',
                        'category' => 'procedures',
                        'cat_name' => 'Clinical Procedures',
                        'caption' => 'Clinical Case Discussion',
                        'location' => 'Training Center'
                    ),
                    array(
                        'url' => 'https://images.unsplash.com/photo-1581093450021-4a7360e9a6b5?w=800&h=600&fit=crop',
                        'category' => 'faculty',
                        'cat_name' => 'Faculty & Mentorship',
                        'caption' => 'Expert Faculty Supervision',
                        'location' => 'World IVF Centre'
                    ),
                    array(
                        'url' => 'https://images.unsplash.com/photo-1581093588391-6b7a3e3b9c6d?w=800&h=600&fit=crop',
                        'category' => 'facilities',
                        'cat_name' => 'Training Centers & Facilities',
                        'caption' => 'Advanced IVF Laboratory',
                        'location' => 'Main Campus'
                    ),
                    array(
                        'url' => 'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=800&h=600&fit=crop',
                        'category' => 'hands-on',
                        'cat_name' => 'Hands-On Training',
                        'caption' => 'Embryology Hands-on Session',
                        'location' => 'IVF Lab'
                    ),
                );

                foreach ($default_images as $item):
                    ?>
                    <div class="gallery-item <?php echo esc_attr($item['category']); ?>"
                        data-category="<?php echo esc_attr($item['category']); ?>">
                        <div class="gallery-item-inner">
                            <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['caption']); ?>"
                                class="gallery-image" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="overlay-content">
                                    <span class="gallery-category">
                                        <?php echo esc_html($item['cat_name']); ?>
                                    </span>
                                    <h3 class="gallery-caption">
                                        <?php echo esc_html($item['caption']); ?>
                                    </h3>
                                    <?php if ($item['location']): ?>
                                        <span class="gallery-location">
                                            <svg class="location-icon" viewBox="0 0 24 24" width="14" height="14">
                                                <path
                                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"
                                                    fill="currentColor" />
                                            </svg>
                                            <?php echo esc_html($item['location']); ?>
                                        </span>
                                    <?php endif; ?>
                                    <button class="view-btn" data-image="<?php echo esc_url($item['url']); ?>"
                                        data-caption="<?php echo esc_attr($item['caption']); ?>"
                                        data-category="<?php echo esc_attr($item['cat_name']); ?>"
                                        aria-label="View larger image">
                                        <svg viewBox="0 0 24 24" width="20" height="20">
                                            <path d="M15 3h6v6M14 10l7-7M3 15h6v6M3 9V3h6M9 21H3v-6M21 15v6h-6"
                                                stroke="currentColor" stroke-width="2" fill="none" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- ======================================================
     CONTEXT SECTION
====================================================== -->
<section class="gallery-context">
    <div class="container">
        <div class="context-box">
            <h2 class="context-title">Real Training. Real Clinical Exposure.</h2>
            <p class="context-text">Our gallery reflects our commitment to practical, ethical, and ART-compliant medical
                education. Every image represents supervised learning, real patient interaction (with privacy
                maintained), and professional clinical training. We believe in transparency and letting our work speak
                for itself.</p>

            <!-- Key Stats -->
            <div class="context-stats">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Doctors Trained</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Live Workshops</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Clinical Hours</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================================================
     FINAL CTA SECTION
====================================================== -->
<section class="gallery-cta">
    <div class="container">
        <div class="cta-box">
            <h2 class="cta-title">Want to experience this level of training?</h2>
            <div class="cta-buttons">
                <a href="/courses/" class="btn btn-primary">
                    <span class="btn-icon">📚</span>
                    Explore Courses
                </a>
                <a href="https://wa.me/919971177824?text=Hello%2C%20I%20saw%20your%20gallery%20and%20want%20to%20enquire%20about%20courses."
                    target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
                    <span class="btn-icon">💬</span>
                    Enquire on WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div class="gallery-lightbox" id="galleryLightbox" role="dialog" aria-modal="true" aria-label="Image lightbox">
    <button class="lightbox-close" aria-label="Close lightbox">&times;</button>
    <button class="lightbox-nav prev" aria-label="Previous image">‹</button>
    <button class="lightbox-nav next" aria-label="Next image">›</button>
    <div class="lightbox-content">
        <img src="" alt="" class="lightbox-image">
        <div class="lightbox-caption"></div>
        <div class="lightbox-category"></div>
    </div>
</div>

<!-- Optimized Gallery Styles -->
<style>
    /* ======================================================
   GOOGLE FONTS
====================================================== */
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=DM+Sans:wght@300;400;500;600;700&display=swap');

    /* ======================================================
   GALLERY HERO SECTION - OPTIMIZED ALIGNMENT
====================================================== */
    .gallery-hero {
        background: linear-gradient(135deg, #0a2a3a 0%, #0f3d4a 100%);
        min-height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        padding: 80px 0;
    }

    .gallery-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.1"><path d="M0 0 L100 100 M100 0 L0 100" stroke="white" stroke-width="1"/></svg>');
        background-size: 50px 50px;
    }

    .gallery-hero .container {
        width: 100%;
        position: relative;
        z-index: 2;
    }

    .gallery-hero-content {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        padding: 0 20px;
    }

    .gallery-hero-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        color: white;
        margin-bottom: 25px;
        line-height: 1.2;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        letter-spacing: -0.02em;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .gallery-hero-subtitle {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.7;
        font-weight: 400;
        padding: 0 20px 20px;
        position: relative;
        display: inline-block;
    }

    /* Decorative elements */
    .gallery-hero-subtitle::before {
        content: '';
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 2px;
        background: linear-gradient(90deg, transparent, #d4a843, #d4a843, #d4a843, transparent);
    }

    .gallery-hero-subtitle::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 2px;
        background: linear-gradient(90deg, transparent, #d4a843, #d4a843, #d4a843, transparent);
    }

    /* ======================================================
   GALLERY FILTERS
====================================================== */
    .gallery-section {
        padding: 70px 0;
        background: #f8fafc;
    }

    .gallery-filters {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 50px;
        padding: 0 20px;
    }

    .filter-btn {
        padding: 12px 28px;
        border: 2px solid transparent;
        border-radius: 50px;
        background: white;
        color: #0a2a3a;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        letter-spacing: 0.3px;
    }

    .filter-btn:hover {
        border-color: #d4a843;
        color: #d4a843;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(212, 168, 67, 0.2);
    }

    .filter-btn.active {
        background: #d4a843;
        color: white;
        border-color: #d4a843;
        box-shadow: 0 8px 20px rgba(212, 168, 67, 0.3);
    }

    /* ======================================================
   GALLERY GRID
====================================================== */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .gallery-item {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        aspect-ratio: 4/3;
        cursor: pointer;
        animation: fadeInScale 0.5s ease forwards;
    }

    .gallery-item:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px rgba(10, 42, 58, 0.25);
    }

    .gallery-item-inner {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .gallery-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .gallery-item:hover .gallery-image {
        transform: scale(1.1);
    }

    /* Gallery Overlay */
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top,
                rgba(10, 42, 58, 0.98) 0%,
                rgba(10, 42, 58, 0.6) 60%,
                transparent 100%);
        display: flex;
        align-items: flex-end;
        padding: 30px;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }

    .overlay-content {
        color: white;
        transform: translateY(30px);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
    }

    .gallery-item:hover .overlay-content {
        transform: translateY(0);
    }

    .gallery-category {
        display: inline-block;
        padding: 6px 16px;
        background: #d4a843;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .gallery-caption {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 8px;
        font-family: 'Cormorant Garamond', serif;
        line-height: 1.3;
    }

    .gallery-location {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 15px;
    }

    .location-icon {
        color: #d4a843;
    }

    .view-btn {
        background: rgba(255, 255, 255, 0.15);
        border: 2px solid white;
        color: white;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(5px);
        margin-top: 5px;
    }

    .view-btn:hover {
        background: white;
        color: #0a2a3a;
        transform: scale(1.1) rotate(90deg);
    }

    /* ======================================================
   CONTEXT SECTION
====================================================== */
    .gallery-context {
        padding: 70px 0;
        background: white;
    }

    .context-box {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        padding: 0 20px;
    }

    .context-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #0a2a3a;
        margin-bottom: 25px;
        line-height: 1.2;
    }

    .context-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #33475b;
        margin-bottom: 50px;
    }

    .context-stats {
        display: flex;
        justify-content: center;
        gap: 80px;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
        position: relative;
    }

    .stat-item:not(:last-child)::after {
        content: '';
        position: absolute;
        right: -40px;
        top: 50%;
        transform: translateY(-50%);
        width: 2px;
        height: 40px;
        background: linear-gradient(to bottom, transparent, #d4a843, transparent);
    }

    .stat-number {
        display: block;
        font-size: 2.8rem;
        font-weight: 700;
        color: #d4a843;
        font-family: 'Cormorant Garamond', serif;
        line-height: 1.2;
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 1rem;
        color: #6b7a8a;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 500;
    }

    /* ======================================================
   CTA SECTION
====================================================== */
    .gallery-cta {
        padding: 70px 0;
        background: linear-gradient(135deg, #0a2a3a 0%, #0f3d4a 100%);
        position: relative;
        overflow: hidden;
    }

    .gallery-cta::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.05"><path d="M0 0 L100 100 M100 0 L0 100" stroke="white" stroke-width="1"/></svg>');
        background-size: 50px 50px;
    }

    .cta-box {
        text-align: center;
        max-width: 700px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    .cta-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 35px;
        line-height: 1.3;
    }

    .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 16px 36px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 1.1rem;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: #d4a843;
        color: #0a2a3a;
        box-shadow: 0 10px 25px rgba(212, 168, 67, 0.3);
    }

    .btn-primary:hover {
        background: #f0c96a;
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(212, 168, 67, 0.4);
    }

    .btn-whatsapp {
        background: #25d366;
        color: white;
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
    }

    .btn-whatsapp:hover {
        background: #128c7e;
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(37, 211, 102, 0.4);
    }

    .btn-icon {
        font-size: 1.3rem;
    }

    /* ======================================================
   LIGHTBOX
====================================================== */
    .gallery-lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.98);
        z-index: 9999;
        display: none;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(5px);
    }

    .gallery-lightbox.active {
        display: flex;
    }

    .lightbox-content {
        max-width: 90vw;
        max-height: 85vh;
        position: relative;
        animation: lightboxFadeIn 0.3s ease;
    }

    @keyframes lightboxFadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .lightbox-image {
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
        border-radius: 12px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .lightbox-caption {
        position: absolute;
        bottom: -50px;
        left: 0;
        right: 0;
        color: white;
        font-size: 1.1rem;
        text-align: center;
        font-weight: 500;
    }

    .lightbox-category {
        position: absolute;
        top: -40px;
        left: 50%;
        transform: translateX(-50%);
        background: #d4a843;
        color: #0a2a3a;
        padding: 8px 22px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(212, 168, 67, 0.3);
    }

    .lightbox-close {
        position: absolute;
        top: 30px;
        right: 30px;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        font-size: 30px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 10000;
    }

    .lightbox-close:hover {
        background: white;
        color: #0a2a3a;
        border-color: white;
        transform: rotate(90deg);
    }

    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        font-size: 40px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 10000;
    }

    .lightbox-nav:hover {
        background: #d4a843;
        color: #0a2a3a;
        border-color: #d4a843;
        transform: translateY(-50%) scale(1.1);
    }

    .lightbox-nav.prev {
        left: 30px;
    }

    .lightbox-nav.next {
        right: 30px;
    }

    /* ======================================================
   ANIMATIONS
====================================================== */
    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ======================================================
   RESPONSIVE DESIGN
====================================================== */
    @media (max-width: 1200px) {
        .gallery-grid {
            gap: 25px;
        }

        .context-stats {
            gap: 60px;
        }

        .stat-item:not(:last-child)::after {
            right: -30px;
        }
    }

    @media (max-width: 1024px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .lightbox-nav {
            width: 50px;
            height: 50px;
            font-size: 30px;
        }
    }

    @media (max-width: 768px) {
        .gallery-hero {
            min-height: 40vh;
            padding: 60px 0;
        }

        .gallery-hero-title {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        .gallery-hero-subtitle {
            font-size: 1.1rem;
            line-height: 1.6;
            padding: 0 15px 15px;
        }

        .gallery-hero-subtitle::before,
        .gallery-hero-subtitle::after {
            width: 60px;
        }

        .gallery-filters {
            gap: 10px;
            margin-bottom: 40px;
        }

        .filter-btn {
            padding: 10px 20px;
            font-size: 0.85rem;
        }

        .gallery-grid {
            gap: 20px;
        }

        .gallery-caption {
            font-size: 1.1rem;
        }

        .context-title {
            font-size: 2rem;
        }

        .context-text {
            font-size: 1rem;
            padding: 0 15px;
        }

        .context-stats {
            gap: 30px;
            flex-direction: column;
            align-items: center;
        }

        .stat-item:not(:last-child)::after {
            display: none;
        }

        .stat-number {
            font-size: 2.2rem;
        }

        .cta-title {
            font-size: 2rem;
        }

        .lightbox-nav {
            width: 45px;
            height: 45px;
            font-size: 28px;
        }

        .lightbox-nav.prev {
            left: 15px;
        }

        .lightbox-nav.next {
            right: 15px;
        }

        .lightbox-close {
            top: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            font-size: 26px;
        }
    }

    @media (max-width: 480px) {
        .gallery-hero {
            padding: 50px 0;
        }

        .gallery-hero-title {
            font-size: 1.8rem;
        }

        .gallery-hero-subtitle {
            font-size: 1rem;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
            max-width: 400px;
            margin: 0 auto;
        }

        .gallery-filters {
            flex-direction: column;
            align-items: stretch;
            gap: 8px;
        }

        .filter-btn {
            text-align: center;
            padding: 12px;
        }

        .gallery-overlay {
            padding: 20px;
        }

        .gallery-caption {
            font-size: 1rem;
        }

        .gallery-location {
            font-size: 0.85rem;
        }

        .context-stats {
            gap: 25px;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        .lightbox-nav {
            display: none;
        }

        .lightbox-caption {
            font-size: 0.9rem;
            bottom: -40px;
        }

        .lightbox-category {
            font-size: 0.8rem;
            padding: 6px 16px;
        }
    }
</style>

<!-- Optimized Gallery JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ======================================================
        // FILTER FUNCTIONALITY
        // ======================================================
        const filterBtns = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                // Update active button
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Filter items
                const filterValue = this.dataset.filter;

                galleryItems.forEach((item, index) => {
                    if (filterValue === '*' || item.classList.contains(filterValue)) {
                        item.style.display = 'block';
                        // Add animation with delay
                        item.style.animation = 'none';
                        setTimeout(() => {
                            item.style.animation = 'fadeInScale 0.5s ease forwards';
                        }, index * 50);
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });

        // ======================================================
        // LIGHTBOX FUNCTIONALITY
        // ======================================================
        const lightbox = document.getElementById('galleryLightbox');
        const lightboxImg = lightbox.querySelector('.lightbox-image');
        const lightboxCaption = lightbox.querySelector('.lightbox-caption');
        const lightboxCategory = lightbox.querySelector('.lightbox-category');
        const closeBtn = lightbox.querySelector('.lightbox-close');
        const prevBtn = lightbox.querySelector('.prev');
        const nextBtn = lightbox.querySelector('.next');
        const viewBtns = document.querySelectorAll('.view-btn');

        let currentIndex = 0;
        let galleryImages = [];

        // Collect all gallery items for navigation
        viewBtns.forEach((btn, index) => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const imgSrc = this.dataset.image;
                const caption = this.dataset.caption;
                const category = this.dataset.category;

                // Store all images for navigation
                galleryImages = Array.from(viewBtns).map(b => ({
                    src: b.dataset.image,
                    caption: b.dataset.caption,
                    category: b.dataset.category
                }));

                currentIndex = index;
                openLightbox(imgSrc, caption, category);
            });
        });

        function openLightbox(src, caption, category) {
            lightboxImg.src = src;
            lightboxCaption.textContent = caption;
            lightboxCategory.textContent = category;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }

        function navigateLightbox(direction) {
            currentIndex += direction;

            if (currentIndex < 0) {
                currentIndex = galleryImages.length - 1;
            } else if (currentIndex >= galleryImages.length) {
                currentIndex = 0;
            }

            const item = galleryImages[currentIndex];
            lightboxImg.src = item.src;
            lightboxCaption.textContent = item.caption;
            lightboxCategory.textContent = item.category;
        }

        // Event listeners
        closeBtn.addEventListener('click', closeLightbox);
        prevBtn.addEventListener('click', () => navigateLightbox(-1));
        nextBtn.addEventListener('click', () => navigateLightbox(1));

        // Keyboard navigation
        document.addEventListener('keydown', function (e) {
            if (!lightbox.classList.contains('active')) return;

            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                navigateLightbox(-1);
            } else if (e.key === 'ArrowRight') {
                navigateLightbox(1);
            }
        });

        // Close on background click
        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        // ======================================================
        // SMOOTH SCROLL FOR ANCHOR LINKS
        // ======================================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // ======================================================
        // LAZY LOADING FALLBACK
        // ======================================================
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[loading="lazy"]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // ======================================================
        // TOUCH SWIPE FOR MOBILE LIGHTBOX
        // ======================================================
        let touchStartX = 0;
        let touchEndX = 0;

        lightbox.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        lightbox.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Swipe left - next image
                    navigateLightbox(1);
                } else {
                    // Swipe right - previous image
                    navigateLightbox(-1);
                }
            }
        }
    });
</script>

<?php get_footer(); ?>