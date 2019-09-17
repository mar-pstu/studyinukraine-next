<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>
<section class="section aboutus">
  <div class="container">
    <div class="row <?php echo $direction_class; ?>">
      <?php if ( $thumbnail_src ) : ?>
        <div class="col-xs-12 col-sm-4 col-md-5 col-lg-5">
          <img class="lazy" src="#" data-src="<?php echo $thumbnail_src; ?>" alt="<?php echo esc_attr( $thumbnail_alt ); ?>">
        </div>
      <?php endif; ?>
      <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <h2><?php echo $title; ?></h2>
        <?php echo $excerpt; ?>
        <a class="btn btn-success permalink" href="<?php echo $permalink; ?>"><?php echo $label; ?></a>
      </div>
    </div>
  </div>
</section>