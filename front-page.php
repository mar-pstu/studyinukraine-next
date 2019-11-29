<?php



get_header();


echo "</div>"; // закрытие .container


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


echo "<div class=\"container\">";


get_footer();