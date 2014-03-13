<?php
// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'tecno_recentprojects_widgets' );

// Register widget
function tecno_recentprojects_widgets() {
	register_widget( 'Recent_Projects_Widget' );
}

// Widget class
class Recent_Projects_Widget extends WP_Widget {

	public function Recent_Projects_Widget(){
		// Widget settings
		$widget_ops = array(
				'classname' => 'Tecno_Recent_Projects',
				'description' => __('A widget that displays thumbs of the recent projects .', 'tecno')
		);
		
		// Widget control settings
		$control_ops = array(
				'width' => 250,
				'height' => 50,
				'id_base' => 'tecno_recentprojects_widget'
		);
		
		// Create the widget
		$this->WP_Widget( 'tecno_recentprojects_widget', __('Recent Projects', 'tecno'), $widget_ops, $control_ops );
		
	}
	
	
  /**  
  * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
  * @param array $instance The settings for the particular instance of the widget
  */
  public function widget($args, $instance) {
  	extract( $args );
  	global $post;
  	// Our variables from the widget settings
  	$title = apply_filters('widget_title', $instance['title'] );
  	
  	$amount_projects = $instance['amount_projects'];
  	
  	// Before widget (defined by theme functions file)
  	echo '<div class="sidebar-widget show-'.$amount_projects.'">';
  	
  	// Display the widget title if one was input
  	if ( $title )
  		echo $before_title . $title . $after_title;
  	
  	// Display Recent Projects
  	$recent_project_args = array(
  			'post_type' => 'post',  			
  			'posts_per_page' => $amount_projects
  	);
  	$recent_project_query = new WP_Query( $recent_project_args );
  	
  	//query_posts('posts_per_page='.$amount_projects.'&post_type=post');
    if ($recent_project_query->have_posts()) :?>
      <ul class="rpost">
  	<?php while ($recent_project_query->have_posts()) : 
  	        $recent_project_query->the_post();
  	        $recent_project = $post;
  	?>    
	      <li>
	        <a href="<?php the_permalink(); ?>">
	      <?php if( has_post_thumbnail($recent_project->ID) ) { 
	      	  the_post_thumbnail('post-thumb-mini', array('alt'=>$recent_project->post_title));
	        }else{ ?>
	          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post/70x50.gif" alt="<?php echo $recent_project->post_title; ?>"/>
	        <?php } ?>
	        </a>
	      </li>      
  	<?php endwhile;?>    
	    </ul>
    <?php else: ?>
      <p>There are no projects to display.</p><?php 
    endif;
    wp_reset_query();
  	 
    // After widget (defined by theme functions file)
    echo $after_widget.'<div class="clear"></div>';
  }

	
  /** 
  * @param array $new_instance New settings for this instance as input by the user via form()
  * @param array $old_instance Old settings for this instance
  * @return array Settings to save or bool false to cancel saving 
  */
  public function update($new_instance, $old_instance) {
  	$instance = $old_instance;
  	
  	$instance['title'] = strip_tags( $new_instance['title'] );
  	
  	$instance['amount_projects'] = strip_tags( $new_instance['amount_projects'] );
  	
  	return $instance;
  }

  
  /**
  * @param array $instance Current settings
  * @return string
  */
  public function form($instance) {
  	// Set up some default widget settings
  	$defaults = array(
  			'title' => 'Recent Projects',
  			'amount_projects' => '3'
  	);
  	
  	$cant_projects = array(
  			'3' => __('Three', 'tecno'),
  			'6' => __('Six', 'tecno'),
  			'9' => __('Nine', 'tecno'),
  			'12' => __('Twelve', 'tecno')
  	);
  	
  	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
  	
  	<!-- Widget Title: Text Input -->
  	<p>
  		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'tecno') ?></label>
  		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
  	</p>
  	
  	<!-- Ourteam 1: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'amount_projects' ); ?>"><?php _e('Amount of recent project to display:', 'tecno') ?> </label>
			<select class="widefat" type="text" id="<?php echo $this->get_field_id( 'amount_projects' ); ?>" name="<?php echo $this->get_field_name( 'amount_projects' ); ?>">
		  <?php foreach ($cant_projects as $key => $valor ) : ?>
		    <option value="<?php echo $key?>" <?php echo $instance['amount_projects'] == $key ? 'selected="selected"' : ''; ?>><?php echo $valor;?></option>
<?php  endforeach;?>
			</select>
		</p>
<?php 
  }
 
}

