<?php
/**
 * Template Part: Home — Booking / Reservation Section
 *
 * Matches index.html #booking section exactly.
 * The form posts to admin-post.php with a custom action so it can be
 * handled by a PHP hook; structure mirrors the static reservation form.
 *
 * @package raisekuwa
 */

$img_base = esc_url( get_template_directory_uri() ) . '/assets/images/';
?>
<section id="booking" class="py-24 lg:py-32 bg-gradient-warm relative overflow-hidden">

  <!-- Floating ingredient images -->
  <img src="<?php echo $img_base; ?>float-tomato-CXuafqOm.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-12 left-8 w-24 opacity-60" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo $img_base; ?>float-chili-D48owxuK.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-16 right-10 w-28 opacity-55" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">
  <img src="<?php echo $img_base; ?>float-garlic-CXkdT1Ri.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-1/3 right-8 w-20 opacity-55" style="transform:translate3d(0px,0px,0px);transition:transform 0.6s cubic-bezier(0.22,1,0.36,1);">

  <div class="container max-w-5xl">

    <div class="reveal" style="transition-delay:0ms;">
      <div class="text-center mb-12">
        <span class="text-primary uppercase text-xs tracking-[0.4em]">Reserve A Table</span>
        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4">Book your <span class="text-gradient-fire">feast</span></h2>
        <p class="text-muted-foreground mt-4 max-w-xl mx-auto">Pick a date, time and party size. We'll confirm your table within minutes.</p>
      </div>
    </div>

    <div class="reveal" style="transition-delay:120ms;">
      <?php
      /*
       * Contact Form 7 — paste the matching booking form markup (see the
       * "Booking form" definition supplied with this build) into a new
       * CF7 form, then replace the id below with that form's id.
       */
      echo do_shortcode( '[contact-form-7 id="REPLACE_BOOKING_FORM_ID" title="Table Booking"]' );
      ?>
    </div>

  </div>
</section>
