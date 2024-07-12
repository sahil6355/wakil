<?php
// Add custom breadcrumb shortcode
function custom_breadcrumb_shortcode() {
    $breadcrumb = '<div class="custom-breadcrumb">';
    $breadcrumb .= '<a href="' . home_url() . '">Home</a>';
    $separator = ' / ';
    if (is_singular()) {
        global $post;        
        $post_type = get_post_type($post->ID);
        if ($post_type !== 'post') {
            $post_type_object = get_post_type_object($post_type);
            if ($post_type_object && $post_type_object->has_archive) {
                $breadcrumb .= $separator;
                $breadcrumb .= '<a href="' . get_post_type_archive_link($post_type) . '">' . $post_type_object->labels->name . '</a>';
            }
        } else {
            $breadcrumb .= $separator;
            $breadcrumb .= '<a href="' . get_permalink(get_option('page_for_posts')) . '">Blog</a>';
        }

        $ancestors = get_post_ancestors($post->ID);
        $ancestors = array_reverse($ancestors);
        foreach ($ancestors as $ancestor) {
            $breadcrumb .= $separator;
            $breadcrumb .= '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
        }
        
        $breadcrumb .= $separator;
        $breadcrumb .= '<span>' . get_the_title($post->ID) . '</span>';

    } elseif (is_archive()) {
        if (is_post_type_archive()) {
            $post_type_object = get_queried_object();
            $breadcrumb .= $separator;
            $breadcrumb .= '<span>' . $post_type_object->labels->name . '</span>';
        } else {
            $breadcrumb .= $separator;
            $breadcrumb .= '<span>' . single_term_title('', false) . '</span>';
        }
    } elseif (is_search()) {
        $breadcrumb .= $separator;
        $breadcrumb .= 'Search results for "' . get_search_query() . '"';
    } elseif (is_404()) {
        $breadcrumb .= $separator;
        $breadcrumb .= '404 Error';
    }  elseif (is_home()) {
        $blog_page_id = get_option('page_for_posts'); 
        $breadcrumb .= $separator;
        $breadcrumb .= '<span>' . get_the_title($blog_page_id) . '</span>';
    }else {
        $breadcrumb .= $separator;
        $breadcrumb .= '<span>' . get_the_title( get_the_ID() ) . '</span>';
    }
    $breadcrumb .= '</div>';
    return $breadcrumb;
}
add_shortcode('custom_breadcrumb', 'custom_breadcrumb_shortcode');
