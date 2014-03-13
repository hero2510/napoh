    <footer>
      <div class="subfooter_container">
        <div class="sf_top"></div>
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
              <div class="copyright">
                <?php $footer_text = of_get_option('tecno_footer_text'); ?>                
                <p><?php echo empty($footer_text)? '' :  $footer_text.'. '; ?><?php bloginfo('name'); ?> was developed by <a href="<?php echo esc_url( __( 'http://www.freedesigns.me/', 'tecno' ) )?>">Freedesigns</a> &copy; <?php __('Copyright','tecno')?> <?php echo date("Y");?></p>
              </div>
            </div>            
            <div class="span6">
              <?php wp_nav_menu( array( 'theme_location' => 'tecno_footer_menu','menu_id'=>'footer-menu', 'container_class'=> 'footer_nav', 'container' => 'nav' ) ); ?>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <?php $tecno_switchpanel_show = (int)of_get_option('tecno_switchpanel_show'); ?>
    <?php if($tecno_switchpanel_show):?>
    <!-- Switch Panel -->

    <div class="switch_out">
      <div id="switch">
      
        <ul class="color">
          <li><a href="#" onClick="setActiveStyleSheet('main'); return false;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pink.png" alt=""></a></li>
          <li><a href="#" onClick="setActiveStyleSheet('blue'); return false;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blue.png" alt=""></a></li>
          <li><a href="#" onClick="setActiveStyleSheet('yellow'); return false;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/yellow.png" alt=""></a></li>
          <li><a href="#" onClick="setActiveStyleSheet('green'); return false;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/green.png" alt=""></a></li>
        </ul>
        <h4 id="hide">Hide Panel</h4>
      </div>
    
      <div id="show" style="display: none;">
        <h4>Show Panel</h4>
      </div>
    </div>
    <?php endif;?>
    
    <?php wp_footer();?>
    
  </body>

</html> 