<div class="pageheader">
	<?php if ( $thumbnail_id ) : ?>
		<a class="fancybox thumbnail" href="<?php echo wp_get_attachment_image_url( $thumbnail_id, 'full', false ); ?>">
			<img class="lazy wp-post-thumbnail" src="#" data-src="<?php echo wp_get_attachment_image_url( $thumbnail_id, 'thumbnail', false ); ?>" alt="<?php echo esc_attr( $title ); ?>">
		</a>
	<?php endif; ?>
    <h1 class="title"><?php echo $title; ?></h1>
</div>
<?php if ( $excerpt ) : ?><p class="lead"><?php echo $excerpt; ?></p><?php endif; ?>