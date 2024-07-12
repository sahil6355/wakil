<?php get_header(); ?>

<?php

$blog_page_bg_img = esc_url(get_option('single_blog_bg_img'));

$global_sidebar_option = get_option('single_sidebar_blog');

$post_sidebar_option = get_post_meta(get_the_ID(), '_sidebar_option', true);

if ($post_sidebar_option && $post_sidebar_option !== 'default') {

	$sidebar_option = $post_sidebar_option;

} else {

	$sidebar_option = $global_sidebar_option ? $global_sidebar_option : 'standard';

}

?>

<div class="top_header_layout">
	<div class="sub_heder_layout">
		<img src="<?php if ($blog_page_bg_img == '') { echo get_template_directory_uri() . '/assets/images/blog/single_blog_bg.png';} else { echo $blog_page_bg_img;} ?>" alt="service banner">
		<div class="black-overlay"></div>
		<div class="banner-header-content">
			<h1 class="page-title"> Single Blog </h1>
			<?php
			echo do_shortcode('[custom_breadcrumb]'); 
			?>
		</div>
	</div>
</div>

<div class="single_page_content main_single_contain p-100 <?php echo $sidebar_option; ?>">

	<div class="sub_main_single_contain main_single_page_content">
		<?php if($sidebar_option == 'left' && is_active_sidebar('single-sidebar-blog-page')):?>
			<div class="bwp-sidebar sidebar-blog sidebar_class <?php echo $sidebar_option ?>">
				<?php dynamic_sidebar( 'single-sidebar-blog-page' );?>	
			</div>
		<?php endif; ?>
		<div class="single_page_main_contain">
			<?php the_content();  ?>
			<div class="category_layout">
				<?php 
				if (have_posts()) {
					while (have_posts()) {
						wpb_set_post_views(get_the_ID());
						the_post();
						$terms = get_the_terms( get_the_ID(), 'category' );
						$category_classes = array();
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							foreach ( $terms as $term ) {
								$category_classes[] = esc_html( $term->slug );
							}
						}

						echo '<ul class="cat_group">';
						foreach ( $category_classes as $category_class ) {
							echo '<li class="case_category">'.  $category_class .'</li>';
						}
						echo '</ul>';


					// echo '<p class="case_category">'.  $class_names .'</p>';

					}
				} else {
					echo 'No related posts found.';
				}

				?>
				<ul class="menu topRight">
					<li class="share left">
						<div class="fa fa-share-alt">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case/share-icone.png" alt="share" width="20" height="20">
						</div>
						<ul class="submenu">
							<li>
								<a href="#" class="facebook"><i ></i>
									<div class="fa fa-facebook">
										<img  src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case/facebook.png" alt="facebook" width="20" height="20">
									</div>
								</a>
							</li>
							<li>
								<a href="#" class="twitter">
									<div class="fa fa-twitter">
										<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case/twiter.png" alt="twitter" width="20" height="20">
									</div>
								</a>
							</li>
							<li>
								<a href="#" class="linkedin">
									<div class="fa fa-linkedin">
										<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case/linkedin.png" alt="linkedin" width="20" height="20">
									</div>
								</a>
							</li>
							<li>
								<a href="#" class="whatsapp">
									<div class="fa fa-whatsapp">
										<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case/whatsapp.png" alt="whatsapp" width="20" height="20">
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="post-navigation">
				<div class="previous-post"><?php previous_post_link('%link', '<div class="right-container"><button class="right-container-button"><span class="short-text"><svg class="material-icons" id="icon-chat" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><path d="M0 0H24V24H0V0Z" fill="white"/></mask><g mask="url(#mask0)"><path d="M10.414 10L19.021 18.607L17.607 20.021L9 11.414V19H7V8H18V10H10.414Z" fill="#0A1D35"/></g></svg></span> <span class="long-text" style="">PREV</span></button></div>'); ?></div>
				<div class="next-post"><?php next_post_link('%link', '<div class="right-container"><button class="right-container-button"></span> <span class="long-text" style="">NEXT</span><span class="short-text"><svg class="material-icons" id="icon-chat" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_1_8304" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><path d="M0 0H24V24H0V0Z" fill="white"/></mask><g mask="url(#mask0_1_8304)"><path d="M16.0054 9.414L7.39838 18.021L5.98438 16.607L14.5904 8H7.00538V6H18.0054V17H16.0054V9.414Z" fill="#0A1D35"/></g></svg></span></button></div>'); ?></div>
			</div>

			<div class="comment_box">
				<?php
				if (comments_open() || get_comments_number()) :
					comments_template();
			endif;
			?>
		</div>

	</div>
	<?php if($sidebar_option == 'right' && is_active_sidebar('single-sidebar-blog-page')):?>
		<div class="bwp-sidebar sidebar-blog sidebar_class <?php echo $sidebar_option ?>">
			<?php dynamic_sidebar( 'single-sidebar-blog-page' );?>	
		</div>
	<?php endif; ?>
</div>

</div>

<?php

echo do_shortcode('[book-page-section]');

echo do_shortcode('[testimonial-layout-second]');

echo do_shortcode('[Consultation-layout]');

get_footer(); 

?>


<script type="text/javascript">
	$(".right-container-button").hover(function() {
		$(this).find(".long-text").addClass("show-long-text");
	}, function () {
		$(".long-text").removeClass("show-long-text");
	});
</script>