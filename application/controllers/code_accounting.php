<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class code_accounting extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('code_accounting_model');
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/accounting/Other/view_deposit_accounts_model');
        }
    }

    



    function fetch_code(){  
      
       
        $fetch_data = $this->code_accounting_model->make_datatables();  
        $data = array();  

        if($this->code_accounting_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->code;   
             $sub_array[] = $row->name;  
             $sub_array[] = $row->state;  
             $sub_array[] = '<a href="#" id="'.$row->de_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
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
             "recordsTotal"          =>      $this->code_accounting_model->get_all_data(),  
             "recordsFiltered"     =>     $this->code_accounting_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 


 

    public function additem(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'code' => $_POST["code"],
            'name' => $_POST["name"],
            'state' => 'active'
            
          
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->code_accounting_model->additem($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->code_accounting_model->Edititem($data,$_POST["code_id"]) );

        }
        
    }

    public function getitem(){
        
        $id = $_POST["code_id"];

        echo json_encode($this->code_accounting_model->getitem($id));
    }

    

   
   


   
}

?>