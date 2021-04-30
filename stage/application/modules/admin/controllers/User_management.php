<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_management extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'html', 'text','smart_helper'));
        $this->load->library(array('form_validation', 'email', 'upload', 'image_lib'));
        $this->load->model(array('admin_master_model', 'common_model', 'custom_model'));
    }
    public function index() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Customer List';
        $data['user_list'] = $this->custom_model->getAllUserData();
        $this->load->view('users/user-list', $data);
    }
    public function add_user() {
        if ($_POST) {
            $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
            $this->login_chk();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('role_id', 'Role Name', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user_detail.email]', array('required'=>'You have not provided %s.','is_unique'=>'This %s already exists.'));
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|required|is_unique[user_detail.mobile_no]', array('is_unique'=>'This %s already exists.'));
            if ($this->form_validation->run() == FALSE) {
                $error = validation_errors();
                $this->session->set_flashdata('errmsg', $error);
                redirect('admin/add-new-user');
                die;
            } else {
                $data = $this->input->post();
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['created_by'] = $this->session->userdata('admin_id');
                $data['password'] = base64_encode($data['password']);
                unset($data['frm_sub']);
                unset($data['con_password']);
                $res = $this->admin_master_model->dynamic_insert('user_detail', $data);
                if ($res > 0) {
                    $this->session->set_flashdata('sucmsg', 'User successfully inserted!');
                    redirect('admin/user-list');
                    die;
                } else {
                    $this->session->set_flashdata('errmsg', 'Server error!');
                    redirect('admin/add-new-user');
                    die;
                }
            }
        }
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Customer';
        $select = array('id', 'name');
        $con = array('id'=>2);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select,'user_role_master',$con);
        $this->load->view('users/add-user', $data);
    }
    public function add_user_success() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role_id', 'Role Name', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('add-new-user');
            die;
        } else {
            $data = $this->input->post();
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            $data['password'] = md5($data['password']);
            unset($data['frm_sub']);
            $res = $this->admin_master_model->dynamic_insert('user_detail', $data);
            if ($res > 0) {
                $this->session->set_flashdata('errmsg', 'User successfully inserted!');
                redirect('user-list');
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Server error!');
                redirect('add-new-user');
                die;
            }
        }
    }
    public function user_type(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'User Type List';
        $select = array('id','name');
        $con = array('id >'=>1);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select,'user_role_master',$con);
        $this->load->view('list/user-type', $data);
    }
    public function edit_user($en_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        $data['title'] = 'Update Customer Details';
        //////   Fetch User Role List /////////
        $select = array('id', 'name');
        $con = array('id'=>2);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select,'user_role_master',$con);
        //////   Fetch User Role List /////////
        $select = array('id','role_id','name','email','password','std_code','mobile_no');
        $con = array('id '=>$id);
        $data['user_details'] = $this->admin_master_model->dynamic_get($select,'user_detail',$con);
        
        $this->load->view('users/edit-user', $data);
    }
    public function edit_user_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->load->library('form_validation');
        $user_id = $this->input->post('TRXTR');
        $this->form_validation->set_rules('role_id', 'Role Name', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/user/edit-user/'.smart_encode($user_id));
            die;
        } else {
            $data = $this->input->post();
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            $data['password'] = base64_encode($data['password']);
            unset($data['frm_sub']);
            unset($data['TRXTR']);
            unset($data['con_password']);
            $con = array('id'=>$user_id);
            $res = $this->admin_master_model->dynamic_update('user_detail',$con,$data);
            if ($res > 0) {
                $this->session->set_flashdata('sucmsg', 'User successfully Updated!');
                redirect('admin/user-list');
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Server error!');
                redirect('admin/user/edit-user/'.smart_encode($user_id));
                die;
            }
        }
    }
    
    /* professional_list function Show the list of all professional and supplier user list */
    public function professional_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Professional List';
        $data['user_list'] = $this->custom_model->getAllProfessionalUserData(3);
        $this->load->view('users/professional-list', $data);
    }
    
    /* professional_list function Show the list of all supplier user list */
    public function supplier_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Supplier List';
        $data['user_list'] = $this->custom_model->getAllProfessionalUserData(4);
        
        $this->load->view('users/supplier-list', $data);
    }
    
    /* add_new_professional() function gives an option to add new professional or supplier */
    public function add_new_professional(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Professional/Supplier';
        /////////// Fetch role user //////////
        $select = array('id','name');
        $con = array('id >'=>2,'id <'=>5);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select,'user_role_master',$con);
        /////////// Fetch Country List //////////
        $select = array('id','name','isd_code');
        $con = array('status'=>0);
        $data['country_list'] = $this->admin_master_model->dynamic_get($select,'country_list',$con);
        /////////// Fetch Subrole List //////////
        $select = array('id','name');
        $con = array();
        $data['subrole'] = $this->admin_master_model->dynamic_get($select,'user_sub_role',$con);
        
        $this->load->view('users/add-new-professional', $data);
    }
    /* add_new_professional_succ this funtion is used to insert new professional user details */
    public function add_new_professional_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role_id', 'User Type', 'trim|required');
        $this->form_validation->set_rules('company_name', 'Compaby Name', 'trim|required');
        $this->form_validation->set_rules('address1', 'Address', 'trim|required');
        $this->form_validation->set_rules('address2', 'Address Line 2', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('state_id', 'State Name', 'trim|required');
        $this->form_validation->set_rules('city_id', 'City Name', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        $this->form_validation->set_rules('work_field', 'Work Field', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required|is_unique[user_detail.email]', array('is_unique'=>'This %s already exists.'));
        $this->form_validation->set_rules('password1', 'Password', 'trim|required');
        $this->form_validation->set_rules('bank_country_id', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required');
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
        $this->form_validation->set_rules('bank_acount_no', 'Bank Account No.', 'trim|required');
        $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required');
        $this->form_validation->set_rules('micr_code', 'MICR Code', 'trim|required');
        $this->form_validation->set_rules('bank_address', 'Bank Address', 'trim|required');
        $this->form_validation->set_rules('std_code', 'STD Code', 'trim|required');
        $this->form_validation->set_rules('bank_mobile_no', 'Mobile No.', 'trim|required|is_unique[user_detail.mobile_no]', array('is_unique'=>'This %s already exists.'));
        if($this->form_validation->run() == FALSE){
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/user/add-new-professional');
            die;
        }else{
            $data = $this->input->post();
            $config['upload_path']          = 'uploaded_files/company_logo/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             =  5000;
            $config['encrypt_name']         =  TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('company_logo')){
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('errmsg', $error);
                redirect('admin/user/add-new-professional');
                die;
            }else{
                $upload_data = $this->upload->data();
                $data['company_logo'] = 'uploaded_files/company_logo/'.$upload_data['file_name'];
            }
            
            /////////////////////// User Details //////////////////////
            $user_detail_data = array();
            $user_detail_data['role_id'] = $data['role_id'];
            $user_detail_data['name'] = $data['name'];
            $user_detail_data['email'] = $data['email'];
            $user_detail_data['password'] = base64_encode($data['password1']);
            $user_detail_data['std_code'] = $data['std_code'];
            $user_detail_data['mobile_no'] = $data['bank_mobile_no'];
            $user_detail_data['status'] = 1;
            $user_detail_data['reg_by'] = 0;
            $user_detail_data['reg_using'] = 0;
            $user_detail_data['created_date'] = date('Y-m-d H:i:s');
            $user_detail_data['created_by'] = $this->session->userdata('admin_id');
            
            $res = $this->admin_master_model->dynamic_insert('user_detail', $user_detail_data);
            ///////////////////////Project Details /////////////////////////////
            $project_details = array();
            $i = 0;
            foreach($data['project_name'] as $val){
                $project_details['user_id'] = $res;
                $project_details['project_name'] = $data['project_name'][$i];
                $project_details['fess_p_hour'] = $data['fess_p_hour'][$i];
                $project_details['fees_p_s_feet'] = $data['fees_p_s_feet'][$i];
                $i++;
            }
            $res4 = $this->admin_master_model->dynamic_insert('project_details', $project_details);
            /////////////////////// Project Details 1 /////////////////////////////
            $project_details1 = array();
            $i = 0;
            foreach($data['fees_project_name'] as $val){
                $project_details1['user_id'] = $res;
                $project_details1['fees_project_name'] = $data['fees_project_name'][$i];
                $project_details1['project_fees'] = $data['project_fees'][$i];
                $i++;
            }
            $res3 = $this->admin_master_model->dynamic_insert('project_details2', $project_details1);
            //////////////////////  User Professional Details //////////////////
            $professional_details = array();
            $professional_details['userid'] = $res;
            $professional_details['company_name'] = $data['company_name'];
            $professional_details['address1'] = $data['address1'];
            $professional_details['address2'] = $data['address2'];
            $professional_details['country_id'] = $data['country_id'];
            $professional_details['city_id'] = $data['city_id'];
            $professional_details['state_id'] = $data['state_id'];
            $professional_details['zipcode'] = $data['zipcode'];
            $professional_details['work_field'] = $data['work_field'];
            $professional_details['company_logo'] = $data['company_logo'];
            $res1 = $this->admin_master_model->dynamic_insert('user_prof_det', $professional_details);
            /////////////////////// User Bank Details //////////////////////////
            
            $professional_bank_details = array();
            $professional_bank_details['userid'] = $res;
            $professional_bank_details['bank_country_id'] = $data['bank_country_id'];
            $professional_bank_details['account_holder_name'] = $data['account_holder_name'];
            $professional_bank_details['bank_name'] = $data['bank_name'];
            $professional_bank_details['bank_acount_no'] = $data['bank_acount_no'];
            $professional_bank_details['ifsc_code'] = $data['ifsc_code'];
            $professional_bank_details['micr_code'] = $data['micr_code'];
            $professional_bank_details['bank_address'] = $data['bank_address'];
            $professional_bank_details['std_code'] = $data['std_code'];
            $professional_bank_details['bank_mobile_no'] = $data['bank_mobile_no'];
            $res2 = $this->admin_master_model->dynamic_insert('user_prof_bank_det', $professional_bank_details);
            if($user_detail_data['role_id'] == 3){
                $this->session->set_flashdata('sucmsg','User Successfully registred...');
                redirect('admin/user/professional-list');
            }else{
                $this->session->set_flashdata('sucmsg','User Successfully registred...');
                redirect('admin/user/supplier-list');
            }
            die;
        }
    }
    /* Status change option of customer, supplier,professional */
    public function change_customer_status($en_customer_id = '',$redirect_position = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_customer_id);
        if($redirect_position == 1){
            $redirect_url = 'admin/user-list';
        }else if($redirect_position == 2){
            $redirect_url = 'admin/user/professional-list';
        }else if($redirect_position == 3){
            $redirect_url = 'admin/user/supplier-list';
        }
        $select = array('status','mail_verification','created_by');
        $con = array('id'=>$id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'user_detail',$con);
        if($deal_status[0]['created_by'] == 0 && $deal_status[0]['mail_verification'] == 0){
            $this->session->set_flashdata('errmsg', 'User need to verify EmailID first to approve !');
            redirect($redirect_url);
            die;
        }
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$id);
        $res = $this->admin_master_model->dynamic_update('user_detail',$con,$data);
        
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect($redirect_url);
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect($redirect_url);
            die;
        }
    }
    public function delete_user($en_user_id = '',$redirect_position = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_user_id);
        $con = array('id'=>$id);
        $res = $this->admin_master_model->dynamic_delete('user_detail',$con);
        if($redirect_position == 1){
            $redirect_url = 'admin/user-list';
        }else if($redirect_position == 2){
            $redirect_url = 'admin/user/professional-list';
        }else if($redirect_position == 3){
            $redirect_url = 'admin/user/supplier-list';
        }
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'User Deleted successfully!');
            redirect($redirect_url);
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect($redirect_url);
            die;
        }
    }
    /* update_professional is for update professional details */
    public function update_professional($en_pro_id = '',$redirect_position = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['pro_id'] = smart_decode($en_pro_id);
        $data['redirect_position'] = $redirect_position;
        if($redirect_position == 1){
            $data['title'] = 'Update Professional Details';
        }else{
            $data['title'] = 'Update Supplier Details';
        }
        /////////// Fetch role user //////////
        $select = array('id','name');
        $con = array('id >'=>2,'id <'=>5);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select,'user_role_master',$con);
        /////////// Fetch Country List //////////
        $select = array('id','name','isd_code');
        $con = array('status'=>0);
        $data['country_list'] = $this->admin_master_model->dynamic_get($select,'country_list',$con);
        /////////// Fetch Subrole List //////////
        $select = array('id','name');
        $con = array();
        $data['subrole'] = $this->admin_master_model->dynamic_get($select,'user_sub_role',$con);
        /////////// Fetch user_detail  ////////// 1.
        $select = array('role_id','name','email','password','std_code','mobile_no');
        $con = array('id'=>$data['pro_id']);
        $data['user_detail'] = $this->admin_master_model->dynamic_get($select,'user_detail',$con);
        /////////// Fetch project_details  ////////// 2.
        $select = array('id','project_name','fess_p_hour','fees_p_s_feet');
        $con = array('user_id'=>$data['pro_id']);
        $data['project_details'] = $this->admin_master_model->dynamic_get($select,'project_details',$con);
        /////////// Fetch project_details2  ////////// 3. 
        $select = array('id','fees_project_name','project_fees');
        $con = array('user_id'=>$data['pro_id']);
        $data['project_details2'] = $this->admin_master_model->dynamic_get($select,'project_details2',$con);
        /////////// Fetch User Professional Details  ////////// 4. 
        $select = array('id','company_name','address1','address2','country_id','city_id','state_id','zipcode','work_field','company_logo');
        $con = array('userid'=>$data['pro_id']);
        $data['user_prof_det'] = $this->admin_master_model->dynamic_get($select,'user_prof_det',$con);
        /////////// Fetch User Bank Details  //////////5. 
        $select = array('id','userid','bank_country_id','account_holder_name','bank_name','bank_acount_no','ifsc_code','micr_code','bank_address','std_code','bank_mobile_no');
        $con = array('userid'=>$data['pro_id']);
        $data['user_prof_bank_det'] = $this->admin_master_model->dynamic_get($select,'user_prof_bank_det',$con);
        /////////// Fetch User state ist  //////////
        $select = array('id','name');
        $con = array('country_id'=>$data['user_prof_det'][0]['country_id']);
        $data['user_state_list'] = $this->admin_master_model->dynamic_get($select,'state_list',$con);
        /////////// Fetch User city list  //////////
        $select = array('id','name');
        $con = array('state_id'=>$data['user_prof_det'][0]['city_id']);
        $data['user_city_list'] = $this->admin_master_model->dynamic_get($select,'city_list',$con);
        
        //echo'<pre>'; print_r($data['project_details2']);die;
        $this->load->view('users/update-professional', $data);
    }
    public function update_new_professional_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $professional_id = $this->input->post('TRXTR');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role_id', 'User Type', 'trim|required');
        $this->form_validation->set_rules('company_name', 'Compaby Name', 'trim|required');
        $this->form_validation->set_rules('address1', 'Address', 'trim|required');
        $this->form_validation->set_rules('address2', 'Address Line 2', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('state_id', 'State Name', 'trim|required');
        $this->form_validation->set_rules('city_id', 'City Name', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        $this->form_validation->set_rules('work_field', 'Work Field', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required');
        $this->form_validation->set_rules('bank_country_id', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required');
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
        $this->form_validation->set_rules('bank_acount_no', 'Bank Account No.', 'trim|required');
        $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required');
        $this->form_validation->set_rules('micr_code', 'MICR Code', 'trim|required');
        $this->form_validation->set_rules('bank_address', 'Bank Address', 'trim|required');
        $this->form_validation->set_rules('std_code', 'STD Code', 'trim|required');
        $this->form_validation->set_rules('bank_mobile_no', 'Mobile No.', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/user/update-professional/'. smart_encode($professional_id));
            die;
        }else{
            $data = $this->input->post();
            if($_FILES['company_logo']['name'] !=''){
                $config['upload_path']          = 'uploaded_files/company_logo/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             =  5000;
                $config['encrypt_name']         =  TRUE;
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('company_logo')){
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errmsg', $error);
                    redirect('admin/user/add-new-professional');
                    die;
                }else{
                    $upload_data = $this->upload->data();
                    $data['company_logo'] = 'uploaded_files/company_logo/'.$upload_data['file_name'];
                }
            }
            /////////////////////// User Details //////////////////////
            $user_detail_data = array();
            $user_detail_data['role_id'] = $data['role_id'];
            $user_detail_data['name'] = $data['name'];
            $user_detail_data['email'] = $data['email'];
            $user_detail_data['password'] = base64_encode($data['password1']);
            $user_detail_data['std_code'] = $data['std_code'];
            $user_detail_data['mobile_no'] = $data['bank_mobile_no'];
            $user_detail_data['updated_date'] = date('Y-m-d H:i:s');
            $user_detail_data['updated_by'] = $this->session->userdata('admin_id');
            
            $res = $this->admin_master_model->dynamic_update('user_detail',array('id'=>$professional_id),$user_detail_data);
            
            ///////////////////////Project Details /////////////////////////////
            if($data['project_name'][0] != ''){
                $project_details = array();
                $i = 0;
                foreach($data['project_name'] as $val){
                    $project_details['user_id'] = $professional_id;
                    $project_details['project_name'] = $data['project_name'][$i];
                    $project_details['fess_p_hour'] = $data['fess_p_hour'][$i];
                    $project_details['fees_p_s_feet'] = $data['fees_p_s_feet'][$i];
                    $i++;
                }
                $res4 = $this->admin_master_model->dynamic_insert('project_details', $project_details);
            }    
            /////////////////////// Project Details 1 /////////////////////////////
            if($data['fees_project_name'][0] != ''){
                $project_details1 = array();
                $i = 0;
                foreach($data['fees_project_name'] as $val){
                    $project_details1['user_id'] = $professional_id;
                    $project_details1['fees_project_name'] = $data['fees_project_name'][$i];
                    $project_details1['project_fees'] = $data['project_fees'][$i];
                    $i++;
                }
                $res3 = $this->admin_master_model->dynamic_insert('project_details2', $project_details1);
            }
            
            //////////////////////  User Professional Details //////////////////
            $professional_details = array();
            $professional_details['company_name'] = $data['company_name'];
            $professional_details['address1'] = $data['address1'];
            $professional_details['address2'] = $data['address2'];
            $professional_details['country_id'] = $data['country_id'];
            $professional_details['city_id'] = $data['city_id'];
            $professional_details['state_id'] = $data['state_id'];
            $professional_details['zipcode'] = $data['zipcode'];
            $professional_details['work_field'] = $data['work_field'];
            if($data['company_logo']){
                $professional_details['company_logo'] = $data['company_logo'];
            }
            $res1 = $this->admin_master_model->dynamic_update('user_prof_det',array('userid'=>$professional_id),$professional_details);
            /////////////////////// User Bank Details //////////////////////////
            $professional_bank_details = array();
            //$professional_bank_details['userid'] = $res;
            $professional_bank_details['bank_country_id'] = $data['bank_country_id'];
            $professional_bank_details['account_holder_name'] = $data['account_holder_name'];
            $professional_bank_details['bank_name'] = $data['bank_name'];
            $professional_bank_details['bank_acount_no'] = $data['bank_acount_no'];
            $professional_bank_details['ifsc_code'] = $data['ifsc_code'];
            $professional_bank_details['micr_code'] = $data['micr_code'];
            $professional_bank_details['bank_address'] = $data['bank_address'];
            $professional_bank_details['std_code'] = $data['std_code'];
            $professional_bank_details['bank_mobile_no'] = $data['bank_mobile_no'];
            $res2 = $this->admin_master_model->dynamic_update('user_prof_bank_det',array('userid'=>$professional_id),$professional_bank_details);
            $this->session->set_flashdata('sucmsg','User details Successfully updated...');
            if($this->input->post('TRXTR1') == 1){
                redirect('admin/user/professional-list');
            }else{
                redirect('admin/user/supplier-list');
            }
            die;
        }
    }
    /* Delete professional project of professional user */
    public function delete_professional_project($position = '',$en_project_id = '',$en_professional_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $project_id = smart_decode($en_project_id);
        $con = array('id'=>$project_id);
        if($position == 1){
            $res = $this->admin_master_model->dynamic_delete('project_details', $con);
        }else{
            $res = $this->admin_master_model->dynamic_delete('project_details2', $con);
        }
        if($res > 0){
            $this->session->set_flashdata('sucmsg','project detail successfully removed!');
            redirect('admin/user/update-professional/'.$en_professional_id);
        }else{
            $this->session->set_flashdata('sucmsg','Server error!');
            redirect('admin/user/update-professional/'.$en_professional_id);
        }
    }
    
    ///////////////////////  Private Function ///////////////////
    private function method_chk($server_req = '', $permisssion = '') {
        if ($server_req == $permisssion) {
            return 1;
        } else {
            $this->session->set_flashdata('errmsg', 'Invalid request!');
            redirect('');
            die;
        }
    }

    private function login_chk() {
        if ($this->session->userdata('admin_id')) {
            return 1;
        } else {
            $this->session->set_flashdata('errmsg', 'Invalid request!');
            redirect('');
            die;
        }
    }

}
