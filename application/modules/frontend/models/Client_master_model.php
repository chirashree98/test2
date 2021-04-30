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
    public function sent_mail_using_smtp(){
        $to =  'jntgsh@gmail.com';  // User email pass here
        $subject = 'test smtp mail';
        $from = 'jntgsh1@gmail.com';              // Pass here your mail id
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= 'message';  //   Post message available here
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';
        $config['smtp_user']    = '';    //Important
        $config['smtp_pass']    = '';  //Important
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        return $this->email->send();
    }
    public function professional_active_skill($user_id = ''){
        $this->db->select('skills.name');	
        $this->db->from('users_skill');
        $this->db->join('skills','skills.id = users_skill.skill','left');
        $this->db->where(array('users_skill.user_id '=>$user_id,'skills.status'=>1));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function professional_all_skill($user_id = ''){
        $this->db->select('skills.id,skills.name,skills.status');	
        $this->db->from('users_skill');
        $this->db->join('skills','skills.id = users_skill.skill','left');
        $this->db->where(array('users_skill.user_id '=>$user_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function professional_all_skill_rest($user_id = ''){
        $this->db->distinct();
        $this->db->select('skills.id,skills.name,skills.status');	
        $this->db->from('users_skill');
        $this->db->join('skills','skills.id = users_skill.skill','left');
        $this->db->where(array('users_skill.user_id !='=>$user_id,'skills.skill_for '=>'professional'));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function RetriveRecordByWhereWithSelect($select, $table, $where_clause) {
        $this->db->select($select);
        $this->db->from($table);
        if (!empty($where_clause))
            $this->db->where($where_clause);
        $query = $this->db->get();
        return $query;
    }
    public function get_review_count($user_id = ''){
        $qry = $this->db->query("SELECT count(id) AS num_rate,ROUND(AVG(rate),1) as rate FROM smart_professional_review WHERE professional_id = '".$user_id."'");
        return $qry->result_array();
    }
    public function get_review_details($user_id = ''){
        $this->db->select('ud.id,ud.name,upd.address1,upd.address2,cl.name as city_name,sl.name as state_name,cnl.name as country_name,upd.zipcode,pr.rate,pr.remarks,pd.project_name,upd.company_logo,pr.id as review_id');
        $this->db->from('user_detail ud');
        $this->db->join('professional_review pr','pr.professional_id = ud.id','left');
        $this->db->join('user_prof_det upd','ud.id = upd.userid','left');
        $this->db->join('city_list cl','upd.city_id = cl.id','left');
        $this->db->join('state_list sl','upd.state_id = sl.id','left');
        $this->db->join('country_list cnl','upd.country_id = cnl.id','left');
        $this->db->join('project_details pd','pr.project_id = pd.id','left');
        $this->db->where(array('ud.id '=>$user_id));
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
    public function get_customer_details($customer_id = ''){
        $this->db->select('ud.id as customer_id,ud.role_id,ud.email as email,ud.name,ud.password,ud.std_code,ud.mobile_no,upd.address1,upd.address2,country_list.name as country_id,state_list.name as state_id,city_list.name as city_id,upd.zipcode');	
        $this->db->from('user_detail ud');
        $this->db->join('user_prof_det upd','ud.id = upd.userid','left');
        $this->db->join('country_list','upd.country_id = country_list.id','left');
        $this->db->join('state_list','upd.state_id = state_list.id','left');
        $this->db->join('city_list','upd.city_id = city_list.id','left');
        $this->db->where(array('ud.id'=>$customer_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_customer_details2($customer_id = ''){
        $this->db->select('ud.id as customer_id,ud.role_id,ud.email as email,ud.name,ud.password,ud.std_code,ud.mobile_no,upd.address1,upd.address2,country_list.id as country_id,state_list.id as state_id,city_list.id as city_id,upd.zipcode');	
        $this->db->from('user_detail ud');
        $this->db->join('user_prof_det upd','ud.id = upd.userid','left');
        $this->db->join('country_list','upd.country_id = country_list.id','left');
        $this->db->join('state_list','upd.state_id = state_list.id','left');
        $this->db->join('city_list','upd.city_id = city_list.id','left');
        $this->db->where(array('ud.id'=>$customer_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_customer_serice_list($customer_id = ''){
        $this->db->select('hpo.id as order_id,hpo.professional_id,hpo.customer_id,hpo.date,hpo.time,hpo.message,hpo.status,hpo.delete_from_user,hpo.delete_from_professional,pd.project_name as service_name,pd2.fees_project_name as service_type_name');	
        $this->db->from('hire_professional_order hpo');
        $this->db->join('hire_professional_order_serivices_map hposm','hpo.id = hposm.order_id','left');
        $this->db->join('project_details pd','hposm.service_id = pd.id','left');
        $this->db->join('hire_professional_order_serivice_types_map hpostm','hpo.id = hpostm.order_id','left');
        $this->db->join('project_details2 pd2','hpostm.serivice_type_id = pd2.id','left');
        $this->db->where(array('hpo.customer_id'=>$customer_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetch_ticket_list($professional_id = ''){
        $this->db->select('otl.id as id,otl.ticket_no as ticket_no,otl.order_id as order_id,otl.customer_id as customer_id,otl.created_date as created_date,otl.status as status,hpo.professional_id as professional_id');	
        $this->db->from('order_ticket_log otl');
        $this->db->join('hire_professional_order hpo','otl.order_id = hpo.id','left');
        $this->db->where(array('otl.ticket_type'=>0,'hpo.professional_id'=>$professional_id));
        $this->db->order_by('otl.id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>