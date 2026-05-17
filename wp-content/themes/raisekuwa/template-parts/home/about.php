<?php
/**
 * Template Part: Home — About Section
 *
 * Dynamic via ACF; static fallback keeps the layout intact even with no data.
 * Matches index.html #about section exactly.
 *
 * @package raisekuwa
 */

$img      = get_field( 'about_image' );
$img_base = esc_url( get_template_directory_uri() ) . '/assets/images/';
$img_url  = is_array( $img ) ? esc_url( $img['url'] ) : ( $img ?: $img_base . 'about-chef-DB7vu_D2.jpg' );
$badge    = get_field( 'about_badge_text' ) ?: ' grilled, every single skewer.';
$subtitle = get_field( 'about_subtitle' )   ?: 'Our Story';
$title    = get_field( 'about_title' )      ?: 'A taste of <span class="text-gradient-fire">home</span>, far from home.';
$desc1    = get_field( 'about_description' );
$desc2    = get_field( 'about_description_2' );

/* Inline SVG icons matching index.html about highlights */
$about_icons = [
	'flame' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-4 h-4"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>',
	'hand'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hand w-4 h-4"><path d="M18 11V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2"/><path d="M14 10V4a2 2 0 0 0-2-2a2 2 0 0 0-2 2v2"/><path d="M10 10.5V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2v8"/><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15"/></svg>',
	'leaf'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-leaf w-4 h-4"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>',
	'users' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
];

/* Static fallback highlights — mirrors index.html exactly */
$about_highlights = [
	[ 'icon' => 'flame', 'title' => 'Real Charcoal' ],
	[ 'icon' => 'hand',  'title' => 'Hand-Folded Daily' ],
	[ 'icon' => 'leaf',  'title' => 'Fresh &amp; Authentic' ],
	[ 'icon' => 'users', 'title' => 'Made for Sharing' ],
];
?>
<section id="about" class="py-24 lg:py-32 relative overflow-hidden bg-secondary/40">

  <!-- Floating decorative images -->
  <img src="<?php echo $img_base; ?>float-skewer-CD5_ADvy.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-10 right-4 w-32 opacity-70" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo $img_base; ?>float-momo-B2nYv8fZ.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-20 left-4 w-28 opacity-60" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo $img_base; ?>float-tomato-CXuafqOm.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-1/2 right-1/4 w-20 opacity-60" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo $img_base; ?>float-garlic-CXkdT1Ri.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-1/3 right-8 w-24 opacity-50" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">

  <div class="container grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

    <!-- Image column -->
    <div class="reveal-left" style="transition-delay:0ms;">
      <div class="relative aspect-[4/5] overflow-hidden shadow-card">
        <img src="<?php echo $img_url; ?>" alt="Chef grilling sekuwa over charcoal" loading="lazy" class="w-full h-full object-cover">
        <div class="absolute -bottom-6 -right-6 bg-gradient-fire text-primary-foreground p-6 lg:p-8 max-w-[220px] shadow-fire">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-8 h-8 mb-3"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>
          <p class="font-serif text-2xl leading-tight"><?php echo wp_kses_post( $badge ); ?></p>
        </div>
      </div>
    </div>

    <!-- Text column -->
    <div class="reveal-right" style="transition-delay:150ms;">
      <span class="text-primary uppercase text-xs tracking-[0.4em]"><?php echo esc_html( $subtitle ); ?></span>
      <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4 mb-6"><?php echo wp_kses_post( $title ); ?></h2>

      <p class="text-foreground/75 text-lg leading-relaxed mb-5">
        <?php echo $desc1 ? wp_kses_post( nl2br( $desc1 ) ) : "Rai's Sekuwa Corner began with a simple promise — to bring the bold, smoky flavours of Nepali street food to Australia, without shortcuts. Every momo is folded by hand. Every sekuwa is marinated overnight and grilled over real charcoal."; ?>
      </p>
      <p class="text-muted-foreground leading-relaxed mb-8">
        <?php echo $desc2 ? wp_kses_post( nl2br( $desc2 ) ) : 'From our kitchen in Southport to your table, our recipes carry the warmth of family, the depth of generations-old spice blends, and the soul of authentic Nepali street food.'; ?>
      </p>

      <!-- Highlight badges -->
      <div class="grid grid-cols-2 gap-3 mb-8">

        <?php if ( have_rows( 'about_highlights' ) ) : ?>

          <?php while ( have_rows( 'about_highlights' ) ) : the_row(); ?>
            <div class="flex items-center gap-3 border-l-2 border-primary/70 pl-3 py-1">
              <div class="w-9 h-9 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground">
                <?php
                $hl_icon = get_sub_field( 'icon' );
                if ( $hl_icon ) :
                  $hl_icon_url = is_array( $hl_icon ) ? $hl_icon['url'] : $hl_icon;
                ?>
                  <img src="<?php echo esc_url( $hl_icon_url ); ?>" alt="<?php echo esc_attr( get_sub_field( 'title' ) ); ?> icon" class="w-6 h-6 object-contain filter brightness-0 invert" />
                <?php endif; ?>
              </div>
              <h3 class="font-serif text-sm sm:text-base uppercase tracking-wide"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
            </div>
          <?php endwhile; ?>

        <?php else : ?>

          <?php foreach ( $about_highlights as $highlight ) : ?>
            <div class="flex items-center gap-3 border-l-2 border-primary/70 pl-3 py-1">
              <div class="w-9 h-9 shrink-0 bg-gradient-fire flex items-center justify-center text-primary-foreground">
                <?php echo $about_icons[ $highlight['icon'] ]; ?>
              </div>
              <h3 class="font-serif text-sm sm:text-base uppercase tracking-wide"><?php echo $highlight['title']; ?></h3>
            </div>
          <?php endforeach; ?>

        <?php endif; ?>

      </div><!-- /highlights grid -->

      <div class="flex flex-wrap gap-4 mt-10">
        <a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="btn-fire text-primary-foreground px-7 py-3.5 text-xs font-semibold uppercase tracking-widest"><span>Contact Us</span></a>
      </div>

    </div><!-- /text column -->

  </div>
</section>
