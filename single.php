<?php 
/**
 * The template for displaying all blog posts
 *
 *
 * @package Platformer
 * @since 1.0
 */
get_header(); 
?>

<!--SINGLE.PHP-->
<div class="padding-20-centered">
<div class="w-container">
  <h1 class="post-header"><?php wp_title(''); ?></h1>
  <!--<h2 class="post-author">By   <!?php echo get_the_author(); ?></h2>-->
  <h2 class="post-author"><span class="author-heading"><?php _e( 'Author:', 'uncomplicated' ); ?></span> <?php echo get_the_author(); ?></h2>
 
</div>
</div>

	
	<!--<!?php the_category(' ', 'multiple')?>-->
	<!--<!?php the_excerpt(); ?>-->
	
	
<div class="padding-20">
<div class="mx-560">
<div class="w-container">
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
<?php get_footer(); ?>