<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    // var $primary_key = 'sel_id';
    var $table = "tb_employee";  
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("emp_id", "emp_fname", "emp_lname","emp_phone","emp_address");  
    function make_query()  
    {  
         $this->db->select('*');  
         $this->db->from($this->table);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("emp_fname", $_POST["search"]["value"]);  
              $this->db->or_like("emp_lname", $_POST["search"]["value"]);  
              $this->db->or_like("emp_address", $_POST["search"]["value"]);  
              $this->db->or_like("emp_phone", $_POST["search"]["value"]); 
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('emp_id', 'DESC');  
         }  
    }  
    function make_datatables(){  
         $this->make_query();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function get_filtered_data(){  
         $this->make_query();  
         $query = $this->db->get();  


         return $query->num_rows();  
    }       
    function get_all_data()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table);  
         return $this->db->count_all_results();  
    }  


    function addEmployee($info)
     {
       $this->db->trans_start();
       //$info['dateInserted'] = date('Y-m-d H:i:s');
       $this->db->insert('tb_employee', $info);
       $this->status = 'ok';
       $this->message = $info['title'].' Uploaded successfully';
       //$insert_id = $this->db->insert_id();
       $this->db->trans_complete();

       $myObj = array(
               'status' => 'ok',
               'msg' =>  'Insert ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
     }

     function getEmployee($id)
     {
          // $this->load->library('encrypt');
          // $password = $this->encryption->decrypt($_POST["Password"]);

          $this->db->select('*');
          $this->db->from('tb_employee');
          $this->db->where('emp_id', $id);
          $query = $this->db->get();
          $row = $query->row();

           $password = $row->password;
           $row->decrypt =   base64_decode($password);        
         

        
         return $row;
     }

     function EditEmployee($info,$id)
     {
          $this->db->where('emp_id', $id);
          $this->db->update('tb_employee', $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
     }

     function deleteEmployee($id){
          $this->db->where('emp_id', $id);
          $this->db->delete('tb_employee');

          $myObj = array(
               'status' => 'ok',
               'msg' =>  'delete ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
           
     }

     function user_login($username,$password){

          $this->db->select('*');
          $this->db->from('tb_employee');
          $this->db->where('username', $username);
          $this->db->where('password', $password);
          $query = $this->db->get();

          if($query){
               $data = array(
                    'Date_login' => date("Y/m/d"),
                   
                    );
               
               $this->db->where('username', $username);
               $this->db->where('password', $password);
               $this->db->update('tb_employee', $data);
          }

          return  $query->row(); 

     }

     function check_token(){

        
          $this->load->library('session');
         
          $token = $this->session->token;
          $data = base64_decode($token);
          $oj = json_decode($data);
          $cb;
          if(isset($oj->username)){
               

               $this->db->select('*');
               $this->db->from('tb_employee');
               $this->db->where('username', $oj->username);
               $this->db->where('password', $oj->password);
               $query = $this->db->get();
               $cb = $query->row();
               //  die($cb->Date_login .' '.date("Y-m-d"));
               if($cb->Date_login != date("Y-m-d")){
                    $cb="";
                    echo("<script>window.location = 'login';</script>");   
               }
          }else{
               $cb="";
               echo("<script>window.location = 'login';</script>");
          }
         
        
          return $cb; 

     }

     
}

?>