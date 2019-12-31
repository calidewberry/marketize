<?php
/*

Template Name: Landowner Registration Page

 */

// ADVANCED CUSTOM FIELDS PRODUCTS



get_header();
?>

<!-- PAGE CONTENT --> 


<section id="">
    <div class="container container-main">
        <h1>Register as a landowner</h1>
         <form>
              First name:<input type="text" name="firstname"><br>
              Last name: <input type="text" name="lastname"><br>
              Email Address: <input type="email" required /><br>
              Choose a password: <input type="text" name="lastname"><br>
              Mobile Phone: <input type="tel" id="phone" name="phone" pattern="+[0-9]{2} [0-9]{2} [0-9]{3} [0-9]{4}" required> <small>Format: +27 00 000 0000</small><br>
             
             
              Who introduced you? <input type="text" name="lastname"><br>
        </form> 
        
    </div>
</section>









<?php

get_footer();
