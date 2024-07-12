<?php
$sidebar_image = esc_url(get_option('wakil_header_2_sidebar_image'));
$header_btn_text = get_option('header_btn_text');
$header_btn_contact_text = get_option('header_btn_contact_text');
$header_btn_contact_link = get_option('header_btn_contact_link');
$header_btn_center_link = get_option('header_btn_center_text_link');
$header_btn_email_text = get_option('header_btn_email_text');
$header_btn_email_link = get_option('header_btn_email_link');
?>


<div class="top_header">
    <div class="sub_top_header">
            <a href="tel:<?php  if (!$header_btn_contact_link == '') { echo $header_btn_contact_link; } else { echo '234 567 8899'; } ?>">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/contact-icone.png"> 
               <?php if (!$header_btn_contact_text == '') { echo $header_btn_contact_text; } else { echo '+1 234 567 8899'; } ?>
            </a>
            <p>
                We Are Work Hard Any Case  
                <a href="<?php  if (!$header_btn_center_link == '') { echo $header_btn_center_link; } else { echo 'http://localhost/wakil/case/'; } ?>">
                    Appointment
                </a>
                Now
            </p>

            <a href="tel:<?php  if (!$header_btn_contact_link == '') { echo $header_btn_contact_link; } else { echo '234 567 8899'; } ?>">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home/email-icone.png"> 
               <?php if (!$header_btn_contact_text == '') { echo $header_btn_contact_text; } else { echo '+1 234 567 8899'; } ?>
            </a>

    </div>
</div>
<header class="header header-2" id="header">
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
        <div clas="navbar-btn" id="navbar-btn">
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
        <div class="nav-overlay-panel"></div>
    </nav>
</header>