<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Login extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('room_model');
       
    }

    public function index(){
        // $data['userRecords'] = $this->Employee_model->userListing();
        $this->load->view('view_login');
    }

    public function user_login(){
        $Username = $_POST["Username"];
        $Password  = $_POST["Password"];
        $this->load->model('Employee_model');
        $data = $this->Employee_model->user_login($Username, base64_encode($Password));
        if($data){
            $this->load->library('session');
            $this->session->token = base64_encode(json_encode($data));
            echo 'true';
        }else{
            echo 'false';
        }

        
    }



  
   


   
}

?>