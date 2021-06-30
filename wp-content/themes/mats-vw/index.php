<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mats-vw
 */

get_header();
?>

<section class="banner-section page-section">
    <div class="container">
      <div class="banner-section__inner">
        <!-- ЛЕВЫЙ БАНЕР-->
        <div class="banner-section__slider">
          <a class="banner-section__slider-item" href="#">
            <img class="banner-section__slider-img" src="<?php echo get_template_directory_uri();?>/assets/images/banner-slider.jpg" alt="">
          </a>
          <a class="banner-section__slider-item" href="#">
            <img class="banner-section__slider-img" src="<?php echo get_template_directory_uri();?>/assets/images/banner-slider.jpg" alt="">
          </a>
          <a class="banner-section__slider-item" href="#">
            <img class="banner-section__slider-img" src="<?php echo get_template_directory_uri();?>/assets/images/banner-slider.jpg" alt="">
          </a>
          <a class="banner-section__slider-item" href="#">
            <img class="banner-section__slider-img" src="<?php echo get_template_directory_uri();?>/assets/images/banner-slider.jpg" alt="">
          </a>
          <a class="banner-section__slider-item" href="#">
            <img class="banner-section__slider-img" src="<?php echo get_template_directory_uri();?>/assets/images/banner-slider.jpg" alt="">
          </a>
          <a class="banner-section__slider-item" href="#">
            <img class="banner-section__slider-img" src="<?php echo get_template_directory_uri();?>/assets/images/banner-slider.jpg" alt="">
          </a>
        </div>
        <!-- ПРАВЫЙ БАНЕР БАНЕР-->
        <div class="banner-section__item sale-item" >
        <?php echo do_shortcode( '[contact-form-7 id="106" title="Формачка" html_class="use-floating-validation-tip"]' );?>
        </div>
      </div>
    </div>
  </section>
<!-- БЛОК С КАТЕГОРИЯМИ -->

<section class="categories page-section">
    <div class="container">


    <?php echo get_categories_product(); ?>
    
      
    
    </div>
  </section>

  
<!-- БЛОК С КАТЕГОРИЯМИ(конец)-->
<?php

get_footer();
?>