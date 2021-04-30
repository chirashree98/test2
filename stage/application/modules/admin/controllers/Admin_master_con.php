<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_master_con extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_master_model');
        $this->load->helper('smart_helper');
    }

    public function index() {
        $this->load->view('form/admin-login');
    }

    public function smart_login_success() {
        $this->method_chk($_SERVER['REQUEST_METHOD'],'POST');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_id', 'EmailID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $error = validation_errors();
            $this->session->set_flashdata('errmsg',$error);
            redirect('admin');die;
        }else{
            $data = array();
            $data['email'] = $this->input->post('email_id');
            $data['password'] = base64_encode($this->input->post('password'));
            $data['role_id'] = 1;
            $select = array('id','role_id');
            $user_det = $this->admin_master_model->dynamic_get($select,'user_detail',$data);
            if(count($user_det) > 0){
                $this->session->set_userdata('admin_id',$user_det[0]['id']);
                $this->session->set_userdata('admin_role_id',$user_det[0]['role_id']);
                redirect('admin/dashboard');die;
            }else{
                $this->session->set_flashdata('errmsg','Invalid emailid or password!');
                redirect('admin');die;
            }
        }
    }
    public function smart_dashboard(){
        $this->method_chk($_SERVER['REQUEST_METHOD'],'GET');
        $this->login_chk();
//        $this->load->view('includes/pre-header');
//        $this->load->view('includes/sidebar');
//        $this->load->view('includes/header');
        $this->load->view('dashboard');
//        $this->load->view('includes/footer');
    }
    public function logout(){
        $this->method_chk($_SERVER['REQUEST_METHOD'],'GET');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_role_id');
        $this->session->set_flashdata('errmsg','Logout successfully done!');
        redirect('');die;
    }
    ///////////////////////  Private Function ///////////////////
    private function method_chk($server_req = '',$permisssion = ''){
        if($server_req == $permisssion){
            return 1;
        }else{
            $this->session->set_flashdata('errmsg','Invalid request!');
            redirect('');die;
        }
    }
    private function login_chk(){
        if($this->session->userdata('admin_id')){
            return 1;
        }else{
            $this->session->set_flashdata('errmsg','Invalid request!');
            redirect('');die;
        }
    }
}
