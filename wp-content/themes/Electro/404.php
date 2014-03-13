<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>
    <div class="container">
        <div class="row-fluid" style="margin-top:70px;">
          <div class="span9">
          
      			<div class="bpost">
      			
      			  <div class="star-icon">
    			    </div>
            
              <div class="bpost_content">
                <h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'tecno' ); ?></h2>
              </div> <!-- end bpost_content -->
            
            	<div class="bp_offset">
                <div class="bpost_text">
                  <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching will help find a related post.', 'tecno' ); ?></p>
						      <?php get_search_form(); ?>
                </div>
              </div> <!-- end offset -->
               
            </div> <!-- end bpost -->	
      
          </div> <!-- end span9 -->
          
          <?php get_sidebar(); ?>
          
        </div> <!-- end row-fluid -->
          
    </div> <!-- container -->    
<?php get_footer(); ?>