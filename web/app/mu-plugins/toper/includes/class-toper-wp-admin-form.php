<?php
// /wp-content/plugins/ct-wp-admin-form/includes/class-ct-wp-admin-form.php
class Ct_Admin_Form
{
    const ID = 'ct-admin-forms';
    const NONCE_KEY = 'ct_admin';
    public function init()
    {
        add_action('admin_menu', array($this, 'add_menu_page'), 20);
        add_action('admin_post_ct_admin_save', array($this, 'submit_save'));
    }

    public function get_nonce_key()
    {
    return self::NONCE_KEY;
    }
    public function get_whitelisted_keys()
    {
    return self::WHITELISTED_KEYS;
    }
    public function get_id()
    {
        return self::ID;
    }
    public function add_menu_page()
    {
        add_menu_page(
            esc_html__('Add Toper', 'Toper'),
            esc_html__('Add Toper', 'Toper'),
            'manage_options',
            $this->get_id(),
            array($this, 'toper_create'),
            'dashicons-admin-page',
            '2'
        );
        add_submenu_page(
            $this->get_id(),
            esc_html__('List Toper', 'Toper'),
            esc_html__('List Toper', 'Toper'),
            'manage_options',
            $this->get_id() . '_view1',
            array($this, 'toper_list')
        );
    }

    public function submit_save()
    {
        global $wpdb;
        global $wp_filesystem;
        WP_Filesystem();
        $nonce = sanitize_text_field($_POST[$this->get_nonce_key()]);
   
        $action = sanitize_text_field($_POST['action']);
       
        if (!isset($nonce) || !wp_verify_nonce($nonce, $action)) {
        print 'Sorry, your nonce did not verify.';
        exit;
        }
        if (!current_user_can('manage_options')) {
        print 'You can\'t manage options';
        exit;
        }

        $table_name = $wpdb->prefix . 'toper';
        $data['name']=$_REQUEST['topername'];
        $wpdb->insert($table_name, $data);
        $toperid = $wpdb->insert_id;


        if(isset($_FILES['file'])) {
            $i=0;
           foreach($_FILES["file"]["tmp_name"] as $key=>$tmp_name) {
                $filename=$_REQUEST['filename'][ $i ];

                $file_name=$_FILES["file"]["name"][$key];
                $file_tmp=$_FILES["file"]["tmp_name"][$key];
                
                $uploaddta= wp_upload_bits($file_name, null,file_get_contents($file_tmp) );
                if ($uploaddta) {
                    $toperfiledata['toper_id']=$toperid;
                    $toperfiledata['file_path']=$uploaddta['url'];
                    $toperfiledata['file_name']=$filename;
                    $wpdb->insert("wp_toper_file", $toperfiledata);
                   
                } 
                $i++;
                
            }
        }
        /**
        * Loop through form fields keys and update data in DB (wp_options)
        */
        add_settings_error('ct_msg', 'ct_msg_option', __("Changes saved."), 'success');
        set_transient('settings_errors', get_settings_errors(), 30);
        wp_safe_redirect('admin.php?page=ct-admin-forms');
        exit();
       
    }

    public function toper_create(){

        // query, filter, and sort the data
       // $this->classified_list_table->prepare_items();

        // render the List Table
        include_once( 'views/toper-form.php' );
    }
    public function toper_list(){
        // query, filter, and sort the data
       // $this->classified_list_table->prepare_items();
        // render the List Table
        include_once( 'views/toper-list.php' );
    }
}