<?php
$bg_image  = get_field('hero_bg_image');
$subtitle  = get_field('hero_subtitle');
$title     = get_field('hero_title');
$desc      = get_field('hero_description');
$btn1_text = get_field('hero_primary_btn_text');
$btn1_link = get_field('hero_primary_btn_link');
$btn2_text = get_field('hero_secondary_btn_text');
$btn2_link = get_field('hero_secondary_btn_link');
?>
<section id="home" class="relative min-h-screen w-full overflow-hidden flex items-center bg-[#0b0a09] text-white">
    <div class="absolute inset-0">
        <img src="<?php echo $bg_image ? esc_url($bg_image) : esc_url( get_template_directory_uri() ) . '/assets/images/hero-sekuwa-D_cTsVYV.jpg'; ?>" alt="Sekuwa grilling over open flames" class="w-full h-full object-cover ken-burns opacity-95" width="1920" height="1080">
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/55 to-black/10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/30 to-black/40"></div>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/float-sekuwa-0ORS0Xkl.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform hidden md:block absolute top-24 right-[6%] w-40 opacity-90" style="transform: translate3d(0px, 63.7px, 0px) rotate(-35.4deg); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/float-chili-D48owxuK.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-24 right-[14%] w-24 opacity-80" style="transform: translate3d(0px, -99.1px, 0px) rotate(-70.8deg); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/float-rosemary-CSKLiwLz.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform hidden md:block absolute top-40 left-[42%] w-32 opacity-70" style="transform: translate3d(0px, -58px, 0px) rotate(43.5deg); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
    <div class="container relative z-10 py-32">
        <div class="max-w-3xl">
            <div class="flex items-center gap-3 mb-6 animate-fade-in" style="animation-delay: 0.2s; opacity: 0;">
                <div class="h-px w-12 bg-primary"></div><span class="text-primary uppercase text-xs tracking-[0.4em] flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame w-4 h-4"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path></svg> <?php echo esc_html($subtitle); ?></span>
            </div>
            <h1 class="font-display text-6xl sm:text-7xl lg:text-8xl font-bold leading-[0.95] mb-6 animate-fade-in" style="animation-delay: 0.4s; opacity: 0;"><?php echo wp_kses_post($title); ?></h1>
            <p class="text-lg sm:text-xl text-white/85 max-w-xl mb-10 animate-fade-in" style="animation-delay: 0.7s; opacity: 0;"><?php echo esc_html($desc); ?></p>
            <div class="flex flex-wrap gap-4 animate-fade-in" style="animation-delay: 0.9s; opacity: 0;">
                <?php if($btn1_text): ?>
                <a href="<?php echo esc_url($btn1_link); ?>" class="btn-fire px-8 py-4 text-sm font-semibold uppercase tracking-widest text-primary-foreground"><span><?php echo esc_html($btn1_text); ?></span></a>
                <?php endif; ?>
                <?php if($btn2_text): ?>
                <a href="<?php echo esc_url($btn2_link); ?>" class="btn-fire px-8 py-4 text-sm font-semibold uppercase tracking-widest text-primary-foreground"><span><?php echo esc_html($btn2_text); ?></span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <a href="#intro" class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/70 hover:text-primary transition-colors z-10"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down w-6 h-6 animate-bounce"><path d="m6 9 6 6 6-6"></path></svg></a>
</section>
