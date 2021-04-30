<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Custom_model extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    public function getAllUserData() {
        $this->db->select('user_detail.*,user_role_master.name as user_role_name');
        $this->db->from('user_detail');
        $this->db->join('user_role_master', 'user_detail.role_id = user_role_master.id', 'left');
        $this->db->where(array('user_role_master.id ' => 2));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllProfessionalUserData($role_id = '') {
        $this->db->select('user_detail.*,user_role_master.name as user_role_name');
        $this->db->from('user_detail');
        $this->db->join('user_role_master', 'user_detail.role_id = user_role_master.id', 'left');
        $this->db->where(array('user_role_master.id' => $role_id));
        $this->db->order_by("user_detail.id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRequestSkills() {
        $this->db->select('*');
        $this->db->from('skills');
        $this->db->where_in('status', array('2', '3'));
        $query = $this->db->get();
        return $query;
    }

    public function getSkills($where_clause) {
        $this->db->select('*');
        $this->db->from('skills');
        if (!empty($where_clause)) {
            $this->db->where($where_clause);
        }
        $this->db->where_in('status', array('0', '1'));
        $query = $this->db->get();
        return $query;
    }

}

//end of class
?>