<?php 
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if (is_plugin_active('elementor/elementor.php')) {

	class Custom_Text_Slider_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'custom-text-slider';
		}

		public function get_title() {
			return __( 'Custom Text Slider', 'text-domain' );
		}

		public function get_icon() {
			return 'eicon-gallery-grid';
		}

		public function get_categories() {
			return ['custom-category'];
		}



		protected function _register_controls() {
			$this->start_controls_section(
				'section_content',
				[
					'label' => __( 'Slides', 'text-domain' ),
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'tab_title',
				[
					'label' => __( 'Tab Title', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Default title', 'text-domain' ),
					'placeholder' => __( 'Type your title here', 'text-domain' ),
				]
			);

			$this->add_control(
				'tabs',
				[
					'label' => __( 'Tabs', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'tab_title' => __( 'Tab #1', 'text-domain' ),
						],
						[
							'tab_title' => __( 'Tab #2', 'text-domain' ),
						],
					],
					'title_field' => '{{{ tab_title }}}',
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'section_style',
				[
					'label' => __( 'Style', 'text-domain' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .marquee-item' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => __( 'Title Typography', 'text-domain' ),
					'selector' => '{{WRAPPER}} .marquee-item',
				]
			);

			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings_for_display();
			?>
			<div class="marquee-container">
				<?php foreach ( $settings['tabs'] as $slide ) : ?>
					<p class="marquee-item"><?php echo esc_attr( $slide['tab_title'] ); ?></p>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}

?>