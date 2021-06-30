<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mats-vw
 */

?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>
<!-- <body <?php body_class(); ?>> -->

<body>
  <header class="header">

    <div class="header__top">
      <div class="container">
        <div class="header__top-inner">
          <nav class="menu">
            <?php wp_nav_menu(['theme_location' => 'header-menu2',]); ?>
          </nav>
          <a class="logo" href="#">
            <img class="logo__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="">
          </a>
          <div class="header__box">
            <p class="header__adress">
              8-800-222-64-33
            </p>
            <ul class="user-list">
              <li class="user-list__item">
                <a class="user-list__link" href="#">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart.svg" alt="">
                </a>
              </li>
              <li class="user-list__item">
                <a class="user-list__link" href="#">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.svg" alt="">
                </a>
              </li>
              <li class="user-list__item">
                <a class="user-list__link basket" href="#">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/basket.svg" alt="">
                  <p class="basket__nam cart_totals"><?php echo WC()->cart->get_cart_contents_count(); ?></p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header__bottom">
      <div class="container">
        <?php
        wp_nav_menu([
          'theme_location' => 'header-menu',
        ]); ?>
      </div>
    </div>
  </header>