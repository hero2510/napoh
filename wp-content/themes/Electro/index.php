<?php 
$nameError = '';
$emailError = '';
$commentError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
	
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['contactEmail']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9._%-]+\.[a-zA-Z]{2,4}$/", trim($_POST['contactEmail']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['contactEmail']);
	}
		
	if(trim($_POST['contactMessage']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['contactMessage']));
		} else {
			$comments = trim($_POST['contactMessage']);
		}
	}
	
	$contactSubject = trim($_POST['contactSubject']);
		
	if(!isset($hasError)) {
		$emailTo = of_get_option('tecno_contact_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[NEW CONTACT FORM] From "'.$name.'"';
		$body = "Name: ".$name."\n\nEmail: ".$email."\n\nSubject: ".$contactSubject."\n\nMessage:\n".$comments."";
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
			
		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

}

$tecno_position_slideshow = (int)of_get_option('tecno_position_slideshow');
$tecno_position_homepage = (int)of_get_option('tecno_position_homepage');
$tecno_position_aboutus = (int)of_get_option('tecno_position_aboutus');
$tecno_position_portfolio = (int)of_get_option('tecno_position_portfolio');
$tecno_position_blog = (int)of_get_option('tecno_position_blog');
$tecno_position_contactus = (int)of_get_option('tecno_position_contactus');
$tecno_position_pages = (int)of_get_option('tecno_position_pages');
$tecno_position_zones = (int)of_get_option('tecno_position_zones');

$tecno_positions = array(
		  $tecno_position_slideshow => 'slideshow',
		  $tecno_position_homepage => 'homepage',
  		$tecno_position_aboutus => 'aboutus',
  		$tecno_position_portfolio => 'portfolio',
  		$tecno_position_blog => 'blog',
  		$tecno_position_contactus => 'contactus',
		  $tecno_position_pages => 'pages',
		  $tecno_position_zones => 'zones',
		);

ksort($tecno_positions);
?>
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
        		  <img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" style="width: 161px; height: 24px;"/>
        		</a><?php
          	} ?>
          </div> <!-- end logo -->
 
<?php 
  $tecno_optionmenu_first = of_get_option('tecno_optionmenu_first');
  $tecno_optionmenu_seconded = of_get_option('tecno_optionmenu_seconded');
  $tecno_optionmenu_third = of_get_option('tecno_optionmenu_third');
  $tecno_optionmenu_fourth = of_get_option('tecno_optionmenu_fourth');
  $tecno_optionmenu_fifth = of_get_option('tecno_optionmenu_fifth');
  $tecno_optionmenu_sixth = of_get_option('tecno_optionmenu_sixth');
  
  $tecno_slide_display = (int)of_get_option('tecno_slide_display');
  $tecno_homepage_display = (int)of_get_option('tecno_homepage_display');
  $tecno_aboutus_display = (int)of_get_option('tecno_aboutus_display');
  $tecno_portfolio_display = (int)of_get_option('tecno_portfolio_display');
  $tecno_blog_display = (int)of_get_option('tecno_blog_display');
  $tecno_contact_display = (int)of_get_option('tecno_contact_display');
  $tecno_pages_display = (int)of_get_option('tecno_pages_display');
?>          
          <?php wp_nav_menu( array( 'theme_location' => 'tecno_header_menu_ext', 'menu_id'=>'header-menu-ext', 'container_class'=> 'top_nav', 'container' => 'nav' ) ); ?>
          <?php wp_nav_menu( array( 'theme_location' => 'tecno_header_menu_int', 'menu_id'=>'header-menu-int', 'container_class'=> 'main_nav', 'container' => 'nav' ) ); ?>
          <nav class="main_nav">
            <ul>
