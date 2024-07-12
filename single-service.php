<?php get_header(); ?>


<?php 

$bg_img =  esc_url(get_option('service_bg_img'));

$global_sidebar_option = get_option('sidebar_blog');

// Retrieve the post-specific sidebar option
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
		<img src="<?php	if ($bg_img == '') { echo get_template_directory_uri() . '/assets/images/services/header_top.png';}else {echo $bg_img;} ?>" alt="service banner">
		<div class="black-overlay"></div>
		<div class="banner-header-content">
			<h1 class="page-title"> Single Services </h1>
			<?php
			echo do_shortcode('[custom_breadcrumb]');
			?>
		</div>
	</div>
</div>

<div class="main_single_contain p-100 <?php echo $sidebar_option; ?>">

	<div class="sub_main_single_contain">
		<?php if($sidebar_option == 'left' && is_active_sidebar('sidebar-blog')):?>
			<div class="bwp-sidebar sidebar-blog sidebar_class <?php echo $sidebar_option ?>">
				<?php dynamic_sidebar( 'sidebar-blog' );?>	
			</div>
		<?php endif; ?>
		<div class="single_page_main_contain">
			<?php the_content();  ?>
		</div>
		<?php if($sidebar_option == 'right' && is_active_sidebar('sidebar-blog')):?>
			<div class="bwp-sidebar sidebar-blog sidebar_class <?php echo $sidebar_option ?>">
				<?php dynamic_sidebar( 'sidebar-blog' );?>	
			</div>
		<?php endif; ?>
	</div>

</div>

<?php

echo do_shortcode('[horizontal-scroll]'); 

echo do_shortcode('[testimonial-layout-second]');

echo do_shortcode('[Consultation-layout]');

get_footer();