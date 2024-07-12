<article class="gallery_blog">
	<?php 
	global $post;
	$gallery_images = get_post_meta($post->ID, 'gallery_images', true);
	$terms = get_the_terms(get_the_ID(), 'category');
	$category_classes = array();
	$title = get_the_title();
	$custom_text = get_post_meta($post->ID, 'gallery_text', true);
	$post_url = get_permalink(); 
	$limit = 230;
	$time = get_the_time('j F Y');
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$category_classes[] = esc_html( $term->slug );
		}
	}
	$cat_names = implode( ' , ', $category_classes );
	?>
	<div class="single_service_slider">
		<?php
		if (!empty($gallery_images)) {
			foreach ($gallery_images as $image_id) {
				$image_url = wp_get_attachment_image_src($image_id);
				?>
				<img src="<?php echo esc_attr($image_url[0]); ?>" width="100%" height="600" />
				<?php
			}
		}
		?>
	</div>

	<?php
	echo '<div class="bottom_content">';
	echo '<p class="case_category">'.  $cat_names .' | '. $time .'</p>';
	echo '<h2>'. $title .'</h2>';
	if($custom_text != ''){
		if (strlen($custom_text) > $limit) {
			$custom_text = substr($custom_text, 0, $limit);
			$custom_text .= '...';
		}
		echo '<p class="excerpt">'. $custom_text .'</p>';
	}
	?>
	<div class="button-box Load_more" id="Loadmore-case">
		<a href="<?php echo $post_url; ?>" class="button-wrap">
			<span>
				Read More
				<i class="ri-arrow-right-line"></i>
			</span>
		</a>
	</div>
	<?php
	echo '</div>';
	?>
</article>