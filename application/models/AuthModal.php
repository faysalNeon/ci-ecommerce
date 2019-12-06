<?php 
class AuthModal extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function create_log($data) {
        $data['timestamp'] = strtotime(date('d-m-Y') . ' ' . date('H:i:s'));
        $data['ip'] = $_SERVER["REMOTE_ADDR"];
        $location = new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/' . $_SERVER["REMOTE_ADDR"]));
        $data['location'] = $location->City . ' , ' .$location->CountryName;
        $this->db->insert('log', $data);
    }
    public function user_data($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }
    public function customer_data($id){
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('id',$id);
        return $this->db->get()->row();
    }
}