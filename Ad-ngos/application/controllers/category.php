<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {

    public function index() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $this->load->view("header-page");
        $this->load->view("footer-page");
        $this->load->view("category-page");
    }

    function __construct() {
        parent::__construct();
        $this->load->model('categorymodel');
    }

    function getcategorylist() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $data = $this->categorymodel->getcategory();
        //$d = $data->result();        
        $rows = array();
        foreach ($data->result_array() as $row) {

            $rows[] = $row;
        }
        echo json_encode($rows, JSON_UNESCAPED_UNICODE);
        //ech
        // echo //$json_data;
    }

    function insert() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $n_en = $_GET['name_en'];
        $n_kh = $_GET['name_kh'];
        $logo = $_GET['logo'];
        $data = array('name_en' => $n_en, 'name_kh' => $n_kh, 'logo' => $logo);
        $this->categorymodel->insert($data);
        redirect(base_url() . 'index.php/category', 'refresh');
    }

    function delete() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $key = $_GET['cat_id'];
        $this->categorymodel->delete($key);
        redirect(base_url() . 'index.php/category', 'refresh');
    }

    function edit() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $key = $_GET['cat_id'];
        $n_en = $_GET['name_en'];
        $n_kh = $_GET['name_kh'];
        $logo = $_GET['logo'];
        $data = array(
            'cat_id' => $key,
            'name_en' => $n_en,
            'name_kh' => $n_kh,
            'logo' => $logo
        );

        $this->categorymodel->edit($data, $key);
        redirect(base_url() . 'index.php/category', 'refresh');
    }

    function like() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $match = $this->uri->segment(3);
        $data = $this->categorymodel->like($match);
        $d = $data->result();
        $json_data = json_encode($d);
        echo $json_data;
    }

    public function fetchcategory() {
        $data = $this->categorymodel->getcategory();
        //$d = $data->result();        
        $rows; // = array();
        foreach ($data->result_array() as $row) {
            $rows[] = $row;
        }
        
        echo json_encode($data->result_array(), JSON_UNESCAPED_UNICODE);

        //ech
        // echo //$json_data;
    }    
}
