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
        <h2 class="mb-4">ຈັດການຂໍ້ມູນຫ້ອງ</h2>

        <div class="card mb-4">
            <div class="card-body">
                    <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ເພີ້ມຂໍ້ມູນຫ້ອງ</button>
                    
                    <h1> </h1>
                    </div>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ລະຫັດ</th>
                    <th scope="col">ຫ້ອງ</th>
                    <th scope="col">ປະເພດຫ້ອງ</th>
                    <th scope="col">ຊັ້ນ</th>
                    <th scope="col">ລາຄາ</th>
                   
                   
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
                                        <label  >ຊື່ຫ້ອງ</label>
                                        <input type="text" class="form-control" name="room_name" id="room_name" >
                                    </div>

                                    <div class="col-sm-5">
                                        <label  >ປະເພດຫ້ອງ</label>
                                        <select class="form-control"  name="room_type_id" id="room_type_id">

                                        </select>
                                    </div>

                            </div>

                            <div class="form-group row">
                                    
                                    

                                    <div class="col-sm-5">
                                        <label  >ຊັ້້ນ</label>
                                        <select class="form-control"  name="floor_id" id="floor_id">

                                        </select>
                                    </div>

                            </div>
                           
                            
                                <br />
                                <input type="hidden" name="room_id" id="room_id" />
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
                url:"<?php echo base_url() . 'room/fetch_data'; ?>",  
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


            $.ajax({
                    url:"<?php echo base_url() . 'room/fetch_floor'; ?>", 
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                    $('#floor_id').html(data);
                    }
                })
            
            $.ajax({
                    url:"<?php echo base_url() . 'room/fetch_room_type'; ?>", 
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                    $('#room_type_id').html(data);
                    }
                })


      $('#add').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມຂໍ້ມູນຫ້ອງ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });

        
     




           $('#linkClose').click(function () {
               $('#myAlert').hide('fade');
           });


            $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            if($('#room_name').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }
          
           
  
           else  
           {  
           $.ajax({  
               url:"<?php echo base_url() . 'room/add_item'; ?>",  
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
                var room_id = $(this).attr("id");  
                
                $.ajax({  
                    url:"<?php echo base_url() . 'room/get_item'; ?>", 
                    method:"POST",  
                    data:{room_id:room_id},  
                    dataType:"json",  
                    success:function(data){  
                         
                        $('#room_name').val(data.room_name);  
                        $('#room_type_id').val(data.room_type_id);
                        $('#floor_id').val(data.floor_id);
                        $('#room_id').val(data.room_id);  
                      
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂຂໍ້ມູນຫ້ອງ");
                        $('#status').val('Update');  
                    }  
                });  
            });


           
           $(document).on('click', '.delete_data', function(){  
                var room_id = $(this).attr("id");  
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
                                    url:"<?php echo base_url() . 'room/delete_item'; ?>", 
                                    method:"POST",  
                                    data:{room_id:room_id},  
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