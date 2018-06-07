<?php 
/**
 * The template for displaying all pages
 *
 * @since 1.0
 */
get_header(); 
?>
<!-- Page.php -->
<div class="section-minvh bg-grey-lighter">
<div class="padding-20">
<div class="w-container">
<div id="uncomp-page-wrapper">
<div class="get-post-info">
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
</div>
</div>
</div>
<?php get_footer();