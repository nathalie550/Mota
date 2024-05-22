<?php

/**
 * Template Name: two_photos
 */

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
$feat_category = wp_get_attachment_url(wp_get_post_categories($category_id));
$reference = get_field('reference');
$terms = get_the_terms($post->ID, 'categorie');
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

</section>