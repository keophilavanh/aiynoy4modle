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
         $this->load->view('conten/project_manage/view_menu');
    ?>

    <div class="content p-4">
        <h2 class="mb-4">ສ້າງໂຄງການໃໝ່</h2>

        <div class=" card mb-4">
            <div class="card-body row">
                  
                    <!-- <div class="col-sm-12" align="center" >  
                        <br/>
                        <h1> ສ້າງໂຄງການໃໝ່ </h1>
                    </div> -->
                  

                    <div class="col-sm-8" >   
                        
                         <h5>ຊື່ໂຄງການ : </h5>
                        <textarea class="form-control"  rows="2" name="titel" id="titel"></textarea>
                        <h5>ລາຍລະອຽດ : </h5>
                        <textarea class="form-control"  rows="3" name="header" id="header"></textarea><br/>
                        
                      
                    </div>
                  
                  
                    <div class="col-sm-2"  >   

                        <h5>ວັນທີເລີ້ນ : </h5>
                        <input type="text" name="date_start" id="date_start"  class="form-control" />
                        <h5>ວັນທີສິ້ນສຸດ : </h5>
                        <input type="text" name="date_end" id="date_end"  class="form-control" />
                        <h5>ມູນຄ່າໂຄງການ : </h5>
                        <input type="number" name="total" id="total"  class="form-control" />
                   
                    
                      
                        
                    </div>
                    <div class="col-sm-2" > 
                        <h5>ເວລາທັງໝົດຂອງໂຄງການ : </h5>
                        <h6>3 ປີ 4 ເດືອນ 1 ອາທິດ 2 ມື້</h6>
                    </div>

                    <div class="col-sm-12" > 
                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ໜ້າວຽກ  <a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ສັບພະຍາກອນ <a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">ປະເມີນໂຄງການ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="chart-tab" data-toggle="tab" href="#chart" role="tab" aria-controls="chart" aria-selected="false">Chart</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <div class="row">
                                        <div class="col-sm-12" > 
                                            <table class="table table-bordered" id="Data_table"  cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th  width="5%" scope="col"><h4>ລຳດັບ</h4></th>
                                                    <th  width="45%" scope="col"><h4>ເນື້ອໃນລາຍການ</h4></th>
                                                    <th  width="15%" scope="col" class="text-right"><h4>ວັນທີເລີນ</h4></th>
                                                    <th  width="15%" scope="col" class="text-right"><h4>ວັນສຳເລັດ</h4></th>
                                                    <th  width="10%" scope="col">
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
                                                       
                                                        
                                                    </tr>
                                                </tfoot>
                                        
                                        
                                        
                                                
                                    
                                            </table>
                                        </div>

                                        
                                    </div>

                                   
                                
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <h5>profile </h5>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <h5>contact </h5>
                                </div>

                                <div class="tab-pane fade" id="chart" role="tabpanel" aria-labelledby="chart-tab">
                                    <h5>chart </h5>
                                </div>
                            </div>
                    </div>

                           
                   
                    <div class="col-sm-12"  >
                        
                        <br/>
                        <br/>
                        <br/>
                    </div>
                        

                       
                       
                
            </div>
        </div>
    </div>
