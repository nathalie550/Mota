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
$reference = get_post_meta(get_the_ID(), 'reference', true);
$terms = get_the_terms($post->ID, 'categorie');
?>

<section class="SectionPhotos">
    <?php
    $args_photos = array(
        'post_type'      => 'photo',
        'categorie' => '',
        'posts_per_page' => 2,
        'orderby'        => 'rand',
        'order'          => 'DESC',
        'paged'          => 1,
    );

    $args_photos_query = new WP_Query($args_photos);
    if ($args_photos_query->have_posts()) :
        while ($args_photos_query->have_posts()) : $args_photos_query->the_post();
            $terms = get_the_terms(get_the_ID(), 'categorie');
            $term_name = is_array($terms) && !empty($terms) ? esc_html($terms[0]->name) : '';

            echo '<div class="CardPhotos">';
            echo '<div class="overlay-image">';
            echo get_the_post_thumbnail(null, 'mini', array('class' => 'Overlay'));
            echo '<div class="hover-regular">';
            echo '<a href="' . esc_url(get_the_permalink()) . '">';
            echo '<i class="fa-regular fa-eye"></i>';
            echo '</div>';
            echo '<div class="hover-solid">';
            echo '<i class="fa-light fa-expand"></i>';
            echo '</div>';
            echo '<div class="ref-et-categorie">';
            echo '<p><span id="photo-ref">' . esc_html(get_post_meta(get_the_ID(), 'reference', true)) . '</span></p>';
            echo '<p class="photo-categorie">' . $term_name . '</p>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        endwhile;
        wp_reset_postdata();
    endif;

    ?>
</section>