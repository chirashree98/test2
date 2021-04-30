<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Custom_model extends CI_Model {

	public function __construct() {

		parent::__construct();
	}
	
	
        
        public function getAllUserData(){
		$this->db->select('user_detail.*,user_role_master.name as user_role_name');	
		$this->db->from('user_detail');
		$this->db->join('user_role_master','user_detail.role_id = user_role_master.id','left');
                $this->db->where(array('user_role_master.id '=>2));
		$query = $this->db->get();
		return $query->result_array();
	}
        public function getAllProfessionalUserData($role_id = ''){
		$this->db->select('user_detail.*,user_role_master.name as user_role_name');	
		$this->db->from('user_detail');
		$this->db->join('user_role_master','user_detail.role_id = user_role_master.id','left');
                $this->db->where(array('user_role_master.id'=>$role_id));
		$query = $this->db->get();
		return $query->result_array();
	}

	
	
}
//end of class
?>