<?php
/**
 * Creates a meta box for the theme settings page, which holds textareas for custom scripts within 
 * the theme. 
 *
 */

add_action( 'admin_menu', 'omega_theme_admin_scripts' );

function omega_theme_admin_scripts() {

	global $theme_settings_page;
	
	/* Get the theme settings page name */
	$theme_settings_page = 'appearance_page_theme-settings';

	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();

	/* Create a settings meta box only on the theme settings page. */
	add_action( 'load-appearance_page_theme-settings', 'omega_theme_settings_meta_boxes' );

	/* Sanitize the scripts settings before adding them to the database. */
	add_filter( "sanitize_option_{$prefix}_theme_settings", 'omega_theme_validate_settings' );

	/* Enqueue styles */
	add_action( 'admin_enqueue_scripts', 'omega_admin_scripts' );
}

/**
 * Adds the core theme scripts meta box to the theme settings page in the admin.
 *
 * @since 0.3.0
 * @return void
 */
function omega_theme_settings_meta_boxes() {

	/* Add a custom meta box. */
	add_meta_box( 
		'omega-theme-comments', 
		__( 'Comments and Trackbacks', 'omega' ), 
		'omega_meta_box_theme_display_comments', 
		'appearance_page_theme-settings', 'normal', 'high' );

	add_meta_box( 
		'omega-theme-archives', 
		__( 'Content Archives', 'omega' ), 
		'omega_meta_box_theme_display_archives', 
		'appearance_page_theme-settings', 'normal', 'high' );

	add_meta_box(
		'omega-theme-scripts',			// Name/ID
		__( 'Header and Footer Scripts', 'omega' ),	// Label
		'omega_meta_box_theme_display_scripts',			// Callback function
		'appearance_page_theme-settings',		// Page to load on, leave as is
		'normal',					// Which meta box holder?
		'high'					// High/low within the meta box holder
	);

}

/**
 * Callback for Theme Settings Comments meta box.
 */
function omega_meta_box_theme_display_comments() {
?>
	<p>
		<?php _e( 'Enable Comments', 'omega' ); ?>
		<label for="<?php echo hybrid_settings_field_id( 'comments_posts' ); ?>" title="Enable comments on posts"><input type="checkbox" name="<?php echo hybrid_settings_field_name( 'comments_posts' ); ?>" id="<?php echo hybrid_settings_field_id( 'comments_posts' ); ?>" value="1"<?php checked( hybrid_get_setting( 'comments_posts' ) ); ?> />
		<?php _e( 'on posts?', 'omega' ); ?></label>

		<label for="<?php echo hybrid_settings_field_id( 'comments_pages' ); ?>" title="Enable comments on pages"><input type="checkbox" name="<?php echo hybrid_settings_field_name( 'comments_pages' ); ?>" id="<?php echo hybrid_settings_field_id( 'comments_pages' ); ?>" value="1"<?php checked( hybrid_get_setting( 'comments_pages' ) ); ?> />
		<?php _e( 'on pages?', 'omega' ); ?></label>
	</p>

	<p>
		<?php _e( 'Enable Trackbacks', 'omega' ); ?>
		<label for="<?php echo hybrid_settings_field_id( 'trackbacks_posts' ); ?>" title="Enable trackbacks on posts"><input type="checkbox" name="<?php echo hybrid_settings_field_name( 'trackbacks_posts' ); ?>" id="<?php echo hybrid_settings_field_id( 'trackbacks_posts' ); ?>" value="1"<?php checked( hybrid_get_setting( 'trackbacks_posts' ) ); ?> />
		<?php _e( 'on posts?', 'omega' ); ?></label>

		<label for="<?php echo hybrid_settings_field_id( 'trackbacks_pages' ); ?>" title="Enable trackbacks on pages"><input type="checkbox" name="<?php echo hybrid_settings_field_name( 'trackbacks_pages' ); ?>" id="<?php echo hybrid_settings_field_id( 'trackbacks_pages' ); ?>" value="1"<?php checked( hybrid_get_setting( 'trackbacks_pages' ) ); ?> />
		<?php _e( 'on pages?', 'omega' ); ?></label>
	</p>

	<p><span class="description"><?php _e( 'Comments and Trackbacks can also be disabled on a per post/page basis when creating/editing posts/pages.', 'omega' ); ?></span></p>

<?php
}

