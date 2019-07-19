<?php


namespace Inc\Base;


class Enqueue extends Controller {

	public function register() {
		add_action('wp_enqueue_scripts', array( $this, 'custom_styles_and_scripts' ) );
		add_action('admin_enqueue_scripts', array($this, 'custom_styles_and_scripts') );
	}

	public function custom_styles_and_scripts() {
		wp_enqueue_script(
			'add_to_favs',
			$this->plugin_url.'/assets/add_to_favs.js',
			array('jquery'),
			'1.0.0',
			'true'
		);

		wp_localize_script(
			'add_to_favs', 'ajax_object',
			array('ajax_url' => admin_url('admin-ajax.php'))
		);
	}
}