<?php foreach ($tecno_positions as $position => $zone) {
        switch ($zone) {
          case 'slideshow': ?>
            	<?php if($tecno_slide_display && !empty($tecno_optionmenu_first)):?>
              <li class="<?php echo $position == 1 ? "active": "" ?>"><a href="#slider_section"><?php echo $tecno_optionmenu_first;?></a></li>
              <?php elseif($tecno_homepage_display && !empty($tecno_optionmenu_first)):?>
              <li class="<?php echo $position == 1 ? "active": "" ?>"><a href="#home_section"><?php echo $tecno_optionmenu_first;?></a></li>
        <?php endif;?>
        <?php break;
          case 'aboutus':?>
              <?php if($tecno_aboutus_display && !empty($tecno_optionmenu_seconded)):?>
              <li class="<?php echo $position == 1 ? "active": "" ?>"><a href="#about_container"><?php echo $tecno_optionmenu_seconded;?></a></li>
        <?php endif;?>                
        <?php break;
          case 'portfolio':?>
              <?php if($tecno_portfolio_display && !empty($tecno_optionmenu_third)):?>
              <li class="<?php echo $position == 1 ? "active": "" ?>"><a href="#portfolio"><?php echo $tecno_optionmenu_third;?></a></li>
        <?php endif;?>                
        <?php break;
          case 'blog':?>
              <?php if($tecno_blog_display && !empty($tecno_optionmenu_fourth)):?>              
              <li class="<?php echo $position == 1 ? "active": "" ?>"><a href="#blog_container"><?php echo $tecno_optionmenu_fourth;?></a></li>
        <?php endif;?>                
        <?php break;
          case 'contactus':?>
              <?php if($tecno_contact_display && !empty($tecno_optionmenu_fifth)):?>
              <li class="<?php echo $position == 1 ? "active": "" ?>"><a href="#contact_container"><?php echo $tecno_optionmenu_fifth;?></a></li>
        <?php endif;?>                
        <?php break;
          case 'pages':?>
              <?php if($tecno_pages_display && !empty($tecno_optionmenu_sixth)):?>
              <li class="<?php echo $position == 1 ? "active": "" ?>"><a href="#pages_container"><?php echo $tecno_optionmenu_sixth;?></a></li>
        <?php endif;?>                
        <?php break;
        }
      }?>             
            </ul> 
          </nav> <!-- end main_nav -->
          
          </div> <!-- end span12 -->
        </div> <!-- end row-fluid -->
    	</div> <!-- end container -->
	  </header>

<?php 
foreach ($tecno_positions as $position => $zone):
  switch ($zone):
    case 'slideshow': 
	  if($tecno_slide_display):?>  
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
<?php endif;
      break;
    case 'homepage':
    if($tecno_homepage_display):?>   
    <div id="home_section" class="container <?php echo $position == 1 ? "first_container" : ""; ?>">
      <div class="row-fluid">
      
        <div class="welcome">
          <?php $homepage_title = of_get_option('tecno_homepage_title', true); ?>
          <h2><?php echo $homepage_title; ?></h2>
        </div>
        
        <div class="responsive_container">
         <!--
          <div class="span4">
            <?php $homepage_image = of_get_option('tecno_homepage_image', true);?>
            <img src="<?php echo $homepage_image; ?>" alt="" style="width: 399px; height: 260px;"/>
          </div>
         
          <div class="span8">
            <?php $homepage_text = of_get_option('tecno_homepage_text', true);?>
            <?php echo $homepage_text; ?>            
          </div>
	-->
          <div class="clear"></div>
        
        </div> <!-- end responsive_container -->
      </div> <!-- end row_fluid -->
    </div> <!-- end container -->
    <div class="container">

      <div class="row-fluid">
    
        <div class="services">
          <?php $tecno_mainservice_title = of_get_option('tecno_mainservice_title', true);?>
         
        </div>
        
        <div class="services_container">
        
        <?php $tecno_service1_display = of_get_option('tecno_service1_display'); ?>
        <?php if($tecno_service1_display):?>
        <div class="span4">
          <div class="box_service">
            <div class="icon">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/services/battery.png" alt="">
            </div>            
            <div class="service_desc">
              		<h4>Become Popular</h4>
			Buy Instagram followers and boost your online popularity! Success guaranteed!
			
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <?php endif;?>
        
        <?php $tecno_service2_display = of_get_option('tecno_service2_display'); ?>
        <?php if($tecno_service2_display):?>
        <div class="span4">
          <div class="box_service">
            <div class="icon">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/services/heart.png" alt="">
            </div>
            <div class="service_desc">
             		<h4>Unbeatable Prices</h4>
			Kickstagram works hard to offer the most competitive prices on internet!

            </div>
            <div class="clear"></div>
          </div>
        </div>
        <?php endif;?>
        
        <?php $tecno_service3_display = of_get_option('tecno_service3_display'); ?>
        <?php if($tecno_service3_display):?>
        <div class="span4">
          <div class="box_service">
            <div class="icon">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/services/quotes.png" alt="">
            </div>
            <div class="service_desc">
	      <h4>Fast Delivery</h4>
              We have the fastest delivery times available on follower services.
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <?php endif;?>
        
        <div class="clear"></div>
        
        </div> <!-- service_container  -->
      </div> <!-- row fluid --> 
    </div> <!-- container -->
    
