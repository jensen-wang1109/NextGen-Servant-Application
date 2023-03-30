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
    $paramTemaMingguanId = $_GET['temaMingguanId'];
    $dataTema = mysqli_query($con, "SELECT *, DATE_FORMAT(tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah, CASE 
    WHEN month = 'January' THEN 1
    WHEN month = 'February' THEN 2
    WHEN month = 'March' THEN 3
    WHEN month = 'April' THEN 4
    WHEN month = 'May' THEN 5
    WHEN month = 'June' THEN 6
    WHEN month = 'July' THEN 7
    WHEN month = 'August' THEN 8
    WHEN month = 'September' THEN 9
    WHEN month = 'October' THEN 10
    WHEN month = 'November' THEN 11
    WHEN month = 'December' THEN 12
    END AS bulan FROM tema_mingguan tm JOIN tema_bulanan tb ON tm.tema_bulanan_id = tb.tema_bulanan_id JOIN ibadah i ON i.ibadah_id = tm.ibadah_id WHERE tb.tema_bulanan_id = '$paramTemaBulananId' AND tm.tema_mingguan_id = '$paramTemaMingguanId'");
    $rowDataTema = mysqli_fetch_array($dataTema);
    

    // $userId = $fetch_info['ref_user_id'];

    if(isset($_POST['update'])) {
        // $tglIbadah = $_POST['inputtglibadah'];
        $temaMingguan = $_POST['inputtemamingguan'];
        $previewTemaMingguan = $_POST['inputpreviewtemamingguan'];

        $getTglIbadah = mysqli_query($con, "SELECT tanggal_ibadah FROM tema_mingguan tm JOIN ibadah i ON tm.ibadah_id = i.ibadah_id WHERE tm.tema_mingguan_id = '$paramTemaMingguanId'");
        $rowGetTglIbadah = mysqli_fetch_array($getTglIbadah);
        $tglIbadahKedua = $rowGetTglIbadah['tanggal_ibadah'];

        $getIbadahKeduaId = mysqli_query($con, "SELECT ibadah_id FROM ibadah WHERE tanggal_ibadah = '$tglIbadahKedua' AND shift = 2");
        $rowGetIbadahKeduaId = mysqli_fetch_array($getIbadahKeduaId);
        $ibadahKeduaId = $rowGetIbadahKeduaId['ibadah_id'];

        $getTemaMingguanKeduaId = mysqli_query($con, "SELECT tema_mingguan_id FROM tema_mingguan tm JOIN ibadah i ON tm.ibadah_id = i.ibadah_id WHERE i.tanggal_ibadah = '$tglIbadahKedua' AND i.shift = 2");
        $rowGetTemaMingguanKeduaId = mysqli_fetch_array($getTemaMingguanKeduaId);
        $temaMingguanKeduaId = $rowGetTemaMingguanKeduaId['tema_mingguan_id'];

        //update tema_mingguan
        mysqli_query($con, "UPDATE tema_mingguan SET judul_tema_mingguan = '$temaMingguan', preview_tema_mingguan = '$previewTemaMingguan' WHERE tema_mingguan_id = '$paramTemaMingguanId'");

        // mysqli_query($con, "UPDATE tema_mingguan SET judul_tema_mingguan = '$temaMingguan', preview_tema_mingguan = '$previewTemaMingguan' WHERE tema_mingguan_id = '$temaMingguanKeduaId'");

        if(!empty($temaMingguanKeduaId)) {
            mysqli_query($con, "UPDATE tema_mingguan SET judul_tema_mingguan = '$temaMingguan', preview_tema_mingguan = '$previewTemaMingguan' WHERE tema_mingguan_id = '$temaMingguanKeduaId'");
        }
    
        header("location: tema_mingguan.php?temaBulananId=$paramTemaBulananId");
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM EDIT TEMA MINGGUAN</title>
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
                <h3 style="color: black;">Form Edit Tema Mingguan</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="tema.php" style="display: inline;">Tema</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="tema_mingguan.php?temaBulananId=<?php echo $paramTemaBulananId; ?>" style="display: inline;">Tema Mingguan</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_tema_mingguan_edit.php?temaBulananId=<?php echo $paramTemaBulananId; ?>&temaMingguanId=<?php echo $paramTemaMingguanId; ?>" style="display: inline;">Form Edit Tema Mingguan</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                <a class="btn btn-danger" href="tema_mingguan.php?temaBulananId=<?php echo $paramTemaBulananId; ?>" onclick="return confirm('Apakah yakin ingin membatalkan proses mengedit data?');"  role="button"><i class="fas fa-minus"></i>&ensp;Cancel</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 45%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <h6><b>Tema Bulanan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <input type="text" class="form-control" placeholder="Masukkan Tema Bulanan" name="inputtemabulanan" value="<?php echo $rowDataTema['month'] ?> <?php echo $rowDataTema['year'] ?>: <?php echo $rowDataTema['judul_tema_bulanan'] ?>" style="color: black;" disabled>
                        </div>

                        <h6><b>Preview Tema Bulanan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <textarea cols="50" rows="10" class="form-control" style="color: black;" placeholder="Masukkan Preview Tema Bulanan" name="inputpreviewtemabulanan" disabled><?php echo $rowDataTema['preview_tema_bulanan'] ?></textarea >
                        </div>

                        <h1><b>LUKAS 1:37</b></h1>
                        <p>
                            Sebab bagi Allah tidak ada yang mustahil.”
                        </p>
                    </div>

                    <div class="kanan" style="width: 45%; float: left; margin-left: 25px; padding-top:30px;">
                        <?php
                            $year = $rowDataTema['year'];
                            $month = $rowDataTema['bulan'];
                            $ibadahId = $rowDataTema['ibadah_id'];
                            
                            $listIbadah = mysqli_query($con, "SELECT DATE_FORMAT(tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah, shift, ibadah_id FROM ibadah WHERE EXTRACT(YEAR FROM tanggal_ibadah) = '$year' AND EXTRACT(MONTH FROM tanggal_ibadah) = '$month' GROUP BY tanggal_ibadah");
                        ?>
                        <h6><b>Tanggal Ibadah</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <select class="form-select" name="inputtglibadah" aria-label="Default select example" id="list_ibadah" style="color: black;" required disabled>
                                <option></option>
                                <?php 
                                    while($rowListIbadah = mysqli_fetch_array($listIbadah)) {
                                ?>
                                <option value="<?php echo $rowListIbadah['ibadah_id'];?>" <?php if($rowDataTema['tanggal_ibadah'] == $rowListIbadah['tanggal_ibadah']) { ?> selected="selected"<?php } ?>>
                                    <?php echo $rowListIbadah['tanggal_ibadah']; ?>
                                </option>
                                <?php } ?>
                            </select>                             
                        </div>

                        <h6><b>Tema Mingguan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <input type="text" class="form-control" placeholder="Masukkan Tema Mingguan" name="inputtemamingguan" style="color: black;" value="<?php echo $rowDataTema['judul_tema_mingguan']; ?>" required>
                        </div>

                        <h6><b>Preview Tema Mingguan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <textarea cols="50" rows="10" class="form-control" style="color: black;" placeholder="Masukkan Preview Tema Mingguan" name="inputpreviewtemamingguan" required><?php echo $rowDataTema['preview_tema_mingguan']; ?></textarea >
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
            $('#list_ibadah').select2({
                allowClear: true,
                placeholder: "Pilih Ibadah"
            });
        });
    </script>
</body>
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>