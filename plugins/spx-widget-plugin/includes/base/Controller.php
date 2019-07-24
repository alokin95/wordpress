<?php


namespace Inc\base;


abstract class Controller {

	protected $plugin_path;
	protected $plugin_url;
	protected $plugin_name;

	public function __construct() {
		$this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
		$this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
		$this->plugin_name = plugin_basename(dirname(__FILE__, 3)) . '/spxnm-custom-forms.php';
	}

	protected function view($template, $data = []) {
		extract($data);
		return require $this->plugin_path.'templates/'.$template;
	}

}