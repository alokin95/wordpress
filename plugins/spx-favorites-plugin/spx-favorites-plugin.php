<?php

/**
 * @package SpxFavoritesPlugin
 * Plugin Name: Soprex Favorite Posts
 * Plugin URI: http://github.com/alokin95
 * Description: Add favorite blog posts
 * Version: 1.00
 * Author: Nikola Mitrovic
 * Author URI: http://github.com/alokin95
 * License: GPLv2 or later
 * Text Domain: spxnm-favorites-plugin
 */

defined( "ABSPATH" ) or die( "The way is shut. It was made by those who are Dead, and the Dead keep it, until the time comes. The way is shut." );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}