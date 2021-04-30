<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function smart_encode($id = '') {
    $temp = ($id + 8038);
    return base64_encode(base64_encode($temp));
}

function smart_decode($en_id = '') {
    $temp = base64_decode(base64_decode($en_id));
    return ($temp - 8038);
}

function get_array_dynamic($table = '', $con = array()) {
    $ci = get_instance();
    $ci->db->select(array('id', 'name'));
    $qry = $ci->db->from($table);
    $ci->db->where($con);
    $qry = $ci->db->get();
    $res = $qry->result_array();
    $new_arr = array();
    foreach ($res as $val) {
        $new_arr[$val['id']] = $val['name'];
    }
    return $new_arr;
}

function get_array_dynamic1($table = '', $con = array()) {
    $ci = get_instance();
    $ci->db->select(array('id', 'name'));
    $qry = $ci->db->from($table);
    $ci->db->where($con);
    $qry = $ci->db->get();
    $res = $qry->result_array();
    return $res;
}

function is_professional_new($profess_id = '') {
    $ci = get_instance();
    $ci->db->select(array('is_new_status'));
    $qry = $ci->db->from('user_detail');
    $ci->db->where(array('id' => $profess_id));
    $qry = $ci->db->get();
    $res = $qry->result_array();
    return $res[0]['is_new_status'];
}

//function send_template_mail($template_name = '',$data = array()){
//    $ci = get_instance();
//    $subject = $data['subject'];
//    $message = $ci->load->view('mail_template/otp');
//    //$message = 'Your otp for reset password is'.'<strong> '.$data['otp'].'</strong> ';
//    $ci->load->library('email');
//    $config['mailtype'] = 'html';
//    $ci->email->initialize($config);
//    $ci->email->from('info@workb4live.com', 'Benasmart');
//    //$ci->email->to($data['email']);
//    $ci->email->to('jntgsh@gmail.com');
//    $ci->email->subject($subject);
//    $ci->email->message($message);
//    $ci->email->send();
//    return 1;
//}
function get_active_notification() {
    $ci = get_instance();
    $ci->db->select(array('message', 'type'));
    $qry = $ci->db->from('notification_log');
    $ci->db->where(array('status' => 0));
    $qry = $ci->db->get();
    $res = $qry->result_array();
    return $res;
}

function get_sending_mail_id() {
    return 'benasmart@workb4live.com';
}

function get_review_reply_list($review_id = '') {
    $ci = get_instance();
    $ci->db->select('ud.id,ud.name,upd.company_logo,prr.remarks');
    $ci->db->from('user_detail ud');
    $ci->db->join('user_prof_det upd', 'ud.id = upd.userid', 'left');
    $ci->db->join('professional_review pr', 'ud.id = pr.professional_id', 'left');
    $ci->db->join('professional_review_reply prr', 'pr.id = prr.review_id', 'left');
    $ci->db->where(array('pr.id' => $review_id));
    $query = $ci->db->get();
    return $query->result_array();
}

function get_project_det_img($project_id = '') {
    $ci = get_instance();
    $ci->db->select('id,image');
    $ci->db->from('project_detail_image');
    $ci->db->where(array('project_id' => $project_id));
    $query = $ci->db->get();
    return $query->result_array();
}

function get_project_det_img2($project_id = '') {
    $ci = get_instance();
    $ci->db->select('id,image');
    $ci->db->from('project_detail_image2');
    $ci->db->where(array('project_id' => $project_id));
    $query = $ci->db->get();
    return $query->result_array();
}

function getAllCategoryByRole($role_id = '') {
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('smart_user_sub_role');
    $ci->db->where(array('status' => '0', 'usertype_id' => $role_id));
    $query = $ci->db->get();
    return $query;
}

function getAllSubCategoryById($cat_id) {
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('smart_sub_category');
    $ci->db->where(array('status' => '0', 'cat_id' => $cat_id));
    $query = $ci->db->get();
    return $query;
}

function send_mail($data) {

    if (empty($data['to']) || empty($data['subject']) || empty($data['email_template'])) {
        return false;
    }
    $CI = & get_instance();
    $CI->load->library('email');
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.hostinger.in';
    $config['smtp_port'] = '587';
    $config['smtp_timeout'] = '7';
    $config['smtp_user'] = 'benasmart@workb4live.com';
    $config['smtp_pass'] = '~HQM@1$&8k';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not  
    $config['wordwrap'] = TRUE;
    $config['newline'] = "\r\n";
    $config['newline'] = "\r\n";
    $config['newline'] = "\r\n";
    $CI->email->initialize($config);
    $message = $CI->load->view('mail_template/' . $data['email_template'], $data, true);

//    echo $message; 
//    exit();
    $CI->email->from('benasmart@workb4live.com', 'Admin');
    $CI->email->to($data['to']);
    $CI->email->subject($data['subject']);
    $CI->email->message($message);
    if ($CI->email->send()) {
        return true;
    } else {
        return false;
    }
}

