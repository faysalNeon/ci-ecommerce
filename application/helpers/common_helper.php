<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('user_data')){
    function user_data($key=null){
        $gi = & get_instance();
        $gi->load->database();
        $gi->load->library('session');
        if(empty($gi->session->userdata('id'))){ return false; }else{
            if(empty($gi->session->userdata('role'))){
                $result = $gi->db->get_where('customers', array('id'=>$gi->session->userdata('id')))->row($key);
            }else{
                $result = $gi->db->get_where('users', array('id'=>$gi->session->userdata('id'), 'role'=>$gi->session->userdata('role')))->row($key);
            }
            if($key=='photo'){ if(@getimagesize($result)){ return $result; }else{ return base_url('assets/images/user.png');} }else{ return $result; }
        }
    }
}
if(!function_exists('access')){
    function access($dep=0){
        $gi = & get_instance();
        $gi->load->library('session');
        if($gi->session->userdata('status')==1){
            if($dep==0){
                if (!empty($gi->session->userdata('id'))) { return true; }else{ return null; }
            }else{
                if(!empty($gi->session->userdata('id'))){
                    if (!empty($gi->session->userdata('role'))) { return true; }else{ return null; }
                }else{
                    return null;
                }
            }
        }else{
            return null;
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
if(!function_exists('cat_parent')){
    function cat_parent($id){
        $gi = & get_instance();
        $gi->load->database();
        $data = $gi->db->get_where('categories',array('id'=> $id ))->row('name');
        if($data){
            return $data;
        }else{
            return "No Parent";
        }
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

if(!function_exists('step')){
    function step($id=1){
        $ci = &get_instance();
        if($ci->session->has_userdata('step')){
            return $ci->session->userdata('step')==$id?"show":null;
        }else{
          return $id==1?"show":null;  
        }
    }
}

