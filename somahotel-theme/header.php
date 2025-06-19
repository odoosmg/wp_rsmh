<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SOMAHOTEL-THEME
 * @since 1.0.0
 * @version 1.0.0
 * @author SOMA HOTEL
 * @license GPL-2.0-or-later
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site bg-[#e7dfd6] min-h-screen font-sans flex @container">	
	<header id="masthead" class="site-header md:w-20 bg-[#21414b] p-2 md:p-4 flex items-start flex-col min-h-screen">
		
		<div class="site-branding w-10 h-10 p-2 rounded-full bg-[#c3b095] flex items-center justify-center overflow-hidden">
			<?php the_custom_logo(); ?>
		</div><!-- .site-branding -->
		<?php if (!is_front_page()) : ?>
			<a href="<?php echo esc_url(home_url('/')); ?>" class="back-button flex" style="margin-top: 290px;">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/back-1.png" alt="Back" class="w-6 h-6">
			</a>
		<?php endif; ?>
	</header><!-- #masthead -->