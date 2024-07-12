<?php 
/**
 * Add a sidebar.
 */

function wakil_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Service page Sidebar', 'wakil'),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__('Add widgets here to appear in your sidebar service.', 'wakil'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => esc_html__('case page Sidebar', 'wakil'),
		'id'            => 'case-sidebar-blog',
		'description'   => esc_html__('Add widgets here to appear in your sidebar service.', 'wakil'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Blog page Sidebar', 'wakil'),
		'id'            => 'sidebar-blog-page',
		'description'   => esc_html__('Add widgets here to appear in your sidebar service.', 'wakil'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Single Blog page Sidebar', 'wakil'),
		'id'            => 'single-sidebar-blog-page',
		'description'   => esc_html__('Add widgets here to appear in your sidebar service.', 'wakil'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}

add_action('widgets_init', 'wakil_widgets_init');


/********************************************************* 
*************** Single Service page widget ***************
*********************************************************/
class Custom_Link_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
            'custom_link_widget', // Base ID
            'Custom Contact us Widget', // Name
            array('description' => __('A Custom Widget with an Image Upload Option', 'text_domain'))
        );

        // Enqueue media uploader script
		add_action('admin_enqueue_scripts', array($this, 'enqueue_media_uploader'));
	}

	public function enqueue_media_uploader() {
		wp_enqueue_media();
		wp_enqueue_script('custom_widget_script', get_template_directory_uri() . '/assets/js/custom-widget.js', array('jquery'), null, true);
	}

	public function widget($args, $instance) {

		$image_url = !empty($instance['image']) ? $instance['image'] : '';
		$title = apply_filters('widget_title', $instance['title']);
		$text = !empty($instance['text']) ? $instance['text'] : '';
		$link = !empty($instance['link']) ? $instance['link'] : '';


		echo $args['before_widget'];
		echo '<div class="contact_sidebar">';
		if (!empty($image_url)) {
			echo '<img src="' . esc_url($image_url) . '" alt="image" />';
		}

		if (!empty($title)) {
			echo $args['before_title'] . $text . $args['after_title'];
		}

		echo '<div class="navbar-btn" id="navbar-btn"><div class="button-box"><a href="' . $link . '" class="button-wrap"><span>	' . $title . ' <i class="ri-arrow-right-line"></i></span></a></div></div>';
		echo '</div>';


		echo $args['after_widget'];
	}

	public function form($instance) {
		
		$image = !empty($instance['image']) ? $instance['image'] : '';
		$title = !empty($instance['title']) ? $instance['title'] : __('New Title', 'text_domain');
		$text = !empty($instance['text']) ? $instance['text'] : '';
		$link = !empty($instance['link']) ? $instance['link'] : '';

		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image:'); ?></label>
			<input class="widefat image-url" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo esc_attr($image); ?>">
			<button class="upload_image_button button button-primary"><?php _e('Upload Image'); ?></button>
			<img src="<?php echo esc_attr($image); ?>" style="max-width:100%;display:block;margin-top:10px;" />
		</p>


		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Contact Us Text:', 'text_domain'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea($text); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Contact Us button Text:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Contact Us button Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>">
		</p>


		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		
		$instance['image'] = (!empty($new_instance['image'])) ? strip_tags($new_instance['image']) : '';
		$instance['text'] = (!empty($new_instance['text'])) ? $new_instance['text'] : '';
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['link'] = (!empty($new_instance['link'])) ? strip_tags($new_instance['link']) : '';

		return $instance;
	}
}


class custom_brochure_widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'custom_brochure_widget', // Base ID
            'Custom Brochure Widget', // Name
            array('description' => __('A Custom Widget with an Brochure Option', 'text_domain'))
        );
	}

	public function form($instance) {
		$title = !empty($instance['title']) ? $instance['title'] : __('New title', 'text_domain');
		$text = !empty($instance['text']) ? $instance['text'] : '';
		$link = !empty($instance['link']) ? $instance['link'] : '';  ?>


		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'text_domain'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea($text); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link URL:', 'text_domain'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>">
		</p>

		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['text'] = (!empty($new_instance['text'])) ? $new_instance['text'] : '';
		$instance['link'] = (!empty($new_instance['link'])) ? esc_url_raw($new_instance['link']) : '';
		return $instance;
	}


	public function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title']);
		$text = !empty($instance['text']) ? $instance['text'] : '';
		$image_url = get_stylesheet_directory_uri() . '/assets/images/sidebar/brochure.png';
		$link = !empty($instance['link']) ? $instance['link'] : '';

		echo $args['before_widget'];
		echo '<div class="Brochure">';
		echo '<div class="left_Brochure">';
		if (!empty($title)) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo '<div class="widget-text">' . wpautop($text) . '</div>';
		echo '</div>';
		if (!empty($link)) {
			if (!empty($image_url)) {
				echo '<a href="' . esc_url($link) . '" target="_blank"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($title) . '" width="54px" height="54px" /></a>';
			}
		}
		echo '</div>';
		echo $args['after_widget'];
	}
}


