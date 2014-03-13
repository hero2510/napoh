    <?php 
    $tecno_position_portfolio = (int)of_get_option('tecno_position_portfolio');
    $tecno_portfolio_display = (int)of_get_option('tecno_portfolio_display');?>
    <?php if($tecno_portfolio_display):?>    
    <div class="container <?php echo $tecno_position_portfolio == 1 ? "first_container" : ""; ?>">
      <?php $tecno_portfolio_title = of_get_option('tecno_portfolio_title');?>
      <h2 class="title" id="portfolio"><?php echo $tecno_portfolio_title; ?></h2>
      <!-- Begin Portfolio Navigation -->
      <section id="options" class="clearfix">
        <ul id="filters" class="option-set clearfix">
          <?php $tecno_portfolio_showall = of_get_option('tecno_portfolio_showall'); ?>
          <li><a href="#" data-filter="*" class="selected"><?php echo $tecno_portfolio_showall; ?></a></li>
          <?php wp_list_categories(array('title_li'=>'', 'taxonomy'=>'portfolio_category', 'walker' => new Portfolio_Walker()));?>
        </ul>
      </section> 
      <!-- End Portfolio Navigation -->
      
      <div id="portfolio_container" class="clickable variable-sizes clearfix row">
<?php 
    $portfolio_args = array(
    		'post_type' => 'portfolio',
    		'orderby' => 'menu_order',
    		'order' => 'ASC',
    		'posts_per_page' => -1
    );
    $portfolio_query = new WP_Query( $portfolio_args );
        
    while ( $portfolio_query->have_posts() ) : 
      $portfolio_query->the_post();
    
      $portfolio = $post;
    
      $categorias =  get_the_terms( $portfolio->ID, 'portfolio_category' );
      
      if( is_array($categorias) ):
      	foreach( $categorias as $categoria ): ?>
        <div class="pfolio_item <?php echo $categoria->slug;?> span6" data-filter="<?php echo $categoria->slug;?>">          
          <div class="picture">
<?php     $thumbid = -1;
          if( has_post_thumbnail($portfolio->ID) ) {
          	$thumbid = get_post_thumbnail_id($portfolio->ID);
          }
          $portfolio_image = wp_get_attachment_image_src( $thumbid, 'portfolio-large' ); ?>          
    <?php if(!$portfolio_image): ?>
            <a href="<?php echo get_stylesheet_directory_uri(); ?>/img/portfolio/1024x768.gif" class="prettyPhoto">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/portfolio/540x280.gif" alt="<?php echo $portfolio->post_title.' - '.$portfolio->post_content?>"/>
    <?php else: ?>
        	  <a href="<?php echo $portfolio_image[0]; ?>" class="prettyPhoto"> 
    <?php     the_post_thumbnail('portfolio-thumb', array('alt'=>$portfolio->post_title.' - '.$portfolio->post_content));
          endif; ?>
              <div class="image-overlay-link"></div>
            </a>
          </div>
          <div class="pfolio_desc">
            <h4><?php echo $portfolio->post_title; ?></h4>
            <p><?php echo $portfolio->post_content; ?></p>
          </div>
        </div><?php 
        endforeach;
      endif;
    endwhile;?>
    <?php wp_reset_query(); ?>      
      </div> <!--portfolio_container-->
      
    </div> <!-- container -->
    <?php endif;?>
