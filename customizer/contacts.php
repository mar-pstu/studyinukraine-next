<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STUDYINUKRAINE_NEXT_SLUG . '_contacts',
    array(
        'title'            => __( 'Контакты', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Список контактов', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'panel'            => STUDYINUKRAINE_NEXT_SLUG
    )
); /**/


foreach ( array(
	'viber'     => __( 'Viber', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
	'whatsapp'  => __( 'WhatsApp', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
	'skype'     => __( 'Skype', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
	'facebook'  => __( 'Facebook', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
	'twitter'   => __( 'Twitter', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
	'email'     => __( 'Email', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
) as $key => $label ) {
	$wp_customize->add_setting(
	    STUDYINUKRAINE_NEXT_SLUG . "_contacts[$key]",
	    array(
	        'default'           => '',
	        'transport'         => 'reset'
	    )
	);
	$wp_customize->add_control(
	    STUDYINUKRAINE_NEXT_SLUG . "_contacts[$key]",
	    array(
	        'section'           => STUDYINUKRAINE_NEXT_SLUG . '_contacts',
	        'label'             => $label,
	        'type'              => 'text',
	    )
	); /**/
}