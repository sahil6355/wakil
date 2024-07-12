<?php

/**
 * wakil General Settings
 *
 * @package wakil\Admin
 */

defined('ABSPATH') || exit;

if (class_exists('wakil_Settings_General', false)) {
	return new wakil_Settings_General();
}

/* function to get theme options default value */
if (!function_exists('thememount_get_themeoptions_default_value')) {
	function thememount_get_themeoptions_default_value($id)
	{
		$return = '';
		$default_values = '{"last_tab":"","themestyle":"apiconaadv","layout":"wide","full_wide_elements":{"header":"1","content":"1","footer":"1"},"responsive":"1","skincolor":"#e13e20","global_background":{"background-color":"#ffffff","background-repeat":"","background-size":"cover","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"inner_background":{"background-color":"#ffffff","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"pagetranslation":"no","loaderimg":"11","loaderimage_custom":{"url":"","id":"","height":"","width":"","thumbnail":""},"fonticonlibrary":{"fontawesome":"1","lineicons":"","entypo":"","typicons":"","iconic":"","mpictograms":"","meteocons":"","mfglabs":"","maki":"","zocial":"","brandico":"","elusive":"","websymbols":"","twemojiawesome":""},"one_page_site":"0","favicon":{"url":"","id":"3511","height":"48","width":"48","thumbnail":""},"favicon_16":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_32":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_96":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_160":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_192":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_57":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_60":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_72":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_76":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_114":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_120":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_144":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_152":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_180":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_tile_color":"#ffffff","favicon_ms_144":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_70":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_150":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_310_150":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_310":{"url":"","id":"","height":"","width":"","thumbnail":""},"general_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"13px","line-height":"22px","letter-spacing":"0.5px","color":"#676767"},"link-color":{"regular":"#1c1c1c","hover":"#e13e20"},"h1_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"30px","line-height":"34px","letter-spacing":"1px","color":"#1c1c1c"},"h2_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"25px","line-height":"30px","letter-spacing":"1px","color":"#1c1c1c"},"h3_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"22px","line-height":"30px","letter-spacing":"","color":"#1c1c1c"},"h4_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"18px","line-height":"25px","letter-spacing":"","color":"#1c1c1c"},"h5_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"16px","line-height":"18px","letter-spacing":"","color":"#1c1c1c"},"h6_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"14px","line-height":"16px","letter-spacing":"1px","color":"#1c1c1c"},"heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"500","font-style":"","text-transform":"","font-size":"25px","line-height":"30px","letter-spacing":"1px","color":"#131313"},"subheading_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"","font-weight":"300","font-style":"","text-transform":"","font-size":"19px","line-height":"25px","letter-spacing":"0.5px","color":"#676767"},"widget_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"uppercase","font-size":"19px","line-height":"26px","letter-spacing":"0.5px","color":"#1c1c1c"},"button_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"500","font-style":"","text-transform":"uppercase","letter-spacing":"1px"},"elementtitle":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","letter-spacing":""},"fbar_show":"1","fbar_position":"default","fbar_bg_color":"darkgrey","fbar_bg_custom_color":{"color":"#75db18","alpha":"0.8","rgba":"rgba(117,219,24,0.8)"},"fbar_text_color":"white","fbar_text_custom_color":"#8224e3","fbar_background":{"background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center center","background-image":"' . get_template_directory_uri() . '/images/floatingbar_image_adv.jpg","media":{"id":"","height":"800","width":"1200","thumbnail":""}},"topbar_show_team_search":"1","fbar-form-title":"DOCTOR\'S SEARCH","fbar-form-desc":"","fbar-form-input-text":"Search by name","fbar-form-select-group":"All sections","fbar-form-btn-text":"Search","topbar_handler_icon":"fa-user-md","topbar_handler_icon_close":"fa-times","fbar_btn_bg_color":"skincolor","fbar_btn_bg_custom_color":"#3d24e2","fbar_icon_color":"white","fbar_icon_custom_color":"#eeee22","floatingbar_breakpoint":"1200","floatingbar_breakpoint_custom":"1200","topbarhide":"0","topbarbgcolor":"custom","topbarbgcustomcolor":"#242424","topbar_text_color":"white","topbartextcustomcolor":"#f45138","topbartext":"<ul class=\"top-contact\"><li><i class=\"kwicon-fa-phone\"></i>Call us now! <strong>0123 444 333</strong></li><li><i class=\"kwicon-fa-envelope-o\"></i>info@example.com</li><li><i class=\"kwicon-fa-map-marker\"></i>Find our Location</li></ul>","topbarrighttext":"[kwayy-social-links]","topbar_breakpoint":"768","topbar_breakpoint_custom":"1200","titlebar_bg_color":"custom","titlebar_bg_custom_color":{"color":"#000000","alpha":"0.8","rgba":"rgba(0,0,0,0.8)"},"titlebar_background":{"background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center center","background-image":"' . get_template_directory_uri() . '/images/titlebar_image_adv.jpg","media":{"id":"","height":"800","width":"1200","thumbnail":""}},"titlebar_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"500","font-style":"","text-transform":"uppercase","font-size":"40px","line-height":"40px","letter-spacing":"0.5px"},"titlebar_subheading_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"","font-weight":"400","font-style":"","text-transform":"none","font-size":"20px","line-height":"30px","letter-spacing":"1px"},"titlebar_breadcrumb_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"","font-weight":"400","font-style":"","text-transform":"none","font-size":"14px","line-height":"20px","letter-spacing":"1px"},"tbar-height":"300","titlebar_view":"default","titlebar_text_color":"white","titlebar_text_custom_color":"#81d742","tbar_hide_bcrumb":"0","adv_tbar_catarc":"Category Archives: ","adv_tbar_tagarc":"Tag Archives: ","adv_tbar_postclassified":"Posts classified under: ","adv_tbar_authorarc":"Author Archives: ","headerbgcolor":{"color":"#ffffff","alpha":"1","rgba":"rgba( 255,255,255, 1)"},"stickyheaderbgcolor":{"color":"#ffffff","alpha":"1","rgba":"rgba( 255,255,255, 1)"},"logotype":"image","logotext":"Apicona Advanced","logo_font":{"font-family":"Raleway","font-options":"","google":"1","font-backup":"\'Times New Roman\', Times,serif","font-weight":"700","font-style":"","font-size":"36px","color":"#272727"},"logoimg":{"url":"' . get_template_directory_uri() . '/images/logo_adv.png","id":"3834","height":"75","width":"312","thumbnail":""},"logoimg_sticky":{"url":"","id":"","height":"","width":"","thumbnail":""},"logo-max-height":"38","logo-max-height-sticky":"38","header-height":"100","header-height-sticky":"80","header_search":"1","search_input":"WRITE SEARCH WORD...","stickyheader":"y","headerstyle":"1","center-logo-width":"290","first-menu-margin":"160","menubgcolor":"#000000","header_right_content":"","header_three_content":"<ul>\r\n<li class=\"fst\">\r\n<div class=\"media-left\">\r\n<div class=\"icon\"> <i class=\"fa fa-map-marker\"></i></div>\r\n</div>\r\n<div class=\"media-right\">\r\n<h6 class=\"font-raleway\">Our Location </h6>\r\n<span>50- Design Street, Texas</span> </div>\r\n</li>\r\n\r\n<li>\r\n<div class=\"media-left\">\r\n<div class=\"icon\"> <i class=\"fa fa-phone\"></i></div>\r\n</div>\r\n<div class=\"media-right\">\r\n<h6>PHONE NUMBER</h6>\r\n<span>1-800-123-456</span> </div>\r\n</li>\r\n<li>\r\n<div class=\"media-left\">\r\n<div class=\"icon\"> <i class=\"fa fa-envelope\"></i></div>\r\n</div>\r\n<div class=\"media-right\">\r\n<h6>CONTACT MAIL</h6>\r\n<span>info@mail.com</span> </div>\r\n</li>\r\n</ul>","logoseo":"h1homeonly","menu_breakpoint":"1200","menu_breakpoint_custom":"1200","mainmenufont":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"","font-weight":"500","font-style":"","text-transform":"uppercase","font-size":"14px","line-height":"35px","letter-spacing":"0.5px","color":"#282828"},"stickymainmenufontcolor":"#282828","mainmenu_active_link_color":"skin","mainmenu_active_link_custom_color":"#e13e20","dropdownmenufont":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"uppercase","font-size":"12px","line-height":"20px","letter-spacing":"0.5px","color":"#ffffff"},"dropmenu_active_link_color":"skin","dropmenu_active_link_custom_color":"#ff1111","dropmenu_background":{"background-color":"#222222","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"dropdown_menu_separator":"white","dropdown_menu_separator_vertical":"white","megamenu_widget_title":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"500","font-style":"","text-transform":"","font-size":"16px","line-height":"20px","letter-spacing":"1px","color":"#ffffff"},"mmmenu_dropdown_bg_1":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_2":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_3":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_4":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_5":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_6":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_7":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_8":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_9":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_10":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"stickyfooter":"0","footerwidget_bgimage":{"background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center top","background-image":"' . get_template_directory_uri() . '/images/footer_image.jpg","media":{"id":"","height":"800","width":"1200","thumbnail":""}},"footerwidget_bgcolor":{"color":"#252525","alpha":"0.97","rgba":"rgba(37,37,37,0.97)"},"footerwidget_color":"white","top_footer_widget_column":"4_4_4","footer_column_layout":"3_3_3_3","footer_copyright_bgimage":{"background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center top","background-image":"","media":{"id":"","height":"","width":"","thumbnail":"http://apicona-advanced.thememount.com/wp-content/uploads/2016/06/footer-bg-150x150.jpg"}},"footer_copyright_bgcolor":{"color":"#1c1c1c","alpha":"1","rgba":"rgba(28,28,28,1)"},"footer_copyright_color":"white","copyrights":"Copyright &copy; [current-year] <a href=\"[site-url]\">[site-title]</a>. All rights reserved.","footer_copyright_right":"[tm-footermenu]","login_background":{"background-color":"transparent","background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center center","background-image":"' . get_template_directory_uri() . '/images/titlebar_image_adv.jpg","media":{"id":"","height":"","width":"","thumbnail":""}},"blog_text_limit":"0","blog_view":"classic","blog_readmore_text":"Read More","team_before_title_text":"ABOUT","teamcat_column":"three","teamcat_show":"9","portfolio_show_like":"1","portfolio_readmore_text":"View Project Details","portfolio_show_related":"1","portfolio_project_details":"PROJECT DETAILS","portfolio_description":"ABOUT THIS PROJECT","portfolio_related_title":"RELATED  PROJECTS","portfolio_viewstyle":"default","pf_details_date_icon":"fa-calendar","pf_details_date_title":"Date","pf_details_line1_icon":"fa-user","pf_details_line1_title":"Doctor/Team Name","pf_details_line2_icon":"fa-clipboard","pf_details_line2_title":"Skills","pf_details_line3_icon":"fa-map-marker","pf_details_line3_title":"Location","pf_details_line4_icon":"fa-adjust","pf_details_line4_title":"","pf_details_line5_icon":"","pf_details_line5_title":"","pf_details_cat_icon":"fa-align-justify","pf_details_cat_title":"Category","pf_single_social_share":{"facebook":"1","twitter":"1","gplus":"1","pinterest":"1","linkedin":"1","stumbleupon":"1","tumblr":"1","reddit":"1","digg":"1"},"pfcat_column":"three","pfcat_show":"9","error404_big_icon":"","error404_big_text":"404 ERROR","error404_medium_text":"This file may have been moved or deleted. Be sure to check your spelling.","error404_search":"1","searchnoresult":"<div class=\"thememount-big-icon\"><i class=\"fa fa-search\"></i></div><h4>No results were found for your search</h4></br>You may try the search with another query.<br><br><br>","sidebar_page":"right","sidebar_blog":"right","sidebar_search":"left","sidebar_woocommerce":"right","sidebar_bbpress":"right","sidebar_events":"no","twitter":"#","youtube":"#","flickr":"","facebook":"#","linkedin":"#","googleplus":"","yelp":"","dribbble":"","pinterest":"","podcast":"","instagram":"","xing":"","vimeo":"","vk":"","houzz":"","issuu":"","google-drive":"","tripadvisor":"","stumbleupon":"","delicious":"","tumblr":"","odnoklassniki":"","rss":"1","wc-header-icon":"1","woocommerce-column":"3","woocommerce-product-per-page":"9","wc-single-show-related":"1","wc-single-related-column":"3","wc-single-related-count":"3","uconstruction":"0","uconstruction_html":"<html>\r\n<head>\r\n<title>[site-title] - Under Construction</title>\r\n</head>\r\n<body>\r\n<center>\r\n<br><br><br>\r\n<div>[tm-logo]</div>\r\n<br><br>\r\n<h3 style=\"font-family: Verdana; font-weight: normal;\">This website is under construction. please visit after some time.</h3>\r\n</center>\r\n</body>\r\n</html>","uconstruction_background":{"background-color":"#ffffff","background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center center","background-image":"' . get_template_directory_uri() . '/images/titlebar_image_adv.jpg","media":{"id":"","height":"800","width":"1200","thumbnail":""}},"team_type_title":"Team Members","team_type_slug":"team-members","team_group_title":"Team Group","team_group_slug":"team-group","team_type_archive_title":"Team Members","pf_type_title":"Portfolio","pf_type_slug":"portfolio","pf_cat_title":"Portfolio Category","pf_cat_slug":"portfolio-category","dynamic-style-position":"external","dynamic-file-type":"php","minify-css-js":"1","img-portfolio-two-column":{"width":"855","height":"570","crop":"yes"},"img-portfolio-three-column":{"width":"740","height":"493","crop":"yes"},"img-portfolio-four-column":{"width":"767","height":"511","crop":"yes"},"img-blog-two-column":{"width":"1110","height":"601","crop":"yes"},"img-blog-three-column":{"width":"720","height":"390","crop":"yes"},"img-blog-four-column":{"width":"780","height":"423","crop":"yes"},"img-team-two-column":{"width":"1110","height":"624","crop":"yes"},"img-team-three-column":{"width":"720","height":"406","crop":"yes"},"img-team-four-column":{"width":"750","height":"422","crop":"yes"},"img-blog-single":{"width":"750","height":"406","crop":"yes"},"hide_generator_meta_tag":"0","enable_adv_vc_options":"0","show_no_image":{"blog":"","portfolio":""},"custom_css_code":"","custom_js_code":"","customhtml_head":"<link href=\"https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,400italic,300,700,700italic&subset=latin,greek,cyrillic-ext,latin-ext,cyrillic,vietnamese\" rel=\"stylesheet\" type=\"text/css\">\r\n\t\t\t<link href=\"https://fonts.googleapis.com/css?family=Lora&subset=latin,latin-ext,cyrillic\" rel=\"stylesheet\" type=\"text/css\">","customhtml_bodystart":"","customhtml_bodyend":"","login_custom_css_code":"","custom_css_code_top":"@import url(https://fonts.googleapis.com/css?family=Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic);","redux-backup":1}';

		/* Redux options default values */
		/**** value end here *****/


		if (!empty($id)) {
			$default_array = json_decode($default_values, true);

			if (isset($default_array[$id])) {
				$return = $default_array[$id];
			}
		}

		return $return;
	}
}

