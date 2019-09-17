<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STUDYINUKRAINE_NEXT_SLUG . '_reviews',
    array(
        'title'            => __( 'Отзывы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Блок отзывов клиентов', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'panel'            => STUDYINUKRAINE_NEXT_SLUG
    )
); /**/


for ( $i=0; $i<5; $i++ ) { 
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_reviews[$i][author]",
        array(
            'default'           => '',
            'transport'         => 'reset'
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_reviews[$i][author]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_reviews',
            'label'             => __( 'Автор', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
            'type'              => 'text',
        )
    ); /**/
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_reviews[$i][text]",
        array(
            'default'           => '',
            'transport'         => 'reset'
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_reviews[$i][text]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_reviews',
            'label'             => __( 'Отзыв', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
            'type'              => 'textarea',
        )
    ); /**/
}