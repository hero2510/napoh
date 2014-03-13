<?php
/**
 * The template for displaying search forms in Tecno
 */
?>
<div class="search">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<!-- 
		<label for="s" class="assistive-text"><?php _e( 'Search', 'tecno' ); ?></label>
		 -->
		<input type="text" class="ip_text" name="s" id="s" placeholder="<?php esc_attr_e( 'Search Something', 'tecno' ); ?>" />
		<!-- 
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'tecno' ); ?>" />
		 -->
	</form>
</div> <!-- end search -->	
	

