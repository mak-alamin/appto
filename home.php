<?php

/**
 * The blog template file
 *
 * @package AppTo
 */

get_header();

$sidebar_pos = appto_get_redux_option('blog_sidebar_position');

?>
<main id="primary" class="site-main">

	<section id="blog" class="sec-pad blog">
		<div class="container">
			<div class="row">
				<div class="post">

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

							endwhile;

							the_posts_pagination(array(
								'mid_size'  => 2,
								'prev_text' => __('<i class="fa fa-arrow-left" aria-hidden="true"></i>'),
								'next_text' => __('<i class="fa fa-arrow-right" aria-hidden="true"></i>'),
							));
							?>
						<?php

						else :
							get_template_part('template-parts/content', 'none');

						endif;
						?>
					</div>
					<!-- End Posts -->

					<!-- Side Bar -->
					<?php if ($sidebar_pos == 'right') { ?>
						<div class="col-md-4">
							<!-- Popular Article -->
							<!-- <div class="side-col box popular clearfix">
							<h5 class="heading">Popular Article</h5>
							<a href="blog-single-1.html">
								<div class="col-xs-4 pl-0">
									<img alt="" src="image/blog-img-thumb-1.jpg">
								</div>
								<div class="col-xs-8 pad-0">
									<p class="fw-600">How to add custom design in your mobile app</p>
									<div class="meta">Android App / Feb 22, 2019</div>
								</div>
							</a>
							<div class="spce md"></div>
							<a href="blog-single-1.html">
								<div class="col-xs-4 pl-0">
									<img alt="" src="image/blog-img-thumb-2.jpg">
								</div>
								<div class="col-xs-8 pad-0">
									<p class="fw-600">How to add custom design in your mobile app</p>
									<div class="meta">Android App / Feb 22, 2019</div>
								</div>
							</a>
							<div class="spce md"></div>
							<a href="blog-single-1.html">
								<div class="col-xs-4 pl-0">
									<img alt="" src="image/blog-img-thumb-3.jpg">
								</div>
								<div class="col-xs-8 pad-0">
									<p class="fw-600">How to add custom design in your mobile app</p>
									<div class="meta">Android App / Feb 22, 2019</div>
								</div>
							</a>
						</div>

						<div class="spce md"></div> -->

							<!-- Twitter Feed -->
							<!-- <div class="side-col box feed clearfix">
							<h5 class="heading">Twitter Feed</h5>
							<ul class="twitter">
								<li>
									<div class="time">2 month ago</div>
									<div>
										Lorem ipsum <a href="#">#dolor</a> sit amet, consectetur adipiscing elit, sed do <a href="#">@appsteen</a>, <a href="#">@design</a> <a href="#">http://bit.ly.com/32ugjala</a>
									</div>
								</li>
								<li>
									<div class="time">2 month ago</div>
									<div>
										Lorem ipsum <a href="#">#dolor</a> sit amet, consectetur adipiscing elit, sed do <a href="#">@appsteen</a>, <a href="#">@design</a> <a href="#">http://bit.ly.com/32ugjala</a>
									</div>
								</li>
								<li>
									<div class="time">2 month ago</div>
									<div>
										Lorem ipsum <a href="#">#dolor</a> sit amet, consectetur adipiscing elit, sed do <a href="#">@appsteen</a>, <a href="#">@design</a> <a href="#">http://bit.ly.com/32ugjala</a>
									</div>
								</li>
							</ul>
						</div> -->

							<?php get_sidebar(); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->

<?php

require_once __DIR__ . '/templates/blog/download_section.php';

get_footer('blog');
