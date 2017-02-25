<?php

class Cranberry_Task {
	/**
	 * @var Cranberry_Task
	 */
	private static $instance;

	public static $post_type_slug = 'cranberry-tasks';

	/**
	 * @since 0.0.1
	 *
	 * @return \Cranberry_Task
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new Cranberry_Task();
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
		add_action( 'init', array( $this, 'register_post_type' ) );
	}

	/**
	 * Registers the task post type.
	 *
	 * @since 0.0.1
	 */
	public function register_post_type() {
		$labels = array(
			'name' => 'Tasks',
			'singular_name' => 'Task',
			'menu_name' => 'Tasks',
			'name_admin_bar' => 'Task',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Task',
			'new_item' => 'New Task',
			'edit_item' => 'Edit Task',
			'view_item' => 'View Task',
			'all_items' => 'All Tasks',
			'search_items' => 'Search Tasks',
			'parent_item_colon' => 'Parent Tasks:',
			'not_found' => 'No tasks found.',
			'not_found_in_trash' => 'No tasks found in Trash.',
			'archives' => 'Task Archives',
			'insert_into_item' => 'Insert into task',
			'uploaded_to_this_item' => 'Uploaded to this task',
			'filter_items_list' => 'Filter tasks list',
			'items_list_navigation' => 'Tasks list navigation',
			'items_list' => 'Tasks list',
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'task' ),
			'has_archive' => true,
			'hierarchical' => true,
			'supports' => array( 'title', 'editor', 'author', 'page-attributes', 'comments' ),
		);

		register_post_type( self::$post_type_slug, $args );
	}
}
