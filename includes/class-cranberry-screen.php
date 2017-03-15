<?php

class Cranberry_Screen {
	/**s
	 * @var Cranberry_Screen
	 */
	private static $instance;

	/**
	 * @since 0.0.1
	 *
	 * @return \Cranberry_Screen
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new Cranberry_Screen();
			self::$instance->setup_hooks();
		}
		return self::$instance;
	}

	/**
	 * Setup hooks to include.
	 *
	 * @since 0.0.1
	 */
	public function setup_hooks() {

	}

}
