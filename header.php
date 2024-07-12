<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
    <div class="preloader" id="preloader">
        <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home/page-six-logo.png" alt="logo">
            </div>
        </div>
    </div>

    <?php 
    $post_header_option = get_post_meta($post->ID, 'header_option', true);

    if ($post_header_option && $post_header_option !== 'default') {

        $header_option = $post_header_option;

    } else if( $post_header_option == 'default'){
        $header_option = 'Header2';
    } else {
        $header_option = 'Header2';
    }

    if($header_option == 'Header1'){

        get_template_part('/header/header-1');

    } else if($header_option == 'Header2' && $header_option == 'default'){

        get_template_part('/header/header-2');

    } else if($header_option == 'Header3'){

        get_template_part('/header/header-3');

    }  else {

        get_template_part('/header/header-2');

    }

?>