<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Professional_controller extends MX_Controller {
    public $user = "";
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'text','smart_helper'));
        $this->load->library(array('form_validation', 'upload', 'image_lib'));
        $this->load->model('client_master_model');
        $this->load->library('facebook');
    }
 
    public function index() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->professional_login_chk();
        ////////////// Fetch User Details /////////////////
        $select = array('id', 'role_id','name','email','std_code','mobile_no','status','is_new_status');
        $con = array('id'=>$this->session->userdata('client_id'));
        $data['user_detail'] = $this->client_master_model->dynamic_get($select, 'user_detail',$con);
        
        if($data['user_detail'][0]['is_new_status'] == 0){
            redirect('professional/updateinfo/personal');die;
        }else{
            ////////////// Fetch User about us Details /////////////////
            $select = array('*');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $data['about_us'] = $this->client_master_model->dynamic_get($select,'professional_about_us',$con);
            ////////////// Fetch User professional Details /////////////////
            $data['profe_det'] = $this->client_master_model->get_professional_details($this->session->userdata('client_id'));
            
            ////////////// Fetch User Skills Details /////////////////
            $select = array('skill');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $data['skills'] = $this->client_master_model->dynamic_get($select,'users_skill',$con);
            ////////////// Fetch User project image /////////////////
            $select = array('image');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $data['project_image'] = $this->client_master_model->dynamic_get($select,'project_image',$con);
            
            //echo'<pre>'; print_r($data['project_image']);die;
            $this->load->view('professional/professional-profile-view',$data);
        }
    }
    public function professional_updateinfo_personal(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->professional_login_chk();
        ////////////// Fetch Personal Details /////////////////
        $select = array('*');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['personal_detail'] = $this->client_master_model->dynamic_get($select, 'user_prof_det',$con);
        ////////////// Fetch User Details /////////////////
        $select = array('id','role_id','name','email','std_code','mobile_no','is_new_status');
        $con = array('id'=>$this->session->userdata('client_id'));
        $data['user_detail'] = $this->client_master_model->dynamic_get($select, 'user_detail',$con);
        
        ////////////// Fetch Country List /////////////////
        $select = array('id','name','isd_code');
        $con = array();
        $data['std_list'] = $this->client_master_model->dynamic_get($select,'country_list',$con);
        ////////////// Fetch State List /////////////////
        $select = array('id','name');
        $con = array('country_id'=>$data['personal_detail'][0]['country_id']);
        $data['state_list'] = $this->client_master_model->dynamic_get($select,'state_list',$con);
        ////////////// Fetch City List /////////////////
        $select = array('id','name');
        $con = array('state_id'=>$data['personal_detail'][0]['state_id']);
        $data['city_list'] = $this->client_master_model->dynamic_get($select,'city_list',$con);
        $this->load->view('professional/professional-updateinfo-personal',$data);
    }
    public function professional_updateinfo_personal_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->professional_login_chk();
        $this->method_chk($this->input->post('pro_btn_sub'), 'Update Now!');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('std_code', 'STD code', 'trim|required');
        $this->form_validation->set_rules('bank_mobile_no', 'Mobile number', 'trim|required');
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required');
        $this->form_validation->set_rules('address1', 'Address', 'trim|required');
        $this->form_validation->set_rules('address2', 'Address Line 2', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');
        $this->form_validation->set_rules('city_id', 'City', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('professional/updateinfo/personal');
            die;
        } else {
            $data = $this->input->post();
            unset($data['pro_btn_sub']);
            //////    Update user details //////
            $user_detail = array();
            $user_detail['name'] = $data['name'];
            $user_detail['std_code'] = $data['std_code'];
            $user_detail['mobile_no'] = $data['bank_mobile_no'];
            $user_detail['email'] = $data['email'];
            unset($data['name']);
            unset($data['std_code']);
            unset($data['bank_mobile_no']);
            unset($data['email']);
            $con = array('id'=>$this->session->userdata('client_id'));
            $res = $this->client_master_model->dynamic_update('user_detail',$con,$user_detail);
            //////    Update Professional details //////
            $con = array('userid'=>$this->session->userdata('client_id'));
            $res1 = $this->client_master_model->dynamic_update('user_prof_det',$con,$data);
            $this->session->set_flashdata('sucmsg','Personal details successfully updated!');
            redirect('professional/updateinfo/about-us');
        }
    }
    public function professional_updateinfo_about_us(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->professional_login_chk();
        ////////  check if previous any about us found ////////
        $select = array('*');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['about_details'] = $this->client_master_model->dynamic_get($select,'professional_about_us',$con);
        $this->load->view('professional/professional-updateinfo-about-us',$data);
    }
    public function professional_updateinfo_about_us_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->professional_login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('yr_of_exp', 'Year of Exprience', 'trim|required');
        $this->form_validation->set_rules('word_of_exp', 'Word about exprience', 'trim|required');
        $this->form_validation->set_rules('no_of_project', 'number of projects', 'trim|required');
        $this->form_validation->set_rules('word_project', 'word about projects', 'trim|required');
        $this->form_validation->set_rules('no_emergency_service', 'no of emergency project', 'trim|required');
        $this->form_validation->set_rules('word_emergency', 'word in emergency project', 'trim|required');
        $this->form_validation->set_rules('about_us', 'about us', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('professional/updateinfo/about-us');
            die;
        } else {
            $data = $this->input->post();
            $con = array('user_id'=>$this->session->userdata('client_id'));
            ////////  check if previous any about us found ////////
            $select = array('id');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $previous_chk = $this->client_master_model->dynamic_get($select,'professional_about_us',$con);
            if(count($previous_chk) < 1){
                $data['user_id'] = $this->session->userdata('client_id');
                $res = $this->client_master_model->dynamic_insert('professional_about_us',$data);
            }else{
                $res = $this->client_master_model->dynamic_update('professional_about_us',$con,$data);
            }
            $this->session->set_flashdata('sucmsg','About us successfully updated!');
            redirect('professional/updateinfo/company-details');
        }
    }
    public function professional_updateinfo_company_details(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->professional_login_chk();
        ////////  Fetch company details ////////
        $select = array('company_name');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['company_details1'] = $this->client_master_model->dynamic_get($select,'user_prof_det',$con);
        ////////  Fetch company details 2 ////////
        $select = array('*');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['company_details2'] = $this->client_master_model->dynamic_get($select,'professional_company_det',$con);
        if(count($data['company_details2']) > 0){
            $data['already_exist'] = 1;
            ////////////// Fetch State List /////////////////
            $select = array('id','name');
            $con = array('country_id'=>$data['company_details2'][0]['country_id']);
            $data['state_list'] = $this->client_master_model->dynamic_get($select,'state_list',$con);
            ////////////// Fetch City List /////////////////
            $select = array('id','name');
            $con = array('state_id'=>$data['company_details2'][0]['state_id']);
            $data['city_list'] = $this->client_master_model->dynamic_get($select,'city_list',$con);
        }
        ////////////// Fetch Country List /////////////////
        $select = array('id','name','isd_code');
        $con = array();
        $data['std_list'] = $this->client_master_model->dynamic_get($select,'country_list',$con);
        $this->load->view('professional/professional-updateinfo-company-details',$data);
    }
    public function professional_updateinfo_company_details_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->professional_login_chk();
        $this->method_chk($this->input->post('submit_frm'), 'Update Now!');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('isd_code', 'ISD Code', 'trim|required');
        $this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('address1', 'Address', 'trim|required');
        $this->form_validation->set_rules('address2', 'Address Line 2', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');
        $this->form_validation->set_rules('city_id', 'City', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('professional/updateinfo/work-info');
            die;
        } else {
            $data = $this->input->post();
            unset($data['submit_frm']);
            $con = array('userid'=>$this->session->userdata('client_id'));
            $res = $this->client_master_model->dynamic_update('user_prof_det',$con,array('company_name'=>$data['company_name']));
            unset($data['company_name']);
            ////////  check if previous any about us found ////////
            $select = array('id');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $previous_chk = $this->client_master_model->dynamic_get($select,'professional_company_det',$con);
            if(count($previous_chk) < 1){
                $data['user_id'] = $this->session->userdata('client_id');
                $res = $this->client_master_model->dynamic_insert('professional_company_det',$data);
            }else{
                $con = array('user_id'=>$this->session->userdata('client_id'));
                $res = $this->client_master_model->dynamic_update('professional_company_det',$con,$data);
            }
            $this->session->set_flashdata('sucmsg','About us successfully updated!');
            redirect('professional/updateinfo/work-info');
        }
    }
    public function professional_updateinfo_work_info(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->professional_login_chk();
        ////////////// Fetch Working Field List /////////////////
        $select = array('id','name');
        $con = array('usertype_id'=>3);
        $data['work_list'] = $this->client_master_model->dynamic_get($select,'user_sub_role',$con);
        ////////////// Fetch User Working Field /////////////////
        $select = array('work_field');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['work_filed'] = $this->client_master_model->dynamic_get($select,'user_prof_det',$con);
        ////////////// Fetch User Project details 1 /////////////////
        $select = array('*');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['project_det1'] = $this->client_master_model->dynamic_get($select,'project_details',$con);
        ////////////// Fetch User Project details 2 /////////////////
        $select = array('*');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['project_det2'] = $this->client_master_model->dynamic_get($select,'project_details2',$con);
        
        //echo '<pre>'; print_r($data['project_det2']);die;
        $this->load->view('professional/professional-updateinfo-work-info',$data);
    }
    public function professional_updateinfo_work_info_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->professional_login_chk();
        $data = $this->input->post();
        ///////////   Update Work Field ////////////
        $con = array('userid'=>$this->session->userdata('client_id'));
        $res = $this->client_master_model->dynamic_update('user_prof_det',$con,array('work_field'=>$data['work_field']));
        if($data['project_name'][0] != ''){
            /////////////////////// Project Details Insertion /////////////////////////////
            $project_details = array();
            $i = 0;
            foreach($data['project_name'] as $val){
                $project_details['user_id'] = $this->session->userdata('client_id');
                $project_details['project_name'] = $data['project_name'][$i];
                $project_details['fess_p_hour'] = $data['fess_p_hour'][$i];
                $project_details['fees_p_s_feet'] = $data['fees_p_s_feet'][$i];
                $i++;
                $res4 = $this->client_master_model->dynamic_insert('project_details', $project_details);
            }
        }
        if($data['fees_project_name'][0] != ''){
            /////////////////////// Project Details 2 Insertion /////////////////////////////
            $project_details1 = array();
            $i = 0;
            foreach($data['fees_project_name'] as $val){
                $project_details1['user_id'] = $this->session->userdata('client_id');
                $project_details1['fees_project_name'] = $data['fees_project_name'][$i];
                $project_details1['project_fees'] = $data['project_fees'][$i];
                $i++;
                $res3 = $this->client_master_model->dynamic_insert('project_details2', $project_details1);
            }
        }
        $this->session->set_flashdata('sucmsg','Work Info successfully updated!');
        redirect('professional/updateinfo/upload-pictures');
    }
    public function delete_professional_project($position = '',$en_project_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->professional_login_chk();
        $project_id = smart_decode($en_project_id);
        $con = array('id'=>$project_id);
        if($position == 1){
            $res = $this->client_master_model->dynamic_delete('project_details', $con);
        }else{
            $res = $this->client_master_model->dynamic_delete('project_details2', $con);
        }
        if($res > 0){
            $this->session->set_flashdata('sucmsg','project detail successfully removed!');
            redirect('professional/updateinfo/work-info');
        }else{
            $this->session->set_flashdata('sucmsg','Server error!');
            redirect('professional/updateinfo/work-info');
        }
    }
    public function professional_updateinfo_upload_pictures(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->professional_login_chk();
        ////////////// Fetch User thumbnail AND Banner /////////////////
        $select = array('thumnail_image','banner_profile');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['pro_images'] = $this->client_master_model->dynamic_get($select,'user_prof_det',$con);
        ////////////// Fetch User Project /////////////////
        $select = array('image');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['project_images'] = $this->client_master_model->dynamic_get($select,'project_image',$con);
        //echo'<pre>'; print_r($data['project_images']);die;
        $this->load->view('professional/professional-updateinfo-upload-pictures',$data);
    }
    public function professional_updateinfo_upload_pictures_success(){
        if($_FILES['thumnail_image']['name'] != ''){
            $config['upload_path']          = 'uploaded_files/thumnail_image/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             =  5000;
            $config['encrypt_name']         =  TRUE;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('thumnail_image')){
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('errmsg', $error);
                redirect('professional/updateinfo/upload-pictures');
                die;
            }else{
                $upload_data = $this->upload->data();
                $data['thumnail_image'] = 'uploaded_files/thumnail_image/'.$upload_data['file_name'];
            }
        }
        if($_FILES['banner_profile']['name'] != ''){
            $config['upload_path']          = 'uploaded_files/banner_profile/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             =  5000;
            $config['encrypt_name']         =  TRUE;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('banner_profile')){
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('errmsg', $error);
                redirect('professional/updateinfo/upload-pictures');
                die;
            }else{
                $upload_data = $this->upload->data();
                $data['banner_profile'] = 'uploaded_files/banner_profile/'.$upload_data['file_name'];
            }
        }
        $con = array('userid'=>$this->session->userdata('client_id'));
        $res = $this->client_master_model->dynamic_update('user_prof_det',$con,$data);
        if($_FILES['project_pic']['name'][0] != ''){
           $files = $_FILES['project_pic'];
            $config = array(
            'upload_path'   => 'uploaded_files/project_pic',
            'allowed_types' => 'jpg|jpeg|png|pdf',
            'max_size'      => '5000',
            'encrypt_name'  => TRUE,
            'overwrite'     => 1,                       
            );
            $this->load->library('upload', $config);
            $images = array();
            foreach ($files['name'] as $key => $image) {
                $_FILES['images[]']['name']= $files['name'][$key];
                $_FILES['images[]']['type']= $files['type'][$key];
                $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['images[]']['error']= $files['error'][$key];
                $_FILES['images[]']['size']= $files['size'][$key];
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('images[]')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errmsg',$error);
                    redirect('add-assignment');die;
                }else{
                    $upload_data = $this->upload->data();
                    $data1['image'] = 'uploaded_files/project_pic/'.$upload_data['file_name'];
                    $data1['user_id'] = $this->session->userdata('client_id');
                    $res = $this->client_master_model->dynamic_insert('project_image',$data1);
                }
            }
        }
        $this->session->set_flashdata('sucmsg','Pictures successfully uploaded!');
        redirect('professional/updateinfo/bank-details');die;
    }
    public function professional_updateinfo_bank_details(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->professional_login_chk();
        ////////////// Fetch Country List /////////////////
        $select = array('id','name','isd_code');
        $con = array();
        $data['country_list'] = $this->client_master_model->dynamic_get($select,'country_list',$con);
        ////////////// Fetch Bank Details /////////////////
        $select = array('*');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['bank_det'] = $this->client_master_model->dynamic_get($select,'user_prof_bank_det',$con);
        ////////////// Fetch State List /////////////////
        $select = array('id','name');
        $con = array('country_id'=>$data['bank_det'][0]['country_id'],'status'=>0);
        $data['state_list'] = $this->client_master_model->dynamic_get($select,'state_list',$con);
        ////////////// Fetch City List /////////////////
        $select = array('id','name');
        $con = array('state_id'=>$data['bank_det'][0]['state_id'],'status'=>0);
        $data['city_list'] = $this->client_master_model->dynamic_get($select,'city_list',$con);
        
        //echo '<pre>'; print_r($data['bank_det']);die;
        $this->load->view('professional/professional-updateinfo-bank-details',$data);
    }
    public function professional_updateinfo_bank_details_success() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->professional_login_chk();
        $this->method_chk($this->input->post('sub_btn'), 'Update Now!');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bank_country_id','Bank Location', 'trim|required');
        $this->form_validation->set_rules('account_holder_name','Account holder name', 'trim|required');
        $this->form_validation->set_rules('bank_name','Bank name', 'trim|required');
        $this->form_validation->set_rules('bank_acount_no','Bank account no', 'trim|required');
        $this->form_validation->set_rules('ifsc_code','IFSC code', 'trim|required');
        $this->form_validation->set_rules('micr_code','MICR code', 'trim|required');
        $this->form_validation->set_rules('bank_address','Bank address', 'trim|required');
        $this->form_validation->set_rules('bank_address2','Address line 2', 'trim|required');
        $this->form_validation->set_rules('country_id','country name', 'trim|required');
        $this->form_validation->set_rules('state_id','State name', 'trim|required');
        $this->form_validation->set_rules('city_id','City', 'trim|required');
        $this->form_validation->set_rules('zipcode','Zipcode', 'trim|required');
        $this->form_validation->set_rules('std_code','ISD code', 'trim|required');
        $this->form_validation->set_rules('bank_mobile_no','mobile no', 'trim|required');
        $this->form_validation->set_rules('email','EmailID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('professional/updateinfo/bank-details');
            die;
        } else {
            $data = $this->input->post();
            unset($data['sub_btn']);
            $con = array('userid'=>$this->session->userdata('client_id'));
            $res1 = $this->client_master_model->dynamic_update('user_prof_bank_det',$con,$data);
            $con = array('id'=>$this->session->userdata('client_id'));
            $res1 = $this->client_master_model->dynamic_update('user_detail',$con,array('is_new_status'=>1));
            redirect('professional-profile');
        }
    }
    public function supplier_profile(){ 
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->supplier_login_chk();
        ////////////// Fetch User Details /////////////////
        $select = array('id', 'role_id','name','email','std_code','mobile_no','status','is_new_status');
        $con = array('id'=>$this->session->userdata('client_id'));
        $data['user_detail'] = $this->client_master_model->dynamic_get($select, 'user_detail',$con);
        if($data['user_detail'][0]['is_new_status'] == 0){
            redirect('supplier/updateinfo/personal');die;
        }else{
            ////////////// Fetch User about us Details /////////////////
            $select = array('*');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $data['about_us'] = $this->client_master_model->dynamic_get($select,'professional_about_us',$con);
            ////////////// Fetch User professional Details /////////////////
            $data['profe_det'] = $this->client_master_model->get_professional_details($this->session->userdata('client_id'));
            ////////////// Fetch User Skills Details /////////////////
            $select = array('skill');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $data['skills'] = $this->client_master_model->dynamic_get($select,'users_skill',$con);
            ////////////// Fetch User project image /////////////////
            $select = array('image');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $data['project_image'] = $this->client_master_model->dynamic_get($select,'project_image',$con);
            
            $this->load->view('supplier/supplier-profile-view',$data);
        }
    }
    public function supplier_updateinfo_personal(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->supplier_login_chk();
        ////////////// Fetch Personal Details /////////////////
        $select = array('*');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['personal_detail'] = $this->client_master_model->dynamic_get($select, 'user_prof_det',$con);
        ////////////// Fetch User Details /////////////////
        $select = array('id','role_id','name','email','std_code','mobile_no','is_new_status');
        $con = array('id'=>$this->session->userdata('client_id'));
        $data['user_detail'] = $this->client_master_model->dynamic_get($select, 'user_detail',$con);
        
        ////////////// Fetch Country List /////////////////
        $select = array('id','name','isd_code');
        $con = array();
        $data['std_list'] = $this->client_master_model->dynamic_get($select,'country_list',$con);
        ////////////// Fetch State List /////////////////
        $select = array('id','name');
        $con = array('country_id'=>$data['personal_detail'][0]['country_id']);
        $data['state_list'] = $this->client_master_model->dynamic_get($select,'state_list',$con);
        ////////////// Fetch City List /////////////////
        $select = array('id','name');
        $con = array('state_id'=>$data['personal_detail'][0]['state_id']);
        $data['city_list'] = $this->client_master_model->dynamic_get($select,'city_list',$con);
        $this->load->view('supplier/supplier-updateinfo-personal',$data);
    }
    public function supplier_updateinfo_personal_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->supplier_login_chk();
        $this->method_chk($this->input->post('pro_btn_sub'), 'Update Now!');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('std_code', 'STD code', 'trim|required');
        $this->form_validation->set_rules('bank_mobile_no', 'Mobile number', 'trim|required');
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required');
        $this->form_validation->set_rules('address1', 'Address', 'trim|required');
        $this->form_validation->set_rules('address2', 'Address Line 2', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');
        $this->form_validation->set_rules('city_id', 'City', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('supplier/updateinfo/personal');
            die;
        } else {
            $data = $this->input->post();
            unset($data['pro_btn_sub']);
            //////    Update user details //////
            $user_detail = array();
            $user_detail['name'] = $data['name'];
            $user_detail['std_code'] = $data['std_code'];
            $user_detail['mobile_no'] = $data['bank_mobile_no'];
            $user_detail['email'] = $data['email'];
            unset($data['name']);
            unset($data['std_code']);
            unset($data['bank_mobile_no']);
            unset($data['email']);
            $con = array('id'=>$this->session->userdata('client_id'));
            $res = $this->client_master_model->dynamic_update('user_detail',$con,$user_detail);
            //////    Update Professional details //////
            $con = array('userid'=>$this->session->userdata('client_id'));
            $res1 = $this->client_master_model->dynamic_update('user_prof_det',$con,$data);
            $this->session->set_flashdata('sucmsg','Personal details successfully updated!');
            redirect('supplier/updateinfo/about-us');
        }
    }
    public function supplier_updateinfo_about_us(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->supplier_login_chk();
        ////////  check if previous any about us found ////////
        $select = array('*');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['about_details'] = $this->client_master_model->dynamic_get($select,'professional_about_us',$con);
        $this->load->view('supplier/supplier-updateinfo-about-us',$data);
    }
    public function supplier_updateinfo_about_us_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->supplier_login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('yr_of_exp', 'Year of Exprience', 'trim|required');
        $this->form_validation->set_rules('word_of_exp', 'Word about exprience', 'trim|required');
        $this->form_validation->set_rules('no_of_project', 'number of projects', 'trim|required');
        $this->form_validation->set_rules('word_project', 'word about projects', 'trim|required');
        $this->form_validation->set_rules('no_emergency_service', 'no of emergency project', 'trim|required');
        $this->form_validation->set_rules('word_emergency', 'word in emergency project', 'trim|required');
        $this->form_validation->set_rules('about_us', 'about us', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('supplier/updateinfo/about-us');
            die;
        } else {
            $data = $this->input->post();
            $con = array('user_id'=>$this->session->userdata('client_id'));
            ////////  check if previous any about us found ////////
            $select = array('id');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $previous_chk = $this->client_master_model->dynamic_get($select,'professional_about_us',$con);
            if(count($previous_chk) < 1){
                $data['user_id'] = $this->session->userdata('client_id');
                $res = $this->client_master_model->dynamic_insert('professional_about_us',$data);
            }else{
                $res = $this->client_master_model->dynamic_update('professional_about_us',$con,$data);
            }
            $this->session->set_flashdata('sucmsg','About us successfully updated!');
            redirect('supplier/updateinfo/company-details');
        }
    }
    public function supplier_updateinfo_company_details(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->supplier_login_chk();
        ////////  Fetch company details ////////
        $select = array('company_name');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['company_details1'] = $this->client_master_model->dynamic_get($select,'user_prof_det',$con);
        ////////  Fetch company details 2 ////////
        $select = array('*');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['company_details2'] = $this->client_master_model->dynamic_get($select,'professional_company_det',$con);
        if(count($data['company_details2']) > 0){
            $data['already_exist'] = 1;
            ////////////// Fetch State List /////////////////
            $select = array('id','name');
            $con = array('country_id'=>$data['company_details2'][0]['country_id']);
            $data['state_list'] = $this->client_master_model->dynamic_get($select,'state_list',$con);
            ////////////// Fetch City List /////////////////
            $select = array('id','name');
            $con = array('state_id'=>$data['company_details2'][0]['state_id']);
            $data['city_list'] = $this->client_master_model->dynamic_get($select,'city_list',$con);
        }
        ////////////// Fetch Country List /////////////////
        $select = array('id','name','isd_code');
        $con = array();
        $data['std_list'] = $this->client_master_model->dynamic_get($select,'country_list',$con);
        $this->load->view('supplier/supplier-updateinfo-company-details',$data);
    }
    public function supplier_updateinfo_company_details_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->supplier_login_chk();
        $this->method_chk($this->input->post('submit_frm'), 'Update Now!');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('isd_code', 'ISD Code', 'trim|required');
        $this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('address1', 'Address', 'trim|required');
        $this->form_validation->set_rules('address2', 'Address Line 2', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');
        $this->form_validation->set_rules('city_id', 'City', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('supplier/updateinfo/work-info');
            die;
        } else {
            $data = $this->input->post();
            unset($data['submit_frm']);
            $con = array('userid'=>$this->session->userdata('client_id'));
            $res = $this->client_master_model->dynamic_update('user_prof_det',$con,array('company_name'=>$data['company_name']));
            unset($data['company_name']);
            ////////  check if previous any about us found ////////
            $select = array('id');
            $con = array('user_id'=>$this->session->userdata('client_id'));
            $previous_chk = $this->client_master_model->dynamic_get($select,'professional_company_det',$con);
            if(count($previous_chk) < 1){
                $data['user_id'] = $this->session->userdata('client_id');
                $res = $this->client_master_model->dynamic_insert('professional_company_det',$data);
            }else{
                $con = array('user_id'=>$this->session->userdata('client_id'));
                $res = $this->client_master_model->dynamic_update('professional_company_det',$con,$data);
            }
            $this->session->set_flashdata('sucmsg','About us successfully updated!');
            redirect('supplier/updateinfo/work-info');
        }
    }
    public function supplier_updateinfo_work_info(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->supplier_login_chk();
        ////////////// Fetch Working Field List /////////////////
        $select = array('id','name');
        $con = array('usertype_id'=>4);
        $data['work_list'] = $this->client_master_model->dynamic_get($select,'user_sub_role',$con);
        ////////////// Fetch User Working Field /////////////////
        $select = array('work_field');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['work_filed'] = $this->client_master_model->dynamic_get($select,'user_prof_det',$con);
        ////////////// Fetch User Project details 1 /////////////////
        $select = array('*');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['project_det1'] = $this->client_master_model->dynamic_get($select,'project_details',$con);
        ////////////// Fetch User Project details 2 /////////////////
        $select = array('*');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['project_det2'] = $this->client_master_model->dynamic_get($select,'project_details2',$con);
        
        //echo '<pre>'; print_r($data['project_det2']);die;
        $this->load->view('supplier/supplier-updateinfo-work-info',$data);
    }
    public function supplier_updateinfo_work_info_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->supplier_login_chk();
        $data = $this->input->post();
        ///////////   Update Work Field ////////////
        $con = array('userid'=>$this->session->userdata('client_id'));
        $res = $this->client_master_model->dynamic_update('user_prof_det',$con,array('work_field'=>$data['work_field']));
        $this->session->set_flashdata('sucmsg','Work Info successfully updated!');
        redirect('supplier/updateinfo/upload-pictures');
    }
    public function supplier_updateinfo_upload_pictures(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->supplier_login_chk();
        ////////////// Fetch User thumbnail AND Banner /////////////////
        $select = array('thumnail_image','banner_profile');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['pro_images'] = $this->client_master_model->dynamic_get($select,'user_prof_det',$con);
        ////////////// Fetch User Project /////////////////
        $select = array('image');
        $con = array('user_id'=>$this->session->userdata('client_id'));
        $data['project_images'] = $this->client_master_model->dynamic_get($select,'project_image',$con);
        //echo'<pre>'; print_r($data['project_images']);die;
        $this->load->view('supplier/supplier-updateinfo-upload-pictures',$data);
    }
    public function supplier_updateinfo_upload_pictures_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->supplier_login_chk();
        if($_FILES['thumnail_image']['name'] != ''){
            $config['upload_path']          = 'uploaded_files/thumnail_image/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             =  5000;
            $config['encrypt_name']         =  TRUE;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('thumnail_image')){
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('errmsg', $error);
                redirect('professional/updateinfo/upload-pictures');
                die;
            }else{
                $upload_data = $this->upload->data();
                $data['thumnail_image'] = 'uploaded_files/thumnail_image/'.$upload_data['file_name'];
            }
        }
        if($_FILES['banner_profile']['name'] != ''){
            $config['upload_path']          = 'uploaded_files/banner_profile/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             =  5000;
            $config['encrypt_name']         =  TRUE;

            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('banner_profile')){
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('errmsg', $error);
                redirect('professional/updateinfo/upload-pictures');
                die;
            }else{
                $upload_data = $this->upload->data();
                $data['banner_profile'] = 'uploaded_files/banner_profile/'.$upload_data['file_name'];
            }
        }
        $con = array('userid'=>$this->session->userdata('client_id'));
        $res = $this->client_master_model->dynamic_update('user_prof_det',$con,$data);
        if($_FILES['project_pic']['name'][0] != ''){
           $files = $_FILES['project_pic'];
            $config = array(
            'upload_path'   => 'uploaded_files/project_pic',
            'allowed_types' => 'jpg|jpeg|png|pdf',
            'max_size'      => '5000',
            'encrypt_name'  => TRUE,
            'overwrite'     => 1,                       
            );
            $this->load->library('upload', $config);
            $images = array();
            foreach ($files['name'] as $key => $image) {
                $_FILES['images[]']['name']= $files['name'][$key];
                $_FILES['images[]']['type']= $files['type'][$key];
                $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['images[]']['error']= $files['error'][$key];
                $_FILES['images[]']['size']= $files['size'][$key];
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('images[]')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errmsg',$error);
                    redirect('add-assignment');die;
                }else{
                    $upload_data = $this->upload->data();
                    $data1['image'] = 'uploaded_files/project_pic/'.$upload_data['file_name'];
                    $data1['user_id'] = $this->session->userdata('client_id');
                    $res = $this->client_master_model->dynamic_insert('project_image',$data1);
                }
            }
        }
        $this->session->set_flashdata('sucmsg','Pictures successfully uploaded!');
        redirect('supplier/updateinfo/bank-details');die;
    }
    public function supplier_updateinfo_bank_details(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->supplier_login_chk();
        ////////////// Fetch Country List /////////////////
        $select = array('id','name','isd_code');
        $con = array();
        $data['country_list'] = $this->client_master_model->dynamic_get($select,'country_list',$con);
        ////////////// Fetch Bank Details /////////////////
        $select = array('*');
        $con = array('userid'=>$this->session->userdata('client_id'));
        $data['bank_det'] = $this->client_master_model->dynamic_get($select,'user_prof_bank_det',$con);
        ////////////// Fetch State List /////////////////
        $select = array('id','name');
        $con = array('country_id'=>$data['bank_det'][0]['country_id'],'status'=>0);
        $data['state_list'] = $this->client_master_model->dynamic_get($select,'state_list',$con);
        ////////////// Fetch City List /////////////////
        $select = array('id','name');
        $con = array('state_id'=>$data['bank_det'][0]['state_id'],'status'=>0);
        $data['city_list'] = $this->client_master_model->dynamic_get($select,'city_list',$con);
        
        //echo '<pre>'; print_r($data['city_list']);die;
        $this->load->view('supplier/supplier-updateinfo-bank-details',$data);
    }
    public function supplier_updateinfo_bank_details_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->supplier_login_chk();
        $this->method_chk($this->input->post('sub_btn'), 'Update Now!');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bank_country_id','Bank Location', 'trim|required');
        $this->form_validation->set_rules('account_holder_name','Account holder name', 'trim|required');
        $this->form_validation->set_rules('bank_name','Bank name', 'trim|required');
        $this->form_validation->set_rules('bank_acount_no','Bank account no', 'trim|required');
        $this->form_validation->set_rules('ifsc_code','IFSC code', 'trim|required');
        $this->form_validation->set_rules('micr_code','MICR code', 'trim|required');
        $this->form_validation->set_rules('bank_address','Bank address', 'trim|required');
        $this->form_validation->set_rules('bank_address2','Address line 2', 'trim|required');
        $this->form_validation->set_rules('country_id','country name', 'trim|required');
        $this->form_validation->set_rules('state_id','State name', 'trim|required');
        $this->form_validation->set_rules('city_id','City', 'trim|required');
        $this->form_validation->set_rules('zipcode','Zipcode', 'trim|required');
        $this->form_validation->set_rules('std_code','ISD code', 'trim|required');
        $this->form_validation->set_rules('bank_mobile_no','mobile no', 'trim|required');
        $this->form_validation->set_rules('email','EmailID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('supplier/updateinfo/bank-details');
            die;
        } else {
            $data = $this->input->post();
            unset($data['sub_btn']);
            $con = array('userid'=>$this->session->userdata('client_id'));
            $res1 = $this->client_master_model->dynamic_update('user_prof_bank_det',$con,$data);
            $con = array('id'=>$this->session->userdata('client_id'));
            $res1 = $this->client_master_model->dynamic_update('user_detail',$con,array('is_new_status'=>1));
            redirect('supplier-profile');
        }
    }
    /* add_new_product this function is used to show add product form in frontend */
    public function add_new_product(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->supplier_login_chk();
        ///////// Fetch brand list ////////////
        $select = array('id','name');
        $data['brand_list'] = $this->client_master_model->dynamic_get($select,'brand_master',array('status'=>0));
        ///////// Fetch Category list ////////////
        $select = array('id','name');
        $data['category_list'] = $this->client_master_model->dynamic_get($select,'user_sub_role',array('usertype_id'=>4));
        ///////// Fetch Attribute ////////////
        $select = array('id','name');
        $data['attribute_list'] = $this->client_master_model->dynamic_get($select,'attribute',array('status'=>0));
        
        $this->load->view('supplier/add-new-product',$data);
    }
    /* add_new_product_success this function is used to submit product details into database */
    public function add_new_product_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->supplier_login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('brand_id', 'Brand Name', 'trim|required');
        $this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('sub_category_id', 'Sub Category Name', 'trim|required');
        $this->form_validation->set_rules('product_des', 'Product Details', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('supplier/add-new-product');
            die;
        } else {
            $images = array();
            if($_FILES['product_img']['name'][0] != ''){
                $files = $_FILES['product_img'];
                 $config = array(
                 'upload_path'   => 'uploaded_files/project_pic',
                 'allowed_types' => 'jpg|jpeg|png',
                 'max_size'      => '5000',
                 'encrypt_name'  => TRUE,
                 'overwrite'     => 1,                       
                 );
                 $this->load->library('upload', $config);
                 $images = array();
                 foreach ($files['name'] as $key => $image) {
                     $_FILES['images[]']['name']= $files['name'][$key];
                     $_FILES['images[]']['type']= $files['type'][$key];
                     $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
                     $_FILES['images[]']['error']= $files['error'][$key];
                     $_FILES['images[]']['size']= $files['size'][$key];
                     $this->upload->initialize($config);
                     if(!$this->upload->do_upload('images[]')) {
                         $error = $this->upload->display_errors();
                         $this->session->set_flashdata('errmsg',$error);
                         redirect('supplier/add-new-product');
                         die;
                     }else{
                         $upload_data = $this->upload->data();
                         $images[] = 'uploaded_files/project_pic/'.$upload_data['file_name'];
                     }
                 }
            }
            //////////////// Insert product ////////////////
            $product_data = array();
            $product_data['supplier_id'] = $this->session->userdata('client_id');
            $product_data['name'] = $this->input->post('name');
            $product_data['brand_id'] = $this->input->post('brand_id');
            $product_data['product_des'] = $this->input->post('product_des');
            $product_data['status'] = 1;
            $product_data['created_date'] = date('Y-m-d H:i:s');
            $product_data['created_by'] = $this->session->userdata('admin_id');
            $res = $this->client_master_model->dynamic_insert('temp_product_detail', $product_data);
            if ($res > 0) {
                //////////////// Insert category ////////////////
                $category_data = array();
                $category_data['product_id'] = $res;
                $category_data['category_id'] = $this->input->post('category_id');
                $res1 = $this->client_master_model->dynamic_insert('temp_product_category_map', $category_data);
                //////////////// Insert sub category ////////////////
                $sub_category_data = array();
                $sub_category_data['product_id'] = $res;
                $sub_category_data['sub_cat_id'] = $this->input->post('sub_category_id');
                $res2 = $this->client_master_model->dynamic_insert('temp_product_sub_cat_map', $sub_category_data);
                //////////////// Insert sub category ////////////////
                $about_iteam = $this->input->post('about_iteam');
                foreach($about_iteam as $val){
                    $about_data = array();
                    $about_data['product_id'] = $res;
                    $about_data['about_iteam'] = $val;
                    $res3 = $this->client_master_model->dynamic_insert('temp_about_map', $about_data);
                }
                //////////////// Insert Images ////////////////
                foreach($images as $val){
                    $image_data = array();
                    $image_data['product_id'] = $res;
                    $image_data['image'] = $val;
                    $res4 = $this->client_master_model->dynamic_insert('temp_product_image', $image_data);
                }
                $this->session->set_flashdata('sucmsg', 'Product inserted successfully! Please wait for admin response.');
                redirect('my-products');
                die;
                
            } else {
                $this->session->set_flashdata('errmsg', 'Server error!');
                redirect('admin/product/add-product');
                die;
            }
        }
    }
    /* product_list is used to show procudt list */
    public function product_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->load->view('supplier/product-list');
    }
    ///////////////////////  Private Function ///////////////////
    private function supplier_login_chk(){
        if($this->session->userdata('client_role_id') == 4){
            return 1;
        }else{
            $this->session->set_flashdata('errmsg', 'Invalid request!');
            redirect('');
            die;
        }
    }
    private function professional_login_chk(){
        if($this->session->userdata('client_role_id') == 3){
            return 1;
        }else{
            $this->session->set_flashdata('errmsg', 'Invalid request!');
            redirect('');
            die;
        }
    }
    private function login_chk(){
        if($this->session->userdata('client_id')){
            return 1;
        }else{
            $this->session->set_flashdata('errmsg', 'Invalid request!');
            redirect('');
            die;
        }
    }
    private function method_chk($server_req = '', $permisssion = '') {
        if ($server_req == $permisssion) {
            return 1;
        } else {
            $this->session->set_flashdata('errmsg', 'Invalid request!');
            redirect('');
            die;
        }
    }
}