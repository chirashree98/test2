<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_management extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'text','smart_helper'));
        $this->load->library(array('form_validation', 'upload', 'image_lib'));
        $this->load->model(array('admin_master_model', 'common_model', 'custom_model'));
    }

    public function index() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'All City';
        $select = array('id','country_id','state_id','name','status');
        $data['city_list'] = $this->admin_master_model->dynamic_get($select,'city_list',array());
        $this->load->view('cms/list/city-list', $data);
    }
    public function add_new_city(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','name');
        $data['country_list'] = $this->admin_master_model->dynamic_get($select,'country_list',array());
        $data['title'] = 'Add New City';
        $this->load->view('cms/form/add-new-city',$data);
    }
    public function add_new_city_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country_id', 'Country Name', 'trim|required',array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('state_id', 'State Name', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('name', 'City Name', 'trim|required|is_unique[city_list.name]', array('required'=>'You have not provided %s.','is_unique'=>'This %s already exists.'));
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/add-new-city');
            die;
        } else {
            $data = $this->input->post();
            unset($data['frm_sub']);
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_insert('city_list', $data);
            if ($res > 0) {
                $this->session->set_flashdata('sucmsg', 'City successfully inserted!');
                redirect('admin/city-list');
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Server error!');
                redirect('admin/add-new-city');
                die;
            }
        }
    }
    public function edit_city($en_city_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $city_id = smart_decode($en_city_id);
        ///////////////////// City details fetch //////////////////
        $select = array('id','country_id','state_id','name','status');
        $con = array('id'=>$city_id);
        $data['data_list'] = $this->admin_master_model->dynamic_get($select,'city_list',$con);
        //////////////////// Country List Fetch ///////////////////
        $select = array('id','name');
        $data['country_list'] = $this->admin_master_model->dynamic_get($select,'country_list',array());
        //////////////////// State List Fetch ///////////////////
        $select = array('id','name');
        $con = array('country_id'=>$data['data_list'][0]['country_id']);
        $data['state_list'] = $this->admin_master_model->dynamic_get($select,'state_list',array());
        
        $data['title'] = 'Update City';
        $this->load->view('cms/form/edit-city',$data);
    }
    public function edit_new_city_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $city_id = $this->input->post('TRXTR');
        $this->load->library('form_validation');
         $this->form_validation->set_rules('country_id', 'Country Name', 'trim|required',array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('state_id', 'State Name', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('name', 'City Name', 'trim|required', array('required'=>'You have not provided %s.'));
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/edit-city/'.smart_encode($city_id));
            die;
        } else {
            $data = $this->input->post();
            unset($data['frm_sub']);
            unset($data['TRXTR']);
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_update('city_list',array('id'=>$city_id),$data);
            if ($res > 0) {
                $this->session->set_flashdata('sucmsg', 'City successfully Updated!');
                redirect('admin/city-list');
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Server error!');
                redirect('admin/edit-city/'.smart_encode($city_id));
                die;
            }
        }
    }
    public function home_banner_view(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','pic_location','title','sub_title');
        $data['data_list'] = $this->admin_master_model->dynamic_get($select,'cms_home_banner',array());
        $data['title'] = 'Update Banner Details';
        $this->load->view('cms/form/home-banner-view',$data);
    }
    public function update_home_banner(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('sub_title', 'Sub Title', 'trim|required', array('required'=>'You have not provided %s.'));
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/home-banner');
            die;
        } else {
            $data = $this->input->post();
            if($_FILES['pic_location']['name'] != ''){
                $config['upload_path']          = 'uploaded_files/banner/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             =  5000;
                $config['encrypt_name']         =  TRUE;
                
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('pic_location')){
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errmsg', $error);
                    redirect('admin/cms/home-banner');
                    die;
                }else{
                    $upload_data = $this->upload->data();
                    $data['pic_location'] = 'uploaded_files/banner/'.$upload_data['file_name'];
                }
            }
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            unset($data['frm_sub']);
            $res = $this->admin_master_model->dynamic_update('cms_home_banner',array(),$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Banner updated successfully !');
                redirect('admin/cms/home-banner');
                die;
            }else{
                $this->session->set_flashdata('errmsg','banner not updated !');
                redirect('admin/cms/home-banner');
                die;
            }
        }
    }
    public function why_benasmart(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','icon','titile','sub_title','position');
        $con = array();
        $data['data_list'] = $this->admin_master_model->dynamic_get($select,'cms_home_why_benasmart',$con);
        $data['title'] = 'Section 2 list';
        $this->load->view('cms/list/why-benasmart',$data);
    }
    public function edit_why_ch_benasmart($en_id){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','icon','titile','sub_title');
        $con = array('id'=>smart_decode($en_id));
        $data['data_list'] = $this->admin_master_model->dynamic_get($select,'cms_home_why_benasmart',$con);
        $data['title'] = 'Update Section 2';
        $this->load->view('cms/form/edit-why-ch-benasmart',$data);
    }
    public function update_why_benasmart_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $id = $this->input->post('TRXTR');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('titile', 'Title', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('sub_title', 'Sub Title', 'trim|required', array('required'=>'You have not provided %s.'));
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/edit-why-ch-benasmart/'.smart_encode($id));
            die;
        } else {
            $data = $this->input->post();
            if($_FILES['pic_location']['name'] != ''){
                $config['upload_path']          = 'uploaded_files/why_icon/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             =  5000;
                $config['encrypt_name']         =  TRUE;
                
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('pic_location')){
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errmsg', $error);
                    redirect('admin/edit-why-ch-benasmart/'.smart_encode($id));
                    die;
                }else{
                    $upload_data = $this->upload->data();
                    $data['icon'] = 'uploaded_files/why_icon/'.$upload_data['file_name'];
                }
            }
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            unset($data['TRXTR']);
            unset($data['frm_sub']);
            $res = $this->admin_master_model->dynamic_update('cms_home_why_benasmart',array('id'=>$id),$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Data updated successfully !');
                redirect('admin/cms/why-benasmart');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Data not updated !');
                redirect('admin/edit-why-ch-benasmart/'.smart_encode($id));
                die;
            }
        }
    }
    public function daily_deals_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','image','status','expired_date');
        $data['data_list'] = $this->admin_master_model->dynamic_get($select,'daily_deals',array());
        $data['title'] = 'Daily Deals List';
        $this->load->view('cms/list/daily-deals-list',$data);
    }
    public function add_new_deals(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add Daily Deals';
        $this->load->view('cms/form/add-new-deals',$data);
    }
    public function add_new_deals_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $data = $this->input->post();
        $config['upload_path']          = 'uploaded_files/deals/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             =  5000;
        $config['encrypt_name']         =  TRUE;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('image')){
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/add-new-deals');
            die;
        }else{
            $upload_data = $this->upload->data();
            $data = array();
            $data['status'] = 1;
            $data['image'] = 'uploaded_files/deals/'.$upload_data['file_name'];
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            $data['expired_date'] = date('Y-m-d',strtotime($this->input->post('expired_date')));
            $res = $this->admin_master_model->dynamic_insert('daily_deals', $data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Deals inserted successfully !');
                redirect('admin/cms/daily-deals-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insrtion operation failed !');
                redirect('admin/add-new-deals');
                die;
            }
        }
    }
    public function change_deal_status($en_id){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        $select = array('status');
        $con = array('id'=>$id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'daily_deals',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$id);
        $res = $this->admin_master_model->dynamic_update('daily_deals',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/cms/daily-deals-list');
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/cms/daily-deals-list');
            die;
        }
    }
    public function home_logo_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','image','status');
        $data['data_list'] = $this->admin_master_model->dynamic_get($select,'home_logo',array());
        $data['title'] = 'Logo List';
        $this->load->view('cms/list/home-logo-list',$data);
    }
    public function add_new_logo(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Logo';
        $this->load->view('cms/form/add-new-logo',$data);
    }
    public function add_new_logo_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $data = $this->input->post();
        $config['upload_path']          = 'uploaded_files/home_logo/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             =  5000;
        $config['encrypt_name']         =  TRUE;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('image')){
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/add-new-logo');
            die;
        }else{
            $upload_data = $this->upload->data();
            $data = array();
            $data['status'] = 1;
            $data['image'] = 'uploaded_files/home_logo/'.$upload_data['file_name'];
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_insert('home_logo', $data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Logo inserted successfully !');
                redirect('admin/cms/home-logo-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insrtion operation failed !');
                redirect('admin/add-new-logo');
                die;
            }
        }
    }
    public function change_logo_status($en_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        $select = array('status');
        $con = array('id'=>$id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'home_logo',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$id);
        $res = $this->admin_master_model->dynamic_update('home_logo',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/cms/home-logo-list');
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/cms/home-logo-list');
            die;
        }
    }
    public function country_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','name','isd_code','status');
        $data['data_list'] = $this->admin_master_model->dynamic_get($select,'country_list',array());
        $data['title'] = 'Country List';
        $this->load->view('cms/list/country-list',$data);
    }
    public function add_new_country(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Country';
        $this->load->view('cms/form/add-new-country',$data);
    }
    public function add_new_country_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[country_list.name]', array('required'=>'You have not provided %s.','is_unique'=>'This %s already exists.'));
        $this->form_validation->set_rules('isd_code', 'ISD Code', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/address/add-new-country');
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_insert('country_list', $data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Country inserted successfully !');
                redirect('admin/address/country-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insrtion operation failed !');
                redirect('admin/address/add-new-country');
                die;
            }
        }
    }
    public function edit_country($en_id){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        $select = array('id','name','isd_code');
        $con = array('id'=>$id);
        $data['data_details'] = $this->admin_master_model->dynamic_get($select,'country_list',$con);
        $data['title'] = 'Edit Country';
        $this->load->view('cms/form/edit-new-country',$data);
    }
    public function edit_new_country_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $id = $this->input->post('TRXTR');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('isd_code', 'ISD Code', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/address/edit-country/'. smart_encode($id));
            die;
        }else{
            $data = $this->input->post();
            unset($data['TRXTR']);
            unset($data['frm_sub']);
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_update('country_list',array('id'=>$id),$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Country updated successfully !');
                redirect('admin/address/country-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Update operation failed !');
                redirect('admin/address/edit-country/'. smart_encode($id));
                die;
            }
        }
    }
    public function edit_country_status($en_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        $select = array('status');
        $con = array('id'=>$id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'country_list',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$id);
        $res = $this->admin_master_model->dynamic_update('country_list',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/address/country-list');
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/address/country-list');
            die;
        }
    }
    public function services_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','name','type','address','city_id','country_id','zipcode','status');
        $con = array();
        $data['data_details'] = $this->admin_master_model->dynamic_get($select,'services_detail',$con);
        $data['title'] = 'Services List';
        $this->load->view('cms/list/services-list',$data);
    }
    public function add_new_service(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        //////////  Fetch City List ///////
        $select = array('id','name');
        $con = array();
        $data['city_list'] = $this->admin_master_model->dynamic_get($select,'city_list',$con);
        //////////  Fetch Country List ///////
        $select = array('id','name');
        $con = array();
        $data['country_list'] = $this->admin_master_model->dynamic_get($select,'country_list',$con);
        $data['title'] = 'Add New Services';
        $this->load->view('cms/form/add-new-service',$data);
    }
    public function add_new_service_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('type', 'Type', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('address', 'Address', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('city_id', 'City', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required', array('required'=>'You have not provided %s.'));
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/add-new-service');
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_insert('services_detail', $data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Service inserted successfully !');
                redirect('admin/cms/services-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insrtion operation failed !');
                redirect('admin/cms/add-new-service');
                die;
            }
        }
    }
    public function edit_service($en_id){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        //////////  Fetch City List ///////
        $select = array('id','name');
        $con = array();
        $data['city_list'] = $this->admin_master_model->dynamic_get($select,'city_list',$con);
        //////////  Fetch Country List ///////
        $select = array('id','name');
        $con = array();
        $data['country_list'] = $this->admin_master_model->dynamic_get($select,'country_list',$con);
        //////////  Fetch Service Details ///////
        $select = array('id','name','type','address','city_id','country_id','zipcode');
        $con = array('id'=>$id);
        $data['service_det'] = $this->admin_master_model->dynamic_get($select,'services_detail',$con);
        //echo '<pre>'; print_r($data['service_det']);die;
        $data['title'] = 'Update Service';
        $this->load->view('cms/form/edit-new-service',$data);
    }
    public function state_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','country_id','name','status');
        $con = array();
        $data['state_list'] = $this->admin_master_model->dynamic_get($select,'state_list',$con);
        $data['title'] = 'State List';
        $this->load->view('cms/list/state-list',$data);
    }
    public function add_new_state(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $select = array('id','name');
        $con = array();
        $data['country_list'] = $this->admin_master_model->dynamic_get($select,'country_list',$con);
        $data['title'] = 'Add New State';
        $this->load->view('cms/form/add-new-state',$data);
    }
    public function add_new_state_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('name', 'State', 'trim|required', array('required'=>'You have not provided %s.'));
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/address/add-new-state');
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_insert('state_list', $data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'State inserted successfully !');
                redirect('admin/address/state-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insrtion operation failed !');
                redirect('admin/address/add-new-state');
                die;
            }
        }
    }
    public function edit_state($en_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        //////// Country list fetch ////////
        $select = array('id','name');
        $con = array();
        $data['country_list'] = $this->admin_master_model->dynamic_get($select,'country_list',$con);
        //////// State fetch ////////
        $select = array('id','country_id','name');
        $con = array('id'=>$id);
        $data['state_list'] = $this->admin_master_model->dynamic_get($select,'state_list',$con);
        
        $data['title'] = 'Update State';
        $this->load->view('cms/form/edit-new-state',$data);
    }
    public function edit_new_state_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $state_id = $this->input->post('TRXTR');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required', array('required'=>'You have not provided %s.'));
        $this->form_validation->set_rules('name', 'State', 'trim|required', array('required'=>'You have not provided %s.'));
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/address/edit-state/'. smart_encode($state_id));
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            unset($data['TRXTR']);
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_update('state_list',array('id'=>$state_id),$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'State updated successfully !');
                redirect('admin/address/state-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','update operation failed !');
                redirect('admin/address/edit-state/'. smart_encode($state_id));
                die;
            }
        }
    }
    public function change_state_status($en_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        $select = array('status');
        $con = array('id'=>$id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'state_list',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$id);
        $res = $this->admin_master_model->dynamic_update('state_list',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/address/state-list');
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/address/state-list');
            die;
        }
    }
    public function edit_city_status($en_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_id);
        $select = array('status');
        $con = array('id'=>$id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'city_list',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$id);
        $res = $this->admin_master_model->dynamic_update('city_list',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/city-list');
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/city-list');
            die;
        }
    }
    public function expired_check(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        //$current_date = date('Y-m-d');
        $current_date = '2021-02-28';
        //////// check if today notification sent or not ////////
        $select = array('id');
        $con = array('success_date'=>$current_date);
        $today_detail = $this->admin_master_model->dynamic_get($select,'expired_check',$con);
        if(count($today_detail) < 1){
            ////// Check Expired Deals ////
            $expired_list = $this->admin_master_model->check_expired_deals($current_date);
            if(count($expired_list) > 0){
                $mail_status = $this->admin_master_model->send_expired_deals(count($expired_list),'Banner Expired!');
            }
            foreach($expired_list as $val){
                $res = $this->admin_master_model->dynamic_update('daily_deals',array('id'=>$val['id']),array('sent_status'=>1));
            }
            
            ////// Check Deals list 3 days before Expire ////
            $pre_expired_list = $this->admin_master_model->check_pre_expired_deals($current_date);
            echo'<pre>'; print_r($pre_expired_list);die;
            
        }else{
            return 1;
        }
    }
    public function cms_category_list($cat_type = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['cat_type'] = $cat_type;
        if($cat_type == 1){
            $data['title'] = 'Professional Category List';
            $data['catrgory_list'] = $this->admin_master_model->get_all_category_list(array('user_role_master.id'=>3));
        }else{
            $data['title'] = 'Supplier Category List';
            $data['catrgory_list'] = $this->admin_master_model->get_all_category_list(array('user_role_master.id'=>4));
        }
        $this->load->view('cms/list/cms-category-list',$data);
    }
    public function add_new_category($cat_type = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Category';
        $data['cat_type'] = $cat_type;
        if($cat_type == 1){
            $con = array('id'=>3);
        }else{
            $con = array('id'=>4);
        }
        $select = array('id','name');
        $data['role_list'] = $this->admin_master_model->dynamic_get($select,'user_role_master',$con);
        $this->load->view('cms/form/add-new-category',$data);
    }
    public function add_new_category_success1(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usertype_id', 'User Type', 'trim|required');
        $this->form_validation->set_rules('name', 'Category Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/add-new-category/'.$this->input->post('cat_type'));
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            unset($data['cat_type']);
            $data['status'] = '0';
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            
            $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($this->input->post('name'))));
            $getSameSlug = $this->common_model->RetriveRecordByWhere('user_sub_role', array('slug' => $slug));
            if (is_array($getSameSlug->result()) && count($getSameSlug->result()) > 0) {
                $slug_name = $slug . '-' . count($getSameSlug->result());
            } else {
                $slug_name = $slug;
            }
            $data['slug']=$slug_name;
            
            $res = $this->admin_master_model->dynamic_insert('user_sub_role',$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Category insert successfully !');
                redirect('admin/cms/category-list/'.$this->input->post('cat_type'));
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insert operation failed !');
                redirect('admin/cms/add-new-category/'.$this->input->post('cat_type'));
                die;
            }
        }
    }
    public function edit_category_status($en_cat_id = '',$cat_type = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_cat_id);
        $select = array('status');
        $con = array('id'=>$id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'user_sub_role',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$id);
        
        $res = $this->admin_master_model->dynamic_update('user_sub_role',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/cms/category-list/'.$cat_type);
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/cms/category-list/'.$cat_type);
            die;
        }
    }
    public function edit_category($en_cat_id = '',$cat_type = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $cat_id = smart_decode($en_cat_id);
        $data['title'] = 'Update Category';
        $select = array('id','name');
        ////// Fetch user type /////////
        $data['cat_type'] = $cat_type;
        if($cat_type == 1){
            $con = array('id'=>3);
        }else{
            $con = array('id'=>4);
        }
        $data['role_list'] = $this->admin_master_model->dynamic_get($select,'user_role_master',$con);
        //////// Fetch category details /////////
        $select = array('id','usertype_id','name');
        $con = array('id'=>$cat_id);
        $data['category_details'] = $this->admin_master_model->dynamic_get($select,'user_sub_role',$con);
        
        $this->load->view('cms/form/edit-category',$data);
    }
    public function edit_category_success1(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'Update');
        $this->login_chk();
        $cat_id = $this->input->post('TRXTR');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Category Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/edit-category/'. smart_encode($cat_id).'/'.$this->input->post('cat_type'));
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            unset($data['TRXTR']);
            unset($data['cat_type']);
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            
            $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($this->input->post('name'))));
            $getSameSlug = $this->common_model->RetriveRecordByWhere('user_sub_role', array('slug' => $slug,'id !=' => $cat_id));
            if (is_array($getSameSlug->result()) && count($getSameSlug->result()) > 0) {
                $slug_name = $slug . '-' . count($getSameSlug->result());
            } else {
                $slug_name = $slug;
            }
            $data['slug']=$slug_name;
            
            $res = $this->admin_master_model->dynamic_update('user_sub_role',array('id'=>$cat_id),$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Category Updated successfully !');
                redirect('admin/cms/category-list'.'/'.$this->input->post('cat_type'));
                die;
            }else{
                $this->session->set_flashdata('errmsg','Update operation failed !');
                redirect('admin/cms/edit-category/'. smart_encode($cat_id).'/'.$this->input->post('cat_type'));
                die;
            }
        }
    }
    /* sub_category is used for view sub category list category wise */
    public function sub_category($en_dat_id){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $cat_id = smart_decode($en_dat_id);
        //////////  Fetch Category Name  ///////////////
        $select = array('id','name');
        $con = array('id'=>$cat_id);
        $data['cat_det'] = $this->admin_master_model->dynamic_get($select,'user_sub_role',$con);
        //////////  Fetch sub Category Name  ///////////////
        $select = array('id','name','status');
        $con = array('cat_id'=>$cat_id);
        $data['sub_cat_list'] = $this->admin_master_model->dynamic_get($select,'sub_category',$con);
        $this->load->view('cms/list/sub-category',$data);
    }
    /* add_new_sub_category id used for view add sub category form */
    public function add_new_sub_category($en_cat_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Sub Category';
        $data['cat_id'] = smart_decode($en_cat_id);
        $this->load->view('cms/form/add-new-sub-category',$data);
    }
    /* admin_cms_add_sub_category_succ is used for insert the sub category into database */
    public function admin_cms_add_sub_category_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Sub Category Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/add-new-sub-category/'.smart_encode($this->input->post('cat_id')));
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            $data['status'] = '0';
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            
            $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($this->input->post('name'))));
            $getSameSlug = $this->common_model->RetriveRecordByWhere('sub_category', array('slug' => $slug));
            if (is_array($getSameSlug->result()) && count($getSameSlug->result()) > 0) {
                $slug_name = $slug . '-' . count($getSameSlug->result());
            } else {
                $slug_name = $slug;
            }
            $data['slug']=$slug_name;
            $res = $this->admin_master_model->dynamic_insert('sub_category',$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Sub Category insert successfully !');
                redirect('admin/cms/sub-category/'.smart_encode($this->input->post('cat_id')));
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insert operation failed !');
                redirect('admin/cms/add-new-sub-category/'.smart_encode($this->input->post('cat_id')));
                die;
            }
        }
    }
    public function edit_subcat_status($en_sub_cat_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $id = smart_decode($en_sub_cat_id);
        $select = array('cat_id','status');
        $con = array('id'=>$id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'sub_category',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$id);
        $res = $this->admin_master_model->dynamic_update('sub_category',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/cms/sub-category/'.smart_encode($deal_status[0]['cat_id']));
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/cms/sub-category/'.smart_encode($deal_status[0]['cat_id']));
            die;
        }
    }
    public function edit_sub_category($en_sub_cat_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Update Sub Category';
        $sub_cat_id = smart_decode($en_sub_cat_id);
        $select = array('id','cat_id','name');
        $con = array('id'=>$sub_cat_id);
        $data['sub_cat_det'] = $this->admin_master_model->dynamic_get($select,'sub_category',$con);
        //echo'<pre>'; print_r($data['sub_cat_det']);die;
        $this->load->view('cms/form/edit-sub-category',$data);
    }
    public function update_sub_category_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Sub Category Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/edit-sub-category/'.smart_encode($this->input->post('sub_cat_id')));
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            unset($data['sub_cat_id']);
            unset($data['cat_id']);
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            $con = array('id'=>$this->input->post('sub_cat_id'));
            
             $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($this->input->post('name'))));
            $getSameSlug = $this->common_model->RetriveRecordByWhere('user_sub_role', array('slug' => $slug,'id !=' => $this->input->post('sub_cat_id')));
            if (is_array($getSameSlug->result()) && count($getSameSlug->result()) > 0) {
                $slug_name = $slug . '-' . count($getSameSlug->result());
            } else {
                $slug_name = $slug;
            }
            $data['slug']=$slug_name;
            $res = $this->admin_master_model->dynamic_update('sub_category',$con,$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Sub Category insert successfully !');
                redirect('admin/cms/sub-category/'.smart_encode($this->input->post('cat_id')));
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insert operation failed !');
                redirect('admin/cms/edit-sub-category/'.smart_encode($this->input->post('sub_cat_id')));
                die;
            }
        }
    }
    /* attribute_list this function is used for show attribute list */
    public function attribute_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Attribute List';
        //////////  Fetch attribute list  ///////////////
        $select = array('id','name','status');
        $con = array('p_id'=>0);
        $data['attribute_list'] = $this->admin_master_model->dynamic_get($select,'attribute',$con);
        $this->load->view('cms/list/attribute-list',$data);
    }


    
    /* add_new_attribute this function is used for add new attribute form */
    public function add_new_attribute(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Attribute';
        $this->load->view('cms/form/add-new-attribute',$data); 
    }
    /* add_new_attribute_success this funtion is used for insert attribute into database */
    public function add_new_attribute_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Attribute Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/add-new-attribute');
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            $data['status'] = 1;
            $data['created_by'] = date('Y-m-d H:i:s');
            $data['created_date'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_insert('attribute',$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Attribute insert successfully !');
                redirect('admin/cms/attribute-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insert operation failed !');
                redirect('admin/cms/add-new-attribute');
                die;
            }
        }
    }
    /* edit_attribute_status this funtion is used to change attribute status */
    public function edit_attribute_status($en_att_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $attribute_id = smart_decode($en_att_id);
        $select = array('status');
        $con = array('id'=>$attribute_id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'attribute',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$attribute_id);
        $res = $this->admin_master_model->dynamic_update('attribute',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/cms/attribute-list');
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/cms/attribute-list');
            die;
        }
    }
    /* edit_attribute this function is used to show the update form */
    public function edit_attribute($en_attribute_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $attribute_id = smart_decode($en_attribute_id);
        $data['title'] = 'Update Attribute';
        $select = array('id','name');
        $con = array('id'=>$attribute_id);
        $data['attribute_detail'] = $this->admin_master_model->dynamic_get($select,'attribute',$con);
        $this->load->view('cms/form/edit-attribute',$data); 
    }
    /* admin_cms_update_attribute_success this function is used for update attribute details in database */
    public function admin_cms_update_attribute_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $en_attribute_id = smart_encode($this->input->post('TRXTR'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Attribute Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/edit-attribute/'.$en_attribute_id);
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            unset($data['TRXTR']);
            $data['updated_by'] = date('Y-m-d H:i:s');
            $data['updated_date'] = $this->session->userdata('admin_id');
            $con = array('id'=>$this->input->post('TRXTR'));
            $res = $this->admin_master_model->dynamic_update('attribute',$con,$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Attribute updated successfully !');
                redirect('admin/cms/attribute-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Update operation failed !');
                redirect('admin/cms/edit-attribute/'.$en_attribute_id);
                die;
            }
        }
    }
    public function child_attribute_list($en_attribute_list = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        //////////  Fetch attribute Details  ///////////////
        $select = array('id','name');
        $con = array('id'=>smart_decode($en_attribute_list));
        $data['attribute_det'] = $this->admin_master_model->dynamic_get($select,'attribute',$con);
        //////////  Fetch child attribute Details  ///////////////
        $select = array('id','attribute_id','name','status');
        $con = array('attribute_id'=>smart_decode($en_attribute_list));
        $data['child_attribute_list'] = $this->admin_master_model->dynamic_get($select,'attribute_child',$con);
        $this->load->view('cms/list/child-attribute-list',$data);
    }
    /* add_child_attribute this function is used for show add child attribute form */
    public function add_child_attribute($en_attribute_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Child Attribute';
        $data['attribute_id'] = smart_decode($en_attribute_id);
        $this->load->view('cms/form/add-child-attribute',$data); 
    }
    /* add_child_attribute_success this function is used to insert data into database */
    public function add_child_attribute_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $attribute_id = $this->input->post('attribute_id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Child Attribute Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/add-child-attribute/'.smart_encode($attribute_id));
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            $data['status'] = 1;
            $data['created_by'] = date('Y-m-d H:i:s');
            $data['created_date'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_insert('attribute_child',$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Child Attribute insert successfully !');
                redirect('admin/cms/child-attribute-list/'.smart_encode($attribute_id));
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insert operation failed !');
                redirect('admin/cms/add-child-attribute/'.smart_encode($attribute_id));
                die;
            }
        }
    }
    public function edit_child_attribute_status($en_child_att_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $child_attribute_id = smart_decode($en_child_att_id);
        $select = array('attribute_id','status');
        $con = array('id'=>$child_attribute_id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'attribute_child',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$child_attribute_id);
        $res = $this->admin_master_model->dynamic_update('attribute_child',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/cms/child-attribute-list/'.smart_encode($deal_status[0]['attribute_id']));
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/cms/child-attribute-list/'.smart_encode($deal_status[0]['attribute_id']));
            die;
        }
    }
    public function edit_child_attribute($en_child_attribute = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Update Child Attribute';
        $child_attribute_id = smart_decode($en_child_attribute);
        $select = array('id','name','attribute_id');
        $con = array('id'=>$child_attribute_id);
        $data['child_att_list'] = $this->admin_master_model->dynamic_get($select,'attribute_child',$con);
        $this->load->view('cms/form/edit-child-attribute',$data); 
    }
    public function edit_child_attribute_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $attribute_id = $this->input->post('attribute_id');
        $child_attribute_id = $this->input->post('child_attribute_id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Child Attribute Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/edit-child-attribute/'.smart_encode($child_attribute_id));
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            unset($data['attribute_id']);
            unset($data['child_attribute_id']);
            $data['updated_by'] = date('Y-m-d H:i:s');
            $data['updated_date'] = $this->session->userdata('admin_id');
            $con = array('id'=>$child_attribute_id);
            $res = $this->admin_master_model->dynamic_update('attribute_child',$con,$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Child Attribute Updated successfully !');
                redirect('admin/cms/child-attribute-list/'.smart_encode($attribute_id));
                die;
            }else{
                $this->session->set_flashdata('errmsg','Update operation failed !');
                redirect('admin/cms/edit-child-attribute/'.smart_encode($child_attribute_id));
                die;
            }
        }
    }





    /* brand_list this function is used to show list of all brands */
    public function brand_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Brand List';
        //////////  Fetch brand list  ///////////////
        $select = array('id','name','status');
        $con = array();
        $data['brand_list'] = $this->admin_master_model->dynamic_get($select,'brand_master',$con);
        $this->load->view('cms/list/brand-list',$data);
    }
    /* add_new_brand this function is used for show add brand form */
    public function add_new_brand(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Brand';
        $this->load->view('cms/form/add-new-brand',$data); 
    }
    /* add_new_brand_success this function is used to insert the brand details into database */
    public function add_new_brand_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Brand Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/add-new-brand');
            die;
        }else{
            $data = $this->input->post();
            unset($data['frm_sub']);
            $data['status'] = 1;
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_insert('brand_master',$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Brand inserted successfully !');
                redirect('admin/cms/brand-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Insert operation failed !');
                redirect('admin/cms/add-new-brand');
                die;
            }
        }
    }
    public function edit_brand_status($en_brand_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $brand_id = smart_decode($en_brand_id);
        $select = array('status');
        $con = array('id'=>$brand_id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'brand_master',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$brand_id);
        $res = $this->admin_master_model->dynamic_update('brand_master',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/cms/brand-list');
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/cms/brand-list');
            die;
        }
    }
    public function edit_brand($en_brand_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $brand_id = smart_decode($en_brand_id);
        $data['title'] = 'Update Brand';
        /////////  Fetch brand details  //////////
        $select = array('id','name');
        $con = array('id'=>$brand_id);
        $data['brand_detail'] = $this->admin_master_model->dynamic_get($select,'brand_master',$con);
        $this->load->view('cms/form/edit-brand',$data); 
    }
    public function add_update_brand_success(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->method_chk($this->input->post('frm_sub'), 'submit');
        $this->login_chk();
        $brand_id = $this->input->post('brand_id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Brand Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/cms/edit-brand/'.smart_encode($brand_id));
            die;
        }else{
            $data = $this->input->post();
            unset($data['brand_id']);
            unset($data['frm_sub']);
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->userdata('admin_id');
            $con = array('id'=>$brand_id);
            $res = $this->admin_master_model->dynamic_update('brand_master',$con,$data);
            if($res > 0){
                $this->session->set_flashdata('sucmsg', 'Brand update successfully !');
                redirect('admin/cms/brand-list');
                die;
            }else{
                $this->session->set_flashdata('errmsg','Update operation failed !');
                redirect('admin/cms/edit-brand/'.smart_encode($brand_id));
                die;
            }
        }
    }
    
    public function edit_new_service_succ(){
        echo '<pre>'; print_r($_POST);die;
        
    }
    /* ticket_list this function is used to show list of tickets to admin */
    public function ticket_list(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Ticket List';
        //////////  Fetch ticket list  ///////////////
        $data['ticket_list'] = $this->admin_master_model->fetch_ticket_list();
        
        /////////  Fetch professional and customer name list  //////////
        $select = array('id','name');
        $con = array('role_id >'=>1,'role_id <'=>4);
        $data['user_list'] = $this->admin_master_model->dynamic_get($select,'user_detail',$con);
        
        //echo'<pre>'; print_r($data['user_list']);die;
        $this->load->view('cms/list/ticket-list',$data);
    }
    public function change_ticket_status($en_ticket_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $id = $this->input->post('id');
        $select = array('status');
        $con = array('id'=>$id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'order_ticket_log',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$id);
        $res = $this->admin_master_model->dynamic_update('order_ticket_log',$con,$data);
        if($res > 0){
            echo'ok';
        }else{
            echo'not ok';
        }
    }
    public function view_ticket_details($en_ticket_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'View ticket details';
        $ticket_id = smart_decode($en_ticket_id);
        /////////////////// Fetch ticket details ///////////////////
        $select = array('id','ticket_no','order_id','message','created_date');
        $con = array('id'=>$ticket_id);
        $data['user_ticket_list'] = $this->admin_master_model->dynamic_get($select,'order_ticket_log',$con);
        $this->load->view('cms/form/view-ticket-details',$data); 
    }
    public function admin_reply_ticket(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $data = array();
        $data['order_id'] = $this->input->post('order_id');
        $data['message'] = $this->input->post('reply');
        $data['ticket_id'] = $this->input->post('ticket_id');
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['reply_by'] = $this->session->userdata('admin_id');
        $data['reply_role_id'] = 1;
        $data['ticket_type'] = 1;
        $res = $this->admin_master_model->dynamic_insert('order_ticket_log',$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg','Reply sent successfully.');
            redirect($this->input->post('return_url'));
            die;
        }else{
            $this->session->set_flashdata('errmsg','Failed.');
            redirect($this->input->post('return_url'));
            die;
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
?>