<?php
$penumbra_themename = "Penumbra";
$penumbra_shortname = "penumbra";
$penumbra_version = "1.1.2.7";

$penumbra_option_group = $penumbra_shortname.'_theme_option_group';
$penumbra_option_name = $penumbra_shortname.'_theme_options';


// Load stylesheet and jscript
add_action('admin_enqueue_scripts', 'penumbra_add_init');

function penumbra_add_init( $hook_suffix) {
	if ( $hook_suffix == 'appearance_page_theme-options' ) {
		$file_dir = get_template_directory_uri();
		wp_enqueue_style("penumbraCss", $file_dir."/functions/theme-options.css", false, "1.0", "all");
		wp_enqueue_script("penumbraScript", $file_dir."/functions/theme-options.js", false, "1.0");
	}
}

// Create custom settings menu
add_action('admin_menu', 'penumbra_create_menu');

function penumbra_create_menu() {
	global $penumbra_themename;
	//create new top-level menu
	add_theme_page( __( ' Penumbra Theme Options', 'penumbra' ), __( 'Theme Options', 'penumbra'), 'edit_theme_options', basename(__FILE__), 'penumbra_settings_page' );
}

// Register settings
add_action( 'admin_init', 'penumbra_register_settings' );

function penumbra_register_settings() {
   global $penumbra_themename, $penumbra_shortname, $penumbra_version, $penumbra_settings, $penumbra_option_group, $penumbra_option_name;
  	//register our settings
	register_setting( $penumbra_option_group, $penumbra_option_name , 'penumbra_theme_options_validate');
}

// Create theme options
global $penumbra_settings;
$penumbra_settings = array (

array("name" => __('General', 'penumbra'),
		"type" => "section"),
		
array("name" => __('Set up basic settings','penumbra'),
		"type" => "section-desc"),
	
array("type" => "open"),

array( "name" => __('Logo URL', 'penumbra'),
	"desc" => __('Enter the link to your logo image', 'penumbra'),
	'id' => 'logo',
	'type' => 'text',
	'std' => ''),	

array( "name" => __('Tag Line', 'penumbra'),
	"desc" => __('Check this box to hide tag line', 'penumbra'),
	"id" => "hide_tag",
	'type' => 'checkbox',
	'std' => ''),
	
array( "name" => __('Disable Page Comments', 'penumbra'),
	"desc" => __('Check this box to disable comments in Page posts', 'penumbra'),
	'id' => 'page_comments',
	'type' => 'checkbox',
	'std' => ''),
	
array( "name" => __('Top Search Box', 'penumbra'),
	"desc" => __('Check this box to hide search box in header', 'penumbra'),
	"id" => "hide_search",
	'type' => 'checkbox',
	'std' => ''),
	
array( "name" => __('Footer text', 'penumbra'),
	"desc" => __('Enter text used in the theme footer. It can be HTML:  &lt;a href=&lsquo; &rsquo; title=&lsquo; &rsquo;&gt; ', 'penumbra'),
	'id' => 'footer_text',
	'type' => 'text',
	'std' => ''),
	
array( "name" => __( 'Custom CSS ', 'penumbra'),
		"desc" => __( 'Enter custom CSS rules here to control the look of your site.', 'penumbra'),
		'id' => $penumbra_shortname.'_header_css',
		'type' => 'textarea'),
	
array("type" => "close"),

//Social Links
array("name" => __('Socials Buttons', 'penumbra'),
		"type" => "section"),
		
array("name" => __('Facebook, RSS, Twitter and more...', 'penumbra'),
		"type" => "section-desc"),
	
array("type" =>"open"),


array( "name" => __('Socials', 'penumbra'),
	"desc" => __('Check this box to enable Socials widget in sidebar', 'penumbra'),
	"id" => "enable_socials",
	'type' => 'checkbox',
	'std' => ''),
	
array( "name" => __('Socials Widget Title', 'penumbra'),
	"desc" => __('Enter text to change the Socials widget title. Leave it blank for display none', 'penumbra'),
	'id' => 'socials_title',
	'type' => 'text',
	'std' => __('Social Stuff', 'penumbra')),	

array( "name" => __('Feedburner URL', 'penumbra'),
	"desc" => __('Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website', 'penumbra'),
	'id' => 'feedburner',
	'type' => 'text',
	'std' => get_bloginfo('rss2_url')),
	
array( "name" => __('Facebook URL', 'penumbra'),
	"desc" => __('Paste your Fackebook URL here (with http://). Leave it blank for display none', 'penumbra'),
	'id' => 'facebook',
	'type' => 'text',
	'std' => esc_url(home_url())),	
	
array( "name" => __('Twitter URL', 'penumbra'),
	"desc" => __('Paste your Twitter URL here (with http://). Leave it blank for display none', 'penumbra'),
	'id' => 'twitter',
	'type' => 'text',
	'std' => esc_url(home_url())),
	
array( "name" => __('LinkedIn', 'penumbra'),
	"desc" => __('Paste your LinkedIn URL here (with http://). Leave it blank for display none', 'penumbra'),
	'id' => 'linkedin',
	'type' => 'text',
	'std' => ''),

array( "name" => __('Google', 'penumbra'),
	"desc" => __('Paste your Google URL here (with http://). Leave it blank for display none', 'penumbra'),
	'id' => 'google',
	'type' => 'text',
	'std' => ''),
	
array( "name" => __('Reddit', 'penumbra'),
	"desc" => __('Paste your Reddit URL here (with http://). Leave it blank for display none', 'penumbra'),
	'id' => 'reddit',
	'type' => 'text',
	'std' => ''),

array( "name" => __('YouTube', 'penumbra'),
	"desc" => __('Paste your YouTube URL here (with http://). Leave it blank for display none', 'penumbra'),
	'id' => 'youtube',
	'type' => 'text',
	'std' => ''),
	
array( "name" => __('Flicker', 'penumbra'),
	"desc" => __('Paste your Flicker URL here (with http://). Leave it blank for display none', 'penumbra'),
	'id' => 'flicker',
	'type' => 'text',
	'std' => ''),
	
array( "name" => __('StumbleUpon', 'penumbra'),
	"desc" => __('Paste your StumbleUpon URL here (with http://). Leave it blank for display none', 'penumbra'),
	'id' => 'stumbleupon',
	'type' => 'text',
	'std' => ''),

array( "type" => "close"),


);

