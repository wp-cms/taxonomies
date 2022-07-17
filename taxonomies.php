<?php

/*
Plugin Name: Taxonomies
Description: Allow users to create taxonomies in the WP Admin Area.
Version: 1.0.0
Requires PHP: 8.0
Text Domain: taxonomies
Domain Path: /languages/
*/

namespace plugin\taxonomies;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

// Register the CPT for Taxonomies and all defined Taxonomies
require_once plugin_dir_path( __FILE__ ) . 'general/register-taxonomies-cpt.php';
require_once plugin_dir_path( __FILE__ ) . 'general/register-taxonomies.php';

// Setup admin area
if ( is_admin() ) {
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-functions.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/plugin-activation.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/plugin-deactivation.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/load-textdomain.php';
}



