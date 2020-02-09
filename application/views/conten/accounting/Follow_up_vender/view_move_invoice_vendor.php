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
        <h2 class="mb-4">ແຍກໃບບິນຕິດໜີ້</h2>

        <div class=" card mb-4">
            <div class="card-body row">
                    <div class="col-sm-4" >   
                        
                            
                        <p>ແຂວງຈຳປາສັກ <br/> ບໍລິສັດ ຈະເລີນເຊກອງກຣຸບ ຈຳກັດຜູ້ດຽວ <br/> ໂທ : (+856-31)259 999 <br/>  ແຟັກ : (+856-31)259 111 </p>
                    </div>
                    <div class="col-sm-4" align="center" >  
                        <br/>
                        <h2> ໃບບິນຕິດໜີ້ </h2>
                    </div>
                    <div class="col-sm-4" align="right" >   
                   
                    
                        <p>ລະຫັດເຈົ້າໜີ້ : <?php echo $vender_data->vendor_id;?> <br/>
                         ຊື່ເຈົ້າໜີ້ : <?php echo $vender_data->vendor_name;?> <br/>
                         ທີ່ຢູ່ເຈົ້າໜີ້ : <?php echo $vender_data->vendor_address;?> <br/>
                         ເງື່ອນໄຂການຈ່າຍ :<?php echo $vender_data->vendor_credit;?> <br/> 
                         ເບີໂທຕິດຕໍ່ : <?php echo $vender_data->vendor_phone;?> </p>
                    </div>
                    <div class="col-sm-12"  >
                        <table class="table table-bordered" id="Data_table"  cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th  width="5%" scope="col"><h4>ລຳດັບ</h4></th>
                                <th  width="45%" scope="col"><h4>ລາຍການ</h4></th>
                                <th  width="10%" scope="col" class="text-center"><h4>ອ.ລ.ປ</h4></th>
                                <th  width="15%" scope="col" class="text-right"><h4>ຈຳນວນເງີນ</h4></th>
                                <th  width="15%" scope="col" class="text-right"><h4>ຈຳນວນເງີນກີບ</h4></th>
                                <th  width="10%" scope="col">
                                    <h4>ເລືອກ</h4>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                                    <?php
                                        $i=0;
                                        foreach($fetch_data as $row)  
                                        {  
                                     
                                       

                                        echo '   <tr>  
                                                    <td  align="center">'.++$i.'</td> 
                                                    <td  align="Left"  >'.$row->Name.'</td> 
                                                    <td  align="center">'.$row->rate.'</td>  
                                                    <td  align="right">'.$row->Price.' </td>  
                                                    <td  align="right">'.$row->rate*$row->Price.' </td>
                                                    <td  align="center"><input type="checkbox" class="form-check-input" Name="Check" id="exampleCheck'.++$i.'" value="'.$row->id.'"> </td>  
                                            
                                                </tr>';

                                      
                                        } 
                                    
                                    ?>

                               
                        
                
                            </tbody>
                           
                            
                            
                            
                                    
                        
                        </table>
                    </div>
                        <div class="col-sm-9"  >
                        
                        </div>
                        <div class="col-sm-3" align="right"  >
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ສະກຸນເງີນຕາ</span>
                                </div>
                                <select class="form-control form-control-lg"  name="rate" id="rate">
                                <?php 
                                    foreach($rate as $row)  
                                    {  
                                        if($row->Rate_Name == $vender_data->rate_name){
                                            echo '<option value="'.$row->Rate.'" selected >'.$row->Rate_Name.'</option>';
                                        }
                                    } 
                                ?> 
                                </select>
                            </div>
                            <div>
                                <h4 id="total_ticket"> ລວມເງີນກີບ : 0 ກີບ  </h4><br/>
                                <h4 id="total_ticket_kip">  </h4><br/>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg " data-vendor="<?php echo $vender_data->invoice_id;?>" title="ບັນທືກ" name="save" id="save" >ບັນທືກ</button>
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
                        document.getElementById("Data_table").rows[i].cells.item(2).innerHTML= rate;
                        document.getElementById("Data_table").rows[i].cells.item(4).innerHTML= rate * document.getElementById("Data_table").rows[i].cells.item(3).innerHTML;
                        if(parseInt(document.getElementById("Data_table").rows[i].cells.item(3).innerHTML, 10)){
                        total_price += parseInt(document.getElementById("Data_table").rows[i].cells.item(3).innerHTML, 10);
                        total_price_kip += parseInt(document.getElementById("Data_table").rows[i].cells.item(4).innerHTML, 10);
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

            document.getElementById("total_ticket").innerHTML= 'ລວມເງີນ'+rate_name+' : '+conver_number_to_string(total_price)+' '+rate_name;
            document.getElementById("total_ticket_kip").innerHTML= 'ລວມເງີນກີບ : '+conver_number_to_string(total_price_kip)+' ກີບ';
            //$('#total_ticket').val(total_price); 

            return total_price;
        }

        sumtotal();

        function conver_number_to_string(number) {
        
        console.log(new Intl.NumberFormat('ja-JP').format(parseInt(number)));
        return new Intl.NumberFormat('ja-JP').format(number);
    }


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
            html_code += "<td align='left' contenteditable class='item_name'>1</td>";
            html_code += "<td align='center' contenteditable='false' class='item_rate'>"+rate+"</td>";
            html_code += "<td align='right' contenteditable class='item_price'>0</td>";
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
                                    
                        html_code += "</tr>";  
                        $('#Data_table').append(html_code);
                }

            });

            $(document).on('blur', '.item_price', function(){  
                sumtotal();
            });

            $( "#rate" ).change(function() {
                sumtotal();
            });


        



           
           $(document).on('click', '#save', function(){  
                var invoice_id = this.getAttribute("data-vendor"); 
                var x  = document.getElementById("Data_table").rows[1].cells.item(0).innerHTML; 
                var checkboxes = document.getElementsByName("Check");
                var checked_total = 0;
                var unchecked_total = 0;
                var move_id = [];
                var total_price_check = parseInt(0, 10);
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        console.log('checked');
                        console.log(checkboxes[i].value);
                        checked_total++;
                        move_id.push(checkboxes[i].value);
                        total_price_check += parseInt(document.getElementById("Data_table").rows[i+1].cells.item(3).innerHTML, 10);
                    }else{
                        unchecked_total++;
                    }
                }
                console.log("move_id");
                console.log(move_id);
                console.log("total_price_check");
                console.log(total_price_check);
            
                
               //return;

                if(checked_total == 0 || unchecked_total == 0 ){

                    swal({
                            title: "ທ່ານຕ້ອງເລືອກລາຍການ ແລະ ຕ້ອງມີລາຍການຄົງຄາງ",
                            text:   '! ແຈ້ງເຕືອນ',
                            icon: "warning",
                        });  

                }
                else{

                    swal({
                        title: "ຢືນຢັງການແຍກໃບບິນ",
                        text: "ກະນຸນາຢືນຢັງ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                               



                            $.ajax({  
                                    url:"<?php echo base_url() . 'vendor_invoice/move_invoice'; ?>", 
                                    method:"POST",  
                                    data:{move_id:move_id,total_price_check:total_price_check,invoice_id:invoice_id},  
                                    dataType:"json",  
                                    success:function(data){  
                                      
                                        console.log("data");
                                        console.log(data);
                                        if(data.status=='ok'){

                                          
                                            
                                            swal(data.msg, {
                                                icon: "success",
                                                });

                                                window.setTimeout(
                                                function(){window.open("<?php echo base_url() . 'Print-invoice-Vendor/'; ?>"+data.ticket , '_blank')
                                                        window.location.replace('../Vendor-invoice')
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