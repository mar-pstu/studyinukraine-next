<?php

/**
 *	Регитсраиция метабокса для добавления фонового изображения на страницу
 */



if ( ! defined( 'ABSPATH' ) ) {	exit; };



class StudyInUkraineNextBGIMetaboxClass {


	/**
	 *	Создание класса / добавление хуков для вывода метабокса
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}



	static function get_translation_id( $post_id ) {
		$result = false;
		// проверяем работает ли плагин переводов
		if ( defined( "POLYLANG_FILE" ) ) {
			$result = ( isset( $_GET[ 'from_post' ] ) ) ? $_GET[ 'from_post' ] : $result;
		}
		return $result;
	}


	/**
	 *	Регистрация метабокса
	 */
	public function add_meta_box( $post_type ) {
		if ( in_array( $post_type, array( 'page', 'post' ) ) ) add_meta_box(
			'pstu_bgi',
			__( 'Фоновое изображение', 'pstu-next-theme' ),
			array( $this, 'render_content' ),
			$post_type,
			'side',
			'high',
			null
		);
	}


	/**
	 *	ПРоверка и сохранение данных
	 */
	public function save ( $post_id ) {

		// проверяем существует ли nonce-поле, если нет - выходим
		if ( ! isset( $_POST[ 'pstu_metabox_bgi_nonce' ] ) ) {
			// wp_nonce_ays();
			return;
		}

		// проверяем значение nonce-поля, если не совпадает - выходим
		if ( ! wp_verify_nonce( $_POST[ 'pstu_metabox_bgi_nonce' ], 'pstu_metabox_bgi' ) ) {
			wp_nonce_ays();
			return;
		}

		// исключаем автосохранение и ревизии
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( wp_is_post_revision( $post_id ) ) return;	

		// проверяем права пользователя
		if ( 'page' == $_POST[ 'post_type' ] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) return $post_id;
		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
			wp_nonce_ays();
			return;
		}

		if ( isset( $_POST[ 'pstu_bgi' ] ) ) {
			update_post_meta( $post_id, 'pstu_bgi', sanitize_key( $_POST[ 'pstu_bgi' ] ) );
		} else {
			delete_post_meta( $post_id, 'pstu_bgi' );
		}

	} // save



	/**
	 *	Вывод метабокса
	 */
	public function render_content( $post ) {
		wp_nonce_field( 'pstu_metabox_bgi', 'pstu_metabox_bgi_nonce' );
		$src = false;
		$default = STUDYINUKRAINE_NEXT_URL . 'images/background.png';
		$value = get_post_meta( $post->ID, 'pstu_bgi', true );
		if ( empty( $value ) ) {
			$translation_id = self::get_translation_id( $post->ID );
			if ( $translation_id ) get_post_meta( $translation_id, 'pstu_bgi', true );
		} else {
			$src = wp_get_attachment_image_url( $value, 'full' );
		}
  		$src = ( $src ) ? $src : $default;
  		include get_theme_file_path( 'views/metabox-bgi.php' );
  		wp_enqueue_media();
  		wp_enqueue_script( STUDYINUKRAINE_NEXT_SLUG . '_metabox_bgi', STUDYINUKRAINE_NEXT_URL . 'scripts/metabox-bgi.js', array( 'jquery' ), STUDYINUKRAINE_NEXT_VERSION, true );
	}

} // CLASS