<?php 
class Catalog extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
        if (empty(access(1))) return redirect(base_url(),'refresh');
    }
    public function index(){
       redirect('catalog/product','refresh');
    }
    public function product($crud = 'list'){
        if (empty(access(1))) return redirect(base_url(),'refresh');
        if($crud==='list'){
            $data['title']='Product List';
            $this->load->server('catalog/product/list.php',$data);
        }
    }
    public function new_product(){
        
    }

}