<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>| UBAH PASSWORD</title>
    <link rel="shortcut icon" href="img/NextGen_2.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            height: 100vh;
            background-color: #2c3cfb;
            background-attachment: fixed;
            background-size: cover;
            font-family: Poppins;
        }

        ::selection{
            color: #fff;
            background: #3297fd;
        }

        .tombol-change {
            display: block;
            width: 100%;
            height: 50px;
            border: none;
            background: #0652DD;
            background-size: 200%;
            color: #fff;
            outline: none;
            cursor: pointer;
            transition: .5s;
            border-radius: 30px;
            margin-top: 10px;
        }

        .tombol-change:hover {
            background: #3c40c6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="text-center" style="margin:auto;">
                <img src="img/NextGen_1.jpg" alt="tidak ada gambar" class="img-fluid" style="box-sizing: border-box; width: 50%; margin-bottom: 50px;">
            </div>
            <div class="col-md-4 offset-md-4 form" style="margin-bottom: 100px;">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Password Baru</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Password Baru (Min 8 Digit)" style="color:black; border-right:none;" minlength="8" maxlength="255" id="newpass" required>
                        <span class="input-group-text" id="basic-addon2" style="background: transparent; border-left:none; border-radius:0;"><i id="toggler1" class="fas fa-eye"></i></span>
                    </div>
                    <style>
                        #toggler1:hover {
                            cursor: pointer;
                        }
                    </style>

                    <script>
                        var password1 = document.getElementById('newpass');
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

                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="cpassword" placeholder="Konfirmasi Password Baru" style="color:black; border-right:none;" minlength="8" maxlength="255" id="cnewpass" required>
                        <span class="input-group-text" id="basic-addon2" style="background: transparent; border-left:none; border-radius:0;"><i id="toggler2" class="fas fa-eye"></i></span>
                    </div>
                    <style>
                        #toggler2:hover {
                            cursor: pointer;
                        }
                    </style>

                    <script>
                        var password2 = document.getElementById('cnewpass');
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

                    <div class="form-group">
                        <input class="tombol-change" type="submit" name="change-password" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>