<?php endif;
      break;
    case 'aboutus':    
    if($tecno_aboutus_display):?>
    <div class="container <?php echo $position == 1 ? "first_container" : ""; ?>">
      <div class="row-fluid">
    
        <div id="about_container">

         <?php  
		// ***************** gravity form ***************** 
		gravity_form(1, false, false, false, '', false);
	 ?>

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
 
<?php endif;                
      break;
    case 'portfolio':
    if($tecno_portfolio_display):?>    
    <div class="container <?php echo $position == 1 ? "first_container" : ""; ?>">
    
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
    
<?php endif;              
      break;
    case 'blog':
    if($tecno_blog_display):?>    
    <div class="container <?php echo $position == 1 ? "first_container" : ""; ?>">
    
      <div id="blog_container">
        <?php $tecno_blog_title = of_get_option('tecno_blog_title');?>
        <h2 class="title"><?php echo $tecno_blog_title; ?></h2>
        <div class="row-fluid">
          <div class="span9">
      
<?php     //$posts_per_page = of_get_option('tecno_blog_post_per_page', 2);
          $post_per_page = get_query_var('post_per_page');
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
          
          query_posts('posts_per_page='.$posts_per_page.'&paged='.$page);
          
          if (have_posts()) :
            
            while (have_posts()) :
            
              the_post();
          
              get_template_part( 'content', get_post_format() );
                            
            endwhile; 
            
            get_template_part( 'content-link-pages', get_post_format() );
            
          else:

            get_template_part( 'content-not-found', get_post_format() );
          
          endif;?>
      
          </div> <!-- end span9 -->
          
          <?php get_sidebar(); ?>
      
        </div> <!-- end row-fluid -->
      
      </div> <!-- end blog_container -->
  
    </div> <!-- container -->
    
