<?php
/**
* Template Name: Our story
*
* @package WordPress
* @subpackage SOMAHOTEL-THEME
* @since 1.0.0
* @version 1.0.0
* @author SOMA HOTEL
* @license GPL-2.0-or-later
*/

get_header();
?>

    <main id="site-content" class="site-content w-full md:p-10">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php get_footer(); ?>