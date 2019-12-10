<?php 
class Settings extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
        // if (empty(access(1))) return redirect(base_url(),'refresh');
    }
    public function menu_toggle(){
        if ($this->session->has_userdata('menu_active')) {
            if ($this->session->userdata('menu_active')==true) {
                $this->session->set_userdata('menu_active', false);
            }else{
                $this->session->set_userdata('menu_active', true);
            }
        }else{
            $this->session->set_userdata('menu_active', true);
        }
        $data=$this->session->userdata('menu_active');
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        $this->output->get_output();
    }
    public function index(){
        $data['title']='Options';
        $this->load->server('settings/options',$data);
    }
    public function banners($crud = 'list'){
        // if (empty(access(1))) return redirect(base_url(),'refresh');
        if($crud==='list'){
            $data['title']='Banner List';
            $this->load->server('settings/banners',$data);
        }
    }
    public function sliders($crud = 'list'){
        // if (empty(access(1))) return redirect(base_url(),'refresh');
        if($crud==='list'){
            $data['title']='Sliders List';
            $this->load->server('settings/sliders',$data);
        }
    }
    public function options($crud = 'list'){
        // if (empty(access(1))) return redirect(base_url(),'refresh');
        if($crud==='list'){
            $data['title']='Options';
            $this->load->server('settings/options',$data);
        }
    }
    public function users($crud = 'list'){
        // if (empty(access(1))) return redirect(base_url(),'refresh');
        if($crud==='list'){
            $data['title']='User List';
            $this->load->server('settings/users/list',$data);
        }
    }
}