class Custom_Post_Widget extends WP_Widget {

    // Constructor
	public function __construct() {
		parent::__construct(
            'custom_post_widget', // Base ID
            __('Custom Post Widget', 'text_domain'), // Name
            array('description' => __('A Widget to display custom post titles', 'text_domain'),) // Args
        );
	}

    // The widget form (for the backend)
	public function form($instance) {
		$title = !empty($instance['title']) ? $instance['title'] : __('Custom Posts', 'text_domain');
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
				<?php esc_attr_e('Title:', 'text_domain'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<?php
	}

    // Updating widget replacing old instances with new
	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}

    // Display the widget
	public function widget($args, $instance) {
		global $post;
		echo $args['before_widget'];
		echo '<div class="custome_post_sidebar">';

		if (!empty($instance['title'])) {
			echo $args['before_title'] . apply_filters('widget_title', $instance['title'])  .  $args['after_title'];
			echo '<div class="title_border"><img src="'. get_stylesheet_directory_uri() . '/assets/images/home/border_icon.png" width="36" height="30"></div>';
		}
		$current_post_type = get_post_type($post);
		$query_args = array(
            'post_type' => $current_post_type,  
            'posts_per_page' => -1,
        );

		$custom_posts = new WP_Query($query_args);

		$current_post_id = $post->ID;

		if ($custom_posts->have_posts()) {
			echo '<ul>';
			while ($custom_posts->have_posts()) {
				$custom_posts->the_post();
				$ID = get_the_id();
				if ($current_post_id == $ID) {
					echo '<li class="active_link"><a href="' . get_permalink() . '" >' . get_the_title() . '</a></li>';
				} else {
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
			}
			echo '</ul>';
		} else {
			echo __('No posts found', 'text_domain');
		}

		wp_reset_postdata();
		echo '</div>';

		echo $args['after_widget'];
	}
}

/********************************************************** 
***************** Single Case page widget *****************
**********************************************************/

class Author_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
            'author_widget',
            esc_html__('Author Widget', 'text_domain'),
            array('description' => esc_html__('A Widget to display author image and name', 'text_domain'),) 
        );
	}

	public function enqueue_media_uploader() {
		wp_enqueue_media();
		wp_enqueue_script('custom_widget_script', get_template_directory_uri() . '/assets/js/custom-widget.js', array('jquery'), null, true);
	}

	public function widget($args, $instance) {
		echo $args['before_widget'];

		$author_id = get_the_author_meta('ID');
		$author_name = get_the_author();
		$author_avatar = get_avatar($author_id);
		$post_id = get_the_ID();
		$author_image_id = get_post_meta($post_id, 'author_image_id', true);
		$author_image_url = wp_get_attachment_url($author_image_id);
		$value = get_post_meta($post_id, '_custom_author_name', true);
		$text = !empty($instance['text']) ? $instance['text'] : '';

		echo '<div class="custome_author_detail">';
		if (!empty($author_image_url)) {
			echo '<div class="author-image">';
			echo '<img src="' . esc_url($author_image_url) . '" alt="Author Image">';
			echo '</div>';
		} else {
			if (!empty($author_avatar)) {
				echo '<div class="author-image">';
				echo $author_avatar;
				echo '</div>';
			}
		}

		if (!empty($value)) {
			echo '<h3>' . esc_html($value) . '</h3>';
			echo '<div class="title_border"><img src="' . get_stylesheet_directory_uri() . '/assets/images/home/border_icon.png" width="36" height="30"></div>';
		}
		
		echo '<div class="widget-text">' . wpautop($text) . '</div>';
		if ( ! empty( $instance['social_media_links'] ) ) {
			echo '<ul>';
			foreach ($instance['social_media_links'] as $link) {
				echo '<li><a href="' . esc_attr($link['alt_text']) . '" target="_blank"><img src="' . esc_url($link['image_url']) . '" alt="' . esc_attr($link['alt_text']) . '"></a></li>';
			}
			echo '</ul>';
		}
		echo '</div>';

		if (!empty($author_name)) {
			echo '<p>' . esc_html($author_name) . '</p>';
		}
		echo $args['after_widget'];
	}

	public function form($instance) {
		$text = !empty($instance['text']) ? $instance['text'] : '';
		$social_media_links = !empty($instance['social_media_links']) ? $instance['social_media_links'] : array();
		?>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'text_domain'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea($text); ?></textarea>
		</p>
		<p>
			<label><?php _e('Social Media Links:'); ?></label>
			<ul id="<?php echo $this->get_field_id('social_media_links'); ?>">
				<?php foreach ($social_media_links as $index => $link) : ?>
					<li>
						<img class="image-url" src="<?php echo esc_attr($link['image_url']); ?>" alt="<?php echo esc_attr($link['alt_text']); ?>">	
						<input class="widefat image-url" type="text" name="<?php echo $this->get_field_name('social_media_links'); ?>[<?php echo $index; ?>][image_url]" value="<?php echo esc_attr($link['image_url']); ?>" placeholder="Image URL">
						<input class="button upload-image" type="button" value="<?php _e('Upload Image'); ?>">
						<input class="widefat" type="text" name="<?php echo $this->get_field_name('social_media_links'); ?>[<?php echo $index; ?>][alt_text]" value="<?php echo esc_attr($link['alt_text']); ?>" placeholder="Alt Text">
						<button class="button remove-social-media"><?php _e('Remove'); ?></button>
					</li>
				<?php endforeach; ?>
			</ul>
			<button class="button add-social-media"><?php _e('Add Social Media'); ?></button>
		</p>
		<script>
			jQuery(document).ready(function($){
				$('.add-social-media').click(function(e){
					e.preventDefault();
					var index = $('#<?php echo $this->get_field_id('social_media_links'); ?> li').length;
					var input = '<li><img class="image-url" src="[' + index + '][image_url]" alt="[' + index + '][alt_text]" width="24" height="24"><input class="widefat image-url" type="text" name="<?php echo $this->get_field_name('social_media_links'); ?>[' + index + '][image_url]" value="" placeholder="Image URL"><input class="button upload-image" type="button" value="<?php _e('Upload Image'); ?>"><input class="widefat" type="text" name="<?php echo $this->get_field_name('social_media_links'); ?>[' + index + '][alt_text]" value="" placeholder="Alt Text"><button class="button remove-social-media"><?php _e('Remove'); ?></button></li>';
					$('#<?php echo $this->get_field_id('social_media_links'); ?>').append(input);
				});

				$(document).on('click', '.remove-social-media', function(e){
					e.preventDefault();
					$(this).parent().remove();
				});
			});
		</script>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['text'] = (!empty($new_instance['text'])) ? sanitize_text_field($new_instance['text']) : '';
		$instance['social_media_links'] = array();

		if (isset($new_instance['social_media_links'])) {
			foreach ($new_instance['social_media_links'] as $link) {
				if (!empty($link['image_url']) && !empty($link['alt_text'])) {
					$instance['social_media_links'][] = $link;
				}
			}
		}
		return $instance;
	}
}



