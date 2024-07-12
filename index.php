<?php get_header(); ?>
<?php 

$blog_page_bg_img = esc_url(get_option('blog_bg_img'));

$blog_per_page = get_option('blog_number');

$blog_layout_posts = get_option('blog_layout_post');

$blog_order = get_option('blog_order');


$sidebar_option = get_option('sidebar_blog_post');
$args = array(
	'posts_per_page' => $blog_per_page,
	'paged' => get_query_var('paged') ?: 1,
	'order' => $blog_order,
);
$query = new WP_Query($args);
?>

<div class="top_header_layout">
	<div class="sub_heder_layout">
		<img src="<?php if ($blog_page_bg_img == '') { echo get_template_directory_uri() . '/assets/images/blog/blog_bg_img.png';} else { echo $blog_page_bg_img;} ?>" alt="service banner">
		<div class="black-overlay"></div>
		<div class="banner-header-content">
			<h1 class="page-title"> Our Blogs </h1>
			<?php
			echo do_shortcode('[custom_breadcrumb]'); 
			?>
		</div>
	</div>
</div>


<?php 

if($blog_layout_posts == '4'){ 
	$blog_grid_class = 'blog_grid_wide'; 
} else {
	$blog_grid_class = ''; 
}

?>

<div class="main_single_contain p-100 <?php echo $sidebar_option; ?> <?php echo $blog_grid_class ?>">
	<div class="sub_main_single_contain">

		<?php if($sidebar_option == 'left' && is_active_sidebar('sidebar-blog-page')):?>
			<div class="bwp-sidebar sidebar-blog sidebar_class <?php echo $sidebar_option ?>">
				<?php dynamic_sidebar( 'sidebar-blog-page' );?>	
			</div>
		<?php endif; ?>

		<div class="single_page_main_contain">
			<?php 
			if($blog_layout_posts == 'post_format_layout'){
				?>
				<div class="custome_blog">
					<div class="sub_main_blog">
						<?php
						if ($query -> have_posts()) :
							while ($query -> have_posts()) : $query -> the_post();
								get_template_part('page-formate/content', get_post_format()); 
							endwhile;
							wp_reset_postdata();
							?>
							<div class="post_pagination">
								<?php 
								echo paginate_links(array(
									'total' => $query->max_num_pages,
									'current' => max(1, get_query_var('paged')),
									'prev_text' => __('<svg class="prev_img" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none"><rect x="0.5" y="0.5" width="59" height="59" stroke="#0A1D35"/><mask id="mask0_1_11596" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="18" y="18" width="24" height="24"><path d="M18 18H42V42H18V18Z" fill="white"/></mask><g mask="url(#mask0_1_11596)"><path d="M23 30H37" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 34L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 26L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg>', 'textdomain'),
									'next_text' => __('<svg class="next_img" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none"><rect x="0.5" y="0.5" width="59" height="59" stroke="#0A1D35"/><mask id="mask0_1_11596" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="18" y="18" width="24" height="24"><path d="M18 18H42V42H18V18Z" fill="white"/></mask><g mask="url(#mask0_1_11596)"><path d="M23 30H37" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 34L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 26L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg>', 'textdomain'),
								));
								?>
							</div>

							<?php
						else : 
							echo 'No Content found.';
						endif;
						?>
					</div>
				</div>

				<?php
			} else if ($blog_layout_posts  == 'masonry_1'){
				$column_class = 'third_masonry_layout';
					if ($query->have_posts()) {
						$total_posts = $query->post_count;
						?>
						<div class="blog-box-masonry case-box <?php echo $column_class ?>">
							<?php	
							$max_rows = 3;					
							$posts_per_row = ceil($total_posts / $max_rows);
							$remaining_posts = $total_posts % $max_rows;
							$count = 0;

							for ($row = 0; $row < $max_rows; $row++) {
								echo '<div class="row">';
								$posts_in_this_row = $posts_per_row;

								for ($col = 0; $col < $posts_in_this_row; $col++) {
									if ($count < $total_posts) {
										$query->the_post();
										$title = get_the_title();
										$terms = get_the_terms( get_the_ID(), 'category' );
										$category_classes = array();
										if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
											foreach ( $terms as $term ) {
												$category_classes[] = esc_html( $term->slug );
											}
										}
										$class_names = implode( ' ', $category_classes );
										$cat_names = implode( ' , ', $category_classes );
										$sub_case_box_class = ($col % 2 == 0) ? 'even' : 'odd';
										echo '<a href="' . esc_url( get_permalink() ) . '">';
										echo '<div class="sub_case_box all ' . $class_names . ' ' . $sub_case_box_class . '">';
										if ( has_post_thumbnail() ) {
											$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
											echo '<div class="image-container">';
											echo '<img src="' . esc_url( $featured_image_url ) . '" alt="' . get_the_title() . '" width="570" height="570">';
											echo '<div class="sub_case_box_overlay"><img src="' . get_stylesheet_directory_uri() . ' /assets/images/home/page-six-logo.png"></div>';                 
											echo '</div>';
										}
										echo '<div class="bottom_contain"><p class="case_category">'.  $cat_names .'</p>';
										echo '<h2>'. $title .'</h2></div>';
										echo '</div>';
										echo '</a>';
										$count++;
									}
								}
								echo '</div>';
							}?>
						</div>

						<div class="post_pagination second_post_pagination">
							<?php 
							echo paginate_links(array(
								'total' => $query->max_num_pages,
								'current' => max(1, get_query_var('paged')),
								'prev_text' => __('<svg class="prev_img" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none"><rect x="0.5" y="0.5" width="59" height="59" stroke="#0A1D35"/><mask id="mask0_1_11596" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="18" y="18" width="24" height="24"><path d="M18 18H42V42H18V18Z" fill="white"/></mask><g mask="url(#mask0_1_11596)"><path d="M23 30H37" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 34L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 26L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg>', 'textdomain'),
								'next_text' => __('<svg class="next_img" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none"><rect x="0.5" y="0.5" width="59" height="59" stroke="#0A1D35"/><mask id="mask0_1_11596" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="18" y="18" width="24" height="24"><path d="M18 18H42V42H18V18Z" fill="white"/></mask><g mask="url(#mask0_1_11596)"><path d="M23 30H37" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 34L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 26L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg>', 'textdomain'),
							));
							?>
						</div>
						<?php
					} else {
						echo 'No posts found';
					}
			}else {
				$number_of_columns = $blog_layout_posts;
				$column_class = 'columns-' . $number_of_columns;

				$dynamic_css = '';
				for ($i = 1; $i <= $number_of_columns; $i++) {
					$dynamic_css .= "
					.blog-box.columns-$i {
						grid-template-columns: repeat($i, 1fr);
					}

					/* Responsive design */
					@media (max-width: 1440px) {
						.blog-box.columns-$i {
							grid-template-columns: repeat(" . min($number_of_columns, 4) . ", 1fr);
						}
					}

					@media (max-width: 1199px) {
						.blog-box.columns-$i {
							grid-template-columns: repeat(" . min($number_of_columns, 3) . ", 1fr);
						}
					}
					@media (max-width: 991px) {
						.blog-box.columns-$i {
							grid-template-columns: repeat(" . min($number_of_columns, 2) . ", 1fr);
						}
					}
					@media (max-width: 600px) {
						.blog-box.columns-$i {
							grid-template-columns: repeat(1, 1fr);
						}
					}
					";
				}

				echo "<style>$dynamic_css</style>";
				?>
				<div class="blog-box <?php echo $column_class ?> <?php echo $sidebar_option ?>">
					<?php
					if ( $query -> have_posts() ) : 
						while ( $query -> have_posts() ) : 
							$query -> the_post(); 
							$title = get_the_title();
							$terms = get_the_terms( get_the_ID(), 'category' );
							$category_classes = array();
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								foreach ( $terms as $term ) {
									$category_classes[] = esc_html( $term->slug );
								}
							}
							$cat_names = implode( ' , ', $category_classes );
							echo '<a href="' . esc_url( get_permalink() ) . '">';
							echo '<div class="sub_blog_box ">';
							if ( has_post_thumbnail() ) {
								$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'custom-size-570x570' );
								echo '<div class="image-container">';
								echo '<img src="' . esc_url( $featured_image_url ) . '" alt="' . get_the_title() . '"  width="100%" height="570" >'; 
								echo '<div class="sub_case_box_overlay"><img src="' . get_stylesheet_directory_uri() . ' /assets/images/home/page-six-logo.png"></div>';                  
								echo '</div>';
							}
							echo '<div class="bottom_contain"><p class="case_category">'.  $cat_names .'</p>';
							echo '<h2>'. $title .'</h2></div>';
							echo '</div>';
							echo '</a>';
						endwhile; 
					endif; 
					wp_reset_postdata();
					?>


				</div>
				<div class="post_pagination second_post_pagination">
					<?php 
					echo paginate_links(array(
						'total' => $query->max_num_pages,
						'current' => max(1, get_query_var('paged')),
						'prev_text' => __('<svg class="prev_img" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none"><rect x="0.5" y="0.5" width="59" height="59" stroke="#0A1D35"/><mask id="mask0_1_11596" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="18" y="18" width="24" height="24"><path d="M18 18H42V42H18V18Z" fill="white"/></mask><g mask="url(#mask0_1_11596)"><path d="M23 30H37" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 34L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 26L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg>', 'textdomain'),
						'next_text' => __('<svg class="next_img" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none"><rect x="0.5" y="0.5" width="59" height="59" stroke="#0A1D35"/><mask id="mask0_1_11596" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="18" y="18" width="24" height="24"><path d="M18 18H42V42H18V18Z" fill="white"/></mask><g mask="url(#mask0_1_11596)"><path d="M23 30H37" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 34L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M33 26L37 30" stroke="#0A1D35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg>', 'textdomain'),
					));
					?>
				</div>
				<?php
			}
			?>

		</div>

		<?php if($sidebar_option == 'right' && is_active_sidebar('sidebar-blog-page')):?>
			<div class="bwp-sidebar sidebar-blog sidebar_class <?php echo $sidebar_option ?>">
				<?php dynamic_sidebar( 'sidebar-blog-page' );?>	
			</div>
		<?php endif; ?>

	</div>

</div>

<?php 

echo do_shortcode('[book-page-section]');

echo do_shortcode('[testimonial-layout-second]');

echo do_shortcode('[Consultation-layout]');

get_footer(); ?>