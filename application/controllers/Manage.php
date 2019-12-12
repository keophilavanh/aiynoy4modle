<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Manage extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('room_model');
       
    }

    public function index(){
        // $data['userRecords'] = $this->Employee_model->userListing();
        $this->load->view('conten/manage/view_manage');
    }

    

  
   


   
}

?>