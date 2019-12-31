<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package marketize
 */

// ADVANCED CUSTOM FIELDS PRODUCTS
$gallery_item              =   get_field('gallery_item');


?>

<!-- PRODUCT GALLERY SECTION -->    
    <?php
        $loop = new WP_Query( array(
            'post_type' => 'gallery',
            'orderby' => 'post_id', 
            'order' => 'DSC',
            ) 
            );
    ?>
                
    <?php while( $loop->have_posts() ) : $loop->the_post();?>           	
           <?php if( have_rows('gallery_item') ): ?>




<div class="container">
    <div class="row">
        <div class="gal">
              <?php while ( have_rows('gallery_item') ) : the_row(); 
                    $gallery_image =   get_sub_field('gallery_image');
               ?>
                    <?php if( $gallery_image ): ?> 

                    
                          
                            <a class="" href="<?php echo $gallery_image['url']; ?>" 
                                data-lightbox="example-set" data-title="">
                                <img class="bottom-up" src="<?php echo $gallery_image['sizes']['large']; ?>" alt="<?php echo $gallery_image['alt']; ?>"/>
                            </a>
                            
                      

                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>  
    </div>
</div>     
      <?php endwhile; wp_reset_query(); ?>     