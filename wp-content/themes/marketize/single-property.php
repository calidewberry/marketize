<?php get_header(); ?>

<?php if ( ! is_user_logged_in() ) : ?>

    <div class="listing-header-content ">
        
        <div class="container">
            <div class="row">
                <dic class="col listing-header">
                    <?php echo get_field( 'properties_logged_out_user_massage', 'option' ); ?>
                </dic>
            </div>
        </div>

    </div>

<?php else : ?>

<?php // ADVANCED CUSTOM FIELDS PRODUCTS
$property_name                          = get_field('property_name');
$property_subtitle                      = get_field('property_subtitle');
$property_logo                          = get_field('property_logo');
$nearest_town                           = get_field('nearest_town');
$province                               = get_field('province');
//$nearest_town_coordinates               = get_field('nearest_town_coordinates');
$hunting_area                           = get_field('hunting_area');
$property_disciplines                   = get_field('property_disciplines');
$preferred_weapon                       = get_field('preferred_weapon');
$other_weapons_accepted                 = get_field('other_weapons_accepted');

$preferred_hunting_method_bow           = get_field('preferred_hunting_method_bow');
$preferred_hunting_method_rifle         = get_field('preferred_hunting_method_rifle');
$preferred_hunting_method_handgun       = get_field('preferred_hunting_method_handgun');
$preferred_hunting_method_muzzleloader  = get_field('preferred_hunting_method_muzzleloader');
$other_hunting_styles_accepted          = get_field('other_hunting_styles_accepted');
$hunting_terrain                        = get_field('hunting_terrain');

$wingshooting_terrain                   = get_field('wingshooting_terrain');
$wingshooting_preference                = get_field('wingshooting_preference');

$angling_terrain                        = get_field('angling_terrain');
$angling_style                          = get_field('angling_style');

$hunting_memberships                    = get_field('hunting_memberships');
$cert_ae                                = get_field('cert_ae');
$wingshooting_memberships               = get_field('wingshooting_memberships');

$property_description                   = get_field('property_description');
$terrain_description                    = get_field('terrain_description');
$accommodation_offered                  = get_field('accommodation_offered');
$accommodation_description              = get_field('accommodation_description');
$services                               = get_field('services');
$recreation                             = get_field('recreation');

$currency                            = get_field('currency');

$hunting_costs                          = get_field('hunting_costs');
$hunting_costs_other                          = get_field('hunting_costs_other');
$wingshooting_costs                     = get_field('wingshooting_costs');
$wingshooting_costs_other               = get_field('wingshooting_costs_other');

$payment_terms                          = get_field('payment_terms');
$terms_and_conditions                   = get_field('terms_and_conditions');


$hunting_species                        = get_field('hunting_species');
$pigeons_and_doves                      = get_field('pigeons_and_doves');
$other_pigeons_and_doves                = get_field('other_pigeons_and_doves');
$upland_birds                           = get_field('upland_birds');
$other_upland_birds                     = get_field('other_upland_birds');
$waterfowl                              = get_field('waterfowl');
$other_waterfowl_species                = get_field('other_waterfowl');
$freshwater_river                       = get_field('freshwater_river');
$other_freshwater_river                 = get_field('other_freshwater_river');
$freshwater_dam                         = get_field('freshwater_dam');
$other_freshwater_dam                   = get_field('other_freshwater_dam');
$saltwater_estuary                      = get_field('saltwater_estuary');
$other_saltwater_estuary                = get_field('other_saltwater_estuary');

?>

 <?php $logged_in_username = bp_core_get_username( bp_loggedin_user_id() ); ?>

<div class="button-holder logged-in-user">
    <a href="<?php echo esc_url( get_site_url( null, '/members/' . $logged_in_username . '/profile' ) ); ?>" class="black-button" ><p><?php _e( 'My Profile', 'marketize' ); ?></p></a>
</div>        

<!-- LISTING --> 
<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">LISTING INFO</a></li>
 <!-- HIDE CALENDAR FOR NOW      <li><a href="#tab2">CALENDAR</a></li>  -->  
    </ul>

    <article class="listing">
    <!-- DISPLAY LISTING CONTENT IN TAB -->    
        <div id="tab1" class="tab active">
            <div class="listing-header-content ">
                <div class="container listing-header">
                    <?php if( !empty($property_logo) ): ?>
                            <img src="<?php echo $property_logo; ?>"  />
                    <?php endif; ?>
                    <div class="listing-heading">
                        <h1 class=""><?php the_title(); ?></h1>
                        <h2 class=""><?php the_field('property_subtitle'); ?></h2>
                                            <p>Situated in the <?php the_field('nearest_town'); ?> district <span><br></span>in&nbsp;<?php the_field('province'); ?> Province</p>                    
                    <p><strong>Hunting area <?php the_field('hunting_area'); ?> Ha</strong></p>
                    </div>

                     
                    

                </div>

            </div>
            
            
           
             <!-- DISPLAY DISCIPLINE DATA IN TABS -->            
             <div class="tabs inner-tabs">

                    
