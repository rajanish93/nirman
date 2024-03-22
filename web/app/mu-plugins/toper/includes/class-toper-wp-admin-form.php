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
        add_action('admin_post_ct_admin_update', array($this, 'submit_update'));
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

        add_submenu_page(
           '',
            esc_html__('List Toper', 'Edit Toper'),
            esc_html__('List Toper', 'Edit Toper'),
            'manage_options',
            $this->get_id() . '_edittoper',
            array($this, 'edit_toper')
        );
        add_submenu_page(
           '',
            esc_html__('List Toper', 'delete Toper'),
            esc_html__('List Toper', 'delete Toper'),
            'manage_options',
            $this->get_id() . '_deletetoper',
            array($this, 'delete_toper')
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

                //echo "filetemp--". $file_tmp; echo "file_name--". $file_name ."</br>";

                if($file_tmp && $file_tmp != "" && $file_name !="") {
                     $uploaddta= wp_upload_bits($file_name, null,file_get_contents($file_tmp) );
                     $toperfiledata['file_path']=$uploaddta['url'];
                }
               
                $toperfiledata['toper_id']=$toperid;
                $toperfiledata['file_name']=$filename;
                $wpdb->insert("wp_toper_file", $toperfiledata);
                   
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
    public function submit_update()
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
        $data['name']=$_POST['topername'];
        $toperid=$_POST['toperid'];
        $where = [ 'id' => $toperid ];
        $wpdb->update($table_name, $data,$where);
        //$toperid = $wpdb->insert_id;


        if(isset($_FILES['file'])) {
           // print_r($_FILES['file']); die;
            $i=0;
           foreach($_FILES["file"]["tmp_name"] as $key=>$tmp_name) {
                $whereFile = [ 'id' => $_POST['file_id'][ $i ] ];
                //print_r($whereFile);die;
                $filename=$_REQUEST['filename'][ $i ];                  //file in text field

                $file_name=$_FILES["file"]["name"][$key];               // file name upload file

                $file_tmp=$_FILES["file"]["tmp_name"][$key];
              
                if ($file_tmp && $file_tmp != "") {
                      $uploaddta= wp_upload_bits($file_name, null,file_get_contents($file_tmp) );
                      $toperfiledata['file_path']=$uploaddta['url'];
                      $wpdb->update("wp_toper_file", $toperfiledata, $whereFile);
                }
               
                $toperFileName['file_name']=$filename;
                $wpdb->update("wp_toper_file", $toperFileName, $whereFile);
                   
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
        include_once( 'views/toper-form.php' );
    }
    public function edit_toper(){
        //print_r($_REQUEST); die;
        $toperid=$_REQUEST['toper'];
         global $wpdb;

         $wpdb_table = $wpdb->prefix . 'toper';
         $wpdb_table_file = $wpdb->prefix . 'toper_file';

         $user_query = "SELECT wp_toper.id as toperid,wp_toper.name ,
          wp_toper_file.id file_id, wp_toper_file.toper_id,wp_toper_file.file_name,wp_toper_file.file_path FROM
         wp_toper JOIN wp_toper_file ON wp_toper.id = wp_toper_file.toper_id where wp_toper.id=$toperid";

         // query output_type will be an associative array with ARRAY_A.
         $query_results = $wpdb->get_results( $user_query, ARRAY_A );
         // return result array to prepare_items.
       
         $data=$this->prepare_result($query_results)[0];
         // echo " <pre>";print_r($data); die;
         include_once( 'views/toper-edit.php' );
    }
    public function toper_list(){
        // render the List Table
        global $wpdb;

        $wpdb_table = $wpdb->prefix . 'toper';
        $wpdb_table_file = $wpdb->prefix . 'toper_file';

        $user_query = "SELECT wp_toper.id as toperid,wp_toper.name ,
         wp_toper_file.id file_id,wp_toper_file.toper_id,wp_toper_file.file_name,wp_toper_file.file_path FROM
        wp_toper JOIN wp_toper_file ON wp_toper.id = wp_toper_file.toper_id";

        // query output_type will be an associative array with ARRAY_A.
        $query_results = $wpdb->get_results( $user_query, ARRAY_A );
        // return result array to prepare_items.

        $data=$this->prepare_result($query_results);
     
        include_once( 'views/toper-list.php' );
    }

    public function delete_toper(){
        ob_start();
        global $wpdb;
        $toperId=$_REQUEST['toper'];

        $wpdb->delete($wpdb->prefix .'toper',['id' => $toperId]);
        $wpdb->delete($wpdb->prefix .'toper_file',['toper_id' => $toperId]);

        add_settings_error('ct_msg', 'ct_msg_option', __("Changes saved."), 'success');
        set_transient('settings_errors', get_settings_errors(), 30);
        wp_safe_redirect('admin.php?page=ct-admin-forms_view1');
        exit();
        ob_end_flush();
    }
        
    function prepare_result($data)
    {
      
        $result = [];
        foreach ($data as $record) {
            if (!isset ($result[$record['toperid']])) {
                $result[$record['toperid']] = array(
                    'toperid' => (int) $record['toperid'],
                    'topername' => $record['name'],
                   
                    'file' => array(
                        array(
                            'file_name' => $record['file_name'],
                            'toper_id' => $record['toper_id'],
                            'file_id' => $record['file_id'],
                            'file_path' => $record['file_path']
                        )
                    )
                );
            } else {
                $result[$record['toperid']]['file'][] = array(
                    'file_name' => $record['file_name'],
                    'toper_id' => $record['toper_id'],
                    'file_id' => $record['file_id'],
                    'file_path' => $record['file_path']
                );
            }
        }

        sort($result);

        return $result;
    }
}