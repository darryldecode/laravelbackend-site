/* by darryldecode: ref: http://stackoverflow.com/questions/9144560/jquery-scroll-detect-when-user-stops-scrolling */
(function( $ ) {
    $.fn.stopScroll = function( options ) {
        options = $.extend({
            delay: 250,
            onScroll: function() {},
            callback: function() {}
        }, options);

        return this.each(function() {
            var $element = $( this ),
                element = this;
            $element.scroll(function() {
                options.onScroll();
                clearTimeout( $.data( element, "scrollCheck" ) );
                $.data( element, "scrollCheck", setTimeout(function() {
                    options.callback();
                }, options.delay ) );
            });
        });
    };
})( jQuery );