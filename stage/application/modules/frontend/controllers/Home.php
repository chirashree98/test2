<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

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
        ////////////// City List /////////////////
        $select = array('id', 'name');
        $data['city_list'] = $this->client_master_model->dynamic_get($select, 'city_list',array());
        
        ///////////// Banner data ////////////////
        $select = array('pic_location', 'title','sub_title');
        $data['banner_det'] = $this->client_master_model->dynamic_get($select, 'cms_home_banner',array());
        
        ///////////// Why Benasmart ////////////////
        $select = array('icon', 'titile','sub_title');
        $data['why_ben_det'] = $this->client_master_model->dynamic_get($select, 'cms_home_why_benasmart',array('position'=>0));
        ///////////// Section 2 ////////////////
        $select = array('icon', 'titile','sub_title');
        $data['why_ben_det2'] = $this->client_master_model->dynamic_get($select, 'cms_home_why_benasmart',array('position'=>1));
        ///////////// Home Logo ////////////////
        $select = array('image');
        $data['logo_list'] = $this->client_master_model->dynamic_get($select, 'home_logo',array('status'=>0));
        ///////////// Daily Deals ////////////////
        $select = array('image');
        $data['deals_list'] = $this->client_master_model->dynamic_get($select, 'daily_deals',array('status'=>0));
        
        //echo '<pre>'; print_r($data['deals_list']);die;
        $this->load->view('index',$data);
    }

    public function login() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->load->view('login');
    }

    public function signup(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        ///////// Fetch STD Code /////////////////
        $select = array('id','isd_code');
        $data['std_list'] = $this->client_master_model->dynamic_get($select, 'country_list',array('status'=>0));
        
        $this->load->view('signup',$data);
    }

    public function reg_form_succ() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('sign_up_btn'), 'Sign up now!');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('std_code', 'STD code', 'trim|required');
        $this->form_validation->set_rules('mobile_no', 'Mobile number', 'trim|required|is_unique[user_detail.mobile_no]', array('is_unique'=>'This %s already exists.'));
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required|is_unique[user_detail.email]', array('is_unique'=>'This %s already exists.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('signup');
            die;
        } else {
            $data = array();
            $data = $this->input->post();
            $data['password'] = base64_encode($this->input->post('password'));
            $data['role_id'] = '2';
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = '0';
            unset($data['sign_up_btn']);

            $user_det = $this->client_master_model->dynamic_insert('user_detail', $data);
            if ($user_det > 0) {
                $this->session->set_flashdata('sucmsg', 'Registration successfully done!');
                redirect('');
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Server error!');
                redirect('signup');
                die;
            }
        }
    }

    public function client_login_suc() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('client-login'), 'Sign in now!');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $return_url = $this->input->post('return_url');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect($return_url);
            die;
        } else {
            $data = array();
            $data = $this->input->post();
            $data['password'] = base64_encode($this->input->post('password'));
            $data['role_id'] = '2';
            $data['status'] = '0';
            unset($data['client-login']);
            unset($data['return_url']);

            $select = array('id', 'role_id', 'role_id');
            $user_det = $this->client_master_model->dynamic_get($select, 'user_detail', $data);

            if (count($user_det) > 0) {
                $this->session->set_flashdata('sucmsg', 'Login successfully done!');
                $this->session->set_userdata('client_id', $user_det[0]['id']);
                $this->session->set_userdata('client_role_id', $user_det[0]['role_id']);
                redirect('my-profile');
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Invalid EmailID or Password !');
                redirect($return_url);
                die;
            }
        }
    }

    public function client_dashboard() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->load->view('client-dashboard');
    }

    public function google_sign_up() {
        require_once APPPATH . 'third_party/src/Google_Client.php';
        require_once APPPATH . 'third_party/src/contrib/Google_Oauth2Service.php';
        $clientId = '867200822651-ai97r1obcbo1e2lt00k6upuvnqt7t107.apps.googleusercontent.com'; //Google client ID
        $clientSecret = 'ZKooK4pAZmF0b4TfSEXWv9r0'; //Google client secret
        $redirectURL = base_url('google-sign-up');

        //https://curl.haxx.se/docs/caextract.html
        //Call Google API
        $gClient = new Google_Client();
        $gClient->setApplicationName('benasmart');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_GET['code'])) {
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
            $gClient->setAccessToken($_SESSION['token']);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            $data = array('email' => $userProfile['email'], 'role_id' => 2);
            $select = array('id', 'role_id', 'role_id');
            $user_det = $this->client_master_model->dynamic_get($select, 'user_detail', $data);
            if (count($user_det) > 0) {
                $this->session->set_flashdata('sucmsg', 'Login successfully done!');
                $this->session->set_userdata('client_id', $user_det[0]['id']);
                $this->session->set_userdata('client_role_id', $user_det[0]['role_id']);
                redirect('');
            } else {
                $new_det = array('name' => $userProfile['name'], 'email' => $userProfile['email'], 'goo_veri_id' => $userProfile['id'], 'role_id' => 2, 'created_date' => date('Y-m-d H:i:s'), 'created_by' => 0, 'reg_by' => 1);
                $user_det_ins = $this->client_master_model->dynamic_insert('user_detail', $new_det);
                if ($user_det_ins > 0) {
                    $this->session->set_flashdata('sucmsg', 'Login successfully done!');
                    $this->session->set_userdata('client_id', $user_det_ins);
                    $this->session->set_userdata('client_role_id', 2);
                    redirect('');
                    die;
                } else {
                    $this->session->set_flashdata('errmsg', 'Server error!');
                    redirect('signup');
                    die;
                }
            }
        } else {
            $url = $gClient->createAuthUrl();
            header("Location: $url");
            exit;
        }
    }
