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
        $tglRenungan = $_POST['inputtglrenungan'];
        $temaRenungan = $_POST['inputtemarenungan'];
        $isiRenungan = $_POST['inputisirenungan'];

        //insert renungan
        mysqli_query($con, "INSERT INTO renungan VALUES (NULL, '$tglRenungan', '$temaRenungan', '$isiRenungan', '$userId')");

        header("location: renungan.php");
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM RENUNGAN</title>
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

        textarea::-webkit-scrollbar {
            height: 5px;
            width: 10px;
        }

        textarea::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
        }
        
        textarea::-webkit-scrollbar-thumb {
            background: #95a5a6;
            border-radius: 10px;
        }

        textarea::-webkit-scrollbar-thumb:hover {
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
                <h3 style="color: black;">Form Renungan</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="renungan.php" style="display: inline;">Renungan</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_renungan.php" style="display: inline;">Form Renungan</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                <a class="btn btn-danger" href="renungan.php" onclick="return confirm('Apakah yakin ingin membatalkan proses penginputan data?');"  role="button"><i class="fas fa-minus"></i>&ensp;Cancel</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 60%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <h6><b>Tanggal Renungan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="inputtglrenungan" style="color: black;" required>
                        </div>

                        <h6><b>Tema Renungan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fab fa-ioxhost" style="margin: auto;"></i></span>
                            <input type="text" class="form-control" placeholder="Masukkan Tema Renungan" name="inputtemarenungan" style="color: black;" required>
                        </div>

                        <h6><b>Isi Renungan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fab fa-readme" style="margin: auto;"></i></span>
                            <textarea cols="50" rows="15" class="form-control" style="color: black;" placeholder="Masukkan Isi Renungan" name="inputisirenungan" required></textarea>
                        </div>
                    </div>

                    <div class="kanan" style="width: 30%; float: left; margin-left: 25px; padding-top:30px;">
                        <h1><b>MAZMUR 23</b></h1>
                        <p><b>Tuhan, gembalaku yang baik</b>
                            <br><br>
                            <sup>1</sup> Mazmur Daud.
                            Tuhan adalah gembalaku, takkan kekurangan aku.
                            <br>
                            <sup>2</sup> Ia membaringkan aku di padang yang berumput hijau, Ia membimbing aku ke air yang tenang;
                            <br>
                            <sup>3</sup> Ia menyegarkan jiwaku. Ia menuntun aku di jalan yang benar oleh karena nama-Nya.
                            <br>
                            <sup>4</sup> Sekalipun aku berjalan dalam lembah kekelaman,
                            aku tidak takut bahaya, sebab Engkau besertaku; gada-Mu dan tongkat-Mu, itulah yang menghibur aku.
                            <br>
                            <sup>5</sup> Engkau menyediakan hidangan bagiku,
                            di hadapan lawanku; Engkau mengurapi kepalaku dengan minyak;pialaku penuh melimpah.
                            <br>
                            <sup>6</sup> Kebajikan dan kemurahan belaka akan mengikuti aku, seumur hidupku; dan aku akan diam dalam rumah Tuhan
                            sepanjang masa.
                        </p>
                    </div>
                    <div class="clean"></div>

                    <center style="background-color: white; margin-top: 50px;">
                        <input type="submit" class="btn btn-success" value="Save Renungan" name="save">
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