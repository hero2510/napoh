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
 
    $tecno_position_contactus = (int)of_get_option('tecno_position_contactus');
    $tecno_contact_display = (int)of_get_option('tecno_contact_display');?>
    <?php if($tecno_contact_display):?>
    <div class="container <?php echo $tecno_position_contactus == 1 ? "first_container" : ""; ?>">

      <div id="contact_container">      
        <?php $tecno_contact_title = of_get_option('tecno_contact_title', true); ?>
        <h2 class="title"><?php echo $tecno_contact_title; ?></h2>
        <div class="row-fluid">
          <div id="googlemaps" class="google-map sixteen columns" style="height:350px; border:5px solid #eee;"></div>
            
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
    <?php endif;?>
