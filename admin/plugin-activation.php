<?php

namespace Core\Taxonomies;


register_activation_hook( __FILE__, 'taxonomies_plugin_activate_flush_rewrite' );


/**
 * Flush rewrite rules on plugin activation
 *
 * @since    1.0.0
 */
function taxonomies_plugin_activate_flush_rewrite() {
    register_taxonomies();
    flush_rewrite_rules();
}