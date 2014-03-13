    <?php 
    $tecno_position_homepage = (int)of_get_option('tecno_position_homepage');
    $tecno_homepage_display = (int)of_get_option('tecno_homepage_display'); ?>
    <?php if($tecno_homepage_display):?>    
    <div id="home_section" class="container <?php echo $tecno_position_homepage == 1 ? "first_container" : ""; ?>">
      <div class="row-fluid">
      
        <div class="welcome">
          <?php $homepage_title = of_get_option('tecno_homepage_title', true); ?>
          <h2><?php echo $homepage_title; ?></h2>
        </div>
        
        <div class="responsive_container">
        
          <div class="span4">
            <?php $homepage_image = of_get_option('tecno_homepage_image', true);?>
            <img src="<?php echo $homepage_image; ?>" alt="" style="width: 399px; height: 260px;"/>
          </div>
          
          <div class="span8">
            <?php $homepage_text = of_get_option('tecno_homepage_text', true);?>
            <?php echo $homepage_text; ?>            
          </div>
          <div class="clear"></div>
        
        </div> <!-- end responsive_container -->
      </div> <!-- end row_fluid -->
    </div> <!-- end container -->
        
    <div class="container">

      <div class="row-fluid">
    
        <div class="services">
          <?php $tecno_mainservice_title = of_get_option('tecno_mainservice_title', true);?>
          <h2><?php echo $tecno_mainservice_title; ?></h2>
        </div>
        
        <div class="services_container">
        
        <div class="span4">
          <div class="box_service">
            <div class="icon">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/services/battery.png" alt="">
            </div>
            <div class="service_desc">
              <?php $tecno_service1_title = of_get_option('tecno_service1_title', true); ?>
              <h4><?php echo $tecno_service1_title; ?></h4>
              <?php $tecno_service1_description = of_get_option('tecno_service1_description', true); ?>
              <p><?php echo $tecno_service1_description; ?></p>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        
        <div class="span4">
          <div class="box_service">
            <div class="icon">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/services/heart.png" alt="">
            </div>
            <div class="service_desc">
              <?php $tecno_service2_title = of_get_option('tecno_service2_title', true); ?>
              <h4><?php echo $tecno_service2_title; ?></h4>
              <?php $tecno_service2_description = of_get_option('tecno_service2_description', true); ?>
              <p><?php echo $tecno_service2_description; ?></p>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        
        <div class="span4">
          <div class="box_service">
            <div class="icon">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/services/quotes.png" alt="">
            </div>
            <div class="service_desc">
              <?php $tecno_service3_title = of_get_option('tecno_service3_title', true); ?>
              <h4><?php echo $tecno_service3_title; ?></h4>
              <?php $tecno_service3_description = of_get_option('tecno_service3_description', true); ?>
              <p><?php echo $tecno_service3_description; ?></p>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        
        <div class="clear"></div>
        
        </div> <!-- service_container  -->
      </div> <!-- row fluid --> 
    </div> <!-- container -->
    <?php endif;?>
