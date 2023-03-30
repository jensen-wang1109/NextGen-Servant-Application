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

    $userId = $fetch_info['ref_user_id'];

    if(isset($_POST['save'])) {
        $tglIbadah = $_POST['inputtglibadah'];
        $shiftIbadah = $_POST['selectedshift'];

        $queryCekIbadah = mysqli_query($con, "SELECT * FROM ibadah WHERE tanggal_ibadah = '$tglIbadah' AND shift = '$shiftIbadah'");

        if(mysqli_num_rows($queryCekIbadah) > 0) {
            echo "<script>
                alert('Data Ibadah dengan tanggal dan shift yang sama sudah terdaftar!');
                document.location = 'form_ibadah.php'
            </script>";
        }
        else {
            //insert data ibadah
            mysqli_query($con, "INSERT INTO ibadah VALUES (NULL, '$tglIbadah', '$shiftIbadah', '$userId')");
            header("location: ibadah.php");
        }
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM IBADAH</title>
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

    </style>
</head>
<body id="page-top" style="font-family: Poppins;">
    <div id="wrapper">
        <?php include "header.php";?>
        <!-- Page Heading -->
        <div class="container fluid">
            <div class="page_head" style="margin-bottom: 50px;">
                <h3 style="color: black;">Form Ibadah</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="ibadah.php" style="display: inline;">Ibadah</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_ibadah.php" style="display: inline;">Form Ibadah</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                <a class="btn btn-danger" href="ibadah.php" onclick="return confirm('Apakah yakin ingin membatalkan proses penginputan data?');" role="button"><i class="fas fa-minus"></i>&ensp;Cancel</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 50%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <h6><b>Tanggal Ibadah</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="inputtglibadah" style="color: black;" required>
                        </div>

                        <?php 
                        // echo (isset($_POST['selectedshift']) && $_POST['selectedshift'] == '1') ?  'checked':'';
                        ?>

                        <div class="shift_sempit" style="width: 45%; float:left;">
                            <h6><b>Shift Ibadah</b></h6>
                            <!-- <div class="form-check form-check-inline" style="margin-right: 30px;">
                                <input class="form-check-input" type="radio" name="selectedshift" id="inlineRadio1" value="1" style="cursor:pointer;" required>
                                <label class="form-check-label" for="inlineRadio1" style="cursor:pointer;color:black;">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="selectedshift" id="inlineRadio2" value="2" style="cursor:pointer;">
                                <label class="form-check-label" for="inlineRadio2" style="cursor:pointer; color:black;">2</label>
                            </div> -->
                            <div class="input-group mb-3" style="padding-bottom: 10px;">
                                <input type="number" class="form-control" placeholder="Masukkan Shift Ibadah" name="selectedshift" style="color: black;" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;" min="1" max="9" required>
                            </div>
                        </div>
                            
                    </div>

                    <div class="kanan" style="width: 40%; float: left; margin-left: 25px; padding-top:30px;">
                        <h1><b>IBRANI 10:25</b></h1>
                        <p>
                            Janganlah kita menjauhkan diri dari pertemuan-pertemuan ibadah kita, seperti dibiasakan oleh beberapa orang, tetapi marilah kita saling menasihati, dan semakin giat melakukannya menjelang hari Tuhan yang mendekat
                        </p>
                    </div>
                    <div class="clean"></div>

                    <center style="background-color: white; margin-top: 50px;">
                        <input type="submit" class="btn btn-success" value="Save Data Ibadah" name="save">
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