	  <?php $tecno_slide_display = (int)of_get_option('tecno_slide_display'); ?>
	  <?php if($tecno_slide_display):?>
	  <div id="slider_section" >
      <div class="container">
        <div class="row-fluid">
    
          <div class="flexslider main-slider">
            
            <ul class="slides">
      <?php
            $total_slides = (int)of_get_option('tecno_slide_total', true);
            for($i=1; $i<=$total_slides; $i++): ?>
              <li>
                <div class="slider-img">
                  <span class="flex-caption">
                    <?php $slide_caption = of_get_option('tecno_slide'.$i.'_caption', true);?>
                    <span class="caption-text"><?php echo $slide_caption?><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/heart_icon.png" alt="Heart" id="heart-icon"></span> 
                  </span><!--flex-caption-->
                  <?php $slide_image = of_get_option('tecno_slide'.$i.'_image', true);?>
                  <?php $slide_width = (int)of_get_option('tecno_slide'.$i.'_width');?>
                  <?php $slide_height = (int)of_get_option('tecno_slide'.$i.'_height');?>
                  <img src="<?php echo $slide_image; ?>" alt="" style="width: <?php echo $slide_width; ?>px; height: <?php echo $slide_height; ?>px;"/>
                </div>
              </li>
      <?php endfor;?>    
            </ul>
            
          </div>
        </div> <!-- row_fluid -->
      </div> <!-- end container -->
    </div> <!-- slider_section -->
    <?php endif;?>
