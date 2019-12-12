<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Customer extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Employee_model');
       
    }

    public function index(){
        if($this->Employee_model->check_token())
        {
            $this->load->view('conten/manage/view_customer');
        }
       
    }

    function fetch_data(){  
      
        //$this->load->model("Floor_model");  
        $data = array();

        if($this->Customer_model->get_all_data() > 0){

            $fetch_data = $this->Customer_model->make_datatables();  
        

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->customer_id;   
             $sub_array[] = $row->customer_name;
             $sub_array[] = $row->from; 
             $sub_array[] = $row->phone	;   
             $sub_array[] = $row->address;  
             $sub_array[] = $row->card;
             $sub_array[] = $row->passpor;
             
            
             $sub_array[] = '<a href="#" id="'.$row->customer_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             <a href="#" id="'.$row->customer_id.'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';  
            
             $data[] = $sub_array;  
            } 

        }else{

            $sub_array = array();  
            $sub_array[] = '';   
            $sub_array[] = '';  
            $sub_array[] = ''; 
            $sub_array[] = '';   
            $sub_array[] = '';  
            $sub_array[] = '';  
            $sub_array[] = ''; 
            $sub_array[] = ''; 
            
           
            $data[] = $sub_array;  


        }
         
        $output = array(  
             "draw"                    =>     intval($_POST["draw"]),  
             "recordsTotal"          =>      $this->Customer_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Customer_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 

    public function add_item(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            
            'customer_name' => $_POST["customer_name"],
            'from' => $_POST["from"],
            'phone' => $_POST["phone"],
            'address' => $_POST["address"],
            'card' => $_POST["card"],
            'passpor' => $_POST["passpor"],

            
            );
        //$this->load->model('Floor_model');
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->Customer_model->add_item($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode($this->Customer_model->Edit_item($data,$_POST["customer_id"]));

        }
        
    }

    public function get_item(){
        $id = $_POST["customer_id"];
       // $this->load->model('Floor_model');
        echo json_encode($this->Customer_model->get_item($id));
    }

    public function delete_item(){
        $id = $_POST["customer_id"];
        //$this->load->model('Floor_model');
        echo json_encode($this->Customer_model->delete_item($id));
    }

   
   


   
}

?>