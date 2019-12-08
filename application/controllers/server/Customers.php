<?php 
class Customers extends CI_Controller{
    protected $table="categories";
    protected $primary='id';
    protected $home='server/categories';
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
        $data['title']='Category list';
        $data['cat_list']=$this->db->get($this->table)->result();
        $this->load->server('catalog/category/list',$data);
    }
    public function new(){
        $data['data']=false;
        $data['title']="New Category";
        $data['target_url']=base_url($this->home.'/store/new');
        $data['list']=$this->pm->category();
        $this->load->server('catalog/category/view',$data);
    }
    public function edit($id){
        if(empty($id)) return redirect($this->home);
        $data['data']=true;
        $data['target_url']=base_url($this->home.'/store/update');
        $data['title']=$this->pm->category_data($id)->name;
        $data['item']=$this->pm->category_data($id);
        $data['list']=$this->pm->category();
        $this->load->server('catalog/category/view',$data);
    }
    public function store($type){
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('details', 'Details', 'min_length[3]');
        $this->form_validation->set_rules('parent', 'Parent', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false){
            $this->session->set_flashdata('alert',array(
                'status' => 'warning',
                'title' => $type=='update'?'Update Status':'Added Status',
                'details' => validation_errors()
            ));
            return redirect($this->home.'/new');
        }
        $data["name"]=$this->input->post("name");
        $data["details"]=$this->input->post("details");
        $data["parent"]=$this->input->post("parent");
        $data["order"]=$this->input->post("order");
        $data["top"]=$this->input->post("top")==null? 0 : 1;
        $data["status"]=$this->input->post("status");
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