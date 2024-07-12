<?php

/**
 * wakil Case Settings
 *
 * @package wakil\Admin
 */

defined('ABSPATH') || exit;

if (class_exists('wakil_Settings_Case', false)) {

    return new wakil_Settings_Case();
}

include_once dirname(__FILE__) . '/class-wakil-setting-page.php';

/**
 * wakil_Admin_Settings_Case.
 */
class wakil_Settings_Case extends wakil_Settings_Page
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->id = 'Case';

        $this->label = esc_html__('Case', 'wakil');

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
                'title' => esc_html__('Case', 'wakil'),
                'type' => 'title',
                'desc' => wp_kses_post('', 'wakil'),
                'id' => 'wakil_page_settings',
                'desc_tip' => false,
            ),
            array(
               'title' => esc_html__('Background image', 'wakil'),
               'desc' => esc_html__('', 'wakil'),
               'id' => 'case_bg_img',
               'desc_tip' => true,
               'type' => 'file',
               'default' => esc_url(get_template_directory_uri() . '/assets/images/case/bg_image.png'),
           ),

            array(
                'title' => esc_html__('Our case per page', 'wakil'),
                'id' => 'case_number',
                'type' => 'number',
                'default' => '6',
                'class' => 'wakil-btn-text',
                'desc_tip' => true,
            ),

            array(
                'title' => esc_html__('Case Grid Option', 'wakil'),
                'type' => 'select',
                'id' => 'case_grid_layout',
                'options' => array(
                    '2' => __( 'Cases - Grid 2 Columns', 'wakil' ),
                    '3' => __( 'Cases - Grid 3 Columns', 'wakil' ),
                    '4' => __( 'Cases - Grid 4 Columns', 'wakil' ),
                    '3_wide' => __( 'Cases - Grid 3 Columns Wide', 'wakil' ),
                    '4_wide' => __( 'Cases - Grid 4 Columns Wide', 'wakil' ),
                    '5_wide' => __( 'Cases - Grid 5 Columns Wide', 'wakil' ),
                    'masonry_1' => __( 'Cases - Cases - Masonry 1', 'wakil' ),
                    'masonry_2' => __( 'Cases - Cases - Masonry 2', 'wakil' ),
                    'masonry_3' => __( 'Cases - Cases - Masonry 3', 'wakil' ),
                ),
                'default' => '2',
                'desc_tip' => true,
            ),

            array(
               'type' => 'sectionend',
               'id'   => 'wakil_service_page',
            ),

            array(
               'title' => esc_html__('single service page ', 'wakil'),
               'type'  => 'title',
               'id'    => 'wakil_weekend_mode',
            ),

            array(
                'title' => esc_html__('Background image', 'wakil'),
                'desc' => esc_html__('', 'wakil'),
                'id' => 'case_bg_img',
                'desc_tip' => true,
                'type' => 'file',
                'default' => esc_url(get_template_directory_uri() . '/assets/images/case/single_case_bg_img.png'),
            ),

            array(
                'id'=>'sidebar_case_blog',
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

        return apply_filters('wakil_Case_settings', $settings);
    }
}

return new wakil_Settings_Case();
