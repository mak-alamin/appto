<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AppTo
 */

get_header();
?>
<main id="primary" class="site-main">
	<section id="search_results" class="sec-pad blog">
		<div class="container">
			<div class="row">
				<div class="post">
					<!-- Posts  -->
					<div class="col-md-8 res-margin">
						<h3 class="page-title">
							<?php
							/* translators: %s: search query. */
							printf(esc_html__('Search Results for: "%s"', 'appto'), '<span>' . get_search_query() . '</span>');
							?>
						</h3>
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

							endwhile;

							the_posts_navigation();

						else :

							get_template_part('template-parts/content', 'none');

						endif;
						?>

						<!-- Blog Pagination -->
						<div class="blog_pagination">
							<nav aria-label="Page navigation">
								<ul class="pagination">
									<li>
										<a href="#" aria-label="Previous" class="prev">
											<i class="fa fa-arrow-left" aria-hidden="true"></i>
										</a>
									</li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li class="blank"><a href="#">...</a></li>
									<li><a href="#">12</a></li>
									<li>
										<a href="#" aria-label="Next" class="next">
											<i class="fa fa-arrow-right" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
							</nav>
						</div>
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

<?php
get_sidebar();
get_footer();
