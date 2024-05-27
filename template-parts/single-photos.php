<?php

/*
 * Template Name: single-photos
 */

global $post; //Je déclare la variable post
$post_id = $post->ID;
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
$title = $title->ID;
$small_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
?>

<section class="team">
    <div class="détail">
        <h1>TEAM <br>MARIÉE</h1>
        <?php echo $title; ?>
        <ul>
            <li><strong>REFERENCE: </strong><?php echo get_post_meta($post_id, 'reference', true); ?> </li>
            <li><strong>CATEGORIE: </strong><?php echo array_shift(get_the_terms(get_the_ID(), 'categorie'))->name ?></li>
            <li><strong>FORMAT: </strong><?php echo array_shift(get_the_terms(get_the_ID(), 'format'))->name ?></li>
            <li><strong>TYPE: </strong><?php echo get_post_meta($post_id, 'type', true); ?> </li>
            <li><strong>ANNEE: </strong><?php echo get_post_meta($post_id, 'annee', true); ?> </li>
        </ul>
        <hr>
    </div>

    <div class="une-photo">
        <img src="<?php echo $feat_image; ?>" />
    </div>
</section>


<section class="contact">
    <div class="infos">
        <p><?php echo "Cette photo vous interesse?";   ?></p>
        <input class="styled myBtn2" type="button" value="Contact" href='#' />

        <?php get_template_part('template-parts/mini-photo'); ?>

</section>
<div class="trait">
    <hr>
</div>

<?php

$args_photos = array(
    'post_type' => 'photo',
    'category_name'  => '',
    'posts_per_page' => 10,
    'orderby' => 'rand',
    'order' => 'DESC',
    'paged' => 1,
);


$args_photos_query = new WP_Query($args_photos);

if ($args_photos_query->have_posts()) :
    while ($args_photos_query->have_posts()) : $args_photos_query->the_post();

    endwhile;
endif;

wp_reset_postdata();
?>

<?php get_template_part('template-parts/photo-block'); ?>

</section>