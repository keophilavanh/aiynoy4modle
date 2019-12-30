
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
                <form name="myForm" id="myForm" action="Print-Report-Voucher" target="_blank" method="post" autocomplete="off" onsubmit="return toSubmit();" >
                    <div class="">
                      
                                <div class=" container ">
                                        <div class="col-sm-4 container">
                                                <h4>ໂຄງການ :</h4>
                                                <select class="form-control form-control-lg selected2  "  name="project" id="project"> 
                                                   
                                                    <?php   foreach($project as $row)  
                                                        {  
                                                        echo '<option value="'.$row->pro_id.'"> '.$row->Name.'</option>';
                                                        } 
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="col-sm-4 container">
                                                <br/>
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
                                        </div>
                                        <div class="col-sm-4 container">
                                                <br/>
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
                                        </div>
                                                
                                </div>
                              
                        

                          


                    </div>
                                            <div id="myAlert" class="alert alert-danger collapse">
                                                    <button type="button" class="close" id="linkClose">&times;</button>
                                                    <strong>ຜິດພາດ! :</strong> ກະລູນາປ້ອນຂໍ້ມູນໃຫ້ຄົບ ຂໍຂອບໃຈ.
                                            </div>
                    <br/>
                    <br/>

                    <center>
                        <button type="submit" name="insert" id="insert"  class="btn btn-primary btn-lg print"><i class="fas fa-file-alt"></i> &nbsp; ພືມລາຍງານ </button>
                    
                    </center>
                    
                
                    
                    </div>
                </form>
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

            
        });
</script>








</body>
</html>