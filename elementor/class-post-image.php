<?php

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}


if (is_plugin_active('elementor/elementor.php')) {
    class simple_image_Widget extends \Elementor\Widget_Base
    {
        public function get_name() {
            return 'feature_image';
        }

        public function get_title() {
            return __( 'Feature Image', 'elementor-custom-widgets' );
        }

        public function get_categories() {
            return ['custom-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Content', 'elementor-custom-widgets' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'post_id',
                [
                    'label' => __( 'Post ID', 'elementor-custom-widgets' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => get_the_ID(),
                ]
            );

            $this->add_control(
                'select_option',
                [
                    'label' => __( 'Select Option', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'featured_image' => __( 'Featured Image', 'plugin-name' ),
                        'page_title' => __( 'Page Title', 'plugin-name' ),
                    ],
                    'default' => 'page_title',
                ]
            );

            $this->add_responsive_control(
                'alignment',
                [
                    'label' => __( 'Alignment', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'plugin-name' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'plugin-name' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'plugin-name' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .custom-title' => 'text-align: {{VALUE}};','{{WRAPPER}} .custom-image' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'section_style',
                [
                    'label' => __( 'Text Css', 'elementor-custom-widgets' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'selector' => '{{WRAPPER}} .custom-title',
                    'responsive' => true,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .custom-title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'section_image_style',
                [
                    'label' => __( 'Image Css', 'elementor-custom-widgets' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_responsive_control(
                'image_width',
                [
                    'label' => __( 'Image Width', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ '%', 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 1000,
                        ],
                        '%' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .custom-image' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'image_height',
                [
                    'label' => __( 'Image Height', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ '%', 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 1000,
                        ],
                        '%' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .custom-image' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Css_Filter::get_type(),
                [
                    'name' => 'css_filters',
                    'label' => __( 'CSS Filters', 'elementor-custom-widgets' ),
                    'selector' => '{{WRAPPER}} .custom-image',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'selector' => '{{WRAPPER}} .custom-image',
                ]
            );

            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();

            echo '<div class="custom-widget" style="text-align:' . esc_attr( $settings['alignment'] ) . ';">';
            $post_id = $settings['post_id'];
            $feature_image = get_the_post_thumbnail_url( $post_id, 'full' );



            if ( 'featured_image' === $settings['select_option'] ) {

                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'full', [
                        'class' => 'custom-image',
                        // 'style' => 'width: ' . esc_attr( $settings['image_width']['size'] ) . esc_attr( $settings['image_width']['unit'] ) . ';' .
                        // 'height: ' . esc_attr( $settings['image_height']['size'] ) . esc_attr( $settings['image_height']['unit'] ) . ';' .
                        // 'opacity: ' . esc_attr( $settings['opacity']['size'] ) . ';' .
                        // 'border-width: ' . esc_attr( $settings['border_width']['size'] ) . esc_attr( $settings['border_width']['unit'] ) . ';' .
                        // 'border-style: ' . esc_attr( $settings['border_border'] ) . ';' .
                        // 'border-color: ' . esc_attr( $settings['border_color'] ) . ';'
                    ]);
                } else {
                    echo __( 'No featured image found', 'plugin-name' );
                }
            } else {
                echo '<h2 class="custom-title">';
                the_title();
                echo '</h2>';
            }

            echo '</div>';
        }
    }
}