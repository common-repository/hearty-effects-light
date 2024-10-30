<?php

/**
*   Plugin Name: Hearty Effects Light
*   Plugin URI: http://www.heartyplugins.com/hearty-effects-light
*   Description: Hearty Effects Light is a free responsive WordPress plugin that uses any icon from Font Awesome and 8 preset icon hover CSS3 effects
*   Version: 1.1
*   Author: Hearty Plugins
*   Author URI: http://www.heartyplugins.com
*   License: http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
*/

// no direct access

if (!defined('ABSPATH')) { die; }

function heartyeffectslight_add_css() {

	//------

	wp_register_style('hrty-bootstrap-css', plugins_url('/theme/bootstrap/hrty-bootstrap.css', __FILE__));
	wp_register_style('hrty-fontawesome-css', '//use.fontawesome.com/releases/v5.0.13/css/all.css');

	wp_register_style('heartyeffectslight-css', plugins_url('/theme/css/frontend.css', __FILE__));

	//------

	wp_enqueue_style('hrty-bootstrap-css');
	wp_enqueue_style('hrty-fontawesome-css');

  wp_enqueue_style('heartyeffectslight-css');

}

function heartyeffectslight_add_admin_css() {

	wp_register_style('hrty-bootstrap-css', plugins_url('/theme/bootstrap/hrty-bootstrap.css', __FILE__));
	wp_register_style('hrty-fontawesome-css', '//use.fontawesome.com/releases/v5.0.13/css/all.css');
	wp_register_style('heartyeffectslight-admin-css', plugins_url('/theme/css/admin.css', __FILE__));

  wp_enqueue_style('hrty-bootstrap-css');
  wp_enqueue_style('hrty-fontawesome-css');
	wp_enqueue_style('heartyeffectslight-admin-css');

	// Add the color picker css file
  wp_enqueue_style( 'wp-color-picker' );

}

function heartyeffectslight_add_js() {

	wp_register_script('hrty-bootstrap-js', plugins_url('/theme/bootstrap/hrty-bootstrap.js', __FILE__), array('jquery'));
	wp_register_script('hrty-viewportchecker-js', plugins_url('/theme/js/viewportchecker/viewportchecker.js', __FILE__), array('jquery'));

	wp_enqueue_script('hrty-bootstrap-js');
	wp_enqueue_script('hrty-viewportchecker-js');

}

function heartyeffectslight_add_admin_js() {

	wp_enqueue_media();

	wp_register_script('hrty-bootstrap-js', plugins_url('/theme/bootstrap/hrty-bootstrap.js', __FILE__), array('jquery'));
	wp_register_script('heartycolorpicker-js', plugins_url('/theme/js/colorpicker.js', __FILE__), array('wp-color-picker'), false, true);
	wp_register_script('heartyeffectslight-admin-js', plugins_url('/theme/js/admin.js', __FILE__), array('jquery'));

	wp_enqueue_script('hrty-bootstrap-js');
	wp_enqueue_script('heartycolorpicker-js');
	wp_enqueue_script('heartyeffectslight-admin-js');

}

function heartyeffectslight($atts) {

	require_once('inc/view.php');

	$atts = shortcode_atts(array('settings_instance' => 1), $atts, 'heartyeffectslight');
	$settings_instance = $atts['settings_instance'];
	$output = HeartyEffectsLightView::generate_view($settings_instance);

	return $output;

}

function heartyeffectslight_widget() {

	require_once('inc/widget.php');

	register_widget('HeartyEffectsLightWidget');

}

if (is_admin()) {

	require_once('inc/options.php');
	$heartyeffectslight_settings_page = new HeartyEffectsLightSettingsPage();

	if (isset($_GET['page']) && $_GET['page'] == 'heartyeffectslight-setting-admin') {

		add_action('admin_enqueue_scripts', 'heartyeffectslight_add_admin_css');
		add_action('admin_enqueue_scripts', 'heartyeffectslight_add_admin_js');

	} else {

		add_action('widgets_init', 'heartyeffectslight_widget');

	}

} else {

	add_action('wp_enqueue_scripts', 'heartyeffectslight_add_css');
	add_action('wp_enqueue_scripts', 'heartyeffectslight_add_js');

	add_action('widgets_init', 'heartyeffectslight_widget');
	add_shortcode('heartyeffectslight', 'heartyeffectslight');

}

