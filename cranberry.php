<?php
/*
Plugin Name: Cranberry
Version: 0.0.1
Description:
Author: jeremyfelt, slocker
Author URI: https://missingcolors.com
Plugin URI: https://github.com/missingcolors/cranberry
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// The core plugin class.
require dirname( __FILE__ ) . '/includes/class-cranberry.php';
require dirname( __FILE__ ) . '/includes/class-cranberry-task.php';
require dirname( __FILE__ ) . '/includes/class-cranberry-project.php';

add_action( 'after_setup_theme', 'Cranberry' );
/**
 * Initializes the main Cranberry plugin controller.
 *
 * @return \Cranberry
 */
function Cranberry() {
	return Cranberry::get_instance();
}

add_action( 'after_setup_theme', 'Cranberry_Task' );
/**
 * Initializes the handling of tasks.
 *
 * @since 0.0.1
 *
 * @return Cranberry_Task
 */
function Cranberry_Task() {
	return Cranberry_Task::get_instance();
}

add_action( 'after_setup_theme', 'Cranberry_Project' );
/**
 * Initializes the handling of projects.
 *
 * @since 0.0.1
 *
 * @return Cranberry_Project
 */
function Cranberry_Project() {
	return Cranberry_Project::get_instance();
}
