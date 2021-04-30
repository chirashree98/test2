<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_management extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'text','smart_helper'));
        $this->load->library(array('form_validation', 'upload', 'image_lib'));
        $this->load->model(array('admin_master_model', 'common_model', 'custom_model'));
    }
    /* index this function is used to show list of products */
    public function index() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Product List';
        ///////// Fetch Product list ////////////
        $data['product_list'] = $this->admin_master_model->get_product_list();
        $this->load->view('product/list/product-list',$data);
    }
    /* add_product this function is used to show add product form */
    public function add_product(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $data['title'] = 'Add New Product';
        ///////// Fetch brand list ////////////
        $select = array('id','name');
        $data['brand_list'] = $this->admin_master_model->dynamic_get($select,'brand_master',array('status'=>0));
        ///////// Fetch supplier list ////////////
        $select = array('id','name');
        $data['supplier_list'] = $this->admin_master_model->dynamic_get($select,'user_detail',array('role_id'=>4));
        ///////// Fetch Category list ////////////
        $select = array('id','name');
        $data['category_list'] = $this->admin_master_model->dynamic_get($select,'user_sub_role',array('usertype_id'=>4));
        ///////// Fetch Attribute ////////////
        $select = array('id','name');
        $data['attribute_list'] = $this->admin_master_model->dynamic_get($select,'attribute',array('status'=>0));
        // check($data);
        $this->load->view('product/form/add-product',$data);
    }
    /* add_new_product_succ this function is used to insert all product details into database */
    public function add_new_product_succ(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('supplier_id', 'Supplier Name', 'trim|required');
        $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('brand_id', 'Brand Name', 'trim|required');
        $this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('sub_category_id', 'Sub Category Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('admin/product/add-product');
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
                         redirect('admin/product/add-product');
                         die;
                     }else{
                         $upload_data = $this->upload->data();
                         $images[] = 'uploaded_files/project_pic/'.$upload_data['file_name'];
                     }
                 }
            }
            //////////////// Insert product ////////////////
            $product_data = array();
            $product_data['supplier_id'] = $this->input->post('supplier_id');
            $product_data['name'] = $this->input->post('name');
            $product_data['brand_id'] = $this->input->post('brand_id');
            $product_data['status'] = 1;
            $product_data['created_date'] = date('Y-m-d H:i:s');
            $product_data['created_by'] = $this->session->userdata('admin_id');
            $res = $this->admin_master_model->dynamic_insert('product_detail', $product_data);
            if ($res > 0) {
                //////////////// Insert category ////////////////
                $category_data = array();
                $category_data['product_id'] = $res;
                $category_data['category_id'] = $this->input->post('category_id');
                $res1 = $this->admin_master_model->dynamic_insert('product_category_map', $category_data);
                //////////////// Insert sub category ////////////////
                $sub_category_data = array();
                $sub_category_data['product_id'] = $res;
                $sub_category_data['sub_cat_id'] = $this->input->post('sub_category_id');
                $res2 = $this->admin_master_model->dynamic_insert('product_sub_cat_map', $sub_category_data);
                //////////////// Insert sub category ////////////////
                $about_iteam = $this->input->post('about_iteam');
                foreach($about_iteam as $val){
                    $about_data = array();
                    $about_data['product_id'] = $res;
                    $about_data['about_iteam'] = $val;
                    $res3 = $this->admin_master_model->dynamic_insert('about_map', $about_data);
                }
                //////////////// Insert Images ////////////////
                foreach($images as $val){
                    $image_data = array();
                    $image_data['product_id'] = $res;
                    $image_data['image'] = $val;
                    $res4 = $this->admin_master_model->dynamic_insert('product_image', $image_data);
                }
                $this->session->set_flashdata('sucmsg', 'Product inserted successfully!');
                redirect('admin/product/product-list');
                die;
                
            } else {
                $this->session->set_flashdata('errmsg', 'Server error!');
                redirect('admin/product/add-product');
                die;
            }
        }
    }
    /* edit_product_status This function is used to change the product status */
    public function edit_product_status($en_product_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $product_id = smart_decode($en_product_id);
        $select = array('status');
        $con = array('id'=>$product_id);
        $deal_status = $this->admin_master_model->dynamic_get($select,'product_detail',$con);
        if($deal_status[0]['status'] == 0){
            $data = array('status'=>1);
        }else{
            $data = array('status'=>0);
        }
        $con = array('id'=>$product_id);
        $res = $this->admin_master_model->dynamic_update('product_detail',$con,$data);
        if($res > 0){
            $this->session->set_flashdata('sucmsg', 'Status successfully changed !');
            redirect('admin/product/product-list');
            die;
        }else{
            $this->session->set_flashdata('errmsg','server error !');
            redirect('admin/product/product-list');
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