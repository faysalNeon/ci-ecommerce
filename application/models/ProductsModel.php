<?php 
class ProductsModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function search($data=null){
        return $this->db
        ->select('categories.name as category_name')
        ->select('categories.details as category_details')

        ->select('products.id as product_id')
        ->select('products.code as product_code')
        ->select('products.name as product_name')
        ->select('products.offer as product_offer')
        ->select('products.price as product_price')
        ->select('products.thumb as product_thumb')
        ->select('products.status as product_status')
        ->select('products.details as product_details')
        ->select('products.overview as product_overview')
        ->select('products.quantity as product_quantity')

        ->join('categories','products.category_id=categories.id')
        ->like('categories.name',$data,'both')
        ->or_like('products.name',$data,'both')
        ->or_like('products.code',$data,'both')
        ->or_like('products.price',$data,'both')
        ->or_like('products.offer',$data,'both')
        ->or_like('products.details',$data,'both')
        ->or_like('products.overview',$data,'both')
        ->or_like('categories.details',$data,'both')
        ->get_where('products', array('products.status'=>1))->result();
    }

    public function product($id=null, $all=false){
        $join=$this->db
        ->select('categories.id as category_id')
        ->select('categories.name as category_name')
        ->select('products.id as product_id')
        ->select('products.name as product_name')
        ->select('products.price as product_price')
        ->select('products.thumb as product_thumb')
        ->select('products.details as product_details')
        ->select('products.overview as product_overview')
        ->select('products.code as product_code')
        ->select('products.quantity as product_quantity')
        ->select('products.offer as product_offer')
        ->select('products.status as product_status')
        ->join('categories','categories.id=products.category_id');
        if($all){
            return $id==null? $join->get('products')->result():$join->get('products')->row(); 
        }else{
            return $id==null? $join->get_where('products', array('products.status'=>1))->result():$join->get_where('products', array('products.status'=>1))->row();
        }
    }

    public function product_by_code($code){
      return $this->product($this->db->get_where('products',array('code'=>$code))->row('id'));
    }
    public function category_data($id=null){
        return $this->db->get_where('categories', array('id'=>$id))->row();
    }
    public function product_data($id){
        return $this->db->get_where('products', array('id'=>$id))->row();
    }

    public function category($id=null,$full=false){
        $idb=$full?$this->db:$this->db->where('status',1);
        if($id==null){
            return $idb->get('categories')->result();
        }else{
            return $idb->get_where('categories', array('id'=>$id))->row();
        }
    }
    public function product_by_category_id($id){
        return $this->db->get_where('products', array('category_id'=>$id))->result();
    }
}