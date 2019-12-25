<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class money_go extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('money_go_model');
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/accounting/Other/view_money_go');
        }
    }

    



    function fetch_data(){  
      
       
        $fetch_data = $this->money_go_model->make_datatables();  
        $data = array();  

        if($this->money_go_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
              
             $sub_array[] = $row->Name;  
             $sub_array[] = $row->Status;  
             $sub_array[] = '<a href="#" id="'.$row->money_go_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             ';  
            
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
             "recordsTotal"          =>      $this->money_go_model->get_all_data(),  
             "recordsFiltered"     =>     $this->money_go_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 


   
    public function additem(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
           
            'Name' => $_POST["name"],
            'Status' => 'active'
            
          
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->money_go_model->additem($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->money_go_model->Edititem($data,$_POST["money_go_id"]) );

        }
        
    }

    public function getitem(){
        
        $id = $_POST["money_go_id"];

        echo json_encode($this->money_go_model->getitem($id));
    }

    

   
   


   
}

?>