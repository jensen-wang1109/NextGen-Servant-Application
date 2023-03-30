<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>| LUPA PASSWORD</title>
    <link rel="shortcut icon" href="img/NextGen_2.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        a {
            color: white;
        }

        a:hover {
            text-decoration: none;
            color: #1e272e;
        }

        .tombol-send {
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

        .tombol-send:hover {
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
            <div class="col-md-4 offset-md-4 form" style="margin-bottom: 50px;">
                <form action="forgot-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Lupa Password</h2>
                    <p class="text-center">Masukkan alamat email anda</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="inputemail" style="color: black;" placeholder="Masukkan Alamat Email" required value="<?php echo $email ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="tombol-send" type="submit" name="check-email" value="Kirim">
                    </div>
                </form>
            </div>
        </div>
        <div style="text-align:center; color:white;">
            <a href="login.php">CANCEL</a>
        </div>
    </div>
    
</body>
</html>