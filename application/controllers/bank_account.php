<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class bank_account extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('bank_account_model');
        $this->load->model('bank_model');
        $this->load->model('bank_sub_account_model');
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $data['bank'] = $this->bank_model->select_item();
           
            $this->load->view('conten/accounting/Other/view_bank_accounting',$data,false);
        }
    }

    public function list(){
       
        if($this->Users_model->check_token())
        {
            $data['bank_account'] = $this->bank_account_model->select_item();
           
            $this->load->view('conten/accounting/Bank_of_cash/view_bank_account_list',$data,false);
        }
    }

    



    function fetch_data(){  
      
       
        $fetch_data = $this->bank_account_model->make_datatables();  
        $data = array();  

        if($this->bank_account_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array(); 

             $sub_array[] = $row->Number_account;
             $sub_array[] = $row->Name_account;  
             $sub_array[] = $row->bank_Name; 
             $sub_array[] = number_format($this->bank_sub_account_model->select_sum_money($row->bank_account_id),0); 
             $sub_array[] = $row->Rate;   
             $sub_array[] = $row->Status;  
             $sub_array[] = '
                            <a href="'.base_url().'Sub-Account/'.$row->bank_account_id.'"  class="btn btn-pill btn-primary "  title="Sub-Account"><i class="fas fa-share"></i> ບ້ວງບັນຊີ</a> 
                            <a href="#" id="'.$row->bank_account_id.'" class="btn btn-pill btn-primary edit_data"  title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                            <a href="#"  data-code="'.$row->bank_account_id.'" data-count="'.$this->bank_sub_account_model->select_count_row($row->bank_account_id).'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a> ';  
            
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
             
              
           
            $data[] = $sub_array;  


        }
         
        $output = array(  
             "draw"                    =>     intval($_POST["draw"]),  
             "recordsTotal"          =>      $this->bank_account_model->get_all_data(),  
             "recordsFiltered"     =>     $this->bank_account_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 


   
    public function additem(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'Number_account' => $_POST["Number_account"],
            'Name_account' => $_POST["Name_account"],
            'bank_id' => $_POST["bank_id"],
            'Rate' => $_POST["Rate"],
            'Status' => 'active'
            
          
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->bank_account_model->additem($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->bank_account_model->Edititem($data,$_POST["bank_account_id"]) );

        }
        
    }

    public function getitem(){
        
        $id = $_POST["bank_account_id"];

        echo json_encode($this->bank_account_model->getitem($id));
    }

    public function delete(){
        
        $id = $_POST["bank_account_id"];
        $data = array(
           
            'Status' => 'hidden'
            
          
            );

        echo json_encode($this->bank_account_model->deleteitem($id));
    }

    

    

   
   


   
}

?>