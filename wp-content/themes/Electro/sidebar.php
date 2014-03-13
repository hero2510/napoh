<?php
/**
 * The Sidebar containing the main widget area. 
 */
?>
<div class="span3">
<?php if ( ! dynamic_sidebar( 'right-sidebar' ) ) : ?>
  <?php $tecno_sidebar_searchwidget_show = (int)of_get_option('tecno_sidebar_searchwidget_show');?>
  <?php if($tecno_sidebar_searchwidget_show):?>
  <div class="sidebar">
    <div class="search_widget">
      <!-- Search -->
        <?php $tecno_sidebar_searchwidget_title = of_get_option('tecno_sidebar_searchwidget_title');?>
        <h4><?php echo $tecno_sidebar_searchwidget_title; ?></h4>
        <?php get_search_form(); ?>                  
    </div> <!-- end container -->
  </div> <!-- end search-widget -->
  <?php endif; ?>
  
  <?php $tecno_sidebar_categorieswidget_show = (int)of_get_option('tecno_sidebar_categorieswidget_show');?>
  <?php if($tecno_sidebar_categorieswidget_show): ?>
  <div class="sidebar_categories">
    <?php $tecno_sidebar_categorieswidget_title = of_get_option('tecno_sidebar_categorieswidget_title');?>
    <h4><?php echo $tecno_sidebar_categorieswidget_title; ?></h4>
    <?php $tecno_sidebar_categorieswidget_post = (int)of_get_option('tecno_sidebar_categorieswidget_post');?>
    <?php $tecno_sidebar_categorieswidget_hideempty = (int)of_get_option('tecno_sidebar_categorieswidget_hideempty');?>
    <?php $tecno_sidebar_categorieswidget_hierarchical = (int)of_get_option('tecno_sidebar_categorieswidget_hierarchical');?>
    <ul>
      <?php wp_list_categories(
      		array(
    				'show_count' => $tecno_sidebar_categorieswidget_post, 
    				'title_li'=>'', 
    				'hide_empty' => $tecno_sidebar_categorieswidget_hideempty, 
    				'hierarchical' => $tecno_sidebar_categorieswidget_hierarchical,
      			'depth' => 3
  				)
    		); ?>                
    </ul>
  </div>
  <?php endif; ?>
  
  <?php $tecno_sidebar_textwidget_show = (int)of_get_option('tecno_sidebar_textwidget_show'); ?>
  <?php if($tecno_sidebar_textwidget_show): ?>
  <div class="sidebar_text">
    <?php $tecno_sidebar_textwidget_title = of_get_option('tecno_sidebar_textwidget_title'); ?>
    <h4><?php echo $tecno_sidebar_textwidget_title; ?></h4>
    <?php $tecno_sidebar_textwidget_text = of_get_option('tecno_sidebar_textwidget_text');?>
    <p><?php echo $tecno_sidebar_textwidget_text; ?></p>
  </div>
  <?php endif; ?>
  
  <?php $tecno_sidebar_recentprojectwidget_show = (int)of_get_option('tecno_sidebar_recentprojectwidget_show');?>
  <?php if($tecno_sidebar_recentprojectwidget_show):?>
  <?php $tecno_sidebar_recentprojectwidget_amount = (int)of_get_option('tecno_sidebar_recentprojectwidget_amount');?>
  <div class="sidebar_ppost show-<?php echo $tecno_sidebar_recentprojectwidget_amount; ?>">
    <?php $tecno_sidebar_recentprojectwidget_title = of_get_option('tecno_sidebar_recentprojectwidget_title');?>
    <h4><?php echo $tecno_sidebar_recentprojectwidget_title; ?></h4>    
<?php 
    query_posts('posts_per_page='.$tecno_sidebar_recentprojectwidget_amount.'&post_type=post');
    if (have_posts()) :?>    
    <ul class="rpost">
<?php while (have_posts()) : the_post();?>    
      <li>
        <a href="<?php the_permalink(); ?>">
      <?php if( has_post_thumbnail($post->ID) ) { 
      	  the_post_thumbnail('post-thumb-mini', array('alt'=>$post->post_title));
        }else{ ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post/70x50.gif" alt="<?php echo $post->post_title; ?>"/>
        <?php } ?>
        </a>
      </li>      
<?php endwhile;?>    
    </ul>
<?php endif;?>
<?php wp_reset_postdata();?>  
  </div>
  <?php endif;?>
<?php endif; // end sidebar widget area ?>

</div><!-- end sidebar -->