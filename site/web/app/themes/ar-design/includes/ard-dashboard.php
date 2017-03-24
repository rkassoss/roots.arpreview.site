<?php
/*
Plugin Name: ARD Customizing Dashboard
Plugin URI: http://ardesign.us
Description: Customizing the dashboard for AR Design clients
Version: 1.0
*/


// 1. add client login-logo. (the themes images directory)
function custom_login_logo() {
	//IMAGE SHOULD BE 320x84
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; width: auto !important; background-size: auto !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');


// 2. remove unwanted dashboard widgets for relevant users
function ard_remove_dashboard_widgets() {
    $user = wp_get_current_user();
    if ( ! $user->has_cap( 'manage_options' ) ) {
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		remove_meta_box( 'dashboard_quick_press',   'dashboard', 'side' );      //Quick Press widget
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );      //Recent Drafts
		remove_meta_box( 'dashboard_primary',       'dashboard', 'side' );      //WordPress.com Blog
		remove_meta_box( 'dashboard_secondary',     'dashboard', 'side' );      //Other WordPress News
		remove_meta_box( 'dashboard_incoming_links','dashboard', 'normal' );    //Incoming Links
		remove_meta_box( 'dashboard_plugins',       'dashboard', 'normal' );    //Plugins
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
    }
}
add_action( 'wp_dashboard_setup', 'ard_remove_dashboard_widgets' );




// 3. style dashboard

function my_admin_theme_style() {
    wp_enqueue_style('my-admin-theme', plugins_url('wp-admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');


// 3. Add contact form widget to the dashboard.

function ard_add_dashboard_widgets() {
	$user = wp_get_current_user();
    if ( ! $user->has_cap( 'manage_options' ) ) {
		wp_add_dashboard_widget(
			'ard_contact_us_dashboard_widget',         // Widget slug.
			'Need Help? Contact Us!',         // Title.
			'ard_contact_dashboard_widget_function' // Display function.
	    );	
    }
}
add_action( 'wp_dashboard_setup', 'ard_add_dashboard_widgets' );

function ard_contact_dashboard_widget_function() {
	echo '<table>
	<tr>
		<td style="width:100px;">Email:</td>
		<td><a href="mailto:support@ardesign.us">support@ardesign.us</a></td>
	</tr>
	<tr>
		<td>Office:</td>
		<td>(646) 256-4398</td>
	</tr>
	<tr>
		<td>Address:</td>
		<td>6801 Lake Worth Road, Suite 103<br/>Lake Worth FL 33467</td>
	</tr>
</table>';
}



?>
