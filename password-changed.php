<?php require_once "controllerUserData.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: login.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>| PASSWORD TELAH DIUBAH</title>
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

        .tombol-login-now {
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

        .tombol-login-now:hover {
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
            <div class="col-md-4 offset-md-4 form login-form" style="margin-bottom: 100px;">
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input class="tombol-login-now" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>