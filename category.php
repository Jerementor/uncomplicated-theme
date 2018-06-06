<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); 
?>


<!-- Category.php -->
<!-- Index.php -->
<div class="section-minvh bg-grey-lighter">
<div class="padding-20">
<div class="w-container">
  <h1><?php single_cat_title(); ?></h1>
<div class="w-row">
    <div class="w-col w-col-8">
	     <?php if ( have_posts() ) : ?>
    		<?php while ( have_posts() ) : the_post(); ?>
    		   <div class="get-post-info">
       			    <?php the_title(sprintf('<a class="article-header" href="%s" rel="bookmark">', esc_url(get_permalink() )), '</li>'); ?>
       			    <?php the_excerpt(); ?>
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