<?php 
/**
 * The template for displaying all pages
 * Template Name: Page Blank
 *
 * @since 1.0
 */
get_header(); 
?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

		the_content();
	
	} // end while
} // end if
?>

<?php get_footer(); ?>