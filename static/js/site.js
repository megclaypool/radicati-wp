(function($) {
    $(document).ready(function() {
    });
})(jQuery);

(function($) {
    $(document).ready(function() {
        $(".offcanvas li.menu-item-has-children > a").on("click", function () {
            if($(this).closest('li').hasClass('active')) {
                return true;
            }

            $(".offcanvas .menu-item-has-children").removeClass('active');
            $(this).closest('li').toggleClass("active");
            return false;
        });
    });
})(jQuery);
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
(function($) {
    $(window).ready(function() {
        //slider
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true
        });
    });
})(jQuery);