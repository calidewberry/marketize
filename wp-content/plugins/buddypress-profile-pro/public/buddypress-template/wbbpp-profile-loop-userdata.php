<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( bp_current_component( 'members' ) ) {
	$user_id = bp_displayed_user_id();
} else {
	$user_id = get_current_user_id();
}
$bprm_rs_data = array();
$bprm_rs_data = get_user_meta( $user_id, 'wbbpp_userdata', true );

if ( is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) ) ) {
	$wbbpp_profile_fields_settings = get_site_option( 'wbbpp_profile_fields_settings' );
} else {
	$wbbpp_profile_fields_settings = get_option( 'wbbpp_profile_fields_settings' );
}
if ( is_array( $wbbpp_profile_fields_settings ) ) {
	foreach ( $wbbpp_profile_fields_settings as $key => $value ) {
		unset( $wbbpp_profile_fields_settings[ $key ]['bprm_identifier'] );
	}
}

$profile_content = '';
if ( is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) ) ) {
	$grp_args = get_site_option( 'wbbpp_profile_groups_settings' );
} else {
	$grp_args = get_option( 'wbbpp_profile_groups_settings' );
}
//$grp_args = bprm_existing_resume_groups();

$user_meta = get_userdata($user_id);
$user_role = $user_meta->roles;

$mem_type = bp_get_member_type( $user_id );
if( !is_array( $mem_type ) ){
	$mem_type = (array) $mem_type;
}

if ( ! empty( $grp_args ) && is_array( $grp_args ) && ! empty( $bprm_rs_data ) && is_array( $bprm_rs_data ) ) {
	foreach ( $grp_args as $group_index => $group_info ) {

		if(isset($group_info['profile_display'])){

		$display_group = false;	
		if( isset( $group_info['grp_avail'] ) ){
			$grp_avail = $group_info['grp_avail'];
			if( $grp_avail == 'user_roles' ){
				$roles = ( isset( $group_info['roles'] ) )?$group_info['roles']:'all';
				if( is_array( $roles ) ){
					$roles_result = array_intersect( $roles, $user_role );
					if( !empty( $roles_result ) || in_array( 'all', $roles ) ){
						$display_group = true;
					}
				}elseif( $roles == 'all' ){
					$display_group = true;
				}

			}elseif( $grp_avail == 'mem_type' ){
				$mtypes = ( isset( $group_info['mtypes'] ) )?$group_info['mtypes']:'all';
				if( is_array( $mtypes ) ){
					$mtypes_result = array_intersect( $mtypes, $mem_type );
					if( !empty( $mtypes_result ) || in_array( 'all', $mtypes ) ){
						$display_group = true;
					}
				}elseif( $mtypes == 'all' ){
					$display_group = true;
				}
			}
		}else{
			$display_group = true;
		}

		if( $display_group ) {

		$field_info_html = '';

		$group_title = '';

		if ( isset( $wbbpp_profile_fields_settings[ $group_index ] ) ) {

			$resume_backend_fields = $wbbpp_profile_fields_settings[ $group_index ];

			if ( isset( $bprm_rs_data[ $group_index ] ) ) {

				$group_title = "<h2><div class='hr-title hr-full hr-double'><abbr>" . $group_info['g_name'] . '</abbr></div></h2>';

				$resume_user_data_array = $bprm_rs_data[ $group_index ];
				$c = 0;
				foreach ( $resume_user_data_array as $resume_user_data ) {
					if($c%2==0){
						$tr_class='even';
					}else{
						$tr_class='odd';
					}
					foreach ( $resume_user_data as $key => $value_to_render ) {
						$field_name = $key;
						if ( ! empty( $value_to_render ) ) {
							if ( isset( $resume_backend_fields[ $key ] ) ) {

								$field_info = $resume_backend_fields[ $key ];

								if ( isset( $field_info['display'] ) ) {

									$field_visibility = wbbpp_get_field_visibility_level( $key );
									if( $field_visibility ) {

										$field_info_html .= "<tr class='set-".$tr_class."'><td class='label field-title " . $key . "'>" . $field_info['field_tile'] . '</td>';

										$field_info_html .= bprm_profile_render_field_type_html_for_resume( $field_info['field_type']['type'], $value_to_render, $field_name ) . '</tr>';

										if ( $group_index == 'bprm_grp_others' ) {

											$section_title = '';
											if ( isset( $field_info['section_title'] ) ) {
												$section_title = $field_info['section_title'];
											}

											$section_icon = '';
											if ( isset( $field_info['section_icon'] ) ) {
												$section_icon = $field_info['section_icon'];
											}

											$group_title = "<h2>" . $section_title . '</h2>';

											$profile_content .= '<div class="bp-widget '.$group_index.'">
																'.$group_title.'
																<table class="profile-fields bprm-profile-fields">
																	'.$field_info_html.'
																</table>
									 							</div>';

											$field_info_html = '';
										}
									} // end field visibility condition check
								}
							}
						}
					}
					$c++;
				}
			} //end condition check for isset $wbbpp_profile_fields_settings[$group_index]
		} // end condition check for isset $bprm_rs_data[$group_index]

		if ( $group_index == 'bprm_grp_others' ) {
			continue;
		}

		if ( $group_info['g_area'] == 'bprm_sidebar' || $group_info['g_area'] == 'bprm_content' ) {
			if( $field_info_html ){
				$profile_content .= '<div class="bp-widget '.$group_index.'">
									'.$group_title.'
									<table class="profile-fields bprm-profile-fields">
									'.$field_info_html.'
									</table>
								 </div>';
			} 
			
		} else {

		}

	} //end condition check of $display_group according to user roles or group.
		} //end check conndition profile display
	}
	echo $profile_content;
}
?>
