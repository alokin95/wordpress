<?php


namespace Inc\Base;


class Activate extends Controller {

	public static function activate() {
		flush_rewrite_rules();

		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE IF NOT EXISTS spx_user_favorite_posts(
			  user_id mediumint(9) NOT NULL,
			  post_id mediumint(9) NOT NULL,
			  PRIMARY KEY  (user_id, post_id)
			) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

	}
}