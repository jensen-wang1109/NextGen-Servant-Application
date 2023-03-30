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

    $paramJenisPemusikId = $_GET['jenisPemusikId'];
    $dataJenisPemusik = mysqli_query($con, "SELECT * FROM jenis_pemusik WHERE jenis_pemusik_id = '$paramJenisPemusikId'");
    $rowDataJenisPemusik = mysqli_fetch_array($dataJenisPemusik);

    if(isset($_POST['update'])) {
        $namaJenisPemusik = $_POST['inputnamajenispemusik'];

        //update jenis_pemusik
        mysqli_query($con, "UPDATE jenis_pemusik SET nama_jenis_pemusik = '$namaJenisPemusik' WHERE jenis_pemusik_id = '$paramJenisPemusikId'");
        header("location: form_jenis_pemusik.php");
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM EDIT DAFTAR JENIS PELAYANAN MUSIK</title>
    <link rel="shortcut icon" href="img/NextGen_2.jpg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

        .kanan::-webkit-scrollbar {
            height: 5px;
            width: 7px;
        }

        .kanan::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
        }
        
        .kanan::-webkit-scrollbar-thumb {
            background: #95a5a6;
            border-radius: 10px;
        }

        .kanan::-webkit-scrollbar-thumb:hover {
            background: #7f8c8d;
        }
    </style>
</head>
<body id="page-top" style="font-family: Poppins;">
    <div id="wrapper">
        <?php include "header.php";?>
        <!-- Page Heading -->
        <div class="container fluid">
            <div class="page_head" style="margin-bottom: 50px;">
                <h3 style="color: black;">Form Edit Daftar Jenis Pelayanan Musik</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="jadwal_pemusik.php" style="display: inline;">Jadwal Pemusik</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_jenis_pemusik.php" style="display: inline;">Form Daftar Jenis Pelayanan Musik</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_jenis_pemusik_edit.php?jenisPemusikId=<?php echo $paramJenisPemusikId; ?>" style="display: inline;">Form Edit Daftar Jenis Pelayanan Musik</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;">
                <a class="btn btn-danger" href="form_jenis_pemusik.php" onclick="return confirm('Apakah yakin ingin membatalkan proses mengedit data?');"  role="button"><i class="fas fa-arrow-left"></i>&ensp;Back</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 45%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <h6><b>Nama Jenis Pelayanan Musik</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <input type="text" class="form-control" placeholder="Masukkan Nama Jenis Pelayanan Musik" name="inputnamajenispemusik" value="<?php echo $rowDataJenisPemusik['nama_jenis_pemusik']; ?>" style="color: black;" required>
                        </div>
                    </div>

                    <div class="kanan" style="width: 45%; float: left; margin-left: 25px; margin-top:30px; text-align: right; height: 200px; overflow:auto;">
                    </div>
                    <div class="clean"></div>

                    <center style="background-color: white; margin-top: 50px;">
                        <input type="submit" class="btn btn-success" value="Update Data" name="update">
                    </center>
                </form>
            </div>
        </div>

        <div class="clean"></div>
        <?php include "footer.php" ?>
    </div>
</body>
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>