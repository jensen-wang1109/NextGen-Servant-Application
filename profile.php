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
    $duplicate;

    if(isset($_POST['diplayPicture'])) {
        $fotoProfile = $_FILES['photo_profile']['name'];
        $tempFotoProfile = $_FILES['photo_profile']['tmp_name'];
        $ekstensiFotoProfile = pathinfo($fotoProfile, PATHINFO_EXTENSION);

        if(($ekstensiFotoProfile == "jpg") || ($ekstensiFotoProfile == "png") || ($ekstensiFotoProfile == "jpeg") || ($ekstensiFotoProfile == "JPG") || ($ekstensiFotoProfile == "PNG")) {
            move_uploaded_file($tempFotoProfile, 'profile_picture/'.$fotoProfile);
            mysqli_query($con, "UPDATE ref_user SET photo = '$fotoProfile' WHERE ref_user_id = '$userId'");

            header("location: profile.php");
        }
    }

    if(isset($_POST['Edit'])) {
        $fullname_user = $_POST['updatefullname'];
        $email_user = $_POST['updateemail'];
        $username_user = $_POST['updateusername'];
        $nohp_user = $_POST['updatephonenumber'];

        $cek_email = mysqli_query($con, "SELECT * FROM ref_user WHERE email = '$email_user' AND ref_user_id != '$userId'");
        $cek_username = mysqli_query($con, "SELECT * FROM ref_user WHERE username = '$username_user' AND ref_user_id != '$userId'");

        // if(mysqli_num_rows($cek_email) > 0) {
        //     echo "<script>
        //         alert('Email sudah terdaftar! gunakan alamat email yang lain');
        //         document.location = 'profile.php'
        //     </script>";
        //     $duplicate = "duplikasi email";
        // }

        if(mysqli_num_rows($cek_username) > 0 && mysqli_num_rows($cek_email) > 0) {
            echo "<script>
                alert('Email dan Username sudah terdaftar! gunakan email dan username yang lain');
                document.location = 'profile.php'
            </script>";
            $duplicate = "duplikasi username dan email";
        }
        elseif(mysqli_num_rows($cek_username) > 0) {
            echo "<script>
                alert('Username sudah terdaftar! gunakan username yang lain');
                document.location = 'profile.php'
            </script>";
            $duplicate = "duplikasi username";
        }
        elseif(mysqli_num_rows($cek_email) > 0) {
            echo "<script>
                alert('Email sudah terdaftar! gunakan email yang lain');
                document.location = 'profile.php'
            </script>";
            $duplicate = "duplikasi email";
        }

        if(empty($duplicate)) {
            mysqli_query($con, "UPDATE ref_user SET fullname = '$fullname_user', phone_number = '$nohp_user', email = '$email_user', username = '$username_user' WHERE ref_user_id = '$userId'");

            echo "<script>
                alert('Data user sudah diupdate, silahkan login kembali!');
                document.location = 'logout.php'
            </script>";
        }
    }
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| PROFILE</title>
    <link rel="shortcut icon" href="img/NextGen_2.jpg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/style_web_2.css">
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

        .input-group-text::-webkit-scrollbar {
            height: 5px;
        }

        .input-group-text::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
        }
        
        .input-group-text::-webkit-scrollbar-thumb {
            background: #95a5a6;
            border-radius: 10px;
        }

        .input-group-text::-webkit-scrollbar-thumb:hover {
            background: #7f8c8d;
        }
    </style>

    
    
</head>

