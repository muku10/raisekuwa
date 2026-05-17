<?php
/**
 * Template Name: Gallery
 *
 * @package raisekuwa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

// ─── Hero Data ───
$hero_bg_raw = get_field( 'gallery_hero_bg' );
if ( is_array( $hero_bg_raw ) ) {
	$hero_bg = $hero_bg_raw['url'];
} elseif ( is_numeric( $hero_bg_raw ) ) {
	$hero_bg = wp_get_attachment_image_url( $hero_bg_raw, 'full' );
} else {
	$hero_bg = $hero_bg_raw ?: get_template_directory_uri() . '/assets/images/hero-sekuwa-D_cTsVYV.jpg';
}

$subtitle   = get_field( 'gallery_hero_subtitle' ) ?: '';
$title      = get_field( 'gallery_hero_title' )    ?: '';
$desc       = get_field( 'gallery_hero_description' ) ?: '';

// ─── Gallery Categories ───
$categories = get_terms( array(
	'taxonomy'   => 'gallery_category',
	'hide_empty' => true,
) );

// ─── Gallery Query ───
$gallery_query = new WP_Query( array(
	'post_type'      => 'gallery',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
) );
?>

<main>
	<!-- Gallery Hero Section -->
	<section class="relative pt-40 pb-24 lg:pt-52 lg:pb-32 overflow-hidden text-white">
		<div class="absolute inset-0">
			<img src="<?php echo esc_url( $hero_bg ); ?>" alt="" aria-hidden="true" class="w-full h-full object-cover">
			<div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-background"></div>
		</div>
		
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-chili-D48owxuK.png" 
			 alt="" aria-hidden="true" 
			 class="pointer-events-none select-none absolute top-24 right-10 w-24 opacity-70 float-med" 
			 data-speed="0.2">
		
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/float-tomato-CXuafqOm.png" 
			 alt="" aria-hidden="true" 
			 class="pointer-events-none select-none absolute bottom-12 left-10 w-20 opacity-60 float-slow" 
			 data-speed="-0.1">

		<div class="container relative text-center max-w-3xl">
			<span class="text-primary uppercase text-xs tracking-[0.4em] reveal"><?php echo esc_html( $subtitle ); ?></span>
			<h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4 leading-tight reveal" style="transition-delay: 100ms;">
				<?php echo wp_kses_post( $title ); ?>
			</h1>
			<p class="text-white/75 mt-6 max-w-xl mx-auto leading-relaxed reveal" style="transition-delay: 200ms;">
				<?php echo esc_html( $desc ); ?>
			</p>
		</div>
	</section>

	<section id="gallery" class="py-24 lg:py-32 bg-background">
		<div class="container">
			
			<div class="reveal">
				<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
					<div>
						<span class="text-primary uppercase text-xs tracking-[0.4em] flex items-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image w-4 h-4"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg> Image Gallery
						</span>
						<h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4">Fresh from our <span class="text-gradient-fire">kitchen</span></h2>
					</div>
				</div>
			</div>

			<!-- Filter Buttons -->
			<div class="reveal" style="transition-delay: 80ms;">
				<div class="flex flex-wrap gap-2 sm:gap-3 mb-10" id="gallery-filters">
					<button data-filter="all" class="gallery-filter-btn px-4 sm:px-5 py-2 text-xs sm:text-sm uppercase tracking-[0.2em] rounded-full border transition-colors bg-primary text-primary-foreground border-primary">
						All <span class="opacity-60 ml-1">(<?php echo $gallery_query->found_posts; ?>)</span>
					</button>
					<?php foreach ( $categories as $cat ) : ?>
						<button data-filter="<?php echo esc_attr( $cat->slug ); ?>" class="gallery-filter-btn px-4 sm:px-5 py-2 text-xs sm:text-sm uppercase tracking-[0.2em] rounded-full border transition-colors border-border text-muted-foreground hover:text-primary hover:border-primary">
							<?php echo esc_html( $cat->name ); ?> <span class="opacity-60 ml-1">(<?php echo $cat->count; ?>)</span>
						</button>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Gallery Grid -->
			<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 lg:gap-4" id="gallery-grid">
				<?php 
				if ( $gallery_query->have_posts() ) : 
					while ( $gallery_query->have_posts() ) : $gallery_query->the_post(); 
						$item_cats = get_the_terms( get_the_ID(), 'gallery_category' );
						$cat_slugs = '';
						$cat_names = '';
						if ( $item_cats ) {
							$cat_slugs = implode( ' ', wp_list_pluck( $item_cats, 'slug' ) );
							$cat_names = implode( ', ', wp_list_pluck( $item_cats, 'name' ) );
						}
				?>
					<div class="reveal gallery-item" data-category="<?php echo esc_attr( $cat_slugs ); ?>">
						<button class="group relative block aspect-square overflow-hidden bg-card w-full" aria-label="View <?php the_title_attribute(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110', 'loading' => 'lazy' ) ); ?>
							<?php endif; ?>
							
							<div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
								<p class="text-white text-xs sm:text-sm font-medium truncate text-left"><?php the_title(); ?></p>
								<p class="text-white/70 text-[10px] uppercase tracking-[0.2em] text-left"><?php echo esc_html( $cat_names ); ?></p>
							</div>
							
							<div class="absolute inset-0 flex items-center justify-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zoom-in w-7 h-7 text-white opacity-0 group-hover:opacity-100 transition-opacity">
									<circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/><line x1="11" x2="11" y1="8" y2="14"/><line x1="8" x2="14" y1="11" y2="11"/>
								</svg>
							</div>
						</button>
					</div>
				<?php 
					endwhile;
					wp_reset_postdata();
				endif; 
				?>
			</div>

		</div>
	</section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const filters = document.querySelectorAll('.gallery-filter-btn');
	const items = document.querySelectorAll('.gallery-item');

	filters.forEach(btn => {
		btn.addEventListener('click', function() {
			const filterValue = this.getAttribute('data-filter');

			// Update active button state
			filters.forEach(f => {
				f.classList.remove('bg-primary', 'text-primary-foreground', 'border-primary');
				f.classList.add('border-border', 'text-muted-foreground');
			});
			this.classList.remove('border-border', 'text-muted-foreground');
			this.classList.add('bg-primary', 'text-primary-foreground', 'border-primary');

			// Filter items
			items.forEach(item => {
				const categories = item.getAttribute('data-category').split(' ');
				if (filterValue === 'all' || categories.includes(filterValue)) {
					item.style.display = 'block';
					// Trigger reveal animation if not already in-view
					setTimeout(() => item.classList.add('in-view'), 50);
				} else {
					item.style.display = 'none';
				}
			});
		});
	});
});
</script>

<?php
get_footer();
