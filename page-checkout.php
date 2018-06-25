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
<div class="padding-60 bg-white">
<div class="w-container"><img src="/wp-content/uploads/2018/06/Shield-And-Armor.png" class="image-2">
<h1 class="purchase-complete">Complete Your Purchase</h1>
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

		the_content();
	
	} // end while
} // end if
?>


<?php get_footer(); ?>