<?php


if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}


if (is_plugin_active('elementor/elementor.php')) {
    class simple_breadcrumb_Widget extends \Elementor\Widget_Base
    {

        public function get_name()
        {
            return 'custom-breadcrumb-widget';
        }

        public function get_title()
        {
            return esc_html__('Custom Breadcrumb', 'wakil');
        }

        public function get_categories() {
            return ['custom-category'];
        }

        protected function _register_controls()
        {
            // Add controls for your widget settings.
            $this->start_controls_section(
                'content_section',
                [
                    'label' => esc_html__('Content', 'textdomain'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();
            $breadcrumb = '<a href="' . esc_url(home_url('/')) . '">Home</a>';

            if (is_singular()) {
                $post = get_queried_object();
                $post_type = get_post_type_object($post->post_type);
                if ($post_type) {
                    $breadcrumb .= ' / <a href="' . esc_url(get_post_type_archive_link($post->post_type)) . '">' . $post_type->labels->name . '</a>';
                }
                $breadcrumb .= ' / ' . '<span>' .  get_the_title() . '</span>';
            }
            echo '<div class="breadcrumbs" >' . $breadcrumb . '</div>';
        }
    }
}
