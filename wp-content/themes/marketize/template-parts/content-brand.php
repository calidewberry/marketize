<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Starecase_Marketing
 */



// ADVANCED CUSTOM FIELDS PRODUCTS
$logo_portfolio                              = get_field('logo_portfolio');

?>



<!-- OPEN CAROUSEL LOOP -->
<?php 
      $loop = new WP_Query(array(
         'post_type' => 'brand', 
         'posts_per_page' => 1,
         'orderyby' => 'post_id', 
         'order' => 'ASC', 
         )); 
?>


<?php  while ( $loop->have_posts() ) : 
       $loop->the_post();
?>



<!-- START CAROUSEL **************************************************************** -->

<div id="logo-carousel1" class="carousel slide" data-wrap="true" data-ride="carousel" data-interval="9000"> 
    <?php if( have_rows('logo_portfolio') ): ?>
     <!-- **************************************************************** -->      
      <!-- Indicators 
                     <ul class="carousel-indicators">
                        <?php
                            $active = 'active';
                            $num = 0;
                            while ( have_rows('logo_portfolio') ) : the_row();
                        ?>

                        <li data-target="#logo-carousel1" data-slide-to="<?php echo $num ?>" class="<?php echo $active ?>"></li>
                        <?php
                            $active = '';
                            $num += 1;
                        endwhile; ?>
                    </ul>   -->

    <!-- **************************************************************** -->    

      <!-- The slideshow -->
      <div class="carousel-inner row w-10 mxauto" role="listbox" >
            <?php
                $active = 'active';
                    while ( have_rows('logo_portfolio') ) : the_row();
                        $client_logo           = get_sub_field('client_logo');
            ?> 
          
                 <div class="carousel-item col-md-4 <?php echo $active ?>">

                        <img class="img-fluid mx-auto d-block"src="<?php echo $client_logo['sizes']['large']; ?>" alt="<?php echo $client_logo['alt'] ?>" title="<?php echo $client_logo['title'] ?>"/>                          

                </div><!-- /item -->      

            <?php $active = ''; 
                    endwhile;    
            ?>   

      </div>
      <!-- // End The slideshow -->

     <?php endif; ?>     

    <!-- **************************************************************** -->       

    <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#logo-carousel1" role="button" data-slide="prev">
                <i class="fa fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next" href="#logo-carousel1" role="button" data-slide="next">
                <i class="fa fa-chevron-right"></i>
            </a>
      
</div> <!-- Carousel 1 -->


<!-- End Carousel **************************************************************** -->

<?php 
    endwhile; 
    wp_reset_postdata();
?>  