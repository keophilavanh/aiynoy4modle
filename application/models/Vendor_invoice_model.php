<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_invoice_model extends MY_Model{

    // // public $primary_key = 'sel_id';
     public $table = 'tb_invoice_vendor';
    
   
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("invoice_id","vendor_name", "rate_name", "Date","status","amount","ticket_total","username");  
    function make_query($status=0)  
    {  
         $this->db->select('*');  
         $this->db->from($this->table);  
         $this->db->join('tb_vendor','tb_vendor.vendor_id=tb_invoice_vendor.vendor_id');

         if($status != 0){
          $this->db->where('status', 'Normal');
          }

          if(isset($_POST["search"]["value"]))  
         {  
               $sql = ' (vendor_name LIKE "%'.$_POST["search"]["value"].'%" 
               OR invoice_id LIKE "%'.$_POST["search"]["value"].'%"
               OR rate_name LIKE "%'.$_POST["search"]["value"].'%"
               OR Date LIKE "%'.$_POST["search"]["value"].'%"
               OR amount LIKE "%'.$_POST["search"]["value"].'%"
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
              $this->db->order_by('invoice_id', 'DESC');  
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
       $this->db->insert('tb_invoice_vendor_detell', $info);
       $insert_id = $this->db->insert_id();
       $this->db->trans_complete();

      

          return  $insert_id;
     }

     function move_item($id,$new_ticket_id)
     {
          $info = array(
               'invoice_id' => $new_ticket_id,
               );

          $this->db->where('id', $id);
          $this->db->update('tb_invoice_vendor_detell', $info);
          
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
          $this->db->from('tb_invoice_vendor_detell');
          $this->db->where('invoice_id', $id);
          
          $query = $this->db->get();  
          return $query->result(); 
     }

     function select_invoice($id)
     {
          $this->db->select('*');
          $this->db->from('tb_invoice_vendor');
          $this->db->join('tb_vendor','tb_vendor.vendor_id=tb_invoice_vendor.vendor_id');
          $this->db->where('invoice_id', $id);
          $query = $this->db->get();
          return $query->row();
     }

     function move_invoice_amount($id,$money)
     {
          $this->db->select('amount,ticket_total');
          $this->db->from('tb_invoice_vendor');
          $this->db->where('invoice_id', $id);
          $query = $this->db->get();
          $row = $query->row();

          

          $info = array(
                    
                    'amount' => $row->amount - $money, 
                    'ticket_total' => $row->ticket_total - $money, 
                    );



          $this->db->where('invoice_id', $id);
          $this->db->update('tb_invoice_vendor', $info);

          return 0 ;
     }

     function pay_invoice_vendor($id,$money)
     {
          $this->db->select('amount');
          $this->db->from('tb_invoice_vendor');
          $this->db->where('invoice_id', $id);
          $query = $this->db->get();
          $row = $query->row();

          if($row->amount > $money){

               $info = array(
                    
                    'amount' => $row->amount - $money, 
                    );


          }else if($row->amount <= $money){

               $info = array(
                    'status' =>'Payment',
                    'amount' => 0, 
                    );

              
          }

          $this->db->where('invoice_id', $id);
          $this->db->update('tb_invoice_vendor', $info);

          return 0 ;
     }

     function report_invoice_vendor($Date_start,$Date_end)
     {
          $this->db->select('*');
          $this->db->from('tb_invoice_vendor');
          $this->db->join('tb_vendor','tb_vendor.vendor_id=tb_invoice_vendor.vendor_id');
          $this->db->where("Date >='".$Date_start."' AND Date <='".$Date_end."'");
          
          $query = $this->db->get();  
          return $query->result(); 
     }

     function report_invoice_by_vendor_id($vendor_id)
     {
          $this->db->select('*');
          $this->db->from('tb_invoice_vendor');
          $this->db->join('tb_vendor','tb_vendor.vendor_id=tb_invoice_vendor.vendor_id');
          $this->db->where('tb_invoice_vendor.vendor_id', $vendor_id);
       
          
          $query = $this->db->get();  
          return $query->result(); 
     }



     
     

   

     
}

?>