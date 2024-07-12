<article class="standard_blog">
	<?php
	$terms = get_the_terms(get_the_ID(), 'category');
	$post_thumbnail_url = get_the_post_thumbnail_url();
	$category_classes = array();
	$title = get_the_title();
	// $excerpt = get_the_excerpt();
	$custom_text = get_post_meta($post->ID, 'standard_text', true);
	$post_url = get_permalink(); 
	$limit = 230;

	$time = get_the_time('j F Y');

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$category_classes[] = esc_html( $term->slug );
		}
	}
	$cat_names = implode( ' , ', $category_classes );
	if ( $post_thumbnail_url ) {
		echo '<img src="' . esc_url( $post_thumbnail_url ) . '" width="100%" height="600px" alt="Post Thumbnail">';
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
	} else {
		echo 'No post thumbnail available.';
	}
	?>
</article>