<?php 
class Home extends CI_Controller{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model('ProductsModal','pm');
    }
    public function error()
    {
        $data['title']="Page Not Found";
        $this->load->store('404', $data);
    }
    public function index()
    {
        $data['title']="Shopping Store";
        $data['sliderData']=$this->pm->slider();
        $data['bannerData']=$this->pm->banner();
        $data['featureData']=$this->pm->feature();
        $data['newData']=$this->pm->recent();
        $this->load->store('home/interface-one',$data);
    }
}