<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| LOGIN</title>
    <link rel="shortcut icon" href="img/NextGen_2.jpg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

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

        .tombol-login {
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

        .tombol-login:hover {
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
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-10" style="margin: auto;">
                            <div class="p-5">
                                <form method="POST" class="user" autocomplete="off">
                                    <?php
                                        if(count($errors) > 0){
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
                                    ?>

                                        <div class="input-group flex-nowrap" style="border-bottom: 2px solid gray; margin-bottom: 30px;">
                                            <span class="input-group-text" id="addon-wrapping" for="login-useremail" style="background: transparent; border:none;"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control shadow-none" name="usernameemail"
                                                id="login-useremail" 
                                                placeholder="Masukkan Username atau Email" style="color: black; border:none;" required>
                                        </div>

                                        <div class="input-group flex-nowrap" style="border-bottom: 2px solid gray; margin-bottom: 30px;">
                                            <span class="input-group-text" id="addon-wrapping" for="login-pass" style="background: transparent; border:none;"><i class="fas fa-lock"></i></span>
                                            <input type="password" class="form-control shadow-none" name="pass" id="login-pass" placeholder="Masukkan Password" minlength="8" maxlength="255" style="color: black; border:none;" required>
                                            <span class="input-group-text" id="basic-addon2" style="background: transparent; border:none;"><i id="toggler" class="fas fa-eye"></i></span>

                                            <style>
                                                #toggler:hover {
                                                    cursor: pointer;
                                                }
                                            </style>

                                            <script>
                                                var password = document.getElementById('login-pass');
                                                var toggler = document.getElementById('toggler');

                                                showHidePassword = () => {
                                                    if(password.type == 'password') {
                                                        password.setAttribute('type', 'text');
                                                        toggler.classList.add('fa-eye-slash');
                                                    }
                                                    else if (password.type = 'text') {
                                                        toggler.classList.remove('fa-eye-slash');
                                                        password.setAttribute('type', 'password');
                                                    }
                                                };

                                                toggler.addEventListener('click', showHidePassword);
                                            </script>
                                        </div>
                                        <div class="lupa-pass" style="text-align: right;">
                                            <a href="forgot-password.php" style="font-size: 13px; color: black;" id="lupapass">Lupa Password ?</a>

                                            <script>
                                                let lupapass = document.getElementById('lupapass');
                                                lupapass.addEventListener('mouseover', function(){
                                                    lupapass.style.color = '#2c3cfb';
                                                    lupapass.style.fontWeight = '900';
                                                });
                                                lupapass.addEventListener('mouseleave', function(){
                                                    lupapass.style.color = 'black';
                                                    lupapass.style.fontWeight = '500';
                                                })
                                            </script>
                                        </div>
                                        <input type="submit" name="login" class="tombol-login" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="otw-login" style="text-align:center; color:white;">
            <p>Belum punya akun ?</p>
            <a href="register.php"><b>DAFTAR</b></a>
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

<?php 
    mysqli_close($con);
    ob_end_flush();
?>
</html>