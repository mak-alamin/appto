<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AppTo
 */

get_header('single');

$sidebar_pos = appto_get_redux_option('blog_sidebar_position');

?>
<main id="primary" class="site-main">

	<section id="blog" class="sec-pad blog">
		<div class="container">
			<div class="row">
				<div class="post">
					<!-- Side Bar Left -->
					<?php if ($sidebar_pos == 'left') { ?>
						<div class="col-md-4">
							<?php get_sidebar(); ?>
						</div>
					<?php } ?>

					<!-- Posts  -->
					<div class="col-md-8 res-margin">
						<?php
						if (have_posts()) :

							if (is_home() && !is_front_page()) :
						?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
						<?php
							endif;

							/* Start the Loop */
							while (have_posts()) :
								the_post();

								get_template_part('template-parts/content', get_post_type());

								// If comments are open or we have at least one comment, load up the comment template.
								if (comments_open() || get_comments_number()) :
									comments_template();
								endif;

							endwhile;

							the_post_navigation(
								array(
									'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'appto') . '</span> <span class="nav-title">%title</span>',
									'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'appto') . '</span> <span class="nav-title">%title</span>',
								)
							);

						else :

							get_template_part('template-parts/content', 'none');

						endif;
						?>
					</div>
					<!-- End Posts -->

					<!-- Side Bar Right -->
					<?php if ($sidebar_pos == 'right') { ?>
						<div class="col-md-4">
							<?php get_sidebar(); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php

//Load Download Section
require_once __DIR__ . '/templates/blog/download_section.php';

get_footer('blog');
