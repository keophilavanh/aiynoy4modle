<?php $title_ALL='ບໍລິສັດ ຈະເລີນເຊກອງ ກຣຸບ'; ?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#"><?php echo $title_ALL; ?></a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li> -->
            <li class="nav-item dropdown">
                <a href="#" id="logout_user" class="nav-link" > ອອກຈາກລະບົບ</a>
                <!-- <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Doe</a> -->
                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a href="#" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Logout</a>
                </div> -->
            </li>
        </ul>
    </div>
</nav>
<script> 
        $(document).on('click', '#logout_user', function(){  
             
                 swal({
                        title: "ເຈົ້າຕ້ອງການອອກຈາກລະບົບ ຫຼື່ບໍ່!",
                        text: "ກະລຸນາຢືນຢັນ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            window.location = '<?php echo base_url('Logout') ?>';
                        }      
                    }); 
                
                  
            }); 
</script> 