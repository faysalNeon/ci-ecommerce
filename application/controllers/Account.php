<?php 
class Account extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }
    public function index(){
        if(access(1)){
            redirect(base_url('server'),'refresh');
        }elseif (access()) {
            $data['title']="My Account";
            $this->load->store('account/home', $data);
        }else{
            redirect('login','refresh');
        }
    }
    protected function validate_login($email='', $password=''){
        $user_query = $this->db->get_where('users', array('email'=>$email, 'password'=> md5($password),'status'=>1));
        $customer_query = $this->db->get_where('customers', array('email'=>$email, 'password'=> md5($password),'status'=>1));
        if ($customer_query->num_rows()>0){
            $this->session->set_userdata('id', $customer_query->row('customer_id'));
            $this->session->set_userdata('status', $customer_query->row('status'));
        }elseif ($user_query->num_rows()>0) {
            $this->session->set_userdata('id', $user_query->row('user_id'));
            $this->session->set_userdata('role', $user_query->row('role'));
            $this->session->set_userdata('status', $user_query->row('status'));
        }else{
            return false;
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('alert', array(
            'status' => 'success',
            'title' => 'Logout Alert',
            'details' => 'Successfully Log Out'
        ));
        redirect('/','refresh');
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
            redirect('login','refresh');
        } else {
            if ($this->validate_login($this->input->post("email"), $this->input->post("password"))===false){
                $this->session->set_flashdata('alert',array(
                    'status' => 'danger',
                    'title' => 'Invalid User',
                    'details' => 'No User Found or This User Blocked By Authority'
                ));
                redirect('login','refresh');
            } else {
                $this->session->set_flashdata('alert',array(
                    'status' => 'success',
                    'title' => 'Successfully Accessed',
                    'details' => 'Welcome to You'
                ));
                redirect('account','refresh');
            }
        }
    }
    public function login(){
        if(access()) redirect('account','refresh');
        $data['title']="login";
        $this->load->store('account/login', $data);
    }
    // end login area 
    public function register(){
        if(access()) redirect('account','refresh');
        $data['title']="register";
        $this->load->store('account/register', $data);
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
            redirect('register','refresh');
        }else{
            $email_query = $this->db->get_where('customers',array('email'=>$this->input->post("email")));
            $mobile_query = $this->db->get_where('customers',array('mobile'=>$this->input->post("mobile")));
            if($email_query->num_rows()>0 && $mobile_query->num_rows()>0){
                $this->session->set_flashdata('alert',array(
                    'status' => 'warning',
                    'title' => 'Already Exist',
                    'details' => 'This Email And Mobile Already Exist'
                ));
                redirect('register','refresh');
            }elseif($email_query->num_rows()>0){
                $this->session->set_flashdata('alert',array(
                    'status' => 'warning',
                    'title' => 'Already Exist',
                    'details' => 'This Email Already Exist'
                ));
                redirect('register','refresh');
            }elseif($mobile_query->num_rows()>0){
                $this->session->set_flashdata('alert',array(
                    'status' => 'warning',
                    'title' => 'Already Exist',
                    'details' => 'This Mobile Already Exist'
                ));
                redirect('register','refresh');
            }else{
                $data['status']=1;
                $data['name']=$this->input->post("name");
                $data['mobile']=$this->input->post("mobile");
                $data['email']=$this->input->post("email");
                $data['password']=md5($this->input->post("password"));
                $this->db->insert('customers', $data);
                if ($this->validate_login($this->input->post("email"), $this->input->post("password"))){
                    $this->session->set_flashdata('alert',array(
                        'status' => 'danger',
                        'title' => 'Invalid User',
                        'details' => 'No User Found. Please Register First'
                    ));
                    redirect('register','refresh');
                }else{
                    $this->session->set_flashdata('alert',array(
                        'status' => 'success',
                        'title' => 'Successfully Accessed',
                        'details' => 'Welcome to You'
                    ));
                    redirect('account','refresh');
                }
            }
        }
    }
}