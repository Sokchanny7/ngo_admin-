<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loginmodel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'tbluser';
    }

    public function login($where) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
