<?php
/**
 * Default page template.
 *
 * @package raisekuwa
 */

get_header(); ?>

<main class="mx-auto max-w-3xl px-4 py-16 lg:px-8">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<h1 class="text-4xl font-black text-primary-deep mb-8"><?php the_title(); ?></h1>
			<div class="prose prose-lg max-w-none">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
