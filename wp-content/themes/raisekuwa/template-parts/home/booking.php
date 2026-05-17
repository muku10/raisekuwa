<?php
/**
 * Template Part: Home — Booking / Reservation Section
 *
 * The actual form is powered by Contact Form 7.
 * Install CF7, create a reservation form, then replace the
 * shortcode below with your own: [contact-form-7 id="XXX" title="Booking"]
 *
 * @package raisekuwa
 */
?>
<section id="booking" class="py-24 lg:py-32 bg-gradient-warm relative overflow-hidden">

  <!-- Floating ingredient images -->
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-tomato-CXuafqOm.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-12 left-8 w-24 opacity-60" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-chili-D48owxuK.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-16 right-10 w-28 opacity-55" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-garlic-CXkdT1Ri.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-1/3 right-8 w-20 opacity-55" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">

  <div class="container max-w-5xl">

    <div class="reveal" style="transition-delay:0ms;">
      <div class="text-center mb-12">
        <span class="text-primary uppercase text-xs tracking-[0.4em]">Reserve A Table</span>
        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4">Book your <span class="text-gradient-fire">feast</span></h2>
        <p class="text-muted-foreground mt-4 max-w-xl mx-auto">Pick a date, time and party size. We'll confirm your table within minutes.</p>
      </div>
    </div>

    <div class="reveal" style="transition-delay:120ms;">
      <div class="bg-card/80 backdrop-blur border border-border rounded-2xl p-6 sm:p-10 shadow-card">

        <?php if ( function_exists( 'do_shortcode' ) && shortcode_exists( 'contact-form-7' ) ) : ?>

          <?php
          /*
           * Replace the ID below with the ID of your CF7 booking form.
           * You can find it in WordPress Admin → Contact → your form → in the URL (?post=ID).
           */
          $booking_form_id = get_field( 'booking_cf7_id' ) ?: 0;
          if ( $booking_form_id ) {
            echo do_shortcode( '[contact-form-7 id="' . intval( $booking_form_id ) . '" title="Booking"]' );
          } else {
            echo do_shortcode( '[contact-form-7 id="booking" title="Booking"]' );
          }
          ?>

        <?php else : ?>

          <!-- Placeholder shown until Contact Form 7 is configured -->
          <div class="text-center py-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-check w-12 h-12 text-primary mx-auto mb-4"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg>
            <h3 class="font-serif text-2xl mb-3">Ready to book your table?</h3>
            <p class="text-muted-foreground mb-6 max-w-sm mx-auto">Give us a call or drop us a message and we'll lock in your spot.</p>
            <div class="flex flex-wrap justify-center gap-4">
              <a href="tel:+61755275944" class="btn-fire text-primary-foreground px-7 py-3.5 text-xs font-semibold uppercase tracking-widest">
                <span class="inline-flex items-center gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                  Call 07 5527 5944
                </span>
              </a>
              <a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="border border-primary/50 text-primary px-7 py-3.5 text-xs font-semibold uppercase tracking-widest hover:bg-primary/10 transition-colors">
                <span>Contact Us</span>
              </a>
            </div>
          </div>

        <?php endif; ?>

      </div>
    </div>

  </div>
</section>
