<?php

namespace Core\Taxonomies;

// Enqueue admin CSS
add_action( 'admin_enqueue_scripts', 'Core\Taxonomies\enqueue_styles' );

// Admin setup
add_action( 'admin_init', 'Core\Taxonomies\taxonomies_settings_flush_rewrite' );
add_action( 'add_meta_boxes', 'Core\Taxonomies\taxonomies_metabox');
add_action( 'save_post', 'Core\Taxonomies\taxonomies_save_metabox');
add_filter( 'post_updated_messages', 'Core\Taxonomies\taxonomies_update_messages');

// Table columns
add_filter( 'manage_custom_taxonomies_posts_columns', 'Core\Taxonomies\custom_taxonomies_posts_columns');
add_action( 'manage_custom_taxonomies_posts_custom_column', 'Core\Taxonomies\custom_taxonomies_posts_custom_columns', 10, 2);

/**
 * Register the stylesheets for the admin area.
 *
 * @since    1.0.0
 */
function enqueue_styles() {
    wp_enqueue_style( 'taxonomies', plugin_dir_url( __FILE__ ) . 'css/taxonomies-admin.css', array());
}

/**
 * Register the metabox for the custom fields.
 *
 * @since    1.0.0
 */
function taxonomies_metabox() {
    

    add_meta_box(
        'custom_taxonomies_meta_box',
        __( 'Taxonomy Options', 'taxonomies' ),
        'Core\Taxonomies\custom_taxonomies_metabox_content',
        ['custom_taxonomies'],
        'advanced',
        'high'
    );
    

    add_meta_box(
        'custom_taxonomies_meta_box_side',
        __( 'Documentation', 'taxonomies'),
        'Core\Taxonomies\custom_taxonomies_metabox_side',
        ['custom_taxonomies'],
        'side',
        'low'
    );

}

/**
 * Render the side metabox for the Custom Post Types.
 *
 * @since    1.0.0
 */
function taxonomies_metabox_side( $post ) {
    ?>
    <p><?php _e( 'For more info about each field please check', 'taxonomies');?> <a href="https://developer.wordpress.org/reference/functions/register_post_type/" target="_blank"><?php _e( 'the official documentation.', 'taxonomies');?></a></p>
    <?php
}

/**
 * Render the side metabox for the Custom Taxonomies.
 *
 * @since    1.0.0
 */
function custom_taxonomies_metabox_side( $post ) {
    ?>
    <p><?php _e( 'For more info about each field please check', 'taxonomies');?> <a href="https://developer.wordpress.org/reference/functions/register_taxonomy/" target="_blank"><?php _e( 'the official documentation.', 'taxonomies');?></a></p>
    <?php
}


/**
 * Render the metabox for the Custom Taxonomies
 *
 * @since    1.0.0
 */
function custom_taxonomies_metabox_content( $post ) {
    $values = get_post_custom( $post->ID );

    $taxonomy_name                = isset( $values['taxonomy_name'] ) ? sanitize_title( $values['taxonomy_name'][0] ) : '';
    $taxonomy_label               = isset( $values['taxonomy_label'] ) ? sanitize_text_field( $values['taxonomy_label'][0] ) : '';
    $taxonomy_singular_name       = isset( $values['taxonomy_singular_name'] ) ? sanitize_text_field( $values['taxonomy_singular_name'][0] ) : '';
    $taxonomy_custom_rewrite_slug = isset( $values['taxonomy_custom_rewrite_slug'] ) ? sanitize_title( $values['taxonomy_custom_rewrite_slug'][0] ) : '';
    $taxonomy_show_ui           = isset( $values['taxonomy_show_ui'] ) ? sanitize_text_field( $values['taxonomy_show_ui'][0] ) : '';
    $taxonomy_hierarchical      = isset( $values['taxonomy_hierarchical'] ) ? sanitize_text_field( $values['taxonomy_hierarchical'][0] ) : '';
    $taxonomy_rewrite           = isset( $values['taxonomy_rewrite'] ) ? sanitize_text_field( $values['taxonomy_rewrite'][0] ) : '';
    $taxonomy_query_var         = isset( $values['taxonomy_query_var'] ) ? sanitize_text_field( $values['taxonomy_query_var'][0] ) : '';
    $taxonomy_show_in_rest      = isset( $values['taxonomy_show_in_rest'] ) ? sanitize_text_field( $values['taxonomy_show_in_rest'][0] ) : '';
    $taxonomy_show_admin_column = isset( $values['taxonomy_show_admin_column'] ) ? sanitize_text_field( $values['taxonomy_show_admin_column'][0] ) : '';
    $taxonomy_post_types      = isset( $values['taxonomy_post_types'] ) ? unserialize( $values['taxonomy_post_types'][0] ) : array();
    $taxonomy_post_types_post = ( isset( $values['taxonomy_post_types'] ) && in_array( 'post', $taxonomy_post_types ) ? 'post' : '' );
    $taxonomy_post_types_page = ( isset( $values['taxonomy_post_types'] ) && in_array( 'page', $taxonomy_post_types ) ? 'page' : '' );

    include_once 'partials/taxonomies-metabox.php';
}

/**
 * Save the fields in the custom metaboxes
 *
 * @since    1.0.0
 */
