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
	public function setup_hooks() {
		add_action( 'after_setup_theme', 'Cranberry_Task::get_instance', 20 );
		add_action( 'after_setup_theme', 'Cranberry_Project::get_instance', 21 );
		add_action( 'after_setup_theme', 'Cranberry_Screen::get_instance', 22 );
	}
}
