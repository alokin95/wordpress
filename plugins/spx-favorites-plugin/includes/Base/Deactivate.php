<?php


namespace Inc\Base;


class Deactivate extends Controller {

	public static function deactivate() {
		flush_rewrite_rules();

		global $wpdb;
		$sql = "DROP TABLE IF EXISTS spx_user_favorite_posts";
		$wpdb->query($sql);
	}
}