<?php

// service post

function custom_post_type() {

    $labels = array(
        'name'                => _x('Service', 'Post Type General Name', 'wakil'),
        'singular_name'       => _x('Service', 'Post Type Singular Name', 'wakil'),
        'menu_name'           => __('Service', 'wakil'),
        'parent_item_colon'   => __('Parent Service', 'wakil'),
        'all_items'           => __('All Service', 'wakil'),
        'view_item'           => __('View Service', 'wakil'),
        'add_new_item'        => __('Add New Service', 'wakil'),
        'add_new'             => __('Add New', 'wakil'),
        'edit_item'           => __('Edit Service', 'wakil'),
        'update_item'         => __('Update Service', 'wakil'),
        'search_items'        => __('Search Service', 'wakil'),
        'not_found'           => __('Not Found', 'wakil'),
        'not_found_in_trash'  => __('Not found in Trash', 'wakil'),
        
    );
    $args = array(
        'label'               => __('Service', 'wakil'),
        'description'         => __('Movie news and reviews', 'wakil'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'taxonomies'          => array('genres'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon' => 'dashicons-open-folder', 
        'show_in_rest' => true,
    );

    register_post_type('service', $args);


    register_taxonomy("categories", array("service"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => array('slug' => 'service', 'with_front' => false)));
}
add_action('init', 'custom_post_type', 0);




/********************************************************
================= Attorneys custome post ================ 
********************************************************/

function custom_post_type_attorneys() {

    $labels = array(
        'name'                  => _x( 'Attorneys ', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Attorneys Client Detail', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Attorneys ', 'text_domain' ),
        'name_admin_bar'        => __( 'Attorneys Client Detail', 'text_domain' ),
        'archives'              => __( 'Attorneys Client Detail Archives', 'text_domain' ),
        'attributes'            => __( 'Attorneys Client Detail Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Attorneys Client Detail:', 'text_domain' ),
        'all_items'             => __( 'All Attorneys ', 'text_domain' ),
        'add_new_item'          => __( 'Add New Attorneys Client Detail', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Attorneys Client Detail', 'text_domain' ),
        'edit_item'             => __( 'Edit Attorneys Client Detail', 'text_domain' ),
        'update_item'           => __( 'Update Attorneys Client Detail', 'text_domain' ),
        'view_item'             => __( 'View Attorneys Client Detail', 'text_domain' ),
        'view_items'            => __( 'View Attorneys ', 'text_domain' ),
        'search_items'          => __( 'Search Attorneys Client Detail', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Attorneys Client Detail', 'text_domain' ),
        'description'           => __( 'Attorneys Client Detail Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest' => true,
    );
    register_post_type( 'attorneys', $args );
}
add_action( 'init', 'custom_post_type_attorneys' );

function custom_taxonomy_categories() {

    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Categories', 'text_domain' ),
        'all_items'                  => __( 'All Categories', 'text_domain' ),
        'parent_item'                => __( 'Parent Category', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
        'new_item_name'              => __( 'New Category Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Category', 'text_domain' ),
        'edit_item'                  => __( 'Edit Category', 'text_domain' ),
        'update_item'                => __( 'Update Category', 'text_domain' ),
        'view_item'                  => __( 'View Category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Categories', 'text_domain' ),
        'search_items'               => __( 'Search Categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No categories', 'text_domain' ),
        'items_list'                 => __( 'Categories list', 'text_domain' ),
        'items_list_navigation'      => __( 'Categories list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'attorneys_client_category', array( 'attorneys' ), $args );
}
add_action( 'init', 'custom_taxonomy_categories');

function custom_taxonomy_tags() {

    $labels = array(
        'name'                       => _x( 'Tags', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Tags', 'text_domain' ),
        'all_items'                  => __( 'All Tags', 'text_domain' ),
        'edit_item'                  => __( 'Edit Tag', 'text_domain' ),
        'view_item'                  => __( 'View Tag', 'text_domain' ),
        'update_item'                => __( 'Update Tag', 'text_domain' ),
        'add_new_item'               => __( 'Add New Tag', 'text_domain' ),
        'new_item_name'              => __( 'New Tag Name', 'text_domain' ),
        'parent_item'                => __( 'Parent Tag', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Tag:', 'text_domain' ),
        'search_items'               => __( 'Search Tags', 'text_domain' ),
        'popular_items'              => __( 'Popular Tags', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate tags with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove tags', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used tags', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No tags', 'text_domain' ),
        'items_list'                 => __( 'Tags list', 'text_domain' ),
        'items_list_navigation'      => __( 'Tags list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'attorneys_client_tag', array( 'attorneys' ), $args );
}
add_action( 'init', 'custom_taxonomy_tags');




/********************************************************
================ Testimonials custome post ==============
********************************************************/

function create_testimonial_post_type() {
    $labels = array(
        'name'                  => _x('Testimonials', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Testimonials', 'text_domain'),
        'name_admin_bar'        => __('Testimonial', 'text_domain'),
        'archives'              => __('Testimonial Archives', 'text_domain'),
        'attributes'            => __('Testimonial Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Testimonial:', 'text_domain'),
        'all_items'             => __('All Testimonials', 'text_domain'),
        'add_new_item'          => __('Add New Testimonial', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Testimonial', 'text_domain'),
        'edit_item'             => __('Edit Testimonial', 'text_domain'),
        'update_item'           => __('Update Testimonial', 'text_domain'),
        'view_item'             => __('View Testimonial', 'text_domain'),
        'view_items'            => __('View Testimonials', 'text_domain'),
        'search_items'          => __('Search Testimonial', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into testimonial', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this testimonial', 'text_domain'),
        'items_list'            => __('Testimonials list', 'text_domain'),
        'items_list_navigation' => __('Testimonials list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter testimonials list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Testimonial', 'text_domain'),
        'description'           => __('Post Type Description', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type('testimonial', $args);
}
add_action('init', 'create_testimonial_post_type');


/********************************************************
================== Our Cases custome post ================
********************************************************/

function custom_post_type_case() {

    $labels = array(
        'name'                  => _x( 'Cases', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Case Detail', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Cases', 'text_domain' ),
        'name_admin_bar'        => __( 'Case Detail', 'text_domain' ),
        'archives'              => __( 'Case Detail Archives', 'text_domain' ),
        'attributes'            => __( 'Case Detail Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Case Detail:', 'text_domain' ),
        'all_items'             => __( 'All Cases', 'text_domain' ),
        'add_new_item'          => __( 'Add New Case Detail', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Case Detail', 'text_domain' ),
        'edit_item'             => __( 'Edit Case Detail', 'text_domain' ),
        'update_item'           => __( 'Update Case Detail', 'text_domain' ),
        'view_item'             => __( 'View Case Detail', 'text_domain' ),
        'view_items'            => __( 'View Cases', 'text_domain' ),
        'search_items'          => __( 'Search Case Detail', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Case Detail', 'text_domain' ),
        'description'           => __( 'Case Detail Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields','excerpt'  ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio', // You can use any Dashicons icon.
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest' => true,
    );
    register_post_type( 'case', $args );
}
add_action( 'init', 'custom_post_type_case' );

function custom_taxonomy_case_categories() {

    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Categories', 'text_domain' ),
        'all_items'                  => __( 'All Categories', 'text_domain' ),
        'parent_item'                => __( 'Parent Category', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
        'new_item_name'              => __( 'New Category Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Category', 'text_domain' ),
        'edit_item'                  => __( 'Edit Category', 'text_domain' ),
        'update_item'                => __( 'Update Category', 'text_domain' ),
        'view_item'                  => __( 'View Category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Categories', 'text_domain' ),
        'search_items'               => __( 'Search Categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No categories', 'text_domain' ),
        'items_list'                 => __( 'Categories list', 'text_domain' ),
        'items_list_navigation'      => __( 'Categories list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'case_category', array( 'case' ), $args );
}
add_action( 'init', 'custom_taxonomy_case_categories');

function custom_taxonomy_case_tags() {

    $labels = array(
        'name'                       => _x( 'Tags', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Tags', 'text_domain' ),
        'all_items'                  => __( 'All Tags', 'text_domain' ),
        'edit_item'                  => __( 'Edit Tag', 'text_domain' ),
        'view_item'                  => __( 'View Tag', 'text_domain' ),
        'update_item'                => __( 'Update Tag', 'text_domain' ),
        'add_new_item'               => __( 'Add New Tag', 'text_domain' ),
        'new_item_name'              => __( 'New Tag Name', 'text_domain' ),
        'parent_item'                => __( 'Parent Tag', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Tag:', 'text_domain' ),
        'search_items'               => __( 'Search Tags', 'text_domain' ),
        'popular_items'              => __( 'Popular Tags', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate tags with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove tags', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used tags', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No tags', 'text_domain' ),
        'items_list'                 => __( 'Tags list', 'text_domain' ),
        'items_list_navigation'      => __( 'Tags list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'case_tag', array( 'case' ), $args );
}
add_action( 'init', 'custom_taxonomy_case_tags');
