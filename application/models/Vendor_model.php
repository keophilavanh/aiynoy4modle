<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    // var $primary_key = 'sel_id';
    var $table = "tb_vendor";  
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("vendor_id", "vendor_name", "vendor_credit","vendor_phone","vendor_address");  
    function make_query()  
    {  
         $this->db->select('*');  
         $this->db->from($this->table);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("vendor_name", $_POST["search"]["value"]);  
              $this->db->or_like("vendor_credit", $_POST["search"]["value"]);  
              $this->db->or_like("vendor_phone", $_POST["search"]["value"]);  
              $this->db->or_like("vendor_address", $_POST["search"]["value"]); 
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('vendor_id', 'DESC');  
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


    function addVendor($info)
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

     function getVendor($id)
     {
          // $this->load->library('encrypt');
          // $password = $this->encryption->decrypt($_POST["Password"]);

          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->where('vendor_id', $id);
          $query = $this->db->get();
          $row = $query->row();
    
         

        
         return $row;
     }

     function EditVendor($info,$id)
     {
          $this->db->where('vendor_id', $id);
          $this->db->update($this->table, $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...'
               
               );

          return  $myObj;
     }

     function deleteVendor($id){
          $this->db->where('vendor_id', $id);
          $this->db->delete($this->table);

          $myObj = array(
               'status' => 'ok',
               'msg' =>  'delete ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
           
     }

     

   

     
}

?>