//    public function facebook_sign_up() {
//        $userData = array(); 
//         
//        // Authenticate user with facebook 
//        if($this->facebook->is_authenticated()){
//            // Get user info from facebook 
//            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
//            echo '<pre>'; print_r($fbUser);die;
//            // Preparing data for database insertion 
//            $userData['oauth_provider'] = 'facebook'; 
//            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
//            $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
//            $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
//            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
//            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
//            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
//            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
//             
//            // Insert or update user data to the database 
//            $userID = $this->user->checkUser($userData); 
//             
//            // Check user data insert or update status 
//            if(!empty($userID)){
//                $data['userData'] = $userData; 
//                 
//                // Store the user profile info into session 
//                $this->session->set_userdata('userData', $userData); 
//            }else{ 
//               $data['userData'] = array(); 
//            } 
//             
//            // Facebook logout URL 
//            $data['logoutURL'] = $this->facebook->logout_url(); 
//        }else{ 
//            // Facebook authentication url 
//            $data['authURL'] =  $this->facebook->login_url(); 
//        } 
//        
//        redirect($data['authURL']);die;
//    }
    
    public function facebook_sign_up() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->load->library('facebook');
        $userData = array();
        if ($this->facebook->is_authenticated()) {
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');
            $data = array('email' => $fbUser['email'], 'role_id' => 2);
            $select = array('id', 'role_id', 'role_id');
            $user_det = $this->client_master_model->dynamic_get($select, 'user_detail', $data);
            if (count($user_det) > 0) {
                $this->session->set_flashdata('sucmsg', 'Login successfully done!');
                $this->session->set_userdata('client_id', $user_det[0]['id']);
                $this->session->set_userdata('client_role_id', $user_det[0]['role_id']);
                redirect('');
            } else {
                $new_det = array('name' => $fbUser['first_name'].' '.$fbUser['last_name'], 'email' => $fbUser['email'], 'goo_veri_id' => $fbUser['id'], 'role_id' => 2, 'created_date' => date('Y-m-d H:i:s'), 'created_by' => 0, 'reg_by' => 2);
                $user_det_ins = $this->client_master_model->dynamic_insert('user_detail', $new_det);
                if ($user_det_ins > 0) {
                    $this->session->set_flashdata('sucmsg', 'Login successfully done!');
                    $this->session->set_userdata('client_id', $user_det_ins);
                    $this->session->set_userdata('client_role_id', 2);
                    redirect('');
                    die;
                } else {
                    $this->session->set_flashdata('errmsg', 'Server error!');
                    redirect('signup');
                    die;
                }
            }
        } else {
            $data['authURL'] =  $this->facebook->login_url(); 
        }
        redirect($data['authURL']);die;
    }
