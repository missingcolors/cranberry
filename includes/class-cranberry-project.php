<?php

class Cranberry_Project {
	/**
	 * @var Cranberry_Project
	 */
	private static $instance;

	/**
	 * The slug used to identify the project taxonomy.
	 *
	 * @since 0.0.1
	 *
	 * @var string
	 */
	public static $taxonomy_slug = 'cranberry-project';

	/**
	 * @since 0.0.1
	 *
	 * @return \Cranberry_Project
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new Cranberry_Project();
			self::$instance->setup_hooks();
		}
		return self::$instance;
	}

	/**
	 * Configures hooks on setup.
	 *
	 * @since 0.0.1
	 */
	public function setup_hooks() {
		add_action( 'init', array( $this, 'register_taxonomy' ) );
	}

	/**
	 * Registers the project taxonomy.
	 *
	 * @since 0.0.1
	 */
	public function register_taxonomy() {
		$labels = array(
			'name'          => 'Projects',
			'singular_name' => 'Project',
			'search_items'  => 'Search projects',
			'all_items'     => 'All Project',
			'edit_item'     => 'Edit Project',
			'update_item'   => 'Update Project',
			'add_new_item'  => 'Add New Project',
			'new_item_name' => 'New Project',
			'menu_name'     => 'Projects',
		);
		$args = array(
			'labels'            => $labels,
			'description'       => 'Projects make the world go round.',
			'public'            => true,
			'hierarchical'      => false,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'rewrite'           => array( 'slug' => 'project' ),
			'show_in_rest'      => true,
		);

		register_taxonomy( self::$taxonomy_slug, array( Cranberry_Task::$post_type_slug ), $args );
	}
}
