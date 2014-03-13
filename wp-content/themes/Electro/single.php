<?php
/**
 * The Template for displaying all single posts.
 */
  get_header(); ?>
    <div class="container">
      <div class="row-fluid" style="margin-top:70px;">
        <div class="span9">
    
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <?php get_template_part( 'content-single', get_post_format() ); ?>
            
            <?php comments_template(); ?>
          
          <?php endwhile; ?>
          
        <?php else : ?>

    			<?php get_template_part( 'content-not-found', get_post_format() ); ?>
      
    		<?php endif; ?>
    
        </div> <!-- end span9 -->
        
        <?php get_sidebar(); ?>
        
      </div> <!-- end row-fluid -->
          
    </div> <!-- container -->    
<?php get_footer(); ?>