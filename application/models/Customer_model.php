<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    var $primary_key = 'customer_id';
    var $table = "tb_customer";  
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("customer_id", "customer_name", "from", "phone", "address", "card", "passpor");  
    function make_query()  
    {  
         $this->db->select('*');  
         $this->db->from($this->table);  
         
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("customer_id", $_POST["search"]["value"]);  
              $this->db->or_like("customer_name", $_POST["search"]["value"]);  
              $this->db->or_like("from", $_POST["search"]["value"]);  
              $this->db->or_like("phone", $_POST["search"]["value"]); 
              $this->db->or_like("address", $_POST["search"]["value"]); 
              $this->db->or_like("card", $_POST["search"]["value"]);
              $this->db->or_like("passpor", $_POST["search"]["value"]);
             
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('customer_id', 'DESC');  
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


    function add_item($info)
     {
       $this->db->trans_start();
       //$info['dateInserted'] = date('Y-m-d H:i:s');
       $this->db->insert($this->table, $info);
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

     function get_item($id)
     {
          // $this->load->library('encrypt');
          // $password = $this->encryption->decrypt($_POST["Password"]);

          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->where($this->primary_key, $id);
          $query = $this->db->get();
          $row = $query->row();
          // $password = $row->password;
          //  $row->decrypt =  $this->encryption->decrypt($password);        
         

        
         return $row;
     }

     function Edit_item($info,$id)
     {
          $this->db->where($this->primary_key, $id);
          $this->db->update($this->table, $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
     }

     function delete_item($id){
          $this->db->where($this->primary_key, $id);
          $this->db->delete($this->table);

          $myObj = array(
               'status' => 'ok',
               'msg' =>  'delete ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
           
        }
}

?>