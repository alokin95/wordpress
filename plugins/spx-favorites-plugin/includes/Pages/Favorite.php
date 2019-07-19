<?php


namespace Inc\Pages;

use Inc\Base\Controller;

class Favorite extends Controller {

	public function register() {
		add_action('init', array($this, 'add_favorite_button'));
		add_action('wp_ajax_add_to_favs', array( $this, 'add_to_favs' ) );
//		add_action('wp_ajax_nopriv_add_to_favs', array( $this, 'favorite' ) );
	}

	public function add_favorite_button() {
		if ( is_user_logged_in() ) {
			add_filter( 'the_content', array($this, 'render_button' ) );
		}
	}

	public function render_button($content) {
		global $post;
		global $wpdb;
		$user_id = get_current_user_id();

		$check_if_already_voted = $wpdb->get_results("SELECT * FROM spx_user_favorite_posts WHERE user_id = $user_id AND post_id = $post->ID");

		if ( $check_if_already_voted ) {
			return $content . "<button class=\"add-to-favs-button\" data-id=\"$post->ID\">Remove from favorites</button>";
		}

		return $content . "<button class=\"add-to-favs-button\" data-id=\"$post->ID\">Add to favorites</button>";
	}

	public function add_to_favs() {
		global $wpdb;

		$user_id = get_current_user_id();
		$post_id = $_POST['post_id'];

		$check_if_already_voted = $wpdb->get_results("SELECT * FROM spx_user_favorite_posts WHERE user_id = $user_id AND post_id = $post_id");

		$response = array();

		if ( $check_if_already_voted ) {
			$wpdb->delete( 'spx_user_favorite_posts', array(
				'user_id' => $user_id,
				'post_id' => $post_id
			) );
			$response['message'] = 'Post removed from favorites';
			wp_send_json($response);
		}

		$wpdb->insert(
			'spx_user_favorite_posts',
			array(
				'user_id' => $user_id,
				'post_id' => $post_id
			)
		);

		$response['message'] = "Post successfully added to favorites";
		wp_send_json($response);
	}
}