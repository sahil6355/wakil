<?php

/*
Template Name: home 5 layout
*/

get_header();

?>

<div class="home_page_five">
	<article class="accordion accordion1">
		<?php 
		$args = array(
			'post_type' => 'service',
			'post_status' => 'publish',
			'posts_per_page' => 6 ,
		);

		$result = new WP_Query($args);

		if ( $result -> have_posts() ) { 
			$counter = 0;
			while ( $result -> have_posts() ) { 
				$result -> the_post(); 
				$title = get_the_title();
				$excerpt = get_the_excerpt();
				$link = get_permalink();
				$image_id = get_post_meta($post->ID, 'wpse_uploaded_feature_image', true);
				$image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
				?>
				<section id="acc<?php echo $counter; ?>" class="home5-content home5-content1">
					<div class="stack-main">
						<?php if (has_post_thumbnail(get_the_ID())) : ?>
							<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail'); ?>
							<img src="<?php echo $image[0]; ?>" alt="" class="links_img">
						<?php endif; ?>
						<h2>
							<?php echo $title ?>
						</h2>
					</div>
					<div class="start1">
						<?php if (!empty($image_url)) : ?>
							<img src="<?php echo esc_url($image_url); ?>" alt="Uploaded Image" width="700" height="520">
						<?php endif; ?>
						<div class="stack-content">
							<p class="color-white home5-txt">
								<?php echo $excerpt; ?>
							</p>		
							<div class="button-box Load_more Load_more_white">
								<a href="<?php echo $link; ?>" class="button-wrap">
									<span>
										Load More
										<i class="ri-arrow-right-line"></i>
									</span>
								</a>
							</div>
						</div>			
					</div>					
				</section>

				<?php

				$counter++;
			}
		}

		wp_reset_postdata();

		?>
	</article>
</div>

</main>

</div>

</div>

<!-- Page cursor Start -->
<div class="cursor cursor-shadow"></div>
<div class="cursor cursor-dot"></div>
<!-- Page cursor End -->
<?php wp_footer(); ?>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const firstAccordion = document.querySelector('.accordion section');
		if (firstAccordion) {
			firstAccordion.classList.add('active');
			firstAccordion.querySelector('.start1').style.visibility = 'visible';
		}

		const accordionSections = document.querySelectorAll('.accordion section');
		accordionSections.forEach((section, index) => {
			section.addEventListener('click', function() {
				accordionSections.forEach(sec => {
					sec.classList.remove('active');
					sec.querySelector('.start1').style.visibility = 'hidden';
				});
				this.classList.add('active');
				this.querySelector('.start1').style.visibility = 'visible';
			});
		});
	});
</script>
</body>

</html>

