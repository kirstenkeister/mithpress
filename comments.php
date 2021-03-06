<?php 
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
 //if ( comments_open() ) : ?>

<?php $ping_count = 0;//DECLARE VARIABLE
	foreach ($comments as $comment) : // GO THROUGH ALL COMMENTS
		$comment_type = get_comment_type();
			if($comment_type != 'comment')
				// IF THE COMMENTS IS NOT AN ACTUAL COMMENT
				// THEN ITS A TRACKBACK / PING
				// WE INCREASE THE COUNT BY ONE
			{
			  $ping_count = $ping_count  + 1 ;
			}
	endforeach; 
?>

<?php $comment_count = 0;//DECLARE VARIABLE
	foreach ($comments as $comment) : // GO THROUGH ALL COMMENTS
		$comment_type = get_comment_type();
			if($comment_type == 'comment')
			{
			  $comment_count = $comment_count  + 1 ;
			}
	endforeach; 
?>
    
<div class="comments">
    <?php if ( post_password_required() ) : ?>
                    <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.'); ?></p>
                </div><!-- #comments -->
    <?php
            /* Stop the rest of comments.php from being processed,
             * but don't kill the script entirely -- we still have
             * to fully load the template.
             */
            return;
        endif;
    ?>

    <?php
        // You can start editing here -- including this comment!
    ?>

    <div id="comments">
        <?php if (have_comments()) : global $wp_query; ?>
        
        <h2><?php comments_number('No Responses', 'One Response', '% Responses' ); ?></h2>
    
		<?php if($comment_count > 0) { ?>
            <h4 id="comments-section">
                <?php echo $comment_count; ?>
                <?php if ($comment_count == 1 ) { ?> Comment 
                <?php } else if ($comment_count > 1 ) { ?> Comments
                <?php } ?>
            </h4>
    
            <ol class="commentlist">
                <?php wp_list_comments('type=comment&callback=commentslist'); ?>
            </ol>
    
        <?php } // end comments-section ?>

		<?php if($ping_count > 0) { ?>
            <h4 id="pingbacks-section">
                <?php if ($ping_count == 1 ) { echo $ping_count; ?> Trackback
                <?php } else if ($ping_count > 1 ) { echo $ping_count; ?> Trackbacks
                <?php } ?>
            </h4>
                <ol class="pingbacklist">
                    <?php wp_list_comments('type=pingback&callback=pingslist'); ?>
                </ol>

        <?php } // end pings-section
		/* ?>
        
        <?php else : // if there are no comments yet ?>
        
        <?php if (comments_open()) : ?>
            <!-- comments open, no comments -->
    
        <?php else : ?>
            <!-- comments closed, no comments -->
    
        <?php endif; */ ?>
    
    <?php endif; // end have_comments() ?>
    </div>
    <!-- /#comments -->
    
    <?php if ('open' == $post->comment_status) : ?>

    <div id="respond">
        <h2>What do you think?</h2>
        <div class="comment_form">

        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p class="comment_message">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
        <?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                <?php if ( $user_ID ) : ?>

                    <p class="comment_message">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

                    <table>
                        <tr>
                            <td colspan="3">
                                <div class="commform-textarea">
                                    <textarea name="comment" id="comment" cols="50" rows="7" tabindex="1"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>

                <?php else : ?>

                    <table>
                        <tr>
                            <td colspan="3">
                                <div class="commform-textarea">
                                    <textarea name="comment" id="comment" cols="50" rows="7" tabindex="1"></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="commform-author">
                                <p>Name <span>required</span></p>
                                <div>
                                    <input type="text" name="author" id="author" tabindex="2" />
                                </div>
                            </td>
                            <td class="commform-email">
                                <p>Email <span>required</span></p>
                                <div>
                                    <input type="text" name="email" id="email" tabindex="3" />
                                </div>
                            </td>
                            <td class="commform-url">
                                <p>Website <span>&nbsp;</span></p>
                                <div>
                                    <input type="text" name="url" id="url" tabindex="4" />
                                </div>
                            </td>
                        </tr>
                    </table>

                <?php endif; ?>

                <p class="comment_message"><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>

                <div class="submit clear">
                    <input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
                    <div id="cancel-comment-reply"><?php cancel_comment_reply_link('Cancel') ?></div>
                </div>
                    
                <div><?php comment_id_fields(); ?><?php do_action('comment_form', $post->ID); ?></div>

            </form>

        <?php endif; // If registration required and not logged in ?>

        </div>

    </div>
    <!-- /#respond -->

        <?php endif; // if you delete this the sky will fall on your head ?>

</div>
<?php //endif; // end ! comments_open() ?>
<!-- #comments -->