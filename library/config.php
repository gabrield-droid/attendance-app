<?php
    $host = "localhost";
    $user = "admin";
    $pass = "admin";
    $db = "db_attendance";

    $db_con = new mysqli($host, $user, $pass, $db);
    if ($db_con->connect_errno) {
        error_log('Koneksi gagal: ' . $db_con->connect_errno);
    }
?>