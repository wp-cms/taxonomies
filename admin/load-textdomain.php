<?php

namespace plugin\taxonomies;

function load_textdomain() {

    load_plugin_textdomain(
        domain: 'taxonomies',
	    plugin_rel_path: 'taxonomies/languages'
    );

}

add_action( 'plugins_loaded', 'plugin\taxonomies\load_textdomain' );
