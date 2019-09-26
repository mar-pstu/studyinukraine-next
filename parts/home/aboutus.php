<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


$sections = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_aboutus', array() );



if ( ! empty( $sections ) ) {
	foreach ( $sections as $section ) {
		$page_id = studyinukraine_next\get_translate_id( $section[ 'page_id' ], 'page' );
		if ( ! empty( $page_id ) ) {
			$direction_class = ( isset( $section[ 'reversing' ] ) && $section[ 'reversing' ] ) ? 'reversing' : '';
			$thumbnail_src = false;
			$thumbnail_alt = '';
			$title = get_the_title( $page_id );
			if ( isset( $section[ 'excerpt' ] ) && ! empty( $section[ 'excerpt' ] ) ) {
				$excerpt = ( function_exists( 'pll__' ) ) ? pll__( $section[ 'excerpt' ] ) : $section[ 'excerpt' ];
			} else {
				$excerpt = get_the_excerpt( $page_id );
			}
			if ( isset( $section[ 'thumbnail' ] ) ) {
				$thumbnail_alt = esc_attr( $title );
				$thumbnail_src = $section[ 'thumbnail' ];
			} elseif ( has_post_thumbnail( $page_id ) ) {
				$thumbnail_src = get_the_post_thumbnail_url( $page_id, 'medium' );
				$thumbnail_alt = wp_get_attachment_caption( get_post_thumbnail_id( $page_id ) );
			}
			$label = ( isset( $section[ 'label' ] ) ) ? $section[ 'label' ] : __( 'Подробней', STUDYINUKRAINE_NEXT_TEXTDOMAIN );
			$permalink = get_permalink( $page_id );
			if ( function_exists( 'pll__' ) ) {
				$label = pll__( $label );
			}
			include get_theme_file_path( 'views/section.php' );
		}
	}
}