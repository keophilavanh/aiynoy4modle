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
        <h2 class="mb-4">ບັນຊີທະນາຄານ</h2>

        <div class="card mb-4">
            <div class="card-body">
                    <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ເພີ້ມຂໍ້ມູນບັນຊີທະນາຄານ</button>
                    
                    <h1> </h1>
                    </div>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ເລກບັນຊີ</th>
                    <th scope="col">ຊື່ບັນຊີ</th>
                    <th scope="col">ຊື່ທະນາຄານ</th>
                    <th scope="col">ຈຳນວນ</th>
                    <th scope="col">ສະກຸນເງີນ</th>
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
                                            <label >ເລກບັນຊີ</label>
                                            <input type="text" class="form-control"   name="Number_account" id="Number_account" />
                                           
            
                                    </div>
                                   
                                    <div class="col-sm-12">
                                            <label >ຊື່ບັນຊີ</label>
                                            <textarea class="form-control"  rows="3" name="Name_account" id="Name_account"></textarea>
            
                                    </div>
                                    <br/>
                                    <div class="col-sm-6">
                                            <label >ຊື່ທະນາຄານ</label>
                                            <select class="form-control form-control-lg" name="bank_id" id="bank_id" >
                                                <?php 
                                                    foreach($bank as $row)  
                                                    {  
                                                    echo '<option value="'.$row->bank_id.'"> '.$row->bank_Name.'</option>';
                                                    } 
                                                ?> 
                                            </select>
            
                                    </div>

                                    <div class="col-sm-3">
                                            <label >ສະກຸນເງີນ</label>
                                            <select class="form-control form-control-lg" name="Rate" id="Rate" >
                                                <option value="ກີບ"> ກີບ </option>
                                                <option value="ບາດ"> ບາດ </option>
                                                <option value="ໂດລາ"> ໂດລາ </option>
                                               
                                            </select>
            
                                    </div>
                            </div>
                            
                            
                                <br />
                                <input type="hidden" name="bank_account_id" id="bank_account_id" />
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
      var dataTable = $('#test_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'bank_account/fetch_data'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[3,6],  
                     "orderable":false,  
                },
                {
                    "targets": 3,
                    "className": "text-right",
                }   
           ],  
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






           $(document).on('click', '.edit_data', function(){  
                var bank_account_id = $(this).attr("id");  
                
                $.ajax({  
                    url:"<?php echo base_url() . 'bank_account/getitem'; ?>", 
                    method:"POST",  
                    data:{bank_account_id:bank_account_id},  
                    dataType:"json",  
                    success:function(data){  

                        console.log("data");
                        console.log(data);
                         
                       
                        $('#Name_account').val(data.Name_account); 
                        $('#Number_account').val(data.Number_account); 
                      
                        $('#Rate').val(data.Rate); 
                        $('#bank_id').val(data.bank_id); 
                        $('#bank_account_id').val(data.bank_account_id);  
                    
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂບັນຊີທະນາຄານ");
                        $('#status').val('Update');  
                    }  
                });  
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