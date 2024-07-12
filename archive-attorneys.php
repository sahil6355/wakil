<!-- Attorneys page -->
<?php 

$bg_img =  esc_url(get_option('attorneys_bg_img'));

$id = get_the_ID();
$attorneys_style = get_option('attorneys_style', '');

?>
<?php get_header(); ?>

<div class="top_header_layout">
	<div class="sub_heder_layout">
		<img src="<?php	if ($bg_img == '') { echo get_template_directory_uri() . '/assets/images/attorneys/attorneys_bg.png';} else { echo $bg_img;	} ?>" alt="service banner">
		<div class="black-overlay"></div>
		<div class="banner-header-content">
			<h1 class="page-title"> Attorneys </h1>
			<?php
			echo do_shortcode('[custom_breadcrumb]'); 
			?>
		</div>
	</div>
</div>

<?php echo flacio_render_attorneys($attorneys_style);	?>

<?php get_footer(); ?>