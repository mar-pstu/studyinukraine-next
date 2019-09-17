<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STUDYINUKRAINE_NEXT_SLUG . '_404',
    array(
        'title'            => __( '404', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Настройки страницы 404', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'panel'            => STUDYINUKRAINE_NEXT_SLUG
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_404_title',
    array(
        'default'           => __( 'Страница не найдена', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_404_title',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_404',
        'label'             => __( 'Заголовок', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_404_excerpt',
    array(
        'default'           => __( 'К сожалению страница не найдена. Проверьте правильность адреса или нажмите на любую ссылку выше.', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_404_excerpt',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_404',
        'label'             => __( 'Подзаголовок', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_404_thumbnail',
    array(
        'default'           =>  STUDYINUKRAINE_NEXT_URL . 'images/404.png',
        'transport'         => 'reset',
        // 'sanitize_callback' => 'sanitize_url',
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       STUDYINUKRAINE_NEXT_SLUG . '_404_thumbnail',
       array(
           'label'      => __( 'Лого', 'theme_name' ),
           'section'    => STUDYINUKRAINE_NEXT_SLUG . '_404',
           'settings'   => STUDYINUKRAINE_NEXT_SLUG . '_404_thumbnail'
       )
   )
);
