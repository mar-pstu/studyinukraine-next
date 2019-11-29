<?php


namespace studyinukraine_next;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    the_pageheader();
    the_breadcrumbs();
    the_content();
    the_pager();
    if ( comments_open( get_the_ID() ) ) comments_template();
  }
}


get_footer();