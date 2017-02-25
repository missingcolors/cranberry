<?php

class Cranberry {
	/**
	 * @var Cranberry
	 */
	private static $instance;

	/**
	 * @since 0.0.1
	 *
	 * @return \Cranberry
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new Cranberry();
			self::$instance->setup_hooks();
		}
		return self::$instance;
	}

	/**
	 * Setup hooks to include.
	 *
	 * @since 0.0.1
	 */
	public function setup_hooks() {}
}
