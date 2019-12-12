<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    // var $primary_key = 'sel_id';
    var $table = "tb_users";  
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("user_id", "user_fname", "user_lname","user_phone","user_address");  
    function make_query()  
    {  
         $this->db->select('*');  
         $this->db->from($this->table);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("user_fname", $_POST["search"]["value"]);  
              $this->db->or_like("user_lname", $_POST["search"]["value"]);  
              $this->db->or_like("user_address", $_POST["search"]["value"]);  
              $this->db->or_like("user_phone", $_POST["search"]["value"]); 
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('user_id', 'DESC');  
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
       $this->db->insert($this->table, $info);
      
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
          $this->db->from($this->table);
          $this->db->where('user_id', $id);
          $query = $this->db->get();
          $row = $query->row();

           $password = $row->password;
           $row->decrypt =   base64_decode($password);        
         

        
         return $row;
     }

     function EditEmployee($info,$id)
     {
          $this->db->where('user_id', $id);
          $this->db->update('tb_users', $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...',
               'data' =>  $info,
               'id' =>  $id
               );

          return  $myObj;
     }

     function deleteEmployee($id){
          $this->db->where('user_id', $id);
          $this->db->delete($this->table);

          $myObj = array(
               'status' => 'ok',
               'msg' =>  'delete ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
           
     }

     function user_login($username,$password){

          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->where('username', $username);
          $this->db->where('password', $password);
          $query = $this->db->get();
          date_default_timezone_set("Asia/Bangkok");
          if($query){
               $data = array(
                    'Date_login' => date("Y/m/d"),
                   
                    );
               
               $this->db->where('username', $username);
               $this->db->where('password', $password);
               $this->db->update($this->table, $data);
          }

          return  $query->row(); 

     }

     function check_token(){

        
          $this->load->library('session');
          date_default_timezone_set("Asia/Bangkok");
          $token = $this->session->token;
          $data = base64_decode($token);
          $oj = json_decode($data);
          $cb;
          if(isset($oj->username)){
               

               $this->db->select('*');
               $this->db->from($this->table);
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