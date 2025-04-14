<?php
    include "library/getTime.php";

    $timestamp = getTimeFromNTP();
    $deadline = mysqli_fetch_array(mysqli_query($con, "SELECT tenggat FROM forms WHERE id_form='$_POST[id_form]'"))['tenggat'];
?>

<div class="nav-form">
    <a href="/">
        <div><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>

<?php
    if ($deadline - $timestamp < 0) {
?>
    <section class="login_box summary fail">
        <h2>TENGGAT PENGISIAN ABSEN TELAH LEWAT</h2>

<?php
    }
    else {
        $query = mysqli_query($con, "INSERT INTO records SET
            id_form = '$_POST[id_form]',
            nama = '$_POST[nama]',
            kelas = '$_POST[kelas]',
            nim = '$_POST[nim]',
            timestamp = '$timestamp'
        ");
        if ($query) {
?>

    <section class="login_box summary success">
        <h2>PENGISIAN ABSEN BERHASIL</h2>
        <div>
            <p>Nama: <?= $_POST['nama'] ?></p>
            <p>NIM: <?= $_POST['nim'] ?></p>
            <p>Kelas: <?= $_POST['kelas'] ?></p>
            <p>Waktu pengisian: <?= date_create("@" . $timestamp)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
        }
        else {
?>

    <section class="login_box summary fail">
        <h2>PENGISIAN ABSEN GAGAL</h2>
        <div>
            <p>Nama: <?= $_POST['nama'] ?></p>
            <p>NIM: <?= $_POST['nim'] ?></p>
            <p>Kelas: <?= $_POST['kelas'] ?></p>
            <p>Waktu pengisian: <?= date_create("@" . $timestamp)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
        }
    }
?>

    </section>