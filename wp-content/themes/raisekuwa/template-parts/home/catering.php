<?php
/**
 * Template Part: Home — Catering Parallax Banner
 *
 * Dynamic via ACF; static fallback keeps layout intact.
 * Matches the parallax catering section in index.html exactly.
 *
 * @package raisekuwa
 */

$bg       = get_field( 'catering_bg_image' );
$bg_url   = is_array( $bg ) ? esc_url( $bg['url'] ) : $bg ;
$subtitle = get_field( 'catering_subtitle' );
$title    = get_field( 'catering_title' )    ;
$desc     = get_field( 'catering_description' ) ;
$btn_text = get_field( 'catering_btn_text' ) ;
$btn_link = get_field( 'catering_btn_link' ) ;
?>
<section class="relative h-[70vh] min-h-[500px] w-full overflow-hidden">

  <!-- Parallax image layer (JS theme.js drives the translate3d) -->
  <div class="absolute inset-0 -top-24 -bottom-24" data-parallax-img>
    <img src="<?php echo $bg_url; ?>" alt="Charcoal sekuwa grilling" loading="lazy" class="w-full h-full object-cover">
  </div>

  <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/70"></div>

  <div class="relative z-10 container h-full flex flex-col items-center justify-center text-center text-white">

    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-10 h-10 text-primary mb-6 animate-pulse"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>

    <p class="uppercase tracking-[0.5em] text-xs text-primary mb-5"><?php echo esc_html( $subtitle ); ?></p>

    <h2 class="font-serif text-4xl sm:text-6xl lg:text-7xl max-w-4xl leading-tight"><?php echo wp_kses_post( $title ); ?></h2>

    <p class="mt-6 max-w-2xl text-white/80 text-lg"><?php echo esc_html( $desc ); ?></p>

    <div class="flex flex-wrap justify-center gap-4 mt-8">
      <a href="<?php echo esc_url( $btn_link ); ?>" class="btn-fire px-8 py-4 text-xs font-semibold uppercase tracking-widest text-primary-foreground">
        <span><?php echo esc_html( $btn_text ); ?></span>
      </a>
    </div>

  </div>
</section>
