<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

<div class="container">
  
  <div class="row-fluid" style="margin-top:70px;">
    <h2 class="title"><?php printf( __( 'Search Results for: %s', 'tecno' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
  </div>
  
  <div class="row-fluid">
  
    <div class="span9">      
    
    <?php 
    $search_query = get_query_var('s');
     
    //$posts_per_page = of_get_option('tecno_search_post_per_page', 2);
    $post_per_page = get_query_var('post_per_page');
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
        
    query_posts('s='.$search_query.'&posts_per_page='.$posts_per_page.'&paged='.$page);
    
    if (have_posts()) : 
      
      while (have_posts()) : 
    
        the_post(); 
        
        get_template_part( 'content', get_post_format() ); 
      
      endwhile; 
      
      get_template_part( 'content-link-pages', get_post_format() );
      
    else :
    
      get_template_part( 'content-not-found' );
  
		endif; ?>

    </div> <!-- end span9 -->
    
    <?php get_sidebar(); ?>
    
  </div> <!-- end row-fluid -->
      
</div> <!-- container -->    
<?php get_footer(); ?>