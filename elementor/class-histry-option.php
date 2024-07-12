<?php 
if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if (is_plugin_active('elementor/elementor.php')) {

    class History_List_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'history_list';
        }

        public function get_title() {
            return __( 'History List', 'text-domain' );
        }

        public function get_icon() {
            return 'eicon-history';
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
                'tab_year', [
                    'label' => __( 'Tab Year', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => true,
                    'description' => __( 'Enter the year (e.g., 2023)', 'text-domain' ),
                    'input_type' => 'number',
                    'min' => 1900,
                    'max' => 2100,
                    'step' => 1,
                ]
            );

            $repeater->add_control(
                'tab_title', [
                    'label' => __( 'Tab Title', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Tab Title' , 'text-domain' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'tab_content', [
                    'label' => __( 'Tab Content', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Tab Content' , 'text-domain' ),
                    'show_label' => false,
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
                            'tab_content' => __( 'Tab Content #1', 'text-domain' ),
                            'tab_year' => '2024',
                        ],
                        [
                            'tab_title' => __( 'Tab #2', 'text-domain' ),
                            'tab_content' => __( 'Tab Content #2', 'text-domain' ),
                            'tab_year' => '2024',
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
                    'label' => __( 'date Color', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .custom-tabs .tab-year' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'date_typography',
                    'label' => __( 'date Typography', 'text-domain' ),
                    'selector' => '{{WRAPPER}} .custom-tabs .tab-year',
                ]
            );

            $this->add_control(
                'tab_title_color',
                [
                    'label' => __( 'Title Color', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .custom-tabs .tab-titles' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'tab_title_typography',
                    'label' => __( 'Title Typography', 'text-domain' ),
                    'selector' => '{{WRAPPER}} .custom-tabs .tab-titles',
                ]
            );

            $this->add_control(
                'tab_content_color',
                [
                    'label' => __( 'Content Color', 'text-domain' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .custom-tabs .tab-content' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'tab_content_typography',
                    'label' => __( 'Content Typography', 'text-domain' ),
                    'selector' => '{{WRAPPER}} .custom-tabs .tab-content',
                ]
            );

            $this->end_controls_section();
        }

        protected function render() {

            $settings = $this->get_settings_for_display();
            $custom_css_class = !empty( $settings['custom_css_class'] ) ? $settings['custom_css_class'] : '';
            ?>

            <div class="custom-tabs timeline">

                <ol>

                    <?php
                    foreach ( $settings['tabs'] as $index => $tab ) {
                        echo '<li>';
                        echo '<div class="main_timeline-height">';
                        echo '<h2 class="tab-year">' . $tab['tab_year'] . '</h2>';
                        echo '<h3 class="tab-titles">' . $tab['tab_title'] . '</h3>';
                        echo '<div class="tab-content">' . $tab['tab_content'] . '</div>';
                        echo'</div>';
                        echo '</li>';
                    }
                    ?>
                    <li></li>

                </ol>
                <div class="arrows" style="display: none;">
                    <button class="arrow arrow__prev disabled" disabled>
                        Scroll to left
                    </button>
                    <button class="arrow arrow__next">Scroll to right</button>
                </div>
            </div>
            <?php
        }
    }
}