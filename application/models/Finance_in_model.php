<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_in_model extends MY_Model{

    // // public $primary_key = 'sel_id';
     public $table = 'tb_finance_in';
    
   
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("finance_in_id","Ticket_No", "tital", "header","Date","amount","ticket_total","username");  
    function make_query($status=0)  
    {  
         $this->db->select('*');  
         $this->db->from($this->table);  
         //$this->db->join('tb_vendor','tb_vendor.vendor_id=tb_invoice_vendor.vendor_id');

         if($status != 0){
          $this->db->where('status', 'Normal');
          }

          if(isset($_POST["search"]["value"]))  
          {  
                $sql = ' (finance_in_id LIKE "%'.$_POST["search"]["value"].'%" 
                OR Ticket_No LIKE "%'.$_POST["search"]["value"].'%"
                OR ticket_total LIKE "%'.$_POST["search"]["value"].'%"
                OR username LIKE "%'.$_POST["search"]["value"].'%" )';
 
                $this->db->where($sql);
 
          
          }  

         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('finance_in_id', 'DESC');  
         }  
    }  
    function make_datatables($status=0){  
         $this->make_query($status);  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }  
    function get_filtered_data($status=0){  
         $this->make_query($status);  
         $query = $this->db->get();  


         return $query->num_rows();  
    }       
    function get_all_data($status=0)  
    {  
         $this->db->select("*");  
         $this->db->from($this->table);  

         if($status != 0){
          $this->db->where('status', 'Normal');
          }

         return $this->db->count_all_results();  
    }  

    function add_invoice($info)
     {
       $this->db->trans_start();
       $this->db->insert($this->table, $info);
       $insert_id = $this->db->insert_id();
       $this->db->trans_complete();

      

          return  $insert_id;
     }


     function add_item($info)
     {
       $this->db->trans_start();
       $this->db->insert('tb_finance_in_detell', $info);
       $insert_id = $this->db->insert_id();
       $this->db->trans_complete();
       

          return  $insert_id;
     }

     function Edit_ticket_on($id)
     {
          $info = array(
               'Ticket_No' => 'rec/'.date("m").date("Y").'-'.sprintf('%04d',$id).'/ກງ'.date("Y"),
               );
     
               $this->db->where('finance_in_id', $id);
               $this->db->update($this->table, $info);
     }

     function Edit_Status($info,$id)
     {
          $this->db->where('finance_in_id', $id);
          $this->db->update('tb_finance_in', $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...',
               'data' =>  $info,
               'id' =>  $id
               );

          return  $myObj;
     }

     function select_item_by_invoice($id)
     {
          $this->db->select('*');
          $this->db->from('tb_finance_in_detell');
          $this->db->where('finance_in_id', $id);
          
          $query = $this->db->get();  
          return $query->result(); 
     }

     function select_invoice($id)
     {
          $this->db->select('*');
          $this->db->from('tb_finance_in');
          $this->db->join('tb_money_go','tb_money_go.money_go_id=tb_finance_in.type_money');
          $this->db->where('finance_in_id', $id);
          $query = $this->db->get();
          return $query->row();
     }

     function select_ticket_invoice($id)
     {
          $this->db->select('Ticket_No');
          $this->db->from('tb_finance_in');
          $this->db->where('finance_in_id', $id);
          
          $query = $this->db->get();  
          $row = $query->row();
          return $row->Ticket_No; 
     }

     function select_ticket_invoice_voucher($id)
     {
          $this->db->select('Ticket_No,Date');
          $this->db->from('tb_finance_in');
          $this->db->where('finance_in_id', $id);
          
          $query = $this->db->get();  
        
          return $query->row(); 
     }

     
     function voucher_invoice($id)
     {
               $info = array(
                    
                    'status' => 'Voucher', 
                    );

          $this->db->where('finance_in_id', $id);
          $this->db->update('tb_finance_in', $info);

          return 0 ;
     }

     

   

     
}

?>