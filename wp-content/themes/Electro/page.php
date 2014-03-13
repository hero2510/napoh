<?php get_header(); ?>
    <div class="container">
        <div class="row-fluid" style="margin-top:70px;">
          <div class="span9">
      
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div <?php post_class('bpost'); ?>>
            
            <?php 
              if( has_post_thumbnail($post->ID) ) {
              	the_post_thumbnail('post-thumb-large', array('alt'=>$post->post_title));
              }              
              ?>
      
              <div class="star-icon">
              </div>
      
              <div class="bpost_content">
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
              </div> <!-- end bpost_content -->
      
              <?php get_template_part( 'content-post-meta', get_post_format()); ?>
      
              <div class="bp_offset">
                <div class="bpost_text">
                  <?php the_content('read more'); ?>
            			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tecno' ), 'after' => '</div>' ) ); ?>                                     
                </div>
                <div class="clear"></div>
               </div> <!-- end offset -->
               
               <?php comments_template( '', true ); ?>
               
            </div> <!-- end bpost -->
            
            <?php endwhile; ?>

            <?php get_template_part( 'content-link-pages', get_post_format() ); ?>
            
          <?php else : ?>
    
            <?php get_template_part( 'content-not-found', get_post_format() ); ?>
          
      		<?php endif; ?>
      
          </div> <!-- end span9 -->
          
          <?php get_sidebar(); ?>
          
        </div> <!-- end row-fluid -->
      
      </div> <!-- end contact_container -->
          
    </div> <!-- container -->    
<?php get_footer(); ?>