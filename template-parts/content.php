<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AppTo
 */

?>

<article class="post-col" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php appto_post_thumbnail(); ?>

	<div class="post-content">
		<div class="spce"></div>

		<?php if ('post' === get_post_type()) { ?>
			<div class="entry-meta">
				<ul class="post-meta clearfix">

					<!-- appto_posted_by(); -->

					<li><?php appto_posted_on(); ?></li>
					<li>
						<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>112</a>
					</li>
					<li>
						<a href=""><i class="fa fa-comment-o" aria-hidden="true"></i>22</a>
					</li>
				</ul>
			</div><!-- .entry-meta -->
		<?php } ?>
		<div class="post-text">
			<?php

			if (is_singular()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif;

			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'appto'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'appto'),
					'after'  => '</div>',
				)
			);
			?>
			<a class="clr-blue fw-700" href="<?php echo get_the_permalink(get_the_ID()); ?>">Read More
			</a>
		</div>
	</div>
	<div class="spce md"></div>

	<footer class="entry-footer">
		<?php // appto_entry_footer(); 
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->