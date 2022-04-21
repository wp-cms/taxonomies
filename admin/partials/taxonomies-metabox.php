<?php

/**
 *
 * This file is used to markup the content of the metabox in Custom Taxonomies.
 *
 * @link       https://profiles.wordpress.org/pattihis/
 * @since      1.0.0
 *
 * @package    taxonomies
 * @subpackage taxonomies/admin/partials
 */


wp_nonce_field( 'taxonomies_meta_box_nonce_action', 'taxonomies_meta_box_nonce_field' );

?>
    <table class="taxonomies">
        <tr>
            <td class="first">
                <label for="taxonomy_name"><span class="required">*</span> <?php _e( 'Taxonomy Name', 'taxonomies' ); ?></label>
                <input type="text" name="taxonomy_name" id="taxonomy_name" class="widefat" tabindex="1" value="<?php echo $taxonomy_name; ?>" />
                <p><?php _e( 'The taxonomy slug, must not exceed 32 characters.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_hierarchical"><?php _e( 'Hierarchical', 'taxonomies' ); ?></label>
                <select name="taxonomy_hierarchical" id="taxonomy_hierarchical" tabindex="2">
                    <option value="0" <?php selected( $taxonomy_hierarchical, '0' ); ?>><?php _e( 'No', 'taxonomies' ); ?> (<?php _e( 'default', 'taxonomies' ); ?>)</option>
                    <option value="1" <?php selected( $taxonomy_hierarchical, '1' ); ?>><?php _e( 'Yes', 'taxonomies' ); ?></option>
                </select>
                <p><?php _e( 'Is this taxonomy hierarchical like categories or not hierarchical like tags', 'taxonomies' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="taxonomy_singular_name"><?php _e( 'Singular Name', 'taxonomies' ); ?></label>
                <input type="text" name="taxonomy_singular_name" id="taxonomy_singular_name" class="widefat" tabindex="3" value="<?php echo $taxonomy_singular_name; ?>" />
                <p><?php _e( 'A singular descriptive name for the taxonomy.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_label"><?php _e( 'Plural Label', 'taxonomies' ); ?></label>
                <input type="text" name="taxonomy_label" id="taxonomy_label" class="widefat" tabindex="4" value="<?php echo $taxonomy_label; ?>" />
                <p><?php _e( 'A plural descriptive name for the taxonomy.', 'taxonomies' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="taxonomy_rewrite"><?php _e( 'Rewrite', 'taxonomies' ); ?></label>
                <select name="taxonomy_rewrite" id="taxonomy_rewrite" tabindex="5">
                    <option value="1" <?php selected( $taxonomy_rewrite, '1' ); ?>><?php _e( 'Yes', 'taxonomies' ); ?> (<?php _e( 'default', 'taxonomies' ); ?>)</option>
                    <option value="0" <?php selected( $taxonomy_rewrite, '0' ); ?>><?php _e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php _e( 'Triggers the handling of rewrites for this taxonomy.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_custom_rewrite_slug"><?php _e( 'Custom Rewrite Slug', 'taxonomies' ); ?></label>
                <input type="text" name="taxonomy_custom_rewrite_slug" id="taxonomy_custom_rewrite_slug" class="widefat" tabindex="6" value="<?php echo $taxonomy_custom_rewrite_slug; ?>" />
                <p><?php _e( 'Customize the permastruct slug.', 'taxonomies' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="taxonomy_show_ui"><?php _e( 'Show UI', 'taxonomies' ); ?></label>
                <select name="taxonomy_show_ui" id="taxonomy_show_ui" tabindex="7">
                    <option value="1" <?php selected( $taxonomy_show_ui, '1' ); ?>><?php _e( 'Yes', 'taxonomies' ); ?> (<?php _e( 'default', 'taxonomies' ); ?>)</option>
                    <option value="0" <?php selected( $taxonomy_show_ui, '0' ); ?>><?php _e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php _e( 'Whether to generate a default UI for managing this taxonomy in the admin.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_show_admin_column"><?php _e( 'Admin Column', 'taxonomies' ); ?></label>
                <select name="taxonomy_show_admin_column" id="taxonomy_show_admin_column" tabindex="8">
                    <option value="1" <?php selected( $taxonomy_show_admin_column, '1' ); ?>><?php _e( 'Yes', 'taxonomies' ); ?> (<?php _e( 'default', 'taxonomies' ); ?>)</option>
                    <option value="0" <?php selected( $taxonomy_show_admin_column, '0' ); ?>><?php _e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php _e( 'Show this taxonomy as a column in the custom post listing.', 'taxonomies' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="taxonomy_show_in_rest"><?php _e( 'Show in REST', 'taxonomies' ); ?></label>
                <select name="taxonomy_show_in_rest" id="taxonomy_show_in_rest" tabindex="9">
                    <option value="1" <?php selected( $taxonomy_show_in_rest, '1' ); ?>><?php _e( 'Yes', 'taxonomies' ); ?> (<?php _e( 'default', 'taxonomies' ); ?>)</option>
                    <option value="0" <?php selected( $taxonomy_show_in_rest, '0' ); ?>><?php _e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php _e( 'Sets the show_in_rest key for this taxonomy.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_query_var"><?php _e( 'Query Var', 'taxonomies' ); ?></label>
                <select name="taxonomy_query_var" id="taxonomy_query_var" tabindex="10">
                    <option value="1" <?php selected( $taxonomy_query_var, '1' ); ?>><?php _e( 'Yes', 'taxonomies' ); ?> (<?php _e( 'default', 'taxonomies' ); ?>)</option>
                    <option value="0" <?php selected( $taxonomy_query_var, '0' ); ?>><?php _e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php _e( 'Sets the query_var key for this taxonomy.', 'taxonomies' ); ?></p>
            </td>
        <tr>
            <td class="first">
                <label for="taxonomy_post_types"><?php _e( 'Post Types', 'taxonomies' ); ?></label>
                <p><?php _e( 'Select which post types will be associated with this taxonomy.', 'taxonomies' ); ?></p>
                <p><?php _e( 'You can also create a relationship with the default Posts/Pages or custom post types created by your theme or other plugins.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <input type="checkbox" tabindex="11" name="taxonomy_post_types[]" id="taxonomy_post_types_post" value="post" <?php checked( $taxonomy_post_types_post, 'post' ); ?> /> <label class="checkbox" for="taxonomy_post_types_post"><?php _e( 'Posts', 'taxonomies' ); ?></label><br />
                <input type="checkbox" tabindex="12" name="taxonomy_post_types[]" id="taxonomy_post_types_page" value="page" <?php checked( $taxonomy_post_types_page, 'page' ); ?> /> <label class="checkbox" for="taxonomy_post_types_page"><?php _e( 'Pages', 'taxonomies' ); ?></label><br />
                <?php
                $post_types = get_post_types(
                    array(
                        'public'   => true,
                        '_builtin' => false,
                    )
                );

                $i = 13;
                foreach ( $post_types as $post_type ) {
                    $checked = in_array( $post_type, $taxonomy_post_types ) ? 'checked="checked"' : '';
                    ?>
                    <input type="checkbox" tabindex="<?php echo $i; ?>" name="taxonomy_post_types[]" id="taxonomy_post_types_<?php echo $post_type; ?>" value="<?php echo $post_type; ?>" <?php echo $checked; ?> /> <label class="checkbox" for="taxonomy_post_types_<?php echo $post_type; ?>"><?php echo ucfirst( $post_type ); ?></label><br />
                    <?php
                    $i++;
                }
                ?>
            </td>
        </tr>
    </table>

<?php

	    