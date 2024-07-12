<?php

// 1. service layout first shotcode

add_shortcode('service-layout-first', 'service_list_first');

function service_list_first()
{
    ob_start();

    $args = array(
        'post_type' => 'Service',
        'orderby' => 'ID',
        'post_status' => 'publish',
        'order' => 'ASC',
        'posts_per_page' => 6 // this will retrive all the post that is published 
    );
    $result = new WP_Query($args);
    if ($result->have_posts()) :
        echo '<div class="service_data_first">';
        while ($result->have_posts()) :
            $result->the_post();
            $image_id = get_post_meta(get_the_ID(), 'wpse_uploaded_image', true);
            $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
        ?> <a href='<?php echo get_permalink(); ?>' data-url='<?php echo $image_url ?>' class="offer-links cursor-links links_text"> <span class="blog-post-box">
            <?php echo the_title(); ?>
        </span></a> <span class="symbol links_text">/</span>
        <?php
    endwhile;
    echo '</div>';
endif;
wp_reset_postdata();
$output = ob_get_clean();

return $output;
}




// 2. service layout second shotcode

add_shortcode('service-layout-second', 'service_list_second');

function service_list_second()
{
    ob_start();

    $args = array(
        'post_type' => 'Service',
        'orderby' => 'ID',
        'post_status' => 'publish',
        'order' => 'ASC',
        'posts_per_page' => 6 // this will retrive all the post that is published 
    );
    $result = new WP_Query($args);
    if ($result->have_posts()) :
        echo '<div class="service_data_second">';
        while ($result->have_posts()) :
            $result->the_post();
            $image_id = get_post_meta(get_the_ID(), 'wpse_uploaded_image', true);
            $image_url = wp_get_attachment_image_url($image_id, 'thumbnail'); ?>
            <div class="sub_main_service">
                <?php if (has_post_thumbnail(get_the_ID())) : ?>
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail'); ?>
                    <div id="custom-bg">
                        <img src="<?php echo $image[0]; ?>" alt="" class="links_img">
                    </div>
                <?php endif; ?>

                <a href='<?php echo get_permalink(); ?>' data-url='<?php echo $image_url ?>' class="offer-links cursor-links links_text"> <span class="blog-post-box">
                    <?php echo the_title(); ?>
                </span></a>
                <div class="content links_line">
                    <?php the_excerpt(); ?>
                </div>
                <div class="last_icone">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/services/icone.png" alt="icone" width="32" height="32">
                </div>
            </div>
            <?php
        endwhile;
        echo '</div>';
    endif;
    wp_reset_postdata();

    $output = ob_get_clean();

    return $output;
}

// 3. service layout third shotcode

add_shortcode('service-layout-third', 'service_list_third');

function service_list_third(){
    ob_start();

    $args = array(
        'post_type' => 'Service',
        'orderby' => 'ID',
        'post_status' => 'publish',
        'order' => 'ASC',
        'posts_per_page' => 6 
    );
    $result = new WP_Query($args);
    if ($result->have_posts()) :
        echo '<div class="service_data_third">';
        while ($result->have_posts()) :
            $result->the_post();
            $image_id = get_post_meta(get_the_ID(), 'wpse_uploaded_image', true);
            $image_url = wp_get_attachment_image_url($image_id, 'thumbnail'); ?>
            <div class="sub_main_service_third">
                 <?php if (has_post_thumbnail(get_the_ID())) : ?>
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail'); ?>
                    <div id="custom-bg">
                        <img src="<?php echo $image[0]; ?>" alt="" class="links_img">
                    </div>
                <?php endif; ?>

                <a href='<?php echo get_permalink(); ?>' data-url='<?php echo $image_url ?>' class="links_text"> <span class="blog-post-box">
                    <?php echo the_title(); ?>
                </span></a>

                <div class="content links_line">
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <?php
        endwhile;
        echo '</div>';
    endif;
    wp_reset_postdata();

    $output = ob_get_clean();

    return $output;
}

?>