<?php
class Products extends CI_Controller{
    protected $table="products";
    protected $primary='product_id';
    protected $home='server/products';
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
        $this->load->model('ProductsModel','pm');
        if (empty(access(1))) return redirect();
    }
    public function index(){
        $data['title']='Product list';
        $data['product_list']=$this->pm->product();
        $this->load->server('catalog/product/list',$data);
    }
    public function new(){
        $data['data']=false;
        $data['title']="New Product";
        $data['target_url']=base_url($this->home.'/store/new');
        $data['list']=$this->pm->category();
        $this->load->server('catalog/product/view',$data);
    }
    public function edit($id){
        if(empty($id)) return redirect($this->home);
        $data['data']=true;
        $data['target_url']=base_url($this->home.'/store/update');
        $data['title']=$this->pm->product_data($id)->name;
        $data['item']=$this->pm->product($id);
        $data['list']=$this->pm->category();
        $this->load->server('catalog/product/view',$data);
    }
    public function store($type){
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('details', 'Details', 'min_length[3]');
        $this->form_validation->set_rules('product_code', 'Product Code', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('overview', 'overview', 'required');
        $this->form_validation->set_rules('thumb', 'thumb', 'required');
        $this->form_validation->set_rules('old_price', 'Old Price', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false){
            $this->session->set_flashdata('alert',array(
                'status' => 'warning',
                'title' => $type=='update'?'Update Status':'Added Status',
                'details' => validation_errors()
            ));
            return redirect($this->home.'/new');
        }
        $data['name']= $this->input->post('name');
        $data['details']= $this->input->post('details');
        $data['product_code']= $this->input->post('product_code');
        $data['category']= $this->input->post('category');
        $data['overview']= $this->input->post('overview');
        $data['old_price']= $this->input->post('old_price');
        $data['price']= $this->input->post('price');
        $data['quantity']= $this->input->post('quantity');
        $data['status']= $this->input->post('status');

        if ($this->input->post('thumb')!=''){
            $this_thumb = $this->input->post('thumb');
            list($type, $this_thumb) = array_pad(explode(';', $this_thumb),2,null);
            list(, $this_thumb)      = array_pad(explode(',', $this_thumb),2,null);
            $this_thumb = base64_decode($this_thumb);
            $image_url = 'uploads/product/'.$data['product_code'].'.jpg';
            if (file_exists($_SERVER["DOCUMENT_ROOT"].'/'.$image_url)) unlink($_SERVER["DOCUMENT_ROOT"].'/'.$image_url);
            file_put_contents($_SERVER["DOCUMENT_ROOT"].$image_url, $this_thumb);
            $data['thumb']=$image_url;
        }

        if($type=='update'){
            $this->db->where($this->primary, $this->input->post($this->primary));
            $this->db->update($this->table, $data);
        }else{
            $this->db->insert($this->table, $data);
        }
        if($this->db->affected_rows()>=0){
            $this->session->set_flashdata('alert',array(
                'status' => 'success',
                'title' => $type=='update'?'Update Status':'Added Status',
                'details' => $type=='update'?'Successfully Update':'Successfully Added'
            ));
        }else{
            $this->session->set_flashdata('alert',array(
                'status' => 'danger',
                'title' => $type=='update'?'Update Status':'Added Status',
                'details' => 'Something went wrong'
            ));
        }
        if(!$this->input->is_ajax_request()) redirect($this->home,'refresh');
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($this->session->flashdata('alert')));
        $this->output->get_output();
    }
    public function remove($id){
        $this->db->where($this->primary, $id);
        $this->db->delete($this->table);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('alert',array(
                'status' => 'success',
                'title' => 'Remove Status',
                'details' => 'Successfully Remove'
            ));
        }else{
            $this->session->set_flashdata('alert',array(
                'status' => 'danger',
                'title' => 'Remove Status',
                'details' => 'Something went wrong to Remove'
            ));
        }
        if(!$this->input->is_ajax_request()) redirect($this->home);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($this->session->flashdata('alert')));
        $this->output->get_output();
    }
    public function status($id){
        $data['status'] = $this->db->get_where($this->table,array($this->primary =>$id))->row('status')==1?0:1;
        $this->db->where($this->primary, $id);
        $this->db->update($this->table, $data);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('alert',array(
                'status' => 'success',
                'title' => 'Update Status',
                'details' => 'Successfully Update'
            ));
        }else{
            $this->session->set_flashdata('alert',array(
                'status' => 'danger',
                'title' => 'Update Status',
                'details' => 'Something went wrong to Update'
            ));
        }
        if(!$this->input->is_ajax_request()) redirect($this->home);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($this->session->flashdata('alert')));
        $this->output->get_output();
    }
}