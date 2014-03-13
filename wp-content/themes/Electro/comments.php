<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<h2 class="title">This post is password protected.</h2>
		<h3 class="title">Enter the password to view comments.</h3>
	<?php
		return;
	}
?>
<?php if ( have_comments() ) : ?>
      <div id="comments" class="comment_section">
        <div class="comments">
          <h4><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h4>
          <?php wp_list_comments( array( 'callback' => 'tecno_comment' ) ); ?>
        </div>
      </div>
      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
      <div class="cpost_nav">
  			<h4 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'tecno' ); ?></h4>  			
			  <?php paginate_comments_links(
			  		array(
		  				  "type" => "list",
			  				"end_size" => 1,
            		"mid_size" => 1,
            		"prev_next" => true,
            		"next_text" => __('Next', 'tecno'),
            		"prev_text" => __('Prev', 'tecno'), )); ?>  			  
  			
			</div>
      <?php endif; // check for comment navigation ?>
      
<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<h3 class="title">Comments are closed.</h3>

	<?php endif; ?>
      
<?php endif;?>      
<?php if ( comments_open() ) : ?>      
      <div class="cf_input_container">
      <?php
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        
        $comment_args = array(
        		'id_form' => 'commentform',
        		'id_submit' => 'submit',
        		'title_reply' => __( 'Leave a comment', 'tecno'),
        		'title_reply_to' => __( 'Leave a comment to %s', 'tecno' ),
        		'cancel_reply_link' => __( 'Cancel comment', 'tecno' ),
        		'label_submit' => __( 'Send', 'tecno' ),
        		'comment_field' => '<div class="clear"></div><label for="comment" class="message">Message :</label><div class="clear"></div><textarea class="message" name="comment" id="comment" tabindex="4"></textarea>',
        		'must_log_in' => '<p>You must be <a href="'.wp_login_url( get_permalink() ).'">logged in</a> to post a comment.</p>',
        		'logged_in_as' => '<p>Logged in as <a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>. <a href="'.wp_logout_url(get_permalink()).'" title="Log out of this account">Log out &raquo;</a></p>',
        		'fields' => apply_filters('comment_form_default_fields', array(
        				  'author' =>  '<div class="cf_input name"><label for="name">Name ' . ( $req ? '(<span class="required">required</span>)' : '' ) . ' :</label><input type="text" id="name" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" tabindex="1" ' . $aria_req . '></div>',
        				  'email'  =>  '<div class="cf_input name"><label for="email">Email ' . ( $req ? '(<span class="required">required</span>)' : '' ) . ' :</label><input type="email" id="email" name="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" tabindex="2" ' . $aria_req . '></div>',
        				  'url'  =>  '<div class="cf_input name"><label for="url">Website :</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" tabindex="3"></div>'
        				)),
        		'comment_notes_before'  =>  '',
        		'comment_notes_after'  =>  '',
    		);
        comment_form($comment_args, $post->ID);
      ?>      
      </div>
<?php endif; ?>