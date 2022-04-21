<?php

namespace Core\Taxonomies;

/**
 * Define the locale for this plugin for internationalization.
 *
 * Uses the taxonomies_i18n class in order to set the domain and to register the hook
 * with WordPress.
 *
 * @since    1.0.0
 * @access   private
 */

function load_taxonomies_textdomain() {

    load_plugin_textdomain(
        'taxonomies',
        'taxonomies/languages/'
    );

}

add_action( 'plugins_loaded', 'Core\PostTypes\load_textdomain' );
