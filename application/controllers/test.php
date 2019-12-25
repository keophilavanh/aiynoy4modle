<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class test extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Sub_code_model');
       
    }

    public function index(){
            $da['title_ALL']='ບໍ່ລິສັດ ຫຫຫຫຫ';
            $select['select'] ='Finance';

            
            $data['header'] =  $this->load->view('conten/view_h_test',$da,TRUE);
            $data['menu'] =  $this->load->view('conten/view_menu',$select,TRUE);
            $this->load->view('conten/view_test',$data,false);
       
    }

    



    function fetch_data(){  
      
       
        $fetch_data = $this->Sub_code_model->make_datatables();  
        $data = array();  

        if($this->Sub_code_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
              
             $sub_array[] = $row->code;  
             $sub_array[] = $row->Name;  
             $sub_array[] = $row->Status;  
             $sub_array[] = '<a href="#" id="'.$row->sub_code_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
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
             "recordsTotal"          =>      $this->Sub_code_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Sub_code_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 


   
    public function additem(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
           
            'code' => $_POST["code"],
            'Name' => $_POST["name"],
            'Status' => 'active'
            
          
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->Sub_code_model->additem($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->Sub_code_model->Edititem($data,$_POST["sub_code_id"]) );

        }
        
    }

    public function getitem(){
        
        $id = $_POST["sub_code_id"];

        echo json_encode($this->Sub_code_model->getitem($id));
    }

    

   
   


   
}

?>