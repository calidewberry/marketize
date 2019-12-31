<?php

// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');

// Custom Logo
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}

/**
 * marketize functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package marketize
 */

if ( ! function_exists( 'marketize_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function marketize_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on marketize, use a find and replace
		 * to change 'marketize' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'marketize', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'marketize' ),
            'menu-2' => esc_html__( 'Secondary', 'marketize' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'marketize_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'marketize_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function marketize_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'marketize_content_width', 640 );
}
add_action( 'after_setup_theme', 'marketize_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function marketize_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'marketize' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'marketize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-um', 'marketize' ),
		'id'            => 'sidebar-um',
		'description'   => esc_html__( 'Add widgets here.', 'marketize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'marketize_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function marketize_scripts() {
    
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.0', 'all' );
    wp_enqueue_style( 'bootstrap-css' );  
    
    wp_register_style( 'woocommerce-layout-modified', get_template_directory_uri() . '/assets/css/woocommerce-layout-modified.css', array(), '4.1.0', 'all' );
    wp_enqueue_style( 'woocommerce-layout-modified' );

    wp_enqueue_style( 'fancybox-css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' ); 
    
	wp_enqueue_style( 'marketize-style', get_stylesheet_uri() );
    
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/css/jquery-3.3.1.min.js', array( 'jquery' ), '3.3.1', true  );
    wp_enqueue_script( 'jquery' );    
   
    wp_register_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script( 'bootstrap' );   
    
    //wp_register_script('bootstrap-swipe-carousel.min', get_stylesheet_directory_uri() . '/assets/js/bootstrap-swipe-carousel.min.js', array(), false, true);
    //wp_enqueue_script( 'bootstrap-swipe-carousel.min' );       

    wp_register_script('accordion-menu', get_stylesheet_directory_uri() . '/assets/js/accordion-menu.js', array(), false, true);
    wp_enqueue_script( 'accordion-menu' );  
    
    //wp_register_script('carousel', get_stylesheet_directory_uri() . '/assets/js/carousel.js', array(), false, true);
    //wp_enqueue_script( 'carousel' );    
    
    wp_register_script('hamburger', get_stylesheet_directory_uri() . '/assets/js/hamburger.js', array(), false, true);
    wp_enqueue_script( 'hamburger' );  
    
    wp_register_script('lightbox', get_stylesheet_directory_uri() . '/assets/js/lightbox.js', array(), false, true);
    wp_enqueue_script( 'lightbox' );     

    wp_register_script('pagescroll', get_stylesheet_directory_uri() . '/assets/js/pagescroll.js', array(), false, true);
    wp_enqueue_script( 'pagescroll' );
    
    wp_register_script('scrolling-nav', get_stylesheet_directory_uri() . '/assets/js/scrolling-nav.js', array(), false, true);
    wp_enqueue_script( 'scrolling-nav' );    
    
    wp_register_script('showHide', get_stylesheet_directory_uri() . '/assets/js/showHide.js', array(), false, true);
    wp_enqueue_script( 'showHide' );

    wp_enqueue_script( 'fancybox-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery'), '3.5.7', true );
    
    wp_register_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), false, true);
    wp_enqueue_script( 'main' );
    
    wp_register_script('bootstrap-hover-dropdown', get_stylesheet_directory_uri() . '/assets/js/bootstrap-hover-dropdown.js', array(), false, true);
    wp_enqueue_script( 'bootstrap-hover-dropdown' );

    wp_register_script('extendWalker', get_stylesheet_directory_uri() . '/assets/js/extendWalker.js', array(), false, true);
    wp_enqueue_script( 'extendWalker' );    

	wp_enqueue_script( 'marketize-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'marketize-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'marketize_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** * UPLOAD SVG FILES. */


function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );





/** ADDS 'Ultimate CATEGORY' TAXONOMY TO Carousel ITEMS (IN CUSTOM FIEDLS).*/
add_action( 'init', 'create_ultimate_tax' );

function create_ultimate_tax() {
	register_taxonomy(
		'ultimate_tax',
		'ultimatemember',
		array(
			'label' => __( 'Ultimate Category' ),
			'rewrite' => array( 'slug' => 'ultimate_tax' ),
			'hierarchical' => true,

		)
	);
}
  

/** ADDS 'CATEGORY' TAXONOMY TO SPECIES (IN CUSTOM FIEDLS).*/
add_action( 'init', 'create_species_tax' );

function create_species_tax() {
	register_taxonomy(
		'species_tax',
		'species',
		array(
			'label' => __( 'Category' ),
			'rewrite' => array( 'slug' => 'species_tax' ),
			'hierarchical' => true,
		)
	);
} 





