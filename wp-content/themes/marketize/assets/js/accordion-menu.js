(function ($) {

$(document).ready(function(){
  $(".accordion").click(function(){
      
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
            
        } else {
            panel.style.display = "block";
        }
      
       
      
      
      
      
  });
});   
    

})(jQuery);



