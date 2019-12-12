<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Booking extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('room_model');
       
    }

    public function index(){
        // $data['userRecords'] = $this->Employee_model->userListing();
        $this->load->view('conten/booking/view_booking');
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
             

                $output.='<div class="Click_Floor" style="padding: 7px;" id= "'.$row->floor_id.'">
                                <div class="d-flex border" style="width: 200px; height: 100px;" >

                                    <div class="flex-grow-1 bg-white p-4 manag" >
                                        <center>
                                        
                                        <h2 style="padding: 7px;">'.$row->floor_name.'</h2>
                                        </center>
                                    </div>
                                </div>
                            </div>';
               
             
            } 

        echo $output;
    }

    public function fetch_room_by_floor(){
        $floor_id = $_POST["floor_id"];
        $date = $_POST["get_date"];

        $this->load->model('room_model');
        $this->load->model('Booking_model');
        $fetch_data = $this->room_model->all_room_by_floor($floor_id);
        $fetch_Reservation = $this->Booking_model->all_booking_by_date($date,$floor_id);
        $Reservation_status = 0;
        $output=" ";
            foreach($fetch_data as $row)  
            {  

               
                    foreach($fetch_Reservation as $rows){

                        if($row->room_id == $rows->room_id){
                            $Reservation_status = 1;
                            $output.='<div class="Click_Product" style="padding: 7px;"  data-code=""  data-Name="" data-Price="">
                                        <div class="d-flex border " style="width: 200px; height: 100px;" >
                                    
                                            <div class=" manag" style="text-overflow: ellipsis; overflow: hidden; width:200px ; background-color: #FBD03E;">
                                            <span class="badge badge-success " style="margin:3px;"><font size="2"  >ຫ້ອງຕຽງຄູ່</font></span> 
                                        
                                            <!-- <span class="badge badge-info float-right " style="margin:3px;"><font size="2"  >sdsadasd</font></span>   -->
                                            
                                                <center>
                                                
                                                    <h2>'.$row->room_name.'</h2>
                                                </center>
                                            </div>
                                        </div>
                                    </div>';
                                    break;
                                
    
                        }
    
                    }

                    if($Reservation_status == 1){
                        $Reservation_status = 0;
                        continue;
                    }

                    $output.='  <div class="Click_Product" style="padding: 7px;"  data-code=""  data-Name="" data-Price="">
                                    <div class="d-flex border bg-white" style="width: 200px; height: 100px;" >
                                
                                        <div class=" manag" style="text-overflow: ellipsis; overflow: hidden; width:200px ;">
                                        <span class="badge badge-success " style="margin:3px;"><font size="2"  >ຫ້ອງຕຽງຄູ່</font></span> 
                                        <input type="checkbox" name="vehicle1"  class="float-right " value="Bike" style="margin:3px;">
                                        <!-- <span class="badge badge-info float-right " style="margin:3px;"><font size="2"  ></font></span>   -->
                                        
                                            <center>
                                            
                                                <h2>'.$row->room_name.'</h2>
                                            </center>
                                        </div>
                                    </div>
                                </div>';
                
              
                
                
                
             
            } 

        echo $output;
    }
   


   
}

?>