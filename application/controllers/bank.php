<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class bank extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('bank_model');
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/accounting/Other/view_bank');
        }
    }

    



    function fetch_data(){  
      
       
        $fetch_data = $this->bank_model->make_datatables();  
        $data = array();  

        if($this->bank_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array(); 

             $sub_array[] = $row->bank_id;
             $sub_array[] = $row->bank_Name;  
             $sub_array[] = $row->Status;  
             $sub_array[] = '<a href="#" id="'.$row->bank_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             ';  
            
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
             "recordsTotal"          =>      $this->bank_model->get_all_data(),  
             "recordsFiltered"     =>     $this->bank_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 


   
    public function additem(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'bank_Name' => $_POST["name"],
            'Status' => 'active'
            
          
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->bank_model->additem($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->bank_model->Edititem($data,$_POST["bank_id"]) );

        }
        
    }

    public function getitem(){
        
        $id = $_POST["bank_id"];

        echo json_encode($this->bank_model->getitem($id));
    }

    

   
   


   
}

?>