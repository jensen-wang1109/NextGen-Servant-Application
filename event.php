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

    <title>| EVENT</title>
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
                <h3 style="color: black;">Event</h3>
                <a href="index.php" style="display: inline;">Home</a>
                <p style="display: inline;">&ensp; / &ensp;</p>
                <a href="event.php" style="display: inline;">Event</a>
            </div>

            <div class="row" style="font-family: Poppins; float:left; margin-right:20px;" id="tambah">
                <a class="btn btn-success" href="form_event.php" role="button"><i class="fas fa-plus"></i>&ensp;Add Event</a>
            </div>

            <div class="clean"></div>

            <div class="row" style="border: 1px solid gray; background-color: white; color: black; margin-top: 20px;">
                <div class="col-sm-12" style="margin-top: 20px; margin-bottom: 20px;  overflow:auto;">

                    <table id="table" class="table table-hover table-striped" style="color:black;">
                        <thead style="text-align: center;">
                            <tr>
                                <!-- <th scope="col"></th> -->
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Mulai Event - Selesai Event</th>
                                <th scope="col">Tema Event</th>
                                <th scope="col">Info Event</th>
                                <th scope="col" id="header_edit">Aksi</th>
                            </tr>
                        </thead>

                        <tbody style="border-bottom: 1px solid black;">
            
                        <?php 
                            $nomor = 1;
                            
                            $query = mysqli_query($con, "SELECT *, DATE_FORMAT(tanggal_mulai_event, '%d %M %Y') AS start_dt_ev, DATE_FORMAT(tanggal_selesai_event, '%d %M %Y') AS end_dt_ev FROM event");

                            while($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr scope="row">
                                    <td style="text-align: right; width:5%;"><?php echo $nomor; ?>.</td>
                                    <td style="text-align: center;">
                                        <?php 
                                            if($row['start_dt_ev'] == $row['end_dt_ev']) {
                                                echo $row['start_dt_ev'];
                                            }
                                            else {
                                                echo $row['start_dt_ev'] . " - " . $row['end_dt_ev'];
                                            }
                                        ?>
                                    </td> 
                                    <td><?php echo $row['tema_event']; ?></td>
                                    <td style="text-align: center; width:15%;" >
                                        <a href="event_full.php?eventId=<?php echo $row['event_id']; ?>" class="btn btn-info btn-sm" title="View Event">
                                            <i class="fas fa-info-circle"></i> 
                                        </a>
                                    </td>
                                    <td style="text-align: center; width:10%;" class="ed">
                                        <a href="form_event_edit.php?eventId=<?php echo $row['event_id'];?>" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="event_delete.php?eventId=<?php echo $row['event_id']; ?>" onclick="return confirm('Yakin menghapus data?')" class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                
                            <?php $nomor += 1; ?>
                            <?php } ?>
                            <?php 
                                if($fetch_info['role'] != "Super User") {
                                    ?> 
                                    <script>
                                        let add = document.getElementById("tambah");
                                        let headEdit = document.getElementById("header_edit");
                                        const edit = document.querySelectorAll('td.ed');

                                        add.remove();
                                        headEdit.remove();
    
                                        edit.forEach(element => {
                                            element.remove();
                                        });
                                    </script>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>
        <!-- <script>
            function format (p2) {
                let indikator = (p2[5].split("|"));
                let volume = (p2[6].split("|"));
                let satuan = (p2[7].split("|"));
                
                let html_result = "<h6>Indikator Kinerja</h6><table id='table2' style='width: 100%;'>";
                for(let i = 0; i<indikator.length; i++){
                    html_result += "<tr style='background-color:white;'><td style='background-color:rgba(0, 0, 0, 0.05); font-weight:800; text-align:center; width:7%;'>" +  (i+1) +'#' + "</td><td style='width: 70%;'>" +  indikator[i] + "</td><td style='width: 10%'>" + volume[i] + "</td><td>" + satuan[i] + "</td></tr>";
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