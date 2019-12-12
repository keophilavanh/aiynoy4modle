<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class room extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('room_model');
        $this->load->model('Employee_model');
       
    }

    public function index(){
        
        if($this->Employee_model->check_token())
        {
            $this->load->view('conten/manage/view_room');
        }
        
    }

    function fetch_data(){  
      
        //$this->load->model("Floor_model");  
        $data = array();

        if($this->room_model->get_all_data() > 0){

            $fetch_data = $this->room_model->make_datatables();  
        

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->room_id;   
             $sub_array[] = $row->room_name;
             $sub_array[] = $row->room_name_type; 
             $sub_array[] = $row->floor_name;   
             $sub_array[] = $row->price.' ກີບ';  
             
            
             $sub_array[] = '<a href="#" id="'.$row->room_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             <a href="#" id="'.$row->room_id.'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';  
            
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
             "recordsTotal"          =>      $this->room_model->get_all_data(),  
             "recordsFiltered"     =>     $this->room_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 

    public function add_item(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            
            'room_name' => $_POST["room_name"],
            'room_type_id' => $_POST["room_type_id"],
            'floor_id' => $_POST["floor_id"],
            
            );
        //$this->load->model('Floor_model');
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->room_model->add_item($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode($this->room_model->Edit_item($data,$_POST["room_id"]));

        }
        
    }

    public function get_item(){
        $id = $_POST["room_id"];
       // $this->load->model('Floor_model');
        echo json_encode($this->room_model->get_item($id));
    }

    public function delete_item(){
        $id = $_POST["room_id"];
        //$this->load->model('Floor_model');
        echo json_encode($this->room_model->delete_item($id));
    }

    public function fetch_floor(){
        
        $this->load->model('Floor_model');
        $fetch_data = $this->Floor_model->all_floor();
        $output=" ";
            foreach($fetch_data as $row)  
            {  
             
                $output.='<option value="'.$row->floor_id.'">'.$row->floor_name.'</option>';
             
            } 

        echo $output;
    }

    public function fetch_room_type(){
        
        $this->load->model('room_type_model');
        $fetch_data = $this->room_type_model->all_room_type();
        $output=" ";
            foreach($fetch_data as $row)  
            {  
             
                $output.='<option value="'.$row->room_type_id.'">'.$row->room_name_type.'</option>';
             
            } 

        echo $output;
    }
   


   
}

?>