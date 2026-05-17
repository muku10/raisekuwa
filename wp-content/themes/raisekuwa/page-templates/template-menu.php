<?php
/**
 * Template Name: Menu
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<main>
	<!-- Menu Hero Section -->
	<section class="relative pt-40 pb-24 lg:pt-52 lg:pb-32 overflow-hidden text-white">
		<div class="absolute inset-0">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/parallax-grill-CQrKh_B_.jpg" alt="" aria-hidden="true" class="w-full h-full object-cover">
			<div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-background"></div>
		</div>
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-chili-D48owxuK.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute top-24 right-10 w-24 opacity-70" style="transform: translate3d(0px, 0px, 0px) rotate(-63.7deg); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-tomato-CXuafqOm.png" alt="" aria-hidden="true" class="pointer-events-none select-none will-change-transform absolute bottom-12 left-10 w-20 opacity-60" style="transform: translate3d(0px, 0px, 0px) rotate(-0.3deg); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);">
		<div class="container relative text-center max-w-3xl"><span class="text-primary uppercase text-xs tracking-[0.4em]">Our Full Menu</span>
			<h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4 leading-tight">From street stalls <span class="text-gradient-fire">to your plate</span></h1>
			<p class="text-white/75 mt-6 max-w-xl mx-auto leading-relaxed">All prices in AUD. Walk in, sit back, and let the fire do the talking.</p>
		</div>
	</section>

	<!-- Menu Section -->
	<section id="menu" class="py-24 lg:py-32 bg-background relative">
		<div class="container">
			<div class="reveal in-view" style="transition-delay: 0ms;">
				<div class="text-center mb-14"><span class="text-primary uppercase text-xs tracking-[0.4em]">Our Full Menu</span>
					<h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4">From street stalls to <span class="text-gradient-fire">your plate</span></h2>
					<p class="text-muted-foreground mt-5 max-w-2xl mx-auto">All prices in AUD. Dine-in only — no online orders. Walk in, sit back, and let the fire do the talking.</p>
				</div>
			</div>
			<div class="reveal " style="transition-delay: 0ms;">
				<div class="flex flex-wrap justify-center gap-2 mb-12">
					<button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Momo</span></button>
					<button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Sekuwa &amp; Sukuti</span></button>
					<button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Non-Veg Starters</span></button>
					<button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Veg Starters</span></button>
					<button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Chilli Lovers</span></button>
					<button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Chowmein &amp; Thukpa</span></button>
					<button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Fried Rice &amp; Khana Set</span></button>
					<button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-border text-foreground/70"><span>Kids &amp; Sides</span></button>
					<button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border border-transparent shadow-fire" data-state="active"><span>Drinks &amp; Desserts</span></button>
				</div>
			</div>
			<div class="grid lg:grid-cols-5 gap-10 lg:gap-14 items-start animate-fade-in">
				<div class="lg:col-span-2 lg:sticky lg:top-28">
					<div class="relative aspect-[4/5] overflow-hidden shadow-card">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dish-jhol-momo-FxaofV9U.jpg" alt="Drinks &amp; Desserts" loading="lazy" class="w-full h-full object-cover ken-burns">
						<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
						<div class="absolute bottom-0 left-0 p-7 text-white">
							<h3 class="font-serif text-3xl lg:text-4xl mb-2">Drinks &amp; Desserts</h3>
							<p class="text-sm text-white/80 max-w-xs">Nepali beers, fresh juices, sweet endings.</p>
						</div>
					</div>
				</div>
				<div class="lg:col-span-3 space-y-1">
					<div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 0ms 1 normal both running fade-in;"><span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span><span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
						<div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
							<h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Barahsinghe / Nepal Ice / Mustang</h4>
							<p class="text-sm text-muted-foreground mt-1">Authentic Nepali beers</p>
						</div>
						<div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div><span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$10–12</span>
					</div>
					<div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 60ms 1 normal both running fade-in;"><span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span><span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
						<div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
							<h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Tongba / Chhyang</h4>
							<p class="text-sm text-muted-foreground mt-1">Traditional Himalayan brew</p>
						</div>
						<div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div><span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$20</span>
					</div>
					<div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 120ms 1 normal both running fade-in;"><span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span><span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
						<div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
							<h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Fresh Juices</h4>
							<p class="text-sm text-muted-foreground mt-1">Apple, Orange, Mixed</p>
						</div>
						<div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div><span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$9</span>
					</div>
					<div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 180ms 1 normal both running fade-in;"><span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span><span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
						<div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
							<h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Cocktails</h4>
							<p class="text-sm text-muted-foreground mt-1">Mojito, Margarita, Pina Colada</p>
						</div>
						<div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div><span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$20</span>
					</div>
					<div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 240ms 1 normal both running fade-in;"><span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span><span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
						<div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
							<h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Gelato Ice Cream</h4>
							<p class="text-sm text-muted-foreground mt-1">1 / 2 scoops</p>
						</div>
						<div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div><span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$6 / 10</span>
					</div>
					<div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden" style="animation: 0.5s ease-out 300ms 1 normal both running fade-in;"><span class="pointer-events-none absolute left-0 bottom-0 h-[2px] w-0 bg-gradient-fire transition-[width] duration-500 ease-out group-hover:w-full"></span><span class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-primary/0 via-primary/[0.06] to-primary/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
						<div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">
							<h4 class="font-serif text-xl bg-gradient-to-r from-foreground via-foreground to-foreground bg-[length:200%_100%] bg-left bg-clip-text group-hover:from-primary group-hover:via-[hsl(var(--primary-glow))] group-hover:to-primary group-hover:text-transparent group-hover:bg-right transition-all duration-700">Nepalese Coffee / Tea</h4>
						</div>
						<div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1 group-hover:border-primary/60 transition-colors duration-500"></div><span class="text-primary font-semibold text-lg whitespace-nowrap transition-transform duration-500 group-hover:scale-110 group-hover:-translate-x-1">$5</span>
					</div>
				</div>
			</div>
			<div class="reveal " style="transition-delay: 0ms;">
				<div class="flex flex-wrap justify-center gap-4 mt-16"><a href="tel:+61755275944" class="btn-fire text-primary-foreground px-8 py-4 text-xs font-semibold uppercase tracking-widest"><span>Call to Reserve</span></a><a href="#contact" class="btn-ghost-fire text-foreground border-foreground/30 px-8 py-4 text-xs font-semibold uppercase tracking-widest"><span>Contact Us</span></a></div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
