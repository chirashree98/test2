<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web_master_model extends CI_Model{
    public function app_login($post_data){
        $this->db->select(array('id','name','email'));
        $this->db->from('user_detail');
        $this->db->group_start();
        $this->db->where('email', $post_data['username'])->or_where('mobile_no', $post_data['username']);
        $this->db->group_end();
        $this->db->where(array('password'=>base64_encode($post_data['password']),'role_id'=>2,'status'=>0));
        $query = $this->db->get();
        return $query->result_array();
    }
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
    public function sent_mail_with_template($type,$data){
        //$toemail = "jntgsh1@gmail.com";
        $toemail = $data['email'];
        $fromemail = get_sending_mail_id();
        if($type == 'otp'){
            $message = $this->load->view('mail_template/otp', $data,  TRUE);
        }
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->from($fromemail, 'Benasmart');
        $this->email->to($toemail);
        $this->email->subject($data['subject']);
        $this->email->message($message);
        $this->email->send();
        return 1;
    }
}
?>