<?php

namespace Inc\Pages;

use Inc\Base\Controller;

class Admin extends Controller {

	public function register() {
		add_action('admin_menu', array( $this, 'add_favorite_posts_menu' ) );
	}

	public function add_favorite_posts_menu() {
		add_menu_page('My favorite posts', 'My favorite posts', 'read', 'favorite-posts',array( $this, 'show_favorite_posts' ) );
	}

	public function show_favorite_posts() {
		global $wpdb;
		$user_id = get_current_user_id();
		$favorite_posts['posts'] = $wpdb->get_results("SELECT * FROM  wp_posts p JOIN spx_user_favorite_posts fp ON p.ID = fp.post_id JOIN wp_users u ON u.ID = p.post_author WHERE fp.user_id = $user_id ");
		$this->view('admin/favorite_posts.php', $favorite_posts);
	}

}