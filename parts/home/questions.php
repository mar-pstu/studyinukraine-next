<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };



$title = ( empty( $title = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_questions_title', '' ) ) ) ? __( 'Остались вопросы? Позвоните нам!', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) : $title;

$src = ( empty( $src = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_questions_thumbnail', '' ) ) ) ? STUDYINUKRAINE_NEXT_URL . 'images/customer-support.png' : $src;

$alt = esc_attr( $title );

$form = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_questions_feedback_form', '' );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$form = pll__( $form );
}



include get_theme_file_path( 'views/home/questions.php' );