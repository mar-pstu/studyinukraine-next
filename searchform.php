<form class="searchform form" role="search" method="get" action="<?php echo home_url( '/' ) ?>"> 
  <input class="form-control" type="text" value="<?php echo get_search_query() ?>" name="s">
  <div class="text-center">
    <button class="searchsubmit btn btn-warning" type="submit"><?php _e( 'Найти', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?></button>
  </div>
</form>