<?php
/**
 * Site footer — Rai's Sekuwa Corner.
 *
 * Contact details (phone, email, address, hours, WhatsApp, Facebook)
 * come from the ACF "Theme Settings" options page.
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ─── Branding ───
$logo_url = get_template_directory_uri() . '/assets/images/logo-Cnuh_jvp.png'; // Fallback
$custom_logo_id = get_theme_mod( 'custom_logo' );
if ( $custom_logo_id ) {
	$logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
}

// ─── Contact details (ACF options page) ───
$contact      = raisekuwa_contact_info();
$footer_hours = raisekuwa_parse_hours( $contact['hours'] );
$whatsapp_num = preg_replace( '/[^0-9]/', '', (string) $contact['whatsapp'] );

// ─── Resolve Menus ───
$resolve_menu = function ( $location ) {
	if ( ! has_nav_menu( $location ) ) return null;
	$locations = get_nav_menu_locations();
	$menu_id   = $locations[ $location ] ?? 0;
	if ( ! $menu_id ) return null;

	$menu_obj = wp_get_nav_menu_object( $menu_id );
	$items    = wp_get_nav_menu_items( $menu_id );
	if ( empty( $items ) ) return null;

	return array(
		'title' => $menu_obj && ! is_wp_error( $menu_obj ) ? $menu_obj->name : '',
		'items' => $items,
	);
};

$explore_menu = $resolve_menu( 'footer-menu-1' );
$items_menu   = $resolve_menu( 'footer-menu-2' );
?>

<footer class="relative bg-[#0a0907] text-white/85 overflow-hidden">
	<!-- Background Effects -->
	<div class="absolute inset-0 opacity-[0.06] pointer-events-none" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/footer-doodle-BEgx84bu.jpg'); background-size: 600px; background-repeat: repeat;"></div>
	<div class="absolute inset-0 grid grid-cols-2 md:grid-cols-4 opacity-[0.05] pointer-events-none">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dish-pork-sekuwa-UsHZk42q.jpg" alt="" aria-hidden="true" class="w-full h-full object-cover">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dish-jhol-momo-FxaofV9U.jpg" alt="" aria-hidden="true" class="w-full h-full object-cover">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dish-chilli-beef-B9RENlKi.jpg" alt="" aria-hidden="true" class="w-full h-full object-cover">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dish-thukpa-DN9Z8tRD.jpg" alt="" aria-hidden="true" class="w-full h-full object-cover">
	</div>
	<div class="absolute inset-0 bg-gradient-to-b from-[#0a0907]/90 via-[#0a0907]/85 to-[#0a0907] pointer-events-none"></div>

	<!-- WhatsApp Floating Button -->
	<?php if ( $whatsapp_num ) : ?>
	<a href="https://wa.me/<?php echo esc_attr( $whatsapp_num ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp" class="fixed bottom-6 right-6 z-50 bg-[#25D366] hover:bg-[#1ebe5a] text-white w-14 h-14 rounded-full flex items-center justify-center shadow-[0_10px_30px_-5px_rgba(37,211,102,0.6)] hover:scale-110 transition-transform float-med">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle w-6 h-6"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path></svg>
	</a>
	<?php endif; ?>

	<div class="relative container pt-20 pb-12">
		<div class="grid md:grid-cols-2 lg:grid-cols-5 gap-12 mb-14">
			<!-- Col 1: Branding -->
			<div class="lg:col-span-2">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 mb-5">
					<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo('name'); ?>" class="h-14">
					<span class="font-display tracking-[0.22em] uppercase text-lg lg:text-xl"><span class="text-primary">Rai's</span> <span class="text-white">Sekuwa Corner</span></span>
				</a>
				<p class="text-white/60 max-w-sm leading-relaxed">
					<?php echo esc_html( get_bloginfo( 'description' ) ?: 'Authentic Nepali Sekuwa, hand-folded momo and bold street food, grilled fresh over real charcoal in Southport, Queensland.' ); ?>
				</p>
				<div class="flex gap-3 mt-6">
					<?php if ( $contact['facebook'] ) : ?>
					<a href="<?php echo esc_url( $contact['facebook'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="border border-white/15 bg-white/5 p-3 hover:border-primary hover:text-primary transition-colors">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook w-4 h-4"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
					</a>
					<?php endif; ?>
					<?php if ( $contact['instagram'] ) : ?>
					<a href="<?php echo esc_url( $contact['instagram'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="border border-white/15 bg-white/5 p-3 hover:border-primary hover:text-primary transition-colors">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram w-4 h-4"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>
					</a>
					<?php endif; ?>
					<?php if ( $contact['email'] ) : ?>
					<a href="<?php echo esc_attr( 'mailto:' . $contact['email'] ); ?>" aria-label="Email" class="border border-white/15 bg-white/5 p-3 hover:border-primary hover:text-primary transition-colors">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
					</a>
					<?php endif; ?>
				</div>
			</div>

			<!-- Col 2: Explore Menu (Dynamic) -->
			<div>
				<h4 class="font-serif text-lg mb-5 text-white"><?php echo esc_html( $explore_menu['title'] ?? 'Explore' ); ?></h4>
				<ul class="space-y-3 text-white/60 text-sm">
					<?php if ( ! empty( $explore_menu['items'] ) ) : ?>
						<?php foreach ( $explore_menu['items'] as $item ) : ?>
							<li><a href="<?php echo esc_url( $item->url ); ?>" class="hover:text-primary transition-colors"><?php echo esc_html( $item->title ); ?></a></li>
						<?php endforeach; ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url( site_url( '/about' ) ); ?>" class="hover:text-primary">About</a></li>
						<li><a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="hover:text-primary">Contact</a></li>
					<?php endif; ?>
				</ul>
			</div>

			<!-- Col 3: Food Menu (Dynamic) -->
			<div>
				<h4 class="font-serif text-lg mb-5 text-white"><?php echo esc_html( $items_menu['title'] ?? 'Menu' ); ?></h4>
				<ul class="space-y-3 text-white/60 text-sm">
					<?php if ( ! empty( $items_menu['items'] ) ) : ?>
						<?php foreach ( $items_menu['items'] as $item ) : ?>
							<li><a href="<?php echo esc_url( $item->url ); ?>" class="hover:text-primary transition-colors"><?php echo esc_html( $item->title ); ?></a></li>
						<?php endforeach; ?>
					<?php else : ?>
						<li><a href="<?php echo esc_url( site_url( '/menu' ) ); ?>" class="hover:text-primary">Sekuwa (BBQ)</a></li>
						<li><a href="<?php echo esc_url( site_url( '/menu' ) ); ?>" class="hover:text-primary">Momo</a></li>
					<?php endif; ?>
				</ul>
			</div>

			<!-- Col 4: Info -->
			<div>
				<h4 class="font-serif text-lg mb-5 text-white">Visit Us</h4>
				<ul class="space-y-3 text-white/60 text-sm">
					<?php if ( $contact['address'] ) : ?>
					<li class="flex items-start gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-4 h-4 mt-0.5 text-primary shrink-0"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
						<span><?php echo nl2br( esc_html( $contact['address'] ) ); ?></span>
					</li>
					<?php endif; ?>
					<?php if ( $contact['phone_primary'] ) : ?>
					<li class="flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4 text-primary shrink-0"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
						<a href="<?php echo esc_attr( raisekuwa_tel_href( $contact['phone_primary'] ) ); ?>" class="hover:text-primary"><?php echo esc_html( $contact['phone_primary'] ); ?></a>
					</li>
					<?php endif; ?>
					<?php if ( $contact['email'] ) : ?>
					<li class="flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4 text-primary shrink-0"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
						<a href="<?php echo esc_attr( 'mailto:' . $contact['email'] ); ?>" class="hover:text-primary break-all"><?php echo esc_html( $contact['email'] ); ?></a>
					</li>
					<?php endif; ?>
				</ul>
				<?php if ( $footer_hours ) : ?>
				<h4 class="font-serif text-lg mt-7 mb-4 text-white flex items-center gap-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-4 h-4 text-primary"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
					Opening Hours
				</h4>
				<ul class="space-y-2 text-white/60 text-sm">
					<?php foreach ( $footer_hours as $row ) : ?>
						<li class="flex justify-between gap-3"><span><?php echo esc_html( $row[0] ); ?></span><span class="text-white/80"><?php echo esc_html( $row[1] ); ?></span></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Bottom Bar -->
	<div class="relative bg-black border-t border-white/10">
		<div class="container py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/55">
			<p class="flex items-center gap-2">
				© <?php echo date( 'Y' ); ?> Rai's Sekuwa Corner. All rights reserved.
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-3 h-3 text-primary"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path></svg>
			</p>
			<p class="flex items-center gap-1.5">
				Cooked with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-3 h-3 text-primary fill-primary"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></svg> love by
				<a href="https://mysisco.com" target="_blank" rel="noopener noreferrer" class="text-white hover:text-primary font-semibold">MySisco ICT</a>
			</p>
		</div>
	</div>
</footer>
