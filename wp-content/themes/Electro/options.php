<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'tecno'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options = array();

	/*
	 * begin GENERAL
	 */
	
	$options[] = array(
		'name' => __('General', 'tecno'),
		'type' => 'heading');
	
	$options[] = array(
			'name' => __('Logo', 'tecno'),
			'desc' => __('Upload a logo for your theme.', 'tecno'),
			'id' => 'tecno_logo',
			'std' =>  get_stylesheet_directory_uri().'/img/logo.png',
			'type' => 'upload');

	$options[] = array(
			'name' => __("Top Menu", 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			'desc' => __('Write the text for first option. Leave blank if you want to hide this option.', 'tecno'),
			'id' => 'tecno_optionmenu_first',
			'std' => 'Home',
			'class' => 'mini',
			'type' => 'text');
	
	$options[] = array(
			'desc' => __('Write the text for seconded option. Leave blank if you want to hide this option.', 'tecno'),
			'id' => 'tecno_optionmenu_seconded',
			'std' => 'About us',
			'class' => 'mini',
			'type' => 'text');
	
	$options[] = array(
			'desc' => __('Write the text for third option. Leave blank if you want to hide this option.', 'tecno'),
			'id' => 'tecno_optionmenu_third',
			'std' => 'Portfolio',
			'class' => 'mini',
			'type' => 'text');
	
	$options[] = array(
			'desc' => __('Write the text for fourth option. Leave blank if you want to hide this option.', 'tecno'),
			'id' => 'tecno_optionmenu_fourth',
			'std' => 'Blog',
			'class' => 'mini',
			'type' => 'text');
	
	$options[] = array(
			'desc' => __('Write the text for fifth option. Leave blank if you want to hide this option.', 'tecno'),
			'id' => 'tecno_optionmenu_fifth',
			'std' => 'Contact',
			'class' => 'mini',
			'type' => 'text');
	
	$options[] = array(
			'desc' => __('Write the text for sixth option. Leave blank if you want to hide this option.', 'tecno'),
			'id' => 'tecno_optionmenu_sixth',
			'std' => 'Pages',
			'class' => 'mini',
			'type' => 'text');

	$options[] = array(
			'name' => __("Positions", 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$positions = array(
			'1' => __('First', 'tecno'),
			'2' => __('Second', 'tecno'),
			'3' => __('Third', 'tecno'),
			'4' => __('Fourth', 'tecno'),
			'5' => __('Fifth', 'tecno'),
			'6' => __('Sixth', 'tecno'),
			'7' => __('Seventh', 'tecno'),
			'8' => __('Eighth', 'tecno'),
			'9' => __('Nineth', 'tecno'),
			'10' => __('Tenth', 'tecno')
	);
	
	$options[] = array(
			'desc' => __('Select position for Slideshow', 'tecno'),
			'id' => 'tecno_position_slideshow',
			'std' => 1,
			'type' => 'select',
			'class' => 'mini',
			'options' => $positions);
	
	$options[] = array(
			'desc' => __('Select position for Homepage', 'tecno'),
			'id' => 'tecno_position_homepage',
			'std' => 2,
			'type' => 'select',
			'class' => 'mini',
			'options' => $positions);
	
	$options[] = array(
			'desc' => __('Select position for About Us', 'tecno'),
			'id' => 'tecno_position_aboutus',
			'std' => 3,
			'type' => 'select',
			'class' => 'mini',
			'options' => $positions);
	
	$options[] = array(
			'desc' => __('Select position for Portfolio', 'tecno'),
			'id' => 'tecno_position_portfolio',
			'std' => 4,
			'type' => 'select',
			'class' => 'mini',
			'options' => $positions);
	
	$options[] = array(
			'desc' => __('Select position for Blog', 'tecno'),
			'id' => 'tecno_position_blog',
			'std' => 5,
			'type' => 'select',
			'class' => 'mini',
			'options' => $positions);
	
	$options[] = array(
			'desc' => __('Select position for Contact Us', 'tecno'),
			'id' => 'tecno_position_contactus',
			'std' => 6,
			'type' => 'select',
			'class' => 'mini',
			'options' => $positions);

	$options[] = array(
			'desc' => __('Select position for Pages', 'tecno'),
			'id' => 'tecno_position_pages',
			'std' => 7,
			'type' => 'select',
			'class' => 'mini',
			'options' => $positions);
	
	$options[] = array(
			'desc' => __('Select position for Aditional Zones', 'tecno'),
			'id' => 'tecno_position_zones',
			'std' => 8,
			'type' => 'select',
			'class' => 'mini',
			'options' => $positions);
	
	$options[] = array(
			'name' => __('Footer text', 'tecno'),
			'desc' => __('Write some text to display on footer.', 'tecno'),
			'id' => 'tecno_footer_text',
			'type' => 'textarea');

	$options[] = array(
			'name' => __('Switch Panel', 'tecno'),
			'desc' => __('Display the Switch Panel, defaults to true.', 'tecno'),
			'id' => 'tecno_switchpanel_show',
			'std' => '1',
			'type' => 'checkbox');

	/*
	 * end GENERAL
	 */
	
	/*
	 * begin SLIDESHOWS
	 */
	
	$options[] = array(
			'name' => __('Slideshows', 'tecno'),
			'type' => 'heading');
	
	$options[] = array(
		'desc' => __('Display, defaults to true.', 'tecno'),
		'id' => 'tecno_slide_display',
		'std' => '1',
		'type' => 'checkbox');
	
	$cant_slides = array(
			'1' => __('One', 'tecno'),
			'2' => __('Two', 'tecno'),
			'3' => __('Three', 'tecno'),
			'4' => __('Four', 'tecno'),
			'5' => __('Five', 'tecno')
	);
	
	$options[] = array(
			'name' => __('Total slides', 'tecno'),
			'desc' => __('Select total slides. You must save after select to update the uploads box for slides', 'tecno'),
			'id' => 'tecno_slide_total',
			'std' => 2,
			'type' => 'select',
			'class' => 'mini',
			'options' => $cant_slides);
	
	$total_slides = 0;
	$total_slides = (int)of_get_option('tecno_slide_total', 2);
	if(!$total_slides)
		$total_slides = 2;
		
	for($i=1; $i<=$total_slides; $i++){
		$options[] = array(
		'name' => __('Slide', 'tecno').' '.$i,				
		'type' => 'info',
			'desc' => '');
		
		$options[] = array(
			//'name' => __('Slide image '.$i, 'tecno'),
			'desc' => __('Upload image for slide', 'tecno').' '.$i.'.',
			'id' => 'tecno_slide'.$i.'_image',
			'std' => get_stylesheet_directory_uri().'/img/slides/850x364_Slide+Image.gif',
			'type' => 'upload');
		
		$options[] = array(
			//'name' => __('Slide caption '.$i, 'tecno'),
			'desc' => __('Write text caption for slide', 'tecno').' '.$i.'.',
			'id' => 'tecno_slide'.$i.'_caption',
			'std' => 'We desig with <span class="text_attention">passion,</span> we care about customers!',
			'type' => 'textarea');
      
    $options[] = array(
        'desc' => __('Write the width of the slides (without the px).', 'tecno'),
        'id' => 'tecno_slide'.$i.'_width',
        'std' => '850',
        'class' => 'mini',
        'type' => 'text');
    
    $options[] = array(
        'desc' => __('Write the height of the slides (without the px).', 'tecno'),
        'id' => 'tecno_slide'.$i.'_height',
        'std' => '364',
        'class' => 'mini',
        'type' => 'text');      
	}
	
	/*
	 * end SLIDESHOWS
	 */
	
	/*
	 * begin HOMEPAGE
	 */
	
	$options[] = array(
			'name' => __('Homepage', 'tecno'),
			'type' => 'heading');
	
	$options[] = array(
			'desc' => __('Display, defaults to true.', 'tecno'),
			'id' => 'tecno_homepage_display',
			'std' => '1',
			'type' => 'checkbox');
	
	$options[] = array(
			'name' => __('Homepage', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			//'name' => __('Homepage Title', 'tecno'),
			'desc' => __('Write homepage title.', 'tecno'),
			'id' => 'tecno_homepage_title',
			'std' => 'Always with the latest technology.',			
			'type' => 'text');
	
	$options[] = array(
			//'name' => __('Homepage image', 'tecno'),
			'desc' => __('Upload image for homepage.', 'tecno'),
			'id' => 'tecno_homepage_image',
			'std' => get_stylesheet_directory_uri().'/img/homepage/399x260_Homepage+Image.gif',
			'type' => 'upload');
	
	$options[] = array(
			//'name' => __('Homepage Text', 'tecno'),
			'desc' => __('Write homepage text.', 'tecno'),
			'id' => 'tecno_homepage_text',
			'std' => '<p>Curabitur quam nibh, hendrerit in facilisis id, porttitor quis felis. Suspendisse euismod lorem congue enim auctor ut placerat massa ultricies. Duis egestas blandit mauris vel placerat. Nullam feugiat, est in hendrerit elementum, lorem sapien elementum risus, at tincidunt nunc metus non turpis. Mauris convallis rhoncus volutpat. Nullam ipsum nunc, convallis et aliquet vel, scelerisque et tellus. Aliquam a ornare ipsum. Donec posuere leo vel leo lobortis egestas sed et ante. Donec lorem dui, vestibulum nec laoreet vitae.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sollicitudin nibh nec orci lacinia a interdum velit vehicula. Aliquam dapibus, quam ac tincidunt dignissim, elit diam cursus lorem, ut interdum augue sem quis.</p>',
			'type' => 'editor',
			'settings' => $wp_editor_settings );
	
	$options[] = array(
			'name' => __('Main Service Title', 'tecno'),
			'desc' => __('Write the main service title.', 'tecno'),
			'id' => 'tecno_mainservice_title',
			'std' => 'Some Services we offer',
			'type' => 'text');	
	
	$total_services = 3;
	for($i=1; $i<=$total_services; $i++){
		$options[] = array(
			'name' => __('Service', 'tecno').' '.$i,
			'type' => 'info',
			'desc' => '');
		
		$options[] = array(
			'desc' => __('Display service', 'tecno').' '.$i.', '.__('default to true', 'tecno').'.',
			'id' => 'tecno_service'.$i.'_display',
			'std' => '1',
			'type' => 'checkbox');
		
		$options[] = array(
			'desc' => __('Write the service', 'tecno').' '.$i.' '.__('title', 'tecno').'.',
			'id' => 'tecno_service'.$i.'_title',
			'std' => 'Powerfull Support',
			'type' => 'text');
	
		$options[] = array(
			'desc' => __('Write the service', 'tecno').' '.$i.' '.__('text description', 'tecno').'.',
			'id' => 'tecno_service'.$i.'_description',
			'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sollicitudin nibh nec orci lacinia a interdum velit vehicula. Aliquam dapibus, quam ac tincidunt dignissim.',
			'type' => 'textarea');
	}
	
	/*
	 * end HOMEPAGE
	 */
	
	/*
	 * begin ABOUT US
	 */
	
	$options[] = array(
			'name' => __('About Us', 'tecno'),
			'type' => 'heading');
	
	$options[] = array(
			'desc' => __('Display, defaults to true.', 'tecno'),
			'id' => 'tecno_aboutus_display',
			'std' => '1',
			'type' => 'checkbox');
	
	$options[] = array(
  	'name' => __('About Us Title & Slogan', 'tecno'),
  	'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			'desc' => __('Write the about us title.', 'tecno'),
			'id' => 'tecno_aboutus_title',
			'std' => 'About our Company',
			'type' => 'text');

	$options[] = array(
			'desc' => __('Write the about us slogan.', 'tecno'),
			'id' => 'tecno_aboutus_slogan',
			'std' => 'We are young and creative agency, our mail goal is to make your job successful, we care about customers',
			'type' => 'textarea');
	
	$options[] = array(
			'name' => __('About Us Subtitle & Text', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			'desc' => __('Write the about us subtitle.', 'tecno'),
			'id' => 'tecno_aboutus_toptitle',
			'std' => 'Our working method',
			'type' => 'text');
	
	$options[] = array(
			'desc' => __('Write the about us text.', 'tecno'),
			'id' => 'tecno_aboutus_toptext',
			'std' => 'Lorem non nisi pharetra ornare. Suspendisse quis neque erat. Pellentesque et vehicula nisi. Mauris vehicula purus in augue cursus. Duis consequat molestie elit quis tempus. Curabitur eu nibh vel dolor tempus lacinia in no Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi bibendum metus nec velit lacinia gravida. n turpis. Ut id purus a eros lacinia convallis. Duis molestie egestas magna. Praesen.',
			'type' => 'textarea');
	
	$options[] = array(
			'name' => __('About Us Left Title & Text', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			'desc' => __('Write the about us left title.', 'tecno'),
			'id' => 'tecno_aboutus_lefttitle',
			'std' => 'Expansion',
			'type' => 'text');
	
	$options[] = array(
			'desc' => __('Write the about us left text.', 'tecno'),
			'id' => 'tecno_aboutus_lefttext',
			'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lorem non nisi pharetra ornare. Suspendisse quis neque erat. Pellentesque et vehicula nisi. Mauris vehicula purus in augue fringilla cursus.',
			'type' => 'textarea');
	
	$options[] = array(
			'name' => __('About Us Right Title & Text', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			'desc' => __('Write the about us right title.', 'tecno'),
			'id' => 'tecno_aboutus_righttitle',
			'std' => 'More about us',
			'type' => 'text');
	
	$options[] = array(
			'desc' => __('Write the about us right text.', 'tecno'),
			'id' => 'tecno_aboutus_rightttext',
			'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id viverra mauris. Ut at urna in tortor elementum gravida. Mauris facilisis, justo sed laoreet suscipit',
			'type' => 'textarea');
	
	$options[] = array(
			'name' => __('About Us image', 'tecno'),
			'desc' => __('Upload image for about us.', 'tecno'),
			'id' => 'tecno_aboutus_image',
			'std' => get_stylesheet_directory_uri().'/img/world_map.png',
			'type' => 'upload');

	/*
	 * end ABOUT US
	 */
	
	/*
	 * begin PORTFOLIOS
	 */
	
	$options[] = array(
			'name' => __('Portfolio', 'tecno'),
			'type' => 'heading');
	
	$options[] = array(
			'desc' => __('Display, defaults to true.', 'tecno'),
			'id' => 'tecno_portfolio_display',
			'std' => '1',
			'type' => 'checkbox');	
	
	$options[] = array(
			'name' => __('Portfolio Title', 'tecno'),
			'desc' => __('Write the portfolios title.', 'tecno'),
			'id' => 'tecno_portfolio_title',
			'std' => 'See our works',
			'type' => 'text');
	
	$options[] = array(
			'name' => __('Show All Text', 'tecno'),
			'desc' => __('Write the show all portfolios text.', 'tecno'),
			'id' => 'tecno_portfolio_showall',
			'std' => 'Show all',
			'type' => 'text');
	
	$options[] = array(
			'name' => __('WARNING: This section requiere that plugin "Portfolio Post Type" is installed. See the README file for more details.', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	
	/*
	 * end PORTFOLIOS
	 */
	
	/*
	 * begin BLOG
	 */
	$options[] = array(
			'name' => __('Blog', 'tecno'),
			'type' => 'heading');
	
	$options[] = array(
			'desc' => __('Display, defaults to true.', 'tecno'),
			'id' => 'tecno_blog_display',
			'std' => '1',
			'type' => 'checkbox');
	
	$options[] = array(
			'name' => __('Blog Title', 'tecno'),
			'desc' => __('Write the homepage blog title.', 'tecno'),
			'id' => 'tecno_blog_title',
			'std' => 'See what happens',
			'type' => 'text');
	
	/*
	$options[] = array(
			'name' => __('Amount of Post to Display', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$cant_post = array(
			'1' => __('One', 'tecno'),
			'2' => __('Two', 'tecno'),
			'3' => __('Three', 'tecno'),
			'4' => __('Four', 'tecno'),
			'5' => __('Five', 'tecno'),
			'6' => __('Six', 'tecno'),
			'7' => __('Seven', 'tecno'),
			'8' => __('Eight', 'tecno'),
			'9' => __('Nine', 'tecno'),
			'10' => __('Ten', 'tecno')
	);
	
	$options[] = array(
			'desc' => __('Select the amount post to display on Blogs.', 'tecno'),
			'id' => 'tecno_blog_post_per_page',
			'std' => 2,
			'type' => 'select',
			'class' => 'mini',
			'options' => $cant_post);
	
	$options[] = array(
			'desc' => __('Select the amount post to display on Categories page.', 'tecno'),
			'id' => 'tecno_category_post_per_page',
			'std' => 2,
			'type' => 'select',
			'class' => 'mini',
			'options' => $cant_post);

	$options[] = array(
			'desc' => __('Select the amount post to display on Searches results.', 'tecno'),
			'id' => 'tecno_search_post_per_page',
			'std' => 2,
			'type' => 'select',
			'class' => 'mini',
			'options' => $cant_post);	

	$options[] = array(
			'desc' => __('Select the amount post to display on Archives page.', 'tecno'),
			'id' => 'tecno_archive_post_per_page',
			'std' => 2,
			'type' => 'select',
			'class' => 'mini',
			'options' => $cant_post);	
	*/
	/*
	 * end BLOG
	 */
	
	/*
	 * begin CONTACT US
	 */	
	
	$options[] = array(
			'name' => __('Contact', 'tecno'),
			'type' => 'heading');
	
	$options[] = array(
			'desc' => __('Display, defaults to true.', 'tecno'),
			'id' => 'tecno_contact_display',
			'std' => '1',
			'type' => 'checkbox');	
	
	$options[] = array(
			'name' => __('Main Contact Title', 'tecno'),
			'desc' => __('Write the main contact title.', 'tecno'),
			'id' => 'tecno_contact_title',
			'std' => 'Stay in touch',
			'type' => 'text');
	
	$options[] = array(
			'name' => __('Contact Location', 'tecno'),
			'desc' => __('Write the contact address.', 'tecno'),
			'id' => 'tecno_contact_address',
			'std' => 'Nueva York, EEUU',
			'type' => 'text');
	
	$options[] = array(
			'name' => __('Before Form Text', 'tecno'),
			'desc' => __('Write the some text to display before form.', 'tecno'),
			'id' => 'tecno_contact_beforeformtext',
			'std' => 'If you have any questions, work enquiries, comments or anything else, please dont hesitate to get in touch using the form below.',
			'type' => 'textarea');

	$options[] = array(
			'name' => __('Social Title & Text', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			//'name' => __('Social title', 'tecno'),
			'desc' => __('Write some social title.', 'tecno'),
			'id' => 'tecno_social_title',
			'std' => 'Social',
			'type' => 'text');

	$options[] = array(
			//'name' => __('Social text', 'tecno'),
			'desc' => __('Write some description.', 'tecno'),
			'id' => 'tecno_social_description',
			'std' => 'Lorem ipsum dolor sit amet, consectetur',
			'type' => 'textarea');

	$options[] = array(
			'name' => __('Social Links', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			//'name' => __('Facebook link', 'tecno'),
			'desc' => __('Write Facebook url.', 'tecno'),
			'id' => 'tecno_social_facebook',
			'std' => 'http://www.facebook.com/',
			'type' => 'text');

	$options[] = array(
			//'name' => __('Twitter link', 'tecno'),
			'desc' => __('Write Twitter url.', 'tecno'),
			'id' => 'tecno_social_twitter',
			'std' => 'http://www.twitter.com/',
			'type' => 'text');	

	$options[] = array(
			//'name' => __('Vimeo link', 'tecno'),
			'desc' => __('Write Vimeo url.', 'tecno'),
			'id' => 'tecno_social_vimeo',
			'type' => 'text');

	$options[] = array(
			//'name' => __('Tumblr link', 'tecno'),
			'desc' => __('Write Tumblr url.', 'tecno'),
			'id' => 'tecno_social_tumblr',
			'type' => 'text');

	$options[] = array(
			'name' => __('Contact Info', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			//'name' => __('Contact Phone', 'tecno'),
			'desc' => __('Write contact phone.', 'tecno'),
			'id' => 'tecno_contact_phone',
			'std' => '(+1) 6 555 9852',
			'type' => 'text');
	
	$options[] = array(
			//'name' => __('Contact Fax', 'tecno'),
			'desc' => __('Write contact fax.', 'tecno'),
			'id' => 'tecno_contact_fax',
			'std' => '+1 (123) 456 789 10 11',
			'type' => 'text');
	
	$options[] = array(
			//'name' => __('Contact Email', 'tecno'),
			'desc' => __('Write contact email.', 'tecno'),
			'id' => 'tecno_contact_email',
			'std' => 'support@freedesigns.me',			
			'type' => 'text');	

	/*
	 * end CONTACT US
	 */
	

	/*
	 * begin PAGES
	*/
	
	$options[] = array(
			'name' => __('Pages', 'tecno'),
			'type' => 'heading');
	
	$options[] = array(
			'desc' => __('Display, defaults to true.', 'tecno'),
			'id' => 'tecno_pages_display',
			'std' => '1',
			'type' => 'checkbox');
	
	$options[] = array(
			'name' => __('Pages Title', 'tecno'),
			'desc' => __('Write the pages title.', 'tecno'),
			'id' => 'tecno_pages_title',
			'std' => 'Read more',
			'type' => 'text');
	
	/*
	 * end PAGES
	 */	
	
	/*
	 * begin ZONES
	 */

	// Pull all the post into an array
	$options_post = array();
	$options_post_obj = get_posts('numberposts=50');
	foreach ($options_post_obj as $p) {
		$options_post[$p->ID] = $p->post_title;
	}
	
	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
	
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}
	
	$content_type = array(
			'post' => __('Post', 'tecno'),
			'page' => __('Page', 'tecno'),
			'category' => __('Category', 'tecno'),
			'tag' => __('Tag', 'tecno'),
	);
	
	$options[] = array(
			'name' => __('Aditional Zones', 'tecno'),
			'type' => 'heading');
	
	$options[] = array(
			'name' => __('Total of Aditional Zones.', 'tecno'),
			'desc' => __('Write the total of aditional zones. You must save after change this value', 'tecno'),
			'id' => 'tecno_zone_total',
			'std' => '1',
			'class' => 'mini',
			'type' => 'text');		
	
	$total_zone = (int)of_get_option('tecno_zone_total',1);
	$total_zone = isset($total_zone) ? $total_zone : 1;
	
	for ($i=1; $i<=$total_zone; $i++){
		$options[] = array(
				'name' => __('Aditional Zone', 'tecno').' '.$i,
				'type' => 'info',
				'desc' => '');		
		$options[] = array(
				'desc' => __('Display, defaults to true.', 'tecno'),
				'id' => 'tecno_zone_'.$i.'_display',
				'std' => '1',
				'type' => 'checkbox');
		$options[] = array(
				'desc' => __('Write the title for this zone.', 'tecno'),
				'id' => 'tecno_zone_'.$i.'_title',
				'std' => 'Aditional Zone'.' '.$i,
				'type' => 'text');
		$options[] = array(
				'desc' => __('Select the type of content for this zone.', 'tecno'),
				'id' => 'tecno_zone_'.$i.'_content_type',
				'std' => 'post',
				'type' => 'radio',
				'options' => $content_type);
		if($options_post){
			$options[] = array(
					'desc' => __('Select a Post, displaying the last 50th post', 'tecno'),
					'id' => 'tecno_zone_'.$i.'_content_select_post',
					'type' => 'select',
					'options' => $options_post);
		}
		if($options_pages){
			$options[] = array(
					'desc' => __('Select a Page, displaying all pages', 'tecno'),
					'id' => 'tecno_zone_'.$i.'_content_select_pages',
					'type' => 'select',
					'options' => $options_pages);
		}
		if ($options_categories) {
			$options[] = array(
					'desc' => __('Select a Category, displaying all categories', 'tecno'),
					'id' => 'tecno_zone_'.$i.'_content_select_categories',
					'type' => 'select',
					'options' => $options_categories);
		}
		if ($options_tags) {
			$options[] = array(
					'desc' => __('Select a Tag, displaying all tags', 'options_check'),
					'id' => 'tecno_zone_'.$i.'_content_select_tags',
					'type' => 'select',
					'options' => $options_tags);
		}	
	}
	/*
	 * end ZONES
	 */
	
	/*
	 * begin SIDEBAR
	 */
	$options[] = array(
			'name' => __('Sidebar', 'tecno'),
			'type' => 'heading');
	
	$options[] = array(
			'name' => __('Search Widget', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
		'desc' => __('Display the widget, defaults to true.', 'tecno'),
		'id' => 'tecno_sidebar_searchwidget_show',
		'std' => '1',
		'type' => 'checkbox');
	
	$options[] = array(
			'desc' => __('Write the title of the widget.', 'tecno'),
			'id' => 'tecno_sidebar_searchwidget_title',
			'std' => 'Search',
			'class' => 'mini',
			'type' => 'text');

	$options[] = array(
			'name' => __('Categories Widget', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			'desc' => __('Display the widget, defaults to true.', 'tecno'),
			'id' => 'tecno_sidebar_categorieswidget_show',
			'std' => '1',
			'type' => 'checkbox');
	
	$options[] = array(
			'desc' => __('Write the title of the widget.', 'tecno'),
			'id' => 'tecno_sidebar_categorieswidget_title',
			'std' => 'Categories',
			'class' => 'mini',
			'type' => 'text');
	
	$options[] = array(
			'desc' => __('Display the total of post, defaults to true.', 'tecno'),
			'id' => 'tecno_sidebar_categorieswidget_post',
			'std' => '1',
			'type' => 'checkbox');
	
	$options[] = array(
			'desc' => __('Hide empty, defaults to true.', 'tecno'),
			'id' => 'tecno_sidebar_categorieswidget_hideempty',
			'std' => '1',
			'type' => 'checkbox');
	
	$options[] = array(
			'desc' => __('Show hierarchical, defaults to false.', 'tecno'),
			'id' => 'tecno_sidebar_categorieswidget_hierarchical',
			'std' => '0',
			'type' => 'checkbox');
	
	$options[] = array(
			'name' => __('Text Widget', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			'desc' => __('Display the widget, defaults to true.', 'tecno'),
			'id' => 'tecno_sidebar_textwidget_show',
			'std' => '1',
			'type' => 'checkbox');
	
	$options[] = array(
			'desc' => __('Write the title of the widget.', 'tecno'),
			'id' => 'tecno_sidebar_textwidget_title',
			'std' => 'Text Widget',
			'class' => 'mini',
			'type' => 'text');
	
	$textwidget_settings = array(
			'wpautop' => true, // Default
			'textarea_rows' => 5,
			'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
			'id' => 'tecno_sidebar_textwidget_text',
			'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lorem non nisi pharetra ornare. Suspendisse quis neque erat. Pellentesque et vehicula nisi. Mauris vehicula purus in augue fringilla cursus. Donec vitae vestibulum ante. Duis bla.',
			'type' => 'editor',
			'settings' => $textwidget_settings );

	$options[] = array(
			'name' => __('Recent Projects Widget', 'tecno'),
			'type' => 'info',
			'desc' => '');
	
	$options[] = array(
			'desc' => __('Display the widget, defaults to true.', 'tecno'),
			'id' => 'tecno_sidebar_recentprojectwidget_show',
			'std' => '1',
			'type' => 'checkbox');
	
	$options[] = array(
			'desc' => __('Write the title of the widget.', 'tecno'),
			'id' => 'tecno_sidebar_recentprojectwidget_title',
			'std' => 'Recent Projects',
			'class' => 'mini',
			'type' => 'text');
	
	$cant_projects = array(
			'3' => __('Three', 'tecno'),
			'6' => __('Six', 'tecno'),
			'9' => __('Nine', 'tecno'),
			'12' => __('Twelve', 'tecno')
	);
	
	$options[] = array(
			'desc' => __('Select the amount of recent project to display.', 'tecno'),
			'id' => 'tecno_sidebar_recentprojectwidget_amount',
			'std' => 6,
			'type' => 'select',
			'class' => 'mini',
			'options' => $cant_projects);
	
	/*
	 * end SIDEBAR
	 */
	
	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
* This example shows/hides an option when a checkbox is clicked.
*/

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) { <?php
  $total_zone = of_get_option('tecno_zone_total',1);
  $total_zone = isset($total_zone) ? $total_zone : 1 ;

  for ($i=1; $i<=$total_zone; $i++){
  	$tecno_zone_content_type = of_get_option('tecno_zone_'.$i.'_content_type');
  	switch ($tecno_zone_content_type) {
  	    case 'page':?>
  $('#section-tecno_zone_<?php echo $i ?>_content_select_post').hide;
  $('#section-tecno_zone_<?php echo $i ?>_content_select_categories').hide();
  $('#section-tecno_zone_<?php echo $i ?>_content_select_tags').hide();  	
  	<?php	break;
  	    case 'category':?>
  $('#section-tecno_zone_<?php echo $i ?>_content_select_post').hide();
  $('#section-tecno_zone_<?php echo $i ?>_content_select_pages').hide();
  $('#section-tecno_zone_<?php echo $i ?>_content_select_tags').hide();
  	<?php	break;
  	    case 'tag':?>
  $('#section-tecno_zone_<?php echo $i ?>_content_select_post').hide();
  $('#section-tecno_zone_<?php echo $i ?>_content_select_pages').hide();
  $('#section-tecno_zone_<?php echo $i ?>_content_select_categories').hide();
  	<?php	break;
  	    default:?>
  $('#section-tecno_zone_<?php echo $i ?>_content_select_pages').hide();
  $('#section-tecno_zone_<?php echo $i ?>_content_select_categories').hide();
  $('#section-tecno_zone_<?php echo $i ?>_content_select_tags').hide();
  	<?php	break;
  	  }?>
  $('#tecno-tecno_zone_<?php echo $i ?>_content_type-post').click(function(){
    $('#section-tecno_zone_<?php echo $i ?>_content_select_pages').fadeOut('fast');
    $('#section-tecno_zone_<?php echo $i ?>_content_select_categories').fadeOut('fast');
    $('#section-tecno_zone_<?php echo $i ?>_content_select_tags').fadeOut('fast');

    $('#section-tecno_zone_<?php echo $i ?>_content_select_post').fadeIn('slow');
  });

  $('#tecno-tecno_zone_<?php echo $i ?>_content_type-page').click(function(){
    $('#section-tecno_zone_<?php echo $i ?>_content_select_post').fadeOut('fast');
    $('#section-tecno_zone_<?php echo $i ?>_content_select_categories').fadeOut('fast');
    $('#section-tecno_zone_<?php echo $i ?>_content_select_tags').fadeOut('fast');
    
    $('#section-tecno_zone_<?php echo $i ?>_content_select_pages').fadeIn('slow');
  });

  $('#tecno-tecno_zone_<?php echo $i ?>_content_type-category').click(function(){
    $('#section-tecno_zone_<?php echo $i ?>_content_select_post').fadeOut('fast');
    $('#section-tecno_zone_<?php echo $i ?>_content_select_pages').fadeOut('fast');
    $('#section-tecno_zone_<?php echo $i ?>_content_select_tags').fadeOut('fast');

    $('#section-tecno_zone_<?php echo $i ?>_content_select_categories').fadeIn('slow');
  });

  $('#tecno-tecno_zone_<?php echo $i ?>_content_type-tag').click(function(){
    $('#section-tecno_zone_<?php echo $i ?>_content_select_post').fadeOut('fast');
    $('#section-tecno_zone_<?php echo $i ?>_content_select_pages').fadeOut('fast');
    $('#section-tecno_zone_<?php echo $i ?>_content_select_categories').fadeOut('fast');

    $('#section-tecno_zone_<?php echo $i ?>_content_select_tags').fadeIn('slow');
  });
<?php  
  }?>  
});
</script>

<?php
}
