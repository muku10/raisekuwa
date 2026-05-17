<?php
/**
 * Default fallback template.
 *
 * On the site front page (whether the user has chosen "Latest posts" or hasn't
 * configured Settings → Reading yet) this renders the Rai's Sekuwa Corner homepage,
 * so the layout works without any admin setup. Otherwise it falls through to a
 * lightweight blog index.
 *
 * @package raisekuwa
 */

get_header(); ?>

<?php if ( is_front_page() ) : ?>

	<?php get_template_part( 'template-parts/homepage-content' ); ?>

<?php else : ?>

	<main class="mx-auto max-w-3xl px-4 py-16 lg:px-8">
		<?php if ( have_posts() ) : ?>
			<div class="space-y-10">
				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class( 'rounded-2xl border border-border bg-surface p-6 shadow-soft' ); ?>>
						<h2 class="text-2xl font-black text-primary-deep">
							<a href="<?php the_permalink(); ?>" class="hover:text-crimson"><?php the_title(); ?></a>
						</h2>
						<p class="mt-1 text-xs uppercase tracking-wider text-muted-foreground"><?php echo esc_html( get_the_date() ); ?></p>
						<div class="prose mt-4 text-muted-foreground"><?php the_excerpt(); ?></div>
					</article>
				<?php endwhile; ?>
			</div>

			<nav class="mt-12 flex justify-between text-sm font-bold text-crimson">
				<div><?php previous_posts_link( __( '← Newer', 'raisekuwa' ) ); ?></div>
				<div><?php next_posts_link( __( 'Older →', 'raisekuwa' ) ); ?></div>
			</nav>
		<?php else : ?>
			<p class="text-center text-muted-foreground"><?php esc_html_e( 'Nothing to show here yet.', 'raisekuwa' ); ?></p>
		<?php endif; ?>
	</main>

<?php endif; ?>

<?php get_footer(); ?>
