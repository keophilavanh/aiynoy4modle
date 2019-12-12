

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
           
    
            <h1 id="menu_titel"></h1>
            <p class="lead mb-4">...</p>
    
            <div class="row">
                
                    <div class="col-md-4 service">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        
                        <i class="fas fa-briefcase fa-stack-1x fa-inverse"></i>
                        <!-- <img  class="fas fa-circle " src="image/checkin.jpg" width="300" height="200"/> -->
                        
                        
                        
                    </span>
                        <h4>ເຊັກອິນ</h4>
                        <p class="mb-4">Check in</p>
                    </div>
                
                    <div class="col-md-4 Purchase">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-clipboard-list fa-stack-1x fa-inverse"></i> 
                        
                    <!--  -->
                        
                    </span>

                    </span>
                        <h4>ເຊັກເອົ້າ</h4>
                        <p class="mb-4">Check out</p>
                    </div>
                
                    <div class="col-md-4 Booking">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="far fa-list-alt fa-stack-1x fa-inverse"></i> 
                      
                        
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
                        <i class="fas fa-concierge-bell fa-stack-1x fa-inverse"></i> <i class="fas fa-concierge-bell"></i>
                        
                    <!--  -->
                        
                    </span>

                    </span>
                        <h4>ບໍລິການຫຼັງການຂາຍ</h4>
                        <p class="mb-4">Room Service</p>
                    </div>
                
                    <a class="col-md-4 manag click">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-cog fa-stack-1x fa-inverse"></i> <i class="far fa-list-alt"></i>
                      
                        
                    <!--  -->
                        
                    </span>
                        <h4>ຈັດການຂໍ້ມູນ</h4>
                        <p class="mb-4"> Manage Data</p>
                    </a>

                   <div class="col-md-4 report click">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-file-alt fa-stack-1x fa-inverse"></i>
                        
                       
                    </span>
                        <h4>ບົດລາຍງານ</h4>
                        <p class="mb-4">Report</p>
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