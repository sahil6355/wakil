<?php
// 

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if (is_plugin_active('elementor/elementor.php')) {
    class simple_testimonial_Widget extends \Elementor\Widget_Base

    {
        public function get_name() {
            return 'testimonial_widget';
        }

        public function get_title() {
            return __( 'Testimonial Widget', 'custom-elementor-widgets' );
        }

        public function get_categories() {
            return ['custom-category'];
        }


        public function get_icon() {
            return 'eicon-testimonial';
        }

        protected function _register_controls() {
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Content', 'custom-elementor-widgets' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'select_option',
                [
                    'label' => __('Select Layout', 'your-elementor-addon'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'option2',
                    'options' => [
                        'option1' => __('Testimonial Layout 1', 'your-elementor-addon'),
                        'option2' => __('Testimonial Layout 2', 'your-elementor-addon'),
                        'option3' => __('Testimonial Layout 3', 'your-elementor-addon'),
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['select_option'] == 'option1') {
                $shortcode_output = do_shortcode('[testimonial-layout-first]');
                echo $shortcode_output;
            } elseif ($settings['select_option'] == 'option2') {
                $shortcode_output = do_shortcode('[testimonial-layout-second]');
                echo $shortcode_output;
            } elseif ($settings['select_option'] == 'option3') {
                $shortcode_output = do_shortcode('[testimonial-layout-third]');
                echo $shortcode_output;
            } 
        }
    }
}