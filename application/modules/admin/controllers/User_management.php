<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'html', 'text', 'smart_helper'));
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
            $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user_detail.email]', array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|required|is_unique[user_detail.mobile_no]', array('is_unique' => 'This %s already exists.'));
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
        $con = array('id' => 2);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select, 'user_role_master', $con);
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

    public function user_type() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'User Type List';
        $select = array('id', 'name');
        $con = array('id >' => 1);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select, 'user_role_master', $con);
        $this->load->view('list/user-type', $data);
    }

    public function edit_user($en_id = '') {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        $data['title'] = 'Update Customer Details';
        //////   Fetch User Role List /////////
        $select = array('id', 'name');
        $con = array('id' => 2);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select, 'user_role_master', $con);
        //////   Fetch User Role List /////////
        $select = array('id', 'role_id', 'name', 'email', 'password', 'std_code', 'mobile_no');
        $con = array('id ' => $id);
        $data['user_details'] = $this->admin_master_model->dynamic_get($select, 'user_detail', $con);

        $this->load->view('users/edit-user', $data);
    }

    public function edit_user_success() {
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
            redirect('admin/user/edit-user/' . smart_encode($user_id));
            die;
        } else {
            $data = $this->input->post();
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            $data['password'] = base64_encode($data['password']);
            unset($data['frm_sub']);
            unset($data['TRXTR']);
            unset($data['con_password']);
            $con = array('id' => $user_id);
            $res = $this->admin_master_model->dynamic_update('user_detail', $con, $data);
            if ($res > 0) {
                $this->session->set_flashdata('sucmsg', 'User successfully Updated!');
                redirect('admin/user-list');
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Server error!');
                redirect('admin/user/edit-user/' . smart_encode($user_id));
                die;
            }
        }
    }

    /* professional_list function Show the list of all professional and supplier user list */

    public function professional_list() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Professional List';
        $data['user_list'] = $this->custom_model->getAllProfessionalUserData(3);
        $this->load->view('users/professional-list', $data);
    }

    /* professional_list function Show the list of all supplier user list */

    public function supplier_list() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Supplier List';
        $data['user_list'] = $this->custom_model->getAllProfessionalUserData(4);

        $this->load->view('users/supplier-list', $data);
    }

    /* add_new_professional() function gives an option to add new professional or supplier */

    public function add_new_professional() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Professional';

        /////////// Fetch working field //////////
        $select = array('id', 'name');
        $con = array('usertype_id' => 3, 'status' => 0);
        $data['working_fields'] = $this->admin_master_model->dynamic_get($select, 'user_sub_role', $con);

        /////////// Fetch Country List //////////
        $select = array('id', 'name', 'isd_code');
        $con = array('status' => 0);
        $data['country_list'] = $this->admin_master_model->dynamic_get($select, 'country_list', $con);

        /////////// Fetch Subrole List //////////
        $select = array('id', 'name');
        $con = array();
        $data['subrole'] = $this->admin_master_model->dynamic_get($select, 'user_sub_role', $con);

        /////////// Fetch professional skill //////////
        $select = array('id', 'name');
        $con = array('skill_for' => 'professional', 'status' => '1');
        $data['skill_list'] = $this->admin_master_model->dynamic_get($select, 'skills', $con);

        //echo'<pre>'; print_r($data['skill_list']);die;
        $this->load->view('users/add-new-professional', $data);
    }

    /* add_new_professional_succ this funtion is used to insert new professional user details */

    public function add_new_professional_succ() {
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
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required|is_unique[user_detail.email]', array('is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('password1', 'Password', 'trim|required');
        $this->form_validation->set_rules('bank_country_id', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required');
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
        $this->form_validation->set_rules('bank_acount_no', 'Bank Account No.', 'trim|required');
        $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required');
        $this->form_validation->set_rules('micr_code', 'MICR Code', 'trim|required');
        $this->form_validation->set_rules('bank_address', 'Bank Address', 'trim|required');
        $this->form_validation->set_rules('std_code_personal', 'ISD Code', 'trim|required');
        $this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|required|is_unique[user_detail.mobile_no]', array('is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/user/add-new-professional');
            die;
        } else {
            $data = $this->input->post();
            $config['upload_path'] = 'uploaded_files/company_logo/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5000;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('thumnail_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('errmsg', $error);
                redirect('admin/user/add-new-professional');
                die;
            } else {
                $upload_data = $this->upload->data();
                $data['thumnail_image'] = 'uploaded_files/company_logo/' . $upload_data['file_name'];
            }

            $config['upload_path'] = 'uploaded_files/company_logo/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5000;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('banner_profile')) {
//                $error = $this->upload->display_errors();
//                $this->session->set_flashdata('errmsg', $error);
//                redirect('admin/user/add-new-professional');
//                die;
            } else {
                $upload_data = $this->upload->data();
                $data['banner_profile'] = 'uploaded_files/company_logo/' . $upload_data['file_name'];
            }
            /////////////////////// User Details //////////////////////
            $user_detail_data = array();
            $user_detail_data['role_id'] = $data['role_id'];
            $user_detail_data['name'] = $data['name'];
            $user_detail_data['email'] = $data['email'];
            $user_detail_data['password'] = base64_encode($data['password1']);
            $user_detail_data['std_code'] = $data['std_code_personal'];
            $user_detail_data['mobile_no'] = $data['mobile_no'];
            $user_detail_data['status'] = 1;
            $user_detail_data['reg_by'] = 0;
            $user_detail_data['reg_using'] = 0;
            $user_detail_data['is_new_status'] = 1;
            $user_detail_data['created_date'] = date('Y-m-d H:i:s');
            $user_detail_data['created_by'] = $this->session->userdata('admin_id');

            $res = $this->admin_master_model->dynamic_insert('user_detail', $user_detail_data);
            ///////////////////////Project Details /////////////////////////////
            $project_details = array();
            $i = 0;
            foreach ($data['project_name'] as $val) {
                $project_details['user_id'] = $res;
                $project_details['project_name'] = $data['project_name'][$i];
                $project_details['fess_p_hour'] = $data['fess_p_hour'][$i];
                $project_details['fees_p_s_feet'] = $data['fees_p_s_feet'][$i];
                $project_details['description'] = $data['description'][$i];
                $i++;
                $res4 = $this->admin_master_model->dynamic_insert('project_details', $project_details);
                //////////////////////// Insert project image start ///////////////////////////////////
                $j = $i;
                if ($_FILES['picture_' . $j]['name'][0] != '') {
                    $files = $_FILES['picture_' . $j];
                    $config = array(
                        'upload_path' => 'uploaded_files/project_pic',
                        'allowed_types' => 'jpg|jpeg|png',
                        'max_size' => '5000',
                        'encrypt_name' => TRUE,
                        'overwrite' => 1,
                    );
                    $this->load->library('upload', $config);
                    $images = array();
                    foreach ($files['name'] as $key => $image) {
                        $_FILES['images[]']['name'] = $files['name'][$key];
                        $_FILES['images[]']['type'] = $files['type'][$key];
                        $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
                        $_FILES['images[]']['error'] = $files['error'][$key];
                        $_FILES['images[]']['size'] = $files['size'][$key];
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('images[]')) {
                            //$error = $this->upload->display_errors();
                            //$this->session->set_flashdata('errmsg',$error);
                            //redirect('add-assignment');die;
                        } else {
                            $upload_data = $this->upload->data();
                            $data1['image'] = 'uploaded_files/project_pic/' . $upload_data['file_name'];
                            $data1['project_id'] = $res4;
                            $res1 = $this->admin_master_model->dynamic_insert('project_detail_image', $data1);
                        }
                    }
                }
                //////////////////////// Insert project image end ////////////////////////////////////
            }



            /////////////////////// Project Details 1 /////////////////////////////
            $project_details1 = array();
            $i = 0;
            foreach ($data['fees_project_name'] as $val) {
                $project_details1['user_id'] = $res;
                $project_details1['fees_project_name'] = $data['fees_project_name'][$i];
                $project_details1['project_fees'] = $data['project_fees'][$i];
                $project_details1['description'] = $data['descriptiont'][$i];
                $i++;
                $res3 = $this->admin_master_model->dynamic_insert('project_details2', $project_details1);
                //////////////////////// Insert project image start ///////////////////////////////////
                $j = $i;
                if ($_FILES['picturet_' . $j]['name'][0] != '') {
                    $files = $_FILES['picturet_' . $j];
                    $config = array(
                        'upload_path' => 'uploaded_files/project_pic',
                        'allowed_types' => 'jpg|jpeg|png',
                        'max_size' => '5000',
                        'encrypt_name' => TRUE,
                        'overwrite' => 1,
                    );
                    $this->load->library('upload', $config);
                    $images = array();
                    foreach ($files['name'] as $key => $image) {
                        $_FILES['images[]']['name'] = $files['name'][$key];
                        $_FILES['images[]']['type'] = $files['type'][$key];
                        $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
                        $_FILES['images[]']['error'] = $files['error'][$key];
                        $_FILES['images[]']['size'] = $files['size'][$key];
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('images[]')) {
                            //$error = $this->upload->display_errors();
                            //$this->session->set_flashdata('errmsg',$error);
                            //redirect('add-assignment');die;
                        } else {
                            $upload_data = $this->upload->data();
                            $data1['image'] = 'uploaded_files/project_pic/' . $upload_data['file_name'];
                            $data1['project_id'] = $res3;
                            $res1 = $this->admin_master_model->dynamic_insert('project_detail_image2', $data1);
                        }
                    }
                }
                //////////////////////// Insert project image end ////////////////////////////////////
            }

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
            $professional_details['sub_work_field'] = isset($data['sub_work_field']) ? $data['sub_work_field'] : '';
            $professional_details['thumnail_image'] = $data['thumnail_image'];
            $professional_details['banner_profile'] = $data['banner_profile'];
            $res1 = $this->admin_master_model->dynamic_insert('user_prof_det', $professional_details);
            /////////////////////// User Bank Details //////////////////////////
            //////////////////////  User Professional company Details //////////////////
            $professional_company_details = array();
            $professional_company_details['user_id'] = $res;
            $professional_company_details['isd_code'] = $data['company_isd_code'];
            $professional_company_details['mobile_no'] = $data['company_phone_no'];
            $professional_company_details['email'] = $data['company_email'];
            $professional_company_details['address1'] = $data['company_address1'];
            $professional_company_details['address2'] = $data['company_address2'];
            $professional_company_details['country_id'] = $data['company_country_id'];
            $professional_company_details['state_id'] = $data['company_state_id'];
            $professional_company_details['city_id'] = $data['company_city_id'];
            $professional_company_details['zipcode'] = $data['company_zipcode'];
            $res123 = $this->admin_master_model->dynamic_insert('professional_company_det', $professional_company_details);


            /////////////////////// User Bank Details //////////////////////////
            $professional_bank_details = array();
            $professional_bank_details['userid'] = $res;
            $professional_bank_details['bank_country_id'] = $data['bank_location_id'];
            $professional_bank_details['account_holder_name'] = $data['account_holder_name'];
            $professional_bank_details['bank_name'] = $data['bank_name'];
            $professional_bank_details['bank_acount_no'] = $data['bank_acount_no'];
            $professional_bank_details['ifsc_code'] = $data['ifsc_code'];
            $professional_bank_details['micr_code'] = $data['micr_code'];
            $professional_bank_details['bank_address'] = $data['bank_address'];
            $professional_bank_details['bank_address2'] = $data['bank_address2'];
            $professional_bank_details['std_code'] = $data['bank_std_code'];
            $professional_bank_details['bank_mobile_no'] = $data['bank_mobile_no'];
            $professional_bank_details['email'] = $data['bank_email'];
            $professional_bank_details['country_id'] = $data['bank_country_id'];
            $professional_bank_details['state_id'] = $data['bank_state_id'];
            $professional_bank_details['city_id'] = $data['bank_city_id'];
            $professional_bank_details['zipcode'] = $data['bank_zipcode'];
            $res2 = $this->admin_master_model->dynamic_insert('user_prof_bank_det', $professional_bank_details);

            /////////////////////// Other skill insert into requested skill start /////////////////////
            if ($data['other_skill']) {
                //$other_skill_arr = explode(',',$pro_reg_contact['other_skills']);
                $request_skill_arr = array();
                if (count($data['other_skill']) > 0) {
                    foreach ($data['other_skill'] as $val) {
                        $request_skill_arr['skill_for'] = 'professional';
                        $request_skill_arr['name'] = $val;
                        $request_skill_arr['status'] = '1';
                        $request_skill_arr['requested_by'] = $res;
                        $request_skill_arr['requested_time'] = date('Y-m-d H:i:s');
                        $res_skill_request = $this->admin_master_model->dynamic_insert('skills', $request_skill_arr);
                        array_push($data['skills'], $res_skill_request);

                        $professional_skill = array();
                        $professional_skill['user_id'] = $res;
                        $professional_skill['skill'] = $res_skill_request;
                        $res5 = $this->admin_master_model->dynamic_insert('users_skill', $professional_skill);
                    }
                }
            }
            /////////////////////// Other skill insert into requested skill end  //////////////////////
            /////////////////////// User Skill Insertion //////////////////////////
            foreach ($data['skills'] as $val) {
                $professional_skill = array();
                $professional_skill['user_id'] = $res;
                $professional_skill['skill'] = $val;
                if ($val != 'other') {
                    $res5 = $this->admin_master_model->dynamic_insert('users_skill', $professional_skill);
                }
            }
            /////////////////////// Insert about us section start  //////////////////////





            $pro_about_data = array();
            $pro_about_data['user_id'] = $res;
            $pro_about_data['yr_of_exp'] = $data['yr_of_exp'];
            $pro_about_data['word_of_exp'] = $data['word_of_exp'];
            $pro_about_data['no_of_project'] = $data['no_of_project'];
            $pro_about_data['word_project'] = $data['word_project'];
            $pro_about_data['no_emergency_service'] = $data['no_emergency_service'];
            $pro_about_data['registration_no'] = $data['registration_no'];
            $pro_about_data['registration_date'] = $data['registration_date'];
            $pro_about_data['registration_exp_date'] = $data['registration_exp_date'];
            $pro_about_data['national_id_no'] = $data['national_id_no'];
            $pro_about_data['residential_no'] = $data['residential_no'];
            $pro_about_data['commercial_no'] = $data['commercial_no'];
            $pro_about_data['about_us'] = $data['about_us'];

            if ($_FILES['insurance_certification']['name'] != '') {
                $config['upload_path'] = 'uploaded_files/insurance_certification/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5000;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('insurance_certification')) {
                    $upload_data = $this->upload->data();
                    $pro_about_data['insurance_certification'] = 'uploaded_files/insurance_certification/' . $upload_data['file_name'];
                }
            }

            $res10 = $this->admin_master_model->dynamic_insert('professional_about_us', $pro_about_data);
            /////////////////////// Insert about us section end  /////////////////////////////////
            /////////////////////// profile page project image insert start //////////////////////
            if ($_FILES['project_pic']['name'][0] != '') {
                $files = $_FILES['project_pic'];
                $config = array(
                    'upload_path' => 'uploaded_files/project_pic',
                    'allowed_types' => 'jpg|jpeg|png',
                    'max_size' => '5000',
                    'encrypt_name' => TRUE,
                    'overwrite' => 1,
                );
                $this->load->library('upload', $config);
                $images = array();
                foreach ($files['name'] as $key => $image) {
                    $_FILES['images[]']['name'] = $files['name'][$key];
                    $_FILES['images[]']['type'] = $files['type'][$key];
                    $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
                    $_FILES['images[]']['error'] = $files['error'][$key];
                    $_FILES['images[]']['size'] = $files['size'][$key];
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('images[]')) {
                        //$error = $this->upload->display_errors();
                        //$this->session->set_flashdata('errmsg',$error);
                        //redirect('add-assignment');die;
                    } else {
                        $upload_data = $this->upload->data();
                        $data12['image'] = 'uploaded_files/project_pic/' . $upload_data['file_name'];
                        $data12['user_id'] = $res;
                        $res1 = $this->admin_master_model->dynamic_insert('project_image', $data12);
                    }
                }
            }
            /////////////////////// profile page project image insert end  //////////////////////
            if ($user_detail_data['role_id'] == 3) {
                $this->session->set_flashdata('sucmsg', 'User Successfully registred...');
                redirect('admin/user/professional-list');
            } else {
                $this->session->set_flashdata('sucmsg', 'User Successfully registred...');
                redirect('admin/user/supplier-list');
            }
            die;
        }
    }

    /* add_new_supplier this funtion is used for add new supplier */

    public function add_new_supplier() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Professional/Supplier';
        /////////// Fetch role user //////////
        $select = array('id', 'name');
        $con = array('id >' => 2, 'id <' => 5);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select, 'user_role_master', $con);
        /////////// Fetch Country List //////////
        $select = array('id', 'name', 'isd_code');
        $con = array('status' => 0);
        $data['country_list'] = $this->admin_master_model->dynamic_get($select, 'country_list', $con);
        /////////// Fetch Subrole List //////////
        $select = array('id', 'name');
        $con = array();
        $data['subrole'] = $this->admin_master_model->dynamic_get($select, 'user_sub_role', $con);

        $this->load->view('users/add-new-supplier', $data);
    }

    /* add_professional_succ this function is used for insert  */

    public function add_professional_succ() {
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
        $this->form_validation->set_rules('email', 'EmailID', 'trim|required|is_unique[user_detail.email]', array('is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('password1', 'Password', 'trim|required');
        $this->form_validation->set_rules('bank_country_id', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required');
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
        $this->form_validation->set_rules('bank_acount_no', 'Bank Account No.', 'trim|required');
        $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required');
        $this->form_validation->set_rules('micr_code', 'MICR Code', 'trim|required');
        $this->form_validation->set_rules('bank_address', 'Bank Address', 'trim|required');
        $this->form_validation->set_rules('std_code', 'STD Code', 'trim|required');
        $this->form_validation->set_rules('bank_mobile_no', 'Mobile No.', 'trim|required|is_unique[user_detail.mobile_no]', array('is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/user/add-new-professional');
            die;
        } else {
            $data = $this->input->post();
            $config['upload_path'] = 'uploaded_files/company_logo/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5000;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('company_logo')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('errmsg', $error);
                redirect('admin/user/add-new-professional');
                die;
            } else {
                $upload_data = $this->upload->data();
                $data['company_logo'] = 'uploaded_files/company_logo/' . $upload_data['file_name'];
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
            foreach ($data['project_name'] as $val) {
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
            foreach ($data['fees_project_name'] as $val) {
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
            if ($user_detail_data['role_id'] == 3) {
                $this->session->set_flashdata('sucmsg', 'User Successfully registred...');
                redirect('admin/user/professional-list');
            } else {
                $this->session->set_flashdata('sucmsg', 'User Successfully registred...');
                redirect('admin/user/supplier-list');
            }
            die;
        }
    }

    /* Status change option of customer, supplier,professional */

    public function change_customer_status($en_customer_id = '', $redirect_position = '') {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_customer_id);
        if ($redirect_position == 1) {
            $redirect_url = 'admin/user-list';
        } else if ($redirect_position == 2) {
            $redirect_url = 'admin/user/professional-list';
        } else if ($redirect_position == 3) {
            $redirect_url = 'admin/user/supplier-list';
        }
        $select = array('status', 'mail_verification', 'created_by');
        $con = array('id' => $id);
        $deal_status = $this->admin_master_model->dynamic_get($select, 'user_detail', $con);
        if ($deal_status[0]['created_by'] == 0 && $deal_status[0]['mail_verification'] == 0) {
            $this->session->set_flashdata('errmsg', 'User need to verify EmailID first to approve !');
            redirect($redirect_url);
            die;
        }
        if ($deal_status[0]['status'] == 0) {
            $data = array('status' => 1);
        } else {
            $data = array('status' => 0);
        }
        $con = array('id' => $id);
        $res = $this->admin_master_model->dynamic_update('user_detail', $con, $data);

        if ($res > 0) {
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect($redirect_url);
            die;
        } else {
            $this->session->set_flashdata('errmsg', 'server error !');
            redirect($redirect_url);
            die;
        }
    }

    public function delete_user($en_user_id = '', $redirect_position = '') {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_user_id);
        $con = array('id' => $id);
        $res = $this->admin_master_model->dynamic_delete('user_detail', $con);
        if ($redirect_position == 1) {
            $redirect_url = 'admin/user-list';
        } else if ($redirect_position == 2) {
            $redirect_url = 'admin/user/professional-list';
        } else if ($redirect_position == 3) {
            $redirect_url = 'admin/user/supplier-list';
        }
        if ($res > 0) {
            $this->session->set_flashdata('sucmsg', 'User Deleted successfully!');
            redirect($redirect_url);
            die;
        } else {
            $this->session->set_flashdata('errmsg', 'server error !');
            redirect($redirect_url);
            die;
        }
    }

    /* update_professional is for update professional details */

    public function update_professional($en_pro_id = '', $redirect_position = '') {

        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['pro_id'] = smart_decode($en_pro_id); //96

        $data['redirect_position'] = $redirect_position;
        if ($redirect_position == 1) {
            $data['title'] = 'Update Professional Details';
        } else {
            $data['title'] = 'Update Supplier Details';
        }
        /////////// Fetch role user //////////
        $select = array('id', 'name');
        $con = array('id >' => 2, 'id <' => 5);
        $data['role_list'] = $this->admin_master_model->dynamic_get($select, 'user_role_master', $con);
        /////////// Fetch Country List //////////
        $select = array('id', 'name', 'isd_code');
        $con = array('status' => 0);
        $data['country_list'] = $this->admin_master_model->dynamic_get($select, 'country_list', $con);

        /////////// Fetch State List //////////
        $select = array('id', 'name');
        $con = array('status' => 0);
        $data['state_list'] = $this->admin_master_model->dynamic_get($select, 'state_list', $con);

        /////////// Fetch State List //////////
        $select = array('id', 'name');
        $con = array('status' => 0);
        $data['city_list'] = $this->admin_master_model->dynamic_get($select, 'city_list', $con);

        /////////// Fetch Project Image //////////
        $select = array('id', 'image');
        $con = array('user_id' => $data['pro_id']);
        $data['project_image'] = $this->admin_master_model->dynamic_get($select, 'project_image', $con);

        /////////// Fetch Smart Professional About Us //////////
        $select = array();
        $con = array('user_id' => $data['pro_id']);
        $data['smart_professional_about_us'] = $this->admin_master_model->dynamic_get($select, 'professional_about_us', $con);


        /////////// Fetch working field //////////
        $select = array('id', 'name');
        $con = array('usertype_id' => 3, 'status' => 0);
        $data['working_fields'] = $this->admin_master_model->dynamic_get($select, 'user_sub_role', $con);


        /////////// Fetch working field //////////
        $select = array('id', 'name');
        $con = array('status' => 0);
        $data['sub_working_fields'] = $this->admin_master_model->dynamic_get($select, 'sub_category', $con);



        /////////// Fetch Subrole List //////////
        $select = array('id', 'name');
        $con = array();
        $data['subrole'] = $this->admin_master_model->dynamic_get($select, 'user_sub_role', $con);
        /////////// Fetch user_detail  ////////// 1.
        $select = array('id', 'role_id', 'name', 'email', 'password', 'std_code', 'mobile_no');
        $con = array('id' => $data['pro_id']);
        $data['user_detail'] = $this->admin_master_model->dynamic_get($select, 'user_detail', $con);
        /////////// Fetch project_details  ////////// 2.
        $select = array('id', 'project_name', 'fess_p_hour', 'fees_p_s_feet', 'description');
        $con = array('user_id' => $data['pro_id']);
        $data['project_details'] = $this->admin_master_model->dynamic_get($select, 'project_details', $con);
        // Fetch Project Details1 Image
        for ($i = 0; $i < count($data['project_details']); $i++) {
            $select = array('id', 'image');
            $con = array('project_id' => $data['project_details'][$i]['id']);
            $data['project_details'][$i]['image'] = $this->admin_master_model->dynamic_get($select, 'project_detail_image', $con);
        }

        /////////// Fetch project_details2  ////////// 3. 
        $select = array('id', 'fees_project_name', 'project_fees', 'description');
        $con = array('user_id' => $data['pro_id']);
        $data['project_details2'] = $this->admin_master_model->dynamic_get($select, 'project_details2', $con);

        // Fetch Project Details1 Image
        for ($i = 0; $i < count($data['project_details2']); $i++) {
            $select = array('id', 'image');
            $con = array('project_id' => $data['project_details2'][$i]['id']);
            $data['project_details2'][$i]['image'] = $this->admin_master_model->dynamic_get($select, 'project_detail_image2', $con);
        }


        /////////// Fetch User Professional Details  ////////// 4. 
        $select = array();
        $con = array('userid' => $data['pro_id']);
        $data['user_prof_det'] = $this->admin_master_model->dynamic_get($select, 'user_prof_det', $con);

        /////////// Fetch User Professional Company Details  ////////// 4. 
        $select = array('id', 'isd_code', 'mobile_no', 'email', 'address1', 'address2', 'country_id', 'state_id', 'city_id', 'zipcode');
        $con = array('user_id' => $data['pro_id']);
        $data['user_prof_company_det'] = $this->admin_master_model->dynamic_get($select, 'professional_company_det', $con);


        /////////// Fetch User Bank Details  //////////5. 
        $select = array();
        $con = array('userid' => $data['pro_id']);
        $data['user_prof_bank_det'] = $this->admin_master_model->dynamic_get($select, 'user_prof_bank_det', $con);
        /////////// Fetch User state ist  //////////
        $select = array('id', 'name');
        $con = array('country_id' => $data['user_prof_det'][0]['country_id']);
        $data['user_state_list'] = $this->admin_master_model->dynamic_get($select, 'state_list', $con);
        /////////// Fetch User city list  //////////
        $select = array('id', 'name');
        $con = array('state_id' => $data['user_prof_det'][0]['state_id']);
        $data['user_city_list'] = $this->admin_master_model->dynamic_get($select, 'city_list', $con);
        /////////// Fetch all active skill  //////////
        $select = array('id', 'name');
        $con = array('skill_for' => 'professional', 'status' => '1');
        $data['skill_list'] = $this->admin_master_model->dynamic_get($select, 'skills', $con);
        /////////// Fetch users active skill list  //////////
        $data['user_skill_list'] = $this->admin_master_model->get_users_skill($data['user_detail'][0]['id']);
        /////////// Fetch users requested skill list  //////////
        //$data['user_r_skill_list'] = $this->admin_master_model->get_users_requested_skill($data['user_detail'][0]['id']);
        ///////////  users requested skill list  //////////
        $con = array('skill_for' => 'professional', 'status' => '2', 'requested_by' => $data['pro_id']);
        $data['user_request_skill'] = $this->admin_master_model->dynamic_get($select, 'skills', $con);
        // check($data);
        $this->load->view('users/update-professional', $data);
    }

    public function update_new_professional_success() {

        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $professional_id = smart_decode($this->input->post('pro_id'));
        $redirect_position = $this->input->post('redirect_position');

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
        // $this->form_validation->set_rules('password1', 'Password', 'trim|required');
        $this->form_validation->set_rules('bank_country_id', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required');
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
        $this->form_validation->set_rules('bank_acount_no', 'Bank Account No.', 'trim|required');
        $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required');
        $this->form_validation->set_rules('micr_code', 'MICR Code', 'trim|required');
        $this->form_validation->set_rules('bank_address', 'Bank Address', 'trim|required');
        // $this->form_validation->set_rules('std_code', 'STD Code', 'trim|required');
        $this->form_validation->set_rules('bank_mobile_no', 'Mobile No.', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/user/update-professional/' . smart_encode($professional_id));
            die;
        } else {
            $data = $this->input->post();

            /////////////////////// User Details done//////////////////////

            $user_detail_data = array();
            $user_detail_data['role_id'] = $data['role_id'];
            $user_detail_data['name'] = $data['name'];
            $user_detail_data['email'] = $data['email'];
            if ($data['password1'] != '') {
                $user_detail_data['password'] = base64_encode($data['password1']);
            }
            $user_detail_data['std_code'] = $data['std_code_personal'];
            $user_detail_data['mobile_no'] = $data['mobile_no'];
            $user_detail_data['updated_date'] = date('Y-m-d H:i:s');
            $user_detail_data['updated_by'] = $this->session->userdata('admin_id');

            $res = $this->admin_master_model->dynamic_update('user_detail', array('id' => $professional_id), $user_detail_data);
            /////////////////////// User Details done//////////////////////
            /////////////////////// profile page project image insert start //////////////////////
            if ($_FILES['project_pic']['name'][0] != '') {
                $files = $_FILES['project_pic'];
                $config = array(
                    'upload_path' => 'uploaded_files/project_pic',
                    'allowed_types' => 'jpg|jpeg|png',
                    'max_size' => '5000',
                    'encrypt_name' => TRUE,
                    'overwrite' => 1,
                );
                $this->load->library('upload', $config);
                $images = array();
                foreach ($files['name'] as $key => $image) {
                    $_FILES['images[]']['name'] = $files['name'][$key];
                    $_FILES['images[]']['type'] = $files['type'][$key];
                    $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
                    $_FILES['images[]']['error'] = $files['error'][$key];
                    $_FILES['images[]']['size'] = $files['size'][$key];
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('images[]')) {
                        //$error = $this->upload->display_errors();
                        //$this->session->set_flashdata('errmsg',$error);
                        //redirect('add-assignment');die;
                    } else {
                        $upload_data = $this->upload->data();
                        $data12['image'] = 'uploaded_files/project_pic/' . $upload_data['file_name'];
                        $data12['user_id'] = $professional_id;
                        $res1 = $this->admin_master_model->dynamic_insert('project_image', $data12);
                    }
                }
            }
            /////////////////////// profile page project image insert end ///////////////////////
            //////////////////////  User Professional Details //////////////////
            /* Update Thumnail Image  */
            if ($_FILES['thumnail_image']['name'] != '') {
                $config['upload_path'] = 'uploaded_files/company_logo/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5000;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('thumnail_image')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errmsg', $error);
                    redirect('admin/user/add-new-professional');
                    die;
                } else {
                    $upload_data = $this->upload->data();
                    $data['thumnail_image'] = 'uploaded_files/company_logo/' . $upload_data['file_name'];
                    $pre_thumnail_image = FCPATH . '/' . $this->input->post('img_nm');
                    if (file_exists($pre_thumnail_image)) {
                        unlink($pre_thumnail_image);
                    }
                }
            } else {
                $data['thumnail_image'] = $data['old_thumnail_image'];
                ;
            }
            /* Update Thumnail Image  */

            /* Update banner  Image  */
            if ($_FILES['banner_profile']['name'] != '') {
                $config['upload_path'] = 'uploaded_files/company_logo/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5000;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('banner_profile')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errmsg', $error);
                    redirect('admin/user/add-new-professional');
                    die;
                } else {
                    $upload_data = $this->upload->data();
                    $data['banner_profile'] = 'uploaded_files/company_logo/' . $upload_data['file_name'];
                    $pre_banner_img = FCPATH . '/' . $this->input->post('img_nm');

                    if (file_exists($pre_banner_img)) {
                        unlink($pre_banner_img);
                    }
                }
            } else {
                $data['banner_profile'] = $data['old_banner_profile'];
                ;
            }
            /* Update banner  Image  */


            $professional_details = array();
            $professional_details['company_name'] = $data['company_name'];
            $professional_details['address1'] = $data['address1'];
            $professional_details['address2'] = $data['address2'];
            $professional_details['country_id'] = $data['country_id'];
            $professional_details['city_id'] = $data['city_id'];
            $professional_details['state_id'] = $data['state_id'];
            $professional_details['zipcode'] = $data['zipcode'];
            $professional_details['work_field'] = $data['work_field'];
            $professional_details['sub_work_field'] = $data['sub_work_field'];
            $professional_details['thumnail_image'] = $data['thumnail_image'];
            $professional_details['banner_profile'] = $data['banner_profile'];

            $res1 = $this->admin_master_model->dynamic_update('user_prof_det', array('userid' => $professional_id), $professional_details);
            /////////////////////// profile page project image insert end ///////////////////////
            /////////////////////// User Professional company Details ///////////////////////

            $professional_details = array();
            $professional_details['isd_code'] = $data['company_isd_code'];
            $professional_details['mobile_no'] = $data['company_phone_no'];
            $professional_details['email'] = $data['company_email'];
            $professional_details['address1'] = $data['company_address1'];
            $professional_details['address2'] = $data['company_address2'];
            $professional_details['country_id'] = $data['company_country_id'];
            $professional_details['state_id'] = $data['company_state_id'];
            $professional_details['city_id'] = $data['company_city_id'];
            $professional_details['zipcode'] = $data['company_zipcode'];

            $con = array('user_id' => $professional_id);
            $check_professional_details = $this->admin_master_model->dynamic_get(array(), 'professional_company_det', $con);
            if (count($check_professional_details) > 0) {
                $res2 = $this->admin_master_model->dynamic_update('professional_company_det', array('user_id' => $professional_id), $professional_details);
            } else {
                $professional_details['user_id'] = $professional_id;
                $res10 = $this->admin_master_model->dynamic_insert('professional_company_det', $professional_details);
            }


            /////////////////////// User Professional company Details ///////////////////////
            /////////////////////// User Bank Details //////////////////////////
            $professional_bank_details = array();
            //$professional_bank_details['userid'] = $res;
            $professional_bank_details['bank_country_id'] = $data['bank_location_id'];
            $professional_bank_details['account_holder_name'] = $data['account_holder_name'];
            $professional_bank_details['bank_name'] = $data['bank_name'];
            $professional_bank_details['bank_acount_no'] = $data['bank_acount_no'];
            $professional_bank_details['ifsc_code'] = $data['ifsc_code'];
            $professional_bank_details['micr_code'] = $data['micr_code'];
            $professional_bank_details['bank_address'] = $data['bank_address'];
            $professional_bank_details['bank_address2'] = $data['bank_address2'];
            $professional_bank_details['std_code'] = $data['bank_std_code'];
            $professional_bank_details['bank_mobile_no'] = $data['bank_mobile_no'];
            $professional_bank_details['email'] = $data['bank_email'];

            $professional_bank_details['country_id'] = $data['bank_country_id'];
            $professional_bank_details['state_id'] = $data['bank_state_id'];
            $professional_bank_details['city_id'] = $data['bank_city_id'];
            $professional_bank_details['zipcode'] = $data['bank_zipcode'];
            // check($professional_bank_details);
            $res2 = $this->admin_master_model->dynamic_update('user_prof_bank_det', array('userid' => $professional_id), $professional_bank_details);
            $this->session->set_flashdata('sucmsg', 'User details Successfully updated...');
            /////////////////////// User Bank Details //////////////////////////
            /////////////////////// Update about us section start  //////////////////////

            $pro_about_data = array();
            $pro_about_data['yr_of_exp'] = $data['yr_of_exp'];
            $pro_about_data['word_of_exp'] = $data['word_of_exp'];
            $pro_about_data['no_of_project'] = $data['no_of_project'];
            $pro_about_data['word_project'] = $data['word_project'];
            $pro_about_data['no_emergency_service'] = $data['no_emergency_service'];
            $pro_about_data['word_emergency'] = $data['word_emergency'];
            $pro_about_data['about_us'] = $data['about_us'];
            $pro_about_data['registration_no'] = $data['registration_no'];
            $pro_about_data['registration_date'] = $data['registration_date'];
            $pro_about_data['registration_exp_date'] = $data['registration_exp_date'];
            $pro_about_data['national_id_no'] = $data['national_id_no'];
            $pro_about_data['residential_no'] = $data['residential_no'];
            $pro_about_data['commercial_no'] = $data['commercial_no'];

            if ($_FILES['insurance_certification']['name'] != '') {
                $config['upload_path'] = 'uploaded_files/insurance_certification/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5000;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('insurance_certification')) {
                    $upload_data = $this->upload->data();
                    $pro_about_data['insurance_certification'] = 'uploaded_files/insurance_certification/' . $upload_data['file_name'];
                }
            }


            $con = array('user_id' => $professional_id);
            $smart_professional_about_us = $this->admin_master_model->dynamic_get(array(), 'professional_about_us', $con);
            if (count($smart_professional_about_us) > 0) {
                $res2 = $this->admin_master_model->dynamic_update('professional_about_us', array('user_id' => $professional_id), $pro_about_data);
            } else {
                $pro_about_data['user_id'] = $professional_id;
                $res10 = $this->admin_master_model->dynamic_insert('professional_about_us', $pro_about_data);
            }


            /////////////////////// Update about us section end  /////////////////////////////////
            //////////////////////  professional skill update start //////////////////
            if (!in_array('other', $data['skills'])) {
                $data['other_skill'] = array();
            }
            $old_request_skill_array = $this->admin_master_model->get_users_requested_skill_array($this->input->post('TRXTR'));
            $old_skill_delete = $this->admin_master_model->dynamic_delete('users_skill', array('user_id' => $this->input->post('TRXTR')));

            /*
              if(count($data['other_skill'] > 0)){
              foreach($data['other_skill'] as $val){
              if (in_array($val,$old_request_skill_array)){
              array_push($data['skills'],$val);
              }else{
              $skill_master_insert = array();
              $skill_master_insert['name'] = $val;
              $skill_master_insert['skill_for'] = 'professional';
              $skill_master_insert['status'] = '2';
              $skill_master_insert['requested_time'] = date('Y-m-d H:i:s');
              $skill_master_insert_res = $this->admin_master_model->dynamic_insert('skills',$skill_master_insert);
              array_push($data['skills'],$skill_master_insert_res);
              }
              }
              }

              $old_skill_delete = $this->admin_master_model->dynamic_delete('users_skill',array('user_id'=>$this->input->post('TRXTR')));
              foreach($data['skills'] as $val){
              if($val != 'other'){
              $new_skill = array();
              $new_skill['user_id'] = $this->input->post('TRXTR');
              $new_skill['skill'] = $val;
              $skill_insert = $this->admin_master_model->dynamic_insert('users_skill',$new_skill);
              }
              }
             */
            //////////////////////  professional skill update end  //////////////////
            ///////////////////////Project Details Update /////////////////////////////
            $total_project_details = $data['total_project_details'];
            for ($i = 1; $i <= $total_project_details; $i++) {
                $project_details['project_name'] = $data['project_name_' . $i];
                $project_details['fess_p_hour'] = $data['fess_p_hour_' . $i];
                $project_details['fees_p_s_feet'] = $data['fees_p_s_feet_' . $i];
                $project_details['description'] = $data['description_' . $i];
                $project_details_id = $data['project_details_id_' . $i];

                $res2 = $this->admin_master_model->dynamic_update('project_details', array('id' => $project_details_id), $project_details);
                $j = $i;
                if ($_FILES['details_picture_' . $j]['name'][0] != '') {
                    $files = $_FILES['details_picture_' . $j];
                    $config = array(
                        'upload_path' => 'uploaded_files/project_pic',
                        'allowed_types' => 'jpg|jpeg|png',
                        'max_size' => '5000',
                        'encrypt_name' => TRUE,
                        'overwrite' => 1,
                    );
                    $this->load->library('upload', $config);
                    $images = array();
                    foreach ($files['name'] as $key => $image) {
                        $_FILES['images[]']['name'] = $files['name'][$key];
                        $_FILES['images[]']['type'] = $files['type'][$key];
                        $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
                        $_FILES['images[]']['error'] = $files['error'][$key];
                        $_FILES['images[]']['size'] = $files['size'][$key];
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('images[]')) {
                            //$error = $this->upload->display_errors();
                            //$this->session->set_flashdata('errmsg',$error);
                            //redirect('add-assignment');die;
                        } else {
                            $upload_data = $this->upload->data();
                            $data1['image'] = 'uploaded_files/project_pic/' . $upload_data['file_name'];
                            $data1['project_id'] = $project_details_id;
                            $res1 = $this->admin_master_model->dynamic_insert('project_detail_image', $data1);
                        }
                    }
                }
            }
            ///////////////////////Project Details Update ///////////////////////////// 
            ///////////////////////Project Details Insert /////////////////////////////
            // check($data);
            $new_project_details = array();
            $i = 0;
            // check($data);
            if (isset($data['new_project_name'])) {
                foreach ($data['new_project_name'] as $val) {
                    $new_project_details['user_id'] = $professional_id;
                    $new_project_details['project_name'] = $data['new_project_name'][$i];
                    $new_project_details['fess_p_hour'] = $data['new_fess_p_hour'][$i];
                    $new_project_details['fees_p_s_feet'] = $data['new_fees_p_s_feet'][$i];
                    $new_project_details['description'] = $data['new_description'][$i];
                    $i++;
                    // check($new_project_details);
                    $res5 = $this->admin_master_model->dynamic_insert('project_details', $new_project_details);
                    //////////////////////// Insert project image start ///////////////////////////////////
                    $j = $i;
                    if ($_FILES['new_picture_' . $j]['name'][0] != '') {
                        $files = $_FILES['new_picture_' . $j];
                        $config = array(
                            'upload_path' => 'uploaded_files/project_pic',
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size' => '5000',
                            'encrypt_name' => TRUE,
                            'overwrite' => 1,
                        );
                        $this->load->library('upload', $config);
                        $images = array();
                        foreach ($files['name'] as $key => $image) {
                            $_FILES['images[]']['name'] = $files['name'][$key];
                            $_FILES['images[]']['type'] = $files['type'][$key];
                            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
                            $_FILES['images[]']['error'] = $files['error'][$key];
                            $_FILES['images[]']['size'] = $files['size'][$key];
                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload('images[]')) {
                                //$error = $this->upload->display_errors();
                                //$this->session->set_flashdata('errmsg',$error);
                                //redirect('add-assignment');die;
                            } else {
                                $upload_data = $this->upload->data();
                                $data1['image'] = 'uploaded_files/project_pic/' . $upload_data['file_name'];
                                $data1['project_id'] = $res5;
                                $res1 = $this->admin_master_model->dynamic_insert('project_detail_image', $data1);
                            }
                        }
                    }
                    //////////////////////// Insert project image end ////////////////////////////////////
                }
            }

            ///////////////////////Project Details Insert /////////////////////////////    
            /////////////////////// Project Details 2 update /////////////////////////////
            $total_project_details2 = $data['total_project_details2'];
            for ($i = 1; $i <= $total_project_details2; $i++) {
                $project_details2['fees_project_name'] = $data['fees_project_name_' . $i];
                $project_details2['project_fees'] = $data['project_fees_' . $i];
                $project_details2['description'] = $data['descriptiont_' . $i];
                $project_details_2_id = $data['project_details_2_id_' . $i];

                $res2 = $this->admin_master_model->dynamic_update('project_details2', array('id' => $project_details_2_id), $project_details2);
                $j = $i;
                if ($_FILES['picturet_' . $j]['name'][0] != '') {
                    $files = $_FILES['picturet_' . $j];
                    $config = array(
                        'upload_path' => 'uploaded_files/project_pic',
                        'allowed_types' => 'jpg|jpeg|png',
                        'max_size' => '5000',
                        'encrypt_name' => TRUE,
                        'overwrite' => 1,
                    );
                    $this->load->library('upload', $config);
                    $images = array();
                    foreach ($files['name'] as $key => $image) {
                        $_FILES['images[]']['name'] = $files['name'][$key];
                        $_FILES['images[]']['type'] = $files['type'][$key];
                        $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
                        $_FILES['images[]']['error'] = $files['error'][$key];
                        $_FILES['images[]']['size'] = $files['size'][$key];
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('images[]')) {
                            //$error = $this->upload->display_errors();
                            //$this->session->set_flashdata('errmsg',$error);
                            //redirect('add-assignment');die;
                        } else {
                            $upload_data = $this->upload->data();
                            $data1['image'] = 'uploaded_files/project_pic/' . $upload_data['file_name'];
                            $data1['project_id'] = $project_details_2_id;
                            $res1 = $this->admin_master_model->dynamic_insert('project_detail_image2', $data1);
                        }
                    }
                }
            }

            /////////////////////// Project Details 2 update /////////////////////////////
            /////////////////////// Project Details 2 Insert /////////////////////////////
            $project_details1 = array();
            $i = 0;
            foreach ($data['new_fees_project_name'] as $val) {
                if ($data['new_fees_project_name'][$i] == '') {
                    continue;
                }

                $project_details1['user_id'] = $professional_id;
                $project_details1['fees_project_name'] = $data['new_fees_project_name'][$i];
                $project_details1['project_fees'] = $data['new_project_fees'][$i];
                $project_details1['description'] = $data['new_descriptiont'][$i];
                $i++;
                // check($project_details1);
                $res3 = $this->admin_master_model->dynamic_insert('project_details2', $project_details1);
                //////////////////////// Insert project image start ///////////////////////////////////
                $j = $i;
                if ($_FILES['new_picturet_' . $j]['name'][0] != '') {
                    $files = $_FILES['new_picturet_' . $j];
                    $config = array(
                        'upload_path' => 'uploaded_files/project_pic',
                        'allowed_types' => 'jpg|jpeg|png',
                        'max_size' => '5000',
                        'encrypt_name' => TRUE,
                        'overwrite' => 1,
                    );
                    $this->load->library('upload', $config);
                    $images = array();
                    foreach ($files['name'] as $key => $image) {
                        $_FILES['images[]']['name'] = $files['name'][$key];
                        $_FILES['images[]']['type'] = $files['type'][$key];
                        $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
                        $_FILES['images[]']['error'] = $files['error'][$key];
                        $_FILES['images[]']['size'] = $files['size'][$key];
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('images[]')) {
                            //$error = $this->upload->display_errors();
                            //$this->session->set_flashdata('errmsg',$error);
                            //redirect('add-assignment');die;
                        } else {
                            $upload_data = $this->upload->data();
                            $data1['image'] = 'uploaded_files/project_pic/' . $upload_data['file_name'];
                            $data1['project_id'] = $res3;
                            $res1 = $this->admin_master_model->dynamic_insert('project_detail_image2', $data1);
                        }
                    }
                }
                //////////////////////// Insert project image end ////////////////////////////////////
            }
            /////////////////////// Project Details 2 Insert /////////////////////////////
            /////////////////////// Skills Update /////////////////////////////
            //delete old skills

            $delete_old_skill = $this->admin_master_model->dynamic_delete('users_skill', array('user_id' => $professional_id));

            foreach ($data['skills'] as $val) {
                $professional_skill = array();
                $professional_skill['user_id'] = $professional_id;
                $professional_skill['skill'] = $val;
                if ($val != 'other') {
                    $res5 = $this->admin_master_model->dynamic_insert('users_skill', $professional_skill);
                }
            }

            /////////////////////// Other skill insert into requested skill start /////////////////////
            if ($data['other_skill']) {
                //$other_skill_arr = explode(',',$pro_reg_contact['other_skills']);
                $request_skill_arr = array();
                if (count($data['other_skill']) > 0) {
                    foreach ($data['other_skill'] as $val) {
                        $request_skill_arr['skill_for'] = 'professional';
                        $request_skill_arr['name'] = $val;
                        $request_skill_arr['status'] = '1';
                        $request_skill_arr['requested_by'] = $professional_id;
                        $request_skill_arr['requested_time'] = date('Y-m-d H:i:s');
                        $res_skill_request = $this->admin_master_model->dynamic_insert('skills', $request_skill_arr);
                        array_push($data['skills'], $res_skill_request);

                        $professional_skill = array();
                        $professional_skill['user_id'] = $professional_id;
                        $professional_skill['skill'] = $res_skill_request;
                        $res5 = $this->admin_master_model->dynamic_insert('users_skill', $professional_skill);
                    }
                }
            }
            /////////////////////// Other skill insert into requested skill end  //////////////////////
            /////////////////////// Skills Update /////////////////////////////


            if ($redirect_position == 1) {
                redirect('admin/user/professional-list');
            } else {
                redirect('admin/user/supplier-list');
            }
            die;
        }
    }

    /* Delete professional project of professional user */

    public function delete_professional_project($position = '', $en_project_id = '', $en_professional_id = '') {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $project_id = smart_decode($en_project_id);
        $con = array('id' => $project_id);
        if ($position == 1) {
            $res = $this->admin_master_model->dynamic_delete('project_details', $con);
        } else {
            $res = $this->admin_master_model->dynamic_delete('project_details2', $con);
        }
        if ($res > 0) {
            $this->session->set_flashdata('sucmsg', 'project detail successfully removed!');
            redirect('admin/user/update-professional/' . $en_professional_id . '/1');
        } else {
            $this->session->set_flashdata('sucmsg', 'Server error!');
            redirect('admin/user/update-professional/' . $en_professional_id . '/1');
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
