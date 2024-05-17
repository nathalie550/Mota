<?php
function theme_enqueue_styles()
{
    // Enqueue parent style
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('MotaEnfant-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), filemtime(get_stylesheet_directory() . '/style.css'));
}

/*THEME*/
function MotaEnfant_register_assets()
{
    wp_enqueue_script('MotaEnfant', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), true);
    wp_localize_script('MotaEnfant', 'ajaxurl', admin_url('admin-ajax.php'));
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
add_action('wp_enqueue_scripts', 'MotaEnfant_register_assets'); // Chargement de mon thème personnalisé
add_action('init', 'register_my_menus'); // Création de mon menu personnalisé
add_action('wp_enqueue_scripts', 'wpb_add_google_fonts'); //Ajout des polices Google fonts
