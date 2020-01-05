<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
        $this->load->view('src');
    ?>

    <title>BootAdmin</title>
</head>
<body class="bg-light">

<?php
        $this->load->view('view_header');
    ?>

<div class="d-flex">
    
    <?php
         $this->load->view('conten/accounting/view_menu');
    ?>

    <div class="content p-4">
        <h2 class="mb-4">ສ້າງບັດຜ່ານບັນຊີ</h2>

        <div class=" card mb-4">
            <div class="card-body row">
                    <div class="col-sm-4" >   
                        
                       
                        
                    </div>
                    <div class="col-sm-4" align="center" >  
                        <br/>
                        <br/>
                        <br/>
                        <h2> ບັດຜ່ານບັນຊີ </h2>
                    </div>
                    
                    <div class="col-sm-4"  >   
                        <br/>
                        <br/>
                        <h5> ວັນທີ : <?php echo date('d-m-Y')?> </h5>
                        <h5 id="show_vendor"> ເອກະສານຢັ້ງຢືນ / Ref Doc  :  ວ່າງ</h5>
                        <button type="button" class="btn btn-success btn-lg" title="Select" name="Select" id="Select_Finance_in"  >ເລືອກໃບລາຍຮັບ</button>
                        <button type="button" class="btn btn-danger btn-lg" title="Select" name="Select" id="Select_Finance_out"  >ເລືອກໃບລາຍຈ່າຍ</button>
                        <input type="hidden" class="form-control" name="Finance_in" id="Finance_in" autocomplete="off" value="0" >
                        <input type="hidden" class="form-control" name="Finance_out" id="Finance_out" autocomplete="off" value="0" >
                        <input type="hidden" class="form-control" name="text_data" id="text_data" autocomplete="off"  >
                        <!-- <input type="hidden" class="form-control" name="date" id="date" autocomplete="off" > -->
                        
                            <br/>
                            <br/>
                            <select class="form-control form-control-lg"  name="template" id="template"  style="width: 150px;">
                                <option value="ແບບທີ1"> ແບບທີ1</option>
                                <option value="ແບບທີ2"> ແບບທີ2</option>
                            </select>
                        
                    </div>

                    <div class="col-sm-5" >   
                        
                        
                      
                    </div>
                    <div class="col-sm-3" align="center" >  
                        <br/>
                        
                    </div>
                    <div class="col-sm-2" align="right" > </div>
                    <div class="col-sm-2" align="right" >   
                   
                    
                      
                        
                    </div>
                    <div class="col-sm-12"  >
                        <table class="table table-bordered" id="Data_table"  cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th   scope="col"><h6>ລຳດັບ</h6></th>
                                <th   width="10%" scope="col" class="text-center"><h6>ລະຫັດໂຄງການ <br/> Project Code</h6></th>
                                <th   width="10%" scope="col" class="text-center"><h6>ປະເພດລາຍຈ່າຍ <br/> Category No.</h6></th>
                                <th   width="9%" scope="col" class="text-center"><h6>ລະຫັດຍ່ອຍ <br/> ປະເພດລາຍຈ່າຍ <br/> Activity</h6></th>
                                <th   width="20%" scope="col" class="text-center"><h6>ເນື້ອໃນລາຍການ</h6></th>
                                <th   width="10%" scope="col" class="text-center"><h6>ເລກບັນຊີຫນີ້ <br/> Credit</h6></th>
                                <th   width="10%" scope="col" class="text-center"><h6>ເລກບັນຊີມີ <br/> Debit</h6></th>
                                <th   width="8%" scope="col" class="text-right"><h6>ຈຳນວນເງີນ ຫນີ້</h6></th>
                                <th   width="8%" scope="col" class="text-right"><h6>ຈຳນວນເງີນ ມີ</h6></th>
                                <th   width="8%" scope="col" class="text-right"><h6>ມູນຄ່າເດີມ</h6></th>
                                <th   width="8%" scope="col" class="text-right"><h6>ສະກຸນເງິນ</h6></th>
                               
                              
                                <th   scope="col">
                                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >+</button>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                               
                        
                
                            </tbody>
                            <tfoot>
                                <tr id='row0'>
                                    <td class="text-left" > </td>
                                    <td class="text-left" ></td>
                                    <td class="text-center" ></td>
                                    <td class="text-right" ></td>
                                    <td class="text-right" ></td>
                                    <td class="text-right" ></td>
                                    <td class="text-right" ></td>
                                    <td class="text-right" ></td>
                                    <td class="text-right" ></td>
                                    <td class="text-right" ></td>
                                    <td class="text-right" ></td>
                                    
                                    <td class="text-left" >
                                   
                                    </td>
                                    
                                </tr>
                            </tfoot>
                            
                            
                            
                                    
                        
                        </table>
                    </div>
                        <div class="col-sm-4"  >
                            <h5>ເງິນຝາກ : </h5>
                           
                            <select class="form-control form-control-lg" name="Deposit" id="Deposit" >
                                <?php 
                                    foreach($Deposit as $row)  
                                    {  
                                    echo '<option value="'.$row->de_id.'"> '.$row->Name.'</option>';
                                    } 
                                ?> 
                            </select>
                        
                        </div>
                        <div class="col-sm-4"  >
                            <h5>ເງິນສົດ : </h5>
                           
                            <select class="form-control form-control-lg" name="Money_type" id="Money_type" >
                                <?php 
                                    foreach($Money_type as $row)  
                                    {  
                                    echo '<option value="'.$row->money_id.'"> '.$row->Name.'</option>';
                                    } 
                                ?> 
                            </select>
                        
                        </div>

                        <div class="col-sm-4"  >
                            <h5>ປື້ມບັນຊີ : </h5>
                           
                            <select class="form-control form-control-lg" name="Book_accounting" id="Book_accounting" >
                                <?php 
                                    foreach($Book_accounting as $row)  
                                    {  
                                    echo '<option value="'.$row->book_id.'"> '.$row->Name.'</option>';
                                    } 
                                ?> 
                            </select>
                        
                        </div>

                        <div class="col-sm-12" align="right"  >
                            <!-- <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ສະກຸນເງີນຕາ</span>
                                </div>
                                <select class="form-control form-control-lg"  name="rate" id="rate">
                                <?php 
                                    // foreach($rate as $row)  
                                    // {  
                                    //echo '<option value="'.$row->Rate.'"> '.$row->Rate_Name.'</option>';
                                    // } 
                                ?> 
                                </select>
                            </div> -->
                            <!-- <div>
                                <h4 id="total_ticket"> ລວມເງີນ : 0 ກີບ  </h4><br/>
                                <h4 id="total_ticket_kip">  </h4><br/>
                            </div> -->
                            <br/>
                            <button type="button" class="btn btn-primary btn-lg "  title="ບັນທືກ" name="save" id="save" >ບັນທືກ</button>
                        </div>
                       
                
            </div>
        </div>

                <div id="add_data_Modal_in" class="modal fade">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title">ໃບອະຍຸມັດລາຍຮັບ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered" id="Finance_in_table"  cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th scope="col">ລະຫັດ</th>
                            <th scope="col">ວັນທີ</th>
                            <th scope="col">ລວມເງີນ</th>
                            <th scope="col">ຜູ້ໃຊ້</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            
                        
                        </tbody>
                    
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>



                <div id="add_data_Modal_out" class="modal fade">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4  class="modal-title">ໃບອະຍຸມັດລາຍຈ່າຍ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered" id="Finance_out_table"  cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th scope="col">ລະຫັດ</th>
                            <th scope="col">ວັນທີ</th>
                            <th scope="col">ລວມເງີນ</th>
                            <th scope="col">ຜູ້ໃຊ້</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            
                        
                        </tbody>
                    
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>






    </div>
