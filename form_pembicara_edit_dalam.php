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

    $paramPengkhotbahId = $_GET['pengkhotbahId'];

    $dataPengkhotbah = mysqli_query($con, "SELECT DATE_FORMAT(i.tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah, shift, p.*, j.fullname_jemaat FROM pengkhotbah p JOIN ibadah i ON i.ibadah_id = p.ibadah_id LEFT JOIN jemaat j ON j.jemaat_id = p.jemaat_id WHERE p.pengkhotbah_id = '$paramPengkhotbahId'");

    $rowDataPengkhotbah = mysqli_fetch_array($dataPengkhotbah);

    $userId = $fetch_info['ref_user_id'];

    if(isset($_POST['update'])) {
        // $tglIbadah = $_POST['inputtglibadah'];
        $pembicaraDalam = $_POST['inputpembicaradalam'];

        mysqli_query($con, "UPDATE pengkhotbah SET jemaat_id = '$pembicaraDalam', pengkhotbah_luar_id = NULL WHERE pengkhotbah_id = '$paramPengkhotbahId'");
        
        header("location: pembicara.php");
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM EDIT MENGGUNAKAN PENGKHOTBAH DALAM</title>
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
                <h3 style="color: black;">Form Edit Pengkhotbah</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="pembicara.php" style="display: inline;">Pengkhotbah</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_pembicara_edit_dalam.php?pengkhotbahId=<?php echo $paramPengkhotbahId; ?>" style="display: inline;">Form Edit Pengkhotbah</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;">
                <a class="btn btn-danger" href="pembicara.php" onclick="return confirm('Apakah yakin ingin membatalkan proses mengedit data?');"  role="button"><i class="fas fa-minus"></i>&ensp;Cancel</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 45%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <?php
                            $listIbadah = mysqli_query($con, "SELECT DATE_FORMAT(tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah, shift, ibadah_id FROM ibadah");
                        ?>
                        <h6><b>Tanggal Ibadah beserta Shift-nya</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputtglibadah" aria-label="Default select example" id="list_ibadah" style="color: black;" required disabled>
                                <option></option>
                                <?php 
                                    while($rowListIbadah = mysqli_fetch_array($listIbadah)) {
                                ?>
                                <option value="<?php echo $rowListIbadah['ibadah_id']; ?>" <?php if($rowDataPengkhotbah['tanggal_ibadah'] == $rowListIbadah['tanggal_ibadah'] && $rowDataPengkhotbah['shift'] == $rowListIbadah['shift']) { ?> selected="selected"<?php } ?>>
                                    <?php echo $rowListIbadah['tanggal_ibadah']; ?>
                                    , Ibadah ke-
                                    <?php echo $rowListIbadah['shift']; ?>
                                </option>
                                <?php } ?>
                            </select>                             
                        </div>
                        
                        <?php
                            $listPembicaraDalam = mysqli_query($con, "SELECT jemaat_id, fullname_jemaat FROM jemaat ORDER BY fullname_jemaat ASC");
                        ?>
                        <h6><b>Pilih Pengkhotbah Dalam</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputpembicaradalam" aria-label="Default select example" id="listpembicaradalam" style="color: black;" required>
                                <option></option>
                                <?php 
                                    while($rowListPembicaraDalam = mysqli_fetch_array($listPembicaraDalam)) {
                                ?>
                                <option value="<?php echo $rowListPembicaraDalam['jemaat_id']; ?>">
                                    <?php echo $rowListPembicaraDalam['fullname_jemaat']; ?>
                                </option>
                                <?php } ?>
                            </select>   
                        </div>
                    </div>

                    <div class="kanan" style="width: 45%; float: left; margin-left: 25px; padding-top:30px; text-align: right;">
                        <h1><b>MATIUS 28:19-20</b></h1>
                        <sup>19</sup> Karena itu pergilah, jadikanlah semua bangsa murid-Ku dan baptislah mereka dalam nama Bapa dan Anak dan Roh Kudus, 
                        <br>
                        <sup>20</sup> dan ajarlah mereka melakukan segala sesuatu yang telah Kuperintahkan kepadamu. Dan ketahuilah, Aku menyertai kamu senantiasa sampai kepada akhir zaman.”
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
            $('#listpembicaradalam').select2({
                allowClear: true,
                placeholder: "Pilih Pengkhotbah Dalam"
            });
        });
    </script>
</body>
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>