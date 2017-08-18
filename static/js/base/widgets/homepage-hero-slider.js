(function($) {
    $(window).ready(function() {
        $('#homepage-hero-slider').slick({
            dots: false,
            slidesToShow: 1,
            arrows: false,

            fade: true,
            speed: 500,
            cssEase: 'linear',

            autoplay: true,
            autoplaySpeed: 2000
        });
    });
})(jQuery);