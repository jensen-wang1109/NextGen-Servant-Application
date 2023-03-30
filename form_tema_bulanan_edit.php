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

    $paramTemaBulananId = $_GET['temaBulananId'];
    $dataTemaBulanan = mysqli_query($con, "SELECT * FROM tema_bulanan WHERE tema_bulanan_id = '$paramTemaBulananId'");
    $rowDataTemaBulanan = mysqli_fetch_array($dataTemaBulanan);

    // $userId = $fetch_info['ref_user_id'];

    if(isset($_POST['update'])) {
        $month = $_POST['inputbulan'];
        $year = $_POST['inputtahun'];
        $temaBulanan = $_POST['inputtemabulanan'];
        $previewTemaBulanan = $_POST['inputpreviewtemabulanan'];

        //update tema_bulanan
        mysqli_query($con, "UPDATE tema_bulanan SET judul_tema_bulanan = '$temaBulanan', preview_tema_bulanan = '$previewTemaBulanan', month = '$month', year = '$year' WHERE tema_bulanan_id = '$paramTemaBulananId'");
        
        header("location: tema.php");
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM EDIT TEMA BULANAN</title>
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
                <h3 style="color: black;">Form Edit Tema Bulanan</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="tema.php" style="display: inline;">Tema</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_tema_bulanan_edit.php?temaBulananId=<?php echo $paramTemaBulananId; ?>" style="display: inline;">Form Edit Tema Bulanan</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                <a class="btn btn-danger" href="tema.php" onclick="return confirm('Apakah yakin ingin membatalkan proses mengupdate data?');"  role="button"><i class="fas fa-minus"></i>&ensp;Cancel</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 45%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <h6><b>Periode Bulan dan Tahun</b></h6>
                        <div class="bulan" style="width: 50%; float:left;">
                            <div class="input-group mb-3" style="padding-bottom: 10px;">
                                <select class="form-select" name="inputbulan" aria-label="Default select example" id="listbulan" required>
                                    <option></option>
                                    <option value="January" <?php if($rowDataTemaBulanan['month'] == 'January') { ?> selected="selected"<?php } ?>>January</option>
                                    <option value="February" <?php if($rowDataTemaBulanan['month'] == 'February') { ?> selected="selected"<?php } ?>>February</option>
                                    <option value="March" <?php if($rowDataTemaBulanan['month'] == 'March') { ?> selected="selected"<?php } ?>>March</option>
                                    <option value="April" <?php if($rowDataTemaBulanan['month'] == 'April') { ?> selected="selected"<?php } ?>>April</option>
                                    <option value="May" <?php if($rowDataTemaBulanan['month'] == 'May') { ?> selected="selected"<?php } ?>>May</option>
                                    <option value="June" <?php if($rowDataTemaBulanan['month'] == 'June') { ?> selected="selected"<?php } ?>>June</option>
                                    <option value="July" <?php if($rowDataTemaBulanan['month'] == 'July') { ?> selected="selected"<?php } ?>>July</option>
                                    <option value="August" <?php if($rowDataTemaBulanan['month'] == 'August') { ?> selected="selected"<?php } ?>>August</option>
                                    <option value="September" <?php if($rowDataTemaBulanan['month'] == 'September') { ?> selected="selected"<?php } ?>>September</option>
                                    <option value="October" <?php if($rowDataTemaBulanan['month'] == 'October') { ?> selected="selected"<?php } ?>>October</option>
                                    <option value="November" <?php if($rowDataTemaBulanan['month'] == 'November') { ?> selected="selected"<?php } ?>>November</option>
                                    <option value="December" <?php if($rowDataTemaBulanan['month'] == 'December') { ?> selected="selected"<?php } ?>>December</option>
                                </select>
                            </div>
                        </div>

                        <div class="tahun" style="width: 40%; float:right;">
                            <div class="input-group mb-3" style="padding-bottom: 10px;">
                                <select class="form-select" name="inputtahun" aria-label="Default select example" id="listtahun" required>
                                    <option></option>
                                    <option value="2022" <?php if($rowDataTemaBulanan['year'] == '2022') { ?> selected="selected"<?php } ?>>2022</option>
                                    <option value="2023" <?php if($rowDataTemaBulanan['year'] == '2023') { ?> selected="selected"<?php } ?>>2023</option>
                                    <option value="2024" <?php if($rowDataTemaBulanan['year'] == '2024') { ?> selected="selected"<?php } ?>>2024</option>
                                    <option value="2025" <?php if($rowDataTemaBulanan['year'] == '2025') { ?> selected="selected"<?php } ?>>2025</option>
                                    <option value="2026" <?php if($rowDataTemaBulanan['year'] == '2026') { ?> selected="selected"<?php } ?>>2026</option>
                                    <option value="2027" <?php if($rowDataTemaBulanan['year'] == '2027') { ?> selected="selected"<?php } ?>>2027</option>
                                    <option value="2028" <?php if($rowDataTemaBulanan['year'] == '2028') { ?> selected="selected"<?php } ?>>2028</option>
                                    <option value="2029" <?php if($rowDataTemaBulanan['year'] == '2029') { ?> selected="selected"<?php } ?>>2029</option>
                                    <option value="2030" <?php if($rowDataTemaBulanan['year'] == '2030') { ?> selected="selected"<?php } ?>>2030</option>
                                    <option value="2031" <?php if($rowDataTemaBulanan['year'] == '2031') { ?> selected="selected"<?php } ?>>2031</option>
                                    <option value="2032" <?php if($rowDataTemaBulanan['year'] == '2032') { ?> selected="selected"<?php } ?>>2032</option>
                                </select>
                            </div>
                        </div>

                        <div class="clean"></div>
                        

                        <h6><b>Tema Bulanan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <input type="text" class="form-control" placeholder="Masukkan Tema Bulanan" name="inputtemabulanan" style="color: black;" value="<?php echo $rowDataTemaBulanan['judul_tema_bulanan']; ?>" required>
                        </div>

                        <h1><b>HABAKUK 2:14</b></h1>
                        <p>
                            Sebab bumi akan penuh dengan pengetahuan tentang kemuliaan TUHAN, seperti air yang menutupi dasar laut.
                        </p>
                        
                    </div>

                    <div class="kanan" style="width: 45%; float: left; margin-left: 25px; padding-top:30px;">
                        
                        <h6><b>Preview Tema Bulanan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <textarea cols="50" rows="10" class="form-control" style="color: black;" placeholder="Masukkan Preview Tema Bulanan" name="inputpreviewtemabulanan" required><?php echo $rowDataTemaBulanan['preview_tema_bulanan']; ?></textarea>
                        </div>
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
            $('#listbulan').select2({
                allowClear: true,
                placeholder: "Pilih Periode Bulan"
            });
        });
    </script>
    <script>
        $(document).ready(function() { 
            $('#listtahun').select2({
                allowClear: true,
                placeholder: "Pilih Periode Tahun"
            });
        });
    </script>
</body>
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>