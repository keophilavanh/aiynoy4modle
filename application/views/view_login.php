
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
        $this->load->view('src');
    ?>


    
    

   
    
</head>
<style>
body, html {
  height: 100%;
  width: 100%; 
 
}

.bg {
  /* The image used */
  
  background: url("<?php echo base_url('assets/image/login.png') ?>");
  
  background-repeat: no-repeat;
  background-size: 100% 100%;
}
</style>
<body class="bg-light bg"  >
<div class="container h-100">
            
        <div class="row h-100 justify-content-center align-items-center">
       
                <!-- <img src="image/logo2.JPEG" width="300" height="200"/> -->
            
            
            <div class="col-md-4">
                
                <center>
                <!-- <img src="<?php echo base_url('assets/image/logo.png') ?>" width="200" height="200"/> -->
                <!-- <h2>Report</h2>
                <p class="lead mb-4">Create By Nueng Mamipoko </p> -->
                </center>
                <br/>
                
                <div class="card">
                    <div class="card-body">
                        <form method="post" id="login_form" >
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input id="Username" name="Username" type="text" class="form-control" placeholder="Username" autocomplete="off">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" autocomplete="off">
                            </div>

                            <div id="myAlert" class="alert alert-danger collapse">
                                                <button type="button" class="close" id="linkClose">&times;</button>
                                                <strong>ຜິດພາດ! :</strong> ກະລູນາປ້ອນຂໍ້ມູນໃຫ້ຄົບ ຂໍຂອບໃຈ.
                            </div>
                            

                            
                            <div class="form-check mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-check-input">
                                    Remember Me
                                </label>
                            </div>
                            <div class="row">
                                <div class="col pr-2">
                                    <button id="login" type="button" class="btn btn-block btn-primary">ເຂົ້າສູ່ລະບົບ</button>
                                </div>
                                <div class="col pl-2">
                                    <!-- <a class="btn btn-block btn-link" href="#">Forgot Password</a> -->
                                </div>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">

    $(document).ready(function () {

         $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });
      

        $("#login").click(function () {
            if($("#Username").val() == '' ){
                $('#myAlert').show('fade');
            } else if($("#Password").val() == '' ){
                $('#myAlert').show('fade');
            }

            else{
                $.ajax({
                url:"<?php echo base_url() . 'login/user_login'; ?>",  
                type: 'POST',
                data: $('#login_form').serialize(),
                datatype:"text",
                success: function(data){
                   
                    console.log(data);
                    if(data === 'true'){

                         $.toast({
                            heading: 'ແຈ້ງເຕືອນ!',
                            text: 'ຜູ້ໃຊ້ ແລະ ລະຫັດຜ່ານຖືກຕ້ອງ',
                            textFont: 'Saysettha OT',
                            bgColor: '#009900',
                            position: 'top-right',
                            icon: 'success',
                            loader: false,   
                            loaderBg: '#ff6666',
                            textColor: 'white'
                        })
                       
                       
                        window.location.replace("<?php echo base_url() .'Main'; ?>");
                    }else{
                      
                        $.toast({
                            heading: 'ແຈ້ງເຕືອນ!',
                            text: 'ຜູ້ໃຊ້ ແລະ ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ',
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
</script>