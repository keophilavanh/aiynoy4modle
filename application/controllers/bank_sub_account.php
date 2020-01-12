<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class bank_sub_account extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('bank_account_model');
        $this->load->model('bank_model');
        $this->load->model('bank_sub_account_model');
       
    }

    public function index(){
       
        
    }

    public function sub_account($id){
        if($this->Users_model->check_token())
        {
             $data['bank_account'] = $id;
           
            $this->load->view('conten/accounting/Other/view_bank_sub_account',$data,false);
        }
    }

    public function sub_account_list($id){
        if($this->Users_model->check_token())
        {
             $data['bank_sub_account'] = $this->bank_sub_account_model->select_item_list($id);
             $data['bank_account']= $id;
           
            $this->load->view('conten/accounting/Bank_of_cash/view_bank_sub_account_list',$data,false);
        }
    }

    



    function fetch_data(){  
      
       
        $fetch_data = $this->bank_sub_account_model->make_datatables($_POST["bank_account_id"]);  
        $data = array();  

        if($this->bank_sub_account_model->get_all_data($_POST["bank_account_id"]) > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array(); 

            
             $sub_array[] = $row->sub_name;  
             $sub_array[] = number_format($row->total,0);  
             $sub_array[] = $row->Status;  
             $sub_array[] = '<a href="#" id="'.$row->bank_sub_account_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             <a href="#" id="'.$row->bank_sub_account_id.'"  class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';  
            
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
             "recordsTotal"          =>      $this->bank_sub_account_model->get_all_data($_POST["bank_account_id"]),  
             "recordsFiltered"     =>     $this->bank_sub_account_model->get_filtered_data($_POST["bank_account_id"]),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 


   
    public function additem(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'sub_name' => $_POST["sub_name"],
            'total' => $_POST["total"],
            'bank_account_id' => $_POST["bank_account_id"],
            'Status' => 'active'
            
          
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->bank_sub_account_model->additem($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->bank_sub_account_model->Edititem($data,$_POST["bank_sub_account_id"]) );

        }
        
    }

    public function getitem(){
        
        $id = $_POST["bank_sub_account_id"];

        echo json_encode($this->bank_sub_account_model->getitem($id));
    }

    public function delete(){
        
        $id = $_POST["bank_sub_account_id"];
        $data = array(
           
            'Status' => 'hidden'
            
          
            );

        echo json_encode($this->bank_sub_account_model->deleteitem($id));
    }

    

   
   


   
}

?>