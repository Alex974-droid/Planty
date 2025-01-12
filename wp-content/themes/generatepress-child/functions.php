<?php
// Charger les styles du thème parent et du thème enfant
add_action('wp_enqueue_scripts', 'generatepress_child_enqueue_styles');

function generatepress_child_enqueue_styles()
/*{
    // Charger le style du thème parent
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css',
        array(),
        filemtime(get_template_directory() . '/style.css')
    );

    // Charger le style du thème enfant (dans /css/generatepress.css)
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/css/generatepress.css',
        array('parent-style'),
        filemtime(get_stylesheet_directory() . '/css/generatepress.css') 
    );
}
*/
{
    // Chargement du style.css du thème parent et enfant
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));


}