class Custom_Category_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'custom_category_widget',
			__( 'Custom Blog Category Widget', 'text_domain' ),
			array( 'description' => __( 'A custom widget to display categories', 'text_domain' ), )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		echo '<div class="custome_post_sidebar custome_post_cat_sidebar">';

		if (!empty($instance['title'])) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			echo '<div class="title_border"><img src="'. get_stylesheet_directory_uri() . '/assets/images/home/border_icon.png" width="36" height="30"></div>';
		}

		$cat_args = get_terms( array(
			'taxonomy' => 'category', 
			'hide_empty' => false,
		) );

		if ( ! empty( $cat_args ) && ! is_wp_error( $cat_args ) ) {
			echo '<ul>';
			foreach ( $cat_args as $category ) {
				$category_link = get_category_link( $category->term_id );
				echo '<li><a href="' . esc_url( $category_link ) . '" >' . $category->name . ' <span> ('. $category->count .') </span> </a></li>';
			}
			echo '</ul>';
		} else {
			echo 'No categories found.';
		}
		echo '</div>';
		?>
		<?php

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories', 'text_domain' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}
}


class Custom_Popular_Posts_Widget extends WP_Widget {

    // Constructor
	function __construct() {
		parent::__construct(
			'custom_popular_posts_widget',
			__('Custom Popular Posts', 'text_domain'),
			array(
				'description' => __('A custom widget to display popular posts.', 'text_domain')
			)
		);
	}

