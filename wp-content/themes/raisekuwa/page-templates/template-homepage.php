<?php
/**
 * Template Name: Homepage Page
 *
 * Matches the static index.html layout 1-to-1:
 *  Hero → Intro (6 feature cards) → Signature → About → Catering Parallax
 *  → Testimonials → Booking Form
 *
 * @package raisekuwa
 */

get_header(); ?>
<main>

  <?php get_template_part( 'template-parts/home/hero' ); ?>
  <?php get_template_part( 'template-parts/home/intro' ); ?>
  <?php get_template_part( 'template-parts/home/signature' ); ?>
  <?php get_template_part( 'template-parts/home/about' ); ?>
  <?php get_template_part( 'template-parts/home/catering' ); ?>
  <?php get_template_part( 'template-parts/home/testimonials' ); ?>

  <!-- ===================== BOOKING FORM ===================== -->
  <section id="booking" class="py-24 lg:py-32 bg-gradient-warm relative overflow-hidden">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/float-tomato-CXuafqOm.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-12 left-8 w-24 opacity-60" style="transform: translate3d(0px,0px,0px); transition: transform 0.6s cubic-bezier(0.22,1,0.36,1);">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/float-chili-D48owxuK.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-16 right-10 w-28 opacity-55" style="transform: translate3d(0px,0px,0px); transition: transform 0.6s cubic-bezier(0.22,1,0.36,1);">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/float-garlic-CXkdT1Ri.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-1/3 right-8 w-20 opacity-55" style="transform: translate3d(0px,0px,0px); transition: transform 0.6s cubic-bezier(0.22,1,0.36,1);">

    <div class="container max-w-5xl">
      <div class="reveal" style="transition-delay: 0ms;">
        <div class="text-center mb-12">
          <span class="text-primary uppercase text-xs tracking-[0.4em]">Reserve A Table</span>
          <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4">Book your <span class="text-gradient-fire">feast</span></h2>
          <p class="text-muted-foreground mt-4 max-w-xl mx-auto">Pick a date, time and party size. We'll confirm your table within minutes.</p>
        </div>
      </div>

      <div class="reveal" style="transition-delay: 120ms;">
        <?php
        // Show success / error notices
        if ( isset( $_GET['booking'] ) ) :
          if ( $_GET['booking'] === 'success' ) : ?>
            <div class="mb-6 bg-green-900/40 border border-green-600/60 text-green-300 rounded-xl px-6 py-4 text-sm text-center">
              ✅ Thank you! Your booking request has been received. We'll be in touch shortly.
            </div>
          <?php elseif ( $_GET['booking'] === 'error' ) : ?>
            <div class="mb-6 bg-red-900/40 border border-red-600/60 text-red-300 rounded-xl px-6 py-4 text-sm text-center">
              ⚠️ Something went wrong. Please try again or call us directly.
            </div>
        <?php endif; endif; ?>

        <form
          method="post"
          action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          class="bg-card/80 backdrop-blur border border-border rounded-2xl p-6 sm:p-10 shadow-card"
        >
          <?php wp_nonce_field( 'raisekuwa_booking', 'booking_nonce' ); ?>
          <input type="hidden" name="action" value="raisekuwa_booking">

          <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

            <!-- Name -->
            <label class="block">
              <span class="flex items-center gap-2 text-xs uppercase tracking-[0.25em] text-muted-foreground mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-4 h-4"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                Name
              </span>
              <input required name="name" type="text" placeholder="Your name" class="input-fire" maxlength="100">
            </label>

            <!-- Phone -->
            <label class="block">
              <span class="flex items-center gap-2 text-xs uppercase tracking-[0.25em] text-muted-foreground mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                Phone
              </span>
              <input required name="phone" type="tel" placeholder="Contact number" class="input-fire" maxlength="30">
            </label>

            <!-- Email -->
            <label class="block">
              <span class="flex items-center gap-2 text-xs uppercase tracking-[0.25em] text-muted-foreground mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                Email
              </span>
              <input required name="email" type="email" placeholder="you@example.com" class="input-fire" maxlength="150">
            </label>

            <!-- Pax -->
            <label class="block">
              <span class="flex items-center gap-2 text-xs uppercase tracking-[0.25em] text-muted-foreground mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Pax
              </span>
              <select name="pax" class="input-fire">
                <?php for ( $i = 1; $i <= 12; $i++ ) : ?>
                  <option value="<?php echo $i; ?>" <?php selected( $i, 2 ); ?>><?php echo $i; ?> guest<?php echo $i > 1 ? 's' : ''; ?></option>
                <?php endfor; ?>
              </select>
            </label>

            <!-- Date -->
            <label class="block">
              <span class="flex items-center gap-2 text-xs uppercase tracking-[0.25em] text-muted-foreground mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days w-4 h-4"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
                Date
              </span>
              <input required name="date" type="date" class="input-fire cursor-pointer" min="<?php echo date( 'Y-m-d' ); ?>">
            </label>

            <!-- Time -->
            <label class="block">
              <span class="flex items-center gap-2 text-xs uppercase tracking-[0.25em] text-muted-foreground mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-4 h-4"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                Time
              </span>
              <input required name="time" type="time" class="input-fire cursor-pointer" value="19:00">
            </label>

          </div><!-- /grid -->

          <!-- Note -->
          <div class="mt-5">
            <label class="block">
              <span class="flex items-center gap-2 text-xs uppercase tracking-[0.25em] text-muted-foreground mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sticky-note w-4 h-4"><path d="M16 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8Z"/><path d="M15 3v4a2 2 0 0 0 2 2h4"/></svg>
                Note (optional)
              </span>
              <textarea name="note" rows="3" placeholder="Allergies, special occasion, seating preference…" class="input-fire resize-none" maxlength="2000"></textarea>
            </label>
          </div>

          <div class="mt-6 text-center">
            <button type="submit" class="btn-fire px-8 py-4 text-sm font-semibold uppercase tracking-widest text-primary-foreground rounded-full">
              <span class="inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils-crossed w-4 h-4"><path d="m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8"/><path d="M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7"/><path d="m2.1 21.8 6.4-6.3"/><path d="m19 5-7 7"/></svg>
                Book Now
              </span>
            </button>
          </div>

        </form>
      </div><!-- /reveal -->
    </div>
  </section>
  <!-- =================== END BOOKING FORM =================== -->

</main>
<?php get_footer(); ?>