// BUDDYPRESS HIDE USER DATA AND OPTIONS TO DOWNLOAD IT

add_filter( 'bp_settings_show_user_data_page', '__return_false' );

// BUDDYFORMS REDIRECT

function buddyforms_redirect_a_page_to_the_buddypress_profile() {
	if( is_page( 63 ) ) {
		if(is_user_logged_in()){
			wp_safe_redirect( bp_loggedin_user_domain() );
			exit;
		}
	}
}
add_action( 'wp', 'buddyforms_redirect_a_page_to_the_buddypress_profile' );


add_action( 'wp_ajax_comehunting_create_property', 'comehunting_create_property' );
add_action( 'wp_ajax_nopriv_comehunting_create_property', 'comehunting_create_property' );

function comehunting_create_property() {

	$property_name = null;
	$property_subtitle = null;
	$nearest_town = null;
	$hunting_area = null;
	$property_desc = null;
	$address_coordinates = null;

	if ( isset( $_POST[ 'property_name' ] ) ) {
		$property_name = sanitize_text_field( $_POST[ 'property_name' ] );
	}

	if ( isset( $_POST[ 'property_subtitle' ] ) ) {
		$property_subtitle = sanitize_text_field( $_POST[ 'property_subtitle' ] );
	}

	if ( isset( $_POST[ 'nearest_town' ] ) ) {
		$nearest_town = sanitize_text_field( $_POST[ 'nearest_town' ] );
	}

	if ( isset( $_POST[ 'hunting_area' ] ) ) {
		$hunting_area = sanitize_text_field( $_POST[ 'hunting_area' ] );
	}

	if ( isset( $_POST[ 'property_desc' ] ) ) {
		$property_desc = sanitize_textarea_field( $_POST[ 'property_desc' ] );
	}

	if ( isset( $_POST[ 'address_coordinates' ] ) ) {
		$address_coordinates = sanitize_textarea_field( $_POST[ 'address_coordinates' ] );
	}

	if ( ! empty( $property_name ) ) {

		$property_id = wp_insert_post( array(
			'post_title' 	=> $property_name,
			'post_content'	=> $property_desc,
			'post_status'	=> 'publish',
			'post_type'		=> 'property'
		) );

		if ( ! is_wp_error( $property_id ) && function_exists( 'update_field' ) ) {

			update_field( 'property_subtitle', $property_subtitle, $property_id );
			update_field( 'nearest_town', $nearest_town, $property_id );
			update_field( 'hunting_area', $hunting_area, $property_id );
			update_field( 'address_coordinates', $address_coordinates, $property_id );

			$logged_in_user = get_current_user_id();

			update_field( 'property_owner', $logged_in_user, $property_id );

			$user_properties = xprofile_get_field_data( '130', $logged_in_user );
			$user_disciplines = xprofile_get_field_data( '2', $logged_in_user );
			$color_profile = xprofile_get_field_data( '131', $logged_in_user );

			update_field( 'property_disciplines', implode( ",", $user_disciplines ) , $property_id );
			update_field( 'discipline_color_profile', $color_profile, $property_id );

			$properties_array = explode(',', $user_properties);

			$properties_array[] = $property_id;
			xprofile_set_field_data( '130', $logged_in_user, implode(',', $properties_array) );

		} 

	}

	wp_die();

}

add_action( 'wp_ajax_comehunting_get_discipline_property', 'comehunting_get_discipline_property' );
add_action( 'wp_ajax_nopriv_comehunting_get_discipline_property', 'comehunting_get_discipline_property' );

