<?php
/**
 * BuddyPress - Users Header
 *
 * @since 3.0.0
 * @version 3.0.0
 */
?>

<div id="item-header-avatar">
	<a href="<?php bp_displayed_user_link(); ?>">

		<?php bp_displayed_user_avatar( 'type=full' ); ?>

	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">

	<?php
		$logged_in_user_id = bp_loggedin_user_id();
		$user_displayname = bp_core_get_user_displayname( $logged_in_user_id );
		$user_first_name = xprofile_get_field_data( '1', $logged_in_user_id );
		$user_last_name = xprofile_get_field_data( '254', $logged_in_user_id );

		$user_fullname = $user_first_name . ' ' . $user_last_name;

		if ( empty( $user_first_name ) && empty( $user_last_name ) ) {
			$user_fullname = $user_displayname;
		} 
	?>

	<div class="user-full-name">
		<h2><?php echo $user_fullname; ?></h2>
	</div>

	<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
		<h2 class="user-nicename">@<?php bp_displayed_user_mentionname(); ?></h2>
	<?php endif; ?>

	<?php bp_nouveau_member_hook( 'before', 'header_meta' ); ?>

	<?php /* if ( bp_nouveau_member_has_meta() ) : ?>
		<div class="item-meta">

			<?php bp_nouveau_member_meta(); ?>

		</div><!-- #item-meta -->
	<?php endif; */ ?>

	<?php bp_nouveau_member_header_buttons( array( 'container_classes' => array( 'member-header-actions' ) ) ); ?>
</div><!-- #item-header-content -->
