Manifesta Medical Academy — WordPress Theme
Custom WordPress theme for a medical academy website built with ACF Pro, Alpine.js, and pure CSS.

Proposed Changes
Theme Root — wp-content/themes/manifesta-theme/
All files go into a new folder at c:\laragon\www\Manifesta\wp-content\themes\manifesta-theme\.

[NEW] style.css
Theme declaration header (Theme Name, Author, Version, Text Domain).

[NEW] index.php
Generic fallback template — renders header, the loop (title + content), footer.

[NEW] functions.php
Master loader that require_once's every file in inc/, adds theme supports (title-tag, post-thumbnails, HTML5, custom-logo, elementor), and defines MANIFESTA_DIR, MANIFESTA_URI, MANIFESTA_VERSION constants.

inc/ — Feature Includes
[NEW] inc/enqueue.php
Enqueues main.css, alpine.min.js, and main.js. Localizes manifestaData (ajaxUrl, nonce, siteUrl). Also enqueues editor.css on admin_enqueue_scripts.

[NEW] inc/menus.php
Registers primary, footer, and top-bar nav menu locations.

[NEW] inc/cpt.php
Registers three CPTs (course, faculty, testimonial) and one taxonomy (course_category → course).

[NEW] inc/acf-options.php
Creates the ACF Options page ("Site Settings") plus three sub-pages: Contact & Social, Header, Footer.

[NEW] inc/acf-fields.php
All acf_add_local_field_group() calls: Home Page, Course Details, Faculty Details, Testimonial Details, Global Options (Contact & Social, Footer Settings).

[NEW] inc/helpers.php
Helper functions: manifesta_render_stars(), manifesta_whatsapp_link(), manifesta_get_courses(), manifesta_get_faculty(), manifesta_breadcrumb(), manifesta_schema_org() (hooked to wp_head).

[NEW] inc/widgets.php
Registers a "Sidebar" and "Footer Widgets" widget area.

Templates
[NEW] header.php
Top bar with phone/email/WhatsApp. Sticky site header with logo, primary nav, "Enquire Now" CTA, and Alpine.js-powered mobile toggle.

[NEW] footer.php
3-column footer grid (brand + social, quick links, contact). Copyright bar. wp_footer().

[NEW] page-templates/page-home.php
/* Template Name: Home */ — loads all template-parts in sequence.

[NEW] page-templates/page-courses.php
/* Template Name: Courses */ — lists all courses with filtering by taxonomy.

[NEW] page-templates/page-faculty.php
/* Template Name: Faculty */ — full faculty listing.

[NEW] page-templates/page-contact.php
/* Template Name: Contact */ — contact info + Elementor content area.

[NEW] template-parts/hero.php
Full-screen hero with background image, overlay, title, subtitle, and dual CTA buttons (primary + WhatsApp).

[NEW] template-parts/stats-bar.php
ACF repeater-driven stats strip (e.g. 500+ Students, 20+ Courses).

[NEW] template-parts/why-choose-us.php
Icon + title + description cards from ACF repeater.

[NEW] template-parts/courses-grid.php
WP_Query loop of 6 courses, each rendered as a card (badge, thumbnail, title, excerpt, meta, CTA).

[NEW] template-parts/faculty-grid.php
WP_Query loop of 4 faculty members (photo, name, designation, hospital, experience).

[NEW] template-parts/testimonials.php
Testimonial CPT loop with star rating, photo, quote, name, course enrolled.

[NEW] template-parts/cta-banner.php
Full-width call-to-action banner with WhatsApp and enquiry links.

[NEW] template-parts/breadcrumb.php
Standalone breadcrumb partial wrapping manifesta_breadcrumb().

[NEW] single-course.php
Course detail page: breadcrumb, hero bar with quick-meta, sticky enroll card (price, CTA, WhatsApp, syllabus PDF), full content, highlights list, assigned faculty mini-grid.

[NEW] archive-course.php
Archive/listing page for all courses, with optional category filter tabs.

[NEW] single-faculty.php
Faculty profile: photo, bio, designation, hospital, specialization, LinkedIn link.

Assets
[NEW] assets/css/main.css
~700-line CSS file covering:

CSS custom properties (color palette, spacing, typography)
Modern CSS reset
Utility classes (.container, .section-padding, .btn variants)
Topbar, site-header, sticky scroll effect
Hero section with overlay and animations
Stats bar
Why-choose-us cards
Course cards and grid
Faculty cards and grid
Testimonials carousel layout
CTA banner
Footer grid
Single course layout including sticky sidebar card
Mobile-first responsive breakpoints (768px, 1024px, 1280px)
[NEW] assets/css/editor.css
Minimal styles for admin/Gutenberg/Elementor editing consistency.

[NEW] assets/js/main.js
Mobile menu open/close via Alpine.js toggle-menu event
Sticky header shrink on scroll
Smooth scroll for anchor links
[NEW] assets/js/alpine.min.js
Alpine.js v3 minified — downloaded from CDN and saved locally.

Verification Plan
Manual Verification (Browser)
After all files are created:

Activate theme: Go to http://manifesta.test/wp-admin → Appearance → Themes → Activate "Manifesta Medical Academy".
Check for PHP errors: Confirm the admin dashboard loads without white screen or fatal error notices.
Verify CPTs: In the WP admin sidebar, confirm "Courses", "Faculty", and "Testimonials" menu items appear.
Verify ACF Options: Confirm "Site Settings" menu item appears in the admin sidebar.
Verify ACF Fields: Navigate to Courses → Add New and confirm ACF fields (Duration, Mode, Price, etc.) render below the editor.
Check front end: Visit http://manifesta.test/ — confirm the default theme renders (not a white page).
Assign Home template: Create a new Page named "Home", assign the "Home" template, and set it as the Static Front Page under Settings → Reading. Confirm the homepage sections render.

## Project Directory Tree
Here is the complete file structure of the `manifesta-theme`:

```text
C:\LARAGON\WWW\MANIFESTA\WP-CONTENT\THEMES\MANIFESTA-THEME
├── archive-course.php
├── footer.php
├── functions.php
├── header.php
├── index.php
├── single-course.php
├── single-faculty.php
├── style.css
├── assets/
│   ├── css/
│   │   ├── editor.css
│   │   └── main.css
│   └── js/
│       ├── alpine.min.js
│       └── main.js
├── inc/
│   ├── acf-fields.php
│   ├── acf-options.php
│   ├── cpt.php
│   ├── enqueue.php
│   ├── helpers.php
│   ├── menus.php
│   └── widgets.php
├── page-templates/
│   ├── page-contact.php
│   ├── page-courses.php
│   ├── page-faculty.php
│   └── page-home.php
└── template-parts/
    ├── breadcrumb.php
    ├── courses-grid.php
    ├── cta-banner.php
    ├── faculty-grid.php
    ├── hero.php
    ├── stats-bar.php
    ├── testimonials.php
    └── why-choose-us.php
```