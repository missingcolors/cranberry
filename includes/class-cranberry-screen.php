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
		add_action( 'admin_menu', array( $this, 'add_screen_to_menu' ) );
	}

	/**
	 * Registers a custom menu page for Cranberry.
	 *
	 * @since 0.0.1
	 */
	public function add_screen_to_menu() {
		add_menu_page( 'Cranberry', 'Cranberry', 'manage_options', 'cranberry-dashboard', array( $this, 'render_screen' ), 'dashicons-list-view', 2 );
	}

	/**
	 * Renders the custom menu page.
	 *
	 * @since 0.0.1
	 */
	public function render_screen() {
		include dirname( __DIR__ ) . '/view/dashboard.php';
	}
}
