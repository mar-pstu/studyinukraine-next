<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STUDYINUKRAINE_NEXT_SLUG . '_aboutus',
    array(
        'title'            => __( 'О нас', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'panel'            => STUDYINUKRAINE_NEXT_SLUG
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_aboutus_flag',
    array(
        'default'           => false,
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_aboutus_flag',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_aboutus',
        'label'             => __( 'Использовать секцию', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


for ( $i=0; $i<2; $i++ ) { 
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][thumbnail]",
        array(
            'default'           => '',
            'transport'         => 'reset'
        )
    );
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][thumbnail]",
           array(
               'label'      => __( 'Превью', 'theme_name' ),
               'section'    => STUDYINUKRAINE_NEXT_SLUG . '_aboutus',
               'settings'   => STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][thumbnail]"
           )
       )
    );
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][page_id]",
        array(
            'default'           => '',
            'transport'         => 'reset'
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][page_id]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_aboutus',
            'label'             => __( 'Выбор страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
            'type'              => 'dropdown-pages',
        )
    ); /**/
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][label]",
        array(
            'default'           => __( 'Подробней', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][label]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_aboutus',
            'label'             => __( 'Текст кнопки', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
            'type'              => 'text',
        )
    ); /**/
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][excerpt]",
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][excerpt]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_aboutus',
            'label'             => __( 'Описание', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
            'type'              => 'textarea',
        )
    ); /**/
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][reverse]",
        array(
            'default'           => false,
            'transport'         => 'reset'
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_aboutus[$i][reverse]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_aboutus',
            'label'             => __( 'Обратный порядок', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
            'type'              => 'checkbox',
        )
    ); /**/
}