<?php
    $host = "0.0.0.0";
    $user = "admin";
    $pass = "admin";
    $db = "db_attendance";
    $port = 3306;

    $con = mysqli_connect($host, $user,$pass, $db, $port);
    if (mysqli_connect_errno()) {
        echo "Koneksi gagal: ".mysqli_connect_errno();
    }
?>