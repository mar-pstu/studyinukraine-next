<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STUDYINUKRAINE_NEXT_SLUG . '_sectors',
    array(
        'title'            => __( 'Области знаний', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'panel'            => STUDYINUKRAINE_NEXT_SLUG
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_sectors_flag',
    array(
        'default'           => false,
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_sectors_flag',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_sectors',
        'label'             => __( 'Использовать секцию', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_sectors_title',
    array(
        'default'           => __( 'Области знаний', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_sectors_title',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_sectors',
        'label'             => __( 'Заголовок', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_sectors_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_sectors_page_id',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_sectors',
        'label'             => __( 'Выбор страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/