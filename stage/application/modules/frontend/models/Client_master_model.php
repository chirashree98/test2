<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client_master_model extends CI_Model{
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
    public function professional_login_chk($select = array(),$data = array()){
        $this->db->select($select);
        $this->db->from('user_detail');
        $this->db->group_start();
        $this->db->where('email',$data['email'])->or_where('mobile_no',$data['email']);
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('role_id',3)->or_where('role_id',4);
        $this->db->group_end();
        $this->db->where(array('password'=>$data['password'],'status'=>0));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_professional_details($user_id = ''){
        $this->db->select('user_prof_det.*,country_list.name as country_name,state_list.name as state_name,city_list.name as city_name,user_sub_role.name as role_name');	
        $this->db->from('user_prof_det');
        $this->db->join('country_list','user_prof_det.country_id = country_list.id','left');
        $this->db->join('state_list','user_prof_det.state_id = state_list.id','left');
        $this->db->join('city_list','user_prof_det.city_id = city_list.id','left');
        $this->db->join('user_sub_role','user_prof_det.work_field = user_sub_role.id','left');
        $this->db->where(array('user_prof_det.userid '=>$user_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function verification_mail($email_id = '',$reg_id = ''){
        $from = get_sending_mail_id();
        $message = '<b> Please verify your Email id </b> by <a href="'.base_url('professional-mail-verify/').smart_encode($reg_id).'">click here</a>';
        $subject = 'Verify Email';
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($from, 'Benasmart');
        $this->email->to($email_id); 
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        return 1;
    }
    public function get_customer_existense($email = ''){
        $this->db->select('id');
        $this->db->from('user_detail');
        $this->db->group_start();
        $this->db->where('email',$email)->or_where('mobile_no',$email);
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_customer_status_name($select = array(),$email = ''){
        $this->db->select($select);
        $this->db->from('user_detail');
        $this->db->group_start();
        $this->db->where('email',$email)->or_where('mobile_no',$email);
        $this->db->group_end();
        $this->db->where(array('status'=>0));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function sent_mail_with_template($type,$data){
        //$toemail = "jntgsh@gmail.com";
        $toemail = $data['email'];
        $fromemail = get_sending_mail_id();
        if($type == 'otp'){
            $message = $this->load->view('mail_template/otp', $data,  TRUE);
        }
        //echo $message;die;
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->from($fromemail, 'Benasmart');
        $this->email->to($toemail);
        $this->email->subject($data['subject']);
        $this->email->message($message);
        return $this->email->send();
        
    }
}
?>