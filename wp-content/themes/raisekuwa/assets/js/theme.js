/*!
 * Rai's Sekuwa Corner — vanilla theme.js
 * Replaces all React interactivity. Drop-in for WordPress themes.
 * Handles: header scroll state, mobile drawer, scroll-reveal animations,
 * date pickers, smooth-scroll, and keeps native form POST to sendmail.php.
 */
(function () {
  'use strict';

  /* ---------- 1. Header scroll state ---------- */
  // Adds .is-scrolled to <header data-site-header> after 60px of scroll.
  // Paired CSS overrides live inside the <style data-theme-css> block.
  var header = document.querySelector('header[data-site-header]');
  if (header) {
    var onScroll = function () {
      if (window.scrollY > 60) header.classList.add('is-scrolled');
      else header.classList.remove('is-scrolled');
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ---------- 2. Mobile drawer ---------- */
  var drawer    = document.querySelector('[data-mobile-drawer]');
  var aside     = drawer && drawer.querySelector('[data-drawer-panel]');
  var backdrop  = drawer && drawer.querySelector('[data-drawer-backdrop]');
  var openBtn   = document.querySelector('[data-drawer-open]');
  var closeBtns = document.querySelectorAll('[data-drawer-close]');
  function setDrawer(open) {
    if (!drawer || !aside) return;
    drawer.classList.toggle('opacity-100', open);
    drawer.classList.toggle('pointer-events-auto', open);
    drawer.classList.toggle('opacity-0', !open);
    drawer.classList.toggle('pointer-events-none', !open);
    aside.classList.toggle('translate-x-0', open);
    aside.classList.toggle('translate-x-full', !open);
    document.body.style.overflow = open ? 'hidden' : '';
  }
  if (openBtn) openBtn.addEventListener('click', function () { setDrawer(true); });
  if (backdrop) backdrop.addEventListener('click', function () { setDrawer(false); });
  closeBtns.forEach(function (b) { b.addEventListener('click', function () { setDrawer(false); }); });

  /* ---------- 3. Scroll reveal ---------- */
  // Adds .in-view to .reveal / .reveal-left / .reveal-right when they enter viewport.
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.classList.add('in-view');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(function (el) {
      io.observe(el);
    });
  } else {
    document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(function (el) {
      el.classList.add('in-view');
    });
  }

  /* ---------- 4. Native date picker open on focus ---------- */
  document.querySelectorAll('input[type="date"]').forEach(function (el) {
    var open = function () { try { el.showPicker && el.showPicker(); } catch (_) {} };
    el.addEventListener('focus', open);
    el.addEventListener('click', open);
  });

  /* ---------- 5. Smooth-scroll for in-page anchors ---------- */
  document.addEventListener('click', function (e) {
    var a = e.target.closest && e.target.closest('a[href^="#"]');
    if (!a) return;
    var id = a.getAttribute('href').slice(1);
    if (!id) return;
    var t = document.getElementById(id);
    if (!t) return;
    e.preventDefault();
    t.scrollIntoView({ behavior: 'smooth', block: 'start' });
  });

  /* ---------- 6. Parallax (element-relative) ---------- */
  // Each .will-change-transform float drifts gently around its OWN anchor
  // point, based on how far that point is from the viewport centre — not
  // the global scroll position. This keeps floats near their section on
  // long pages (e.g. the homepage) instead of sliding far off-screen.
  var parallaxEls = document.querySelectorAll('.will-change-transform');
  if (parallaxEls.length) {
    var speeds = [0.06, -0.05, 0.08, -0.04, 0.07, -0.06];
    var items  = [];

    var measure = function () {
      items.forEach(function (it) {
        // Reset to base position so the measurement is transform-free.
        it.el.style.transform = 'translate3d(0px, 0px, 0px)' + it.rotate;
      });
      items.forEach(function (it) {
        var rect = it.el.getBoundingClientRect();
        it.anchor = rect.top + window.scrollY + rect.height / 2;
      });
    };

    parallaxEls.forEach(function (el, i) {
      var styleStr   = el.getAttribute('style') || '';
      var rotateMtch = styleStr.match(/rotate\([^)]+\)/);
      items.push({
        el: el,
        rotate: rotateMtch ? ' ' + rotateMtch[0] : '',
        speed: speeds[i % speeds.length],
        anchor: 0
      });
    });

    var updateParallax = function () {
      var viewportCenter = window.scrollY + window.innerHeight / 2;
      items.forEach(function (it) {
        var yPos = (viewportCenter - it.anchor) * it.speed;
        it.el.style.transform =
          'translate3d(0px, ' + yPos.toFixed(1) + 'px, 0px)' + it.rotate;
      });
    };

    var ticking = false;
    window.addEventListener('scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(function () {
          updateParallax();
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });

    window.addEventListener('resize', function () {
      measure();
      updateParallax();
    }, { passive: true });

    // Initial measure + paint (re-measure once images have loaded).
    measure();
    updateParallax();
    window.addEventListener('load', function () { measure(); updateParallax(); });
  }
})();
