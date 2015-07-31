(function($, window) {

    // activate all stuffs here..
    $(document).ready(function() {

        // apply nice scroll
        $("html, .portfolio-description").niceScroll({scrollspeed: 160});

        // call to action button
        $(".go-to").on("click", function(e) {
            e.preventDefault();

            var targetElem = $(this).data('go-to');

            $('html,body').animate({
                scrollTop: $("#"+targetElem).offset().top
            }, 1000);
        });

        // back to top button
        $("#back-to-top").on("click", function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: $("#wrapper").offset().top
            }, 1000);
        });
    });

})(jQuery, window);