<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); 
?>


<!-- Category.php -->
<div class="padding-20-centered">
<div class="mx-560"></div>
<div class="w-container">
  <h1 class="post-header"><?php single_cat_title(); ?></h1>
</div>
</div>
<div class="w-row">
    <div class="w-col w-col-8">

	     <?php if ( have_posts() ) : ?>
    		<?php while ( have_posts() ) : the_post(); ?>
    		    <li>
       			    <?php the_title(sprintf('<a class="jer_post_link" href="%s" rel="bookmark">', esc_url(get_permalink() )), '</li>'); ?>
                </li>
	        <?php endwhile; ?>
	    <?php endif; ?>    		
              

    </div>
    
    <div class="w-col w-col-4">
        <?php get_sidebar(); ?>	
    </div>
</div>
<!--End Row-->


<?php get_footer(); ?>