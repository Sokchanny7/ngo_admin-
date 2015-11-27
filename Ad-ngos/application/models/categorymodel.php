<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorymodel extends CI_Model {

    function __construct() {
        parent::__construct();        
        $this->table = 'tblcategory';
    }

    public function getcategory() {
        return $this->db->get($this->table);
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
    }

    public function delete($key) {
        $this->db->delete($this->table, array('cat_id' => $key));
    }

    public function edit($data, $key) {
        $this->db->where('cat_id', $key);
        $this->db->update($this->table, $data);
    }
    public function updatengo($data, $key) {
        $this->db->where('cat_id', $key);
        $this->db->update($this->table, $data);
    }

    public function like($match) {
        $this->db->like('name_en', $match);
        $this->db->or_like('name_kh', $match);
        return $this->db->get($this->table);
    }

}