<?php
    if( $property_disciplines ): 
     $count = 0;
     $class = '';
?>
    <ul class="tab-links">
        <?php foreach( $property_disciplines as $discipline ): 
            $count++;
        if ( $count == 1 ) $class = 'active';
        if ( $count > 1 ) $class = ' ';
        if ($discipline === 'Angling') $discipline ='Fishing';
        ?>
            <li class="<?php echo $class ?>"><a href="#tab<?php echo $count + 2 ?>"><?php echo substr($discipline,0,4); ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>                    
                    

                                      
                                 


                <div class="tab-content">
 <!--**** PLEASE CHECK WHAT HAPPENS TO HUNTING - TAB 3 - WHEN IT IS CLICKED IT DISAPPEARS SEE SCRIPT AT BOTTOM OF THIS PAGE --> 
<!--**** ADD SCRIPT TO LOAD IN FUNCTIONS WHEN COMPLETE - IF THIS IS BEST PRACTICE -->    
                <!-- DISPLAY HUNT IN TAB --> 
                    
<?php
    if( $property_disciplines ): 
     $count = 0;
     $class = '';
?>  
                    
    <?php foreach( $property_disciplines as $discipline ): 
                                $count++;
        if ( $count == 1 ) $class = 'active';
        if ( $count > 1 ) $class = ' ';
    ?>
                    
        <?php if( in_array( 'Hunting', get_field('property_disciplines') ) or 'Hunting' == get_field('property_disciplines') ) { ?>   

                    
                    <div id="tab3" class="discipline tab <?php echo $class ?>">
                             <div class="container listing-detail">
                                <div class="listing-col-container">
                                    <div class="dark-listing-col">
                                       <h3>HUNTING STYLE</h3>
                                        <ul>
                                            <li>
                                                <?php if( get_field('preferred_hunting_method_bow') ): the_field('preferred_hunting_method_bow'); endif; ?>
                                                <?php if( get_field('preferred_hunting_method_rifle') ): the_field('preferred_hunting_method_rifle'); endif; ?>
                                                <?php if( get_field('preferred_hunting_method_handgun') ): the_field('preferred_hunting_method_handgun'); endif; ?>
                                                <?php if( get_field('preferred_hunting_method_muzzleloader') ): the_field('preferred_hunting_method_muzzleloader'); endif; ?>
                                                <?php if( get_field('preferred_hunting_method_muzzleloader') ): the_field('preferred_hunting_method_muzzleloader'); endif; ?>
                                            </li>
                                        </ul>        
                                   
                                        <?php
                                        if( $other_hunting_styles_accepted ): ?>
                                            <h3>OTHER STYLES ACCEPTED</h3>                                        
                                            <ul>
                                                <?php foreach( $other_hunting_styles_accepted as $other_hunting_style ): ?>
                                                    <li><?php echo $other_hunting_style; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>                      
                                    </div>
                                                                        
                                    <div class="dark-listing-col">
                                       <h3>PREFERRED WEAPON</h3>
                                        <ul>
                                            <li><?php if( get_field('preferred_weapon') ): the_field('preferred_weapon'); endif; ?></li>

                                        </ul>                        


                                        <?php
                                        if( $other_weapons_accepted ): ?>
                                            <h3>OTHER WEAPONS ACCEPTED</h3>                                        
                                            <ul>
                                                <?php foreach( $other_weapons_accepted as $other_weapon ): ?>
                                                    <li><?php echo $other_weapon; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>                                        
                                    </div>                        
                                    <div class="dark-listing-col"> 
                                        <?php
                                        if( $hunting_terrain ): ?>
                                            <h3>TERRAIN</h3>                                        
                                            <ul>
                                                <?php foreach( $hunting_terrain as $terrain ): ?>
                                                    <li><?php echo $terrain; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>                                                                               
                                        <?php
                                        if( $hunting_memberships ): ?>
                                            <h3>memberships</h3>                                        
                                            <ul>
                                                <?php foreach( $hunting_memberships as $memberships ): ?>
                                                    <li><?php echo $memberships; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>                                          
                                        
                                    </div>  
                                    <?php if( get_field('cert_ae') == 'true' ): ?> 
                                        <p>We have a Certificate of Adequate Enclosure (CoAE)</p>
                                    <?php endif; ?>
                                </div>
                                <div class="listing-col-container buttons">
                                  <?php    if( (get_field('hunting_species') 
                                                || get_field('pigeons_and_doves') 
                                                || get_field('other_pigeons_and_doves') 
                                                || get_field('freshwater_river') 
                                                || get_field('other_freshwater_river')) 
                                             ): 
                                    ?>   
                                    <div class="dark-listing-col">
                                        <div class="col-button-holder"><a href="#species" class="dark-grey-col-button" ><p>species</p></a></div>
                                    </div> 
                                 <?php endif; ?>
                                    
                                    
                                    <?php if ( ! empty( $services ) || ! empty( $recreation ) || ! empty( $hunting_costs ) || ! empty( $wingshooting_costs ) || ! empty( $terrain_description ) || ! empty( $accommodation_offered ) || ! empty( $accommodation_description ) ) : ?> 
                                        <div class="dark-listing-col">
                                            <div class="col-button-holder"><a href="#listing-body" class="dark-grey-col-button" ><p>amenities</p></a></div>
                                        </div> 
                                    <?php endif; ?>
                                    
                                    <div class="dark-listing-col">
                                        <div class="col-button-holder"><a href="#" class="grey-col-button" ><p>CONTACT FARM</p></a></div>
                                    </div>                        
                                
                                </div>
                            </div> 

                                
                    </div>
        <?php }  ?> 
    <?php endforeach; ?>                
