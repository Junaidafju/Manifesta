<?php
/**
 * Template Name: Courses Offered
 * Description: Course listing page with WhatsApp popup modals
 */

get_header();

// Get all courses (custom post type or array)
$courses = [
    [
        'id' => 'fellowship',
        'title' => 'Fellowship in Reproductive Medicine',
        'badge' => 'Flagship Program',
        'short_desc' => 'An advanced, practice-oriented fellowship designed to prepare doctors for independent infertility and IVF practice.',
        'highlights' => [
            'Live classes + hands-on clinical training',
            'IVF, ART & infertility case exposure',
            'ART-compliant curriculum'
        ],
        'popup_title' => 'Fellowship in Reproductive Medicine',
        'popup_subtitle' => 'Advanced Training for Modern Infertility Practice',
        'popup_desc' => 'This fellowship is designed for doctors who want to confidently manage infertility cases and step into IVF & ART-based treatments. The program provides a structured blend of:',
        'popup_features' => [
            'Advanced reproductive medicine theory',
            'Live interactive classes',
            'Hands-on clinical exposure',
            'Real infertility and IVF case discussions'
        ],
        'popup_insights' => [
            'Infertility evaluation & management',
            'IVF and ART protocols',
            'Ethical decision-making',
            'ART rules and compliance'
        ],
        'ideal_for' => 'This program is ideal for doctors seeking long-term career growth in reproductive medicine.',
        'whatsapp_message' => 'Hello Manifesta Medical Academy, I am interested in the Fellowship in Reproductive Medicine. Please share course details, duration, eligibility, and fee structure.'
    ],
    [
        'id' => 'diploma-embryology',
        'title' => 'PG Diploma in Clinical Embryology',
        'badge' => 'Specialized Skill Program',
        'short_desc' => 'A focused diploma for doctors seeking in-depth knowledge and practical exposure in embryology and IVF lab techniques.',
        'highlights' => [
            'Embryology lab exposure',
            'IVF lab protocols & quality control',
            'Case-based learning'
        ],
        'popup_title' => 'PG Diploma in Clinical Embryology',
        'popup_subtitle' => 'Build Expertise in IVF Lab Sciences',
        'popup_desc' => 'This diploma is crafted for doctors who want specialized training in clinical embryology and IVF laboratory practices. The course emphasizes:',
        'popup_features' => [
            'Embryology lab workflows',
            'Gamete and embryo handling',
            'IVF lab protocols and quality standards',
            'Case-based learning and practical exposure'
        ],
        'popup_insights' => [
            'Participants gain a strong foundation in embryology concepts',
            'Understanding clinical relevance in IVF outcomes'
        ],
        'ideal_for' => 'This program is ideal for doctors aiming to enhance their role in IVF laboratories and fertility centers.',
        'whatsapp_message' => 'Hello Manifesta Medical Academy, I would like to know more about the PG Diploma in Clinical Embryology. Please share details regarding training format, clinical exposure, and fees.'
    ],
    [
        'id' => 'certificate-iui',
        'title' => 'Certificate Course in IUI & OPU',
        'badge' => 'Procedure-Focused Training',
        'short_desc' => 'A short-term, hands-on course focused on core infertility procedures essential for daily clinical practice.',
        'highlights' => [
            'Practical IUI & OPU training',
            'Patient selection & protocols',
            'ART guidelines compliance'
        ],
        'popup_title' => 'Certificate Course in IUI & OPU',
        'popup_subtitle' => 'Hands-On Training in Core Infertility Procedures',
        'popup_desc' => 'This certificate course focuses on two essential infertility procedures — Intrauterine Insemination (IUI) and Ovum Pick-Up (OPU). The training includes:',
        'popup_features' => [
            'Patient selection and counselling',
            'Step-by-step procedural guidance',
            'Hands-on clinical exposure',
            'ART-compliant procedural protocols'
        ],
        'popup_insights' => [
            'Doctors completing this course gain practical confidence',
            'Perform procedures safely and ethically in routine practice'
        ],
        'ideal_for' => 'This course is ideal for doctors seeking quick skill enhancement with real-world application.',
        'whatsapp_message' => 'Hello Manifesta Medical Academy, I am interested in the Certificate Course in IUI & OPU. Kindly share course duration, training details, and enrollment process.'
    ],
    [
        'id' => 'advanced-hysteroscopy',
        'title' => 'Advanced Course in Hysteroscopy',
        'badge' => 'Advanced Skill Program',
        'short_desc' => 'Comprehensive training in diagnostic and operative hysteroscopy for infertility practice.',
        'highlights' => [
            'Diagnostic hysteroscopy techniques',
            'Operative procedures',
            'Case-based learning'
        ],
        'popup_title' => 'Advanced Course in Hysteroscopy',
        'popup_subtitle' => 'Master Diagnostic & Operative Hysteroscopy',
        'popup_desc' => 'This advanced course equips doctors with comprehensive skills in hysteroscopy for infertility diagnosis and treatment. The program covers:',
        'popup_features' => [
            'Diagnostic hysteroscopy techniques',
            'Operative hysteroscopy procedures',
            'Complication management',
            'Integration with ART protocols'
        ],
        'popup_insights' => [
            'Hands-on training with modern equipment',
            'Real case discussions',
            'Evidence-based approaches'
        ],
        'ideal_for' => 'Ideal for gynaecologists seeking to expand their infertility practice with advanced endoscopic skills.',
        'whatsapp_message' => 'Hello Manifesta Medical Academy, I am interested in the Advanced Course in Hysteroscopy. Please share course details, duration, and fee structure.'
    ],
    [
        'id' => 'art-certification',
        'title' => 'ART Certification Course',
        'badge' => 'Foundation Program',
        'short_desc' => 'Comprehensive certification in Assisted Reproductive Technology following latest ART guidelines.',
        'highlights' => [
            'ART rules & regulations',
            'Ethical practice standards',
            'Complete ART workflow'
        ],
        'popup_title' => 'ART Certification Course',
        'popup_subtitle' => 'Comprehensive Training in Assisted Reproductive Technology',
        'popup_desc' => 'This certification program provides complete training in ART procedures, regulations, and ethical practice. The course includes:',
        'popup_features' => [
            'ART rules and legal framework',
            'Complete ART laboratory workflow',
            'Quality control and documentation',
            'Ethical considerations in ART'
        ],
        'popup_insights' => [
            'Latest ART guidelines compliance',
            'Laboratory setup and management',
            'Patient counselling and consent'
        ],
        'ideal_for' => 'Essential for doctors setting up or working in ART clinics and IVF centers.',
        'whatsapp_message' => 'Hello Manifesta Medical Academy, I am interested in the ART Certification Course. Kindly share course details and enrollment information.'
    ],
    [
        'id' => 'hands-on-ivf',
        'title' => 'Hands-on IVF Training',
        'badge' => 'Practical Immersion',
        'short_desc' => 'Intensive practical training in IVF procedures with real clinical exposure.',
        'highlights' => [
            'Live procedure observation',
            'Hands-on lab work',
            'Clinical case discussions'
        ],
        'popup_title' => 'Hands-on IVF Training',
        'popup_subtitle' => 'Intensive Practical Training in IVF Procedures',
        'popup_desc' => 'This intensive program focuses on practical IVF skills with real clinical exposure. Training includes:',
        'popup_features' => [
            'Live IVF procedure observation',
            'Hands-on embryology lab work',
            'OPU and embryo transfer practice',
            'Cryopreservation techniques'
        ],
        'popup_insights' => [
            'Small batch size for personalized attention',
            'Direct mentorship from experts',
            'Real patient case discussions'
        ],
        'ideal_for' => 'Perfect for doctors wanting to gain confidence in performing IVF procedures independently.',
        'whatsapp_message' => 'Hello Manifesta Medical Academy, I am interested in the Hands-on IVF Training program. Please share course schedule and registration details.'
    ]
];
?>

