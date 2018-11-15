<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die ('Please do not load this page directly. Thanks!');
}

if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

        <h2 class="comments-title uk-text-center no-margin">
            <?php _e( 'Comments', 'lexco-digital' ); ?>
        </h2>
        <hr class="uk-text-center text-center">
        
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
        wp_list_comments (
            array(
                'avatar_size' => 100,
                'short_ping'  => true,
                'callback'    => 'format_comment',
                'style'       => 'ul',
            )
        );
        
    ?>
    
    <?php
    
    else : ?>
    
    <div class="flex-col-4 start-2 uk-text-center no-margin">
        <p>There are no comments yet <br> Be the first to comment by leaving a reply below.</p>
    </div>
    
    <?php
	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && 
        post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'lexco-digital' ); ?></p>
	<?php
	endif;

    comment_form( array( 'class_submit' => 'uk-button uk-button-default' ) );
    
    paginate_comments_links( array(
        'prev_text'  => 'back',
        'next_text' => 'forward'
        ) );

    
    /*
    * This function is used to reformat the default 'comments_template()'
    */
    function format_comment($comment, $args, $depth) {
    
       $GLOBALS['comment'] = $comment; ?>
    
        <div <?php comment_class( '' ); ?> id="li-comment-<?php comment_ID() ?>">
             
            <div class="comment-intro" style="display: none;">
                <?php echo get_avatar( $comment, $default = get_stylesheet_directory_uri().'/images/default-avatar.png' ); ?>

                <div class="comment-intro-2 flex no-padding justify-between">
                    <p>
                        <?php 
                        printf(__('%s', 'lexco-digital'), get_comment_author_link())
                        ?>
                    </p>
                    <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>">
                        <?php printf(__('%1$s', 'lexco-digital'), get_comment_date( 'M j, Y' ), get_comment_time()) ?>
                    </a>
                </div><!-- .comment-intro-2 -->
            </div><!-- .comment-intro -->
            
            <?php
            if ($comment->comment_approved == '0') : 
            ?>
                <em> <?php _e( 'Your comment is awaiting moderation.', 'lexco-digital' ); ?> </em><br />
            <?php endif; ?>

        
            
            <div class="uk-card uk-card-default uk-width-2-3@s uk-margin-auto uk-margin-medium-top">
                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="40" height="40" src="<?php echo get_avatar_url( $comment, $default = get_stylesheet_directory_uri().'/images/default-avatar.png' ); ?>">
                        </div>
                        <div class="uk-width-expand">
                                <?php 
                                printf(__('<p class="uk-margin-remove-bottom">%s</p>', 'lexco-digital'), get_comment_author_link())
                                ?>
                            
                            <p class="uk-text-meta uk-text-muted uk-text-small uk-margin-remove-top">
                                <time datetime="2016-04-01T19:00">
                                    <?php printf(__('%1$s', 'lexco-digital'), get_comment_date( 'M j, Y' ), get_comment_time()) ?>
                                </time>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <p><?php comment_text(); ?></p>
                </div>
                <div class="uk-card-footer">
                    <a href="#" class="uk-button uk-button-text">
                        <?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </a>
                </div>
            </div>
    
        <?php } ?>
            
    </div><!-- #comments -->

</div>

</div>
