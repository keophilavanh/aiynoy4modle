<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Finance_in extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Vendor_model');
        $this->load->model('Finance_in_model');
        $this->load->model('money_go_model');
        $this->load->model('Rate_model');
        
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/accounting/Finance/view_Finance_in');
        }
    }

    



    function fetch_invoice(){  
      
       
        $fetch_data = $this->Finance_in_model->make_datatables();  
        $data = array();  

        if($this->Finance_in_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->Ticket_No;   
            //  $sub_array[] = $row->tital;  
            //  $sub_array[] = $row->header;  
             $sub_array[] = $row->Date;  
             $sub_array[] = $row->status; 
             $sub_array[] = $row->username;  

             $button ='';
             if($row->status == 'New'){
               // $button .='<a href="'.base_url('Print-invoice-Finance-IN/').$row->finance_in_id.'" target="_blank" class="btn btn-pill btn-primary  " data-toggle="tooltip" title="Print"><i class="fas fa-file-alt"></i> ພືມ</a>';
                $button .= '<a href="#" id="'.$row->finance_in_id.'" class="btn btn-pill btn-success  Apply" data-toggle="tooltip" title="Apply"><i class="fas fa-file-alt"></i> ຢືນຢັນ</a>';
                $button .= '<a href="'.base_url('Edit-Finance-IN/').$row->finance_in_id.'" class="btn btn-pill btn-primary " data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i> ແກ້ໄຂ້</a>';
                $button .= '<a href="#" id="'.$row->finance_in_id.'" class="btn btn-pill btn-danger edit_data" data-toggle="tooltip" title="Cancel"><i class="fas fa-file-alt"></i> ຍົກເລີກ</a>';
             }else{
                $button .='<a href="'.base_url('Print-invoice-Finance-IN/').$row->finance_in_id.'" target="_blank" class="btn btn-pill btn-primary  " data-toggle="tooltip" title="Print"><i class="fas fa-file-alt"></i> ພືມ</a>';
             }

             $sub_array[] = number_format($row->ticket_total,0).' '.$row->Rate; 
             $sub_array[] = $button;  
            
             $data[] = $sub_array;  
            } 

        }else{

            $sub_array = array();  
            $sub_array[] = ''; 
            $sub_array[] = '';   
            $sub_array[] = '';  
            $sub_array[] = '';  
            $sub_array[] = '';  
            $sub_array[] = '';  
            
           
            $data[] = $sub_array;  


        }
         
        $output = array(  
             "draw"                    =>     intval($_POST["draw"]),  
             "recordsTotal"          =>      $this->Finance_in_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Finance_in_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 

   function fetch_Finance_in(){  
      
       
    $fetch_data = $this->Finance_in_model->make_datatables($status=1);  
    $data = array();  

    if($this->Finance_in_model->get_all_data() > 0){

        foreach($fetch_data as $row)  
        {  
         $sub_array = array();  
         $sub_array[] = $row->Ticket_No;   
        //  $sub_array[] = $row->tital;  
        //  $sub_array[] = $row->header;  
         $sub_array[] = $row->Date;  
         $sub_array[] = number_format($row->ticket_total,0).' '.$row->Rate; 
         $sub_array[] = $row->username;  

         
         $sub_array[] = '<a href="#" data-code="'.$row->finance_in_id.'"  data-Ticket="'.$row->Ticket_No.'"  class="btn btn-pill btn-primary Finance_in" data-toggle="tooltip" title="Select"><i class="fas fa-file-alt"></i> ເລືອກ </a>
                        
                         ';  
        
         $data[] = $sub_array;  
        } 

    }else{

        $sub_array = array();  
        $sub_array[] = ''; 
        $sub_array[] = '';   
        $sub_array[] = '';  
        $sub_array[] = '';  
        $sub_array[] = '';  
        
      
       
        $data[] = $sub_array;  


    }
     
    $output = array(  
         "draw"                    =>     intval($_POST["draw"]),  
         "recordsTotal"          =>      $this->Finance_in_model->get_all_data($status=1),  
         "recordsFiltered"     =>     $this->Finance_in_model->get_filtered_data($status=1),  
         "data"                    =>     $data  
    );  
    echo json_encode($output);  
} 

    public function Edit_invoice(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'status' => 'Cancel',
            );
     

            echo json_encode( $this->Finance_in_model->Edit_Status($data,$_POST["finance_in_id"]) );

       
        
    }

    public function Apply_invoice(){

        date_default_timezone_set("Asia/Bangkok");
        $data = array(
            'status' => 'Apply',
            'user_Apply' => $this->Users_model->get_username_token(),
            'Date_Apply' => date("Y-m-d H:i:s")
            );
     

            echo json_encode( $this->Finance_in_model->Edit_Status($data,$_POST["finance_in_id"]) );
 
    }

 

    public function create_by_Finance_in(){
        if($this->Users_model->check_token())
        {
            $data['money_go'] = $this->money_go_model->select_item();
            $data['rate'] = $this->Rate_model->select_item();
            $this->load->view('conten/accounting/Finance/view_Create_Finance_in',$data,false);
            
        }
        
    }

    public function edit_by_Finance_in($id){
        if($this->Users_model->check_token())
        {
            $data['money_go'] = $this->money_go_model->select_item();
            $data['rate'] = $this->Rate_model->select_item();
            $data['ticket_data'] = $this->Finance_in_model->select_invoice($id);
            $data['fetch_data'] = $this->Finance_in_model->select_item_by_invoice($id);
            $this->load->view('conten/accounting/Finance/view_Edit_Finance_in',$data,false);
            
        }
        
    }

    public function insert_invoice(){

       
        date_default_timezone_set("Asia/Bangkok");
        $titel = $_POST["titel"];
        $header = $_POST["header"];
        $text_money = $_POST["text_money"];
        $type_money = $_POST["type_money"];
        //$date = $_POST["date"];
        

        $ticket_total = $_POST["ticket_total"];
        

        $item_name = $_POST["item_name"];
        $item_qty = $_POST["item_qty"];
        $item_unit = $_POST["item_unit"];
        $item_price = $_POST["item_price"];

        $rate = $_POST["rate"];
        $rate_name = $_POST["rate_name"];

        $data_invoice = array(
                    'Date' => date("Y-m-d H:i:s"),
                    'tital' => $titel, 
                    'header' => $header, 
                    'text_money' => $text_money,
                    'type_money' => $type_money,

                    'status' => 'New',
                    'Rate' => $rate_name,
                    
                    'ticket_total' => $ticket_total,
                    'username' => $this->Users_model->get_username_token(),
                    );
        $invoice_id = $this->Finance_in_model->add_invoice($data_invoice);
        $this->Finance_in_model->Edit_ticket_on($invoice_id);

        for($count = 0; $count < count($item_name); $count++)
        {
            $name = $item_name[$count];
            $qty = $item_qty[$count];
            $unit = $item_unit[$count];
            $price = $item_price[$count];
           
            $data_detell = array(
                'finance_in_id' => $invoice_id,
                'Name' => $name, 
                'Qty' => $qty, 
                'Unit' => $unit,
                'Price' => $price,
               
                
                );
            $this->Finance_in_model->add_item($data_detell);
        }
        if($invoice_id){
            $myObj = array(
                'status' => 'ok',
                'msg' =>  'ບັນທືກສຳເລັດ',
                'ticket' =>  $invoice_id,
                );

        }else{
            $myObj = array(
                'status' => 'ON',
                'msg' =>  'ບໍ່ສາມາດບັນທືກໄດ້',
                );
        }
        

        echo json_encode($myObj);
    }


    public function edit_Finance_in(){

       
        date_default_timezone_set("Asia/Bangkok");
        $titel = $_POST["titel"];
        $header = $_POST["header"];
        $text_money = $_POST["text_money"];
        $type_money = $_POST["type_money"];
        //$date = $_POST["date"];invoid_id
        $ticket_id = $_POST["invoid_id"];
        

        $ticket_total = $_POST["ticket_total"];
        

        $item_name = $_POST["item_name"];
        $item_qty = $_POST["item_qty"];
        $item_unit = $_POST["item_unit"];
        $item_price = $_POST["item_price"];

        $rate = $_POST["rate"];
        $rate_name = $_POST["rate_name"];

        $data_invoice = array(
                    'Date' => date("Y-m-d H:i:s"),
                    'tital' => $titel, 
                    'header' => $header, 
                    'text_money' => $text_money,
                    'type_money' => $type_money,

                    'status' => 'New',
                    'Rate' => $rate_name,
                    
                    'ticket_total' => $ticket_total,
                    'username' => $this->Users_model->get_username_token(),
                    );
        $this->Finance_in_model->Edit_Finance_in($data_invoice,$ticket_id);
        $this->Finance_in_model->delete_finance_in_detell($ticket_id);

        for($count = 0; $count < count($item_name); $count++)
        {
            $name = $item_name[$count];
            $qty = $item_qty[$count];
            $unit = $item_unit[$count];
            $price = $item_price[$count];
           
            $data_detell = array(
                'finance_in_id' => $ticket_id,
                'Name' => $name, 
                'Qty' => $qty, 
                'Unit' => $unit,
                'Price' => $price,
               
                
                );
            $this->Finance_in_model->add_item($data_detell);
        }
        if($ticket_id){
            $myObj = array(
                'status' => 'ok',
                'msg' =>  'ບັນທືກສຳເລັດ',
                'ticket' =>  $ticket_id,
                );

        }else{
            $myObj = array(
                'status' => 'ON',
                'msg' =>  'ບໍ່ສາມາດບັນທືກໄດ້',
                );
        }
        

        echo json_encode($myObj);
    }

    public function print_invoice($id){
        if($this->Users_model->check_token())
        {
            $detell = '';  

            
            $ticket_data = $this->Finance_in_model->select_invoice($id);

            //echo $ticket_data->invoice_id;
            //print_r($ticket_data);

            $fetch_data = $this->Finance_in_model->select_item_by_invoice($id);
            $i=0;
            $total_kip = 0;
            $total_ticket = 0;
            foreach($fetch_data as $row)  
            {  
               
                $total_ticket += $row->Price;
                $detell .='
                    <tr>  
                        <td  align="center">'.++$i.'</td> 
                        <td  align="Left"  >'.$row->Name.'</td> 
                        <td  align="center">'.$row->Qty.'</td>  
                        <td  align="center">'.$row->Unit.'</td>
                        <td  align="right">'.number_format($row->Price,0).'</td>  
                        <td  align="right">'.number_format($row->Qty*$row->Price,0).'</td>  
                
                    </tr>
                ';
               
            
            } 


            
            $this->load->library('Pdf');

            


            $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
            $obj_pdf->SetCreator(PDF_CREATOR);  
            $obj_pdf->SetTitle("Invoice Finance In");  
            $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
            $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
            $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
            $obj_pdf->SetDefaultMonospacedFont('helvetica');  
            $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
            $obj_pdf->SetMargins('5', '10', '5');  
            $obj_pdf->setPrintHeader(false);  
            $obj_pdf->setPrintFooter(false);  
            $obj_pdf->SetAutoPageBreak(TRUE, 10);  
            $obj_pdf->SetFont('Saysettha_OT', '', 10);  
            $obj_pdf->AddPage(); 

           
           
            
            $content = ''; 
            $content .=  '
           
            
            <table border="0" cellspacing="0" cellpadding="3" width="100%">  
           
            <tr>  
                 <th align="Left" width="10%" >
                    <img src="http://localhost/Aiynoy/assets/image/logo_invoice.png" width="40" height="40"/>
                 </th> 
                 <th align="Left" width="30%" ><br/><br/><font size="9">ບໍລິສັດ ຈະເລີນເຊກອງ ກຣຸບ ຈຳກັດຜູ້ດຽວ <br/>
                 ຝ່າຍບັນຊີ-ການເງິນ <br/> 
                                 
                                    </font>
                                   
                    
                 </th>
                 <th align="center" width="20%"><br/><br/><br/><br/><font size="13">ໃບອະນຸມັດລາຍຮັບ</font><br/><br/>
  
                </th>
                <th align="right" width="40%"><br/><br/><font size="10">ເລກທີ່ : '.$ticket_data->Ticket_No.' <br/>
                ວັນທີ : '.date('d-m-Y', strtotime($ticket_data->Date)).'</font>

                </th>
                
                
                
                 
                        
                    </tr> 
            </table>'; 

            $content.=' 
                        <font size="11">&nbsp; - ອີງຕາມ  '.$ticket_data->tital.'</font><br/><br/>
                        <font size="11"> &nbsp; '.$ticket_data->header.'</font><br/><br/>
                        
                       
                        <table border="0" cellspacing="0" cellpadding="3"> 
                        <tr>  
                            
                            <th  ><font size="11">ຊື່ງມີລາຍລະອຽດດັ່ງລຸ່ມນ</font><br/> </th>  
                            <th align="right" > ສະກຸນເງິນ: '.$ticket_data->Rate.',ວິທີຈ່າຍ: '.$ticket_data->Name.' </th>
                        </tr>  
                       
                        </table>   
                        <table border="0.2" cellspacing="0" cellpadding="5">  
                            <tr>  
                                    <th  width="10%" align="center" >ລຳດັບ</th> 
                                    <th  width="35%" align="Left" >ລາຍການ</th> 
                                    <th  width="10%" align="center">ຈຳນວນ</th> 
                                    <th  width="10%" align="center">ຫົວໜ່ວຍ</th> 
                                    <th  width="15%" align="right">ຄາລາ</th>  
                                    <th  width="20%" align="right">ຈຳນວນເງີນ</th>  
                                
                            </tr> 
                       ';
            $content .= $detell;
            $content .='
                            <tr>  
                                 
                                <td colspan="5" align="center">ລວມຈຳນວນເງິນທັງຫມົດ </td>  
                                <td  align="right">'.number_format($total_ticket,0).' </td>  
                                
                        
                            </tr>
            
                        </table>';  
            $content .='
                       
                        <table border="0.2" cellspacing="0" cellpadding="5"> 
                                <tr>  
                                    
                                    <th colspan="3"  > ຈຳນວນເງິນຂຽນເປັນຕົວຫນັງສື: &nbsp;  '.$ticket_data->text_money.' </th>  
                                    
                                </tr>  
                                <tr>  
                                    
                                    <th align="center" > ອຳນວຍການ ຝ່າຍບັນຊີ-ການເງິນ </th>  
                                    <th align="center" > ຫົວໜ້າພະແນກການເງິນ </th> 
                                    <th align="center" > ພະນັກງານການເງິນ </th> 
                                    
                                </tr> 
                                <tr>  
                                    
                                    <th  height="150px" align="center" ><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> ຊື່ ................................................ </th>  
                                    <th  height="150px" align="center" ><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> ຊື່ ................................................ </th> 
                                    <th  height="150px" align="center" ><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> ຊື່ ................................................ </th> 
                                    
                                </tr> 
                        </table>    
            ';

            $obj_pdf->writeHTML($content);  
            $obj_pdf->Output('file.pdf', 'I');
            
        }
        
    }

    public function report(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/accounting/Report/View_report_Finance_in');
        }
    }

   
   
    public function print_report(){
        if($this->Users_model->check_token())
        {
            $detell = '';  
            $date_start = $_POST["date_start"];
            $date_end = $_POST["date_end"];

            $send_date_start = date('Y-m-d H:i:s', strtotime($date_start));
            $send_date_end = date('Y-m-d H:i:s', strtotime($date_end));
            
            $fetch_data = $this->Finance_in_model->report_finance_in($send_date_start,$send_date_end);
            $i=0;
            $total_kip = 0;
            $total_bath= 0;
            $total_usd= 0;
            foreach($fetch_data as $row)  
            {  
               
               
                $detell .='
                    <tr>  
                        <td  align="center">'.++$i.'</td> 
                        <td  align="Left"  >'.$row->Ticket_No.'</td> 
                        <td  align="center">'.$row->Date_Apply.'</td>  
                        <td  align="center">'.$row->status.'</td>
                        <td  align="center">'.$row->user_Apply.'</td>  
                        <td  align="right">'.number_format($row->ticket_total,0).'</td>  
                
                    </tr>
                ';
               
            
            } 


            
            $this->load->library('Pdf');

            


            $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
            $obj_pdf->SetCreator(PDF_CREATOR);  
            $obj_pdf->SetTitle("Invoice Finance In");  
            $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
            $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
            $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
            $obj_pdf->SetDefaultMonospacedFont('helvetica');  
            $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
            $obj_pdf->SetMargins('5', '10', '5');  
            $obj_pdf->setPrintHeader(false);  
            $obj_pdf->setPrintFooter(false);  
            $obj_pdf->SetAutoPageBreak(TRUE, 10);  
            $obj_pdf->SetFont('Saysettha_OT', '', 9);  
            $obj_pdf->AddPage(); 

           
           
            
            $content = ''; 
            $content .=  '
           
            
            <table border="0" cellspacing="0" cellpadding="3" width="100%">  
           
            <tr>  
                 <th align="Left" width="10%" >
                    <img src="http://localhost/Aiynoy/assets/image/logo_invoice.png" width="40" height="40"/>
                 </th> 
                 <th align="Left" width="28%" ><br/><br/><font size="9">ບໍລິສັດ ຈະເລີນເຊກອງ ກຣຸບ ຈຳກັດຜູ້ດຽວ <br/>
                 ຝ່າຍບັນຊີ-ການເງິນ <br/> 
                                 
                                    </font>
                                   
                    
                 </th>
                 <th align="center" width="25%"><br/><br/><br/><br/><font size="16">ລາຍງານ<br/>ໃບອະນຸມັດລາຍຮັບ</font><br/>
  
                </th>
                <th align="right" width="35%"><br/><br/><font size="10">ວັນທີພືມ : '.date("d-m-Y H:i:s").' <br/>
                </font>

                </th>
                
                
                
                 
                        
                    </tr> 
            </table>'; 

            $content.=' 
                        
                        
                       
                        <table border="0" cellspacing="0" cellpadding="3"> 
                        <tr>  
                            
                            <th  align="center" ><font size="11">ວັນທີ : '.date('d-m-Y', strtotime($date_start)).' ຫາວັນທີ : '.date('d-m-Y', strtotime($date_end)).'</font><br/> </th>  
                            
                        </tr>  
                       
                        </table>   
                        <table border="0.2" cellspacing="0" cellpadding="5">  
                            <tr>  
                                    <th  width="8%" align="center" >ລ/ດ</th> 
                                    <th  width="20%" align="Left" >ເລກທີໃບບິນ</th> 
                                    <th  width="20%" align="center">ວັນທີອະນຸມັດ</th> 
                                    <th  width="15%" align="center">ສະຖານະ</th> 
                                    <th  width="15%" align="center">ຜູ້ໃຊ້ອະນຸມັດ</th>  
                                    <th  width="20%" align="right">ຈຳນວນເງີນ</th>  
                                
                            </tr> 
                       ';
            $content .= $detell;
            $content .='
                            <tr>  
                                <td  align="center"> '.$i.' ບິນ </td>
                                <td colspan="4" align="center">ລວມຈຳນວນເງິນທັງຫມົດ </td>  
                                <td  align="right"></td>  
                                
                        
                            </tr>
            
                        </table>';  
            $content .='
                        <br/><br/><br/>
                        <table border="0" cellspacing="0" cellpadding="5"> 
                                
                                <tr>  
                                    
                                    <th align="center" > ອຳນວຍການ ຝ່າຍບັນຊີ-ການເງິນ </th>  
                                    <th align="center" > ຫົວໜ້າພະແນກການເງິນ </th> 
                                    <th align="center" > ພະນັກງານການເງິນ </th> 
                                    
                                </tr> 
                                <tr>  
                                    
                                    <th  height="150px" align="center" ><br/><br/><br/><br/><br/> ຊື່ ................................................ </th>  
                                    <th  height="150px" align="center" ><br/><br/><br/><br/><br/> ຊື່ ................................................ </th> 
                                    <th  height="150px" align="center" ><br/><br/><br/><br/><br/> ຊື່ ................................................ </th> 
                                    
                                </tr> 
                        </table>    
            ';

            $obj_pdf->writeHTML($content);  
            $obj_pdf->Output('file.pdf', 'I');
            
        }
        
    }

   
}

?>