<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

    public $user = "";

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'text','smart_helper'));
        $this->load->library(array('form_validation', 'upload', 'image_lib'));
        $this->load->model('client_master_model');
        $this->load->library('facebook');
    }

    public function cart() {
        $data=array();
        $this->load->view('product/cart',$data);
    }

    
}
