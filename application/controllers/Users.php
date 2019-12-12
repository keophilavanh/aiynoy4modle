<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Users extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/manage/view_Users');
        }
    }

    



    function fetch_user(){  
      
       
        $fetch_data = $this->Users_model->make_datatables();  
        $data = array();  

        if($this->Users_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->user_id;   
             $sub_array[] = $row->user_fname.' '.$row->user_lname;  
             $sub_array[] = $row->user_phone;  
             $sub_array[] = $row->user_address;  
             $sub_array[] = '<a href="#" id="'.$row->user_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             <a href="#" id="'.$row->user_id.'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';  
            
             $data[] = $sub_array;  
            } 

        }else{

            $sub_array = array();  
            $sub_array[] = '';   
            $sub_array[] = '';  
            $sub_array[] = '';  
            $sub_array[] = '';  
           
            $data[] = $sub_array;  


        }
         
        $output = array(  
             "draw"                    =>     intval($_POST["draw"]),  
             "recordsTotal"          =>      $this->Users_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Users_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 

    public function addUsers(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'user_fname' => $_POST["firstName"],
            'user_lname' => $_POST["lastName"],
            'user_phone' => $_POST["phone"],
            'user_address' => $_POST["Address"],
            'username' => $_POST["Username"],
            'password' => base64_encode($_POST["Password"]),
            'permission' => $_POST["Type"]
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->Users_model->addEmployee($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->Users_model->EditEmployee($data,$_POST["employee_id"]) );

        }
        
    }

    public function getEmployee(){
        $id = $_POST["employee_id"];
       
        echo json_encode($this->Users_model->getEmployee($id));
    }

    public function deletEmployee(){
        $id = $_POST["employee_id"];
        echo json_encode($this->Users_model->deleteEmployee($id));
    }

   
   


   
}

?>