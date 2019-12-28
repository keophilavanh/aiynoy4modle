<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class vendor_invoice extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Vendor_model');
        $this->load->model('Vendor_invoice_model');
        $this->load->model('Rate_model'); 
        $this->load->model('Finance_out_model');
        
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/accounting/Follow_up_vender/view_vendor_invoice');
        }
    }

    



    function fetch_invoice(){  
      
       
        $fetch_data = $this->Vendor_invoice_model->make_datatables();  
        $data = array();  

        if($this->Vendor_invoice_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->invoice_id;   
             $sub_array[] = $row->vendor_name;  
             $sub_array[] = $row->rate_name;  
             $sub_array[] = $row->Date;  
             $sub_array[] = $row->status; 
             $sub_array[] = $row->amount;
             $sub_array[] = $row->ticket_total;  
             $sub_array[] = $row->username;  
             $sub_array[] = '<a href="'.base_url('Print-invoice-Vendor/').$row->invoice_id.'" target="_blank" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Printer"><i class="fas fa-file-alt"></i></a> 
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
            $sub_array[] = '';  
            $sub_array[] = '';
            $sub_array[] = '';
            $sub_array[] = '';
            $sub_array[] = '';
           
            $data[] = $sub_array;  


        }
         
        $output = array(  
             "draw"                    =>     intval($_POST["draw"]),  
             "recordsTotal"          =>      $this->Vendor_invoice_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Vendor_invoice_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 


   function fetch_invoice_list(){  
      
       
    $fetch_data = $this->Vendor_invoice_model->make_datatables($status=1);  
    $data = array();  

    if($this->Vendor_invoice_model->get_all_data() > 0){

        foreach($fetch_data as $row)  
        {  
         $sub_array = array();  
         $sub_array[] = $row->invoice_id;   
         $sub_array[] = $row->vendor_name;
         $sub_array[] = $row->status;  
        
         $sub_array[] = $row->amount.' '.$row->rate_name;
         
         $sub_array[] = '<a href="#" id="'.$row->invoice_id.'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="ເລືອກ"> ເລືອກ </a> 
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
         "recordsTotal"          =>      $this->Vendor_invoice_model->get_all_data($status=1),  
         "recordsFiltered"     =>     $this->Vendor_invoice_model->get_filtered_data($status=1),  
         "data"                    =>     $data  
    );  
    echo json_encode($output);  
} 


   

    public function addVendor(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'vendor_name' => $_POST["Vendorname"],
            'vendor_credit' => $_POST["credit"],
            'vendor_phone' => $_POST["phone"],
            'vendor_address' => $_POST["Address"]
          
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->Vendor_model->addVendor($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->Vendor_model->EditVendor($data,$_POST["vendor_id"]) );

        }
        
    }

    public function getVendor(){
        
        $id = $_POST["vendor_id"];

        echo json_encode($this->Vendor_model->getVendor($id));
    }

    public function deletVendor(){
        $id = $_POST["vendor_id"];
        echo json_encode($this->Vendor_model->deleteVendor($id));
    }

    public function create_by_vendor($id){
        if($this->Users_model->check_token())
        {
            $data['vender_data'] = $this->Vendor_model->getVendor($id);
            $data['rate'] = $this->Rate_model->select_item();
            $this->load->view('conten/accounting/Follow_up_vender/view_Create_invoice_vendor',$data,false);
        }
        
    }

    public function insert_invoice(){

       
        date_default_timezone_set("Asia/Bangkok");
        $vendor_id = $_POST["vendor_id"];
        $rate = $_POST["rate"];
        $ticket_total = $_POST["ticket_total"];

        $item_name = $_POST["item_name"];
        $item_price = $_POST["item_price"];
        $rate_name = $_POST["rate_name"];

        $data_invoice = array(
                    'Date' => date("Y-m-d H:i:s"),
                    'vendor_id' => $vendor_id, 
                    'rate_name' => $rate_name, 
                    'status' => 'Normal',
                    'amount' => $ticket_total,
                    'ticket_total' => $ticket_total,
                    'username' => $this->Users_model->get_username_token(),
                    );
        $invoice_id = $this->Vendor_invoice_model->add_invoice($data_invoice);

        for($count = 0; $count < count($item_name); $count++)
        {
            $name = $item_name[$count];
            $price = $item_price[$count];
           
            $data_detell = array(
                'invoice_id' => $invoice_id,
                'rate' => $rate, 
                'Name' => $name, 
                'Price' => $price,
               
                
                );
            $this->Vendor_invoice_model->add_item($data_detell);
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

    public function print_invoice($id){
        if($this->Users_model->check_token())
        {
            $detell = '';  

            
            $ticket_data = $this->Vendor_invoice_model->select_invoice($id);

            //echo $ticket_data->invoice_id;
            //print_r($ticket_data);

            $fetch_data = $this->Vendor_invoice_model->select_item_by_invoice($id);
            $i=0;
            $total_kip = 0;
            $total_ticket = 0;
            foreach($fetch_data as $row)  
            {  
                $total_kip += $row->rate*$row->Price;
                $total_ticket += $row->Price;
                $detell .='
                    <tr>  
                        <td  align="center">'.++$i.'</td> 
                        <td  align="Left"  >'.$row->Name.'</td> 
                        <td  align="center">'.$row->rate.'</td>  
                        <td  align="right">'.number_format($row->Price,0).' '.$ticket_data->rate_name.'</td>  
                        <td  align="right">'.number_format($row->rate*$row->Price,0).' ກີບ </td>  
                
                    </tr>
                ';
               
            
            } 

            $payment='';
            $Finance_out = $this->Finance_out_model->vendor_pay($id);
            foreach($Finance_out as $row)  
            {  
             
                $payment .=' ໃບບິນທີ່ : '.$row->Ticket_No.'  ວັນທີ : '.date('d-m-Y', strtotime($row->Date)).' ມູນຄ່າ : '.number_format($row->ticket_total,0).' '.$row->Rate.' <br/>
                ';
               
            
            } 

            
            $this->load->library('Pdf');

            


            $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
            $obj_pdf->SetCreator(PDF_CREATOR);  
            $obj_pdf->SetTitle("Invoice Vendor");  
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

                    <font align="center">  <font size="8">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ </font> <br/>
                    <font size="8">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ </font><br/><br/>
                    <font size="16"><u>ໃບບິນຕິດໜີ້ :<u/></font></font>
                    <br/><br/>
            
            <table border="0" cellspacing="0" cellpadding="3" width="100%">  
           
            <tr>  
                 <th align="Left" width="10%" >
                    <img src="http://localhost/Aiynoy/assets/image/logo_invoice.png" width="40" height="40"/>
                 </th> 
                 <th align="Left" width="40%" ><font size="9">ບໍລິສັດ ຈະເລີນເຊກອງກຣຸບ ຈຳກັດຜູ້ດຽວ <br/>
                                   ໂທ : (+856-31)259 999 <br/> 
                                   ແຟັກ : (+856-31)259 111 <br/> 
                                   ແຂວງ : ຈຳປາສັກ <br/>
                                    </font>
                                   
                    
                 </th>
                 <th align="right" width="25%"><font size="9">ລະຫັດໜີ້ : <br/>
                                                               ຊື່ເຈົ້າໜີ້ :  <br/> 
                                                               ເບີໂທຕິດຕໍ່ :  <br/> 
                                                               ເງື່ອນໄຂການຈ່າຍ : <br/>
                                                               ທີ່ຢູ່ເຈົ້າໜີ້ :</font>
  
                </th>
                <th align="Left" width="30%" ><font size="9">'.$ticket_data->invoice_id.' <br/>
                '.$ticket_data->vendor_name.'  <br/> 
                '.$ticket_data->vendor_phone.'  <br/> 
                '.$ticket_data->vendor_credit.' <br/>
                '.$ticket_data->vendor_address.'</font>

                </th>
                
                
                
                 
                        
                    </tr> 
            </table>'; 

            $content.=' 
                        
                        <table border="0.2" cellspacing="0" cellpadding="3">  
                            <tr>  
                                    <th  width="10%"   align="center">ລຳດັບ</th> 
                                    <th  width="45%" align="Left" >ລາຍການ</th> 
                                    <th  width="10%" align="center">ອ.ລ.ປ</th>  
                                    <th  width="15%" align="right">ຈຳນວນເງີນ</th>  
                                    <th  width="20%" align="right">ຈຳນວນເງີນກີບ</th>  
                                
                            </tr> 
                       ';
            $content .= $detell;
            $content .='
                            <tr>  
                                <td  align="center">ລວມ '.$i.'</td> 
                                <td  align="Left"  ></td> 
                                <td  align="center">ລວມເງີນ</td>  
                                <td  align="right">'.number_format($total_ticket,0).' '.$ticket_data->rate_name.'</td>  
                                <td  align="right">'.number_format($total_kip,0).' ກີບ</td>  
                        
                            </tr>
            
                        </table>';  
            $content .='
                        <br/>
                        <br/>
                        <table border="0" cellspacing="0" cellpadding="3"> 
                                <tr>  
                                    <th align="Left"  >ຊຳລະເງີນຈ່າຍ :  </th>
                                    <th align="right" > ໜີ້ຄ້າງຈ່າຍ : '.number_format($ticket_data->amount,0).' '.$ticket_data->rate_name.' </th>  
                                    
                                </tr>  
                                <tr>  
                                    <th align="Left" rowspan="2">'.$payment.'<br/>
                                    </th>
                                    <th align="right" > ຜູ້ໃຊ້ລະບົບ :'.$ticket_data->username.'</th>  
                                    
                                </tr> 
                                <tr>  
                                   
                                    <th align="right" > ວັນທີພືມ :'.date("d-m-Y H:i:s").'</th>  
                                    
                                </tr> 
                        </table>    
            ';

            $obj_pdf->writeHTML($content);  
            $obj_pdf->Output('file.pdf', 'I');
            
        }
        
    }

   
   


   
}

?>