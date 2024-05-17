<footer>
    <div class="footer">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'menu_class' => 'my-footer-menu',
        ));    ?>
    </div>
    <?php get_template_part('template-parts/modale'); ?>
</footer>
</body>

</html>