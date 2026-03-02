<?php
/**
 * Template Name: Premium Contact Page
 * Description: Premium contact page with trust marquee, form, testimonials, and conversion-focused design
 *
 * @package Manifesta
 */

get_header();
?>

<!-- ======================================================
     PAGE HERO SECTION
====================================================== -->
<section class="contact-hero">
    <div class="container">
        <div class="contact-hero-content">
            <h1 class="contact-hero-title"><?php the_title(); ?></h1>
            <p class="contact-hero-subtitle">Let's Connect & Guide Your Medical Career</p>
        </div>
    </div>
</section>

<!-- ======================================================
     SECTION 1: TRUST MARQUEE - HOSPITAL & TRAINING PARTNERS
====================================================== -->
<section class="trust-marquee-section">
    <div class="container">
        <h2 class="trust-marquee-heading">Trusted Clinical Training Partners</h2>
    </div>

    <div class="marquee-wrapper">
        <div class="marquee-track" id="marqueeTrack">
            <!-- Logo set 1 -->
            <div class="marquee-item">
                <img src="<?php echo esc_url(MANIFESTA_URI); ?>/assets/images/world-ivf-centre.webp"
                    alt="World IVF Centre" class="partner-logo" loading="lazy">
            </div>
            <div class="marquee-item">
                <img src="<?php echo esc_url(MANIFESTA_URI); ?>/assets/images/neelkanth.png" alt="Neelkanth Hospital"
                    class="partner-logo" loading="lazy">
            </div>
            <div class="marquee-item">
                <img src="<?php echo esc_url(MANIFESTA_URI); ?>/assets/images/art-institute.png"
                    alt="ART Institute of India" class="partner-logo" loading="lazy">
            </div>
            <div class="marquee-item">
                <img src="<?php echo esc_url(MANIFESTA_URI); ?>/assets/images/fertility-clinic.png"
                    alt="Fertility Clinic Gurgaon" class="partner-logo" loading="lazy">
            </div>
            <div class="marquee-item">
                <img src="<?php echo esc_url(MANIFESTA_URI); ?>/assets/images/medical-college.png"
                    alt="Medical College Association" class="partner-logo" loading="lazy">
            </div>

            <!-- Duplicate set for seamless loop -->
            <div class="marquee-item">
                <img src="<?php echo esc_url(MANIFESTA_URI); ?>/assets/images/world-ivf-centre.webp"
                    alt="World IVF Centre" class="partner-logo" loading="lazy">
            </div>
            <div class="marquee-item">
                <img src="<?php echo esc_url(MANIFESTA_URI); ?>/assets/images/neelkanth.png" alt="Neelkanth Hospital"
                    class="partner-logo" loading="lazy">
            </div>
            <div class="marquee-item">
                <img src="<?php echo esc_url(MANIFESTA_URI); ?>/assets/images/art-institute.png"
                    alt="ART Institute of India" class="partner-logo" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- ======================================================
     SECTION 2: MAIN CONTACT SECTION (FORM + IMAGE SPLIT)