/**
 * Callback for Theme Settings Post Archives meta box.
 */
function omega_meta_box_theme_display_archives() {
?>
	<p class="collapsed">
		<label for="<?php echo hybrid_settings_field_id( 'content_archive' ); ?>"><?php _e( 'Select one of the following:', 'omega' ); ?></label>
		<select name="<?php echo hybrid_settings_field_name( 'content_archive' ); ?>" id="<?php echo hybrid_settings_field_id( 'content_archive' ); ?>">
		<?php
		$archive_display = apply_filters(
			'omega_archive_display_options',
			array(
				'full'     => __( 'Display post content', 'omega' ),
				'excerpts' => __( 'Display post excerpts', 'omega' ),
			)
		);
		foreach ( (array) $archive_display as $value => $name ) 
			echo '<option value="' . esc_attr( $value ) . '"' . selected( hybrid_get_setting( 'content_archive' ), esc_attr( $value ), false ) . '>' . esc_html( $name ) . '</option>' . "\n";
		?>
		</select>
	</p>

	<div id="omega_content_limit_setting" <?php if ( 'full' != hybrid_get_setting( 'content_archive' )) echo 'class="hidden"';?>>
		<p>
			<label for="<?php echo hybrid_settings_field_id( 'content_archive_limit' ); ?>"><?php _e( 'Limit content to', 'omega' ); ?>
			<input type="text" name="<?php echo hybrid_settings_field_name( 'content_archive_limit' ); ?>" id="<?php echo hybrid_settings_field_id( 'content_archive_limit' ); ?>" value="<?php echo esc_attr( hybrid_get_setting( 'content_archive_limit' ) ); ?>" size="3" />
			<?php _e( 'characters', 'omega' ); ?></label>
		</p>

		<p><span class="description"><?php _e( 'Using this option will limit the text and strip all formatting from the text displayed. To use this option, choose "Display post content" in the select box above.', 'omega' ); ?></span></p>
	</div>

	<p class="collapsed">
		<label for="<?php echo hybrid_settings_field_id( 'content_archive_thumbnail' ); ?>"><input type="checkbox" name="<?php echo hybrid_settings_field_name( 'content_archive_thumbnail' ); ?>" id="<?php echo hybrid_settings_field_id( 'content_archive_thumbnail' ); ?>" value="1" <?php checked( hybrid_get_setting( 'content_archive_thumbnail' ) ); ?> />
		<?php _e( 'Include the Featured Image?', 'omega' ); ?></label>
	</p>

	<p id="omega_image_size" <?php if (!hybrid_get_setting( 'content_archive_thumbnail' )) echo 'class="hidden"';?>>
		<label for="<?php echo hybrid_settings_field_id( 'image_size' ); ?>"><?php _e( 'Image Size:', 'omega' ); ?></label>
		<select name="<?php echo hybrid_settings_field_name( 'image_size' ); ?>" id="<?php echo hybrid_settings_field_id( 'image_size' ); ?>">
		<?php
		$sizes = omega_get_image_sizes();
		foreach ( (array) $sizes as $name => $size )
			echo '<option value="' . esc_attr( $name ) . '"' . selected( hybrid_get_setting( 'image_size' ), $name, FALSE ) . '>' . esc_html( $name ) . ' (' . absint( $size['width'] ) . ' &#x000D7; ' . absint( $size['height'] ) . ')</option>' . "\n";
		?>
		</select>
	</p>
	<!--
	<p>
		<label for="<?php echo hybrid_settings_field_id( 'posts_nav' ); ?>"><?php _e( 'Select Post Navigation Technique:', 'omega' ); ?></label>
		<select name="<?php echo hybrid_settings_field_name( 'posts_nav' ); ?>" id="<?php echo hybrid_settings_field_id( 'posts_nav' ); ?>">
			<option value="older-newer"<?php selected( 'older-newer', hybrid_get_setting( 'posts_nav' ) ); ?>><?php _e( 'Older / Newer', 'omega' ); ?></option>
			<option value="prev-next"<?php selected( 'prev-next', hybrid_get_setting( 'posts_nav' ) ); ?>><?php _e( 'Previous / Next', 'omega' ); ?></option>
			<option value="numeric"<?php selected( 'numeric', hybrid_get_setting( 'posts_nav' ) ); ?>><?php _e( 'Numeric', 'omega' ); ?></option>
		</select>
	</p>
	-->
	<p><span class="description"><?php _e( 'These options will affect any blog listings page, including archive, author, blog, category, search, and tag pages.', 'omega' ); ?></span></p>	

<?php }

