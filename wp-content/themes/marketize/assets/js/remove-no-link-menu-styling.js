// WALKER TOP LEVEL LINK




(function( $ ) {
        var itemm = $('#main-menu .menu-item-has-children > a');
        itemm.click(function(){
            document.activeElement && document.activeElement.blur();
            return false;
        });
    })(jQuery);








