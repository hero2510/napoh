<?php
/**
 * The template for displaying content in the single.php template
 */
?>
<div id="post-<?php echo $post->ID; ?>" <?php post_class('bpost', $post->ID); ?>>

  <?php 
  if( has_post_thumbnail($post->ID) ) {
  	the_post_thumbnail('post-thumb-large', array('alt'=>$post->post_title));
	}
	/*else{ ?>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post/859x346.gif" alt="<?php echo $post->post_title; ?>"/><?php 
	}*/ ?>
  
  <div class="star-icon">
  </div>

  <div class="bpost_content">
    <h4><?php the_title(); ?></h4>
  </div> <!-- end bpost_content -->

	<?php get_template_part( 'content-post-meta', get_post_format()); ?>

  <div class="bp_offset">
    <div class="bpost_text">
      <?php the_content(); ?>      
    </div>
   </div> <!-- end offset -->
   
</div> <!-- end bpost -->