<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.wbcomdesigns.com
 * @since      1.0.0
 *
 * @package    Buddypress_Profile_Pro
 * @subpackage Buddypress_Profile_Pro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Buddypress_Profile_Pro
 * @subpackage Buddypress_Profile_Pro/admin
 * @author     wbcomdesigns <admin@wbcomdesigns.com>
 */
class Buddypress_Profile_Pro_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		global $wp_styles;
		$srcs = array_map( 'basename', (array) wp_list_pluck( $wp_styles->registered, 'src' ) );

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Buddypress_Profile_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Buddypress_Profile_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( in_array( 'font-awesome.css', $srcs, true ) || in_array( 'font-awesome.min.css', $srcs, true ) ) {
			/* echo 'font-awesome.css registered'; */
		} else {
			wp_enqueue_style( 'wbbpp-font-awesome-admin', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), $this->version, 'all' );
		}

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/buddypress-profile-pro-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Buddypress_Profile_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Buddypress_Profile_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/buddypress-profile-pro-admin.js', array( 'jquery' ), $this->version, false );

		wp_localize_script(
			$this->plugin_name, 'bprm_admin_ajax_object', array(
				'ajax_url'   => admin_url( 'admin-ajax.php' ),
				'ajax_nonce' => wp_create_nonce( 'bprm_admin_ajax_security' ),
			)
		);

		if ( ! wp_script_is( 'jquery-ui-sortable', 'enqueued' ) ) {
			wp_enqueue_script( 'jquery-ui-sortable' );
		}

	}

	/**
	 * Function to add bp resume manager settings page in admin menu.
	 *
	 * @since    1.0.0
	 */
	public function bprm_add_menu_buddypress_profile_pro() {

		if ( empty ( $GLOBALS['admin_page_hooks']['wbcomplugins'] ) ) {
			// add_menu_page( esc_html__( 'WBCOM', 'buddypress-profile-pro' ), __( 'WBCOM', 'buddypress-profile-pro' ), 'manage_options', 'wbcomplugins', array( $this, 'wbbpp_profile_pro_settings_page' ), WBBPP_PLUGIN_URL . 'admin/wbcom/assets/imgs/bulb.png', 59 );

			add_menu_page( esc_html__( 'WB Plugins', 'buddypress-profile-pro' ), esc_html__( 'WB Plugins', 'buddypress-profile-pro' ), 'manage_options', 'wbcomplugins', array( $this, 'wbbpp_profile_pro_settings_page' ), 'dashicons-lightbulb', 59 );
		 	add_submenu_page( 'wbcomplugins', esc_html__( 'General', 'buddypress-profile-pro' ), esc_html__( 'General', 'buddypress-profile-pro' ), 'manage_options', 'wbcomplugins' );
			}
		add_submenu_page( 'wbcomplugins', esc_html__( 'BuddyPress Profile Pro Setting Page', 'buddypress-profile-pro' ), esc_html__( 'Profile Pro', 'buddypress-profile-pro' ), 'manage_options', 'buddypress_profile_pro', array( $this, 'wbbpp_profile_pro_settings_page' ) );	

		// add_menu_page( __( 'BuddyPress Profile Pro Setting Page', 'buddypress-profile-pro' ), __( 'Profile Pro', 'buddypress-profile-pro' ), 'manage_options', 'buddypress_profile_pro', array( $this, 'wbbpp_profile_pro_settings_page' ), 'dashicons-list-view' );
	}

	/**
	 * Callback function for bp resume manager settings page.
	 *
	 * @since    1.0.0
	 * @param    string $current       The current tab.
	 */
	public function wbbpp_profile_pro_settings_page( $current = 'general' ) {
		$current = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : 'general';
		?>
		<div class="wrap">
		<div class="blpro-header">
			<?php echo do_shortcode( '[wbcom_admin_setting_header]' ); ?>
			<h1 class="wbcom-plugin-heading">
				<?php esc_html_e( 'BuddyPress Profile Pro Settings', 'buddypress-profile-pro' ); ?>
			</h1>
		</div>
		<div class="wbcom-admin-settings-page">
		<?php

		$bprm_tabs = array(
			'general'        => __( 'General', 'buddypress-profile-pro' ),
			'group_settings' => __( 'Group Settings', 'buddypress-profile-pro' ),
			'gen_settings'   => __( 'Field Settings', 'buddypress-profile-pro' ),
			'support'        => __( 'Support', 'buddypress-profile-pro' ),
		);

	    $tab_html = '<div class="wbcom-tabs-section"><h2 class="nav-tab-wrapper">';
		foreach ( $bprm_tabs as $bprm_tab => $bprm_name ) {
			$class     = ( $bprm_tab == $current ) ? 'nav-tab-active' : '';
			$tab_html .= '<a class="nav-tab ' . $class . '" href="admin.php?page=buddypress_profile_pro&tab=' . $bprm_tab . '">' . $bprm_name . '</a>';
		}
		$tab_html .= '</h2></div>';
		echo $tab_html;

		include 'inc/wbbpp-options-page.php';
		echo '</div>'; /* closing of div class wbcom-admin-settings-page */
		echo '</div>'; /* closing div class wrap */
	}

	/**
	 * Function to add admin register settings for plugin.
	 *
	 * @since    1.0.0
	 */
	public function wbbpp_add_admin_register_setting() {
		register_setting( 'wbbpp_general_settings_section', 'wbbpp_general_settings' );
		register_setting( 'wbbpp_profile_fields_settings_section', 'wbbpp_profile_fields_settings', array( $this, 'wbbpp_sanitize_profile_setting_callback' ) );
		register_setting( 'wbbpp_profile_groups_settings_section', 'wbbpp_profile_groups_settings' );
	}

	/**
	 * Function to sanitize register settings array.
	 *
	 * @since    1.0.0
	 * @param    array $input       The register setting input array.
	 */
	public function wbbpp_sanitize_profile_setting_callback( $input ) {
		$input = $this->wbbpp_remove_empty_keys( $input );
		return $input;
	}

	/**
	 * Function used in sanitizing reister setting input array.
	 *
	 * @since    1.0.0
	 */
	public function wbbpp_remove_empty_keys( $bprm_settings_one ) {
		foreach ( $bprm_settings_one as &$value ) {
			if ( is_array( $value ) ) {
				$value = $this->wbbpp_remove_empty_keys( $value );
			}
		}

		return array_filter(
			$bprm_settings_one, function( $item ) {
				return $item !== null && $item !== '';
			}
		);
	}

	/**
	 * Ajax request to save new field.
	 *
	 * @since    1.0.2
	 */
	public function wbbpp_save_new_group(){
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'wbbpp_save_new_group' ) {
			check_ajax_referer( 'bprm_admin_ajax_security', 'ajax_nonce' );
			parse_str( $_POST['data'], $nf_formdata );// This will convert the string to array
			$nf_form_fields  = filter_var_array( $nf_formdata, FILTER_SANITIZE_STRING );
			$nm_key          = time();
			$gp_title        = $nf_form_fields['bprm_gp_title'];
			$gp_desc         = $nf_form_fields['bprm_gp_desc'];
			$gp_disp_area    = $nf_form_fields['bprm_gp_display_area'];
			$gp_profile_disp = $nf_form_fields['bprm_gp_profile_display'];
			$gp_resume_disp  = $nf_form_fields['bprm_gp_resume_display'];
			$gp_repeater     = $nf_form_fields['bprm_gp_repeater'];

			// code to get the groups listing for the type.
			$gp_avail 		 = $nf_form_fields['bprm_gp_avail'];
			$roles_style = "display:none";
			$mtype_style = "display:none";
			if( $gp_avail ){
				$gp_avail_user_roles = $gp_avail_mem_type = array();
				if( $gp_avail == 'user_roles' ) {
					$roles_style="";
					$gp_avail_user_roles =  $nf_form_fields['wbbpp_grp_avail_user_roles'];
					if( !$gp_avail_user_roles ){
						$gp_avail_user_roles[] = 'all';
					}
				}elseif( $gp_avail == 'mem_type' ) {
					$mtype_style="";
					$gp_avail_mem_type = $nf_form_fields['wbbpp_grp_avail_mem_type'];
					if( !$gp_avail_mem_type ){
						$gp_avail_mem_type[] = 'all';
					}
				}else{
					$roles_style = "display:none";
					$mtype_style = "display:none";
				}
			}
			global $wp_roles;
			$roles_option_html = '';
			$user_roles   = $wp_roles->get_names();
			$all_index    = array( 'all' => __( 'All', 'buddypress-profile-pro' ) );
			$user_roles   = array_merge( $all_index + $user_roles );
			foreach ( $user_roles as $slug => $role_name ) {
				$selected = (!empty( $gp_avail_user_roles ) && in_array( $slug, $gp_avail_user_roles ) ) ? 'selected' : '';
				$roles_option_html .= '<option value="'.$slug.'" '.$selected.'>'.$role_name.'</option>';
			}

			$mtypes_option_html = '';
			$member_types = bp_get_member_types( $args = array(), $output = 'object' );
			$all_mt_index = array( 'all' => (object) array( 'labels' => array( 'name' => 'All' ) ) );
			$member_types =  array_merge( $all_mt_index + $member_types );
			foreach ( $member_types as $slug => $type_obj ) {
				$selected = (!empty( $gp_avail_mem_type ) && in_array( $slug, $gp_avail_mem_type ) ) ? 'selected' : '';
				$mtypes_option_html .= '<option value="'.$slug.'" '.$selected.'>'.$type_obj->labels["name"].'</option>';
			}

			$grp_area = bprm_groups_display_area();
			$grp_display_options = '';
			foreach ( $grp_area as $grp_area_key => $grp_area_text ) {

				$grp_display_options .= "<option value='" . $grp_area_key . "' " . selected( $gp_disp_area, $grp_area_key, false ) . '>' . $grp_area_text . '</option>';
			}

			$group_html  = '';
			$group_html .= '<div class="bprm-group-tab-link-container ui-sortable-handle">
								<div class="bprm-group-tabs-link">
									<span class="brpm_grp_name">'.$gp_title.'</span>
									<span class="bprm-group-actions">
										<a href="javascript:void(0)" class="bprm-remove-group-zone">
											<i class="fa fa-trash-o" aria-hidden="true"></i>
										</a><a href="javascript:void(0)" class="bprm-show-group-zone"><i class="fa fa-cog" aria-hidden="true"></i></a>
									</span>
								</div>
								<div class="bprm-group-tabs-content '.$nm_key.'">
									<div class="bprm-groups-zone">
										<table class="form-table">
											<tr>
												<th scope="row"><label>'. __( 'Group Title', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<input type="text" class="bprm-group-title-text" name="wbbpp_profile_groups_settings[' . $nm_key . '][g_name]" value="'.$gp_title.'">
												</td>
											</tr>
											<tr>
												<th scope="row"><label>'. __( 'Group Description', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<textarea name="wbbpp_profile_groups_settings[' . $nm_key . '][g_desc]">'.$gp_desc.'</textarea>
												</td>
											</tr>
											<tr style="display: none;">
												<th scope="row"><label>'. __( 'Group Key', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<input type="text" name="wbbpp_profile_groups_settings[' . $nm_key . '][g_key]" value="'.$nm_key.'">
												</td>
											</tr>
											<tr class="wbbpp-group-display-area-tr">
												<th scope="row"><label>'. __( 'Group Display Area', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<select name="wbbpp_profile_groups_settings[' . $nm_key . '][g_area]">
															'.$grp_display_options.'
													</select>
												</td>
											</tr>
											<tr>
												<th scope="row"><label>'. __( 'Display Group at BuddyPress Profile', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<input type="checkbox" name="wbbpp_profile_groups_settings[' . $nm_key . '][profile_display]" value="yes" '.checked( $gp_profile_disp, 'yes', false ).'>
												</td>
											</tr>
											<tr class="wbbpp-resume-display-tr">
												<th scope="row"><label>'. __( 'Display Group at Resume', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<input type="checkbox" name="wbbpp_profile_groups_settings[' . $nm_key . '][resume_display]" value="yes" '.checked( $gp_resume_disp, 'yes', false ).'>
												</td>
											</tr>
											<tr>
												<th scope="row"><label>'. __( 'Repeater', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<input type="checkbox" name="wbbpp_profile_groups_settings[' . $nm_key . '][repeater]" value="yes" '.checked( $gp_repeater, 'yes', false ).'>
												</td>
											</tr>
											<tr>
												<th scope="row"><label>'. __( 'Group Availability', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<input class="wbbpp-grp-avail" data-id="wbbpp-user-roles-list" type="radio" name="wbbpp_profile_groups_settings[' . $nm_key . '][grp_avail]" value="user_roles" '.checked( $gp_avail, 'user_roles', false ).'>
													<span>'. __( 'User roles', 'buddypress-profile-pro' ) .'</span>
													<input class="wbbpp-grp-avail" data-id="wbbpp-mem-typ-list" type="radio" name="wbbpp_profile_groups_settings[' . $nm_key . '][grp_avail]" value="mem_type" '.checked( $gp_avail, 'mem_type', false ).'>
													<span>'. __( 'Member Type', 'buddypress-profile-pro' ) .'</span>
												</td>
											</tr>
											<tr style="'.$roles_style.'" id="wbbpp-user-roles-list" class="wbbpp-grp-avail-class">
												<th scope="row"><label>'. __( 'Select user roles', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<select id="wbbpp-user-roles-list" name="wbbpp_profile_groups_settings[' . $nm_key . '][roles][]" multiple>
													'.$roles_option_html.'
													</select>
												</td>
											</tr>
											<tr style="'.$mtype_style.'" id="wbbpp-mem-typ-list" class="wbbpp-grp-avail-class">
												<th scope="row"><label>'. __( 'Select member types', 'buddypress-profile-pro' ) .'</label>
												</th>
												<td>
													<select id="wbbpp-mem-typ-list" name="wbbpp_profile_groups_settings[' . $nm_key . '][mtypes][]" multiple>
													'.$mtypes_option_html.'
													</select>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>';
			echo $group_html;
			die;
		}
	}

	/**
	 * Ajax request to save new field.
	 *
	 * @since    1.0.0
	 */
	public function wbbpp_save_new_field() {
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'wbbpp_save_new_field' ) {
			check_ajax_referer( 'bprm_admin_ajax_security', 'ajax_nonce' );
			parse_str( $_POST['data'], $nf_formdata );// This will convert the string to array

			$nf_form_fields = filter_var_array( $nf_formdata, FILTER_SANITIZE_STRING );
			$nm_key         = time();

			$bprm_nf_group = $nf_form_fields['bprm_nf_group'];

			$bprm_nf_type = $nf_form_fields['bprm_nf_type'];

			if ( is_multisite() && is_plugin_active_for_network( plugin_basename( __FILE__ ) ) ) {
				$grp_args = get_site_option( 'wbbpp_profile_groups_settings' );
			} else {
				$grp_args = get_option( 'wbbpp_profile_groups_settings' );
			}
			//$grp_args = bprm_existing_resume_groups();

			$bprm_field_types_optn = bprm_resume_field_types();

			$field_type_options = '';

			foreach ( $bprm_field_types_optn as $field_type => $field_text ) {
				$field_type_options .= "<option value='" . $field_type . "' " . selected( $nf_form_fields['bprm_nf_type'], $field_type, false ) . '>' . $field_text . '</option>';
			}

			$field_grp_options = '';

			foreach ( $grp_args as $grp_key_index => $grp_infos ) {

				$field_grp_options .= "<option value='" . $grp_key_index . "' " . selected( $nf_form_fields['bprm_nf_group'], $grp_key_index, false ) . '>' . $grp_infos['g_name'] . '</option>';
			}

			if ( $bprm_nf_type == 'dropdown' || $bprm_nf_type == 'checkbox' || $bprm_nf_type == 'radio_button' || $bprm_nf_type == 'text_dropdown' ) {
				$field_typ_html = "<tr>
									<th scope='row'><label>" . __( 'Field Options', 'buddypress-profile-pro' ) . '</label>
									</th>
									<td>';
				foreach ( $nf_form_fields['bprm_nf_field_type_option'] as $key => $option_value ) {

					$field_typ_html .= "<div class='bprm-fld-option-html'>
											<input type='text' name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][field_type][options][]'  value='" . $option_value . "'>
											<span>
												<a href='JavaScript:void(0)' data-id='bprm-fld-option-html' class='bprm-add-option'><i class='fa fa-plus-circle' aria-hidden='true'></i></a>
												<a href='JavaScript:void(0)' data-id='bprm-fld-option-html' class='bprm-remove-option'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
											</span>
										</div>";
				}

				$field_typ_html .= '</td>
							   </tr>';
			} else {
				$field_typ_html = '';
			}

			if ( $bprm_nf_group == 'bprm_grp_others' ) {
				$sec_html = "<tr>
								<th scope='row'><label>" . __( 'Section Title', 'buddypress-profile-pro' ) . "</label>
								</th>
								<td>
									<input type='text' name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][section_title]' value='" . $nf_form_fields['bprm_nf_sec_title'] . "'>
								</td>
							</tr>
							<tr>
								<th scope='row'><label>" . __( 'Appearence Section', 'buddypress-profile-pro' ) . "</label></th>
								<td>
									<input name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][appr_sec]' type='radio' value='bprm_content_area' class='bprm-new-form-input' " . checked( $nf_form_fields['bprm_nf_appr_sec'], 'bprm_content_area', false ) . '>
									<span>' . __( 'Content Area', 'buddypress-profile-pro' ) . "</span>
									<input name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][appr_sec]' type='radio' value='bprm_sidebar_area' class='bprm-new-form-input' " . checked( $nf_form_fields['bprm_nf_appr_sec'], 'bprm_sidebar_area', false ) . '>
									<span>' . __( 'Sidebar', 'buddypress-profile-pro' ) . "</span><br>
								</td>
							</tr>
							<tr>
								<th scope='row'><label>" . __( 'Field Section Icon', 'buddypress-profile-pro' ) . "</label>
								</th>
								<td>
									<input type='text' name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][section_icon]' value='" . $nf_form_fields['bprm_nf_sec_icon'] . "'>
								</td>
							</tr>";
			} else {
				$sec_html = '';
			}
			$li_html = "<li class='bprm-field-li ui-sortable-handle' style='position: relative;left: 0px;top: 0px;'>" . $nf_form_fields['bprm_nf_title'] . "
				<div class='bprm-field-zone'>
					<table class='form-table'>
						<tr>
							<th scope='row'><label>" . __( 'Field Title', 'buddypress-profile-pro' ) . "</label>
							</th>
							<td>
								<input type='text' name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][field_tile]' value='" . $nf_form_fields['bprm_nf_title'] . "'>
							</td>
						</tr>
						<tr>
							<th scope='row'><label>" . __( 'Field Type', 'buddypress-profile-pro' ) . "</label>
							</th>
							<td>
								<select name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][field_type][type]' class='bprm_rs_type_change'>
									" . $field_type_options . '
								</select>
							</td>
						</tr>
						' . $field_typ_html . "
						<tr style='display:none'>
							<th scope='row'><label>" . __( 'Field Group', 'buddypress-profile-pro' ) . "</label>
							</th>
							<td>
								<select name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][field_grp]'>
									" . $field_grp_options . "
								</select>
							</td>
						</tr>
						<tr>
							<th scope='row'><label>" . __( 'Display', 'buddypress-profile-pro' ) . "</label>
							</th>
							<td>
								<input type='checkbox' name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][display]' value='yes' " . checked( $nf_form_fields['bprm_nf_display'], 'yes', false ) . ">
							</td>
						</tr>
						<tr>
							<th scope='row'><label>" . __( 'Required', 'buddypress-profile-pro' ) . "</label>
							</th>
							<td>
								<input type='checkbox' name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][required]' value='yes' " . checked( $nf_form_fields['bprm_nf_required'], 'yes', false ) . ">
							</td>
						</tr>
						<tr>
							<th scope='row'><label>" . __( 'Repeater', 'buddypress-profile-pro' ) . "</label>
							</th>
							<td>
								<input type='checkbox' name='wbbpp_profile_fields_settings[" . $bprm_nf_group . '][' . $nm_key . "][repeater]' value='yes' " . checked( $nf_form_fields['bprm_nf_repeater'], 'yes', false ) . '>
							</td>
						</tr>' . $sec_html . "
					</table>
				</div>
				<div class='bprm-field-actions'>
					<a href='javascript:void(0)' class='bprm-remove-field-zone'>
						<i class='fa fa-trash-o' aria-hidden='true'></i>
					</a>
					<a href='javascript:void(0)' class='bprm-show-field-zone'>
						<i class='fa fa-cog' aria-hidden='true'></i>
					</a>
				</div>
			</li>";

			echo $li_html;
			die;
		}
	}

	/**
	 * Ajax request to serve field type html whilie adding new field.
	 *
	 * @since    1.0.0
	 */
	public function wbbpp_new_field_type_html() {
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'wbbpp_new_field_type_html' ) {
			check_ajax_referer( 'bprm_admin_ajax_security', 'ajax_nonce' );
			$bprm_field_type = sanitize_text_field( $_POST['ftype'] );

			$rendr_html = '';
			if ( $bprm_field_type ) {
				$rendr_html = $this->wbbpp_get_field_type_html_settings();
			}
			echo $rendr_html;
			die;
		}
	}

	/**
	 * Function used in creating field type html.
	 *
	 * @since    1.0.0
	 */
	public function wbbpp_get_field_type_html_settings() {
		?>
		<th scope="row"><label><?php esc_html_e( 'Field Options', 'buddypress-profile-pro' ); ?></label></th>
		<td>
			<div class="bprm-get-field-type-html">
				<input type="text" name="bprm_nf_field_type_option[]"  value="">
				<span>
					<a href="JavaScript:void(0)" data-id="bprm-get-field-type-html" class="bprm-add-option"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
					<a href="JavaScript:void(0)" data-id="bprm-get-field-type-html" class="bprm-remove-option"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</span>
			</div>
		</td>
		<?php
	}

	/**
	 * Ajax request to detect field type html in register setting form.
	 *
	 * @since    1.0.0
	 */
	public function wbbpp_setting_form_fld_typ_html() {
		if ( isset( $_POST['action'] ) && $_POST['action'] == 'wbbpp_setting_form_fld_typ_html' ) {
			check_ajax_referer( 'bprm_admin_ajax_security', 'ajax_nonce' );
			$bprm_field_type = sanitize_text_field( $_POST['ftype'] );
			$bprm_field_name = $_POST['fname'];

			$field_html = '';
			if ( $bprm_field_type && $bprm_field_name ) {
				$field_html = $this->wbbpp_field_options_html( $bprm_field_name );
			}
			echo $field_html;
			die;
		}
	}

	/**
	 * Function used in creating field type html in register settings section.
	 *
	 * @since    1.0.0
	 */
	public function wbbpp_field_options_html( $bprm_field_name ) {
		?>
		<th scope='row'>
			<label><?php esc_html_e( 'Field Options', 'buddypress-profile-pro' ); ?></label>
		</th>
		<td>
			<div class='bprm-fld-option-html'>
				<input type='text' name='<?php echo esc_attr( $bprm_field_name ); ?>' value=''>
				<span>
					<a href='JavaScript:void(0)' data-id='bprm-fld-option-html' class='bprm-add-option'><i class='fa fa-plus-circle' aria-hidden='true'></i></a>
					<a href='JavaScript:void(0)' data-id='bprm-fld-option-html' class='bprm-remove-option'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
				</span>
			</div>
		</td>
		<?php
	}
}
