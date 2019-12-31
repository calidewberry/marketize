<?php acf_form_head(); ?>

<?php get_header(); ?>

<?php

	$profile_edit_link = bp_core_get_user_domain( get_current_user_id() ) . 'profile/edit/group/3/';

	$form_type = null;
	$property_id = null;
	$page_title = get_the_title();
	$error_msg = null;

	if ( isset( $_GET['type'] ) ) {
		$form_type = sanitize_text_field( $_GET['type'] );
	}

	if ( isset( $_GET['id'] ) ) {
		$property_id = sanitize_text_field( $_GET['id'] );
	}
	
	$form_data = [
		'id'				=> 'new-property',
		'post_title'		=> true,
		'post_content'		=> true,
		'return'			=> $profile_edit_link,
		'updated_message'	=> false
	]; 

	if ( ! empty( $form_type ) ) {

		if ( $form_type == 'new' ) {

			$form_data['new_post'] = [
				'post_type'		=> 'property',
				'post_status'	=> 'publish',
			];

			$form_data['post_id'] = 'new_post';

			$page_title = __( 'Add New Property', 'marketize' );
			$submit_value = __( "Publish", 'marketize' );

		} elseif ( $form_type == 'edit' && ! empty( $property_id ) ) {

			// Check if property is available
			$property_to_edit = get_post( $property_id );

			if ( is_null( $property_to_edit ) || $property_to_edit->post_type != 'property' ) { 

				$error_msg = __( "Property is not available", 'marketize' );
			}

			$form_data['post_id'] = $property_id;

			$page_title = __( 'Edit Property', 'marketize' );
			$submit_value = __( "Save changes", 'marketize' );

		}

		$form_data['submit_value'] = $submit_value;

	}

?>

	<section id="page-content">
		<div class="container container-main">

			<div class="row">
				<div class="col">
					<h2><?php echo $page_title; ?></h2>
				</div>
			</div>
			
			<div class="row">
				<div class="col">

					<?php if ( ! empty( $error_msg ) ) : ?>

						<h3><?php echo $error_msg; ?></h3>

					<?php else: ?>
						<?php acf_form( $form_data ); ?>
					<?php endif; ?>
				
				</div>
			</div>
		
		</div>
	</section>

	<script type="text/javascript">
		
		var addressAutocomplete;
		var placeChanged = false;

		function propertyAddress() {
			
			addressAutocomplete = new google.maps.places.Autocomplete( document.getElementById('acf-field_5dd1b3af3a800'), { types: ['address']  });
	    	addressAutocomplete.setFields( [ 'address_component', 'formatted_address', 'geometry', 'place_id', 'name' ] );
	    	
	    	addressAutocomplete.addListener('place_changed', function() {

	    		setTimeout( function() {
	    			placeChanged = true;
	    		}, 200 );

	    		var chosenAddress = addressAutocomplete.getPlace();

	    		var latLng =  chosenAddress.geometry.location.lat() + ',' + chosenAddress.geometry.location.lng();

	    		jQuery( '#acf-field_5dd1b3ed3a801' ).val( latLng );

	    	});
		
		}

		jQuery( 'body' ).find( '#acf-field_5dd1b3af3a800' ).change( function() {

			placeChanged = false;

			setTimeout( function() {
			  
			  if ( placeChanged === false ) {

			  	var enteredVal = jQuery( 'body' ).find( '#acf-field_5dd1b3af3a800' ).val();

			  	if ( enteredVal.length > 0 ) {

			  		jQuery( '#acf-field_5dd1b3ed3a801' ).val( enteredVal );
			  	}

			  }
			
			}, 500 );
	    		
    		

    	});

	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJJEnddGJ0cZulEYKt8VLQijV1RHZx83w&libraries=places&language=en&callback=propertyAddress" async defer></script>

<?php get_footer(); ?>