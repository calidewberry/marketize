<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Starecase_Marketing
 */



// ADVANCED CUSTOM FIELDS PRODUCTS
$carousel_item                              = get_field('carousel_item');

?>



<!-- OPEN CAROUSEL LOOP -->
<?php 
      $loop = new WP_Query(array(
         'post_type' => 'carousel', 
         'posts_per_page' => 1,
         'orderyby' => 'post_id', 
         'order' => 'ASC', 
         )); 
?>




<?php  while ( $loop->have_posts() ) : 
       $loop->the_post();
?>

<!-- START CAROUSEL **************************************************************** -->

<div id="carousel1" class="carousel slide" data-wrap="true" data-ride="carousel"> 
    <?php if( have_rows('carousel_item') ): ?>
     <!-- **************************************************************** -->      
      <!-- Indicators -->
                     <ul class="carousel-indicators">
                        <?php
                            $active = 'active';
                            $num = 0;
                            while ( have_rows('carousel_item') ) : the_row();
                        ?>

                        <li data-target="#carousel1" data-slide-to="<?php echo $num ?>" class="<?php echo $active ?>"></li>
                        <?php
                            $active = '';
                            $num += 1;
                        endwhile; ?>
                    </ul>   

    <!-- **************************************************************** -->    

      <!-- The slideshow -->
      <div class="carousel-inner" role="listbox" >
            <?php
                $active = 'active';
                    while ( have_rows('carousel_item') ) : the_row();
                        $carousel_image           = get_sub_field('carousel_image');
                        $carousel_button_link               = get_sub_field('carousel_button_link');
                        $carousel_button_text               = get_sub_field('carousel_button_text');
            ?> 
          
          

       

          
          
         <div class="carousel-item <?php echo $active ?>">
             <img class="medium-screen-image" src="<?php echo $carousel_image['sizes']['large']; ?>" alt="<?php echo $carousel_image['alt'] ?>"/>  
                 <img class="large-screen-image" src="<?php echo $carousel_image['url']; ?>" alt="<?php echo $carousel_image['alt'] ?>"/> 
             
                         <?php if( $carousel_button_link ): ?>      
                <div class='carousel-button '>
                    <a href="<?php echo $carousel_button_link; ?> " class="button"><?php echo $carousel_button_text; ?></a>
                </div>
            <?php endif; ?>    
        </div><!-- /item -->      

            <?php $active = ''; 
                    endwhile;    
            ?>   

      </div>
      <!-- // End The slideshow -->

     <?php endif; ?>     

    <!-- **************************************************************** -->       

    <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
                <i class="fa fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
                <i class="fa fa-chevron-right"></i>
            </a>
      
</div> <!-- Carousel 1 -->


<!-- End Carousel **************************************************************** -->

<?php 
    endwhile; 
    wp_reset_postdata();
?>  