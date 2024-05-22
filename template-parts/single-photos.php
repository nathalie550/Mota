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
            <li><strong>REFERENCE: </strong><?php echo get_post_meta($post_id, 'ref', true); ?> </li>
            <li><strong>CATEGORIE: </strong><?php echo get_post_meta($post_id, 'categorie', true); ?> </li>
            <li><strong>FORMAT: </strong><?php echo get_post_meta($post_id, 'format', true); ?> </li>
            <li><strong>TYPE: </strong><?php echo get_post_meta($post_id, 'TYPE', true); ?> </li>
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



        <div class="mini">
            <img src="<?php echo $feat_image; ?>" />
            <?php $prev_post = get_previous_post();
            echo ' <a href="' . get_permalink($prev_post) . '"> ' . esc_html($prev_post->$feat_image) . '</a>'; ?>

            <div class="hover-fleches">

                <img class="arrow-left" src="<?php echo get_stylesheet_directory_uri() . '/images/arrow_left.png'; ?>" />
                <?php $next_post = get_next_post();
                echo ' <a href="' . get_permalink($next_post) . '"> ' . esc_html($next_post->post_title) . '</a>'; ?>
                <img class="arrow-right" src="<?php echo get_stylesheet_directory_uri() . '/images/arrow_right.png'; ?>" />
            </div>
        </div>
    </div>
</section>
<div class="trait">
    <hr>
</div>




<?php

$args_photos = array(
    'post_type' => 'photos',
    'category_name'  => 'Mariage',
    'posts_per_page' => 4,
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

<?php get_template_part('template-parts/deux-photos'); ?>

</section>