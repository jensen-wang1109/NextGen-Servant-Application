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

    // $userId = $fetch_info['ref_user_id'];

    if(isset($_POST['save'])) {
        $namaPembicaraLuar = $_POST['inputnamapembicaraluar'];

        //insert into pengkhotbah_luar
        mysqli_query($con, "INSERT INTO pengkhotbah_luar VALUES (NULL, '$namaPembicaraLuar')");
        header("location: form_daftar_pembicara_luar.php");
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| FORM DAFTAR PENGKHOTBAH LUAR</title>
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
                <h3 style="color: black;">Form Daftar Pengkhotbah Luar</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="pembicara.php" style="display: inline;">Pengkhotbah</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="form_daftar_pembicara_luar.php" style="display: inline;">Form Daftar Pengkhotbah Luar</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;">
                <a class="btn btn-danger" href="pembicara.php" onclick="return confirm('Apakah yakin ingin membatalkan proses penginputan data?');"  role="button"><i class="fas fa-arrow-left"></i>&ensp;Back</a>
            </div>
            
            <div class="clean"></div>

            <div class="container" style="font-family: Poppins; margin-top: 30px;">
                <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="kiri" style="width: 45%; margin-left: 20px; float:left; margin-right: 35px; padding-top:30px;">
                        <h6><b>Nama Pengkhotbah Luar</b></h6>
                        <div class="input-group mb-3" style="padding-bottom: 10px;">
                            <input type="text" class="form-control" placeholder="Masukkan Nama Pengkhotbah Luar" name="inputnamapembicaraluar" style="color: black;" required>
                        </div>
                    </div>

                    <div class="kanan" style="width: 45%; float: left; margin-left: 25px; margin-top:30px; text-align: right; height: 200px; overflow:auto;">
                        <table class="table table-hover table-striped" style="color:black;">
                            <thead style="text-align: center;">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pengkhotbah Luar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody style="border-bottom: 1px solid black;">
                
                            <?php 
                                $nomor = 1;
                                
                                $query = mysqli_query($con, "SELECT * FROM pengkhotbah_luar ORDER BY nama_pengkhotbah ASC");

                                while($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr scope="row">
                                        <!-- <td class="details-control" style="width: 5%;"></td> -->
                                        <td style="text-align: right; width: 5%;"><?php echo $nomor; ?>.</td>
                                        <td style="text-align: center;">
                                            <?php
                                                echo $row['nama_pengkhotbah'];
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="form_daftar_pembicara_luar_edit.php?pengkhotbahLuarId=<?php echo $row['pengkhotbah_luar_id']; ?>" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                <?php $nomor += 1; ?>
                                <?php } ?>
                            </tbody>
                        </table>
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