<?php



get_header();



foreach ( array(
    'jumbotron',
    'aboutus',
    'services',
    'sectors',
    'steps',
    'questions',
) as $key ) {
    if ( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . "_{$key}_flag", false ) )
        get_template_part( "parts/home/$key" );
}

get_footer();



?>