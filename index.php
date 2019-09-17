<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 <?php echo ( is_active_sidebar( 'side_column' ) ) ? 'col-md-8 col-lg-8' : 'col-md-12 col-lg-12'; ?>">

      <?php studyinukraine_next\the_pageheader(); ?>

      <?php studyinukraine_next\the_breadcrumbs(); ?>

      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="<?php post_class( 'archive__entry entry' ); ?>">
            <div class="row center-xs">
              <div class="col-xs-10 col-sm-6 col-md-5 col-lg-5">
                <a class="entry__thumbnail thumbnail" href="<?php the_permalink( get_the_ID() ); ?>">
                  <img class="lazy" src="#" data-src="<?php echo ( has_post_thumbnail( get_the_ID() ) ) ? get_the_post_thumbnail_url( get_the_ID(), 'medium' ) : STUDYINUKRAINE_NEXT_URL . 'images/background.png'; ?>" alt="<?php the_title_attribute(); ?>"/>
                </a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                <h3 class="entry__title title"><a href="<?php the_permalink( get_the_ID() ); ?>"><?php the_title(); ?></a></h3>
                <div class="entry__excerpt excerpt"><?php the_excerpt(); ?></div>
                <div class="row middle-xs">
                  <div class="col-xs-5">
                    <time class="datetime" datetime="<?php the_modified_date( 'Y-m-d' ); ?>"><?php the_modified_date(); ?></time>
                  </div>
                  <div class="col-xs-7 text-right">
                    <a class="btn btn-success permalink" href="<?php the_permalink( get_the_ID() ); ?>">
                      <?php _e( 'Подробней', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      
      <?php the_posts_pagination(); ?>
      
    </div>
    <?php if ( is_active_sidebar( 'side_column' ) ) : ?>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php get_sidebar(); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>