<?php endif; ?>                     
                    
<!-- WINGSHOOTING TAB 4 -->   

<?php $property_disciplines = get_field('property_disciplines'); ?>

<?php if( ( is_array( $property_disciplines) && in_array( 'Wingshooting', $property_disciplines ) ) or 'Wingshooting' == $property_disciplines ) { ?>                
             
                    <!-- DISPLAY WING IN TAB -->
                    <div id="tab4" class="discipline tab <?php echo $class ?>">
                             <div class="container listing-detail">
                                <div class="listing-col-container">
                                    <?php
                                    if( $wingshooting_terrain ): ?>
                                        <div class="dark-listing-col">
                                            <h3>WINGSHOOTING TERRAIN</h3>                                        
                                            <ul>
                                                <?php foreach( $wingshooting_terrain as $wing_terrain ): ?>
                                                    <li><?php echo $wing_terrain; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?>                      
                                                                        
                                        <?php
                                        if( $wingshooting_preference ): ?>
                                        <div class="dark-listing-col">
                                            <h3>WINGSHOOTING PREFERENCE</h3>                                        
                                            <ul>
                                                <?php foreach( $wingshooting_preference as $item ): ?>
                                                    <li><?php echo $item; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>  
                                        <?php endif; ?>                                        
                                                          
                                        <?php
                                        if( $wingshooting_memberships ): ?>
                                        <div class="dark-listing-col"> 
                                            <h3>Wingshooting Memberships</h3>                                        
                                            <ul>
                                                <?php foreach( $wingshooting_memberships as $item ): ?>
                                                    <li><?php echo $item; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            </div>
                                        <?php endif; ?>                                                                               
                                        
                                </div>
                                <div class="listing-col-container buttons">
                                    <div class="dark-listing-col">
                                        <div class="col-button-holder"><a href="#species" class="dark-grey-col-button" ><p>species</p></a></div>
                                    </div> 
                                    <div class="dark-listing-col">
                                        <div class="col-button-holder"><a href=".accommodation-container" class="dark-grey-col-button" ><p>amenities</p></a></div>
                                    </div> 
                                    <div class="dark-listing-col">
                                        <div class="col-button-holder"><a href="#" class="grey-col-button" ><p>CONTACT FARM</p></a></div>
                                    </div>                        
                                </div>
                            </div>
                    </div>
<?php }  ?>                       
 <!-- ANGLING TAB 5 --> 
                <?php if( ( is_array( $property_disciplines) && in_array( 'Angling', $property_disciplines ) ) or 'Angling' == $property_disciplines ) { ?>   
                    <!-- DISPLAY FISH IN TAB -->
                    <div id="tab5" class="discipline tab <?php echo $class ?>">
                             <div class="container listing-detail">
                                <div class="listing-col-container">
                                    <?php
                                    if( $angling_terrain ): ?>
                                        <div class="dark-listing-col">
                                            <h3>ANGLING TERRAIN</h3>                                        
                                            <ul>
                                                <?php foreach( $angling_terrain as $item ): ?>
                                                    <li><?php echo $item; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?>                      
                                                                        
                                        <?php
                                        if( $angling_style ): ?>
                                        <div class="dark-listing-col">
                                            <h3>ANGLING STYLES</h3>                                        
                                            <ul>
                                                <?php foreach( $angling_style as $item ): ?>
                                                    <li><?php echo $item; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>  
                                        <?php endif; ?>                                        
                                                                                                                                       
                                        
                                </div>
                                <div class="listing-col-container buttons">
                                    <div class="dark-listing-col">
                                        <div class="col-button-holder"><a href="#species" class="dark-grey-col-button" ><p>species</p></a></div>
                                    </div> 
                                    <div class="dark-listing-col">
                                        <div class="col-button-holder"><a href=".accommodation-container" class="dark-grey-col-button" ><p>amenities</p></a></div>
                                    </div> 
                                    <div class="dark-listing-col">
                                        <div class="col-button-holder"><a href="#" class="grey-col-button" ><p>CONTACT FARM</p></a></div>
                                    </div>                        
                                </div>
                            </div>
                    </div>       
                <?php }  ?>                      


                </div>
            </div>  
             <!-- end discipline data -->              
            
            
            
      
 <!--IMAGES -->               
            
