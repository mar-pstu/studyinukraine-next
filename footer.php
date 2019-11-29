<?php


namespace studyinukraine_next;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>
        </div>
      </main>
      <footer class="wrapper__item wrapper__item--footer footer">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 first-md">
              <p class="footer__copyright copyright"><?php echo date( 'Y' ); ?> &copy; <?php bloginfo( 'name' ); ?></p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 first-xs">
              <?php echo render_contacts_list( get_theme_mod( STUDYINUKRAINE_NEXT_SLUG . '_contacts', array() ) ); ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <p class="footer__developer developer"><a href="https://chomovva.ru/">chomovva</a></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>