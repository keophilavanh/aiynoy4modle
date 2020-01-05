<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_model extends MY_Model{

    // // public $primary_key = 'sel_id';
     public $table = 'tb_voucher';
    
   
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("voucher_id","ticket_no", "Date", "status","template","username");  
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
                $sql = ' (voucher_id LIKE "%'.$_POST["search"]["value"].'%" 
                OR ticket_no LIKE "%'.$_POST["search"]["value"].'%"
                OR Date LIKE "%'.$_POST["search"]["value"].'%"
                OR username LIKE "%'.$_POST["search"]["value"].'%" )';
 
                $this->db->where($sql);
 
          
          }  

         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('voucher_id', 'DESC');  
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
       $this->db->insert('tb_voucher_detell', $info);
       $insert_id = $this->db->insert_id();
       $this->db->trans_complete();
       

          return  $insert_id;
     }

     function Edit_ticket_on($id)
     {
          $info = array(
               'Ticket_No' => 'VO/'.date("m").date("Y").'-'.sprintf('%04d',$id),
               );
     
               $this->db->where('voucher_id', $id);
               $this->db->update($this->table, $info);
     }

     function Edit_Status($info,$id)
     {
          $this->db->where('voucher_id', $id);
          $this->db->update($this->table, $info);
          
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
          $this->db->from('tb_voucher_detell');
          $this->db->where('voucher_id', $id);
          
          $query = $this->db->get();  
          return $query->result(); 
     }

     function select_invoice($id)
     {
          $this->db->select('tb_voucher.*,tb_deposit_accounts.Name as deposit,tb_money_type.Name as money_type,tb_book_accounting.Name as book');
          $this->db->from('tb_voucher');
          $this->db->join('tb_deposit_accounts','tb_deposit_accounts.de_id=tb_voucher.de_id');
          $this->db->join('tb_money_type','tb_money_type.money_id=tb_voucher.money_id');
          $this->db->join('tb_book_accounting','tb_book_accounting.book_id=tb_voucher.book_id');
          $this->db->where('voucher_id', $id);
          $query = $this->db->get();
          return $query->row();
     }

     function report_by_voucher($project,$payment_type,$sub_code)
     {
          $this->db->select('*');
          $this->db->from('tb_voucher_detell');
          $this->db->where('pro_id', $project);
          
          if($payment_type > 0){
               $this->db->where('pay_id', $payment_type);
          }

          if($sub_code > 0){
               $this->db->where('sub_code_id', $sub_code);
          }
          
         
          
          $query = $this->db->get();  
          return $query->result(); 
     }
    

     

   

     
}

?>