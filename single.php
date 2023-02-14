<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AppTo
 */

get_header('single');
?>
<main id="primary" class="site-main">

	<section id="blog" class="sec-pad blog">
		<div class="container">
			<div class="row">
				<div class="post">
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

					<!-- Side Bar -->
					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<!-- download-section -->
<section class="grdnt-orange">
	<div class="parallax-bg sec-pad-lg" style='background-image: url("<?php echo site_url() . '/wp-content/uploads/2022/07/bg-parallax-c.png'; ?>")' data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="section-text text-center light">
					<h2>Ready To Get Started!</h2>
					<p>Lorem ipsum dolor sit amet menandri lobortis laboramus nec ex, ullum regione instructior duo ei.</p>
				</div>
				<div class="btn-holder text-center">
					<a class="btn" href="#"><img alt="" src="image/is-badge.png"></a>
					<a class="btn" href="#"><img alt="" src="image/an-badge.png"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End download-section -->

<?php
get_footer();