====================================================== -->
<section class="main-contact-section">
    <div class="container">
        <div class="contact-split-grid">

            <!-- LEFT: Enquiry Form -->
            <div class="contact-form-col">
                <h2 class="form-heading">Enquire About Our Medical Training Programs</h2>
                <p class="form-subtext">Our academic team will guide you with course details, eligibility, and
                    enrollment process.</p>

                <form class="premium-contact-form" id="contactForm" method="post">
                    <div class="form-row">
                        <label for="fullname">Full Name <span class="required">*</span></label>
                        <input type="text" id="fullname" name="fullname" class="form-input" required>
                    </div>

                    <div class="form-row">
                        <label for="qualification">Qualification / Specialization</label>
                        <input type="text" id="qualification" name="qualification" class="form-input"
                            placeholder="e.g., MBBS, MD, DNB">
                    </div>

                    <div class="form-row">
                        <label for="course">Course Interested In <span class="required">*</span></label>
                        <select id="course" name="course" class="form-select" required>
                            <option value="" disabled selected>Select a course</option>
                            <option value="Fellowship in Reproductive Medicine">Fellowship in Reproductive Medicine
                            </option>
                            <option value="PG Diploma in Clinical Embryology">PG Diploma in Clinical Embryology</option>
                            <option value="Certificate Course in IUI & OPU">Certificate Course in IUI & OPU</option>
                            <option value="Advanced Course in Hysteroscopy">Advanced Course in Hysteroscopy</option>
                            <option value="ART Certification Course">ART Certification Course</option>
                            <option value="Hands-on IVF Training">Hands-on IVF Training</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="phone">Phone Number <span class="required">*</span> <span
                                class="field-note">(WhatsApp enabled)</span></label>
                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="+91 98765 43210"
                            required>
                    </div>

                    <div class="form-row">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>

                    <div class="form-row">
                        <label for="message">Message <span class="field-note">(Optional)</span></label>
                        <textarea id="message" name="message" class="form-textarea" rows="4"
                            placeholder="Your questions or specific requirements..."></textarea>
                    </div>

                    <div class="form-row form-submit-row">
                        <button type="submit" class="btn-whatsapp-submit" id="submitBtn">
                            <span class="btn-icon">💬</span>
                            Enquire Now on WhatsApp
                        </button>
                    </div>

                    <!-- Form status messages -->
                    <div class="form-status success-message" id="successMessage" style="display: none;">
                        <span class="success-icon">✓</span>
                        Thank you! You'll be redirected to WhatsApp shortly.
                    </div>
                </form>
            </div>

            <!-- RIGHT: Visual + Contact Info -->
            <div class="contact-visual-col">
                <div class="contact-image-wrapper">
                    <img src="<?php echo esc_url(MANIFESTA_URI); ?>/assets/images/contact-team.jpg"
                        alt="Our academic team ready to assist you" class="contact-image" loading="lazy">
                    <div class="image-caption">Our academic counselors are here to help</div>
                </div>

                <div class="contact-info-card">
                    <div class="info-card-accent"></div>

                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div class="info-content">
                            <h4 class="info-label">Location</h4>
                            <p class="info-text">Plot 114, 1st Floor, Sector-44, Gurgaon – 122001</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div class="info-content">
                            <h4 class="info-label">Phone</h4>
                            <p class="info-text">
                                <a href="tel:+919971177824">+91 99711 77824</a>
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">✉️</div>
                        <div class="info-content">
                            <h4 class="info-label">Email</h4>
                            <p class="info-text">
                                <a href="mailto:manifesta837@gmail.com">manifesta837@gmail.com</a>
                            </p>
                        </div>
                    </div>

                    <div class="info-item hours-item">
                        <div class="info-icon">🕒</div>
                        <div class="info-content">
                            <h4 class="info-label">Working Hours</h4>
                            <p class="info-text">Mon - Sat: 9:00 AM - 7:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================================================
     SECTION 3: GOOGLE TESTIMONIALS SECTION (HIGH TRUST)
