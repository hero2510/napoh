<?php
/**
 * The template for displaying Author pages.
 */

get_header(); ?>

<div class="container">
  <?php if ( have_posts() ) : ?>

			<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>
  <div class="row-fluid" style="margin-top:70px;">
    <h2 class="title"><?php printf( __( 'Author Archives: %s', 'twentytwelve' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?> </h2>
  </div>
			<?php
			/* Since we called the_post() above, we need to
			 * rewind the loop back to the beginning that way
			 * we can run the loop properly, in full.
			 */
			rewind_posts();
		?>
  
  <div class="row-fluid">
  
    <div class="span9">      
    
    <?php
			// If a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="author-info">
				<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'tecno_author_bio_avatar_size', 60 ) ); ?>
				</div><!-- .author-avatar -->
				<div class="author-description">
					<h2><?php printf( __( 'About %s', 'tecno' ), get_the_author() ); ?></h2>
					<p><?php the_author_meta( 'description' ); ?></p>
				</div><!-- .author-description	-->
			</div><!-- .author-info -->
			<?php endif; 
      
      while (have_posts()) : 
        
        the_post(); 
        
        get_template_part( 'content', get_post_format() ); 
      
      endwhile; 
      
      get_template_part( 'content-link-pages', get_post_format() );
      
    else :
    
      get_template_part( 'content-not-found', get_post_format() );
  
		endif; 
		wp_reset_query(); ?>
    

    </div> <!-- end span9 -->
    
    <?php get_sidebar(); ?>
    
  </div> <!-- end row-fluid -->
      
</div> <!-- container -->    
<?php get_footer(); ?>