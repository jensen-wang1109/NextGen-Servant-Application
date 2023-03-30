<?php 
    /** ini koneksi ke database */
    $servername = "localhost";
    $usname= "root";
    $pas = "";
    $dbname = "nextgen";


    $con = mysqli_connect($servername, $usname, $pas, $dbname);
    if(!$con) {
        die("Connection Failed : " .mysqli_connect_error());
    }
?>