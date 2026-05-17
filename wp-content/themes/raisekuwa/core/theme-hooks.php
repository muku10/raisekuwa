<?php
/**
 * Rai's Sekuwa Corner — template hooks.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ------------------------------------------------------------------
 * Header CSS overrides (mirrors the <style data-theme-css> block
 * from index.html — drives the scroll-shrink animation).
 * ------------------------------------------------------------------ */
add_action( 'wp_head', function () {
	?>
	<style data-theme-css>
		/* Header base */
		header[data-site-header]{
			position:fixed;top:0;left:0;right:0;z-index:50;
			transition:background-color .5s ease,box-shadow .5s ease,border-color .5s ease;
			color:#fff;
			background:linear-gradient(to bottom,rgba(0,0,0,.70),rgba(0,0,0,.40),transparent);
		}
		/* Scrolled state */
		header[data-site-header].is-scrolled{
			background:rgba(10,9,7,.95) !important;
			backdrop-filter:blur(20px);
			-webkit-backdrop-filter:blur(20px);
			border-bottom:1px solid rgba(255,255,255,.10);
			box-shadow:0 10px 30px -10px rgba(0,0,0,.4);
		}
		header[data-site-header].is-scrolled [data-header-row]{padding-top:.75rem !important;padding-bottom:.75rem !important;}
		header[data-site-header].is-scrolled [data-brand-img]{height:2.5rem !important;filter:none !important;}
		header[data-site-header].is-scrolled [data-brand-text]{font-size:.75rem !important;}
		@media(min-width:1024px){
			header[data-site-header].is-scrolled [data-brand-text]{font-size:.875rem !important;}
		}
		/* While the mobile drawer is open, remove the header's backdrop
		   filter — a filtered ancestor traps the drawer's fixed positioning
		   and collapses it to the header height once the page is scrolled. */
		header[data-site-header].drawer-open{
			backdrop-filter:none !important;
			-webkit-backdrop-filter:none !important;
		}
		/* Mobile drawer transitions */
		[data-mobile-drawer]{transition:opacity .3s ease;}
		[data-drawer-panel]{transition:transform .5s cubic-bezier(.16,1,.3,1);}
	</style>
	<?php
}, 5 );

/* ------------------------------------------------------------------
 * Legacy template-part hooks (kept for any theme-part that calls them)
 * ------------------------------------------------------------------ */
if ( ! function_exists( 'raisekuwa_output_header' ) ) {
	function raisekuwa_output_header() { get_header(); }
}
if ( ! function_exists( 'raisekuwa_output_footer' ) ) {
	function raisekuwa_output_footer() { get_footer(); }
}
