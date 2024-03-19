<?php
/*
Plugin Name: Duplicate PP
Description: <strong>Duplicate PP</strong> is a simple plugin which allows you to duplicate any POST,PAGE and CPT Easily. The duplicated POST or PAGE CPT acts as draft.
Author: Zakaria Binsaifullah
Author URI: https://gutenbergkits.com
Version: 3.5.1
Text Domain: duplicate-pp
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:  /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Require Admin Support File
require_once plugin_dir_path(__FILE__) . 'admin/admin.php';

/**
* SDK Integration
*/

if ( ! function_exists( 'dci_plugin_duplicate_pp' ) ) {
    function dci_plugin_duplicate_pp() {
        // Include DCI SDK.
        require_once dirname( __FILE__ ) . '/dci/start.php';

        dci_dynamic_init( array(
            'sdk_version'  => '1.0.0',
            'plugin_title' => 'Duplicate PP',
            'product_id'   => 4,
            'api_endpoint' => 'https://dashboard.gutenbergkits.com/wp-json/dci/v1/data-insights',
            'slug'         => 'your-product-slug',
            'public_key'   => 'pk_n3DWcvdznkO3xdLlV3WWhFVu4EnywrOK',
            'is_premium'   => false,
            'menu'         => array(
                'slug' => 'duplicate-pp',
            ),
        ) );

    }
    add_action( 'plugins_loaded', 'dci_plugin_duplicate_pp' );
}

/**
 * Duplicate Post
 */
function dpp_duplicate_as_draft() {
    global $wpdb;
    if (!(isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'dpp_duplicate_as_draft' == $_REQUEST['action']))) {
        wp_die('No post for duplicating!');
    }

    /*
	 * Nonce verification
	 */
    if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__)))
        return;

    /*
	 * get the original post id
	 */
    $dpp_post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));

    /*
	 * and all the original post data then
	 */
    $dpp_post = get_post($dpp_post_id);

    /*
	 * if you don't want the current user to be the new post author,
	 * then change the next couple of lines to this: $new_post_author = $post->post_author;
	 */
    $dpp_current_user = wp_get_current_user();
    $dpp_new_post_author = $dpp_current_user->ID;

    /*
	 * if post data exists, create the post duplicate
	 */
    if (isset($dpp_post) && $dpp_post != null) {

        /*
		 * new post data array
		 */
        $dpp_args = array(
            'comment_status' => $dpp_post->comment_status,
            'ping_status'    => $dpp_post->ping_status,
            'post_author'    => $dpp_new_post_author,
            'post_content'   => $dpp_post->post_content,
            'post_excerpt'   => $dpp_post->post_excerpt,
            'post_name'      => $dpp_post->post_name,
            'post_parent'    => $dpp_post->post_parent,
            'post_password'  => $dpp_post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $dpp_post->post_title,
            'post_type'      => $dpp_post->post_type,
            'to_ping'        => $dpp_post->to_ping,
            'menu_order'     => $dpp_post->menu_order
        );

        /*
		 * insert the post by wp_insert_post() function
		 */
        $dpp_new_post_id = wp_insert_post($dpp_args);

        /*
		 * get all current post terms and set them to the new post draft
		 */
        $dpp_taxonomies = get_object_taxonomies($dpp_post->post_type); // returns an array of taxonomy names for the post type, e.g., array("category", "post_tag");
        foreach ($dpp_taxonomies as $ddp_taxonomy) {
            $dpp_post_terms = wp_get_object_terms($dpp_post_id, $ddp_taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($dpp_new_post_id, $dpp_post_terms, $ddp_taxonomy, false);
        }

        // Duplicate all post meta
        $dpp_post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$dpp_post_id");
        if (count($dpp_post_meta_infos) != 0) {
            foreach ($dpp_post_meta_infos as $dpp_meta_info) {
                $dpp_meta_key = $dpp_meta_info->meta_key;
                if ($dpp_meta_key == '_wp_old_slug') continue;
                $dpp_meta_value = $dpp_meta_info->meta_value;
                update_post_meta($dpp_new_post_id, $dpp_meta_key, $dpp_meta_value); // Copy the post meta to the new post
            }
        }

        /*
		 * finally, redirect to the edit post screen for the new draft
		 */
        $dpp_all_post_types = get_post_types([], 'names');

        foreach ($dpp_all_post_types as $dpp_key => $dpp_value) {
            $dpp_names[] = $dpp_key;
        }

        $dpp_current_post_type =  get_post_type($dpp_post_id);

        if (is_array($dpp_names) && in_array($dpp_current_post_type, $dpp_names)) {
            wp_redirect(admin_url('edit.php?post_type=' . $dpp_current_post_type));
        }

        exit;
    } else {
        wp_die('Failed. Not Found Post: ' . $dpp_post_id);
    }
}
add_action('admin_action_dpp_duplicate_as_draft', 'dpp_duplicate_as_draft');

/*
 * Add the duplicate link to action list for post_row_actions
 */
function dpp_duplicate_link($actions, $post) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=dpp_duplicate_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate it" rel="permalink">Duplicate</a>';
    }
    return $actions;
}

add_filter('post_row_actions', 'dpp_duplicate_link', 10, 2);

add_filter('page_row_actions', 'dpp_duplicate_link', 10, 2);

/**
 * Admin Bar Duplicate Link
 */
function dpp_admin_bar_duplicate_link($wp_admin_bar) {
    $post_id = get_the_ID();
    if (is_singular()) {
        $dpp_url = wp_nonce_url(site_url() . '/wp-admin/admin.php?action=dpp_duplicate_as_draft&post=' . $post_id, basename(__FILE__), 'duplicate_nonce');
        $args = array(
            'id'    => 'ddp_duplicate_link',
            'title' => __('Duplicate It', 'duplicate-pp'),
            'href'  => $dpp_url,
        );
        $wp_admin_bar->add_node($args);
    }
}
add_action('admin_bar_menu', 'dpp_admin_bar_duplicate_link', 999);

/**
 * Plugin Support Link
 */

function dpp_settings_link($links) {
    $gts_settings = array(
        '<a href="' . esc_url('https://gutenbergkits.com/contact/') . '" target="_blank" style="color: green;">Get Support</a>'
    );
    return array_merge($gts_settings, $links);
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'dpp_settings_link');

/*
* Redirecting
*/
function dpp_user_redirecting($plugin) {
    if (plugin_basename(__FILE__) == $plugin) {
        wp_redirect(admin_url('tools.php?page=duplicate-pp'));
        die();
    }
}
add_action('activated_plugin', 'dpp_user_redirecting');
