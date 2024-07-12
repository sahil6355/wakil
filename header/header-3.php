<?php 
/* header 3 */	
$sidebar_image = esc_url(get_option('wakil_header_sidebar_image'));

?>

<div class="header3" id="header3">
	<div class="sub_header3">
		<div class="header-logo">
			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo $sidebar_image; ?>" alt="Logo">
			</a>
		</div>
		<div class="header3_navbar_option">
			<div class="hamburger"><span></span></div>
		</div>
	</div>
	<div class="navigation__background"></div>
	<div class="header3_main_navbar">
		<div class="header3_main-navbar">
			<?php wp_nav_menu(
				array('
					theme_location' => 'main-menu',
					'menu_class ' => 'header_menu',
				)
			); ?>
		</div>
	</div>
</div>