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
        <h2 class="mb-4">ບ້ວງບັນຊີ</h2>

        <div class="card mb-4">
            <div class="card-body">
                    <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ເພີ້ມຂໍ້ມູນບ້ວງບັນຊີ</button>
                    
                    <h1> </h1>
                    </div>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    
                    <th scope="col">ຊື່ບ້ວງບັນຊີ</th>
                    <th scope="col">ຈຳນວນເງີນ</th>
                    <th scope="col">ສະຖານນະ</th>
                   
                    
                    <th scope="col">Action</th>
                </tr>
                </thead>
                
                <tbody>
                    
                
                </tbody>
              
            </table>
            </div>
        </div>
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
                                            <label >ຊື່ບ້ວງບັນຊີ</label>
                                            <textarea class="form-control"  rows="2" name="sub_name" id="sub_name"></textarea>
            
                                    </div>
                                   
                                    <div class="col-sm-12">
                                            <label >ຈຳນວນເງີນ</label>
                                            <input type="text" class="form-control"   name="total" id="total" />
                                           
            
                                    </div>
                                    
                            </div>
                            
                            
                                <br />
                                <input type="hidden" class="form-control"   name="bank_account_id" id="bank_account_id" value="<?php echo $bank_account ;?>" />
                                <input type="hidden" name="bank_sub_account_id" id="bank_sub_account_id" />
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



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
     var bank_account_id = '<?php echo $bank_account ;?>';
      var dataTable = $('#test_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
          
           "ajax":{  
                url:"<?php echo base_url() . 'bank_sub_account/fetch_data'; ?>",  
                type:"POST" ,
                data:{bank_account_id:bank_account_id},   
           },  
           "columnDefs":[  
                {  
                     "targets":[3],  
                     "orderable":false,  
                }, {
                    "targets": 1,
                    "className": "text-right",
                }  
           ],  
      });  


      $('#add').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມບ້ວງບັນຊີ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });

        
          




           $('#linkClose').click(function () {
               $('#myAlert').hide('fade');
           });


            $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
        
           if($('#sub_name').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }else if($('#total').val() == '')
           {
                $('#myAlert').show('fade'); 
           }
          

           else  
           {  
              
           $.ajax({  
               url:"<?php echo base_url() . 'bank_sub_account/additem'; ?>",  
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






           $(document).on('click', '.edit_data', function(){  
                var bank_sub_account_id = $(this).attr("id");  
                
                $.ajax({  
                    url:"<?php echo base_url() . 'bank_sub_account/getitem'; ?>", 
                    method:"POST",  
                    data:{bank_sub_account_id:bank_sub_account_id},  
                    dataType:"json",  
                    success:function(data){  

                        console.log("data");
                        console.log(data);
                         
                       
                        $('#sub_name').val(data.sub_name); 
                        $('#total').val(data.total); 
                      

                       
                        $('#bank_sub_account_id').val(data.bank_sub_account_id);  
                    
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂບ້ວງບັນຊີ");
                        $('#status').val('Update');  
                    }  
                });  
            });


           
           $(document).on('click', '.delete_data', function(){  
                var bank_sub_account_id = $(this).attr("id");  
                var status ='Delete';
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
                                    url:"<?php echo base_url() . 'bank_sub_account/delete'; ?>", 
                                    method:"POST",  
                                    data:{bank_sub_account_id:bank_sub_account_id},  
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