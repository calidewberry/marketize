<?php  $current_action = bp_current_action(); ?>

<?php  if ( $current_action == 'edit' ) : ?>
	<div class="editfield">
		<a href="<?php bloginfo( 'url' ); ?>/add-new-property/?type=new" class="btn btn-primary" ><?php _e( 'Add new property', 'marketize' ); ?></a>
	</div>
<?php endif; ?>

<div class="editfield">
	
	<?php  if ( $current_action == 'edit' ) : ?>
		<h2><?php _e( 'Properties', 'marketize' ); ?></h2>
	<?php endif; ?>

	<?php 

		$property_query = new WP_Query( [ 
			'author' => get_current_user_id(),
			'post_type'	=> 'property',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
    		'order'   => 'ASC',
		]);

	?>

	<?php if ( $property_query->have_posts() ) : ?>

		<div class="row profile-properties">
			
			<?php while ( $property_query->have_posts() ) : $property_query->the_post(); ?>

				<?php $property_logo = get_field( 'property_logo' );

					if ( empty( $property_logo ) ) {
						$property_logo = get_stylesheet_directory_uri() . '/assets/img/flag.svg';
					}

				?>

				<?php if ( $current_action == 'public' ) : ?>

					<div class="col-sm-12">
						<h3><?php the_title(); ?></h3>
					</div>

				<?php else : ?>

					<div class="col-sm-6 col-md-6 col-lg-4 mb-5">
						<div class="profile-property-wrap">
							
							<div class="property-img">
								<img src="<?php echo esc_url( $property_logo ); ?>" class="img-responsive" alt="<?php the_title(); ?>">
							</div>

							<h3><?php the_title(); ?></h3>

							<div class="property-links">
								
								<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php _e( 'View', 'marketize' ); ?></a>

								<?php  if ( $current_action == 'edit' ) : ?>
									<a href="<?php bloginfo( 'url' ); ?>/add-new-property/?type=edit&id=<?php the_ID(); ?>" class="btn btn-secondary"><?php _e( 'Edit', 'marketize' ); ?></a>
									<a href="javascript:;" class="btn btn-danger delete-property" property="<?php the_ID(); ?>" ><?php _e( 'Delete', 'marketize' ); ?></a>
								<?php endif; ?>

							</div>

						</div>
					</div>

				<?php endif; ?>


			<?php endwhile; wp_reset_postdata(); ?>

		</div>

	<?php endif; ?>

</div>
