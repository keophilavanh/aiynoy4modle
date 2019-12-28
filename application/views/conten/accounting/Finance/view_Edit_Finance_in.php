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
        <h2 class="mb-4">ແກ້ໄຂໃບອະຍຸມັດລາຍຮັບ</h2>

        <div class=" card mb-4">
            <div class="card-body row">
                    <div class="col-sm-4" >   
                        
                        <h5>- ອີງຕາມ : </h5>
                        <textarea class="form-control"  rows="1" name="titel" id="titel"> <?php echo $ticket_data->tital;?></textarea>
                        <h5>- ຫົວຂໍ້ : </h5>
                        <textarea class="form-control"  rows="2" name="header" id="header"> <?php echo $ticket_data->header;?></textarea><br/>
                        
                    </div>
                    <div class="col-sm-4" align="center" >  
                        <br/>
                        <h2> ໃບອະຍຸມັດລາຍຮັບ </h2>
                    </div>
                    <div class="col-sm-2" align="right" > </div>
                    <div class="col-sm-2"  >   
                        <br/>
                        <br/>
                        <h5> ວັນທີ : <?php echo date('d-m-Y', strtotime($ticket_data->Date)); ?> </h5>
                        <h5> ເລກບິນ : <?php echo $ticket_data->Ticket_No; ?> </h5>
                        <!-- <input type="text" class="form-control" name="date" id="date" autocomplete="off" > -->
                       
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
                                <th  width="5%" scope="col"><h4>ລຳດັບ</h4></th>
                                <th  width="45%" scope="col"><h4>ເນື້ອໃນລາຍການ</h4></th>
                                
                                <th  width="15%" scope="col" class="text-center"><h4>ຈຳນວນ</h4></th>
                                <th  width="10%" scope="col" class="text-center"><h4>ຫົວໜ່ວຍ</h4></th>
                                <th  width="15%" scope="col" class="text-right"><h4>ລາຄາຕໍ່ໜ່ວຍ</h4></th>
                                <th  width="15%" scope="col" class="text-right"><h4>ຈຳນວນເງີນ</h4></th>
                                <th  width="10%" scope="col">
                                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >+</button>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $i=0;
                                        foreach($fetch_data as $row)  
                                        {  
                                     
                                        echo "<tr id='row".++$i."'>
                                                    <td align='center'  contenteditable='false' >".$i."</td>
                                                    <td align='left' contenteditable class='item_name'>".$row->Name."</td>
                                                    <td align='center' contenteditable class='item_qty'>".$row->Qty."</td>
                                                    <td align='center' contenteditable class='item_unit'>".$row->Unit."</td>
                                                    <td align='right' contenteditable class='item_price' >".$row->Price."</td>
                                                    <td align='right' contenteditable='false' >".$row->Qty*$row->Price."</td>
                                                    <td> <button type='button' name='remove' data-row='".$i."' class='btn btn-icon btn-pill btn-danger remove'><i class='fa fa-fw fa-trash'></i></button></td>
                                                </tr>
                                        ";

                                      
                                        } 
                                    
                                    ?>
                               
                        
                
                            </tbody>
                           
                            
                            
                            
                                    
                        
                        </table>
                    </div>
                        <div class="col-sm-4"  >
                            <h5>ຈຳນວນເງິນລວມເປັນຕົວຫນັງສື : </h5>
                            <textarea class="form-control"  rows="2" name="text_money" id="text_money"><?php echo $ticket_data->text_money;?> </textarea><br/>
                            <select class="form-control form-control-lg" name="type_money" id="type_money" >
                                <?php 
                                    foreach($money_go as $row)  
                                    {  
                                    echo '<option value="'.$row->money_go_id.'"> '.$row->Name.'</option>';
                                    } 
                                ?> 
                            </select>
                        
                        </div>
                        <div class="col-sm-5"  ></div>

                        <div class="col-sm-3" align="right"  >
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ສະກຸນເງີນຕາ</span>
                                </div>
                                <select class="form-control form-control-lg"  name="rate" id="rate">
                                <?php 
                                    foreach($rate as $row)  
                                    {  
                                    echo '<option value="'.$row->Rate.'"> '.$row->Rate_Name.'</option>';
                                    } 
                                ?> 
                                </select>
                            </div>
                            <div>
                                <h4 id="total_ticket"> ລວມເງີນ : 0 ກີບ  </h4><br/>
                                <h4 id="total_ticket_kip">  </h4><br/>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg "  title="ບັນທືກ" name="save" id="save" >ແກ້ໄຂ</button>
                        </div>
                       
                
            </div>
        </div>
    </div>
</div>


                



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
     
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
            //$('#total_ticket').val(total_price); 

            return total_price;
        }

        function conver_number_to_string(number) {
        
        console.log(new Intl.NumberFormat('ja-JP').format(parseInt(number)));
        return new Intl.NumberFormat('ja-JP').format(number);
    }

      
        $('#type_money').val(<?php echo $ticket_data->type_money; ?>); 
        $( "#rate option:selected" ).text('<?php echo $ticket_data->Rate; ?>');
        sumtotal();
       
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


        



           
           $(document).on('click', '#save', function(){  
                //var vendor_id = this.getAttribute("data-vendor"); 
                var x  = document.getElementById("Data_table").rows[1].cells.item(0).innerHTML;
               
                
                if($('#date').val() == '')
                {

                    swal({
                            title: "ກະລຸນາເລືອກ ວັນທີ ແລະ ເວລາ",
                            text:   'ບໍ່ມີຂໍ້ມູນ',
                            icon: "warning",
                        });  

                }
                else if($('#titel').val() == ''){

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
                        title: "ຢືນຢັງການ ແກ້ໄຂຂໍ້ມູນ",
                        text: "ກະນຸນາຢືນຢັງ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                                var invoid_id = '<?php echo $ticket_data->finance_in_id;?>';
                                var titel =  $('#titel').val(); 
                                var header =  $('#header').val(); 
                                var date =  $('#date').val();
                                var text_money =  $('#text_money').val(); 
                                var type_money =  $('#type_money').val(); 

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
                                    url:"<?php echo base_url() . 'Finance_in/edit_Finance_in'; ?>", 
                                    method:"POST",  
                                    data:{
                                            titel:titel,
                                            header:header,
                                            date:date,
                                            text_money:text_money,
                                            type_money:type_money,
                                            rate:rate,
                                            ticket_total:ticket_total,
                                            item_name:item_name,
                                            item_qty:item_qty,
                                            item_unit:item_unit,
                                            item_price:item_price,
                                            rate_name:rate_name,
                                            invoid_id:invoid_id
                                        },  
                                    dataType:"json",  
                                    success:function(data){  
                                      
                                        console.log("data");
                                        console.log(data);
                                        if(data.status=='ok'){

                                          
                                            
                                            swal(data.msg, {
                                                icon: "success",
                                                });

                                                // window.setTimeout(
                                                // function(){window.open("<?php// echo base_url() . 'Print-invoice-Finance-IN/'; ?>"+data.ticket , '_blank')
                                                //         window.location.replace('../Finance-IN')
                                                //     }, 800);

                                                window.setTimeout(
                                                function(){
                                                        window.location.replace('../Finance-IN')
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