<main class="courses-page">

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Courses Offered</h1>
            <p class="page-subtitle">Advanced, Practical & ART-Compliant Medical Training</p>
            <p class="page-description">At Manifesta Medical Academy, our courses are designed for doctors who want real
                clinical confidence, not just certificates. Each program blends advanced theory, live learning, and
                hands-on clinical exposure, strictly following ART rules and ethical medical practices.</p>
        </div>
    </section>

    <!-- Courses Grid -->
    <section class="courses-grid-section">
        <div class="container">
            <div class="courses-grid">
                <?php foreach ($courses as $index => $course): ?>
                    <div class="course-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                        <span class="course-badge"><?php echo $course['badge']; ?></span>
                        <h2 class="course-title"><?php echo $course['title']; ?></h2>
                        <p class="course-description"><?php echo $course['short_desc']; ?></p>

                        <div class="course-highlights">
                            <?php foreach ($course['highlights'] as $highlight): ?>
                                <div class="highlight-item">
                                    <span class="check-icon">✓</span>
                                    <span><?php echo $highlight; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button class="btn-view-more" data-course="<?php echo $course['id']; ?>">
                            View More <span class="arrow">→</span>
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="container">
            <h2 class="section-title">Why Choose Our Courses?</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🎯</div>
                    <h3>Practice-Oriented</h3>
                    <p>Learn by doing with real clinical exposure and hands-on training</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📋</div>
                    <h3>ART Compliant</h3>
                    <p>All courses follow latest ART rules and ethical guidelines</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">👨‍⚕️</div>
                    <h3>Expert Faculty</h3>
                    <p>Learn from practicing fertility specialists with decades of experience</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🏥</div>
                    <h3>Clinical Exposure</h3>
                    <p>Real patient cases and live procedure demonstrations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Advance Your Career?</h2>
            <p>Join India's premier medical academy for reproductive medicine training</p>
            <a href="https://wa.me/919971177824?text=Hello%20Manifesta%20Medical%20Academy%2C%20I%20would%20like%20to%20know%20more%20about%20your%20courses."
                target="_blank" class="btn-whatsapp-large">
                <span class="whatsapp-icon">💬</span> Enquire on WhatsApp
            </a>
        </div>
    </section>

