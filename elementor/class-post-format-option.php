<?php

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}


if (is_plugin_active('elementor/elementor.php')) {
    class simple_post_formate_Widget extends \Elementor\Widget_Base
    {

        public function get_name() {
            return 'simple-post-format-widget';
        }

        public function get_title() {
            return esc_html__( 'Single Post format Content', 'text-domain' );
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

            $this->end_controls_section();

            $this->start_controls_section(
                'section_style',
                [
                    'label' => __( 'Css', 'elementor-custom-widgets' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'selector' => '{{WRAPPER}} .post-title-heading',
                    'responsive' => true,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post-title-heading' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'text_typography',
                    'selector' => '{{WRAPPER}} .cat-time-color',
                    'responsive' => true,
                ]
            );

            $this->add_control(
                'text_color',
                [
                    'label' => __( 'category - Time Text Color', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cat-time-color' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'quote_style',
                [
                    'label' => __( 'Quote Css', 'elementor-custom-widgets' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'qtitle_typography',
                    'selector' => '{{WRAPPER}} .Qtitle',
                    'responsive' => true,
                ]
            );

            $this->add_control(
                'qtitle_color',
                [
                    'label' => __( 'Quote title color', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .Qtitle' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'autor_typography',
                    'selector' => '{{WRAPPER}} .author_name',
                    'responsive' => true,
                ]
            );

            $this->add_control(
                'author_color',
                [
                    'label' => __( 'Author color', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .author_name' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'link_style',
                [
                    'label' => __( 'Link Css', 'elementor-custom-widgets' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'link_typography',
                    'selector' => '{{WRAPPER}} .link_title',
                    'responsive' => true,
                ]
            );

            $this->add_control(
                'link_color',
                [
                    'label' => __( 'Link Color', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .link_title' => 'color: {{VALUE}};',
                    ],
                ]
            );


        }

        protected function render() {

            $settings = $this->get_settings_for_display();
            $post_id = $settings['post_id'];

            $meta_data = get_post_meta($post_id);
            $post_format = get_post_format($post_id);

            $terms = get_the_terms($post_id, 'category');
            $category_classes = array();
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                foreach ( $terms as $term ) {
                    $category_classes[] = esc_html( $term->slug );
                }
            }
            $cat_names = implode( ' , ', $category_classes );
            $time = get_the_time('j F Y', $post_id);
            $title = get_the_title($post_id);
            $post_thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');

            if ($post_format == 'gallery'){
                if (!empty($meta_data['gallery_images'])) {
                    $image_ids = $meta_data['gallery_images'][0];
                    $image_ids = maybe_unserialize($image_ids);

                    if (is_array($image_ids)) {

                        echo '<div class="single_service_slider single_page_slider_img">';
                        foreach ($image_ids as $image_id) {
                            $image_url = wp_get_attachment_url($image_id);
                            if ($image_url) {
                                echo '<img src="' . esc_url($image_url) . '" alt="" width="770px" height="450px"/>';
                            }
                        }
                        echo '</div>';
                    } else {
                        echo '<p>No images found in the gallery.</p>';
                    }
                } else {
                    echo '<p>No gallery images meta data found for this post.</p>';
                }

                echo '<div class="bottom_single_post_content bottom_content">';
                echo '<p class="case_category cat-time-color">'.  $cat_names .' | '. $time .'</p>';
                echo '<h2 class="post-title-heading">'. $title .'</h2>';
                echo '</div>';
            } elseif ($post_format == 'video'){

                if (!empty($meta_data['gallery_video'])) { 
                   $video_ids = $meta_data['gallery_video'][0];
                   $image_url = $meta_data['_custom_image'][0];?>
                   <div class="main_video_top main_video_blog_top">
                    <img src="<?php echo $image_url; ?>" alt="img" width="100%" height="600">
                    <a id="play-video" class="video-play-button" href="javascript:void(0);">
                        <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/video_btn.png" width="48px" height="48px"></span>
                    </a>

                    <div id="video-overlay" class="video-overlay" data-id='<?php echo $video_ids ?>'>
                        <a class="video-overlay-close">x</a>
                    </div>

                    </div><?php
                }
                echo '<div class="bottom_single_post_content bottom_content">';
                echo '<p class="case_category cat-time-color">'.  $cat_names .' | '. $time .'</p>';
                echo '<h2 class="post-title-heading">'. $title .'</h2>';
                echo '</div>';
            } elseif($post_format == 'quote'){

                if(!empty($meta_data['quote_title'])){
                    $Qtitle = $meta_data['quote_title'][0];
                }

                if(!empty($meta_data['quote_author_name'])){
                    $author_name = $meta_data['quote_author_name'][0];
                }

                ?>
                <div class="sub_quote">
                    <div class="top_quote">
                        <img alt="quote" src="<?php echo get_stylesheet_directory_uri() ?> /assets/images/testimonial/quote_2.png" width="60" height="60">
                        <div class="text_right">
                            <h2 class="Qtitle"><?php echo $Qtitle; ?></h2>
                            <p class="author_name">- <?php echo $author_name; ?></p>
                        </div>  
                    </div>
                </div>

                <?php

                echo '<div class="bottom_single_post_content bottom_content">';
                echo '<p class="case_category cat-time-color">'.  $cat_names .' | '. $time .'</p>';
                echo '<h2 class="post-title-heading">'. $title .'</h2>';
                echo '</div>';


            } elseif($post_format == 'link') {
                if(!empty($meta_data['link_title'])){
                    $Qtitle = $meta_data['link_title'][0];
                    ?>
                    <div class="sub_quote">
                        <div class="top_quote">
                            <img alt="quote" src="<?php echo get_stylesheet_directory_uri() ?> /assets/images/blog/link.png" width="60" height="60">
                            <div class="text_right">
                                <h2 class="link_title"><?php echo $Qtitle; ?></h2>
                            </div>  
                        </div>
                    </div>
                    <?php
                    echo '<div class="bottom_single_post_content bottom_content">';
                    echo '<p class="case_category cat-time-color">'.  $cat_names .' | '. $time .'</p>';
                    echo '<h2 class="post-title-heading">'. $title .'</h2>';
                    echo '</div>';
                }
                
            } elseif($post_format == 'audio') {
                if(!empty($meta_data['soundcloud_audio_iframe'])){
                    $soundcloud_audio_iframe = $meta_data['soundcloud_audio_iframe'][0];
                    ?>
                    <div class="soundcloud_audio_iframe soundcloud_audio_iframe2">
                        <?php 
                        if ($soundcloud_audio_iframe != '') {
                            echo $soundcloud_audio_iframe;
                        }
                        ?>
                    </div>

                    <?php
                    echo '<div class="bottom_single_post_content bottom_content">';
                    echo '<p class="case_category cat-time-color">'.  $cat_names .' | '. $time .'</p>';
                    echo '<h2 class="post-title-heading">'. $title .'</h2>';
                    echo '</div>';
                }
            } else {
                if ( $post_thumbnail_url ) {
                    echo '<div class="thumb_stand_img"><img src="' . esc_url( $post_thumbnail_url ) . '" width="100%" height="600px" alt="Post Thumbnail"></div>';
                }
                echo '<div class="bottom_single_post_content bottom_content">';
                echo '<p class="case_category cat-time-color">'.  $cat_names .' | '. $time .'</p>';
                echo '<h2 class="post-title-heading">'. $title .'</h2>';
                echo '</div>';
            }

        }

    }

}