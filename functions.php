<?php
//Loading in Scripts
function uncomp_enqueue_styles(){
    wp_enqueue_script('webflow-js', get_template_directory_uri() . '/assets/js/webflow.js', array('jquery'));
  
    wp_enqueue_style("normalize",  get_template_directory_uri() . "/assets/css/normalize.css");
    wp_enqueue_style("webflow",  get_template_directory_uri() . "/assets/css/webflow.css");
    wp_enqueue_style("uncomp",  get_template_directory_uri() ."/assets/css/uncomplicated.webflow.css");
    wp_enqueue_style("uncomp-style", get_stylesheet_uri());
    
}
add_action("wp_enqueue_scripts", "uncomp_enqueue_styles");
function uncomp_menu_setup(){
    
    //Registers custom primary nav menu 
    register_nav_menus( array(
        'logged-in'     => __("Logged-In Menu", "uncomp-login"),
        'logged-out'    => __("Logged-Out Menu", "uncomp-logout"),
        
    ));
    
}
add_action("after_setup_theme", "uncomp_menu_setup");
function uncomp_setup(){
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	
	) );
}
add_action( 'after_setup_theme', 'uncomp_setup' );
// remove_filter('the_content', 'wpautop');
add_post_type_support( 'page', 'excerpt' );

add_filter ('get_the_excerpt','uncomp_filter_excerpt');

function uncomp_filter_excerpt ($post_excerpt) { 
  $post_excerpt = '<p class="jer_post_sub">' . $post_excerpt . '</p>';
  return $post_excerpt;
}  

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
     'name'           => __('Course - Sidebar', 'uncomp'),
     'id'             => 'course-sidebar',
     'description'    => __('Add widgets here to appear in the sidebar', 'uncomp'),
     'before_widget'  => '<div id="%1$s" class="%2$s">',
     'after_widget'   => '</div>',
     'before_title'   => '<h3 class="jer_h3"> ',
     'after_title'    => '</h3>',
  ));
  
}
add_action('widgets_init', 'uncomp_widgets');

add_filter('widget_title','uncomp_widget_title'); 
function uncomp_widget_title($t)
{

    return null;
}

add_theme_support( 'woocommerce' );