<?php get_header(); ?>

<?php 
    
    // $member_disciplines = xprofile_get_field_data( '2', get_current_user_id() );

    // print_r($member_disciplines); echo '<br/>';

    // $property_des = get_field( 'property_disciplines', '316' );

    // print_r($property_des);

?>
<?php if( have_posts() ) : while( have_posts() )  : the_post(); ?>

    <section id="home-page">
        <div class="home-page-content container container-main">
<!--         <h1><?php //the_title(); ?></h1>    -->     
            <?php the_content(); ?> 
            
        </div>

        <?php if ( is_user_logged_in() ) : ?>

            <?php $logged_in_username = bp_core_get_username( bp_loggedin_user_id() ); ?>

            <div class="button-holder logged-in-user">
                <a href="<?php echo esc_url( get_site_url( null, '/members/' . $logged_in_username . '/profile' ) ); ?>" class="black-button" ><p><?php _e( 'My Profile', 'marketize' ); ?></p></a>
            </div>

        <?php else : ?>
        
              <div class="button-holder">
                <a href="#" class="pm-opportunity-modal" style="margin-top: 10px;" ><p>The opportunity</p></a>
            </div>
        
        <h2>Register your opportunity&nbsp;now…</h2>

            <div class="button-holder">
                <a href="<?php echo esc_url( get_site_url( null, '/register?type=pm' ) ); ?>" class="black-button" ><p><?php _e( 'Land Owner', 'marketize' ); ?></p></a>

            </div>
                
            <div class="button-holder">
                <a href="<?php echo esc_url( get_site_url( null, '/register?type=guest' ) ); ?>" class="black-button guest-opportunity-modal" ><p><?php _e( 'Hunter', 'marketize' ); ?></p></a>
                <a href="<?php echo esc_url( get_site_url( null, '/register?type=guest' ) ); ?>" class="black-button guest-opportunity-modal" ><p><?php _e( 'Wingshooter', 'marketize' ); ?></p></a>
                <a href="<?php echo esc_url( get_site_url( null, '/register?type=guest' ) ); ?>" class="black-button guest-opportunity-modal" ><p><?php _e( 'Angler', 'marketize' ); ?></p></a>
           
            </div>  
        

        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col mt-5">
                    <div class="search-property-wrap mb-3">

                        <?php $member_disciplines = [ 'Hunting', 'Wingshooting', 'Angling' ];

                            $member_type = null;

                            if ( is_user_logged_in() ) {

                                $member_type = pmpro_getMembershipLevelForUser( get_current_user_id() );

                                if ( is_object( $member_type ) ) {
                                    if ( $member_type->name == 'Guest User' ) {
                                        $member_disciplines = xprofile_get_field_data( '2', get_current_user_id() );
                                    }
                                }

                            }


                         ?>

                        <div class="row">

                            <div class="col-sm-12 col-md-4 search-species-wrap search-options" >
                                <div class="" >
                                    <label for="search_species"><?php _e( 'What do you like to hunt?', 'marketize' ); ?></label>
                                    <select class="form-control" id="search_species" name="search_species">
                                        <option><?php _e( 'Please select', 'marketize' ); ?></option>
                                          
                                          <?php $animal_names = comehunting_get_all_animal_names( $member_disciplines );

                                            if ( ! empty( $animal_names ) ) {

                                                foreach ( $animal_names as $animal_name_field => $animal_name ) {
                                                    echo '<option value="' . esc_attr( $animal_name_field ) . '">' . __( $animal_name, 'marketize' ) . '</option>';
                                                }

                                            }

                                          ?>

                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-4 search-property-input-wrap search-options" >
                                <div class="" >
                                    <label for="search_property"><?php _e( 'Where would like to hunt?', 'marketize' ); ?></label>
                                    <input type="text" id="search-property" name="search_property" class="form-control" placeholder="<?php _e( 'Search Area', 'marketize' ); ?>">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4 search-radius-wrap search-options">
                                <div class="" >
                                    <label for="search_radius"><?php _e( 'Search radius', 'marketize' ); ?></label>
                                    <input type="number" min="1" id="search_radius" name="search_radius" class="form-control" placeholder="<?php _e( 'Search radius distance in KM', 'marketize' ); ?>" >
                                </div>
                            </div>

                        </div>

                        <?php /*
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <label for="map_search_type"><?php _e( 'Refine Map Search', 'marketize' ); ?></label>
                                <select class="form-control" name="map_search_type" id="map_search_type">
                                    <option value=""><?php _e( 'Please select', 'marketize' ); ?></option>
                                    <option value="distance"><?php _e( 'Distance', 'marketize' ); ?></option>
                                    <option value="species"><?php _e( 'Species', 'marketize' ); ?></option>
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-4 search-property-input-wrap search-options" style="display: none;">
                                <div class="" >
                                    <label for="search_property"><?php _e( 'Search Query', 'marketize' ); ?></label>
                                    <input type="text" id="search-property" name="search_property" class="form-control" placeholder="<?php _e( 'Search Query', 'marketize' ); ?>">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4 search-radius-wrap search-options" style="display: none;">
                                <div class="" >
                                    <label for="search_radius"><?php _e( 'Search radius (Max 50KM)', 'marketize' ); ?></label>
                                    <input type="number" min="1" max="50" id="search_radius" name="search_radius" class="form-control" placeholder="<?php _e( 'Search radius', 'marketize' ); ?>" value="50">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4 search-species-wrap search-options" style="display: none;">
                                <div class="" >
                                    <label for="search_species"><?php _e( 'Search by species', 'marketize' ); ?></label>
                                    <select class="form-control" id="search_species" name="search_species">
                                        <option><?php _e( 'Please select', 'marketize' ); ?></option>
                                          
                                          <?php $animal_names = get_field_object( 'field_5db2017866a5c' ); 

                                            if ( ! empty( $animal_names ) && isset( $animal_names['choices'] ) ) {

                                                foreach ( $animal_names['choices'] as $animal_name_field => $animal_name ) {
                                                    echo '<option value="' . esc_attr( $animal_name_field ) . '">' . __( $animal_name, 'marketize' ) . '</option>';
                                                }

                                            }

                                          ?>
                                    </select>
                                </div>
                            </div>
                            
                        </div> */ ?>
                        
                    </div>

                    <div id="map-button-holder">

                        <?php foreach( $member_disciplines as $member_discipline ) : ?>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="property_disciplines" id="map-<?php echo esc_attr( strtolower( $member_discipline ) ); ?>-checkbox" type="checkbox"  value="<?php echo esc_attr( $member_discipline ); ?>" checked>
                              <label class="form-check-label" for="map-<?php echo esc_attr( strtolower( $member_discipline ) ); ?>-checkbox"><?php _e( $member_discipline, 'marketize' ); ?></label>
                            </div>
                        <?php endforeach; ?>

                        <?php /* if ( in_array( 'Hunting', $member_disciplines ) ) : ?>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="property_disciplines" id="map-hunting-checkbox" type="checkbox"  value="Hunting" checked>
                              <label class="form-check-label" for="map-hunting-checkbox"><?php _e( 'Hunting', 'marketize' ); ?></label>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( in_array( 'Wingshooting', $member_disciplines ) ) : ?>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="property_disciplines" id="map-wingshooting-checkbox"  value="Wingshooting" checked>
                              <label class="form-check-label" for="map-wingshooting-checkbox"><?php _e( 'Wingshooting', 'marketize' ); ?></label>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( in_array( 'Angling', $member_disciplines ) ) : ?>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="property_disciplines" id="map-angling-checkbox"  value="Angling" checked>
                              <label class="form-check-label" for="map-angling-checkbox"><?php _e( 'Angling', 'marketize' ); ?></label>
                            </div>
                        <?php endif; */ ?>

                   
                    </div>

                    <div id="properties-map"></div>
                </div>
            </div>
        </div>

        

    </section>