<?php endif;                
      break;
    case 'contactus':
    if($tecno_contact_display):?>    
    <div class="container <?php echo $position == 1 ? "first_container" : ""; ?>">

      <div id="contact_container">      
        <?php $tecno_contact_title = of_get_option('tecno_contact_title', true); ?>
        <h2 class="title"><?php echo $tecno_contact_title; ?></h2>
        <div class="row-fluid">
          <!-- <div id="googlemaps" class="google-map sixteen columns" style="height:350px; border:5px solid #eee;"></div> -->
            
          <?php $tecno_contact_beforeformtext = of_get_option('tecno_contact_beforeformtext', true); ?>
          <p class="question"><?php echo $tecno_contact_beforeformtext; ?></p>
        
          <div class="row-fluid">
      
            <div class="span4">
              <div class="contact_social">
                <?php $tecno_social_title = of_get_option('tecno_social_title', true); ?>
                <h4><?php echo $tecno_social_title; ?></h4>
                <?php $tecno_social_description = of_get_option('tecno_social_description', true); ?>
                <p><?php echo $tecno_social_description; ?></p>
                <ul>
                  <?php $tecno_social_twitter = of_get_option('tecno_social_twitter'); ?>
                  <?php if(!empty($tecno_social_twitter)): ?>
                  <li><a class="link_tooltip marker_left" title="Follow me on Twitter" href="<?php echo $tecno_social_twitter; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/social/twitter.png" alt=""></a></li>
                  <?php endif;?>
                  <?php $tecno_social_facebook = of_get_option('tecno_social_facebook'); ?>
                  <?php if(!empty($tecno_social_facebook)): ?>
                  <li><a class="link_tooltip marker_left" title="Follow me on Facebook" href="<?php echo $tecno_social_facebook; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/social/facebook.png" alt=""></a></li>
                  <?php endif;?>
                  <?php $tecno_social_vimeo = of_get_option('tecno_social_vimeo'); ?>
                  <?php if(!empty($tecno_social_vimeo)): ?>
                  <li><a class="link_tooltip marker_left" title="Follow me on Vimeo" href="<?php echo $tecno_social_vimeo; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/social/vimeo.png" alt=""></a></li>
                  <?php endif;?>
                  <?php $tecno_social_tumblr = of_get_option('tecno_social_tumblr'); ?>
                  <?php if(!empty($tecno_social_tumblr)): ?>
                  <li><a class="link_tooltip marker_left" title="Follow me on Tumblr" href="<?php echo $tecno_social_tumblr; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/social/tumblr.png" alt=""></a></li>
                  <?php endif;?>
                </ul>
              </div> <!-- end contact_social -->
              <div class="contact_info">
                <?php $tecno_contact_phone = of_get_option('tecno_contact_phone');?>
                <?php if(!empty($tecno_contact_phone)): ?>
                <p>Phone : <?php echo $tecno_contact_phone; ?></p>
                <?php endif;?>                
                <?php $tecno_contact_fax = of_get_option('tecno_contact_fax');?>
                <?php if(!empty($tecno_contact_fax)): ?>
                <p>Fax : <?php echo $tecno_contact_fax; ?></p>
                <?php endif;?>
                <?php $tecno_contact_email = of_get_option('tecno_contact_email');?>
                <?php if(!empty($tecno_contact_email)): ?>
                <p>Email : <?php echo $tecno_contact_email; ?></p>
                <?php endif;?>
              </div> <!-- end contact_info -->
            </div> <!-- span 3 -->
      
            <div id="contact-form" class="span8">
              <?php if(isset($emailSent) && $emailSent == true) { ?>
			
          			<h3 class="title success"><?php _e('Thanks, your message was sent successfully.', 'tecno') ?></h3>
          			<p><a href="<?php echo home_url();?>"><?php _e('Clic here if you want sent other message', 'tecno') ?></a></p>
          
          		<?php } else { ?>
              <form method="post" id="contact_form" action="<?php echo home_url();?>#contact-form">
              
        
                <div class="cf_input <?php echo $nameError != '' ? 'control-group error': ''; ?>" >
                  <p>Name :</p>
                  <input type="text" id="name" name="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" aria-required='true'>
                  <?php if($nameError != '') { ?>
          				<br/><span class="error"><?php echo $nameError; ?></span> 
          				<?php } ?>
                </div>
        
                <div class="cf_input <?php echo $emailError != '' ? 'control-group error': ''; ?>">
                  <p>Email :</p>
                  <input type="email" id="email" name="contactEmail" value="<?php if(isset($_POST['contactEmail'])) echo $_POST['contactEmail'];?>" aria-required='true'>
                  <?php if($emailError != '') { ?>
          				<br/><span class="error"><?php echo $emailError; ?></span>
          				<?php } ?>
                </div>
        
                <div class="cf_input subjet">
                  <p>Subjet :</p>
                  <input type="text" id="subjet" name="contactSubject" value="<?php if(isset($_POST['contactSubject'])) echo $_POST['contactSubject'];?>">
                  </div>
                <div class="clear"></div>
        
                <div class="<?php echo $commentError != '' ? 'control-group error': ''; ?>">
                  <p class="message">Message :</p>
                  <div class="clear"></div>
                  <textarea class="message" name="contactMessage" aria-required='true'><?php if(isset($_POST['contactMessage'])) echo $_POST['contactMessage'];?></textarea>
                  <?php if($commentError != '') { ?>
          				<span class="error"><?php echo $commentError; ?></span> 
          			  <?php } ?>                  
                </div>                 
                <div class="clear"></div>
                <input name="submit" id="submit" class="button" tabindex="5" value="Send" type="submit">
              </form>
              <?php }?>        
        
            </div>
          </div>
        </div> <!-- end row-fluid -->
      
      </div> <!-- end row-fluid -->
    
    </div> <!-- end contact_container -->
    
