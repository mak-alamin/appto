<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AppTo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'appto' ); ?></a>

	<!-- Preloader -->
	<div id="preloader" class="grdnt-blue">
		<div id="status">&nbsp;</div>
	</div>
	<!-- #preloader -->


	<!-- Header -->
	<header id="masthead" class="site-header">
		<!-- navbar -->
		<nav id="navbar" class="navbar navbar-custom navbar-fixed-top" data-spy="affix" data-offset-top="70">
			<div class="container">
				<div class="row">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<i class="fa fa-bars"></i>
						</button>
						<a class="navbar-brand page-scroll logo-light" href="index.htmlindex.html"><img alt="" src="<?php echo APPTO_ASSETS; ?>/image/logo.png"></a>
						<a class="navbar-brand page-scroll logo-clr" href="index.html"><img alt="" src="image/logo-clr.png"></a>
					</div>

					


					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<div class="right-nav text-right">
								<ul class="nav navbar-nav menu">
									<li>
										<a href="#home">Home</a>
									</li>
									<li>
										<a href="#overview">Overview</a>
									</li>
									<li class="dropdown">
										<a href="#pages">Pages</a>
										<div class="dropdown-content">
											<a href="index.html">Layout 1</a>
											<a href="index-v2.html">Layout 2</a>
											<a href="index-v3.html">Layout 3</a>
											<a href="index-v4.html">Layout 4</a>
											<a href="index-v5.html">Layout 5</a>
											<a href="index-v6.html">Layout 6</a>
											<a href="#">About</a>
											<a href="#">Blog</a>
										</div>
									</li>
									<li>
										<a href="#feature">Feature</a>
									</li>
									<li>
										<a href="#pricing">Pricing</a>
									</li>
									<li>
										<a href="#blog">blog</a>
									</li>
								</ul>
							<div class="nav-btn">
								<a class="btn btn-sm grdnt-green">Get App Now</a>
							</div>
						</div>
					</div>
					<!-- /.navbar-collapse -->
				</div>
	        </div>
		</nav>
		<!-- End navbar -->
	</header><!-- #masthead -->
