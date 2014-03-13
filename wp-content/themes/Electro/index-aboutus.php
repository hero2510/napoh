    <?php 
    $tecno_position_aboutus = (int)of_get_option('tecno_position_aboutus');
    $tecno_aboutus_display = (int)of_get_option('tecno_aboutus_display'); ?>
    <?php if($tecno_aboutus_display):?>
    <div class="container <?php echo $tecno_position_aboutus == 1 ? "first_container" : ""; ?>">
      <div class="row-fluid">
    
        <div id="about_container">
          <?php gravity_form(1, false, false, false, '', false); ?>
          <div class="about_section">
            <?php $tecno_aboutus_title = of_get_option('tecno_aboutus_title', true); ?>
            <h2 class="title"><?php echo $tecno_aboutus_title; ?></h2>
            <?php $tecno_aboutus_slogan = of_get_option('tecno_aboutus_slogan', true); ?>
            <h3 class="about_message"><?php echo $tecno_aboutus_slogan; ?></h3>
          </div> <!-- end about_section -->
          
          <div class="working_method">
            <?php $tecno_aboutus_toptitle = of_get_option('tecno_aboutus_toptitle', true); ?>
            <h4><?php echo $tecno_aboutus_toptitle; ?></h4>
            <?php $tecno_aboutus_toptext = of_get_option('tecno_aboutus_toptext'); ?>
            <p><?php echo $tecno_aboutus_toptext; ?></p>
          </div> <!-- end working_method -->
          
          <div class="expansion">
            <div class="span4">
              <?php $tecno_aboutus_lefttitle = of_get_option('tecno_aboutus_lefttitle', true); ?>
              <h4><?php echo $tecno_aboutus_lefttitle; ?></h4>
              <?php $tecno_aboutus_lefttext = of_get_option('tecno_aboutus_lefttext', true); ?>
              <p><?php echo $tecno_aboutus_lefttext; ?></p>
            </div>
          </div>
          
          <div class="world_map">
            <div class="span4">
              <?php $tecno_aboutus_image = of_get_option('tecno_aboutus_image', true);?>
              <img src="<?php echo $tecno_aboutus_image?>" alt="" style="width: 274px; height: 179px;">
            </div>
          </div>
          
          <div class="span4">
            <div class="more_about_bubble"></div>
            
            <div class="more_about">
              <?php $tecno_aboutus_righttitle = of_get_option('tecno_aboutus_righttitle', true); ?>  
              <h4><?php echo $tecno_aboutus_righttitle; ?></h4>
              <?php $tecno_aboutus_rightttext = of_get_option('tecno_aboutus_rightttext', true); ?>
              <p><?php echo $tecno_aboutus_rightttext; ?></p>
            </div>
          </div>
          
          <div class="clear"></div>
        
        </div> <!-- end about_container -->
      
      </div> <!-- end row_fluid -->
    </div> <!-- container -->
    <?php endif;?>
