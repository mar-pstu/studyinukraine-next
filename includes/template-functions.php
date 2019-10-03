<?php



namespace studyinukraine_next;



if ( ! defined( 'ABSPATH' ) ) { exit; };



function get_custom_logo_img() {
    $result = __return_empty_string();
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) {
        $result = sprintf(
            '<img class="custom-logo" src="%1$s" alt="%2$s">',
            wp_get_attachment_image_src( $custom_logo_id, 'thumbnail', false ),
            get_bloginfo( 'name', 'display' )
        );
    }
    return $result;
}







function render_contacts_list( $contacts = array() ) {
    $result = __return_empty_array();
    if ( ! empty( $contacts ) ) {
        foreach ( $contacts as $key => $value ) {
            if ( ! empty( $value ) ) {
                switch( $key ) {
                    case 'email':
                        $protocol = 'mailto:';
                        break;
                    case 'whatsapp':
                        $protocol = 'https://wa.me/';
                    case 'skype':
                    case 'viber':
                        $protocol = $key . ':';
                        break;
                    default:
                        $protocol = 'http://';
                        break;
                }
                $result[] = sprintf(
                    '<li class="%3$s"><a href="%1$s%2$s"><span class="sr-only">%3$s</span> <span class="value">%2$s</span></a></li>',
                    $protocol,
                    $value,
                    $key          
                );
            }
        }
    }
    return ( empty( $result ) ) ? '' : '<ul class="contacts">' . implode( "\r\n", $result ) . '</ul>';
}





function the_pageheader() {
        if ( is_archive() ) {
                $title = get_the_archive_title();
                $excerpt = get_the_archive_description();
                $term = get_queried_object();
                $thumbnail_id = get_term_meta( $term->term_id, STUDYINUKRAINE_NEXT_SLUG . '_thumbnail', true );
        } else {
                $title = get_the_title();
                $excerpt = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : false;
                $thumbnail_id = ( has_post_thumbnail( get_the_ID() ) ) ? get_post_thumbnail_id( get_the_ID() ) : false;
        }
        include get_theme_file_path( 'views/pageheader.php' );
}









function the_pager() {
        ob_start();
        foreach ( array(
            'previous'  => array(
                'entry'     => get_previous_post(),
                'label'     => __( 'Смотреть предыдущий пост', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
            ),
            'next'      => array(
                'entry'     => get_next_post(),
                'label'     => __( 'Смотреть следующий пост', STUDYINUKRAINE_NEXT_TEXTDOMAIN ),
            ),
        ) as $key => $value ) {
            if ( $value[ 'entry' ] && ! is_wp_error( $value[ 'entry' ] ) ) {
                $title = apply_filters( 'the_title', $value[ 'entry' ]->post_title, $value[ 'entry' ]->ID );
                $label = $value[ 'label' ];
                $permalink = get_permalink( $value[ 'entry' ]->ID );
                include get_theme_file_path( 'views/adjacent-post.php' );
            }
        }
        $content = ob_get_contents();
        ob_end_clean();
        if ( ! empty( $content ) ) {
                echo '<nav class="pager">' . $content . '</nav>';
        }
}



function render_reviews( $entries = array() ) {
    $result = __return_empty_array();
    if ( ! empty( $entries ) ) {
        ob_start();
        foreach ( $entries as $entry ) {
            if ( ! empty( $entry[ 'text' ] ) ) {
                if ( function_exists( 'pll__' ) ) {
                    $text = pll__( $entry[ 'text' ] );
                    $author = pll__( $entry[ 'author' ] );
                } else {
                    $text = $entry[ 'text' ];
                    $author = $entry[ 'author' ];
                }
                if ( empty( $entry[ 'foto_id' ] ) ) {
                    $url = STUDYINUKRAINE_NEXT_URL . 'images/reviews/default.jpg';
                    $alt = esc_attr( $entry[ 'author' ] );
                } else {
                    $url = wp_get_attachment_url( $entry[ 'foto_id' ] );
                    $alt = wp_get_attachment_caption( $entry[ 'foto_id' ] );
                }
                include get_theme_file_path( 'views/review.php' );
            }
        }
        $result = ob_get_contents();
        ob_end_clean();
    }
    if ( ! empty( $result ) ) {
        wp_enqueue_script( 'slick' );
        wp_enqueue_style( 'slick' );
        wp_add_inline_script( 'slick', "jQuery( '#reviews' ).slick( {
            lazyLoad: 'ondemand',
            arrows: false,
            speed: 300,
            dots: true,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 1500,
        } );", 'after' );
        return '<div class="reviews" id="reviews">' . $result . '</div>';
    }
    return '';
}











function the_breadcrumbs() {
    ob_start();
    if ( function_exists( 'yoast_breadcrumb' ) ) {
            yoast_breadcrumb();
    } else {
            if ( ! is_front_page() ) {
                echo '<a href="';
                echo home_url();
                echo '">'.__( 'Главная', STUDYINUKRAINE_NEXT_TEXTDOMAIN );
                echo "</a> » ";
                if ( is_category() || is_single() ) {
                        the_category(' ');
                        if ( is_single() ) {
                                echo " » ";
                                the_title();
                        }
                } elseif ( is_page() ) {
                        echo the_title();
                }
            }
            else {
                echo __( 'Домашняя страница', STUDYINUKRAINE_NEXT_TEXTDOMAIN );
            }
    }
    $result = ob_get_contents();
    ob_end_clean();
    if ( ! empty( $result ) ) {
        echo '<div id="breadcrumbs" class="breadcrumbs">';
        echo $result;
        echo '</div>';
    }
}





function get_translate_id( $id, $type = 'post' ) {
    $result = '';
    if ( defined( 'POLYLANG_FILE' ) ) {
        switch ( $type ) {
            case 'category':
                $translate = ( function_exists( 'pll_get_term' ) ) ? pll_get_term( $id, pll_current_language( 'slug' ) ) : $translate;
                break;
            case 'post':
            case 'page':
            default:
                $translate = ( function_exists( 'pll_get_post' ) ) ? pll_get_post( $id, pll_current_language( 'slug' ) ) : $translate;
                break;
        } // switch
        $result = ( $translate ) ? $translate : '';
    } // if defined
    return $result;
}





function get_languages_list() {
    $result = array();
    if ( ( function_exists( 'pll_the_languages' ) ) && ( function_exists( 'pll_current_language' ) ) ) {
        $current = pll_current_language( 'slug' );
        $other = pll_the_languages( array(
            'dropdown'           => 0,
            'show_names'         => '',
            'display_names_as'   => 'slug',
            'show_flags'         => 0,
            'hide_if_empty'      => 0,
            'force_home'         => 0,
            'echo'               => 0,
            'hide_if_no_translation' => 0,
            'hide_current'       => 1,
            'post_id'            => ( is_singular() ) ? get_the_ID() : NULL,
            'raw'                => 1,
        ) );
        if ( ( $other ) && ( ! empty( $other ) ) ) {
            $result[] = '<li class="current">' . $current . '</li>';
            foreach ( $other as $lang ) $result[] = sprintf(
                '<li><a href="%1$s">%2$s</a></li>',
                $lang[ 'url' ],
                $lang[ 'name' ]
            );
        }
    }
    if ( ! empty( $result ) ) echo '<ul class="languages">' . implode( "\r\n", $result ) . '</ul>';
}