function comehunting_get_discipline_property () {

	$disciplines = null;
	$properties = [];
	$allowed_all = true;
    $allowed_colors = [];
    $member_type = null;
    $member_color = null;

	if ( isset( $_POST[ 'disciplines' ] ) ) {
		$disciplines = $_POST[ 'disciplines' ];
	}

	
		$property_args = [ 
			'post_type' => 'property', 
			'posts_per_page' => -1,
		];

		if ( is_user_logged_in() ) {

			$member_type_object = pmpro_getMembershipLevelForUser( get_current_user_id() );
			$member_type = $member_type_object->name;
			$member_color = xprofile_get_field_data( '131', get_current_user_id() );

			if ( $member_type == 'Guest User' ) {

	        	if ( in_array( 'Hunting', $disciplines ) ) {

	                $allowed_all = false;

	                if ( $member_color == 'Green' ) {
	                    $allowed_colors = [ 'Green', 'Blue', 'Orange', 'Red', 'Black' ];
	                } elseif ( $member_color == 'Blue' ) {
	                    $allowed_colors = [ 'Blue', 'Orange', 'Red', 'Black' ];
	                } elseif ( $member_color == 'Orange' ) {
	                    $allowed_colors = [ 'Orange', 'Red', 'Black' ];
	                } elseif ( $member_color == 'Red' ) {
	                    $allowed_colors = [ 'Red', 'Black' ];
	                }

	            }

	            if ( in_array( 'Wingshooting', $disciplines ) ) {
	                $allowed_colors[] = 'White';
	            }

	            if ( in_array( 'Angling', $disciplines ) ) {
	                $allowed_colors[] = 'Gray';
	            }

	        }

		}

		 if ( ! empty( $disciplines ) ) {

            $property_args['meta_query']['relation'] = 'OR';

            foreach( $disciplines as $discipline ) {
                $property_args['meta_query'][] = [
                    'key'   => 'property_disciplines',
                    'value' => serialize( $discipline ),
                    'compare' => 'LIKE'
                ];
            }

            

        }

		
	

		$property_query = new WP_Query( $property_args );

		//echo json_encode( $property_query );

		if ( $property_query->have_posts() ) : while ( $property_query->have_posts() ) : $property_query->the_post();

			$town_coordinates = get_field( 'address_coordinates' );
			$town_coordinates_array = [];

            if ( ! empty( $town_coordinates ) ) {
                $town_coordinates_array = explode( ',', $town_coordinates );
            }

            $infowindowContent = '<div class="property-infowindow">';
                $infowindowContent .= '<a href="' . get_the_permalink() . '"><h4>' . get_the_title() . '</h4></a>';
            $infowindowContent .= '</div>';

            $color_profile = get_field( 'property_color_profile' );

            if ( empty( $color_profile ) ) continue;

            if ( $allowed_all === false && ! in_array( $color_profile, $allowed_colors )  ) continue;

            if ( ! in_array( 'Hunting' , $disciplines ) && in_array( 'Wingshooting' , $disciplines ) ) {
            	$color_profile = 'White';
            }

            if ( count( $disciplines ) == 1 && $disciplines[0] == 'Angling' ) {
            	$color_profile = 'Gray';
            }


            $icon_link = get_stylesheet_directory_uri() . '/assets/img/icon-' . strtolower( $color_profile ) . '.png';

            $properties[] = [
            	get_the_title(),
            	$town_coordinates_array[0],
            	$town_coordinates_array[1],
            	$infowindowContent,
            	$icon_link
            ];

		endwhile; endif; wp_reset_postdata();
	echo json_encode( $properties );

	wp_die();
}


add_action( 'wp_ajax_comehunting_search_species', 'comehunting_search_species' );
add_action( 'wp_ajax_nopriv_comehunting_search_species', 'comehunting_search_species' );

function comehunting_search_species() {

	$selectedSpecies = null;
	$species_posts = [];
	$properties = [];

	if ( isset( $_POST[ 'species' ] ) ) {
		$selectedSpecies = sanitize_text_field( $_POST[ 'species' ] );
	}

	global $wpdb;

    $rows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key LIKE %s AND meta_value = %s", 'hunting_species_%_animal',$selectedSpecies ));

    if ( ! empty( $rows ) ) {

    	foreach( $rows as $row ) {

    		if ( ! empty( $row->post_id ) ) {

    			if ( ! in_array( $row->post_id, $species_posts ) ) {
    				$species_posts[] = $row->post_id;
    			}

            }

    	}

    }

    if ( count( $species_posts ) > 0 ) {

    	foreach( $species_posts as $species_post ) {

    		$town_coordinates = get_field( 'address_coordinates', $species_post );
			$town_coordinates_array = [];

            if ( ! empty( $town_coordinates ) ) {
                $town_coordinates_array = explode( ',', $town_coordinates );
            }

            $infowindowContent = '<div class="property-infowindow">';
                $infowindowContent .= '<a href="' . get_the_permalink( $species_post ) . '"><h4>' . get_the_title( $species_post ) . '</h4></a>';
            $infowindowContent .= '</div>';

            $color_profile = get_field( 'property_color_profile', $species_post );

            if ( empty( $color_profile ) ) continue;

            $icon_link = get_stylesheet_directory_uri() . '/assets/img/icon-' . strtolower( $color_profile ) . '.png';

            $properties[] = [
            	get_the_title( $species_post ),
            	$town_coordinates_array[0],
            	$town_coordinates_array[1],
            	$infowindowContent,
            	$icon_link
            ];

    	}

    }

    echo json_encode( $properties );

	wp_die();
}

