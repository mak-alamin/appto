<?php

/**
 * The template for displaying the blog footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AppTo
 */

$copyright_text = appto_get_redux_option('blog_footer_copy_text');
$facebook = appto_get_redux_option('blog_footer_facebook');
$twitter = appto_get_redux_option('blog_footer_twitter');
$linkedin = appto_get_redux_option('blog_footer_linkedin');
$google_plus = appto_get_redux_option('blog_footer_google_plus');
?>

</div><!-- #page -->

<!--Footer  -->
<footer class="footer-wrapper grdnt-cyan sec-pad">
    <div class="container footer-content">
        <div class="row">
            <div class="social-holder text-center light">

                <?php if (!empty($facebook)) { ?>
                    <a class="grdnt-blue" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <?php } ?>

                <?php if (!empty($twitter)) { ?>
                    <a class="grdnt-purple" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <?php } ?>

                <?php if (!empty($linkedin)) { ?>
                    <a class="grdnt-orange" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <?php } ?>

                <?php if (!empty($google_plus)) { ?>
                    <a class="grdnt-green" href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
                <?php } ?>
            </div>
            <div class="spce"></div>
            <div class="copyright text-center light">
                <?php echo $copyright_text; ?>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<?php wp_footer(); ?>
</body>

</html>