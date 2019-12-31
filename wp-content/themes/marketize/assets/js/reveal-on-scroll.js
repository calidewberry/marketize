(function($) {

  /**
   * Copyright 2012, Digital Fusion
   * Licensed under the MIT license.
   * http://teamdf.com/jquery-plugins/license/
   *
   * @author Sam Sehnert
   * @desc A small plugin that checks whether elements are within
   *     the user visible viewport of a web browser.
   *     only accounts for vertical position, not horizontal.
   */

  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };
    
})(jQuery);


(function($) {

    var win = $(window);

    var allMods = $(".module-1");



    win.scroll(function(event) {

      allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("come-in"); 
        } else {el.removeClass("come-in")}
      });
    }) ;
    
})(jQuery);



(function($) {

    var win = $(window);
    var allMods = $(".top-down-2");

    allMods.each(function(i, el) {
      var el = $(el);
      if (el.visible(true)) {
        el.addClass("top-down-already-visible"); 
      } 
    });

    win.scroll(function(event) {

      allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("top-down-come-in"); 
        } else {el.removeClass("top-down-come-in")}
      });
    }) ;
    
})(jQuery);


(function($) {

    var win = $(window);
    var allMods = $(".bottom-up");

    allMods.each(function(i, el) {
      var el = $(el);
      if (el.visible(true)) {
        el.addClass("bottom-up-already-visible"); 
      } 
    });

    win.scroll(function(event) {

      allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("bottom-up-come-in"); 
        } else {el.removeClass("bottom-up-come-in")}
      });
    }) ;
    
})(jQuery);