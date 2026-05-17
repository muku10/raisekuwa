<?php
/**
 * Rai's Sekuwa Corner — scripts and styles.
 *
 * The theme renders from the SAME compiled stylesheet the static site
 * uses (assets/css/index-Cr743ajk.css). No runtime Tailwind CDN — that
 * keeps rendering pixel-identical to the static design.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function raisekuwa_scripts() {

	/* ------------------------------------------------------------------ */
	/*  Google Fonts                                                        */
	/* ------------------------------------------------------------------ */
	wp_enqueue_style(
		'raisekuwa-google-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@400;500;600;700;800;900&family=Cinzel+Decorative:wght@700&display=swap',
		[],
		null
	);

	/* ------------------------------------------------------------------ */
	/*  Theme stylesheet (style.css — header metadata, resets, CF7 styles)  */
	/* ------------------------------------------------------------------ */
	wp_enqueue_style( 'raisekuwa-style', get_stylesheet_uri(), [], '1.0.0' );

	/* ------------------------------------------------------------------ */
	/*  Main compiled CSS — the exact stylesheet the static site ships.     */
	/*  Contains every Tailwind utility, design token, gradient, btn-fire   */
	/*  and input-fire class the markup uses.                               */
	/* ------------------------------------------------------------------ */
	wp_enqueue_style(
		'raisekuwa-theme',
		get_template_directory_uri() . '/assets/css/index-Cr743ajk.css',
		[ 'raisekuwa-style' ],
		'1.0.0'
	);

	/* ------------------------------------------------------------------ */
	/*  Theme JS — header scroll, mobile drawer, scroll-reveal, smooth      */
	/*  scroll, date pickers, tab snapshots.                                */
	/* ------------------------------------------------------------------ */
	wp_enqueue_script(
		'raisekuwa-theme-js',
		get_template_directory_uri() . '/assets/js/theme.js',
		[],
		'1.0.0',
		true
	);

	/* ------------------------------------------------------------------ */
	/*  Testimonial slider — inline, runs alongside theme.js.               */
	/* ------------------------------------------------------------------ */
	wp_add_inline_script( 'raisekuwa-theme-js', "
		(function(){
			var slider = document.querySelector('[data-testimonial-slider]');
			if(!slider) return;

			var track     = slider.querySelector('[data-slider-track]');
			var dots      = Array.from(document.querySelectorAll('[data-dot]'));
			var prevBtn   = document.querySelector('[data-slider-prev]');
			var nextBtn   = document.querySelector('[data-slider-next]');
			var slides    = Array.from(track.children);
			var perPage   = window.innerWidth < 768 ? 1 : window.innerWidth < 1024 ? 2 : 3;
			var current   = 0;
			var total     = Math.ceil(slides.length / perPage);

			function go(idx){
				current = Math.max(0, Math.min(idx, total - 1));
				var pct = current * (100 / total);
				track.style.transform = 'translateX(-' + pct + '%)';
				dots.forEach(function(d,i){ d.className = 'h-1.5 transition-all ' + (i === current ? 'w-8 bg-primary' : 'w-4 bg-border'); });
			}

			if(prevBtn) prevBtn.addEventListener('click', function(){ go(current - 1); });
			if(nextBtn) nextBtn.addEventListener('click', function(){ go(current + 1); });
			dots.forEach(function(d){ d.addEventListener('click', function(){ go(parseInt(d.dataset.dot)); }); });

			/* Auto-advance */
			setInterval(function(){ go((current + 1) % total); }, 5000);
		})();
	" );
}
add_action( 'wp_enqueue_scripts', 'raisekuwa_scripts' );
