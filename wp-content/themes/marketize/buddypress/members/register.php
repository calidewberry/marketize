<?php
/**
 * BuddyPress - Members/Blogs Registration forms
 *
 * @since 3.0.0
 * @version 4.0.0
 */

?>

	<?php bp_nouveau_signup_hook( 'before', 'page' ); ?>

	<?php 
		$requested_user_type = null;

		if ( isset( $_GET['type'] ) ) {
			$requested_user_type = sanitize_text_field( $_GET['type'] );
		}

		if ( $requested_user_type == 'pm' ) {
			get_template_part( 'buddypress/members/register-templates/register', 'pm' );
		} elseif ( $requested_user_type == 'guest' ) {
			get_template_part( 'buddypress/members/register-templates/register', 'guest' );
		} else {
			get_template_part( 'buddypress/members/register-templates/register', 'default' );
		}

	?>

	<?php bp_nouveau_signup_hook( 'after', 'page' ); ?>
