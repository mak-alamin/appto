;(function($){
    'use strict';
     
    /* ==================================================
       Preloader
    ===================================================== */
    $(window).on('load', function() { // makes sure the whole site is loaded 
        $('#status').fadeOut(); // will first fade out the loading animation 
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(350).css({'overflow':'visible'});
    })
    /* ==================================================
    
    ===================================================== */
    var $vdoPop = $('.video');
    if($vdoPop.length > 0){
       $vdoPop.magnificPopup({
          type: 'iframe',
              iframe: {
                  markup: '<style>.mfp-iframe-holder .mfp-content {max-width: 900px;height:500px}</style>' +
                      '<div class="mfp-iframe-scaler" >' +
                      '<div class="mfp-close"></div>' +
                      '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                      '</div></div>'
              }
          });
    }


	$('#feel-the-wave').wavify({
      height: 60,
      bones: 7,
      amplitude: 90,
      color: 'rgba(255, 255, 255, 0.07)',
      speed: .21
    });

	$('#feel-the-wave-two').wavify({
      height: 150,
      bones: 8,
      amplitude: 70,
      color: 'rgba(255, 255, 255, 0.07)',
      speed: .24
    });

    $('#feel-the-wave-three').wavify({
      height: 10,
      bones: 5,
      amplitude: 80,
      color: 'rgba(255, 255, 255, 0.07)',
      speed: 0.26
    });
	
	
    /* ===================================================
       Counter Up
    ====================================================== */
    var $counter = $('.counter');
    if($counter.length > 0){
        $counter.counterUp({
            delay: 20,
            time: 5000
        });
    }

/* =======================================================
        Parallax
    ====================================================== */
    var $parallax = $('.parallaxie');
    if($parallax.length > 0){
        $parallax.parallaxie({
            speed: 0.5,
        });
    } 

    /* ========================================
        Wow
    =========================================== */
    new WOW().init();
    
    /* ========================================
      Mailchimp Form
    =========================================== */
    $('.subscribe form').submit(function(e) {
        e.preventDefault();
        var postdata = $('.subscribe form').serialize();
        $.ajax({
            type: 'POST',
            url: 'assets/subscribe.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                if(json.valid == 0) {
                    $('.success-message').hide();
                    $('.error-message').hide();
                    $('.error-message').html(json.message);
                    $('.error-message').fadeIn('fast', function(){
                        $('.subscribe form').addClass('animated shake').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                            $(this).removeClass('animated shake');
                        });
                    });
                }
                else {
                    $('.error-message').hide();
                    $('.success-message').hide();
                    $('.subscribe form').hide();
                    $('.success-message').html(json.message);
                    $('.success-message').fadeIn('fast', function(){
                        $('.top-content').backstretch("resize");
                    });
                }
            }
        });
    });
    /* =========================================
        Menu click scroll
    ============================================ */

    var $navItem = $('.right-nav a, .demo a');
    if($navItem.length > 0 ){
        $navItem.on('click', function (e) {
            $(document).off("scroll");
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
                || location.hostname == this.hostname) {

                var target = $(this.hash),
                headerHeight = $(".navbar").height()-2; // Get fixed header height

                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

                if (target.length) {
                    $('html,body').animate({
                      scrollTop: target.offset().top - headerHeight
                    }, 1000);
                    return false;
                }
            }
        });
    }
    /* ============================================
       Type effect
    =============================================== */ 
    if(document.querySelectorAll(".type").length > 0){
        var options = {
            strings: ['your app', 'your product', 'your device'],
            typeSpeed: 40,
            backSpeed: 10,
            loop: true,
            loopCount: Infinity,
        }
        var typed = new Typed(".type", options)
    }
	
})(jQuery); 