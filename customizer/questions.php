<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STUDYINUKRAINE_NEXT_SLUG . '_questions',
    array(
        'title'            => __( 'Есть вопросы?', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Контактная форма подвала страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'panel'            => STUDYINUKRAINE_NEXT_SLUG
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_questions_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_questions_flag',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_questions',
        'label'             => __( 'Использовать секцию', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_questions_title',
    array(
        'default'           => __( 'Остались вопросы? Позвоните нам!', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_questions_title',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_questions',
        'label'             => __( 'Заголовок', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_questions_feedback_form',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_questions_feedback_form',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_questions',
        'label'             => __( 'Шорткод формы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_questions_feedback_admin',
    array(
        'default'           => get_bloginfo( 'admin_email' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_questions_feedback_admin',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_questions',
        'label'             => __( 'Email админа (если используется форма темы)', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_questions_thumbnail',
    array(
        'default'           =>  STUDYINUKRAINE_NEXT_URL . 'images/customer-support.png',
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       STUDYINUKRAINE_NEXT_SLUG . '_questions_thumbnail',
       array(
           'label'      => __( 'Превью', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
           'section'    => STUDYINUKRAINE_NEXT_SLUG . '_questions',
           'settings'   => STUDYINUKRAINE_NEXT_SLUG . '_questions_thumbnail'
       )
   )
);