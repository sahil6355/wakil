<?php
// it inserts the entry in the admin menu
add_action('admin_menu', 'wakil_create_menu_entry');

// creating the menu entries
function wakil_create_menu_entry()
{

    // icon image path that will appear in the menu
    // adding the main manu entry

    add_menu_page(esc_html__('Wakil', 'wakil'), esc_html__('Wakil', 'wakil'), 'manage_options', 'main-wakil','wakil_show_main_page', 'dashicons-admin-generic');
    add_submenu_page('main-wakil',esc_html__( 'Footers', 'main-wakil' ), esc_html__( 'Footers', 'main-wakil' ),'manage_options','edit.php?post_type=bwp_footer');
    add_submenu_page('main-wakil',esc_html__( 'Attorneys', 'main-wakil' ), esc_html__( 'Attorneys', 'main-wakil' ),'manage_options','edit.php?post_type=bwp_attorneys');
    add_submenu_page('main-wakil',esc_html__( 'Service', 'main-wakil' ), esc_html__( 'Services', 'main-wakil' ),'manage_options','edit.php?post_type=bwp_service');


}



// function triggered in add_menu_page
function wakil_show_main_page()
{
    include('main-wakil.php');
}
/**
 * Enqueue a script with jQuery as a dependency.
 */

add_action('admin_enqueue_scripts', 'add_wakil_scripts_func');

function add_wakil_scripts_func($hook_suffix)
{

    if ($hook_suffix != 'toplevel_page_main-wakil') {
        return;
    }

    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_media();
    wp_enqueue_style('wakil-admin-styles', get_template_directory_uri() . '/admin/assets/css/wakil-admin.css', array(), '1.0.0', 'all');
    wp_enqueue_script('wakil-admin-scripts', get_template_directory_uri() . '/admin/assets/js/wakil-admin.js', array('wp-color-picker'), '1.0.0');
    add_thickbox();
}


add_action('init', 'wakil_include_files_func');
add_action('activate_plugin', 'wakil_include_files_func', 10, 2);
function wakil_include_files_func()
{

    include_once dirname(__FILE__) . '/class-wakil-admin-settings.php';

    $settings = Wakil_Admin_Settings::get_settings_pages();

    foreach ($settings as $section) {
        if (!method_exists($section, 'get_settings')) {
            continue;
        }
        $subsections = array_unique(array_merge(array(''), array_keys($section->get_sections())));

        /**
         * We are using 'Wakil_Admin_Settings::get_settings' on purpose even thought it's deprecated.
         * See the method documentation for an explanation.
         */

        foreach ($subsections as $subsection) {
            foreach ($section->get_settings($subsection) as $value) {
                if (isset($value['default']) && isset($value['id'])) {
                    $autoload = isset($value['autoload']) ? (bool) $value['autoload'] : true;
                    add_option($value['id'], $value['default'], '', ($autoload ? 'yes' : 'no'));
                }
            }
        }
    }

    ini_set("allow_url_include", 'On');

}

add_filter('plugin_action_links_wakil/wakil.php', 'wakil_settings_link');
function wakil_settings_link($links)
{
    // Build and escape the URL.
    $url = esc_url(
        add_query_arg(
            'page',
            'main-wakil',
            get_admin_url() . 'admin.php'
        ));
    // Create the link.
    $settings_link = "<a href='$url'>" . esc_html__('Settings', 'wakil') . '</a>';
    // Adds the link to the starting of the array.
    array_unshift(
        $links,
        $settings_link
    );
    return $links;
}    //end easyloader_settings_link()