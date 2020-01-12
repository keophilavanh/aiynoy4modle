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
        <h2 class="mb-4" id="titel">ລາຍການບັນຊີທະນາຄານ</h2>

        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                    <h5 id="header"> </h5>        
            </div>
            <div class="card-body">
                   
                   <br/>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ລຳດັບ</th>
                    <th scope="col">ຊື່ບັນຊີ</th>   
                    <th scope="col"  class="text-right">ຈຳນວນ</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                
                <tbody>
                <?php 
                    $i=1;
                    foreach($bank_sub_account as $row)  
                        {  
                        echo '  <tr>
                                    <td >'.$i++.'</td>
                                    <td >'.$row->sub_name.'</td>
                                    <td  class="text-right" >'.number_format($row->total,0).'</td>

                                    <td ><a href="'.base_url().'Follow-Account/'.$row->bank_sub_account_id.'"  class="btn btn-pill btn-primary " ><i class="fas fa-pencil-alt"></i> ເຄືີ່ອງໄຫວການເງີນ</a> </td> 
                                </tr>  
                               ';
                                        
                        } 
                ?> 
                    
                
                </tbody>
              
            </table>
            </div>
        </div>
        

        
    </div>
</div>


                



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  

                var bank_account_id = "<?php echo $bank_account?>";  
                
                $.ajax({  
                    url:"<?php echo base_url() . 'bank_account/getitem'; ?>", 
                    method:"POST",  
                    data:{bank_account_id:bank_account_id},  
                    dataType:"json",  
                    success:function(data){  

                        
                        document.getElementById("titel").innerHTML = 'ຊື່ບັນຊີ : '+data.Name_account;
                        document.getElementById("header").innerHTML = 'ສະກຸນເງີນ : '+data.Rate;
                      
                      
                        
                    
                       
                       
                    }  
                }); 
     


      $('#add').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມທະນາຄານ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });

        
          




           $('#linkClose').click(function () {
               $('#myAlert').hide('fade');
           });


            $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
        
           if($('#Name_account').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }else if($('#Number_account').val() == '')
           {
                $('#myAlert').show('fade'); 
           }
          

           else  
           {  
              
           $.ajax({  
               url:"<?php echo base_url() . 'bank_account/additem'; ?>",  
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

               dataTable.ajax.reload();
               
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