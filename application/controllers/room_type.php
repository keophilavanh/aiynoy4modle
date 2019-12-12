<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class room_type extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('room_type_model');
        $this->load->model('Employee_model');
       
    }

    public function index(){
        
        if($this->Employee_model->check_token())
        {
            $this->load->view('conten/manage/view_room_type');
        }
        
    }

    function fetch_room_type(){  
      
        $this->load->model("room_type_model");  
        $fetch_data = $this->room_type_model->make_datatables();  
        $data = array();  

        if($this->room_type_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->room_type_id;   
             $sub_array[] = $row->room_name_type;  
             $sub_array[] =  number_format($row->price,0).' ກີບ'; 
            
             $sub_array[] = '<a href="#" id="'.$row->room_type_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             <a href="#" id="'.$row->room_type_id.'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';  
            
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
             "recordsTotal"          =>      $this->room_type_model->get_all_data(),  
             "recordsFiltered"     =>     $this->room_type_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 

    public function add_room_type(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            
            'room_name_type' => $_POST["room_name_type"],
            'price' => $_POST["price"],
            
            );
        $this->load->model('room_type_model');
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->room_type_model->add_room_type($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode($this->room_type_model->Edit_room_type($data,$_POST["room_type_id"]));

        }
        
    }

    public function get_room_type(){
        $id = $_POST["room_type_id"];
        $this->load->model('room_type_model');
        echo json_encode($this->room_type_model->get_room_type($id));
    }

    public function delete_room_type(){
        $id = $_POST["room_type_id"];
        $this->load->model('room_type_model');
        echo json_encode($this->room_type_model->delete_room_type($id));
    }
   


   
}

?>