
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
                <h1>ລາຍງານແຜນລາຍຈ່າຍ ຕາມບ້ວງບັນຊີ </h1>
                </center>
                <br/>
                <br/>
                <form name="myForm" id="myForm" action="bank_sub_account/print_report" target="_blank" method="post" autocomplete="off" onsubmit="return toSubmit();" >
                    <div class="text-center">
                        <center>
                                <table border="0" cellspacing="0" cellpadding="5"> 
                                    
                                        <tr>  
                                           
                                            <th align="center" ><h3>ເລືອກບັນຊີ </h3> </th> 
                                            <th align="center" >
                                                <select class="form-control form-control-lg   "  name="bank_account_id" id="bank_account_id"> 
                                                    <option value=""> ເລືອກບັນຊີ </option>
                                                            <?php   foreach($bank_account as $row)  
                                                                {  
                                                                echo '<option value="'.$row->bank_account_id.'"> '.$row->Name_account.'</option>';
                                                                } 
                                                            ?>
                                                </select>
                                             </th>
                                             <th align="center" ><h3>ບ້ວງບັນຊີ </h3> </th> 
                                            <th align="center" >
                                                <select class="form-control form-control-lg   "  name="bank_sub_account_id" id="bank_sub_account_id"> 
                                                            
                                                            
                                                </select>
                                             </th>
                                            
                                        </tr> 

                                        <tr>  
                                            
                                            <th align="center" ><h3>ວັນທີ :</h3></th>  
                                            <th align="center" > <input type="text" class="form-control form-control-lg" name="date_start" id="date_start" placeholder="Enter DateStart"> </th> 
                                            <th align="center" ><h3>ຫາ </h3> </th> 
                                            <th align="center" ><input type="text" class="form-control form-control-lg" name="date_end" id="date_end" placeholder="Enter DateEnd"> </th>
                                            
                                           
                                            
                                        </tr>
                                    
                                </table>
                        </center>

                          


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

        function toSubmit(){            
            if($('#date_start').val() == '')  
            {  

                $('#myAlert').show('fade');
               
                return false;
            }  
            else if($('#date_end').val() == '')
            {  
                $('#myAlert').show('fade');
                
                return false;
            }else{
               
            }
        }

        $(document).ready(function () {

            $(document).on('click', '.back', function(){  
                window.location.replace('../../../main.php');
            });

            $("#date_start").datetimepicker({format:'d-m-Y '});
            $("#date_end").datetimepicker({format:'d-m-Y '});
            
           

             $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });

            $('#bank_account_id').on('change', function() {

                var bank_sub_account_id = this.value;

                    $.ajax({  
                            url:"<?php echo base_url() . 'bank_sub_account/select_item'; ?>", 
                            method:"POST",  
                            data:{bank_sub_account_id:bank_sub_account_id},  
                            dataType:"text",  
                            success:function(data){  

                                console.log("data");
                                console.log(data);
                                $("#bank_sub_account_id").html(data);
                        
                            }  
                        });  
            });

            
        });
</script>








</body>
</html>