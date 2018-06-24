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
<h1><strong>Category:</strong> <?php single_cat_title(); ?></h1>
<div class="w-row">
    <div class="w-col w-col-8">
	     <?php if ( have_posts() ) : ?>
    		<?php while ( have_posts() ) : the_post(); ?>
    		 <?php $author = get_the_author(); ?> 
    		 <?php $thumbnail_id = get_the_author_meta('ID'); ?>
            <div class="article-card">
              <div class="article-card-header"><?php the_title( '<h2 class="article-header">', '</h2>'); ?></div>
              <div class="article-card-excerpt">
                <?php the_excerpt(); ?>
              </div>
              <div class="article-card-readmore bg-grey-lightest">
                <div class="w-row">
                  <div class="w-col w-col-2">
                   <?php echo get_avatar($thumbnail_id, 48, $default, $alt, array( 'class' => array( 'post-avatar') )); ?>
                 </div>
                  <div class="w-col w-col-6">
                    <div><strong class="bold-text"><?php echo $author ?></strong></div>
                    <div class="post-date"><?php the_time('F jS'); ?> </div>
                  </div>
                  <div class="w-clearfix w-col w-col-4">
                      <a href="<?php the_permalink(); ?>" class="btn-dark float-right w-button">Read Post</a>
                  </div>
                </div>
              </div>
            </div>
   
	        <?php endwhile; ?>

    <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
    <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
    
    <?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>	    
	    
      	     
    </div>
    
    
    
    <div class="w-col w-col-4">
        <div class="widget-card">
        <?php get_sidebar(); ?>	
        </div>
    </div>
    
</div>
</div>
</div>
</div>

<?php get_footer(); ?>