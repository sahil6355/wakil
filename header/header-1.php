<?php
$sidebar_image = esc_url(get_option('wakil_header_sidebar_image'));
$header_btn_text = get_option('header_btn_text');

?>

<header class="header" id="header">
    <nav class="nav">
        <div class="header-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo $sidebar_image; ?>" alt="Logo">
            </a>
        </div>
        <div class="main-navbar">
            <i class="ri-close-fill"></i>
            <?php wp_nav_menu(
                array('
                theme_location' => 'main-menu',
                    'menu_class ' => 'header_menu',
                )
            ); ?>
        </div>
        <div class="navbar-btn" id="navbar-btn">
            <div class="button-box">
                <a href="#contact" class="button-wrap">
                    <span>
                        <?php
                        if (!$header_btn_text == '') {
                            echo $header_btn_text;
                        } else {
                            echo 'Free Consultation';
                        }
                        ?> <i class="ri-arrow-right-line"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="navbar-dropdown-btn">
            <i class="ri-menu-3-line"></i>
        </div>
        <div class="nav-overlay-panel "></div>
    </nav>
</header>