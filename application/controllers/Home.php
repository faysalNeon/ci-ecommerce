<?php 
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function error(){
        $data['title']="Page Not Found";
        $this->load->store('404', $data);
    }
    public function index(){
        $data['title']="Shopping Store";
        $this->load->store('home/interface-one',$data);
    }
}