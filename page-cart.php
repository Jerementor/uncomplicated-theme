<?php 
/**
 * The template for displaying all pages
 * Template Name: Page Cart
 *
 * @since 1.0
 */
get_header(); 
?>
<!--PAGE Cart-->
<div class="cart-flex-container bg-grey-lightest">
<div class="cart-contents">
<div class="w-container"><img src="/uploads/2018/06/Treasure.png" class="checkout-image">
  <h1 class="cart-header">Review Your Cart</h1>
  <div class="box-w-shadow-cart">
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