<?php endif;                
    break;
    case 'pages':
      if($tecno_pages_display):?>
      <div class="container <?php echo $position == 1 ? "first_container" : ""; ?>">
  
        <div id="pages_container">      
          <?php $tecno_pages_title = of_get_option('tecno_pages_title', true); ?>
          <h2 class="title"><?php echo $tecno_pages_title; ?></h2>
          <div class="row-fluid">
            <div class="span12">
        
  <?php     //$posts_per_page = of_get_option('tecno_blog_post_per_page', 2);
            $post_per_page = get_query_var('post_per_page');
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            
            query_posts('post_type=page&posts_per_page='.$posts_per_page.'&paged='.$page);
            
            if (have_posts()) :
              
              while (have_posts()) :
              
                the_post();
            
                get_template_part( 'content', get_post_format() );
                              
              endwhile; 
              
              get_template_part( 'content-link-pages', get_post_format() );
              
            else:
  
              get_template_part( 'content-not-found', get_post_format() );
            
            endif;
            wp_reset_postdata();?>
        
            </div> <!-- end span9 -->
        
          </div> <!-- end row-fluid -->
        
        </div> <!-- end pages_container -->
        
        
      </div> <!-- end container -->                                  
<?php endif;                
    break;
    case 'zones':
    	$tecno_aditionalzone_total = (int)of_get_option('tecno_zone_total');
  	for($i=1; $i<=$tecno_aditionalzone_total; $i++){
  		$tecno_zone_display = of_get_option('tecno_zone_'.$i.'_display');
  		if($tecno_zone_display):?>
      <div class="container <?php echo $position == 1 ? "first_container" : ""; ?>">
  
        <div id="zone_<?php echo $i;?>_container">      
          <?php $tecno_zone_title = of_get_option('tecno_zone_'.$i.'_title', true); ?>
          <h2 class="title"><?php echo $tecno_zone_title; ?></h2>
          <div class="row-fluid">
            <div class="span12">
            <?php $tecno_zone_content_type = of_get_option('tecno_zone_'.$i.'_content_type');
            $tecno_zone_content_selected = '';
              switch ($tecno_zone_content_type) {
                case 'page':
                	$tecno_zone_content_selected = of_get_option('tecno_zone_'.$i.'_content_select_pages');
                	query_posts('post_type=page&page_id='.$tecno_zone_content_selected);
                	the_post();                	
                	get_template_part( 'content', get_post_format() );
                	break;
                case 'category':
                	$tecno_zone_content_selected = of_get_option('tecno_zone_'.$i.'_content_select_categories');
                	query_posts('cat='.$tecno_zone_content_selected);
                	if (have_posts()){                	
                	  while (have_posts()){
                	    the_post();
                	    get_template_part( 'content', get_post_format() );
                	  }
                	  get_template_part( 'content-link-pages', get_post_format() );
                	}else{
                		get_template_part( 'content-not-found', get_post_format() );
                	}
                	break;
                case 'tag':
                	$tecno_zone_content_selected = of_get_option('tecno_zone_'.$i.'_content_select_tags');
                	query_posts('post_type=post&tag_id='.$tecno_zone_content_selected);
                	if (have_posts()){
                		while (have_posts()){
                			the_post();
                			get_template_part( 'content', get_post_format() );
                		}
                		get_template_part( 'content-link-pages', get_post_format() );
                	}else{
                		get_template_part( 'content-not-found', get_post_format() );
                	}
                	break;
                default:
                	$tecno_zone_content_selected = of_get_option('tecno_zone_'.$i.'_content_select_post');
                	query_posts('post_type=post&p='.$tecno_zone_content_selected);
                	the_post();
                	get_template_part( 'content', get_post_format() );
                	break;
              }
              wp_reset_postdata();
            ?>
            </div> <!-- end span12 -->
        
          </div> <!-- end row-fluid -->
        
        </div> <!-- end pages_container -->
        
        
      </div> <!-- end container -->                                  
<?php endif;		
  	}
  	break;
  endswitch;
endforeach;?>  
	      
<?php get_footer();?>