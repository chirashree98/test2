<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Skill_management extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'html', 'text','smart_helper'));
        $this->load->library(array('session', 'form_validation', 'email', 'upload', 'image_lib'));
        $this->load->model(array('common_model', 'custom_model'));
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
    }
    public function all_skill($type = null) {
        
        $data['type'] = $type;
        if ($type == 'all') {
            $type = '';
        }
        if ($type == 'supplier') {
            $data['title'] = "All supplier's skills list";
        } else if ($type == 'professional') {
            $data['title'] = "All professional's skills list";
        } else {
            $data['title'] = "All skills list";
        }
        if ($type != '') {
        $data['query'] = $this->custom_model->getSkills(array('skill_for' => $type));
//            $data['query'] = $this->common_model->RetriveRecordByWhere('skills', array('skill_for' => $type));
        } else {
        $data['query'] = $this->custom_model->getSkills(array());
//            $data['query'] = $this->common_model->RetriveRecordByWhere('skills', array());
        }
        //echo'<pre>';print_r($data['query']->result());die;
        $this->load->view('skill/all-skill', $data);
    }
    public function all_requested_skill() {
        $data['title'] = "All requested skills list";
        $data['query'] = $this->custom_model->getRequestSkills();
        $this->load->view('skill/all-requested-skill', $data);
    }
    public function add_skill() {
        $data = array();
        $data['title'] = "Add skill";
        if ($_POST) {
            $getData = array(
                'skill_for' => $this->input->post('skill_for'),
                'name' => $this->input->post('name'),
            );
            $this->common_model->AddRecord($getData, 'skills');
            $message = '<div class="alert alert-success"><p>Successfully added.</p></div>';
            $this->session->set_flashdata('success', $message);
            redirect('admin/skill_management/all_skill/'.$getData['skill_for']);
        }
        $this->load->view('skill/add-skill', $data);
    }

    public function edit_skill() {
        $id = $this->uri->segment(4);
        if ($_POST) {
            $skill_id = $this->input->post('id');
            $getData = array(
                'skill_for' => $this->input->post('skill_for'),
                'name' => $this->input->post('name'),
            );
            $this->common_model->UpdateRecord($getData, 'skills', 'id', $skill_id);
            $message = '<div class="alert alert-success"><p>Successfully updated.</p></div>';
            $this->session->set_flashdata('success', $message);
            redirect('admin/skill_management/all_skill/'.$getData['skill_for']);
        }
        $data['query'] = $this->common_model->RetriveRecordByWhereRow('skills', array('id' => $id));
        $this->load->view('skill/edit-skill', $data);
    }

    public function change_skill_status() {

        $data = array();
        $id = $this->input->post('id');
        $value = $this->input->post('val');
        $save_data['status'] = $value;
        $this->common_model->UpdateRecord($save_data, 'skills', 'id', $id);

        echo 'ok';
    }

    public function check_skill_exist() {
        $email = $this->input->post('email');
        $skill_id = $this->input->post('skill_id');
        $query = $this->custom_model->check_skill_exist($email, $skill_id);
        echo count($query->result());
    }

    public function delete_skill() {
        $id = $this->input->post("id");
        $delete = $this->common_model->Delete('skills', $id, 'id');
        echo 'ok';
    }

    public function approve_skill() {
        $data = array();
        $id = $this->input->post('id');
        $save_data['status'] = '1';
        $this->common_model->UpdateRecord($save_data, 'skills', 'id', $id);

        echo 'ok';
    }

    public function deny_skill() {
       $data = array();
        $id = $this->input->post('id');
        $save_data['status'] = '3';
        $this->common_model->UpdateRecord($save_data, 'skills', 'id', $id);

        echo 'ok';
    }

}

