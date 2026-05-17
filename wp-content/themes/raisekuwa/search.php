<?php
/**
 * Search results template.
 *
 * @package raisekuwa
 */

get_header(); ?>

<main class="mx-auto max-w-4xl px-4 py-16 lg:px-8">
	<header class="mb-10">
		<p class="text-sm font-bold uppercase tracking-wider text-crimson"><?php esc_html_e( 'Search results', 'raisekuwa' ); ?></p>
		<h1 class="mt-2 text-3xl lg:text-4xl font-black text-primary-deep">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Results for: %s', 'raisekuwa' ), '<span class="text-crimson">' . esc_html( get_search_query() ) . '</span>' );
			?>
		</h1>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="space-y-6">
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'rounded-2xl border border-border bg-surface p-6 shadow-soft' ); ?>>
					<h2 class="text-xl font-black text-primary-deep">
						<a href="<?php the_permalink(); ?>" class="hover:text-crimson"><?php the_title(); ?></a>
					</h2>
					<div class="prose mt-3 text-muted-foreground"><?php the_excerpt(); ?></div>
				</article>
			<?php endwhile; ?>
		</div>

		<nav class="mt-10 flex justify-between text-sm font-bold text-crimson">
			<div><?php previous_posts_link( __( '← Newer', 'raisekuwa' ) ); ?></div>
			<div><?php next_posts_link( __( 'Older →', 'raisekuwa' ) ); ?></div>
		</nav>
	<?php else : ?>
		<p class="text-muted-foreground"><?php esc_html_e( 'No matches — try a different keyword.', 'raisekuwa' ); ?></p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
