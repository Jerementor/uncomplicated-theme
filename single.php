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

	
	<!--<!?php the_category(' ', 'multiple')?>-->
	<!--<!?php the_excerpt(); ?>-->
	
<div class="section-minvh bg-grey-lighter">
<div class="padding-20">
<div class="w-container">
<div class="get-post-content">
<div class="mx-640">
<h1 class="page-post-heading"><?php wp_title(''); ?></h1>
<div class="div-categories">
	<?php the_category(' ', 'multiple')?>
</div>

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
</div>
<?php get_footer(); ?>