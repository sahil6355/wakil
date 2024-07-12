<?php 
if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if (is_plugin_active('elementor/elementor.php')) {

    class simple_subattorneys_Widget extends \Elementor\Widget_Base {
        public function get_name() {
            return 'custom-subattorneys-widget';
        }
        public function get_title() {
            return esc_html__('Attorneys Sub Layout', 'wakil');
        }
        public function get_categories() {
            return ['custom-category'];
        }

        protected function _register_controls() {
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
                        'option1' => __('Attorneys Layout 1', 'your-elementor-addon'),
                        'option2' => __('Attorneys Layout 2', 'your-elementor-addon'),
                        'option3' => __('Attorneys Layout 3', 'your-elementor-addon'),
                    ],
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label' => __('Posts Per Page', 'your-elementor-addon'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 5, 
                    'min' => 1, 
                    'step' => 1, 
                ]
            );

            $this->add_control(
                'post_order',
                [
                    'label' => __('Post Order', 'your-elementor-addon'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'desc',
                    'options' => [
                        'asc' => __('Ascending', 'your-elementor-addon'),
                        'desc' => __('Descending', 'your-elementor-addon'),
                        'rand' => __('Random', 'your-elementor-addon'),
                    ],
                ]
            );

            $this->end_controls_section();
        }

        protected function render() {
            $settings = $this->get_settings_for_display();
            $args = array(
                'post_type' => 'attorneys',
                'posts_per_page' => -1, 
                'post_status' => 'publish',
            );

            $posts_per_page = $this->get_settings('posts_per_page');
            $post_order = $this->get_settings('post_order');

            if ($posts_per_page) {
                $args['posts_per_page'] = $posts_per_page;
            }

            if ($post_order) {
                $args['order'] = strtoupper($post_order);
            }

            $query = new WP_Query($args);

            if ($settings['select_option'] == 'option1') {

                ?>
                <div class="Attorneys Attorneys_slider">
                    <?php 
                    if ($query -> have_posts()) : 

                        while ($query -> have_posts()) : $query -> the_post();
                            $post_title = get_the_title();
                            $terms = get_the_terms(get_the_ID(), 'attorneys_client_category');
                            $post_link = get_permalink();
                            ?>

                            <div class="sub_attorneys">
                                <a href="<?php echo $post_link ?>">
                                    <div class="item">
                                        <div class="card">
                                            <?php
                                            if (has_post_thumbnail(get_the_ID())) :
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
                                                echo '<img src="' .  $image[0] . '" alt="">';
                                            endif;
                                            ?>
                                            <span class="circle-border"></span>
                                        </div>

                                        <div class="arrow-box">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/services/icone.png" alt="Skill Arrow">
                                        </div>

                                        <div class="circular-content">
                                            <p class="attorneys_rel">
                                                <?php 
                                                echo $terms[0]->name;
                                            ?></p>
                                            <h4 class="attorneys_title">
                                                <?php echo $post_title ?>
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <?php
                        endwhile;
                    else : 
                        echo 'No posts found...';
                    endif; wp_reset_postdata();

                    ?>
                </div>

                <?php
            } elseif ($settings['select_option'] == 'option2') {
             ?>
             <div class="Attorneys Attorneys2 Attorneys_slider">
                <?php 
                if ($query -> have_posts()) : 

                    while ($query -> have_posts()) : $query -> the_post();
                        $post_title = get_the_title();
                        $terms = get_the_terms(get_the_ID(), 'attorneys_client_category');
                        $post_link = get_permalink();
                        ?>
                        <div class="sub_attorneys_2">

                            <div class="secure-card-block">

                                <a href="<?php echo $post_link; ?>">
                                    <div class="secure-card">

                                        <div class="image">

                                            <?php
                                            if (has_post_thumbnail(get_the_ID())) :
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
                                                echo '<img src="' .  $image[0] . '" alt="">';
                                            endif;
                                            ?>

                                            <svg  class="d-none">
                                                <defs>
                                                    <filter>
                                                        <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                                                        values="0.9 0   1   0   0
                                                        1   0  1   0   0
                                                        1   1   0.21  0   0
                                                        1   0   0   0   0 "></feColorMatrix>
                                                    </filter>
                                                </defs>
                                            </svg>

                                        </div>

                                        <div class="details">

                                            <div class="center">
                                                <ul>
                                                    <li>
                                                        <a href="https://twitter.com/" class="social-item" target="_blank"><i class="ri-twitter-fill"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/" class="social-item" target="_blank"><i class="ri-facebook-fill"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://in.linkedin.com/" class="social-item" target="_blank"><i class="ri-linkedin-fill"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.instagram.com/" class="social-item"
                                                        target="_blank"><i class="ri-instagram-line"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="secure-card-info">
                                            <p>
                                                <?php echo $terms[0]->name; ?>

                                            </p>
                                            <a>
                                                <h4><?php echo $post_title ?></h4>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                else : 
                    echo 'No posts found...';
                endif; wp_reset_postdata();

                ?>
                </div>  <?php
            } elseif ($settings['select_option'] == 'option3') {
                ?>
                <div class="Attorneys">
                    <?php 

                    if ($query -> have_posts()) : 
                        while ($query -> have_posts()) : $query -> the_post();
                            $post_title = get_the_title();
                            $terms = get_the_terms(get_the_ID(), 'attorneys_client_category');
                            $post_link = get_permalink();
                            ?>
                            <div class="sub_attorneys_3">
                                <a href="<?php echo $post_link ?>">
                                    <div class="team-member attorney1-link">
                                        <div class="team-img">
                                            <?php
                                            if (has_post_thumbnail(get_the_ID())) :
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
                                                echo '<img src="' .  $image[0] . '" alt="">';
                                            endif;
                                            ?>
                                            <div class="overlay-team">
                                                <div class="team-details text-center">
                                                    <div class="socials mt-20">
                                                        <a href="https://twitter.com/" class="social-item" target="_blank"><i
                                                            class="ri-twitter-fill"></i>
                                                        </a>
                                                        <a href="https://www.facebook.com/" class="social-item" target="_blank"><i
                                                            class="ri-facebook-fill"></i>
                                                        </a>
                                                        <a href="https://in.linkedin.com/" class="social-item" target="_blank"><i
                                                            class="ri-linkedin-fill"></i>
                                                        </a>
                                                        <a href="https://www.instagram.com/" class="social-item" target="_blank"><i
                                                            class="ri-instagram-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo $post_link ?>">
                                            <div class="team-info">
                                                <p>
                                                    <?php echo $terms[0]->name; ?>
                                                </p>
                                                <a>
                                                    <h4><?php echo $post_title ?></h4>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <?php
                        endwhile;
                    else : 
                        echo 'No posts found...';
                    endif; wp_reset_postdata();

                    ?>
                </div> 


                <?php
            }
        }

    }

}