include_once dirname(__FILE__) . '/class-wakil-setting-page.php';

/**
 *  Redux Vendor Support
 *
 * This plugin (or extension) acts as a backup and/or replacement for the CDN based files for Select2 and ACE Editor used within Redux Framework.
 *
 */
$args['use_cdn'] = false;  // Disabling external CDN
include_once get_template_directory() . '/inc/redux-framework/redux-vendor-support/redux-vendor-support.php';

/**
 * wakil_Admin_Settings_General.
 */
class wakil_Settings_General extends wakil_Settings_Page
{

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		$this->id = 'general';
		$this->label = esc_html__('General', 'wakil');

		parent::__construct();
	}

	/**
	 * Get settings or the default section.
	 *
	 * @return array
	 */
	protected function get_settings_for_default_section()
	{

		$settings =
		array(
			array(
				'title' => esc_html__('General', 'wakil'),
				'type' => 'title',
				'desc' => wp_kses_post('', 'wakil'),
				'id' => 'wakil_page_settings',
				'desc_tip' => false,
			),

			array(
				'title'    => esc_html__( 'Maintenance Mode', 'wakil' ),
				'desc'     => esc_html__( 'Select Maintenance Mode', 'wakil' ),
				'id'       => 'wakil_maintenance_mode',
				'unable'   => esc_html__('ON', 'wakil'),
				'disable'   => esc_html__('OFF', 'wakil'),
				'default'  => esc_html__('disable', 'wakil'),
				'type'     => 'switchbox',
				'class'    => 'back_animation_select',
			),

			array(
				'title' => esc_html__('Header Sidebar Heading', 'wakil'),
				'desc' => esc_html__('', 'wakil'),
				'id' => 'wakil_header_sidebar_title',
				'default' => esc_html__("Get In Touch"),
				'desc_tip' => true,
				'type' => 'text',
			),

			array(
				'title' => esc_html__('home page Header Sidebar Image', 'wakil'),
				'desc' => esc_html__('', 'wakil'),
				'id' => 'wakil_header_sidebar_image',
				'desc_tip' => true,
				'type' => 'file',
				'default' => esc_url(get_template_directory_uri() . '/assets/images/header/Logo.png'),
			),

			array(
				'title' => esc_html__('Header 2 Sidebar Image', 'wakil'),
				'desc' => esc_html__('', 'wakil'),
				'id' => 'wakil_header_2_sidebar_image',
				'desc_tip' => true,
				'type' => 'file',
				'default' => esc_url(get_template_directory_uri() . '/assets/images/header/Logo.png'),
			),


			array(
				'title' => esc_html__('Video', 'wakil'),
				'desc' => esc_html__('', 'wakil'),
				'id' => 'video_play',
				'desc_tip' => true,
				'type' => 'file',
				'default' => esc_url('https://www.youtube.com/embed/rFygb2YoQ0A?si=aq0hJDXfHqMgbP4E'),
			),


			// Layout 1 Options
			array(
				'title' => esc_html__('Background Overlay', 'wakil'),
				'id' => 'coming_soon_layout_bg_color',
				'type' => 'color',
				'default' => '#000000',
				'class' => 'wakil-bg-color',
				'desc_tip' => true,
			),

			array(
				'title' => esc_html__('header Button text', 'wakil'),
				'id' => 'header_btn_text',
				'type' => 'text',
				'default' => 'Free Consultation',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'title' => esc_html__('Top header contact text', 'wakil'),
				'id' => 'header_btn_contact_text',
				'type' => 'text',
				'default' => '+1 234 567 8899',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'title' => esc_html__('Top header contact link', 'wakil'),
				'id' => 'header_btn_contact_link',
				'type' => 'text',
				'default' => 'tel:234 567 8899',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),
			array(
				'title' => esc_html__('Top header center text link', 'wakil'),
				'id' => 'header_btn_center_text_link',
				'type' => 'text',
				'default' => 'https://localhost/wakil/case/',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'title' => esc_html__('Top header email text', 'wakil'),
				'id' => 'header_btn_email_text',
				'type' => 'text',
				'default' => 'hello@wakil.com',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'title' => esc_html__('Top header email link', 'wakil'),
				'id' => 'header_btn_email_link',
				'type' => 'text',
				'default' => 'hello@wakil.com',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'type' => 'sectionend',
				'id'   => 'wakil_service_page',
			),

			array(
				'title' => esc_html__('404 page ', 'wakil'),
				'type'  => 'title',
				'id'    => 'wakil_weekend_mode',
			),


			array(
				'title' => esc_html__('Background image', 'wakil'),
				'desc' => esc_html__('', 'wakil'),
				'id' => 'error_bg_img',
				'desc_tip' => true,
				'type' => 'file',
				'default' => esc_url(get_template_directory_uri() . '/assets/images/banner/error.jpg'),
			),


			array(
				'title' => esc_html__('404 heading text', 'wakil'),
				'id' => 'error_text',
				'type' => 'text',
				'default' => '404 Error',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'title' => esc_html__('contain heading text', 'wakil'),
				'id' => 'error_inner_text',
				'type' => 'text',
				'default' => 'Page Not Found',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'title' => esc_html__('Error Illustration image', 'wakil'),
				'desc' => esc_html__('', 'wakil'),
				'id' => 'error_Illustration_img',
				'desc_tip' => true,
				'type' => 'file',
				'default' => esc_url(get_template_directory_uri() . '/assets/images/banner/Error_Illustration.png'),
			),

			array(
				'title' => esc_html__('404 page button', 'wakil'),
				'id' => 'error_btn_text',
				'type' => 'text',
				'default' => 'Back To Home',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'type' => 'sectionend',
				'id'   => 'wakil_service_page',
			),

			array(
				'title' => esc_html__('Attorneys page ', 'wakil'),
				'type'  => 'title',
				'id'    => 'wakil_weekend_mode',
			),

			array(
				'title' => esc_html__('Background image', 'wakil'),
				'desc' => esc_html__('', 'wakil'),
				'id' => 'attorneys_bg_img',
				'desc_tip' => true,
				'type' => 'file',
				'default' => esc_url(get_template_directory_uri() . '/assets/images/attorneys/attorneys_bg.png'),
			),

			array(
				'title' => esc_html__('Attorneys', 'wakil'),
				'sub_desc' => esc_html__( 'Select Attorneys Style', 'wakil' ),
				'desc' => '',
				'id' => 'attorneys_style',
				'type' => 'select',
				'class' => 'sub-content',
				'desc_tip' => true,
				'options' => flacio_get_attorneys(),
				'default' => '32'
			),

			array(
				'type' => 'sectionend',
				'id'   => 'wakil_service_page',
			),

			array(
				'title' => esc_html__('Testimonial page ', 'wakil'),
				'type'  => 'title',
				'id'    => 'wakil_weekend_mode',
			),

			array(
				'title' => esc_html__('Background image', 'wakil'),
				'desc' => esc_html__('', 'wakil'),
				'id' => 'testimonial_bg_img',
				'desc_tip' => true,
				'type' => 'file',
				'default' => esc_url(get_template_directory_uri() . '/assets/images/testimonial/header_testimonial.png'),
			),

			array(
				'title' => esc_html__('Testimonial per page', 'wakil'),
				'id' => 'testimonial_number',
				'type' => 'number',
				'default' => '2',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'title' => esc_html__('Testimonial load per page', 'wakil'),
				'id' => 'testimonial_Load_number',
				'type' => 'number',
				'default' => '2',
				'class' => 'wakil-btn-text',
				'desc_tip' => true,
			),

			array(
				'title' => esc_html__('Select Testimonial Layout', 'wakil'),
				'type' => 'select',
				'id' => 'testimonial_layout',
				'options' => array(
					'Layout1' => __( 'Testimonial Layout 1', 'wakil' ),
					'Layout2' => __( 'Testimonial Layout 2', 'wakil' ),
				),
				'default' => 'Layout2',
				'desc_tip' => true,
			),
		);

return apply_filters('wakil_general_settings', $settings);
}
}

return new wakil_Settings_General();