====================================================== -->
<section class="testimonials-section">
    <div class="container">
        <div class="testimonials-header">
            <h2 class="testimonials-heading">What Doctors Say About Us</h2>

            <div class="rating-summary">
                <div class="rating-stars">
                    <span class="star">⭐</span>
                    <span class="star">⭐</span>
                    <span class="star">⭐</span>
                    <span class="star">⭐</span>
                    <span class="star">⭐</span>
                    <span class="rating-value">4.8</span>
                </div>
                <p class="rating-text">Average Rating on Google</p>
                <p class="trusted-by">Trusted by medical professionals across India</p>
            </div>
        </div>

        <div class="testimonials-slider" id="testimonialSlider">
            <button class="slider-nav prev" id="sliderPrev" aria-label="Previous testimonial">‹</button>
            <button class="slider-nav next" id="sliderNext" aria-label="Next testimonial">›</button>

            <div class="slider-track-container">
                <div class="slider-track" id="sliderTrack">

                    <!-- Testimonial 1 -->
                    <div class="testimonial-card">
                        <div class="quote-icon">"</div>
                        <div class="testimonial-rating">
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                        </div>
                        <p class="testimonial-text">"Excellent hands-on training and real clinical exposure. The faculty
                            is highly experienced and supportive throughout the program."</p>
                        <div class="testimonial-author">
                            <strong>Dr. A. Sharma</strong>
                            <span class="author-title">Fellowship Graduate</span>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="testimonial-card">
                        <div class="quote-icon">"</div>
                        <div class="testimonial-rating">
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                        </div>
                        <p class="testimonial-text">"One of the best reproductive medicine training academies. ART
                            guidelines and ethical practice are strongly emphasized."</p>
                        <div class="testimonial-author">
                            <strong>Dr. P. Mehta</strong>
                            <span class="author-title">Clinical Embryology</span>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="testimonial-card">
                        <div class="quote-icon">"</div>
                        <div class="testimonial-rating">
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                        </div>
                        <p class="testimonial-text">"The practical exposure and case discussions helped me gain
                            confidence in infertility management. Highly recommended!"</p>
                        <div class="testimonial-author">
                            <strong>Dr. R. Kaur</strong>
                            <span class="author-title">IUI & OPU Graduate</span>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="testimonial-card">
                        <div class="quote-icon">"</div>
                        <div class="testimonial-rating">
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                        </div>
                        <p class="testimonial-text">"Structured learning, live classes, and real patient exposure. The
                            faculty's mentorship is invaluable for practicing doctors."</p>
                        <div class="testimonial-author">
                            <strong>Dr. S. Verma</strong>
                            <span class="author-title">Advanced Hysteroscopy</span>
                        </div>
                    </div>

                    <!-- Testimonial 5 -->
                    <div class="testimonial-card">
                        <div class="quote-icon">"</div>
                        <div class="testimonial-rating">
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                            <span class="star">⭐</span>
                        </div>
                        <p class="testimonial-text">"The hands-on training in embryology lab was exceptional. I now
                            confidently manage my own IVF center thanks to Manifesta."</p>
                        <div class="testimonial-author">
                            <strong>Dr. N. Reddy</strong>
                            <span class="author-title">Clinical Embryology</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider dots/pagination -->
            <div class="slider-dots" id="sliderDots">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
                <span class="dot" data-index="3"></span>
                <span class="dot" data-index="4"></span>
            </div>
        </div>
    </div>
</section>

<!-- ======================================================
     SECTION 4: FINAL CTA STRIP
====================================================== -->
<section class="final-cta-strip">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-heading">Ready to Take the Next Step in Your Medical Career?</h2>
            <div class="cta-buttons">
                <a href="/courses/" class="btn btn-primary btn-large">
                    <span class="btn-icon">📚</span>
                    Explore Courses
                </a>
                <a href="https://wa.me/919971177824?text=Hello%20Manifesta%20Medical%20Academy%2C%20I%20would%20like%20to%20enquire%20about%20your%20medical%20training%20programs.%20Please%20guide%20me%20regarding%20course%20details%20and%20enrollment."
                    target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-large">
                    <span class="btn-icon">💬</span>
                    Chat on WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Premium Contact Page Styles -->
