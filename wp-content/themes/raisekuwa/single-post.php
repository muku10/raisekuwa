<?php
/**
 * Blog post template.
 *
 * @package raisekuwa
 */

get_header(); ?>

<main class="mx-auto max-w-3xl px-4 py-16 lg:px-8">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="aspect-video overflow-hidden rounded-2xl mb-8">
					<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
				</div>
			<?php endif; ?>

			<h1 class="text-4xl font-black text-primary-deep"><?php the_title(); ?></h1>
			<p class="mt-2 text-xs uppercase tracking-wider text-muted-foreground"><?php echo esc_html( get_the_date() ); ?></p>

			<div class="prose prose-lg mt-6 max-w-none">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
