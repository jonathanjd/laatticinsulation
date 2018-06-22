// JavaScript Document

jQuery(document).ready(function () {
    jQuery('select').selectric();




    jQuery(".home-design-video .full-video").click(function () {
        jQuery("#get-quote-popup").fadeIn('slow');
    });

    jQuery("#get-quote-popup").click(function () {
        jQuery("#get-quote-popup").fadeOut('slow');
    });

    /*Header fixed*/

    if (jQuery(window).width() > 1024) {
        jQuery(window).bind("scroll", function () {
            if (jQuery(window).scrollTop() >= 80) {
                jQuery("header").addClass("fixed");
            } else {
                jQuery("header").removeClass("fixed");
            }
        });
    }

    jQuery('.expand-content').hide();
    jQuery('.hide-bt').click(function (event) {
        event.preventDefault();
        jQuerythis = jQuery(this);
        jQuery('.expand-content').slideToggle('slow');
        jQuerythis.text(jQuerythis.text() == '- Get Started on Your Home Remodeling Project in Los Angeles, CA' ? '+ Get Started on Your Home Remodeling Project in Los Angeles, CA' : '- Get Started on Your Home Remodeling Project in Los Angeles, CA');
    });


    jQuery('.remolding-slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,

    });

    jQuery('.slider-main').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows:false,

    });

    jQuery('.banner').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,

    });


    jQuery('.design-build-content').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    arrows: false,
                    infinite: false,

                    dots: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,

                    arrows: false,
                    dots: true
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    jQuery('.brand-logo-sec ul').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    arrows: false,
                    infinite: false,
                    dots: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    jQuery('.projects').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,

                    arrows: false,
                    dots: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                    dots: true

                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });




    jQuery(document).ready(function () {
        jQuery('#demoTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: '1024', //auto or any width like 600px
            closed: true,

        });

    });


    jQuery("input, textarea").focus(function () {
        jQuery(this).parent(".ginput_container").siblings(".validation_message").hide();
    }).blur(function () {
        if (!jQuery(this).val()) {
            jQuery(this).parent(".ginput_container").siblings("label").show();
        }
    });
    jQuery("input, textarea").each(function () {
        if (jQuery(this).parent(".ginput_container").parent("li").hasClass("gfield_error")) {
            jQuery(this).val("");
            jQuery(this).parent(".ginput_container").siblings("label").show();
        }

    });

    jQuery(".cancle-bt").click(function () {
        jQuery(this).closest('.tab-content').hide();
        jQuery(".apart-col").removeClass("resp-tab-active");
    });

    jQuery('.toggle-icon').click(function () {
        jQuery('.sticky-nav').addClass('sticky-in');
        jQuery("body").addClass("fixed-body");
    });
    jQuery('.close-toggle').click(function () {
        jQuery('.sticky-nav').removeClass('sticky-in');
        jQuery("body").removeClass("fixed-body");
        jQuery(".dropdown-toggle").removeClass("toggled-on");
        jQuery(".sub-menu").removeClass("toggled-on");
        jQuery(".sub-menu .sub-menu").removeClass("toggled-on");
        jQuery(".sub-menu").removeAttr("style");
    });

    jQuery('.dropdown-toggle').click(function () {
        jQuery(this).next('.sub-menu').slideToggle('slow');
    });
    // jQuery('.expand-content').hide();
    // jQuery('.hide-bt').click(function (event) {
    // event.preventDefault();
    // jQuerythis = jQuery(this);
    // jQuery('.expand-content').slideToggle('slow');
    // jQuerythis.text(jQuerythis.text() == '- Get Started on Your Home Remodeling Project in Miami, FL' ? '+ Get Started on Your Home Remodeling Project in Miami, FL' : '- Get Started on Your Home Remodeling Project in Miami, FL');
    // });
    jQuery(".icon-Layer-11").click(function () {
        jQuery(".apart-col").removeClass("resp-tab-active1");
        jQuery(this).addClass("resp-tab-active1");
//        jQuery(".tab-content").addClass("resp-tab-content-active1");
//        jQuery(".tab-content").hide();
    });
    jQuery(window).resize(function() {
        var bodyheight = jQuery(window).height();
        jQuery("#banner-container").height(bodyheight);
    }).resize();

    jQuery('.back-to-top').click(function(){
        jQuery('html, body').animate({scrollTop : 0},1000);
        return false;
    });







});
jQuery(document).ready(function() {
    jQuery(".fancybox").fancybox();

});