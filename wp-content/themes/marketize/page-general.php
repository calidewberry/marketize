<?php
/*

Template Name: General Page

 */

// ADVANCED CUSTOM FIELDS PRODUCTS



get_header();
?>

 <!-- QUERRY TO GET WEB CAROUSEL --> 
<section id="general-content">
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
    </div>
</section>



<?php

get_footer();
