<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class bank_sub_account_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    // var $primary_key = 'sel_id';
    var $table = "tb_bank_sub_account";  
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("bank_sub_account_id", "sub_name", "Name_account","bank_id","Status");  
    function make_query($bank_account_id=0)  
    {  
         $this->db->select('*');  
         $this->db->from($this->table);  
        
         
            if($bank_account_id != 0){
                $this->db->where('bank_account_id', $bank_account_id);
            }
            $this->db->where('status', 'active');
  
            if(isset($_POST["search"]["value"]))  
            {  
                  $sql = ' (bank_sub_account_id LIKE "%'.$_POST["search"]["value"].'%" 
                  OR total LIKE "%'.$_POST["search"]["value"].'%"
                  OR sub_name LIKE "%'.$_POST["search"]["value"].'%"
                  OR Status LIKE "%'.$_POST["search"]["value"].'%" )';
   
                  $this->db->where($sql);
   
            
            }  


         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('bank_sub_account_id', 'DESC');  
         }  
    }  
    function make_datatables($bank_account_id=0){  
         $this->make_query($bank_account_id);  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function get_filtered_data($bank_account_id=0){  
         $this->make_query($bank_account_id);  
         $query = $this->db->get();  


         return $query->num_rows();  
    }       
    function get_all_data($bank_account_id=0)  
    {  
         $this->db->select("*");  
         $this->db->from($this->table);  
         if($bank_account_id != 0){
            $this->db->where('bank_account_id', $bank_account_id);
        }
        $this->db->where('status', 'active');
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
          $this->db->where('bank_sub_account_id', $id);
          $query = $this->db->get();
          $row = $query->row();
    
         

        
         return $row;
     }

     function Edititem($info,$id)
     {
          $this->db->where('bank_sub_account_id', $id);
          $this->db->update($this->table, $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...'
               
               );

          return  $myObj;
     }

     function deleteitem($id){
          $this->db->where('bank_sub_account_id', $id);
          $this->db->delete($this->table);

          $myObj = array(
               'status' => 'ok',
               'msg' =>  'delete ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
           
     }

     function Edit_status($info,$id)
     {
          $this->db->where('bank_sub_account_id', $id);
          $this->db->update($this->table, $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'delete ຂໍ້ມູນສຳເລັດ...'
               
               );

          return  $myObj;
     }




     function select_item()
     {
          // $this->load->library('encrypt');
          // $password = $this->encryption->decrypt($_POST["Password"]);

          $this->db->select('*');
          $this->db->from($this->table);
          $query = $this->db->get();
          return $query->result(); ;
     }

     function select_sum_money($id)
     {
          $this->db->select('sum(total) as sumtotal');
          $this->db->from($this->table);
          $this->db->where('bank_account_id', $id);
          $this->db->where('Status', 'active');
          
          $query = $this->db->get();  
          $row = $query->row();
          return $row->sumtotal; 
     }

     function select_count_row($id)
     {
          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->where('bank_account_id', $id);
          $this->db->where('Status', 'active');
          
          $query = $this->db->get();  
          
          return $query->num_rows();  
     }

     
     function select_item_list($id)
     {
     

          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->where('bank_account_id', $id);
          $query = $this->db->get();
          return $query->result(); ;
     }

     function update_total($id,$info)
     {
     
            $this->db->where('bank_sub_account_id', $id);
            $this->db->update($this->table, $info);

            $myObj = array(
                'status' => 'ok',
                'msg' =>  'update ຂໍ້ມູນສຳເລັດ...'
                
                );
 
           return  $myObj;
     }

    

     

   

     
}

?>