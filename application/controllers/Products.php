<?php 
class Products extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('ProductsModal','pm');
    }
    public function index(){
        $data['title']='all Products';
        $data['productList']=$this->db->where('products.status',1)->get('products')->result();        
        $this->load->store('products/category', $data);
    }
    public function category($slug=null){
        if($slug==null) return redirect('products');
        $data['title']=$this->pm->category($slug)->name;
        $data['productList']=$this->pm->by_category($slug);
        $this->load->store('products/category',$data);
    }
    public function single($params=null){
        $data['title']=$this->pm->by_code($params)->product_name;
        $data['sd']=$this->pm->by_code($params);
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