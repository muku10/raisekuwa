<?php
/**
 * Rai's Sekuwa Corner — scripts and styles.
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
	/*  Tailwind CSS — fire/warm palette that matches the static site       */
	/* ------------------------------------------------------------------ */
	wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com', [], null, false );

	wp_add_inline_script( 'tailwindcss', "
		tailwind.config = {
			theme: {
				container: {
					center: true,
					padding: '1rem',
				},
				extend: {
					colors: {
						background:  'hsl(30 20% 7%)',
						foreground:  'hsl(38 30% 92%)',
						border:      'hsl(30 12% 18%)',
						card:        { DEFAULT: 'hsl(28 18% 10%)' },
						muted: {
							DEFAULT:    'hsl(30 12% 15%)',
							foreground: 'hsl(38 15% 58%)'
						},
						secondary: { DEFAULT: 'hsl(28 14% 12%)' },
						primary: {
							DEFAULT:    'hsl(22 96% 55%)',
							foreground: 'hsl(30 20% 7%)',
							glow:       'hsl(38 100% 65%)'
						}
					},
					fontFamily: {
						display: ['Cinzel Decorative','serif'],
						serif:   ['Playfair Display','Georgia','serif'],
						sans:    ['Inter','system-ui','sans-serif']
					},
					boxShadow: {
						soft:  '0 4px 24px -8px rgba(0,0,0,0.5)',
						card:  '0 8px 40px -12px rgba(0,0,0,0.6)',
						fire:  '0 8px 30px -6px hsl(22 96% 55% / 0.5)'
					}
				}
			}
		}
	" );

	/* ------------------------------------------------------------------ */
	/*  Theme stylesheet (style.css — header metadata + minimal resets)     */
	/* ------------------------------------------------------------------ */
	wp_enqueue_style( 'raisekuwa-style', get_stylesheet_uri(), [], '1.0.0' );

	/* ------------------------------------------------------------------ */
	/*  Main compiled CSS — design tokens, gradients, btn-fire, input-fire  */
	/* ------------------------------------------------------------------ */
	wp_enqueue_style(
		'raisekuwa-theme',
		get_template_directory_uri() . '/assets/css/index-Cr743ajk.css',
		[ 'raisekuwa-style' ],
		'1.0.0'
	);

	/* ------------------------------------------------------------------ */
	/*  Scroll-reveal observer (front page + all template pages)            */
	/* ------------------------------------------------------------------ */
	wp_add_inline_script( 'tailwindcss', "(function(){
		var obs = new IntersectionObserver(function(entries){
			entries.forEach(function(e){
				if(e.isIntersecting){ e.target.classList.add('in-view'); obs.unobserve(e.target); }
			});
		},{threshold:0.12,rootMargin:'0px 0px -10px 0px'});
		document.querySelectorAll('.reveal,.reveal-left,.reveal-right').forEach(function(el){ obs.observe(el); });
	})();" );

	/* ------------------------------------------------------------------ */
	/*  Theme JS — header scroll, mobile drawer, parallax, testimonial     */
	/*  slider.  Falls back gracefully if the file is absent.              */
	/* ------------------------------------------------------------------ */
	$theme_js = get_template_directory_uri() . '/assets/js/theme.js';
	wp_enqueue_script( 'raisekuwa-theme-js', $theme_js, [], '1.0.0', true );

	/* ------------------------------------------------------------------ */
	/*  Testimonial slider — works alongside or without theme.js           */
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
				track.style.transform = 'translateX(-' + (current * perPage * (100 / slides.length) * (slides.length / perPage)) + '%)';
				/* simpler: move by card width */
				var cardW = slides[0].offsetWidth + parseInt(getComputedStyle(slides[0]).paddingLeft) * 2;
				track.style.transform = 'translateX(-' + (current * perPage * (100 / slides.length) * slides.length / perPage) + '%)';
				/* use percentage of the full track */
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

	/* ------------------------------------------------------------------ */
	/*  WooCommerce overrides                                               */
	/* ------------------------------------------------------------------ */
	if ( class_exists( 'WooCommerce' ) ) {
		$woo_css = get_template_directory() . '/assets/css/woocommerce.css';
		if ( file_exists( $woo_css ) ) {
			wp_enqueue_style(
				'raisekuwa-woocommerce',
				get_template_directory_uri() . '/assets/css/woocommerce.css',
				[],
				'1.0.0'
			);
		}

		wp_add_inline_script( 'jquery', "
			jQuery(document).on('click', '.nkc-qty-btn', function(e) {
				e.preventDefault();
				var btn   = jQuery(this),
				    input = btn.closest('.quantity').find('.qty'),
				    val   = parseFloat(input.val()) || 0,
				    max   = parseFloat(input.attr('max'))  || 9999,
				    min   = parseFloat(input.attr('min'))  || 0,
				    step  = parseFloat(input.attr('step')) || 1;
				if (btn.hasClass('nkc-qty-minus')) {
					input.val(Math.max(min, val - step));
				} else {
					input.val(Math.min(max, val + step));
				}
				input.trigger('change');
			});
		" );
	}
}
add_action( 'wp_enqueue_scripts', 'raisekuwa_scripts' );
