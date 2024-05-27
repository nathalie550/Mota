<div class="gallery">
    <div class="previous-photo">
        <?php echo get_the_post_thumbnail(get_previous_post(), 'thumbnail'); ?>
        <?php echo get_the_post_thumbnail(get_next_post(), 'thumbnail'); ?>

        <div class="fleches">
            <?php if (get_previous_post()) : ?>
                <?php $previous_post = get_previous_post(); ?>
                <a href="<?php echo get_permalink($previous_post); ?>" class="nav-link2">
                    <!-- Utilisation de Font Awesome pour la flèche de navigation -->
                    <i class="fas fa-arrow-left"></i>
                    <?php $previous_thumbnail_url = get_the_post_thumbnail_url($previous_post->ID, 'thumbnail'); ?>
                    <?php if ($previous_thumbnail_url) : ?>
                    <?php endif; ?>
                </a>
            <?php endif; ?>


            <?php if (get_next_post()) : ?>
                <?php $next_post = get_next_post(); ?>
                <a href="<?php echo get_permalink($next_post); ?>" class="nav-link2">
                    <!-- Utilisation de Font Awesome pour la flèche de navigation -->
                    <i class="fas fa-arrow-right"></i>
                    <?php $next_thumbnail_url = get_the_post_thumbnail_url($next_post->ID, 'thumbnail'); ?>
                    <?php if ($next_thumbnail_url) : ?>
                    <?php endif; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>