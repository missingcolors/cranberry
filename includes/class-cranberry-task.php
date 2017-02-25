<?php

class Cranberry_Task {
	/**
	 * @var Cranberry_Task
	 */
	private static $instance;

	/**
	 * The slug used to identify the task post type.
	 *
	 * @since 0.0.1
	 *
	 * @var string
	 */
	public static $post_type_slug = 'cranberry-tasks';

	/**
	 * The list of meta keys registered with this post type.
	 *
	 * @since 0.0.1
	 *
	 * @var array
	 */
	var $meta_keys = array(
		'c_task_start_date' => array(
			'type' => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest' => true,
			'single' => true,
		),
		'c_task_due_date' => array(
			'type' => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest' => true,
			'single' => true,
		),
	);

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
		add_action( 'init', array( $this, 'register_meta' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
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

	/**
	 * Registers the meta keys assigned to the task post type.
	 *
	 * @since 0.0.1
	 */
	public function register_meta() {
		foreach ( $this->meta_keys as $key => $args ) {
			register_meta( 'post', $key, $args );
		}
	}

	/**
	 * Register the meta boxes used to capture and display task data.
	 *
	 * @since 0.0.1
	 *
	 * @param string $post_type
	 */
	public function add_meta_boxes( $post_type ) {
		if ( self::$post_type_slug !== $post_type ) {
			return;
		}

		add_meta_box( 'cranberry-task-time', 'Time and Dates', array( $this, 'display_date_meta_box' ), $post_type, 'normal', 'default' );
	}

	/**
	 * Displays the meta box used to capture date and time information
	 * attached to a task.
	 *
	 * @since 0.0.1
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 */
	public function display_date_meta_box( $post_id, $post ) {

	}
}
