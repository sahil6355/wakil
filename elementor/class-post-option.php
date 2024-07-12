<?php

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}


if (is_plugin_active('elementor/elementor.php')) {
    class simple_post_Widget extends \Elementor\Widget_Base
    {

        public function get_name() {
            return 'simple-post-widget';
        }

        public function get_title() {
            return esc_html__( 'Simple Post Widget', 'text-domain' );
        }

        public function get_icon() {
            return 'eicon-post-title';
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

            $this->add_control(
                'title_html_tag',
                [
                    'label' => __( 'Title HTML Tag', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'h2',
                    'options' => [
                        'h1' => __( 'H1', 'text-domain' ),
                        'h2' => __( 'H2', 'text-domain' ),
                        'h3' => __( 'H3', 'text-domain' ),
                        'h4' => __( 'H4', 'text-domain' ),
                        'h5' => __( 'H5', 'text-domain' ),
                        'h6' => __( 'H6', 'text-domain' ),
                        'p' => __( 'Paragraph', 'text-domain' ),
                        'div' => __( 'Div', 'text-domain' ),
                        'span' => __( 'Span', 'text-domain' ),
                    ],
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
                        '{{WRAPPER}} .post-title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'title_alignment',
                [
                    'label' => __( 'Title Alignment', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'text-domain' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'text-domain' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'text-domain' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .post-title' => 'text-align: {{VALUE}};',
                    ],
                    'responsive' => true,
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'selector' => '{{WRAPPER}} .post-title',
                    'responsive' => true,
                ]
            );

            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            if ( is_singular() ) {
                echo '<' . $settings['title_html_tag'] . ' class="post-title">' . get_the_title() . '</' . $settings['title_html_tag'] . '>';
            }
        }
    }
}