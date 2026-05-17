<?php
/**
 * Template Part: Home — Menu Section
 *
 * Static reproduction of the index.html #menu section.
 * Matches the static design export exactly.
 *
 * @package raisekuwa
 */

$img_base = esc_url( get_template_directory_uri() ) . '/assets/images/';
?>
<section id="menu" class="py-24 lg:py-32 bg-background relative">
  <div class="container">

    <div class="reveal" style="transition-delay:0ms;">
      <div class="text-center mb-14">
        <span class="text-primary uppercase text-xs tracking-[0.4em]">Our Full Menu</span>
        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4">From street stalls to <span class="text-gradient-fire">your plate</span></h2>
        <p class="text-muted-foreground mt-5 max-w-2xl mx-auto">All prices in AUD. Dine-in only — no online orders. Walk in, sit back, and let the fire do the talking.</p>
      </div>
    </div>

    <div class="reveal" style="transition-delay:0ms;">
      <div class="flex flex-wrap justify-center gap-2 mb-12">
        <button data-state="active" class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-transparent shadow-fire"><span>Momo</span></button>
        <button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Sekuwa &amp; Sukuti</span></button>
        <button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Non-Veg Starters</span></button>
        <button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Veg Starters</span></button>
        <button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Chilli Lovers</span></button>
        <button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Chowmein &amp; Thukpa</span></button>
        <button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Fried Rice &amp; Khana Set</span></button>
        <button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Kids &amp; Sides</span></button>
        <button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Drinks &amp; Desserts</span></button>
      </div>
    </div>

    <div class="grid lg:grid-cols-5 gap-10 lg:gap-14 items-start animate-fade-in">

      <div class="lg:col-span-2 lg:sticky lg:top-28">
        <div class="relative aspect-[4/5] overflow-hidden shadow-card">
          <img src="<?php echo $img_base; ?>dish-steamed-momo-eaA_C0vV.jpg" alt="Momo" loading="lazy" class="w-full h-full object-cover ken-burns">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 left-0 p-7 text-white">
            <h3 class="font-serif text-3xl lg:text-4xl mb-2">Momo</h3>
            <p class="text-sm text-white/80 max-w-xs">Hand-folded daily, filled with secret family spices.</p>
          </div>
        </div>
      </div>

      <div class="lg:col-span-3 space-y-1">

        <div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 0ms 1 normal both running fade-in;">
          <span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span>
          <span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
          <div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
            <h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Steamed Momo</h4>
            <p class="text-sm text-muted-foreground mt-1">Chicken / Veg / Pork / Buff</p>
          </div>
          <div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div>
          <span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$16–17</span>
        </div>

        <div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 60ms 1 normal both running fade-in;">
          <span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span>
          <span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
          <div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
            <h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Fried Momo</h4>
            <p class="text-sm text-muted-foreground mt-1">Crispy golden, classic favourite</p>
          </div>
          <div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div>
          <span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$16–17</span>
        </div>

        <div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 120ms 1 normal both running fade-in;">
          <span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span>
          <span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
          <div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
            <h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Jhol Momo</h4>
            <p class="text-sm text-muted-foreground mt-1">In rich spiced soup</p>
          </div>
          <div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div>
          <span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$18–19</span>
        </div>

        <div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 180ms 1 normal both running fade-in;">
          <span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span>
          <span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
          <div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
            <h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Kothey Momo</h4>
            <p class="text-sm text-muted-foreground mt-1">Pan-fried, crispy bottom</p>
          </div>
          <div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div>
          <span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$18–19</span>
        </div>

        <div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 240ms 1 normal both running fade-in;">
          <span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span>
          <span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
          <div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
            <h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">C-Momo</h4>
            <p class="text-sm text-muted-foreground mt-1">Tossed in chilli sauce</p>
          </div>
          <div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div>
          <span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$20–21</span>
        </div>

        <div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 300ms 1 normal both running fade-in;">
          <span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span>
          <span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
          <div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
            <h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Family Sharing Platter</h4>
            <p class="text-sm text-muted-foreground mt-1">Mixed varieties, ideal for 4</p>
          </div>
          <div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div>
          <span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$65</span>
        </div>

      </div>
    </div>

    <div class="reveal" style="transition-delay:0ms;">
      <div class="flex flex-wrap justify-center gap-4 mt-16">
        <a href="tel:+61755275944" class="btn-fire text-primary-foreground px-8 py-4 text-xs font-semibold uppercase tracking-widest"><span>Call to Reserve</span></a>
        <a href="#contact" class="btn-ghost-fire text-foreground border-foreground/30 px-8 py-4 text-xs font-semibold uppercase tracking-widest"><span>Contact Us</span></a>
      </div>
    </div>

  </div>
</section>
