<?php 
class HomeModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    // home 
    public function slider(){
        return $this->db
        ->get_where('sliders', array('status' => 1))
        ->result();
    }
    public function banner(){
        return $this->db
        ->get_where('banners',array('status' => 1))
        ->result();
    }
    public function feature(){
        return $this->db
        ->join('products','products.id=features.product_id')
        ->get_where('features',array('products.status' => 1,'features.status' => 1))
        ->result();
    }
    public function recent(){
        return $this->db
        ->join('products', 'products.id=features.product_id')
        ->get_where('features',array('products.status' => 1,'features.status' => 1))
        ->result();
    }
    // server area 
    public function total_product($all=true){
        if($all==true){
            return $this->db->get('products')->num_rows();
        }else{
            return $this->db->get_where('products',array('status'=>1))->num_rows();
        }
    }
    public function total_customer($all=true){
        if($all==true){
            return $this->db->get('customers')->num_rows();
        }else{
            return $this->db->get_where('customers',array('status'=>1))->num_rows();
        }
    }
    public function total_order($all=true){
        if($all==true){
            return $this->db->get('orders')->num_rows();
        }else{
            return $this->db->get_where('orders',array('status'=>1))->num_rows();
        }
    }
    // settings area 
    public function payment_methods($all=true){
        if($all==true){
            return $this->db->get('payment_methods')->result();
        }else{
            return $this->db->get_where('payment_methods',array('status'=>1))->result();
        }
    }
    public function shipping_methods($all=true){
        if($all==true){
            return $this->db->get('shipping_methods')->result();
        }else{
            return $this->db->get_where('shipping_methods',array('status'=>1))->result();
        }
    }
}
