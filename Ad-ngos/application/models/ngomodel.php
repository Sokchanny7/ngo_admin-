<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ngomodel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'tblngo';
        $this->load->model('ngodetailmodel');
    }

    public function getngos() {
        return $this->db->get('tblngo');
    }

    public function getbycat_id($cat_id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('cat_id', $cat_id);
        return $this->db->get();
    }

    public function getngosjoincat() {
        $this->db->select(
                'tblngo.ngo_id as ngo_id,'
                . 'tblngo.name_short as ngo_name_short,'
                . 'tblngo.cat_id as cat_id,'
                . 'tblcategory.name_en as cat_name,'
                . 'tblngo.name_en as name_en,'
                . 'tblngo.name_kh as name_kh,'
                . 'tblngo.name_short as name_short,'
                . 'tblngodetail.phone as phone,'
                . 'tblngodetail.email as email,'
                . 'tblngodetail.website as website,'
                . 'tblngodetail.address as address,'
                . 'tblngo.logo as logo,'
                . 'tblngodetail.description as description,'
                . 'tblngodetail.map as map');
        $this->db->from('tblcategory');
        $this->db->join('tblngo', 'tblcategory.cat_id = tblngo.cat_id');
        $this->db->join('tblngodetail', 'tblngodetail.ngo_id=tblngo.ngo_id');
        return $this->db->get();
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($key) {
        $this->db->delete($this->table, array('ngo_id' => $key));
        $this->ngodetailmodel->delete($key);
    }

    public function edit($data, $key) {
        $this->db->where('ngo_id', $key);
        $this->db->update($this->table, $data);
    }

    public function like($match) {
        $this->db->select(
                'tblngo.ngo_id as ngo_id,'
                . 'tblngo.name_short as ngo_name_short,'
                . 'tblngo.cat_id as cat_id,'
                . 'tblcategory.name_en as cat_name,'
                . 'tblngo.name_en as name_en,'
                . 'tblngo.name_kh as name_kh,'
                . 'tblngo.name_short as name_short,'
                . 'tblngodetail.phone as phone,'
                . 'tblngodetail.email as email,'
                . 'tblngodetail.website as website,'
                . 'tblngodetail.address as address,'
                . 'tblngo.logo as logo,'
                . 'tblngodetail.description as description,'
                . 'tblngodetail.map as map');
        $this->db->from('tblcategory');
        $this->db->join('tblngo', 'tblcategory.cat_id = tblngo.cat_id');
        $this->db->join('tblngodetail', 'tblngodetail.ngo_id = tblngo.ngo_id');
        $this->db->like('tblngo.name_en', $match);
        $this->db->or_like('tblcategory.name_en', $match);
        $this->db->or_like('tblcategory.name_kh', $match);
        $this->db->or_like('tblngo.name_kh', $match);
        $this->db->or_like('tblngo.name_en', $match);
        $this->db->or_like('tblngo.name_kh', $match);
        $this->db->or_like('tblngo.name_short', $match);
        $this->db->or_like('tblngodetail.phone', $match);
        return $this->db->get();
    }

    public function count($key) {
        $this->db->select('cat_id as c');
        $this->db->from($this->table);
        $this->db->where('cat_id', $key);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function cat_id($key) {
        $this->db->select('cat_id as c');
        $this->db->from($this->table);
        $this->db->where('ngo_id', $key);
        $query = $this->db->get();
        return $query->row();
    }

}
