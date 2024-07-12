
<?php

/*****************************************************************************
************************* testimonal Layout one Code *************************
*****************************************************************************/
add_shortcode('testimonial-layout-first', 'testimonial_first');
function testimonial_first()
{
	$args = array(
		'post_type' => 'testimonial',
		'posts_per_page' => -1,
		'post_status' => 'publish',
	);
	$query = new WP_Query($args);
	$test_number = get_option('testimonial_number');
	ob_start(); // Start output buffering
	?>
	<div class="main_Testimonial p-100">
		<div class="border_title_tag">
			<h2 class="border_title">What Our Client Says?</h2>
			<div class="title_border"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/border_icon.png" width="36" height="30"></div>
		</div>
		<div class="Testimonial">
			<?php
			if ($query->have_posts()) :
				$post_count = 0;
				$initial_display_count = $test_number;
				while ($query->have_posts()) : $query->the_post();
					$value = get_post_meta(get_the_ID(), '_testimonial_author', true);
					$author_position = get_post_meta(get_the_ID(), '_testimonial_author_position', true);
					$content = get_the_content();
					$content = apply_filters('the_content', $content);
					$title = get_the_title(get_the_ID());
					$post_count++;
					?>
					<div class="sub_testimonial sub_hidden_testimonial<?php echo $post_count > $initial_display_count ? ' hidden' : ''; ?>">
						<div class="contain_testimonial">
							<div class="top_testimonial">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/testimonial/quote_2.png">
								<h3><?php echo $value ?></h3>
							</div>
							<div class="content_area">
								<?php echo $content; ?>
							</div>
							<div class="underline"></div>
							<div class="client_detai">
								<?php the_post_thumbnail(); ?>
								<div class="client_data">
									<h2><?php echo $title; ?></h2>
									<p><?php echo $author_position ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php
				endwhile;
			else :
				echo '<p>No posts found</p>';
			endif;
			wp_reset_postdata();
			?>
		</div>
		<div class="button-box Load_more home_six_btn" id="LoadMore">
			<a class="button-wrap">
				<span>
					Load More
					<i class="ri-arrow-right-line"></i>
				</span>
			</a>
		</div>
	</div>
	<?php return ob_get_clean();
}

function add_testimonial_first_scripts() {

	$test_load_number =  get_option('testimonial_Load_number');
	?>

	<script>
		jQuery(document).ready(function($) {
			var loadMoreButton = $('#LoadMore');
    		var testimonialsToShow = <?php echo $test_load_number; ?>; // Number of posts to show on each click

    		function updateLoadMoreButtonVisibility() {
    			var hiddenTestimonials = $('.sub_hidden_testimonial.hidden');
    			if (hiddenTestimonials.length === 0) {
    				loadMoreButton.css('display', 'none');
    			} else {
    				loadMoreButton.css('display', 'block');
    			}
    		}

    		updateLoadMoreButtonVisibility();

    		loadMoreButton.on('click', function() {
    			var hiddenTestimonials = $('.sub_hidden_testimonial.hidden');
    			for (var i = 0; i < testimonialsToShow && i < hiddenTestimonials.length; i++) {
    				$(hiddenTestimonials[i]).removeClass('hidden').addClass('show');
    			}
    			updateLoadMoreButtonVisibility();
    		});
		});
</script>

<?php
}
add_action('wp_footer', 'add_testimonial_first_scripts',9999);

/*****************************************************************************
************************* testimonal Layout two Code *************************
*****************************************************************************/
add_shortcode('testimonial-layout-second', 'testimonial_second');
function testimonial_second()
{
	$args = array(
		'post_type' => 'testimonial',
		'posts_per_page' => -1,
		'post_status' => 'publish',
	);
	$query = new WP_Query($args);
	ob_start(); 
	?>
	<div class="Testimonial2 p-100">
		<div class="sub_main_testimonial2">
			<div class="border_title_tag">
				<h2 class="border_title">Client’s Testimonial</h2>
				<div class="title_border"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/border_icon.png" width="36" height="30"></div>
				<p>We strive to be approachable and reachable and maintain communication with our clients. We value clients and works relentlessly to achieve excellent results.</p>
			</div>
		</div>
		<div class="testimonial_slider">
			<?php
			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post();
					$value = get_post_meta(get_the_ID(), '_testimonial_author', true);
					$author_position = get_post_meta(get_the_ID(), '_testimonial_author_position', true);
					$content = get_the_content();
					$content = apply_filters('the_content', $content);
					$title = get_the_title(get_the_ID());
					?>
					<div class="sub_testimonial_slider">
						<?php the_post_thumbnail(); ?>
						<div class="content_area">
							<?php echo $content; ?>
						</div>
						<div class="client_data">
							<h2><?php echo $title; ?></h2>
							<p><?php echo $author_position ?></p>
						</div>
					</div>
					<?php
				endwhile;
			else :
				echo '<p>No posts found</p>';
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php
	return ob_get_clean();
}



function add_testimonial_second_scripts() {
	?>
	<script>

		$('.testimonial_slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
		});
	</script>

	<?php
}

add_action('wp_footer', 'add_testimonial_second_scripts',99999);


/*****************************************************************************
************************ testimonal Layout third Code ************************
*****************************************************************************/
add_shortcode('testimonial-layout-third', 'testimonial_third');
function testimonial_third()
{
	$args = array(
		'post_type' => 'testimonial',
		'posts_per_page' => -1,
		'post_status' => 'publish',
	);
	$query = new WP_Query($args);
	
	ob_start(); // Start output buffering
	?>
	<div class="main_Testimonial p-100 testimonial_third">
		<div class="border_title_tag">
			<h2 class="border_title">What Our Client Says?</h2>
			<div class="title_border"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/border_icon.png" width="36" height="30"></div>
		</div>
		<div class="Testimonial">
			<?php
			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post();
					$value = get_post_meta(get_the_ID(), '_testimonial_author', true);
					$author_position = get_post_meta(get_the_ID(), '_testimonial_author_position', true);
					$content = get_the_content();
					$content = apply_filters('the_content', $content);
					$title = get_the_title(get_the_ID());
					?>
					<div class="sub_testimonial sub_testimonial_third_slider">
						<div class="contain_testimonial">
							<div class="top_testimonial">
								<img src="<?php echo get_template_directory_uri() ?>/assets/images/testimonial/quote_2.png">
								<h3><?php echo $value ?></h3>
							</div>
							<div class="content_area">
								<?php echo $content; ?>
							</div>
							<div class="underline"></div>
							<div class="client_detai">
								<?php the_post_thumbnail(); ?>
								<div class="client_data">
									<h2><?php echo $title; ?></h2>
									<p><?php echo $author_position ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php
				endwhile;
			else :
				echo '<p>No posts found</p>';
			endif;
			wp_reset_postdata();
			?>
		</div>
	<?php return ob_get_clean();
	
}

function add_testimonial_third_scripts() {

	$test_load_number =  get_option('testimonial_Load_number');
	?>

	<script>

		$('.testimonial_third .Testimonial').slick({
			dots: false,
			arrows: true,
			infinite: false,
			speed: 300,
			slidesToShow: 2,
			slidesToScroll: 1,
			responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 1,
					arrows: false,
				}
			},
			]
		});
	</script>

	<?php
}

add_action('wp_footer', 'add_testimonial_third_scripts',999999);