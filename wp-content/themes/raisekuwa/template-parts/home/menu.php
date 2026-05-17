
<?php
$subtitle = get_field('menu_subtitle') ?: 'Our Full Menu';
$title = get_field('menu_title') ?: 'From street stalls to <span class="text-gradient-fire">your plate</span>';
$desc = get_field('menu_description') ?: 'All prices in AUD. Dine-in only — no online orders. Walk in, sit back, and let the fire do the talking.';

// Get menu categories
$categories = get_terms([
    'taxonomy'   => 'category',
    'hide_empty' => true,
]);

// Get featured image from first menu item
$featured_menu = new WP_Query([
    'post_type'      => 'menu',
    'posts_per_page' => 1,
]);

$menu_image = '';

if ($featured_menu->have_posts()) {
    while ($featured_menu->have_posts()) {
        $featured_menu->the_post();
        $menu_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    }
    wp_reset_postdata();
}
?>

<section id="menu" class="py-24 lg:py-32 bg-background relative">

    <div class="container">

        <div class="reveal">

            <div class="text-center mb-14">

                <span class="text-primary uppercase text-xs tracking-[0.4em]">
                    <?php echo esc_html($subtitle); ?>
                </span>

                <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl mt-4">
                    <?php echo wp_kses_post($title); ?>
                </h2>

                <p class="text-muted-foreground mt-5 max-w-2xl mx-auto">
                    <?php echo esc_html($desc); ?>
                </p>

            </div>

        </div>

        <?php if ($categories) : ?>

            <div class="reveal">

                <div class="flex flex-wrap justify-center gap-2 mb-12">

                    <?php foreach ($categories as $index => $category) : ?>

                        <?php
                        $active_class = ($index === 0)
                            ? 'border-transparent shadow-fire text-primary bg-primary/10'
                            : 'border-border text-foreground/70';
                        ?>

                        <button class="tab-fire px-5 py-2.5 text-xs uppercase tracking-widest border <?php echo esc_attr($active_class); ?>">
                            <span><?php echo esc_html($category->name); ?></span>
                        </button>

                    <?php endforeach; ?>

                </div>

            </div>

        <?php endif; ?>

        <div class="grid lg:grid-cols-5 gap-10 lg:gap-14 items-start animate-fade-in">

            <div class="lg:col-span-2 lg:sticky lg:top-28">

                <div class="relative aspect-[4/5] overflow-hidden shadow-card">

                    <?php if ($menu_image) : ?>
                        <img
                            src="<?php echo esc_url($menu_image); ?>"
                            alt="Menu Image"
                            class="w-full h-full object-cover ken-burns">
                    <?php endif; ?>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>

                </div>

            </div>

            <div class="lg:col-span-3 space-y-1">

                <?php
                if ($categories) :

                    $first_category = $categories[0];

                    $menu_query = new WP_Query([
                        'post_type'      => 'menu',
                        'posts_per_page' => -1,
                        'tax_query'      => [
                            [
                                'taxonomy' => 'category',
                                'field'    => 'term_id',
                                'terms'    => $first_category->term_id,
                            ]
                        ]
                    ]);

                    if ($menu_query->have_posts()) :

                        while ($menu_query->have_posts()) : $menu_query->the_post();

                            $description = get_field('item_description');
                            $price       = get_field('item_price');
                ?>

                            <div class="relative flex items-baseline gap-4 py-5 border-b border-border last:border-0 group cursor-default overflow-hidden">

                                <div class="flex-1 transition-transform duration-500 group-hover:translate-x-2">

                                    <h4 class="font-serif text-xl">
                                        <?php the_title(); ?>
                                    </h4>

                                    <?php if ($description) : ?>
                                        <p class="text-sm text-muted-foreground mt-1">
                                            <?php echo esc_html($description); ?>
                                        </p>
                                    <?php endif; ?>

                                </div>

                                <div class="flex-1 border-b border-dashed border-border/60 mx-2 mb-1"></div>

                                <?php if ($price) : ?>
                                    <span class="text-primary font-semibold text-lg">
                                        <?php echo esc_html($price); ?>
                                    </span>
                                <?php endif; ?>

                            </div>

                <?php
                        endwhile;

                        wp_reset_postdata();

                    endif;

                endif;
                ?>

            </div>

        </div>

        <div class="reveal">

            <div class="flex flex-wrap justify-center gap-4 mt-16">

                <a href="<?php echo esc_url(site_url('/menu')); ?>"
                   class="btn-fire text-primary-foreground px-8 py-4 text-xs font-semibold uppercase tracking-widest">
                    <span>View Full Menu</span>
                </a>

            </div>

        </div>

    </div>

</section>
