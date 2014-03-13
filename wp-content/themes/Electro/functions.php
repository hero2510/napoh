<?php
/*
 * Loads the Options Panel
*
* If you're loading from a child theme use stylesheet_directory
* instead of template_directory
*/

if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

if ( ! isset( $content_width ) )
	$content_width = 1170;

function tecno_setup() {
	/*
	 * Makes Tecno available for translation.
	*
	* Translations can be added to the /languages/ directory.
	* If you're building a theme based on Tecno, use a find and replace
	* to change 'tecno' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'tecno', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'tecno_setup' );

if( !function_exists( 'tecno_load_styles' ) ) {
	function tecno_load_styles(){
		global $wp_styles;
		if(!is_admin()){
			//Apply basic typography styles
			wp_enqueue_style('fonts', get_stylesheet_directory_uri().'/css/fonts.css');
			//Reset browser defaults
			wp_enqueue_style('reset', get_stylesheet_directory_uri().'/css/reset.css', array('fonts'));
			//Apply basic bootstrap styles
			wp_enqueue_style('bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css', array('reset'));
			//Apply basic bootstrap responsive styles
			wp_enqueue_style('bootstrap_responsive', get_stylesheet_directory_uri().'/css/bootstrap-responsive.css', array('bootstrap'));
			//Apply default theme styles and colors
			wp_enqueue_style('main', get_stylesheet_directory_uri().'/css/main.min.css', array('bootstrap_responsive'));
			//Apply default flexslider styles
			wp_enqueue_style('flexslider', get_stylesheet_directory_uri().'/css/flexslider.min.css', array('main'));
			//Apply basic prettyPhoto styles
			wp_enqueue_style('prettyPhoto', get_stylesheet_directory_uri().'/css/prettyPhoto.css', array('main'));

			wp_register_style('main_alternate', get_stylesheet_directory_uri().'/css/main.min.css', array('main'));
			wp_enqueue_style('main_alternate');
			$wp_styles->add_data('main_alternate', 'rel', 'alternate');
			$wp_styles->add_data('main_alternate', 'title', 'pink');
			wp_enqueue_style('blue_alternate', get_stylesheet_directory_uri().'/css/blue.css', array('main'));
			$wp_styles->add_data('blue_alternate', 'rel', 'alternate');
			$wp_styles->add_data('blue_alternate', 'title', 'blue');
			wp_enqueue_style('yellow_alternate', get_stylesheet_directory_uri().'/css/yellow.css', array('main'));
			$wp_styles->add_data('yellow_alternate', 'rel', 'alternate');
			$wp_styles->add_data('yellow_alternate', 'title', 'yellow');
			wp_enqueue_style('green_alternate', get_stylesheet_directory_uri().'/css/green.css', array('main'));
			$wp_styles->add_data('green_alternate', 'rel', 'alternate');
			$wp_styles->add_data('green_alternate', 'title', 'green');

			wp_enqueue_style( 'tecno_style', get_stylesheet_uri() );
		}
	}
	add_action( 'wp_enqueue_scripts', 'tecno_load_styles' );
}

function add_this_css_header(){?>
<!-- IE specific CSS stylesheet -->
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_stylesheet_directory_uri()?>/css/ie.css" />
<![endif]--><?php 
}
add_action('wp_head', 'add_this_css_header', 20);

if( !function_exists( 'tecno_load_scripts' ) ) {
	function tecno_load_scripts(){
		wp_enqueue_script('jquery');
		
		if(!is_admin() && !is_singular() && !is_category() && !is_search() && !is_archive()):
  		wp_enqueue_script('jquery_isotope', get_template_directory_uri().'/js/jquery.isotope.min.js', array('jquery'), false, true);
  		wp_enqueue_script('jquery_tooltip', get_template_directory_uri().'/js/jquery.tooltip.js', array('jquery'), false, true);
  		wp_enqueue_script('jquery_flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), false, true);
  		wp_enqueue_script('jquery_prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array('jquery'), false, true);
  		wp_enqueue_script('google_maps_api', 'http://maps.google.com/maps/api/js?sensor=true', array('jquery'), false, true);
  		wp_enqueue_script('jquery_gmap', get_template_directory_uri().'/js/jquery.gmap.min.js', array('jquery', 'google_maps_api'), false, true);
  	endif;
		 
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply', false, array('jquery'), false, true );
		
		wp_enqueue_script('styleswitcher', get_template_directory_uri().'/js/styleswitcher.js', array('jquery'), false, true);
		wp_enqueue_script('switch', get_template_directory_uri().'/js/switch.js', array('jquery', 'styleswitcher'), false, true);
				
		//wp_enqueue_script('jquery_scrollTo', get_template_directory_uri().'/js/jquery.scrollTo-min.js', array('jquery'), false, true);
		//wp_enqueue_script('html5', get_template_directory_uri().'/js/html5.js', array('jquery', 'jquery_scrollTo'), false, true);
		//wp_enqueue_script('jquery_nav', get_template_directory_uri().'/js/jquery.nav.js', array('jquery', 'html5'), false, true);
	}
	add_action('wp_enqueue_scripts', 'tecno_load_scripts');
}

function add_this_script_footer(){?>
  <!-- -->  
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.scrollTo.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/html5.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.nav.js"></script>
  
  <script type="text/javascript">
  jQuery(document).ready(function() {
    // Start one page nav on .main_nav
    jQuery('.main_nav').onePageNav();
    
    if (typeof jQuery().prettyPhoto != 'undefined'){
      // PrettyPhoto Gallery
      jQuery("a[class^='prettyPhoto']").prettyPhoto();
    }
  });
  </script>
  
  <!-- FLEXSLIDER -->  
  <script type="text/javascript">
  if (typeof jQuery().flexslider != 'undefined'){
    jQuery(window).load(function() {
      jQuery('.flexslider').flexslider({
        animation: "slide"
      });
    });
  }
  </script> 
  
  <!-- ISOTOPE PORTFOLIO -->  
  <script type="text/javascript">
    jQuery(document).ready(function() {
      if (typeof jQuery().isotope != 'undefined'){
        // cache container
        var $container = jQuery('#portfolio_container');
        // initialize isotope
        $container.isotope({
          itemSelector : '.pfolio_item',
        });
        // filter items when filter link is clicked
        jQuery('#filters a').click(function(){
          var selector = jQuery(this).attr('data-filter');
          $container.isotope({ filter: selector });
          return false;
        });
      }        
    });
  </script>
        
  <script type="text/javascript">
    jQuery(window).resize(function(){
      var $filters = jQuery("#filters");
      $filters.find('li a.selected').trigger('click');
    });
  </script>
        
  <script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery('#filters li a').click(function() {
        jQuery('#filters li a').removeClass('selected');
        jQuery(this).addClass('selected');
      });
    });
  </script>
        
  <!-- PORTFOLIO HOVER IMAGES -->      
  <script type="text/javascript">
    jQuery(document).ready(function () {
      jQuery('.picture a').hover(function () {
        jQuery(this).find('.image-overlay-zoom, .image-overlay-link').stop().fadeTo('fast', 1);
      },function () {
        jQuery(this).find('.image-overlay-zoom, .image-overlay-link').stop().fadeTo('fast', 0);
      });
    });
  </script>

<?php	$tecno_contact_address = of_get_option('tecno_contact_address', true); ?>        
  <!-- GOOGLE MAPS -->
  <script type="text/javascript">
  if (typeof jQuery().gMap != 'undefined'){
    jQuery('#googlemaps').gMap({
      maptype: 'ROADMAP',
      scrollwheel: false,
      zoom: 13,
      markers: [
        {
          address: '<?php echo $tecno_contact_address; ?>', // Your Adress Here
          html: '',
          popup: false,
        }
    
      ],      
    });
  }
  </script><?php 
} 
add_action('wp_footer', 'add_this_script_footer', 20);


if( !function_exists( 'tecno_register_menu' ) ) {
	function tecno_register_menu() {
		register_nav_menu('tecno_header_menu_int', __('Header Menu Internal', 'tecno'));
		register_nav_menu('tecno_header_menu_ext', __('Header Menu External', 'tecno'));
		register_nav_menu('tecno_footer_menu', __('Footer Menu','tecno'));		
	}
	add_action('init', 'tecno_register_menu');
}

if( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 859, 346, true ); // Normal post thumbnails
	add_image_size( 'homepage-thumb', 399, 260, true);
	add_image_size( 'portfolio-thumb', 540, 280, true); // for the portfolio template
	add_image_size( 'portfolio-large', 1024, 768, false); // for the single portfolio page
	add_image_size( 'post-thumb-large', 859, 346, true); // for large post thumb
	add_image_size( 'post-thumb-mini', 70, 50, true); // for recent projects
}

function tecno_widgets_init(){
	register_sidebar( array(
			'name' => __( 'Right Sidebar', 'tecno' ),
			'id' => 'right-sidebar',
			'description' => __( '', 'tecno' ),
			'before_widget' => '<div class="sidebar-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
	) );
}
add_action('widgets_init', 'tecno_widgets_init');

include(dirname(__FILE__)."/inc/widget-search.php");
include(dirname(__FILE__)."/inc/widget-recent-projects.php");

/*-----------------------------------------------------------------------------------*/
/* Output featured image */
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'image' ) ) {
	function image($postid, $imagesize) {
		// get the featured image for the post
		$thumbid = 0;
		if( has_post_thumbnail($postid) ) {
			$thumbid = get_post_thumbnail_id($postid);
		}

		// get first 2 attachments for the post
		$args = array(
				'orderby' => 'menu_order',
				'post_type' => 'attachment',
				'post_parent' => $postid,
				'post_mime_type' => 'image',
				'post_status' => null,
				'numberposts' => 10
		);
		$attachments = get_posts($args);

		if( !empty($attachments) ) {
			foreach( $attachments as $attachment ) {
				// if current image is featured image reloop
				if( $attachment->ID == $thumbid ) continue;
				$src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
				$alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
				echo "<div class='image-frame'>";
				echo "<img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' />";
				echo "</div>";
				// got image, time to exit foreach
				break;
			}
		}
	}
}

