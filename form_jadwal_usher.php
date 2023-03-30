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
<?php 

    if(isset($_POST['save'])) {
        $tglIbadah = $_POST['inputtglibadah'];
        $namaUsher = $_POST['inputnamausher'];
        // $usher2 = $_POST['inputusher2'];
        // $usher3 = $_POST['inputusher3'];
        // $usher4 = $_POST['inputusher4'];
        // $usher5 = $_POST['inputusher5'];
        // $usher6 = $_POST['inputusher6'];
        // $usher7 = $_POST['inputusher7'];
        // $usher8 = $_POST['inputusher8'];
        $notesUsher = $_POST['inputnotesusher'];

        
        mysqli_query($con, "INSERT INTO usher VALUES (NULL, '$namaUsher')");
        $usherId = $con->insert_id;

        mysqli_query($con, "INSERT INTO usher_ibadah VALUES (NULL, '$tglIbadah', '$usherId', '$notesUsher')");
        
        echo "<script>
            alert('Data sudah berhasil disimpan.');
            var ask = confirm('Apakah ingin add usher?');
            if(ask) {
                document.location = 'form_add_usher.php?ibadahId=$tglIbadah'
            }
            else {
                document.location = 'jadwal_usher.php';
            }
        </script>";
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM JADWAL USHER</title>
    <link rel="shortcut icon" href="img/NextGen_2.jpg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

    <link rel="stylesheet" href="css/style_web_2.css">
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

        .clean {
            clear: both;
        }

        a:hover {
            color: #40407a;
        }

        li a:hover {
            color: #40407a;
        }
        
        select:hover {
            cursor: pointer;
        }

        select.form-select:focus {
            box-shadow: inset 0 -1px 0 #ddd;
            border-color: #ddd;
        }

        textarea:focus, 
        textarea.form-control:focus, 
        input.form-control:focus, 
        input[type=text]:focus, 
        input[type=password]:focus, 
        input[type=email]:focus, 
        input[type=number]:focus, 
        [type=text].form-control:focus, 
        [type=password].form-control:focus, 
        [type=email].form-control:focus, 
        [type=tel].form-control:focus, 
        [contenteditable].form-control:focus {
            box-shadow: inset 0 -1px 0 #ddd;
            border-color: #ddd;
	    }

        .select2-results__option {
            color: black;
        }
    </style>
    
</head>
<body id="page-top" style="font-family: Poppins;">
    <div id="wrapper">
        <?php include "header.php";?>
        <!-- Page Heading -->
        <div class="container fluid">
            <div class="page_head" style="margin-bottom: 50px;">
                <h3 style="color: black;">Form Jadwal Usher</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="jadwal_usher.php" style="display: inline;">Jadwal Usher</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_jadwal_usher.php" style="display: inline;">Form Jadwal Usher</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                <a class="btn btn-danger" href="jadwal_usher.php" onclick="return confirm('Apakah yakin ingin membatalkan proses penginputan data?');"  role="button"><i class="fas fa-minus"></i>&ensp;Cancel</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 45%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <?php
                            $listIbadah = mysqli_query($con, "SELECT DATE_FORMAT(tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah, shift, ibadah_id FROM ibadah WHERE ibadah_id NOT IN (SELECT GROUP_CONCAT(ibadah_id) FROM usher_ibadah GROUP BY ibadah_id)");
                        ?>
                        <h6><b>Tanggal Ibadah beserta Shift-nya</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputtglibadah" aria-label="Default select example" id="list_ibadah" style="color: black;" required>
                                <option></option>
                                <?php 
                                    while($rowListIbadah = mysqli_fetch_array($listIbadah)) {
                                ?>
                                <option value="<?php echo $rowListIbadah['ibadah_id']; ?>">
                                    <?php echo $rowListIbadah['tanggal_ibadah']; ?>
                                    , Shift ke-
                                    <?php echo $rowListIbadah['shift']; ?>
                                </option>
                                <?php } ?>
                            </select>                             
                        </div>

                        <?php
                            $listUsher = mysqli_query($con, "SELECT jemaat_id, fullname_jemaat FROM jemaat ORDER BY fullname_jemaat ASC");
                        ?>
                        <h6><b>Nama Usher</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputnamausher" aria-label="Default select example" id="listusher" style="color: black;" required>
                                <option></option>
                                <?php 
                                    while($rowListUsher = mysqli_fetch_array($listUsher)) {
                                ?>
                                <option value="<?php echo $rowListUsher['jemaat_id']; ?>">
                                    <?php echo $rowListUsher['fullname_jemaat']; ?>
                                </option>
                                <?php } ?>
                            </select>   
                        </div>
                        
                        <!-- <?php
                            $listUsher2 = mysqli_query($con, "SELECT fullname_jemaat FROM jemaat");
                        ?>
                        <h6><b>Usher 2</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputusher2" aria-label="Default select example" id="listusher_2" style="color: black;" required>
                                <option></option>
                                <?php 
                                    while($rowListUsher2 = mysqli_fetch_array($listUsher2)) {
                                ?>
                                <option value="<?php echo $rowListUsher2['fullname_jemaat']; ?>">
                                    <?php echo $rowListUsher2['fullname_jemaat']; ?>
                                </option>
                                <?php } ?>
                            </select>   
                        </div>

                        <?php
                            $listUsher3 = mysqli_query($con, "SELECT fullname_jemaat FROM jemaat");
                        ?>
                        <h6><b>Usher 3</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputusher3" aria-label="Default select example" id="listusher_3" style="color: black;" required>
                                <option></option>
                                <?php 
                                    while($rowListUsher3 = mysqli_fetch_array($listUsher3)) {
                                ?>
                                <option value="<?php echo $rowListUsher3['fullname_jemaat']; ?>">
                                    <?php echo $rowListUsher3['fullname_jemaat']; ?>
                                </option>
                                <?php } ?>
                            </select>   
                        </div>

                        <?php
                            $listUsher4 = mysqli_query($con, "SELECT fullname_jemaat FROM jemaat");
                        ?>
                        <h6><b>Usher 4</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputusher4" aria-label="Default select example" id="listusher_4" style="color: black;" required>
                                <option></option>
                                <?php 
                                    while($rowListUsher4 = mysqli_fetch_array($listUsher4)) {
                                ?>
                                <option value="<?php echo $rowListUsher4['fullname_jemaat']; ?>">
                                    <?php echo $rowListUsher4['fullname_jemaat']; ?>
                                </option>
                                <?php } ?>
                            </select>   
                        </div> -->

                    </div>

                    <div class="kanan" style="width: 45%; float: left; margin-left: 25px; padding-top:30px;">
                        <!-- <?php
                            $listUsher5 = mysqli_query($con, "SELECT fullname_jemaat FROM jemaat");
                        ?>
                        <h6><b>Usher 5</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputusher5" aria-label="Default select example" id="listusher_5" style="color: black;" required>
                                <option></option>
                                <?php 
                                    while($rowListUsher5 = mysqli_fetch_array($listUsher5)) {
                                ?>
                                <option value="<?php echo $rowListUsher5['fullname_jemaat']; ?>">
                                    <?php echo $rowListUsher5['fullname_jemaat']; ?>
                                </option>
                                <?php } ?>
                            </select>   
                        </div>

                        <?php
                            $listUsher6 = mysqli_query($con, "SELECT fullname_jemaat FROM jemaat");
                        ?>
                        <h6><b>Usher 6</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputusher6" aria-label="Default select example" id="listusher_6" style="color: black;">
                                <option></option>
                                <?php 
                                    while($rowListUsher6 = mysqli_fetch_array($listUsher6)) {
                                ?>
                                <option value="<?php echo $rowListUsher6['fullname_jemaat']; ?>">
                                    <?php echo $rowListUsher6['fullname_jemaat']; ?>
                                </option>
                                <?php } ?>
                            </select>   
                        </div>

                        <?php
                            $listUsher7 = mysqli_query($con, "SELECT fullname_jemaat FROM jemaat");
                        ?>
                        <h6><b>Usher 7</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputusher7" aria-label="Default select example" id="listusher_7" style="color: black;">
                                <option></option>
                                <?php 
                                    while($rowListUsher7 = mysqli_fetch_array($listUsher7)) {
                                ?>
                                <option value="<?php echo $rowListUsher7['fullname_jemaat']; ?>">
                                    <?php echo $rowListUsher7['fullname_jemaat']; ?>
                                </option>
                                <?php } ?>
                            </select>   
                        </div>

                        <?php
                            $listUsher8 = mysqli_query($con, "SELECT fullname_jemaat FROM jemaat");
                        ?>
                        <h6><b>Usher 8</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputusher8" aria-label="Default select example" id="listusher_8" style="color: black;">
                                <option></option>
                                <?php 
                                    while($rowListUsher8 = mysqli_fetch_array($listUsher8)) {
                                ?>
                                <option value="<?php echo $rowListUsher8['fullname_jemaat']; ?>">
                                    <?php echo $rowListUsher8['fullname_jemaat']; ?>
                                </option>
                                <?php } ?>
                            </select>   
                        </div> -->

                        <h6><b>Notes</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <textarea cols="50" rows="6" class="form-control" style="color: black;" placeholder="Masukkan Catatan" name="inputnotesusher" required></textarea>
                        </div>
                    </div>

                    <div class="clean"></div>

                    <center style="background-color: white; margin-top: 50px;">
                        <input type="submit" class="btn btn-success" value="Save Data" name="save">
                    </center>
                </form>
            </div>
        </div>

        <div class="clean"></div>
        <?php include "footer.php" ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function() { 
            $('#list_ibadah').select2({
                allowClear: true,
                placeholder: "Pilih Tanggal Ibadah dan Shift-nya"
            });
        });
    </script>
    <script>
        $(document).ready(function() { 
            $('#listusher').select2({
                allowClear: true,
                placeholder: "Pilih Nama Usher yang Bertugas"
            });
        });
    </script>

    <!-- <script>
        $(document).ready(function() { 
            $('#listusher_2').select2({
                allowClear: true,
                placeholder: "Pilih Usher 2"
            });
        });
    </script>

    <script>
        $(document).ready(function() { 
            $('#listusher_3').select2({
                allowClear: true,
                placeholder: "Pilih Usher 3"
            });
        });
    </script>

    <script>
        $(document).ready(function() { 
            $('#listusher_4').select2({
                allowClear: true,
                placeholder: "Pilih Usher 4"
            });
        });
    </script>

    <script>
        $(document).ready(function() { 
            $('#listusher_5').select2({
                allowClear: true,
                placeholder: "Pilih Usher 5"
            });
        });
    </script>

    <script>
        $(document).ready(function() { 
            $('#listusher_6').select2({
                allowClear: true,
                placeholder: "Pilih Usher 6"
            });
        });
    </script>

    <script>
        $(document).ready(function() { 
            $('#listusher_7').select2({
                allowClear: true,
                placeholder: "Pilih Usher 7"
            });
        });
    </script>

    <script>
        $(document).ready(function() { 
            $('#listusher_8').select2({
                allowClear: true,
                placeholder: "Pilih Usher 8"
            });
        });
    </script> -->

</body>
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>