//Helper for repeater field search
// https://www.advancedcustomfields.com/resources/query-posts-custom-fields/
add_filter( 'posts_where', function( $where ) {

	$where = str_replace("meta_key = 'locations_$", "meta_key LIKE 'locations_%", $where);

	return $where;

});


add_action( 'bp_core_activated_user', function( $user_id ) {

	$profile_edit_link = bp_core_get_user_domain( $user_id ) . 'profile/edit/group/2/';

	wp_safe_redirect( esc_url( wp_login_url( $profile_edit_link ) ) );
	exit;

} );

//require get_template_directory() . '/inc/xprofile-terms-conditions-field.php';

function register_acf_options_pages() {

    // Check function exists.
    if( !function_exists('acf_add_options_page') )
        return;

    // register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('Comehunting Settings'),
        'menu_title'    => __('Theme Settings'),
        'menu_slug'     => 'come-hunting-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// Hook into acf initialization.
add_action('acf/init', 'register_acf_options_pages');

// add new property page user check
add_action ( 'template_redirect', function() {

	$redirect = false;
	$redirect_url = null;

	if ( is_page( 'add-new-property' ) ) {

		if ( ! is_user_logged_in() ) {
			
			$redirect = true;
			$redirect_url = get_home_url();
		
		} else {
			$redirect_url = bp_core_get_user_domain( get_current_user_id() ) . 'profile/edit/group/3/';
		}

		$form_type = null;

		if ( isset( $_GET['type'] ) ) {
			$form_type = sanitize_text_field( $_GET['type'] );
		}

		if ( empty( $form_type ) || ! in_array( $form_type, [ 'edit', 'new' ] ) ) {
			$redirect = true;
		}

	}


	if ( $redirect === true ) {

		wp_safe_redirect( esc_url( $redirect_url ) );
		exit;

	}

} );

add_filter( 'body_class', function( $classes ) {

	global $post;
    $post_slug_class = $post->post_type . '-' . $post->post_name;

    return array_merge( $classes, [ $post_slug_class ] );
} );

function comehunting_signup_privacy_policy_acceptance_section() {
	$error = null;
	if ( isset( buddypress()->signup->errors['signup_privacy_policy'] ) ) {
		$error = buddypress()->signup->errors['signup_privacy_policy'];
	}

	?>

	<div class="privacy-policy-accept">
		<?php if ( $error ) : ?>
			<?php nouveau_error_template( $error ); ?>
		<?php endif; ?>

		<label for="signup-privacy-policy-accept">
			<input type="hidden" name="signup-privacy-policy-check" value="1" />

			<?php /* translators: link to Privacy Policy */ ?>
			<input type="checkbox" name="signup-privacy-policy-accept" id="signup-privacy-policy-accept" required /> 
			<?php printf( esc_html__( 'I have read and agree to this site\'s %s.', 'buddypress' ),
				//sprintf( '<a href="%s" target="_blank">%s</a>', esc_url( get_privacy_policy_url() ), esc_html__( 'Privacy Policy', 'buddypress' ) ),
				sprintf( '<a href="#" class="%s">%s</a>', 'rating-policy-popup', esc_html__( 'Rating Policy', 'buddypress' ) )
			); ?>
		</label>
	</div>

	<?php
}

//Here's custom CSS that removes the back link in a function
function my_login_page_remove_back_to_link() { ?>
    <style type="text/css">
        body.login div#login h1 a {
		  background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/come-hunting-logo-rouph.png');
		  width: 150px;
    	  background-size: 100%;
		}
		body.login #wp-submit {
			background-color: #000;
			border-color: #000;
			box-shadow: none;
			color: #fff;
			text-shadow: none;
		}
    </style>
<?php }
//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'my_login_page_remove_back_to_link' );

add_filter( 'login_headerurl', function() {
	return home_url();
} );


/** * REMOVE THE WP ADMIN BAR FOR NON ADMIN USERS */
add_action( 'init', 'remove_admin_bar_user', 10001 );
function remove_admin_bar_user() {

	if ( current_user_can( 'administrator' ) || is_admin() ) {

		show_admin_bar( true );
	} else {
		show_admin_bar( false );
	}
}

add_action( 'wp_ajax_comehunting_profile_delete_property', 'comehunting_profile_delete_property' );
add_action( 'wp_ajax_nopriv_comehunting_profile_delete_property', 'comehunting_profile_delete_property' );

function comehunting_profile_delete_property() {

	$property_id = null;

	if ( isset( $_POST[ 'property_id' ] ) ) {
		$property_id = sanitize_text_field( $_POST[ 'property_id' ] );
	}

	if ( ! empty( $property_id ) ) {

		wp_delete_post( $property_id, true );

	}

	wp_die();

}

