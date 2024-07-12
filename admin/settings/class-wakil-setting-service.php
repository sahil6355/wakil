<?php

/**
 * wakil Service Settings
 *
 * @package wakil\Admin
 */

defined('ABSPATH') || exit;

if (class_exists('wakil_Settings_Service', false)) {

    return new wakil_Settings_Service();
}

include_once dirname(__FILE__) . '/class-wakil-setting-page.php';

/**
 * wakil_Admin_Settings_Service.
 */
class wakil_Settings_Service extends wakil_Settings_Page
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->id = 'Service';

        $this->label = esc_html__('Service', 'wakil');

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
                'title' => esc_html__('Service', 'wakil'),
                'type' => 'title',
                'desc' => wp_kses_post('', 'wakil'),
                'id' => 'wakil_page_settings',
                'desc_tip' => false,
            ),

            array(
                'id' => 'layout_blog',
                'type' => 'select',
                'title' => esc_html__('Page Layout', 'wakil'),
                'options' => flacio_get_service(),
                'default' => 'first',
                'sub_desc' => esc_html__( 'Select style layout blog', 'wakil' ),
            ),

            array(
                'title' => esc_html__('Background image', 'wakil'),
                'desc' => esc_html__('', 'wakil'),
                'id' => 'service_home_bg_img',
                'desc_tip' => true,
                'type' => 'file',
                'default' => esc_url(get_template_directory_uri() . '/assets/images/services/service_bg_img.png'),
            ),

            array(
                'type' => 'sectionend',
                'id'   => 'wakil_service_page',
            ),

            array(
                'title' => esc_html__('single service page ', 'wakil'),
                'type'  => 'title',
                'id'    => 'salva_weekend_mode',
            ),

            array(
                'title' => esc_html__('Background image', 'wakil'),
                'desc' => esc_html__('', 'wakil'),
                'id' => 'service_bg_img',
                'desc_tip' => true,
                'type' => 'file',
                'default' => esc_url(get_template_directory_uri() . '/assets/images/services/header_top.png'),
            ),

            array(
                'id'=>'sidebar_blog',
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
        return apply_filters('wakil_Service_settings', $settings);
    }
}

return new wakil_Settings_Service();
