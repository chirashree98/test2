<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_master_model extends CI_Model{
    public function dynamic_get($select = array(),$tablename = '',$data = array(),$oder_by = '',$order=''){
        $res = $this->db->select($select)
                ->from($tablename)
                ->order_by($oder_by,$order)
                ->where($data)
                ->get();
        return $res->result_array();
    }
    public function dynamic_insert($table = '',$data=array()){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function dynamic_update($table = '',$con = array(),$data = array()){
        $this->db->where($con);
        $this->db->update($table,$data);
        return $this->db->affected_rows();
    }
    public function dynamic_delete($table = '',$con = array()){
        $this -> db -> where($con);
        $this -> db -> delete($table);
        return $this->db->affected_rows();
    }
    public function check_expired_deals($current_dt = ''){
        $this->db->select(array('id'));
        $this->db->where('expired_date <',$current_dt);
        $this->db->where(array('status'=>0,'sent_status'=>0));
        $qwer = $this->db->get('daily_deals');
        return $qwer->result_array();
    }
    public function send_expired_deals($count = '',$subject = ''){
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('info@workb4live.com', 'Benasmart');
        $this->email->to('jntgsh@gmail.com'); 
        $this->email->subject($subject);
        $this->email->message('You have '.$count.' Expired Daily Deals. Please log into Admin Panel and remove the Deals.');
        $this->email->send();
        return 1;
    }
    public function check_pre_expired_deals($current_dt = ''){
        $this->db->select(array('id'));
        $this->db->where('expired_date <',$current_dt);
        $this->db->where(array('status'=>0,'sent_status'=>0));
        $qwer = $this->db->get('daily_deals');
        return $qwer->result_array();
    }
    public function get_all_category_list($con = array()){
        $this->db->select('user_sub_role.*,user_role_master.name as role_name');	
        $this->db->from('user_sub_role');
        $this->db->join('user_role_master','user_sub_role.usertype_id = user_role_master.id','left');
        $this->db->where($con);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_product_list(){
        $this->db->select('product_detail.id as id,product_detail.name as product_name,product_detail.status as status,user_detail.name as supp_name,brand_master.name as brand_name');	
        $this->db->from('product_detail');
        $this->db->join('user_detail','user_detail.id = product_detail.supplier_id','left');
        $this->db->join('brand_master','brand_master.id = product_detail.brand_id','left');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_users_skill($professional_id = ''){
        $this->db->select('users_skill.skill as skill');	
        $this->db->from('users_skill');
        $this->db->join('skills','users_skill.skill = skills.id','left');
        $this->db->where(array('skills.skill_for'=>'professional','skills.status'=>'1','users_skill.user_id'=>$professional_id));
        $query = $this->db->get();
        $skill_list = $query->result_array();
        $skill_arr = array();
        foreach($skill_list as $val){
            $skill_arr[] = $val['skill'];
        }
        return $skill_arr;
    }
    public function get_users_requested_skill($professional_id = ''){
        $this->db->select('users_skill.skill as id,skills.name as name');	
        $this->db->from('users_skill');
        $this->db->join('skills','users_skill.skill = skills.id','left');
        $this->db->where(array('skills.skill_for'=>'professional','skills.status'=>'2','users_skill.user_id'=>$professional_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_users_requested_skill_array($professional_id = ''){
        $this->db->select('users_skill.skill as id');	
        $this->db->from('users_skill');
        $this->db->join('skills','users_skill.skill = skills.id','left');
        $this->db->where(array('skills.skill_for'=>'professional','skills.status'=>'2','users_skill.user_id'=>$professional_id));
        $query = $this->db->get();
        $skill_list = $query->result_array();
        $skill_arr = array();
        foreach($skill_list as $val){
            $skill_arr[] = $val['id'];
        }
        return $skill_arr;
    }
    public function fetch_ticket_list(){
        $this->db->select('otl.id as id,otl.ticket_no as ticket_no,otl.order_id as order_id,otl.customer_id as customer_id,otl.created_date as created_date,otl.status as status,hpo.professional_id as professional_id');	
        $this->db->from('order_ticket_log otl');
        $this->db->join('hire_professional_order hpo','otl.order_id = hpo.id','left');
        $this->db->where(array('otl.ticket_type'=>0));
        $this->db->order_by('otl.id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>