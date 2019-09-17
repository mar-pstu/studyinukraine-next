<img class="img-responsive center-block img-bordered" data-default-src="<?php echo $default; ?>" id="pstu_bgi_image" src="<?php echo $src; ?>">
<input type="hidden" name="pstu_bgi" id="pstu_bgi_field" value="<?php echo $value; ?>" />
<div class="clearfix">
    <button type="button" role="button" id="pstu_bgi_remove_image_btn" class="button button-link-delete">
        <?php _e( 'Удалить', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>
    </button>
    <button type="button" role="button" id="pstu_bgi_upload_image_btn" class="button button-primary">
        <?php _e( 'Установить', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>
    </button>
</div>