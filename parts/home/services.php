<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$entries = get_pages( array(
  'sort_order'   => 'ASC',
  'sort_column'  => 'post_title',
  'hierarchical' => 0,
  'parent'       => ( int ) get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_services_page_id', 0 ),
  'number'       => '4',
  'post_status'  => 'publish',
) );


?>



<?php if ( is_array( $entries ) && ! empty( $entries ) ) : ?>
  <section class="section services" id="services">
    <div class="container">
      <div class="row center-xs middle-xs">
        <?php foreach ( $entries as $entry ) : setup_postdata( $entry ); ?>
          <div class="col-xs-10 col-sm-4 col-md-3 col-lg-3">
            <a class="services__entry entry" href="<?php echo get_permalink( $entry->ID ); ?>">
              <?php if ( has_post_thumbnail( $entry->ID ) ) : ?>
                <div class="thumbnail">
                  <img class="lazy" src="#" data-src="<?php echo get_the_post_thumbnail_url( $entry->ID, 'post-thumbnail' ); ?>" alt="<?php echo esc_attr( $entry->post_title ); ?>">
                </div>
              <?php endif; ?>
              <h3 class="title"><?php echo apply_filters( 'the_title', $entry->post_title, $entry->ID ); ?></h3>
              <p class="excerpt"><?php echo strip_tags( $entry->post_excerpt ); ?></p>
            </a>
          </div>
        <?php endforeach; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>