<body id="page-top" style="color: black; font-family: Poppins;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "header.php";?>
            <div class="container-fluid">
                <div class="page_head" style="margin-bottom: 50px;">
                    <h3 style="color: black;">Profile</h3>
                    <a href="index.php" style="display: inline;">Home</a>
                    <p style="display: inline;">&ensp; / &ensp;</p>
                    <a href="profile.php" style="display: inline;">Profile</a>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <!-- Profile Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                            </div>
                            <div class="card-body">
                                <h5 style="color: black;">Selamat datang,</h5>
                                <?php if(is_file("profile_picture/".$fetch_info['photo'])) { ?>
                                    <img src="profile_picture/<?php echo $fetch_info['photo']?>" class="img-profile" style="width: 100px; height: 100px; float: left; clip-path:circle();">
                                <?php } else { ?> 
                                    <img src="img/sample_user.png" class="img-profile" style="width: 100px; height: 100px; float: left; clip-path:circle();">
                                <?php } ?>
                                
                                <div class="intro" style="color: black; float: left; width: 77%; margin-top: 10px; margin-left: 10px;">
                                    <h5><b>
                                        <?php 
                                            if ($fetch_info['gender'] == 'Pria') {
                                                ?>Bpk./Sdr. <?php
                                            }
                                            else {
                                                ?>Ibu./Sdri. <?php
                                            }
                                            
                                            echo $fetch_info['fullname'];
                                        ?>
                                        </b>
                                    </h5>
                                    <div class="line" style="width: auto; height: 3px; background-color: black;"></div>
                                    <h5 style="margin-top: 10px;"><?php echo $fetch_info['role'] ?></h5>
                                </div>
                                <div class="clean"></div>
                                <br>
                                <label for="profile-change" title="Change Display Picture" id="label-profile" data-toggle="modal" data-target="#modalProfile" style="color:#0067B8;">
                                    <i class="fas fa-upload"></i>&ensp;Change Display Picture              
                                </label>

                                <style>
                                    #label-profile:hover {
                                        cursor: pointer;
                                    }
                                </style>

                                <!-- Modal -->
                                <div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div style="text-align:center;">
                                                <?php if(is_file("profile_picture/".$fetch_info['photo'])) { ?>
                                                <img src="profile_picture/<?php echo $fetch_info['photo']?>" class="img-profile" style="width: 100px; height: 100px; clip-path:circle();">
                                                <?php } else { ?> 
                                                <img src="img/sample_user.png" class="img-profile" style="width: 100px; height: 100px; clip-path:circle();">
                                                <?php } ?>
                                            </div>
                                            <input type="file" id="myFile" name="photo_profile">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-primary" value="Save Changes" name="diplayPicture">
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container" style="font-family:Poppins;">
                    <form style="color: black; padding-bottom: 50px; background-color: white;" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="bag1">
                            <div class="header1" style="width: 20%; float:left; text-align:center; margin-right: 30px; padding-top: 150px;">
                                <h5 style="margin-top: 30%;">Data User</h5>
                            </div>
                            
                            <div class="content1" style="float:left; width: 75%; padding-top: 35px;">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="background-color: white; color:black; border:none;"><i class="far fa-id-card" style="margin: auto;"></i></span>
                                    <span class="input-group-text" style="background-color: white; color:black; width: 35%; border:none; overflow:auto;">Nama</span>                                
                                    <input type="text" class="form-control shadow-none" value="<?php echo $fetch_info['fullname']; ?>" style="color: black; background-color:white; border: none;" name="updatefullname">
                                </div>


                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="background-color: white; color:black; border:none;"><i class="fas fa-at" style="margin: auto;"></i></span>
                                    <span class="input-group-text" style="background-color: white; color:black; width: 35%; border:none; overflow:auto;">Email</span>                                
                                    <input type="email" class="form-control shadow-none" value="<?php echo $fetch_info['email']; ?>" style="color: black; background-color:white; border: none;" name="updateemail">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="background-color: white; color:black; border:none;"><i class="fas fa-user" style="margin: auto;"></i></span>
                                    <span class="input-group-text" style="background-color: white; color:black; width: 35%; border:none; overflow:auto;">Username</span>                                
                                    <input type="text" class="form-control shadow-none" value="<?php echo $fetch_info['username']; ?>" style="color: black; background-color:white; border: none;" name="updateusername">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="background-color: white; color:black; border:none;"><i class="fas fa-phone-alt" style="margin: auto;"></i></span>
                                    <span class="input-group-text" style="background-color: white; color:black; width: 35%; border:none; overflow:auto;">No. HP</span>                                
                                    <input type="text" class="form-control shadow-none" value="<?php echo $fetch_info['phone_number']; ?>" style="color: black; background-color:white; border: none;" name="updatephonenumber">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="background-color: white; color:black; border:none;"><i class="fas fa-users" style="margin: auto;"></i></span>
                                    <span class="input-group-text" style="background-color: white; color:black; width: 35%; border:none; overflow:auto;">Role</span>                                
                                    <input type="text" class="form-control shadow-none" value="<?php echo $fetch_info['role']; ?>" style="color: black; background-color:white; border: none;" readonly>
                                </div>
                                
                                
                                <!-- <div class="input-group mb-3">
                                    <span class="input-group-text" style="background-color: white; color:black; border:none;"><i class="far fa-image" style="margin: auto;"></i></span>
                                    <span class="input-group-text" style="background-color: white; color:black; width: 35%; overflow:auto; border:none;">Foto Profil</span>                                
                                    <input type="file" class="form-control" name="file" style="border: none; color:black;">
                                </div> -->

                                <!-- <p style="color: red; display: none;" id="foto_wajib"><b>Masukkan foto</b> -->
                            <div class="clean"></div>
                        </div>
                        
                                            
                        <div class="clean"></div>
                        <center style="margin-top: 30px;">
                            <input type="submit" class="btn btn-primary" value="Update Data User" name="Edit">
                        </center>
                        
                    </form>
                </div>
            </div>      
    </div>
    <?php include "footer.php"; ?>

</body>
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>