<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };


$sectors_page_id = studyinukraine_next\get_translate_id( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_sectors_page_id', 0 ), 'page' );


$entries = get_pages( array(
  'sort_order'   => 'ASC',
  'sort_column'  => 'post_title',
  'hierarchical' => 0,
  'parent'       => ( int ) $sectors_page_id,
  'post_status'  => 'publish',
) );


?>



<?php if ( is_array( $entries ) && ! empty( $entries ) ) : ?>
  <section class="section sectors" id="sectors">
    <h2 class="title"><?php echo get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_sectors_title', __( 'Области знаний', STUDYINUKRAINE_NEXT_TEXTDOMAIN ) ); ?></h2>
    <div class="container">
      <div class="row center-xs">
        <?php foreach ( $entries as $entry ) : setup_postdata( $entry ); ?>
          <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
            <figure class="sectors__entry entry">
              <?php if ( has_post_thumbnail( $entry->ID ) ) : ?>
                <a class="thumbnail" href="<?php echo get_permalink( $entry->ID ); ?>">
                  <img class="lazy" src="#" data-src="<?php echo get_the_post_thumbnail_url( $entry->ID, 'post-thumbnail' ); ?>" alt="<?php echo esc_attr( $entry->post_title ); ?>">
                </a>
              <?php endif; ?>
              <figcaption class="title">
                <a href="<?php echo get_permalink( $entry->ID ); ?>">
                  <?php echo apply_filters( 'the_title', $entry->post_title, $entry->ID ); ?>
                </a>
              </figcaption>
            </figure>
          </div>
        <?php endforeach; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>