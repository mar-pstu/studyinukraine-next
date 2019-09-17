<?php


get_header();


$thumbnail_src = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_404_thumbnail', STUDYINUKRAINE_NEXT_URL . '/images/404.svg' );
$title = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_404_title', __( 'Страница не найдена', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) );
$excerpt = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_404_excerpt', __( 'К сожалению страница не найдена. Проверьте правильность адреса или нажмите на любую ссылку выше.', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) );

if ( function_exists( 'ppl__' ) ) {
  $title = ppl__( $title );
  $excerpt = ppl__( $excerpt );
}

?>


<div class="container">
  <div class="row center-xs middle-xs">
    <div class="col-xs-12 col-sm-9 col-md-8 col-lg-6">
      <div class="error404__wrap wrap"><img class="logo lazy center-block" src="#" data-src="<?php echo $thumbnail_src; ?>" alt="<?php echo  esc_attr( $title ); ?>">
        <h1 class="title"><?php echo $title; ?></h1>
        <?php
          if ( has_nav_menu( 'menu_404' ) ) {
            wp_nav_menu( array(
              'theme_location'  => 'menu_404',
              'menu'            => 'menu_404',
              'container'       => false,
              'menu_class'      => 'shortcuts',
              'echo'            => true,
              'depth'           => 1,
            ) );
          }
          echo $excerpt;
        ?>
        <div class="text-center">
          <a class="btn btn-success home-link" href="<?php echo home_url( '/' ) ?>">
            <?php _e( 'Вернуться на главную', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>