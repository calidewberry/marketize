<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package marketize
 */

get_header();
?>



			<section class="error-404 not-found">
                <div class="container container-main">

                    <div class="page-content">
                        <p class="page-title"><?php esc_html_e( 'Ooops, wrong URL... ', 'marketize' ); ?></p>
                        <p><?php esc_html_e( 'Please checkout our HOME PAGE', 'marketize' ); ?></p>

                            <div class="inline-button">
                                <p style="margin: 0; padding: 0;"></p> 
                                <a href="https://comehunting.com" class="general-button">comehunting.com</a>

                            </div>

                    </div><!-- .page-content -->
                </div>    
			</section><!-- .error-404 -->


<?php
get_footer();
