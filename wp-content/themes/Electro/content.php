<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>
<?php if(is_sticky($post->ID)):?>
<div id="post-<?php echo $post->ID; ?>" <?php post_class('bpost sticky', $post->ID); ?>>
<?php else:?>
<div id="post-<?php echo $post->ID; ?>" <?php post_class('bpost', $post->ID); ?>>
<?php endif;?>
  <?php 
  if ( is_single() ) {
  	if( has_post_thumbnail($post->ID) ) { 
  		the_post_thumbnail('post-thumb-large', array('alt'=>$post->post_title));
  	}/*else{ ?>
  		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post/859x346.gif" alt="<?php echo $post->post_title; ?>"/><?php 
  	}*/
  } else { 
  	if( has_post_thumbnail($post->ID) ) {?>
  <a href="<?php the_permalink(); ?>">
  <?php the_post_thumbnail('post-thumb-large', array('alt'=>$post->post_title)); ?>
  </a><?php
    }/*else{ ?>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/post/859x346.gif" alt="<?php echo $post->post_title; ?>"/><?php
    }*/
  }?>

  <div class="star-icon">
  </div>

  <div class="bpost_content">
  <?php if ( is_single() ) : ?>
    <h4><?php the_title(); ?></h4>
  <?php else : ?>  
    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'tecno' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
      <h4><?php the_title(); ?></h4>
    </a>
  <?php endif;?>
  </div> <!-- end bpost_content -->

	<?php get_template_part( 'content-post-meta', get_post_format()); ?>

  <div class="bp_offset">
    <div class="bpost_text">
    <?php if ( is_single() ) : ?>
      <?php the_content(); ?>
    <?php else : ?>
      <?php the_content(__( 'read more', 'tecno' )); ?>
    <?php endif;?>
      <div class="clear"></div>  
    </div>    
   </div> <!-- end offset -->
   
</div> <!-- end bpost -->