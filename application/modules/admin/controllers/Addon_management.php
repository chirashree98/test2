<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Addon_management extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'html', 'text','smart_helper'));
        $this->load->library(array('session', 'form_validation', 'email', 'upload', 'image_lib'));
        $this->load->model(array('common_model', 'custom_model'));
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
    }
    public function all_addon() {      
        $data['title'] = "All addon";
        $data['query'] = $this->common_model->RetriveRecordByWhere('add_on_work',array());
        $this->load->view('addon/all-addon', $data);
    }
    public function add_addon() {
        $data = array();
        $data['title'] = "Add addon";
        if ($_POST) {
            $getData = array(
                'add_on_task' => $this->input->post('add_on_task'),
                'add_on_fees' => $this->input->post('add_on_fees'),
            );
            $this->common_model->AddRecord($getData, 'add_on_work');
            $message = '<div class="alert alert-success"><p>Successfully added.</p></div>';
            $this->session->set_flashdata('success', $message);
            redirect('admin/addon_management/all_addon/');
        }
        $this->load->view('addon/add-addon', $data);
    }

    public function edit_addon() {
        $id = $this->uri->segment(4);
        if ($_POST) {
            $addon_id = $this->input->post('id');
            $getData = array(
                'add_on_task' => $this->input->post('add_on_task'),
                'add_on_fees' => $this->input->post('add_on_fees'),
            );
            $this->common_model->UpdateRecord($getData, 'add_on_work', 'id', $addon_id);
            $message = '<div class="alert alert-success"><p>Successfully updated.</p></div>';
            $this->session->set_flashdata('success', $message);
            redirect('admin/addon_management/all_addon/');
        }
        $data['query'] = $this->common_model->RetriveRecordByWhereRow('add_on_work', array('id' => $id));
        $this->load->view('addon/edit-addon', $data);
    }

    public function change_addon_status() {

        $data = array();
        $id = $this->input->post('id');
        $value = $this->input->post('val');
        $save_data['status'] = $value;
        $this->common_model->UpdateRecord($save_data, 'add_on_work', 'id', $id);

        echo 'ok';
    }

    public function delete_addon() {
        $id = $this->input->post("id");
        $delete = $this->common_model->Delete('add_on_work', $id, 'id');
        echo 'ok';
    }


}
