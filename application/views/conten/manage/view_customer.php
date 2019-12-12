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
         $this->load->view('conten/manage/view_menu');
    ?>

    <div class="content p-4">
        <h2 class="mb-4">ຈັດການຂໍ້ມູນລູກຄ້າ</h2>

        <div class="card mb-4">
            <div class="card-body">
                    <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ເພີ້ມຂໍ້ມູນລູກຄ້າ</button>
                    
                    <h1> </h1>
                    </div>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ລະຫັດ</th>
                    <th scope="col">ຊື່ລູກຄ້າ</th>
                    <th scope="col">ສັນຊາດ</th>
                    <th scope="col">ເບີໂທ</th>
                    <th scope="col">ທີຢູ່</th>
                    <th scope="col">ບັນປະຈຳຕົວ</th>
                    <th scope="col">ພາດສະປອດ</th>
                   
                   
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
                                    
                                    <div class="col-sm-5">
                                        <label  >ຊື່ລູກຄ້າ</label>
                                        <input type="text" class="form-control" name="customer_name" id="customer_name" >
                                    </div>

                                    <div class="col-sm-5">
                                        <label  >ສັນຊາດ</label>
                                        <input type="text" class="form-control"  name="from" id="from">

                                        
                                    </div>

                            </div>
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ເບີໂທ</label>
                                        <input type="text" class="form-control" name="phone" id="phone" >
                                    </div>

                                  

                            </div>

                            <div class="form-group row">
                                    
                                    
                                    <div class="col-sm-12">
                                        <label  >ທີຢູ່</label>
                                        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                      

                                       
                                    </div>

                            </div>
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ບັນປະຈຳຕົວ</label>
                                        <input type="text" class="form-control" name="card" id="card" >
                                    </div>

                                    <div class="col-sm-5">
                                        <label  >ພາດສະປອດ</label>
                                        <input type="text" class="form-control"  name="passpor" id="passpor">

                                        
                                    </div>

                            </div>

                            
                           
                            
                                <br />
                                <input type="hidden" name="customer_id" id="customer_id" />
                                <input type="hidden" name="status" id="status" />
                                <input type="submit" name="insert" id="insert" value="ເພີ້ມລາຍການ" class="btn btn-success" />
                                

                                <h5> </h5>
                                        <div id="myAlert" class="alert alert-danger collapse">
                                                <button type="button" class="close" id="linkClose">&times;</button>
                                                <strong>ຜິດພາດ! :</strong> ກະລູນາປ້ອນຂໍ້ມູນ ຊື່ລູກຄ້າ,ສັນຊາດ ແລະ ເບີໂທ ໃຫ້ຄົບ ຂໍຂອບໃຈ.
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
      var dataTable = $('#test_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Customer/fetch_data'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[5],  
                     "orderable":false,  
                },  
                {  
                     "targets":[4],  
                     "className": "text-right",
                }
           ],  
      });  


       


      $('#add').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມຂໍ້ມູນລູກຄ້າ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });

        
     




           $('#linkClose').click(function () {
               $('#myAlert').hide('fade');
           });


            $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            if($('#customer_name').val() == '')  
           {  
               $('#myAlert').show('fade');  

           }else if($('#from').val() == '')  
           {  
               $('#myAlert').show('fade');  

           }else if($('#phone').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }
          
           
  
           else  
           {  
           $.ajax({  
               url:"<?php echo base_url() . 'Customer/add_item'; ?>",  
               method:"POST",  
               data:$('#insert_form').serialize(),  
               beforeSend:function(){  
               $('#insert').val("ເພີ້ມລາຍການ");  
               },  
               success:function(data){  
               $('#insert_form')[0].reset();  
               $('#add_data_Modal').modal('hide');  
               dataTable.ajax.reload();
               
               }  
            }); 
               
           }  
           });






           $(document).on('click', '.edit_data', function(){  
                var customer_id = $(this).attr("id");  
                
                $.ajax({  
                    url:"<?php echo base_url() . 'Customer/get_item'; ?>", 
                    method:"POST",  
                    data:{customer_id:customer_id},  
                    dataType:"json",  
                    success:function(data){  
                         
                        $('#customer_name').val(data.customer_name);  
                        $('#from').val(data.from);
                        $('#phone').val(data.phone);
                        $('#address').val(data.address);
                        $('#card').val(data.card);
                        $('#passpor').val(data.passpor);

                        $('#customer_id').val(data.customer_id);  
                      
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂຂໍ້ມູນລູກຄ້າ");
                        $('#status').val('Update');  
                    }  
                });  
            });


           
           $(document).on('click', '.delete_data', function(){  
                var customer_id = $(this).attr("id");  
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
                                    url:"<?php echo base_url() . 'Customer/delete_item'; ?>", 
                                    method:"POST",  
                                    data:{customer_id:customer_id},  
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