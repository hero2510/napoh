    <?php 
    $tecno_position_blog = (int)of_get_option('tecno_position_blog');
    $tecno_blog_display = (int)of_get_option('tecno_blog_display'); ?>
    <?php if($tecno_blog_display):?> 
    <div class="container <?php echo $tecno_position_blog == 1 ? "first_container" : ""; ?>">
    
      <div id="blog_container">
        <?php $tecno_blog_title = of_get_option('tecno_blog_title');?>
        <h2 class="title"><?php echo $tecno_blog_title; ?></h2>
        <div class="row-fluid">
          <div class="span9">
      
<?php     $posts_per_page = of_get_option('tecno_blog_post_per_page', 2);
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
          
          query_posts('posts_per_page='.$posts_per_page.'&paged='.$page);
          
          if (have_posts()) :
            
            while (have_posts()) :
            
              the_post();
          
              get_template_part( 'content', get_post_format() );
                            
            endwhile; 
            
            get_template_part( 'content-link-pages', get_post_format() );
            
          else:

            get_template_part( 'content-not-found', get_post_format() );
          
          endif;?>
      
          </div> <!-- end span9 -->
          
          <?php get_sidebar(); ?>
      
        </div> <!-- end row-fluid -->
      
      </div> <!-- end contact_container -->
  
    </div> <!-- container -->
    <?php endif;?>    
