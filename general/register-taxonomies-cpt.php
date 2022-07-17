<?php

/**
 * Register the post type where we will store all custom taxonomies
 */

register_post_type(
	'custom_taxonomies',
	array(
		'labels'          => array(
			'name'               => __( 'Taxonomies', 'taxonomies' ),
			'singular_name'      => __( 'Custom Taxonomy', 'taxonomies' ),
			'add_new'            => __( 'Add New', 'taxonomies' ),
			'add_new_item'       => __( 'Add New Custom Taxonomy', 'taxonomies' ),
			'edit_item'          => __( 'Edit Custom Taxonomy', 'taxonomies' ),
			'new_item'           => __( 'New Custom Taxonomy', 'taxonomies' ),
			'view_item'          => __( 'View Custom Taxonomy', 'taxonomies' ),
			'search_items'       => __( 'Search Custom Taxonomies', 'taxonomies' ),
			'not_found'          => __( 'No Custom Taxonomies found', 'taxonomies' ),
			'not_found_in_trash' => __( 'No Custom Taxonomies found in Trash', 'taxonomies' ),
		),
		'public'          => false,
		'show_ui'         => true,
		'_builtin'        => false,
		'capability_type' => 'page',
		'hierarchical'    => false,
		'rewrite'         => false,
		'query_var'       => 'custom_taxonomies',
		'supports'        => array( 'title', 'author' ),
		'show_in_menu'    => 'options-general.php',
	)
);
