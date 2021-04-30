<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Custom_model extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    public function getProfessionals($data) {
        $limit = isset($data['limit']) ? $data['limit'] : '10';
        $start = isset($data['start']) ? $data['start'] : '0';
//print_r($data);
        $this->db->select('*,smart_user_detail.id as p_user_id');
        $this->db->join('smart_user_prof_det', 'smart_user_detail.id = smart_user_prof_det.userid');
        $this->db->join('smart_professional_about_us', 'smart_user_detail.id = smart_professional_about_us.user_id');
        if (isset($data['cat_slug']) && !empty($data['cat_slug'])) {
            $this->db->join('smart_user_sub_role', 'smart_user_prof_det.work_field = smart_user_sub_role.id');
            $this->db->where("smart_user_sub_role.slug", $data['cat_slug']);
        }
        if (isset($data['sub_cat_slug']) && !empty($data['sub_cat_slug'])) {
            $this->db->join('smart_sub_category', 'smart_user_prof_det.sub_work_field = smart_sub_category.id');
            $this->db->where("smart_sub_category.slug", $data['sub_cat_slug']);
        }
        $this->db->where("smart_user_detail.role_id", '3');
        $this->db->limit($limit, $start);
        $query = $this->db->get('smart_user_detail');
//        echo $this->db->last_query();
        return count($query->result()) > 0 ? $query->result() : array();
    }

    public function getCountProfessionals($data) {
        $this->db->select('*,smart_user_detail.id as p_user_id');
        $this->db->join('smart_user_prof_det', 'smart_user_detail.id = smart_user_prof_det.userid');
        $this->db->join('smart_professional_about_us', 'smart_user_detail.id = smart_professional_about_us.user_id');
        if (isset($data['cat_slug']) && !empty($data['cat_slug'])) {
            $this->db->join('smart_user_sub_role', 'smart_user_prof_det.work_field = smart_user_sub_role.id');
            $this->db->where("smart_user_sub_role.slug", $data['cat_slug']);
        }
        if (isset($data['sub_cat_slug']) && !empty($data['sub_cat_slug'])) {
            $this->db->join('smart_sub_category', 'smart_user_prof_det.sub_work_field = smart_sub_category.id');
            $this->db->where("smart_sub_category.slug", $data['sub_cat_slug']);
        }
        $this->db->where("smart_user_detail.role_id", '3');
        $query = $this->db->get('smart_user_detail');
        return $query->num_rows();
    }

    public function getProfessionalDetails($data) {

        $this->db->select('*,smart_user_detail.id as p_user_id');
        $this->db->join('smart_user_prof_det', 'smart_user_detail.id = smart_user_prof_det.userid');
//        $this->db->join('smart_professional_about_us', 'smart_user_detail.id = smart_professional_about_us.user_id'); 
        $this->db->where("smart_user_detail.role_id", '3');
        $this->db->where("smart_user_detail.id", smart_decode($data['user_id']));
        $query = $this->db->get('smart_user_detail');
        return count($query->result()) > 0 ? $query->row() : array();
    }

    public function getOngoingProjectsByProfessional($user_id) {
        $this->db->select('*,hire_professional_order.id as order_id');
        $this->db->where("hire_professional_order.professional_id", $user_id);
        $this->db->group_start();
        $this->db->or_where('hire_professional_order.status', '0');
        $this->db->or_where('hire_professional_order.status', '1');
        $this->db->group_end();
        $query = $this->db->get('hire_professional_order');
        return $query;
    }
    public function getPastProjectsByProfessional($user_id) {
        $this->db->select('*,hire_professional_order.id as order_id');
        $this->db->where("hire_professional_order.professional_id", $user_id);
        $this->db->group_start();
        $this->db->or_where('hire_professional_order.status', '2');
        $this->db->or_where('hire_professional_order.status', '3');
        $this->db->group_end();
        $query = $this->db->get('hire_professional_order');
        return $query;
    }

}

//end of class
?>