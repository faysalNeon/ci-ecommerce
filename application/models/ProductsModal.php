<?php 
class ProductsModal extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function search($data=null){
        return $this->db
        ->select('categories.name as cat_name')
        ->select('categories.slug as cat_slug')
        ->select('categories.details as cat_details')

        ->select('products.name as product_name')
        ->select('products.price as product_price')
        ->select('products.thumb as product_thumb')
        ->select('products.details as product_details')
        ->select('products.overview as product_overview')
        ->select('products.product_code as product_code')
        ->select('products.quantity as product_quantity')
        ->select('products.old_price as product_old_price')

        ->join('categories','products.category=categories.cat_id')
        ->like('categories.slug',$data,'both')
        ->or_like('categories.name',$data,'both')
        ->or_like('categories.details',$data,'both')
        ->or_like('products.price',$data,'both')
        ->or_like('products.name',$data,'both')
        ->or_like('products.details',$data,'both')
        ->or_like('products.overview',$data,'both')
        ->or_like('products.old_price',$data,'both')
        ->or_like('products.product_code',$data,'both')
        ->get_where('products', array('products.status'=>1))->result();
    }
    public function by_id($id = null){
        $join=$this->db
        ->select('categories.name as cat_name')
        ->select('categories.slug as cat_slug')
        ->select('categories.details as cat_details')

        ->select('product_id')
        ->select('products.name as product_name')
        ->select('products.price as product_price')
        ->select('products.thumb as product_thumb')
        ->select('products.details as product_details')
        ->select('products.overview as product_overview')
        ->select('products.product_code as product_code')
        ->select('products.quantity as product_quantity')
        ->select('products.old_price as product_old_price')

        ->join('categories','categories.cat_id=products.category');
        if ($id==null) {
            return $join->get_where('products',array('products.status'=>1))->result();
        }else{
            return $join->get_where('products',array('products.product_id'=>$id,'products.status'=>1))->row();
        }
    }
    public function by_code($code = null){
        if($code==null){
            return $this->by_id();
        }else{
            $id=$this->db->get_where('products',array('product_code'=>$code))->row('product_id');
            return $this->by_id($id);
        }
    }
    public function category($slug=null){
        return  $this->db->get_where('categories', array('slug'=>$slug))->row();
    }
    public function by_category($slug=null){
        $catId = $this->category($slug)->cat_id;
        $join=$this->db
        ->select('categories.name as cat_name')
        ->select('categories.slug as cat_slug')
        ->select('categories.details as cat_details')

        ->select('product_id')
        ->select('products.name as product_name')
        ->select('products.price as product_price')
        ->select('products.thumb as product_thumb')
        ->select('products.details as product_details')
        ->select('products.overview as product_overview')
        ->select('products.product_code as product_code')
        ->select('products.quantity as product_quantity')
        ->select('products.old_price as product_old_price')
        ->join('categories','categories.cat_id=products.category');
        $where = $join->where('cat_id', $catId)->or_where('parent',$catId);
        return $where->get_where('products', array('products.status'=>1))->result();
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
        ->join('products', 'products.product_id=features.product_id')
        ->get_where('features',array('products.status' => 1,'features.status' => 1))
        ->result();
    }
    public function recent(){
        return $this->db
        ->join('products', 'products.product_id=features.product_id')
        ->get_where('features',array('products.status' => 1,'features.status' => 1))
        ->result();
    }
}