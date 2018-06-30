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
<div class="checkout-container bg-grey-lighter">
	<div class="flex-container-custom">
		<div class="purchase-info-copy bg-blue">
	<img src="/wp-content/uploads/2018/06/Shield-And-Armor.png" class="checkout-image">
	<h1 class="purchase-complete">Complete Your Purchase</h1>
	<div class="product-info">
	  <h1 class="product-name">
			<?php
				do_action( 'woocommerce_review_order_before_cart_contents' );
	
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	
					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
							<td class="product-name">
								<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
								<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
								<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
							</td>
							
							<td class="product-total">
								<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
							</td>
						</tr>
											<?php
									// @codingStandardsIgnoreLine
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									), $cart_item_key );
								?>	
						<?php
					}
				}
	
				do_action( 'woocommerce_review_order_after_cart_contents' );
			?>    
	    
	    
	    
	  </h1>
	</div>
	
	<div class="product-info">
	  <h1 class="product-price">
	    Sub-total: <span class="price-span"><?php wc_cart_totals_subtotal_html(); ?>   </span>  
	  </h1>
	</div>
	
	<!--Coupon-->
	<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
	<div class="product-info">
	  <h1 class="product-price">
					Discounted: <?php wc_cart_totals_coupon_html( $coupon ); ?>
	  </h1>
	</div>
	<?php endforeach; ?>    
	
	<div class="product-info">
	  <h1 class="product-price">
	    Total:<span class="price-span-total"> <?php wc_cart_totals_order_total_html(); ?>  </span>  
	  </h1>
	</div>
	
  <div class="edit-cart"><a href="/cart" class="view-cart w-button">Review Cart</a></div>
	
	<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
	
	</div>	
		<div class="box-w-shadow-norm-copy">
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
				        <h4 class="priv-header">14-Day Money Back Guarantee</h4>
				        <p class="priv-text">If you aren't satisfied within the first 14 days of your purchase, you are eligible for a full refund.</p>
				      </div>  
				      <div class="w-col w-col-6">
				        <h4 class="priv-header">Your Information Is Safe</h4>
				        <p class="priv-text">All checkout data is secured by 128-bit SSL encryption. </p>
				      </div>
				
				    </div>
	</div>
	</div>
	</div>
</div>


<?php get_footer(); ?>