<?php
    include "library/getTime.php";

    $timestamp = getTimeFromNTP();
    $deadline = $db_con->query("SELECT deadline_unix FROM forms WHERE form_id='$_POST[form_id]'")->fetch_assoc()['deadline_unix'];
?>

<div class="nav-form">
    <a href="/">
        <div><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
    </a>
</div>

<?php
    if ($deadline - $timestamp < 0) {
?>
    <section class="form-box summary fail">
        <h2>TENGGAT PENGISIAN ABSEN TELAH LEWAT</h2>

<?php
    }
    else {
        $query = $db_con->query("INSERT INTO records SET
            form_id = '$_POST[form_id]',
            name = '$_POST[name]',
            class = '$_POST[class]',
            student_id = '$_POST[student_id]',
            timestamp_unix = '$timestamp'
        ");
        if ($query) {
?>

    <section class="form-box summary success">
        <h2>PENGISIAN ABSEN BERHASIL</h2>
        <div>
            <p>Nama: <?= $_POST['name'] ?></p>
            <p>NIM: <?= $_POST['student_id'] ?></p>
            <p>Kelas: <?= $_POST['class'] ?></p>
            <p>Waktu pengisian: <?= date_create("@" . $timestamp)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
        }
        else {
?>

    <section class="form-box summary fail">
        <h2>PENGISIAN ABSEN GAGAL</h2>
        <div>
            <p>Nama: <?= $_POST['name'] ?></p>
            <p>NIM: <?= $_POST['student_id'] ?></p>
            <p>Kelas: <?= $_POST['class'] ?></p>
            <p>Waktu pengisian: <?= date_create("@" . $timestamp)->setTimezone(timezone_open("Asia/Makassar"))->format("d\/m\/Y H:i:s \W\I\T\A") ?></p>
        </div>

<?php
        }
    }
?>

    </section>