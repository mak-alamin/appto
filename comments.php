<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AppTo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
		<div class="comment-section">
			<h6 class="comments-title">
				<?php
				$appto_comment_count = get_comments_number();
				if ('1' === $appto_comment_count) {
					printf(
						/* translators: 1: title. */
						esc_html__('One Comment', 'appto'),
						'<span>' . wp_kses_post(get_the_title()) . '</span>'
					);
				} else {
					printf(
						/* translators: 1: comment count number, 2: title. */
						esc_html(_nx('%1$s comment', '%1$s comments', $appto_comment_count, 'comments title', 'appto')),
						number_format_i18n($appto_comment_count), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'<span>' . wp_kses_post(get_the_title()) . '</span>'
					);
				}
				?>
			</h6>
			<div class="cmmnt">
				<ul>
					<?php
					wp_list_comments(
						array(
							'style'      => 'ul',
							'short_ping' => true,
							'avatar_size' => 50,
							'callback' => 'appto_list_comments'
						)
					);
					?>
				</ul>
			</div>
		</div>

		<?php
		the_comments_navigation(
			array(
				'prev_text' => '< Older comments',
				'next_text' => 'Newer comments >'
			)
		);

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'appto'); ?></p>
	<?php
		endif;

	endif; // Check for have_comments().
	?>

	<div class="spce lg"></div>

	<div class="form-area rad-70 custom-form">
		<?php appto_comment_form(); ?>
	</div>
</div><!-- #comments -->