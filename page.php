<?php

get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    echo '<div class="container">';
    studyinukraine_next\the_pageheader();
    studyinukraine_next\the_breadcrumbs();
    the_content();
    studyinukraine_next\the_pager();
    if ( comments_open( get_the_ID() ) ) comments_template();
    echo '</div>';
  }
}

get_footer();

?>