class Portfolio_Walker extends Walker_Category {
	function start_el(&$output, $category, $depth, $args) {
		extract($args);

		$cat_name = esc_attr( $category->name );
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		$link = '<a href="#" ';
		$link .= 'data-filter=".' . urldecode($category->slug) . '" ';
		if ( $use_desc_for_title == 0 || empty($category->description) )
			$link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s', 'tecno' ), $cat_name) ) . '"';
		else
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		$link .= '>';
		$link .= $cat_name . '</a>';

		if ( !empty($feed_image) || !empty($feed) ) {
			$link .= ' ';

			if ( empty($feed_image) )
				$link .= '(';

			$link .= '<a href="' . get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) . '"';

			if ( empty($feed) ) {
				$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s', 'tecno' ), $cat_name ) . '"';
			} else {
				$title = ' title="' . $feed . '"';
				$alt = ' alt="' . $feed . '"';
				$name = $feed;
				$link .= $title;
			}

			$link .= '>';

			if ( empty($feed_image) )
				$link .= $name;
			else
				$link .= "<img src='$feed_image'$alt$title" . ' />';

			$link .= '</a>';

			if ( empty($feed_image) )
				$link .= ')';
		}

		if ( !empty($show_count) )
			$link .= ' (' . intval($category->count) . ')';

