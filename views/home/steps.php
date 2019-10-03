<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>

<section class="section steps" id="steps" role="list">

  <h2 class="text-center"><?php echo $title; ?></h2>

  <?php foreach ( $steps as $step ) : ?>
    <div class="steps__entry entry" role="listitem">
      <div class="container">
        <div class="row middle-xs center-xs">
          <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 first-sm">
            <div class="count"></div>
            <h3 class="title"><?php echo $step[ 'title' ]; ?></h3>
            <?php if ( ! empty( $step[ 'excerpt' ] ) ) : ?><p><?php echo $step[ 'excerpt' ]; ?></p><?php endif; ?>
            <?php if ( ! empty( $step[ 'page_id' ] ) ) : ?>
              <a class="btn btn-success btn-sm" href="<?php echo get_permalink( $step[ 'page_id' ] ); ?>">
                <?php echo ( empty( $step[ 'label' ] ) ) ? __( 'Подробней', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) : $step[ 'label' ]; ?>
              </a>
            <?php endif; ?>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 first-xs">
            <?php if ( ! empty( $step[ 'src' ] ) ) : ?><img class="thumbnail lazy" src="#" data-src="<?php echo $step[ 'src' ]; ?>" alt="<?php esc_attr_e( 'Визуализация шага', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>"><?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php if ( ! empty( $permalink ) ) : ?>
    <div class="container text-center">
      <a class="permalink" href="<?php echo $permalink; ?>"><?php echo $label; ?></a>
    </div>
  <?php endif; ?>

</section>