function taxonomies_save_metabox( $post_id ) {

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! isset( $_POST['taxonomies_meta_box_nonce_field'] ) || ! wp_verify_nonce( $_POST['taxonomies_meta_box_nonce_field'], 'taxonomies_meta_box_nonce_action' ) ) {
        return;
    }

    // Taxonomies fields
    if ( isset( $_POST['taxonomy_name'] ) ) {
        update_post_meta( $post_id, 'taxonomy_name', sanitize_title( str_replace( ' ', '', $_POST['taxonomy_name'] ) ) );
    }

    if ( isset( $_POST['taxonomy_label'] ) ) {
        update_post_meta( $post_id, 'taxonomy_label', sanitize_text_field( $_POST['taxonomy_label'] ) );
    }

    if ( isset( $_POST['taxonomy_singular_name'] ) ) {
        update_post_meta( $post_id, 'taxonomy_singular_name', sanitize_text_field( $_POST['taxonomy_singular_name'] ) );
    }

    if ( isset( $_POST['taxonomy_show_ui'] ) ) {
        update_post_meta( $post_id, 'taxonomy_show_ui', sanitize_text_field( $_POST['taxonomy_show_ui'] ) );
    }

    if ( isset( $_POST['taxonomy_hierarchical'] ) ) {
        update_post_meta( $post_id, 'taxonomy_hierarchical', sanitize_text_field( $_POST['taxonomy_hierarchical'] ) );
    }

    if ( isset( $_POST['taxonomy_rewrite'] ) ) {
        update_post_meta( $post_id, 'taxonomy_rewrite', sanitize_text_field( $_POST['taxonomy_rewrite'] ) );
    }

    if ( isset( $_POST['taxonomy_custom_rewrite_slug'] ) ) {
        update_post_meta( $post_id, 'taxonomy_custom_rewrite_slug', sanitize_title( $_POST['taxonomy_custom_rewrite_slug'] ) );
    }

    if ( isset( $_POST['taxonomy_query_var'] ) ) {
        update_post_meta( $post_id, 'taxonomy_query_var', sanitize_text_field( $_POST['taxonomy_query_var'] ) );
    }

    if ( isset( $_POST['taxonomy_show_in_rest'] ) ) {
        update_post_meta( $post_id, 'taxonomy_show_in_rest', sanitize_text_field( $_POST['taxonomy_show_in_rest'] ) );
    }

    if ( isset( $_POST['taxonomy_show_admin_column'] ) ) {
        update_post_meta( $post_id, 'taxonomy_show_admin_column', sanitize_text_field( $_POST['taxonomy_show_admin_column'] ) );
    }

    $taxonomy_post_types = isset( $_POST['taxonomy_post_types'] ) ? sanitize_text_field_array( $_POST['taxonomy_post_types'] ) : array();
    update_post_meta( $post_id, 'taxonomy_post_types', $taxonomy_post_types );

    update_option( 'taxonomies_flush_needed', true );

}

/**
 * Flush rewrite rules if CPT was saved/updated
 *
 * @since    1.0.0
 */
function taxonomies_settings_flush_rewrite() {
    if ( get_option( 'taxonomies_flush_needed' ) == true ) {
        flush_rewrite_rules();
        update_option( 'taxonomies_flush_needed', false );
    }
}

/**
 * Define custom columns for Taxonomies admin table
 *
 * @since  1.0.0
 */
function custom_taxonomies_posts_columns( $columns ) {

    $columns = array(
        'cb' => $columns['cb'],
        'title' => __('Title', 'taxonomies'),
        'slug' => __('Slug', 'taxonomies'),
        'taxonomies' => __('Post Types', 'taxonomies'),
        'author' => __('Author', 'taxonomies'),
        'date' => __('Date', 'taxonomies'),
    );
    return $columns;
}

/**
 * Render custom columns for Taxonomies admin table
 *
 * @since  1.0.0
 */
function custom_taxonomies_posts_custom_columns( $column_name, $id ) {

    if ( $column_name === 'slug' ) {
        echo get_post_meta( get_the_ID(), 'taxonomy_name', true );
    }
    if ( $column_name === 'taxonomies' ) {
        $array = get_post_meta( get_the_ID(), 'taxonomy_post_types', true );
        $list = implode(', ', $array);
        print_r($list);
    }
}

/**
 * Post Update messages
 *
 * @param $msg
 * @return array           Update messages
 * @since    1.0.0
 */
function taxonomies_update_messages( $msg ) {

    $msg['taxonomies'] = array(
        0  => '',
        1  => __( 'Taxonomy updated.', 'taxonomies' ),
        2  => __( 'Taxonomy updated.', 'taxonomies' ),
        3  => __( 'Taxonomy deleted.', 'taxonomies' ),
        4  => __( 'Taxonomy updated.', 'taxonomies' ),
        /* translators: %s: date and time of the revision */
        5  => isset( $_GET['revision'] ) ? sprintf( __( 'Taxonomy restored to revision from %s', 'taxonomies' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => __( 'Taxonomy published.', 'taxonomies' ),
        7  => __( 'Taxonomy saved.', 'taxonomies' ),
        8  => __( 'Taxonomy submitted.', 'taxonomies' ),
        9  => __( 'Taxonomy scheduled for.', 'taxonomies' ),
        10 => __( 'Taxonomy draft updated.', 'taxonomies' ),
    );

    return $msg;
}





