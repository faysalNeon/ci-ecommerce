<?php 
class Products extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['title']='all Products';
        $data['productList']=$this->pm->by_id();        
        $this->load->store('products/category', $data);
    }
    public function category($id=null){
        if($id==null) return redirect('products');
        $data['title']=$this->pm->category($id)->name;
        $data['productList']=$this->pm->product_by_category_id($id);
        $this->load->store('products/category',$data);
    }
    public function single($code=null){
        if ($code==null) return redirect();
        $data['title']=$this->pm->product_by_code($code)->product_name;
        $data['sd']=$this->pm->product_by_code($code);
        $this->load->store('products/product', $data);
    }
    public function search(){
        $searchInput=$this->input->post('search');
        if ($this->input->is_ajax_request()){
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($this->pm->search($searchInput)));
            echo $this->output->get_output(); exit();
        }else{
            $data['title']="Product Search";
            $data['searchData']=$searchInput;
            $this->load->store('products/search',$data);
        }
    }
}