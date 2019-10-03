<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


$steps = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . "_steps", array() );
  

if ( ! empty( $steps ) ) {

  $title = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . "_steps_title", __( 'Шаги к поступлению', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) );
  $label = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . "_steps_label", __( 'Узнать всё о процедуре поступления', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) );
  $page_id = studyinukraine_next\get_translate_id( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . "_steps_page_id", '' ), 'page' );


  if ( function_exists( 'pll__' ) ) {
    $title = pll__( $title );
    $label = pll__( $label );
    for ( $i = 0; $i < get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . "_steps_number", 3 ) ; $i++ ) {
      foreach ( array( 'title', 'excerpt', 'label' ) as $key ) {
        if ( ! empty( $steps[ $i ][ $key ] ) ) {
          switch ( $key ) {
            case 'page_id':
              $steps[ $i ][ $key ] = studyinukraine_next\get_translate_id( $steps[ $i ][ 'page_id' ], 'page' );
              break;
            default:
              $steps[ $i ][ $key ] = pll__( $steps[ $i ][ $key ] );
              break;
          }
        }
      }
    }
  }

  include get_theme_file_path( 'views/home/steps.php' );

}