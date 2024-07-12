<?php
/**
 * wakil Footer Settings
 *
 * @package wakil\Admin
 */

defined('ABSPATH') || exit;

if (class_exists('wakil_Settings_Footer', false)) {

	return new wakil_Settings_Footer();

}

include_once dirname(__FILE__) . '/class-wakil-setting-page.php';

/**
 * wakil_Admin_Settings_Footer.
 */
class wakil_Settings_Footer extends wakil_Settings_Page
{

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		$this->id = 'Footer';

		$this->label = esc_html__('Footer', 'wakil');

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
					'title' => esc_html__('Footer', 'wakil'),
					'type' => 'title',
					'desc' => wp_kses_post('', 'wakil'),
					'id' => 'wakil_page_settings',
					'desc_tip' => false,
				),

				array(
					'title' => esc_html__('Footer', 'wakil'),
					'sub_desc' => esc_html__( 'Select Footer Style', 'wakil' ),
					'desc' => '',
					'id' => 'footer_style',
					'type' => 'select',
					'class' => 'sub-content',
					'desc_tip' => true,
					'options' => flacio_get_footers(),
					'default' => '32'
				),

			);

		return apply_filters('wakil_Footer_settings', $settings);
	}

}

return new wakil_Settings_Footer();