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


    <?php
    $args_photos = array(
        'post_type' => 'photos',
        'category_name'  => '',
        'posts_per_page' => 4,
        'orderby' => 'rand',
        'order' => 'DESC',
        'paged' => 1,
    );


    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>
            <section class="SectionPhotos">
                <h2>VOUS AIMEREZ AUSSI</h2> <?php echo $title; ?>

                <div class="CardPhotos">
                    <div class="overlay-image">
                        <img class="Overlay Image" src="<?php echo $feat_image; ?>" />
                        <?php echo the_post_thumbnail(); ?>

                        <div class="hover-image">
                            <i class="fa-regular fa-eye"> </i>
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <?php echo '<p><span id="ref-photo">' . esc_html($reference) . '</span></p>'; ?>
                            <p class="titre-photo categorie"><?php echo array_shift(get_the_terms(get_the_ID(), 'categorie'))->name ?></p>
                        </div>
                    </div>
                </div>

        <?php
        endwhile;
    endif;
        ?>
</main>

<?php get_footer(); ?>