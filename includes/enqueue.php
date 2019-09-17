<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };





/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function studyinukraine_next_scripts() {
	wp_enqueue_script( 'studyinukraine-next-main', STUDYINUKRAINE_NEXT_URL . 'scripts/main.min.js', array( 'jquery', 'fancybox' ), STUDYINUKRAINE_NEXT_VERSION, true );
	wp_localize_script( 'studyinukraine-next-main', 'studyinukraineTheme', array( 'toTopBtn' => 'Наверх' ) );
	wp_enqueue_script( 'lazyload', STUDYINUKRAINE_NEXT_URL . 'scripts/lazyload.min.js', array( 'jquery' ), '1.7.6', true );
	wp_enqueue_script( 'fancybox', STUDYINUKRAINE_NEXT_URL . 'scripts/fancybox.min.js', array( 'jquery' ), '3.3.5', true );
	wp_add_inline_script( 'fancybox', "jQuery( '.fancybox' ).fancybox();", 'after' );
	wp_add_inline_script( 'lazyload', "jQuery( '.lazy' ).lazy();", 'after' );
	wp_enqueue_script( 'headhesive', STUDYINUKRAINE_NEXT_URL . 'scripts/headhesive.min.js', array( 'jquery' ), '1.2.0', true );
	wp_add_inline_script( 'headhesive', "var header = new Headhesive( '#header', { offset: 500 } );", 'after' );
	wp_enqueue_script( 'superembed', STUDYINUKRAINE_NEXT_URL . 'scripts/superembed.min.js', array( 'jquery' ), '3.1', true );
	wp_register_script( 'slick', STUDYINUKRAINE_NEXT_URL . 'scripts/slick.min.js', array( 'jquery' ), '1.8.0', true );
}
add_action( 'wp_enqueue_scripts', 'studyinukraine_next_scripts' );









/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function studyinukraine_next_styles() {
	wp_enqueue_style( 'studyinukraine-next-main', STUDYINUKRAINE_NEXT_URL . 'styles/main.min.css', array(), STUDYINUKRAINE_NEXT_VERSION, 'all' );
	wp_enqueue_style( 'studyinukraine-next-font', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&amp;display=swap&amp;subset=cyrillic,cyrillic-ext', array(), STUDYINUKRAINE_NEXT_VERSION, 'all' );
	wp_register_style( 'slick', STUDYINUKRAINE_NEXT_URL . 'styles/slick.min.css', array(), '1.8.0', 'all' );
	wp_enqueue_style( 'fancybox', STUDYINUKRAINE_NEXT_URL . 'styles/fancybox.min.css', array(), '3.3.5', 'all' );
}
add_action( 'wp_enqueue_scripts', 'studyinukraine_next_styles', 10, 0 );






function studyinukraine_next_ctitical_styles() {
	if ( file_exists( STUDYINUKRAINE_NEXT_DIR . 'styles/critical.min.css' ) ) {
		echo '<style type="text/css">' . file_get_contents( STUDYINUKRAINE_NEXT_DIR . 'styles/critical.min.css' ) . '</style>';
	}
}
add_action( 'wp_head', 'studyinukraine_next_ctitical_styles', 10, 0 );