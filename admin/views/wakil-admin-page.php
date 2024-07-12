<?php
/**
 * Admin View: Settings
 *
 * @package Brahma
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$tab_exists  = isset( $tabs[ $current_tab ] ) || has_action( 'wakil_sections_' . $current_tab ) || has_action( 'wakil_settings_' . $current_tab ) || has_action( 'wakil_settings_tabs_' . $current_tab );
$current_tab_label = isset( $tabs[ $current_tab ] ) ? $tabs[ $current_tab ] : '';
?>
<div class="wrap wakil">
    <?php do_action( 'wakil_before_settings_' . $current_tab ); ?>
    <form
    method="<?php echo esc_attr( apply_filters( 'wakil_settings_form_method_tab_' . $current_tab, 'post' ), 'wakil' ); ?>"
    id="mainwakilform" action="" enctype="multipart/form-data">
    <div class="wakil_admin_top_header">
        <div class="wakil_logo_admin">
            <img src="<?php echo get_template_directory_uri(); ?>/admin/assets/images/wakil-logo.png"
            alt="wakil logo">
        </div>
        <div class="submit wakil_admin_submit">
            <?php if ( empty( $GLOBALS['hide_save_button'] ) ) : ?>
                <button name="save" class="button-primary wakil-save-button" type="submit"
                value="<?php echo esc_attr( 'Save changes', 'wakil' ); ?>"><?php echo esc_html__( 'Save changes', 'wakil' ); ?></button>
            <?php endif; ?>
            <?php wp_nonce_field( 'wakil-settings' ); ?>
        </div>
    </div>
    <div class="wakil_admin_nav">
        <nav class="nav-tab-wrapper wakil-nav-tab-wrapper">

            <ul class="wakil-nav-tab-list">
                <?php
                foreach ( $tabs as $slug => $label ) {
                    echo '<li class="wakil-nav-tab' . ( $current_tab === $slug ? ' wakil-nav-tab-active' : '' ) .'"><a href="' . esc_url( admin_url( 'admin.php?page=main-wakil&tab=' . esc_attr( $slug ) ), 'wakil' ) . '">' . esc_html__( $label, 'wakil' ) . '</a></li>';
                } ?>
            </ul>
            <?php do_action( 'wakil_settings_tabs' );

            ?>
        </nav>
        <div class="wakil-settings-content">

            <div class="wakil_settings_content_in">
                <h1 class="screen-reader-text"><?php echo esc_html__( $current_tab_label , 'wakil'); ?></h1>
                <?php
                
                do_action( 'wakil_sections_' . $current_tab );

                self::show_messages();
                do_action( 'wakil_settings_' . $current_tab );
					do_action( 'wakil_settings_tabs_' . $current_tab ); // @deprecated 3.4.0 hook.
					?>
                </div>
            </div>
        </div>



    </form>
    <?php do_action( 'wakil_after_settings_' . $current_tab ); ?>
</div>