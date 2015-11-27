<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ngodetailmodel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'tblngodetail';
    }

    public function getngodetail($where = NULL) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($where);
        return $this->db->get();
    }

    public function getjoin() {
        $this->db->select('tblngo.ngo_id as ngo_id,tblngo.name_en as ngo_name,tblngo.name_short as ngo_name_short,'
                . 'tblngodetail.phone as phone,tblngodetail.email as email,'
                . 'tblngodetail.website as website,tblngodetail.address as address,'
                . 'tblngo.logo as logo,tblngodetail.description as description,'
                . 'tblngodetail.map as map');
        $this->db->from('tblngo');
        $this->db->join('tblngodetail', 'tblngo.ngo_id = tblngodetail.ngo_id');
        return $this->db->get();
    }
   
    public function delete($key) {
        $this->db->delete($this->table, array('ngo_id' => $key));
    }

    public function edit($data, $key) {
        $this->db->where('ngo_id', $key);
        $this->db->update($this->table, $data);
    }

    public function like($match) {
        $this->db->select('tblngo.ngo_id as ngo_id,tblngo.name_en as ngo_name,tblngo.name_short as ngo_name_short,'
                . 'tblngodetail.phone as phone,tblngodetail.email as email,'
                . 'tblngodetail.website as website,tblngodetail.address as address,'
                . 'tblngo.logo as logo,tblngodetail.description as description,'
                . 'tblngodetail.map as map');
        $this->db->from('tblngo');
        $this->db->join('tblngodetail', 'tblngo.ngo_id = tblngodetail.ngo_id');
        $this->db->like('tblngo.name_en', $match);
        $this->db->or_like('tblngo.name_short', $match);
        $this->db->or_like('tblngodetail.phone', $match);
        return $this->db->get();
    }

    function insert($data) {
        $this->db->insert($this->table, $data);
    }
    function  getbyngo_id($ngo_id){
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
        $this->db->where('tblngo.ngo_id',$ngo_id);
        return $this->db->get();
    }
}