		if ( !empty($show_date) )
			$link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);

		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'cat-item cat-item-' . $category->term_id;
			if ( !empty($current_category) ) {
				$_current_category = get_term( $current_category, $category->taxonomy );
				if ( $category->term_id == $current_category )
					$class .=  ' current-cat';
				elseif ( $category->term_id == $_current_category->parent )
				$class .=  ' current-cat-parent';
			}
			//$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}
}

if(!function_exists('tecno_comment')){
	function tecno_comment($comment, $args, $depth){ 
		$GLOBALS['comment'] = $comment; 
		global $post; ?>
	<div class="simple_comment" id="comment-<?php comment_ID(); ?>">
    <?php echo get_avatar( $comment, 70 ); ?>
    <div class="comment_meta">
      <?php printf( '<h4>%1$s %2$s</h4>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '[<span class="bypostauthor"> ' . __( 'Post author', 'tecno' ) . ' </span>]' : ''
					);?>      
      <div class="date">
      <p>
        <?php printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'tecno' ), ucwords(get_comment_date('F j, Y')), get_comment_time('h:i a') )
					);?>
      </p>
      </div>
      <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'tecno' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>             
    </div>
    <!-- comment_meta -->
    <div class="clear"></div>
    <div class="comment_text"><?php comment_text(); ?></div>    
    <?php edit_comment_link( __( 'Edit', 'tecno' ), '<p class="edit-link">', '</p>' ); ?>
    <div class="clear"></div>
  </div>		
<?php 
	}
}
