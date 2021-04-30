<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MX_Controller {

    public $user = "";

    public function __construct() {
        parent::__construct();
        $this->load->model('client_master_model');
    }

    public function index() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        
        $select = array('name','email','std_code','mobile_no');
        $con = array('id' => $this->session->userdata('client_id'));
        $data['user_det'] = $this->client_master_model->dynamic_get($select, 'user_detail', $con);
        $this->load->view('my-profile',$data);
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
    private function login_chk(){
        if($this->session->userdata('client_id')){
            return 1;
        }else{
            $this->session->set_flashdata('errmsg','Login first to access this option!');
            redirect('');
        }
    }

}