function get_service_name($service_id_array = array()) {
    $service_name = array();
    foreach ($service_id_array as $val) {
        $ci = get_instance();
        $ci->db->select('project_name');
        $ci->db->from('project_details');
        $ci->db->where(array('id' => $val));
        $query = $ci->db->get();
        $res = $query->result_array();
        $service_name[] = $res[0]['project_name'];
    }
    return $service_name;
}

function get_service_type($service_id_array = array()) {
    $service_name = array();
    foreach ($service_id_array as $val) {
        $ci = get_instance();
        $ci->db->select('fees_project_name');
        $ci->db->from('project_details2');
        $ci->db->where(array('id' => $val));
        $query = $ci->db->get();
        $res = $query->result_array();
        $service_name[] = $res[0]['fees_project_name'];
    }
    return $service_name;
}

function get_addons($service_id_array = array()) {
    $service_name = array();
    foreach ($service_id_array as $val) {
        $ci = get_instance();
        $ci->db->select('add_on_task');
        $ci->db->from('add_on_work');
        $ci->db->where(array('id' => $val));
        $query = $ci->db->get();
        $res = $query->result_array();
        $service_name[] = $res[0]['add_on_task'];
    }
    return $service_name;
}

function get_service_details($service_id = '', $order_id = '') {
    $ci = get_instance();
    $ci->db->select('pd.project_name as project_name,pd.fess_p_hour as fess_p_hour,pd.fees_p_s_feet as fees_p_s_feet,hposm.qty as qty');
    $ci->db->from('project_details pd');
    $ci->db->join('hire_professional_order_serivices_map hposm', 'pd.id = hposm.service_id', 'left');
    $ci->db->where(array('pd.id' => $service_id, 'hposm.order_id' => $order_id));
    $query = $ci->db->get();
    $res = $query->result_array();
    return $res;
}

function get_service_type_details($service_id = '', $order_id = '') {
    $ci = get_instance();
    $ci->db->select('pd.fees_project_name as fees_project_name,pd.project_fees as project_fees,hpostm.qty as qty');
    $ci->db->from('project_details2 pd');
    $ci->db->join('hire_professional_order_serivice_types_map hpostm', 'pd.id = hpostm.serivice_type_id', 'left');
    $ci->db->where(array('pd.id' => $service_id, 'hpostm.order_id' => $order_id));
    $query = $ci->db->get();
    $res = $query->result_array();
    return $res;
}

function get_addons_details($service_id = '', $order_id = '') {
    $ci = get_instance();
    $ci->db->select('aow.add_on_task as add_on_task,aow.add_on_fees as add_on_fees,poam.qty as qty');
    $ci->db->from('add_on_work aow');
    $ci->db->join('hire_professional_order_addon_map poam', 'aow.id = poam.addon_id', 'left');
    $ci->db->where(array('aow.id' => $service_id, 'poam.order_id' => $order_id));
    $query = $ci->db->get();
    $res = $query->result_array();
    return $res;
}
function get_ticket_reply($ticket_id = ''){
    $ci = get_instance();
    $ci->db->select('otl.id,otl.message,otl.reply_by,otl.reply_role_id,otl.created_date,ud.name');
    $ci->db->from('order_ticket_log otl');
    $ci->db->join('user_detail ud', 'otl.reply_by = ud.id', 'left');
    $ci->db->where(array('ticket_id' => $ticket_id,'ticket_type'=>1));
    $query = $ci->db->get();
    return $query->result_array();
}

// sourav add helper function
function check($data) {
    echo "<pre>";
    print_r($data);
    die();
}

function dateTime($type = 1) {
    switch ($type) {
        case 1:
            $date = date("Y/m/d H:i:s");
            break; //2020/11/22 18:54:23
    }
    return $date;
}

 function get_admin_session_id() {
    $ci = &get_instance();
    if ($ci->session->userdata('admin_id') == '') {
      return '';
    }else{
      return $ci->session->userdata('admin_id');
    }
  }

// sourva add helper function
  
function get_all_service_type_Details($service_id_array) {
    $service_name = array();
    $CI = get_instance();
    $CI->db->select('project_name');
    $CI->db->from('project_details');
    $CI->db->where_in('id', $service_id_array);
    $query = $CI->db->get();
    foreach ($query->result() as $row) {
        $service_name[] = $row->project_name;
    }
    return $service_name;
}

function get_all_add_ons_Details($add_ons) {
    $add_on_work = array();
    $CI = get_instance();
    $CI->db->select('add_on_task');
    $CI->db->from('add_on_work');
    $CI->db->where_in('id', $add_ons);
    $query = $CI->db->get();
    foreach ($query->result() as $row) {
        $add_on_work[] = $row->add_on_task;
    }
    return $add_on_work;
}

function get_all_service_types_Details($service_types) {
    $service_types_name = array();
    $CI = get_instance();
    $CI->db->select('fees_project_name');
    $CI->db->from('smart_project_details2');
    $CI->db->where_in('id', $service_types);
    $query = $CI->db->get();
    foreach ($query->result() as $row) {
        $service_types_name[] = $row->fees_project_name;
    }
    return $service_types_name;
}

?>