<?php
    include "library/db_config.php";

    $host = "localhost";
    $user = MYSQL_GUEST_USER;
    $pass = MYSQL_GUEST_PASS;
    $db = DB_NAME;

    if (!empty($_SESSION['username']) or !empty($_SESSION['password'])) {
        $user = MYSQL_ADMIN_USER;
        $pass = MYSQL_ADMIN_PASS;
    }

    $db_con = new mysqli($host, $user, $pass, $db);
    if ($db_con->connect_errno) {
        error_log('Koneksi gagal: ' . $db_con->connect_errno);
    }
?>