<?php

/*
Template Name: home 6 layout
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>

	<div class="home_page_six">
		<div class="home_page_six_header">
			<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home/page-six-logo.png" width="60" height="60">
			<img class="home6_hamburger" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home/page_six_menu_button.png" width="60" height="60">
			<p>hello@wakil.com</p>
		</div>
		<div class="home_page_six_right_bg"></div>
		<div class="six_header">
			<div class="main-navbar">
				<i class="ri-close-fill"></i>
				<?php wp_nav_menu(
					array('
						theme_location' => 'main-menu',
						'menu_class ' => 'header_menu',
					)
				); ?>
			</div>
		</div>

		<div class="home_page_six_right">
			<div class="left_sub_page_six custome_color">
				<p class="top_text">best & unpredictable law firm</p>
				<h1>We <span>Reliable</span> & <span>Effective</span> Legal Solutions</h1>
				<p>We make our clients’ goals and challenges our own and strive to create a lasting impact on their business.</p>
				<div class="button-box Load_more home_six_btn">
					<a class="button-wrap">
						<span>
							Free Consultation
							<i class="ri-arrow-right-line"></i>
						</span>
					</a>
				</div>
			</div>
			<div class="right_sub_page_six">
				<?php 
				$args = array(
					'post_type' => 'service',
					'post_status' => 'publish',
					'posts_per_page' => 6 ,
				);

				$result = new WP_Query($args);


				if ( $result -> have_posts() ) { 
					$counter = 0;
					while ( $result -> have_posts() ) { 
						$result -> the_post(); 
						$title = get_the_title();
						$image_id = get_post_meta($post->ID, 'wpse_uploaded_feature_image', true);
						$image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
						?>
						<a href="<?php echo get_permalink(); ?>" class="cursor-link-blog-post-<?php echo $counter; ?>" data-image="<?php echo $image_url; ?>">
							<div class="sub_right_sub_page_six">

								<?php if (has_post_thumbnail(get_the_ID())) : ?>
									<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail'); ?>
									<img src="<?php echo $image[0]; ?>" alt="" class="links_img">
								<?php endif; ?>
								<h2>
									<?php echo $title ?>
								</h2>

							</div>
						</a>
						<?php
						$counter++;
					}
				}
				?>
			</div>
		</div>
	</div>

</main>

</div>

</div>

<!-- Page cursor Start -->
<div class="cursor cursor-shadow"></div>
<div class="cursor cursor-dot"></div>
<!-- Page cursor End -->
<?php wp_footer(); ?>
</body>

</html>

