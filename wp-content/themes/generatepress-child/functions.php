<?php
/**
 * Générer les styles du thème parent.
 */
function generatepress_child_enqueue_styles() {
    wp_enqueue_style(
        'generatepress-parent-style',
        get_template_directory_uri() . '/style.css'
    );
}
add_action( 'wp_enqueue_scripts', 'generatepress_child_enqueue_styles' );
