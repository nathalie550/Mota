<?php
/*
 * Template Name: photo-block
 
* This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
$feat_category = wp_get_attachment_url(wp_get_post_categories($category_id));
$reference = get_field('reference');
$terms = get_the_terms($post->ID, 'categorie');
?>


<section class="SectionPhotos">
    <h2>VOUS AIMEREZ AUSSI</h2> <?php echo $title; ?>

    <?php

    $args_photos = array(
        'post_type' => 'photos',
        'category_name'  => 'Mariage',
        'posts_per_page' => 2,
        'orderby' => 'rand',
        'order' => 'DESC',
        'paged' => 1,
    );


    $args_photos_query = new WP_Query($args_photos);
    if ($args_photos_query->have_posts()) :


        echo '<div class="CardPhotos">';
        echo '<div class="overlay-image">';
        echo '<img class="Overlay"><?php echo wp_get_attachment_image( $feat_image,)'; ?>;
    echo '<?php the_post_thumbnail(); ?>';
    echo '<div class="hover-image">';
        echo '<a href="http://localhost:8888/evenementiel/photos/team-mariee/"></a>';
        echo '<i class="fa-regular fa-eye"> </i>';
        echo '<i class="fa-solid fa-magnifying-glass"></i>';
        echo '<p><span id="ref-photo">' . esc_html($reference) . '</span></p>'; ?>';
        echo '<p class="titre-photo categorie"><?php echo array_shift(get_the_terms(get_the_ID(), 'categorie'))->name ?></p>';
        echo '</div>';
    echo '</div>';

<?php while ($args_photos_query->have_posts()) : $args_photos_query->the_post();

        endwhile;
    endif;

    wp_reset_postdata();
?>



</section>