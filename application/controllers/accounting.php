<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class accounting extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        
       
    }

    public function index(){
        // $data['userRecords'] = $this->Employee_model->userListing();
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/accounting/view_accounting');
        }
        
    }

    

  
   


   
}

?>