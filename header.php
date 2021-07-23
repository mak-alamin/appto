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
						
						<?php 
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							 
							if ( has_custom_logo() ) {
								echo '<a class="navbar-brand page-scroll logo-light" href="'. esc_url(home_url()) .'"><img alt="' . get_bloginfo( 'name' ) . '" src="' . esc_url( $logo[0] ) . '"></a>';
							} else {
								echo '<h1 class="navbar-brand page-scroll logo-light"><a href="'. esc_url(home_url()) .'">' . get_bloginfo('name') . '</a></h1>';
							}
						?>

						<a class="navbar-brand page-scroll logo-clr" href="index.html"><img alt="" src="<?php echo 'http://localhost/wp_test/wp-content/uploads/2021/07/logo-clr.png';?>"></a>
					</div>

					

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="right-nav text-right">

						<?php 			
							wp_nav_menu(array(
								'menu'	=> 'menu-1',
								'menu_class' => 'nav navbar-nav menu',
								'container' => '',
								'walker' => new WP_Bootstrap_Navwalker()
							));
						
							$btn_enabled = get_theme_mod('enable_app_dl_btn');
				
							if ( $btn_enabled ) {
						?>
							<div class="nav-btn">
								<a class="btn btn-sm grdnt-green"><?php echo get_theme_mod('app_dl_btn_text', 'Get App Now'); ?>
								</a>
							</div>

						<?php } ?>
						
						</div>
					</div>
					<!-- /.navbar-collapse -->
				</div>
	        </div>
		</nav>
		<!-- End navbar -->
	</header><!-- #masthead -->