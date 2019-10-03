<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
    array(
        'title'            => __( 'Первый экран', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'panel'            => STUDYINUKRAINE_NEXT_SLUG
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_flag',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
        'label'             => __( 'Использовать секцию', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_page_id',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
        'label'             => __( 'Выбор страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_title',
    array(
        'default'           => get_bloginfo( 'name' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_title',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
        'label'             => __( 'Заголовок', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_excerpt',
    array(
        'default'           => get_bloginfo( 'description' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_excerpt',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
        'label'             => __( 'Описание', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_label',
    array(
        'default'           => __( 'Подробней', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_label',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
        'label'             => __( 'Текст кнопки', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/




$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_thumbnail',
    array(
        'default'           =>  STUDYINUKRAINE_NEXT_URL . '/images/jumbotron/thumbnail.png',
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_thumbnail',
       array(
           'label'      => __( 'Превью', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
           'section'    => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
           'settings'   => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_thumbnail'
       )
   )
);



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_title',
    array(
        'default'           => __( 'Подать заявку на поступление', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_title',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
        'label'             => __( 'Заголовок формы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/




$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_form',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_form',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
        'label'             => __( 'Шорткод формы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/




$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_admin',
    array(
        'default'           => get_bloginfo( 'admin_email' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_admin',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
        'label'             => __( 'Email админа (если используется форма темы)', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/




$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_reviews_flag',
    array(
        'default'           => false,
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_reviews_flag',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_jumbotron',
        'label'             => __( 'Публиковать отзывы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/




