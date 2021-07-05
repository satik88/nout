<?php
/* ====================================
 * Plugin Name: Anti-Func
 * Description: Плагин для добавления сторонних кодов, чтобы не залезать в файл functions.php и не ронять сайт при не правильном коде. 
 * Plugin URI: https://www.youtube.com/watch?v=D5kbnrRSbQo
 * Author: Artem Abramovich
 * Author URI: http://artabr.ru/
 * Version: 1.0
 * ==================================== */



// СОЗДАЕМ МЕНЮ
add_action(
	'after_setup_theme',
	function () {
		register_nav_menus([
			'header-menu' => 'Верхняя область2',

		]);
	}
);
// Изменяет основные параметры меню
add_filter('wp_nav_menu_args', 'filter_wp_menu_args');
function filter_wp_menu_args($args)
{
	if ($args['theme_location'] === 'header-menu') {
		$args['container']  = false;
		$args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
		$args['menu_class'] = 'menu-categories';
	}
	return $args;
}
// Изменяем атрибут class у тега li
add_filter('nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4);
function filter_nav_menu_css_classes($classes, $item, $args, $depth)
{
	if ($args->theme_location === 'header-menu') {
		$classes = [
			'menu-categories__item'
		];
		if ($item->current) {
			$classes[] = 'menu-node--active';
		}
	}
	return $classes;
}
// Добавляем классы ссылкам
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);
function filter_nav_menu_link_attributes($atts, $item, $args, $depth)
{
	if ($args->theme_location === 'header-menu') {
		$atts['class'] = 'menu-categories__link';
		if ($item->current) {
			$atts['class'] .= ' menu-link--active';
		}
	}
	return $atts;
}
add_action(
	'after_setup_theme',
	function () {
		register_nav_menus([

			'header-menu2' => 'Верхняя область1',
		]);
	}
);
// Изменяет основные параметры меню
add_filter('wp_nav_menu_args', 'filter_wp_menu_args2');
function filter_wp_menu_args2($args)
{
	if ($args['theme_location'] === 'header-menu2') {
		$args['container']  = false;
		$args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
		$args['menu_class'] = 'menu__list';
	}
	return $args;
}
// Изменяем атрибут class у тега li
add_filter('nav_menu_css_class', 'filter_nav_menu_css_classes2', 10, 4);
function filter_nav_menu_css_classes2($classes, $item, $args, $depth)
{
	if ($args->theme_location === 'header-menu2') {
		$classes = [
			'menu__item'
		];
		if ($item->current) {
			$classes[] = 'menu-node--active';
		}
	}
	return $classes;
}
// Добавляем классы ссылкам
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes2', 10, 4);
function filter_nav_menu_link_attributes2($atts, $item, $args, $depth)
{
	if ($args->theme_location === 'header-menu2') {
		$atts['class'] = 'menu__link';
		if ($item->current) {
			$atts['class'] .= ' menu-link--active';
		}
	}
	return $atts;
}

// ВЫВОДИМ КАТЕГОРИИ НА ГЛАВНУЮ
function get_categories_product($categories_list = "")
{

	$get_categories_product = get_terms("product_cat", [
		"orderby" => "name", // Тип сортировки
		"order" => "ASC", // Направление сортировки
		"hide_empty" => 1, // Скрывать пустые. 1 - да, 0 - нет.
	]);

	if (count($get_categories_product) > 0) {

		$categories_list = '<ul class="categories__inner">';

		foreach ($get_categories_product as $categories_item) {
			$categories_item_id = $categories_item->term_id; //category ID
			$category_thumbnail_id = get_woocommerce_term_meta($categories_item_id, 'thumbnail_id', true);
			$thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);

			$categories_list .= '<a class="categories__item" href="' . esc_url(get_term_link((int)$categories_item->term_id)) . '">
								   <div class="categories__item-info">
									  <h4 class="categories__item-title">' . esc_html($categories_item->name) . '</h4>
									  <img src="' . $thumbnail_image_url . '" alt="">
									</div>
									
								  </a>';
		}

		$categories_list .= '</div>';
	}

	return $categories_list;
}

// Подключаем папку woocommerce
add_theme_support('woocommerce');

                    // СТРАНИЦА МАГАЗИНА(верх для страниц категорий и товаров) archive-product.php 

//хук структурированые данные ПОХОДУ микроразметка
/** @hooked WC_Structured_Data::generate_website_data() - 30 **/

                                // СТРАНИЦА КАТЕГОРИИ ТОВАРОВ archive-product.php
/**
* Hook: woocommerce_archive_description. (выводит метаданные в хедер страницы магазина)кажеться
* @hooked woocommerce_taxonomy_archive_description - 10
* @hooked woocommerce_product_archive_description - 10
*/

/**
* Hook: woocommerce_before_shop_loop.
* @hooked woocommerce_output_all_notices - 10
* @hooked woocommerce_result_count - 20
* @hooked woocommerce_catalog_ordering - 30
*/							
//хук обертка страницы товаров верх(мой хук)
add_action( 'woocommerce_before_shop_loop', 'woocommerce_before_shop_loop_div', 5 );
function woocommerce_before_shop_loop_div( $category ) {
	echo '<section class="catalog">
          <div class="container">
		  <div class="catalog__inner">';
}	
//хук обертка низ(мой хук)
add_action( 'woocommerce_after_shop_loop', 'woocommerce_before_shop_loop_divv', 90 );
function woocommerce_before_shop_loop_divv( $category ) {
	echo '</div>
	      </div>
	      </section>';
}


/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
//хук обертка товара верх(мой хук)
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
function woocommerce_template_loop_product_link_open() {
	global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<a class="products-item" href="' . esc_url( $link ) . '">
	      <p class="products-item__hover-text">посмотреть товар</p>';
}

/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
//хук обертка товара низ(мой хук)					
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
function woocommerce_template_loop_product_link_close() {
	global $product;
	echo '</a>
	      <button class="products-item__basket">
		  <a href="' . get_permalink($product->get_ID()) . '">
	      <img src="' .get_template_directory_uri(). '/assets/images/basket-white.svg" alt="">
		  </a>
          </button>';
}
// хук убрать кнопку добавить в корзину из категорий
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
function woocommerce_template_loop_add_to_cart() {
};

/**     Хук вывода названия товара
* Hook: woocommerce_shop_loop_item_title.
* @hooked woocommerce_template_loop_product_title - 10
*/
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
function woocommerce_template_loop_product_title() {
	echo '<h4 class="products-item__title">' . get_the_title() . '</h4>'; 
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**      Хук вывода картинки товара в категории  
* Hook: woocommerce_before_shop_loop_item_title.
* @hooked woocommerce_show_product_loop_sale_flash - 10     (не знаю)
* @hooked woocommerce_template_loop_product_thumbnail - 10  (вывод картинки товара в категории)
*/
// хз что за хук
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
function woocommerce_show_product_loop_sale_flash() {
	wc_get_template( 'loop/sale-flash.php' );
}
// Удалить ярлык «Распродажа»
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash()
{
    return false;
}
//хук вывода картинки
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
function woocommerce_template_loop_product_thumbnail() {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo woocommerce_get_product_thumbnail();
}
// ФИЛЬТР Редактируем изображение карточки товара()	
add_filter('woocommerce_get_image_size_thumbnail', 'add_thumbnail_size', 1, 10);
function add_thumbnail_size($size){
    $size['width'] = 300;
    $size['height'] = 300;
    $size['crop']   = 0; //0 - не обрезаем, 1 - обрезка
    return $size;
};

                                // СТРАНИЦА КАРТОЧКИ ТОВАРА 

// ОБЕРТКА ВЕРХ  content-single-product.php
add_action( 'woocommerce_before_single_product', 'action_function_name_1862', 10 );
function action_function_name_1862() {
	echo '<section class="product-card">
            <div class="container">';
}
// ОБЕРТКА НИЗ  content-single-product.php
add_action( 'woocommerce_after_single_product', 'action_function_name_1762', 10 );
function action_function_name_1762(){
	echo '  </div>
          </section>';
}
// Название продукта
add_action( 'woocommerce_before_single_product', 'action_function_name_product', 15 );
function action_function_name_product(){
	global $product;
	echo '<div class="form_zak-title">
	      <span>'.$product->get_name().'</span>
		  </div>';
}
// Сформируйте свой заказ:
add_action( 'woocommerce_before_single_product', 'action_function_zakaz', 20 );
function action_function_zakaz(){
	echo '<div class="form_zak">
	      <span>Сформируйте свой заказ:</span>
          </div>';
}

                                 // СТРАНИЦА КАРТОЧКИ ТОВАРА(ЛЕВАЯ КОЛОНКА)



// // ДЛЯ ЛОКАЛЬНОГО СЕРВЕРА
// update_option( 'siteurl', 'https://vw-mats.ru' );
// update_option( 'home', 'https://vw-mats.ru' );

// Увеличения вариаций
if ( ! defined( 'WC_MAX_LINKED_VARIATIONS' ) ) {
    define( 'WC_MAX_LINKED_VARIATIONS', 99999 );
    }
// ОТКЛЮЧАЕМ НЕНУЖНЫЕ ХУКИ удаляет хуки вывода блока последних товаров(И ДРУГИЕ)
add_action('after_setup_theme', 'my_remove_product_result_count', 99);
function my_remove_product_result_count()
{
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
	remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );	
	remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
	//Отключаем похожие продукты
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	//Отключаем табы
    // remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	//Отключаем флеш с картинки
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_show_product_sale_flash', 20 );
	//Отключаем тайтл с карточки товара
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	//Отключаем рейтинг с карточки товара
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	//Отключаем прайс с карточки товара
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	//Отключаем артикул с карточки товара
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	//Отключаем краткое описание с карточки товара
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	//Отключаем краткое описание с карточки товара
	remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
}
//хук хлебных крошек
/** @hooked woocommerce_breadcrumb - 20 **/
// ХУК-ФИЛЬТР изменяет хлебные крошки
add_filter('woocommerce_breadcrumb_defaults', 'breadcrumb_home_text');
function breadcrumb_home_text($defaults) {
    $defaults['home'] = 'Главная';
    $defaults['delimiter'] = '&nbsp;&nbsp;&gt;&nbsp;&nbsp;&nbsp;';
    $defaults['wrap_before'] = '<li class="breadcrumbs__list-item">';
    $defaults['wrap_after'] = '</li>';
    return $defaults;
}
//хук хлебных крошек
add_action( 'woocommerce_before_main_content', 'breadcrumb1', 15 );
function breadcrumb1() {
	echo '<div class="breadcrumbs">
          <div class="container">
          <ul class="breadcrumbs__list">';
}
//хук хлебных крошек
add_action( 'woocommerce_before_main_content', 'breadcrumb2', 25 );
function breadcrumb2() {
	echo '</ul>
          </div>
          </div>';
}
//Выводим описание выбраных вариаций на карточки товара
add_action( 'woocommerce_single_variation22', 'woocommerce_single_variation22', 10 );
function woocommerce_single_variation22() {
	echo '<div class="woocommerce-variation single_variation"></div>';
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 
    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
 
    return $tabs;
}