</div>

                <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ລາຍຊື່ເຈົ້າໜີ້</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered" id="vendor_table"  cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th scope="col">ລະຫັດ</th>
                            <th scope="col">ຊື່ເຈົ້າໜີ້</th>
                            <th scope="col">ສະຖານະ</th>
                            <th scope="col">ໜີ້ຄ້າງຈ່າຍ</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            
                        
                        </tbody>
                    
                    </table>
               
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>


                



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  

            $("#date_start").datetimepicker({format:'d-m-Y '});
            $("#date_end").datetimepicker({format:'d-m-Y '});
     
        function sumtotal(){
            var table = document.getElementById("Data_table");
            var total_price = parseInt(0, 10);
            var total_price_kip = parseInt(0, 10);
            var rate = document.getElementById("rate").value;
                for (var i = 0, row; row = table.rows[i]; i++) {

                    if(i > 0){
                        document.getElementById("Data_table").rows[i].cells.item(0).innerHTML= i;
                       
                        document.getElementById("Data_table").rows[i].cells.item(5).innerHTML= document.getElementById("Data_table").rows[i].cells.item(2).innerHTML * document.getElementById("Data_table").rows[i].cells.item(4).innerHTML;
                        
                        if(parseInt(document.getElementById("Data_table").rows[i].cells.item(4).innerHTML, 10)){
                        total_price += parseInt(document.getElementById("Data_table").rows[i].cells.item(5).innerHTML, 10);
                        total_price_kip += parseInt(document.getElementById("Data_table").rows[i].cells.item(5).innerHTML, 10);
                        }else{
                            
                        }
                    }

                   
                    

                   
                   


                }
              
                var rate_name = new String($( "#rate option:selected" ).text());

              
                // var name_type_rate='';
                // if(rate_name === new String("ສະກຸນເງີນກີບ")){
                //     name_type_rate = 'ກີບ';
                // }else if(rate_name === 'ສະກຸນເງີນບາດ'){
                //     name_type_rate = 'ບາດ';
                // }else if(rate_name === 'ສະກຸນເງີນໂດລາ'){
                //     name_type_rate = 'ໂດລາ';
                // }

                //alert(name_type_rate);

            document.getElementById("total_ticket").innerHTML= 'ລວມເງີນ : '+conver_number_to_string(total_price)+' '+rate_name;
           // document.getElementById("total_ticket_kip").innerHTML= 'ລວມເງີນກີບ : '+conver_number_to_string(total_price_kip)+' ກີບ';
           $('#text_money').val(text_number_to_string(total_price)+rate_name);

            return total_price;
        }

        function conver_number_to_string(number) {
        
        console.log(new Intl.NumberFormat('ja-JP').format(parseInt(number)));
        return new Intl.NumberFormat('ja-JP').format(number);
    }

        $("#date").datetimepicker({format:'d-m-Y H:m:s'});


         $('#add').click(function () {
               
            var table = document.getElementById("Data_table");
            var count = table.rows.length ;
            var one_row = document.getElementById("Data_table").rows[1].cells.item(0).innerHTML;
            if(one_row != 1){
                count = 1;
            }
            var rate = document.getElementById("rate").value;
            var html_code = "<tr id='row"+count+"'>";
            html_code += "<td align='center'  contenteditable='false' >"+count+"</td>"
            html_code += "<td align='left' contenteditable class='item_name'>Name</td>";
            html_code += "<td align='center' contenteditable class='item_qty'>1</td>";
            html_code += "<td align='center' contenteditable class='item_unit'></td>";
            html_code += "<td align='right' contenteditable class='item_price' >0</td>";
            html_code += "<td align='right' contenteditable='false' >0</td>";
            html_code += "<td> <button type='button' name='remove' data-row='"+count+"' class='btn btn-icon btn-pill btn-danger remove'><i class='fa fa-fw fa-trash'></i></button></td>";
                        
            html_code += "</tr>";  
            $('#Data_table').append(html_code);

            $('#row0').remove();
            sumtotal();
                 
           });




           $(document).on('click', '.remove', function(){

                var delete_row = $(this).data("row");
                var table = document.getElementById("Data_table");
                
                var count = table.rows.length;
                $('#row' + delete_row).remove();
                sumtotal();
               
                if(count == 2){
                        var html_code = "<tr id='row0'>";
                        html_code += "<td >  </td>"
                        html_code += "<td ></td>";
                        html_code += "<td ></td>";
                        html_code += "<td> </td>";
                        html_code += "<td ></td>";
                        html_code += "<td> </td>";
                        html_code += "<td> </td>";
                        
                                    
                        html_code += "</tr>";  
                        $('#Data_table').append(html_code);
                }

            });

            $(document).on('blur', '.item_price', function(){  
                sumtotal();
            });

            $(document).on('blur', '.item_qty', function(){  
                sumtotal();
            });

            $( "#rate" ).change(function() {
                sumtotal();
            });




            $('#vendor_table').DataTable({  
                "processing":true,  
                "serverSide":true,  
                "order":[],  
                "ajax":{  
                        url:"<?php echo base_url() . 'vendor_invoice/fetch_invoice_list'; ?>",  
                        type:"POST"  
                },  
                "columnDefs":[  
                        {  
                            "targets":[0,4],  
                            "orderable":false,  
                        }, 
                         
                        {
                            "targets": 3,
                            "className": "text-right",
                        } 
                ],  
                
            });

            $('#Select_vendor_invoice').click(function () {
                $('#add_data_Modal').modal('show');
                //window.location.href = 'Create-invoice-Vendor/4';
                 
           });

           $(document).on('click', '.edit_data', function(){  
                var vendor_invoice_id = $(this).attr("id"); 
                  document.getElementById("show_vendor").innerHTML= 'ລະຫັດໜີ້ : '+vendor_invoice_id;
                  $('#invoice_vendor').val(vendor_invoice_id);   
                  $('#add_data_Modal').modal('hide');  
                
              
            });

        
            $(document).on('click', '#Remove_vendor_invoice', function(){  
               
                document.getElementById("show_vendor").innerHTML= 'ລະຫັດໜີ້ :  ວ່າງ';
                  $('#invoice_vendor').val(0);   
                
              
            });


        



           
           $(document).on('click', '#save', function(){  
                //var vendor_id = this.getAttribute("data-vendor"); 
                var x  = document.getElementById("Data_table").rows[1].cells.item(0).innerHTML;
               
                
               
               if($('#titel').val() == ''){

                swal({
                        title: "ກະລຸນາປ້ອນຂໍ້ມູນ ອີງຕາມ",
                        text:   'ບໍ່ມີຂໍ້ມູນ',
                        icon: "warning",
                    });  

                }
                else if($('#header').val() == ''){

                    swal({
                            title: "ກະລຸນາປ້ອນຂໍ້ມູນ ຫົວຂໍ້",
                            text:   'ບໍ່ມີຂໍ້ມູນ',
                            icon: "warning",
                        });  

                }
                else if($('#text_money').val() == ''){

                    swal({
                            title: "ກະລຸນາປ້ອນຂໍ້ມູນ ຈຳນວນເງີນເປັນໂຕໜັງສື",
                            text:   'ບໍ່ມີຂໍ້ມູນ',
                            icon: "warning",
                        });  

                }
                else if(x != 1 ){

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

                                var titel =  $('#titel').val(); 
                                var header =  $('#header').val(); 
                                var date =  $('#date').val();
                                var text_money =  $('#text_money').val(); 
                                var type_money =  $('#type_money').val(); 
                                var vendor_invoice =  $('#invoice_vendor').val(); 

                                var rate =  $('#rate').val(); 
                                var rate_name = new String($( "#rate option:selected" ).text());
                                var ticket_total = sumtotal();
                                var item_name = [];
                                var item_qty = [];
                                var item_unit = [];
                                var item_price = [];

                              
                              
                                var ticket = 0

                                $('.item_name').each(function(){
                                item_name.push($(this).text());
                                });

                                $('.item_qty').each(function(){
                                item_qty.push($(this).text());
                                });

                                $('.item_unit').each(function(){
                                item_unit.push($(this).text());
                                });


                                $('.item_price').each(function(){
                                item_price.push($(this).text());
                                });



                            $.ajax({  
                                    url:"<?php echo base_url() . 'Finance_out/insert_invoice'; ?>", 
                                    method:"POST",  
                                    data:{
                                            titel:titel,
                                            header:header,
                                            date:date,
                                            text_money:text_money,
                                            type_money:type_money,
                                            rate:rate,
                                            ticket_total:ticket_total,
                                            vendor_invoice:vendor_invoice,
                                            item_name:item_name,
                                            item_qty:item_qty,
                                            item_unit:item_unit,
                                            item_price:item_price,
                                            rate_name:rate_name
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
                                                function(){window.open("<?php echo base_url() . 'Print-invoice-Finance-Out/'; ?>"+data.ticket , '_blank')
                                                        window.location.replace('Finance-Out')
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