// OPEN T&C MODAL ON CLICK
(function($){

    $(document).ready(function(){

      $(".open-modal").click(function(){
        $(".modal").show();
      $(".close").on("click", function() {
        $(".modal").hide();
      });  


      });
    });

})(jQuery);




// CLOSE FRONT PAGE MODAL ON LOAD
(function($){

    $(document).ready(function(){

      $(".open-modal").ready(function(){

            jQuery(document).ready(function() {
                setTimeout(function() {
                 $(".modal-front-page").show();
                }, 2000);
            });      

      $(".close-modal-front-page").on("click", function() {
        $(".modal-front-page").hide();
      });  


      });
    });

})(jQuery);


// REMOVE NON BREAKING SPACE.
(function($){

$('.corrected').each(function(){
    var string = $(this).html();
    string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
    $(this).html(string);
});

})(jQuery);






// READ MORE

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "READ MORE"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "READ LESS"; 
    moreText.style.display = "inline";
  }
}



// CLOSE FRONT PAGE MODAL ON LOAD
function myFunction() {

const numCols = 3;
const colHeights = Array(numCols).fill(0);
const container = document.getElementById('masonry-with-columns');
Array.from(container.children).forEach((child, i) => {
  const order = i % numCols;
  child.style.order = order;
  colHeights[order] += parseFloat(child.clientHeight);
})
container.style.height = Math.max(...colHeights) + 'px';

}


// READ MORE

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "READ MORE"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "READ LESS"; 
    moreText.style.display = "inline";
  }
}



