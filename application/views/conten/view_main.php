

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
        $this->load->view('src');
    ?>
 


    
    

    <title id="title_header"></title>
    
</head>
<body class="bg-light" style="font-family: 'Phetsarath OT'"  >

<?php
        $this->load->view('view_header_main');
    ?>

<div class="bg-light py-5 text-center">
        <div class="container">
           
    
            <h1 id="menu_titel">ບໍລິສັດ ຈະເລີນເຊກອງ ກຣຸບ</h1>
            <p class="lead mb-4">CHALEUN SEKONG GROUP CO.,LTD</p>
    
            <div class="row">
                
                    <div class="col-md-4 service">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        
                        <!-- <i class="fas fa-briefcase fa-stack-1x fa-inverse"></i> -->
                        <i class="fas fa-donate fa-stack-1x fa-inverse"></i>
                        
                        <!-- <img  class="fas fa-circle " src="image/checkin.jpg" width="300" height="200"/> -->
                        
                        
                        
                    </span>
                        <h4>Finance and accounting</h4>
                        <p class="mb-4">ການເງິນແລະການບັນຊີ</p>
                    </div>
                
                    <div class="col-md-4 Purchase">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-clipboard-list fa-stack-1x fa-inverse"></i> 
                        
                    <!--  -->
                        
                    </span>

                    </span>
                        <h4>Project Manager management</h4>
                        <p class="mb-4">ການຄຸ້ມຄອງຜູ້ຈັດການໂຄງການ</p>
                    </div>
                
                    <div class="col-md-4 Booking">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="far fa-building fa-stack-1x fa-inverse"></i> 
                       
                      
                        
                    <!--  -->
                        
                    </span>
                        <h4>ການຈອງຫ້ອງພັກ</h4>
                        <p class="mb-4"> Reservation</p>
                    </div>

                 
               
               
              
                
            </div>

            <div class="row">
                
                  
                
                    <div class="col-md-4 Purchase">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                        
                        
                    <!--  -->
                        
                    </span>

                    </span>
                        <h4>Human Resource Management</h4>
                        <p class="mb-4">ການຄຸ້ມຄອງຊັບພະຍາກອນມະນຸດ   </p>
                    </div>
                
                    <a class="col-md-4 manag click">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-cog fa-stack-1x fa-inverse"></i> <i class="far fa-list-alt"></i>
                      
                        
                    <!--  -->
                        
                    </span>
                        <h4> Manage Data</h4>
                        <p class="mb-4"> ຈັດການຂໍ້ມູນ</p>
                    </a>

                   <div class="col-md-4 report click">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-file-alt fa-stack-1x fa-inverse"></i>
                        
                       
                    </span>
                        <h4> Report</h4>
                        <p class="mb-4">ບົດລາຍງານ</p>
                    </div>
               
               
              
                
            </div>

           
        </div>
    </div>
  
  
 

  
<script>



        $(document).ready(function () {

           
          

            

             $(document).on('click', '.manag', function(){  
                 
                window.location.replace('Manage');
                  
            });
            $(document).on('click', '.Booking', function(){  
                 
                window.location.replace('Booking');
              
                   
             });
             $(document).on('click', '.Purchase', function(){  
                 
                 window.location.replace('modules/Purchase/Service/service.php');
                   
             });
             $(document).on('click', '.report', function(){  
                 
                 window.location.replace('modules/report/report/report.php');
                   
             });


            
        });
</script>








</body>
</html>