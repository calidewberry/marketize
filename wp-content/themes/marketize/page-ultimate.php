<?php
/*

Template Name: Ultimate Member Page

 */

// ADVANCED CUSTOM FIELDS PRODUCTS

$testing_this              = get_field('testing_this');
$company_name              = get_field('company_name');

get_header();
?>





<section id="page-content">
    <div class="container">
<?php echo do_shortcode("[ultimatemember_profile_completeness]"); ?>
        
    <?php if( get_field('testing_this') ): ?>
           <?php the_field('testing_this'); ?>
    <?php endif; ?>
        

        
        <?php if( get_field('company_name') ): ?>
           <?php the_field('company_name'); ?>
    <?php endif; ?>    
        
       
        
        

        <div  class="row">
            <div class="col-sm-8">
            		<?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>    
            </div>
            <div class="col-sm-4">
                
                <?php dynamic_sidebar( 'sidebar-um' ); ?>
            </div>
        </div>

    
        
    </div>
</section>







<?php

get_footer();
