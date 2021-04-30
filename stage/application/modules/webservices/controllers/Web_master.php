<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web_master extends MX_Controller {

    public function __construct() {        
        header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json, charset=utf-8');
        parent::__construct();
        $this->load->model('web_master_model');
        $this->load->helper('smart_helper');
    }

    public function index() {
//        if ($this->method_chk($_SERVER['REQUEST_METHOD'], 'POST')) {
//            $this->load->library('form_validation');
//            $this->form_validation->set_rules('name', 'Name', 'trim|required', array('required' => 'You have not provided %s.'));
//            $this->form_validation->set_rules('std_code', 'STD code', 'trim|required', array('required' => 'You have not provided %s.'));
//            $this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|required|is_unique[user_detail.mobile_no]', array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
//            $this->form_validation->set_rules('email', 'EmailID', 'trim|required|valid_email|is_unique[user_detail.email]', array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
//            $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'You have not provided %s.'));
//            if ($this->form_validation->run() == FALSE) {
//                $error = validation_errors();
//                $data = array();
//                $data['success'] = false;
//                $data['message'] = 'Validation Error!';
//                $data['data'] = $error;
//                echo json_encode($data);
//            } else {
        $insert_data = array();
        $insert_data = json_decode(file_get_contents('php://input'), true);
        //echo'<pre>'; print_r($insert_data);die;

        if ($insert_data['email'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter email.';
        } else if ($insert_data['mobile_no'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter mobile no';
        } else if ($insert_data['name'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter name';
        } else if ($insert_data['password'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter password';
        } else if ($insert_data['std_code'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter std code';
        } else {
            ////// Fetch Previous email ////////
            $select = array('id');
            $previous_data = $this->web_master_model->dynamic_get($select,'user_detail',array('email'=>$insert_data['email']));
            if(count($previous_data) > 0){
                $data['success'] = false;
                $data['message'] = 'EmailID already exist!';
                $data['data'] = '';
                echo json_encode($data);die;
            }
            ////// Fetch Previous Phone ////////
            $select = array('id');
            $previous_data = $this->web_master_model->dynamic_get($select,'user_detail',array('mobile_no'=>$insert_data['mobile_no']));
            if(count($previous_data) > 0){
                $data['success'] = false;
                $data['message'] = 'Mobile no. already exist!';
                $data['data'] = '';
                echo json_encode($data);die;
            }
            
            $insert_data['password'] = base64_encode($insert_data['password']);
            $insert_data['role_id'] = 2;
            $insert_data['reg_by'] = 1;
            $insert_data['reg_using'] = 0;
            $insert_data['created_date'] = date('Y-m-d H:i:s');
            $res = $this->web_master_model->dynamic_insert('user_detail', $insert_data);
            if ($res > 0) {
                $data = array();
                $data['success'] = true;
                $data['message'] = 'user registration successful!';
                $data['data'] = array('last_ins_id' => $res, 'email' => $insert_data['email']);
//                echo json_encode($data);
            } else {
                $data = array();
                $data['success'] = false;
                $data['message'] = 'Server error!';
                $data['data'] = '';
//                echo json_encode($data);
            }
        }
        
         echo json_encode($data);
//            }
//        } else {
//            $data = array();
//            $data['success'] = false;
//            $data['message'] = 'Invalid request!';
//            $data['data'] = '';
//            echo json_encode($data);
//        }
    }

    public function login() {
//        if ($this->method_chk($_SERVER['REQUEST_METHOD'], 'POST')) {
//            $this->load->library('form_validation');
//            $this->form_validation->set_rules('username', 'Username or Mobile No.', 'trim|required', array('required' => 'You have not provided %s.'));
//            $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'You have not provided %s.'));
//            if ($this->form_validation->run() == FALSE) {
//                $error = validation_errors();
//                $data = array();
//                $data['success'] = false;
//                $data['message'] = 'Validation Error!';
//                $data['data'] = $error;
//                echo json_encode($data);
//            } else {
//                $post_data = $this->input->post();
        $insert_data = array();
        $insert_data = json_decode(file_get_contents('php://input'), true);
        //echo'<pre>'; print_r($insert_data);die;

        if ($insert_data['username'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter username.';
        }  else if ($insert_data['password'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter password';
        } else {
            
            $login_data = $this->web_master_model->app_login($insert_data);
            if (count($login_data) > 0) {
                $auth_arr = array();
                $auth_arr['user_id'] = $login_data[0]['id'];
                $auth_arr['auth_key'] = 'benasmartkey' . time() . rand(1111, 9999) . 'key' . $login_data[0]['id'];
                $auth_arr['login_time'] = date('Y-m-d H:i:s');
                $res = $this->web_master_model->dynamic_insert('user_login_record', $auth_arr);
                if ($res > 0) {
                    $log_ret_data = array();
                    $log_ret_data['user_id'] = $auth_arr['user_id'];
                    $log_ret_data['auth_key'] = $auth_arr['auth_key'];
                    $log_ret_data['user_email'] = $login_data[0]['email'];
                    $log_ret_data['user_name'] = $login_data[0]['name'];
                    $data = array();
                    $data['success'] = true;
                    $data['message'] = 'user login successful!';
                    $data['data'] = $log_ret_data;
                    echo json_encode($data);
                } else {
                    $data = array();
                    $data['success'] = false;
                    $data['message'] = 'Server error!';
                    $data['data'] = '';
                    echo json_encode($data);
                }
            } else {
                $data = array();
                $data['success'] = false;
                $data['message'] = 'Username or password invalid!';
                $data['data'] = '';
                echo json_encode($data);
            }
        }
    }
    public function app_get_all_isd_with_country(){
        if ($this->method_chk($_SERVER['REQUEST_METHOD'], 'GET')) {
            ////// Fetch isd code ////////
            $select = array('id','name','isd_code');
            $country_list = $this->web_master_model->dynamic_get($select,'country_list',array());
            
            $data = array();
            $data['success'] = true;
            $data['message'] = 'successfully fetched country list!';
            $data['data'] = $country_list;
            echo json_encode($data);
        }else{
            $data = array();
            $data['success'] = false;
            $data['message'] = 'Invalid request!';
            $data['data'] = '';
            echo json_encode($data);
        }
    }
    public function forget_otp_generation(){
        $insert_data = array();
        $insert_data = json_decode(file_get_contents('php://input'), true);
        if ($insert_data['email'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter emailid.';
        }else {
            $customer_det = $this->web_master_model->dynamic_get(array('id'),'user_detail',array('email'=>$insert_data['email']));
            if (count($customer_det) > 0) {
                $customer_det1 = $this->web_master_model->dynamic_get(array('id','name'),'user_detail',array('email'=>$insert_data['email'],'status'=>0));
                if (count($customer_det1) > 0) {
                    $data['otp'] = '1'.rand(100,999);
                    $data['subject'] = 'Your password reset instructions';
                    $data['email'] = $insert_data['email'];
                    $data['name'] = $customer_det1[0]['name'];
                    //$mail_status = send_template_mail('otp',$data);
                    $mail_status = $this->web_master_model->sent_mail_with_template('otp',$data);
                    if($mail_status){
                        $otp_det['otp'] = $data['otp'];
                        $otp_det['email'] = $data['email'];
                        $otp_det['created_date'] = date('Y-m-d H:i:s');
                        $this->web_master_model->dynamic_insert('otp_log',$otp_det);
                        $data = array();
                        $data['success'] = true;
                        $data['message'] = 'otp sent successfully!';
                        $data['data'] = '';
                        echo json_encode($data);
                    }else{
                        $data = array();
                        $data['success'] = false;
                        $data['message'] = 'mail server error!';
                        $data['data'] = '';
                        echo json_encode($data);
                    }
                }else{
                    $data = array();
                    $data['success'] = false;
                    $data['message'] = 'Account is not active!';
                    $data['data'] = '';
                    echo json_encode($data);
                }
            } else {
                $data = array();
                $data['success'] = false;
                $data['message'] = 'Email not exist!';
                $data['data'] = '';
                echo json_encode($data);
            }
        }
    }
    public function forget_verify_otp(){
        $insert_data = array();
        $insert_data = json_decode(file_get_contents('php://input'), true);
        if ($insert_data['email'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter emailid.';
        }elseif($insert_data['otp'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter otp.';
        }elseif($insert_data['password'] == '') {
            $data['status'] = 'error';
            $data['message'] = 'Please enter new password';
        }else {
            $data1['otp'] = $insert_data['otp'];
            $data1['email'] = $insert_data['email'];
            $data1['status'] = '0';
            $customer_det = $this->web_master_model->dynamic_get(array('id'),'otp_log',$data1);
            if (count($customer_det) > 0) {
                $update = $this->web_master_model->dynamic_update('user_detail',array('email'=>$data1['email']),array('password'=> base64_encode($insert_data['password'])));
                $update_otp = $this->web_master_model->dynamic_update('otp_log',array('id'=>$customer_det[0]['id']),array('status'=>1));
                $data = array();
                $data['success'] = true;
                $data['message'] = 'Password successfully changed!';
                $data['data'] = '';
                echo json_encode($data);
            } else {
                $data = array();
                $data['success'] = false;
                $data['message'] = 'otp or email is invalid!';
                $data['data'] = '';
                echo json_encode($data);
            }
        }
    }

    ///////////////////////  Private Function ///////////////////
    private function method_chk($server_req = '', $permisssion = '') {
        if ($server_req == $permisssion) {
            return 1;
        } else {
            return 0;
        }
    }

    private function login_chk() {
        if ($this->session->userdata('admin_id')) {
            return 1;
        } else {
            return 0;
        }
    }

}
