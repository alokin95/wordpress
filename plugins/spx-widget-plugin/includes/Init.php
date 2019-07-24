<?php


namespace Inc;

use Inc\base\Controller;

class Init extends Controller {

	private static $services = [

	];

	public static function registerServices() {
		foreach ( self::$services as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists($service, 'register') ) {
				$service->register();
			}
		}
	}

	public static function instantiate( $class ) {
		return new $class;
	}
}