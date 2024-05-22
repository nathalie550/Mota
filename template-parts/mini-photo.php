<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
?>
        <div class="post__navigation">
            <div class="post-navigation__previous-thumbnail">
                <?php echo get_the_post_thumbnail(get_previous_post(), 'single-photo-thumbnail-size'); ?>
            </div>
            <div class="post-navigation__next-thumbnail">
                <?php echo get_the_post_thumbnail(get_next_post(), 'single-photo-thumbnail-size'); ?>
                <div class="post-navigation__arrows">
                    <div class="post-navigation__previous-arrow">
                        <?php previous_post_link(' %link', '&#10229;'); ?>
                    </div>
                    <div class="post-navigation__next-arrow">
                        <?php next_post_link(' %link', '&#10230;'); ?>
                    </div>
                </div>
            </div>
        </div>

<?php
    endwhile;
endif;
?>
</div>
</div>