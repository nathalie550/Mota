<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://kit.fontawesome.com/9ce144fead.js" crossorigin="anonymous"></script>
    <title>Nathalie Mota</title>
    <?php wp_head(); ?>
</head>

<header>
    <nav>
        <div class="header">
            <img src="<?php echo get_stylesheet_directory_uri() . '/images/Logo.png'; ?> " alt="photo du logo">
            <?php wp_nav_menu([
                'theme_location' => 'header-menu',
                'container' => false,
                'menu_class' => 'liste menu'
            ])     ?>
        </div>
    </nav>
</header>