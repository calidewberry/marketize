//jQuery to collapse the navbar on scroll
(function ($) {
  $(document).ready(function () {
  $(".navbar-collapse ul li a").on("click", function () {
    $(".navbar-collapse").collapse("hide");
          });
  });
})(jQuery);