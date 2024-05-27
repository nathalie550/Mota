<?php

/**
 * Template Name: deux-photos
 */

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
$feat_category = wp_get_attachment_url(wp_get_post_categories($category_id));
$reference = get_field('reference');
$terms = get_the_terms($post->ID, 'categorie');
?>

<section class="SectionPhotos">
    <?php
    $args_photos = array(
        'post_type'      => 'photo',
        'categorie' => 'Concert',
        'posts_per_page' => 2,
        'orderby'        => 'rand',
        'order'          => 'DESC',
        'paged'          => 1,
    ); ?>
    <h2>VOUS AIMEREZ AUSSI</h2> <?php echo $title; ?>

    <div class="CardPhotos">
        <div class="overlay-image">
            <?php echo the_post_thumbnail(null, 'full', array('class' => 'Overlay')); ?>
            <div class="hover-regular">
                <i class="fa-regular fa-eye"> </i>
            </div>
            <div class="hover-solid">
                <i class="fa-light fa-expand"></i>
            </div>
            <div class="ref-et-categorie">
                <?php echo '<p><span id="photo-ref">' . esc_html($reference) . '</span></p>'; ?>
                <p class="photo-categorie"><?php echo array_shift(get_the_terms(get_the_ID(), 'categorie'))->name ?></p>
            </div>
        </div>
    </div>

    <div class="overlay-image">
        <?php echo the_post_thumbnail(null, 'full', array('class' => 'Overlay')); ?>
        <div class="hover-regular">
            <i class="fa-regular fa-eye"> </i>
        </div>
        <div class="hover-solid">
            <i class="fa-light fa-expand"></i>
        </div>
        <div class="ref-et-categorie">
            <?php echo '<p><span id="photo-ref">' . esc_html($reference) . '</span></p>'; ?>
            <p class="photo-categorie"><?php echo array_shift(get_the_terms(get_the_ID(), 'categorie'))->name ?></p>
        </div>
    </div>
    </div>
</section>