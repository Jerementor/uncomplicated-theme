<?php
/**
 * Uncomplicated functions and definitions
 *
 *
 * @package WordPress
 * @subpackage Uncomplicated
 * @since 2018
 */

/**
 * Enqueue The Styles & Scripts To Use In The Theme
 */
function uncomp_enqueue_styles(){
    wp_enqueue_script('webflow-js', get_template_directory_uri() . '/assets/js/webflow.js', array('jquery'));
    // wp_enqueue_style("sensei-frontend",  get_template_directory_uri() . "/assets/css/frontend.min.css");
    wp_enqueue_style("normalize",  get_template_directory_uri() . "/assets/css/normalize.css");
    wp_enqueue_style("webflow",  get_template_directory_uri() . "/assets/css/webflow.css");
    wp_enqueue_style("uncomp",  get_template_directory_uri() ."/assets/css/uncomplicated.webflow.css");
    wp_enqueue_style("uncomp-style", get_stylesheet_uri());
    
}
add_action("wp_enqueue_scripts", "uncomp_enqueue_styles");


function uncomp_setup(){
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
    /*
    * Make theme available for translation.
    * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen
    * If you're building a theme based on uncomplicated, use a find and replace
    * to change 'uncomplicated' to the name of your theme in all the template files
    */
    load_theme_textdomain( 'uncomplicated' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );    
    
    
    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
    'logged-in'     => __("Logged-In Menu", "uncomp-login"),
    'logged-out'    => __("Logged-Out Menu", "uncomp-logout"),
        
    ));
    
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	
	) );
	
	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
}
add_action( 'after_setup_theme', 'uncomp_setup' );

/**
 * Register widget area.
 *
 * @since 2018
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function uncomp_widgets(){

    register_sidebar(array(
     'name'           => __('Categories- Sidebar', 'uncomp'),
     'id'             => 'article-sidebar',
     'description'    => __('Add widgets here to appear in the sidebar', 'uncomp'),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'
  ));
  
   register_sidebar(array(
	'name'          => __( 'Course Sidebar Area', 'uncomp' ),
	'id'            => 'course-sidebar',
	'description'   => __( 'Add widgets here to appear in your sidebar.', 'uncomp' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'
  ));
  
}
add_action('widgets_init', 'uncomp_widgets');

/**
 * Remove Widget Titles
 *
 * @since 2018
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
// add_filter('widget_title','uncomp_widget_title'); 
// function uncomp_widget_title($t)
// {

//     return null;
// }

//Add Excerpts To Pages
add_post_type_support( 'page', 'excerpt' );

//Add class to excerpt if needed
// function uncomp_filter_excerpt ($post_excerpt) { 
//   $post_excerpt = '<p class="jer_post_sub">' . $post_excerpt . '</p>';
//   return $post_excerpt;
// }  
// add_filter ('get_the_excerpt','uncomp_filter_excerpt');

/**
 * Hide Admin Bar From Everyone But Admins
 *
 * @since Uncomplicated 2018
 *
 */
if (!current_user_can('manage_options')){
    add_filter('show_admin_bar', '__return_false');
}

/**
 * remove p tag from lessons
 *
 * @since Uncomplicated 2018
 *
 */
function uncomp_conditional_wpautop($content) {
    // true  = wpautop is  ON  unless any exceptions are met
    // false = wpautop is  OFF unless any exceptions are met
    $wpautop_on_by_default = true;

    // List exceptions here (each exception should either return true or false)
    $exceptions = array(
        // is_page_template('page-example-template.php'),
        // is_page('the-guide-to-tiny-game-development'),
        // is_page('lessons'),
        is_page()
    );

    // Checks to see if any exceptions are met // Returns true or false
    $exception_is_met = in_array(true, $exceptions);

    // Returns the content
    if ($wpautop_on_by_default==$exception_is_met) {
        remove_filter('the_content','wpautop');
        return $content;
    } else {
        return $content;
    }
}
add_filter('the_content', 'uncomp_conditional_wpautop', 9);

/*
 * Remove Address Fields EDD
 */
remove_action( 'edd_purchase_form_after_cc_form', 'edd_cc_form_address_fields', 999 ); 

/*
 * Redirect If Cart Empty
 */
function uncomp_edd_empty_cart_redirect() {
	$cart 		= function_exists( 'edd_get_cart_contents' ) ? edd_get_cart_contents() : false;
	$redirect 	= site_url( '/' ); // could be the URL to your shop
	if ( function_exists( 'edd_is_checkout' ) && edd_is_checkout() && ! $cart ) {
		wp_redirect( $redirect, 301 ); 
		exit;
	}
}
add_action( 'template_redirect', 'uncomp_edd_empty_cart_redirect' );

/*
 * EDD Custom Checkout
 */
// remove/unhook the user info fields
remove_action( 'edd_register_fields_before', 'edd_user_info_fields' );
// add/rehook the user info fields to after the register fields
add_action( 'edd_register_fields_after', 'edd_user_info_fields' );

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
<!--</div><!-- Close col-6-->
<!--<div class="w-col w-col-6">-->
<!--<p>Before payment fields</p>-->
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
<!--<p>Before order button</p>-->
<div class="btn-center">
<?php }
add_action( 'edd_purchase_form_before_submit', 'uncomp_edd_purchase_form_before_submit', 1000 );

/*
 * After Submit Button
 */
function uncomp_edd_purchase_form_after_submit() { ?>
<!--<p>After order button</p>-->
</div>
<?php }
add_action( 'edd_purchase_form_after_submit', 'uncomp_edd_purchase_form_after_submit', 1000 );


  
function uncomp_custom_override_checkout_fields( $fields ) {
    //unset($fields['billing']['billing_first_name']);
    //unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    //unset($fields['billing']['billing_email']);
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'uncomp_custom_override_checkout_fields' );


/* WooCommerce: The Code Below Removes The Additional Information Tab */
add_filter( 'woocommerce_product_tabs', 'uncomp_woo_remove_product_tabs', 98 );
function uncomp_woo_remove_product_tabs( $tabs ) {
unset( $tabs['additional_information'] );
return $tabs;
}
/* WooCommerce: The Code Below Removes The Additional Information Title Text */
add_filter('woocommerce_enable_order_notes_field', '__return_false');


remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );


 
function uncomp_change_autofocus_checkout_field( $fields ) {
$fields['billing']['billing_first_name']['autofocus'] = true;
return $fields;
}

add_filter( 'woocommerce_checkout_fields', 'uncomp_change_autofocus_checkout_field' );


function uncomp_add_to_cart_redirect( $url ) {
	$url = WC()->cart->get_checkout_url();
	// $url = wc_get_checkout_url(); // since WC 2.5.0
	return $url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'uncomp_add_to_cart_redirect' );