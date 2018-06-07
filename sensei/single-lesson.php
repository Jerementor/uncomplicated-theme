<?php
/**
 * The Template for displaying all single lessons.
 *
 * Override this template by copying it to yourtheme/sensei/single-lesson.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>


<!--SINGLE LESSON-->
        
<article <?php post_class( array( 'lesson', 'post' ) ); ?>>
    
    <?php

        /**
         * Hook inside the single lesson above the content
         *
         * @since 1.9.0
         *
         * @param integer $lesson_id
         *
         * @hooked deprecated_lesson_image_hook - 10
         * @hooked deprecate_sensei_lesson_single_title - 15
         * @hooked Sensei_Lesson::lesson_image() -  17
         * @hooked deprecate_lesson_single_main_content_hook - 20
         */
        do_action( 'sensei_single_lesson_content_inside_before', get_the_ID() );

    ?>
<div class="flex-full">
<div class="course-sidebar"></div>
     <div class="course-content">
      <div class="padding-sides-60">
        <div class="get-post-info">
        <?php

        if ( sensei_can_user_view_lesson() ) {

            if( apply_filters( 'sensei_video_position', 'top', $post->ID ) == 'top' ) {

                do_action( 'sensei_lesson_video', $post->ID );

            }

            the_content();

        } else {
            ?>

                <p>
                    <?php echo get_the_excerpt(); ?>
                </p>

            <?php
        }

        ?>

         
 
   
    <?php

        /**
         * Hook inside the single lesson template after the content
         *
         * @since 1.9.0
         *
         * @param integer $lesson_id
         *
         * @hooked Sensei()->frontend->sensei_breadcrumb   - 30
         */
        do_action( 'sensei_single_lesson_content_inside_after', get_the_ID() );

    ?>


</div>
</div>
</div>   
</article><!-- .post -->
</div>   <!-- end flex -->
<?php get_sensei_footer(); ?>
