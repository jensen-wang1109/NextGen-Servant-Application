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
    $paramTemaBulananId = $_GET['temaBulananId'];
    $paramTemaMingguanId = $_GET['temaMingguanId'];

    $getTanggalTemaMingguanKedua = mysqli_query($con, "SELECT tanggal_ibadah FROM tema_mingguan tm JOIN ibadah i ON tm.ibadah_id = i.ibadah_id WHERE tm.tema_mingguan_id = '$paramTemaMingguanId'");
    $rowGetTanggalTemaMingguanKedua = mysqli_fetch_array($getTanggalTemaMingguanKedua);
    $tglTemaMingguanKedua = $rowGetTanggalTemaMingguanKedua['tanggal_ibadah'];

    $getTemaMingguanKeduaId = mysqli_query($con, "SELECT tema_mingguan_id FROM tema_mingguan tm JOIN ibadah i ON tm.ibadah_id = i.ibadah_id WHERE i.tanggal_ibadah = '$tglTemaMingguanKedua' AND i.shift = 2");
    $rowGetTemaMingguanKeduaId = mysqli_fetch_array($getTemaMingguanKeduaId);
    $temaMingguanKeduaId = $rowGetTemaMingguanKeduaId['tema_mingguan_id'];
    
    mysqli_query($con, "DELETE FROM tema_mingguan WHERE tema_mingguan_id = '$paramTemaMingguanId'");

    if(!empty($temaMingguanKeduaId)) {
        mysqli_query($con, "DELETE FROM tema_mingguan WHERE tema_mingguan_id = '$temaMingguanKeduaId'");
    }

    //Membahas bahwa natal adalah bukti kasih yang besar dari Tuhan untuk kita.
    
    // header("location: tema_mingguan.php?temaBulananId=$paramTemaBulananId");
    echo "<script>alert('Data sudah dihapus');
    document.location = 'tema_mingguan.php?temaBulananId=$paramTemaBulananId'
    </script>";
?>