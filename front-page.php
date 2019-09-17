<?php



get_header();


if ( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_flag', false ) ) get_template_part( 'parts/home/jumbotron' );
if ( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_aboutus_flag', false ) ) get_template_part( 'parts/home/aboutus' );
if ( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_services_flag', false ) ) get_template_part( 'parts/home/services' );
if ( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_sectors_flag', false ) ) get_template_part( 'parts/home/sectors' );


get_footer();



?>