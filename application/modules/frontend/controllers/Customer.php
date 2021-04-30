<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MX_Controller {

    public $user = "";

    public function __construct() {
        parent::__construct();
        $this->load->model('client_master_model');
        $this->load->helper('smart_helper');
    }
    /* index  This function is used for customer profile view page */
    public function index() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->is_customer();
        //////////////////// Fetch customer  personal details //////////////////
        $data['user_det'] = $this->client_master_model->get_customer_details($this->session->userdata('client_id'));
        
        //////////////////// Fetch customer  service details //////////////////
        $con = array('customer_id'=>$this->session->userdata('client_id'),'delete_from_user'=>'0');
        $data['user_service_list'] = $this->client_master_model->dynamic_get(array('*'),'hire_professional_order',$con,'id','DESC');
        ////////////////////////Fetch wishlist /////////////////////////
        $con = array('customer_id'=>$this->session->userdata('client_id'));
        $data['user_wish_list'] = $this->client_master_model->dynamic_get(array('*'),'wishlist',$con);
        
        //echo'<pre>'; print_r($data['user_det']);die;
        $this->load->view('my-profile',$data);
    }
    public function customer_service_details($en_order_id = ''){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->is_customer();
        $order_id = smart_decode($en_order_id);
        //////////////////// Fetch customer  personal details //////////////////
        $data['user_det'] = $this->client_master_model->get_customer_details($this->session->userdata('client_id'));
        
        ////////////////////////Fetch service details /////////////////////////
        $con = array('id'=>$order_id);
        $data['user_service_list'] = $this->client_master_model->dynamic_get(array('*'),'hire_professional_order',$con,'id','DESC');
        
        ////////////////////////Fetch active ticket count /////////////////////////
        $con = array('order_id'=>$order_id,'status'=>0,'ticket_type'=>0);
        $data['user_ticket_count'] = count($this->client_master_model->dynamic_get(array('id'),'order_ticket_log',$con));
        
        ////////////////////////Fetch tickets /////////////////////////
        $con = array('order_id'=>$order_id,'ticket_type'=>0);
        $data['user_ticket_list'] = $this->client_master_model->dynamic_get(array('*'),'order_ticket_log',$con);
        
        //echo '<pre>'; print_r($data['user_ticket_list']);die;
        $this->load->view('customer/customer-service-details',$data);
    }
    public function customer_delete_service(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->is_customer();
        $order_id = $this->input->post('service_id');
        $con = array('id'=>$order_id);
        $res = $this->client_master_model->dynamic_update('hire_professional_order',$con,array('delete_from_user'=>'1'));
        echo 'ok';
    }
    public function customer_change_order_status(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->is_customer();
        $order_id = $this->input->post('order_id');
        $new_status = $this->input->post('new_status');
        ////////////////// change order status /////////////////
        $con = array('id'=>$order_id);
        if($new_status == 2){
            $data = array('status'=>'2');
        }else{
            $data = array('status'=>'3');
        }
        $res = $this->client_master_model->dynamic_update('hire_professional_order',$con,$data);
        echo 'ok';
    }
    public function cistomer_raise_ricket(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->is_customer();
        $this->method_chk($this->input->post('tickest-login'), 'Raise Ticket');
        $data = array();
        $data['order_id'] = $this->input->post('order_id');
        $data['message'] = $this->input->post('message');
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['customer_id'] = $this->session->userdata('client_id');
        ////////////////// Fetch professional id ////////////////////
        $con = array('id'=>$this->input->post('order_id'));
        $professional_id = $this->client_master_model->dynamic_get(array('professional_id'),'hire_professional_order',$con);
        /////////  Fetch professional and customer name list  //////////
        $select = array('id','name');
        $con = array('role_id >'=>1,'role_id <'=>4);
        $user_list = $this->client_master_model->dynamic_get($select,'user_detail',$con);
        $user_array = array();
        foreach($user_list as $val){
            $user_array[$val['id']] = $val['name'];
        }
        ////////////////////Sent Email to users start /////////////////
            $admin_mail_id = $this->client_master_model->dynamic_get(array('email'),'user_detail',array('id'=>1));
            $customer_mail_id = $this->client_master_model->dynamic_get(array('email'),'user_detail',array('id'=>$this->session->userdata('client_id')));
            $professional_mail_id = $this->client_master_model->dynamic_get(array('email'),'user_detail',array('id'=>$professional_id[0]['professional_id']));
            // to admin
            $maildata = array();
            $maildata['to'] = $admin_mail_id[0]['email'];
            $maildata['dear_name'] = 'Admin';
            $maildata['subject'] = 'New ticket raised';
            $maildata['email_template'] = 'ticket_raise';
            $maildata['customer_name'] = $user_array[$this->session->userdata('client_id')];
            $maildata['professional_name'] = $user_array[$professional_id[0]['professional_id']];
            $maildata['message'] = $this->input->post('message');
            $maildata['site_url'] = base_url();
            $result = send_mail($maildata);
            // to customer
            $maildata = array();
            $maildata['to'] = $customer_mail_id[0]['email'];
            $maildata['dear_name'] = $user_array[$this->session->userdata('client_id')];
            $maildata['subject'] = 'New ticket raised';
            $maildata['email_template'] = 'ticket_raise';
            $maildata['customer_name'] = $user_array[$this->session->userdata('client_id')];
            $maildata['professional_name'] = $user_array[$professional_id[0]['professional_id']];
            $maildata['message'] = $this->input->post('message');
            $maildata['site_url'] = base_url();
            $result = send_mail($maildata);
            // to professional
            $maildata = array();
            $maildata['to'] = $professional_mail_id[0]['email'];
            $maildata['dear_name'] = $user_array[$professional_id[0]['professional_id']];
            $maildata['subject'] = 'New ticket raised';
            $maildata['email_template'] = 'ticket_raise';
            $maildata['customer_name'] = $user_array[$this->session->userdata('client_id')];
            $maildata['professional_name'] = $user_array[$professional_id[0]['professional_id']];
            $maildata['message'] = $this->input->post('message');
            $maildata['site_url'] = base_url();
            $result = send_mail($maildata);

        ////////////////////Sent Email to users end  /////////////////
            
        $res = $this->client_master_model->dynamic_insert('order_ticket_log',$data);
        if($res > 0){
            
            
            //////////// Notification entry start ////////////
            $notification_array = array();
            $notification_array['type'] = 'Ticket raise';
            $notification_array['message'] = $user_array[$this->session->userdata('client_id')].' raised a ticket against '.$user_array[$professional_id[0]['professional_id']];
            $notification_array['status'] = '0';
            $notification_array['created_date'] = date('Y-m-d H:i:s');
            $notifi_res = $this->client_master_model->dynamic_insert('notification_log', $notification_array);
            //////////// Notification entry end ////////////
            
            if(strlen($res) < 2){
                $ticket_no = 'BMNTKT00'.$res;
            }elseif (strlen($res) < 3) {
                $ticket_no = 'BMNTKT0'.$res;
            }else{
                $ticket_no = 'BMNTKT'.$res;
            }
            $res1 = $this->client_master_model->dynamic_update('order_ticket_log',array('id'=>$res),array('ticket_no'=>$ticket_no));
            
            $this->session->set_flashdata('sucmsg','Ticket successfully raised.');
            redirect($this->input->post('return_url'));
            die;
        }else{
            $this->session->set_flashdata('errmsg','Ticket raise failed.');
            redirect($this->input->post('return_url'));
            die;
        }
    }
    public function customer_reply_ticket(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->is_customer();
        $data = array();
        $data['order_id'] = $this->input->post('order_id');
        $data['message'] = $this->input->post('reply');
        $data['ticket_id'] = $this->input->post('ticket_id');
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['reply_by'] = $this->session->userdata('client_id');
        $data['reply_role_id'] = 2;
        $data['ticket_type'] = 1;
        $res = $this->client_master_model->dynamic_insert('order_ticket_log',$data);
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
    public function edit_profile(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'GET');
        $this->login_chk();
        $this->is_customer();
        //////////////////// Fetch customer  personal details //////////////////
        $data['user_det'] = $this->client_master_model->get_customer_details2($this->session->userdata('client_id'));
        ////////////////////////Fetch country list /////////////////////////
        $con = array('status'=>0);
        $data['country_list'] = $this->client_master_model->dynamic_get(array('id','name','isd_code'),'country_list',$con);
        ////////////////////////Fetch state list /////////////////////////
        $con = array('status'=>0,'country_id'=>$data['user_det'][0]['country_id']);
        $data['state_list'] = $this->client_master_model->dynamic_get(array('id','name'),'state_list',$con);
        ////////////////////////Fetch city list /////////////////////////
        $con = array('status'=>0,'state_id'=>$data['user_det'][0]['state_id']);
        $data['city_list'] = $this->client_master_model->dynamic_get(array('id','name'),'city_list',$con);
        
        //echo'<pre>'; print_r($data['user_det']);die;
        $this->load->view('customer/edit-profile',$data);
    }
    public function edit_profile_succ() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $this->is_customer();
        ////////////// update userdetails table ///////////////
        $user_det = array();
        $user_det['name'] = $this->input->post('name');
        $con = array('id'=>$this->session->userdata('client_id'));
        $res = $this->client_master_model->dynamic_update('user_detail',$con,$user_det);
        
        ////////////// update user professional details table ///////////////
        $con = array('userid'=>$this->session->userdata('client_id'));
        $res1 = $this->client_master_model->dynamic_get(array('id'),'user_prof_det',$con);
        $pro_det = array();
        $pro_det['country_id'] = $this->input->post('country_id');
        $pro_det['state_id'] = $this->input->post('state_id');
        $pro_det['city_id'] = $this->input->post('city_id');
        $pro_det['zipcode'] = $this->input->post('zipcode');
        if(count($res1) > 0){ //update
            $con = array('userid'=>$this->session->userdata('client_id'));
            $res3 = $this->client_master_model->dynamic_update('user_prof_det',$con,$pro_det);
        }else{ //insert
            $pro_det['userid'] = $this->session->userdata('client_id');
            $res3 = $this->client_master_model->dynamic_insert('user_prof_det',$pro_det);
        }
        $this->session->set_flashdata('sucmsg','Account details successfully updated.');
        redirect('edit-profile');
        die;
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
    private function is_customer(){
        if($this->session->userdata('client_role_id') == 2){
            return 1;
        }else{
            $this->session->set_flashdata('errmsg','Login first to access this option!');
            redirect('');
        }
    }

}
