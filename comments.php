<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <div class="comment_top_area p-100">
            <h2 class="comments-title">
                <?php
                $comment_count = get_comments_number();
                echo 'Comments ('. number_format_i18n($comment_count) .')';
                echo '  <div class="title_border"><img src="'. get_template_directory_uri() . '/assets/images/home/border_icon.png" width="36" height="30"></div>';
                ?>
            </h2>

            <ul class="comment-list">
                <?php
                wp_list_comments(array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'avatar_size'=> 100,
                'callback'   => 'my_custom_comment_layout' // Custom callback function
            ));
            ?>
        </ul>
    </div>

    <?php the_comments_navigation(); ?>

<?php endif; ?>

<?php
if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
<p class="no-comments"><?php _e('Comments are closed.', 'textdomain'); ?></p>
<?php endif; ?>

<?php 
$comment_form_args = array(
    'label_submit' => __('Post Comment', 'textdomain'),
    'title_reply'       => '<span class="title-reply-with-img">' . __('Leave a Reply', 'textdomain') . '<div class="title_border"><img src="'. get_template_directory_uri() . '/assets/images/home/border_icon.png" width="36" height="30"></div></span>',
    'comment_notes_after' => '',
    'comment_field' => '<p class="comment-form-comment input-field">' .
    '<textarea id="comment" name="comment" cols="" rows="" required></textarea>'.
    '<label for="comment">' . __('Comment*', 'textdomain') . '</label></p>',
    'fields' => apply_filters('comment_form_default_fields', array(
        'author' => '<p class="comment-form-author input-field">' .
        '<input id="author" name="author" type="text" value="" size="30" required />'.
        '<label for="author">' . __('Name*', 'textdomain') . '</label></p> ',
        'email' => '<p class="comment-form-email input-field">' .
        '<input id="email" name="email" type="email" value="" size="30" required />'.
        '<label for="email">' . __('Email*', 'textdomain') . '</label></p> ',
    )),
    'submit_button' => '<p class="form-submit button_submit_form">' .
        '<button name="%1$s" type="submit" id="%2$s" class="%3$s button-wrap">' .
        '<span>%4$s' . 
        '<i class="ri-arrow-right-line"></i></span>' .
        '</button>' .
        '</p>',
    );

comment_form($comment_form_args);

?>
</div>

<?php
function my_custom_comment_layout($comment, $args, $depth) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    $comment_class = 'comment';
    $comment_class .= empty( $args['has_children'] ) ? '' : ' parent';

    echo '<' . $tag . ' '; comment_class( $comment_class, $comment, null, false ); echo ' id="comment-' . get_comment_ID() . '">';
    ?>
    <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
        <footer class="comment-meta">
            <?php echo get_avatar( $comment, 100 ); ?>
            <div class="left_comment_area">
                <div class="comment-author vcard">
                    <?php printf( '<b class="fn">%s</b>', get_comment_author_link() ); ?>
                    <div class="comment-metadata">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php printf( '%1$s', get_comment_date(), get_comment_time() ); ?>
                        </time>
                        <?php edit_comment_link( __( 'Edit', 'textdomain' ), '<span class="edit-link">', '</span>' ); ?>
                    </div>
                </div>


                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'textdomain' ); ?></p>
                <?php endif; ?>
                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>

                <div class="reply">
                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => 'REPLAY <svg class="material-icons" id="icon-chat" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"><mask id="mask0_1_8304" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><path d="M0 0H24V24H0V0Z" fill="white"/></mask><g mask="url(#mask0_1_8304)"><path d="M16.0054 9.414L7.39838 18.021L5.98438 16.607L14.5904 8H7.00538V6H18.0054V17H16.0054V9.414Z" fill="#0A1D35"/></g></svg>'
                    ) ) );
                    ?>
                </div>
            </div>
            
        </footer>

        
    </article>
    <?php
    echo '</' . $tag . '>';
}
?>

<script type="text/javascript">
    jQuery(document).ready(function($) {
    $('#commentform').submit(function(event) {
        var error = false;
        $(this).find('[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('error');
                error = true;
            } else {
                $(this).removeClass('error');
            }
        });

        if (error) {
            alert('Please fill out all required fields.');
        }
    });
});
</script>