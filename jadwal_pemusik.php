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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>| PEMUSIK</title>
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
    <style>
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
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>
<body id="page-top" style="font-family: Poppins;">
    <div id="wrapper">
        <?php include "header.php";?>
        <!-- Page Heading -->
        <div class="container fluid">
            <div class="page_head" style="margin-bottom: 50px;">
                <h3 style="color: black;">Musik</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="jadwal_pemusik.php" style="display: inline;">Jadwal Pemusik</a>
            </div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                <a class="btn btn-success" href="form_jadwal_pemusik.php" role="button"><i class="fas fa-plus"></i>&ensp;Add Jadwal Pemusik</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="border: 1px solid gray; background-color: white; color: black; margin-top: 20px;">
                <div class="col-sm-12" style="margin-top: 20px; margin-bottom: 20px;  overflow:auto;">

                    <table id="table" class="table table-hover table-striped" style="color:black;">
                        <thead style="text-align: center;">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Ibadah</th>
                                <th scope="col">Shift</th>
                                <th scope="col">List Pemusik</th>
                                <th scope="col">Add/Remove Pemusik</th>
                                <th scope="col">Delete Jadwal Pemusik</th>
                                <th style="display:none"></th>
                                <th style="display: none;"></th>
                            </tr>
                        </thead>

                        <tbody style="border-bottom: 1px solid black;">
            
                        <?php 
                            $nomor = 1;

                            $query = mysqli_query($con, "SELECT i.ibadah_id, DATE_FORMAT(i.tanggal_ibadah, '%d %M %Y') AS tanggal_ibadah, i.shift, GROUP_CONCAT(j.fullname_jemaat SEPARATOR ', ') AS list_pemusik, GROUP_CONCAT(jp.nama_jenis_pemusik SEPARATOR '|') AS jenis_melayani, GROUP_CONCAT(j.fullname_jemaat SEPARATOR '|') AS list_pemusik_2 FROM pemusik p JOIN musik_ibadah mi ON p.pemusik_id = mi.pemusik_id JOIN ibadah i ON mi.ibadah_id = i.ibadah_id JOIN jenis_pemusik jp ON mi.jenis_pemusik_id = jp.jenis_pemusik_id JOIN jemaat j ON j.jemaat_id = p.jemaat_id GROUP BY mi.ibadah_id, i.shift;");

                            while($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr scope="row">
                                    <td class="details-control" style="width: 5%;"></td>
                                    <td style="text-align: right; width: 5%;"><?php echo $nomor; ?>.</td>
                                    <td style="width: 18%;"><?php echo $row['tanggal_ibadah']; ?></td> 
                                    <td style="width: 3%;"><?php echo $row['shift']; ?></td>
                                    <td><?php echo $row['list_pemusik']; ?>
                                    </td>
                                    <td style="text-align: center; width:8%;">
                                        <a href="form_add_pemusik.php?ibadahId=<?php echo $row['ibadah_id']; ?>" class="btn btn-success btn-sm" title="Add">
                                        <i class="fas fa-plus"></i>
                                        </a>
                                        <a href="form_remove_pemusik.php?ibadahId=<?php echo $row['ibadah_id']; ?>" class="btn btn-danger btn-sm" title="Remove"><i class="fas fa-minus"></i>
                                        </a>
                                    </td>
                                    <td style="text-align:center; width: 10%;">
                                        <a href="jadwal_pemusik_delete.php?ibadahId=<?php echo $row['ibadah_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus jadwal pemusik?')">
                                        Delete
                                        </a>
                                    </td>
                                    <td style="display: none;">
                                        <?php echo $row['list_pemusik_2']; ?>
                                    </td>
                                    <td style="display:none;">
                                        <?php echo $row['jenis_melayani']; ?>
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
        <script>
            function format (p2) {
                let list_pemusik = (p2[7].split("|"));
                let jenis_musik = (p2[8].split("|"));
                
                let html_result = "<h6><b>Tugas Pelayanan Musik</b></h6><table style='width: 100%;'>";
                for(let i = 0; i<list_pemusik.length; i++){
                    html_result += "<tr style='background-color:white;'><td style='background-color:rgba(0, 0, 0, 0.05); font-weight:800; text-align:center; width: 20%;'>"+ list_pemusik[i] +"</td><td>"+ jenis_musik[i] + "</td></tr>";
                }
                html_result += "</table>";
                return html_result;
            }
        </script>
    </div>
</body>

<!-- query remove usher -->
<!-- SELECT i.tanggal_ibadah, i.shift, u.nama_usher, ui.keterangan_usher FROM usher u JOIN usher_ibadah ui ON u.usher_id = ui.usher_id JOIN ibadah i ON ui.ibadah_id = i.ibadah_id ORDER BY ui.usher_id DESC LIMIT 1; -->
<?php
    mysqli_close($con);
    ob_end_flush();
?>
</html>