<?php 
class Shopping extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
        if (empty(access(1))) return redirect(base_url(),'refresh');
    }
    public function index(){
        return redirect('server/shopping/orders','refresh');
    }
    public function orders($crud = 'list'){
        if (empty(access(1))) return redirect(base_url(),'refresh');
        if($crud==='list'){
            $data['title']='Order List';
            $this->load->server('shopping/orders',$data);
        }
    }
    public function customers($crud = 'list'){
        // if (empty(access(1))) return redirect(base_url(),'refresh');
        if($crud==='list'){
            $data['title']='Customers List';
            $this->load->server('shopping/customer/list',$data);
        }
    }
}