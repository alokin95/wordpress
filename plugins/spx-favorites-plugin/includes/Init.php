<?php


namespace Inc;

class Init {

	private static $services = [
		Pages\Favorite::class,
		Base\Enqueue::class
	];

	public static function registerServices() {
		foreach ( self::$services as $class ) {
			$instance = self::instantiate( $class );
			if ( method_exists( $class, 'register' ) ) {
				$instance->register();
			}
		}
	}

	public static function instantiate( $class ) {
		return new $class;
	}

}