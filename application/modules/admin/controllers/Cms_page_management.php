<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_page_management extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'html', 'text', 'smart_helper'));
        $this->load->library(array('form_validation', 'upload', 'image_lib'));
        $this->load->model(array('common_model', 'custom_model', 'admin_master_model'));
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
    }

    public function all_professionals_cms($section = '') {
        $data['title'] = 'Edit ' . $section . ' section';
        $data['section'] = $section;
        if ($_POST) {
//            echo "<pre>";
//            print_r($_POST);
//            print_r($_FILES);
//            exit();

            if ($section == 'banner') {
                $getData = array(
                    'heading' => $this->input->post('heading'),
                    'content' => $this->input->post('content'),
                );

                if ($_FILES['image']['name'] != '') {
                    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                    $target_dir = "uploaded_files/banner/";
                    $file_name = time() . '_image.' . $ext;
                    $target_file = $target_dir . $file_name;
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    $getData['image'] = 'uploaded_files/banner/' . $file_name;
                }
                $res = $this->admin_master_model->dynamic_update('all_professionals_cms', array('id' => $this->input->post('id'), 'section' => $this->input->post('type')), $getData);
                if ($res > 0) {
                    $this->session->set_flashdata('sucmsg', 'Updated successfully !');
                    redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                    die;
                } else {
                    $this->session->set_flashdata('errmsg', 'Opps please try again!');
                    redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                    die;
                }
            }



            if ($section == 'section_two') {
                foreach ($_POST['id'] as $id_val) {
                    $getData = array(
                        'heading' => $_POST['heading'][$id_val],
                        'content' => $_POST['content'][$id_val],
                    );

                    if ($_FILES['image']['name'][$id_val] != '') {
                        $ext = strtolower(pathinfo($_FILES['image']['name'][$id_val], PATHINFO_EXTENSION));
                        $target_dir = "uploaded_files/icon/";
                        $file_name = time() . '_image_' . $id_val . '.' . $ext;
                        $target_file = $target_dir . $file_name;
                        move_uploaded_file($_FILES["image"]["tmp_name"][$id_val], $target_file);
                        $getData['image'] = 'uploaded_files/icon/' . $file_name;
                    }
                    $res = $this->admin_master_model->dynamic_update('all_professionals_cms', array('id' => $id_val, 'section' => $this->input->post('type')), $getData);
                }


                if ($res > 0) {
                    $this->session->set_flashdata('sucmsg', 'Updated successfully !');
                    redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                    die;
                } else {
                    $this->session->set_flashdata('errmsg', 'Opps please try again!');
                    redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                    die;
                }
            }


            if ($section == 'section_three') {
                foreach ($_POST['id'] as $id_val) {
                    $getData = array(
                        'heading' => $_POST['heading'][$id_val],
                        'content' => $_POST['content'][$id_val],
                        'btn_text' => $_POST['btn_text'][$id_val],
                        'btn_url' => $_POST['btn_url'][$id_val],
                    );

                    if ($_FILES['image']['name'][$id_val] != '') {
                        $ext = strtolower(pathinfo($_FILES['image']['name'][$id_val], PATHINFO_EXTENSION));
                        $target_dir = "uploaded_files/icon/";
                        $file_name = time() . '_image_' . $id_val . '.' . $ext;
                        $target_file = $target_dir . $file_name;
                        move_uploaded_file($_FILES["image"]["tmp_name"][$id_val], $target_file);
                        $getData['image'] = 'uploaded_files/icon/' . $file_name;
                    }
                    $res = $this->admin_master_model->dynamic_update('all_professionals_cms', array('id' => $id_val, 'section' => $this->input->post('type')), $getData);
                }


                if ($res > 0) {
                    $this->session->set_flashdata('sucmsg', 'Updated successfully !');
                    redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                    die;
                } else {
                    $this->session->set_flashdata('errmsg', 'Opps please try again!');
                    redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                    die;
                }
            }


            if ($section == 'faq') {
                if (isset($_POST['id']) && count($_POST['id']) > 0) {
                    foreach ($_POST['id'] as $id_val) {
                        $getData = array(
                            'heading' => $_POST['heading'][$id_val],
                            'content' => $_POST['content'][$id_val],
                        );


                        $res = $this->admin_master_model->dynamic_update('all_professionals_cms', array('id' => $id_val, 'section' => $this->input->post('type')), $getData);
                    }


                    if ($res > 0) {
                        $this->session->set_flashdata('sucmsg', 'Updated successfully !');
                        redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                        die;
                    } else {
                        $this->session->set_flashdata('errmsg', 'Opps please try again!');
                        redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                        die;
                    }
                }
                if($_POST['mode']=='new_faq'){
//                    print_r($_POST);exit();
                    $getData = array(
                            'section' => 'faq',
                            'heading' => $_POST['heading'],
                            'content' => $_POST['content'],
                        );
                    $res = $this->common_model->AddRecord($getData,'all_professionals_cms');
                    if ($res > 0) {
                        $this->session->set_flashdata('sucmsg', 'Added successfully !');
                        redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                        die;
                    } else {
                        $this->session->set_flashdata('errmsg', 'Opps please try again!');
                        redirect('admin/cms_page_management/all_professionals_cms/' . $section);
                        die;
                    }
                }
            }
        }

        $where['section'] = $section;
        if ($section == 'banner') {
            $data['query'] = $this->common_model->RetriveRecordByWhereRow('all_professionals_cms', $where);
        } else {
            $data['query'] = $this->common_model->RetriveRecordByWhere('all_professionals_cms', $where);
        }

        $this->load->view('cms_page/all_professionals_cms', $data);
    }
      public function delete_faq() {
        $id = $this->input->post("id");
        $delete = $this->common_model->Delete('all_professionals_cms', $id, 'id');
        echo 'ok';
    }
}
