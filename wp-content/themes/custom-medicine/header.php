<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custom-medicine
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header id="masthead" class="header">
            <div class="container">
                <div class="header-inner">
                    <div class="site-branding">
                        <?php
                        the_custom_logo();
                        ?>
                    </div>

                    <div class="menu-wrapper">
                        <nav id="site-navigation" class="main-navigation">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'header_menu',
                                    'menu_id'        => 'header-menu',
                                )
                            );
                            ?>
                        </nav>
                        <a href="#" class="register-btn"><?php _e('Register', 'custom_medicine'); ?></a>
                        <ul class="language-switcher">
                            <?php pll_the_languages(array('dropdown' => 1)); ?>
                        </ul>
                    </div>
                    <button class="hamburger hamburger-desc hamburger--squeeze" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </header>