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