<?php
/**
 * Template Name: Contact Page
 *
 * All content is editable in the "Contact Page" ACF field group
 * (visible once this template is assigned to a page).
 *
 * @package raisekuwa
 */

get_header();

/* ── Hero ───────────────────────────────────────────────── */
$hero_bg     = get_field( 'contact_hero_bg' );
$hero_bg_url = is_array( $hero_bg ) ? ( $hero_bg['url'] ?? '' ) : $hero_bg;
if ( ! $hero_bg_url ) {
	$hero_bg_url = get_template_directory_uri() . '/assets/images/parallax-grill-CQrKh_B_.jpg';
}
$hero_sub   = get_field( 'contact_hero_subtitle' )    ?: ' ';
$hero_title = get_field( 'contact_hero_title' )       ?: '';
$hero_desc  = get_field( 'contact_hero_description' ) ?: "";

/* ── Contact details ────────────────────────────────────── */
$det_sub   = get_field( 'contact_details_subtitle' ) ?: '';
$det_title = get_field( 'contact_details_title' )    ?: '';
$address   = get_field( 'contact_address' )          ?: "";
$phone_1   = get_field( 'contact_phone_1' )          ?: '';
$phone_2   = get_field( 'contact_phone_2' )          ?: '';
$email     = get_field( 'contact_email' )            ?: '';
$hours_raw = get_field( 'contact_hours' )            ?: "";
$dir_url   = get_field( 'contact_directions_url' )   ?: '';
$map_url   = get_field( 'contact_map_embed_url' )    ?: '';

/* ── Form section ───────────────────────────────────────── */
$form_sub   = get_field( 'contact_form_subtitle' )    ?: '';
$form_title = get_field( 'contact_form_title' )       ?: '';
$form_desc  = get_field( 'contact_form_description' ) ?: "";

/* tel: href from a display number, e.g. "07 5527 5944" → tel:0755275944 */
$tel = static function ( $num ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $num );
};

/* "Day | Time" lines → array of [ day, time ] pairs */
$hours = array();
foreach ( preg_split( '/\r\n|\r|\n/', (string) $hours_raw ) as $line ) {
	if ( ! trim( $line ) ) {
		continue;
	}
	$parts   = array_map( 'trim', explode( '|', $line, 2 ) );
	$hours[] = array( $parts[0] ?? '', $parts[1] ?? '' );
}
?>

<main>
  <section class="relative pt-40 pb-24 lg:pt-52 lg:pb-32 overflow-hidden text-white">
    <div class="absolute inset-0">
      <img src="<?php echo esc_url( $hero_bg_url ); ?>" alt="" aria-hidden="true" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-background"></div>
    </div>
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-chili-D48owxuK.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-24 right-10 w-24 opacity-70" style="transform: translate3d(0px, 77.9px, 0px) rotate(-63.7deg); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-tomato-CXuafqOm.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-12 left-10 w-20 opacity-60" style="transform: translate3d(0px, 0.4px, 0px) rotate(-0.3deg); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
    <div class="container relative text-center max-w-3xl"><span class="text-primary uppercase text-xs tracking-[0.4em]"><?php echo esc_html( $hero_sub ); ?></span>
      <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4 leading-tight"><?php echo wp_kses_post( $hero_title ); ?></h1>
      <p class="text-white/75 mt-6 max-w-xl mx-auto leading-relaxed"><?php echo esc_html( $hero_desc ); ?></p>
    </div>
  </section>
  <section id="contact" class="py-20 lg:py-28 bg-background">
    <div class="container grid lg:grid-cols-5 gap-10">
      <div class="reveal lg:col-span-2 in-view" style="transition-delay: 0ms;"><span class="text-primary uppercase text-xs tracking-[0.4em]"><?php echo esc_html( $det_sub ); ?></span>
        <h2 class="font-serif text-3xl sm:text-4xl mt-4 mb-8"><?php echo wp_kses_post( $det_title ); ?></h2>
        <div class="space-y-6">
          <div class="flex gap-4">
            <div class="w-11 h-11 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-5 h-5"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg></div>
            <div>
              <div class="text-xs uppercase tracking-[0.25em] text-muted-foreground mb-1">Address</div>
              <div class="text-foreground/85 leading-relaxed"><?php echo nl2br( esc_html( $address ) ); ?></div>
            </div>
          </div>
          <div class="flex gap-4">
            <div class="w-11 h-11 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-5 h-5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></div>
            <div>
              <div class="text-xs uppercase tracking-[0.25em] text-muted-foreground mb-1">Phone</div>
              <div class="text-foreground/85 leading-relaxed"><a href="<?php echo esc_attr( $tel( $phone_1 ) ); ?>" class="hover:text-primary"><?php echo esc_html( $phone_1 ); ?></a><?php if ( $phone_2 ) : ?><br><a href="<?php echo esc_attr( $tel( $phone_2 ) ); ?>" class="hover:text-primary"><?php echo esc_html( $phone_2 ); ?></a><?php endif; ?></div>
            </div>
          </div>
          <div class="flex gap-4">
            <div class="w-11 h-11 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-5 h-5"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg></div>
            <div>
              <div class="text-xs uppercase tracking-[0.25em] text-muted-foreground mb-1">Email</div>
              <div class="text-foreground/85 leading-relaxed"><a href="<?php echo esc_attr( 'mailto:' . $email ); ?>" class="hover:text-primary break-all"><?php echo esc_html( $email ); ?></a></div>
            </div>
          </div>
          <div class="flex gap-4">
            <div class="w-11 h-11 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-5 h-5"><circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg></div>
            <div>
              <div class="text-xs uppercase tracking-[0.25em] text-muted-foreground mb-1">Opening Hours</div>
              <div class="text-foreground/85 leading-relaxed">
                <div class="space-y-1 text-sm">
                  <?php foreach ( $hours as $row ) : ?>
                    <div class="flex justify-between gap-6"><span><?php echo esc_html( $row[0] ); ?></span><span><?php echo esc_html( $row[1] ); ?></span></div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div><a href="<?php echo esc_url( $dir_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn-fire inline-flex mt-8 px-7 py-3.5 text-xs font-semibold uppercase tracking-widest text-primary-foreground items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-navigation w-4 h-4">
            <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
          </svg> <span>Get Directions</span></a>
      </div>
      <div class="reveal lg:col-span-3 in-view" style="transition-delay: 150ms;">
        <div class="aspect-[4/3] lg:aspect-auto lg:h-full overflow-hidden border border-border shadow-card">
          <iframe title="Rai's Sekuwa Corner location" src="<?php echo esc_url( $map_url ); ?>" class="w-full h-full" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </section>
  <section id="message-us" class="py-20 lg:py-28 bg-card/40 border-t border-border">
    <div class="container max-w-3xl">
      <div class="reveal " style="transition-delay: 0ms;">
        <div class="text-center mb-10"><span class="text-primary uppercase text-xs tracking-[0.4em]"><?php echo esc_html( $form_sub ); ?></span>
          <h2 class="font-serif text-3xl sm:text-4xl mt-4"><?php echo wp_kses_post( $form_title ); ?></h2>
          <p class="text-muted-foreground mt-4"><?php echo esc_html( $form_desc ); ?></p>
        </div>
      </div>
      <div class="reveal " style="transition-delay: 120ms;">
        <?php
        /*
         * Contact Form 7 — paste the matching form markup (see the
         * "Contact form" definition supplied with this build) into a new
         * CF7 form, then replace the id below with that form's id.
         */
        echo do_shortcode( '[contact-form-7 id="2154b98" title="contact Form"]' );
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
