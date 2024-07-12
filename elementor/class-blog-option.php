<?php 
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if (is_plugin_active('elementor/elementor.php')) {

	class Custom_blog_Widget extends \Elementor\Widget_Base {
		public function get_name() {
			return 'custom-blog';
		}

		public function get_title() {
			return __('Custom Blog', 'custom-elementor-widgets');
		}

		public function get_icon() {
			return 'eicon-post-list';
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
						'option1' => __('Blog Layout 1', 'your-elementor-addon'),
						'option2' => __('Blog Layout 2', 'your-elementor-addon'),
						'option3' => __('Blog Layout 3', 'your-elementor-addon'),
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

		}

		protected function render() {

			$settings = $this->get_settings_for_display();

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => -1, 
				'post_status' => 'publish',
			);

			$posts_per_page = $this->get_settings('posts_per_page');

			if ($posts_per_page) {
				$args['posts_per_page'] = $posts_per_page;
			}

			$query = new WP_Query($args);

			if ($settings['select_option'] == 'option1') {

				?>
				<div class="section-blog">
					<?php 
					if ($query -> have_posts()) : 

						while ($query -> have_posts()) : $query -> the_post();
							$post_title = get_the_title();
							$terms = get_the_terms(get_the_ID(), 'category');
							$post_link = get_permalink();
							$meta_data = get_post_meta(get_the_ID());
							$time = get_the_time('j F Y');

							$post_format = get_post_format(get_the_ID());
							if ($post_format == 'gallery'){
								$custom_text = get_post_meta(get_the_ID(), 'gallery_text', true);
							} elseif ($post_format == 'video'){
								$custom_text = get_post_meta(get_the_ID(), 'video_text', true);
							} elseif($post_format == 'quote'){
								$custom_text = get_post_meta(get_the_ID(), 'quote_text', true);
							} elseif($post_format == 'link') {
								$custom_text = get_post_meta(get_the_ID(), 'link_text', true);
							} elseif($post_format == 'audio') {
								$custom_text = get_post_meta(get_the_ID(), 'audio_text', true);
							} else {
								$custom_text = get_post_meta(get_the_ID(), 'standard_text', true);
							}
							?>	

							<div class="sub-section-blog">
								<a href="<?php echo $post_link; ?>">
									<div class="top_post_thumbnail">
										<div class="post-thumbnail">
											<?php
											$thumbnail_url = get_the_post_thumbnail_url();
											if ($thumbnail_url) {
												echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . get_the_title() . '" width="370" height="370">';
											}
											?>
										</div>
										<p><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_1_104" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><path d="M0 0H24V24H0V0Z" fill="white"/></mask><g mask="url(#mask0_1_104)"><path d="M17 3H21C21.2652 3 21.5196 3.10536 21.7071 3.29289C21.8946 3.48043 22 3.73478 22 4V20C22 20.2652 21.8946 20.5196 21.7071 20.7071C21.5196 20.8946 21.2652 21 21 21H3C2.73478 21 2.48043 20.8946 2.29289 20.7071C2.10536 20.5196 2 20.2652 2 20V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3H7V1H9V3H15V1H17V3ZM20 11H4V19H20V11ZM15 5H9V7H7V5H4V9H20V5H17V7H15V5ZM6 13H8V15H6V13ZM11 13H13V15H11V13ZM16 13H18V15H16V13Z" fill="white"/></g></svg><?php echo $time; ?></p>
									</div>
									<div class="bottom-section-blog-content">
										<h4><?php echo $post_title; ?></h4>
										<p><?php echo $custom_text; ?></p>
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
				<div class="section-blog section-blog2">
					<?php 
					if ($query -> have_posts()) : 

						while ($query -> have_posts()) : $query -> the_post();
							$post_title = get_the_title();
							$terms = get_the_terms(get_the_ID(), 'category');
							$post_link = get_permalink();
							$meta_data = get_post_meta(get_the_ID());
							$time = get_the_time('j F Y');

							$post_format = get_post_format(get_the_ID());
							if ($post_format == 'gallery'){
								$custom_text = get_post_meta(get_the_ID(), 'gallery_text', true);
							} elseif ($post_format == 'video'){
								$custom_text = get_post_meta(get_the_ID(), 'video_text', true);
							} elseif($post_format == 'quote'){
								$custom_text = get_post_meta(get_the_ID(), 'quote_text', true);
							} elseif($post_format == 'link') {
								$custom_text = get_post_meta(get_the_ID(), 'link_text', true);
							} elseif($post_format == 'audio') {
								$custom_text = get_post_meta(get_the_ID(), 'audio_text', true);
							} else {
								$custom_text = get_post_meta(get_the_ID(), 'standard_text', true);
							}
							?>	

							<div class="sub-section-blog">
								<a href="<?php echo $post_link; ?>">
									<div class="top_post_thumbnail">
										<div class="post-thumbnail">
											<?php
											$thumbnail_url = get_the_post_thumbnail_url();
											if ($thumbnail_url) {
												echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . get_the_title() . '" width="370" height="370">';
											}
											?>
										</div>
										<p><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_1_104" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><path d="M0 0H24V24H0V0Z" fill="white"/></mask><g mask="url(#mask0_1_104)"><path d="M17 3H21C21.2652 3 21.5196 3.10536 21.7071 3.29289C21.8946 3.48043 22 3.73478 22 4V20C22 20.2652 21.8946 20.5196 21.7071 20.7071C21.5196 20.8946 21.2652 21 21 21H3C2.73478 21 2.48043 20.8946 2.29289 20.7071C2.10536 20.5196 2 20.2652 2 20V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3H7V1H9V3H15V1H17V3ZM20 11H4V19H20V11ZM15 5H9V7H7V5H4V9H20V5H17V7H15V5ZM6 13H8V15H6V13ZM11 13H13V15H11V13ZM16 13H18V15H16V13Z" fill="white"/></g></svg><?php echo $time; ?></p>
									</div>
									<div class="bottom-section-blog-content">
										<h4><?php echo $post_title; ?></h4>
										<p><?php echo $custom_text; ?></p>
										<p class="read_btn">READ MORE <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_1_846" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><path d="M0 0H24V24H0V0Z" fill="white"/></mask><g mask="url(#mask0_1_846)"><path d="M5 12H19" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 16L19 12" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 8L19 12" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg></p>
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
			} elseif ($settings['select_option'] == 'option3') {

				?>
				<div class="section-blog section-blog2 section-blog3">
					<?php 
					if ($query -> have_posts()) : 

						while ($query -> have_posts()) : $query -> the_post();
							$post_title = get_the_title();
							$terms = get_the_terms(get_the_ID(), 'category');
							$post_link = get_permalink();
							$meta_data = get_post_meta(get_the_ID());
							$time = get_the_time('j F Y');
							$author_name = get_the_author();

							$reading_time = calculate_reading_time(get_the_ID()) . ' min read';

							

							$post_format = get_post_format(get_the_ID());
							if ($post_format == 'gallery'){
								$custom_text = get_post_meta(get_the_ID(), 'gallery_text', true);
							} elseif ($post_format == 'video'){
								$custom_text = get_post_meta(get_the_ID(), 'video_text', true);
							} elseif($post_format == 'quote'){
								$custom_text = get_post_meta(get_the_ID(), 'quote_text', true);
							} elseif($post_format == 'link') {
								$custom_text = get_post_meta(get_the_ID(), 'link_text', true);
							} elseif($post_format == 'audio') {
								$custom_text = get_post_meta(get_the_ID(), 'audio_text', true);
							} else {
								$custom_text = get_post_meta(get_the_ID(), 'standard_text', true);
							}
							?>	

							<div class="sub-section-blog">
								<div class="sub-sub_section-blog">
									<a href="<?php echo $post_link; ?>">
										<div class="top_post_thumbnail">
											<div class="post-thumbnail">
												<?php
												$thumbnail_url = get_the_post_thumbnail_url();
												if ($thumbnail_url) {
													echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . get_the_title() . '" width="370" height="370">';
												}
												?>
											</div>
											<p><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_1_104" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><path d="M0 0H24V24H0V0Z" fill="white"/></mask><g mask="url(#mask0_1_104)"><path d="M17 3H21C21.2652 3 21.5196 3.10536 21.7071 3.29289C21.8946 3.48043 22 3.73478 22 4V20C22 20.2652 21.8946 20.5196 21.7071 20.7071C21.5196 20.8946 21.2652 21 21 21H3C2.73478 21 2.48043 20.8946 2.29289 20.7071C2.10536 20.5196 2 20.2652 2 20V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3H7V1H9V3H15V1H17V3ZM20 11H4V19H20V11ZM15 5H9V7H7V5H4V9H20V5H17V7H15V5ZM6 13H8V15H6V13ZM11 13H13V15H11V13ZM16 13H18V15H16V13Z" fill="white"/></g></svg><?php echo $time; ?></p>
										</div>
										<div class="bottom-section-blog-content">
											<div class="authour_read">
												<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_1_1009" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><path d="M0 0H24V24H0V0Z" fill="white"/></mask><g mask="url(#mask0_1_1009)"><path d="M4 22C4 19.8783 4.84285 17.8434 6.34315 16.3431C7.84344 14.8429 9.87827 14 12 14C14.1217 14 16.1566 14.8429 17.6569 16.3431C19.1571 17.8434 20 19.8783 20 22H18C18 20.4087 17.3679 18.8826 16.2426 17.7574C15.1174 16.6321 13.5913 16 12 16C10.4087 16 8.88258 16.6321 7.75736 17.7574C6.63214 18.8826 6 20.4087 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z" fill="#CA9A67"/></g></svg><?php echo $author_name; ?></p>
												<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_1_1004" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><path d="M0 0H24V24H0V0Z" fill="white"/></mask><g mask="url(#mask0_1_1004)"><path d="M12 22C6.477 22 2 17.523 2 12C2 6.477 6.477 2 12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22ZM12 20C14.1217 20 16.1566 19.1571 17.6569 17.6569C19.1571 16.1566 20 14.1217 20 12C20 9.87827 19.1571 7.84344 17.6569 6.34315C16.1566 4.84285 14.1217 4 12 4C9.87827 4 7.84344 4.84285 6.34315 6.34315C4.84285 7.84344 4 9.87827 4 12C4 14.1217 4.84285 16.1566 6.34315 17.6569C7.84344 19.1571 9.87827 20 12 20ZM13 12H17V14H11V7H13V12Z" fill="#CA9A67"/></g></svg><?php echo $reading_time; ?></p>
											</div>
											<h4><?php echo $post_title; ?></h4>
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
				</div>
				<?php
			}
		}
	}
}