    // Widget Output
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		echo '<div class="custome_post_sidebar custome_post_cat_sidebar">';

		if (!empty($instance['title'])) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			echo '<div class="title_border"><img src="'. get_stylesheet_directory_uri() . '/assets/images/home/border_icon.png" width="36" height="30"></div>';
		}
		

		$popular_posts = get_posts( array(
			'post_type'      => 'post',
			'posts_per_page' => 5,
			'orderby'        => 'comment_count',
		));

		?>
		<div class="popular_post_list">
			<?php
			
			foreach ( $popular_posts as $blog ) {
				$terms = get_the_terms( $blog->ID, 'category' );
				$category_classes = array();
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$category_classes[] = esc_html( $term->slug );
					}
				}
				$post_url = get_permalink( $blog->ID );
				$cat_names = implode( ' , ', $category_classes );
				echo '<div class="sub_post_list">';
				echo '<p class="case_category">'.  $cat_names .'</p>';
				echo '<p class="post_name"><a href="'  . $post_url .  '" > '. $blog -> post_title .' </a></p>';
				echo '</div>';

			}
			?>
		</div>
		<?php
		echo '</div>';

		echo $args['after_widget'];
	}

    // Backend Form
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

    // Update Widget Settings
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		return $instance;
	}
}


class Search_Suggestion_Widget extends WP_Widget {

    // Constructor
	public function __construct() {
		parent::__construct(
			'search_suggestion_widget',
			__('Search Suggestion Widget', 'text_domain'),
			array(
				'description' => __('A widget for displaying search suggestions on posts', 'text_domain'),
			)
		);
	}

    // Output the widget
	public function widget($args, $instance) {
        // Output widget content on the front end
		echo $args['before_widget'];
        echo '<div class="search_box"><div id="search-suggestion-widget"></div><input type="text" id="search-bar" placeholder="Search..."><img src="'.get_stylesheet_directory_uri().'/assets/images/blog/search-icon.png" width="24" height="24" alt="search"></div>';
        echo $args['after_widget'];
        ?>
        <?php
    }

    // Output the widget form in the admin
    public function form($instance) {
        // Widget form fields
    	$title = !empty($instance['title']) ? $instance['title'] : __('Search Suggestions', 'text_domain');
    	?>
    	<p>
    		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
    		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    	</p>
    	<?php
    }

    // Update the widget settings
    public function update($new_instance, $old_instance) {
    	$instance = array();
    	$instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
    	return $instance;
    }
}


function search_suggestion_widget_scripts() {
	wp_enqueue_script('search-suggestion-widget-script', get_template_directory_uri() . '/assets/js/search-suggestion-widget.js', array('jquery'), '1.0', true);

	wp_localize_script('search-suggestion-widget-script', 'searchSuggestionWidgetAjax', array('ajaxUrl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'search_suggestion_widget_scripts');

function get_search_suggestions() {
    $search_term = $_POST['search_term'];

    // Query posts based on the search term
    $args = array(
        'post_type' => 'post',
        's' => $search_term,
        'posts_per_page' => 5,
    );
    $query = new WP_Query($args);

    $suggestions = array();

    // Loop through the query results and add post titles and images to suggestions
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $post_title = get_the_title();
            $post_url = get_permalink(); 
            $post_image = get_the_post_thumbnail_url($post_id, 'thumbnail'); // Change 'thumbnail' to the appropriate image size
            $suggestion = array(
                'title' => $post_title,
                'image' => $post_image,
                'url' => $post_url,
            );
            $suggestions[] = $suggestion;
        }
    }

    // Reset post data
    wp_reset_postdata();

    echo json_encode($suggestions);
    wp_die(); 
}
add_action('wp_ajax_get_search_suggestions', 'get_search_suggestions');
add_action('wp_ajax_nopriv_get_search_suggestions', 'get_search_suggestions');

// Register the custom widget
function register_custom_link_widget()
{
	register_widget('Custom_Link_Widget');
	register_widget('custom_brochure_widget');
	register_widget('Custom_Post_Widget');
	register_widget('Author_Widget');
	register_widget( 'Custom_Category_Widget' );
	register_widget( 'Custom_Popular_Posts_Widget' );
	register_widget('Search_Suggestion_Widget');
}
add_action('widgets_init', 'register_custom_link_widget');