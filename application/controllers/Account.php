<?php 
class Account extends CI_Controller{
    protected $table="customers";
	public function __construct(){
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }
    public function index(){
        if(access(1)){
            redirect('server');
        }elseif (access()) {
            $data['title']="My Account";
            $data['address']=$this->db->get_where('address',array('id'=>user_data('address_id')))->row();
            $this->load->store('account/home', $data);
        }else{
            redirect('login');
        }
    }
    protected function validate_login($email='', $password=''){
        $user_query = $this->db->get_where('users', array('email'=>$email, 'password'=> md5($password),'status'=>1));
        $customer_query = $this->db->get_where($this->table, array('email'=>$email, 'password'=> md5($password),'status'=>1));
        if ($customer_query->num_rows()>0){
            $this->session->set_userdata('id', $customer_query->row('id'));
            $this->session->set_userdata('status', $customer_query->row('status'));
        }elseif ($user_query->num_rows()>0) {
            $this->session->set_userdata('id', $user_query->row('id'));
            $this->session->set_userdata('role', $user_query->row('role'));
            $this->session->set_userdata('status', $user_query->row('status'));
        }else{
            return false;
        }
    }
    public function logout(){
        // $this->session->sess_destroy();
        $this->session->unset_userdata(array('id', 'role', 'status'));
        $this->session->set_flashdata('alert', array(
            'status' => 'success',
            'title' => 'Logout Alert',
            'details' => 'Successfully Log Out'
        ));
        redirect();
    }
    public function checking(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false){
            $this->session->set_flashdata('alert',array(
                'status' => 'warning',
                'title' => 'Wrong Userdata',
                'details' => validation_errors()
            ));
            if(!$this->input->is_ajax_request()) redirect('login');
        } else {
            if ($this->validate_login($this->input->post("email"), $this->input->post("password"))===false){
                $this->session->set_flashdata('alert',array(
                    'status' => 'danger',
                    'title' => 'Invalid User',
                    'details' => 'No User Found or This User Blocked By Authority'
                ));
                if(!$this->input->is_ajax_request()) redirect('login');
            } else {
                $this->session->set_flashdata('alert',array(
                    'status' => 'success',
                    'title' => 'Successfully Accessed',
                    'details' => 'Welcome to You'
                ));
                if(!$this->input->is_ajax_request()) redirect('account');
            }
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($this->session->flashdata('alert')));
        $this->output->get_output();
    }
    public function login(){
        if(access()) redirect('account');
        $data['title']="login";
        $this->load->store('account/login', $data);
    }
    // end login area 
    public function register(){
        if(access()) redirect('account');
        $data['title']="Registration";
        $this->load->store('account/register', $data);
    }
    public function payments(){
        $data['title']="Payment List";
        $data['list']='';
        $this->load->store('account/payments',$data);
    }
    public function orders(){
        $data['title']="Order list";
        $data['list']=$this->db->get_where('orders',array('customer_id'=>$this->session->userdata('id')))->result();
        $this->load->store('account/orders',$data);
    }
    public function update($field='name'){
        if(!$this->input->is_ajax_request()) redirect('account');
        $input=$this->input->post($field);
        if($field=='photo'){
            if(empty($field)){
                $status=false;
            }else{
                $this_photo = $this->input->post('photo');
                list($type, $this_photo) = array_pad(explode(';', $this_photo),2,null);
                list(, $this_photo)      = array_pad(explode(',', $this_photo),2,null);
                $this_photo = base64_decode($this_photo);
                $image_url = '/uploads/customers/customer_'.$this->session->userdata('id').'.png';
                if (file_exists($_SERVER["DOCUMENT_ROOT"].'/'.$image_url)) unlink($_SERVER["DOCUMENT_ROOT"].'/'.$image_url);
                file_put_contents($_SERVER["DOCUMENT_ROOT"].'/'.$image_url, $this_photo);
                $data[$field]=base_url($image_url);
            }
        }else{
            $data[$field]=$field=='password'?md5($input):$input;
        }
        $this->db->update($this->table, $data, array('id'=>$this->session->userdata('id')));
        if($this->db->affected_rows()>=0){
            $status=true;
        }else{
            $status=true;
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($status));
        $this->output->get_output();
    }




    public function processing(){
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[8]|max_length[16]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        if ($this->form_validation->run() == false){
            $this->session->set_flashdata('alert',array(
                'status' => 'warning',
                'title' => 'Error Validation',
                'details' => validation_errors()
            ));
            if(!$this->input->is_ajax_request()) redirect('register');
        }else{
            $email_query = $this->db->get_where($this->table,array('email'=>$this->input->post("email")));
            $mobile_query = $this->db->get_where($this->table,array('mobile'=>$this->input->post("mobile")));
            if($email_query->num_rows()>0 && $mobile_query->num_rows()>0){
                $this->session->set_flashdata('alert',array(
                    'status' => 'warning',
                    'title' => 'Already Exist',
                    'details' => 'This Email And Mobile Already Exist'
                ));
                if(!$this->input->is_ajax_request()) redirect('register');
            }elseif($email_query->num_rows()>0){
                $this->session->set_flashdata('alert',array(
                    'status' => 'warning',
                    'title' => 'Already Exist',
                    'details' => 'This Email Already Exist'
                ));
                if(!$this->input->is_ajax_request()) redirect('register');
            }elseif($mobile_query->num_rows()>0){
                $this->session->set_flashdata('alert',array(
                    'status' => 'warning',
                    'title' => 'Already Exist',
                    'details' => 'This Mobile Already Exist'
                ));
                if(!$this->input->is_ajax_request()) redirect('register');
            }else{
                $data['status']=1;
                $data['name']=$this->input->post("name");
                $data['mobile']=$this->input->post("mobile");
                $data['email']=$this->input->post("email");
                $data['password']=md5($this->input->post("password"));
                $this->db->insert($this->table, $data);
                if ($this->validate_login($this->input->post("email"), $this->input->post("password"))){
                    $this->session->set_flashdata('alert',array(
                        'status' => 'danger',
                        'title' => 'Invalid User',
                        'details' => 'No User Found. Please Register First'
                    ));
                    if(!$this->input->is_ajax_request()) redirect('register');
                }else{
                    $this->session->set_flashdata('alert',array(
                        'status' => 'success',
                        'title' => 'Successfully Accessed',
                        'details' => 'Welcome to You'
                    ));
                    if(!$this->input->is_ajax_request()) redirect('account');
                }
            }
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($this->session->flashdata('alert')));
        $this->output->get_output();
    }
    public function deactive(){
        if(!access()) redirect();
        $this->db->update($this->table, array('id'=>$this->session->userdata('id'),'status'=>0));
        $this->session->sess_destroy();
        $this->session->set_flashdata('alert',array(
            'status' => 'success',
            'title' => 'Deactive status',
            'details' => 'You have Successfully Deactived'
        ));
        if(!$this->input->is_ajax_request()) redirect();
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($this->session->flashdata('alert')));
        $this->output->get_output();
    }
    public function address($id=null){
        $data['address']=$this->input->post("address");
        $data['city']=$this->input->post("city");
        $data['country']=$this->input->post("country");
        $data['zip']=$this->input->post("zip");
        $data['status']=1;
        if ($id) {
            $this->db->update('address', $data, array('id'=>$id));
        }else{
            $this->db->insert('address', $data);
            $this->db->update($this->table, array('id'=>$this->session->userdata('id'), 'address_id'=> $this->db->insert_id()));
        }
        if($this->db->affected_rows()>=0){
            $this->session->set_flashdata('alert',array(
                'status' => 'success',
                'title' => 'Address Status',
                'details' => 'You have Successfully'.$id?'You have Successfully Updated':'You have Successfully Added'
            ));
        }else{
            $this->session->set_flashdata('alert',array(
                'status' => 'danger',
                'title' => 'Address Status',
                'details' => 'Something Went Wrong'
            ));
        }
        if(!$this->input->is_ajax_request()) redirect('account');
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($this->session->flashdata('alert')));
        $this->output->get_output();
    }
}