jQuery(document).ready(function($) {


  jQuery( '#create-property' ).click( function( event ) {

    var propertyData = {
      'action': 'comehunting_create_property',
      'property_name': jQuery( '#property_name' ).val(),
      'property_subtitle': jQuery( '#property_subtitle' ).val(),
      'nearest_town': jQuery( '#nearest_town' ).val(),
      'hunting_area': jQuery( '#hunting_area' ).val(),
      'property_desc': jQuery( '#property_desc' ).val(),
      'address_coordinates': jQuery( '#address_coordinates' ).val()
    };
    

    jQuery.post( ajaxurl, propertyData, function( response ) {
      
      jQuery( '#create-property' ).html( 'Done' );
      jQuery( '#property_name' ).val( '' );
      jQuery( '#property_subtitle' ).val( '' );
      jQuery( '#nearest_town' ).val( '' );
      jQuery( '#hunting_area' ).val( '' );
      jQuery( '#property_desc' ).val('');
      jQuery( '#address_coordinates' ).val('');

      setTimeout(function(){
        jQuery( '#create-property' ).html( 'Create' );
       jQuery.fancybox.close();
      }, 2000);

    });

    return false;
    
  });

  if ( jQuery( 'body' ).hasClass('registration') ) {

    var userType = gup( 'type' );

    if ( userType ) {

      if ( userType.length > 0 ) {

        jQuery( 'body' ).find( '.field_type_membertype' ).hide();

          if ( userType == 'pm' ) {
            jQuery( '#option_property-manager' ).attr( 'checked', true );
          }

          if ( userType == 'guest' ) {
            jQuery( '#option_guest-user' ).attr( 'checked', true );
          }

      }

    }

  }

  jQuery('label[for="acf-_post_title"]').html( 'Property Title <span class="acf-required">*</span>' );

  //Change profile fields required message for guest users

  var buddypressContainer = jQuery( '#buddypress' );

  if ( buddypressContainer.length > 0 && buddypressContainer.hasClass('guest-user') ) {

    var errorMsgContainer =  buddypressContainer.find('.bp-template-notice.error');

    if ( errorMsgContainer.length > 0 ) {

      var errorMsg = errorMsgContainer.find('p').text();

      if ( errorMsg == 'Please fill all required profile fields.' ) {
        errorMsgContainer.find('p').text('Please complete profile.');
      }

    }

  }

  // Select map search type

  jQuery( '#map_search_type' ).change( function(event) {
      
      var selectedVal = jQuery( this ).val();
      // var optionClass = '.search-property-input-wrap';

      // if ( selectedVal != '' ) {
      //   optionClass = '.search-property-input-wrap';
      // } else if ( selectedVal == 'distance' ) {
      //   optionClass = '.search-radius-wrap';
      // } else if ( selectedVal == 'species' ) {
      //   optionClass = '.search-species-wrap';
      // }

      // jQuery('.search-options').hide();
      // jQuery( optionClass ).show();

      jQuery('.search-options').hide();

      if ( selectedVal != '' && selectedVal != 'species' ) {
        jQuery('.search-property-input-wrap').show();
      }  else {
        jQuery('.search-property-input-wrap').hide();
      }

      if ( selectedVal == 'distance' ) {
        jQuery('.search-radius-wrap').show();
      } else {
        jQuery('.search-radius-wrap').hide();
      }

      if ( selectedVal == 'species' ) {
        jQuery('.search-species-wrap').show();
      } else {
        jQuery('.search-species-wrap').hide();
      }

  });

  // Show profile edit save button when form is being edited
  jQuery( '#profile-edit-form' ).on( 'keyup change paste', 'input, select, textarea', function() {
      
      jQuery( '#profile-edit-form' ).find( '.submit' ).fadeIn();

  });

  jQuery( 'body' ).on( 'keyup change paste', '#new-property input, #new-property select, #new-property textarea', function() {
      
      jQuery('body').find( '#new-property' ).find( '.acf-form-submit' ).fadeIn();

      if ( jQuery('body').find( '#new-property' ).find('.acf-form-submit').find('input').val() == 'Saved' ) {
        jQuery('body').find( '#new-property' ).find('.acf-form-submit').find('input').val( 'Save Changes' );
      }

  });

  jQuery( '.delete-property' ).click( function( event ) {
    
    if ( window.confirm("Do you really want to delete this property?") ) {

      var clickedProperty = jQuery( this ).closest( '.col-md-6' );
      var propertyID = jQuery( this ).attr( 'property' );

      if ( propertyID ) {

        var propertyData = {
          'action': 'comehunting_profile_delete_property',
          'property_id': propertyID,
        };

        jQuery( this ).html( 'Deleting...' );   

        jQuery.post( ajaxurl, propertyData, function( response ) {

          clickedProperty.remove();

        });

      }

    }

  });

  jQuery( '.incomplete-close' ).click(function(event) {
      
      jQuery( this ).closest( '.tab-incomplete-notice' ).remove();

      return false;

  });

  jQuery('#search_species').select2();

  if ( jQuery( 'body' ).find( '#edit-personal-li') ) {

    var editProfileTab = jQuery( 'body' ).find( '#edit-personal-li' );
    var editProfileLink = editProfileTab.find( 'a').attr( 'href' );

    //console.log( editProfileTab );

    if ( editProfileLink ) {
      editProfileLink = editProfileLink + '/group/3';
      editProfileTab.find('a').attr('href', editProfileLink );
    }

  }

  var addressField = jQuery( 'div[data-name="property_address"]' );

    if ( !addressField.hasClass('acf-hidden') ) {
      jQuery( 'div[data-name="address_coordinates"]').addClass('acf-hidden');
    } else {
      jQuery( 'div[data-name="address_coordinates"]').removeClass('acf-hidden');
    }

  jQuery( 'div[data-name="only_has_coordinates_of_the_property"]' ).find( '.acf-switch' ).click(function(event) {
    
    var addressField = jQuery( 'div[data-name="property_address"]' );

    if ( addressField.hasClass('acf-hidden') ) {
      jQuery( 'div[data-name="address_coordinates"]').addClass('acf-hidden');
    } else {
      jQuery( 'div[data-name="address_coordinates"]').removeClass('acf-hidden');
    }

  });

  jQuery( 'div[data-name="address_coordinates"]' ).find( 'input' ).keypress( function( event ) {

    CheckNumeric( event );

  });



});

function CheckNumeric(e) {
    if (window.event) // IE

    {
        if ((e.keyCode < 48 || e.keyCode > 57) & e.keyCode != 8 && e.keyCode != 44 && e.keyCode != 46 ) {
            event.returnValue = false;
            return false;
        }
    }
    else { // Fire Fox
        if ((e.which < 48 || e.which > 57) & e.which != 8 && e.which != 44 && e.which != 46 ) {
            e.preventDefault();
            return false;
        }
    }
}

