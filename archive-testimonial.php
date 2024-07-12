<!-- Testimonial page -->
<?php
$bg_img =  esc_url(get_option('testimonial_bg_img'));
$testimonial_layout = get_option('testimonial_layout');
if (empty($test_number)) {
	$test_number = 2; 
}
if (empty($test_load_number)) {
	$test_load_number = 2;
}

get_header(); 

?>
<div class="top_header_layout">
	<div class="sub_heder_layout">
		<img src="<?php	if ($bg_img == '') { echo get_template_directory_uri() . '/assets/images/attorneys/attorneys_bg.png';}else {echo $bg_img;} ?>" alt="service banner">
		<div class="black-overlay"></div>
		<div class="banner-header-content">
			<h1 class="page-title"> Testimonial </h1>
			<?php
			echo do_shortcode('[custom_breadcrumb]');
			?>
		</div>
	</div>
</div>

<?php 
/* Layout wise display post*/
if($testimonial_layout == 'Layout1'){
	echo do_shortcode('[testimonial-layout-first]');
} else {
	echo do_shortcode('[testimonial-layout-second]');
}

echo do_shortcode('[Consultation-layout]');

get_footer();