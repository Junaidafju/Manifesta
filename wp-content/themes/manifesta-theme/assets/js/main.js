/**
 * Manifesta Medical Academy — main.js
 * Lightweight vanilla JS for UI interactions.
 *
 * @package Manifesta
 */

(function () {
  'use strict';

  // ── Back to Top Button ─────────────────────────────────────────────────
  const backToTop = document.getElementById('back-to-top');

  if (backToTop) {
    window.addEventListener('scroll', () => {
      const visible = window.scrollY > 400;
      backToTop.classList.toggle('visible', visible);
    }, { passive: true });

    backToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ── Course Filter (Alpine-free JS fallback) ────────────────────────────
  function initCourseFilter() {
    const filterBtns = document.querySelectorAll('.course-filter__btn');
    const cards = document.querySelectorAll('.course-card[data-categories]');
    if (!filterBtns.length || !cards.length) return;

    filterBtns.forEach(btn => {
      btn.addEventListener('click', function () {
        // Skip real links (archive page uses <a> for URL-based filtering)
        if (this.tagName === 'A') return;

        const filter = this.textContent.trim().toLowerCase();
        filterBtns.forEach(b => b.classList.remove('is-active'));
        this.classList.add('is-active');

        cards.forEach(card => {
          const cats = (card.dataset.categories || 'all').toLowerCase();
          const show = filter === 'all' || cats.includes(filter);
          card.style.display = show ? '' : 'none';
          card.style.opacity = show ? '1' : '0';
        });
      });
    });
  }

  // ── Smooth Scroll for anchor links ────────────────────────────────────
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  }

  // ── Alpine.js mobile menu event ────────────────────────────────────────
  // Alpine listens for x-data and @click on the button (already in header.php).
  // This is a non-Alpine fallback for cases where Alpine hasn't loaded yet.
  function initMobileMenuFallback() {
    const toggle = document.querySelector('.mobile-toggle');
    const mobileNav = document.getElementById('mobile-nav');
    if (!toggle || !mobileNav) return;

    toggle.addEventListener('click', function () {
      const expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', String(!expanded));
      mobileNav.hidden = expanded;
    });
    mobileNav.hidden = true; // hide by default if Alpine isn't controlling it
  }

  // ── Stat counter animation ─────────────────────────────────────────────
  function initStatCounters() {
    const counters = document.querySelectorAll('.stat-item__number[data-count]');
    if (!counters.length) return;

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const target = parseInt(el.dataset.count, 10);
        const display = el.textContent;
        const suffix = display.replace(String(target), '');
        let current = 0;
        const step = Math.ceil(target / 60);
        const timer = setInterval(() => {
          current = Math.min(current + step, target);
          el.textContent = current + suffix;
          if (current >= target) clearInterval(timer);
        }, 25);
        observer.unobserve(el);
      });
    }, { threshold: 0.5 });

    counters.forEach(c => observer.observe(c));
  }

  // ── Header shrink on scroll (non-Alpine fallback) ──────────────────────
  function initHeaderScroll() {
    const header = document.getElementById('site-header');
    if (!header) return;
    let ticking = false;
    window.addEventListener('scroll', () => {
      if (!ticking) {
        requestAnimationFrame(() => {
          header.classList.toggle('site-header--scrolled', window.scrollY > 60);
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });
  }

  // ── Init all ──────────────────────────────────────────────────────────
  document.addEventListener('DOMContentLoaded', () => {
    initCourseFilter();
    initSmoothScroll();
    initMobileMenuFallback();
    initStatCounters();
    initHeaderScroll();
  });

})();
