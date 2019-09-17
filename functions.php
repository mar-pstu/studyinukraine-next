<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'STUDYINUKRAINE_NEXT_URL', get_template_directory_uri() . '/' );
define( 'STUDYINUKRAINE_NEXT_DIR', get_template_directory() . '/' );
define( 'STUDYINUKRAINE_NEXT_TEXTDOMAIN', 'studyinukraine-next' );
define( 'STUDYINUKRAINE_NEXT_VERSION', '2.0.0' );
define( 'STUDYINUKRAINE_NEXT_SLUG', 'studyinukraine_next' );




get_template_part( 'includes/enqueue' );
get_template_part( 'includes/template-functions' );



if ( is_admin() ) {
    get_template_part( 'includes/metabox-bgi' );
    new StudyInUkraineNextBGIMetaboxClass();
}


if ( empty( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_form', '' ) ) ) {
    get_template_part( 'includes/feedback-form-ajax' );
    $feedback_form = new StudyInUkraineFeedbackFormAjaxClass(
        STUDYINUKRAINE_NEXT_SLUG,
        'jumbotron-feedback-form',
        STUDYINUKRAINE_NEXT_TEXTDOMAIN,
        get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_admin', get_bloginfo( 'admin_email' ) )
    );
    $feedback_form->run();
}



if ( is_customize_preview() ) {
    add_action( 'customize_register', function ( $wp_customize ) {
        $wp_customize->add_panel(
            STUDYINUKRAINE_NEXT_SLUG,
            array(
                'capability'      => 'edit_theme_options',
                'title'           => __( 'Настройки темы "StudyInUkraine"', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
                'priority'        => 200
            )
        );
        include get_theme_file_path( 'customizer/jumbotron.php' );
        include get_theme_file_path( 'customizer/reviews.php' );
        include get_theme_file_path( 'customizer/aboutus.php' );
        include get_theme_file_path( 'customizer/services.php' );
        include get_theme_file_path( 'customizer/sectors.php' );
        include get_theme_file_path( 'customizer/contacts.php' );
        include get_theme_file_path( 'customizer/404.php' );
    } );
}




function studyinukraine_next_theme_supports() {
    add_theme_support( 'menus' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_filter( 'widget_text', 'do_shortcode' );
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'studyinukraine_next_theme_supports' );





function studyinukraine_next_load_textdomain() {
    load_theme_textdomain( STUDYINUKRAINE_NEXT_TEXTDOMAIN, STUDYINUKRAINE_NEXT_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'studyinukraine_next_load_textdomain' );





function studyinukraine_next_register_nav_menus() {
    register_nav_menus( array(
        'menu_main'   => __( 'Главное меню', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'menu_404'    => __( 'Меню страницы 404', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
    ) );
}
add_action( 'after_setup_theme', 'studyinukraine_next_register_nav_menus' );






function studyinukraine_next_register_sidebars() {
    register_sidebar( array(
        'name'             => __( 'Правая колонка', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'id'               => 'side_column',
        'description'      => '',
        'class'            => '',
        'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12"><div id="%1$s" class="widget %2$s">',
        'after_widget'     => '</div></div>',
        'before_title'     => '<h3 class="widget__title">',
        'after_title'      => '</h3>',
    ) );
    register_sidebar( array(
        'name'             => __( 'Сайдбар меню навигации', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
        'id'               => 'side_nav',
        'description'      => '',
        'class'            => '',
        'before_widget'    => '<div id="%1$s" class="widget %2$s">',
        'after_widget'     => '</div>',
        'before_title'     => '<h3 class="widget__title">',
        'after_title'      => '</h3>',
    ) );
}
add_action( 'widgets_init', 'studyinukraine_next_register_sidebars' );







if ( function_exists( 'pll_register_string' ) ) {
    include get_theme_file_path( 'includes/register-strings.php' );
}