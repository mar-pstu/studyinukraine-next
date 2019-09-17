<form class="form" id="feedback_form">
  <input type="text" style="display: none;" value="" name="ulogin">
  <input type="email" placeholder="<?php esc_attr_e( 'Ваш email', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>" name="email" required>
  <button type="submit"><span class="sr-only"><?php _e( 'Отправить', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?></span></button>
</form>
<script>
  ( function ( $ ) {
    var $feedback_form = jQuery( '#feedback_form' ),
        $control = $feedback_form.find( 'input[name=email]' ),
        $ulogin = $feedback_form.find( 'input[name=ulogin]' );
    function msg( text ) {
      if ( jQuery.fancybox ) {
        jQuery.fancybox.open( text );
      } else {
        alert( text );
      }
    }
    function error_msg() {
      msg( '<?php _e( 'Попробуйте позже или обратитесь к администратору.', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>' );
    }
    $feedback_form.submit( function ( event ) {
      event.preventDefault();
      jQuery.ajax( {
        type: 'GET',
        url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
        data: {
          action: 'jumbotron-feedback-form',
          security: '<?php echo wp_create_nonce( 'jumbotron-feedback-form' ); ?>',
          email: $control.val(),
          ulogin: $ulogin.val(),
        },
        success: function ( data ) {
          if ( typeof ( data.data ) != 'underfined' && data.data ) {
            msg( data.data );
            if ( typeof ( data.success ) != 'underfined' && data.success ) {
              $control.val( '' );
            }
          } else {
            error_msg();
          }
        },
        error: function ( data ) {
          error_msg();
        },
      } );
    } );
  } )( jQuery );
</script>