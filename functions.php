<?php
function theme_enqueue_styles()
{
    // Enqueue parent style
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('motaenfant-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), filemtime(get_stylesheet_directory() . '/style.css'));
}

/*THEME*/
function motaenfant_register_assets()
{
    wp_register_script('motaenfant', get_stylesheet_directory_uri() . '/js/script.js', array("jquery"), '1.0.0', '');
    wp_localize_script('motaenfant', 'script_data', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_enqueue_script('motaenfant');
}

function register_my_menus()
{
    register_nav_menu('header-menu', 'En tête du menu photographe enfant');
    register_nav_menu('main-menu', 'Menu principal');
    register_nav_menu('footer-menu', 'Pied de page photographe enfant');
}

/*RAJOUTER LA POLICE GOOGLE FONTS*/
function wpb_add_google_fonts()
{
    wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&family=Space+Mono&display=swap', false);
}

function montheme_supports()
{

    add_theme_support('post-thumbnails'); // Ajouter la prise en charge des images mises en avant
    set_post_thumbnail_size(2000, 400, true); // Définir d'autres tailles d'images
    add_image_size('products', 800, 600, false);
    add_image_size('mini', 256, 256, false);
    add_theme_support('menus');
    add_theme_support('custom-logo');
}


/*ACTIONS*/
add_action('wp_enqueue_scripts', 'theme_enqueue_styles'); // Chargement du thème
add_action('wp_enqueue_scripts', 'motaenfant_register_assets'); // Chargement de mon thème personnalisé
add_action('init', 'register_my_menus'); // Création de mon menu personnalisé
add_action('wp_enqueue_scripts', 'wpb_add_google_fonts'); //Ajout des polices Google fonts


function motaenfant_request_photos()
{
    $args_photos = array(
        'post_type' => 'photos',
        'category_name'  => 'Mariage',
        'posts_per_page' => 4,
        'orderby' => 'rand',
        'order' => 'DESC',
        'paged' => 1,
    );
    $query = new WP_Query($args_photos);
    if ($query->have_posts()) {
        $response = $query;
    } else {
        $response = false;
    }

    wp_send_json($response);
    wp_die();
}

add_action('wp_ajax_request_photos', 'motaenfant_request_photos');
add_action('wp_ajax_nopriv_request_photos', 'motaenfant_request_photos');
