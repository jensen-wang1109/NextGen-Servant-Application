<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
</style>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php" style="margin-top: 10px;">
    <div class="sidebar-brand-icon">
        <img src="img/NextGen_1.jpg" style="width: 100%; height: auto;">
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Home -->
<li class="nav-item">
    <a class="nav-link" href="index.php" title="Home">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Data
</div>

<!-- Nav Item - Jemaat -->
<li class="nav-item">
    <a class="nav-link" href="jemaat.php" title="Jemaat">
        <i class="fas fa-user-friends"></i>
        <span>Jemaat</span>
    </a>
</li>

<!-- Nav Item - Pelayan -->
<!-- <li class="nav-item">
    <a class="nav-link" href="pelayan.php" title="Pelayan">
        <i class="fas fa-people-carry"></i>
        <span>Pelayan</span>
    </a>
</li> -->

<!-- Nav Item - Mentor -->
<!-- <li class="nav-item">
    <a class="nav-link" href="mentor.php" title="Mentor">
        <i class="fas fa-chalkboard-teacher"></i>
        <span>Mentor</span>
    </a>
</li> -->

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading" id="header_bidang">
    Bidang
</div>

<?php
    if($fetch_info['role'] != "PIC Pengajaran" && $fetch_info['role'] != "Super User" && $fetch_info['role'] != "PIC Tim Musik" && $fetch_info['role'] != "PIC Hospitality") {
        ?>
            <script>
                let headBidang = document.getElementById("header_bidang");
                headBidang.remove();
            </script>
        <?php
    }
?>

<!-- Nav Item - Pengajaran-->
<li class="nav-item" id="menu_pengajaran">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo" title="Pengajaran">
        <i class="fas fa-bible"></i>
        <span>Pengajaran</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih</h6>
            <a class="collapse-item" href="tema.php" title="Tema">Tema</a>
            <a class="collapse-item" href="pembicara.php" title="Pengkhotbah">Pengkhotbah</a>
            <a class="collapse-item" href="keaktifan_pelayan_pembicara_dalam.php" title="Keaktifan Pelayan Pengkhotbah Dalam">Keaktifan Pelayan <br>Pengkhotbah Dalam</a>
        </div>
    </div>
</li>

<?php
    if($fetch_info['role'] != "PIC Pengajaran" && $fetch_info['role'] != "Super User") {
        ?>
            <script>
                let pengajaran = document.getElementById("menu_pengajaran");
                pengajaran.remove();
            </script>
        <?php
    }
?>

<!-- Nav Item - Musik -->
<li class="nav-item" id="menu_musik">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities" title="Musik">
        <i class="fas fa-music"></i>
        <span>Musik</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih</h6>
            <a class="collapse-item" href="jadwal_pemusik.php" title="Jadwal Pemusik">Jadwal Pemusik</a>
            <a class="collapse-item" href="keaktifan_pelayan_pemusik.php" title="Keaktifan Pelayan Pemusik">Keaktifan Pelayan <br> Pemusik</a>
        </div>
    </div>
</li>

<?php
    if($fetch_info['role'] != "PIC Tim Musik" && $fetch_info['role'] != "Super User") {
        ?>
            <script>
                let musik = document.getElementById("menu_musik");
                musik.remove();
            </script>
        <?php
    }
?>

<!-- Nav Item - Hospitality -->
<li class="nav-item" id="menu_hospitality">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages" title="Hospitality">
        <i class="fas fa-handshake"></i>
        <span>Hospitality</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih</h6>
            <a class="collapse-item" href="jadwal_usher.php" title="Jadwal Usher">Jadwal Usher</a>
            <a class="collapse-item" href="keaktifan_pelayan_usher.php" title="Keaktifan Pelayan Usher">Keaktifan Pelayan <br> Usher</a>
        </div>
    </div>
</li>

