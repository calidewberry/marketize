<?php
/*

Template Name: Home Page

 */

// ADVANCED CUSTOM FIELDS PRODUCTS
get_header();
?>


<!-- THE MODAL ON PAGELOAD 
<div id="terms-conditions" class="col-button-holder">
    <a href="#terms-conditions" class="open-modal black-col-button" ><p>Terms AND Conditions</p></a>
</div>
                                
<div class="modal-front-page">
    <div class="modal-content">
           <h1>On page load Modal content to be advised</h1>
               <div class="close-modal-front-page"><p>X</p></div>
                <div class="modal-wording">
                    <p>Please code cookies etc and this modal must only LOAD ONCE for user.
                    <br>ALLAN WE CAN DISCUSS IF YOU WANT THS HERE.
                    <br>This is good place to highlight your benefits, and
                        <br>PHASE 1 advise guests about what is coming
                    <br>We can also set the timing etc.</p>
           </div>
     </div>
</div>
 end modal on pageload -->



<!-- PAGE CONTENT --> 
<?php if(have_posts()) : ?>
  <?php while(have_posts())  : the_post(); ?>


    <section id="home-page">
        <div class="home-page-content container container-main">
<!--         <h1><?php the_title(); ?></h1>    -->     
            <?php the_content(); ?> 

            
        </div> 
        

              <?php
                if (is_user_logged_in()) { ?> 
                        <div class="button-holder">
                            <a href="http://starecasemarketing.co.za/cometesting/members" class="black-button" ><p>All listings temp</p></a>
                            <a href="http://starecasemarketing.co.za/cometesting/members/me" class="black-button" ><p>My Profile</p></a>
                        </div>  
                <?php } else { ?> 
        <div class="button-holder">
            <h2></h2>
            <a href="http://starecasemarketing.co.za/cometesting/register" class="black-button" ><p>Land Owner</p></a>
        </div>
            
        <div class="button-holder">
            <a href="http://starecasemarketing.co.za/cometesting/register" class="black-button" ><p>Hunter</p></a>
            <a href="http://starecasemarketing.co.za/cometesting/register" class="black-button" ><p>Wingshooter</p></a>
            <a href="http://starecasemarketing.co.za/cometesting/register" class="black-button" ><p>Angler</p></a>            
        </div>
                <?php }
            ?>   
        

        
        
        
        <div class="container container-main">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6549987.262038877!2d25.72427779075373!3d-29.262468548337083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snz!4v1565329264110!5m2!1sen!2snz" width="600" height="450" frameborder="0" style="border:2" allowfullscreen></iframe> 
        </div> 
        <div class="background-blend"></div>

    </section>

        

 



    <?php endwhile; ?>                   
<?php endif; ?> 

 
 

   



<?php

get_footer();
