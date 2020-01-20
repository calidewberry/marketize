<?php
/**
 * BuddyPress - Members Profile Loop
 *
 * @since 3.0.0
 * @version 3.1.0
 */

?>

<!-- <h2 class="screen-heading view-profile-screen"><?php //esc_html_e( 'View Profile', 'buddypress' ); ?></h2> -->

<?php $is_profile_incomplete = get_user_meta( get_current_user_id(), 'is_user_profile_complete', true ); 
	$logged_in_username = bp_core_get_username( bp_loggedin_user_id() );

	if ( $is_profile_incomplete == '' ) {
		$is_profile_incomplete = 'incomplete';
	}

	$properties_placeholder_field = xprofile_get_field_data( '130', get_current_user_id() );

	if ( empty( $properties_placeholder_field ) ) {
		xprofile_set_field_data( '130', get_current_user_id(),  '20' );
	}
?>

<?php if ( $is_profile_incomplete == 'incomplete' ) : ?>
	
	<div class="card border-warning mb-3">
	  <div class="card-header">
	  	<?php _e( 'Complete profile in order to add property', 'marketize' ); ?>
	  	<a href="<?php echo esc_url( get_site_url( null, '/members/' . $logged_in_username . '/profile/edit/group/1/' ) ); ?>" class="black-button text-center"><p><?php _e( 'Edit Profile', 'marketize' ); ?></p></a>
	  </div>
	</div>

<?php endif; ?>

<?php bp_nouveau_xprofile_hook( 'before', 'loop_content' ); ?>

<?php if ( bp_has_profile() ) : ?>

	<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

		<?php if ( bp_profile_group_has_fields() ) : ?>

			<?php bp_nouveau_xprofile_hook( 'before', 'field_content' ); ?>

			<div class="bp-widget <?php bp_the_profile_group_slug(); ?>">

				<?php $profile_fields_group = bp_get_the_profile_group_name(); ?>

				<h3 class="screen-heading profile-group-title">
					<?php bp_the_profile_group_name(); ?>
				</h3>

				<?php if ( $profile_fields_group == 'Property Listings' ) : ?>

					<?php get_template_part( 'inc/properties/profile-add', 'property' ); ?>

				<?php else : ?>

					<table class="profile-fields bp-tables-user">

						<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

							<?php if ( bp_field_has_data() ) : ?>

								<tr<?php bp_field_css_class(); ?>>

									<td class="label"><?php bp_the_profile_field_name(); ?></td>

									<td class="data"><?php bp_the_profile_field_value(); ?></td>

								</tr>

							<?php endif; ?>

							<?php bp_nouveau_xprofile_hook( '', 'field_item' ); ?>

						<?php endwhile; ?>

					</table>

				<?php endif; ?>

			</div>

			<?php bp_nouveau_xprofile_hook( 'after', 'field_content' ); ?>

		<?php endif; ?>

	<?php endwhile; ?>

	<?php bp_nouveau_xprofile_hook( '', 'field_buttons' ); ?>

<?php endif; ?>

<?php
bp_nouveau_xprofile_hook( 'after', 'loop_content' );