<?php 
$images = get_field('property_image_gallery');
            $count = 0;
if( $images ): ?>
    <!-- LISTING IMAGES IN LIGHTBOX --> 
        <div class="listing-images container-fluid">
            <div class="container">
            <?php foreach( $images as $image ): 
                    $count++;
            ?>    
                
                <?php if($count == 1){ ?> 
    
                    <a href="<?php echo esc_url($image['url']); ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                        <div class="main-image">
                            <img class="" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                        </div>
                    </a>    
                    <div class="listing-thumbnail">
    
                <?php } else { ?>

                    <a href="<?php echo esc_url($image['url']); ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                        <div class="gallery-images">
                            <img class="" src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                        </div>
                    </a> 
                <?php  ;} ?>                  
                
                  
                    
               
        <?php endforeach; ?>                
                                              
                    
                </div>                
            </div>    
        </div>   
            
<?php endif; ?>                  
   <!-- end listing images in lightbox --> 
            
            
            
            
            
            
            
            
            
            <div id="listing-body" class="">
                <div id="listing-container" class="container ww-styling">
                   <?php if( get_field('property_description') ): the_field('property_description'); endif; ?>
                   
                </div>
                
                <?php if( get_field('terrain_description') ): ?>
                <div id="terrain-container" class="container">
                    <h3>Terrain DESCRIPTION</h3>
                    <div class="ww-styling">
                        
                            <?php the_field('terrain_description'); ?>
                                              
                    </div>
                </div> 
                <?php endif; ?>  
                
                                       
                    <?php
                         if( $accommodation_offered ): ?>
                        <div id="accommodation" class="accommodation-container container"> 
                            <h3>ACCOMMODATION OFFERED</h3>
                            <div class="accomodation-list">
                             <ul>
                                <?php foreach( $accommodation_offered as $accommodation ): ?>
                                   <li><?php echo $accommodation; ?></li>
                                 <?php endforeach; ?>
                               </ul>
                            </div>
                        </div>                    
                    <?php endif; ?>
                    
 
                    
                    <?php if( get_field('accommodation_description') ): ?> 
                       <div class="accommodation-container container"> 
                            <h3 class="accordion">ACCOMMODATION INFO <i class="fa fa-plus"></i><i class="fa fa-minus"></i></h3> 
                            <div class="panel ww-styling">
                                <?php the_field('accommodation_description'); ?>
                            </div> 
                        </div>
                    <?php endif; ?>
                                
              
            </div>
            
               
 <!-- AMENITIES -->  
    <!-- ACCORDION --> 
             

            <div id="amenities">
                             <div  class="container listing-detail">
                                <div class="listing-col-container">
                                        <?php if( $services ): ?>
                                        <div class="light-listing-col">
                                            <h3 class="accordion">SERVICES <i class="fa fa-plus"></i><i class="fa fa-minus"></i></h3>                                       
                                            <ul class="panel">
                                                <?php foreach( $services as $service ): ?>
                                                    <li><?php echo $service; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                    <?php    if( ($recreation ) ): ?>     <!-- THIS WILL NOT HIDE when empty --> 
                                        <div class="light-listing-col">
                                            <h3 class="accordion">RECREATION <i class="fa fa-plus"></i><i class="fa fa-minus"></i></h3>                                       
                                            <ul class="panel">
                                                <?php foreach( $recreation as $item ): ?>
                                                    <li><?php echo $item; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?> 

                                    <?php    if( ($hunting_costs || $hunting_costs_other) ): ?> <!-- THIS WILL NOT HIDE when empty --> 
                                    
                                
                                    <div class="light-listing-col">
                                       <h3 class="accordion">HUNTING<i class="fa fa-plus"></i><i class="fa fa-minus"></i></h3>
                                        <ul class="panel"> 
                                        <?php    if( have_rows('hunting_costs') ): ?>
                                            
                                            <?php  while ( have_rows('hunting_costs') ) : the_row(); 
                                                $hunting_day_fees                    = get_sub_field('hunting_day_fees');                                    
                                                $day_fees_price                      = get_sub_field('day_fees_price');
                                            ?>                                    
                                                <li><?php the_sub_field('hunting_day_fees') ?><span>
                     <!-- CURRENCY --> <?php if( get_field('currency') && get_sub_field('day_fees_price') && is_numeric($day_fees_price)): the_field('currency');  endif; ?>
                                                    <?php the_sub_field('day_fees_price') ?></span></li>
                                            <?php endwhile; ?> 
                                        <?php  else : // no rows found 
                                        endif; ?>  
                                        <?php    if( have_rows('hunting_costs_other') ): ?>
                                                    <?php  while ( have_rows('hunting_costs_other') ) : the_row(); 
                                                        $hunting_day_fees_other                    = get_sub_field('hunting_day_fees_other');
                                                        $day_fees_price_other                      = get_sub_field('day_fees_price_other');
                                                    ?>                                    
                                                        <li><?php the_sub_field('hunting_day_fees_other') ?><span>
                     <!-- CURRENCY -->                      <?php if( get_field('currency') 
                                                                && get_sub_field('day_fees_price_other') 
                                                                && is_numeric($day_fees_price_other)): 
                                                                the_field('currency');  
                                                            endif; ?>
                                                            <?php the_sub_field('day_fees_price_other') ?>
                                                            </span></li>
                                                    <?php endwhile; ?>                                            
                                        <?php  else : // no rows found 
                                        endif; ?>                                             
                                            
                                            
                                        </ul>                        
                                    </div>  
 
                                 <?php   endif; ?>  
                                    
                                    
                                 <?php    if( ($wingshooting_costs || $wingshooting_costs_other) ): ?>    
                                    <div class="light-listing-col">
                                       <h3 class="accordion">WINGSHOOTING<i class="fa fa-plus"></i><i class="fa fa-minus"></i></h3>
                                        <ul class="panel"> 
                                            <?php    if( have_rows('wingshooting_costs') ): ?>
                                            <?php  while ( have_rows('wingshooting_costs') ) : the_row(); 
                                                $wing_day_fees                    = get_sub_field('wing_day_fees');                                    
                                                $day_fees_price                      = get_sub_field('wing_day_price');
                                            ?>                                    
                                                <li><?php the_sub_field('wing_day_fees') ?><span>
                     <!-- CURRENCY -->                      <?php if( get_field('currency') 
                                                                && get_sub_field('wing_day_price') 
                                                                && is_numeric(get_sub_field('wing_day_price'))): 
                                                                the_field('currency');  
                                                            endif; ?>                                                    
                                                    
                                                    <?php the_sub_field('wing_day_price') ?></span></li>
                                            <?php endwhile; ?> 
                                            <?php  else : // no rows found
                                            endif; ?>  
                                <?php    if( have_rows('wingshooting_costs_other') ): ?>
                                            <?php  while ( have_rows('wingshooting_costs_other') ) : the_row(); 
                                                $wing_day_fees_other                    = get_sub_field('wing_day_fees_other');
                                                $day_fees_price_other                      = get_sub_field('wing_day_price_other');
                                            ?>                                    
                                                <li><?php the_sub_field('wing_day_fees_other') ?><span>
                     <!-- CURRENCY -->                      <?php if( get_field('currency') 
                                                                && get_sub_field('wing_day_price_other') 
                                                                && is_numeric(get_sub_field('wing_day_price_other'))): 
                                                                the_field('currency');  
                                                            endif; ?> 
                                                    <?php the_sub_field('wing_day_price_other') ?></span></li>
                                            <?php endwhile; ?>                                            
                                <?php  else : // no rows found
                                endif; ?>                                            
                                            
                                        </ul>                        
                                    </div>  
 
                                     
                                </div>

                            </div> 
                
                            <?php   endif; ?>  
                
                            <?php
                                    if( $payment_terms ): ?>
                            <div class="container listing-payment">
                                        
                                            <h3 class="accordion">Payment Options <i class="fa fa-plus"></i><i class="fa fa-minus"></i></h3> 
                                            <div class="panel">
                                                <ul>
                                                    <?php foreach( $payment_terms as $payment_term ): ?>
                                                        <li><?php echo $payment_term; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>    
                                        
