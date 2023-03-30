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

<!-- delete data -->
<?php 
    $paramIbadahId = $_GET['ibadahId'];
    // $paramListUsherId = $_GET['listUsherId'];

    mysqli_query($con, "DELETE usher_ibadah, usher FROM usher_ibadah LEFT JOIN usher ON usher_ibadah.usher_id = usher.usher_id WHERE usher_ibadah.ibadah_id = '$paramIbadahId'");
    
    echo "<script>alert('Data sudah dihapus');
    document.location = 'jadwal_usher.php'
    </script>";
?>