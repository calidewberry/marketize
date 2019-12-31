<?php
/*

Template Name: Restricted Access Page

 */

// ADVANCED CUSTOM FIELDS PRODUCTS



get_header();
?>

 <!-- QUERRY TO GET WEB CAROUSEL --> 
<section id="restricted-access">
    <div class="container container-main">
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
        
                
            <div class="button-holder">
                <a href="<?php echo esc_url( get_site_url( null, '/register?type=guest' ) ); ?>" class="black-button" ><p><?php _e( 'Hunter', 'marketize' ); ?></p></a>
                <a href="<?php echo esc_url( get_site_url( null, '/register?type=guest' ) ); ?>" class="black-button" ><p><?php _e( 'Wingshooter', 'marketize' ); ?></p></a>
                <a href="<?php echo esc_url( get_site_url( null, '/register?type=guest' ) ); ?>" class="black-button" ><p><?php _e( 'Angler', 'marketize' ); ?></p></a>
           
            </div>        
        
    </div>
</section>










<?php

get_footer();
