<?php

/**
 * Used Code :'class-bermiz-elements.php'.
 */



class wakil_Elements
{

	protected static $instance = null;

	public static function get_instance()
	{
		if (!isset(static::$instance)) {
			static::$instance = new static;
		}
		return static::$instance;
	}

	protected function __construct()
	{
		require_once('class-simple-select-option.php');
		require_once('class-breadcrumb-option.php');
		require_once('class-attorneys-option.php');
		require_once('class-post-option.php');
		require_once('class-post-image.php');
		require_once('class-cat-option.php');
		require_once('class-testimonial-option.php');
		require_once('class-post-format-option.php');
		require_once('class-feature-case-option.php');
		require_once('class-subattorneys-option.php');
		require_once('class-histry-option.php');
		require_once('class-tab-option.php');
		require_once('class-text-slider-option.php');
		require_once('class-blog-option.php');
		require_once('class-loop-carousel-option.php');

		add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
	}

	public function register_widgets()
	{
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_select_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_breadcrumb_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_attorneys_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_post_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_cat_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_testimonial_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_image_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_post_formate_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_feature_case_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new simple_subattorneys_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new History_List_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new tab_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Custom_Text_Slider_Widget ());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Custom_blog_Widget ());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Custom_loop_carousel_Widget ());
	}
}

add_action('init', 'elementor_shortcode_widget_callback');
function elementor_shortcode_widget_callback()
{
	wakil_Elements::get_instance();
}
