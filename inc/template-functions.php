<?php
/**
 * NTS-Auto functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NTS-Auto
 */

if ( ! function_exists( 'shop_nts_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   */
  function shop_nts_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array() );
  }
endif;
add_action( 'after_setup_theme', 'shop_nts_setup' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function shop_nts_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}
add_action( 'wp_head', 'shop_nts_pingback_header' );

// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function shop_nts_remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'shop_nts_remove_admin_login_header');

//Disable gutenberg style in Front
// function shop_nts_wp_deregister_styles() {
//   wp_dequeue_style( 'wp-block-library' );
//   wp_dequeue_style( 'wc-block-style' );
// }
// add_action( 'wp_print_styles', 'shop_nts_wp_deregister_styles', 100 );

// function shop_nts_menus() {

//   $locations = array(
//     'header'  => ( 'Меню в шапке' ),
//     'header-mobile'  => ( 'Меню в шапке (mobile)' ),
//     // 
//     'footer-company'  => ( 'Меню в подвале (Компания)' ),
//     'footer-information'  => ( 'Меню в подвале (Информация)' ),
//     'footer-help'  => ( 'Меню в подвале (Помощь)' ),
//   );

//   register_nav_menus( $locations );
// }

// add_action( 'init', 'shop_nts_menus' );

// /**
//  * Theme settings.
//  */
// if ( function_exists('acf_add_options_page') ) {
//   acf_add_options_page(array(
//     'page_title' 	=> 'Основные настройки сайта',
//     'menu_title'	=> 'Настройки сайта',
//     'menu_slug' 	=> 'theme-general-settings',
//     'capability'	=> 'manage_options',
//     'redirect'		=> false
//   ));
// }

// add_action('admin_menu', 'shop_nts_register_submenu_page');
// function shop_nts_register_submenu_page() {
// 	add_submenu_page( 
//     'edit.php?post_type=product',
//     'Страница подготовки импорта',
// 		'Подготовка импорта',
//     'manage_options',
// 		'admin.php?import=csv',
// 	);

// 	add_submenu_page( 
//     'edit.php?post_type=product',
//     'Страница импорта товаров',
// 		'Импорт товаров',
//     'manage_options',
// 		'edit.php?post_type=product&page=product_importer',
// 	);
// }