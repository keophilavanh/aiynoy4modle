<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    var $primary_key = 'booking_id';
    var $table = "tb_booking";  
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("booking_id", "room_name");  
    function make_query()  
    {  
         $this->db->select('tb_booking.booking_id,tb_booking.date_start,tb_booking.date_end,tb_booking.username,tb_customer.customer_name,tb_room.room_name,tb_room_type.room_name_type,tb_floor.floor_name');  
         $this->db->from($this->table);  
         $this->db->join('tb_customer','tb_customer.customer_id = tb_booking.customer_id');
         $this->db->join('tb_room','tb_room.room_id=tb_booking.room_id');
         $this->db->join('tb_floor','tb_floor.floor_id = tb_room.floor_id');
         $this->db->join('tb_room_type','tb_room_type.room_type_id = tb_room.room_type_id');

         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("booking_id", $_POST["search"]["value"]);  
              $this->db->or_like("room_name", $_POST["search"]["value"]);  
              $this->db->or_like("customer_name", $_POST["search"]["value"]);
             
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('booking_id', 'DESC');  
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

        function all_booking_by_date($date,$floor_id){
          $this->db->select('tb_booking.room_id');
          $this->db->from($this->table);
          $this->db->join('tb_room','tb_room.room_id=tb_booking.room_id');
          $this->db->where("tb_booking.date_start <= '".date("Y-m-d", strtotime($date))."' AND tb_booking.date_end >= '".date("Y-m-d", strtotime($date))."' AND tb_room.floor_id ='".$floor_id."'");
          $query = $this->db->get();
         

          return $query->result();  
      
     }
}

?>