function comehunting_get_profile_group_tabs() {

	// Get field group data.
	$groups     = bp_profile_get_field_groups();
	$group_name = bp_get_profile_group_name();
	$tabs       = array();

	// Loop through field groups and put a tab-lst together.
	for ( $i = 0, $count = count( $groups ); $i < $count; ++$i ) {

		// Setup the selected class.
		$selected = '';
		if ( $group_name === $groups[ $i ]->name ) {
			$selected = ' class="current"';
		}

		// Skip if group has no fields.
		if ( empty( $groups[ $i ]->fields ) ) {
			continue;
		}

		// Build the profile field group link.
		$link   = trailingslashit( bp_displayed_user_domain() . bp_get_profile_slug() . '/edit/group/' . $groups[ $i ]->id );

		// Add tab to end of tabs array.
		// $tab_html_output = sprintf(
		// 	'<li %1$s><a href="%2$s">%3$s</a></li>',
		// 	$selected,
		// 	esc_url( $link ),
		// 	apply_filters( 'bp_get_the_profile_group_name', $groups[ $i ]->name )
		// );

		$group_tab_name = apply_filters( 'bp_get_the_profile_group_name', $groups[ $i ]->name );

		$is_profile_incomplete = false;

		if ( is_user_logged_in() && $group_tab_name == 'Property Listings' ) {
			
			$is_profile_incomplete = get_user_meta( get_current_user_id(), 'is_user_profile_complete', true );

			if ( $is_profile_incomplete ) {
				$link = '#';
				$selected = ' class="property-link disabled"';
			} else {

				$property_query = new WP_Query( [ 
					'author' => get_current_user_id(),
					'post_type'	=> 'property',
					'post_status' => 'publish',
					'posts_per_page' => -1
				]);

				if ( ! $property_query->have_posts() ) {
					$group_tab_name = $group_tab_name . '<div class="tab-incomplete-notice add-property"><span>' . __( 'Add Property', 'marketize' ) . '</span><span class="incomplete-close"><i class="fa fa-times" aria-hidden="true"></i></span></div>';
				}

			}
		}

		$tabs[] = apply_filters( 'comehunting_get_the_profile_group_tab_html_output', sprintf(
			'<li %1$s><a href="%2$s">%3$s</a></li>',
			$selected,
			esc_url( $link ),
			$group_tab_name
		), $selected, $link, $group_tab_name );

	}

	/**
	 * Filters the tabs to display for profile field groups.
	 *
	 * @since 1.5.0
	 *
	 * @param array  $tabs       Array of tabs to display.
	 * @param array  $groups     Array of profile groups.
	 * @param string $group_name Name of the current group displayed.
	 */
	$tabs = apply_filters( 'xprofile_filter_profile_group_tabs', $tabs, $groups, $group_name );

	return join( '', $tabs );
}

function is_incomplete_tab( $field_ids = [] ) {

	if ( empty( $field_ids ) || ! is_array( $field_ids ) ) return;

	if ( ! is_user_logged_in() ) return;

	$is_incomplete = false;

	foreach( $field_ids as $field_id ) {

		$field_val = xprofile_get_field_data( $field_id, get_current_user_id() );

		if ( empty( $field_val ) ) {
			$is_incomplete = true;
			break;
		}

	}

	update_user_meta( get_current_user_id(), 'is_user_profile_complete', $is_incomplete );

	return $is_incomplete;

}

add_filter( 'bp_get_the_profile_group_name', function( $group_name ) {

	if ( is_admin() ) return $group_name;

	if ( ! is_user_logged_in() ) return $group_name;

	$field_ids = [];
	$is_incomplete_tab = false;
	$member_type = pmpro_getMembershipLevelForUser( get_current_user_id() );

	if ( $group_name == 'Personal' ) {
		
		$field_ids = [ '1', '254' ];
	
	} else if ( $group_name == 'Contact' ) {

		$field_ids = [ '281', '282', '283', '284', '285', '286', '287' ];

	} else if ( $group_name == 'Hunting Profile' && $member_type == 'Guest User' ) {

		$field_ids = [ '2', '12', '32', '179', '187', '193', '131' ];

	}

	if ( ! empty( $field_ids ) ) {

		$is_incomplete_tab = is_incomplete_tab( $field_ids );

	}

	if ( $is_incomplete_tab === true ) {

		$group_name = $group_name . '<div class="tab-incomplete-notice"><span>' . __( 'Incomplete Tab', 'marketize' ) . '</span><span class="incomplete-close"><i class="fa fa-times" aria-hidden="true"></i></span></div>';
	
	}

	return $group_name;

});