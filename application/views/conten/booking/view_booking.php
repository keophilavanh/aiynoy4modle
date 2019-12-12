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
         $this->load->view('conten/booking/view_menu');
    ?>

    <div class="content p-4">
        <div class="row">
            <h2 class="col-sm-5">ການຈອງຫ້ອງພັກ</h2>
            
            <div class="col-sm-4" ></div>
            <div class="col-sm-3 text-right " >
                <div class="input-group mb-3">
                    <input type="text" id="date" value="<?php echo date("d-m-Y");?>" class="form-control" placeholder="ວັນທີຈອງ" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>
                </div>
                
            </div>

        </div>
        

        <table class="table table-bordered"   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <td width= "15%" >

                        <div id="floor_list" style="position: relative; overflow: hidden; overflow-y: scroll; height: 750px; "  >



                        </div>
                       
                    </td>

                    <td >

                        <div style="position: relative; overflow: hidden; overflow-y: scroll; height: 750px; width: 100%;">
                            <div class="row"  style=" padding-left: 15px;" id="room_list">
                                
                                

                                

                        

                            </div>
                        </div>
                    </td>
                 
                </tr>
                </thead>
                
              
              
            </table>

        <div class="row">
                    
               
                

                
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
                                        <label  >ຊື່ຊັ້ນ</label>
                                        <input type="text" class="form-control" name="floor_name" id="floor_name" >
                                    </div>

                            </div>
                           
                            
                                <br />
                                <input type="hidden" name="floor_id" id="floor_id" />
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
     

                

                $.ajax({
                    url:"<?php echo base_url() . 'Booking/fetch_floor'; ?>", 
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                    $('#floor_list').html(data);
                    }
                })
                
                //$("#date").val('');
                $("#date").datetimepicker({format:'d-m-Y'});
                
               

                $(document).on('click', '.Click_Floor', function(){  
                    var floor_id = $(this).attr("id");  
                    var get_date = $('#date').val();
                    
                    $.ajax({
                        url:"<?php echo base_url() . 'Booking/fetch_room_by_floor'; ?>", 
                        method:"POST",
                        data:{floor_id:floor_id,get_date:get_date},
                        dataType:"text",
                        success:function(data){
                        $('#room_list').html(data);
                        }
                    })
                });


      $('#add').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມຊື່ຊັ້ນ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });

        
     




           $('#linkClose').click(function () {
               $('#myAlert').hide('fade');
           });


            $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            if($('#floor_name').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }
          
           
  
           else  
           {  
           $.ajax({  
               url:"<?php echo base_url() . 'Floor/addfloor'; ?>",  
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
                var floor_id = $(this).attr("id");  
                
                $.ajax({  
                    url:"<?php echo base_url() . 'Floor/getfloor'; ?>", 
                    method:"POST",  
                    data:{floor_id:floor_id},  
                    dataType:"json",  
                    success:function(data){  
                         
                        $('#floor_name').val(data.floor_name);  
                       

                        $('#floor_id').val(data.floor_id);  
                      
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂຂໍ້ມູນພະນັກງານ");
                        $('#status').val('Update');  
                    }  
                });  
            });


           
           $(document).on('click', '.delete_data', function(){  
                var floor_id = $(this).attr("id");  
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
                                    url:"<?php echo base_url() . 'Floor/deletefloor'; ?>", 
                                    method:"POST",  
                                    data:{floor_id:floor_id},  
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