<!--**** WE NEED TO CREATE AN ACTUAL FORM HERE FOR THE T&C TO LINK TO -->                                   
                                <!-- THE MODAL FOR T&C 
                                <div id="terms-conditions" class="col-button-holder">
                                    <a href="#terms-conditions" class="open-modal black-col-button" ><p>Terms AND Conditions</p></a>
                                </div>
                                
                                <div class="modal">
                                    <div class="modal-content">
                                        <h1>Terms and Conditions</h1>
                                        <div class="close"><p>X</p></div>
                                        <div class="modal-wording">
                                        <ul>
                                            <li>Right of Admission is Reserved.</li>
                                            <li>Weapons must go for a round at the shooting range, to ensure their working condition.</li>
                                            <li>Rifles to be calibrated on rifle shooting range before hunting.</li>
                                            <li>Silencers required on rifles</li>
                                            <li>No shotguns allowed</li>
                                            <li>No air rifles allowed</li>
                                            <li>No loaded firearms permitted within 200m of the lodge</li>
                                            <li>No loaded firearms permitted on vehicles.</li>
                                            <li>No littering anywhere on the property.</li>
                                            <li>No hunting along the fences.</li>
                                            <li>No hunter will be allowed into the veld without a guide.</li>
                                            <li>Full indemnity to be signed.</li>
                                            <li>Full indemnity to be signed prior to the commencement of your hunt.</li>
                                            <li>Any bribe offered to and reported by any of our guides will be doubled and added to the account of the offender.</li>
                                            <li>No liquor to be given to staff.</li>
                                            <li>Fire only permitted in the boma.</li>
                                            <li>No drugs or alcohol when taking part in the hunt</li>
                                            <li>No hunting from vehicles, unless approved by [Host].</li>
                                            <li>No hunting from vehicles.</li>
                                            <li>No motorbikes or quad bikes.</li>
                                            <li>No pets.</li>
                                            <li>No smoking inside lodge & bungalows.</li>
                                            <li>No smoking inside tents & buildings.</li>
                                            <li>No use of private vehicles on the farm.</li>
                                            <li>Hunting only allowed on weekdays</li>
                                            <li>All hunting must be done on foot.</li>
                                            <li>Bird hunting - shotguns only.</li>
                                            <li>No calibre smaller than .243.</li>
                                            <li>No game to be hunted with handguns.</li>                                            
                                        </ul>                                            
                                        </div>
                                    </div>
                                </div>
                                 end T&C modal -->
