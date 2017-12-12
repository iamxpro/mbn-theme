<?php
/**
 * comments (comments.php)
 * List the comments and add form
 * @package WordPress
 * @subpackage MBN
 */
?>
<div id="comments">
	<h2>Всего комментариев: <?php echo get_comments_number(); ?></h2>
	<?php if (have_comments()) : ?>
	<ul class="comment-list media-list">
		<?php
			$args = array(
				'walker' => new clean_comments_constructor,
			);
			wp_list_comments($args); 
		?>
	</ul>
		<?php if (get_comment_pages_count() > 1 && get_option( 'page_comments')) : ?>
		<?php $args = array(
				'prev_text' => '«',
				'next_text' => '»',
				'type' => 'array',
				'echo' => false
			); 
			$page_links = paginate_comments_links($args);
			if( is_array( $page_links ) ) {
			    echo '<ul class="pagination comments-pagination">';
			    foreach ( $page_links as $link ) {
			    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>";
			        else echo "<li>$link</li>"; 
			    }
			   	echo '</ul>';
		 	}
		?>
		<?php endif; ?>
	<?php endif; ?>
	<?php if (comments_open()) {
		$fields =  array(
			'author' => '<div class="form-group"><label for="author">Name</label><input class="form-control" id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30" required></div>',
			'email' => '<div class="form-group"><label for="email">Email</label><input class="form-control" id="email" name="email" type="email" value="'.esc_attr($commenter['comment_author_email']).'" size="30" required></div>',
			'url' => '<div class="form-group"><label for="url">Site</label><input class="form-control" id="url" name="url" type="text" value="'.esc_attr($commenter['comment_author_url']).'" size="30"></div>',
			);
		$args = array(
			'fields' => apply_filters('comment_form_default_fields', $fields),
			'comment_field' => '<div class="form-group"><label for="comment">Comment:</label><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" required></textarea></div>',
			'must_log_in' => '<p class="must-log-in">You must be registered! '.wp_login_url(apply_filters('the_permalink',get_permalink())).'</p>',
			'logged_in_as' => '<p class="logged-in-as">'.sprintf(__( 'You are logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Go out?</a>'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink',get_permalink()))).'</p>',
			'comment_notes_before' => '<p class="comment-notes">Your email will not be published.</p>',
			'comment_notes_after' => '<p class="help-block form-allowed-tags">'.sprintf(__( 'You can use the following <abbr>HTML</abbr> Tags: %s'),'<code>'.allowed_tags().'</code>').'</p>',
			'id_form' => 'commentform',
			'id_submit' => 'submit',
			'title_reply' => 'Leave a comment',
			'title_reply_to' => 'Reply %s',
			'cancel_reply_link' => 'Cancel reply',
			'label_submit' => 'Send',
			'class_submit' => 'btn btn-default'
		);
	    comment_form($args);
	} ?>
</div>