<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };

$title = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_title', get_bloginfo( 'name' ) );
$excerpt = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_excerpt', get_bloginfo( 'description' ) );
$label = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_label', __( 'Подробней', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) );
$reviews = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_reviews', array() );
$page_id = studyinukraine_next\get_translate_id( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_page_id', '' ), 'page' );


if ( function_exists( 'pll__' ) ) {
  $title = pll__( $title );
  $excerpt = pll__( $excerpt );
  $label = pll__( $label );
}


?>


<div class="jumbotron lazy" id="jumbotron" data-src="<?php echo STUDYINUKRAINE_NEXT_SLUG . 'images/jumbotron/bgi.svg'; ?>">
  <div class="jumbotron__page page">
    <div class="container">
      <div class="row center-xs middle-xs">
        <div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
          <img class="lazy jumbotron__thumbnail thumbnail" src="#" data-src="<?php echo get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_thumbnail', STUDYINUKRAINE_NEXT_URL . 'images/jumbotron/thumbnail.png' ); ?>" alt="<?php echo esc_attr( $title ); ?>">
        </div>
        <div class="col-xs-9 col-sm-7 col-md-7 col-lg-7 first-sm">
          <h1 class="title"><?php echo $title; ?></h1>
          <p class="excerpt"><?php echo $excerpt; ?></p>
          <?php if ( ! empty( $page_id ) ) : ?>
            <a class="btn btn-success" href="<?php echo get_permalink( $page_id ); ?>">
              <?php echo $label; ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="jumbotron__basement basement">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
          <div class="feedback">
            <h3 class="title">
              <?php echo get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_title', __( 'Подать заявку на поступление', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) ); ?>
            </h3>
            <hr class="separator">
            <?php
              if ( empty( $feedback_form = get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_feedback_form', '' ) ) ) {
                include get_theme_file_path( 'views/feedback-form.php' );
              } else {
                echo do_shortcode( $feedback_form, false );
              }
            ?>
          </div>
        </div>
        <?php if ( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_jumbotron_reviews_flag', false ) ) : ?>
          <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
            <?php echo studyinukraine_next\render_reviews( $reviews ); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>