</main>

<!-- Popup Modals -->
<div class="popup-overlay" id="popupOverlay"></div>

<?php foreach ($courses as $course): ?>
    <div class="popup-modal" id="popup-<?php echo $course['id']; ?>">
        <div class="popup-content">
            <button class="popup-close" aria-label="Close popup">×</button>

            <div class="popup-header">
                <span class="popup-badge"><?php echo $course['badge']; ?></span>
                <h2 class="popup-title"><?php echo $course['popup_title']; ?></h2>
                <p class="popup-subtitle"><?php echo $course['popup_subtitle']; ?></p>
            </div>

            <div class="popup-body">
                <p class="popup-description"><?php echo $course['popup_desc']; ?></p>

                <ul class="popup-features">
                    <?php foreach ($course['popup_features'] as $feature): ?>
                        <li>
                            <span class="feature-bullet">•</span>
                            <span><?php echo $feature; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="popup-insights">
                    <h4>You'll gain practical insight into:</h4>
                    <ul>
                        <?php foreach ($course['popup_insights'] as $insight): ?>
                            <li>
                                <span class="check-small">✓</span>
                                <span><?php echo $insight; ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <p class="popup-ideal-for">
                    <strong>Ideal for:</strong> <?php echo $course['ideal_for']; ?>
                </p>
            </div>

            <div class="popup-footer">
                <a href="https://wa.me/919971177824?text=<?php echo urlencode($course['whatsapp_message']); ?>"
                    target="_blank" class="btn-whatsapp-popup" rel="noopener noreferrer">
                    <span class="whatsapp-icon">💬</span> Enquire on WhatsApp
                </a>
                <p class="popup-note">Click to chat with us instantly</p>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Styles -->
