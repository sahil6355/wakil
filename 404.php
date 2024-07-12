<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php get_header(); ?>
<?php
$error_image =  esc_url(get_option('error_bg_img'));
$error_text =  get_option('error_text');
$error_text_demo =  get_option('error_inner_text');
$error_Illustration_img =  esc_url(get_option('error_Illustration_img'));
$error_btn_text = get_option('error_btn_text');

?>
<div class="error_page">
    <div class="main_error_page">

        <img src="<?php
                    if ($error_image == '') {
                        echo get_template_directory_uri() . '/assets/images/banner/error.jpg';
                    } else {
                        echo $error_image;
                    }
                    ?>" class="" alt="About Banner">
        <div class="black-overlay"></div>
        <div class="banner-header-content">
            <h1 class="page-title">
                <?php if ($error_text == '') {
                    echo '404 Error';
                } else {
                    echo $error_text;
                } ?>
            </h1>
            <ul class="custome_breadcrumb">
                <li>
                    <a href="<?php echo home_url(); ?>">Home</a>
                </li>
                /
                <li>
                    <span>Pages</span>
                </li>
                /
                <li>
                    <span>404 Error</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="main_error_contain">
    <div class="sub_error_contain">
        <h1><?php
            if ($error_text_demo == '') {
                echo 'Page Not Found';
            } else {
                echo $error_text_demo;
            }
            ?></h1>
        <div class="border">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/home/border_icon.png" alt="border icon" width="36" height="30">
        </div>
        <div class="error_img">
            <img src="<?php
                        if ($error_Illustration_img == '') {
                            echo get_template_directory_uri() . '/assets/images/banner/Error_Illustration.png';
                        } else {
                            echo $error_Illustration_img;
                        }
                        ?>" alt="error Illustration" width="770" height="550">
        </div>
        <p class="error_text">Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>


        <div class="navbar-btn error_btn">
            <div class="button-box">
                <a href="#contact" class="button-wrap">
                    <span>
                        <?php
                        if (!$error_btn_text == '') {
                            echo $error_btn_text;
                        } else {
                            echo 'Back To Home';
                        }
                        ?> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home/right-side-arrow.svg">
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="Consultation p-100">
    <div class="sub_Consultation">
        <div class="sub_left_sub_Consultation custome_color">
            <h2 class="secondary_heading">Get A Free <span>Consultation</span></h2>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
            <div class="contact_form">
                <?php echo do_shortcode('[contact-form-7 id="10721a1" title="Message Form"]'); ?>
            </div>
        </div>
        <div class="sub_right_Consultation custome_color">
            <div class="Helpful_faq">
                <h2 class="secondary_heading">Helpful <span>FAQs</span></h2>
            </div>
            <div class="faq_main_container">
                <div class="faq_container">
                    <div class="faq_question">
                        <div class="faq_question-text">
                            <h3>How do I place an order?</h3>
                        </div>
                        <div class="icon">
                            <div class="icon-shape"></div>
                        </div>
                    </div>
                    <div class="answercont">
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum
                                ipsam odio voluptates ab quae beatae nihil illo alias vitae minima
                                cumque atque, deleniti quos animi nostrum, veritatis quisquam
                                ullam ducimus laboriosam reprehenderit sapiente, quo
                                necessitatibus dolorem. Impedit sed, similique corporis quo totam,
                                veniam consequatur blanditiis, voluptates ipsa eligendi excepturi
                                incidunt facilis ex tempore? Ut vero voluptatum quis doloremque
                                accusantium saepe.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq_container">
                    <div class="faq_question">
                        <div class="faq_question-text">
                            <h3>What payment methods do you accept?</h3>
                        </div>
                        <div class="icon">
                            <div class="icon-shape"></div>
                        </div>
                    </div>
                    <div class="answercont">
                        <div class="answer">
                            <p>
                                We accept a variety of payment methods, including credit/debit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. Choose the option that suits you best during the checkout process.</p>
                        </div>
                    </div>
                </div>
                <div class="faq_container">
                    <div class="faq_question">
                        <div class="faq_question-text">
                            <h3>Can I modify or cancel my order after placing it?</h3>
                        </div>
                        <div class="icon">
                            <div class="icon-shape"></div>
                        </div>
                    </div>
                    <div class="answercont">
                        <div class="answer">
                            <p>
                                Unfortunately, once an order is placed, it cannot be modified or canceled. Please double-check your order before confirming the purchase.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq_container">
                    <div class="faq_question">
                        <div class="faq_question-text">
                            <h3>How can I track my order?</h3>
                        </div>
                        <div class="icon">
                            <div class="icon-shape"></div>
                        </div>
                    </div>
                    <div class="answercont">
                        <div class="answer">
                            <p>
                                Once your order is shipped, you will receive a confirmation email with a tracking number. You can use this number to track the delivery status of your package on our website or the courier's site.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php the_content(); ?>
<?php get_footer(); ?>

