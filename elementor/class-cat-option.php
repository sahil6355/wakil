<?php

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}


if (is_plugin_active('elementor/elementor.php')) {
    class simple_cat_Widget extends \Elementor\Widget_Base
    {

        public function get_name() {
            return 'simple-cat-widget';
        }

        public function get_title() {
            return esc_html__( 'Post Category', 'text-domain' );
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
                'post_id',
                [
                    'label' => __( 'Post ID', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => get_the_ID(),
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
                    'label' => __( 'Text Css', 'elementor-custom-widgets' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );


            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-cat' => 'color: {{VALUE}};',
                    ],
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
                        '{{WRAPPER}} .post-cat' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'selector' => '{{WRAPPER}} .post-cat',
                    'responsive' => true,
                ]
            );


        }

        protected function render() {
            $settings = $this->get_settings_for_display();

            $post_id = !empty($settings['post_id']) ? $settings['post_id'] : get_the_ID();


            $taxonomies = get_post_taxonomies($post_id);

            $taxonomy_options = [];

            foreach ($taxonomies as $taxonomy) {

                $taxonomy_object = get_taxonomy($taxonomy);

                if ($taxonomy_object->label === 'Categories') {

                    $taxonomy_options['Category'] = $taxonomy_object->name;

                    break;

                }
            }

            $terms = get_the_terms($post_id, $taxonomy_options['Category']);

            echo '<' . $settings['title_html_tag'] . ' class="post-cat">' .  $terms[0]->name . '</' . $settings['title_html_tag'] . '>';
        }
    }

}