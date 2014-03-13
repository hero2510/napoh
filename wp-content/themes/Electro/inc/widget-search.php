<?php
// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'tecno_search_widgets' );

// Register widget
function tecno_search_widgets() {
	register_widget( 'Search_Widget' );
}

// Search Widget class
class Search_Widget extends WP_Widget {
	
	public function Search_Widget(){
		// Widget settings
		$widget_ops = array(
				'classname' => 'Tecno_Search',
				'description' => __('A widget that displays search form with custom style.', 'tecno')
		);
	
		// Widget control settings
		$control_ops = array(
				'width' => 250,
				'height' => 50,
				'id_base' => 'tecno_search_widget'
		);
	
		// Create the widget
		$this->WP_Widget( 'tecno_search_widget', __('Search Widget', 'tecno'), $widget_ops, $control_ops );
	
	}
	
	/**
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	public function widget($args, $instance) {
		extract( $args );
		 
		// Our variables from the widget settings
		$title = apply_filters('widget_title', $instance['title'] );
		 
		// Before widget (defined by theme functions file)
		echo $before_widget.'<div class="search_widget">';
		 
		// Display the widget title if one was input
		if ( $title )
			echo $before_title . $title . $after_title;
		 
		get_search_form();
	  	 
    // After widget (defined by theme functions file)
    echo '</div>'.$after_widget;
  }
		
  /**
   * @param array $new_instance New settings for this instance as input by the user via form()
   * @param array $old_instance Old settings for this instance
   * @return array Settings to save or bool false to cancel saving
   */
  public function update($new_instance, $old_instance) {
  	$instance = $old_instance;
  	 
  	$instance['title'] = strip_tags( $new_instance['title'] );
  	 
  	return $instance;
  }

  /**
   * @param array $instance Current settings
   * @return string
   */
  public function form($instance) {
  	// Set up some default widget settings
  	$defaults = array(
  			'title' => 'Search'
  	);
  	 
  	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
  	
  	<!-- Widget Title: Text Input -->
  	<p>
  		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'tecno') ?></label>
  		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
  	</p><?php 
  }
    
	
}