<?php

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

// namespace Elementor;
if (is_plugin_active('elementor/elementor.php')) {
    class simple_select_Widget extends \Elementor\Widget_Base
    {

        public function get_name()
        {
            return 'wakil_simple_select';
        }

        public function get_title()
        {
            return esc_html__('Service', 'wakil');
        }

        public function get_icon()
        {
            return 'eicon-archive-posts';
        }

        public function get_categories() {
            return ['custom-category'];
        }
        protected function _register_controls()
        {
            $this->start_controls_section(
                'section_content',
                [
                    'label' => __('Content', 'your-elementor-addon'),
                ]
            );

            $this->add_control(
                'select_option',
                [
                    'label' => __('Select Layout', 'your-elementor-addon'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'option1',
                    'options' => [
                        'option1' => __('Service Layout 1', 'your-elementor-addon'),
                        'option2' => __('Service Layout 2', 'your-elementor-addon'),
                        'option3' => __('Service Layout 3', 'your-elementor-addon'),
                    ],
                ]
            );

            $this->end_controls_section();

            //style control
            $this->start_controls_section(
                'section_style',
                [
                    'label' => esc_html__('Style', 'your-elementor-addon'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ],
            );

            $this->add_control(
                'title_option',
                [
                    'label' => esc_html__('Title option', 'your-elementor-addon'),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__('Title Color', 'your-elementor-addon'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .links_text' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'text_color',
                [
                    'label' => esc_html__('Text Color', 'your-elementor-addon'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .links_line p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'border_color',
                [
                'label' => __('Border Color', 'your-text-domain'), // Label for the control
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub_main_service, {{WRAPPER}} .sub_main_service_third' => 'border-color: {{VALUE}};', // CSS selectors and property
                ],
            ]
        );

            $this->add_control(
                'background_color',
                [
                    'label' => __('Background Color', 'your-text-domain'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sub_main_service_third' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['select_option'] == 'option1') {
                $shortcode_output = do_shortcode('[service-layout-first]');
                echo $shortcode_output;
            } elseif ($settings['select_option'] == 'option2') {
                $shortcode_output = do_shortcode('[service-layout-second]');
                echo $shortcode_output;
            } elseif ($settings['select_option'] == 'option3') {
                $shortcode_output = do_shortcode('[service-layout-third]');
                echo $shortcode_output;
            }
        }
    }
}