<?php 
/**
 * The template for displaying all pages
 * Template Name: Page Form
 *
 * @since 1.0
 */
get_header(); 
?>
<!--PAGE FORM-->
<div class="form-flex-container">
<div class="bg-grey-lighter">
<div class="w-container">
<div class="box-w-shadow-form">
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
</div>
</div>


<?php get_footer(); ?>