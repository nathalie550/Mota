<?php
/*
 * Template Name: home
 */
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
$feat_category = wp_get_attachment_url(wp_get_post_categories($category_id));
$reference = get_field('reference');
$terms = get_the_terms($post->ID, 'categorie');
?>
<?php get_header(); ?>

<main class="main-page">
    <div class="banner">
        <img src="<?php echo get_stylesheet_directory_uri() . '/images/Nathalie/nathalie-9.jpeg'; ?> " alt="photo du hero">
        <h1 class="text-over">PHOTOGRAPHE EVENT</h1>
    </div>


    <div class="liste-déroulante">
        <select class="catégorie-liste">
            <option value="Catégorie">Catégorie</option>
            <option value="Réception">Réception</option>
            <option value="Mariage">Mariage</option>
            <option value="Concert">Concert</option>
            <option value="Télévision">Télévision</option>
        </select>
        <select class="formats-liste">
            <option value="Formats">Formats</option>
            <option value="Paysage">Paysage</option>
            <option value="Portrait">Portrait</option>
        </select>
        <select class="trierPar-liste">
            <option value="Trier par">Trier par</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
        </select>
    </div>


    <?php get_template_part('template-parts/photo-block'); ?>
</main>
<?php get_footer(); ?>