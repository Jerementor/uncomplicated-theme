<?php 
/**
 * The template for the index page
 *
 * 
 * @since 1.0
 */
get_header(); 
?>

<!-- Index.php -->
<div class="section-minvh bg-grey-lighter">
<div class="padding-20">
<div class="w-container">
  <h1><?php wp_title(''); ?></h1>

<div class="w-row">
    <div class="w-col w-col-8">
      	
	     <?php if ( have_posts() ) : ?>
    		<?php while ( have_posts() ) : the_post(); ?>
    		   <div class="get-post-info">
       			    <?php the_title(sprintf('<a class="article-header" href="%s" rel="bookmark">', esc_url(get_permalink() )), '</li>'); ?>
       			    <?php the_excpert(); ?>
                </div>
	        <?php endwhile; ?>
	    <?php endif; ?>    		
      	     
    </div>
    
    <div class="w-col w-col-4">
        <?php get_sidebar(); ?>	
    </div>
</div>
</div>
</div>
</div>


<!--End Row-->



<?php get_footer(); ?>