<style>
    /* ======================================================
   COURSES PAGE STYLES
====================================================== */
    :root {
        --teal-dark: #0a3d42;
        --teal-mid: #0f4b55;
        --teal-base: #0f6e73;
        --teal-light: #1a9099;
        --teal-bright: #22b8c0;
        --gold: #d4a843;
        --gold-light: #f0c96a;
        --white: #ffffff;
        --off-white: #f8fafc;
        --light-gray: #f0f3f7;
        --text-dark: #1e293b;
        --text-body: #334155;
        --text-light: #64748b;
        --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        --whatsapp: #25d366;
        --whatsapp-dark: #128c7e;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, var(--teal-dark) 0%, var(--teal-mid) 100%);
        color: white;
        padding: 80px 0;
        text-align: center;
    }

    .page-title {
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 700;
        margin-bottom: 20px;
        font-family: 'Cormorant Garamond', serif;
    }

    .page-subtitle {
        font-size: 1.3rem;
        color: var(--gold-light);
        margin-bottom: 20px;
        font-weight: 500;
    }

    .page-description {
        font-size: 1.1rem;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.7;
        opacity: 0.9;
    }

    /* Courses Grid */
    .courses-grid-section {
        padding: 80px 0;
        background: var(--off-white);
    }

    .courses-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    /* Course Card */
    .course-card {
        background: white;
        border-radius: 20px;
        padding: 32px;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        border: 1px solid rgba(15, 110, 115, 0.1);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .course-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--teal-base);
    }

    .course-badge {
        display: inline-block;
        background: rgba(212, 168, 67, 0.1);
        color: var(--gold);
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 4px 12px;
        border-radius: 50px;
        margin-bottom: 16px;
        align-self: flex-start;
    }

    .course-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--teal-dark);
        margin-bottom: 12px;
        line-height: 1.4;
        font-family: 'Cormorant Garamond', serif;
    }

    .course-description {
        color: var(--text-body);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .course-highlights {
        margin-bottom: 24px;
        flex-grow: 1;
    }

    .highlight-item {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
        font-size: 0.9rem;
        color: var(--text-light);
    }

    .highlight-item .check-icon {
        color: var(--teal-base);
        font-weight: bold;
        flex-shrink: 0;
    }

    .btn-view-more {
        background: transparent;
        border: 2px solid var(--teal-base);
        color: var(--teal-dark);
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: fit-content;
        font-size: 0.95rem;
    }

    .btn-view-more:hover {
        background: var(--teal-base);
        color: white;
        transform: translateX(4px);
    }

    .btn-view-more .arrow {
        transition: transform 0.3s ease;
    }

    .btn-view-more:hover .arrow {
        transform: translateX(4px);
    }

    /* Why Choose Section */
    .why-choose-section {
        padding: 80px 0;
        background: white;
    }

    .section-title {
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 700;
        color: var(--teal-dark);
        text-align: center;
        margin-bottom: 50px;
        font-family: 'Cormorant Garamond', serif;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, var(--teal-base), var(--gold));
        border-radius: 2px;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
    }

    .feature-item {
        text-align: center;
        padding: 30px 20px;
        background: var(--off-white);
        border-radius: 16px;
        transition: transform 0.3s ease;
    }

    .feature-item:hover {
        transform: translateY(-5px);
    }

    .feature-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .feature-item h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--teal-dark);
        margin-bottom: 10px;
    }

    .feature-item p {
        font-size: 0.9rem;
        color: var(--text-light);
        line-height: 1.5;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, var(--teal-dark) 0%, var(--teal-mid) 100%);
        color: white;
        padding: 60px 0;
        text-align: center;
    }

    .cta-section h2 {
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        margin-bottom: 15px;
        font-family: 'Cormorant Garamond', serif;
    }

    .cta-section p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }

    .btn-whatsapp-large {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: var(--whatsapp);
        color: white;
        padding: 16px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-whatsapp-large:hover {
        background: var(--whatsapp-dark);
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    .whatsapp-icon {
        font-size: 1.4rem;
    }

    /* ======================================================
   POPUP MODAL STYLES
====================================================== */
    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(5px);
        z-index: 999;
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .popup-overlay.active {
        display: block;
        opacity: 1;
    }

    .popup-modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.9);
        width: 90%;
        max-width: 700px;
        max-height: 85vh;
        overflow-y: auto;
        background: white;
        border-radius: 24px;
        box-shadow: var(--shadow-lg);
        z-index: 1000;
        display: none;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .popup-modal.active {
        display: block;
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    .popup-content {
        position: relative;
        padding: 40px;
    }

    .popup-close {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 36px;
        height: 36px;
        background: var(--light-gray);
        border: none;
        border-radius: 50%;
        font-size: 24px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-dark);
        transition: all 0.3s ease;
        z-index: 10;
    }

    .popup-close:hover {
        background: var(--teal-base);
        color: white;
        transform: rotate(90deg);
    }

    .popup-header {
        margin-bottom: 30px;
        padding-right: 40px;
    }

    .popup-badge {
        display: inline-block;
        background: rgba(212, 168, 67, 0.1);
        color: var(--gold);
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 4px 12px;
        border-radius: 50px;
        margin-bottom: 15px;
    }

    .popup-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--teal-dark);
        margin-bottom: 10px;
        line-height: 1.3;
        font-family: 'Cormorant Garamond', serif;
    }

    .popup-subtitle {
        font-size: 1.1rem;
        color: var(--teal-base);
        font-weight: 500;
    }

    .popup-body {
        margin-bottom: 30px;
    }

    .popup-description {
        font-size: 1rem;
        line-height: 1.7;
        color: var(--text-body);
        margin-bottom: 25px;
    }

    .popup-features {
        list-style: none;
        padding: 0;
        margin: 0 0 25px 0;
    }

    .popup-features li {
        display: flex;
        gap: 12px;
        margin-bottom: 12px;
        font-size: 1rem;
        color: var(--text-body);
        line-height: 1.6;
    }

    .feature-bullet {
        color: var(--teal-base);
        font-weight: bold;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .popup-insights {
        background: var(--off-white);
        padding: 25px;
        border-radius: 16px;
        margin-bottom: 25px;
    }

    .popup-insights h4 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--teal-dark);
        margin-bottom: 15px;
    }

    .popup-insights ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .popup-insights li {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
        font-size: 0.95rem;
        color: var(--text-body);
    }

    .check-small {
        color: var(--teal-base);
        font-weight: bold;
        flex-shrink: 0;
    }

    .popup-ideal-for {
        font-size: 1rem;
        line-height: 1.6;
        color: var(--text-body);
        padding: 15px;
        background: rgba(15, 110, 115, 0.05);
        border-left: 4px solid var(--teal-base);
        border-radius: 8px;
    }

    .popup-footer {
        text-align: center;
        border-top: 1px solid var(--light-gray);
        padding-top: 30px;
    }

    .btn-whatsapp-popup {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: var(--whatsapp);
        color: white;
        padding: 16px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 16px rgba(37, 211, 102, 0.3);
        margin-bottom: 10px;
    }

    .btn-whatsapp-popup:hover {
        background: var(--whatsapp-dark);
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(37, 211, 102, 0.4);
    }

    .popup-note {
        font-size: 0.85rem;
        color: var(--text-light);
    }

    /* Prevent body scroll when popup is open */
    body.popup-open {
        overflow: hidden;
    }

    /* ======================================================
   RESPONSIVE DESIGN
====================================================== */

    /* Tablet Landscape */
    @media (max-width: 1024px) {
        .courses-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .features-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Tablet Portrait */
    @media (max-width: 768px) {
        .page-header {
            padding: 60px 0;
        }

        .courses-grid-section {
            padding: 60px 0;
        }

        .courses-grid {
            grid-template-columns: 1fr;
            max-width: 500px;
            margin: 0 auto;
        }

        .popup-content {
            padding: 30px 20px;
        }

        .popup-title {
            font-size: 1.6rem;
        }
    }

    /* Mobile */
    @media (max-width: 480px) {
        .page-title {
            font-size: 2rem;
        }

        .page-subtitle {
            font-size: 1.1rem;
        }

        .page-description {
            font-size: 1rem;
        }

        .course-card {
            padding: 24px;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .popup-modal {
            width: 95%;
            max-height: 80vh;
        }

        .popup-content {
            padding: 25px 15px;
        }

        .popup-title {
            font-size: 1.4rem;
        }

        .popup-subtitle {
            font-size: 1rem;
        }

        .btn-whatsapp-popup {
            width: 100%;
            justify-content: center;
            padding: 14px 20px;
        }

        .popup-close {
            top: 10px;
            right: 10px;
        }
    }

    /* Animation for popup */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translate(-50%, -48%) scale(0.95);
        }

        to {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }
    }
