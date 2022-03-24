<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custom-medicine
 */

?>

<footer id="colophon" class="footer">
    <div class="footer-inner">
    <div class="container">
            <div class="footer-container">
                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    ?>
                </div>
                <nav>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer_menu',
                            'menu_id'        => 'footer-menu',
                        )
                    );
                    ?>
                </nav>
                <a class="learn-more-btn" href="#">
                    <img src="<?php echo get_template_directory_uri() . '/images/learn-more-btn.png'; ?>" alt="btn">
                    <span>Register</span></a>
            </div>
            <a class="copy" href="/"><img src="<?php echo get_template_directory_uri() . '/images/footer-logo.png'; ?>" alt="logo"></a>
        </div>
    </div>

</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>