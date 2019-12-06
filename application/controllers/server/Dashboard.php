<?php 
class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
        // if (empty(access(1))) return redirect('/','refresh');
    }
    public function index(){
        // if (empty(access(1))) return redirect('/','refresh');
        $data['title']='Dashboard';
        $this->load->server('dashboard/index',$data);
    }
    public function sliders(){
        // if (empty(access(1))) return redirect('/','refresh');
        $data['title']='slider List';
        $this->load->server('dashboard/sliders',$data);
    }
    public function data_sliders(){
        $data=array(
            array(
                'id'=>'1',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'2',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'3',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'4',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'5',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'6',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'7',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'8',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'9',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'10',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            ),
            array(
                'id'=>'11',
                'name'=>'Tiger Nixon',
                'position'=>'System Architect',
                'salary'=>'$320,800',
                'start_date'=>'2011/04/25',
                'office'=>'Edinburgh',
                'extn'=>'5421'
            )
        );
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        $this->output->get_output();
    }
}