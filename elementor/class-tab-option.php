<?php 
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if (is_plugin_active('elementor/elementor.php')) {

	class tab_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'tab_list';
		}

		public function get_title() {
			return __( 'Tab List', 'text-domain' );
		}

		public function get_icon() {
			return 'eicon-tabs';
		}

		public function get_categories() {
			return ['custom-category'];
		}

		protected function _register_controls() {

			$this->start_controls_section(
				'section_content',
				[
					'label' => __( 'Content', 'text-domain' ),
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

			$repeater->add_control(
				'tab_icon',
				[
					'label' => __( 'Tab Icon', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater->add_control(
				'tab_image',
				[
					'label' => __( 'Tab Image', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater->add_control(
				'tab_content',
				[
					'label' => __( 'Tab Content', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => __( 'Default content', 'text-domain' ),
					'placeholder' => __( 'Type your content here', 'text-domain' ),
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
							'tab_icon' => [
								'url' => \Elementor\Utils::get_placeholder_image_src(),
							],
							'tab_image' => [
								'url' => \Elementor\Utils::get_placeholder_image_src(),
							],
							'tab_content' => __( 'Content for Tab #1', 'text-domain' ),
						],
						[
							'tab_title' => __( 'Tab #2', 'text-domain' ),
							'tab_icon' => [
								'url' => \Elementor\Utils::get_placeholder_image_src(),
							],
							'tab_image' => [
								'url' => \Elementor\Utils::get_placeholder_image_src(),
							],
							'tab_content' => __( 'Content for Tab #2', 'text-domain' ),
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
				'date_color',
				[
					'label' => __( 'Title Color', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tabs-list .tab-title h3' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => __( 'title Typography', 'text-domain' ),
					'selector' => '{{WRAPPER}} .tabs-list .tab-title h3',
				]
			);


			$this->add_control(
				'tab_content_color',
				[
					'label' => __( 'Content Color', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tab-content2 .tab_detail' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'tab_content_typography',
					'label' => __( 'Content Typography', 'text-domain' ),
					'selector' => '{{WRAPPER}} .tab-content2 .tab_detail',
				]
			);

			$this->end_controls_section();


			$this->start_controls_section(
				'icon_style',
				[
					'label' => __( 'icone Css', 'text-domain' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_responsive_control(
				'tab_icon_width',
				[
					'label' => __( 'icone Width', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 800,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tabs-list li img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_responsive_control(
				'tab_icon_height',
				[
					'label' => __( 'icone Height', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 800,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tabs-list li img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_section();


			$this->start_controls_section(
				'image_style',
				[
					'label' => __( 'image  Css', 'text-domain' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);


			$this->add_responsive_control(
				'tab_image_width',
				[
					'label' => __( 'Image Width', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 800,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tab-content2 img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_responsive_control(
				'tab_image_height',
				[
					'label' => __( 'Image Height', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 800,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tab-content2 img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_section();

		}

		protected function render() {
			$settings = $this->get_settings_for_display();

			echo '<div class="tabs-widget">';
			echo '<ul class="tabs-list">';
			foreach ( $settings['tabs'] as $index => $item ) {
				echo '<li class="tab-title"><a href="#tab-'. $index . '">';
				echo '<div class="tab-icone-img">';
				if ( ! empty( $item['tab_icon']['url'] ) ) {
					echo '<img src="' . esc_url( $item['tab_icon']['url'] ) . '" alt="' . esc_attr( $item['tab_title'] ) . '" />';
				}
				echo '</div>';
				echo ' <h3>'. $item['tab_title'] .'</h3></a></li>';
			}
			echo '</ul>';
			echo '<div class="tabs-content">';
			foreach ( $settings['tabs'] as $index => $item ) {
				echo '<div class="tab-content2" id="tab-'.  $index .'">';
				if ( ! empty( $item['tab_image']['url'] ) ) {
					echo '<img src="' . esc_url( $item['tab_image']['url'] ) . '" alt="' . esc_attr( $item['tab_title'] ) . '" />';
				}
				echo '<div class="tab_detail">'. $item['tab_content'] .'</div>';
				echo '</div>';
			}
			echo '</div>';
			echo '</div>';
		}
	}
}

?>