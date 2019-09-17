<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> data-nav="inactive">
    <nav class="nav" id="nav">
      <?php
        if ( has_nav_menu( 'menu_main' ) ) {
          wp_nav_menu( array(
            'theme_location'  => 'menu_main',
            'menu'            => 'menu_main',
            'container'       => false,
            'menu_class'      => 'nav__list list',
            'echo'            => true,
            'depth'           => 2,
          ) );
        }
        echo studyinukraine_next\render_contacts_list( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_contacts', array() ) );
        if ( is_active_sidebar( 'side_nav' ) ) {
          echo "<hr>";
          dynamic_sidebar( 'side_nav' );
        }
      ?>
    </nav>
    <div class="wrapper" id="wrapper">
      <header class="wrapper__item wrapper__item--header header" id="header">
        <div class="container">
          <div class="row middle-xs">
            <div class="col-xs-8 col-sm-8 col-md-6 col-lg-3">
              <a class="bloginfo" href="<?php echo home_url( '/' ); ?>">
                <?php echo studyinukraine_next\get_custom_logo_img(); ?>
                <div class="name"><?php bloginfo( 'name' ); ?></div>
              </a>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-6 col-lg-9 text-right">
              <button class="burger" id="burger">
                <span class="bar bar1"></span>
                <span class="bar bar2"></span>
                <span class="bar bar3"></span>
                <span class="bar bar4"></span>
                <span class="sr-only"><?php _e( 'Открыть меню', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?></span>
              </button>
            </div>
          </div>
        </div>
      </header>
      <main class="wrapper__item wrapper__item--main main" id="main">
        <?php
          if ( ! wp_is_mobile() && is_singular( array( 'page', 'post' ) ) )
            if ( $main_bgi_id = get_post_meta( get_the_ID(), 'pstu_bgi', true ) )
              if ( $main_bgi_src = wp_get_attachment_image_url( $main_bgi_id, 'medium' ) ) {
                echo '<div class="main-bgi lazy" data-src="' . $main_bgi_src . '"></div>';
              }