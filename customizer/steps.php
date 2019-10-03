<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STUDYINUKRAINE_NEXT_SLUG . '_steps',
    array(
        'title'            => __( 'Шаги', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'panel'            => STUDYINUKRAINE_NEXT_SLUG
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . '_steps_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_steps_flag',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_steps',
        'label'             => __( 'Использовать секцию', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . "_steps_title",
    array(
        'default'           => __( 'Шаги к поступлению', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . "_steps_title",
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_steps',
        'label'             => __( 'Заголовок секции', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . "_steps_label",
    array(
        'default'           => __( 'Узнать всё о процедуре поступления', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . '_steps_label',
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_steps',
        'label'             => __( 'Подпись кнопки с описанием', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . "_steps_page_id",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . "_steps_page_id",
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_steps',
        'label'             => __( 'Выбор страницы с описанием секции', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/


$wp_customize->add_setting(
    STUDYINUKRAINE_NEXT_SLUG . "_steps_number",
    array(
        'default'           => '3',
        'transport'         => 'reset'
    )
);
$wp_customize->add_control(
    STUDYINUKRAINE_NEXT_SLUG . "_steps_number",
    array(
        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_steps',
        'label'             => __( 'Количество шагов', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'type'              => 'number',
        'input_attrs'       => array(
            'min'             => '1',
            'max'             => '10',
        ),
    )
); /**/



for ( $i = 0; $i < get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . "_steps_number", 3 ); $i++ ) { 
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][title]",
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][title]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_steps',
            'label'             => __( 'Заголовок шага', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
            'type'              => 'text',
        )
    ); /**/
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][excerpt]",
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][excerpt]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_steps',
            'label'             => __( 'Описание шага', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
            'type'              => 'textarea',
        )
    ); /**/
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][page_id]",
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][page_id]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_steps',
            'label'             => __( 'Выбор страницы с описанием шага', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . '  ' . ( $i + 1 ),
            'type'              => 'dropdown-pages',
        )
    ); /**/
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][label]",
        array(
            'default'           => __( 'Подробней', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][label]",
        array(
            'section'           => STUDYINUKRAINE_NEXT_SLUG . '_steps',
            'label'             => __( 'Подпись кнопки', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
            'type'              => 'text',
        )
    ); /**/
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][src]",
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_url',
        )
    );
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][src]",
           array(
                'label'         => __( 'Лого шага', 'theme_name' ) . ' ' . ( $i + 1 ),
                'section'       => STUDYINUKRAINE_NEXT_SLUG . '_steps',
                'settings'      => STUDYINUKRAINE_NEXT_SLUG . "_steps[$i][src]",
           )
       )
    );

}