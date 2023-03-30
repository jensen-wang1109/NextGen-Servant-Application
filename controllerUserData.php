<?php 
session_start();
require "include/config.php";
$username = "";
$email = "";
$fullname = "";
$phone = "";
$role = "";
$gender = "";
$errors = array();

function sendGmail($randomcode, $subject) {
    $url = "https://script.google.com/macros/s/AKfycbwiN3ZGEyr7rChRwhj_TQ166X27leFRiYxWORbiQOHHm6wmkzRvQuNdsp0q-T2U-im2tA/exec";
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POSTFIELDS => http_build_query([
            "recipient" => $_POST['inputemail'],
            "subject"   => $subject,
            "body"      => "Your Code Is $randomcode"
        ])
    ]);
    curl_exec($ch);
}

//if user signup button
if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($con, $_POST['inputusername']);
    $email = mysqli_escape_string($con, $_POST['inputemail']);
    $fullname = mysqli_escape_string($con, $_POST['inputfullname']);
    $phone = mysqli_escape_string($con, $_POST['inputnohp']);
    $gender = mysqli_escape_string($con, $_POST['selectedgender']);
    $role = mysqli_escape_string($con, $_POST['role']);
    $password = mysqli_real_escape_string($con, $_POST['inputpass']);
    $cpassword = mysqli_real_escape_string($con, $_POST['konpass']);
    if($password !== $cpassword){
        $errors['password'] = "Konfirmasi password tidak sesuai!";
    }
    $email_check = "SELECT * FROM ref_user WHERE email = '$email'";
    $username_check = "SELECT * FROM ref_user WHERE username = '$username'";
    $res = mysqli_query($con, $email_check);
    $res2 = mysqli_query($con, $username_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email sudah terdaftar!";
    }
    if(mysqli_num_rows($res2) > 0){
        $errors['username'] = "Username sudah terdaftar!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "not verified";
        $insert_data = "INSERT INTO ref_user (fullname, email, username, password, phone_number, role, gender, status, code) VALUES ('$fullname', '$email', '$username', '$encpass', '$phone', '$role', '$gender', '$status', '$code')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check) {
            $subject = "Registration Verification Code";
            sendGmail($code, $subject);
            if(function_exists('sendGmail')){
                $info = "Kami telah mengirim kode verifikasi ke email anda - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }
            else {
                $errors['otp-error'] = "Gagal ketika mengirim kode verifikasi!";
            }
        }
        else {
            $errors['db-error'] = "Gagal ketika memasukkan data ke database!";
        }
    }
}

//if user click verification code submit button
if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM ref_user WHERE code = '$otp_code'";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE ref_user SET code = '$code', STATUS = '$status' WHERE code = '$fetch_code'";
        $update_res = mysqli_query($con, $update_otp);
        if($update_res) {
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            header('location: index.php');
            exit();
        }
        else {
            $errors['otp-error'] = "Gagal ketika update kode verfikasi!";
        }
    }
    else {
        $errors['otp-error'] = "Kode yang dimasukkan salah!";
    }
}

//if user click login button
if(isset($_POST['login'])){
    $usernameemail = mysqli_real_escape_string($con, $_POST['usernameemail']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $check_usernameemail = "SELECT * FROM ref_user WHERE email = '$usernameemail' OR username = '$usernameemail'";
    $res = mysqli_query($con, $check_usernameemail);

    if(mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];

        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $usernameemail;
            $status = $fetch['status'];
            if($status == 'verified'){
                $_SESSION['email'] = $usernameemail;
                $_SESSION['password'] = $password;
                header('location: index.php');
            }
            else{
                $info = "Email belum terverifikasi";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        }
        else {
            $errors['email'] = "Salah email/username atau password!";
        }
    }
    else{
        $errors['email'] = "Anda belum terdaftar, silahkan daftar terlebih dahulu.";
    }
}

//if user click continue button in forgot password form
if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($con, $_POST['inputemail']);
    $check_email = "SELECT * FROM ref_user WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE ref_user SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            $subject = "Reset Code";
            sendGmail($code, $subject);
            if(function_exists('sendGmail')){
                $info = "Kami telah mengirim kode verifikasi ke email anda - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            }
            else{
                $errors['otp-error'] = "Gagal ketika mengirim kode!";
            }
        }
        else{
            $errors['db-error'] = "Terjadi kesalahan!";
        }
    }
    else{
        $errors['email'] = "Alamat email tidak terdaftar!";
    }
}

//if user click check reset otp button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM ref_user WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Silahkan membuat password baru.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    }else{
        $errors['otp-error'] = "Kode yang dimasukkan salah!";
    }
}

//if user click change password button
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Konfirmasi password tidak sesuai!";
    }
    else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE ref_user SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
            $info = "Password telah diubah. Silahkan login lagi dengan password yang baru.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        }
        else {
            $errors['db-error'] = "Gagal mengubah password!";
        }
    }
}

//if login now button click
if(isset($_POST['login-now'])){
    header('Location: login.php');
}
?>