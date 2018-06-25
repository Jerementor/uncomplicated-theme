<?php 
/**
 * The template for displaying all pages
 * Template Name: Page Checkout
 *
 * @since 1.0
 */
get_header(); 
?>
<!--PAGE Checkout-->
<div class="padding-100 bg-grey-lightest">
<div class="w-container">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

		the_content();
	
	} // end while
} // end if
?>
</div>
</div>
<?php get_footer(); ?>