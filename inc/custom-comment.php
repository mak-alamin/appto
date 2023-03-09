<?php

/**
 * ---------------------------------
 * Functions for custom comments
 * ---------------------------------
 */


/**
 * Custom Comment List
 */
function appto_list_comments($comment, $args, $depth)
{
    if ('div' === $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? (!($args['has_children'] == 'depth-1') ? 'new-depth' : '') : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>

            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif; ?>

            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation"><?php echo esc_html__('Your comment is awaiting moderation.', 'appto'); ?></em>
                <br />
            <?php endif; ?>

            <div class="left-dtls col-sm-4">
                <?php
                if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']);

                echo '<div class="dtls">';

                printf(__('<span class="fw-700 name">%s</span>', 'appto'), get_comment_author_link());

                echo '<div>' . _x(get_comment_date(), 'appto') . '</div>';
                echo '<div>' . _x(get_comment_time(), 'appto') . '</div>';

                edit_comment_link(__('(Edit)', 'appto'), '  ', '');

                echo '</div>';
                ?>
            </div>

            <div class="left-dtls col-sm-8">
                <div class="cmmnt-blck">
                    <?php
                    echo '<a href="' . htmlspecialchars(get_comment_link($comment->comment_ID)) . '">';

                    comment_text();

                    echo '</a>';

                    comment_reply_link(
                        array_merge(
                            $args,
                            array(
                                'add_below' => $add_below,
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth']
                            )
                        )
                    ); ?>
                </div>
            </div>

            <div class="clearfix"></div>

            <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif; ?>
    <?php
}

/**
 * Custom Comment Form
 */
function appto_comment_form()
{
    $commenter = wp_get_current_commenter();

    if (!isset($args['format'])) {
        $args['format'] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
    }
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');
    $html_req = ($req ? " required='required'" : '');
    $html5    = 'html5' === $args['format'];

    $comments_args = array(
        'class_form' => 'row',

        'title_reply'          => esc_html__('Leave a reply', 'appto'),
        'title_reply_before'   => '<div class="msg_form"><h5 id="reply-title" class="comment-reply-title">',
        'title_reply_after'    => '</h5></div>',

        'cancel_reply_before'  => '',
        'cancel_reply_after'   => '',

        'cancel_reply_link'    => esc_html__('Cancel reply'),

        'fields' => apply_filters(
            'comment_form_default_fields',
            array(
                'name'  => '<div class="form-group col-md-4">' . '<input class="form-control" id="name" name="name" placeholder="' . esc_attr__("E-letter*", "appto") . '" type="text" size="30" maxlength="100"' . $html_req  . ' /></div>',

                'email'  => '<div class="form-group col-md-4">' . '<input class="form-control" id="email" name="email" placeholder="' . esc_attr__("E-letter*", "appto") . '" ' . ($html5 ? 'type="email"' : 'type="text"') . ' size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',

                'url'    => '<div class="form-group col-md-4">' . '<input class="form-control" placeholder="' . esc_attr__("Website address", "appto") . '" id="url" name="url" ' . ($html5 ? 'type="url"' : 'type="text"') . ' size="30" maxlength="200" /></div>',
            )
        ),

        'comment_notes_before' => '<p class="meta form-group col-md-12"><em>' . esc_html__('Your email address will not be published. Required fields are marked *', 'appto') . '</em></p>',

        // redefine your own textarea (the comment body)
        'comment_field' => '<div class="form-group col-md-12">
		<textarea class="form-control" id="comment" name="comment" aria-required="true" placeholder="' . esc_attr__("YOUR COMMENT", "appto") . '" rows="8" cols="37" wrap="hard"></textarea></div>',

        'label_submit'         => esc_html__('POST COMMENT', 'appto'),
        'class_submit'         => 'form-group btn grdnt-cyan',
    );

    comment_form($comments_args);
}

// Move Comment field to bottom
function appto_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    $cookies_field = $fields['cookies'];

    unset($fields['comment']);
    unset($fields['cookies']);

    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;

    return $fields;
}
add_filter('comment_form_fields', 'appto_move_comment_field_to_bottom');