</style>

<!-- JavaScript for Popup Functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const overlay = document.getElementById('popupOverlay');
        const modals = document.querySelectorAll('.popup-modal');
        const viewMoreButtons = document.querySelectorAll('.btn-view-more');
        const closeButtons = document.querySelectorAll('.popup-close');
        const body = document.body;

        // Open popup function
        function openPopup(courseId) {
            const modal = document.getElementById(`popup-${courseId}`);
            if (modal) {
                overlay.classList.add('active');
                modal.classList.add('active');
                body.classList.add('popup-open');
            }
        }

        // Close popup function
        function closePopup() {
            overlay.classList.remove('active');
            modals.forEach(modal => modal.classList.remove('active'));
            body.classList.remove('popup-open');
        }

        // Add click event to all view more buttons
        viewMoreButtons.forEach(button => {
            button.addEventListener('click', function () {
                const courseId = this.dataset.course;
                openPopup(courseId);
            });
        });

        // Add click event to all close buttons
        closeButtons.forEach(button => {
            button.addEventListener('click', closePopup);
        });

        // Close popup when clicking overlay
        overlay.addEventListener('click', closePopup);

        // Close popup with Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && overlay.classList.contains('active')) {
                closePopup();
            }
        });

        // Prevent closing when clicking inside modal
        modals.forEach(modal => {
            modal.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        });

        // Add AOS-like animation on scroll (simple implementation)
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.course-card, .feature-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    });
</script>

<?php get_footer(); ?>