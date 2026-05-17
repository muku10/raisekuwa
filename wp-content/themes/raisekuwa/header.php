<?php
/**
 * Header template.
 *
 * @package raisekuwa
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'min-h-screen bg-background text-foreground' ); ?>>
<?php wp_body_open(); ?>

<div class="min-h-screen bg-background text-foreground">

<?php get_template_part( 'template-parts/header/content-header' ); ?>
