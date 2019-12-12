<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Main extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
       
    }

    public function index(){
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/view_main');
        }
        
    }

   


   
}

?>