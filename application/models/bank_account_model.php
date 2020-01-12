<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class bank_account_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    // var $primary_key = 'sel_id';
    var $table = "tb_bank_account";  
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("bank_account_id", "Number_account", "Name_account","bank_id","Status");  
    function make_query()  
    {  
         $this->db->select('tb_bank_account.*,tb_bank.bank_Name');  
         $this->db->from("tb_bank_account");  
         $this->db->join('tb_bank','tb_bank.bank_id=tb_bank_account.bank_id');
         if(isset($_POST["search"]["value"]))  
         {  
               $this->db->like("bank_account_id", $_POST["search"]["value"]);  
               $this->db->or_like("Number_account", $_POST["search"]["value"]);  
               $this->db->or_like("Name_account", $_POST["search"]["value"]);  
               $this->db->or_like("bank_Name", $_POST["search"]["value"]);  
            
              
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('bank_account_id', 'DESC');  
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


    function additem($info)
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

     function getitem($id)
     {
          // $this->load->library('encrypt');
          // $password = $this->encryption->decrypt($_POST["Password"]);

          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->where('bank_account_id', $id);
          $query = $this->db->get();
          $row = $query->row();
    
         

        
         return $row;
     }

     function Edititem($info,$id)
     {
          $this->db->where('bank_account_id', $id);
          $this->db->update($this->table, $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...'
               
               );

          return  $myObj;
     }

     function deleteitem($id){
          $this->db->where('bank_account_id', $id);
          $this->db->delete($this->table);

          $myObj = array(
               'status' => 'ok',
               'msg' =>  'delete ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
           
     }


     function select_item()
     {
     

          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->join('tb_bank','tb_bank.bank_id=tb_bank_account.bank_id');
          $query = $this->db->get();
          return $query->result(); ;
     }

    

     

   

     
}

?>