<?php endwhile; endif; ?>

    <script>
      var map;
      var locations = [];
      var markers = [];
      var circle = null;
      var placesResult;
      
      function propertiesMap() {
        
        map = new google.maps.Map(document.getElementById('properties-map'), {
          center: {lat: -33.927750, lng: 18.429639},
          zoom: 8
        });

        var latlngbounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();
        var properties = [];

        <?php $property_query_args = [ 'post_type' => 'property', 'posts_per_page' => -1 ];

            $allowed_all = true;
            $allowed_colors = [];

            if ( is_user_logged_in() ) {

                $logged_in_user = wp_get_current_user();
                $logged_in_user->membership_level = pmpro_getMembershipLevelForUser( $logged_in_user->ID );
                
                $member_type = $logged_in_user->membership_level->name;

                if ( $member_type == 'Guest User' ) {

                    $member_disciplines = xprofile_get_field_data( '2', $logged_in_user->ID );
                    $member_color = xprofile_get_field_data( '131', $logged_in_user->ID );

                    if ( ! empty( $member_disciplines ) ) {

                        $property_query_args['meta_query']['relation'] = 'OR';

                        foreach( $member_disciplines as $member_discipline ) {
                            $property_query_args['meta_query'][] = [
                                'key'   => 'property_disciplines',
                                'value' => serialize( $member_discipline ),
                                'compare' => 'LIKE'
                            ];
                        }

                        

                    }

                    if ( in_array( 'Hunting', $member_disciplines ) ) {

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

                    if ( in_array( 'Wingshooting', $member_disciplines ) ) {
                        $allowed_colors[] = 'White';
                    }

                    if ( in_array( 'Angling', $member_disciplines ) ) {
                        $allowed_colors[] = 'Gray';
                    }

                }

            }

        $property_query = new WP_Query( $property_query_args ); ?>

        <?php if ( $property_query->have_posts() ) : ?>

            <?php while ( $property_query->have_posts() ) : $property_query->the_post(); ?>

                <?php $town_coordinates = get_field( 'address_coordinates' ); 
                    $town_coordinates_array = [];

                    // if ( is_numeric( $town_coordinates ) ) {
                    //     print_r($town_coordinates);
                    // }



                    if ( ! empty( $town_coordinates ) ) {
                        $town_coordinates_array = explode( ',', $town_coordinates );
                        if ( isset( $town_coordinates_array[1] ) && ! is_numeric( $town_coordinates_array[1] ) ) continue;
                    }

                    $infowindowContent = '<div class="property-infowindow">';
                        $infowindowContent .= '<a href="' . get_the_permalink() . '"><h4>' . get_the_title() . '</h4></a>';
                    $infowindowContent .= '</div>';

                    $color_profile = get_field( 'property_color_profile' );

                    if ( empty( $color_profile ) ) continue;

                    if ( $allowed_all === false && ! in_array( $color_profile, $allowed_colors )  ) continue;

                    if ( ! in_array( 'Hunting' , $member_disciplines ) && in_array( 'Wingshooting' , $member_disciplines ) ) {
                        $color_profile = 'White';
                    }

                    if ( count( $member_disciplines ) == 1 && $member_disciplines[0] == 'Angling' ) {
                        $color_profile = 'Gray';
                    }


                    $icon_link = get_stylesheet_directory_uri() . '/assets/img/icon-' . strtolower( $color_profile ) . '.png';

                ?>

                <?php if ( ! empty( $town_coordinates_array ) && isset( $town_coordinates_array[0] ) && isset( $town_coordinates_array[1] ) ) : ?>

                    properties.push([
                        '<?php echo get_the_title(); ?>',
                        '<?php echo $town_coordinates_array[0]; ?>',
                        '<?php echo $town_coordinates_array[1]; ?>',
                        '<?php echo $infowindowContent; ?>',
                        '<?php echo $icon_link; ?>'
                    ]);

                <?php endif; ?>

            <?php endwhile; ?>

        <?php endif; wp_reset_postdata(); ?>

        if ( properties.length > 0 ) {

            for(var i=0; i<properties.length; i++) {
                placeMarker( properties[i] );
            }

            map.fitBounds( latlngbounds );

        }

        function placeMarker( loc, hascircle = false ) {
            var latLng = new google.maps.LatLng( loc[1], loc[2]);
            var marker = new google.maps.Marker({
                position : latLng,
                map      : map,
                animation: google.maps.Animation.DROP,
                icon: {
                    url: loc[4],
                    scaledSize: new google.maps.Size(40, 60)
                }
            });

            markers.push( marker );

            latlngbounds.extend(marker.getPosition());

            locations.push( latLng );

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.close();
                infowindow.setContent( loc[3] );
                infowindow.open(map, marker); 
            });

            if ( hascircle === false ) {
                if (circle) circle.setMap(null);
            }

        }

        // Create the search box and link it to the UI element.
        var input = document.getElementById('search-property');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        //map.controls[google.maps.ControlPosition.TOP_LEFT].push( document.getElementById('map-button-holder') );

        //searchBox.setFields( [ 'address_component', 'formatted_address', 'geometry', 'place_id', 'name' ] );

        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function() {

           //triggerRaiusSearch();
           triggerMapSearch();

        });

        jQuery( '#search_radius' ).keyup(function(event) {
            
            // var searchQueryInput = jQuery('#search-property');

            // if ( searchQueryInput.val().length > 0 ) {
            //     triggerRaiusSearch();
            // }

            triggerMapSearch();

        });

        jQuery( '#search_species' ).change(function(event) {

            // var selectedPlace = searchBox.getPlaces();

            // if ( typeof selectedPlace !== 'undefined' || selectedPlace !== null ) {
            //         console.log( selectedPlace );
            // }

            // var slectedSpecies = jQuery('#search_species');

            // if ( slectedSpecies.val().length > 0 ) {
            //     speciesSearch( slectedSpecies.val() );
            // }

            triggerMapSearch();

        });


        function triggerMapSearch() {
            
            var selectedAnimal = '';
            var selectedLocation = '';
            var selectedRadius = '';

            selectedAnimal = jQuery( '#search_species' ).val();
            selectedLocation = searchBox.getPlaces();
            selectedRadius = parseInt( jQuery( '#search_radius' ).val(), 10 ) * 1000;

            var speciesActionData = {
              'action': 'comehunting_search_species',
              'species': selectedAnimal
            };

            jQuery.post( ajaxurl, speciesActionData, function( response ) {

                var speciesProperties = JSON.parse(response);

                if ( speciesProperties.length > 0 ) {
                    
                    removeMarkers( markers );

                    if ( typeof selectedLocation === 'undefined' || selectedLocation === null ) {
                        
                        for (var i = 0; i < speciesProperties.length; i++) {
                            //console.log( speciesProperties[i] );     
                            placeMarker( speciesProperties[i] );
                        }
                    
                    } else {

                        selectedCountry = selectedLocation[0].address_components[3].short_name;

                        if ( isNaN( selectedRadius ) ) {
                            selectedRadius = 50 * 1000;
                        }

                        if ( selectedCountry != 'ZA' ) {
                            
                            alert( 'Please select a location in South Africa' );
                        
                        } else {

                            var selectedLocationLatLng = new google.maps.LatLng( selectedLocation[0].geometry.location.lat(), selectedLocation[0].geometry.location.lng() );

                            var selectedLocationMarker = new google.maps.Marker({
                                map: map,
                                position: selectedLocationLatLng,
                                icon: {
                                    path: google.maps.SymbolPath.CIRCLE,
                                    scale: 0
                                }
                            });

                            map.setCenter(selectedLocationLatLng, 5);

                            if (circle) circle.setMap(null);

                            circle = new google.maps.Circle({
                                center: selectedLocationMarker.getPosition(),
                                radius: selectedRadius,
                                map: map
                            });
                  
                            var radiusBounds = new google.maps.LatLngBounds();

                            var radiusProperties = 0;
                            
                            for ( var i=0; i < speciesProperties.length; i++ ) {

                                var speciesPropertyLatLng = new google.maps.LatLng( speciesProperties[i][1], speciesProperties[i][2] );
                                
                                if (google.maps.geometry.spherical.computeDistanceBetween( speciesPropertyLatLng, selectedLocationMarker.getPosition() ) < selectedRadius) {
                                  radiusBounds.extend(speciesPropertyLatLng);
                                  //speciesProperties[i].setMap(map);
                                  placeMarker( speciesProperties[i], true );
                                  //console.log( 'found result' );

                                  radiusProperties++;
                                
                                } else {
                                  //speciesProperties[i].setMap(null);

                                  //alert( 'No properties found.' );
                                }
                            }

                            if ( radiusProperties == 0 ) {
                                //alert( 'No properties found.' );
                            }
                            
                            //map.fitBounds(radiusBounds);

                        }

                        //console.log( selectedLocation );

                    }

                } else {
                    removeMarkers( markers );
                }

            }); 



        }

        function triggerRaiusSearch() {

            placesResult = searchBox.getPlaces();
            var searchRadius = 50;
            var placeSearchType = jQuery( '#map_search_type' ).val();

            var locationSelected = new google.maps.LatLng( placesResult[0].geometry.location.lat(), placesResult[0].geometry.location.lng() );

            map.setCenter(locationSelected);

            if ( placeSearchType == 'distance' ) {
                
                // Radius in Meters
                searchRadius = parseInt( jQuery( '#search_radius' ).val(), 10 ) * 1000;

                var selectedLocationMarker = new google.maps.Marker({
                    map: map,
                    position: locationSelected,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 0
                    }
                });

                if (circle) circle.setMap(null);

                circle = new google.maps.Circle({
                    center: selectedLocationMarker.getPosition(),
                    radius: searchRadius,
                    map: map
                });
      
                var radiusBounds = new google.maps.LatLngBounds();
                
                for ( var i=0; i < markers.length; i++ ) {
                    
                    if (google.maps.geometry.spherical.computeDistanceBetween(markers[i].getPosition(),selectedLocationMarker.getPosition()) < searchRadius) {
                      radiusBounds.extend(markers[i].getPosition());
                      markers[i].setMap(map);
                    } else {
                      markers[i].setMap(null);
                    }
                }
                
                map.fitBounds(radiusBounds);
            }

        }

        function speciesSearch( slectedSpecies = '' ) {

            var speciesActionData = {
              'action': 'comehunting_search_species',
              'species': slectedSpecies
            };

            jQuery.post( ajaxurl, speciesActionData, function( response ) {

                var speciesProperties = JSON.parse(response);

                if ( speciesProperties.length > 0 ) {
                    
                    removeMarkers( markers );
                    
                    for (var i = 0; i < speciesProperties.length; i++) {
                        //console.log( speciesProperties[i] );     
                        placeMarker( speciesProperties[i] );
                    }

                } else {
                    removeMarkers( markers );
                }

            });           

        }


        jQuery( '#map-button-holder input[type=checkbox]' ).change(function(event) {
    
            var selectedDisciplines = [];

            jQuery( '#map-button-holder input[type=checkbox]:checked' ).each(function(index, el) {
              selectedDisciplines.push( jQuery( this ).val() );
            });

            jQuery( '#search_species,#search-property,#search_radius' ).val('');
            placesResult = '';


            if ( selectedDisciplines.length > 0 ) {

                var actionData = {
                  'action': 'comehunting_get_discipline_property',
                  'disciplines': selectedDisciplines
                };
                

                jQuery.post( ajaxurl, actionData, function( response ) {

                  var disciplineData = JSON.parse(response);
                  var disciplineProperties = disciplineData[0];

                  var animalNames = disciplineData[1];
                  var animalNamesCount = Object.keys(animalNames).length;

                  jQuery( '#search_species' ).find( 'option' ).remove().end().append('<option >Please select</option>');

                  if ( animalNamesCount > 0 ) {

                    for (var key in animalNames) {
                        if (animalNames.hasOwnProperty(key)) {
                            //console.log(key + " -> " + animalNames[key]);
                            jQuery( '#search_species' ).append('<option ' + key +'>' + animalNames[key] +'</option>');
                        }
                    }

                  }

                  if ( disciplineProperties.length > 0 ) {
                    
                    removeMarkers( markers );
                    
                    for (var i = 0; i < disciplineProperties.length; i++) {
                        //console.log( disciplineProperties[i] );     
                        placeMarker( disciplineProperties[i] );
                    }

                    //map.fitBounds(latlngbounds);
                  }

                });
            
            } else {

                removeMarkers( markers );
            }

          });

        function removeMarkers( markers = [] ) {
            
            for(i=0; i<markers.length; i++){
                markers[i].setMap(null);
            }
            
        }

      }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJJEnddGJ0cZulEYKt8VLQijV1RHZx83w&libraries=places,geometry&language=en&callback=propertiesMap" async defer></script>

<?php get_footer();
