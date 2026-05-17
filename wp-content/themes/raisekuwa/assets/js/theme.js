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

  /* ---------- 6. Tab snapshots (Menu / Gallery) ---------- */
  var dataNode = document.querySelector('script[data-tabs-data]');
  if (dataNode) {
    try {
      var TABS = JSON.parse(dataNode.textContent || '{}');
      Object.keys(TABS).forEach(function (sel) {
        var section = document.querySelector(sel);
        if (!section) return;
        var variants = TABS[sel];
        section.addEventListener('click', function (e) {
          var btn = e.target.closest && e.target.closest('button');
          if (!btn || !section.contains(btn)) return;
          var label = (btn.textContent || '').trim();
          if (!variants[label]) return;
          e.preventDefault();
          section.innerHTML = variants[label];
          section.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(function (el) {
            el.classList.add('in-view');
          });
        });
      });
    } catch (err) { /* noop */ }
  }
})();
