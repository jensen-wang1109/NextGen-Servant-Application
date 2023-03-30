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
    $paramTemaBulananId = $_GET['temaBulananId'];
    $dataTema = mysqli_query($con, "SELECT *, 
    CASE 
    WHEN month = 'January' THEN 1
    WHEN month = 'February' THEN 2
    WHEN month = 'March' THEN 3
    WHEN month = 'April' THEN 4
    WHEN month = 'May' THEN 5
    WHEN month = 'June' THEN 6
    WHEN month = 'July' THEN 7
    WHEN month = 'August' THEN 8
    WHEN month = 'September' THEN 9
    WHEN month = 'October' THEN 10
    WHEN month = 'November' THEN 11
    WHEN month = 'December' THEN 12
    END AS bulan,
    GROUP_CONCAT(i.ibadah_id) AS multi_ibadah_id
    FROM tema_bulanan tb LEFT JOIN tema_mingguan tm ON tb.tema_bulanan_id = tm.tema_bulanan_id LEFT JOIN ibadah i ON i.ibadah_id = tm.ibadah_id WHERE tb.tema_bulanan_id = '$paramTemaBulananId' GROUP BY tb.tema_bulanan_id;");
    $rowDataTema = mysqli_fetch_array($dataTema);
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| TEMA MINGGUAN</title>
    <link rel="shortcut icon" href="img/NextGen_2.jpg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- <style>
        td.details-control {
            background: url("img/angle-double-right-solid.svg") no-repeat center center;
            background-size: 20px;
            cursor: pointer;
        }
        td.details-control:hover {
            background: url("img/angle-double-down-solid.svg") no-repeat center center;
            background-size: 15px;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url("img/angle-double-down-solid.svg") no-repeat center center;
            background-size: 15px;
        }

        tr.shown td.details-control:hover {
            background: url("img/angle-double-right-solid.svg") no-repeat center center;
            background-size: 20px;
        }
    </style> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>
<body id="page-top" style="font-family: Poppins;">
    <div id="wrapper">
        <?php include "header.php";?>
        <!-- Page Heading -->
        <div class="container fluid">
            <div class="page_head" style="margin-bottom: 50px;">
                <h3 style="color: black;"><?php echo $rowDataTema['month'] ?> <?php echo $rowDataTema['year'] ?>: <b><?php echo $rowDataTema['judul_tema_bulanan'] ?></b></h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="tema.php" style="display: inline;">Tema</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="tema_mingguan.php?temaBulananId=<?php echo $paramTemaBulananId; ?>" style="display: inline;">Tema Mingguan</a>
            </div>

            <div class="row" style="font-family: Poppins; margin-right:20px; color: black;">
                <h5><b>Preview:</b></h5>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; margin-right:20px; color: black;">
                <p><?php echo $rowDataTema['preview_tema_bulanan'] ?></p>
            </div>

            <div class="clean"></div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;">
                <a class="btn btn-danger" href="tema.php" role="button"><i class="fas fa-arrow-left"></i>&ensp;Back</a>
            </div>

            <?php 
                $year = $rowDataTema['year'];
                $month = $rowDataTema['bulan'];

                if (empty($rowDataTema['ibadah_id'])) {
                    $ibadahId = 0;
                }
                else {
                    $ibadahId = $rowDataTema['multi_ibadah_id'];
                }
                 

                $listIbadah = mysqli_query($con, "SELECT DATE_FORMAT(tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah, shift, ibadah_id FROM ibadah WHERE EXTRACT(YEAR FROM tanggal_ibadah) = '$year' AND EXTRACT(MONTH FROM tanggal_ibadah) = '$month' AND ibadah_id NOT IN ($ibadahId) GROUP BY tanggal_ibadah;");

                if(mysqli_num_rows($listIbadah) != 0) {
                    ?>
                        <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                            <a class="btn btn-success" href="form_tema_mingguan.php?temaBulananId=<?php echo $paramTemaBulananId; ?>" role="button"><i class="fas fa-plus"></i>&ensp;Add Tema Mingguan</a>
                        </div>
                    <?php
                }
            ?>
            

            <div class="clean"></div>

            <div class="row" style="border: 1px solid gray; background-color: white; color: black; margin-top: 20px;">
                <div class="col-sm-12" style="margin-top: 20px; margin-bottom: 20px;  overflow:auto;">

                    <table id="table" class="table table-hover table-striped" style="color:black;">
                        <thead style="text-align: center;">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Tema Mingguan</th>
                                <th scope="col">Preview Tema Mingguan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody style="border-bottom: 1px solid black;">
            
                        <?php 
                            $nomor = 1;
                            
                            $query = mysqli_query($con, "SELECT *, DATE_FORMAT(tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah FROM tema_mingguan tm JOIN tema_bulanan tb ON tm.tema_bulanan_id = tb.tema_bulanan_id JOIN ibadah i ON i.ibadah_id = tm.ibadah_id WHERE tb.tema_bulanan_id = '$paramTemaBulananId' GROUP BY tanggal_ibadah ORDER BY tanggal_ibadah ASC");

                            while($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr scope="row">
                                    <td style="text-align: right; width: 5%;"><?php echo $nomor; ?>.</td>
                                    <td><?php echo $row['tanggal_ibadah']; ?></td>
                                    <td><?php echo $row['judul_tema_mingguan']; ?></td> 
                                    <td><?php echo $row['preview_tema_mingguan']; ?></td>
                                    <td style="text-align: center; width:10%;" class="ed">
                                        <a href="form_tema_mingguan_edit.php?temaBulananId=<?php echo $paramTemaBulananId; ?>&temaMingguanId=<?php echo $row['tema_mingguan_id']; ?>" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="tema_mingguan_delete.php?temaBulananId=<?php echo $paramTemaBulananId; ?>&temaMingguanId=<?php echo $row['tema_mingguan_id']; ?>" onclick="return confirm('Yakin menghapus data?')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                
                            <?php $nomor += 1; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>
        <!-- <script>
            function format (p2) {
                let address = (p2[9].split("|"));
                let job = (p2[10].split("|"));
                let studies = (p2[11].split("|"));
                
                let html_result = "<h6><b>Informasi Tambahan</b></h6><table style='width: 100%;'>";
                for(let i = 0; i<address.length; i++){
                    html_result += "<tr style='background-color:white;'><td style='background-color:rgba(0, 0, 0, 0.05); font-weight:800; text-align:center; width: 20%;'>Alamat</td><td>"+ address[i] +"</td></tr><tr style='background-color:white;'><td style='background-color:rgba(0, 0, 0, 0.05); font-weight:800; text-align:center;'>Pekerjaan</td><td>"+ job[i] +"</td></tr><tr style='background-color:white;'><td style='background-color:rgba(0, 0, 0, 0.05); font-weight:800; text-align:center;'>Studi</td><td>"+ studies[i] +"</td></tr>";
                }
                html_result += "</table>";
                return html_result;
            }
        </script> -->
    </div>
</body>
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>