<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package marketize
 */

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600|Roboto+Condensed:400,700&display=swap" rel="stylesheet"> 




<!--SEARCH CONSOLE-->




	<?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target=".navbar"<?php body_class(); ?> data-offset="85">
<!-- <div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'marketize' ); ?></a> -->

 	<!-- HEADER HTML
    ================================================== -->


  <header id="site-header" class="container-fluid">

    	<!-- NAVBAR
    ================================================== -->
        <nav class="navbar fixed-top" role="navigation">
            <div class="logos">
                <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo $image[0]; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
                </a>
            </div>

            <?php
                if (is_user_logged_in()) { ?>
                <a href="<?php echo wp_logout_url( home_url() ); ?>" class="black-button-login" ><p> <?php echo "logout"; ?></p></a>
                <?php } else { ?>
                <a href="<?php echo wp_login_url( home_url() ); ?>" class="black-button-login" ><p> <?php echo "login"; ?></p></a>
                <?php }
            ?>
      	<!-- MESSENGER LOGIN ICON
==================================================
            <a href="#" class="messenger-login" >
                <img src="<?php // bloginfo('template_url'); ?>/assets/img/messenger-icon.svg" alt="You have a Message"/>
            </a>
-->
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                        <button type="button" class="navbar-toggler disable" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="icon-bar top-menu"></span>
                            <span class="icon-bar mid-menu"></span>
                            <span class="icon-bar bottom-menu"></span>
                        </button>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse navbar-ex1-collapse">
                      <img class="navbar-image"src="<?php bloginfo('template_url'); ?>/assets/img/healthiertimes-nav-icon.svg"/>
                    <?php /* Primary navigation */
                        wp_nav_menu( array(
                          'menu' => 'main',
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
        </nav>

   </header> <!-- Header -->

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
