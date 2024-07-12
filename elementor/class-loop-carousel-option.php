<?php 
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if (is_plugin_active('elementor/elementor.php')) {

	class Custom_loop_carousel_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'custom-carousel-widget';
		}

		public function get_title() {
			return 'Custom Carousel Widget';
		}

		public function get_categories() {
			return ['custom-category'];
		}

		protected function _register_controls() {

			$this->start_controls_section(
				'section_content',
				[
					'label' => __('slider layout Select', 'your-elementor-addon'),
				]
			);

			$this->add_control( 'select_option',[ 'label' => __
				('Select Layout', 'your-elementor-addon'), 'type'
				=> \Elementor\Controls_Manager::SELECT, 'default'
				=> 'option1', 'options' => [ 'option1' => __('slider Layout
					1', 'your-elementor-addon'), 'option2' => __('slider Layout
					2', 'your-elementor-addon'), ], ] );

			$this->end_controls_section();
			$this->start_controls_section(
				'slider_option',
				[
					'label' => __( 'content', 'elementor-custom-widgets' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'image',
				[
					'label' => __( 'Image', 'your-plugin-text-domain' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater->add_control(
				'title',
				[
					'label' => __( 'Title', 'your-plugin-text-domain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Slide Title', 'your-plugin-text-domain' ),
				]
			);

			$repeater->add_control(
				'button_text',
				[
					'label' => __( 'Button Text', 'your-plugin-text-domain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Click Here', 'your-plugin-text-domain' ),
				]
			);

			$repeater->add_control(
				'button_link',
				[
					'label' => __( 'Button Link', 'your-plugin-text-domain' ),
					'type' => \Elementor\Controls_Manager::URL,
					'default' => [
						'url' => '#',
					],
				]
			);

			$repeater->add_control(
				'subheading',
				[
					'label' => __( 'Subheading', 'your-plugin-text-domain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Subheading', 'your-plugin-text-domain' ),
				]
			);

			$repeater->add_control(
				'subtext',
				[
					'label' => __( 'Subtext', 'your-plugin-text-domain' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => __( 'This is some subtext.', 'your-plugin-text-domain' ),
				]
			);

			$repeater->add_control(
				'subtext2',
				[
					'label' => __( 'Subtext 2', 'your-plugin-text-domain' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => __( 'This is some additional subtext.', 'your-plugin-text-domain' ),
				]
			);

			$this->add_control(
				'slides',
				[
					'label' => __( 'Slides', 'your-plugin-text-domain' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'title' => __( 'Slide 1', 'your-plugin-text-domain' ),
						],
						[
							'title' => __( 'Slide 2', 'your-plugin-text-domain' ),
						],
					],
					'title_field' => '{{{ title }}}',
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
				'carousel_title_color',
				[
					'label' => __( 'Title Color', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .carousel-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'carousel_title_typography',
					'label' => __( 'title Typography', 'text-domain' ),
					'selector' => '{{WRAPPER}} .carousel-title',
				]
			);

			$this->add_control(
				'carousel_subtitle_color',
				[
					'label' => __( 'Title2 Color', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .carousel-subheading' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'carousel_subtext_color',
				[
					'label' => __( 'sub text Color', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .carousel-subtext' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'carousel_subtext_typography',
					'label' => __( 'title Typography', 'text-domain' ),
					'selector' => '{{WRAPPER}} .carousel-subtext',
				]
			);

			$this->add_control(
				'carousel_text_color',
				[
					'label' => __( 'sub text2 Color', 'text-domain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .carousel-subtext2' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'carousel_text_typography',
					'label' => __( 'title Typography', 'text-domain' ),
					'selector' => '{{WRAPPER}} .carousel-subtext2',
				]
			);


			$this->end_controls_section();

		}	

		protected function render() {
			$settings = $this->get_settings_for_display();
			if ($settings['select_option'] == 'option1') {
				if ( ! empty( $settings['slides'] ) ) {
					?>
					<section class="hero-sec-v2">
						<div class="slider-v2 slider">
							<?php

							foreach ( $settings['slides'] as $index => $slide ) {
								$animationClasses = [
									'anim-4parts',
									'anim-9parts',
									'anim-5parts',
									'anim-3parts'
								];

								$animationClass = $animationClasses[$index % count($animationClasses)];
								$backgroundImage = esc_url( $slide['image']['url'] );
								?>
								<div class="slider--el slider--el-<?php echo $index + 1; ?> <?php echo $animationClass; ?> <?php echo $index === 0 ? 'active' : ''; ?>" data-bg-image="<?php echo $backgroundImage; ?>">
									<div class="slider--el-bg">
										<?php if ($animationClass === 'anim-4parts') { ?>
											<div class="part top left"></div>
											<div class="part top right"></div>
											<div class="part bot left"></div>
											<div class="part bot right"></div>
										<?php } elseif ($animationClass === 'anim-9parts') { ?>
											<div class="part left-top"></div>
											<div class="part mid-top"></div>
											<div class="part right-top"></div>
											<div class="part left-mid"></div>
											<div class="part mid-mid"></div>
											<div class="part right-mid"></div>
											<div class="part left-bot"></div>
											<div class="part mid-bot"></div>
											<div class="part right-bot"></div>
										<?php } elseif ($animationClass === 'anim-5parts') { ?>
											<div class="part part-1"></div>
											<div class="part part-2"></div>
											<div class="part part-3"></div>
											<div class="part part-4"></div>
											<div class="part part-5"></div>
										<?php } elseif ($animationClass === 'anim-3parts') { ?>
											<div class="part left"></div>
											<div class="part mid"></div>
											<div class="part right"></div>
										<?php } ?>
									</div>

									<div class="slider--el-content">
										<div class="hero-content">
											<?php 
											if ( ! empty( $slide['subtext'] ) ) {
												echo '<p class="carousel-subtext">' . esc_html( $slide['subtext'] ) . '</p>';
											}
											?>
											<?php 
											if ( ! empty( $slide['title'] ) ) {
												echo '<h1 class="carousel-title">' . esc_html( $slide['title'] ) . '</h1>';
											}
											?>
											<div class="in-top button-whole-wrap">
												<a href="<?php echo esc_url( $slide['button_link']['url'] ); ?>" class="button-wrap">
													<span>
														<?php echo esc_html( $slide['button_text'] ); ?> <i class="ri-arrow-right-line"></i>
													</span>
												</a>
											</div>
										</div>
									</div>

								</div>
								<?php
							}
							?>
							<div class="slider--control left">
								<i class="ri-arrow-left-line"></i>
							</div>
							<div class="slider--control right">
								<i class="ri-arrow-right-line"></i>
							</div>
						</div>
					</section>
					<?php
				}
			} else if ($settings['select_option'] == 'option2'){
				if ( ! empty( $settings['slides'] ) ) {
					?>
					<section class="hero-sec-v3">
						<div class="slider-v3"> 
							<?php 
							foreach ( $settings['slides'] as $index => $slide ) {
								$backgroundImage = esc_url( $slide['image']['url'] );
								?>
								<div class="slider--el2" data-bg-image="<?php echo $backgroundImage; ?>">
									<div class="hero-sec-v3-overlay"></div>
									<div class="bg_slider_image">

										<div class="slider--el-content">
											<div class="hero-content">
												<img class="dot-Vector" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home/dot-Vector.png">
												<img class="dot-Vector2" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home/dot-Vector2.png">
												<?php 
												if ( ! empty( $slide['subtext'] ) ) {
													echo '<p class="carousel-subtext">' . esc_html( $slide['subtext'] ) . '</p>';
												}

												if ( ! empty( $slide['title'] ) ) {
													echo '<h1 class="carousel-title">' . esc_html( $slide['title'] ) . '</h1>';
												}

												if ( ! empty( $slide['title'] ) ) {
													echo '<div class="planet"><div class="rings"></div><h2 class="carousel-subheading carousel-title">' . esc_html( $slide['subheading'] ) . '</h2></div>';
												}

												if ( ! empty( $slide['title'] ) ) {
													echo '<p class="carousel-subtext2">' . esc_html( $slide['subtext2'] ) . '</p>';
												}
												?>
												<div class="in-top button-whole-wrap">
													<a href="<?php echo esc_url( $slide['button_link']['url'] ); ?>" class="button-wrap">
														<span>
															<?php echo esc_html( $slide['button_text'] ); ?> <i class="ri-arrow-right-line"></i>
														</span>
													</a>
												</div>
											</div>
										</div>

									</div>
								</div>
								<?php
							}
							?>
						</div>
					</section>
					<?php
				}
			}
		}	
	}
}