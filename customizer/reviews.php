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
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
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
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_textarea_field',
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
    $wp_customize->add_setting(
        STUDYINUKRAINE_NEXT_SLUG . "_reviews[$i][foto_id]",
        array(
            'default'           =>  STUDYINUKRAINE_NEXT_URL . 'images/reviews/default.jpg',
            'transport'         => 'reset',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           STUDYINUKRAINE_NEXT_SLUG . "_reviews[$i][foto_id]",
           array(
                'label'         => __( 'Фото', 'theme_name' ) . ' ' . ( $i + 1 ),
                'section'       => STUDYINUKRAINE_NEXT_SLUG . '_reviews',
                'settings'      => STUDYINUKRAINE_NEXT_SLUG . "_reviews[$i][foto_id]",
                'height'        => 100,
                'width'         => 100,
                'flex_width'    => false,
                'flex_height'   => false,
                'priority'      => 1
           )
       )
    );

}