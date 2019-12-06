<?php defined('BASEPATH') OR exit('No direct script access allowed');
 /**
 * Mother loader all Loader pass inside here
 */
 class PreLoader extends CI_Loader{
    public function __construct(){
        parent::__construct();
    }
    public function server($part_name, $vars = array(), $return = FALSE){
        if($return):
            $content  = $this->view('backend/header', $vars, $return);
            $content .= $this->view('backend/'.$part_name, $vars, $return);
            $content .= $this->view('backend/header', $vars, $return);
            return $content;
        else:
            $this->view('backend/header', $vars);
            $this->view('backend/'.$part_name, $vars);
            $this->view('backend/footer', $vars);
        endif;
    }
    public function store($part_name, $vars = array(), $return = FALSE){
        if($return):
            $content  = $this->view('frontend/header', $vars, $return);
            $content .= $this->view('frontend/'.$part_name, $vars, $return);
            $content .= $this->view('frontend/footer', $vars, $return);
            return $content;
        else:
            $this->view('frontend/header', $vars);
            $this->view('frontend/'.$part_name, $vars);
            $this->view('frontend/footer', $vars);
        endif;
    }
}
?>