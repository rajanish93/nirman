<?php
// /wp-content/plugins/ct-wp-admin-form/includes/class-ct-wp-admin-form.php
class Ct_Admin_Form_Upsc
{
    const ID = 'ct-admin-forms-upsc';
    const NONCE_KEY = 'ct_admin';
    public function init()
    {
        add_action('admin_menu', array($this, 'add_menu_page'), 20);
        add_action('admin_post_ct_admin_save_upsc', array($this, 'submit_save'));
        add_action('admin_post_ct_admin_update_upsc', array($this, 'submit_update'));
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
            esc_html__('Add Upsc', 'UPSC'),
            esc_html__('Add Upsc', 'UPSC'),
            'manage_toper',
            $this->get_id(),
            array($this, 'toper_create'),
            'dashicons-admin-page',
            '2'
        );
        add_submenu_page(
            $this->get_id(),
            esc_html__('List Upsc', 'UPSC'),
            esc_html__('List Upsc', 'UPSC'),
            'manage_toper',
            $this->get_id() . '_view1',
            array($this, 'toper_list')
        );

        add_submenu_page(
           '',
            esc_html__('Edit Upsc', 'Edit Toper'),
            esc_html__('Edit Upsc', 'Edit Toper'),
            'manage_toper',
            $this->get_id() . '_edit_upsc',
            array($this, 'edit')
        );
        add_submenu_page(
           '',
            esc_html__('Delete Upsc', 'delete Toper'),
            esc_html__('Delete Upsc', 'delete Toper'),
            'manage_toper',
            $this->get_id() . '_delete_upsc',
            array($this, 'delete')
        );
    }


    public function submit_save()
    {
        global $wpdb;
        global $wp_filesystem;

        $nonce = sanitize_text_field($_POST[$this->get_nonce_key()]);
   
        $action = sanitize_text_field($_POST['action']);
       
        if (!isset($nonce) || !wp_verify_nonce($nonce, $action)) {
        print 'Sorry, your nonce did not verify.';
        exit;
        }

        $table_name = 'wp_upsc_state_link';
        $data['state']=$_REQUEST['state'];
        $data['title']=$_REQUEST['title'];
        $data['link']=$_REQUEST['link'];
        //print_r($data); die;
        $wpdb->insert($table_name, $data);
                
        add_settings_error('ct_msg', 'ct_msg_option', __("Changes saved."), 'success');
        set_transient('settings_errors', get_settings_errors(), 30);
        wp_safe_redirect('admin.php?page=ct-admin-forms-upsc_view1');
        exit();
       
    }
    public function submit_update()
    {
        global $wpdb;
        $nonce = sanitize_text_field($_POST[$this->get_nonce_key()]);
   
        $action = sanitize_text_field($_POST['action']);
       
        if (!isset($nonce) || !wp_verify_nonce($nonce, $action)) {
        print 'Sorry, your nonce did not verify.';
        exit;
        }

        $table_name = 'wp_upsc_state_link';
        $data['state']=$_REQUEST['state'];
        $data['title']=$_REQUEST['title'];
        $data['link']=$_REQUEST['link'];
        $upsc_id    =  $_POST['upsc_id'];
        $where = [ 'id' => $upsc_id ];
        $wpdb->update($table_name, $data,$where);
        
        add_settings_error('ct_msg', 'ct_msg_option', __("Changes saved."), 'success');
        set_transient('settings_errors', get_settings_errors(), 30);
        wp_safe_redirect('admin.php?page=ct-admin-forms-upsc_view1');
        exit();
       
    }

    public function toper_create(){
        include_once( 'views/toper-form.php' );
    }
    public function edit(){
         global $wpdb;
         $upsc_id=$_REQUEST['upsc_id'];
      
         $user_query = "SELECT * FROM wp_upsc_state_link where wp_upsc_state_link.id=$upsc_id";

         // query output_type will be an associative array with ARRAY_A.
         $data = $wpdb->get_results( $user_query, ARRAY_A )[0];
 

         // echo " <pre>";print_r($data); die;
         include_once( 'views/upsc-edit.php' );
    }
    public function toper_list(){
        // render the List Table
        global $wpdb;

        $wpdb_table = $wpdb->prefix . 'UPSC';

        $user_query = "SELECT * FROM wp_upsc_state_link";
        // query output_type will be an associative array with ARRAY_A.
        $data = $wpdb->get_results( $user_query, ARRAY_A );
        // return result array to prepare_items.
     
        include_once( 'views/upsc-list.php' );
    }

    public function delete(){
        //echo 434434; die;
        ob_start();
        global $wpdb;
        $upsc_id=$_REQUEST['upsc_id'];

        $wpdb->delete('wp_upsc_state_link',['id' => $upsc_id]);
       
        add_settings_error('ct_msg', 'ct_msg_option', __("Changes saved."), 'success');
        set_transient('settings_errors', get_settings_errors(), 30);
        wp_safe_redirect('admin.php?page=ct-admin-forms-upsc_view1');
        exit();
        ob_end_flush();
    }
        
    
}