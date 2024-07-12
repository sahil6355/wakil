<article class="quote_blog">

	<?php 

	global $post;
	$Qtitle = get_post_meta($post->ID, 'quote_title', true);
	$author_name = get_post_meta($post->ID, 'quote_author_name', true);
	$custom_text = get_post_meta($post->ID, 'quote_text', true);
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

	<div class="sub_quote">
		<div class="top_quote">
			<img alt="quote" src="<?php echo get_stylesheet_directory_uri() ?> /assets/images/testimonial/quote_2.png" width="60" height="60">
			<div class="text_right">
				<h2><?php echo $Qtitle; ?></h2>
				<p>- <?php echo $author_name; ?></p>
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
	</div>
	
</article>