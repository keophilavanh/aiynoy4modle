<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class vendor extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Vendor_model');
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/accounting/Follow_up_vender/view_Vendor');
        }
    }

    



    function fetch_user(){  
      
       
        $fetch_data = $this->Vendor_model->make_datatables();  
        $data = array();  

        if($this->Vendor_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->vendor_id;   
             $sub_array[] = $row->vendor_name;  
             $sub_array[] = $row->vendor_credit;  
             $sub_array[] = $row->vendor_phone;  
             $sub_array[] = $row->vendor_address;  
             $sub_array[] = '<a href="#" id="'.$row->vendor_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                             <a href="#" id="'.$row->vendor_id.'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';  
            
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
           
            $data[] = $sub_array;  


        }
         
        $output = array(  
             "draw"                    =>     intval($_POST["draw"]),  
             "recordsTotal"          =>      $this->Vendor_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Vendor_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 


   function fetch_vendor_list(){  
      
       
    $fetch_data = $this->Vendor_model->make_datatables();  
    $data = array();  

    if($this->Vendor_model->get_all_data() > 0){

        foreach($fetch_data as $row)  
        {  
         $sub_array = array();  
         $sub_array[] = $row->vendor_id;   
         $sub_array[] = $row->vendor_name;  
         $sub_array[] = $row->vendor_credit;  
         $sub_array[] = $row->vendor_phone;  
        //  $sub_array[] = $row->vendor_address;  
         $sub_array[] = '<a href="Create-invoice-Vendor/'.$row->vendor_id.'" id="" class="btn btn-pill btn-primary" data-toggle="tooltip" title="Edit">ສ້າງໃບບິນຕິດໜີ້</a> 
                        ';  
        
         $data[] = $sub_array;  
        } 

    }else{

        $sub_array = array();  
        $sub_array[] = ''; 
        $sub_array[] = '';   
        $sub_array[] = '';  
        $sub_array[] = '';  
        $sub_array[] = '';  
        // $sub_array[] = '';  
       
        $data[] = $sub_array;  


    }
     
    $output = array(  
         "draw"                    =>     intval($_POST["draw"]),  
         "recordsTotal"          =>      $this->Vendor_model->get_all_data(),  
         "recordsFiltered"     =>     $this->Vendor_model->get_filtered_data(),  
         "data"                    =>     $data  
    );  
    echo json_encode($output);  
} 

    public function addVendor(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'vendor_name' => $_POST["Vendorname"],
            'vendor_credit' => $_POST["credit"],
            'vendor_phone' => $_POST["phone"],
            'vendor_address' => $_POST["Address"]
          
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->Vendor_model->addVendor($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->Vendor_model->EditVendor($data,$_POST["vendor_id"]) );

        }
        
    }

    public function getVendor(){
        
        $id = $_POST["vendor_id"];

        echo json_encode($this->Vendor_model->getVendor($id));
    }

    public function deletVendor(){
        $id = $_POST["vendor_id"];
        echo json_encode($this->Vendor_model->deleteVendor($id));
    }

   
   


   
}

?>