<!-- EXTRA CONTACT BUTTON
<div id="contact-farm" class="col-button-holder"><a href="#" class="grey-col-button" ><p>CONTACT FARM</p></a></div>
 -->
                            </div>  
                    <?php endif; ?>
            </div>

        <!-- end accrodion --> 
  <!-- end amenities -->           
 
   
            
            
            
            
            
</div>
        <!-- DISPLAY CALENDAR IN TAB -->
        <div id="tab2" class="tab">

            <div>  
                <p>CALENDAR</p>
            </div>
        </div>  

    </article>
</div>  <!-- end all tabs --> 

              <!-- DISPLAY SPECIES IN TABS --> 
           
 <?php    if( ('hunting_species' || 'pigeons_and_doves' || 'other_pigeons_and_doves' || 'freshwater_river' || 'other_freshwater_river') ): ?>              

             <div id="species" class="tabs inner-tabs-dark">
                <ul class="tab-links">
                    <?php    if( have_rows('hunting_species') ): ?>
                        <li class="active"><a href="#tab6">HUNT</a></li>
                    <?php endif; ?>
                    <?php    if( have_rows('pigeons_and_doves' || 'other_pigeons_and_doves' )): ?>
                        <li><a href="#tab7">WING</a></li>
                    <?php endif; ?>
                    <?php    if( have_rows('freshwater_river' || 'other_freshwater_river' )): ?>
                        <li><a href="#tab8">FISH</a></li>
                    <?php endif; ?>
                    
                    
                    
                </ul>

                <div class="tab-content">


                    
  <!--**** PLEASE SORT ALL SPECIES INTO ALPHABETICAL ORDER -->                    
              <?php    if( have_rows('hunting_species') ): 
                    ksort($hunting_species);
                    ?>
                <!-- DISPLAY HUNT IN TAB -->    
                    <div id="tab6" class="tab active">
                        <div class="container listing-detail">
                            <h1>Species</h1>
                                <div class="listing-col-container">
                                    <div class="animal-listing-col">
                                        <table>   
                                            <tr>
                                                <th>Species</th>
                                                <th>Gender</th>
                                                <th>Trophy</th>
                                                <th>Price</th>                                            
                                            </tr>                                   
                                            <?php  while ( have_rows('hunting_species') ) : the_row(); 
                                                $animal         = get_sub_field('animal');
                                                $gender         = get_sub_field('gender');
                                                $trophy         = get_sub_field('trophy');
                                                $animal_price   = get_sub_field('animal_price');
                                            ?>                                    
                                            <tr>
                                                <td><?php the_sub_field('animal') ?></td>
                                                <td><?php the_sub_field('gender') ?></td>
                                                <td><?php the_sub_field('trophy') ?></td>
                            <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                        && get_sub_field('animal_price') 
                                                        && is_numeric(get_sub_field('animal_price'))): 
                                                        the_field('currency');  
                                                    endif; ?> 
                                                    <?php the_sub_field('animal_price') ?>
                                                 </td>
                                              </tr> 
                                            <?php endwhile; ?>   

                                        </table>                        
                                    </div>                                            
                                </div>
                            </div> 
                    </div>
                    
                   <?php  else : // no rows found 
                   endif; ?>  
                    
                    
                    <!-- DISPLAY WING IN TAB -->
                    <div id="tab7" class="tab">
                        <div class="container listing-detail">
                            <h1>Birds</h1>
                                <div class="listing-col-container">
                                    <div class="animal-listing-col">
                                        
                                      <?php    if( have_rows('pigeons_and_doves') || 'other_pigeons_and_doves' ): 
                                            ?>                                        

                                                    <table>   
                                                        <tr>
                                                            <th>Pigeons and Doves</th>
                                                            <th>PRICE</th>                                            
                                                        </tr>                                   
                                                                <?php  while ( have_rows('pigeons_and_doves') ) : the_row(); 
                                                                    $animal         = get_sub_field('pigeon_and_dove_species');
                                                                    $animal_price   = get_sub_field('bird_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('pigeon_and_dove_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('bird_price') 
                                                                            && is_numeric(get_sub_field('bird_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('bird_price') ?>
                                                                     </td>                                                                   
                                                                </tr> 
                                                                    <?php endwhile; ?>  
                                                        
                                                                <?php  while ( have_rows('other_pigeons_and_doves') ) : the_row(); 
                                                                    $animal         = get_sub_field('other_pigeon_and_dove_species');
                                                                    $animal_price   = get_sub_field('bird_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('other_pigeon_and_dove_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('bird_price') 
                                                                            && is_numeric(get_sub_field('bird_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('bird_price') ?>
                                                                     </td>
                                                                </tr> 
                                                                    <?php endwhile; ?>                                                         

                                                                </table>  

                                           <?php  else : // no rows found 
                                           endif; ?>                                          
                                    </div>  
                                    <div class="animal-listing-col">
                                    
                                        
                                      <?php    if( have_rows('upland_birds') || 'other_upland_birds' ): 
                                            ?>                                        

                                                    <table>   
                                                        <tr>
                                                            <th>Upland birds</th>
                                                            <th>PRICE</th>                                            
                                                        </tr>                                   
                                                                <?php  while ( have_rows('upland_birds') ) : the_row(); 
                                                                    $animal         = get_sub_field('uploand_bird_species');
                                                                    $animal_price   = get_sub_field('bird_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('uploand_bird_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('bird_price') 
                                                                            && is_numeric(get_sub_field('bird_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('bird_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>  
                                                        
                                                                <?php  while ( have_rows('other_upland_birds') ) : the_row(); 
                                                                    $animal         = get_sub_field('other_upland_species');
                                                                    $animal_price   = get_sub_field('bird_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('other_upland_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('bird_price') 
                                                                            && is_numeric(get_sub_field('bird_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('bird_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>                                                         

                                                                </table>  

                                           <?php  else : // no rows found 
                                           endif; ?>                                          
                                    </div> 
                                    <div class="animal-listing-col">
                                      <?php    if( have_rows('waterfowl') || 'other_waterfowl' ): 
                                            ?>                                        

                                                    <table>   
                                                        <tr>
                                                            <th>Waterfowl</th>
                                                            <th>PRICE</th>                                            
                                                        </tr>                                   
                                                                <?php  while ( have_rows('waterfowl') ) : the_row(); 
                                                                    $animal         = get_sub_field('waterfowl_species');
                                                                    $animal_price   = get_sub_field('bird_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('waterfowl_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('bird_price') 
                                                                            && is_numeric(get_sub_field('bird_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('bird_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>  
                                                        
                                                                <?php  while ( have_rows('other_waterfowl') ) : the_row(); 
                                                                    $animal         = get_sub_field('other_waterfowl_species');
                                                                    $animal_price   = get_sub_field('bird_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('other_waterfowl_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('bird_price') 
                                                                            && is_numeric(get_sub_field('bird_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('bird_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>                                                         
                                                                </table>  
                                           <?php  else : // no rows found 
                                           endif; ?>                                          
                                    </div>                                    
                                </div>
                            </div>
                    </div>
                    <!-- DISPLAY FISH IN TAB -->
                    <div id="tab8" class="tab">
                        <div class="container listing-detail">
                            <h1>Fish</h1>
                                    <div class="animal-listing-col">
                                      <?php    if( have_rows('freshwater_river') || 'other_freshwater_river' ): 
                                            ?>                                        
                                                    <table>   
                                                        <tr>
                                                            <th>Freshwater River</th>
                                                            <th>PRICE</th>                                            
                                                        </tr>                                   
                                                                <?php  while ( have_rows('freshwater_river') ) : the_row(); 
                                                                    $animal         = get_sub_field('freshwater_river_species');
                                                                    $animal_price   = get_sub_field('fish_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('freshwater_river_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('fish_price') 
                                                                            && is_numeric(get_sub_field('fish_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('fish_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>  
                                                        
                                                                <?php  while ( have_rows('other_freshwater_river') ) : the_row(); 
                                                                    $animal         = get_sub_field('other_freshwater_river_species');
                                                                    $animal_price   = get_sub_field('fish_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('other_freshwater_river_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('fish_price') 
                                                                            && is_numeric(get_sub_field('fish_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('fish_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>                                                         
                                                                </table>  
                                           <?php  else : // no rows found 
                                           endif; ?>                                          
                                    </div> 
                                    <div class="animal-listing-col">
                                      <?php    if( have_rows('freshwater_dam') || 'other_freshwater_dam' ): 
                                            ?>                                        
                                                    <table>   
                                                        <tr>
                                                            <th>freshwater Dam/Reservoir</th>
                                                            <th>PRICE</th>                                            
                                                        </tr>                                   
                                                                <?php  while ( have_rows('freshwater_dam') ) : the_row(); 
                                                                    $animal         = get_sub_field('freshwater_dam_species');
                                                                    $animal_price   = get_sub_field('fish_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('freshwater_dam_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('fish_price') 
                                                                            && is_numeric(get_sub_field('fish_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('fish_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>  
                                                        
                                                                <?php  while ( have_rows('other_freshwater_dam') ) : the_row(); 
                                                                    $animal         = get_sub_field('other_freshwater_dam_species');
                                                                    $animal_price   = get_sub_field('fish_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('other_freshwater_dam_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('fish_price') 
                                                                            && is_numeric(get_sub_field('fish_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('fish_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>                                                         
                                                                </table>  
                                           <?php  else : // no rows found 
                                           endif; ?>                                          
                                    </div>
                                    <div class="animal-listing-col">
                                      <?php    if( have_rows('saltwater_estuary') || 'other_saltwater_estuary' ): 
                                            ?>                                        
                                                    <table>   
                                                        <tr>
                                                            <th>freshwater Dam/Reservoir</th>
                                                            <th>PRICE</th>                                            
                                                        </tr>                                   
                                                                <?php  while ( have_rows('saltwater_estuary') ) : the_row(); 
                                                                    $animal         = get_sub_field('saltwater_estuary_species');
                                                                    $animal_price   = get_sub_field('fish_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('saltwater_estuary_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('fish_price') 
                                                                            && is_numeric(get_sub_field('fish_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('fish_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>  
                                                        
                                                                <?php  while ( have_rows('other_saltwater_estuary') ) : the_row(); 
                                                                    $animal         = get_sub_field('other_saltwater_estuary_species');
                                                                    $animal_price   = get_sub_field('fish_price');
                                                                ?>                                    
                                                               <tr>
                                                                    <td><?php the_sub_field('other_saltwater_estuary_species') ?></td>
                                                <!-- CURRENCY -->   <td><?php if( get_field('currency') 
                                                                            && get_sub_field('fish_price') 
                                                                            && is_numeric(get_sub_field('fish_price'))): 
                                                                            the_field('currency');  
                                                                        endif; ?> 
                                                                        <?php the_sub_field('fish_price') ?>
                                                                     </td>                                                                </tr> 
                                                                    <?php endwhile; ?>                                                         
                                                                </table>  
                                           <?php  else : // no rows found 
                                           endif; ?>                                          
                                    </div>                            
                        </div>
                    </div>        


                </div>
            </div>  
<?php endif; ?>
             <!-- end species in tabs --> 
  
    
<script>
    jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e) {
    var currentAttrValue = jQuery(this).attr('href');
     
    jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
     
    jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
     
    e.preventDefault();
    });
    });
</script>



<?php endif; // end if user logged in ?>






<?php

get_footer();