//    public function professional_registration(){
//        $this->method_chk($_SERVER['REQUEST_METHOD'],'GET');
//        /////////////// User Role Fetch //////////////
//        $select = array('id', 'name');
//        $con = array('id >'=>2,'id <'=>5);
//        $data['role_list'] = $this->client_master_model->dynamic_get($select,'user_role_master',$con);
//        /////////////// Country List Fetch //////////////
//        $select = array('id', 'name');
//        $con = array('status'=>0);
//        $data['country_list'] = $this->client_master_model->dynamic_get($select,'country_list',$con);
//        
//        $this->load->view('professional-registration',$data);
//    }
    /* professional_registration2  */
    public function professional_registration(){
        $this->method_chk($_SERVER['REQUEST_METHOD'],'GET');
        /////////////// Country List Fetch //////////////
        $select = array('id', 'name');
        $con = array('status'=>0);
        $data['country_list'] = $this->client_master_model->dynamic_get($select,'country_list',$con);
        /////////////// Fetch Work Field//////////////
        $select = array('id','name');
        $con = array('usertype_id'=>3,'status'=>0);
        $data['work_list'] = $this->client_master_model->dynamic_get($select,'user_sub_role',$con);
        /////////////// Fetch Work Field//////////////
        $select = array('id','name');
        $con = array('skill_for'=>'professional','status'=>'0');
        $data['skill_list'] = $this->client_master_model->dynamic_get($select,'skills',$con);
        ///////// Fetch ISD Code /////////////////
        $select = array('id','isd_code');
        $data['std_list'] = $this->client_master_model->dynamic_get($select, 'country_list',array('status'=>0));
        
        $this->load->view('professional-registration-v2',$data);
    }
    public function professional_registration_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_name', 'Compaby Name', 'trim|required');
