<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Starecase_Marketing
 */



// ADVANCED CUSTOM FIELDS PRODUCTS
$print_carousel_item                              = get_field('print_carousel_item');

?>



<!-- OPEN CAROUSEL LOOP -->
<?php 
      $loop = new WP_Query(array(
         'post_type' => 'print_carousel', 
         'posts_per_page' => 1,
         'orderyby' => 'post_id', 
         'order' => 'ASC', 
         )); 
?>


<?php  while ( $loop->have_posts() ) : 
       $loop->the_post();
?>



<!-- START CAROUSEL **************************************************************** -->

<div id="print-carousel1" class="carousel slide" data-wrap="true" data-ride="carousel"> 
    <?php if( have_rows('print_carousel_item') ): ?>
     <!-- **************************************************************** -->      
      <!-- Indicators 
                     <ul class="carousel-indicators">
                        <?php
                            $active = 'active';
                            $num = 0;
                            while ( have_rows('print_carousel_item') ) : the_row();
                        ?>

                        <li data-target="#print-carousel1" data-slide-to="<?php echo $num ?>" class="<?php echo $active ?>"></li>
                        <?php
                            $active = '';
                            $num += 1;
                        endwhile; ?>
                    </ul>   -->

    <!-- **************************************************************** -->    

      <!-- The slideshow -->
      <div class="carousel-inner" role="listbox" >
            <?php
                $active = 'active';
                    while ( have_rows('print_carousel_item') ) : the_row();
                        $print_carousel_image           = get_sub_field('print_carousel_image');
            ?> 
          
                 <div class="carousel-item  <?php echo $active ?>">
                     <div class="print-carousel-image">
                        <img class="small-screen-image"src="<?php echo $print_carousel_image['sizes']['medium']; ?>" alt="<?php echo $print_carousel_image['alt'] ?>" title="<?php echo $print_carousel_image['title'] ?>"/>
                        <img class="medium-screen-image"src="<?php echo $print_carousel_image['sizes']['large']; ?>" alt="<?php echo $print_carousel_image['alt'] ?>" title="<?php echo $print_carousel_image['title'] ?>"/>
                        <img class="large-screen-image"src="<?php echo $print_carousel_image['url']; ?>" alt="<?php echo $print_carousel_image['alt'] ?>" title="<?php echo $print_carousel_image['title'] ?>"/>                          
                     </div> 
                </div><!-- /item -->      

            <?php $active = ''; 
                    endwhile;    
            ?>   

      </div>
      <!-- // End The slideshow -->

     <?php endif; ?>     

    <!-- **************************************************************** -->       

    <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#print-carousel1" role="button" data-slide="prev">
                <i class="fa fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next" href="#print-carousel1" role="button" data-slide="next">
                <i class="fa fa-chevron-right"></i>
            </a>
      
</div> <!-- Carousel 1 -->


<!-- End Carousel **************************************************************** -->

<?php 
    endwhile; 
    wp_reset_postdata();
?>  