<style>
    /* ======================================================
   PREMIUM CONTACT PAGE STYLES
====================================================== */
    :root {
        --teal-dark: #0a2a3a;
        --teal-mid: #0f3d4a;
        --teal-base: #0f6e73;
        --teal-light: #1a9099;
        --gold: #d4a843;
        --gold-light: #f0c96a;
        --whatsapp-green: #25d366;
        --whatsapp-dark: #128c7e;
        --white: #ffffff;
        --off-white: #f8fafc;
        --light-bg: #f0f7f8;
        --text-dark: #1a2b3c;
        --text-body: #33475b;
        --text-light: #6b7a8a;
        --shadow-sm: 0 10px 30px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 15px 40px rgba(0, 0, 0, 0.08);
        --shadow-lg: 0 20px 50px rgba(0, 0, 0, 0.12);
        --border-light: rgba(10, 42, 58, 0.08);
        --ease: cubic-bezier(0.4, 0, 0.2, 1);
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* ======================================================
   CONTACT HERO
====================================================== */
    .contact-hero {
        background: linear-gradient(135deg, var(--teal-dark) 0%, var(--teal-mid) 100%);
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .contact-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.05"><path d="M0 0 L100 100 M100 0 L0 100" stroke="white" stroke-width="1"/></svg>');
        background-size: 50px 50px;
    }

    .contact-hero-content {
        position: relative;
        z-index: 2;
    }

    .contact-hero-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        color: white;
        margin-bottom: 15px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .contact-hero-subtitle {
        font-size: 1.3rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 300;
    }

    /* ======================================================
   SECTION 1: TRUST MARQUEE
====================================================== */
    .trust-marquee-section {
        padding: 40px 0;
        background: white;
        border-bottom: 1px solid var(--border-light);
    }

    .trust-marquee-heading {
        text-align: center;
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--teal-dark);
        margin-bottom: 30px;
        letter-spacing: 1px;
    }

    .marquee-wrapper {
        width: 100%;
        overflow: hidden;
        padding: 10px 0;
    }

    .marquee-track {
        display: flex;
        animation: marquee 30s linear infinite;
        width: fit-content;
    }

    .marquee-wrapper:hover .marquee-track {
        animation-play-state: paused;
    }

    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .marquee-item {
        flex: 0 0 auto;
        padding: 0 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .partner-logo {
        max-height: 60px;
        width: auto;
        filter: grayscale(100%);
        opacity: 0.7;
        transition: all 0.3s var(--ease);
    }

    .partner-logo:hover {
        filter: grayscale(0);
        opacity: 1;
        transform: scale(1.05);
    }

    /* ======================================================
   SECTION 2: MAIN CONTACT
====================================================== */
    .main-contact-section {
        padding: 80px 0;
        background: var(--off-white);
    }

    .contact-split-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 50px;
    }

    /* Contact Form Column */
    .contact-form-col {
        background: white;
        border-radius: 30px;
        padding: 50px;
        box-shadow: var(--shadow-lg);
    }

    .form-heading {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.2rem;
        font-weight: 600;
        color: var(--teal-dark);
        margin-bottom: 15px;
    }

    .form-subtext {
        color: var(--text-light);
        font-size: 1.1rem;
        margin-bottom: 40px;
        line-height: 1.6;
    }

    .premium-contact-form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .form-row {
        display: flex;
        flex-direction: column;
    }

    .form-row label {
        font-weight: 600;
        color: var(--teal-dark);
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .required {
        color: #e53e3e;
        margin-left: 2px;
    }

    .field-note {
        color: var(--text-light);
        font-weight: normal;
        font-size: 0.85rem;
        margin-left: 8px;
    }

    .form-input,
    .form-select,
    .form-textarea {
        padding: 14px 18px;
        border: 2px solid #e0e7ed;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s var(--ease);
        background: white;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: var(--gold);
        outline: none;
        box-shadow: 0 0 0 3px rgba(212, 168, 67, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-submit-row {
        margin-top: 15px;
    }

    .btn-whatsapp-submit {
        width: 100%;
        padding: 18px 30px;
        background: var(--whatsapp-green);
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s var(--ease);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
    }

    .btn-whatsapp-submit:hover {
        background: var(--whatsapp-dark);
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(37, 211, 102, 0.4);
    }

    .btn-icon {
        font-size: 1.3rem;
    }

    /* Success Message */
    .form-status {
        padding: 15px 20px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .success-message {
        background: rgba(37, 211, 102, 0.1);
        border: 2px solid var(--whatsapp-green);
        color: var(--whatsapp-dark);
    }

    .success-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        background: var(--whatsapp-green);
        color: white;
        border-radius: 50%;
        font-weight: bold;
    }

    /* Contact Visual Column */
    .contact-visual-col {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .contact-image-wrapper {
        position: relative;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }

    .contact-image {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.5s var(--ease);
    }

    .contact-image-wrapper:hover .contact-image {
        transform: scale(1.05);
    }

    .image-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
        color: white;
        font-size: 1rem;
        font-weight: 500;
    }

    /* Contact Info Card */
    .contact-info-card {
        background: white;
        border-radius: 30px;
        padding: 35px;
        box-shadow: var(--shadow-lg);
        position: relative;
        border: 1px solid var(--border-light);
    }

    .info-card-accent {
        position: absolute;
        top: 0;
        left: 30px;
        width: 4px;
        height: 60px;
        background: linear-gradient(to bottom, var(--gold), var(--gold-light));
        border-radius: 0 0 4px 4px;
    }

    .info-item {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid var(--border-light);
    }

    .info-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .info-icon {
        font-size: 2rem;
        min-width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--light-bg);
        border-radius: 15px;
        color: var(--gold);
    }

    .info-content {
        flex: 1;
    }

    .info-label {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-light);
        margin-bottom: 5px;
    }

    .info-text {
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--teal-dark);
        line-height: 1.5;
    }

    .info-text a {
        color: var(--teal-dark);
        text-decoration: none;
        transition: color 0.3s var(--ease);
    }

    .info-text a:hover {
        color: var(--gold);
    }

    /* ======================================================
   SECTION 3: TESTIMONIALS
====================================================== */
    .testimonials-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8fafc 0%, #edf3f7 100%);
        position: relative;
    }

    .testimonials-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .testimonials-heading {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--teal-dark);
        margin-bottom: 25px;
    }

    .rating-summary {
        background: white;
        padding: 30px;
        border-radius: 20px;
        display: inline-block;
        box-shadow: var(--shadow-md);
    }

    .rating-stars {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        margin-bottom: 10px;
    }

    .star {
        font-size: 1.5rem;
        color: #ffc107;
    }

    .rating-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--teal-dark);
        margin-left: 10px;
    }

    .rating-text {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--teal-dark);
        margin-bottom: 5px;
    }

    .trusted-by {
        color: var(--text-light);
    }

    /* Testimonials Slider */
    .testimonials-slider {
        position: relative;
        max-width: 1000px;
        margin: 0 auto;
    }

    .slider-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: white;
        border: 2px solid var(--gold);
        color: var(--gold);
        font-size: 2rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s var(--ease);
        z-index: 10;
    }

    .slider-nav:hover {
        background: var(--gold);
        color: white;
        transform: translateY(-50%) scale(1.1);
    }

    .slider-nav.prev {
        left: -60px;
    }

    .slider-nav.next {
        right: -60px;
    }

    .slider-track-container {
        overflow: hidden;
        border-radius: 30px;
    }

    .slider-track {
        display: flex;
        transition: transform 0.5s var(--ease);
    }

    .testimonial-card {
        flex: 0 0 calc(33.333% - 20px);
        margin: 0 10px;
        background: white;
        border-radius: 20px;
        padding: 35px 25px;
        box-shadow: var(--shadow-md);
        position: relative;
        transition: all 0.3s var(--ease);
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .quote-icon {
        position: absolute;
        top: 20px;
        right: 25px;
        font-size: 5rem;
        color: rgba(212, 168, 67, 0.1);
        font-family: serif;
        line-height: 1;
    }

    .testimonial-rating {
        display: flex;
        gap: 3px;
        margin-bottom: 20px;
    }

    .testimonial-text {
        color: var(--text-body);
        line-height: 1.7;
        margin-bottom: 20px;
        font-style: italic;
        position: relative;
        z-index: 2;
    }

    .testimonial-author {
        border-top: 1px solid var(--border-light);
        padding-top: 15px;
    }

    .testimonial-author strong {
        display: block;
        color: var(--teal-dark);
        font-size: 1.1rem;
        margin-bottom: 3px;
    }

    .author-title {
        color: var(--gold);
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Slider Dots */
    .slider-dots {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 30px;
    }

    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #d0d9e0;
        cursor: pointer;
        transition: all 0.3s var(--ease);
    }

    .dot.active {
        background: var(--gold);
        transform: scale(1.3);
    }

    /* ======================================================
   SECTION 4: FINAL CTA STRIP
====================================================== */
    .final-cta-strip {
        padding: 80px 0;
        background: linear-gradient(135deg, var(--teal-dark) 0%, var(--teal-mid) 100%);
        text-align: center;
    }

    .cta-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .cta-heading {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 40px;
        line-height: 1.3;
    }

    .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 16px 40px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s var(--ease);
        border: none;
        cursor: pointer;
    }

    .btn-large {
        padding: 18px 50px;
        font-size: 1.2rem;
    }

    .btn-primary {
        background: var(--gold);
        color: var(--teal-dark);
        box-shadow: 0 10px 25px rgba(212, 168, 67, 0.3);
    }

    .btn-primary:hover {
        background: var(--gold-light);
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(212, 168, 67, 0.4);
    }

    .btn-whatsapp {
        background: var(--whatsapp-green);
        color: white;
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
    }

    .btn-whatsapp:hover {
        background: var(--whatsapp-dark);
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(37, 211, 102, 0.4);
    }

    /* ======================================================
   RESPONSIVE DESIGN
====================================================== */
    @media (max-width: 1200px) {
        .slider-nav.prev {
            left: -30px;
        }

        .slider-nav.next {
            right: -30px;
        }
    }

    @media (max-width: 1024px) {
        .contact-split-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .testimonial-card {
            flex: 0 0 calc(50% - 20px);
        }
    }

    @media (max-width: 768px) {
        .contact-hero {
            padding: 60px 0;
        }

        .contact-hero-title {
            font-size: 2.2rem;
        }

        .contact-hero-subtitle {
            font-size: 1.1rem;
        }

        .contact-form-col {
            padding: 30px;
        }

        .form-heading {
            font-size: 1.8rem;
        }

        .trust-marquee-heading {
            font-size: 1.2rem;
        }

        .marquee-item {
            padding: 0 20px;
        }

        .partner-logo {
            max-height: 40px;
        }

        .testimonial-card {
            flex: 0 0 calc(100% - 20px);
        }

        .slider-nav {
            display: none;
        }

        .rating-summary {
            padding: 20px;
        }

        .star {
            font-size: 1.2rem;
        }

        .cta-heading {
            font-size: 2rem;
        }

        .btn-large {
            padding: 16px 40px;
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .contact-form-col {
            padding: 25px 20px;
        }

        .info-item {
            flex-direction: column;
            gap: 10px;
        }

        .info-icon {
            align-self: flex-start;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        .rating-stars {
            flex-wrap: wrap;
        }
    }
</style>

<!-- JavaScript for Form Submission and Slider -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Contact Form Submission
        const contactForm = document.getElementById('contactForm');
        const successMessage = document.getElementById('successMessage');
        const submitBtn = document.getElementById('submitBtn');

        if (contactForm) {
            contactForm.addEventListener('submit', function (e) {
                e.preventDefault();

                // Get form values
                const fullname = document.getElementById('fullname').value;
                const qualification = document.getElementById('qualification').value;
                const course = document.getElementById('course').value;
                const phone = document.getElementById('phone').value;
                const email = document.getElementById('email').value;
                const message = document.getElementById('message').value;

                // Construct WhatsApp message
                const whatsappMessage = `Hello Manifesta Medical Academy,%0A%0A` +
                    `I would like to enquire about your medical training programs.%0A%0A` +
                    `📋 My Details:%0A` +
                    `Name: ${fullname}%0A` +
                    `Qualification: ${qualification || 'Not specified'}%0A` +
                    `Course Interested: ${course}%0A` +
                    `Phone: ${phone}%0A` +
                    `Email: ${email}%0A` +
                    `Message: ${message || 'No additional message'}`;

                // Show success message
                successMessage.style.display = 'flex';
                submitBtn.disabled = true;

                // Redirect to WhatsApp after 2 seconds
                setTimeout(function () {
                    window.open(`https://wa.me/919971177824?text=${whatsappMessage}`, '_blank');

                    // Reset form and hide message after 3 seconds
                    setTimeout(function () {
                        contactForm.reset();
                        successMessage.style.display = 'none';
                        submitBtn.disabled = false;
                    }, 3000);
                }, 2000);
            });
        }

        // Testimonials Slider
        const sliderTrack = document.getElementById('sliderTrack');
        const prevBtn = document.getElementById('sliderPrev');
        const nextBtn = document.getElementById('sliderNext');
        const dots = document.querySelectorAll('.dot');
        const cards = document.querySelectorAll('.testimonial-card');

        if (sliderTrack && cards.length > 0) {
            let currentIndex = 0;
            const cardWidth = cards[0].offsetWidth + 20; // card width + margin
            const visibleCards = window.innerWidth > 1024 ? 3 : (window.innerWidth > 768 ? 2 : 1);
            const maxIndex = cards.length - visibleCards;

            function updateSlider() {
                sliderTrack.style.transform = `translateX(-${currentIndex * cardWidth}px)`;

                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    if (currentIndex > 0) {
                        currentIndex--;
                    } else {
                        currentIndex = maxIndex;
                    }
                    updateSlider();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    if (currentIndex < maxIndex) {
                        currentIndex++;
                    } else {
                        currentIndex = 0;
                    }
                    updateSlider();
                });
            }

            // Dot navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', function () {
                    currentIndex = index;
                    updateSlider();
                });
            });

            // Auto slide every 5 seconds
            setInterval(function () {
                if (currentIndex < maxIndex) {
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateSlider();
            }, 5000);

            // Handle window resize
            window.addEventListener('resize', function () {
                currentIndex = 0;
                updateSlider();
            });
        }
    });
</script>

<?php get_footer(); ?>