//        $this->form_validation->set_rules('address1', 'Address', 'trim|required');
//        $this->form_validation->set_rules('address2', 'Address Line 2', 'trim|required');
//        $this->form_validation->set_rules('country_id', 'Country Name', 'trim|required');
//        $this->form_validation->set_rules('state_id', 'State Name', 'trim|required');
//        $this->form_validation->set_rules('city_id', 'City Name', 'trim|required');
//        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
//        $this->form_validation->set_rules('work_field', 'Work Field', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg',$error);
            $response = array('status'=>0,'message'=>$error);
            echo json_encode($response);
            die;
        } else {
            $config['upload_path']          = 'uploaded_files/company_logo/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             =  5000;
//            $config['encrypt_name']         =  TRUE;
            $config['file_name'] = 'company_logo_'.time();
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('company_logo')){
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('errmsg', $error);
                $response = array('status'=>0,'message'=>$error);
                echo json_encode($response);
                die;
            }else{
                $upload_data = $this->upload->data();
                $data['company_logo'] = 'uploaded_files/company_logo/'.$upload_data['file_name'];
            }
            $this->session->set_userdata('pro_reg_contact',$data);
            $response = array('status'=>1,'message'=>'');
            echo json_encode($response);
            die;
        }
    }
    public function professional_registration_contact(){
        $this->method_chk($_SERVER['REQUEST_METHOD'],'GET');
        $company_page_det = $this->session->userdata('pro_reg_contact');
        if($company_page_det['pro_reg_1'] != 'Continue with Contact Info'){
            $this->session->set_flashdata('errmsg','Fillup company Info first!');
            redirect('professional-registration');die;
        }
        $this->load->view('professional-registration-contact');
    }
    public function professional_registration_contact_succ(){
        $response = array('status'=>0,'message'=>$_POST);
        echo json_encode($response);
        die;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required|is_unique[user_detail.email]', array('is_unique'=>'This %s already exists.'));
        $this->form_validation->set_rules('password1', 'Password', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            $response = array('status'=>0,'message'=>$error);
            echo json_encode($response);
            die;
        }else{
            $data = $this->input->post();
            $this->session->set_userdata('pro_reg_contact_2',$data);
            $response = array('status'=>1,'message'=>'form 2 submitted');
            echo json_encode($response);
            die;
        }
    }
    public function professional_registration_bank(){
        $this->method_chk($_SERVER['REQUEST_METHOD'],'GET');
        $company_page_det = $this->session->userdata('pro_reg_contact_2');
        if($company_page_det['pro_reg_contact'] != 'Continue with Bank Account'){
            $this->session->set_flashdata('errmsg','Fillup contact Info first!');
            redirect('professional-registration-contact');die;
        }
        ///////////////  Fetch Country Details ///////////////
        $select = array('id', 'name');
        $con = array('status'=>0);
        $data['country_list'] = $this->client_master_model->dynamic_get($select,'country_list',$con);
        ///////// Fetch STD Code /////////////////
        $select = array('id','isd_code');
        $data['std_list'] = $this->client_master_model->dynamic_get($select, 'country_list',array('status'=>0));
        
        $this->load->view('professional-registration-bank',$data);
    }
    public function professional_registration_complete(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->load->library('form_validation');
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
            $response = array('status'=>0,'message'=>$error);
            echo json_encode($response);
            die;
            die;
        }else{
            $data = $this->input->post();
            $pro_reg_contact = $this->session->userdata('pro_reg_contact');
            $pro_reg_contact_2 = $this->session->userdata('pro_reg_contact_2');
            /////////////////////// User Details Insertion //////////////////////
            $user_detail_data = array();
            $user_detail_data['role_id'] = $pro_reg_contact['role_id'];
            $user_detail_data['name'] = $pro_reg_contact_2['name'];
            $user_detail_data['email'] = $pro_reg_contact_2['email'];
            $user_detail_data['password'] = base64_encode($pro_reg_contact_2['password1']);
            $user_detail_data['std_code'] = $data['std_code'];
            $user_detail_data['mobile_no'] = $data['bank_mobile_no'];
            $user_detail_data['status'] = 1;
            $user_detail_data['reg_by'] = 0;
            $user_detail_data['reg_using'] = 0;
            $user_detail_data['created_date'] = date('Y-m-d H:i:s');
            $user_detail_data['created_by'] = 0;
            $res = $this->client_master_model->dynamic_insert('user_detail', $user_detail_data);
            $email_veri = $this->client_master_model->verification_mail($pro_reg_contact_2['email'],$res);
            /////////////////////// Project Details Insertion /////////////////////////////
            $project_details = array();
            $i = 0;
            foreach($pro_reg_contact['project_name'] as $val){
                $project_details['user_id'] = $res;
                $project_details['project_name'] = $pro_reg_contact['project_name'][$i];
                $project_details['fess_p_hour'] = $pro_reg_contact['fess_p_hour'][$i];
                $project_details['fees_p_s_feet'] = $pro_reg_contact['fees_p_s_feet'][$i];
                $i++;
                $res4 = $this->client_master_model->dynamic_insert('project_details', $project_details);
            }
            /////////////////////// Project Details 1 Insertion /////////////////////////////
            $project_details1 = array();
            $i = 0;
            foreach($pro_reg_contact['fees_project_name'] as $val){
                $project_details1['user_id'] = $res;
                $project_details1['fees_project_name'] = $pro_reg_contact['fees_project_name'][$i];
                $project_details1['project_fees'] = $pro_reg_contact['project_fees'][$i];
                $i++;
                $res3 = $this->client_master_model->dynamic_insert('project_details2', $project_details1);
            }
            //////////////////////  User Professional Details Insertion //////////////////
            $professional_details = array();
            $professional_details['userid'] = $res;
            $professional_details['company_name'] = $pro_reg_contact['company_name'];
            $professional_details['address1'] = $pro_reg_contact['address1'];
            $professional_details['address2'] = $pro_reg_contact['address2'];
            $professional_details['country_id'] = $pro_reg_contact['country_id'];
            $professional_details['city_id'] = $pro_reg_contact['city_id'];
            $professional_details['state_id'] = $pro_reg_contact['state_id'];
            $professional_details['zipcode'] = $pro_reg_contact['zipcode'];
            $professional_details['work_field'] = $pro_reg_contact['work_field'];
            $professional_details['company_logo'] = $pro_reg_contact['company_logo'];
            $res1 = $this->client_master_model->dynamic_insert('user_prof_det', $professional_details);
            
            /////////////////////// User Bank Details Insertion //////////////////////////
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
            $res2 = $this->client_master_model->dynamic_insert('user_prof_bank_det', $professional_bank_details);
            
            /////////////////////// User Skill Insertion //////////////////////////
            foreach($pro_reg_contact['taxonomy-new-tags'] as $val){
                $professional_skill = array();
                $professional_skill['user_id'] = $res;
                $professional_skill['skill'] = $val;
                $res2 = $this->client_master_model->dynamic_insert('users_skill', $professional_skill);
            }
            
            
            $this->session->set_flashdata('sucmsg','Successfully registred. Go to your mailbox and verify it.');
            redirect('');
            die;
        }
    }

    public function cli_logout() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->session->unset_userdata('client_id');
        $this->session->unset_userdata('client_role_id');
        $this->session->set_flashdata('sucmsg', 'Logout successfully done!');
        redirect('');
        die;
    }
    public function professional_login(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $data = array();
        $this->load->view('form/professional-login',$data);
    }
    public function professional_login_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('pro-login'), 'Sign in now!');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $return_url = $this->input->post('return_url');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect($return_url);
            die;
        } else {
            $data = array();
            $data = $this->input->post();
            $data['password'] = base64_encode($this->input->post('password'));
            $data['status']   = '0';
            unset($data['client-login']);
            unset($data['return_url']);
            $select = array('id','role_id');
            $user_det = $this->client_master_model->professional_login_chk($select,$data);
            if (count($user_det) > 0) {
                $this->session->set_flashdata('sucmsg', 'Login successfully done!');
                $this->session->set_userdata('client_id', $user_det[0]['id']);
                $this->session->set_userdata('client_role_id', $user_det[0]['role_id']);
                if($user_det[0]['role_id'] == 3){
                    redirect('professional-profile');
                }elseif($user_det[0]['role_id'] == 4){
                    redirect('supplier-profile');
                }else{
                    redirect('my-profile');
                }
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Invalid EmailID or Password !');
                redirect($return_url);
                die;
            }
        }
    }
    public function supplier_login(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $data = array();
        $this->load->view('form/supplier-login',$data);
    }
    /*supplier_updateinfo_personal is used to update supplier personal details */
    public function supplier_updateinfo_personal(){
        
    }
    
    public function forget_password(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->load->view('forget-password');
    }
    public function forget_password_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('sign_up_btn'), 'Verify');
        $insert_data = array();
        $insert_data = $this->input->post();
        if ($insert_data['email'] == '') {
            $this->session->set_flashdata('errmsg','Please enter emailid.');
            redirect('forget-password');
            die;
        }else {
            $customer_det = $this->client_master_model->get_customer_existense($insert_data['email']);
            if (count($customer_det) > 0) {
                $customer_det1 = $this->client_master_model->get_customer_status_name(array('id','name'),$insert_data['email']);
                if (count($customer_det1) > 0) {
                    $data['otp'] = '1'.rand(100,999);
                    $data['subject'] = 'Your password reset instructions';
                    $data['email'] = $insert_data['email'];
                    $data['name'] = $customer_det1[0]['name'];
                    $mail_status = $this->client_master_model->sent_mail_with_template('otp',$data);
                    if($mail_status){
                        $otp_det['otp'] = $data['otp'];
                        $otp_det['email'] = $data['email'];
                        $otp_det['user_id'] = $customer_det1[0]['id'];
                        $otp_det['created_date'] = date('Y-m-d H:i:s');
                        $this->client_master_model->dynamic_insert('otp_log',$otp_det);
                        $this->session->set_flashdata('sucmsg','otp sent successfully to your registred mailid!');
                        redirect('forget-password-verify-otp/'.smart_encode($customer_det1[0]['id']));
                        die;
                    }else{
                        $this->session->set_flashdata('errmsg','mail server error!');
                        redirect('forget-password');
                        die;
                    }
                }else{
                    $this->session->set_flashdata('errmsg','Account is not active!');
                    redirect('forget-password');
                    die;
                }
            } else {
                $this->session->set_flashdata('errmsg','Email or mobile number not exist!');
                redirect('forget-password');
                die;
            }
        }
    }
    public function forget_password_verify_otp($en_user_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $data['user_id'] = smart_decode($en_user_id);
        $this->load->view('forget-password-verify-otp',$data);
    }
    public function forget_password_verify_otp_success(){
        $this->load->library('form_validation');
        $user_id = $this->input->post('TRXTR');
        $this->form_validation->set_rules('TRXTR', 'ID', 'trim|required');
        $this->form_validation->set_rules('otp', 'OTP', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('forget-password-verify-otp/'.smart_encode($user_id));
            die;
        } else {
            $select = array('id');
            $con = array('user_id'=>$this->input->post('TRXTR'),'otp'=>$this->input->post('otp'),'status'=>0);
            $otp_det = $this->client_master_model->dynamic_get($select,'otp_log',$con);
            if(count($otp_det) > 0){
                /////   update password ////
                $con = array('id'=>$this->input->post('TRXTR'));
                $data = array();
                $data['password'] = base64_encode($this->input->post('password1'));
                $password_update = $this->client_master_model->dynamic_update('user_detail',$con,$data);
                /////   update otp ////
                $con = array('id'=>$otp_det[0]['id']);
                $data = array();
                $data['status'] = 1;
                $password_otp = $this->client_master_model->dynamic_update('otp_log',$con,$data);
                $this->session->set_flashdata('sucmsg','Password Successfully changed!');
                redirect('');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Invalid OTP!');
                redirect('forget-password-verify-otp/'.smart_encode($user_id));
                die;
            }
        }
    }
    public function supplier_registration(){
        $this->load->view('supplier-registration');
    }
    public function professional_mail_verify($en_user_id = ''){
        $con = array('id'=>smart_decode($en_user_id));
        $res = $this->client_master_model->dynamic_update('user_detail',$con,array('mail_verification'=>1));
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Email Verification completed! Please wait for admin approval!');
            redirect('');
        }else{
            $this->session->set_flashdata('errmsg', 'Email Verification failed! Please try again after some time!');
            redirect('');
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

}
