<?php 

add_action( 'admin_init', 'bwp_page_init' );

function bwp_page_init(){
	add_meta_box( 'bwp_page_meta', esc_html__( 'Page Metabox', 'wakil' ), 'bwp_page_meta', 'page', 'normal', 'low' );
	add_meta_box( 'bwp_post_meta', esc_html__( 'post Metabox', 'wakil' ), 'bwp_post_meta', 'service', 'normal', 'low' );
}


function bwp_metabox_pages(){
	
	$bwp_metabox_pages[] = array(
		'title' 	=> esc_html__( 'Footer', 'wakil' ),
		'fields'	=> array(
			array(
				'type'	=> 'select',
				'title'	=> esc_html__( 'Footer Page Select', 'wakil' ),
				'id'	=> 'page_footer_style',
				'description' => esc_html__( ' Chose to select footer page content for this page. ', 'wakil' ),
				'std'	 => '',
				'values' => get_footers_types()
			),
		)
	);
	
	return $bwp_metabox_pages;
}

function bwp_post_meta(){
	global $post;
	$bwp_metabox_pages = bwp_metabox_pages();
	$current_screen =  get_current_screen();
	wp_nonce_field( 'bwp_page_save_meta', 'bwp_metabox_plugin_nonce' );
	if( $current_screen->post_type == 'service' ) : 
		wp_enqueue_style('pwb_metabox_style', get_stylesheet_directory_uri() . '/assets/css/metabox.css');
		wp_enqueue_script('bwp_tab_script', get_stylesheet_directory_uri() . '/assets/js/tab.js');			
		wp_enqueue_script('pwb_radio_img_select', get_stylesheet_directory_uri() . '/assets/js/radio_img_select.js');
	endif; 
	?>
	<div class="bwp-metabox" id="bwp_metabox">
		<div class="bwp-metabox-content">
			<ul class="nav nav-tabs">
				<?php 
				foreach( $bwp_metabox_pages as $key => $metabox ){ 
					$active = ( $key == 0 ) ? 'active' : '';
					echo '<li class="' . esc_attr( $active ) . '"><a href="#bwp_'. strtolower( $metabox['title'] ) .'" data-toggle="tab">' . $metabox['title'] . '</a></li>';
				} 
				?>
			</ul>
			<div class="tab-content">
				<?php 
				foreach( $bwp_metabox_pages as $key => $metabox ){ 
					$active = ( $key == 0 ) ? 'active' : '';				
					?>
					<div class="tab-pane <?php echo esc_attr( $active ); ?>" id="bwp_<?php echo strtolower( $metabox['title'] ) ; ?>">
						<?php if( isset( $metabox['fields'] ) && count( $metabox['fields'] ) > 0 ) {?>
							<?php 
							foreach( $metabox['fields'] as $meta_field ) { 
								$values = isset( $meta_field['values'] ) ? $meta_field['values'] : '';
								?>
								<div class="tab-inner clearfix">
									<div class="bwptab-description pull-left">

										<!-- Title meta field -->
										<?php if( $meta_field['title'] != '' ) { ?>
											<div class="bwptab-item-title">
												<?php echo $meta_field['title']; ?>
											</div>
										<?php } ?>

										<!-- Description -->
										<?php if( $meta_field['description'] != '' ) { ?>
											<div class="bwptab-item-shortdes">
												<?php echo $meta_field['description']; ?>
											</div>
										<?php } ?>
									</div>
									<!-- Meta content -->
									<div class="bwptab-content">
										<?php bwp_render_html( $meta_field['id'], $meta_field['type'], $values, $meta_field['std'] ); ?>									
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php 
}

function bwp_page_meta(){
	global $post;
	$bwp_metabox_pages = bwp_metabox_pages();
	$current_screen =  get_current_screen();
	wp_nonce_field( 'bwp_page_save_meta', 'bwp_metabox_plugin_nonce' );
	if( $current_screen->post_type == 'page' ) : 
		wp_enqueue_style('pwb_metabox_style', get_stylesheet_directory_uri() . '/assets/css/metabox.css');
		wp_enqueue_script('bwp_tab_script', get_stylesheet_directory_uri() . '/assets/js/tab.js');			
		wp_enqueue_script('pwb_radio_img_select', get_stylesheet_directory_uri() . '/assets/js/radio_img_select.js');
		
	endif; 
	?>
	<div class="bwp-metabox" id="bwp_metabox">
		<div class="bwp-metabox-content">
			<ul class="nav nav-tabs">
				<?php 
				foreach( $bwp_metabox_pages as $key => $metabox ){ 
					$active = ( $key == 0 ) ? 'active' : '';
					echo '<li class="' . esc_attr( $active ) . '"><a href="#bwp_'. strtolower( $metabox['title'] ) .'" data-toggle="tab">' . $metabox['title'] . '</a></li>';
				} 
				?>
			</ul>
			<div class="tab-content">
				<?php 
				foreach( $bwp_metabox_pages as $key => $metabox ){ 
					$active = ( $key == 0 ) ? 'active' : '';				
					?>
					<div class="tab-pane <?php echo esc_attr( $active ); ?>" id="bwp_<?php echo strtolower( $metabox['title'] ) ; ?>">
						<?php if( isset( $metabox['fields'] ) && count( $metabox['fields'] ) > 0 ) {?>
							<?php 
							foreach( $metabox['fields'] as $meta_field ) { 
								$values = isset( $meta_field['values'] ) ? $meta_field['values'] : '';
								?>
								<div class="tab-inner clearfix">
									<div class="bwptab-description pull-left">

										<!-- Title meta field -->
										<?php if( $meta_field['title'] != '' ) { ?>
											<div class="bwptab-item-title">
												<?php echo $meta_field['title']; ?>
											</div>
										<?php } ?>

										<!-- Description -->
										<?php if( $meta_field['description'] != '' ) { ?>
											<div class="bwptab-item-shortdes">
												<?php echo $meta_field['description']; ?>
											</div>
										<?php } ?>
									</div>
									<!-- Meta content -->
									<div class="bwptab-content">
										<?php bwp_render_html( $meta_field['id'], $meta_field['type'], $values, $meta_field['std'] ); ?>									
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php 
}

function bwp_page_save_meta(){
	global $post;
	$bwp_metabox_pages = bwp_metabox_pages();
	if ( ! isset( $_POST['bwp_metabox_plugin_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['bwp_metabox_plugin_nonce'], 'bwp_page_save_meta' ) ) {
		return;
	}
	// Check if this is an autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

    // Check the user's permissions
	if (!current_user_can('edit_post', $post ->ID)) {
		return;
	}
	bwp_save_post_meta($bwp_metabox_pages);
}

add_action( 'save_post', 'bwp_page_save_meta', 10, 1 );
// add_action( 'save_post', 'bwp_ourteam_save_meta', 10, 1 );


function bwp_render_html( $id, $type, $values, $std ){
	global $post;
	$meta_value = '';
	if( get_post_meta( $post->ID, $id, true ) != '' ){
		$meta_value = get_post_meta( $post->ID, $id, true );
	}else if( isset( $std ) && $std != '' ){
		$meta_value = $std;
	}
	$html = '';
	switch( $type ) {
		case 'text' :
		$html .= '<input type="text" value="'. esc_attr( $meta_value ) .'" id="'. esc_attr( $id ) .'" name="'. esc_attr( $id ) .'"/>';
		break;
		case 'textarea' :
		$html .= '<textarea rows="4" cols="50" id="'. esc_attr( $id ) .'" name="'. esc_attr( $id ) .'">'. esc_attr( $meta_value ) .'</textarea>';
		break;		
		case 'select' :
		$html .= '<select id="'. esc_attr( $id ) .'" name="'. esc_attr( $id ) .'">';
		foreach( $values as $key => $value ) {
			$html .= '<option value="'. esc_attr( $key ) .'" '. selected( $meta_value, $key, false ) .'>'. $value .'</option>';
		}
		$html .= '</select>';
		break;
		case 'radio_img' :
		$i = 0;
		$html .= '<div class="page-metabox-radio-img">';
		foreach( $values as $key => $value ) {
			$key_val = ( $key == 'none' ) ? esc_html__( 'No Select', 'wakil' ) : $key; 
			$selected = ( checked( $meta_value, $key, false ) != '' ) ? ' bwp-radio-img-selected' : '';
			$html .= '<label class="radio-label bwp-radio-img'.$selected.' bwp-radio-img-'. esc_attr( $id ) .'" for="'. esc_attr( $id ) .'_'. $i .'">';
			$html .= '<input type="radio" id="'. esc_attr( $id ) .'_'. $i .'" name="'. esc_attr( $id ) .'" value="'. esc_attr( $key ) .'" '.checked($meta_value, $key, false).'/>';
			$html .= '<div class="page-radio-color" style="background: '. esc_attr( $value ) .'" onclick="jQuery:bwp_radio_img_select(\''. esc_attr( $id ) .'_'. $i .'\', \''. esc_attr( $id ) .'\');"></div>';
			$html .= '<br/><span>'. esc_attr( $key_val ) .'</span>';
			$html .= '</label>';
			$i ++;
		}
		$html .= '</div>';
		break;		
		case 'upload' :
		ob_start(); ?>
		<div class="upload-formfield">
			<div id="metabox_thumbnail" style="float: left; margin-right: 10px;">
				<?php if($meta_value){ ?>
					<img class="<?php echo esc_attr( $id ); ?>" src="<?php echo esc_url( $meta_value ); ?>" alt="" style="display: block; width:150px;height :auto;" />
				<?php }else{ ?>
					<img class="<?php echo esc_attr( $id ); ?>" src="<?php echo esc_url( $meta_value ); ?>" alt="" style="display: none; width:150px;height :auto;" />
				<?php } ?>
			</div>
			<div class="metabox-thumbnail-wrapper">
				<input type="hidden" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $meta_value ) ?>"/>
				<button type="button" class="bwp_upload_image_button button" data-image_id="<?php echo esc_attr( $id ); ?>"><?php echo esc_html__( 'Upload/Add image', 'wakil' ) ?></button>
				<button type="button" class="bwp_remove_image_button button" data-image_id="<?php echo esc_attr( $id ); ?>"><?php echo esc_html__( 'Remove image', 'wakil' ) ?></button>
			</div>
			<div class="clear"></div>
		</div>
		<?php
		$html .= ob_get_clean();
		break;
	}
	echo $html;
}

function bwp_save_post_meta($metaboxs){
	global $post;
	if(!$metaboxs)
		return;
	foreach( $metaboxs as $key => $metabox ){ 
		foreach( $metabox['fields'] as $meta_field ) { 			
			if( isset( $_POST[$meta_field['id']] ) ){
				$data = $_POST[$meta_field['id']];
				update_post_meta( $post->ID, $meta_field['id'], $data );
			}
			else{
				if( $meta_field['std'] != '' ){
					update_post_meta( $post->ID, $meta_field['id'], $meta_field['std'] );
				}else{
					delete_post_meta( $post->ID, $meta_field['id'] );
				}
			}
		}
	}	
}

// Add meta box to post and page editing screens
function wpse_custom_meta_box() {
	add_meta_box(
		'wpse_image_meta_box',
		'Text cursore image',
		'wpse_render_image_meta_box',
		array('service'),
		'normal',
		'default'
	);

	add_meta_box(
		'wpse_image_meta_box',
		'Feature case image',
		'wpse_render_image_meta_box',
		array('case'),
		'normal',
		'default'
	);

	
}
add_action('add_meta_boxes', 'wpse_custom_meta_box');

// Render meta box content

function wpse_render_image_meta_box($post) {
    // Retrieve the current value of the meta field
	$image_id = get_post_meta($post->ID, 'wpse_uploaded_image', true);
	$image_url = wp_get_attachment_image_url($image_id, 'thumbnail');

    // Output the HTML for the meta box
	?>
	<p>
		<label for="wpse_image_upload">Upload Image:</label><br>
		<input type="hidden" name="wpse_image_id" id="wpse_image_id" value="<?php echo esc_attr($image_id); ?>">
		<div id="wpse_image_preview">
			<?php if (!empty($image_url)) : ?>
				<img src="<?php echo esc_url($image_url); ?>" alt="Uploaded Image" style="max-width: 100%; height: auto;">
			<?php endif; ?>
		</div>
		<button type="button" class="button button-primary" id="wpse_upload_button">Upload Image</button>
		<button type="button" class="button" id="wpse_remove_button" style="<?php echo empty($image_url) ? 'display:none;' : ''; ?>">Remove Image</button>
	</p>

	<script>
		jQuery(document).ready(function($) {
        // Trigger the WordPress media uploader
			$('#wpse_upload_button').click(function(e) {
				e.preventDefault();

				var imageUploader = wp.media({
					title: 'Upload Image',
					button: {
						text: 'Use this image'
					},
					multiple: false
				});

				imageUploader.on('select', function() {
					var attachment = imageUploader.state().get('selection').first().toJSON();
					$('#wpse_image_id').val(attachment.id);
					$('#wpse_image_preview').html('<img src="' + attachment.url + '" alt="Uploaded Image" style="max-width: 100%; height: auto;">');
					$('#wpse_remove_button').show();
				});

				imageUploader.open();
			});

        // Remove the uploaded image
			$('#wpse_remove_button').click(function(e) {
				e.preventDefault();
				$('#wpse_image_id').val('');
				$('#wpse_image_preview').html('');
				$(this).hide();
			});
		});
	</script>
	<?php
    // Add nonce for security
	wp_nonce_field('wpse_save_image_meta_box', 'wpse_image_meta_box_nonce');
}

// Save meta box data
function wpse_save_image_meta_box($post_id) {
    // Check if nonce is set
	if (!isset($_POST['wpse_image_meta_box_nonce'])) {
		return;
	}
    // Verify nonce
	if (!wp_verify_nonce($_POST['wpse_image_meta_box_nonce'], 'wpse_save_image_meta_box')) {
		return;
	}
    // Check if this is an autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
    // Check the user's permissions
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}
    // Save the data
	if (isset($_POST['wpse_image_id'])) {
		update_post_meta($post_id, 'wpse_uploaded_image', sanitize_text_field($_POST['wpse_image_id']));
	}
}
add_action('save_post', 'wpse_save_image_meta_box');


function wpse_custom_meta_box2() {
add_meta_box(
		'wpse_image_meta_box2',
		'Home page feature image',
		'wpse_render_image_meta_box2',
		array('service'),
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', 'wpse_custom_meta_box2');

// Render meta box content2

function wpse_render_image_meta_box2($post) {
    $image_id2 = get_post_meta($post->ID, 'wpse_uploaded_feature_image', true);
    $image_url2 = wp_get_attachment_image_url($image_id2, 'thumbnail');
    ?>
    <p>
        <label for="wpse_image_upload">Upload Image:</label><br>
        <input type="hidden" name="wpse_image_id2" id="wpse_image_id2" value="<?php echo esc_attr($image_id2); ?>">
        <div id="wpse_image_preview2">
            <?php if (!empty($image_url2)) : ?>
                <img src="<?php echo esc_url($image_url2); ?>" alt="Uploaded Image" style="max-width: 100%; height: auto;">
            <?php endif; ?>
        </div>
        <button type="button" class="button button-primary" id="wpse_upload_button2">Upload Image</button>
        <button type="button" class="button" id="wpse_remove_button2" style="<?php echo empty($image_url2) ? 'display:none;' : ''; ?>">Remove Image</button>
    </p>

    <script>
        jQuery(document).ready(function($) {
            $('#wpse_upload_button2').click(function(e) {
                e.preventDefault();

                var imageUploader = wp.media({
                    title: 'Upload Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });

                imageUploader.on('select', function() {
                    var attachment = imageUploader.state().get('selection').first().toJSON();
                    $('#wpse_image_id2').val(attachment.id);
                    $('#wpse_image_preview2').html('<img src="' + attachment.url + '" alt="Uploaded Image" style="max-width: 100%; height: auto;">');
                    $('#wpse_remove_button2').show();
                });

                imageUploader.open();
            });

            $('#wpse_remove_button2').click(function(e) {
                e.preventDefault();
                $('#wpse_image_id2').val('');
                $('#wpse_image_preview2').html('');
                $(this).hide();
            });
        });
    </script>
    <?php
    wp_nonce_field('wpse_save_image_meta_box2', 'wpse_image_meta_box_nonce2');
}

function wpse_save_image_meta_box2($post_id) {
    // Check if nonce is set
    if (!isset($_POST['wpse_image_meta_box_nonce2'])) {
        return;
    }
    // Verify nonce
    if (!wp_verify_nonce($_POST['wpse_image_meta_box_nonce2'], 'wpse_save_image_meta_box2')) {
        return;
    }
    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Check the user's permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // Save the data
    if (isset($_POST['wpse_image_id2'])) {
        update_post_meta($post_id, 'wpse_uploaded_feature_image', sanitize_text_field($_POST['wpse_image_id2']));
    }
}
add_action('save_post', 'wpse_save_image_meta_box2');




/* Testimonial */

function add_testimonial_metaboxes() {
	add_meta_box(
		'testimonial_subtitle',
		__('Testimonial Subtitle', 'text_domain'),
		'testimonial_author_callback',
		'testimonial',
		'normal',
		'high'
	);

	add_meta_box(
		'testimonial_author_position',
		__('Author Position', 'text_domain'),
		'testimonial_author_position_callback',
		'testimonial',
		'normal',
		'high'
	);

	add_meta_box(
		'testimonial_rating',
		__('Testimonial Rating', 'text_domain'),
		'testimonial_rating_callback',
		'testimonial',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_testimonial_metaboxes');

function testimonial_author_callback($post) {
	wp_nonce_field('save_testimonial_author', 'testimonial_author_nonce');
	$value = get_post_meta($post->ID, '_testimonial_author', true);
	echo '<label for="testimonial_author">' . __('Sub Title detail : ', 'text_domain') . '</label>';
	echo '<input type="text" id="testimonial_author" name="testimonial_author" value="' . esc_attr($value) . '" size="25" />';
}

function testimonial_author_position_callback($post) {
	wp_nonce_field('save_testimonial_author_position', 'testimonial_author_position_nonce');
	$value = get_post_meta($post->ID, '_testimonial_author_position', true);
	echo '<label for="testimonial_author_position">' . __('Author Position : ', 'text_domain') . '</label>';
	echo '<input type="text" id="testimonial_author_position" name="testimonial_author_position" value="' . esc_attr($value) . '" size="25" />';
}

function testimonial_rating_callback($post) {
	wp_nonce_field('save_testimonial_rating', 'testimonial_rating_nonce');
	$value = get_post_meta($post->ID, '_testimonial_rating', true);
	echo '<label for="testimonial_rating">' . __('Rating : ', 'text_domain') . '</label>';
	echo '<select id="testimonial_rating" name="testimonial_rating">';
	for ($i = 1; $i <= 5; $i++) {
		echo '<option value="' . $i . '"' . selected($value, $i, false) . '>' . $i . '</option>';
	}
	echo '</select>';
}

function save_testimonial_metaboxes($post_id) {
    // Check if our nonce is set.
	if (!isset($_POST['testimonial_author_nonce']) || !isset($_POST['testimonial_author_position_nonce']) || !isset($_POST['testimonial_rating_nonce'])) {
		return $post_id;
	}

	$nonce_author = $_POST['testimonial_author_nonce'];
	$nonce_position = $_POST['testimonial_author_position_nonce'];
	$nonce_rating = $_POST['testimonial_rating_nonce'];

	if (!wp_verify_nonce($nonce_author, 'save_testimonial_author') || !wp_verify_nonce($nonce_position, 'save_testimonial_author_position') || !wp_verify_nonce($nonce_rating, 'save_testimonial_rating')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if (isset($_POST['post_type']) && 'testimonial' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
	}

	if (isset($_POST['testimonial_author'])) {
		$author_data = sanitize_text_field($_POST['testimonial_author']);
		update_post_meta($post_id, '_testimonial_author', $author_data);
	}

	if (isset($_POST['testimonial_author_position'])) {
		$position_data = sanitize_text_field($_POST['testimonial_author_position']);
		update_post_meta($post_id, '_testimonial_author_position', $position_data);
	}

	if (isset($_POST['testimonial_rating'])) {
		$rating_data = intval($_POST['testimonial_rating']);
		update_post_meta($post_id, '_testimonial_rating', $rating_data);
	}
}
add_action('save_post', 'save_testimonial_metaboxes');


// Add the metabox to all post types
function add_sidebar_option_metabox() {
	$post_types = get_post_types(array('public' => true), 'names');
	foreach ($post_types as $post_type) {
		add_meta_box(
			'sidebar_option',
			'Sidebar Option',
			'sidebar_option_callback',
			$post_type,
			'side'
		);
	}
}
add_action('add_meta_boxes', 'add_sidebar_option_metabox');

// Metabox callback function
function sidebar_option_callback($post) {
	$sidebar_option = get_post_meta($post->ID, '_sidebar_option', true);
	?>
	<label for="sidebar_option">Choose Sidebar Option:</label> <br><br>

	<select name="sidebar_option" id="sidebar_option">
		<option value="default" <?php selected($sidebar_option, 'Default'); ?>>Default</option>
		<option value="standard" <?php selected($sidebar_option, 'standard'); ?>>Standard</option>
		<option value="left" <?php selected($sidebar_option, 'left'); ?>>Left Sidebar</option>
		<option value="right" <?php selected($sidebar_option, 'right'); ?>>Right Sidebar</option>
	</select>
	<?php
}

// Save the metabox value
function save_sidebar_option_metabox($post_id) {
	if (array_key_exists('sidebar_option', $_POST)) {
		update_post_meta(
			$post_id,
			'_sidebar_option',
			$_POST['sidebar_option']
		);
	}
}
add_action('save_post', 'save_sidebar_option_metabox');




// Add the metabox to all post types
function add_header_option_metabox() {
	$post_types = get_post_types(array('public' => true), 'names');
	foreach ($post_types as $post_type) {
		add_meta_box(
			'header_option',
			'Header Option',
			'header_option_callback',
			$post_type,
			'side'
		);
	}
}
add_action('add_meta_boxes', 'add_header_option_metabox');

// Metabox callback function
function header_option_callback($post) {
	$header_option = get_post_meta($post->ID, 'header_option', true);
	?>
	<label for="header_option">Choose Sidebar Option:</label> <br><br>

	<select name="header_option" id="header_option">
		<option value="default" <?php selected($header_option, 'default'); ?>>default</option>
		<option value="Header1" <?php selected($header_option, 'Header1'); ?>>Header 1</option>
		<option value="Header2" <?php selected($header_option, 'Header2'); ?>>Header 2</option>
		<option value="Header3" <?php selected($header_option, 'Header3'); ?>>Header 3</option>
	</select>
	<?php
}

// Save the metabox value
function save_header_option_metabox($post_id) {
	if (array_key_exists('header_option', $_POST)) {
		update_post_meta(
			$post_id,
			'header_option',
			$_POST['header_option']
		);
	}
}
add_action('save_post', 'save_header_option_metabox');


// Add meta box to specified post types
function custom_author_image_metabox() {
	$post_types = get_post_types(array('public' => true), 'names');
	foreach ($post_types as $post_type) {
		add_meta_box(
            'custom_author_image',       // Meta box ID
            'Author Image',              // Meta box title
            'custom_author_image_html',  // Callback function to display the meta box content
            $post_type,                  // Post types to add the meta box to
            'side',                      // Context (side, normal, advanced)
            'high'                       // Priority (high, core, default, low)
        );
	}
}
add_action('add_meta_boxes', 'custom_author_image_metabox');

// Callback function to display the meta box content
function custom_author_image_html($post) {
	$author_image_id = get_post_meta($post->ID, 'author_image_id', true);
	$author_image_url = wp_get_attachment_url($author_image_id);
	?>
	<p>
		<div id="author_image_preview">
			<?php if ($author_image_url) : ?>
				<img src="<?php echo esc_url($author_image_url); ?>" style="max-width: 100%; height: auto;">
			<?php else : ?>
				<span><?php _e('No image uploaded', 'text_domain'); ?></span>
			<?php endif; ?>
		</div>
		<br>
		<input type="button" id="author_image_button" class="button" value="<?php _e('Upload', 'text_domain'); ?>">
		<input type="button" id="author_image_remove_button" class="button" value="<?php _e('Remove Image', 'text_domain'); ?>">
		<input type="hidden" id="author_image_id" name="author_image_id" value="<?php echo esc_attr($author_image_id); ?>">
	</p>

	<br>
	<?php
	$value = get_post_meta($post->ID, '_custom_author_name', true);
	?>
	<label for="custom_author_name_field">Author Name: </label>
	<input type="text" id="custom_author_name_field" name="custom_author_name_field" value="<?php echo esc_attr($value); ?>" />
	<br>
	<script>
		jQuery(document).ready(function($) {
			$('#author_image_button').click(function() {
				var uploader = wp.media({
					title: 'Choose Author Image',
					button: {
						text: 'Choose Image'
					},
					multiple: false
				});
				uploader.on('select', function() {
					var attachment = uploader.state().get('selection').first().toJSON();
					$('#author_image_id').val(attachment.id);
					$('#author_image_preview ').html('<img src="' + attachment.url + '" style="max-width: 100%; height: auto;">');
					$('#author_image_button').val('Replace Image');
				});
				uploader.open();
			});
			$('#author_image_remove_button').click(function() {
				$('#author_image_id').val('');
				$('#author_image_preview').html('<span><?php _e('No image uploaded', 'text_domain'); ?></span>');
			});
		});
	</script>
	<?php
}

// Save meta box data
function save_custom_author_image($post_id) {
	if (array_key_exists('author_image_id', $_POST)) {
		update_post_meta($post_id, 'author_image_id', sanitize_text_field($_POST['author_image_id']));
	}
	
	if (array_key_exists('author_image_id', $_POST)) {
		update_post_meta($post_id, 'author_image_id', sanitize_text_field($_POST['author_image_id']));
	}
	if (array_key_exists('custom_author_name_field', $_POST)) {
		update_post_meta($post_id, '_custom_author_name', sanitize_text_field($_POST['custom_author_name_field']));
	}
}
add_action('save_post', 'save_custom_author_image');

function add_post_format_metaboxes() {

	add_meta_box(
		'standard-meta-box',
		__('Standard Settings', 'textdomain'),
		'standard_settings_callback',
		'post',
		'normal',
		'high',
	);

	add_meta_box(
		'gallery-meta-box',
		__('Gallery Settings', 'textdomain'),
		'gallery_settings_callback',
		'post',
		'normal',
		'high',
		array('post_format' => 'gallery')
	);

	add_meta_box(
		'video-meta-box',
		__('Video Settings', 'textdomain'),
		'video_settings_callback',
		'post',
		'normal',
		'high',
		array('post_format' => 'video')
	);

	add_meta_box(
		'quote-meta-box',
		__('Quote Settings', 'textdomain'),
		'quote_settings_callback',
		'post',
		'normal',
		'high',
		array('post_format' => 'quote')
	);

	add_meta_box(
		'link-meta-box',
		__('Link Settings', 'textdomain'),
		'link_settings_callback',
		'post',
		'normal',
		'high',
		array('post_format' => 'link')
	);

	add_meta_box(
		'audio-meta-box',
		__('Audio Settings', 'textdomain'),
		'audio_settings_callback',
		'post',
		'normal',
		'high',
		array('post_format' => 'audio')
	);
}

add_action('add_meta_boxes', 'add_post_format_metaboxes');


function enqueue_post_format_metabox_script() {
	global $pagenow, $post;
	if ($pagenow == 'post.php' && isset($post)) {
		$post_format = get_post_format($post);
		wp_enqueue_script('post-format', get_stylesheet_directory_uri() . '/assets/js/post-format-metabox.js', array('jquery'), true);
		wp_localize_script('post-format', 'postFormatMetabox', array('currentFormat' => $post_format));
	}
}
add_action('admin_enqueue_scripts', 'enqueue_post_format_metabox_script');


function standard_settings_callback($post) {
    // Retrieve any existing meta data
    global $post;
	$text = get_post_meta($post->ID, 'standard_text', true);
	?>
	<p>
		<label for="standard_text"><?php _e('Text:', 'text-domain'); ?></label>
		<textarea id="standard_text" style="width: 100%;" name="standard_text"><?php echo esc_textarea($text); ?></textarea>
	</p>

	<?php
}

function gallery_settings_callback($post) {
	$gallery_images = get_post_meta($post->ID, 'gallery_images', true);

     // Retrieve any existing meta data
	$custom_text = get_post_meta($post->ID, 'gallery_text', true);
	?>
	<p>
		<label for="gallery_text"><?php _e('Text:', 'text-domain'); ?></label>
		<textarea id="gallery_text" style="width: 100%;" name="gallery_text"><?php echo esc_textarea($text); ?></textarea>
	</p>
	<br><label for="custom_text"><?php _e('img gallery:', 'textdomain'); ?></label><br>
	<div id="gallery-container">
		<div class="gallery-images">
			<?php
			if (!empty($gallery_images)) {
				foreach ($gallery_images as $image_id) {
					$image_url = wp_get_attachment_image_src($image_id, 'thumbnail');
					?>
					<div class="gallery-image">
						<img src="<?php echo esc_attr($image_url[0]); ?>" />
						<button type="button" class="remove-image">Remove</button>
						<input type="hidden" name="gallery_images[]" value="<?php echo esc_attr($image_id); ?>">
					</div>
					<?php
				}
			}
			?>
		</div>
		<button type="button" id="add-image" class="button">Select Images</button>
	</div>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var galleryContainer = document.getElementById('gallery-container');
			var addImageButton = document.getElementById('add-image');
			var galleryImages = document.querySelectorAll('.gallery-image');

			addImageButton.addEventListener('click', function() {
				var frame = wp.media({
					title: 'Select Images',
					multiple: true,
					library: {
						type: 'image'
					},
					button: {
						text: 'Select'
					}
				});

				frame.on('select', function() {
					var attachmentIds = frame.state().get('selection').map(function(attachment) {
						return attachment.id;
					});

					attachmentIds.forEach(function(attachmentId) {
						var imageContainer = document.createElement('div');
						imageContainer.classList.add('gallery-image');
						imageContainer.innerHTML = '<img src="' + wp.media.attachment(attachmentId).attributes.url + '" width="400"/><button type="button" class="remove-image">Remove</button>';
						var hiddenInput = document.createElement('input');
						hiddenInput.type = 'hidden';
						hiddenInput.name = 'gallery_images[]';
						hiddenInput.value = attachmentId;
						imageContainer.appendChild(hiddenInput);
						galleryContainer.querySelector('.gallery-images').appendChild(imageContainer);
					});
				});

				frame.open();
			});

			galleryContainer.addEventListener('click', function(event) {
				if (event.target.classList.contains('remove-image')) {
					event.target.parentNode.remove();
				}
			});
		});
	</script>
	<?php
}

function video_settings_callback($post) {
	$video_url = get_post_meta($post->ID, 'gallery_video', true);
	$image_url = get_post_meta($post->ID, '_custom_image', true);
	$text = get_post_meta($post->ID, 'video_text', true);
	?>

	<label for="gallery_video"><?php _e('Video Gallery:', 'textdomain'); ?></label><br>
	<div class="gallery-videos">
		<?php if (!empty($video_url)) { ?>
			<div class="gallery-video">
				<video controls width="1170px"><source src="<?php echo esc_url($video_url); ?>" type="video/mp4">Your browser does not support the video tag.
				</video>
				<input type="hidden" name="gallery_video" value="<?php echo esc_attr($video_url); ?>">
			</div>
		<?php } ?>
	</div>

	<button type="button" id="add-video" class="button">Select Video</button>
	<button type="button" class="remove-video button"><?php _e('Remove Image'); ?></button>
	<br><br>
	<label for="gallery_video"><?php _e('img upload:', 'textdomain'); ?></label><br>
	<div id="custom-image-container">
		<div id="custom_image_preview">
			<?php if ($image_url) : ?>
				<img src="<?php echo esc_url($image_url); ?>" style="max-width: 600px; height: auto;">
			<?php else : ?>
				<span><?php _e('No image uploaded', 'text_domain'); ?></span>
			<?php endif; ?>
		</div>
		<br><br>

		<input type="hidden" id="custom-image" name="custom_image" value="<?php echo esc_attr($image_url); ?>" />
		<button type="button" class="upload_image_button button" id="upload_image_button"><?php _e('Upload Image'); ?></button>
		<button type="button" class="remove_image_button button" id="remove_image_button" style="<?php echo empty($image_url) ? 'display:none;' : ''; ?>"><?php _e('Remove Image'); ?></button>
	</div>

	<br><br>
	<p>
		<label for="video_text"><?php _e('Text:', 'text-domain'); ?></label>
		<textarea id="video_text" style="width: 100%;" name="video_text"><?php echo esc_textarea($text); ?></textarea>
	</p>

	<script>
		jQuery(document).ready(function($) {
			$('#add-video').on('click', function(e) {
				e.preventDefault();
				var frame = wp.media({
					title: 'Select Video',
					multiple: false,
					library: {
						type: 'video'
					},
					button: {
						text: 'Select'
					}
				});
				frame.on('select', function() {
					var attachment = frame.state().get('selection').first().toJSON();
					var video_url = attachment.url;
					$('.gallery-videos').html('<div class="gallery-video">' +
						'<video controls>' +
						'<source src="' + video_url + '" type="video/mp4">' +
						'Your browser does not support the video tag.' +
						'</video>' +
						'<input type="hidden" name="gallery_video" value="' + video_url + '">' +
						'</div>');

					$('.remove-video').show();
				});
				frame.open();
			});
			$(document).on('click', '.remove-video', function() {
				$(this).closest('.inside').find('.gallery-video').remove();
			});
		});


		jQuery(document).ready(function($) {
			$('#upload_image_button').click(function() {
				var mediaUploader;
				if (mediaUploader) {
					mediaUploader.open();
					return;
				}
				mediaUploader = wp.media.frames.file_frame = wp.media({
					title: 'Choose Image',
					button: {
						text: 'Choose Image'
					},
					multiple: false
				});
				mediaUploader.on('select', function() {
					var attachment = mediaUploader.state().get('selection').first().toJSON();
					$('#custom_image_preview img').attr('src', attachment.url);
					$('#custom-image').val(attachment.url);
					$('#remove_image_button').show();
				});
				mediaUploader.open();
			});

			$('#remove_image_button').click(function() {
				$('#custom_image_preview img').attr('src', '');
				$('#custom-image').val('');
				$(this).hide();
			});
		});
	</script>
	<?php		
}

function quote_settings_callback($post) {
	$title = get_post_meta($post->ID, 'quote_title', true);
	$author_name = get_post_meta($post->ID, 'quote_author_name', true);
	$text = get_post_meta($post->ID, 'quote_text', true);
	?>

	<p>
		<label for="quote_title"><?php _e('Title:', 'text-domain'); ?></label>
		<input type="text" id="quote_title" name="quote_title" style="width: 100%;" value="<?php echo esc_attr($title); ?>" />
	</p>

	<p>
		<label for="quote_author_name"><?php _e('Author Name:', 'text-domain'); ?></label>
		<input type="text" id="quote_author_name" name="quote_author_name" style="width: 100%;" value="<?php echo esc_attr($author_name); ?>" />
	</p>

	<p>
		<label for="quote_text"><?php _e('Text:', 'text-domain'); ?></label>
		<textarea id="quote_text" style="width: 100%;" name="quote_text"><?php echo esc_textarea($text); ?></textarea>
	</p>

	<?php
}

function link_settings_callback($post) {
	$title = get_post_meta($post->ID, 'link_title', true);
	$text = get_post_meta($post->ID, 'link_text', true);
	?>
	<p>
		<label for="link_title"><?php _e('Title:', 'text-domain'); ?></label>
		<input type="text" id="link_title" name="link_title" style="width: 100%;" value="<?php echo esc_attr($title); ?>" />
	</p>

	<p>
		<label for="link_text"><?php _e('Text:', 'text-domain'); ?></label>
		<textarea id="link_text" style="width: 100%;" name="link_text"><?php echo esc_textarea($text); ?></textarea>
	</p>
	<?php
}

function audio_settings_callback($post) {
	$soundcloud_audio_iframe = get_post_meta($post->ID, 'soundcloud_audio_iframe', true);
	$text = get_post_meta($post->ID, 'audio_text', true);

    // Display the form
	?>
	<p>
		<label for="audio_text"><?php _e('Text:', 'text-domain'); ?></label>
		<textarea id="audio_text" style="width: 100%;" name="audio_text"><?php echo esc_textarea($text); ?></textarea>
	</p>
	<br>
	<br>
	<label for="soundcloud_audio_iframe"><?php _e('SoundCloud Audio Iframe:', 'textdomain'); ?></label>
	<textarea id="soundcloud_audio_iframe" name="soundcloud_audio_iframe" style="width: 100%; height: 300px;"><?php echo esc_textarea($soundcloud_audio_iframe); ?></textarea>
	<div id="iframe-preview" style="margin-top: 10px;"></div>

	<script>
		jQuery(document).ready(function($) {
        // Function to update iframe preview
			function updatePreview() {
				var iframeCode = $('#soundcloud_audio_iframe').val();
				$('#iframe-preview').html(iframeCode);
			}

        // Initial preview
			updatePreview();

        // Update preview on input change
			$('#soundcloud_audio_iframe').on('input', function() {
				updatePreview();
			});
		});
	</script>
	<?php
}

// Save custom text field
function save_custom_format($post_id) {
	if (array_key_exists('standard_text', $_POST)) {
		update_post_meta($post_id, 'standard_text', sanitize_text_field($_POST['standard_text']));
	}

	if (isset($_POST['gallery_images'])) {
		$gallery_images = array_map('intval', $_POST['gallery_images']);
		update_post_meta($post_id, 'gallery_images', $gallery_images);
	}

	if (isset($_POST['gallery_video'])) {
		$video_url = esc_url_raw($_POST['gallery_video']);

		update_post_meta($post_id, 'gallery_video', $video_url);
	}

	if (array_key_exists('custom_image', $_POST)) {
		update_post_meta($post_id, '_custom_image', $_POST['custom_image']);
	}

	if (isset($_POST['video_text'])) {
		update_post_meta($post_id, 'video_text', sanitize_textarea_field($_POST['video_text']));
	}

	if (isset($_POST['quote_title'])) {
		update_post_meta($post_id, 'quote_title', sanitize_text_field($_POST['quote_title']));
	}

	if (isset($_POST['quote_author_name'])) {
		update_post_meta($post_id, 'quote_author_name', sanitize_text_field($_POST['quote_author_name']));
	}

	if (isset($_POST['quote_text'])) {
		update_post_meta($post_id, 'quote_text', sanitize_textarea_field($_POST['quote_text']));
	}

	if (isset($_POST['link_title'])) {
		update_post_meta($post_id, 'link_title', sanitize_text_field($_POST['link_title']));
	}

	if (isset($_POST['link_text'])) {
		update_post_meta($post_id, 'link_text', sanitize_textarea_field($_POST['link_text']));
	}

	if (isset($_POST['soundcloud_audio_iframe'])) {
		update_post_meta($post_id, 'soundcloud_audio_iframe', $_POST['soundcloud_audio_iframe']);
	}
	if (isset($_POST['audio_text'])) {
		update_post_meta($post_id, 'audio_text', sanitize_textarea_field($_POST['audio_text']));
	}
	if (isset($_POST['gallery_text'])) {
		update_post_meta($post_id, 'gallery_text', sanitize_textarea_field($_POST['gallery_text']));
	}
}
add_action('save_post', 'save_custom_format');