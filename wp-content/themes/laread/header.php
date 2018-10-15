<?php
/**
 * Header of the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Evmet laread
 * @author Evmet
 *
 * COPYRIGHT (c) 2016 Evmet. All rights reserved.
 * This  is  commercial  software,  only  users  who have purchased a valid
 * license  and  accept  to the terms of the  License Agreement can install
 * and use this program.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php laread_favicon(); ?>
<?php laread_twitter_card(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php laread_loading_box(); ?>
<?php laread_pushbar(); ?>

<div class="canvas">
    <div class="canvas-overlay"></div>
    <header>
        <nav class="navbar navbar-fixed-top nav-down navbar-laread">
            <div class="container">
                <div class="navbar-header">
                    <?php laread_site_logo(); ?>
                </div>

                <?php laread_pushbar_type(); ?>
                
                <button type="button" class="navbar-toggle collapsed menu-collapse" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only"><?php echo esc_html__('Toggle navigation','laread'); ?></span>
                    <i class="fa fa-plus"></i>
                </button>

                <a href="#" class="banner-search-close"><i class="fa fa-times"></i></a>
                <a href="#" class="banner-search"><i class="fa fa-search"></i></a>

                <form class="banner-search-form" method="get" action="<?php echo laread_HOME; ?>">
                  <input type="text" name="s" value="<?php echo get_search_query() ?>" placeholder="<?php echo esc_html__('Search','laread'); ?>">
                </form>

                <div class="collapse navbar-collapse" id="main-nav">

                  <?php if ( has_nav_menu( 'primary' ) ): ?>
                    <?php 
                        wp_nav_menu(array(
                          'theme_location' => 'primary',
                          'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>',
                          'container' => false,
                          'walker' => new laread_Nav_Walker
                         )); 
                    ?>

                  <?php endif; ?>
                  
                </div>
                
            </div>
        </nav>
    </header>