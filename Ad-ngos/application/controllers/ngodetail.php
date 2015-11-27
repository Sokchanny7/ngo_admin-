<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ngodetail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ngomodel');
        $this->load->model('categorymodel');
        $this->load->model('ngodetailmodel');
    }

    public function index() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $this->load->view("header-page");
        $this->load->view("footer-page");
        $this->load->view("ngo-detail-page");
    }

    public function getngodtailjson() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $data = $this->ngodetailmodel->getjoin();
        $d = $data->result();
        $json_data = json_encode($d);
        echo $json_data;
    }

    function edit() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $ngo_id = $_POST['ngo_id'];     
        $des = $_POST['description'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $address = $_POST['address'];
        $map = $_POST['map'];
        $data = array(            
            'description' => $des,
            'phone' => $phone,
            'email' => $email,
            'website' => $website,
            'address' => $address,
            'map' => $map
        );
        $this->ngodetailmodel->edit($data, $ngo_id);
        $this->load->view("header-page");
        $this->load->view("footer-page");
        $this->load->view("ngo-detail-page");
    }

    function detail() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $n_ig = $this->uri->segment(3);
        $ngo = $this->ngodetailmodel->getngodetail(array('ngo_id' => $n_ig));
        if ($ngo->row()) {
            $data['ngos'] = $ngo;
            $this->load->view("header-page");
            $this->load->view("footer-page");
            $this->load->view("dlg-ngo-detail", $data);
        }
    }

    function delete() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $key = $this->uri->segment(3);
        $this->ngomodel->delete($key);
        $this->load->view("header-page");
        $this->load->view("footer-page");
        $this->load->view("ngo-detail-page");
    }

    function like() {
        if (!($this->session->userdata('logged_in'))) {
            redirect('login', 'refresh');
            return;
        }
        $match = $this->uri->segment(3);
        $data = $this->ngodetailmodel->like($match);
        $d = $data->result();
        $json_data = json_encode($d);
        echo $json_data;
    }
    function fetchdetailbyngo_id(){
        $ngo_id = $this->uri->segment(3);
        $data = $this->ngodetailmodel->getbyngo_id($ngo_id);
      echo json_encode($data->result_array());
    }
}
