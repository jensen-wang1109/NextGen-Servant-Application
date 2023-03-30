<?php require_once "controllerUserData.php"; ?>
<?php 
$usernameemail = $_SESSION['email'];
$password = $_SESSION['password'];
if($usernameemail != false && $password != false){
    $sql = "SELECT * FROM ref_user WHERE email = '$usernameemail' OR username = '$usernameemail'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| HOME</title>
    <link rel="shortcut icon" href="img/NextGen_2.jpg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/style_web_2.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

        .clean {
            clear: both;
        }
    </style>
</head>

<body id="page-top" style="font-family: Poppins;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "header.php"; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3 style="color:black;">Home</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <!-- Profile Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                                </div>
                                <div class="card-body">
                                    <h5 style="color: black;">Selamat datang,</h5>
                                    <?php if(is_file("profile_picture/".$fetch_info['photo'])) { ?>
                                        <img src="profile_picture/<?php echo $fetch_info['photo']?>" class="img-profile" style="width: 100px; height: 100px; float: left; clip-path:circle();">
                                    <?php } else { ?> 
                                        <img src="img/sample_user.png" class="img-profile" style="width: 100px; height: 100px; float: left; clip-path:circle();">
                                    <?php } ?>
                                    
                                    <div class="intro" style="color: black; float: left; width: 77%; margin-top: 10px; margin-left: 10px;">
                                        <h5><b>
                                            <?php 
                                                if ($fetch_info['gender'] == 'Pria') {
                                                    ?>Bpk./Sdr. <?php
                                                }
                                                else {
                                                    ?>Ibu./Sdri. <?php
                                                }
                                                
                                                echo $fetch_info['fullname'];
                                            ?>
                                            </b>
                                        </h5>
                                        <div class="line" style="width: auto; height: 3px; background-color: black;"></div>
                                        <h5 style="margin-top: 10px;"><?php echo $fetch_info['role'] ?></h5>
                                    </div>
                                    <div class="clean"></div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 mb-4">
                            <!-- Jumlah Data -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Jemaat</h6>
                                </div>
                                <div class="card-body" style="color: white; margin: auto;">
                                    <?php $jemaat = mysqli_query($con, "SELECT * FROM jemaat");

                                    // $pelayan = mysqli_query($con, "SELECT * FROM jemaat j JOIN jabatan_jemaat jj ON j.jemaat_id = jj.jemaat_id JOIN jabatan ja ON jj.jabatan_id = ja.jabatan_id WHERE ja.nama_jabatan = 'PELAYAN';");

                                    // $mentor = mysqli_query($con, "SELECT * FROM jemaat j JOIN jabatan_jemaat jj ON j.jemaat_id = jj.jemaat_id JOIN jabatan ja ON jj.jabatan_id = ja.jabatan_id WHERE ja.nama_jabatan = 'MENTOR';");
                                    
                                    $jml_jemaat = mysqli_num_rows($jemaat);
                                    // $jml_pelayan = mysqli_num_rows($pelayan);
                                    // $jml_mentor = mysqli_num_rows($mentor);
                                    ?>
                                    <a href="jemaat.php">
                                        <div class="red-box" style="width: 150px; height: 150px; background-color: #01017a; float: left; margin-left: 10px; text-align: center; margin-bottom: 10px; color: white;">
                                            <h1 style="margin-top: 30px;"><?php echo $jml_jemaat; ?></h1>
                                            <h6>Jemaat</h6>
                                        </div>
                                    </a>
                                    
                                    <!-- <a href="pelayan.php">
                                        <div class="blue-box" style="width: 150px; height: 150px; background-color: #ffa502; float:left; margin-left: 10px; text-align: center; margin-bottom: 10px; color: white;">
                                            <h1 style="margin-top: 30px;"><?php echo $jml_pelayan; ?></h1>
                                            <h6>Pelayan</h6>
                                        </div>
                                    </a>
                                    
                                    <a href="mentor.php">
                                        <div class="red-box" style="width: 150px; height: 150px; background-color: #05c46b; float:left; margin-left: 10px; text-align: center; margin-bottom: 10px; color: white;">
                                            <h1 style="margin-top: 30px;"><?php echo $jml_mentor; ?></h1>
                                            <h6>Mentor</h6>
                                        </div>
                                    </a> -->
                                    <div class="clean"></div>
                                </div>
                            </div>
                        
                        </div>

                        <div class="col-lg-12 mb-4">
                            <?php 
                                $queryRenungan = mysqli_query($con, "SELECT *, DATE_FORMAT(tanggal_renungan, '%d %M %Y') AS tanggal_renungan, DATE_FORMAT(tanggal_renungan, '%W') AS hari_renungan FROM renungan ORDER BY renungan_id DESC LIMIT 1");
                                $rowQueryRenungan = mysqli_fetch_array($queryRenungan); 
                            ?>
                            <!-- Renungan -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Renungan</h6>
                                </div>
                                <div class="card-body" style="color: black;">
                                    <?php 
                                        if (mysqli_num_rows($queryRenungan) >= 1) {
                                    ?>
                                        <p style="text-align: right;"><?php echo $rowQueryRenungan['hari_renungan']; ?>, <?php echo $rowQueryRenungan['tanggal_renungan']; ?></p>
                                        <h3><b><?php echo $rowQueryRenungan['tema_renungan']; ?></b></h3>
                                        <br>
                                        <p>
                                            <?php 
                                            echo substr($rowQueryRenungan['preview_renungan'],0,450);?>
                                            ...
                                        </p>
                                        <a class="btn btn-primary" href="renungan_full.php?renunganId=<?php echo $rowQueryRenungan['renungan_id']; ?>" role="button" style="float: right;">Read More&ensp;<i class="fas fa-share"></i></a>
                                    <?php } ?>
                                    <div class="clean"></div>
                                    <?php
                                        if (mysqli_num_rows($queryRenungan) < 1) {
                                            ?>
                                            <p style="color: red;"><b>Data Renungan Kosong</b></p>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <!-- Ulang tahun -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Yang berulang tahun hari ini</h6>
                                </div>
                                <?php 
                                    $jemaatUltah = mysqli_query($con, "SELECT *, DATE_FORMAT(dob_jemaat, '%d %M %Y') AS tgl_lahir, TIMESTAMPDIFF(YEAR, dob_jemaat, CURRENT_DATE()) AS usia FROM jemaat WHERE MONTH(dob_jemaat) = MONTH(CURRENT_DATE()) AND DAY(dob_jemaat) = DAY(CURRENT_DATE()) AND TIMESTAMPDIFF(YEAR, dob_jemaat, CURRENT_DATE()) > 0 ORDER BY fullname_jemaat ASC;");

                                    $nomor = 1;
                                ?>
                                <div class="card-body" style="color: black;">
                                    <h4>Tanggal: <b><?php echo DATE("d F Y"); ?></b></h4>
                                    <table class="table table-hover table-striped" style="color:black;">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Usia</th>
                                        </tr>
                                        <?php 
                                            while($rowJemaatUltah = mysqli_fetch_array($jemaatUltah)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nomor; ?>.</td>
                                                    <td><?php echo $rowJemaatUltah['fullname_jemaat']; ?></td>
                                                    <td><?php echo $rowJemaatUltah['usia']; ?></td>
                                                </tr>
                                                <?php
                                                $nomor++;
                                            }
                                        ?>
                                    </table>

                                    <?php
                                        if (mysqli_num_rows($jemaatUltah) < 1) {
                                            ?>
                                            <p style="color: red;"><b>Hari ini tidak ada yang berulang tahun</b></p>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        
                        </div>

                        <div class="col-lg-6 mb-4">
                            <?php
                                $event = mysqli_query($con, "SELECT *, DATE_FORMAT(tanggal_mulai_event, '%d %M %Y') AS start_dt, DATE_FORMAT(tanggal_selesai_event, '%d %M %Y') AS end_dt FROM event ORDER BY event_id DESC LIMIT 1");

                                $rowEvent = mysqli_fetch_array($event);
                            ?>
                            <!-- Event -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Event</h6>
                                </div>
                                <div class="card-body" style="color: black;">
                                    <?php
                                        if (mysqli_num_rows($event) >= 1) {
                                    ?>
                                        <h3><b><?php echo $rowEvent['tema_event']; ?></b></h3>
                                        <br>
                                        <p>Tanggal: 
                                            <?php 
                                                if($rowEvent['start_dt'] == $rowEvent['end_dt']) {
                                                    echo $rowEvent['start_dt'];
                                                }
                                                else {
                                                    echo $rowEvent['start_dt'] . " - " . $rowEvent['end_dt'];
                                                }
                                            ?>
                                            <!-- <?php echo $rowEvent['start_dt'] ?> - <?php echo $rowEvent['end_dt'] ?></p> -->
                                        <br>
                                        <p>
                                            <?php 
                                            echo substr($rowEvent['preview_event'],0,200);?>
                                            ...
                                        </p>
                                        <a class="btn btn-primary" href="event_full.php?eventId=<?php echo $rowEvent['event_id']; ?>" role="button" style="float: right;">Read More&ensp;<i class="fas fa-share"></i></a>
                                    <?php } ?>
                                    <div class="clean"></div>
                                    <?php
                                        if (mysqli_num_rows($event) < 1) {
                                            ?>
                                            <p style="color: red;"><b>Data Event Kosong</b></p>
                                            <?php
                                        }
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include "footer.php" ?>

</body>

</html>