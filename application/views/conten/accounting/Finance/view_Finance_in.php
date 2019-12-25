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
        <h2 class="mb-4">ໃບອະຍຸມັດລາາຍຮັບ</h2>

        <div class="card mb-4">
            <div class="card-body">
                    <div align="right">   
                    <button type="button" class="btn btn-success btn-lg" title="ເພີ້ມ" name="add" id="add" >ສ້າງໃໝ່</button>
                    
                    <h1> </h1>
                    </div>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ເລກທີ</th>
                    <!-- <th scope="col">ຊື່ເຈົ້າໜີ້</th>
                    <th scope="col">ສະກຸນເງີນ</th> -->
                   
                    <th scope="col">ວັນທີ</th>
                    <th scope="col">ສະຖານະ</th>
                    <!-- <th scope="col">ໜີ້ຍັງຄັ້ງ</th> -->
                    <th scope="col">ຊື່ຜູ້ໃຊ້</th>
                    <th scope="col">ລວມເງີນທັງໝົດ</th>
                    
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


              



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#test_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Finance_in/fetch_invoice'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,5],  
                     "orderable":false,  
                },  
                {
                    "targets": 4,
                    "className": "text-right",
                }
           ],
           "scrollX": true  
      });  


     


            $('#add').click(function () {
               
                window.location.href = 'Create-Finance-IN';
                 
           });

        
          




        
       








           
           $(document).on('click', '.edit_data', function(){  
                var finance_in_id = $(this).attr("id");  
              
                 swal({
                        title: "ຍົກເລີກຂໍ້ມູນ",
                        text: "ເຈົ້າຕ້ອງການຍົກເລີກຂໍ້ມູນ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({  
                                    url:"<?php echo base_url() . 'Finance_in/Edit_invoice'; ?>", 
                                    method:"POST",  
                                    data:{finance_in_id:finance_in_id},  
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