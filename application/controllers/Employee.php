<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Employee extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
       
    }

    public function index(){
       
        if($this->Employee_model->check_token())
        {
            $this->load->view('conten/manage/view_Employee');
        }
    }

    



    function fetch_user(){  
      
        $this->load->model("Employee_model");  
        $fetch_data = $this->Employee_model->make_datatables();  
        $data = array();  

        if($this->Employee_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->emp_id;   
             $sub_array[] = $row->emp_fname.' '.$row->emp_lname;  
             $sub_array[] = $row->emp_phone;  
             $sub_array[] = $row->emp_address;  
             $sub_array[] = '<a href="#" id="'.$row->emp_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             <a href="#" id="'.$row->emp_id.'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';  
            
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
             "recordsTotal"          =>      $this->Employee_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Employee_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 

    public function addEmployee(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'emp_fname' => $_POST["firstName"],
            'emp_lname' => $_POST["lastName"],
            'emp_phone' => $_POST["phone"],
            'emp_address' => $_POST["Address"],
            'username' => $_POST["Username"],
            'password' => base64_encode($_POST["Password"]),
            'permission' => $_POST["Type"]
            );
        $this->load->model('Employee_model');
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->Employee_model->addEmployee($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode($this->Employee_model->EditEmployee($data,$_POST["employee_id"]));

        }
        
    }

    public function getEmployee(){
        $id = $_POST["employee_id"];
        $this->load->model('Employee_model');
        echo json_encode($this->Employee_model->getEmployee($id));
    }

    public function deletEmployee(){
        $id = $_POST["employee_id"];
        $this->load->model('Employee_model');
        echo json_encode($this->Employee_model->deleteEmployee($id));
    }

   
   


   
}

?>