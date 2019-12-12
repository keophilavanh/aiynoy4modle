<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Floor extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Floor_model');
        $this->load->model('Employee_model');
       
    }

    public function index(){
        
        if($this->Employee_model->check_token())
        {
            $this->load->view('conten/manage/view_Floor');
        }
        
    }

    function fetch_Floor(){  
      
        $this->load->model("Floor_model");  
        $fetch_data = $this->Floor_model->make_datatables();  
        $data = array();  

        if($this->Floor_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->floor_id;   
             $sub_array[] = $row->floor_name;  
            
             $sub_array[] = '<a href="#" id="'.$row->floor_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             <a href="#" id="'.$row->floor_id.'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';  
            
             $data[] = $sub_array;  
            } 

        }else{

            $sub_array = array();  
            $sub_array[] = '';   
            $sub_array[] = '';  
            $sub_array[] = '';  
            
           
            $data[] = $sub_array;  


        }
         
        $output = array(  
             "draw"                    =>     intval($_POST["draw"]),  
             "recordsTotal"          =>      $this->Floor_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Floor_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 

    public function addfloor(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            
            'floor_name' => $_POST["floor_name"],
            
            );
        $this->load->model('Floor_model');
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->Floor_model->addfloor($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode($this->Floor_model->Editfloor($data,$_POST["floor_id"]));

        }
        
    }

    public function getfloor(){
        $id = $_POST["floor_id"];
        $this->load->model('Floor_model');
        echo json_encode($this->Floor_model->getfloor($id));
    }

    public function deletefloor(){
        $id = $_POST["floor_id"];
        $this->load->model('Floor_model');
        echo json_encode($this->Floor_model->deletefloor($id));
    }
   


   
}

?>