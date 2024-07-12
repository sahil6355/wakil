<?php

/**
 * wakil functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wakil
 * @since wakil 1.0
 */

add_filter('upload_mimes', 'add_file_types_to_uploads');
function add_file_types_to_uploads($file_types) {
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);
	return $file_types;
}

function add_theme_style() {
	wp_enqueue_script('jquery-script', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js');
	wp_enqueue_style('font', get_stylesheet_directory_uri() . '/assets/fonts/remixicon.css');
	wp_enqueue_style('font-css', get_stylesheet_directory_uri() . '/assets/css/fonts.css');
	wp_enqueue_style('cursor', get_stylesheet_directory_uri() . '/assets/css/cursor.css');
	wp_enqueue_style('silk', get_stylesheet_directory_uri() . '/assets/css/slick.css');
	wp_enqueue_style('silk-theme', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css');
	wp_enqueue_style('main-custome-css', get_stylesheet_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('media-query', get_stylesheet_directory_uri() . '/assets/css/media-query.css');
}
add_action('wp_head', 'add_theme_style',9999);

function add_theme_scripts() {
	wp_enqueue_script('hammer-js', get_stylesheet_directory_uri() . '/assets/js/hammer.min.js');
	wp_enqueue_script('slick-script', get_stylesheet_directory_uri() . '/assets/js/slick.min.js');
	wp_enqueue_script('cursor-script', get_stylesheet_directory_uri() . '/assets/js/cursor.js');
	wp_enqueue_script('gsap-js', get_stylesheet_directory_uri() . '/assets/js/gsap.min.js');
	wp_enqueue_script('ScrollTrigger-js', get_stylesheet_directory_uri() . '/assets/js/ScrollTrigger.min.js');
	wp_enqueue_script('masonry-js', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.min.js');
	wp_enqueue_script('imagesloaded-js', get_stylesheet_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js');
	wp_enqueue_script('custome-script', get_stylesheet_directory_uri() . '/assets/js/custom.js');
	wp_enqueue_script('public-custome-script', get_stylesheet_directory_uri() . '/assets/js/public-custom.js');
}
add_action('wp_footer', 'add_theme_scripts');


function wakil_setup()
{
	add_theme_support('menus');
	add_theme_support('widgets');
	add_theme_support('widgets-block-editor');
	add_theme_support('post-thumbnails');
	add_theme_support('post-thumbnails', array('post'));         
	add_theme_support('post-thumbnails', array('page'));         
	add_theme_support('post-thumbnails', array('post', 'movie'));
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
	add_theme_support("title-tag");
	add_theme_support( 'post-formats', array('gallery', 'video', 'quote', 'link', 'audio' ) );
	add_theme_support("responsive-embeds");
	add_theme_support("automatic-feed-links");
	add_theme_support('comments');

	if (!isset($content_width)) {
		$content_width = 1920;
	}
	register_nav_menus(["main-menu" => esc_html__("Main Menu", "wakil")]);
}

add_action("after_setup_theme", "wakil_setup");


add_action('pre_get_posts', 'add_my_post_types_to_query');
function add_my_post_types_to_query($query)
{
	if (is_home() && $query->is_main_query())
		$query->set('post_type', array('post'));
	return $query;
}

/*===============================================================================
=================================== footer ======================================
===============================================================================*/

function bwp_create_type_footer()
{
	register_post_type(
		'bwp_footer',
		array(
			'labels' => array(
				'name' => __('Footer', 'wakil'),
				'singular_name' => __('Footer', 'wakil')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'footers'),
			'menu_position' => 8,
			'show_in_menu' => false,
		)
	);

	if ($bwp_js_content_types = get_option('bwp_js_content_types')) {
		if (!in_array('bwp_footer', $bwp_js_content_types)) {
			$bwp_js_content_types[] = 'bwp_footer';
		}
		$options[] = 'bwp_footer';
		update_option('bwp_js_content_types', $bwp_js_content_types);
	} else {
		$options = array('page', 'bwp_footer');
	}
}
add_action('init', 'bwp_create_type_footer', 2);

function flacio_render_footer($footer_style)
{
	$elementor_instance = Elementor\Plugin::instance();
	return $elementor_instance->frontend->get_builder_content_for_display($footer_style);
}


if (!function_exists('flacio_get_footers')) :
	function flacio_get_footers()
	{
		$footer = array();
		$footers = get_posts(array(
			'posts_per_page' => -1,
			'post_type' => 'bwp_footer',
			'orderby'          => 'name',
			'order'            => 'ASC'
		));
		foreach ($footers as  $key => $value) {
			$footer[$value->ID] = $value->post_title;
		}
		return $footer;
	}
endif;

if (!function_exists('get_footers_types')) :
	function get_footers_types()
	{
		$footer = array('' => esc_html__('Default', 'wakil'));
		$footers = get_posts(array(
			'posts_per_page' => -1,
			'post_type' => 'bwp_footer',
			'orderby'          => 'name',
			'order'            => 'ASC'
		));
		foreach ($footers as  $value) {
			$footer[$value->ID] = $value->post_title;
		}
		return $footer;
	}
endif;

function flacio_get_config($option, $default = '1')
{
	$flacio_settings = flacio_global_settings();
	$query_string = flacio_get_query_string();
	parse_str($query_string, $params);
	if (isset($params[$option]) && $params[$option]) {
		return $params[$option];
	} else {
		$value = isset($flacio_settings[$option]) ? $flacio_settings[$option] : $default;
		return $value;
	}
}

/*===============================================================================
=================================== Attorneys ===================================
===============================================================================*/

function bwp_create_type_attorney()
{
	register_post_type(
		'bwp_attorneys',
		array(
			'labels' => array(
				'name' => __('Attorney', 'wakil'),
				'singular_name' => __('Attorney', 'wakil')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'Attorneys'),
			'menu_position' => 8,
			'show_in_menu' => false,
		)
	);

	if ($bwp_js_content_types = get_option('bwp_js_content_types')) {
		if (!in_array('bwp_attorneys', $bwp_js_content_types)) {
			$bwp_js_content_types[] = 'bwp_attorneys';
		}
		$options[] = 'bwp_attorneys';
		update_option('bwp_js_content_types', $bwp_js_content_types);
	} else {
		$options = array('page', 'bwp_attorneys');
	}
}
add_action('init', 'bwp_create_type_attorney', 3);


function flacio_render_attorneys($attorneys_style)
{
	$elementor_instance = Elementor\Plugin::instance();
	return $elementor_instance->frontend->get_builder_content_for_display($attorneys_style);
}


if (!function_exists('flacio_get_attorneys')) :
	function flacio_get_attorneys()
	{
		$attorneys = array();
		$attorneys_main = get_posts(array(
			'posts_per_page' => -1,
			'post_type' => 'bwp_attorneys',
			'orderby'          => 'name',
			'order'            => 'ASC'
		));
		foreach ($attorneys_main as  $key => $value) {
			$attorneys[$value->ID] = $value->post_title;
		}
		return $attorneys;
	}
endif;

/************************************************************************
************* Add new category option for Elementor widgets *************
************************************************************************/

function custom_elementor_widgets_category( $elements_manager ) {
	$elements_manager->add_category(
		'custom-category',
		[
			'title' => __( 'Theme Option', 'text-domain' ),
			'icon'  => 'fa fa-folder',
			'priority' => -1,
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'custom_elementor_widgets_category' );

/*===============================================================================
=================================== Services ====================================
===============================================================================*/

function bwp_create_type_service()
{
	register_post_type(
		'bwp_service',
		array(
			'labels' => array(
				'name' => __('Service', 'wakil'),
				'singular_name' => __('Service', 'wakil')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'Services'),
			'menu_position' => 8,
			'show_in_menu' => false,
		)
	);

	if ($bwp_js_content_types = get_option('bwp_js_content_types')) {
		if (!in_array('bwp_service', $bwp_js_content_types)) {
			$bwp_js_content_types[] = 'bwp_service';
		}
		$options[] = 'bwp_service';
		update_option('bwp_js_content_types', $bwp_js_content_types);
	} else {
		$options = array('page', 'bwp_service');
	}
}
add_action('init', 'bwp_create_type_service', 3);


function flacio_render_services($services_style)
{
	$elementor_instance = Elementor\Plugin::instance();
	return $elementor_instance->frontend->get_builder_content_for_display($services_style);
}


if (!function_exists('flacio_get_service')) :
	function flacio_get_service()
	{
		$services = array();
		$services_main = get_posts(array(
			'posts_per_page' => -1,
			'post_type' => 'bwp_service',
			'orderby'          => 'name',
			'order'            => 'ASC'
		));
		foreach ($services_main as  $key => $value) {
			$services[$value->ID] = $value->post_title;
		}
		return $services;
	}
endif;


function wpb_set_post_views($postID) {
	$count_key = 'wpb_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_get_post_views($postID){
	$count_key = 'wpb_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count.' Views';
}

function calculate_reading_time($post_id) {
	$content = get_post_field('post_content', $post_id);
	$word_count = str_word_count(strip_tags($content));
	$reading_time = ceil($word_count / 200);
	return $reading_time;
}

/**********************************************************
******************** all page include ********************* 
**********************************************************/


require_once('elementor/class-wakil-elements.php');
require get_template_directory() . "/admin/wakil-admin.php";
require get_template_directory() . "/inc/customize_css/customize_css.php";
require get_template_directory() . "/shortcode/service-shortcode.php";
require get_template_directory() . "/shortcode/video-play-button.php";
require get_template_directory() . "/shortcode/testimonial-layout.php";
require get_template_directory() . "/shortcode/breadcrumbs.php";
require get_template_directory() . "/shortcode/Consultation.php";
require get_template_directory() . "/shortcode/single-page-section.php";
require get_template_directory() . "/shortcode/feature-case.php";
require get_template_directory() . "/custome-post.php";
require get_template_directory() . "/widgets/widgets.php";
require get_template_directory() . "/metabox.php";


/**********************************************************
******************* Coming soon function ******************
**********************************************************/

$maintenance = get_option('wakil_maintenance_mode');
if($maintenance == "Unable"){
	function redirect_to_coming_soon() {
		if (!is_user_logged_in() && !is_page('coming-soon')) {
			include( get_template_directory() . '/coming-soon.php' );
			exit();
		}
	}
	add_action('template_redirect', 'redirect_to_coming_soon');
}



/************************************************************************************************
 *************************************** OCDI demo import ***************************************
 ************************************************************************************************/


function ocdi_register_plugins($plugins)
{
	$theme_plugins = [
		[
			'name'     => 'Elementor',
			'slug'     => 'elementor',
			'required' => true,
		],
		[
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => true,
		]

	];

	return array_merge($plugins, $theme_plugins);
}
add_filter('ocdi/register_plugins', 'ocdi_register_plugins');



function ocdi_import_files() {
	return [
		[
			'import_file_name'           => 'Wakil',
			'import_file_url'            => trailingslashit(get_stylesheet_directory_uri()) . 'ocdi/demo-content.xml',
			'import_file_widgets_url'    => trailingslashit(get_stylesheet_directory_uri()) . 'ocdi/customizer.dat',
			'local_import_widget_file'   => trailingslashit(get_stylesheet_directory_uri()) . 'ocdi/widgets.wie',
			'import_preview_image_url'   => 'http://www.your_domain.com/ocdi/preview_import_image2.jpg',
			'preview_url'                => 'http://www.your_domain.com/my-demo-2',
		],
	];
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );
