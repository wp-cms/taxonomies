<?php

namespace plugin\taxonomies;

add_action( 'init', 'plugin\taxonomies\register_taxonomies' );

/**
 * Retrieve all taxonomies definitions created by the user and set them up
 *
 * @since    1.0.0
 */
function register_taxonomies() {

    $taxonomies = array();

    // Query custom taxonomies
    $get_taxonomies_query   = array(
        'numberposts'      => -1,
        'post_type'        => 'custom_taxonomies',
        'post_status'      => 'publish',
        'suppress_filters' => false,
    );
    $taxonomies_definitions = get_posts( $get_taxonomies_query );

    // Create array of post meta
    if ( $taxonomies_definitions ) {
        foreach ( $taxonomies_definitions as $taxonomy ) {
            $taxonomies_meta = get_post_meta( $taxonomy->ID, '', true );

            // text
            $taxonomy_name                = ( array_key_exists( 'taxonomy_name', $taxonomies_meta ) && $taxonomies_meta['taxonomy_name'][0] ? sanitize_title( $taxonomies_meta['taxonomy_name'][0] ) : 'no_name' );
            $taxonomy_label               = ( array_key_exists( 'taxonomy_label', $taxonomies_meta ) && $taxonomies_meta['taxonomy_label'][0] ? sanitize_text_field( $taxonomies_meta['taxonomy_label'][0] ) : $taxonomy_name );
            $taxonomy_singular_name       = ( array_key_exists( 'taxonomy_singular_name', $taxonomies_meta ) && $taxonomies_meta['taxonomy_singular_name'][0] ? sanitize_text_field( $taxonomies_meta['taxonomy_singular_name'][0] ) : $taxonomy_label );
            $taxonomy_custom_rewrite_slug = ( array_key_exists( 'taxonomy_custom_rewrite_slug', $taxonomies_meta ) && $taxonomies_meta['taxonomy_custom_rewrite_slug'][0] ? sanitize_title( $taxonomies_meta['taxonomy_custom_rewrite_slug'][0] ) : $taxonomy_name );

            // dropdown
            $taxonomy_show_ui           = array_key_exists( 'taxonomy_show_ui', $taxonomies_meta ) && $taxonomies_meta['taxonomy_show_ui'][0] == '1';
            $taxonomy_hierarchical      = array_key_exists( 'taxonomy_hierarchical', $taxonomies_meta ) && $taxonomies_meta['taxonomy_hierarchical'][0] == '1';
            $taxonomy_rewrite           = ( array_key_exists( 'taxonomy_rewrite', $taxonomies_meta ) && $taxonomies_meta['taxonomy_rewrite'][0] == '1' ? array( 'slug' => _x( $taxonomy_custom_rewrite_slug, 'URL Slug', 'taxonomies' ) ) : false );
            $taxonomy_query_var         = array_key_exists( 'taxonomy_query_var', $taxonomies_meta ) && $taxonomies_meta['taxonomy_query_var'][0] == '1';
            $taxonomy_show_in_rest      = array_key_exists( 'taxonomy_show_in_rest', $taxonomies_meta ) && $taxonomies_meta['taxonomy_show_in_rest'][0] == '1';
            $taxonomy_show_admin_column = array_key_exists( 'taxonomy_show_admin_column', $taxonomies_meta ) && $taxonomies_meta['taxonomy_show_admin_column'][0] == '1';

            // checkbox
            $taxonomy_post_types = ( array_key_exists( 'taxonomy_post_types', $taxonomies_meta ) && $taxonomies_meta['taxonomy_post_types'][0] ? $taxonomies_meta['taxonomy_post_types'][0] : 'a:0:{}' );

            $taxonomies[] = array(
                'taxonomy_id'                  => $taxonomy->ID,
                'taxonomy_name'                => $taxonomy_name,
                'taxonomy_label'               => $taxonomy_label,
                'taxonomy_singular_name'       => $taxonomy_singular_name,
                'taxonomy_custom_rewrite_slug' => $taxonomy_custom_rewrite_slug,
                'taxonomy_show_ui'             => $taxonomy_show_ui,
                'taxonomy_hierarchical'        => $taxonomy_hierarchical,
                'taxonomy_rewrite'             => $taxonomy_rewrite,
                'taxonomy_query_var'           => $taxonomy_query_var,
                'taxonomy_show_in_rest'        => $taxonomy_show_in_rest,
                'taxonomy_show_admin_column'   => $taxonomy_show_admin_column,
                'taxonomy_builtin_taxonomies'  => unserialize( $taxonomy_post_types ),
            );

            // Register custom taxonomies
            if ( is_array( $taxonomies ) ) {
                foreach ( $taxonomies as $taxonomy ) {

                    $labels = array(
                        'name'                       => $taxonomy['taxonomy_label'],
                        'singular_name'              => $taxonomy['taxonomy_singular_name'],
	                                                    /* translators: 1: Taxonomy label */
                        'search_items'               => sprintf( __( 'Search %s', 'taxonomies' ), $taxonomy['taxonomy_label'] ),
	                                                    /* translators: 1: Taxonomy label */
                        'popular_items'              => sprintf( __( 'Popular %s', 'taxonomies' ), $taxonomy['taxonomy_label'] ),
                        'all_items'                  => $taxonomy['taxonomy_label'],
	                                                    /* translators: 1: Taxonomy singular name */
                        'parent_item'                => sprintf( __( 'Parent %s', 'taxonomies' ), $taxonomy['taxonomy_singular_name'] ),
	                                                    /* translators: 1: Taxonomy singular name */
                        'parent_item_colon'          => sprintf( __( 'Parent %s', 'taxonomies' ), $taxonomy['taxonomy_singular_name'] ),
	                                                    /* translators: 1: Taxonomy singular name */
                        'edit_item'                  => sprintf( __( 'Edit %s', 'taxonomies' ), $taxonomy['taxonomy_singular_name'] ),
	                                                    /* translators: 1: Taxonomy singular name */
                        'update_item'                => sprintf( __( 'Update %s', 'taxonomies' ), $taxonomy['taxonomy_singular_name'] ),
	                                                    /* translators: 1: Taxonomy singular name */
                        'add_new_item'               => sprintf( __( 'Add New %s', 'taxonomies' ), $taxonomy['taxonomy_singular_name'] ),
	                                                    /* translators: 1: Taxonomy singular name */
                        'new_item_name'              => sprintf( __( 'New %s', 'taxonomies' ), $taxonomy['taxonomy_singular_name'] ),
	                                                    /* translators: 1: Taxonomy label */
                        'separate_items_with_commas' => sprintf( __( 'Separate %s with commas', 'taxonomies' ), $taxonomy['taxonomy_label'] ),
	                                                    /* translators: 1: Taxonomy label */
                        'add_or_remove_items'        => sprintf( __( 'Add or remove %s', 'taxonomies' ), $taxonomy['taxonomy_label'] ),
	                                                    /* translators: 1: Taxonomy label */
                        'choose_from_most_used'      => sprintf( __( 'Choose from the most used %s', 'taxonomies' ), $taxonomy['taxonomy_label'] ),
                        'menu_name'                  => $taxonomy['taxonomy_label'],
                    );

                    $args = array(
                        'label'             => $taxonomy['taxonomy_label'],
                        'labels'            => $labels,
                        'rewrite'           => $taxonomy['taxonomy_rewrite'],
                        'show_ui'           => $taxonomy['taxonomy_show_ui'],
                        'hierarchical'      => $taxonomy['taxonomy_hierarchical'],
                        'query_var'         => $taxonomy['taxonomy_query_var'],
                        'show_in_rest'      => $taxonomy['taxonomy_show_in_rest'],
                        'show_admin_column' => $taxonomy['taxonomy_show_admin_column'],
                    );

                    if ( $taxonomy['taxonomy_name'] !== 'no_name' ) {
                        register_taxonomy( $taxonomy['taxonomy_name'], $taxonomy['taxonomy_builtin_taxonomies'], $args );
                    }
                }
            }
        }
    }
}
