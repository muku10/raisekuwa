<?php
/**
 * Template Part: Home — Intro Section
 *
 * Shows a welcome text block and a 3×2 feature-card grid.
 * Reads from ACF fields; falls back to static content when ACF
 * data is not yet entered so the page never looks empty.
 *
 * @package raisekuwa
 */

$subtitle = get_field( 'intro_subtitle' ) ?: 'Welcome to Rai\'s Sekuwa Corner';
$title    = get_field( 'intro_title' )    ?: 'Come &amp; experience the best of <span class="text-gradient-fire">Nepali flavours</span>.';
$desc     = get_field( 'intro_description' );

/* Inline SVG icons matching index.html feature cards */
$intro_icons = [
	'flame'            => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-5 h-5"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>',
	'utensils-crossed' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils-crossed w-5 h-5"><path d="m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8"/><path d="M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7"/><path d="m2.1 21.8 6.4-6.3"/><path d="m19 5-7 7"/></svg>',
	'soup'             => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-soup w-5 h-5"><path d="M12 21a9 9 0 0 0 9-9H3a9 9 0 0 0 9 9Z"/><path d="M7 21h10"/><path d="M19.5 12 22 6"/><path d="M16.25 3c.27.1.8.53.75 1.36-.06.83-.93 1.2-1 2.02-.05.78.34 1.24.73 1.62"/><path d="M11.25 3c.27.1.8.53.74 1.36-.05.83-.93 1.2-.98 2.02-.06.78.33 1.24.72 1.62"/><path d="M6.25 3c.27.1.8.53.75 1.36-.06.83-.93 1.2-1 2.02-.05.78.34 1.24.74 1.62"/></svg>',
	'wine'             => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wine w-5 h-5"><path d="M8 22h8"/><path d="M7 10h10"/><path d="M12 15v7"/><path d="M12 15a5 5 0 0 0 5-5c0-2-.5-4-2-8H9c-1.5 4-2 6-2 8a5 5 0 0 0 5 5Z"/></svg>',
	'drumstick'        => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-drumstick w-5 h-5"><path d="M15.4 15.63a7.875 6 135 1 1 6.23-6.23 4.5 3.43 135 0 0-6.23 6.23"/><path d="m8.29 12.71-2.6 2.6a2.5 2.5 0 1 0-1.65 4.65A2.5 2.5 0 1 0 8.7 18.3l2.59-2.59"/></svg>',
	'menu'             => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-5 h-5"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>',
];

