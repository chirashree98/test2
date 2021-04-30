<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function smart_encode($id = ''){
    $temp = ($id + 8038);
    return base64_encode(base64_encode($temp));
}
function smart_decode($en_id = ''){
    $temp = base64_decode(base64_decode($en_id));
    return ($temp-8038);
}
function get_array_dynamic($table = '',$con = array()){
    $ci = get_instance();
    $ci->db->select(array('id','name'));
    $qry = $ci->db->from($table);
    $ci->db->where($con);
    $qry = $ci->db->get();
    $res = $qry->result_array();
    $new_arr = array();
    foreach($res as $val){
    	$new_arr[$val['id']] = $val['name'];
    }
    return $new_arr;
}
function get_array_dynamic1($table = '',$con = array()){
    $ci = get_instance();
    $ci->db->select(array('id','name'));
    $qry = $ci->db->from($table);
    $ci->db->where($con);
    $qry = $ci->db->get();
    $res = $qry->result_array();
    return $res;
}
function is_professional_new($profess_id = ''){
    $ci = get_instance();
    $ci->db->select(array('is_new_status'));
    $qry = $ci->db->from('user_detail');
    $ci->db->where(array('id'=>$profess_id));
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
function get_active_notification(){
    $ci = get_instance();
    $ci->db->select(array('message','type'));
    $qry = $ci->db->from('notification_log');
    $ci->db->where(array('status'=>0));
    $qry = $ci->db->get();
    $res = $qry->result_array();
    return $res;
}
function get_sending_mail_id(){
    return 'benasmart@workb4live.com';
}
?>