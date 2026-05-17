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

$subtitle = get_field( 'intro_subtitle' );
$title    = get_field( 'intro_title' )    ;
$desc     = get_field( 'intro_description' );
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

        <?php while ( have_rows( 'intro_features' ) ) : the_row(); ?>
          <div class="reveal">
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
        <?php endwhile; ?>

    <?php endif; ?>

    </div><!-- /grid -->

    <div class="reveal" style="transition-delay:200ms;">
      <div class="flex flex-wrap justify-center gap-4 mt-14">
        <a href="<?php echo esc_url( site_url( '/about' ) ); ?>" class="btn-fire text-primary-foreground px-8 py-4 text-xs font-semibold uppercase tracking-widest"><span>Know more about us</span></a>
        <a href="<?php echo esc_url( site_url( '/menu' ) ); ?>" class="btn-ghost-fire text-foreground border-foreground/30 px-8 py-4 text-xs font-semibold uppercase tracking-widest"><span>View Our Menu</span></a>
      </div>
    </div>

  </div>
</section>
