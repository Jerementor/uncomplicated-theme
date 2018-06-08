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
     'before_widget'  => '<div id="%1$s" class="%2$s">',
     'after_widget'   => '</div>',
     'before_title'   => '<h3 class="jer_h3"> ',
     'after_title'    => '</h3>',
  ));
  
   register_sidebar(array(
		'name'          => __( 'Course Sidebar Area', 'uncomp' ),
		'id'            => 'course-sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'uncomp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
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
 * Support For WooCommerce
 *
 * @since Uncomplicated 2018
 *
 */
add_theme_support( 'woocommerce' );


/**
 * Hook Theme Into Sensei (Woocommerce)
 *
 * @since Uncomplicated 2018
 *
 */
global $woothemes_sensei;
remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );

add_action('sensei_before_main_content', 'my_theme_wrapper_start', 10);
add_action('sensei_after_main_content', 'my_theme_wrapper_end', 10);


function my_theme_wrapper_start() {
  echo '<div class="flex-full">';
  get_sidebar('course');
}

function my_theme_wrapper_end() {
    
  echo '</div>';
}


/**
 * Declare support for the WooCommerce Sensei
 */
function uncomp_declare_sensei_support() {
    add_theme_support( 'sensei' );
}
add_action( 'after_setup_theme', 'uncomp_declare_sensei_support' );

/**
* remove default sensei titles
*/
// global $woothemes_sensei;
// remove_action( ‘sensei_course_single_title’, array( $woothemes_sensei->frontend , ‘sensei_single_title’ ), 10 );
// remove_action( ‘sensei_lesson_single_title’, array( $woothemes_sensei->frontend , ‘sensei_single_title’ ), 10 );
// remove_action( ‘sensei_quiz_single_title’, array( $woothemes_sensei->frontend, ‘sensei_single_title’ ), 10 );
// remove_action( ‘sensei_message_single_title’, array( $woothemes_sensei->frontend, ‘sensei_single_title’ ), 10 );


