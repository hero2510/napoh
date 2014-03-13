<?php
/**
 * The template for displaying Category Archive pages.
 */
?>
<?php get_header(); ?>
<div class="container">
  
  <div class="row-fluid" style="margin-top:70px;">
    <?php $catName = ucfirst(get_query_var('category_name')); ?>
    <?php $catName = str_replace('-', ' ', $catName); ?>
    <h2 class="title"><?php printf( __( 'Category: %s', 'tecno' ), '<span>' . $catName . '</span>' ); ?></h2>
  </div>
  
  <div class="row-fluid">
    
    <div class="span9">
    <?php 
    $catID = get_query_var('cat');         
             
    //$posts_per_page = of_get_option('tecno_category_post_per_page', 2);
    $post_per_page = get_query_var('post_per_page');
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    query_posts('cat='.$catID.'&posts_per_page='.$posts_per_page.'&paged='.$page);
    
    if (have_posts()) :
      
      while (have_posts()) :
       
        the_post();

        get_template_part( 'content', get_post_format() ); 

      endwhile; 
      
      get_template_part( 'content-link-pages', get_post_format() );
    
    else : 

      get_template_part( 'content-not-found', get_post_format() );
    
    endif; ?>

    </div> <!-- end span9 -->
    
    <?php get_sidebar(); ?>
    
  </div> <!-- end row-fluid -->
      
</div> <!-- container -->    
<?php get_footer(); ?>