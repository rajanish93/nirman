<?php
// /wp-content/plugins/ct-wp-admin-form/ct-wp-admin-form.php
/**
 * Plugin Name:       Upsc
 * Description:       Create custom wp-admin forms
 * Version:           1.0.0
 * Text Domain:       ct-admin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
define( 'CT_WP_ADMIN_VERSION_UPSC', '1.0.0' );
define( 'CT_WP_ADMIN_DIR_UPSC', 'ct-wp-admin-form-upsc' );
/**
 * Helpers
 */
require plugin_dir_path( __FILE__ ) . 'includes/helpers.php';
/**
 * The core plugin class
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-toper-wp-admin-form.php';
function run_ct_wp_admin_form_upsc() {
    $plugin = new Ct_Admin_Form_Upsc();
    $plugin->init();
}
run_ct_wp_admin_form_upsc();