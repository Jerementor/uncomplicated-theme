<?php 
/**
 * The template for displaying all pages
 *
 * @since 1.0
 */
get_header(); 
?>
<!-- Page.php -->

<div id="uncomp-page-wrapper">
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		the_content();
		//
	} // end while
} // end if
?>
</div>
<?php get_footer();