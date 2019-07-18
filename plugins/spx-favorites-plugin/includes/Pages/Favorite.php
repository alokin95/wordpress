<?php


namespace Inc\Pages;

use Inc\Base\Controller;

class Favorite extends Controller {

	public function register() {
		add_action('init', array($this, 'add_favorite_button'));
		add_action('wp_ajax_add_to_favs', array( $this, 'favorite' ) );
	}

	public function add_favorite_button() {
		if ( is_user_logged_in() ) {
			add_filter( 'the_content', array($this, 'render_button' ) );
		}
	}

	public function render_button($content) {
		return $content . "<button type=\"button\" class=\"btn btn-primary add-to-favs-button\">Add to favorites</button>";
	}

	public function favorite() {
		echo 'sadasda';
	}
}