/* Static fallback feature cards — mirrors index.html exactly */
$intro_features = [
	[ 'icon' => 'flame',            'title' => 'Authentic Nepali BBQ',                       'description' => 'Expertly grilled meat marinated in traditional Nepali spices, cooked to perfection in true street-food style. Taste the smokey, spicy essence of Nepal in every bite.' ],
	[ 'icon' => 'utensils-crossed', 'title' => 'Variety of Traditional Momo',                'description' => 'From classic steamed to jhol (soup) and chilli momo, experience the most beloved Nepali comfort food, handcrafted fresh and bursting with flavour.' ],
	[ 'icon' => 'soup',             'title' => 'Nepali Thukpa &amp; Chowmein Delights',      'description' => 'Savor hot bowls of thukpa and wok-tossed chowmein—street-style noodles and soups just like the ones in the bustling lanes of Kathmandu.' ],
	[ 'icon' => 'wine',             'title' => 'Full Range of Nepali &amp; Aussie Drinks',   'description' => 'From Nepali beer and Khukuri rum to Aussie spirits and unique cocktails, pair your meal with something that brings both homes closer together.' ],
	[ 'icon' => 'drumstick',        'title' => 'Curated Non-Veg &amp; Veg Starters',         'description' => 'From spicy sukuti to crunchy paneer chilli, enjoy a wide range of small plates perfect for sharing—each one rooted in Nepali culinary tradition.' ],
	[ 'icon' => 'menu',             'title' => 'Family-Friendly Menu &amp; Catering Services','description' => "Offering kids' meals and full-scale catering options, Rai's Sekuwa Corner is perfect for everything from weeknight dinners to big celebrations." ],
];
?>
<section id="intro" class="relative py-24 lg:py-32 bg-gradient-warm overflow-hidden">

  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-chili-D48owxuK.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute -top-10 -left-10 w-40 opacity-60" style="transform:translate3d(0px,-73.8px,0px) rotate(-32.8deg);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-coriander-YuyKodgj.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-10 -right-10 w-48 opacity-50" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-tomato-CXuafqOm.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-1/3 right-8 w-20 opacity-70" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-garlic-CXkdT1Ri.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-8 left-1/4 w-24 opacity-60" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-ginger-GRnBOhka.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-12 right-1/3 w-24 opacity-60" style="transform:translate3d(0px,-124.5px,0px) rotate(-89.6deg);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">

  <div class="container relative">

    <div class="reveal" style="transition-delay:0ms;">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-primary uppercase text-xs tracking-[0.4em]"><?php echo esc_html( $subtitle ); ?></span>
        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4 mb-6"><?php echo wp_kses_post( $title ); ?></h2>
        <div class="intro-description-wrapper">
          <?php if ( $desc ) : ?>
            <p class="text-lg text-muted-foreground leading-relaxed"><?php echo wp_kses_post( $desc ); ?></p>
          <?php else : ?>
            <p class="text-lg text-muted-foreground leading-relaxed">
              Located in the heart of <span class="text-foreground font-medium">Southport</span>, Rai's Sekuwa Corner brings the bold, smoky flavours of traditional Nepali street food to Australia. Our sekuwa is grilled fresh to order, using family recipes passed down through generations. Whether you're craving succulent chicken, juicy pork, or tender mutton — we promise an explosion of flavour in every bite. Come experience the warmth of Nepali hospitality and the unforgettable taste of open-fire barbecue, just like back home.
            </p>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <?php if ( have_rows( 'intro_features' ) ) : ?>

        <?php $i = 0; while ( have_rows( 'intro_features' ) ) : the_row(); ?>
          <div class="reveal" style="transition-delay:<?php echo $i * 100; ?>ms;">
            <div class="bg-card border border-border p-7 h-full hover:border-primary/60 hover:-translate-y-1 transition-all shadow-soft">
              <div class="w-12 h-12 bg-gradient-fire flex items-center justify-center mb-5 text-primary-foreground">
                <?php
                $icon = get_sub_field( 'icon' );
                if ( $icon ) :
                  $icon_url = is_array( $icon ) ? $icon['url'] : $icon;
                ?>
                  <img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( get_sub_field( 'title' ) ); ?> icon" class="w-8 h-8 object-contain filter brightness-0 invert" />
                <?php endif; ?>
              </div>
              <h3 class="font-serif text-xl mb-2"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
              <p class="text-sm text-muted-foreground leading-relaxed"><?php echo esc_html( get_sub_field( 'description' ) ); ?></p>
            </div>
          </div>
        <?php $i++; endwhile; ?>

      <?php else : ?>

        <?php foreach ( $intro_features as $i => $feature ) : ?>
          <div class="reveal" style="transition-delay:<?php echo $i * 100; ?>ms;">
            <div class="bg-card border border-border p-7 h-full hover:border-primary/60 hover:-translate-y-1 transition-all shadow-soft">
              <div class="w-12 h-12 bg-gradient-fire flex items-center justify-center mb-5 text-primary-foreground">
                <?php echo $intro_icons[ $feature['icon'] ]; ?>
              </div>
              <h3 class="font-serif text-xl mb-2"><?php echo $feature['title']; ?></h3>
              <p class="text-sm text-muted-foreground leading-relaxed"><?php echo $feature['description']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>

      <?php endif; ?>

    </div><!-- /grid -->

    <div class="reveal" style="transition-delay:200ms;">
      <div class="flex flex-wrap justify-center gap-4 mt-14">
        <a href="#about" class="btn-fire text-primary-foreground px-8 py-4 text-xs font-semibold uppercase tracking-widest"><span>Know more about us</span></a>
        <a href="#menu" class="btn-ghost-fire text-foreground border-foreground/30 px-8 py-4 text-xs font-semibold uppercase tracking-widest"><span>View Our Menu</span></a>
      </div>
    </div>

  </div>
</section>
