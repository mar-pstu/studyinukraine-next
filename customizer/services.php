<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STUDYINUKRAINE_NEXT_SLUG . '_services',
    array(
        'title'            => __( 'Услуги', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'panel'            => STUDYINUKRAINE_NEXT_SLUG
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_services_flag',
    array(
        'default'           => false,
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_services_flag',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_services',
        'label'             => __( 'Использовать секцию', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_services_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_services_page_id',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_services',
        'label'             => __( 'Выбор страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/