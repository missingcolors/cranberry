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
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'add_screen_to_menu' ) );
	}

	/**
	 * Enqueues the scripts used in the Cranberry dashboard.
	 *
	 * @since 0.0.1
	 */
	public function enqueue_scripts() {
		if ( get_current_screen() && 'toplevel_page_cranberry-dashboard' === get_current_screen()->base ) {
			wp_enqueue_script( 'react', 'https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react.min.js', array(), '15.4.2', false );
			wp_enqueue_script( 'reactdom', 'https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react-dom.min.js', array( 'react' ), '15.4.2', false );

			wp_enqueue_script( 'cranberry', plugins_url( 'js/cranberry.js', __DIR__ ), array( 'react', 'reactdom' ), '0.0.1', true );
		}
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
