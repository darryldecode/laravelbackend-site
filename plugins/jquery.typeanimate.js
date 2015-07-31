/* by darryldecode: */
(function($){
    $.fn.typeanimate = function(opts){
        var $this = this,
            defaults = {
                animDelay: 50
            },
            settings = $.extend(defaults, opts);

        $.each(settings.text.split(''), function(i, letter){
            setTimeout(function(){
                $this.html($this.html() + letter);
            }, settings.animDelay * i);
        });
    };
})(jQuery);