function gup( name, url ) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( url );
    return results == null ? null : results[1];
}


// Guest User Color Profile Logic

if ( jQuery( 'body' ).hasClass('profile-edit') ) {

  var bowHuntingMethodSelect = jQuery( 'body.profile-edit' ).find( 'input[name="field_32"]' );
  var bowPreferredHuntingMethod = '';

  var rifleHuntingMethodSelect = jQuery( 'body.profile-edit' ).find( 'input[name="field_179"]' );
  var riflePreferredHuntingMethod = '';

  var handgunHuntingMethodSelect = jQuery( 'body.profile-edit' ).find( 'input[name="field_187"]' );
  var handgunPreferredHuntingMethod = '';

  var muzzleloaderHuntingMethodSelect = jQuery( 'body.profile-edit' ).find( 'input[name="field_193"]' );
  var muzzleloaderPreferredHuntingMethod = '';

  var selectedDisciplines = jQuery('.field_disciplines input:checkbox:checked').map(function() {
      return this.value;
  }).get();

  var preferredWepons = jQuery( 'input[name="field_12"]' ).val();

  jQuery( 'input[name="field_12"]' ).change(function(event) {
    
    preferredWepons = jQuery( this ).val();

  });

  var disciplineCategoryColor = '';

  jQuery('.field_disciplines input:checkbox').change( function( event ) {
    
      selectedDisciplines = jQuery('.field_disciplines input:checkbox:checked').map(function() {
          return this.value;
      }).get();

      if ( selectedDisciplines.length == 1 ) {

        if ( selectedDisciplines[0] == 'Angling' ) {
          disciplineCategoryColor = 'Gray';
        }

        if ( selectedDisciplines[0] == 'Wingshooting' ) {
          disciplineCategoryColor = 'White';
        }

      }

      if ( selectedDisciplines.length == 2 && ! selectedDisciplines.includes( 'Hunting' ) ) {
        disciplineCategoryColor = 'White';
      }

       jQuery( 'input[name="acf[field_5dc040ebd0cb0]"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );

  });

  if ( bowHuntingMethodSelect.length > 0 ) {
    
    bowHuntingMethodSelect.change( function( event ) {
      
      bowPreferredHuntingMethod = jQuery( this ).val();

      if ( selectedDisciplines.includes( 'Hunting' ) && preferredWepons == 'Bow' ) {

        if ( bowPreferredHuntingMethod == 'Ambush' ) {
          disciplineCategoryColor = 'Green';
        }

        if ( bowPreferredHuntingMethod == 'Blind at water/feed area' ) {
          disciplineCategoryColor = 'Blue';
        }

        if ( bowPreferredHuntingMethod == 'Game Farm' ) {
          disciplineCategoryColor = 'Black';
        }

        if ( bowPreferredHuntingMethod == 'Walk and Stalk' ) {
          disciplineCategoryColor = 'Green';
        }

      }

      if ( disciplineCategoryColor.length > 0 ) {
        jQuery( 'input[name="field_131"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );
      }

    });

  }


  rifleHuntingMethodSelect.change( function( event ) {
    
    riflePreferredHuntingMethod = jQuery( this ).val();

    if ( selectedDisciplines.includes( 'Hunting' ) && preferredWepons == 'Center Fire Rifle' ) {

      if ( riflePreferredHuntingMethod == 'Blind at Water/Feed Area' ) {
        disciplineCategoryColor = 'Orange';
      }

      if ( riflePreferredHuntingMethod == 'Driven/High Seat/Voorsit' ) {
        disciplineCategoryColor = 'Blue';
      }

      if ( riflePreferredHuntingMethod == 'Game Farm' ) {
        disciplineCategoryColor = 'Black';
      }

      if ( riflePreferredHuntingMethod == 'Shoot from LDV' || riflePreferredHuntingMethod == 'Put and Take' ) {
        disciplineCategoryColor = 'Red';
      }

      if ( riflePreferredHuntingMethod == 'Walk and Stalk' ) {
        disciplineCategoryColor = 'Green';
      }

    }

    if ( disciplineCategoryColor.length > 0 ) {
      jQuery( 'input[name="field_131"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );
    }

  });


  handgunHuntingMethodSelect.change( function( event ) {
    
    handgunPreferredHuntingMethod = jQuery( this ).val();

    if ( selectedDisciplines.includes( 'Hunting' ) && preferredWepons == 'Handgun' ) {

      if ( handgunPreferredHuntingMethod == 'Ambush' ) {
        disciplineCategoryColor = 'Blue';
      }

      if ( handgunPreferredHuntingMethod == 'Blind at water/feed area' ) {
        disciplineCategoryColor = 'Orange';
      }

      if ( handgunPreferredHuntingMethod == 'Game Farm' ) {
        disciplineCategoryColor = 'Black';
      }

      if ( handgunPreferredHuntingMethod == 'Walk and Stalk' ) {
        disciplineCategoryColor = 'Green';
      }

    }

    if ( disciplineCategoryColor.length > 0 ) {
      jQuery( 'input[name="field_131"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );
    }

  });


  muzzleloaderHuntingMethodSelect.change( function( event ) {
    
    muzzleloaderPreferredHuntingMethod = jQuery( this ).val();

    if ( selectedDisciplines.includes( 'Hunting' ) && preferredWepons == 'Muzzleloader' ) {

      if ( muzzleloaderPreferredHuntingMethod == 'Blind at Water/Feed Area' ) {
        disciplineCategoryColor = 'Orange';
      }

      if ( muzzleloaderPreferredHuntingMethod == 'Driven/High Seat/Voorsit' ) {
        disciplineCategoryColor = 'Blue';
      }

      if ( muzzleloaderPreferredHuntingMethod == 'Game Farm' ) {
        disciplineCategoryColor = 'Black';
      }

      if ( muzzleloaderPreferredHuntingMethod == 'Walk and Stalk' ) {
        disciplineCategoryColor = 'Green';
      }

    }

    if ( disciplineCategoryColor.length > 0 ) {
      jQuery( 'input[name="field_131"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );
    }

  });

}



// Property Color Profile Logic

if ( jQuery( 'body' ).hasClass('page-add-new-property') ) {

  var bowHuntingMethodSelect = jQuery( 'body' ).find( 'input[name="acf[field_5db0f45f09bc6]"]' );
  var bowPreferredHuntingMethod = '';

  var rifleHuntingMethodSelect = jQuery( 'body' ).find( 'input[name="acf[field_5db0f52b41623]"]' );
  var riflePreferredHuntingMethod = '';

  var handgunHuntingMethodSelect = jQuery( 'body' ).find( 'input[name="acf[field_5db0f5e7b3160]"]' );
  var handgunPreferredHuntingMethod = '';

  var muzzleloaderHuntingMethodSelect = jQuery( 'body' ).find( 'input[name="acf[field_5db0f63e846d0]"]' );
  var muzzleloaderPreferredHuntingMethod = '';

  var selectedDisciplines = jQuery('.acf-field-5dae1679dc320 input:checkbox:checked').map(function() {
      return this.value;
  }).get();

  var preferredWepons = jQuery( 'input[name="acf[field_5db0f198dfe20]"]' ).val();

  jQuery( 'input[name="acf[field_5db0f198dfe20]"]' ).change(function(event) {
    
    preferredWepons = jQuery( this ).val();

  });

  var disciplineCategoryColor = '';

  jQuery('.acf-field-5dae1679dc320 input:checkbox').change( function( event ) {
    
      selectedDisciplines = jQuery('.acf-field-5dae1679dc320 input:checkbox:checked').map(function() {
          return this.value;
      }).get();

      if ( selectedDisciplines.length == 1 ) {

        if ( selectedDisciplines[0] == 'Angling' ) {
          disciplineCategoryColor = 'Gray';
        }

        if ( selectedDisciplines[0] == 'Wingshooting' ) {
          disciplineCategoryColor = 'White';
        }

      }

      if ( selectedDisciplines.length == 2 && ! selectedDisciplines.includes( 'Hunting' ) ) {
        disciplineCategoryColor = 'White';
      }

       jQuery( 'input[name="acf[field_5dc040ebd0cb0]"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );

  });

  if ( bowHuntingMethodSelect.length > 0 ) {
    
    bowHuntingMethodSelect.change( function( event ) {
      
      bowPreferredHuntingMethod = jQuery( this ).val();

      if ( selectedDisciplines.includes( 'Hunting' ) && preferredWepons == 'Bow' ) {

        if ( bowPreferredHuntingMethod == 'Ambush' || bowPreferredHuntingMethod == 'Walk and Stalk' ) {
          disciplineCategoryColor = 'Green';
        }

        if ( bowPreferredHuntingMethod == 'Blind at Water/Feed Area' ) {
          disciplineCategoryColor = 'Blue';
        }

        if ( bowPreferredHuntingMethod == 'Game Farm' ) {
          disciplineCategoryColor = 'Black';
        }

      }

      if ( disciplineCategoryColor.length > 0 ) {
        jQuery( 'input[name="acf[field_5dc040ebd0cb0]"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );
      }

    });

  }


  rifleHuntingMethodSelect.change( function( event ) {
    
    riflePreferredHuntingMethod = jQuery( this ).val();

    if ( selectedDisciplines.includes( 'Hunting' ) && preferredWepons == 'Rifle' ) {

      if ( riflePreferredHuntingMethod == 'Blind at Water/Feed Area' ) {
        disciplineCategoryColor = 'Orange';
      }

      if ( riflePreferredHuntingMethod == 'Driven/High Seat/Voorsit' ) {
        disciplineCategoryColor = 'Blue';
      }

      if ( riflePreferredHuntingMethod == 'Game Farm' ) {
        disciplineCategoryColor = 'Black';
      }

      if ( riflePreferredHuntingMethod == 'Shoot from LDV' || riflePreferredHuntingMethod == 'Put and Take' ) {
        disciplineCategoryColor = 'Red';
      }

      if ( riflePreferredHuntingMethod == 'Walk and Stalk' ) {
        disciplineCategoryColor = 'Green';
      }

    }

    if ( disciplineCategoryColor.length > 0 ) {
      jQuery( 'input[name="acf[field_5dc040ebd0cb0]"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );
    }

  });


  handgunHuntingMethodSelect.change( function( event ) {
    
    handgunPreferredHuntingMethod = jQuery( this ).val();

    if ( selectedDisciplines.includes( 'Hunting' ) && preferredWepons == 'Handgun' ) {

      if ( handgunPreferredHuntingMethod == 'Ambush' ) {
        disciplineCategoryColor = 'Blue';
      }

      if ( handgunPreferredHuntingMethod == 'Blind at Water/Feed Area' ) {
        disciplineCategoryColor = 'Orange';
      }

      if ( handgunPreferredHuntingMethod == 'Game Farm' ) {
        disciplineCategoryColor = 'Black';
      }

      if ( handgunPreferredHuntingMethod == 'Walk and Stalk' ) {
        disciplineCategoryColor = 'Green';
      }

    }

    if ( disciplineCategoryColor.length > 0 ) {
      jQuery( 'input[name="acf[field_5dc040ebd0cb0]"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );
    }

  });


  muzzleloaderHuntingMethodSelect.change( function( event ) {
    
    muzzleloaderPreferredHuntingMethod = jQuery( this ).val();

    if ( selectedDisciplines.includes( 'Hunting' ) && preferredWepons == 'Muzzleloader' ) {

      if ( muzzleloaderPreferredHuntingMethod == 'Blind at Water/Feed Area' ) {
        disciplineCategoryColor = 'Orange';
      }

      if ( muzzleloaderPreferredHuntingMethod == 'Driven/High Seat/Voorsit' ) {
        disciplineCategoryColor = 'Blue';
      }

      if ( muzzleloaderPreferredHuntingMethod == 'Game Farm' ) {
        disciplineCategoryColor = 'Black';
      }

      if ( muzzleloaderPreferredHuntingMethod == 'Walk and Stalk' ) {
        disciplineCategoryColor = 'Green';
      }

    }

    if ( disciplineCategoryColor.length > 0 ) {
      jQuery( 'input[name="acf[field_5dc040ebd0cb0]"][value="' + disciplineCategoryColor + '"]' ).attr( 'checked', true );
    }

  });

}
