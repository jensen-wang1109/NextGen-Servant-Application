<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| REGISTER</title>
    <link rel="shortcut icon" href="img/NextGen_2.jpg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

        .card-body.p-0::-webkit-scrollbar {
            width: 8px;
        }

        .card-body.p-0::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
        }
        
        .card-body.p-0::-webkit-scrollbar-thumb {
            background: #95a5a6;
            border-radius: 10px;
        }

        .card-body.p-0::-webkit-scrollbar-thumb:hover {
            background: #7f8c8d;
        }

        body {
            height: 100vh;
            background-color: #2c3cfb;
            background-attachment: fixed;
            background-size: cover;
            font-family: Poppins;
        }

        a {
            color: white;
        }

        a:hover {
            text-decoration: none;
            color: #1e272e;
        }

        .clean {
            clear: both;
        }

        .tombol-regis {
            display: block;
            width: 100%;
            height: 50px;
            border: none;
            /* background: linear-gradient(120deg, #3498db, #8e44ad); */
            background: #0652DD;
            background-size: 200%;
            color: #fff;
            outline: none;
            cursor: pointer;
            transition: .5s;
            border-radius: 30px;
            margin-top: 10px;
        }

        .tombol-regis:hover {
            background: #3c40c6;
        }
    </style>
</head>
<body>
    <div class="container" style="width: 55%;">
        <div class="text-center">
            <img src="img/NextGen_1.jpg" alt="tidak ada gambar" class="img-fluid" style="box-sizing: border-box; width: 50%; margin-top: 50px;">
        </div>
        <div class="row justify-content-center" style="margin-bottom: -20px;">
            <div class="card o-hidden border-0 shadow-lg my-5" style="width: 508px; margin: auto;">
                <div class="card-body p-0" style="height: 320px; overflow:auto; overflow-x:hidden;">
                    <div class="row">
                        <div class="col-lg-10" style="margin: auto;">
                            <div class="p-5">
                                <form method="POST" class="user" style="margin: auto;" autocomplete="off">
                                <?php
                                    if(count($errors) == 1){
                                        ?>
                                        <div class="alert alert-danger text-center">
                                            <?php
                                            foreach($errors as $showerror){
                                                echo $showerror;
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    else if(count($errors) > 1){
                                        ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            foreach($errors as $showerror){
                                                ?>
                                                <li style="list-style: none; text-align:center;"><?php echo $showerror; ?></li>
                                                <?php
                                            }
                                            ?>
                                            </div>
                                        <?php
                                    }
                                ?>
                                
                                    <div class="input-group flex-nowrap" style="border-bottom: 2px solid gray; margin-bottom: 30px;">
                                        <span class="input-group-text" id="addon-wrapping"  style="background: transparent; border:none;"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control shadow-none" name="inputusername" placeholder="Username" value="<?php echo $username ?>" required  style="color: black; border:none;">
                                    </div>

                                    <div class="input-group flex-nowrap" style="border-bottom: 2px solid gray; margin-bottom: 30px;">
                                        <span class="input-group-text" id="addon-wrapping"  style="background: transparent; border:none;"><i class="fas fa-at"></i></span>
                                        <input type="email" class="form-control shadow-none" name="inputemail" placeholder="Email" value="<?php echo $email ?>" required  style="color: black; border:none; ">
                                    </div>

                                    <div class="input-group flex-nowrap" style="border-bottom: 2px solid gray; margin-bottom: 30px;">
                                        <span class="input-group-text" id="addon-wrapping"  style="background: transparent; border:none;"><i class="far fa-id-card"></i></span>
                                        <input type="text" class="form-control shadow-none" name="inputfullname" placeholder="Nama Lengkap" value="<?php echo $fullname ?>" required  style="color: black; border:none; ">
                                    </div>

                                    <div class="input-group flex-nowrap" style="border-bottom: 2px solid gray; margin-bottom: 30px;">
                                        <span class="input-group-text" id="addon-wrapping"  style="background: transparent; border:none;"><i class="fas fa-phone-alt"></i></span>
                                        <input type="tel" class="form-control shadow-none" name="inputnohp" placeholder="No. HP" value="<?php echo $phone ?>" maxlength="13" required  style="color: black; border:none; ">
                                    </div>

                                    <div class="gender-choice" style="text-align: left; margin-bottom: 10px; margin-top: 40px;">
                                        <div class="form-check form-check-inline" style="margin-right: 30px;">
                                            <input class="form-check-input" type="radio" name="selectedgender" id="inlineRadio1" value="Pria" style="cursor:pointer;" <?php echo (isset($_POST['selectedgender']) && $_POST['selectedgender'] == 'Pria') ?  'checked':'';?> required>
                                            <label class="form-check-label" for="inlineRadio1" style="cursor:pointer;color:black;">Pria</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="selectedgender" id="inlineRadio2" value="Wanita" style="cursor:pointer;" <?php echo (isset($_POST['selectedgender']) && $_POST['selectedgender'] == 'Wanita') ?  'checked':'';?>>
                                            <label class="form-check-label" for="inlineRadio2" style="cursor:pointer; color:black;">Wanita</label>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3" style="border-bottom: 2px solid gray; margin-top: 30px;">
                                        <label class="input-group-text" for="inputGroupSelect01" style="background: transparent; border:none;"><i class="fas fa-users"></i></label>
                                        <select class="form-select" id="inputGroupSelect01" name="role" style="color: black; border:none; width: 270px; cursor:pointer; outline:none;" required>
                                            <option class="opsi" hidden>Pilih Role</option>
                                            <option value="Super User" <?php echo (isset($_POST['role']) && $_POST['role'] == 'Super User') ?  'selected':'';?> hidden>Super User</option>
                                            <option value="Life Assistant" <?php echo (isset($_POST['role']) && $_POST['role'] == 'Life Assistant') ?  'selected':'';?>>Life Assistant</option>
                                            <option value="PIC Pengajaran" <?php echo (isset($_POST['role']) && $_POST['role'] == 'PIC Pengajaran') ?  'selected':'';?>>PIC Pengajaran</option>
                                            <option value="PIC Tim Musik" <?php echo (isset($_POST['role']) && $_POST['role'] == 'PIC Tim Musik') ?  'selected':'';?>>PIC Tim Musik</option>
                                            <option value="PIC Hospitality" <?php echo (isset($_POST['role']) && $_POST['role'] == 'PIC Hospitality') ?  'selected':'';?>>PIC Hospitality</option>
                                        </select>                   
                                    </div>

                                    <div class="input-group flex-nowrap" style="border-bottom: 2px solid gray; margin-top: 40px;">
                                        <span class="input-group-text" id="addon-wrapping" style="background: transparent; border:none;"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control shadow-none" name="inputpass" id="regis-pass" placeholder="Password (Min 8 digit)" style="color: black; border:none;" minlength="8" maxlength="255" required>
                                        <span class="input-group-text" id="basic-addon2" style="background: transparent; border:none;"><i id="toggler1" class="fas fa-eye"></i></span>

                                        <style>
                                            #toggler1:hover {
                                                cursor: pointer;
                                            }
                                        </style>

                                        <script>
                                            var password1 = document.getElementById('regis-pass');
                                            var toggler1 = document.getElementById('toggler1');

                                            showHidePassword1 = () => {
                                                if(password1.type == 'password') {
                                                    password1.setAttribute('type', 'text');
                                                    toggler1.classList.add('fa-eye-slash');
                                                }
                                                else if (password1.type = 'text') {
                                                    toggler1.classList.remove('fa-eye-slash');
                                                    password1.setAttribute('type', 'password');
                                                }
                                            };

                                            toggler1.addEventListener('click', showHidePassword1);
                                        </script>
                                    </div>

                                    <div class="input-group flex-nowrap" style="border-bottom: 2px solid gray; margin-top: 40px; margin-bottom: 40px;">
                                        <span class="input-group-text" id="addon-wrapping" style="background: transparent; border:none;"><i class="fas fa-shield-alt"></i></span>
                                        <input type="password" class="form-control shadow-none" name="konpass" id="regis-konpass" placeholder="Konfirmasi Password" style="color: black; border:none;" minlength="8" maxlength="255" required>
                                        <span class="input-group-text" id="basic-addon2" style="background: transparent; border:none;"><i id="toggler2" class="fas fa-eye"></i></span>

                                        <style>
                                            #toggler2:hover {
                                                cursor: pointer;
                                            }
                                        </style>

                                        <script>
                                            var password2 = document.getElementById('regis-konpass');
                                            var toggler2 = document.getElementById('toggler2');

                                            showHidePassword2 = () => {
                                                if(password2.type == 'password') {
                                                    password2.setAttribute('type', 'text');
                                                    toggler2.classList.add('fa-eye-slash');
                                                }
                                                else if (password2.type = 'text') {
                                                    toggler2.classList.remove('fa-eye-slash');
                                                    password2.setAttribute('type', 'password');
                                                }
                                            };

                                            toggler2.addEventListener('click', showHidePassword2);
                                        </script>
                                    </div>

                                    <input type="submit" name="signup" class="tombol-regis" value="Register">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="back-login" style="text-align:center; color: white;">
            <p>Sudah punya akun ?</p>
            <a href="login.php"><b>LOGIN</b></a>
        </div>   
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>