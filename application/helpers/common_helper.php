<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('user_data')){
    function user_data($key=null){
        $gi = & get_instance();
        $gi->load->database();
        $gi->load->library('session');
        if(empty($gi->session->userdata('id'))){
            return false;
        }else{
            if(empty($gi->session->userdata('role'))){
                return $gi->db->get_where('customers', array('customer_id'=>$gi->session->userdata('id')))->row($key);
            }else{
                return $gi->db->get_where('users', array('user_id'=>$gi->session->userdata('id'), 'role'=>$gi->session->userdata('role')))->row($key);
            }
        }
    }
}
if(!function_exists('access')){
    function access($dep=0){
        $gi = & get_instance();
        $gi->load->library('session');
        if($dep==0){
            if (!empty($gi->session->userdata('id'))) { return true; }else{ return null; }
        }else{
            if(!empty($gi->session->userdata('id'))){
                if (!empty($gi->session->userdata('role'))) { return true; }else{ return null; }
            }else{
                return null;
            }
        }
    }
}
if(!function_exists('setting')){
    function setting($key){
        $gi = & get_instance();
        $gi->load->database();
        return $gi->db->get_where('settings', array('key'=>$key))->row()->value;
    }
}
if(!function_exists('get_category')){
    function get_category($id=0){
        $gi = & get_instance();
        $gi->load->database();
        $fc = $id==0 ? $gi->db : $gi->db->where('parent',$id);
        return $fc->get_where('categories',array('status'=>1))->result();
    }
}
if(!function_exists('check_category')){
    function check_category($id=0){
        $cp=false;
        $gi = & get_instance();
        $gi->load->database();
        foreach ($gi->db->get_where('categories',array('parent'=>$id))->result() as $key => $value) {
            $cp=$value->parent ? true : false;
        }
        return $cp;
    }
}

if(!function_exists('cart')){
    function cart($product_id=null){
        $gi = & get_instance();
        $gi->load->library('cart');
        if ($product_id==null) {
            return $gi->cart->contents();
        }else{
            foreach ($gi->cart->contents() as $key => $value) {
                if($product_id==$value['id']) return $value;
            }
        }

    }
}


//--------- header css js--------//
if(!function_exists('redirect_error')){
    function redirect_error(){
        return redirect('not_found');
    }
}
if(!function_exists('base_server')){
    function server_url($link=null){
        $ci = &get_instance();
        server_url('server/'.$link);
    }
}
if(!function_exists('check_thumb')){
    function check_thumb($link=null){
        $ci = &get_instance();
        if(@getimagesize($link)){
          return $link;  //image exists!
        }else{
            return 'not found';//image does not exist.
        }
    }
}


