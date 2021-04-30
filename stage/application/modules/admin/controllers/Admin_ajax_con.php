<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajax_con extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'text','smart_helper'));
        $this->load->library(array('form_validation', 'upload', 'image_lib'));
        $this->load->model(array('admin_master_model', 'common_model', 'custom_model'));
    }

    public function index() {
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $select = array('id','name');
        $con = array('country_id'=>$this->input->post('country_id'));
        $state_list = $this->admin_master_model->dynamic_get($select,'state_list',$con);
    ?>
        <div class="form-group">
            <label>State Name:</label>
            <select class="form-control" id="state_id" name="state_id">
                <option value="">Select State</option>
                <?php foreach($state_list as $val){ ?>
                    <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                <?php } ?>
            </select>
        </div>
    <?php
    }
    public function ajax_get_state_using_country_front(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $select = array('id','name');
        $con = array('country_id'=>$this->input->post('country_id'));
        $state_list = $this->admin_master_model->dynamic_get($select,'state_list',$con);
    ?>
        <select class="form-control" name="state_id" id="state_id" onchange="return get_city_using_state(this);">
            <option value="">Select State</option>
            <?php foreach($state_list as $val){ ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php } ?>
        </select>
    <?php
    }
    public function ajax_get_city_using_state_front(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $select = array('id','name');
        $con = array('state_id'=>$this->input->post('state_id'));
        $city_list = $this->admin_master_model->dynamic_get($select,'city_list',$con);
    ?>
        <select class="form-control" name="city_id" id="city_id">
            <option value="">Select City</option>
            <?php foreach($city_list as $val){ ?>
            <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php } ?>
        </select>
    <?php
    }
    public function ajax_get_state_using_country_admin(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $select = array('id','name');
        $con = array('country_id'=>$this->input->post('country_id'));
        $state_list = $this->admin_master_model->dynamic_get($select,'state_list',$con);
    ?>
        <select class="form-control" id="state_id" name="state_id" onchange="return get_city_using_state(this);">
            <option value="">Select State</option>
            <?php foreach($state_list as $val){ ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php } ?>
        </select>
    <?php
    }
    public function ajax_get_city_using_state_admin(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $this->login_chk();
        $select = array('id','name');
        $con = array('state_id'=>$this->input->post('state_id'),'status'=>0);
        $city_list = $this->admin_master_model->dynamic_get($select,'city_list',$con);
    ?>
        <select class="form-control" name="city_id" id="city_id">
            <option value=""> Select City </option>
            <?php foreach($city_list as $val){ ?>
                <option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?> </option>
            <?php } ?>
        </select>
    <?php
    }
    public function ajax_get_work_field_using_usertype(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $select = array('id','name');
        $con = array('usertype_id'=>$this->input->post('usertype'),'status'=>0);
        $work_list = $this->admin_master_model->dynamic_get($select,'user_sub_role',$con);
    ?>
        <select class="form-control" name="work_field" id="work_field">
            <option value=""> Select Working Field</option>
            <?php foreach($work_list as $val){ ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php } ?>
        </select>
    <?php
    }
    public function ajax_get_work_field_using_usertype_admin(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $select = array('id','name');
        $con = array('usertype_id'=>$this->input->post('usertype'),'status'=>0);
        $work_list = $this->admin_master_model->dynamic_get($select,'user_sub_role',$con);
    ?>
    <select class="form-control" name="work_field" id="work_field">
        <option value=""> Select Work Field </option>
        <?php foreach($work_list as $val){ ?>
        <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
        <?php } ?>
    </select>
    <?php
    }
    public function ajax_get_sub_category(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $select = array('id','name');
        $con = array('cat_id'=>$this->input->post('category_id'),'status'=>0);
        $sub_cat_list = $this->admin_master_model->dynamic_get($select,'sub_category',$con);
    ?>
        <select class="form-control" id="sub_category_id" name="sub_category_id">
            <option value="">Select sub Category</option>
            <?php foreach($sub_cat_list as $val){ ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php } ?>
        </select>
    <?php
    }
    public function ajax_get_child_attribute(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $attribute_arr = explode(",",$this->input->post('attribute_arr'));
    ?>
    <label> Select Child Attribute(s):</label>
    <div class="row">
    <?php
        foreach($attribute_arr as $val){
            $child_arr = get_array_dynamic('attribute_child',array('attribute_id'=>$val));
            $attribute_det = get_array_dynamic1('attribute',array('id'=>$val));
        ?>
            <div class="col-sm-2 form-group">
                <label> <?php echo $attribute_det[0]['name']; ?>:</label><br>
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="">Select <?php echo $attribute_det[0]['name']; ?></option>
                    <?php foreach($child_arr as $key => $val1){ ?>
                        <option value="<?php echo $key; ?>"><?php echo $val1; ?></option>
                    <?php } ?>
                </select>
            </div>
        <?php
        }
    ?>
        <div class="col-sm-2 form-group">
            <label> Stock:</label><br>
            <input type="number" class="form-control" id="stock" name="stock">
        </div>
        <div class="col-sm-2 form-group">
            <label> MRP price:</label><br>
            <input type="number" class="form-control" id="mrp" name="mrp">
        </div>
        <div class="col-sm-2 form-group">
            <label> Sale price:</label><br>
            <input type="number" class="form-control" id="sale" name="sale">
        </div>
    </div>
    <?php
    }
    public function ajax_get_skill(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $select = array('id','name');
        $con = array('skill_for'=>'professional','status'=>'0');
        $skill_list = $this->admin_master_model->dynamic_get($select,'skills',$con);
    ?>
        <select name="skills" id="skills" multiple class="label ui selection fluid dropdown">
            <?php foreach($skill_list as $val){ ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php } ?>
        </select>
    <?php        
    }
    public function ajax_make_all_notification_old(){
        $this->method_chk($_SERVER['REQUEST_METHOD'], 'POST');
        $con = array('status'=>0);
        $update_noti = $this->admin_master_model->dynamic_update('notification_log',$con,array('status'=>1));
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