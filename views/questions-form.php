<form id="questions-form">
  <input type="text" style="display: none;" value="" name="login">
  <input name="name" type="text" value="" placeholder="<?php esc_attr_e( 'Ваше имя', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>">
  <input name="email" type="email" value="" placeholder="<?php esc_attr_e( 'Ваш email', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>" required>
  <textarea name="message" placeholder="<?php esc_attr_e( 'Сообщение', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?>"></textarea>
  <button type="submit"><?php _e( 'Отправить', STUDYINUKRAINE_NEXT_TEXTDOMAIN ); ?></button>
</form>
<script>
  ( function ( $ ) {
    var $feedback_form = jQuery( '#questions-form' ),
        $controls = $feedback_form.find( 'input[name=name],input[name=email],textarea[name=message]' ),
        $login = $feedback_form.find( 'input[name=login]' );
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
    function get_values() {
    	var result = {};
    	$controls.each( function () {
    		result[ this.name ] = jQuery( this ).val();
    	} );
    	return result;
    }
    $feedback_form.submit( function ( event ) {
      event.preventDefault();
      jQuery.ajax( {
        type: 'GET',
        url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
        data: {
          action: 'questions-feedback-form',
          security: '<?php echo wp_create_nonce( 'questions-feedback-form' ); ?>',
          fields: get_values(),
          login: $login.val(),
        },
        success: function ( data ) {
          if ( typeof ( data.data ) != 'underfined' && data.data ) {
            msg( data.data );
            if ( typeof ( data.success ) != 'underfined' && data.success ) {
              $controls.val( '' );
            }
          } else {
            error_msg();
          }
        },
        error: function ( data ) {
          console.log( data );
          error_msg();
        },
      } );
    } );
  } )( jQuery );
</script>