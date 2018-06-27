<?
// Design Checkout (debug)

/*
 * After Checkout Cart (opening)
 */
function uncomp_edd_purchase_after_checkout_cart(){ ?>
</div>
</div>
</div>
<div class="padding-100 bg-white">
<div class="w-container">
<?php }
add_action( 'edd_after_checkout_cart', 'uncomp_edd_purchase_after_checkout_cart', 1000 );

/*
 * After Submit Button (ending)
 */
function uncomp_edd_purchase_after_submit(){ ?>
</div> <!--End Container-->
</div><!--End Padding-100-->
<?php }
add_action( 'edd_purchase_form_after_submit', 'uncomp_edd_purchase_after_submit', 1000 );

/*
 * Before Purchase form begins
 * After Checkout Cart
 */
function uncomp_edd_before_purchase(){ ?>
<p>Before purchase form</p>
<?php }
add_action ('edd_before_purchase_form', 'uncomp_edd_before_purchase', 1000);

/*
 * Before Personal Info!
 */
function uncomp_edd_top_purchase(){ ?>
<p>Purchase Form Top</p>
<?php }
add_action ('edd_purchase_form_top', 'uncomp_edd_top_purchase', 1000);

/*
 * After Personal Info But...
 * Placed at end of entire form
 */
function uncomp_edd_bottom_purchase(){ ?>
<p>Purchase Form Bottom (way bottom)</p>
<?php }
add_action ('edd_purchase_form_bottom', 'uncomp_edd_bottom_purchase', 1000);

/*
 * After Personal Info But...
 * Inside personal info formset
 */
function uncomp_edd_purchase_form_user_info(){ ?>
<p>After personal info fields (but inside)</p>
<?php }
add_action('edd_purchase_form_user_info', 'uncomp_edd_purchase_form_user_info', 1000);

/*
 * Before Personal Info But...
 * Also before discount box
 */
function uncomp_edd_purchase_form_before_fields(){ ?>
<p>Before personal info fields</p>
<?php }
add_action('edd_before_purchase_form', 'uncomp_edd_purchase_form_before_fields', 1000);

/*
 * After Personal Info But...
 * WAY bottom (final closing)
 */
function uncomp_edd_purchase_form_after_fields(){ ?>
<p>After personal info fields</p>
<?php }
add_action('edd_after_purchase_form', 'uncomp_edd_purchase_form_after_fields', 1000);

/*
 * Before Payment Fields
 */
function uncomp_edd_purchase_form_before_payment_fields(){ ?>
<p>Before payment fields</p>
<?php }
add_action('edd_before_cc_fields', 'uncomp_edd_purchase_form_before_payment_fields', 1000);

/*
 * After Payment Fields
 */
function uncomp_edd_purchase_form_after_payment_fields(){ ?>
<p>After payment fields</p>
<?php }
add_action('edd_after_cc_fields', 'uncomp_edd_purchase_form_after_payment_fields', 1000);

/*
 * Before Submit Button
 */
function uncomp_edd_purchase_form_before_submit() { ?>
<p>Before order button</p>
 <?php }
add_action( 'edd_purchase_form_before_submit', 'uncomp_edd_purchase_form_before_submit', 1000 );

/*
 * After Submit Button
 */
function uncomp_edd_purchase_form_after_submit() { ?>
<p>After order button</p>
 <?php }
add_action( 'edd_purchase_form_after_submit', 'uncomp_edd_purchase_form_after_submit', 1000 );


/* Woocommerce Sensei */
/*ul.course-progress-navigation {*/
/*    display: none !important;*/
/*}*/

/*nav#post-entries {*/
/*    display: none;*/
/*}*/
/*.sensei-breadcrumb {*/
/*    display: none;*/
/*}*/




// /**
//  * Support For WooCommerce
//  *
//  * @since Uncomplicated 2018
//  *
//  */
// add_theme_support( 'woocommerce' );


// /**
//  * Hook Theme Into Sensei (Woocommerce)
//  *
//  * @since Uncomplicated 2018
//  *
//  */
// global $woothemes_sensei;
// remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
// remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );

// add_action('sensei_before_main_content', 'my_theme_wrapper_start', 10);
// add_action('sensei_after_main_content', 'my_theme_wrapper_end', 10);


// function my_theme_wrapper_start() {
//   echo '<div class="flex-full">';
//   get_sidebar('course');
// }

// function my_theme_wrapper_end() {
    
//   echo '</div>';
// }


/**
 * Declare support for the WooCommerce Sensei
 */
// function uncomp_declare_sensei_support() {
//     add_theme_support( 'sensei' );
// }
// add_action( 'after_setup_theme', 'uncomp_declare_sensei_support' );

/**
* remove default sensei titles
*/
// global $woothemes_sensei;
// remove_action( ‘sensei_course_single_title’, array( $woothemes_sensei->frontend , ‘sensei_single_title’ ), 10 );
// remove_action( ‘sensei_lesson_single_title’, array( $woothemes_sensei->frontend , ‘sensei_single_title’ ), 10 );
// remove_action( ‘sensei_quiz_single_title’, array( $woothemes_sensei->frontend, ‘sensei_single_title’ ), 10 );
// remove_action( ‘sensei_message_single_title’, array( $woothemes_sensei->frontend, ‘sensei_single_title’ ), 10 );


