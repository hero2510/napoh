<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>  
    <title><?php wp_title('|', true, 'right');  ?> <?php bloginfo('name') ?> | <?php bloginfo('description') ?></title>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>

	  <header>
	    <div class="container">
        <div class="row-fluid">
          <div class="span12">
        
            <div class="logo"> <?php
              $logo = of_get_option('tecno_logo');
            	if ( $logo ) { ?>
          		<a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>">
          		  <img src="<?php echo $logo; ?>" alt="<?php echo home_url(); ?>" style="width: 161px; height: 24px;"/>
          		</a><?php
            	} ?>
            </div> <!-- end logo -->
            
            <div class="back">
              <ul>
                <li class="active">
                <a href="<?php echo home_url(); ?>">Back to home</a>
                </li>
              </ul>
            </div>
          
          </div> <!-- end span12 -->
        </div> <!-- end row-fluid -->
    	</div> <!-- end container -->
	  </header>