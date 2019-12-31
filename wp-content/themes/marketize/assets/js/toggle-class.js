// TOGGLE CLASS

(function ($) {

$(document).ready(function(){
    var n = $(".main-listing-content").text().length;
    
        if (n >= 500) {  
            $(".read-more").removeClass("close-div");   
            $("#listing-body").click(function(){
            $("#listing-container").toggleClass("listing-body-large");
            $(".read-more").toggleClass("close-read-more");
            });
        }  
});   
    

})(jQuery);


function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}