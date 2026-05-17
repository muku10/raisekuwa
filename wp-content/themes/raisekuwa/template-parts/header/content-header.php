<?php
/**
 * Site header — Rai's Sekuwa Corner.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ─── Logo ───
$logo_url = get_template_directory_uri() . '/assets/images/logo-Cnuh_jvp.png'; // Fallback
$custom_logo_id = get_theme_mod( 'custom_logo' );
if ( $custom_logo_id ) {
	$logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
}

// ─── Primary menu items ───
$menu_items = array();
if ( has_nav_menu( 'primary-menu' ) ) {
	$locations  = get_nav_menu_locations();
	$menu_items = wp_get_nav_menu_items( $locations['primary-menu'] );
}
?>

<header data-site-header>
	<!-- Top Bar -->
	<div class="hidden lg:block border-b border-white/15 transition-colors duration-500 bg-black/30 backdrop-blur-sm">
		<div class="container flex items-center justify-end gap-6 py-2 text-[11px] uppercase tracking-[0.2em]" data-header-row="">
			<a href="tel:+61755275944" class="flex items-center gap-1.5 hover:text-primary transition-colors">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-3.5 h-3.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
				07 5527 5944
			</a>
			<span class="text-white/30">|</span>
			<a href="tel:+61400483912" class="flex items-center gap-1.5 hover:text-primary transition-colors">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-3.5 h-3.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
				0400 483 912
			</a>
			<span class="text-white/30">|</span>
			<a href="https://www.facebook.com/raisekuwacorner/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="hover:text-primary transition-colors">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook w-3.5 h-3.5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
			</a>
			<a href="mailto:info@raisekuwacorner.com.au" aria-label="Email" class="flex items-center gap-1.5 hover:text-primary transition-colors normal-case tracking-normal">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-3.5 h-3.5"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
				info@raisekuwacorner.com.au
			</a>
		</div>
	</div>

	<!-- Main Header -->
	<div class="container flex items-center justify-between gap-6 transition-all duration-500 py-4">
		<!-- Brand Logo -->
		<a class="flex items-center gap-3 transition-all duration-500" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo('name'); ?>" class="w-auto transition-all duration-500 h-16 lg:h-20 drop-shadow-[0_4px_18px_rgba(0,0,0,0.6)]" data-brand-img="">
			<span class="font-display tracking-[0.22em] uppercase whitespace-nowrap transition-all duration-500 text-base lg:text-xl" data-brand-text="">
				<span class="text-primary">Rai's</span> <span class="text-white">Sekuwa Corner</span>
			</span>
		</a>

		<!-- Desktop Nav -->
		<div class="hidden lg:flex items-center gap-8 ml-auto">
			<nav class="flex items-center gap-8">
				<?php if ( ! empty( $menu_items ) ) : ?>
					<?php foreach ( $menu_items as $item ) :
						if ( (int) $item->menu_item_parent !== 0 ) continue;
						$active_class = ( (string) $item->object_id === (string) get_queried_object_id() ) ? 'is-active text-primary' : 'text-white/90';
					?>
						<a class="nav-link relative text-xs uppercase tracking-[0.25em] py-2 transition-colors duration-300 hover:text-primary <?php echo esc_attr( $active_class ); ?>" href="<?php echo esc_url( $item->url ); ?>">
							<span class="relative z-10"><?php echo esc_html( $item->title ); ?></span>
						</a>
					<?php endforeach; ?>
				<?php else : ?>
					<!-- Fallback if no menu assigned -->
					<a class="nav-link relative text-xs uppercase tracking-[0.25em] py-2 transition-colors duration-300 hover:text-primary is-active text-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="relative z-10">Home</span></a>
				<?php endif; ?>
			</nav>
		</div>

		<!-- Mobile Trigger -->
		<button class="lg:hidden relative z-[60] text-current" aria-label="Menu" data-drawer-open="">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
		</button>
	</div>

	<!-- Mobile Drawer -->
	<div class="lg:hidden fixed inset-0 z-40 transition-opacity duration-300 opacity-0 pointer-events-none" data-mobile-drawer="">
		<div class="absolute inset-0 bg-black/50 backdrop-blur-md" data-drawer-backdrop=""></div>
		<aside class="absolute top-0 right-0 h-full w-[82%] sm:w-[60%] max-w-sm bg-background text-foreground shadow-2xl border-l border-border flex flex-col transform transition-transform duration-500 ease-out translate-x-full" data-drawer-panel="">
			<div class="flex items-center justify-between px-6 py-5 border-b border-border">
				<a class="flex items-center gap-2" href="<?php echo esc_url( home_url( '/' ) ); ?>" data-drawer-close="">
					<img src="<?php echo esc_url( $logo_url ); ?>" alt="Rai's" class="h-9">
					<span class="font-display tracking-[0.2em] uppercase text-xs"><span class="text-primary">Rai's</span> Sekuwa</span>
				</a>
				<button aria-label="Close" class="text-foreground/70 hover:text-primary" data-drawer-close="">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-5 h-5"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
				</button>
			</div>
			<nav class="flex flex-col px-2 py-4">
				<?php if ( ! empty( $menu_items ) ) : ?>
					<?php foreach ( $menu_items as $item ) :
						if ( (int) $item->menu_item_parent !== 0 ) continue;
						$is_active = ( (string) $item->object_id === (string) get_queried_object_id() );
						$item_classes = $is_active ? 'text-primary bg-primary/10 border-l-primary' : 'text-foreground/80 hover:text-primary hover:bg-muted/60';
					?>
						<a class="px-4 py-3.5 text-sm uppercase tracking-[0.22em] border-b border-border/60 flex items-center justify-between group transition-colors border-l-2 <?php echo esc_attr( $item_classes ); ?>" href="<?php echo esc_url( $item->url ); ?>" data-drawer-close="">
							<span><?php echo esc_html( $item->title ); ?></span>
							<span class="text-primary opacity-60 group-hover:opacity-100 transition-opacity">→</span>
						</a>
					<?php endforeach; ?>
				<?php endif; ?>
			</nav>
			<!-- Footer of Drawer -->
			<div class="px-6 mt-2 space-y-2">
				<a href="tel:+61755275944" class="btn-ghost-fire w-full px-5 py-3.5 text-xs font-semibold uppercase tracking-wider flex items-center justify-center gap-2" data-drawer-close="">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
					<span>07 5527 5944</span>
				</a>
			</div>
			<div class="mt-auto px-6 py-6 border-t border-border">
				<p class="text-[10px] uppercase tracking-[0.3em] text-muted-foreground mb-3">Follow Us</p>
				<div class="flex gap-3">
					<a href="https://www.facebook.com/raisekuwacorner/" aria-label="Facebook" class="border border-border p-3 hover:border-primary hover:text-primary transition-colors" data-drawer-close="">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook w-4 h-4"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
					</a>
					<a href="mailto:info@raisekuwacorner.com.au" aria-label="Email" class="border border-border p-3 hover:border-primary hover:text-primary transition-colors" data-drawer-close="">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
					</a>
				</div>
			</div>
		</aside>
	</div>
</header>