/**
 * Creates a meta box that allows users to customize their scripts.
 */
function omega_meta_box_theme_display_scripts() {
?>
	<p>
		<label for="<?php echo hybrid_settings_field_id( 'header_scripts' ); ?>">Enter scripts or code you would like output to <code>wp_head()</code>:</label>
	</p>
	
	<textarea name="<?php echo hybrid_settings_field_name( 'header_scripts' ) ?>" id="<?php echo hybrid_settings_field_id( 'header_scripts' ); ?>" cols="78" rows="8"><?php echo hybrid_get_setting( 'header_scripts' ); ?></textarea>

	<p><span class="description"><?php printf( __( 'The %1$s hook executes immediately before the closing %2$s tag in the document source.', 'omega' ), '<code>wp_head()</code>', '<code>&lt;/head&gt;</code>' ); ?></span></p>

	<hr class="div" />

	<p>
		<label for="<?php echo hybrid_settings_field_id( 'footer_scripts' ); ?>"><?php printf( __( 'Enter scripts or code you would like output to %s:', 'omega' ), '<code>wp_footer()</code>' ); ?></label>
	</p>

	<textarea name="<?php echo hybrid_settings_field_name( 'footer_scripts' ); ?>" id="<?php echo hybrid_settings_field_id( 'footer_scripts' ); ?>" cols="78" rows="8"><?php echo hybrid_get_setting( 'footer_scripts' ) ; ?></textarea>

	<p><span class="description"><?php printf( __( 'The %1$s hook executes immediately before the closing %2$s tag in the document source.', 'omega' ), '<code>wp_footer()</code>', '<code>&lt;/body&gt;</code>' ); ?></span></p>
	

<?php }

/**
 * Saves the scripts meta box settings by filtering the "sanitize_option_{$prefix}_theme_settings" hook.
 *
 * @since 0.3.0
 * @param array $settings Array of theme settings passed by the Settings API for validation.
 * @return array $settings
 */
function omega_theme_validate_settings( $settings ) {

	if ( isset( $_POST['reset'] ) ) {
		$settings = hybrid_get_default_theme_settings();
		add_settings_error( 'omega-framework', 'restore_defaults', __( 'Default setting restored.', 'omega' ), 'updated fade' );
	} else {
		/* Make sure we kill evil scripts from users without the 'unfiltered_html' cap. */
		if ( isset( $settings['footer_scripts'] ) && !current_user_can( 'unfiltered_html' ) )
			$settings['footer_scripts'] = stripslashes( wp_filter_post_kses( addslashes( $settings['footer_scripts'] ) ) );

		if ( isset( $settings['header_scripts'] ) && !current_user_can( 'unfiltered_html' ) )
			$settings['header_scripts'] = stripslashes( wp_filter_post_kses( addslashes( $settings['header_scripts'] ) ) );

		$settings['content_archive_limit'] =  absint( $settings['content_archive_limit'] );
		$settings['content_archive_thumbnail'] =  absint( $settings['content_archive_thumbnail'] );
	}	

	/* Return the theme settings. */
	return $settings;
}

/* Enqueue scripts (and related stylesheets) */
function omega_admin_scripts( $hook_suffix ) {
    
    global $theme_settings_page;
	
    if ( $theme_settings_page == $hook_suffix ) {

	    wp_enqueue_script( 'omega-admin', get_template_directory_uri() . '/inc/js/omega-admin.js', array( 'jquery' ), '20121231', false );
	    wp_enqueue_style( 'omega-admin', get_template_directory_uri() . '/inc/css/omega-admin.css' );

    }
}


?>