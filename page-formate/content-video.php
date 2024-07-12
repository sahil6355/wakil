<article class="video_blog">
	<?php 
	global $post;
	$video_url = get_post_meta($post->ID, 'gallery_video', true);
	$image_url = get_post_meta($post->ID, '_custom_image', true);
	$custom_text = get_post_meta($post->ID, 'video_text', true);
	$terms = get_the_terms(get_the_ID(), 'category');
	$category_classes = array();
	$title = get_the_title();
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

	<div class="main_video_top main_video_blog_top">
		<img src="<?php echo $image_url; ?>" alt="img" width="100%" height="600">
		<a id="play-video" class="video-play-button" href="javascript:void(0);">
			<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/video_btn.png" width="48px" height="48px"></span>
		</a>

		<div id="video-overlay" class="video-overlay" data-id='<?php echo $video_url ?>'>
			<a class="video-overlay-close">x</a>
		</div>

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