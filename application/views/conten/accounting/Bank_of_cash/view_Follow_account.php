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
        <h2 class="mb-4" id="titel">ບັນຊີຕິດຕາມການຮັບ - ຈ່າຍເງິນ</h2>

        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                    <h5 id="header"> </h5>        
            </div>
            <div class="card-body">
                   
                  
                   <div align="right">   
                    <button type="button" class="btn btn-success" title="ຮັບເງີນ" name="income" id="income" >ຮັບເງີນເຂົ້າບັນຊີ</button>
                    <button type="button" class="btn btn-danger" title="ເພີ້ມ" name="payment" id="payment" >ຈ່າຍເງີນອອກບັນຊີ</button>
                    
                    <h1> </h1>
                    </div>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ລຳດັບ</th>
                    <th scope="col">ວັນເດືອນປີ</th>   
                    <th scope="col">ເນື້ອໃນລາຍການ</th> 
                    <th scope="col"  class="text-right">ຍອດຍົກມາ</th>
                    <th scope="col"  class="text-right">ຮັບເງີນ</th>
                    <th scope="col"  class="text-right">ຈ່າຍເງີນ</th>
                    <th scope="col"  class="text-right">ຍັງຄ້າງ</th>
                   
                </tr>
                </thead>
                
                <tbody>
                <?php 
                    $i=1;
                    foreach($bank_sub_account as $row)  
                        {  
                        echo '  <tr>
                                    <td >'.$i++.'</td>
                                    <td >'.date("d-m-Y", strtotime($row->Date)).'</td>
                                    <td >'.$row->description.'</td>
                                    <td  class="text-right" >'.number_format($row->Lift_balances,0).'</td>
                                    <td  class="text-right" >'.number_format($row->income,0).'</td>
                                    <td  class="text-right" >'.number_format($row->payment,0).'</td>
                                    <td  class="text-right" >'.number_format($row->Still_have,0).'</td>
                                   
                                </tr>  
                               ';
                                        
                        } 
                ?> 
                    
                
                </tbody>
              
            </table>
            </div>
        </div>


                <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ເພີ້ມລາຍການ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" id="insert_form" autocomplete="off">
                               
                           
                            
                            <div class="form-group row">

                                 
                                    
                                   
                                    <div class="col-sm-12">
                                            <label >ເນື້ອໃນລາຍການ</label>
                                            <textarea class="form-control"  rows="3" name="description" id="description"></textarea>
            
                                    </div>
                                    <div class="col-sm-12">
                                            <label >ຈຳນວນເງີນ</label>
                                            <input type="text" class="form-control" name="monney" id="monney" />
                                            
            
                                    </div>
                            </div>
                            
                            
                                <br />
                                <input type="hidden" name="Lift_balances" id="Lift_balances" />
                                <input type="hidden" name="bank_sub_account_id" id="bank_sub_account_id" value="<?php echo $bank_sub_account_id?>" />
                                <input type="hidden" name="status" id="status" />
                                <input type="submit" name="insert" id="insert" value="ເພີ້ມລາຍການ" class="btn btn-success" />
                                

                                <h5> </h5>
                                        <div id="myAlert" class="alert alert-danger collapse">
                                                <button type="button" class="close" id="linkClose">&times;</button>
                                                <strong>ຜິດພາດ! :</strong> ກະລູນາປ້ອນຂໍ້ມູນໃຫ້ຄົບ ຂໍຂອບໃຈ.
                                        </div>

                            </form>
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

                var bank_sub_account_id = "<?php echo $bank_sub_account_id?>";  
                
                $.ajax({  
                    url:"<?php echo base_url() . 'bank_sub_account/getitem'; ?>", 
                    method:"POST",  
                    data:{bank_sub_account_id:bank_sub_account_id},  
                    dataType:"json",  
                    success:function(data){  

                        
                      
                        document.getElementById("header").innerHTML = 'ບ້ວງບບັນຊີ : '+data.sub_name;
                        $('#Lift_balances').val(data.total);
                      
                        
                    
                       
                       
                    }  
                }); 
     


        $('#income').click(function () {
               
            document.getElementById("insert_h").innerHTML = 'ຮັບເງີນເຂົ້າບັນຊີ';

               $('#add_data_Modal').modal('show');
             
               $('#insert').val("ເພີ້ມທະນາຄານ");
               $('#insert_form')[0].reset();
               $('#status').val('income');
                 
        });


        $('#payment').click(function () {
               
               document.getElementById("insert_h").innerHTML = 'ຈ່າຍເງີນອອກບັນຊີ';
   
                  $('#add_data_Modal').modal('show');
                
                  $('#insert').val("ເພີ້ມທະນາຄານ");
                  $('#insert_form')[0].reset();
                  $('#status').val('payment');
                    
        });

        
          




           $('#linkClose').click(function () {
               $('#myAlert').hide('fade');
           });

           


            $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
        
           if($('#description').val() == '')  
           {  
               
               $('#myAlert').show('fade');  
              
           }else if($('#monney').val() == '')
           {
            
                $('#myAlert').show('fade'); 
               
           }
          

           else  
           {  
                console.log("monney");
                console.log($('#monney').val());
              
           $.ajax({  
               url:"<?php echo base_url() . 'Follow_account/additem'; ?>",  
               method:"POST",  
               data:$('#insert_form').serialize(), 
               dataType:"json",   
               beforeSend:function(){  
               $('#insert').val("ເພີ້ມລາຍການ");  
               },  
               success:function(data){ 

               $('#insert_form')[0].reset();  
               $('#add_data_Modal').modal('hide');  
               console.log("data");
                console.log(data);

               if(data.status=='ok'){

                                          
                                                                
                    $.toast({
                        heading: 'ແຈ້ງເຕືອນ!',
                        text: data.msg,
                        textFont: 'Saysettha OT',
                        bgColor: '#009900',
                        position: 'top-right',
                        icon: 'success',
                        loader: false,   
                        loaderBg: '#ff6666',
                        textColor: 'white'
                    })

                    $('#insert_form')[0].reset();  
                    location.reload();
                   
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






         

           
           $(document).on('click', '.delete_data', function(){  
               
                var bank_account_id = this.getAttribute("data-code");
                var data_count = this.getAttribute("data-count"); 
                var status ='Delete';

                if(data_count > 0){
                    swal({
                        title: "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້",
                        text: "ມີບ້ວງບັນຊີຂ້າງໃນ",
                        icon: "error",
                       
                    });

                    return false;
                }

                 swal({
                        title: "ລົບຂໍ້ມູນ",
                        text: "ເຈົ້າຕ້ອງການລົບຂໍ້ມູນ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({  
                                    url:"<?php echo base_url() . 'bank_account/delete'; ?>", 
                                    method:"POST",  
                                    data:{bank_account_id:bank_account_id},  
                                    dataType:"json",  
                                    success:function(data){  
                                        dataTable.ajax.reload();
                                        console.log("data");
                                        console.log(data);
                                        if(data.status=='ok'){

                                          
                                            
                                                $.toast({
                                                    heading: 'ແຈ້ງເຕືອນ!',
                                                    text: data.msg,
                                                    textFont: 'Saysettha OT',
                                                    bgColor: '#009900',
                                                    position: 'top-right',
                                                    icon: 'success',
                                                    loader: false,   
                                                    loaderBg: '#ff6666',
                                                    textColor: 'white'
                                                })

                                            $('#insert_form')[0].reset();  
                                            
                                            dataTable.ajax.reload();
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
                
                  
            }); 
 });  
 </script>  