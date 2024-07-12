<?php get_header(); ?>
<?php 

$services_style = get_option('layout_blog');
$bg_img = esc_url(get_option('service_home_bg_img'));

?>

<div class="top_header_layout">
	<div class="sub_heder_layout">
		<img src="<?php	if ($bg_img == '') { echo get_template_directory_uri() . '/assets/images/services/service_bg_img.png';} else { echo $bg_img;	} ?>" alt="service banner">
		<div class="black-overlay"></div>
		<div class="banner-header-content">
			<h1 class="page-title"> Our Services </h1>
			<?php
			echo do_shortcode('[custom_breadcrumb]'); 
			?>
		</div>
	</div>
</div>

<?php echo flacio_render_services($services_style);	?>
<?php get_footer(); ?>