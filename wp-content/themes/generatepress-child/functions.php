<?php
// Charger les styles du thème parent et du thème enfant
add_action('wp_enqueue_scripts', 'generatepress_child_enqueue_styles');



function generatepress_child_enqueue_styles()
{
    // Chargement du style.css du thème parent et enfant
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
}


function register_my_menus() {
    
    register_nav_menu('Menu-Footer',__( 'Footer Menu' ));
  }
    add_action( 'init', 'register_my_menus' );




/*
function cf7_generate_product_images_acf_free() {
    if (!function_exists('get_field')) {
        return '<p>Erreur : ACF n\'est pas activé.</p>';
    }

    $products = array(
        array('image' => get_field('image_produit_1'), 'name' => get_field('nom_produit_1')),
        array('image' => get_field('image_produit_2'), 'name' => get_field('nom_produit_2')),
        array('image' => get_field('image_produit_3'), 'name' => get_field('nom_produit_3')),
        array('image' => get_field('image_produit_4'), 'name' => get_field('nom_produit_4'))
    );

    $output = '<div class="image-row">';
    $count = 1;
    $found = false;
    $cf7_fields = '';

    foreach ($products as $product) {
        if (!empty($product['image'])) {
            $found = true;
            $img_url = esc_url($product['image']['url']);
            $alt_text = !empty($product['name']) ? esc_attr($product['name']) : 'Produit ' . $count;

            // Construction de l'affichage HTML + CF7
            $output .= '<div class="image-item">
                            <img src="' . $img_url . '" alt="' . $alt_text . '">
                            <label for="quantity-' . $count . '">Quantité :</label>
                            <input type="number" name="quantity-' . $count . '" class="quantite_commande" min="0" value="0">
                        </div>';
            
            // Stocke le champ CF7 correspondant pour l'insertion dans le formulaire CF7
            $cf7_fields .= '[number quantity-' . $count . ' class:quantite_commande min:0 "0"]' . "\n";
            $count++;
        }
    }

    if (!$found) {
        return '<p>Aucun produit ajouté.</p>';
    }

    $output .= '</div>';

    // Retourne le HTML des images + les champs CF7 correctement formatés
    return $output . '<div style="display:none;">' . do_shortcode($cf7_fields) . '</div>';
}
add_shortcode('cf7_product_images_acf_free', 'cf7_generate_product_images_acf_free');
*/



// Execution shortcodes dans CF7
add_filter('wpcf7_form_elements', function($content) {
    return do_shortcode($content);
});

// Récupérer les noms des produits ACF dans l'email de Contact Form 7
add_filter('wpcf7_special_mail_tags', function($output, $name, $html) {
    if (strpos($name, 'nom_produit_') !== false) {
        $index = str_replace('nom_produit_', '', $name);
        $acf_field = get_field('nom_produit_' . $index);
        return !empty($acf_field) ? $acf_field : "Produit " . $index;
    }
    return $output;
}, 10, 3);



// Fonction Produits Images CF7
function cf7_generate_product_images_acf() {
    if (!function_exists('get_field')) {
        return '<p>Erreur : ACF n\'est pas activé.</p>';
    }

    $products = array(
        array('image' => get_field('image_produit_1'), 'name' => get_field('nom_produit_1')),
        array('image' => get_field('image_produit_2'), 'name' => get_field('nom_produit_2')),
        array('image' => get_field('image_produit_3'), 'name' => get_field('nom_produit_3')),
        array('image' => get_field('image_produit_4'), 'name' => get_field('nom_produit_4'))
    );

    $output = '<div class="image-row">';
    $count = 1;
    $found = false;
    $cf7_fields = '';

    foreach ($products as $product) {
        if (!empty($product['image'])) {
            $found = true;
            $img_url = esc_url($product['image']['url']);
            $product_name = !empty($product['name']) ? esc_attr($product['name']) : 'Produit ' . $count;

            // Génération du champ hidden pour stocker le nom du produit
            $output .= '<div class="image-item">
                            <img src="' . $img_url . '" alt="' . $product_name . '">
                            <input type="hidden" name="nom_produit_' . $count . '" value="' . $product_name . '">
                            <input type="number" name="quantity-' . $count . '" class="quantite_commande" min="0" value="0">
                        </div>';
            
            // Stocker les champs pour CF7
            $cf7_fields .= '[hidden nom_produit_' . $count . ' "' . $product_name . '"]' . "\n";
            $cf7_fields .= '[number quantity-' . $count . ' class:quantite_commande min:0 "0"]' . "\n";
            $count++;
        }
    }

    if (!$found) {
        return '<p>Aucun produit ajouté.</p>';
    }

    $output .= '</div>';

    // Ajout des champs cachés pour CF7
    return $output . '<div style="display:none;">' . do_shortcode($cf7_fields) . '</div>';
}
add_shortcode('cf7_product_images_acf', 'cf7_generate_product_images_acf');




function add_admin_link_to_menu($items, $args) {
    // Vérifier si l'utilisateur est connecté et si c'est le bon menu
    if (is_user_logged_in() && $args->theme_location == 'primary') { 
        // Créer le lien "Admin"
        $admin_link = '<li class="menu-item"><a href="' . esc_url(admin_url()) . '">Admin</a></li>';

        // Séparer les éléments du menu en un tableau
        $menu_items = explode('</li>', $items);

        // Insérer le lien "Admin" en deuxième position (après le premier élément)
        array_splice($menu_items, 1, 0, $admin_link);

        // Reconstituer le menu
        $items = implode('</li>', $menu_items);
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'add_admin_link_to_menu', 10, 2);