function penumbra_settings_page() {
   global $penumbra_themename, $penumbra_shortname, $penumbra_version, $penumbra_settings, $penumbra_option_group, $penumbra_option_name;
?>
<div class="wrap">
<?php screen_icon(); ?><h2><?php echo $penumbra_themename; ?> <?php _e('Theme Options','penumbra'); ?></h2>
<p class="top-notice"><?php _e('To easily customize your WordPress Blog, you can use the settings below. ','penumbra'); ?></p>
<div class="options_wrap">
<?php if ( isset ( $_POST['reset'] ) ): ?>
<?php // Delete Settings
global $wpdb, $penumbra_themename, $penumbra_shortname, $penumbra_version, $penumbra_settings, $penumbra_option_group, $penumbra_option_name;
delete_option('penumbra_theme_options');
wp_cache_flush(); ?>
<div class="updated fade"><p><strong><?php _e( 'Theme settings reset.','penumbra' ); ?></strong></p></div>

<?php elseif ( isset ( $_REQUEST['settings-updated'] ) ): ?>
<div class="updated fade"><p><strong><?php _e( 'Theme settings updated successfully.','penumbra' ); ?></strong></p></div>
<?php endif; ?>

<form method="post" action="options.php">

<?php settings_fields( $penumbra_option_group ); ?>

<?php $penumbra_options = get_option( $penumbra_option_name ); ?>        

<?php foreach ($penumbra_settings as $value) {
if ( isset($value['id']) ) { $valueid = $value['id'];}
switch ( $value['type'] ) {
case "section":
?>
	<div class="section_wrap">
	<h3 class="section_title"><?php echo $value['name']; ?> 

<?php break; 
case "section-desc":
?>
	<span><?php echo $value['name']; ?></span></h3>
	<div class="section_body">

<?php 
break;
case 'text':
?>

	<div class="options_input options_text">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>
		<input name="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>" id="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( isset( $penumbra_options[$valueid]) ){ echo esc_attr( stripslashes($penumbra_options[$valueid])); } else { echo esc_attr( stripslashes($value['std'])); } ?>" />
	</div>

<?php
break;
case 'textarea':
?>
	<div class="options_input options_textarea">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>
		<textarea name="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>" type="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>" cols="" rows=""><?php if ( isset( $penumbra_options[$valueid]) ){ echo esc_attr( stripslashes($penumbra_options[$valueid])); } ?></textarea>
	</div>

<?php 
break;
case 'select':
?>
	<div class="options_input options_select">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>
		<select name="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>" id="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>">
		<?php foreach ($value['value'] as $option) { ?>
				<option<?php selected($penumbra_options[$valueid] == $option ) ?>><?php echo $option; ?></option>
		<?php } ?>		
		</select>
	</div>

<?php
break;
case "radio":
?>
	<div class="options_input options_select">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>
		  <?php foreach ($value['options'] as $key=>$option) { 
			$radio_setting = $penumbra_options[$valueid];
			if($radio_setting != ''){
				if ($key == $penumbra_options[$valueid] ) {
					checked($penumbra_options[$valueid]);
					}
			}else{
				if($key == $value['std']){
					checked($penumbra_options[$valueid]);
				}
			}?>
			<input type="radio" id="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>" name="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
			<?php } ?>
	</div>

<?php
break;
case "checkbox":
?>
	<div class="options_input options_checkbox">
		<div class="options_desc"><?php echo $value['desc']; ?></div>

		<input type="checkbox" name="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>" id="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>" value="1" <?php if( isset( $penumbra_options[$valueid] ) ){checked($penumbra_options[$valueid]);} ?> />
		<label for="<?php echo $penumbra_option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label>
	 </div>

<?php
break;
case "close":
?>
</div><!--#section_body-->
</div><!--#section_wrap-->

<?php 
break;
}
}
?>

<span class="submit">
<input class="button button-primary" type="submit" name="save" value="<?php _e('Save All Changes', 'penumbra') ?>" />
</span>
</form>

<form method="post" action="">
<span class="button-right">
<input class="button delete" type="submit" name="reset" value="<?php _e('Reset/Delete Settings', 'penumbra') ?>" />
<input type="hidden" name="action" value="reset" />
<span><?php _e('Restore defaults upon theme deactivation/reactivation. Only press this if you want to reset theme settings upon Theme reactivation.','penumbra') ?></span>
</span>
</form>

</div><!--#options-wrap-->

<div class="postbox-container">
	<div class="metabox-holder">
		<div id="side-sortables" class="meta-box-sortables">

				<div id="about" class="postbox">
					<div class="handlediv" title="Click to toggle"><br /></div>
					<h3 class="hndle" id="about-sidebar"><span><?php _e('About the theme','penumbra') ?>:</span></h3>
					<div class="inside">
						<p><?php _e('You are using','penumbra') ?> <strong><a target="_blank" href="http://tutskid.com/penumbra/"><?php echo $penumbra_themename; ?></a> <?php echo $penumbra_version; ?></strong></br>
							<?php _e('WordPress Theme by','penumbra') ?>:<a target="_blank" href="http://tutskid.com/"><?php _e('TutsKid','penumbra') ?></a></p>
					</div><!-- .inside -->
				</div><!-- #about.postbox -->

				<div id="about" class="postbox">		
					<div class="handlediv" title="Click to toggle"><br /></div>				
					<h3 class="hndle" id="about-sidebar"><?php _e('Donate','penumbra') ?>:</h3>
					<div class="inside">
						<p><?php _e('Like the Theme? Please consider buying me a cup of coffee. Thank you','penumbra') ?>!<br />
							<form style="text-align: center;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="67RPDV5EAF7QY">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form></p>			
					</div><!-- .inside -->
				</div><!-- #about.postbox -->
				
				<div id="about" class="postbox">
					<h3 class="hndle" id="about-sidebar"></h3>
					<div class="inside">
					<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="https://www.facebook.com/Tutskidcom" send="false" layout="'.$layout.'" width="240" show_faces="false" font="trebuchet ms" action="recommend"></fb:like>
					</div><!-- .inside -->
				</div><!-- #about.postbox -->
			
		</div><!-- #side-sortables.meta-box-sortables -->
	</div><!-- .metabox-holder -->
</div><!-- .postbox-container -->

<?php } 

	// validates the theme's options upon submission.
	function penumbra_theme_options_validate( $input ) {
		global $penumbra_settings;
		foreach ( $penumbra_settings as $value ) {
			switch ( $value['type'] ) {
				case 'select':
					$input[$value['id']] = wp_filter_nohtml_kses( $input[$value['id']] );
					break;
				case 'text':
					$input[$value['id']] = wp_filter_post_kses( $input[$value['id']] );
					break;
				case 'textarea':
					$input[$value['id']] = wp_filter_post_kses( $input[$value['id']] );
					break;
				case 'checkbox':
				if (!isset($input[$value['id']])) {  
					$input[$value['id']] = 0;  
                    }  
                    // Our checkbox value is either 0 or 1  
                    $input[$value['id']] = ( $input[$value['id']] == 1 ? 1 : 0 );
				break;
			}
		}
		return $input;
	} 

function penumbra_print_custom_style() {
	$options = get_option('penumbra_theme_options');
	
	if ( isset ($options['penumbra_header_css']) &&  ($options['penumbra_header_css'] != '') ) {
		$customCss = $options['penumbra_header_css'];
	} else { $customCss = ''; }
	
		/* If options are empty return */
	if ( $customCss == '' )
		return;

	$output = '<!-- Begin Penumbra theme css -->' . "\n";
	$output .= '<style type="text/css">' . "\n";
	$output .= $customCss . "\n";
	$output .= '</style>' . "\n";
	$output .= '<!-- End Penumbra theme css -->' . "\n";
	echo stripslashes($output);

}
add_action( 'wp_head', 'penumbra_print_custom_style' );

?>