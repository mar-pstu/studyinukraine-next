<?php









foreach ( array(
    '404_title',
    '404_excerpt',
    'jumbotron_title',
    'jumbotron_excerpt',
    'jumbotron_label',
    'jumbotron_feedback_title',
    'jumbotron_feedback_form',
    'sectors_title',
) as $key ) {
    $value = wp_strip_all_tags( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_' . $key, '' ) );
    if ( ! empty( $value ) ) {
        pll_register_string( $key, $value, STUDYINUKRAINE_NEXT_TEXTDOMAIN, false );
    }
}





/**
 * Регистрация строк для перевода блока "Отзывы"
 */
if ( ! empty( $reviews = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_reviews', array() ) ) ) {
	for ( $i=0; $i<count( $reviews ); $i++ ) { 
		if ( ! empty( $reviews[ $i ][ 'text' ] ) ) pll_register_string( 'review_text_' . ( $i + 1 ), $reviews[ $i ][ 'text' ], STUDYINUKRAINE_NEXT_TEXTDOMAIN, false );
		if ( ! empty( $reviews[ $i ][ 'author' ] ) ) pll_register_string( 'review_author_' . ( $i + 1 ), $reviews[ $i ][ 'author' ], STUDYINUKRAINE_NEXT_TEXTDOMAIN, false );
	}
}








/**
* Перевод подписей кнопок секции главной страницы "О нас"
*/
if ( ! empty( $aboutus_entries = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_aboutus', array() ) ) ) {
	for ( $i=0; $i<count( $aboutus_entries ); $i++ ) { 
		if ( ! empty( $aboutus_entries[ $i ][ 'label' ] ) ) pll_register_string( 'aboutus_label_' . ( $i + 1 ), $aboutus_entries[ $i ][ 'label' ], STUDYINUKRAINE_NEXT_TEXTDOMAIN, false );
	}
}




/**
* Перевод контактов
*/
if ( ! empty( $contacts = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_contacts', array() ) ) ) {
	foreach ( $contacts as $key => $value ) {
		pll_register_string( "contacts_$key", $value, STUDYINUKRAINE_NEXT_TEXTDOMAIN, false );
	}
}


