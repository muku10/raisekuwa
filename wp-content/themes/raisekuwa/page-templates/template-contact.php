<?php
/**
 * Template Name: Contact Page
 *
 * @package nepalkochino
 */

get_header();

$address = function_exists( 'get_field' ) ? get_field( 'contact_address' ) : '';
$phone   = function_exists( 'get_field' ) ? get_field( 'contact_phone' )   : '';
$email   = function_exists( 'get_field' ) ? get_field( 'contact_email' )   : '';

if ( ! $address && function_exists( 'get_field' ) ) $address = get_field( 'address', 'option' );
if ( ! $phone   && function_exists( 'get_field' ) ) $phone   = get_field( 'phone', 'option' );
if ( ! $email   && function_exists( 'get_field' ) ) $email   = get_field( 'email', 'option' );

$contact_form_shortcode = function_exists( 'get_field' ) ? get_field( 'contact_form_shortcode' ) : '';
?>

<main class="mx-auto max-w-4xl px-4 py-16 lg:px-8">
	<h1 class="text-4xl lg:text-5xl font-black text-primary-deep"><?php the_title(); ?></h1>

	<?php while ( have_posts() ) : the_post(); ?>
		<div class="prose prose-lg max-w-none mt-6">
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>

	<?php if ( $address || $phone || $email ) : ?>
		<div class="mt-10 rounded-2xl border border-border bg-surface p-6 shadow-soft space-y-2 text-muted-foreground">
			<?php if ( $address ) : ?>
				<p><?php echo esc_html( $address ); ?></p>
			<?php endif; ?>
			<?php if ( $phone ) : ?>
				<p><?php esc_html_e( 'Phone:', 'nepalkochino' ); ?>
					<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>" class="text-crimson hover:underline"><?php echo esc_html( $phone ); ?></a>
				</p>
			<?php endif; ?>
			<?php if ( $email ) : ?>
				<p><?php esc_html_e( 'Email:', 'nepalkochino' ); ?>
					<a href="mailto:<?php echo esc_attr( $email ); ?>" class="text-crimson hover:underline"><?php echo esc_html( $email ); ?></a>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( $contact_form_shortcode ) : ?>
		<div class="mt-10">
			<?php echo do_shortcode( $contact_form_shortcode ); ?>
		</div>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
