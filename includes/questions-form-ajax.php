<?php




if ( ! defined( 'ABSPATH' ) ) { exit; };





/**
 * 
 */
class StudyInUkraineQuestionsFormAjaxClass {




	protected $textdomain;




	protected $action;




	protected $admin_email;




	function __construct( $action, $textdomain, $admin_email ) {
		$this->action = $action;
		$this->textdomain = $textdomain;
		$admin_email = $this->sanitize_emails_list( $admin_email );
		$this->admin_email = ( empty( $admin_email ) ) ? get_bloginfo( 'admin_email' ) : $admin_email;
	}




	public function run() {
		add_action( "wp_ajax_{$this->action}", array( $this, 'manager' ) );
		add_action( "wp_ajax_nopriv_{$this->action}", array( $this, 'manager' ) );
	}




	public function manager() {
		if ( isset( $_REQUEST[ 'fields' ] ) ) {
			$values = $this->get_values( $_REQUEST[ 'fields' ] );
			if ( empty( $values[ 'email' ] ) ) {
				wp_send_json_error( __( 'Неверный email', $this->textdomain ) );
			} else {
				if ( $this->check_secure( $values ) ) {
					if ( $this->send_message( $values ) ) {
						wp_send_json_success( __( 'Заявка отправлена', $this->textdomain ) );
					} else {
						wp_send_json_error( __( 'Попробуйте позже или обратитесь к администратору.', $this->textdomain ) );
					}
				} else {
					wp_send_json_error( __( 'Вы забанены, обратитесь к администратору', $this->textdomain ) );
				}
			}
		} else {
			wp_send_json_error( __( 'Заполните поля формы', $this->textdomain ) );
		}
		wp_die();
	}




	protected function get_values( $fields ) {
		$result = __return_empty_array();
		foreach ( array(
			'name',
			'email',
			'message',
		) as $key ) {
			if ( isset( $fields[ $key ] ) ) {
				switch ( $key ) {
					case 'email':
						$result[ $key ] = $this->sanitize_emails_list( $fields[ $key ] );
						break;
					case 'message':
						$result[ $key ] = sanitize_textarea_field( $fields[ $key ] );
						break;
					default:
						$result[ $key ] = sanitize_text_field( $fields[ $key ] );
						break;
				}
			} else {
				$result[ $key ] = '';
			}
		}
		return $result;
	}




	private function check_secure( $values ) {
		$referer = check_ajax_referer( $this->action, 'security' );
		$blacklist_check = ! wp_blacklist_check( $values[ 'name' ], $values[ 'email' ], '', $values[ 'message' ], $this->get_the_user_ip(), '' );
		$honey = isset( $_REQUEST[ 'login' ] ) && empty( $_REQUEST[ 'login' ] );
		return ( $referer && $blacklist_check && $honey );
	}




	private function send_message( $values ) {
		$headers = sprintf(
			'From: %1$s <%2$s>%3$sContent-type: text/html%3$scharset=utf-8%3$s',
			$values[ 'email' ],
			( is_email( $values[ 'email' ] ) ) ? $values[ 'email' ] : get_bloginfo( 'admin_email' ),
			"\r\n"
		);
		$subject = sprintf(
			'%1$s %2$s',
			__( 'Сообщение с сайта', $this->textdomain ),
			get_bloginfo( 'name' )
		);
		return wp_mail(
			$this->admin_email,
			$subject,
			$this->render_message( $values ),
			'sdfg',
			$headers
		);
	}



	private function render_message( $values ) {
		$result = __return_empty_string();
		$user_ip = $this->get_the_user_ip();
		extract( $values );
		ob_start();
		include get_theme_file_path( 'views/questions-form-message.php' );
		$result = ob_get_contents();
		ob_end_clean();
		return $result;
	}



	private function get_the_user_ip() {
		if ( ! empty( $_SERVER[ 'HTTP_CLIENT_IP' ] ) ) {
			$ip = $_SERVER[ 'HTTP_CLIENT_IP' ];
		} elseif ( ! empty( $_SERVER[ 'HTTP_X_FORWARDED_FOR' ] ) ) {
			$ip = $_SERVER[ 'HTTP_X_FORWARDED_FOR' ];
		} else {
			$ip = $_SERVER[ 'REMOTE_ADDR' ];
		}
		return apply_filters( 'edd_get_ip', $ip );
	}



	private function sanitize_emails_list( $value ) {
		return implode( ", ", array_filter( wp_parse_list( $value ), 'is_email' ) );
	}


}