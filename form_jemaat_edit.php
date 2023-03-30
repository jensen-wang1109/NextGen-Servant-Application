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

    $userId = $fetch_info['ref_user_id'];

    $edit_jemaat = mysqli_query($con, "SELECT * FROM jemaat WHERE jemaat_id = '$paramJemaatId'");

    $row_edit_jemaat = mysqli_fetch_array($edit_jemaat);

    if(isset($_POST['update'])) {
        $namaLengkap = $_POST['inputnamalengkap'];
        $noHp = $_POST['inputnohp'];
        $alamatRumah = $_POST['inputalamatrumah'];
        $jenisKelamin = $_POST['inputjeniskelamin'];
        $tglLahir = $_POST['inputtanggallahir'];
        $job = ($_POST['inputpekerjaan']);
        $studies = $_POST['inputstudi'];
        $statusJemaat = $_POST['inputstatusjemaat'];

        //update data
        mysqli_query($con, "UPDATE jemaat SET fullname_jemaat = '$namaLengkap', phone_number_jemaat = '$noHp', address_jemaat = '$alamatRumah', gender_jemaat = '$jenisKelamin', dob_jemaat = '$tglLahir', job_jemaat = NULLIF('$job',''), studies_jemaat = NULLIF('$studies',''), status_jemaat = NULLIF('$statusJemaat',''), ref_user_id = '$userId' WHERE jemaat_id = '$paramJemaatId'");

        header("location: jemaat.php");
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM EDIT JEMAAT</title>
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
                <h3 style="color: black;">Form Edit Jemaat</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="jemaat.php" style="display: inline;">Jemaat</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_jemaat_edit.php?jemaatId=<?php echo $paramJemaatId;?>" style="display: inline;">Form Edit Jemaat</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                <a class="btn btn-danger" href="jemaat.php" onclick="return confirm('Apakah yakin ingin membatalkan proses mengedit data?');"  role="button"><i class="fas fa-minus"></i>&ensp;Cancel</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 45%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <h6><b>Nama Lengkap</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fas fa-address-card" style="margin: auto;"></i></span>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="inputnamalengkap" style="color: black;" value="<?php echo $row_edit_jemaat['fullname_jemaat']; ?>" required>
                        </div>

                        <h6><b>No. HP</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fas fa-mobile-alt" style="margin: auto;"></i></span>
                            <input type="number" class="form-control" placeholder="Masukkan No. HP" name="inputnohp" style="color: black;" value="<?php echo $row_edit_jemaat['phone_number_jemaat']; ?>"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==20) return false;" required>
                        </div>

                        <h6><b>Alamat Rumah</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fas fa-map-marked-alt" style="margin: auto;"></i></span>
                            <textarea cols="50" rows="4" class="form-control" style="color: black;" placeholder="Masukkan Alamat Rumah" name="inputalamatrumah" required><?php echo $row_edit_jemaat['address_jemaat']; ?></textarea>
                        </div>

                        <h6><b>Jenis Kelamin</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fas fa-venus-mars" style="margin: auto;"></i></span>
                            <select class="form-select" name="inputjeniskelamin" aria-label="Default select example" required>
                                <option hidden>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?php if($row_edit_jemaat['gender_jemaat'] == 'Laki-laki') { ?> selected="selected"<?php } ?>>Laki-laki</option>
                                <option value="Perempuan" <?php if($row_edit_jemaat['gender_jemaat'] == 'Perempuan') { ?> selected="selected"<?php } ?>>Perempuan</option>
                            </select>
                        </div>

                    </div>

                    <div class="kanan" style="width: 45%; float: left; margin-left: 25px; padding-top:30px;">
                        <h6><b>Tanggal Lahir</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="inputtanggallahir" style="color: black;" value="<?php echo $row_edit_jemaat['dob_jemaat']; ?>" required>
                        </div>

                        <h6><b>Pekerjaan</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fas fa-briefcase" style="margin: auto;"></i></span>
                            <input type="text" class="form-control" placeholder="Masukkan Pekerjaan" name="inputpekerjaan" value="<?php echo $row_edit_jemaat['job_jemaat']; ?>" style="color: black;" max="255">
                        </div>

                        <h6><b>Sekolah/Kuliah</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fas fa-graduation-cap" style="margin: auto;"></i></span>
                            <input type="text" class="form-control" placeholder="Masukkan Sekolah/Kuliah" value="<?php echo $row_edit_jemaat['studies_jemaat']; ?>" name="inputstudi" style="color: black;" max="255">
                        </div>
                        
                        <h6><b>Status</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <span class="input-group-text" style="background-color: white; color:black; font-weight: 1000; width: 15%;"><i class="fas fa-hourglass-half" style="margin: auto;"></i></span>
                            <select class="form-select" name="inputstatusjemaat" aria-label="Default select example" required>
                                <option hidden>Pilih Status</option>
                                <option value="Aktif" <?php if($row_edit_jemaat['status_jemaat'] == 'Aktif') { ?> selected="selected"<?php } ?>>Aktif</option>
                                <option value="Pindah Gereja" <?php if($row_edit_jemaat['status_jemaat'] == 'Pindah Gereja') { ?> selected="selected"<?php } ?>>Pindah Gereja</option>
                                <option value="Diistirahatkan" <?php if($row_edit_jemaat['status_jemaat'] == 'Diistirahatkan') { ?> selected="selected"<?php } ?>>Diistirahatkan</option>
                                <option value="Keluar Kota/Negeri" <?php if($row_edit_jemaat['status_jemaat'] == 'Keluar Kota/Negeri') { ?> selected="selected"<?php } ?>>Keluar Kota/Negeri</option>
                                <option value="Meninggal" <?php if($row_edit_jemaat['status_jemaat'] == 'Meninggal') { ?> selected="selected"<?php } ?>>Meninggal</option>
                                <option value="Tidak ada kejelasan" <?php if($row_edit_jemaat['status_jemaat'] == 'Tidak ada kejelasan') { ?> selected="selected"<?php } ?>>Tidak ada kejelasan</option>
                            </select>
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
</body>
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>