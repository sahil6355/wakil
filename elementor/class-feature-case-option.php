<?php

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}


if (is_plugin_active('elementor/elementor.php')) 
{
    class simple_feature_case_Widget extends \Elementor\Widget_Base
    {
        public function get_name() {
            return 'simple-feature-case';
        }

        public function get_title() {
            return esc_html__( 'Case Layout', 'text-domain' );
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
                'select_option',
                [
                    'label' => __('Select Layout', 'your-elementor-addon'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'option1',
                    'options' => [
                        'option1' => __('Horizantal case scroll', 'your-elementor-addon'),
                        'option2' => __('Feature Hover Case', 'your-elementor-addon'),
                        'option3' => __('Case Masonry Layout', 'your-elementor-addon'),
                        'option4' => __('Case Simple Layout', 'your-elementor-addon'),
                    ],
                ]
            );


            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['select_option'] == 'option1') {
                $shortcode_output = do_shortcode('[horizontal-scroll]');
                echo $shortcode_output;
            } else if($settings['select_option'] == 'option2'){
                $shortcode_output = do_shortcode('[feature-hover]');
                echo $shortcode_output;
            } else if($settings['select_option'] == 'option3'){
                $shortcode_output = do_shortcode('[case-layout1]');
                echo $shortcode_output;
            } else if($settings['select_option'] == 'option4'){
                $shortcode_output = do_shortcode('[case-layout2]');
                echo $shortcode_output;
            }
        }
    }

}