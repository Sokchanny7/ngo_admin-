<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ngo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ngomodel');
        $this->load->model('categorymodel');
        $this->load->model('ngodetailmodel');
        $this->load->helper(array('form', 'url'));
    }

    function getngoList() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        //$m_id = $this->uri->segment(4);
        //if($m_id){

        $data = $this->ngomodel->getngosjoincat();
        //}else{
        // $data = $this->major_model->get(NULL, NULL,NULL);
        //}
        $d = $data->result();
        $json_data = json_encode($d);
        echo $json_data;
    }

    public function index() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $data['categroy'] = $this->categorymodel->getcategory();
        $this->load->view("header-page");
        $this->load->view("footer-page");
        $this->load->view("ngo-page", $data);
    }

    function insert() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $c_id = $_POST['cat_id'];
        $n_en = $_POST['name_en'];
        $n_kh = $_POST['name_kh'];
        $n_sh = $_POST['name_short'];
        $logo = $_POST['logo'];
        $data = array();
        $data = array('cat_id' => $c_id, 'name_en' => $n_en, 'name_kh' => $n_kh,
            'name_short' => $n_sh, 'logo' => $logo);
        $ngo_id = $this->ngomodel->insert($data);

        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $address = $_POST['address'];
        $des = $_POST['description'];
        $map = $_POST['map'];
        $data = array(
            'ngo_id' => $ngo_id,
            'phone' => $phone,
            'email' => $email,
            'website' => $website,
            'address' => $address,
            'description' => $des,
            'map' => $map
        );
        $this->ngodetailmodel->insert($data);
        $data = array('ngo' => $this->ngomodel->count($c_id));
        $this->categorymodel->updatengo($data, $c_id);
        redirect(base_url() . 'index.php/ngo', 'refresh');
    }

    function delete() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $key = $_GET['ngo_id'];
        $cat_id = $_GET['cat_id'];
        $this->ngomodel->delete($key);                
        $data = array('ngo' => $this->ngomodel->count($cat_id));
        $this->categorymodel->updatengo($data, $cat_id);        
        redirect(base_url() . 'index.php/ngo', 'refresh');
    }

    function edit() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $ngo_id = $_POST['ngo_id_e'];
        $c_id = $_POST['cat_id_e'];
        $n_en = $_POST['name_en_e'];
        $n_kh = $_POST['name_kh_e'];
        $n_sh = $_POST['name_short_e'];
        $logo = $_POST['logo_e'];

        $data = array(
            'cat_id' => $c_id,
            'name_en' => $n_en,
            'name_kh' => $n_kh,
            'name_short' => $n_sh,
            'logo' => $logo
        );
        $this->ngomodel->edit($data, $ngo_id);

        $phone = $_POST['phone_e'];
        $email = $_POST['email_e'];
        $website = $_POST['website_e'];
        $address = $_POST['address_e'];
        $des = $_POST['description_e'];
        $map = $_POST['map_e'];
        $data = array(
            'description' => $des,
            'phone' => $phone,
            'email' => $email,
            'website' => $website,
            'address' => $address,
            'map' => $map
        );
        $this->ngodetailmodel->edit($data, $ngo_id);
        $data = array('ngo' => $this->ngomodel->count($c_id));
        $this->categorymodel->updatengo($data, $c_id);
        redirect(base_url() . 'index.php/ngo', 'refresh');
    }

    function like() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $match = $this->uri->segment(3);
        $data = $this->ngomodel->like($match);
        $d = $data->result();
        $json_data = json_encode($d);
        echo $json_data;
    }

    function fetchngobycat_id() {
        $cat_id = $this->uri->segment(3);
        $data = $this->ngomodel->getbycat_id($cat_id);
        echo json_encode($data->result_array());
    }

}
