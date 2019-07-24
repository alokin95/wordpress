<?php

/**
 * @package SpxWidgetPlugin
 * Plugin Name: Soprex Widget
 * Plugin URI: http://github.com/alokin95
 * Description: Sidebar widget
 * Version: 1.00
 * Author: Nikola Mitrovic
 * Author URI: http://github.com/alokin95
 * License: GPLv2 or later
 * Text Domain: spx-widget-plugin
 */

use Inc\base\Activate;
use Inc\base\Deactivate;

defined ('ABSPATH') or die ( "The way is shut. It was made by those who are Dead, and the Dead keep it, until the time comes. The way is shut." );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

register_activation_hook(__FILE__,'activate');
function activate() {
	Activate::activate();
}

register_deactivation_hook(__FILE__,'deactivate');
function deactivate() {
	Deactivate::deactivate();
}

if ( class_exists('Inc\Init' ) ) {
	\Inc\Init::registerServices();
}

add_action('init', function() {
	die('asdad');
});