<?php
    if($fetch_info['role'] != "PIC Hospitality" && $fetch_info['role'] != "Super User") {
        ?>
            <script>
                let hospi = document.getElementById("menu_hospitality");
                hospi.remove();
            </script>
        <?php
    }
?>

<!-- Divider -->
<hr class="sidebar-divider" id="divider_bidang">

<?php
    if($fetch_info['role'] != "PIC Pengajaran" && $fetch_info['role'] != "Super User" && $fetch_info['role'] != "PIC Tim Musik" && $fetch_info['role'] != "PIC Hospitality") {
        ?>
            <script>
                let divBidang = document.getElementById("divider_bidang");
                divBidang.remove();
            </script>
        <?php
    }
?>

<!-- Heading -->
<div class="sidebar-heading">
    Ibadah
</div>

<!-- Nav Item - Ibadah -->
<li class="nav-item">
    <a class="nav-link" href="ibadah.php" title="Ibadah">
        <i class="fas fa-church"></i>
        <span>Ibadah</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Lainnya
</div>


<!-- Nav Item - Renungan -->
<li class="nav-item">
    <a class="nav-link" href="renungan.php" title="Renungan">
        <i class="fas fa-praying-hands"></i>
        <span>Renungan</span>
    </a>
</li>

<!-- Nav Item - Event -->
<li class="nav-item">
    <a class="nav-link" href="event.php" title="Event">
        <i class="fas fa-calendar-day"></i>
        <span>Event</span>
    </a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fas fa-bars"></i>
        </button> -->

        


        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <button class="btn btn-primary" type="button" id="sidebarToggle">
                    <i class="fas fa-bars" id="bars_to_rotate" style="transform: rotate(180deg);"></i>
                </button>

                <script>
                    const buttonBars = document.getElementById('sidebarToggle');
                    const barsRotate = document.getElementById('bars_to_rotate');

                    rotateBars = () => {
                        if(barsRotate.style.transform == 'rotate(180deg)') {
                            barsRotate.style.transform = 'rotate(90deg)';
                        }
                        else {
                            barsRotate.style.transform = 'rotate(180deg)';
                        }
                    };

                    buttonBars.addEventListener('click', rotateBars);
                </script>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" style="font-family: Poppins;">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #2c3cfb; height: 40px; margin-top: 6px; border-radius: 30px;">
                    <?php if(is_file("profile_picture/".$fetch_info['photo'])) { ?>
                        <img src="profile_picture/<?php echo $fetch_info['photo']?>" class="img-profile rounded-circle" style="margin-right: 10px;">
                    <?php } else { ?> 
                        <img src="img/sample_user.png" class="img-profile rounded-circle" style="margin-right: 10px;" >
                    <?php } ?>
                    <span class="mr-2 d-none d-lg-inline small" id="fullname_user" style="color: black; font-size: 15px;"><b><?php echo $fetch_info['fullname'] ?></b></span>
                    <!-- <img class="img-profile rounded-circle"
                        src="img/Sample_User_Icon.png"> -->
                    <div class="icon_down" style="padding-top: 2px;">
                        <i class="fas fa-caret-down" style="color: #2c3cfb; font-size: 20px;" id="icon-down"></i>
                    </div>
                    
                    <div class="icon_up" style="display: none; padding-top: 2px;">
                        <i class="fas fa-caret-up" style="color: #2c3cfb; font-size: 20px;" id="icon-up"></i>
                    </div>
                    
                    <script>
                        const down = document.querySelector('.icon_down');
                        const up = document.querySelector('.icon_up');
                        const klik = document.getElementById('userDropdown');
                        klik.addEventListener('click', function(){
                            if (up.style.display == 'none') {
                                up.style.display = 'inline';
                                down.style.display = 'none';
                            }
                            else {
                                up.style.display = 'none';
                                down.style.display = 'inline';
                            }
                        });
                    </script>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown" >
                    <a class="dropdown-item" href="profile.php" title="Profile">
                        <b>
                            <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                            Profile
                        </b>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" title="Logout">
                        <b>
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            Logout
                        </b>
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->