</div>

             







     


                



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
     
       

        function conver_number_to_string(number) {
        
        console.log(new Intl.NumberFormat('ja-JP').format(parseInt(number)));
        return new Intl.NumberFormat('ja-JP').format(number);
        }

        $("#date").datetimepicker({format:'d-m-Y H:m:s'});


         $('#add').click(function () {
               
            var table = document.getElementById("Data_table");
            var count = table.rows.length ;
            var one_row = document.getElementById("Data_table").rows[1].cells.item(0).innerHTML;
            var text = $('#text_data').val();
            // if(one_row != 1){
            //     count = 1;
            // }else{
            //     return false;
            // }

            var project = '<select class="form-control form-control-lg selected2 item_project" style=" height:100px;"  >';
            project +=  '<?php     foreach($project as $row)  
                                    {  
                                    echo '<option value="'.$row->pro_id.'"> '.$row->Name.'</option>';
                                    } 
                                ?> </select> ';
                                

            var payment_type  = '<select class="form-control form-control-lg selected2 item_payment_type"   >';
            payment_type  +=  '<?php 
                                    foreach($Payment_Type as $row)  
                                    {  
                                    echo '<option value="'.$row->pay_id.'"> '.$row->Name.'</option>';
                                    } 
                                ?> </select>';
               

            var sub_code  = '<select class="form-control form-control-lg selected2 item_sub_code"   >';
            sub_code  +=  '<?php 
                                    foreach($sub_code as $row)  
                                    {  
                                    echo '<option value="'.$row->sub_code_id.'"> '.$row->Name.'</option>';
                                    } 
                                ?> </select>';

          
            var credit  = '<select class="form-control form-control-lg  selected2 item_credit"    >';
            credit  +=  '<?php       
                                    echo '<option value=""> ເລືອກເລກບັນຊີ </option>';
                                    foreach($code_accounting as $row)  
                                    {  
                                    echo '<option value="'.$row->id.'"> '.$row->code.'-'.$row->name.'</option>'; 
                                    } 
                                ?> </select>';

            var debit  = '<select class="form-control form-control-lg  selected2 item_debit"   >';
            debit  +=  '<?php 
                                    echo '<option value=""> ເລືອກເລກບັນຊີ </option>';
                                    foreach($code_accounting as $row)  
                                    {  
                                    echo '<option value="'.$row->id.'"> '.$row->code.'-'.$row->name.'</option>';
                                    } 
                                ?> </select>';
             var rate  = '<select class="form-control   item_Rate"   >';
             rate  +=  '<?php 
                                    
                                    foreach($rate as $row)  
                                    {  
                                    echo '<option value="'.$row->Rate.'"> '.$row->Rate_Name.'</option>';
                                    } 
                                ?> </select>';
          
             
        
           
            var html_code = "<tr id='row"+count+"'>";
            html_code += "<td align='center'  contenteditable='false' >"+count+"</td>"
            html_code += "<td align='left' contenteditable >"+project+"</td>";
            html_code += "<td align='center' contenteditable >"+payment_type+"</td>";
            html_code += "<td align='center' contenteditable >"+sub_code+"</td>";
            html_code += "<td align='left' contenteditable class='item_text'>"+text+"</td>";
            html_code += "<td align='right' contenteditable='false' >"+credit+"</td>";
            html_code += "<td align='right' contenteditable='false' >"+debit+"</td>";
            html_code += "<td align='right' contenteditable class='item_credit_total'></td>"; 
            html_code += "<td align='right' contenteditable class='item_debit_total'></td>";
            html_code += "<td align='right' contenteditable class='item_old_total'></td>";
            html_code += "<td align='right' contenteditable >"+rate+"</td>";
            html_code += "<td> <button type='button' name='remove' data-row='"+count+"' class='btn btn-icon btn-pill btn-danger remove'><i class='fa fa-fw fa-trash'></i></button></td>";
                        
            html_code += "</tr>";  
            $('#Data_table').append(html_code);

            $('#row0').remove();
           
            $(".selected2").select2();
           });


          




           $(document).on('click', '.remove', function(){

                var delete_row = $(this).data("row");
                var table = document.getElementById("Data_table");
                
                var count = table.rows.length;
                $('#row' + delete_row).remove();
               
               
                if(count == 2){
                        var html_code = "<tr id='row0'>";
                        html_code += "<td >  </td>"
                        html_code += "<td ></td>";
                        html_code += "<td ></td>";
                        html_code += "<td> </td>";
                        html_code += "<td ></td>";
                        html_code += "<td> </td>";
                        html_code += "<td> </td>";
                        html_code += "<td ></td>";
                        html_code += "<td> </td>";
                        html_code += "<td ></td>";
                        html_code += "<td> </td>";
                        html_code += "<td> </td>";
                        
                                    
                        html_code += "</tr>";  
                        $('#Data_table').append(html_code);
                }
                

            });

            // $(document).on('blur', '.item_price', function(){  
            //     sumtotal();
            // });

            // $(document).on('blur', '.item_qty', function(){  
            //     sumtotal();
            // });

            // $( "#rate" ).change(function() {
            //     sumtotal();
            // });




            $('#Finance_in_table').DataTable({  
                "processing":true,  
                "serverSide":true,  
                "order":[],  
                "ajax":{  
                        url:"<?php echo base_url() . 'Finance_in/fetch_Finance_in'; ?>",  
                        type:"POST"  
                },  
                "columnDefs":[  
                        {  
                            "targets":[0,3],  
                            "orderable":false,  
                        }, 
                         
                        {
                            "targets": 2,
                            "className": "text-right",
                        } 
                ],  
                
            });


            $('#Finance_out_table').DataTable({  
                "processing":true,  
                "serverSide":true,  
                "order":[],  
                "ajax":{  
                        url:"<?php echo base_url() . 'Finance_out/fetch_Finance_out'; ?>",  
                        type:"POST"  
                },  
                "columnDefs":[  
                        {  
                            "targets":[0,3],  
                            "orderable":false,  
                        }, 
                         
                        {
                            "targets": 2,
                            "className": "text-right",
                        } 
                ],  
                
            });

            $('#Select_Finance_in').click(function () {
               
                $("#add_data_Modal_out").modal('hide');
                $("#add_data_Modal_in").modal('show');
               
                 
           });

           $('#Select_Finance_out').click(function () {
                $("#add_data_Modal_in").modal('hide');
                $('#add_data_Modal_out').modal('show');
                
                 
           });

           $(document).on('click', '.Finance_in', function(){  
               
                var data_code = this.getAttribute("data-code");
                var data_Ticket = this.getAttribute("data-Ticket");
                var data_text = this.getAttribute("data-text");
                  document.getElementById("show_vendor").innerHTML= 'ເອກະສານຢັ້ງຢືນ / Ref Doc  : '+data_Ticket;
                  $('#Finance_in').val(data_code);   
                  $('#add_data_Modal_in').modal('hide');  
                  $('#Finance_out').val(0);   
                  $('#text_data').val(data_text);   
                
                
              
            });

        
            $(document).on('click', '.Finance_out', function(){  
               
                var data_code = this.getAttribute("data-code");
                var data_Ticket = this.getAttribute("data-Ticket");
                var data_text = this.getAttribute("data-text");
                 
                  document.getElementById("show_vendor").innerHTML= 'ເອກະສານຢັ້ງຢືນ / Ref Doc  : '+data_Ticket;
                  $('#Finance_in').val(0);   
                  $('#add_data_Modal_out').modal('hide');  
                  $('#Finance_out').val(data_code);  
                  $('#text_data').val(data_text);    
                
              
            });


        



           
           $(document).on('click', '#save', function(){  
                //var vendor_id = this.getAttribute("data-vendor"); 
                var x  = document.getElementById("Data_table").rows[1].cells.item(0).innerHTML;
               
               
                
               
               if($('#Finance_in').val() == $('#Finance_out').val()){

                swal({
                        title: "ກະລຸນາເລືອກ ໃບບິນອ້າງອີງ",
                        text:   'ບໍ່ມີຂໍ້ມູນ',
                        icon: "warning",
                    });  

                }
                else if(x <= 0 ){

                    swal({
                            title: "ບໍ່ມີລາຍການ",
                            text:   'ບໍ່ມີຂໍ້ມູນ',
                            icon: "warning",
                        });  

                }
                else{

                    swal({
                        title: "ຢືນຢັງການບັນທືກຂໍ້ມູນ",
                        text: "ກະນຸນາຢືນຢັງ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                           
                                var Finance_in =  $('#Finance_in').val(); 
                                var Finance_out =  $('#Finance_out').val(); 
                                var template =  $('#template').val(); 

                                var Deposit =  $('#Deposit').val(); 
                                var Money_type =  $('#Money_type').val(); 
                                var Book_accounting =  $('#Book_accounting').val(); 

                               
                              
                                var item_project = [];
                                var item_payment_type = [];
                                var item_sub_code = [];
                                var item_text = [];
                                var item_credit = [];
                                var item_debit = [];
                                var item_credit_total = [];
                                var item_debit_total = [];
                                var item_old_total = [];
                                var item_Rate = [];
                                var item_Rate_name = [];

                               
                                
                             

                                
                              
                                var ticket = 0

                                $('.item_project').each(function(){
                                    item_project.push($(this).val());
                                });

                                $('.item_payment_type').each(function(){
                                    item_payment_type.push($(this).val());
                                });

                                $('.item_sub_code').each(function(){
                                    item_sub_code.push($(this).val());
                                });

                                $('.item_text').each(function(){
                                    item_text.push($(this).text());
                                });

                                $('.item_credit').each(function(){
                                    item_credit.push($(this).val());
                                });

                                $('.item_debit').each(function(){
                                    item_debit.push($(this).val());
                                });

                                $('.item_credit_total').each(function(){
                                    item_credit_total.push($(this).text());
                                });

                                $('.item_debit_total').each(function(){
                                    item_debit_total.push($(this).text());
                                });

                                $('.item_old_total').each(function(){
                                    item_old_total.push($(this).text());
                                });

                                $('.item_Rate').each(function(){
                                    item_Rate.push($(this).val());
                                    item_Rate_name.push($(this).find(":selected").text()); 
                                });

                             
                                console.log("data");
                                console.log(item_Rate_name);

                            $.ajax({  
                                    url:"<?php echo base_url() . 'Voucher/insert_invoice/'; ?>", 
                                    method:"POST",  
                                    data:{
                                            Finance_in:Finance_in,
                                            Finance_out:Finance_out,
                                            template:template,

                                            Deposit:Deposit,
                                            Money_type:Money_type,
                                            Book_accounting:Book_accounting,

                                            item_project:item_project,
                                            item_payment_type:item_payment_type,
                                            item_sub_code:item_sub_code,
                                            item_text:item_text,
                                            item_credit:item_credit,
                                            item_debit:item_debit,
                                            item_credit_total:item_credit_total,
                                            item_debit_total:item_debit_total,
                                            item_old_total:item_old_total,
                                            item_Rate:item_Rate,
                                            item_Rate_name:item_Rate_name
                                        },  
                                    dataType:"json",  
                                    success:function(data){  
                                      
                                        console.log("data");
                                        console.log(data);
                                        if(data.status=='ok'){

                                          
                                            
                                            swal(data.msg, {
                                                icon: "success",
                                                });

                                                window.setTimeout(
                                                function(){window.open("<?php echo base_url() . 'Print-Voucher/'; ?>"+data.ticket , '_blank')
                                                        window.location.replace('Voucher')
                                                    }, 800);
                                            
                                            
                                        }else{


                                            $.toast({
                                                    heading: 'ແຈ້ງເຕືອນ!',
                                                    text: data.msg,
                                                    textFont: 'Saysettha OT',
                                                    bgColor: '#cc3300',
                                                    position: 'top-right',
                                                    icon: 'error',
                                                    loader: false,   
                                                    loaderBg: '#ff6666',
                                                    textColor: 'white'
                                                })
                                        }
                                    }
                                });
                               
                            
                          
                        }      
                    }); 

                }
                 
                
                  
            }); 
 });  
 </script>  