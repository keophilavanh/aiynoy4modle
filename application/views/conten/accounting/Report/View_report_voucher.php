
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
        $this->load->view('src');
    ?>
  
    
</head>
<body class="bg-light" style="font-family: 'Phetsarath OT'">

<?php
        $this->load->view('view_header');
    ?>

<div class="d-flex">

    <?php
         $this->load->view('conten/accounting/view_menu');
    ?>

        <div class="content p-4">
              
            <div class="card mb-4">
                
                <div class="card-body">
                <br/>
                <center>
                <h1>ລາຍງານບັດຜ່ານບັນຊີ </h1>
                </center>
                <br/>
                <br/>
                <form name="myForm" id="myForm" action="Print-Report-Voucher" target="_blank" method="post" autocomplete="off"  >
                    <div class="container">
                        <center>
                            <table>
                                <tr>
                                    <td>
                                        <h4>ໂຄງການ :</h4>
                                        <select class="form-control form-control-lg selected2  "  name="project" id="project"> 
                                                   
                                                    <?php   foreach($project as $row)  
                                                        {  
                                                        echo '<option value="'.$row->pro_id.'"> '.$row->Name.'</option>';
                                                        } 
                                                    ?>
                                        </select>
                                    </td>
                                    <td>
                                        <h4>ປະເພດການຈ່າຍ :</h4>
                                        <select class="form-control form-control-lg selected2 "  name="payment_type" id="payment_type"> 
                                                    <option value="0"> ບໍ່ໍ່ເລືອກຂໍ້ມູນ </option>
                                                    <?php   
                                                        foreach($Payment_Type as $row)  
                                                        {  
                                                        echo '<option value="'.$row->pay_id.'"> '.$row->Name.'</option>';
                                                        } 
                                                    ?>
                                        </select>
                                    </td>
                                    <td>
                                        <h4>ລະຫັດຍ່ອຍ :</h4>
                                        <select class="form-control form-control-lg selected2 " name="sub_code" id="sub_code" > 
                                        <option value="0"> ບໍ່ໍ່ເລືອກຂໍ້ມູນ </option>
                                                    <?php   
                                                        foreach($sub_code as $row)  
                                                        {  
                                                        echo '<option value="'.$row->sub_code_id.'"> '.$row->Name.'</option>';
                                                        } 
                                                    ?>
                                        </select>
                                        
                                    
                                    </td>
                                    <td>
                                        <h4>ຮູບແບບ :</h4>
                                        <select class="form-control form-control-lg selected2 " name="template" id="template" > 
                                        <option value="0"> ບໍ່ໍ່ເລືອກຂໍ້ມູນ </option>
                                        <option value="ແບບທີ1"> ແບບທີ1 </option>
                                        <option value="ແບບທີ2"> ແບບທີ2 </option>
                                                  
                                        </select>
                                        
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                            <br/>
                                            <button type="submit" name="PDF" id="PDF"  class="btn btn-primary btn-lg print"><i class="fas fa-file-alt"></i> &nbsp; PDF  &nbsp; &nbsp;</button>
                                    </td>
                                    <!-- <td>
                                            <br/>
                                            <button type="submit" name="Export" id="Export"  class="btn btn-primary btn-lg print"><i class="fas fa-file-alt"></i> &nbsp; Export  &nbsp; &nbsp;</button>
                                    </td> -->
                                    </form>
                                    <td>
                                            <br/>
                                            <button type="button" name="view" id="view"  class="btn btn-primary btn-lg print"><i class="fas fa-file-alt"></i> &nbsp; ລາຍງານ  &nbsp; &nbsp; </button>
                                    </td>
                                       
                                
                                </tr>
                            </table>
                        <center>             
                               
                              
                        

                          


                    </div>
                                            <div id="myAlert" class="alert alert-danger collapse">
                                                    <button type="button" class="close" id="linkClose">&times;</button>
                                                    <strong>ຜິດພາດ! :</strong> ກະລູນາປ້ອນຂໍ້ມູນໃຫ້ຄົບ ຂໍຂອບໃຈ.
                                            </div>
                    <br/>
                    <br/>

                    <!-- <center>
                        <button type="submit" name="insert" id="insert"  class="btn btn-primary btn-lg print"><i class="fas fa-file-alt"></i> &nbsp; ພືມລາຍງານ </button>
                    
                    </center> -->
                    
                
                    
                    </div>
                   
                    <div  class=" px-md-2" >
                        <div class="d-none card mb-4" id="card_data" >
                            <div class="card-header bg-white font-weight-bold">
                                ສະຫຼຸບລາຍງານ
                            </div>
                            <div class="card-body" id="table_view">
                               
                            </div>
                            
                        </div>
                    </div>
                
            </div>
            

            
        
         </div>
    
</div>

  
  
 

  
<script>



            $(".selected2").select2();
         

        function toSubmit(){            
            // if($('#date_start').val() == '')  
            // {  

            //     $('#myAlert').show('fade');
               
            //     return false;
            // }  
            // else if($('#date_end').val() == '')
            // {  
            //     $('#myAlert').show('fade');
                
            //     return false;
            // }else{
               
            // }
        }

        $(document).ready(function () {

            $(document).on('click', '.back', function(){  
                window.location.replace('../../../main.php');
            });

            $("#date_start").datetimepicker({format:'d-m-Y H:m:s'});
            $("#date_end").datetimepicker({format:'d-m-Y H:m:s'});
            
           

             $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });

            $(document).on('click', '#view', function(){  
                var project = $('#project').val()
                var payment_type = $('#payment_type').val()
                var sub_code = $('#sub_code').val() 
                var template = $('#template').val() 
                var element = document.getElementById("card_data");
                element.classList.remove("d-none");
                
                $.ajax({  
                    url:"<?php echo base_url() . 'Voucher/view_report'; ?>", 
                    method:"POST",  
                    data:{
                        project:project,
                        payment_type:payment_type,
                        sub_code:sub_code,
                        template:template
                    },  
                    dataType:"text",  
                    success:function(data){ 
                        
                        $('#show_report').remove(); 
                        
                        $('#table_view').append('<div id="show_report" >'+data+'</div>');
                       

                        
                       
                    }  

                });  
            });

            
       


            
        });
</script>








</body>
</html>