<?php
/**
 * The template for displaying Tag pages.
 */

get_header(); ?>

<div class="container">
  <?php
  $taxonomy = $wp_query->get('taxonomy');
  $term = $wp_query->get('term');
  ?>
  <div class="row-fluid" style="margin-top:70px;">
    <h2 class="title">
      <?php
					
					if ( is_tag() ):
					  single_tag_title(_e( 'Posts Tagged: ', 'tecno' ));
					else:
					  switch ($taxonomy) {
					    case 'portfolio_tag':
				    		printf( __( 'Portfolios Tagged: %s', 'tecno' ), '<span>' . str_replace('-', ' ', $term) . '</span>' );
				    		break;
					  }						
					endif;
				?>
    </h2>
  </div>
  
  <div class="row-fluid">
  
    <div class="span9">      
    
    <?php 
    $post_type = '';
    switch ($taxonomy) {
      case 'portfolio_tag':
      	$post_type = 'portfolio&portfolio_tag='.$term;      	
      	break;      
      default:
        $post_type = 'post';
        $tag = $wp_query->get('tag_id');
        if(!empty($tag))
        	$post_type .= '&tag_id='.$tag;
        break;
    }
    //$posts_per_page = of_get_option('tecno_archive_post_per_page', 2);
    $post_per_page = get_query_var('post_per_page');
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
        
    query_posts('post_type='.$post_type.'&posts_per_page='.$posts_per_page.'&paged='.$page);
    
    if (have_posts()) : 
      
      while (have_posts()) : 
        
        the_post(); 
        
        get_template_part( 'content', get_post_format() ); 
      
      endwhile; 
      
      get_template_part( 'content-link-pages', get_post_format() );
      
    else :
    
      get_template_part( 'content-not-found', get_post_format() );
  
		endif; 
		wp_reset_query(); ?>
    

    </div> <!-- end span9 -->
    
    <?php get_sidebar(); ?>
    
  </div> <!-- end row-fluid -->
      
</div> <!-- container -->    
<?php get_footer(); ?>