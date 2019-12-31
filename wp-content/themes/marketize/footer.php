<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package marketize
 */

?>

 		</main><!-- END Page Content -->
	</div><!-- #primary -->
  	    
<!-- FOOTER =========================== -->
<footer id="footer" > 
    <section class="container">
                
        
        <div class="row">           
                <div class="footer-nav col-md-6" role="navigation"> 

                            <?php /* Primary navigation */
                                wp_nav_menu( array(
                                  'menu' => 'footer',
                                  'depth'=> 2,
                                  'container' => 'false',
                                  'menu_class' => 'nav',
                                    'orderby' => 'menu_order',
                                  //Process nav menu using our custom nav walker
                                  'walker' => new wp_bootstrap_navwalker())
                                );
                            ?>
                </div>                

        </div>
                <div class="copyright-div">
                  <a class="copyright" href="https://marketize.biz/"><p>&copy; 2019 | SITE DESIGN: marketize.biz </p></a>
                </div>        
    </section>
    

</footer>
     

<script>
    document.addEventListener("touchstart", function() {}, true);

</script>

<?php wp_footer(); ?>

</body>
</html>
