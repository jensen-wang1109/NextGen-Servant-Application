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
    $paramIbadahId = $_GET['ibadahId'];

    $dataIbadah = mysqli_query($con, "SELECT *, DATE_FORMAT(tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah FROM ibadah WHERE ibadah_id = '$paramIbadahId'");
    $rowDataIbadah = mysqli_fetch_array($dataIbadah);
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| DETAIL IBADAH TANGGAL <?php echo strtoupper($rowDataIbadah['tanggal_ibadah']); ?>, IBADAH KE-<?php echo $rowDataIbadah['shift']; ?></title>
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
                <h3 style="color: black;">Detail Ibadah: <b><?php echo $rowDataIbadah['tanggal_ibadah']; ?></b>, Ibadah Ke-<b><?php echo $rowDataIbadah['shift']; ?></b></h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="ibadah.php" style="display: inline;">Ibadah</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="ibadah_detail.php?ibadahId=<?php echo $paramIbadahId; ?>" style="display: inline;">Detail Ibadah</a>
            </div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;">
                <a class="btn btn-danger" href="ibadah.php" role="button"><i class="fas fa-arrow-left"></i>&ensp;Back</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="border: 1px solid gray; background-color: white; color: black; margin-top: 20px;">
                <div class="col-sm-12" style="margin-top: 20px; margin-bottom: 20px;  overflow:auto;">
                    <h6><b>Export as:</b></h6>

                    <table id="table_ibadah" class="table table-hover" style="color:black;">
                        <thead style="text-align: center;">
                            <tr>
                                <th scope="col">Tema Bulanan</th>
                                <th scope="col">Tema Mingguan</th>
                                <th scope="col">Pengkhotbah</th>
                                <th scope="col">List Usher</th>
                                <th scope="col">List Pemusik</th>
                            </tr>
                        </thead>

                        <tbody style="border-bottom: 1px solid black;">
            
                        <?php 
                            $nomor = 1;
                            
                            $query = mysqli_query($con, "SELECT i.ibadah_id, DATE_FORMAT(tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah, i.shift,
                            tb.judul_tema_bulanan, tb.preview_tema_bulanan, tm.judul_tema_mingguan, tm.preview_tema_mingguan,
                            CASE 
                                WHEN pk.pengkhotbah_luar_id IS NULL THEN j.fullname_jemaat
                                WHEN pk.jemaat_id IS NULL THEN pl.nama_pengkhotbah
                            END AS pembicara
                            FROM ibadah i
                            LEFT JOIN tema_mingguan tm ON tm.ibadah_id = i.ibadah_id
                            LEFT JOIN tema_bulanan tb ON tm.tema_bulanan_id = tb.tema_bulanan_id
                            LEFT JOIN pengkhotbah pk ON pk.ibadah_id = i.ibadah_id
                            LEFT JOIN jemaat j ON pk.jemaat_id = j.jemaat_id
                            LEFT JOIN pengkhotbah_luar pl ON pk.pengkhotbah_luar_id = pl.pengkhotbah_luar_id
                            WHERE i.ibadah_id = '$paramIbadahId' 
                            GROUP BY i.ibadah_id,i.shift;");

                            $query2 = mysqli_query($con, "SELECT GROUP_CONCAT(CONCAT(j.fullname_jemaat, ' -> ' ,ui.keterangan_usher) SEPARATOR '<br>\n') AS list_usher FROM usher u 
                            JOIN usher_ibadah ui ON u.usher_id = ui.usher_id
                            JOIN ibadah i ON ui.ibadah_id = i.ibadah_id
                            JOIN jemaat j ON j.jemaat_id = u.jemaat_id
                            WHERE i.ibadah_id = '$paramIbadahId'");

                            $query3 = mysqli_query($con, "SELECT GROUP_CONCAT(CONCAT(j.fullname_jemaat, ' -> ' , jp.nama_jenis_pemusik) SEPARATOR '<br>\n') AS list_pemusik FROM pemusik p JOIN musik_ibadah mi ON p.pemusik_id = mi.pemusik_id JOIN jenis_pemusik jp ON mi.jenis_pemusik_id = jp.jenis_pemusik_id JOIN ibadah i ON mi.ibadah_id = i.ibadah_id JOIN jemaat j ON j.jemaat_id = p.jemaat_id WHERE i.ibadah_id = '$paramIbadahId';");

                            while($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr scope="row">
                                    <td id="tema_bulanan" style="width: 15%; word-wrap: break-word;">
                                        <?php echo $row['judul_tema_bulanan']; ?>
                                        <br>
                                        <div style="font-size: 12px; background-color:#d1dade; color:black; border-radius:2px; width:100%; text-align:left; word-wrap: break-word; padding: 2px;"><b><?php echo $row['preview_tema_bulanan']; ?></b></div>
                                    </td>
                                    <td id="tema_mingguan" style="width: 20%; word-wrap: break-word;">
                                        <?php echo $row['judul_tema_mingguan']; ?>
                                        <br>
                                        <div style="font-size: 12px; background-color:#d1dade; color:black; border-radius:2px; width:100%; text-align:left; word-wrap: break-word; padding: 2px;"><b><?php echo $row['preview_tema_mingguan']; ?></b></div>
                                    </td>

                                    <td id="pengkhotbah" style="word-wrap: break-word;"><?php echo $row['pembicara']; ?></td>

                                    <td id="list_usher" style="word-wrap: break-word;">
                                        <?php
                                            while($row2 = mysqli_fetch_array($query2)) {
                                                ?>
                                                <?php echo $row2['list_usher']; ?>
                                                <?php
                                            }
                                        ?>
                                    </td>

                                    <td id="list_pemusik" style="word-wrap: break-word;">
                                        <?php
                                            while($row3 = mysqli_fetch_array($query3)) {
                                                ?>
                                                <?php echo $row3['list_pemusik']; ?>
                                                <?php
                                            }
                                        ?>
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
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script> -->
        <!-- <script>
            function format (p2) {
                let tes = (p2[5].split("|"));
                
                let html_result = "<h6>Tanggal Ibadah</h6><table id='table2' style='width: 100%;'>";
                for(let i = 0; i<tes.length; i++){
                    html_result += "<tr style='background-color:white;'><td style='background-color:rgba(0, 0, 0, 0.05); font-weight:800; text-align:center; width:7%;'>" +  (i+1) +'#' + "</td><td style='width: 70%;'>" +  tes[i] + "</td></tr>";
                }
                html_result += "</table>";
                $('#table2').removeClass('table-striped');
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