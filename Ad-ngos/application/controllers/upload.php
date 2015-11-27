<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categorymodel');
    }

    function do_upload() {
        $path = $_POST['path'];
        $view = $_POST['view'];
        $error = [];
        if ($view == 'ngo-page') {
            $error['categroy'] = $this->categorymodel->getcategory();
        }
        $config['upload_path'] = './' . $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = FALSE;
        $config['overwrite'] = TRUE;
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error['error'] = $this->upload->display_errors();
            redirect(base_url() . 'index.php/ngo', $error);
        } else {
            redirect(base_url() . 'index.php/ngo', 'refresh');
        }
    }

}

?>