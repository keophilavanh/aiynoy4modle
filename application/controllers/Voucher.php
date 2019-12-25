<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Voucher extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Deposit_accounts_model');
        $this->load->model('Finance_in_model');
        $this->load->model('Finance_out_model');
        $this->load->model('money_go_model');
        $this->load->model('Rate_model');
        $this->load->model('Book_accounting_model');
        $this->load->model('Money_type_model');
        $this->load->model('Project_model');
        $this->load->model('Payment_Type_model');
        $this->load->model('Sub_code_model');
        $this->load->model('code_accounting_model');
        $this->load->model('Voucher_model');
     
        
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/accounting/Voucher/view_Voucher');
        }
    }


    



    function fetch_invoice(){  
      
       
        $fetch_data = $this->Voucher_model->make_datatables();  
        $data = array();  

        if($this->Voucher_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array();  
             $sub_array[] = $row->ticket_no;   
             
             if($row->finance_in_id > 0){
                $sub_array[] = $this->Finance_in_model->select_ticket_invoice($row->finance_in_id);
             }elseif($row->finance_out_id > 0){
                $sub_array[] = $this->Finance_out_model->select_ticket_invoice($row->finance_out_id);
             }

             $sub_array[] = $row->Date;  
             $sub_array[] = $row->status; 
             $sub_array[] = $row->username;  
            
             $sub_array[] = '<a href="'.base_url('Print-Voucher/').$row->voucher_id.'" target="_blank" class="btn btn-pill btn-primary " data-toggle="tooltip" title="Print"><i class="fas fa-file-alt"></i> ພືມ</a>
                             <a href="#" id="'.$row->voucher_id.'" class="btn btn-pill btn-danger edit_data" data-toggle="tooltip" title="Cancel"><i class="fas fa-file-alt"></i> ຍົກເລີກ</a>
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
             "recordsTotal"          =>      $this->Voucher_model->get_all_data(),  
             "recordsFiltered"     =>     $this->Voucher_model->get_filtered_data(),  
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
     

            echo json_encode( $this->Voucher_model->Edit_Status($data,$_POST["voucher_id"]) );

       
        
    }

 

    public function create_by_Voucher(){
        if($this->Users_model->check_token())
        {
            $data['money_go'] = $this->money_go_model->select_item();
            $data['Deposit'] = $this->Deposit_accounts_model->select_item();
            $data['Book_accounting'] = $this->Book_accounting_model->select_item();
            $data['Money_type'] = $this->Money_type_model->select_item();
            $data['rate'] = $this->Rate_model->select_item();

            $data['project'] = $this->Project_model->select_item();
            $data['Payment_Type'] = $this->Payment_Type_model->select_item();
            $data['sub_code'] = $this->Sub_code_model->select_item();
            $data['code_accounting'] = $this->code_accounting_model->select_item();



            $this->load->view('conten/accounting/Voucher/view_Create_Voucher',$data,false);
            
        }
        
    }

    public function insert_invoice(){

        $Finance_in = $_POST["Finance_in"];
        $Finance_out = $_POST["Finance_out"];
        $template = $_POST["template"];

        $Deposit = $_POST["Deposit"];
        $Money_type = $_POST["Money_type"];
        $Book_accounting = $_POST["Book_accounting"];

        $item_project = $_POST["item_project"];
        $item_payment_type = $_POST["item_payment_type"];
        $item_sub_code = $_POST["item_sub_code"];
        $item_text = $_POST["item_text"];
        $item_credit = $_POST["item_credit"];
        $item_debit = $_POST["item_debit"];
        $item_credit_total = $_POST["item_credit_total"];
        $item_debit_total = $_POST["item_debit_total"];
        $item_old_total = $_POST["item_old_total"];
        $item_Rate = $_POST["item_Rate"];
        $item_Rate_name = $_POST["item_Rate_name"];

        if($Finance_in > 0){
            $this->Finance_in_model->voucher_invoice($Finance_in);
         }elseif($Finance_out > 0){
            $this->Finance_out_model->voucher_invoice($Finance_out);
         }

        date_default_timezone_set("Asia/Bangkok");

        $data_invoice = array(
                    'Date' => date("Y-m-d H:i:s"),
                    'finance_in_id' => $Finance_in, 
                    'finance_out_id' => $Finance_out, 
                    'template' => $template,

                    'de_id' => $Deposit,
                    'money_id' => $Money_type,
                    'book_id' => $Book_accounting,

                    'status' => 'Normal',
                    'username' => $this->Users_model->get_username_token(),
                    );
        $invoice_id = $this->Voucher_model->add_invoice($data_invoice);
        $this->Voucher_model->Edit_ticket_on($invoice_id);

        for($count = 0; $count < count($item_project); $count++)
        {
            $project = $item_project[$count];
            $payment_type = $item_payment_type[$count];
            $sub_code = $item_sub_code[$count];
            $text = $item_text[$count];

            $credit = $item_credit[$count];
            $debit = $item_debit[$count];
            $credit_total = $item_credit_total[$count];
            $debit_total = $item_debit_total[$count];
            $old_total = $item_old_total[$count];
            $Rate = $item_Rate[$count];
            $Rate_Name = $item_Rate_name[$count];

           
            $data_detell = array(
                'voucher_id' => $invoice_id,
                'pro_id' => $project, 
                'pay_id' => $payment_type, 
                'sub_code_id' => $sub_code,
                'text' => $text,

                'credit' => $credit,
                'credit_total' => $credit_total, 
                'debit' => $debit, 
                'debit_total' => $debit_total,
                'old_total' => $old_total,
                'Rate' => $Rate,
                'Rate_Name' => $Rate_Name,
               
                
                );
            $this->Voucher_model->add_item($data_detell);
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

            
            $ticket_data = $this->Voucher_model->select_invoice($id);

            $ref;
            if($ticket_data->finance_in_id > 0){
                $ref = $this->Finance_in_model->select_ticket_invoice_voucher($ticket_data->finance_in_id);
             }elseif($ticket_data->finance_out_id > 0){
                $ref = $this->Finance_out_model->select_ticket_invoice_voucher($ticket_data->finance_out_id);
             }


            $fetch_data = $this->Voucher_model->select_item_by_invoice($id);
            $i=0;
         
            $credit_total = 0;
            $debit_total = 0;
            $old_total = 0;
            foreach($fetch_data as $row)  
            {  
               
                 $credit_total += $row->credit_total;
                 $debit_total += $row->debit_total;
                 $old_total += $row->old_total;
                $detell .='
                    <tr>  
                        <td  align="center">'.++$i.'</td> 
                        <td  align="center"  >'.$this->Project_model->select_code($row->pro_id).'</td> 
                        <td  align="center">'.$this->Payment_Type_model->select_code($row->pay_id).'</td>  
                        <td  align="center">'.$this->Sub_code_model->select_code($row->sub_code_id).'</td>
                        <td  >'.$row->text.'</td>
                        <td  align="center">'.$this->code_accounting_model->select_code($row->credit).'</td> 
                        <td  align="center">'.$this->code_accounting_model->select_code($row->debit).'</td>
                        <td  align="right">'.number_format($row->credit_total,0).'</td>  
                        <td  align="right">'.number_format($row->debit_total,0).'</td>  
                        <td  align="right">'.number_format($row->old_total,0).'</td>  
                        <td  align="center">'.$row->Rate.'</td>
                        <td  align="center">'.$row->Rate_Name.'</td>
                
                    </tr>
                ';
               
            
            } 


            
            $this->load->library('Pdf');

            


             $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  

            $obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
            $obj_pdf->SetFont('Saysettha_OT', '', 8);  

        
          

            $obj_pdf->AddPage('L', 'A4');
          

         

           
            
            $content = ''; 
            $content .=  '
           
            
            <table border="" cellspacing="0" cellpadding="3" width="100%">  

            <tr>  
                
                 <th align="center" width="100%"><font size="11">ສາທາລະນະລັດ ປະຊາທີປະໄຕ ປະຊາຊົນລາວ <br/> ສັນຕິພາບ ເອກະລາດ ປະຊາທີປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ </font><br/>
  
                </th>
               
                
                
                
                 
                        
            </tr> 
           
            <tr>  
                 <th align="Left" width="8%" ><img src="http://localhost/Aiynoy/assets/image/logo_invoice.png" width="50" height="50"/>
                 </th> 
                 <th align="Left" width="30%" ><font size="9">ບໍລິສັດ ຈະເລີນເຊກອງ ກຣຸບ ຈຳກັດ ຜຸ້ດຽວ <br/> 
                 ຖະໜົນເລກທີ 13 ໃຕ້, ບ້ານ ລົມສັກເໜືອ <br/> 
                 ເມືອງ ບາຈຽງ, ແຂວງ ຈຳປາສັກ <br/> 
                 ໂທ : 031 259999 , ແຟັກ : 031 259111 <br/> 
                                 
                                    </font>
                                   
                    
                 </th>
                 <th align="center" width="20%"><br/><br/><br/>    <font size="16"> ບັດຜ່ານບັນຊີ <br/> Voucher </font> <br/><br/>
  
                </th>
                <th align="center" width="10%">
  
                </th>
                <th  width="30%"><font size="10">ບັດຜ່ານບັນຊີ / V No : '.$ticket_data->ticket_no.' <br/>
                ລົງວັນທີ : '.date('d-m-Y', strtotime($ticket_data->Date)).'</font>

                <br/><br/><font size="10">ເອກະສານຢັ້ງຢືນ / Ref Doc : '.$ref->Ticket_No.' <br/>
                ລົງວັນທີ : '.date('d-m-Y', strtotime($ref->Date)).'</font>

                </th>
                
                
                
                 
                        
            </tr> 
            </table>'; 

            $content.=' 
                      
                       
                      
                        <table border="0.2" cellspacing="0" cellpadding="5">  
                            <tr>  
                                    <th  width="4%" align="center" >ລຳດັບ</th> 
                                    <th  width="8%" align="center" >ລະຫັດໂຄງການ Project Code</th> 
                                    <th  width="8%" align="center">ປະເພດລາຍຈ່າຍ Category No.</th> 
                                    <th  width="8%" align="center">ລະຫັດຍ່ອຍ ປະເພດລາຍຈ່າຍ Activity</th> 
                                    <th  width="20%" align="center">ເນື້ອໃນ ລາຍການ</th>  
                                    <th  width="7%" align="center">ເລກບັນຊີຫນີ້ Credit</th>  
                                    <th  width="7%" align="center">ເລກບັນຊີມີ Debit</th> 
                                    <th  width="8%" align="center" >ຈຳນວນເງິນຫນີ</th> 
                                    <th  width="7%" align="center">ຈຳນວນເງິນມີ</th> 
                                    <th  width="7%" align="center">ມູນຄ່າເດີມ</th> 
                                    <th  width="8%" align="center">ອັດຕາແລກປ່ຽນ</th>  
                                    <th  width="8%" align="center">ສະກຸນເງິນ</th>  
                                
                            </tr> 
                       ';
            $content .= $detell;
            $content .='
                            <tr>  
                                 
                                <td  align="center"></td>  
                                <td  align="right"> </td>  
                                <td  align="right"> </td>  
                                <td  align="right"> </td>  
                                <td  align="center"> ລວມ / Total </td>  
                                <td  align="right"> </td>  
                                <td  align="right"> </td>  
                                <td  align="right">'.number_format($credit_total,0).'</td>  
                                <td  align="right">'.number_format($debit_total,0).'</td> 
                                <td  align="right">'.number_format($old_total,0).'</td> 
                                <td  align="right"> </td>  
                                <td  align="right"> </td> 
                                <td  align="right"> </td> 
                                <td  align="right"> </td> 
                                
                             
                        
                            </tr>
            
                        </table>';  
            $content .='
                        <br/><br/><br/>  
                        <table border="0.2" cellspacing="0" cellpadding="5"> 
                                <tr>  
                                    
                                    <td  > <font size="12"> ເງິນຝາກ : <br/><br/>&nbsp;  '.$ticket_data->deposit.' </font>
                                   
                                    </td>  
                                    <td  > <font size="12"> ເງິນສົດ : <br/><br/>&nbsp;  '.$ticket_data->money_type.' </font> </td> 
                                    <td  > <font size="12"> ປື້ມບັນຊີ : <br/><br/>&nbsp;  '.$ticket_data->book.' </font> </td> 
                                    
                                </tr>  
                            
                              
                        </table>    
            ';

            $obj_pdf->writeHTML($content);  
            $obj_pdf->Output('file.pdf', 'I');
            
        }
        
    }

   
   


   
}

?>