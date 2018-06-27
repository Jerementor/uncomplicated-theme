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
<div class="padding-flex-side">
<div class="purchase-info bg-blue">
<img src="/wp-content/uploads/2018/06/Shield-And-Armor.png" class="checkout-image">
<h1 class="purchase-complete">Complete Your Purchase</h1>
<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

</div>	
<div class="checkout-info bg-grey-lightest">
<div class="box-w-shadow-norm">
<div class="w-container">	
<h1 class="checkout-header">You&#x27;re 60 Seconds Away From Your Next Tiny Game</h1>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

		the_content();
	
	} // end while
} // end if
?>
<div class="w-row">
      <div class="w-col w-col-6">
        <h4 class="priv-header">Your Information Is Safe</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
      </div>
      <div class="w-col w-col-6">
        <h4 class="priv-header">Secure Checkout</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
      </div>
    </div>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>