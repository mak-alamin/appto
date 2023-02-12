<?php

/**
 * The blog template file
 *
 * @package AppTo
 */

get_header();
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
