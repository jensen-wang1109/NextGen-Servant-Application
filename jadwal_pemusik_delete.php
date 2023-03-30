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

    mysqli_query($con, "DELETE musik_ibadah, pemusik FROM musik_ibadah LEFT JOIN pemusik ON musik_ibadah.pemusik_id = pemusik.pemusik_id WHERE musik_ibadah.ibadah_id = '$paramIbadahId'");
    
    echo "<script>alert('Data sudah dihapus');
    document.location = 'jadwal_pemusik.php'
    </script>";
?>