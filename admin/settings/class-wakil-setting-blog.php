<?php

/**
 * wakil Blog Settings
 *
 * @package wakil\Admin
 */

defined('ABSPATH') || exit;

if (class_exists('wakil_Settings_Blog', false)) {

    return new wakil_Settings_Blog();
}

include_once dirname(__FILE__) . '/class-wakil-setting-page.php';

/**
 * wakil_Admin_Settings_Blog.
 */
class wakil_Settings_Blog extends wakil_Settings_Page
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->id = 'Blog';

        $this->label = esc_html__('Blog', 'wakil');

        parent::__construct();
    }

    /**
     * Get settings or the default section.
     *
     * @return array
     */
    protected function get_settings_for_default_section()
    {
        $wptime_plus_7_days = current_time('timestamp') + (7 * 86400);
        $settings =
        array(

            array(
                'title' => esc_html__('Blog', 'wakil'),
                'type' => 'title',
                'desc' => wp_kses_post('', 'wakil'),
                'id' => 'wakil_page_settings',
                'desc_tip' => false,
            ),

            array(
                'title' => esc_html__('Background image', 'wakil'),
                'desc' => esc_html__('', 'wakil'),
                'id' => 'blog_bg_img',
                'desc_tip' => true,
                'type' => 'file',
                'default' => esc_url(get_template_directory_uri() . '/assets/images/blog/blog_bg_img.png'),
            ),

            array(
                'title' => esc_html__('Our Blog per page', 'wakil'),
                'id' => 'blog_number',
                'type' => 'number',
                'default' => '6',
                'class' => 'wakil-btn-text',
                'desc_tip' => true,
            ),

            array(
                'id'=>'sidebar_blog_post',
                'type' => 'select',
                'class' => 'img_option',
                'title' => esc_html__('single Page Layout', 'flacio'),
                'default' => 'standard',
                'options' => array(
                    "standard" => esc_html__("Standard", 'wakil'),
                    "left" => esc_html__("Left sidebar", 'wakil'),
                    "right" => esc_html__("Right sidebar", 'wakil'),
                ),
            ),

            array(
                'title' => esc_html__('Blog Order', 'wakil'),
                'type' => 'select',
                'id' => 'blog_order',
                'options' => array(
                    'ASC' => __( 'Ascending order', 'wakil' ),
                    'DESC' => __( 'Descending order', 'wakil' ),
                ),
                'default' => 'ASC',
                'desc_tip' => true,
            ),


            array(
                'title' => esc_html__('Blog Layout Option', 'wakil'),
                'type' => 'select',
                'id' => 'blog_layout_post',
                'options' => array(
                    'post_format_layout' => __( 'Blog Format Layout', 'wakil' ),
                    '2' => __( 'Blogs - Grid 2 Columns', 'wakil' ),
                    '3' => __( 'Blogs - Grid 3 Columns', 'wakil' ),
                    '4' => __( 'Blogs - Grid 4 Columns', 'wakil' ),
                    'masonry_1' => __( 'Blogs - Masonry', 'wakil' ),


                ),
                'default' => 'post_format_layout',
                'desc_tip' => true,
            ),

            array(
               'type' => 'sectionend',
               'id'   => 'wakil_service_page',
            ),

            array(
               'title' => esc_html__('Single Post Page ', 'wakil'),
               'type'  => 'title',
               'id'    => 'wakil_weekend_mode',
            ),

            array(
                'title' => esc_html__('Single Post Page Background image', 'wakil'),
                'desc' => esc_html__('', 'wakil'),
                'id' => 'single_blog_bg_img',
                'desc_tip' => true,
                'type' => 'file',
                'default' => esc_url(get_template_directory_uri() . '/assets/images/blog/single_blog_bg.png'),
            ),

            array(
                'id'=>'single_sidebar_blog',
                'type' => 'select',
                'class' => 'img_option',
                'title' => esc_html__('single Page Layout', 'flacio'),
                'default' => 'standard',
                'options' => array(
                    "standard" => esc_html__("Standard", 'wakil'),
                    "left" => esc_html__("Left sidebar", 'wakil'),
                    "right" => esc_html__("Right sidebar", 'wakil'),
                ),
            ),
        );

        return apply_filters('wakil_Blog_settings', $settings);
    }
}

return new wakil_Settings_Blog();
