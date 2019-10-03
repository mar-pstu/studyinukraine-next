<section class="section questions">
    <div class="container">
        <h2 class="title"><?php echo $title; ?></h2>
        <div class="row middle-xs center-xs">
            <div class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                <img class="thumbnail lazy" src="#" data-src="<?php echo $src; ?>" alt="<?php echo $alt; ?>">
            </div>
            <div class="col-xs-10 col-sm-6 col-md-6 col-lg-5 col-sm-offset-1">
                <div class="box">
                    <?php
                        if ( empty( $form ) ) {
                            include get_theme_file_path( 'views/questions-form.php' );
                        } else {
                            echo do_shortcode( $form, false );
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>