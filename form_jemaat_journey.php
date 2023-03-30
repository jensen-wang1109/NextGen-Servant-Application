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
    $paramJemaatId = $_GET['jemaatId'];

    $dataJemaat = mysqli_query($con, "SELECT * FROM jemaat WHERE jemaat_id = '$paramJemaatId'");
    $rowDataJemaat = mysqli_fetch_array($dataJemaat);

    if(isset($_POST['save'])) {
        $position = $_POST['inputjabatan'];
        $start_dt = $_POST['tglmasukjabatan'];
        $end_dt = $_POST['tglakhirjabatan'];

        //insert jabatan jemaat
        mysqli_query($con, "INSERT INTO jabatan_jemaat VALUES (NULL, '$paramJemaatId', '$position', '$start_dt', '$end_dt')");
        $jabatanJemaatId = $con->insert_id;

        //update jika end_date kosong
        mysqli_query($con, "UPDATE jabatan_jemaat SET end_date = NULL WHERE end_date = '0000-00-00' AND jabatan_jemaat_id = '$jabatanJemaatId'");

        header("location: jemaat_journey.php?jemaatId=$paramJemaatId");
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM JOURNEY JEMAAT</title>
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
                <h3 style="color: black;">Form Journey <?php echo $rowDataJemaat['fullname_jemaat']; ?></h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="jemaat.php" style="display: inline;">Jemaat</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="jemaat_journey.php?jemaatId=<?php echo $rowDataJemaat['jemaat_id']; ?>" style="display: inline;">Journey Jemaat</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_jemaat_journey.php?jemaatId=<?php echo $rowDataJemaat['jemaat_id']; ?>" style="display: inline;">Form Journey <?php echo $rowDataJemaat['fullname_jemaat']; ?></a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                <a class="btn btn-danger" href="jemaat_journey.php?jemaatId=<?php echo $rowDataJemaat['jemaat_id']; ?>" onclick="return confirm('Apakah yakin ingin membatalkan proses penginputan data?');"  role="button"><i class="fas fa-minus"></i>&ensp;Cancel</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 45%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <?php
                            $jabatan_jemaat = mysqli_query($con, "SELECT jabatan_id, nama_jabatan FROM jabatan");
                        ?>
                        <h6><b>Jabatan di Komunitas</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fas fa-sitemap" style="margin: auto;"></i></span>
                            <select class="form-select" name="inputjabatan" aria-label="Default select example" required>
                                <option hidden>Pilih Jabatan</option>
                                <?php
                                    while($list_jabatan=mysqli_fetch_array($jabatan_jemaat)) {
                                        ?>
                                            <option value="<?php echo $list_jabatan['jabatan_id']; ?>"><?php echo $list_jabatan['nama_jabatan']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="tgl-kiri" style="width: 45%; float:left;">
                            <h6><b>Tanggal Masuk Jabatan</b></h6>
                            <div class="input-group mb-3" style="padding-bottom: 10px;">
                                <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="tglmasukjabatan" style="color: black;" required>
                            </div>
                        </div>

                        <div class="tgl-kanan" style="width: 45%; float:right;">
                            <h6><b>Tanggal Akhir Jabatan</b></h6>
                            <div class="input-group mb-3" style="padding-bottom: 10px;">
                                <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="tglakhirjabatan" style="color: black;">
                            </div>
                        </div>

                        <div class="clean"></div>
                        <p style="text-align: left; font-size: 14px;">(untuk tanggal akhir jabatan bisa dikosongkan dahulu)</p>

                    </div>

                    <div class="kanan" style="width: 45%; float: left; margin-left: 25px; padding-top:30px;">
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
</body>
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>