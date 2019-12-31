// CAROUSEL

(function ($) {


$(document).ready(function(){
    // Activate Carousel
    $("#carousel1").carousel({interval: 20000, pause: "hover", touch: true});
     $("#print-carousel1").carousel({interval: 20000, pause: "hover"});
  //  $("#slider").carousel({interval: 90000, pause: "hover"});
    
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#carousel1").carousel(0);
    });
    $(".item2").click(function(){
        $("#carousel1").carousel(1);
    });
    $(".item3").click(function(){
        $("#carousel1").carousel(2);
    });
    $(".item4").click(function(){
        $("#carousel1").carousel(3);
    });
    $(".item5").click(function(){
        $("#carousel1").carousel(4);
    });
    $(".item6").click(function(){
        $("#carousel1").carousel(5);
    });
    $(".item7").click(function(){
        $("#carousel1").carousel(6);
    });
    $(".item8").click(function(){
        $("#carousel1").carousel(7);
    });
    
    // Enable BANNER Controls
    $(".left").click(function(){
        $("#carousel1").carousel("prev");
    });
    $(".right").click(function(){
        $("#carousel1").carousel("next");
    });
    
    // Enable PRINT CAROUSEL Controls    
    $(".left").click(function(){
        $("#print-carousel1").carousel("prev");
    });
    $(".right").click(function(){
        $("#print-carousel1").carousel("next");
    });    
    

     // Enable SWIPE CAROUSEL FUNCTION IN MOBILE    
    

   $("#carousel1").swiperight(function() {
      $(this).carousel('prev');
    });
   $("#carousel1").swipeleft(function() {
      $(this).carousel('next');
   });
    
$('#logo-carousel1').on('slide.bs.carousel', function (e) {

    /*

    CC 2.0 License Iatek LLC 2018
    Attribution required
    
    */

    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $('.carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});
    

})(jQuery);
    

