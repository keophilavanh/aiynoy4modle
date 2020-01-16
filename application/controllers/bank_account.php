<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class bank_account extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('bank_account_model');
        $this->load->model('bank_model');
        $this->load->model('bank_sub_account_model');
        $this->load->model('Follow_account_model');
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $data['bank'] = $this->bank_model->select_item();
           
            $this->load->view('conten/accounting/Other/view_bank_accounting',$data,false);
        }
    }

    public function list(){
       
        if($this->Users_model->check_token())
        {
            $data['bank_account'] = $this->bank_account_model->select_item();
           
            $this->load->view('conten/accounting/Bank_of_cash/view_bank_account_list',$data,false);
        }
    }

    



    function fetch_data(){  
      
       
        $fetch_data = $this->bank_account_model->make_datatables();  
        $data = array();  

        if($this->bank_account_model->get_all_data() > 0){

            foreach($fetch_data as $row)  
            {  
             $sub_array = array(); 

             $sub_array[] = $row->Number_account;
             $sub_array[] = $row->Name_account;  
             $sub_array[] = $row->bank_Name; 
             $sub_array[] = number_format($this->bank_sub_account_model->select_sum_money($row->bank_account_id),0); 
             $sub_array[] = $row->Rate;   
             $sub_array[] = $row->Status;  
             $sub_array[] = '
                            <a href="'.base_url().'Sub-Account/'.$row->bank_account_id.'"  class="btn btn-pill btn-primary "  title="Sub-Account"><i class="fas fa-share"></i> ບ້ວງບັນຊີ</a> 
                            <a href="#" id="'.$row->bank_account_id.'" class="btn btn-pill btn-primary edit_data"  title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                            <a href="#"  data-code="'.$row->bank_account_id.'" data-count="'.$this->bank_sub_account_model->select_count_row($row->bank_account_id).'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a> ';  
            
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
             
              
           
            $data[] = $sub_array;  


        }
         
        $output = array(  
             "draw"                    =>     intval($_POST["draw"]),  
             "recordsTotal"          =>      $this->bank_account_model->get_all_data(),  
             "recordsFiltered"     =>     $this->bank_account_model->get_filtered_data(),  
             "data"                    =>     $data  
        );  
        echo json_encode($output);  
   } 


   
    public function additem(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);


        $data = array(
            'Number_account' => $_POST["Number_account"],
            'Name_account' => $_POST["Name_account"],
            'bank_id' => $_POST["bank_id"],
            'Rate' => $_POST["Rate"],
            'Status' => 'active'
            
          
            );
       
        if( $_POST["status"] =='Insert'){

            echo json_encode($this->bank_account_model->additem($data));

        }else if($_POST["status"] =='Update'){

            echo json_encode( $this->bank_account_model->Edititem($data,$_POST["bank_account_id"]) );

        }
        
    }

    public function getitem(){
        
        $id = $_POST["bank_account_id"];

        echo json_encode($this->bank_account_model->getitem($id));
    }

    public function delete(){
        
        $id = $_POST["bank_account_id"];
        $data = array(
           
            'Status' => 'hidden'
            
          
            );

        echo json_encode($this->bank_account_model->deleteitem($id));
    }

    public function report(){
       
        if($this->Users_model->check_token())
        {
            $data['bank_account'] = $this->bank_account_model->select_item();
          

            $this->load->view('conten/accounting/Report/View_report_Plan_payment',$data,false);
           
          
        }
    }

    public function print_report(){
        if($this->Users_model->check_token())
        {
            $detell = '';  
            $date_start = $_POST["date_start"];
            $date_end = $_POST["date_end"];
            $bank_account_id = $_POST["bank_account_id"];

            $send_date_start = date('Y-m-d ', strtotime($date_start));
            $send_date_end = date('Y-m-d ', strtotime($date_end));

            $ticket_data = $this->bank_account_model->getitem($bank_account_id);
            
            $fetch_data = $this->bank_sub_account_model->select_item_list($bank_account_id);
            $i=0;
            $total_Lift_balances = 0;
            $total_sum_income= 0;
            $total_sum_payment= 0;
            $total_Still_have= 0;
        
            foreach($fetch_data as $row)  
            {  
                $total_Lift_balances += $this->Follow_account_model->Lift_balances($send_date_start,$send_date_end,$row->bank_sub_account_id);
                $total_sum_income += $this->Follow_account_model->sum_income($send_date_start,$send_date_end,$row->bank_sub_account_id);
                $total_sum_payment += $this->Follow_account_model->sum_payment($send_date_start,$send_date_end,$row->bank_sub_account_id);
                $total_Still_have += $this->Follow_account_model->Still_have($send_date_start,$send_date_end,$row->bank_sub_account_id);
              
               
                $detell .='
                    <tr>  
                        <td  align="center">'.++$i.'</td> 
                        <td  align="Left"  >'.$row->sub_name.'</td> 
                        <td  align="right"  >'.number_format($this->Follow_account_model->Lift_balances($send_date_start,$send_date_end,$row->bank_sub_account_id),0).'</td>
                        <td  align="right"  >'.number_format($this->Follow_account_model->sum_income($send_date_start,$send_date_end,$row->bank_sub_account_id),0).'</td>
                        <td  align="right"  >'.number_format($this->Follow_account_model->sum_payment($send_date_start,$send_date_end,$row->bank_sub_account_id),0).'</td>
                        <td  align="right"  >'.number_format($this->Follow_account_model->Still_have($send_date_start,$send_date_end,$row->bank_sub_account_id),0).'</td>
                      
                     
                        
                
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
                 <th align="center" width="30%"><br/><br/><br/><br/><font size="16">ລາຍງານ<br/>ແຜນລາຍຈ່າຍ</font><br/>
  
                </th>
                <th align="Left" width="35%"><br/><br/><font size="10">ຊື່ບັນຊີ : '.$ticket_data->Name_account.' <br/>  ເລກບັນຊີ : '.$ticket_data->Number_account.'<br/>  ສະກຸນເງີນ : '.$ticket_data->Rate.'  <br/> <br/>
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
                                    <th  width="8%" align="center" >ລຳດັບ</th> 
                                    <th  width="40%" align="Left" >ຊື່ບ້ວງບັນຊີ</th> 
                                    <th  width="13%" align="center">ຍອດຍົກມາ</th> 
                                    <th  width="13%" align="center">ແຜນຮັບ</th> 
                                    <th  width="13%" align="center">ແຜນຈ່າຍ</th> 
                                    <th  width="13%" align="center">ຍອດຍັງຄ້າງ</th>
                                   
                                
                            </tr> 
                       ';
            $content .= $detell;
            $content .='
                            <tr>  
                                <td  align="center">  </td>
                                <td align="center">ລວມຈຳນວນເງິນທັງຫມົດ </td>  
                                <td  align="right">'.number_format($total_Lift_balances).'</td>  
                                <td  align="right">'.number_format($total_sum_income).'</td>
                                <td  align="right">'.number_format($total_sum_payment).'</td>
                                <td  align="right">'.number_format($total_Still_have).'</td>

                                
                                
                        
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
                                    <th  height="150px" align="center" ><br/><br/><br/><br/><br/> ຊື່ ................................................ <br/><br/> <br/> <br/>  ວັນທີພືມ : '.date("d-m-Y H:i:s").' </th> 
                                    
                                </tr> 
                        </table>    
            ';

            $obj_pdf->writeHTML($content);  
            $obj_pdf->Output('file.pdf', 'I');
            
        }
        
    }

    

    

   
   


   
}

?>