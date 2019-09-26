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
        echo studyinukraine_next\get_languages_list();
        if ( has_nav_menu( 'menu_main' ) ) {
          echo '<h2>' . __( 'Меню', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) . '</h2>';
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
          echo '<div class="small">';
          dynamic_sidebar( 'side_nav' );
          echo '</div>';
        }
      ?>
    </nav>
    <div class="wrapper" id="wrapper">
      <header class="wrapper__item wrapper__item--header header" id="header">
        <div class="container">
          <div class="row middle-xs">
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
              <div class="bloginfo">
                <?php the_custom_logo(); ?>
                <?php if ( is_multisite() ) : ?>
                  <?php switch_to_blog( get_main_site_id() ); ?>
                  <a class="network" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'description' ); ?></a>
                  <span class="separator"></span>
                  <?php restore_current_blog(); ?>
                <?php endif; ?>
                <a class="name" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
              </div>  
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
              <button class="burger" id="burger" title="<?php esc_attr_e( 'Открыть меню', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>">
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