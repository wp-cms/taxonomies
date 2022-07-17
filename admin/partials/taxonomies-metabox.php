<?php

wp_nonce_field( 'taxonomies_meta_box_nonce_action', 'taxonomies_meta_box_nonce_field' );

?>
    <table class="taxonomies">
        <tr>
            <td class="first">
                <label for="taxonomy_name"><span
                            class="required">*</span> <?php esc_html_e( 'Taxonomy Name', 'taxonomies' ); ?>
                </label>
                <input type="text" name="taxonomy_name" id="taxonomy_name" class="widefat" tabindex="1"
                       value="<?php echo esc_attr( $taxonomy_name ); ?>">
                <p><?php esc_html_e( 'The taxonomy slug, must not exceed 32 characters.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_hierarchical"><?php esc_html_e( 'Hierarchical', 'taxonomies' ); ?></label>
                <select name="taxonomy_hierarchical" id="taxonomy_hierarchical" tabindex="2">
                    <option value="0" <?php selected( $taxonomy_hierarchical, '0' ); ?>><?php esc_html_e( 'No', 'taxonomies' ); ?>
                        (<?php esc_html_e( 'default', 'taxonomies' ); ?>)
                    </option>
                    <option value="1" <?php selected( $taxonomy_hierarchical, '1' ); ?>><?php esc_html_e( 'Yes', 'taxonomies' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Is this taxonomy hierarchical like categories or not hierarchical like tags?', 'taxonomies' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="taxonomy_singular_name"><?php esc_html_e( 'Singular Name', 'taxonomies' ); ?></label>
                <input type="text" name="taxonomy_singular_name" id="taxonomy_singular_name" class="widefat"
                       tabindex="3" value="<?php echo esc_attr( $taxonomy_singular_name ); ?>"/>
                <p><?php esc_html_e( 'A singular descriptive name for the taxonomy.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_label"><?php esc_html_e( 'Plural Label', 'taxonomies' ); ?></label>
                <input type="text" name="taxonomy_label" id="taxonomy_label" class="widefat" tabindex="4"
                       value="<?php echo esc_attr( $taxonomy_label ); ?>"/>
                <p><?php esc_html_e( 'A plural descriptive name for the taxonomy.', 'taxonomies' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="taxonomy_rewrite"><?php esc_html_e( 'Rewrite', 'taxonomies' ); ?></label>
                <select name="taxonomy_rewrite" id="taxonomy_rewrite" tabindex="5">
                    <option value="1" <?php selected( $taxonomy_rewrite, '1' ); ?>><?php esc_html_e( 'Yes', 'taxonomies' ); ?>
                        (<?php esc_html_e( 'default', 'taxonomies' ); ?>)
                    </option>
                    <option value="0" <?php selected( $taxonomy_rewrite, '0' ); ?>><?php esc_html_e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Triggers the handling of rewrites for this taxonomy.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_custom_rewrite_slug"><?php esc_html_e( 'Custom Rewrite Slug', 'taxonomies' ); ?></label>
                <input type="text" name="taxonomy_custom_rewrite_slug" id="taxonomy_custom_rewrite_slug" class="widefat"
                       tabindex="6" value="<?php echo esc_attr( $taxonomy_custom_rewrite_slug ); ?>"/>
                <p><?php esc_html_e( 'Customize the link slug.', 'taxonomies' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="taxonomy_show_ui"><?php esc_html_e( 'Show UI', 'taxonomies' ); ?></label>
                <select name="taxonomy_show_ui" id="taxonomy_show_ui" tabindex="7">
                    <option value="1" <?php selected( $taxonomy_show_ui, '1' ); ?>><?php esc_html_e( 'Yes', 'taxonomies' ); ?>
                        (<?php esc_html_e( 'default', 'taxonomies' ); ?>)
                    </option>
                    <option value="0" <?php selected( $taxonomy_show_ui, '0' ); ?>><?php esc_html_e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Whether to generate a default UI for managing this taxonomy in the admin.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_show_admin_column"><?php esc_html_e( 'Admin Column', 'taxonomies' ); ?></label>
                <select name="taxonomy_show_admin_column" id="taxonomy_show_admin_column" tabindex="8">
                    <option value="1" <?php selected( $taxonomy_show_admin_column, '1' ); ?>><?php esc_html_e( 'Yes', 'taxonomies' ); ?>
                        (<?php esc_html_e( 'default', 'taxonomies' ); ?>)
                    </option>
                    <option value="0" <?php selected( $taxonomy_show_admin_column, '0' ); ?>><?php esc_html_e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Show this taxonomy as a column in the custom post listing.', 'taxonomies' ); ?></p>
            </td>
        </tr>
        <tr>
            <td class="first">
                <label for="taxonomy_show_in_rest"><?php esc_html_e( 'Show in REST', 'taxonomies' ); ?></label>
                <select name="taxonomy_show_in_rest" id="taxonomy_show_in_rest" tabindex="9">
                    <option value="1" <?php selected( $taxonomy_show_in_rest, '1' ); ?>><?php esc_html_e( 'Yes', 'taxonomies' ); ?>
                        (<?php esc_html_e( 'default', 'taxonomies' ); ?>)
                    </option>
                    <option value="0" <?php selected( $taxonomy_show_in_rest, '0' ); ?>><?php esc_html_e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Sets the show_in_rest key for this taxonomy.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <label for="taxonomy_query_var"><?php esc_html_e( 'Query Var', 'taxonomies' ); ?></label>
                <select name="taxonomy_query_var" id="taxonomy_query_var" tabindex="10">
                    <option value="1" <?php selected( $taxonomy_query_var, '1' ); ?>><?php esc_html_e( 'Yes', 'taxonomies' ); ?>
                        (<?php esc_html_e( 'default', 'taxonomies' ); ?>)
                    </option>
                    <option value="0" <?php selected( $taxonomy_query_var, '0' ); ?>><?php esc_html_e( 'No', 'taxonomies' ); ?></option>
                </select>
                <p><?php esc_html_e( 'Sets the query_var key for this taxonomy.', 'taxonomies' ); ?></p>
            </td>
        <tr>
            <td class="first">
                <label for="taxonomy_post_types"><?php esc_html_e( 'Post Types', 'taxonomies' ); ?></label>
                <p><?php esc_html_e( 'Select which post types will be associated with this taxonomy.', 'taxonomies' ); ?></p>
                <p><?php esc_html_e( 'You can also create a relationship with the default Posts/Pages or custom post types created by your theme or other plugins.', 'taxonomies' ); ?></p>
            </td>
            <td>
                <input type="checkbox" tabindex="11" name="taxonomy_post_types[]" id="taxonomy_post_types_post"
                       value="post" <?php checked( $taxonomy_post_types_post, 'post' ); ?> /> <label class="checkbox"
                                                                                                     for="taxonomy_post_types_post"><?php esc_html_e( 'Posts', 'taxonomies' ); ?></label><br/>
                <input type="checkbox" tabindex="12" name="taxonomy_post_types[]" id="taxonomy_post_types_page"
                       value="page" <?php checked( $taxonomy_post_types_page, 'page' ); ?> /> <label class="checkbox"
                                                                                                     for="taxonomy_post_types_page"><?php esc_html_e( 'Pages', 'taxonomies' ); ?></label><br/>
				<?php
				$cpts = get_post_types(
					array(
						'public'   => true,
						'_builtin' => false,
					)
				);

				$i = 13;
				foreach ( $cpts as $cpt ) {
					$checked = in_array( $cpt, $taxonomy_post_types ) ? 'checked="checked"' : '';
					?>
                    <input type="checkbox" tabindex="<?php echo esc_attr( $i ); ?>" name="taxonomy_post_types[]"
                           id="taxonomy_post_types_<?php echo esc_attr( $cpt ); ?>"
                           value="<?php echo esc_attr( $cpt ); ?>" <?php echo esc_html( $checked ); ?> /> <label
                            class="checkbox"
                            for="taxonomy_post_types_<?php echo esc_attr( $cpt ); ?>"><?php echo esc_html( ucfirst( $cpt ) ); ?></label>
                    <br/>
					<?php
					$i ++;
				}
				?>
            </td>
        </tr>
    </table>
<?php
