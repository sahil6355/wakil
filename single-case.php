<?php get_header(); ?>

<?php 

$bg_img =  esc_url(get_option('case_bg_img'));

$global_sidebar_option = get_option('sidebar_case_blog');


$post_sidebar_option = get_post_meta(get_the_ID(), '_sidebar_option', true);


// Determine the effective sidebar option
if ($post_sidebar_option && $post_sidebar_option !== 'default') {
	$sidebar_option = $post_sidebar_option;
} else {
	$sidebar_option = $global_sidebar_option ? $global_sidebar_option : 'standard';
}

?>


<div class="top_header_layout">
	<div class="sub_heder_layout">
		<img src="<?php	if ($bg_img == '') { echo get_template_directory_uri() . '/assets/images/case/single_case_bg_img.png';}else {echo $bg_img;} ?>" alt="service banner">
		<div class="black-overlay"></div>
		<div class="banner-header-content">
			<h1 class="page-title"> Single Cases </h1>
			<?php
			echo do_shortcode('[custom_breadcrumb]');
			?>
		</div>
	</div>
</div>


<div class="main_single_contain p-100 <?php echo $sidebar_option; ?>">
	<div class="sub_main_single_contain <?php echo $sidebar_option; ?>">
		<?php if($sidebar_option == 'left' && is_active_sidebar('case-sidebar-blog')):?>
			<div class="bwp-sidebar sidebar-blog sidebar_class <?php echo $sidebar_option ?>">
				<?php dynamic_sidebar( 'case-sidebar-blog' );?>	
			</div>
		<?php endif; ?>
		<div class="single_page_main_contain">
			<?php the_content();  ?>
		</div>
		<?php if($sidebar_option == 'right' && is_active_sidebar('case-sidebar-blog')):?>
			<div class="bwp-sidebar sidebar-blog sidebar_class <?php echo $sidebar_option ?>">
				<?php dynamic_sidebar( 'case-sidebar-blog' );?>	
			</div>
		<?php endif; ?>
	</div>
</div>
<div class="case_related_post p-100">

	<h2 class="border_title">Related Cases</h2>
	<div class="title_border"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/border_icon.png" width="36" height="30"></div>
	

	<?php
	$current_post_id = get_the_ID();
	$terms = get_the_terms($current_post_id, 'case_category');

	if ($terms && !is_wp_error($terms)) {
		$term_ids = wp_list_pluck($terms, 'term_id');

		$args = array(
			'post_type' => 'case', 
			'posts_per_page' => 3, 
			'post__not_in' => array($current_post_id), 
			
		);
		$query = new WP_Query($args);
		if ($query->have_posts()) {
			?> <div class="case-box"> <?php
			while ($query->have_posts()) {
				$query->the_post();
				$title = get_the_title();
				$terms = get_the_terms( get_the_ID(), 'case_category' );
				$category_classes = array();
				$post_url = get_permalink( get_the_ID() );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$category_classes[] = esc_html( $term->slug );
					}
				}
				$class_names = implode( ' ', $category_classes );
				$cat_names = implode( ' , ', $category_classes );
				echo '<div class="sub_case_box">';
				if ( has_post_thumbnail() ) {
					$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
					echo '<div class="image-container">';
					echo '<a href="'. $post_url .'"><img src="' . esc_url( $featured_image_url ) . '" alt="' . get_the_title() . '" width="570" height="570"></a>';                   
					echo '</div>';
				}
				echo '<div class="bottom_contain"><p class="case_category">'.  $cat_names .'</p>';
				echo '<a href="'. $post_url .'"><h2>'. $title .'</h2></a></div>';
				echo '</div>';
			}
			?> </div> <?php
		} else {

			echo 'No related posts found.';
		}
		wp_reset_postdata();
	}
	?>
</div>

<?php

echo do_shortcode('[testimonial-layout-second]');

echo do_shortcode('[Consultation-layout]');

get_footer(); 

?>