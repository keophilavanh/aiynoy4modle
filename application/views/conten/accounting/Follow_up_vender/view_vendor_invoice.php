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
        <h2 class="mb-4">ໃບບິນຕິດໜີ້</h2>

        <div class="card mb-4">
            <div class="card-body">
                    <div align="right">   
                    <button type="button" class="btn btn-success btn-lg" title="ເພີ້ມ" name="add" id="add" >ສ້າງໃບບິນຕິດໜີ້</button>
                    
                    <h1> </h1>
                    </div>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ລະຫັດ</th>
                    <th scope="col">ຊື່ເຈົ້າໜີ້</th>
                    <th scope="col">ສະກຸນເງີນ</th>
                   
                    <th scope="col">ວັນທີ</th>
                    <th scope="col">ສະຖານະ</th>
                    <th scope="col">ໜີ້ຍັງຄັ້ງ</th>
                    <th scope="col">ລວມເງີນທັງໝົດ</th>
                    <th scope="col">ຊື້ຜູ້ໃຊ້</th>
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
                            <th scope="col">ເງື່ອນໄຂການຈ່າຍ</th>
                            <th scope="col">ເບີໂທ</th>
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
      var dataTable = $('#test_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'vendor_invoice/fetch_invoice'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,8],  
                     "orderable":false,  
                },  
           ],
           "scrollX": true  
      });  


      $('#vendor_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'vendor/fetch_vendor_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,4],  
                     "orderable":false,  
                },  
           ],  
           
      });  


            $('#add').click(function () {
                $('#add_data_Modal').modal('show');
                //window.location.href = 'Create-invoice-Vendor/4';
                 
           });

        
          




           $('#linkClose').click(function () {
               $('#myAlert').hide('fade');
           });


            $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            if($('#Vendorname').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }
           else if($('#credit').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }  
           else if($('#phone').val() == '')  
           {  
               $('#myAlert').show('fade');  
           } 
           else if($('#Address').val() == '')  
           {  
               $('#myAlert').show('fade');  
           } 
          
           
  
           else  
           {  
           $.ajax({  
               url:"<?php echo base_url() . 'vendor/addVendor'; ?>",  
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
                var vendor_id = $(this).attr("id");  
                console.log(vendor_id);
                $.ajax({  
                    url:"<?php echo base_url() . 'vendor/getVendor'; ?>", 
                    method:"POST",  
                    data:{vendor_id:vendor_id},  
                    dataType:"json",  
                    success:function(data){  

                        console.log("data");
                        console.log(data);
                         
                        $('#Vendorname').val(data.vendor_name);  
                        $('#credit').val(data.vendor_credit); 
                        $('#phone').val(data.vendor_phone); 
                        $('#Address').val(data.vendor_address); 
                      

                        $('#vendor_id').val(data.vendor_id);  
                    
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂຂໍ້ມູນເຈົ້າໜີ້");
                        $('#status').val('Update');  
                    }  
                });  
            });


           
           $(document).on('click', '.delete_data', function(){  
                var vendor_id = $(this).attr("id");  
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
                                    url:"<?php echo base_url() . 'vendor/deletVendor'; ?>", 
                                    method:"POST",  
                                    data:{vendor_id:vendor_id},  
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